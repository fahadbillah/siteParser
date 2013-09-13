<?php 
include("simple_html_dom.php");
 
// Retrieve the DOM from a given URL
$html = file_get_html('http://www.prothom-alo.com/');
//$c = 0;
//$allLink = array();
// Find all "A" tags and print their HREFs
/*foreach($html->find('a') as $e) 
    echo $e->href . '<br>';
*/	
// Find all SPAN tags that have a class of "myClass"
foreach($html->find('h2.title a') as $e){
	$pos = strrpos($e->href, "/");
	$rest = substr($e->href, 0, $pos);
	echo $rest."<br>";
	//array_push($allLink, $rest);
}
$singlePost = file_get_html("http://www.prothom-alo.com/national/article/40908");
//var_dump($singlePost->find('.title_container'));

$title = $singlePost->find('.title_container h1');


$newTitle = $title[0]; //because " find('.title_container h1') " returns an array
echo $newTitle;

//image section is not showing the src despite having to visible error
$image = $singlePost->find('#media_0 img');
foreach($image as $element) 
       echo $element->src;

//detail news
$detail = $singlePost->find('.jw_detail_content_holder p');
$txt= $detail[0]->plaintext;
echo $txt; 
 ?>
