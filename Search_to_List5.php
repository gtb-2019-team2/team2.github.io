<!DOCTYPE HTML>
<html lang="ja"> 
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=1243px" />

<meta name=”keywords” content=”aaaaa”>
<meta name="description" content="aaaaa" />


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src=""></script>

<link rel="stylesheet" type="text/css" href="css/common.css?ver3.3"  media="screen" />

<title> SATOW </title>
<link rel="shortcut icon" href="" />
<link rel="apple-touch-icon" href="" />

<script type="text/javascript"
	src="http://hyouta.jp/web/phptest.php"></script>

</head>

<body>

<div class="wrap_all">
<div class="wrap_main">
<header>
	<h1><a href="search_test2.php"><img class="header_img" src="images/common/common/logo.png" alt="header_img"></a></h1>
</header>

<?php
	            header('Access-Control-Allow-Origin: *');

                class Search
                {
			$count = 0;
                    public function listView($s_name,$s_genre,$s_addr,$s_img,$s_table)
                    {
                                $count++;
                                //echo $count;
                                $Buffer="<div class='shop_list_cell cell_{$count}'>";
                                
				$Buffer.="<div class=left_area{$count}>";
                                $Buffer.="<div class='shop_status_2 info_02' id='shop_status info_02'>";
                                $Buffer.="<div class=recieve_shop_percent_2 id=s_per>{$s_table}<span id=percent_value></span>%</div>";
                                $Buffer.="<div class=recieve_shop_status_2 id=s_status><span id=status_value></span>";

				if(0 <= $s_table && $s_table < 25){
					$Buffer.='余裕あり';
				} else if(25 <= $s_table && $s_table < 50){
					$Buffer.='空きあり';
				}else if(50 <= $s_table && $s_table < 75) {
					$Buffer.='やや混雑';
				}
				else if(75 <= $s_table && $s_table <= 100){
					$Buffer.='ほぼ満席';
				}
				$Buffer.="</div>";

                                $Buffer.="<div class=list_meter>";
                                $Buffer.="<div class='meter_01 meter_on'></div>";
                                $Buffer.="<div class='meter_02 meter_on'></div>";
                                $Buffer.="<div class='meter_03 meter_on'></div>";
                                $Buffer.="<div class='meter_04 meter_on'></div>";
                        	$Buffer.="</div>";
                $Buffer.="</div>";
$Buffer.="</div><!-- left_area -->";

$Buffer.="<div class=right_area>";
 
 
                                // 店名
                                $Buffer.="<div class='shop_info_2 info_02' id=shop_info><h2 class=recieve_shop_name_2 id=s_name>{$s_name}";
                                $Buffer.='</h2>';
 
 
                                //ジャンル、タグ
                                $Buffer.="<p class=recieve_shop_genre_2>{$s_genre}";
                                $Buffer.='</p></div>';
 
 
                                //住所
                                $Buffer.="<div class=recieve_shop_address>{$s_addr}";
                                $Buffer.='</div>';
 
                                //画像など
                                $Buffer.="<div class=img-wrap><img class=recieve_list_photo src={$s_img} alt=shop_photo width=100%></div>";
 
 
                                echo $Buffer.='</div></div>';
                            
                        echo '</br>';
                    }
                    


                
                    
                    $s_name = $_POST["s_name"];
		    $s_genre = $_POST["s_genre"];
		    $s_addr = $_POST["s_addr"];
		    $s_img = $_POST["s_img"];
		    $s_table = $_POST["s_table"];
                    $S = new Search();
                    $S->listView($s_name,$s_genre,$s_addr,$s_img,$s_table);
          
                
            ?>

            
      
    </body>

</html>

