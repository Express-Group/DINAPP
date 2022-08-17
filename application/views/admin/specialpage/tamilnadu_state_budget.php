 <!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="https://images.dinamani.com/images/FrontEnd/images/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="<?php echo image_url; ?>special_page/bootstrap.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <link href="<?php echo image_url; ?>special_page/jquerysctipttop.css" rel="stylesheet" type="text/css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="<?php echo image_url; ?>special_page/bootstrap.min.js"></script>
   <script type="text/javascript" src="<?php print image_url.'js/FrontEnd/js/jQuery.scrollText.js' ?>"></script>
  <style>
	@import url('https://fonts.googleapis.com/css?family=Pavanam&display=swap');
	body{
		position: relative;
    margin: 0;
    padding: 0;
    color: #fff;
    font-size: 18px;
    font-weight: 400;
    overflow-x: hidden;
	font-family: 'Pavanam', sans-serif;
	background: url('<?php echo image_url; ?>special_page/tamilnadu-state-election-bg.jpg');
	background-attachment:fixed;
    background-size: contain;
	}
	.header{
		padding: 5px;
		background: #fff;
		padding-bottom: 10px;
		text-align:center;
	}
	.header .col-md-1 img{
		margin-top: 8%;
	}
	.header .col-md-8 img{
		margin-left: 21%;
		width:30%;
	}
	.fb{
		background: #4672db;
		color: #fff;
		padding: 10px 13px 0px;
		float: right;
		border-radius: 50%;
		margin-top: 2%;
	}
	.twit{
		background: #54bcf2;
		color: #fff;
		padding: 10px 11px 0px;
		float: right;
		border-radius: 50%;
		margin-right: 4%;
		margin-top: 2%;
	}
	.android{
		background: #a4c639;
		color: #fff;
		padding: 10px 11px 0px;
		float: right;
		border-radius: 50%;
		margin-right: 4%;
		margin-top: 2%;
	}
	.apple{
		background: #999999;
		color: #fff;
		padding: 10px 11px 0px;
		float: right;
		border-radius: 50%;
		margin-right: 4%;
		margin-top: 2%;
	}
	.uc_logo{
		width: 40%;
		margin: 0 44%;
	}
	section{margin-top:0.6%;}
	.hovereffect{
		color: #000;
		float:left;
		position:relative;
		width:100%;
		overflow: hidden;
		z-index: 999999;
		position:relative;
	}
	.overlay{
		padding: 0px 0px 20px;
		float:left;
		width:100%;
	}
	.overlay h2{
		font-weight: 700;
		float:left;
		font-size: 19px;
		margin-top: 3px;
		width:100%;
		line-height: 1.36;
	}
	.overlay h2 a{
		color:#000;
		text-decoration:none !important;
	}
	.overlay .info{
		float:left;
		font-size: 14px;
		color: #646161;
	}
	.overlay div {
		float:left;
		text-align:left;
		width:100%;
		margin: 2% 0% 0% 0%;
	}
	.readmore{
		padding: 10px 20px 10px;
		background: green;
		color: #fff;
		margin-bottom: 2%;
		box-shadow: 1px 1px 1px #00000070;
		text-decoration: none !important;
		border-radius: 50%;
		float: right;
	}
	.news-icon{
		position: absolute;
		width: 21%;
		top: 40%;
		left: 37%;
	}
	.news-icon1{
		position: absolute;
		width: 21%;
		top: 44%;
		left: 37%;
	}
	.news-icon2{
		position: absolute;
		width: 21%;
		top: 36%;
		left: 37%;
	}
	

.hovereffect > a > .img-responsive {
  -webkit-transition: 0.6s ease;
  transition: 0.6s ease;
  width: 100%;
  border-radius: 8px;
  border: 1px solid #fff;
}

.uc-browser{width:9%;margin-top:2%;}
.banner-img {
    transform-origin: center -20px;
    float:left;
    box-shadow: 5px 5px 10px rgba(0,0,0,0.5);
	width:100%;
}
@keyframes swing {
    0% { transform: rotate(3deg); }
    100% { transform: rotate(-3deg); }
}

