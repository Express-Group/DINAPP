<?php
$BaseUrl = base_url();
$published_date = date('dS  F Y h:i A' , strtotime($article[0]->publish_start_date));
$Updated_date = date('dS  F Y h:i A' , strtotime($article[0]->last_updated_on));
if($article[0]->article_page_image_path!=''){
	$scriptimg_path = image_url. imagelibrary_image_path . str_replace("original","w600X390", $article[0]->article_page_image_path);		
}else{
	$scriptimg_path	   = image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
}
?>
<!doctype html>
<html amp>
	<head>
		<meta charset="utf-8">
		<title><?php echo strip_tags($article[0]->meta_Title); ?> - Dinamani</title>
		<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
		<link rel="shortcut icon" href="<?php echo $BaseUrl.'assets/images/favicon.ico'; ?>" type="image/x-icon" />
		<script async src="https://cdn.ampproject.org/v0.js"></script>
		<script async custom-element="amp-lightbox" src="https://cdn.ampproject.org/v0/amp-lightbox-0.1.js"></script> 
		<script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
		<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
		<script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
		<script async custom-element="amp-selector" src="https://cdn.ampproject.org/v0/amp-selector-0.1.js"></script>
		<script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
		<script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
		<script async custom-element="amp-accordion" src="https://cdn.ampproject.org/v0/amp-accordion-0.1.js"></script>
		<script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
		<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script> 
		<script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
		<script async custom-element="amp-fx-flying-carpet" src="https://cdn.ampproject.org/v0/amp-fx-flying-carpet-0.1.js"></script>
		<script async custom-element="amp-twitter" src="https://cdn.ampproject.org/v0/amp-twitter-0.1.js"></script>	
		<script async custom-element="amp-instagram" src="https://cdn.ampproject.org/v0/amp-instagram-0.1.js"></script>


		 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
		 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
		 <link href="https://fonts.googleapis.com/css?family=Meera+Inimai" rel="stylesheet">
		<link rel="canonical" href="https://www.dinamani.com/<?php echo $article[0]->url; ?>">
		<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
		<script type="application/ld+json">
			{
				"@context": "http:\/\/schema.org",
				"@type": "NewsArticle",
				"mainEntityOfPage": {
					"@type": "WebPage",
						"@id": "https://www.dinamani.com/<?php echo $article[0]->url; ?>"
				},
				"headline": "<?php echo strip_tags($article[0]->title); ?>",
				"description": "<?php echo strip_tags($article[0]->summary_html); ?>",
				"datePublished": "<?php echo $published_date; ?>",
				"dateModified": "<?php echo $Updated_date; ?>",
				"publisher": {
					"@type": "Organization",
					"name": "Dinamani",
					"logo": {
						"@type": "ImageObject",
						"url": "https://images.dinamani.com/images/FrontEnd/images/dmlogo1.jpg",
						"width": "268",
						"height": "108"
					}
				},
				"image": {
					"@type": "ImageObject",
					"url": "<?php echo $scriptimg_path; ?>",
					"width": "600",
					"height": "390"
				}	
			}		
		</script>

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
			.section{/* box-shadow: 1px 1px 12px rgba(0, 0, 0, .24); */width: 94%;float: left; margin: 2%;background: #fff;padding: 1%;}
			.article-title{width:100%;float:left;font-size: 19px;line-height: 1.5;color: #5d5959;margin-bottom: 10px;}
			.ampTabContainer,amp-accordion{width:100%;float:left;}
			amp-accordion{margin-top: 3%;}
			amp-accordion section h4{padding: 5px;border: none; background-color: #ebebeb;font-size: 12px;}
			.logo{width:50%;float:left;margin-left: -22px;}
			.box-shaodow-none{box-shadow: none;margin-top: 15%;}
			.time{float:left;width:30%;}
			.time span{font-size: 11px;color: #aba7a6;float:left;width:100%;margin-left: 10px;margin-bottom: 2px;}
			.footer{background: #505050;color: #55acee;float: left;font-size: 13px;font-family:Oswald;padding: 3%;}
			.footer_copyright{text-align: center;float: center;width: 100%;margin-top: 4px;}
			.footer a{text-decoration: none;color: #ccc;}
			.author{float: left;width: 100%;font-size: 12px; color: #908c8c;}
			.socialicons-article{margin-top: 10px;float:left;width:100%;margin-bottom:10px;}
			.articleImageContainer{width:100%;float:left;margin:0 0 15px;position:relative;}
			figcaption {font-size: 11px;padding: 5px;background: rgba(158, 158, 158, 0.31);}
			.article-content{float:left;width:98%;line-height: 1.5;font-size: 14px;padding: 3px;padding-bottom: 3px;border-bottom: 1px solid #f1efef;margin-bottom: 14px;}
			.article-content{text-align:justify;}
			.tags{width:100%;float:left;padding-bottom: 3px;border-bottom: 1px solid #f1efef;  margin-bottom: 14px;}
			.tag_heading{float:left;}
			.tag_element{margin-left: 8px; background: #ddd; padding: 3px 13px 3px;    border-radius: 12px; float: left;margin-bottom: 6px;}
			.tag_element, .tag_element:active, .tag_element:focus, .tag_element:hover{text-decoration: none;color: #847f7f;font-size: 12px;}
			/* .article-heading{box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.29), 0 4px 20px 0 rgba(0,0,0,0.19);background: radial-gradient(circle, #dc4e41 0%, #24191d 100%);border-bottom-left-radius: 32px;border-top-right-radius: 32px;color: #fff;padding: 7px 23px 7px;float: left;margin-bottom: 5px;    margin-top: 10px;font-size: 10px;margin-left: 2%;} */
			.article-heading{border: 2px solid #1a368c;color: #084389;padding: 7px 9px 7px;float: left;    margin-bottom: 5px;margin-top: 10px;font-size: 14px;margin-left: 2%;border-radius: 9px;}
			.article-heading:after{content: "\f0da";position: relative;left: 5px;bottom: -2px;display: inline-block;font: normal normal normal 14px/1 FontAwesome;font-size: 17px;text-rendering: auto;-webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; color: #1a3066;}
			.article-heading a{color: #084389;text-decoration: none;}
			.main-wrapper{width: 100%;float: left;padding-bottom: 8px;border-bottom: 1px solid #ddd;padding-top: 8px;}
			.image-25{width: 20%;float: left;}
			.article-75{width: 78%;float: left;padding-left: 2%;}
			.article-75 a{text-decoration: none;font-size: 13px;color: #545050;}
			.position-relative{position:relative;}
			.position-relative .fa-video-camera,.position-relative .fa-image{position: absolute;top: 3px;left: 3px;color: #fff;padding: 5px 5px 5px;border-radius: 50%;font-size: 9px;background:red;}
			.socialicons-article  amp-social-share{border-radius: 50%;background-size: 59%;}
			.slider-custom{width:100%;float:left;}
			.slider-custom .caption{position: absolute;bottom: 0;left: 0;right: 0;    padding: 8px;background: rgba(0, 0, 0, 0.6);color: #ddd;  font-size: smaller;max-height: 30%;}
			.logo-fixed{position: fixed;box-shadow: none;z-index: 99999;}
			 .amp-flying-carpet-text-border{width: 100%;text-align: center;   background: #000;color: #fff;font-size: 12px;padding: 2px 0px;display: table;}
			 .advs{margin:0 auto;}
			 .t1{color:blue;font-size:16px;font-weight:bold;width:100%;float:left;text-align:center;text-decoration:none;}
			 .twitter-tweet{margin:0;}
			 .articleImageContainer amp-img{border-top-left-radius: 8px;border-top-right-radius: 8px;}
			.articleImageContainer figcaption{border-bottom-left-radius: 8px;border-bottom-right-radius: 8px;}
			.gallery-count{position: absolute;color: #fff;top: 6px;left: 5px;padding: 2px 8px 2px;font-size: 12px;}
			.gallery-count b{font-size: 22px;}
			.img-border-s{border-bottom-left-radius: 8px;border-bottom-right-radius: 8px;}
		</style>
	</head>
	<body>
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
		
		<section class="header logo-fixed">
			<div class="logo">
				<a href="<?php echo $BaseUrl; ?>"><amp-img src="<?php echo image_url.'images/FrontEnd/images/dinamani_mlogo.png'; ?>"  width="200"  height="51"  layout="responsive"  alt="Dinamani Logo"></amp-img></a>
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
				<amp-social-share width="30" height="30" type="facebook" data-param-app_id="2107495602843323"></amp-social-share>
				<amp-social-share width="30" height="30" type="gplus"></amp-social-share>
				<amp-social-share width="30" height="30" type="twitter"></amp-social-share>
			</div>
		</section>
		<section class="section"><amp-ad width=336 height=280 data-multi-size="300x250" type="doubleclick"  data-slot="/1009127/Dinamani_AMP_TOP_300x250"></amp-ad></section>
		<section class="section">
		<?php
			if($contenttype==1){
				$published_date = date('dS  F Y h:i A' , strtotime($article[0]->publish_start_date));
				if ($article[0]->article_page_image_path != '' && getimagesize(image_url_no . imagelibrary_image_path . $article[0]->article_page_image_path)){
					$imagedetails = getimagesize(image_url_no . imagelibrary_image_path.$article[0]->article_page_image_path);
						$imagewidth   = $imagedetails[0];
						$imageheight  = $imagedetails[1];
						if ($imageheight > $imagewidth){
						$Image 	= $article[0]->article_page_image_path;
					}else{				
						$Image 	= str_replace("original","w600X390", $article[0]->article_page_image_path);
					}
				$image_path = '';
				$image_path = image_url. imagelibrary_image_path . $Image;
				}else{
					$image_path	   = image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
					$imagewidth   = 600;
					$imageheight  = 390;
					$image_caption = '';	
				}
				?>
				<h4 class="article-title"><?php echo strip_tags($article[0]->title) ?></h4>
				<div class="author">
				<?php 
				if($article[0]->author_name!=''){
					echo '<span class="author-details">By '.$article[0]->author_name.'| </span>';
				}
				if($article[0]->agency_name!=''){
					echo '<span class="author-details">'.$article[0]->agency_name.' |</span>';
				}
				echo ' <span class="author-details">Published: '.$published_date.'</span>';
				?>
				</div>
				<div class="socialicons-article">
					<amp-social-share type="email" width="35" height="33" class="social-icons"></amp-social-share> 
					<amp-social-share type="facebook" data-param-app_id="2107495602843323" width="35" height="33" class="social-icons"></amp-social-share> <amp-social-share type="gplus" width="35" height="33" class="social-icons"></amp-social-share> 
					<amp-social-share type="twitter" width="35" height="33" class="social-icons"></amp-social-share>
				</div>
				<figure class="articleImageContainer">
					<amp-img  role="button" tabindex="0" src="<?php print $image_path; ?>" width=320 height=200 layout="responsive"></amp-img>
					<figcaption><?php echo $article[0]->article_page_image_title ?></figcaption>
				</figure>

				<amp-ad width=320 height=100 type="doubleclick" data-slot="/3167926/dnm_amp_art_320x100"></amp-ad>			
				
				<?php
				$Content= preg_replace('#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#', '\\1\\6', $article[0]->article_page_content_html);
				$Content=str_replace(['<img','</img>'],['<amp-img width="320" height="200" layout="responsive"','</amp-img'],$Content);
				$Content = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $Content);
				$Content = preg_replace('/(<[^>]+) onclick=".*?"/i', '$1', $Content);
				$Content = preg_replace('/<g[^>]*>/i', '', $Content);
				$Content = str_replace(['<pm.n>','<itc.ns>','</pm.n>','</itc.ns>'],'',$Content);
				$Content = str_replace(['<iframe allowtransparency="true"','</iframe>'] ,['<amp-iframe layout="responsive" sandbox="allow-scripts allow-same-origin allow-popups"','</amp-iframe>'],$Content);
				$Content = str_replace('<iframe' ,'<amp-iframe layout="responsive" sandbox="allow-scripts allow-same-origin allow-popups"',$Content);
				$Content = str_replace(['<script async="" src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>' ,'<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>','<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>' , '<script async="" src="//platform.instagram.com/en_US/embeds.js"></script>','<script async src="//www.instagram.com/embed.js">'] ,['','','' ,'' ,''],$Content);
				$html = new domDocument();
				$html->loadHTML('<?xml version="1.0" encoding="UTF-8"?>' . "\n" .$Content);
				$html->preserveWhiteSpace = false; 
				$twitter = $html->getElementsByTagName('blockquote');
				foreach ($twitter as $twitterTweet){
					$className = $twitterTweet->getAttribute('class');
					if($className=='twitter-tweet'){
						$aTag = $twitterTweet->getElementsByTagName('a');
						foreach($aTag as $TagId){
							$tweetId = $TagId->getAttribute('href');
							if($tweetId!=''){
								$ID = explode('?',substr($tweetId , strripos($tweetId ,'/') + 1 , strlen($tweetId)));
								$ID = $ID[0];
								if(is_numeric($ID)){
									$elementhtml = $html->saveHTML($twitterTweet);
									$titleNode = $html->createElement("amp-twitter");
									$titleNode->setAttribute('width','320');
									$titleNode->setAttribute('height','415');
									$titleNode->setAttribute('data-tweetid',$ID);
									$twitterTweet->nodeValue = '';
									$twitterTweet->appendChild($titleNode);
								}
								
							}
							
						}
					}else if($className=='instagram-media'){
						$instaId = explode('/' , str_replace('https://www.instagram.com/p/','',$twitterTweet->getAttribute('data-instgrm-permalink')));
						$instaId = $instaId[0];
						$titleNode = $html->createElement("amp-instagram");
						$titleNode->setAttribute('width','320');
						$titleNode->setAttribute('height','400');
						$titleNode->setAttribute('layout','responsive');
						$titleNode->setAttribute('data-shortcode',$instaId);
						$twitterTweet->nodeValue = '';
						$twitterTweet->appendChild($titleNode);
					}
				}
				$Content = $html->saveHTML();
				$Content = str_replace(['<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">' ,'<html><body>' , '</body></html>','<?xml version="1.0" encoding="UTF-8"?>'] ,['','','',''] , $Content);
				print '<div class="article-content">'.$Content.'<a href="http://campaign.bharatmatrimony.com/track/clicktrack.php?trackid=00100382015328" target="_blank" class="t1">திருமணம் ஆகாதவரா? இன்றே பதிவு செய்யுங்கள் தமிழ் மேட்ரிமோனியில் - பதிவு இலவசம்!</a> <amp-ad width=336 height=280  type="doubleclick" data-slot="/1009127/Dinamani_AMP_MID_300x250" data-multi-size="300x250"> </amp-ad> </div>';
				if($article[0]->tags!=''){
					$Tags=explode(',',$article[0]->tags);
					echo '<div class="tags">';
						echo '<a class="tag_heading"> Tags : </a>';
					for($i=0;$i<count($Tags);$i++):
						if($Tags[$i]!=''):
							$tag_title = join( "_",( explode(" ", trim($Tags[$i]) ) ) );
							$tag_url_title = preg_replace('[,]', '', $tag_title); 
							$TagUrl=$BaseUrl.'topic/'.$tag_url_title;
							echo '<a class="tag_element" href="'.$TagUrl.'">'.$Tags[$i].'</a>';
						endif;
					endfor;
					echo '</div>';
				}
			}else if($contenttype==3){
				$published_date = date('dS  F Y h:i A' , strtotime($article[0]->publish_start_date));
				?>
				<h4 class="article-title"><?php echo strip_tags($article[0]->title) ?></h4>
				<div class="author">
				<?php 
				if($article[0]->author_name!=''){
					echo '<span class="author-details">By '.$article[0]->author_name.'| </span>';
				}
				if($article[0]->agency_name!=''){
					echo '<span class="author-details">'.$article[0]->agency_name.' |</span>';
				}
				echo ' <span class="author-details">Published: '.$published_date.'</span>';
				?>
				</div>
				<div class="socialicons-article">
					<amp-social-share type="email" width="35" height="33" class="social-icons"></amp-social-share> 
					<amp-social-share type="facebook" data-param-app_id="2107495602843323" width="35" height="33" class="social-icons"></amp-social-share> <amp-social-share type="gplus" width="35" height="33" class="social-icons"></amp-social-share> 
					<amp-social-share type="twitter" width="35" height="33" class="social-icons"></amp-social-share>
				</div>
				<?php
				$Content= preg_replace('#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#', '\\1\\6', $article[0]->summary_html);
				$Content=str_replace(['<img','</img>'],['<amp-img width="320" height="200" layout="responsive"','</amp-img'],$Content);
				$Content = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $Content);
				$Content = preg_replace('/(<[^>]+) onclick=".*?"/i', '$1', $Content);
				$Content = preg_replace('/<g[^>]*>/i', '', $Content);
				$Content = str_replace(['<pm.n>','<itc.ns>','</pm.n>','</itc.ns>'],'',$Content);
				$Content = str_replace(['<iframe allowtransparency="true"','</iframe>'] ,['<amp-iframe layout="responsive" sandbox="allow-scripts allow-same-origin allow-popups"','</amp-iframe>'],$Content);
				$Content = str_replace('<iframe' ,'<amp-iframe layout="responsive" sandbox="allow-scripts allow-same-origin allow-popups"',$Content);
				$advcount=0;
				$galleryfullcount = count($gallert_images);
				echo '<div class="slider-custom">';
				//echo '<amp-carousel  id="carousel-with-carousel-preview"  layout="responsive"  height="300" width="500"  type="slides">';
				$i=1;
				foreach($gallert_images as $images):
					$imagewidth = 600;
					$imageheight = 390;
					$Image600X390= str_replace(' ', "%20",$images->gallery_image_path);
					if(getimagesize(image_url_no . imagelibrary_image_path . $Image600X390) && $Image600X390 != ''){
						$imagedetails = getimagesize(image_url_no . imagelibrary_image_path.$Image600X390);
						$imagewidth = $imagedetails[0];
						$imageheight = $imagedetails[1];
						$show_gallery_image = image_url. imagelibrary_image_path . $Image600X390;
					 }else{
						 $show_gallery_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
					 }
					$galleryImagePath = image_url. imagelibrary_image_path . $images->gallery_image_path;
					/* echo '<div class="slide">';
					echo '<amp-img src="'.$galleryImagePath.'" layout="fill" alt="'.$images->gallery_image_alt.'"></amp-img>';
					echo '<div class="caption">'.$images->gallery_image_title.'</div></div>'; */
					
					echo '<figure class="articleImageContainer">';
					echo '<amp-img '.(($images->gallery_image_title=='') ? ' class="img-border-s" ' : '').' tabindex="0" src="'.$show_gallery_image.'" width='.$imagewidth.' height='.$imageheight.' layout="responsive"></amp-img>';
					if($images->gallery_image_title!=''){
						echo '<figcaption>'.$images->gallery_image_title.'</figcaption>';
					}
					echo '<span class="gallery-count"><b>'.$i.'</b><span> / '.$galleryfullcount.'</span></span>';
					echo '</figure>';
					$i++;
				endforeach;
				//echo '</amp-carousel>';
				
				echo '</div>';
				echo '<div class="article-content">'.$Content.'<a href="http://campaign.bharatmatrimony.com/track/clicktrack.php?trackid=00100382015328" target="_blank" class="t1">திருமணம் ஆகாதவரா? இன்றே பதிவு செய்யுங்கள் தமிழ் மேட்ரிமோனியில் - பதிவு இலவசம்!</a><amp-ad width=336 height=280  data-multi-size="300x250" type="doubleclick"  data-slot="/1009127/Dinamani_AMP_TOP_300x250"> </amp-ad></div>';
				if($article[0]->tags!=''){
					$Tags=explode(',',$article[0]->tags);
					echo '<div class="tags">';
						echo '<a class="tag_heading"> Tags : </a>';
					for($i=0;$i<count($Tags);$i++):
						if($Tags[$i]!=''):
							$tag_title = join( "_",( explode(" ", trim($Tags[$i]) ) ) );
							$tag_url_title = preg_replace('[,]', '', $tag_title); 
							$TagUrl=$BaseUrl.'topic/'.$tag_url_title.'/gallery';
							echo '<a class="tag_element" href="'.$TagUrl.'">'.$Tags[$i].'</a>';
						endif;
					endfor;
					echo '</div>';
				}
			}else if($contenttype==4){
				$published_date = date('dS  F Y h:i A' , strtotime($article[0]->publish_start_date));
				?>
				<h4 class="article-title"><?php echo strip_tags($article[0]->title) ?></h4>
				<div class="author">
				<?php 
				if($article[0]->author_name!=''){
					echo '<span class="author-details">By '.$article[0]->author_name.'| </span>';
				}
				if($article[0]->agency_name!=''){
					echo '<span class="author-details">'.$article[0]->agency_name.' |</span>';
				}
				echo ' <span class="author-details">Published: '.$published_date.'</span>';
				?>
				</div>
				<div class="socialicons-article">
					<amp-social-share type="email" width="35" height="33" class="social-icons"></amp-social-share> 
					<amp-social-share type="facebook" data-param-app_id="2107495602843323" width="35" height="33" class="social-icons"></amp-social-share> <amp-social-share type="gplus" width="35" height="33" class="social-icons"></amp-social-share> 
					<amp-social-share type="twitter" width="35" height="33" class="social-icons"></amp-social-share>
				</div>
				<?php
				/* $Content= preg_replace('#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#', '\\1\\6', $article[0]->video_script);
				$Content=str_replace(['<img','</img>'],['<amp-img width="320" height="200" layout="responsive"','</amp-img'],$Content);
				$Content = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $Content);
				$Content = preg_replace('/(<[^>]+) width=".*?"/i', '$1', $Content);
				$Content = preg_replace('/(<[^>]+) onclick=".*?"/i', '$1', $Content);
				$Content = preg_replace('/<g[^>]*>/i', '', $Content);
				$Content = str_replace(['<pm.n>','<itc.ns>','</pm.n>','</itc.ns>'],'',$Content);
				$Content = str_replace(['<iframe allowtransparency="true"','</iframe>'] ,['<amp-iframe layout="responsive" sandbox="allow-scripts allow-same-origin allow-popups"','</amp-iframe>'],$Content);
				$Content = str_replace('<iframe' ,'<amp-iframe layout="responsive" sandbox="allow-scripts allow-same-origin allow-popups" width="500"',$Content); */
				$Content = htmlspecialchars_decode($article[0]->video_script)."<br>";
				echo '<div class="article-content">'.$Content.'<a href="http://campaign.bharatmatrimony.com/track/clicktrack.php?trackid=00100382015328" target="_blank" class="t1">திருமணம் ஆகாதவரா? இன்றே பதிவு செய்யுங்கள் தமிழ் மேட்ரிமோனியில் - பதிவு இலவசம்!</a><amp-ad width=336 height=280 type="doubleclick"  data-slot="/1009127/Dinamani_AMP_TOP_300x250" data-multi-size="300x250"></amp-ad></div>';
				if($article[0]->tags!=''){
					$Tags=explode(',',$article[0]->tags);
					echo '<div class="tags">';
						echo '<a class="tag_heading"> Tags : </a>';
					for($i=0;$i<count($Tags);$i++):
						if($Tags[$i]!=''):
							$tag_title = join( "_",( explode(" ", trim($Tags[$i]) ) ) );
							$tag_url_title = preg_replace('[,]', '', $tag_title); 
							$TagUrl=$BaseUrl.'topic/'.$tag_url_title.'/video';
							echo '<a class="tag_element" href="'.$TagUrl.'">'.$Tags[$i].'</a>';
						endif;
					endfor;
					echo '</div>';
				}
			}
			?>


			<amp-ad width=300 height=250   type="doubleclick"    data-slot="/3167926/dnm_amp_art_300x250_2"></amp-ad>
			
		</section>
		<?php if(count($more_articles) > 0):  ?>
		<section class="section">
			<h4 class="article-heading">More from the section</h4>
			<?php
			$template='';
			$m=1;
			foreach($more_articles as $more):
				$imagePath = $more->article_page_image_path;
				if($imagePath!=''){
					$imagePath = image_url. imagelibrary_image_path.str_replace('original/','w150X150/',$imagePath);
				}else{
					$imagePath	   = image_url. imagelibrary_image_path.'logo/dinamani_logo_150X150.jpg';
				}
				if($contenttype==3){
					$url = $BaseUrl.str_replace('.html','.amp',$more->url);
				}else{
					$url = $BaseUrl.$more->url;
				}
				
				$title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$more->title);
				$template .='<div class="main-wrapper">';
				$template .='<div class="image-25 position-relative"><a href="'.$url.'"><amp-img src="'.$imagePath.'"  width="150"  height="150"  layout="responsive"   alt="AMP"></amp-img> '.(($contenttype==4)? '<i class="fa fa-video-camera"></i>' : ' ').' '.(($contenttype==3)? '<i class="fa fa-image"></i>' : ' ').'</a></div>';
				$template .='<div class="article-75"><a href="'.$url.'">'.$title.'</a></div>';
				$template .='</div>';
				$m++;
			endforeach;
			echo $template;
			?>
		</section>
		<?php  endif; ?>
		<section class="section"><amp-ad width=300 height=250   type="doubleclick"    data-slot="/3167926/dnm_amp_art_300x250_3"></amp-ad></section>
		<section class="footer">
			<div class="footer_copyright">Copyrights Dinamani <?php echo date('Y'); ?></div>
				<div class="footer_copyright">
					<a href="http://www.newindianexpress.com/" target="_blank">Newindianexpress | </a><a href="http://www.kannadaprabha.com/" target="_blank">Kannada Prabha | </a><a href="http://www.samakalikamalayalam.com/" target="_blank">Samakalika Malayalam | </a><a href="http://www.malayalamvaarika.com/" target="_blank">Malayalam Vaarika  | </a><a href="http://www.indulgexpress.com/" target="_blank">Indulgexpress  | </a><a href="http://www.edexlive.com/" target="_blank">Edex Live  | </a><a href="http://www.cinemaexpress.com/" target="_blank">Cinema Express  | </a><a href="http://www.eventxpress.com/" target="_blank">Event Xpress </a>
				</div>
		</section>
		
	</body>
</html>