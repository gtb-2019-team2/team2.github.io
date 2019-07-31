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
	            class Hotpepper {
                    /*URL*/
                    const URL = 'https://webservice.recruit.co.jp/hotpepper/gourmet/';
                    /*APIキー*/
                    private $apiKey = '060d84c575777615';
                    /*APIバージョン*/
                    private $apiVersion = 'v1';

                    /*URLへの接続*/
                    public function send($params)
                    {
                        //各種入力した値を用いてAPIに接続用URL設定
                        //$params 駅名
                        //$params2 ジャンルコード(予定)
                        $url = sprintf("%s%s/?key=%s&keyword=%s&range=4&count=16&format=json",
                            self::URL,
                            $this->apiVersion,
                            $this->apiKey,
                            $params
                        );

                        //APIに接続
                        $sh = file_get_contents($url);
                        
                        
                        //取得したjsonデータを配列に入れる
                        return  json_decode($sh,true);
                    }
                }

                class Search
                {
                    public function listView($comment)
                    {
                        $results = $this->mainSearch($comment);
                        echo '<br>';
			$URL = 'http://118.27.32.92:8080/api/satow/get/shop?id=';
                        $count = 0;
			$tablecount = 0;
                        for ($i = 1; $i < 100; $i++)
                        {
				$url = sprintf("%s%s",$URL,$i);
				$table = file_get_contents($url);
                        	$table2 = json_decode($table,true);
                            if($results[$i]['station_name'] === $comment){
                                $count++;
                                //echo $count;
                                $Buffer="<a href={$results[$i]['urls']['pc']}><div class='shop_list_cell cell_{$count}'>";
				$Buffer.="<div class=left_area{$count}>";
                                $Buffer.="<div class='shop_status_2 info_02' id='shop_status info_02'>";
                                $Buffer.="<div class=recieve_shop_percent_2 name=s_table id=s_per>{$table2['shopList'][0]['per']}<span id=percent_value></span>%</div>";
                                $Buffer.="<div class=recieve_shop_status_2 id=s_status><span id=status_value></span>";

				if(0 <= $table2['shopList'][0]['per'] && $table2['shopList'][0]['per'] < 25){
					$Buffer.='余裕あり';
				} else if(25 <= $table2['shopList'][0]['per'] && $table2['shopList'][0]['per'] < 50){
					$Buffer.='空きあり';
				}else if(50 <= $table2['shopList'][0]['per'] && $table2['shopList'][0]['per'] < 75) {
					$Buffer.='やや混雑';
				}
				else if(75 <= $table2['shopList'][0]['per'] && $table2['shopList'][0]['per'] <= 100){
					$Buffer.='ほぼ満席';
				}
				$tablecount++;
                                if($tablecount==2){
                                        $tablecount = 0;
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
                                $Buffer.="<div class='shop_info_2 info_02' id=shop_info><h2 class=recieve_shop_name_2 name=s_name id=s_name>{$results[$i]['name']}";
                                $Buffer.='</h2>';
 
 
                                //ジャンル、タグ
                                $Buffer.="<p class=recieve_shop_genre_2 name=s_genre>{$results[$i]['genre']['name']}";
                                $Buffer.='</p></div>';
 
 
                                //住所
                                $Buffer.="<div class=recieve_shop_address name=s_addr >{$results[$i]['address']}";
                                $Buffer.='</div>';
 
                               //画像など
                                $Buffer.="<img class=recieve_list_photo name=button src={$results[$i]['photo']['mobile']['l']} alt=shop_photo width=845px>";
 
 
                                echo $Buffer.='</div></div></a>';
                            }
                            
                            if(empty($results[$i+1])){
                                break;
                            }
                            
                        }
                        echo '</br>';
                    }

                

                    public function mainSearch($comment)
                    {  
                        $hp = new Hotpepper();
                        if($comment != NULL)
                        {
                            echo $comment;
                            $array = $hp->send($comment);
                            $count = 0;
                            $results = $array['results']['shop'];
                            $count = 0;
                            return $results;
                        }     
                    }
                    
                }


                
                if(isset($_POST["comment1"]))
                {
                    
                    $comment = $_POST["comment1"];
                    $S = new Search();
                    $S->listView($comment);
                }
                else{
                    $alert = "<script type='text/javascript'>alert('駅名を入れてください');</script>";
                    echo $alert;
                }
                
                $comment = NULL;
            ?>

            
      
    </body>

</html>

