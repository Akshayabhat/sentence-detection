
{
	"require": {
		"nlp-tools/nlp-tools":"1.0.*@dev"
	}
}


<?php
include ('vendor/autoload.php');

use \NlpTools\Tokenizers\ClassifierBasedTokenizer;
use \NlpTools\Tokenizers\WhitespaceTokenizer;
use \NlpTools\Classifiers\ClassifierInterface;
use \NlpTools\Documents\DocumentInterface;

/*
Checks if end of sentence has been reached  
returns EOW - End of Word or O - Other

*/
class EndOfSentence implements ClassifierInterface
{
	public function classify(array $classes, DocumentInterface $d)
	{
		list($token,$before,$after) = $d->getDocumentData();

		$dotCount = count(explode('.',$token))-1; //number of dots in the word
		$lastDot = substr($token,-1)=='.'; //Is the last character a dot?
        $lastDotWithQuote = substr($token,-2,2)==".'" || substr($token,-2,2)==".\"" ; //check for . followed by an end-quote
        $semicolon = substr($token,-1)==';'; //Is last letter a semicolon?
        $questionMark = substr($token,-1)=='?'; //Is the last character a question mark?
        
		if(!$lastDot && !$lastDotWithQuote && !$semicolon && !$questionMark) 
			return 'O'; 

		if($dotCount>1) //accomodating for abbreviations such as U.S.A
			return 'O';

		return 'EOW';
	}
}

/*
Converts all smart characters in the input string
(idea used from stack overflow)

*/
function change_smart_quotes($str)
{
	$search = array("’", 
                    "‘", 
                    '”', 
                    '“',
                    '–',
                    '…');

	$replace = array("'",
					 "'",
					 '"',
					 '"',
					 '-',
					 '...');

	return str_replace($search,$replace,$str);
}


/* 
 Execute jar file to get paragraphs 
*/

$jar = "java -jar ./FetchParagraphs.jar";

if($argc < 2)
    {
        exit("Parameters insufficient \n");
    }
if($argc > 2)
    {
        exit("Too many parameters \n");
    }

$param = $argv[1];
$jar = $jar.' '.$param;
$paragraphs = shell_exec($jar);

//change smart characters to regular ones
$paragraphs = change_smart_quotes($paragraphs);

/*
 Get sentences
*/
$tok = new ClassifierBasedTokenizer(new EndOfSentence(), new WhitespaceTokenizer());
$sentences = $tok->tokenize($paragraphs);

/*
 Write to csv
*/

$file = fopen("sentences.csv","w");
 foreach ($sentences as $line)
   {
   	$sentence = explode('\n',$line);
	fputcsv($file,$sentence);
    }

fclose($file);

?>

