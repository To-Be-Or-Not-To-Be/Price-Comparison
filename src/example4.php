<!DOCTYPE html>
<html>
  <head>
    <title>Price Comparison Website - Data Scraping </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" type="text/css" href="s.css">
  </head>
  <body>

<div class="container">
    <?php

include_once('simple_html_dom.php');
$html = new simple_html_dom();
if( isset($_GET['hit']) )
{
    $val1 = htmlentities($_GET['lol']);
    /*
    echo "bye".$val1."hi";
    */
     $val1 = preg_replace('/\s+/', '%20', $val1);
     /*echo $val1;*/
$target_url = "http://www.amazon.in/s/ref=nb_sb_noss_2?url=search-alias%3Daps&field-keywords=".$val1."&rh=i%3Aaps%2Ck%3Ahp";
$html->load_file($target_url); 

echo "<div class=\"row\">";
echo "<div class=\"col-sm-12 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4\">";
echo "<h2 class=\"brand\"><b>Amazon</b></h2>";
echo "</div>";
echo "</div>";

$flag = 0;
foreach ($html->find('div') as $link) {
if($link->class=="s-item-container")
{

    foreach($link->find('img') as $link2){
	if($link2->class=="s-access-image cfMarker"){
	    
		echo "<div class=\"w3-card pad\">";	    
	   	echo "<div class=\"row\">";
		echo "<div class=\"col-sm-12 col-md-12 col-md-offset-4 col-lg-12 col-lg-4 photo\">";	    
	    echo "<img class=\"".$link2->class."\" src=\"".$link2->src."\"></img>";
	  	echo "</div>";
		echo "</div>";
          }
	}



foreach($link->find('a') as $link3){
			if($link3->class == "a-link-normal s-access-detail-page  a-text-normal"){
				echo "<div class=\"row\">";
				echo "<div class=\"col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3\">";
				echo $link3;
				echo "</div>";
				echo "</div>";
				
			}
		}






    foreach($link->find('span') as $link4){
    if(empty($link4->class=="a-size-base a-color-price s-price a-text-bold")){
		$flag = 0;
	}
	if($link4->class=="a-size-base a-color-price s-price a-text-bold"){
	    echo "<div class=\"row\">";
		echo "<div class=\"col-sm-12 col-md-2 col-md-offset-5 col-lg-2 col-lg-offset-3\">";
		echo $link4;	    
	    echo "</div>";
	    echo "</div>";
	    echo "</div>";
	    $flag = 1;
	    break;
    
	}
		}
			if($flag == 0) {
		    echo "<div class=\"row\">";
		    echo "<div class=\"col-sm-12 col-md-2 col-md-offset-5 col-lg-2 col-lg-offset-3\">";
			echo "<span><center>TRUSTED PRICE UNAVAILABLE<span></center>";
		    echo "</div>";
	        echo "</div>";
	        echo "</div>";
	    
	}

}
}
echo "<div class=\"row\">";
echo "<div class=\"col-sm-12 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4\">";
echo "<h2 class=\"brand\"><b>Infibeam</b></h2>";
echo "</div>";
echo "</div>";

$html1 = new simple_html_dom();
$target_url1 = "https://www.infibeam.com/Computers_Accessories/search?q=macbook".$val1;
$html1->load_file($target_url1); 
foreach ($html1->find('div') as $link)
{
	if($link->class==" col-md-3 col-sm-6 col-xs-12 search-icon flex-item"){
		foreach ($link->find('img') as $link1)
		{
			if(($link1->class=="img-responsive ")||($link1->class=="img-responsive")){    
	   	        echo "<div class=\"w3-card pad\">";
	   	        echo "<div class=\"row\">";
		        echo "<div class=\"col-sm-12 col-md-12 col-md-offset-5 col-lg-12 col-lg-5 photo\">";	    
	            echo $link1;
	  	        echo "</div>";
	  	        echo "</div>";
	  	    }
		}
	

foreach ($link->find('div') as $link2)
{
	if(($link2->class=="title"))
	{ 
				echo "<div class=\"row\">";
				echo "<div class=\"col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3\">";
				echo $link2;
				echo "</div>";
				echo "</div>";

	}
	}
foreach ($link->find('span') as $link4) 
		{
			if ($link4->class=="final-price") 
			{
         	    echo "<div class=\"row\">";
	        	echo "<div class=\"col-sm-12 col-md-2 col-md-offset-5 col-lg-2 col-lg-offset-3\">";
        		echo $link4;	    
         	    echo "</div>";
         	    echo "</div>";
         	    echo "</div>";

				}	
		}

	}
}
}
else
{
	echo "error"; 
}

?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </body>
</html>
