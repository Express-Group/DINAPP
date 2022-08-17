<!doctype HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="நம்பிக்கை நட்சத்திரங்கள்  ,  குழந்தைகள் நாள் சிறப்புப் பக்கம் , Children's day , dinamani ,  தினமணி" >
		<meta property="og:title" content="<?php echo $title; ?>" >
		<meta property="og:description" content="<?php echo $title; ?>">
		<meta property="og:image" content="https://images.dinamani.com/images/static_img/childrensday-mp.jpg">
		<meta property="og:url" content="<?php echo BASEURL; ?>special-page/childrens_day">
		<meta name="twitter:image:src" content="https://images.dinamani.com/images/static_img/childrensday-mp.jpg">
		<meta name="twitter:url" content="<?php echo BASEURL; ?>special-page/childrens_day">
		<title><?php echo $title; ?></title>
		<link rel="shortcut icon" href="<?php echo image_url; ?>images/FrontEnd/images/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo image_url; ?>special_page/css/font-awesome.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Mukta+Malar:wght@700&display=swap');			
			body{font-family: 'Mukta Malar', sans-serif;background: url(<?php echo image_url; ?>special_page/cdbg.jpg);}
			header , section , footer{float:left;width:100%;}
			header{border-bottom: 5px solid #2d7187;}
			header p{margin: 0;background: #29a9b7;color: #fff;text-align: center;padding: 5px 0 5px;border-bottom: 5px solid #fff;}
			header p a{color:#fff !important;}
			header img{width:100%;}
			.inner-wrapper{width:100%;float:left;background: #29a9b7;padding: 1.2rem;border-radius: 2rem 0 2rem 0;/* position: relative; */}
			.inner-wrapper .border-img{position: absolute;top: -25%;left: 6%;z-index: -1;}
			.inner-wrapper h5{text-align:center;color:#fff;}
			.inner-wrapper a{text-decoration:none;}
			.mt-9{margin-top:9rem;}
			.page-link { position: relative; display: block; padding: .5rem .75rem; margin-left: -1px; line-height: 1.25;    color: white; background-color: #29a9b7; border-radius: 5px;border-width: 2px; border-color: #29a9b7;}
			.pagination li{margin-right:7px;}
			.page-link:hover  ,li a.active { z-index: 2; color: #29a9b7; text-decoration: none; background-color: #fff;    border-color: #29a9b7; border-width: 2px;}
			.page-link:focus { z-index: 3; outline: 0; box-shadow: 0 0 0 transparent}
			footer{border-top: 5px solid #fff;background:#29a9b7;color:#fff;}
			footer a{color:#fff !important;text-decoration:none;}
			@media only screen and (min-width: 992px) and (max-width: 1199px){
				.inner-wrapper .border-img{left: 0;}	
			}
			@media screen and (max-width: 768px){
				.mt-9{margin-top:0rem;}
				.inner-wrapper ,header{margin-bottom: 8rem;}
				.pt-mob-5{padding-top:0 !important;}
				.inner-wrapper .border-img{top: -20%;}
			}
		</style>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-2311935-31"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		  gtag('config', 'UA-2311935-31');
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
	<body>
		<header>
			<p><a href="<?php echo BASEURL; ?>"><i class="fa fa-angle-double-left"></i> முகப்பு</a></p>
			<img src="<?php echo image_url; ?>special_page/childernsday-banner.jpg">
		</header>
		<section>
			<div class="container">
				<?php
				$i=1;
				if(count($data) > 0):
				foreach($data as $article){
					$title = strip_tags($article->title);
					$image = image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
					$img_caption = 'Dinamani_caption';
					$img_alt = 'Dinamani_alt';
					if($article->article_page_image_path!=''){
						$Image600X390 	= str_replace("original","w600X390", $article->article_page_image_path);
						$image = image_url. imagelibrary_image_path . $Image600X390;
						$img_caption = $article->article_page_image_title;
						$img_alt = $article->article_page_image_alt;	
					}
					if($i==1){
						echo '<div class="row mt-9">';
					}
					echo '<div class="col-sm-12 col-xs-4 col-md-4 col-lg-4 col-xs-12 col-12">';
					echo '<div class="inner-wrapper">';
					echo '<img src="'.image_url.'special_page/border1.png" class="border-img">';
					echo '<a href="'.BASEURL.$article->url.'" target="_BLANK">';
					echo '<img src="'.$image.'" class="img-fluid" style="width:100%;border:3px solid #fff;" alt="'.$img_alt.'" title="'.$img_caption.'">';
					echo '<h5 class="mt-2">'.$title.'</h5>';
					echo '</a>';
					echo '</div>';
					echo '</div>';
					if($i==3){
						echo '</div>';
						$i=1;
					}else{
						$i++;
					}
				}
				if($i!=1){
					echo '</div>';
				}
				endif;
				?>
				<div class="row- pt-5 pt-mob-5">
				 <?php echo str_replace('<a href=' , '<a class="page-link" href=' , $pagination); ?>
				</div>
			</div>
		</section>
	<footer class="mt-3 pt-3 text-center">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<p>&copy; Copyright <?php echo date('Y'); ?> Dinamani. All rights reserved.</p>
					<p> <a href="http://www.newindianexpress.com/" rel="nofollow" target="_blank">The New Indian Express | </a> <a href="http://www.kannadaprabha.com" rel="nofollow" target="_blank">Kannada Prabha | </a>  <a href="http://www.samakalikamalayalam.com/" rel="nofollow" target="_blank">Samakalika Malayalam | </a><a href="http://www.indulgexpress.com" rel="nofollow" target="_blank">Indulgexpress  | </a>  <a href="http://www.edexlive.com" rel="nofollow" target="_blank">Edex Live  | </a> <a href="http://www.cinemaexpress.com" rel="nofollow" target="_blank">Cinema Express | </a> <a href="http://www.eventxpress.com" rel="nofollow" target="_blank">Event Xpress  </a></p>
					<p> <a href="https://www.dinamani.com/Contact-Us">Contact Us | </a> <a href="https://www.dinamani.com/About-Us">About Us | </a> <a href="https://www.dinamani.com/Privacy-Policy">Privacy Policy | </a> <a href="https://www.dinamani.com/Terms-of-Use">Terms of Use | </a> <a href="https://www.dinamani.com/Advertise-With-Us">Advertise With Us </a></p>
					<p> <a href="https://www.dinamani.com/">முகப்பு | </a>  <a href="https://www.dinamani.com/latest-news">தற்போதைய செய்திகள் | </a> <a href="https://www.dinamani.com/Sports">விளையாட்டு | </a> <a href="https://www.dinamani.com/health">மருத்துவம் | </a> <a href="https://www.dinamani.com/Cinema">சினிமா |  </a> <a href="https://www.dinamani.com/lifestyle">லைஃப்ஸ்டைல் </a></p>
				</div>
			</div>
		<div>
		
	</footer>
</body>
</html> 
 