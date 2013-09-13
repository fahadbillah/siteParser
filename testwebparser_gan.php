<?php 
include("simple_html_dom.php");

// Retrieve the DOM from a given URL
$html = file_get_html('http://www.prothom-alo.com/');
//$c = 0;
$allLink = array();
$AllContent = array();


// Find all "A" tags and print their HREFs
	
// Find all SPAN tags that have a class of "myClass"
foreach($html->find('h2.title a') as $e){
    	$pos = strrpos($e->href, "/");
    	$rest = substr($e->href, 0, $pos);
	//echo $rest."<br>";
    	array_push($allLink, $rest);
    }
    
foreach ($allLink as $links) 
{

    	$singlePost = file_get_html($links);
        //var_dump($singlePost->find('.title_container'));

    	$title = $singlePost->find('.title_container h1');


        $newTitle = $title[0]; //because " find('.title_container h1') " returns an array
        //echo $newTitle;

        //image section is not showing the src despite having to visible error
        $image = $singlePost->find('.jw_detail_content_holder img');
        foreach($image as $element)
        {
	
        $pic = $element->src;
	   //global $pic;
       //echo $pic;
	   //echo "<br> ";
	   break;
        }
        //echo $image[0]-> src;
        
        //detail news
        $detail = $singlePost->find('.jw_detail_content_holder');
        $txt= $detail[0]->plaintext;
        //echo $txt;
        $temparr= array('title' => $newTitle, 'newsImage'=>$pic, 'detail'=>$txt);
        print_r($temparr);
        //array_push($AllContent, $temparr);
        break;
}

echo $temparr['title'];
echo $temparr['newsImage'];
echo $temparr['detail'];

//var_dump($temparr);




//$hell =serialize($temparr);


$fp = fopen('prothomAlo.json', 'w');
fwrite($fp,json_encode($temparr['title']));
fclose($fp);


/*$json = json_encode($temparr);    
$fp = fopen('prothomAlo.json', 'w');
//var_dump($json);
//fwrite($fp, json_encode($temparr));
$s = file_put_contents('prothomAlo.json');
echo json_encode($s);
file_put_contents('prothomAlo.json',json_encode($temparr));
fclose($fp);
*/

?>
