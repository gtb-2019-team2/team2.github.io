<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
 "http://www.w3.org/TR/html4/strict.dtd">
    <html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
      
        <script src="https://map.yahooapis.jp/js/V1/jsapi?appid=OY1oDxsr" type="text/javascript" charset="UTF-8"></script>
        <script src="https://unpkg.com/yahoo-map-cluster@latest/bundle/ymap-cluster.js"></script>
        <!--タッチ操作による地図スクロール・ピンチ操作による地図縮尺の変更（一部の端末機種のみの有効化-->
        <meta name="viewport" content="initial-scale=1.0,user-scalable=no">



	
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.\
min.js"></script>
<script type="text/javascript" src=""></script>

<link rel="stylesheet" type="text/css" href="css/common.css?ver3.3"  media="screen" />

<title> SATOW </title>
<link rel="shortcut icon" href="" />
<link rel="apple-touch-icon" href="" />

<meta name="viewport" content="initial-scale=1.0,user-scalable=no">
    </head>

    <body>
<div class="wrap_all">
  <div class="wrap_main">
    <header>
          <h1><a href="search_test2.php"><img class="header_img" src="../images/common/common/logo.png" alt="header_img"></a></h1>
	  </header>


    <div class="page_back_btn">

      </div>



    <!-- =====================shop map area================= -->
    <section id="shop_detail_block">
	<main>
        <div id="map" style="width:100%; height:1200px;"></div>
        
         <!-- Begin Yahoo! JAPAN Web Services Attribution Snippet -->
         <a href="https://developer.yahoo.co.jp/about">

<!-- <img src="https://s.yimg.jp/images/yjdn/yjdn_attbtn2_105_17.gif" width="105" height="17" 
    title="Webサービス by Yahoo! JAPAN" alt="Webサービス by Yahoo! JAPAN" border="0" style="margin:15px 15px 15px 15px"></a> -->
<!-- End Yahoo! JAPAN Web Services Attribution Snippet -->


<script type="text/javascript">
    window.onload = function() {
        var ymap = new Y.Map("map", {
            configure: {
                mapType: Y.Map.TYPE.SMARTPHONE,
                singleClickPan: true,
                doubleClickZoom: true,
                continuousZoom: true,
                scrollWheelZoom: true
            }
        });
        //地図表示
        ymap.drawMap(new Y.LatLng(35.65851613933086, 139.7017727955547), 17);
        //地図レイヤの切り替え
        ymap.addControl(new Y.LayerSetControl());
        //スケールバー
        ymap.addControl(new Y.ScaleControl());
        //スライダー
        //ymap.addControl(new Y.SliderZoomControl());
        //中心軸を元
        ymap.zoomIn();
        ymap.zoomOut();
        //ピンのアイコン設定
        var icon = new Y.Icon('pin_color.png', {
            iconSize: new Y.Size(26, 42)
        });
	
        //マーカ表示
        <?php
            $comment = $_POST["comment1"];
            $aa = new Search();
            $point = $aa->mainSearch($comment);
	    //$URL2 = 'http://118.27.32.92:8080/api/satow/get/shop?id=';
	    
            for($i = 1; $i <= 100; $i++)
            {
            	$url2 = sprintf("%s%s",$URL2,$i);
                $table = file_get_contents($url2);
                $table2 = json_decode($table,true);
	        if($point[$i]['station_name'] === $comment)
                {
		   
                    $String = "var marker = new Y.Marker(new Y.LatLng(";
                    $String.= "{$point[$i]["lat"]}, ";
                    $String.= "{$point[$i]["lng"]}),  {\n icon: icon \n});\n";
                    echo $String;
                    echo "ymap.addFeature(marker);\n";
                    //大き目吹き出し
                    $String2 = "marker.bindInfoWindow('";
                    $name = str_replace("'","\\'",$point[$i]['name']);
		    //$table3 = str_replace("$table2['shopList']");
		    $table3 = str_replace("'","\\'",$table2['shopList'][0]['per']);
                    $String2.= "{$name}";
                    //$String2.= "あああ";
                    $String2.= "');\n";
                    echo $String2;
                    //アイコン・マーカーの表示
                    echo "ymap.addFeature(marker);\n";
                }
                if(empty($point[$i+1]))
                {
                    break;
                }
            }
            
            
        ?>

        /*
        var markers = [];
        markers.push(new Y.Marker(new Y.LatLng(35.65851613933086, 139.7017727955547)), {
            icon: icon
        });
        markers.push(new Y.Marker(new Y.LatLng(35.659018623807, 139.70356593366)), {
            icon: icon
        });
        */
        /*複数マーカプログラム[memo]
        for (i = 0; i < data.length; i++) {
            var myMarker = new Y.Marker(data[i].position);
            myMarker.bindInfoWindow(data[i].content);
            myMap.addFeature(myMarker);
        } 
        */
        }

        </script>


        </a>


       
        <?php
                //header('Access-Control-Allow-Origin: *');
        
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
                        $url = sprintf("%s%s/?key=%s&keyword=%s&range=3&count=100&format=json",
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


                    public function mainSearch($comment)
                    {  
                        $hp = new Hotpepper();
                        if($comment != NULL)
                        {
                            //echo $comment;
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
                    //$S->listView($comment);
                }
                else{
                    $alert = "<script type='text/javascript'>alert('駅名を入れてください');</script>";
                    echo $alert;
                }
                
                $comment = NULL;
            ?>

            
        </main>

<!-- decorations -->
       
		</section>
<!-- ===============show map area================== -->


<!-- =================link buttons=============== -->
<!--<section id="bottom_links_block" class="bottom_margin_fix_1">
        <div class="links area02">
	          <div class="search_btn link_01 search_location">
		                <input class="location_btn" type="image" src="../images/common/common/icon_location.png" alt="go_to_location">
				            </div>
		          <div class="search_btn link_02 search_detail">
			                <input class="detail_btn" type="image" src="../images/common/common/icon_detail.png" alt="go_to_detail">
					            </div>
			          <div class="search_btn link_03 search_random">
				                <input class="random_btn" type="image" src="../images/common/common/icon_random.png" alt="go_to_random">
						            </div>
				          <div class="search_btn link_04 search_nypage">
					                <input class="my_btn" type="image" src="../images/common/common/icon_mypage.png" alt="go_to_mypage">
							        </div>
					      </div>
	</section>-->
<!-- ========================link buttons=============== -->




</div><!-- decorations end -->
<footer><img src="../images/common/common/copyright.png" alt="copylight"></footer>
</div><!-- wrap_all end -->
    </body>

</html>
