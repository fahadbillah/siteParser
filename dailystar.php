<?php 
include("simple_html_dom.php");

// Retrieve the DOM from a given URL
$html = file_get_html('http://www.thedailystar.net/beta2/');
//$c = 0;
//$allLink = array();
//$AllContent = array();


// Find all "A" tags and print their HREFs

// Find all SPAN tags that have a class of "myClass"
foreach($html->find('.most_viewed li a')  as $e){
	
	$pos = $e->href;
	//echo $pos."<br>";
}
//header
$singlePost = file_get_html('http://www.thedailystar.net/beta2/news/sq-verdict-was-leaked-confirms-ict/');

//the title
$title = $singlePost->find('.headline6 bold mb5 mb10,h1');
foreach($title as $elemet2){
	$newsTitle=$elemet2->plaintext;
	echo $newsTitle;
}

//image
/**/
$image = $singlePost->find('img',3);//->find('img');
var_dump($image);
exit;
foreach($image as $elemet4){
	echo $elemet4->href;
	echo $elemet4->src;	
}



//the detail
$detail = $singlePost->find('.post-entry mb10,p');
$txt="";
foreach($detail as $elemet3){
	$newsTitle=$elemet3->plaintext;
	$txt.=$newsTitle;
}
echo "<br>".$txt;

?>