.main-blog{
	float: left;
    width: 100%;
	margin: 3% 0 3%;
}
.img-blog{
	float: left;
    width: 33%;
}
.img-blog img{
	border-bottom:none;
}
.main-blog .overlay{
	width: 67%;
	padding: 10px 10px 0;
}
.gif-bell{
	position: absolute;
    top: -9px;
    right: -22px;
    width: 67px;
}
.container1 ul, .container1 ul li {margin: 0;list-style: none;clear:both;width:100%;color:#000;padding: 0 2px 0;margin-bottom:4%;}
.container1 {width:100%;height: 449px;line-height: 18px; border-radius:0px; overflow: Hidden;color:#fff; padding: 2px 0;}
.container1:hover{overflow-y:scroll;}
.date-color{font-size: 13px;color: #000;float:left;width:18.4%;font-weight:bold;text-align:center;}
.content-color{float:left;width:81.6%;line-height:1.3;} 
.container1::-webkit-scrollbar {width: 12px;}
.container1::-webkit-scrollbar-track { -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); border-radius: 10px;}
.container1::-webkit-scrollbar-thumb {border-radius: 10px; -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);}
.container1 ul{background:#f2f2f2;float:left;}
.container1 ul li{background:#fff;margin: 7px 6px 7px;width: 96%;padding: 2%;box-shadow: 1px 1px 1px #00000052;float:left;}
.date-color a{float: left;width: 100%;font-size: 15px;margin-top: 4px;color: #1DA1F2;}
.ts{
	position: absolute;
    bottom: 0;
    padding: 32px 27px 10px;
    background: linear-gradient(to bottom,transparent 0,rgba(0, 0, 0, 0.66) 80%);
	border-bottom-left-radius: 8px;
	border-bottom-right-radius: 8px;
}
.ts a{color:#fff !important;}
.ts h2{
	font-size: 25px;
}
.t1{
	color: green;
    font-weight: 700;
    font-size: 16px;
    text-transform: uppercase;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    background: #f2f2f2;
    margin: 0;
    padding: 11px 8px 11px;
}
.block-img1{margin-bottom:25px;}
@media only screen and (max-width: 768px){
    .news-icon1,.news-icon2 {position: absolute; width: 21%;top: 56%;left: 37%;}
	.news-icon { position: absolute;width: 21%;top: 54%;left: 37%;}
	.gif-bell{display:none;}	
	.header .col-md-8 img{margin-left:0;width:78%;}
	.header .col-md-3{border-top: 1px solid #eee;margin-top: 16px;}
	.header .col-md-3 a{margin-top: 4%;}
	.header .col-md-3 .fb{margin-right: 21%;}
	.block-img{margin: 0 0 27px;}
	body{background-size: cover;}
	.overlay h2{font-size:22px;margin:0;}
	.img-blog , .main-blog .overlay{width:100%;}
	.overlay .info{font-size: 16px;}
	.uc_logo{margin:0;}
	.block-img .col-lg-4{margin-bottom: 15px;}
	.overlay{padding: 8px 4px 0;}
	.t1{margin-top: 25px;}
}

@media only screen and (max-width: 500px) {
    .group-logo{width:12%;}
	.main-logo{width:30%;margin-left: 4%;}
	.social_icons{display:none;}
	.second-col{margin-top:1%;}
	.uc-browser {width: 25%;margin-top: 2%;}
	.overlay h2{font-size:22px;}
}	
@media only screen and (max-width: 480px){
	.news-icon1{position: absolute; width: 21%;top: 42%;left: 37%;}
	.news-icon2 {position: absolute; width: 21%;top: 36%;left: 37%;}
	.news-icon { position: absolute;width: 21%;top: 41%;left: 37%;}		
}
@media only screen and (min-width : 1550px) {
	.group-logo{width:6%;}
	.header { padding: 5px; background: #fff; padding-bottom: 20px;text-align: center;}
	.social_icons{margin-top:2%;}
	.uc-browser {width: 8%;margin-top: 3%;}
}
.bg-background{position:absolute;z-index:9;top:0;}
.pagination{width: 100%;text-align: center;margin-top: 3%;}
.pagination a{margin: 0 7px 0;background: #a91f1f;color: #fff;text-decoration: none;padding: 6px 10px 0px;border-radius: 5px;border:1px solid #a91f1f;overflow:scroll;}
.pagination strong{margin: 0 7px 0;background: #fff;color: #a91f1f;text-decoration: none;padding: 6px 10px 0px;border-radius: 5px;border:1px solid #a91f1f;}
footer{width:100%;background:#000;color:#fff;font-size: 16px;margin-top: 2%;padding: 1%;}
footer p a {color: #7e7979 !important;}
  </style>
  <script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-2311935-31', 'auto');
	ga('send', 'pageview');
	setTimeout("ga('send','event','adjusted bounce rate','page visit 120 seconds or more')",120000);
	</script>
	<!-- Begin comScore Tag -->
<script>
  var _comscore = _comscore || [];
  _comscore.push({ c1: "2", c2: "16833363" });
  (function() {
    var s = document.createElement("script"), el = document.getElementsByTagName("script")[0]; s.async = true;
    s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
    el.parentNode.insertBefore(s, el);
  })();
</script>
<noscript>
  <img src="https://sb.scorecardresearch.com/p?c1=2&c2=16833363&cv=2.0&cj=1" />
</noscript>
<!-- End comScore Tag -->
</head>
<body id="imgs">
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-1 col-lg-1 col-sm-3 col-xs-3">
					<img class="img-responsive" src="https://images.dinamani.com/images/FrontEnd/images/group.jpg">
				</div>
				<div class="col-md-8 col-lg-8 col-sm-9 col-xs-9 text-center">
					<a href="https://www.dinamani.com/" rel="nofollow" target="_blank"><img src="<?php echo image_url; ?>special_page/DIN-CRES-small.png"> </a>
				</div>
				<div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
					<a class="fb" href="http://www.facebook.com/DinamaniDaily" rel="nofollow" target="_blank"><i class="fa fa-facebook"></i></a>  <a class="twit" href="http://twitter.com/DinamaniDaily" rel="nofollow" target="_blank"><i class="fa fa-twitter"></i></a>
					<a class="android" href="https://play.google.com/store/apps/details?id=com.dinamani.news&amp;hl=en" rel="nofollow" target="_blank"><i class="fa fa fa-android"></i></a>
					<a class="apple" href="https://itunes.apple.com/in/app/dinamani-tamil-news/id1244532821?mt=8" rel="nofollow" target="_blank"><i class="fa fa-apple"></i></a>
					<img class="uc_logo" src="<?php echo image_url; ?>special_page/ucbrowser.png">
				</div>
			</div>
		</div>
		
	</header>
	
	<section>
		<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<img src="<?php echo image_url; ?>special_page/tamilnadu-state-election-banner2.jpg" class="img-responsive banner-img">
			</div>
		</div>
		<div class="row" style="margin-bottom:1%;">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			</div>
		</div>
		<?php
		$i=1;
		$m=1;
		$domain_name = BASEURL;
		$logo_prefix= 'nie';
		foreach($data as $article){
			$display_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $article->title);
			$summary = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $article->summary_html);
			$live_article_url = $domain_name. $article->url;
			$original_image_path = $article->article_page_image_path;
			if($original_image_path !='' && get_image_source($original_image_path, 1))
			{
				$imagedetails = get_image_source($original_image_path, 2);
				$imagewidth = $imagedetails[0];
				$imageheight = $imagedetails[1];	
				$Image600X390 	= str_replace("original","w600X390", $original_image_path);
				$show_image = image_url. imagelibrary_image_path . $Image600X390;
				
			}else{
				$show_image	= image_url. imagelibrary_image_path.'logo/'.$logo_prefix.'_logo_600X390.jpg';
			}
			if(strlen($summary) > 100){
				$description = mb_substr($summary , 0 ,97).'...';
			}else{
				$description =$summary;
			}
			
			if($m==1){
				echo '<div class="row block-img1">';
					echo '<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
						echo '<div class="hovereffect">';
							echo '<a target="_BLANK" href="https://www.dinamani.com/live/2020/feb/14/live-updates-tamilnadu-budget-3357494.html"><img class="img-responsive" src="https://images.dinamani.com/uploads/user/imagelibrary/2019/7/20/w600X390/ops3.jpg" alt="ops3" title=""></a>';
							echo ' <div class="overlay ts">';
								echo '<h2><a target="_BLANK" href="https://www.dinamani.com/live/2020/feb/14/live-updates-tamilnadu-budget-3357494.html">தமிழக பட்ஜெட்: முக்கிய அம்சங்கள் உடனுக்குடன்</a></h2>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
					echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">';
					echo '<h5 class="t1">Highlights</h5>';
						echo '<div class="container1 scroll-static"></div>';
					echo '</div>';
				echo '</div>';
			}
			if($i==1){
					echo '<div class="row block-img">';
				}
				echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">';
				echo '<div class="hovereffect">';
				echo '<a target="_BLANK" href="'.$live_article_url.'"><img class="img-responsive" src="'.$show_image.'" alt="'.$article->article_page_image_alt.'" title="'.$article->article_page_image_title.'"></a>';
				echo ' <div class="overlay">';
				echo '<h2><a target="_BLANK" href="'.$live_article_url.'">'.$display_title.'</a></h2>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
			
				if($i==3){
					echo '</div>';
					$i=1;
				}else{
					$i++;
				}
				$m++;
			
		}
		?> 
		<div class="pagination">
			<?php echo $pagination; ?>
		</div>
		</div>
	</section>
	<footer class="text-center">
		<p><b>Copyright - dinamani.com <?php echo date('Y');?></a></p>
		<p> <a class="AllTopic" href="http://www.newindianexpress.com/" rel="nofollow" target="_blank">The New Indian Express | </a> <a class="AllTopic" href="http://www.kannadaprabha.com" rel="nofollow" target="_blank">Kannada Prabha | </a>  <a class="AllTopic" href="http://www.samakalikamalayalam.com/" rel="nofollow" target="_blank">Samakalika Malayalam | </a><a class="AllTopic" href="http://www.indulgexpress.com" rel="nofollow" target="_blank">Indulgexpress  | </a>  <a class="AllTopic" href="http://www.edexlive.com" rel="nofollow" target="_blank">Edex Live  | </a> <a class="AllTopic" href="http://www.cinemaexpress.com" rel="nofollow" target="_blank">Cinema Express | </a> <a class="AllTopic" href="http://www.eventxpress.com" rel="nofollow" target="_blank">Event Xpress  </a></p>
		<p> <a class="AllTopic" href="https://www.dinamani.com/Contact-Us">Contact Us | </a> <a class="AllTopic" href="https://www.dinamani.com/About-Us">About Us | </a> <a class="AllTopic" href="https://www.dinamani.com/Privacy-Policy">Privacy Policy | </a> <a class="AllTopic" href="https://www.dinamani.com/Terms-of-Use">Terms of Use | </a> <a class="AllTopic" href="https://www.dinamani.com/Advertise-With-Us">Advertise With Us </a></p>
		<p> <a class="AllTopic" href="https://www.dinamani.com/">முகப்பு | </a>  <a class="AllTopic" href="https://www.dinamani.com/latest-news">தற்போதைய செய்திகள் | </a> <a class="AllTopic" href="https://www.dinamani.com/Sports">விளையாட்டு | </a> <a class="AllTopic" href="https://www.dinamani.com/health">மருத்துவம் | </a> <a class="AllTopic" href="https://www.dinamani.com/Cinema">சினிமா |  </a> <a class="AllTopic" href="https://www.dinamani.com/lifestyle">லைஃப்ஸ்டைல் </a></p>
	</footer>
	<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
				type:'post',
				cache:false,
				url:'<?php print BASEURL ?>user/scroll_data/render_news',
				success:function(result){
					$('.container1').html(result);
						 $(".container1").scrollText({
							'duration': 3000,
							'ulheight': $('.scroll-static-<?php echo $widget_instance_id ?>').find('ul').eq(0).height()
						}); 
				}
			
			});
			$(document).on('click','.custom_social',function(){
				var url= encodeURIComponent("<?php echo BASEURL.uri_string();?>");
				var text=encodeURIComponent($(this).parents('.date-color').next('.content-color').text());
				$(".fb_share").attr("href", "https://www.facebook.com/sharer/sharer.php?u="+url+'&title='+text);
				$(".twitter_share").attr("href", "https://twitter.com/intent/tweet?text="+ url+'  '+ text+'via @DINAMANI');
			});
		});
		 
	</script>
</body>
</html>   
 