<?php 
include("simple_html_dom.php");
 
// Retrieve the DOM from a given URL
$html = file_get_html('http://www.prothom-alo.com/');
$c = 0;
$allLink = array();
// Find all "A" tags and print their HREFs
/*foreach($html->find('a') as $e) 
    echo $e->href . '<br>';
*/	
// Find all SPAN tags that have a class of "myClass"
foreach($html->find('h2.title a') as $e){
	$pos = strrpos($e->href, "/");
	$rest = substr($e->href, 0, $pos);
	array_push($allLink, $rest);
	$singlePost = file_get_html("http://www.prothom-alo.com/national/article/39934");
	//var_dump($singlePost->find('.title_container'));
	$title = $singlePost->find('.title_container');
	$img = $singlePost->find('#media_0 img');
	$detail = $singlePost->find('.jw_detail_content_holder');
	
	$titleData = $title->innertext;
	$imgData = $img->src;
	$detailData = $detail->innerhtml;

	/***  NOTE: please check out whether title img and detail variable can retrieve targeted data
	from each single post   ***/
	$singlePostArr = array("title" => $title->innertext, "img" => $img->src, "detail" => $detail->innerhtml);
}
/*$json = json_encode($allLink);
//var_dump($json);
$fp = fopen('link_json/prothom_alo_links.json', 'w');
if(fwrite($fp, $json))
	echo 'Json created!!!!';
else
	echo 'Failed';
fclose($fp);*/
/*
// Retrieve all images and print their SRCs
foreach($html->find('img') as $e)
    echo $e->src . '<br>';

// Find all images, print their text with the "<>" included
foreach($html->find('img') as $e)
    echo $e->outertext . '<br>';

// Find the DIV tag with an id of "myId"
foreach($html->find('div#myId') as $e)
    echo $e->innertext . '<br>';

// Find all SPAN tags that have a class of "myClass"
foreach($html->find('span.myClass') as $e)
    echo $e->outertext . '<br>';

// Find all TD tags with "align=center"
foreach($html->find('td[align=center]') as $e)
    echo $e->innertext . '<br>';
    
// Extract all text from a given cell
echo $html->find('td[align="center"]', 1)->plaintext.'<br><hr>';*/
 ?>
