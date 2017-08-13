# sentence-detection
Sentence Detection using PHP for Fiskkit

<h1> GIVEN: </h1>
<br/>
Fetcher.jar to extract paragraphs from article.

<h1> APPROACH: </h1>
<br/>
<ul> Created executable jar file to call fetcher.pullAndExtract() </ul>
<ul> Used exec() function in php to execute the jar and got paragraphs </ul>
<ul> Used NLPtools to separate paragraphs to sentences  - TODO </ul>
<ul> Wrote sentences into CSV - TODO </ul>


<h1> TO RUN FROM COMMANDLINE: </h1>
<br/>
<ul> Fork/Clone repo </ul>
<ul> cd repo</ul>
<ul>Run the command: <br/>
php GetSentences.php [link_to_article] <br/>
Eg: php GetSentences.php "http://www.weeklystandard.com/blogs/intel-chief-blasts-obama_802242.html" </ul>
