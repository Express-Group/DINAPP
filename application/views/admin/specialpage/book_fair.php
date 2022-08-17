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
   
  <style>
	@import url('https://fonts.googleapis.com/css?family=Pavanam&display=swap');
	@import url('https://fonts.googleapis.com/css?family=Oswald&display=swap');
	body{position: relative;margin: 0;padding: 0;color: #fff;font-size: 18px;font-weight: 400;overflow-x: hidden;		font-family: 'Pavanam', sans-serif;background: #fff;background-attachment:fixed;background-size: cover;}
	.header{border-bottom: 2px solid #ffcb05;padding: 0px 0 10px;background: url(https://images.dinamani.com/special_page/thinkedu-bg.jpg);margin-top: -1%;}
	section h2{margin: 0px 0 2px;font-size: 18px;line-height: 1.4;font-weight: 700;float: left;width: calc(100% - 146px);padding-left: 12px;}
	section h2 a{color: #000 !important;text-decoration:none !important;}
	section p{margin-left: calc(100% - 475px);font-size: 13px;color: #9f9f9f;margin-bottom: 4px;}
	section date{margin-left: calc(100% - 709px);float: left;font-size: 11px;color: red;}
	.pagination{width:100%;text-align:center;}
	.pagination a , .pagination strong{color: #fff;padding: 4px 11px 4px;background: #1e68be;font-size: 15px;		font-weight: bold;border: 1px solid #fff;border-radius: 5px;margin-right: 5px;}
	.pagination strong{background: transparent;color: #1e68be;border: 1px solid #1e68be;}
	footer{width:100%;background: url(https://images.dinamani.com/special_page/thinkedu-bg.jpg);color:#fff;font-size: 16px;margin-top: 2%;padding: 1%;border-top: 2px solid #ffcb05;}
	p.time{font-size: 12px;text-align: center;margin: 0 85px 0 0;font-weight: 700;}
	footer p a {color: #fff;}
	.live{width: 187px;border: none;margin-top: -52px;margin-bottom: -18px;margin-left: -50px;}
	.edu-img{ float: right;width: 28%;margin-right: 23%;display: block;margin-bottom: 13px;}
	.edu-img1{float: right;width: 37%;margin-right: 15px;display: inline-block;}
	.block-container img{width: 145px;float: left;border:1px solid #eee;}
	.block-container{float: left;width: 100%;margin-bottom: 12px;border-bottom: 1px solid #ffffff3b; padding-bottom: 8px;}
	.custom_heading{float:left;}
	.custom_heading img{float: left;width: 100px;border: 2px solid #fff;}
	.custom_heading span{color: #000;float: left;width: calc(100% - 110px);margin-left: 10px;font-weight: 700;   line-height: 1.5;font-size:16px;}
	.panel-default>.panel-heading{background-color: transparent;border-color: transparent;}
	.custom_heading span span{text-align: center;margin-left: 13%;margin-top: 14px;color: red;}
	.accordion_content p{float: left;margin-left: 0;color: #000;font-size: 17px;}
	.custom_heading a[aria-expanded="true"] span{color:red;}
	.custom_heading a[aria-expanded="true"] span span{display:none;}
	.social{width: 100%;float: right;text-align: right;margin-top: 21%;} 
	.social a{border: 2px solid #fff;margin-left: 12px;padding: 4px 10px 6px;border-radius: 50px;font-size: 20px;}
	.panel-default{border: 1px solid #eee;float: left;border-radius: 5px !important; box-shadow: 0px 0px 5px 1px #0000002e;}
	.ms{margin-bottom:15px;}
	.title-ls{border-top: 1px solid #eee;padding: 8px 0 8px;font-weight: 700;color: #fff;border-bottom: 1px solid #eee;
    margin-bottom: 23px;background: #0d3d89;}
	.din-logo{width: 66%;margin-top: 13%;}
	.header .col-md-6 img{width: 75%;margin-top: 5%;}
	@media only screen and (max-width: 768px){
		.edu-img1{width: 30%;}
		.edu-img{width: 34%;margin-right: 0px;}
		p.time{display:none;}
		.block-container img{width:100%;}
		section h2{width:100%;margin: 9px 0 5px;font-size: 17px;padding: 0;}
		section date{margin-left:0;}
		.custom_heading img{width: 81px;}
		.custom_heading span{font-size: 13px;}
		.panel-default{width:100%;margin-bottom:15px !important;}
		.android , .apple{display:none;}
		.social a{border: 1px solid #fff;margin-left: 0px;font-size: 8px;}
		.social .fb{padding: 2px 7px 4px !important;}
		.social .twit{padding: 3px 6px 4px !important;}
		.din-logo{width:100%;}
		.header .col-md-6 img{width: 100%;margin-top: 12%;}
	}
	
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
	<div class="bg-gif"></div>
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-lg-3 col-sm-4 col-xs-4">
					<a target="_BLANK" href="<?php echo base_url('/'); ?>"><img  class="img-responsive din-logo" src="<?php echo image_url; ?>special_page/dinamani-white-logo1.png"></a>
					<p class="time"><?php echo date('l, F d Y H:i A'); ?></p>
				</div>
				<div class="col-md-6 col-lg-6 col-sm-5 col-xs-5 text-center">
					<img style="display: inline-block;" class="img-responsive" src="<?php echo image_url; ?>special_page/book9.png">
				</div>
				<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 pull-right">
					<!--<img class="edu-img img-responsive" src="<?php echo image_url; ?>special_page/think-edu-TNIE-logo.png">-->
					<div class="social">
						<a style="color: #fff;background:#4672db;padding: 4px 13px 6px;" class="fb" href="http://www.facebook.com/DinamaniDaily" rel="nofollow" target="_blank"><i class="fa fa-facebook"></i></a>  
						<a style="color: #fff;background:#54bcf2;padding: 4px 9px 6px;" class="twit" href="http://twitter.com/DinamaniDaily" rel="nofollow" target="_blank"><i class="fa fa-twitter"></i></a>
						<a style="color: #fff;background:#999999;" class="android" href="https://play.google.com/store/apps/details?id=com.dinamani.news&amp;hl=en" rel="nofollow" target="_blank"><i class="fa fa fa-android"></i></a>
						<a style="color:#fff;background:#a4c639;" class="apple" href="https://itunes.apple.com/in/app/dinamani-tamil-news/id1244532821?mt=8" rel="nofollow" target="_blank"><i class="fa fa-apple"></i></a>
					</div>
				</div>
			</div>
		</div>
		
	</header>
	<?php if($type==1){ ?>
	<section>
		<div class="container-fluid">
		<div class="row" style="margin-bottom:2.5%;">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<h4 class="text-center title-ls">செய்திகள்</h4>
		<?php
		$i=1;
		$j=1;
		$domain_name = BASEURL;
		$logo_prefix= 'dinamani'; 
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
				$Image600X300 	= str_replace("original","w600X300", $original_image_path);
				$show_image1 = image_url. imagelibrary_image_path . $Image600X300;
				
			}else{
				$show_image1	= image_url. imagelibrary_image_path.'logo/'.$logo_prefix.'_logo_600X300.jpg';
			}
			if(strlen($summary) > 100){
				$description = mb_substr($summary , 0 ,97).'...';
			}else{
				$description =$summary;
			}
			echo '<div class="block-container">';
			echo '<a target="_BLANK" href="'.$live_article_url.'"><img class="img-responsive" src="'.$show_image1.'" alt="'.$article->article_page_image_alt.'" title="'.$article->article_page_image_title.'"></a>';
			echo '<h2><a href="'.$live_article_url.'">'.$display_title.'</a></h2>';
			//echo '<p>'.$description.'</p>';
			echo '<date>'.date('dS  F Y h:i A' , strtotime($article->publish_start_date)).'</date>';
			echo '</div>';
		}
		?> 
			<a class="pull-right" style="color:red;font-weight:700;" href="<?php echo base_url('special-page/bookfair/news'); ?>">மேலும்  <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<h4 class="text-center title-ls">பிரபலங்களுக்குப் பிடித்த புத்தகங்கள்</h4>
		<?php
		$i=1;
		$j=1;
		$domain_name = BASEURL;
		$logo_prefix= 'dinamani'; 
		foreach($celebrities as $article){
			$display_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $article->title);
			$summary = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $article->summary_html);
			$live_article_url = $domain_name. $article->url;
			$original_image_path = $article->article_page_image_path;
			if($original_image_path !='' && get_image_source($original_image_path, 1))
			{
				$imagedetails = get_image_source($original_image_path, 2);
				$imagewidth = $imagedetails[0];
				$imageheight = $imagedetails[1];	
				$Image600X300 	= str_replace("original","w600X300", $original_image_path);
				$show_image1 = image_url. imagelibrary_image_path . $Image600X300;
				
			}else{
				$show_image1	= image_url. imagelibrary_image_path.'logo/'.$logo_prefix.'_logo_600X300.jpg';
			}
			if(strlen($summary) > 100){
				$description = mb_substr($summary , 0 ,97).'...';
			}else{
				$description =$summary;
			}
			echo '<div class="block-container">';
			echo '<a target="_BLANK" href="'.$live_article_url.'"><img class="img-responsive" src="'.$show_image1.'" alt="'.$article->article_page_image_alt.'" title="'.$article->article_page_image_title.'"></a>';
			echo '<h2><a href="'.$live_article_url.'">'.$display_title.'</a></h2>';
			//echo '<p>'.$description.'</p>';
			echo '<date>'.date('dS  F Y h:i A' , strtotime($article->publish_start_date)).'</date>';
			echo '</div>';
		}
		?> 
			<a class="pull-right" style="color:red;font-weight:700;" href="<?php echo base_url('special-page/bookfair/celebrities-books'); ?>">மேலும்  <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
			</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
					<h4 class="text-center title-ls">அறிமுகம்</h4>
				</div>
			</div>
			<?php
				$m= $n=1;
				foreach($books as $book){
					if($m==1){
						echo '<div class="row ms">';
					}
					echo '<div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">';
					?>
					<div class="panel-group">
						<div class="panel panel-default">
							<div class="panel-heading custom_heading">
								<h4 style="text-align: left;">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $n; ?>">
										<img style="float:left;" src="<?php echo image_url.'uploads/scroll_news/'.$book->image; ?>">
										<span><?php echo $book->title; ?>
										<br>
										<span>மேலும்  <i class="fa fa-angle-double-down" aria-hidden="true"></i></span>
										</span>
									</a>
								</h4>
							</div>
							<div id="collapse<?php echo $n; ?>" class="panel-collapse collapse">
								<div class="panel-body">
									<div class="accordion_content">
									 <?php echo $book->content; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
					echo '</div>';
					if($m==4){
						echo '</div>';
						$m=1;
					}else{
						$m++;
					}
					$n++;
				}
			?>
			<div class="row">
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-right">
					<a style="color:red;font-weight:700;" href="<?php echo base_url('special-page/bookfair/arimukam'); ?>">மேலும்  <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
					<h4 class="text-center title-ls">புத்தகம் புதிது </h4>
					<?php
					foreach($vanavil as $article){
						$display_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $article->title);
						$summary = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $article->summary_html);
						$live_article_url = $domain_name. $article->url;
						$original_image_path = $article->article_page_image_path;
						if($original_image_path !='' && get_image_source($original_image_path, 1))
						{
							$imagedetails = get_image_source($original_image_path, 2);
							$imagewidth = $imagedetails[0];
							$imageheight = $imagedetails[1];	
							$Image600X300 	= str_replace("original","w600X300", $original_image_path);
							$show_image1 = image_url. imagelibrary_image_path . $Image600X300;
							
						}else{
							$show_image1	= image_url. imagelibrary_image_path.'logo/'.$logo_prefix.'_logo_600X300.jpg';
						}
						echo '<div class="block-container">';
						echo '<a target="_BLANK" href="'.$live_article_url.'"><img class="img-responsive" src="'.$show_image1.'" alt="'.$article->article_page_image_alt.'" title="'.$article->article_page_image_title.'"></a>';
						echo '<h2><a href="'.$live_article_url.'">'.$display_title.'</a></h2>';
						//echo '<p>'.$description.'</p>';
						//echo '<date>'.date('dS  F Y h:i A' , strtotime($article->publish_start_date)).'</date>';
						echo '</div>';
					}
					?>
					<a style="color:red;font-weight:700;float:right" href="<?php echo base_url('special-page/bookfair/vanavil'); ?>">மேலும்  <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
				</div>
				<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
					<h4 class="text-center title-ls">புத்தகக் காட்சி | வாசகர் கருத்து  </h4>
					<?php
					foreach($nenaipathu as $article){
						$display_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $article->title);
						$summary = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $article->summary_html);
						$live_article_url = $domain_name. $article->url;
						$original_image_path = $article->article_page_image_path;
						if($original_image_path !='' && get_image_source($original_image_path, 1))
						{
							$imagedetails = get_image_source($original_image_path, 2);
							$imagewidth = $imagedetails[0];
							$imageheight = $imagedetails[1];	
							$Image600X300 	= str_replace("original","w600X300", $original_image_path);
							$show_image1 = image_url. imagelibrary_image_path . $Image600X300;
							
						}else{
							$show_image1	= image_url. imagelibrary_image_path.'logo/'.$logo_prefix.'_logo_600X300.jpg';
						}
						echo '<div class="block-container">';
						echo '<a target="_BLANK" href="'.$live_article_url.'"><img class="img-responsive" src="'.$show_image1.'" alt="'.$article->article_page_image_alt.'" title="'.$article->article_page_image_title.'"></a>';
						echo '<h2><a href="'.$live_article_url.'">'.$display_title.'</a></h2>';
						//echo '<p>'.$description.'</p>';
						//echo '<date>'.date('dS  F Y h:i A' , strtotime($article->publish_start_date)).'</date>';
						echo '</div>';
					}
					?>
					<a style="color:red;font-weight:700;float:right" href="<?php echo base_url('special-page/bookfair/nenaipathu'); ?>">மேலும்  <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
				</div>
				<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
					<h4 class="text-center title-ls">பதிப்பகத்  தடங்கள் </h4>
					<?php
					foreach($thadangal as $article){
						$display_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $article->title);
						$summary = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $article->summary_html);
						$live_article_url = $domain_name. $article->url;
						$original_image_path = $article->article_page_image_path;
						if($original_image_path !='' && get_image_source($original_image_path, 1))
						{
							$imagedetails = get_image_source($original_image_path, 2);
							$imagewidth = $imagedetails[0];
							$imageheight = $imagedetails[1];	
							$Image600X300 	= str_replace("original","w600X300", $original_image_path);
							$show_image1 = image_url. imagelibrary_image_path . $Image600X300;
							
						}else{
							$show_image1	= image_url. imagelibrary_image_path.'logo/'.$logo_prefix.'_logo_600X300.jpg';
						}
						echo '<div class="block-container">';
						echo '<a target="_BLANK" href="'.$live_article_url.'"><img class="img-responsive" src="'.$show_image1.'" alt="'.$article->article_page_image_alt.'" title="'.$article->article_page_image_title.'"></a>';
						echo '<h2><a href="'.$live_article_url.'">'.$display_title.'</a></h2>';
						//echo '<p>'.$description.'</p>';
						//echo '<date>'.date('dS  F Y h:i A' , strtotime($article->publish_start_date)).'</date>';
						echo '</div>';
					}
					?>
					<a style="color:red;font-weight:700;float:right" href="<?php echo base_url('special-page/bookfair/thadangal'); ?>">மேலும்  <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</section>
	<?php }else if($type==2){ ?>
	<section>
		<div class="container-fluid">
			<div class="row" style="margin-bottom:2.5%;">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h4 class="text-center title-ls" style="color: #0d3d89;background: #eee;"><?php echo $pagetitle; ?></h4>
				</div>
			</div>
			<?php
			$i=1;
			$j=1;
			$domain_name = BASEURL;
			$logo_prefix= 'dinamani'; 
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
					$Image600X300 	= str_replace("original","w600X300", $original_image_path);
					$show_image1 = image_url. imagelibrary_image_path . $Image600X300;
					
				}else{
					$show_image1	= image_url. imagelibrary_image_path.'logo/'.$logo_prefix.'_logo_600X300.jpg';
				}
				if(strlen($summary) > 100){
					$description = mb_substr($summary , 0 ,97).'...';
				}else{
					$description =$summary;
				}
				if($i==1){
					echo '<div class="row">';
				}
				echo '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><div class="block-container">';
				echo '<a target="_BLANK" href="'.$live_article_url.'"><img class="img-responsive" src="'.$show_image1.'" alt="'.$article->article_page_image_alt.'" title="'.$article->article_page_image_title.'"></a>';
				echo '<h2><a href="'.$live_article_url.'">'.$display_title.'</a></h2>';
				//echo '<p>'.$description.'</p>';
				echo '<date>'.date('dS  F Y h:i A' , strtotime($article->publish_start_date)).'</date>';
				echo '</div>';
				echo '</div>';
				if($i==2){
					echo '</div>';
					$i=1;
				}else{
					$i++;
				}
			}
			?>
			<div class="pagination">
				<?php echo $pagination; ?>
			</div>
			<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pagination">
				<a href="<?php echo base_url('special-page/bookfair'); ?>">GO BACK</a>
			</div>
		</div>
		</div>
	</section>
	<?php }else{ ?>
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h4 class="text-center title-ls" style="color: #0d3d89;background: #eee;margin-bottom: 13px;">அறிமுகம்</h4>
				</div>
			</div>
		
		<?php
			$m= $n=1;
			foreach($books as $book){
				if($m==1){
					echo '<div class="row ms">';
				}
				echo '<div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">';
				?>
				<div class="panel-group">
					<div class="panel panel-default">
						<div class="panel-heading custom_heading">
							<h4 style="text-align: left;">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $n; ?>">
									<img style="float:left;" src="<?php echo image_url.'uploads/scroll_news/'.$book->image; ?>">
									<span><?php echo $book->title; ?>
									<br>
									<span>மேலும்  <i class="fa fa-angle-double-down" aria-hidden="true"></i></span>
									</span>
								</a>
							</h4>
						</div>
						<div id="collapse<?php echo $n; ?>" class="panel-collapse collapse">
							<div class="panel-body">
								<div class="accordion_content">
								 <?php echo $book->content; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
				echo '</div>';
				if($m==4){
					echo '</div>';
					$m=1;
				}else{
					$m++;
				}
				$n++;
			}
		?>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pagination">
				<a href="<?php echo base_url('special-page/bookfair'); ?>">GO BACK</a>
			</div>
		</div>
	</section>
	<?php } ?>
	<footer class="text-center">
		<p><b>Copyright - dinamani.com <?php echo date('Y');?></a></p>
		<p> <a class="AllTopic" href="http://www.newindianexpress.com/" rel="nofollow" target="_blank">The New Indian Express | </a> <a class="AllTopic" href="http://www.kannadaprabha.com" rel="nofollow" target="_blank">Kannada Prabha | </a>  <a class="AllTopic" href="http://www.samakalikamalayalam.com/" rel="nofollow" target="_blank">Samakalika Malayalam | </a><a class="AllTopic" href="http://www.indulgexpress.com" rel="nofollow" target="_blank">Indulgexpress  | </a>  <a class="AllTopic" href="http://www.edexlive.com" rel="nofollow" target="_blank">Edex Live  | </a> <a class="AllTopic" href="http://www.cinemaexpress.com" rel="nofollow" target="_blank">Cinema Express | </a> <a class="AllTopic" href="http://www.eventxpress.com" rel="nofollow" target="_blank">Event Xpress  </a></p>
		<p> <a class="AllTopic" href="https://www.dinamani.com/Contact-Us">Contact Us | </a> <a class="AllTopic" href="https://www.dinamani.com/About-Us">About Us | </a> <a class="AllTopic" href="https://www.dinamani.com/Privacy-Policy">Privacy Policy | </a> <a class="AllTopic" href="https://www.dinamani.com/Terms-of-Use">Terms of Use | </a> <a class="AllTopic" href="https://www.dinamani.com/Advertise-With-Us">Advertise With Us </a></p>
		<p> <a class="AllTopic" href="https://www.dinamani.com/">முகப்பு | </a>  <a class="AllTopic" href="https://www.dinamani.com/latest-news">தற்போதைய செய்திகள் | </a> <a class="AllTopic" href="https://www.dinamani.com/Sports">விளையாட்டு | </a> <a class="AllTopic" href="https://www.dinamani.com/health">மருத்துவம் | </a> <a class="AllTopic" href="https://www.dinamani.com/Cinema">சினிமா |  </a> <a class="AllTopic" href="https://www.dinamani.com/lifestyle">லைஃப்ஸ்டைல் </a></p>
	</footer>
</body>
</html>   