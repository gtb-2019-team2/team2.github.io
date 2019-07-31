
<!DOCTYPE html>
<html lang="ja"> 
<head>

<meta charset="utf-8">

<meta name=”eywords” content=”aaaaa”>
<meta name="description" content="aaaaa" />


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src=""></script>

<link rel="stylesheet" type="text/css" href="css/common.css?ver3.3"  media="screen" />

<title> SATOW </title>
<link rel="shortcut icon" href="" />
<link rel="apple-touch-icon" href="" />

<meta name="viewport" content="initial-scale=1.0,user-scalable=no">

</head>

<body>

<header>
	<h1><a href="search_test2.php"><img class="header_img" src="images/common/common/logo.png" alt="header_img"></a></h1>
</header>

<!--
	<div id="page_back"></div>
	<div id="block_01"></div>
	<div id="block_02"></div>
-->

<div class="wrap_all">
<div class="wrap_main">

<!-- ====================searching area================= -->

<section id="top_searching_block"><!-- searching area -->
	<div class="search area01 overlay">
		<div class="serach_free" id="form01">
			<form method="post" action="Search_to_List4.php"><!-- cgi書き換えが必要 -->

 				<input class="input_here" type="text" name="comment1" value="" placeholder="駅名">
 	 			<input class="submit_btn" type="image" name="submit" src="images/common/common/submit_btn.png" hright="100px" alt="submit">
			</form>
			

		</div>
		<div class="serach_free_2" id="form01">
                        <form method="post" action="Search_Map.php"><!-- cgi書き換えが必要 -->

                                <input class="input_here" type="text" name="comment1" value="" placeholder="周辺">
                                <input class="submit_btn" type="image" name="submit" src="images/common/common/submit_btn.png" hright="100px" alt="submit">
                        </form>
                </div>
	</div>
		<!-- decorations -->
		<div class="d_layer layer_ye"></div>
		<div class="d_layer layer_gr"></div>
		<div class="d_layer layer_bl"></div>
		<div class="d_layer layer_re"></div>
</section>

<!-- ===============searching area==================== -->

<!-- =====================link buttons================ -->
<section id="bottom_links_block">
        <div class="links area02">
                <div class="search_btn link_01 search_location">
                        <input class="location_btn" type="image" src="images/common/common/icon_location.png" alt="go_to_location">
                        <div class="no_nactive_a">
                </div></div>
                <div class="search_btn link_02 search_detail">
                        <input class="detail_btn" type="image" src="images/common/common/icon_detail.png" alt="go_to_detail">
                        <div class="active no_nactive_b">
                </div></div>
                <div class="search_btn link_03 search_random">
                        <input class="random_btn" type="image" src="images/common/common/icon_random.png" alt="go_to_random">
                        <div class="no_nactive">
                </div></div>
                <div class="search_btn link_04 search_nypage">
                        <input class="my_btn" type="image" src="images/common/common/icon_mypage.png" alt="go_to_mypage">
                        <div class="no_nactive">
                </div></div>
        </div>
</section>
<!-- =====================link buttons================= -->




</div><!-- decorations end -->
<footer><img src="images/common/common/copyright.png" alt="copylight"></footer>
</div><!-- wrap_all end -->


<script type="text/javascript">
    $(function(){
        $('.location_btn').click(function(){
		$('.active').removeClass('active');
            $('.serach_free_2').css({'display':'block'});
            $('.serach_free').css({'display':'none'});

            $('.no_nactive_a').css({'width':'30%','height':'10px','border-radius':'5px', 'background-color':'#fff','margin':' 30px 35% 0px 33%'});
            $('.no_nactive_b').css({'width':'30%','height':'10px','border-radius':'5px','border':'#fff 1px solid','margin':' 30px 35% 0px 33%','background-color':'rgba(0, 0, 0, 0)'});



        });

        $('.detail_btn').click(function(){
            $('.serach_free_2').css({'display':'none'});
            $('.serach_free').css({'display':'block'});

            $('.no_nactive_a').css({'width':'30%','height':'10px','border-radius':'5px','border':'#fff 1px solid','margin':' 30px 35% 0px 33%','background-color':'rgba(0, 0, 0, 0)'});
            $('.no_nactive_b').css({'width':'30%','height':'10px','border-radius':'5px', 'background-color':'#fff','margin':' 30px 35% 0px 33%'});

        });
    });
</script>


</body>
</html>
