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
	body{position: relative;margin: 0;padding: 0;color: #fff;font-size: 18px;font-weight: 400;overflow-x: hidden;		font-family: 'Pavanam', sans-serif;background: url('<?php echo image_url; ?>special_page/thinkedu-bg.jpg');		background-attachment:fixed;background-size: cover;}
	.header{border-bottom: 2px solid #ffcb05;padding: 15px 0 15px;}
	section img{border: 1px solid #fff;}
	section h2{margin: 10px 0 30px;font-size: 19px;line-height: 1.4;font-weight: 700;}
	section h2 a{color: #fff !important;text-decoration:none !important;}
	section iframe{width:100%;border:1px solid #fff;}
	.pagination{width:100%;text-align:center;}
	.pagination a , .pagination strong{color: #fff;padding: 4px 11px 4px;background: #1e68be;font-size: 15px;		font-weight: bold;border: 1px solid #fff;border-radius: 5px;margin-right: 5px;}
	.pagination strong{background: transparent;}
	footer{width:100%;background:#000;color:#fff;font-size: 16px;margin-top: 2%;padding: 1%;border-top: 2px solid #ffcb05;}
	p.time{font-size: 14px;text-align: center;margin: 0;font-weight: 700;}
	footer p a {color: #fff;}
	.live{width: 187px;border: none;margin-top: -52px;margin-bottom: -18px;margin-left: -50px;}
	.edu-img{float: right;width: 43%;margin-right: 15px;display: inline-block;}
	.edu-img1{float: right;width: 37%;margin-right: 15px;display: inline-block;}
	.pub_year{position: absolute; bottom: -9px; background: #fec905d9; color: black; font-size: 14px; padding: 0.5rem 1rem;  font-weight: bold; left: 1.7px;}
	@media only screen and (max-width: 768px){
		.edu-img1{width: 30%;}
		.edu-img{width: 34%;margin-right: 0px;}
		p.time{display:none;}
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
					<img  style="width:100%;" class="img-responsive" src="<?php echo image_url; ?>special_page/dinamani-white-logo1.png">
					<p class="time"><?php echo date('l, F d Y H:i A'); ?></p>
				</div>
				<div class="col-md-6 col-lg-6 col-sm-4 col-xs-4 text-center">
					<img style="display: inline-block;" class="img-responsive" src="<?php echo image_url; ?>special_page/think-edu-logo.png">
				</div>
				<div class="col-md-3 col-lg-3 col-sm-4 col-xs-4 pull-right">
					<img class="edu-img img-responsive" src="<?php echo image_url; ?>special_page/think-edu-TNIE-logo.png">
					<img class=" edu-img1 img-responsive" src="<?php echo image_url; ?>special_page/think-edu-EX-logo.png">
				</div>
			</div>
		</div>
		
	</header>
	<section>
		<div class="container-fluid">
		<div class="row" style="margin-bottom:2.5%;">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			</div>
		</div>
		<?php
		$i=1;
		$j=1;
		$domain_name = BASEURL;
		$logo_prefix= 'dinamani'; 
		$current_year = date('Y');
		foreach($data as $article){
			$year =  date("Y", strtotime($article->publish_start_date));
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
				$Image600X300 	= str_replace("original","w600X300", $original_image_path);
				$show_image = image_url. imagelibrary_image_path . $Image600X390;
				$show_image1 = image_url. imagelibrary_image_path . $Image600X300;
				
			}else{
				$show_image	= image_url. imagelibrary_image_path.'logo/'.$logo_prefix.'_logo_600X390.jpg';
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
			echo '<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" >';
			echo '<a target="_BLANK" href="'.$live_article_url.'" style="position: relative; float: left;"><img class="img-responsive" src="'.$show_image.'" alt="'.$article->article_page_image_alt.'" title="'.$article->article_page_image_title.'">';
			if((int) $year < 2022	){
				echo '<p class="pub_year">ThinkEdu Conclave 2020</p>';
			}
			echo '</a>';
			echo '<h2><a href="'.$live_article_url.'">'.$display_title.'</a></h2>';
			
			echo '</div>';
		
			if($i==4){
				echo '</div>';
				$i=1;
			}else{
				$i++;
			}
		}
		if($i!=1){
			echo '</div>';	
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
</body>
</html>   