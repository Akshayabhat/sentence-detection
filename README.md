# sentence-detection
Sentence Detection using PHP for Fiskkit

<h1> GIVEN: </h1>
<br/>
Fetcher.jar to extract paragraphs from article.

<h1> APPROACH: </h1>
<br/>
 <ul>Created executable jar file to call fetcher.pullAndExtract()</ul>
 <ul>Used exec() function in php to execute the jar and got paragraphs</ul>
 <ul>Converted smart quotes to regular quotes as it interfered with the parsing</ul>
 <ul>Used NLPtools to separate paragraphs to sentences  (Used composer to installd dependencies)</ul>
 <ul>Wrote senteces to csv file sentences.csv</ul>
 
<h1> ASSUMPTIONS: </h1>
 A sentence is considered complete if it ends with any of the following:
  <ol> 
  <li> dot </li>
  <li> dot followed by a quote. Example: He said 'no.'</li>
  <li> question mark </li>
  <li> semicolon </li>
</ol>
 The only smart characters present are quotes, em dash and ellipsis."

<h1> TO RUN FROM COMMAND LINE: </h1>
<br/>
 <ul>Fork/Clone repo</ul>
 <ul>cd sentence-detection</ul>
 <ul>In the same directory, install dependencies by running: </br>
                                    $ composer install </br>
 This will install the dependency (NLPTools) specified in composer.json <br/></ul>
 <ul>Run the command: </br>
                            php GetSentences.php [link_to_article] </br>
    Eg: php GetSentences.php "http://www.weeklystandard.com/blogs/intel-chief-blasts-obama_802242.html"</ul>
 <ul>The output is written in sentences.csv</ul>

