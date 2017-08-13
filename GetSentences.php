<?php

/* Execute jar file to get paragraphs*/

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
 
echo($paragraphs);

/*TODO --
Get Sentences*/

?>

