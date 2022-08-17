<?php
$BaseUrl = base_url();
?>
<!doctype html>
<html amp>
	<head>
		<meta charset="utf-8">
		<title>404</title>
		<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
		<script async src="https://cdn.ampproject.org/v0.js"></script>
		<script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
		<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
		<script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
		<script async custom-element="amp-selector" src="https://cdn.ampproject.org/v0/amp-selector-0.1.js"></script>
		<script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
		<script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
		<script async custom-element="amp-accordion" src="https://cdn.ampproject.org/v0/amp-accordion-0.1.js"></script>
		<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script> 
		<script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
		 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
		 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
		 <link href="https://fonts.googleapis.com/css?family=Meera+Inimai" rel="stylesheet">
		<link rel="canonical" href="http://www.dinamani.com/<?php echo $this->uri->uri_string(); ?>">
		<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
		<style amp-custom>
			.ampTabContainer {display: flex;flex-wrap: wrap;}  
			.tabButton[selected] { outline: none;background: #ccc;}
			.tabButton {list-style: none;flex-grow: 1; text-align: center;   cursor: pointer;}
			.tabContent {display: none;width: 100%;order: 1;border:none;border-top: 1px solid #eee;}
			.tabButton[selected]+.tabContent {display: block;}
			amp-selector [option][selected]{border-top: 1px solid #eee;   border-right: 1px solid #eee;border-left: 1px solid #eee;   background: #eee;outline:none;color: #E91E63;}
			amp-selector [option]{font-size: 11px;padding: 5px;font-weight:bold;}
			/* @font-face {
				font-family: "Panchali";
				src: url("<?php echo $BaseUrl; ?>assets/fonts/ELANGO-TML-Panchali-Normal.ttf");
			} */
			body{background: #f7f7f7; /* font-family: "Panchali", serif; */font-family: 'Meera Inimai', sans-serif;line-height:1.3}
			.header{width: 97%;float: left;background: #fff;padding: 5px;box-shadow: 1px 1px 12px rgba(0, 0, 0, .24);padding-bottom: 1px;}
			.menu{width:30%;float:right;text-align: right;margin-top: 4px;}
			.socialicons{width:70%;float:right;text-align:right;}
			.menu button{font-size: 25px;border: none;color: #136e9e;color: #7d7b7c;background: transparent;}
			#sidebar{background:#fff;}
			#sidebar ul,.close-icon{width: 93%;float: left;padding: 0;padding: 9px;    margin-top: 0;}
			.close-icon{float:right;text-align: right;padding-bottom: 0;}
			.close-icon i{color: #797878;}
			#sidebar ul li{margin-bottom: 5px;padding-bottom: 7px;font-size: 13px;border-bottom: 1px solid #c4c4c44a;}
			#sidebar ul li a{text-decoration: none;color: #8c8585;font-weight: 700;}
			#sidebar ul li a i{color: #d00a0a;}
			.section{/* box-shadow: 1px 1px 12px rgba(0, 0, 0, .24); */width: 90%;float: left; margin: 4%;background: #fff;padding: 1%;}
			.image,.article,.article-title{width:100%;float:left;}
			.article-title{margin:5px 5px 7px;width: 97%;}
			.article-title a{font-size: 15px;text-decoration: none;color: #000;}
			.article-date{width: 100%;float: left;margin: 0 5px 0;font-size: 10px;color: #b5b3b3;}
			.article-summary{width: 97%;float: left;margin: 5px;font-size: 12px;    color: #797777;}
			.main-wrapper{width: 100%;float: left;padding-bottom: 8px;border-bottom: 1px solid #ddd;padding-top: 8px;}
			.image-25{width: 20%;float: left;}
			.article-75{width: 78%;float: left;padding-left: 2%;}
			.article-75 a{text-decoration: none;font-size: 13px;color: #545050;}
			.article-heading{box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.29), 0 4px 20px 0 rgba(0,0,0,0.19);background: radial-gradient(circle, #dc4e41 0%, #24191d 100%);border-bottom-left-radius: 32px;border-top-right-radius: 32px;color: #fff;padding: 7px 23px 7px;float: left;margin-bottom: 5px;    margin-top: 10px;font-size: 10px;margin-left: 2%;}
			.article-heading a{color:#fff;text-decoration:none;}
			.articlelink{text-decoration: none;font-size: 13px;color: #545050;display:flex;}
			.articlelink i{font-size: 13px;margin-right: 4px;padding-left: 4px;color: #3b5998;font-weight: bold;}
			.position-relative{position:relative;}
			.position-relative .article{position: absolute;bottom: 8px;background: #1010107a;}
			.position-relative .article a{color:#fff;font-size:11px;}
			.slider-custom{width:100%;float:left;}
			.slider-custom .caption{position: absolute;bottom: 0;left: 0;right: 0;    padding: 8px;background: rgba(0, 0, 0, 0.6);color: #ddd;  font-size: smaller;max-height: 30%;}
			.slider-custom .caption a{color:#fff;text-decoration:none;}
			.ampTabContainer,amp-accordion{width:100%;float:left;}
			amp-accordion{margin-top: 3%;}
			amp-accordion section h4{padding: 5px;border: none; background-color: #ebebeb;font-size: 12px;}
			.double{float:left;width:100%;}
			.double .article-title a{font-size:10px;}
			.double .main-wrapper-parent .main-wrapper{width:49%;border:none;}
			.main-wrapper-parent{float:left;width:100%;}
			.double .main-wrapper-parent .main-wrapper:first-child{margin-right:1%;}
			.double .main-wrapper-parent .main-wrapper:first-last{margin-left:1%;}
			.position-relative .fa-video-camera , .position-relative .fa-image{position: absolute;top: 3px;left: 3px;color: #fff;padding: 5px 5px 5px;border-radius: 50%;font-size: 9px;background:red;}
			.logo{width:50%;float:left;margin-left: -22px;}
			.box-shaodow-none{box-shadow: none;margin-top: 1px;}
			.time{float:left;width:30%;}
			.time span{font-size: 11px;color: #aba7a6;float:left;width:100%;margin-left: 10px;margin-bottom: 2px;}
			.footer{background: #505050;color: #55acee;float: left;font-size: 13px;font-family:Oswald;padding: 3%;}
			.footer_copyright{text-align: center;float: center;width: 100%;margin-top: 4px;}
			.footer a{text-decoration: none;color: #ccc;}
			.pagination{float: left;width: 98%;padding: 10px 5px 10px;text-align: center;}
			.pagination a , .pagination strong{background: #bfbaba;padding: 4px 6px 4px;  color: #000;text-decoration: none;margin-right: 5px;font-size: 12px;border-radius: 4px;}
			.pagination strong{background: #eee;color: #c71e1e;}
			.vimarsanam,.bg-eee{background: #eee;}
			.lifestyle-1:nth-child(odd){background: #e8f7fe;}
			.lifestyle-1:nth-child(even){background: #fee7e7;}
			.box-0{background: #e5f3fc;}
			.box-1{background: #e5e8fc;}
			.box-2{background: #fce5fc;}
			.box-3{background: #fbe7e8;}
			.religion{background: #ffc69c;}
			.panchangam{width:100%;float:left;background:rgba(115,195,236,.21);margin-top:2%;}
			.panchangam table{width: 96%;text-align: center;color: #000;float: left;}
			.panchangam h4{text-align: center;font-size: 15px;color: #FF5722;}
			.panchangam h2{text-align: center;font-size: 45px;margin: 10px 0 20px;}
			.tamil_year_month{float: left;width: 89%;padding-bottom: 7px;border-bottom: 1px solid #c5bbbb;text-align: center;}
			.panchangam-title{float: left;width: 89%;color: #4CAF50;margin-bottom: 5px;  margin-top: 5px;}
			.panchangam-answer{float: left;width: 89%;color: #000;margin-bottom: 5px;  margin-top: 5px;}
			.pan-question{background: #00bcd426;line-height: 1.5;}
			.pan-answer{font-size: 14px;color: #7b7979;line-height: 1.5;}
			.wrapper-author{width:100%;float:left;}
			.wrapper-author .image-25{margin:0 36%;}
			.author-name{float: left;width: 93%;text-align: center;font-size: 12px;margin: 10px 0 10px;color: #c8483d;}
			.author-details a{font-size: 14px;text-decoration: none;color: #000;font-weight: bold;}
			.author-details p{margin: 0;float: left;width: 100%;font-size: 11px;margin-top: 5px;line-height: 2;}
			.author-blue{background: #03a9f421;}
			.column_details{width:100%;float:left;}
			.column_details h4{font-size: 14px;text-align: center;color: #000;}
			.column_details p{margin: 0;padding: 5px;font-size: 11px;color: #8a8686;}
			.author-section h4{text-align: center;color: #811708;}
			.author-image{float: left;width: 36%;margin-right: 5px;}
			.author-description{font-size: 12px;line-height: 1.6;}
			.yean-jothidam-title p{text-align:center;margin:0;}
			.yean-jothidam-title p:first-child{margin-bottom: 3px;color: #1da1f2;}
			.text-center{text-align:center;color:red;}
			.yean-link{font-weight: bold;color: #3b5998;}
			.rasi-title{text-align: center;color: #ea4031;background: #e4e2e2;padding: 6%;}
			.justify{text-align:justify;}
			.justify-span span{width: 100%;float: left;margin: 10px;text-align: center;color: red;}
			.search{font-size:14px;}
			.search span{color: #dc4e41;}
			time{float: left;font-size: 9px;width: 100%;margin-top: 4px;color: #b7b2b2;}
			.new-tab-head{background: #a3433f;color: #fff;text-align: center;}
			.all-edition{text-align: center;padding-bottom: 5px;border-bottom: 1px solid #eee;}
			.all-edition a{text-decoration: none;color: #dc4e41;}
			.rasipalan-wrapper{width:50%;}
			.rasipalan-wrapper .article-75{margin-top:5px;}
			.rasipalan-general{text-align:justify;}
			.rasipalan-general strong{float: left;width: 100%;margin: 10px 0 10px;text-align: center;}
			.cname{color: #1da1f2;margin:10px 0 10px;}
			.cattr{font-weight:normal;margin:10px 0 10px;}
			.line{float: left;width: 100%;height: 1px;background: #e2dfdf;margin: 15px 0 15px;}
			.privacy-policy{float: left;width: 94%;margin-bottom: 12px;background: #eee;padding: 3%;}
			.found{color: #3b5998;font-size: 15px;}
			.found a{color: red;text-decoration:none;}
			</style>
	</head>
	<body>
		<amp-sidebar id="sidebar"  layout="nodisplay"  side="left">
		<div class="close-icon"><i tabindex="0" role="button" on="tap:sidebar.toggle" class="fa fa-times"></i></div>
		<ul>
			<li><a href="<?php echo $BaseUrl; ?>"><i class="fa fa-angle-right"></i> முகப்பு</a></li>
			<li><a href="<?php echo $BaseUrl.'latest-news'; ?>"><i class="fa fa-angle-right"></i> தற்போதைய செய்திகள்</a></li>
			<li><a href="<?php echo $BaseUrl.'sports'; ?>"><i class="fa fa-angle-right"></i> விளையாட்டு</a></li>
			<li><a href="<?php echo $BaseUrl.'cinema'; ?>"><i class="fa fa-angle-right"></i> சினிமா</a></li>
			<li><a href="<?php echo $BaseUrl.'health'; ?>"><i class="fa fa-angle-right"></i> மருத்துவம்</a></li>
			<li><a href="<?php echo $BaseUrl.'lifestyle'; ?>"><i class="fa fa-angle-right"></i> லைஃப்ஸ்டைல்</a></li>
			<li><a href="<?php echo $BaseUrl.'religion'; ?>"><i class="fa fa-angle-right"></i> ஆன்மிகம்</a></li>
			<li><a href="<?php echo $BaseUrl.'astrology'; ?>"><i class="fa fa-angle-right"></i> ஜோதிடம்</a></li>
			<li><a href="<?php echo $BaseUrl.'junction'; ?>"><i class="fa fa-angle-right"></i> ஜங்ஷன்</a></li>
			<li><a href="<?php echo $BaseUrl.'education'; ?>"><i class="fa fa-angle-right"></i> கல்வி</a></li>
			<li><a href="<?php echo $BaseUrl.'employment'; ?>"><i class="fa fa-angle-right"></i> வேலைவாய்ப்பு</a></li>
			<li><a href="<?php echo $BaseUrl.'business'; ?>"><i class="fa fa-angle-right"></i> வர்த்தகம்</a></li>
			<li><a href="<?php echo $BaseUrl.'agriculture'; ?>"><i class="fa fa-angle-right"></i> விவசாயம்</a></li>
			<li><a href="<?php echo $BaseUrl.'automobiles'; ?>"><i class="fa fa-angle-right"></i> ஆட்டோமொபைல்ஸ்</a></li>
			<li><a href="<?php echo $BaseUrl.'travel'; ?>"><i class="fa fa-angle-right"></i> சுற்றுலா</a></li>
			<li><a href="<?php echo $BaseUrl.'editorial'; ?>"><i class="fa fa-angle-right"></i> தலையங்கம்</a></li>
			<li><a href="<?php echo $BaseUrl.'editorial-articles'; ?>"><i class="fa fa-angle-right"></i> கட்டுரைகள்</a></li>
			<li><a href="<?php echo $BaseUrl.'weekly-supplements'; ?>"><i class="fa fa-angle-right"></i> இதழ்கள்</a></li>
			<li><a href="<?php echo $BaseUrl.'all-editions'; ?>"><i class="fa fa-angle-right"></i> அனைத்துப் பதிப்புகள்</a></li>
		</ul>
		</amp-sidebar>
		<amp-analytics type="googleanalytics">
			<script type="application/json">
			{
				"vars": {
				"account": "UA-2311935-31"
				},
				"triggers": {
					"trackPageview": {
						"on": "visible",
						"request": "pageview"
					}
				}
			}
			</script>
		</amp-analytics>
		<section class="header">
			<div class="logo">
				<a href="<?php echo $BaseUrl; ?>"><amp-img src="<?php echo $BaseUrl.'assets/images/dinamani_logo.png'; ?>"  width="200"  height="51"  layout="responsive"  alt="Dinamani Logo"></amp-img></a>
			</div>
			<div class="menu"><button class="open_sidebar" on="tap:sidebar"><i class="fa fa-bars"></i></button>
			</div>
		</section>
		<section class="header box-shaodow-none">
			<?php
			$weeks = array("ஞாயிற்றுக்கிழமை","திங்கள்கிழமை","செவ்வாய்க்கிழமை","புதன்கிழமை","வியாழக்கிழமை","வெள்ளிக்கிழமை","சனிக்கிழமை");
			$month = array("ஜனவரி","பிப்ரவரி","மார்ச்","ஏப்ரல்","மே","ஜூன்","ஜூலை","ஆகஸ்ட்","செப்டம்பர்","அக்டோபர்","நவம்பர்","டிசம்பர்");
			$currentDate = date('Y-m-d');
			$monthindex = (int) date("m",strtotime($currentDate));
			$dateMonth = $month[$monthindex-1];
			$date = date("d",strtotime($currentDate));
			$Year = date("Y",strtotime($currentDate));
			$pubDate = $date.' '.$dateMonth.' '.$Year;
			$currentWeek = $weeks[date('N')];
			?>
			<div class="time">
				<span><?php echo $currentWeek; ?></span>
				<span><?php echo $pubDate; ?></span>
			</div>
			<div class="socialicons">
				<amp-social-share type="whatsapp" width="30" height="30"></amp-social-share>
				<amp-social-share width="30" height="30" type="facebook" data-param-app_id="254325784911610"></amp-social-share>
				<amp-social-share width="30" height="30" type="gplus"></amp-social-share>
				<amp-social-share width="30" height="30" type="twitter"></amp-social-share>
			</div>
		</section>
		<section class="section">
			<h2 class="text-center">மன்னிக்கவும்!</h2>
			<p class="found">நீங்கள் தேடிய பக்கம் கண்டடையப்படவில்லை; பக்கம் இல்லை அல்லது மாற்றலுக்கு உள்ளாகியிருக்கும்.</p>
			<p class="found">தயவுசெய்து நீங்கள் உள்ளீடு செய்த வலைத்தள முகவரியை சரிபார்க்கவும். அல்லது, இங்கே தரப்பட்டிருக்கும் தேடல் பெட்டியில் நீங்கள் தேட விரும்பும் சொல்லை உள்ளீடு செய்து தேடவும்.</p>
			<p class="found">இப்போதும் நீங்கள் தேட விரும்பும் பக்கத்தை அடைவதில் சிரமம் ஏற்பட்டால், தயவுசெய்து இங்கே <a href="<?php echo $BaseUrl; ?>">இங்கே சுட்டி</a> தினமணியின் முகப்புப் பக்கத்துக்குச் செல்லவும், அல்லது, <a href="<?php echo $BaseUrl.'contact-us'; ?>">இங்கே சுட்டி</a> தினமணி தொடர்புப் பக்கத்துக்குச் செல்லவும்.</p>
			<p class="found">தினமணி தளத்தைப் பார்வையிட்டதற்கு நன்றி. மீண்டும் தளத்துக்கு வருக!</p>
		</section>
		<section class="footer">
			<div class="footer_copyright">Copyrights Dinamani <?php echo date('Y'); ?></div>
				<div class="footer_copyright">
					<a href="http://www.newindianexpress.com/" target="_blank">Newindianexpress | </a><a href="http://www.kannadaprabha.com/" target="_blank">Kannada Prabha | </a><a href="http://www.samakalikamalayalam.com/" target="_blank">Samakalika Malayalam | </a><a href="http://www.malayalamvaarika.com/" target="_blank">Malayalam Vaarika  | </a><a href="http://www.indulgexpress.com/" target="_blank">Indulgexpress  | </a><a href="http://www.edexlive.com/" target="_blank">Edex Live  | </a><a href="http://www.cinemaexpress.com/" target="_blank">Cinema Express  | </a><a href="http://www.eventxpress.com/" target="_blank">Event Xpress </a>
				</div>
		</section>
		
	</body>
</html>