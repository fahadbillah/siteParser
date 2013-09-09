<?php 
include("simple_html_dom.php");
 
// Retrieve the DOM from a given URL
$html = file_get_html('http://www.prothom-alo.com/');
//$c = 0;
$allLink = array();
// Find all "A" tags and print their HREFs
/*foreach($html->find('a') as $e) 
    echo $e->href . '<br>';
*/	
// Find all SPAN tags that have a class of "myClass"
foreach($html->find('h2.title a') as $e){
	$pos = strrpos($e->href, "/");
	$rest = substr($e->href, 0, $pos);
	//echo $rest."<br>";
	array_push($allLink, $rest);
}
//print_r($allLink);
	echo "</br>";
	echo "</br>";
foreach ($allLink as $link) {
	//var_dump($link);
	$singlePost = file_get_html($link); 	//"title mb10"
	//$title = $singlePost->find('h1');
	//$title1 = $title[0]->innertext;	
	foreach ($singlePost->find('h1') as $t) {
		$title = $t->src;
		break;
	}
	echo $title;
	//var_dump($title->innertext);
	foreach ($singlePost->find('.jw_media_holder img') as $i) {
		$img = $i->src;
		break;
	}
	//var_dump($img);
	echo $img;
	//$details = "";
	foreach ($singlePost->find('.jw_detail_content_holder p') as $d) {
		$details.= $d->text;
	}
	//var_dump($details);
	echo $details;
	echo "</br>";
	echo "single post workssss</br>";
	break;
}
/*echo $title."</br>";
echo $img1."</br>";
echo $details."</br>";*/
/*
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
echo $txt; */
 ?>
