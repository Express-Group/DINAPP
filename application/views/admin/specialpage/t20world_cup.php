<html>
	<head>
		<title>Dinamani T20 World Cup 2021</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<meta name="keywords" content="T20 World Cup News 2021 , டி20 உலக கோப்பை 2021,  dinamani ,  தினமணி" >
		<meta property="og:title" content="T20 World Cup News 2021, டி20 உலக கோப்பை 2021 | தினமணி" >
		<meta property="og:description" content="T20 World Cup News 2021, டி20 உலக கோப்பை 2021 |   தினமணி">
		<meta property="og:image" content="https://images.dinamani.com/uploads/user/imagelibrary/2021/10/11/w600X390/t20-world-ccup.JPG">
		<meta property="og:url" content="https://www.dinamani.com/special-page/t20world_cup">
		<meta name="twitter:image:src" content="https://images.dinamani.com/uploads/user/imagelibrary/2021/10/11/w600X390/t20-world-ccup.JPG">
		<meta name="twitter:url" content="https://www.dinamani.com/special-page/t20world_cup">
		<title>T20 World Cup News 2021 , டி20 உலக கோப்பை 2021 | தினமணி  |	Dinamani </title>
		<link rel="shortcut icon" href="https://images.dinamani.com/images/FrontEnd/images/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="<?php echo image_url; ?>special_page/css/font-awesome.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<style>
			.content{border-top: 5px solid #fcffff; background: url(https://images.dinamani.com/special_page/ground.jpg);    background-repeat: no-repeat;  background-size: cover; background-attachment: fixed;}
			.article-inner{padding: 1rem; background: white; border-radius:5px;}
			.page-title{padding: 1rem 0.5rem; color: white; background: #475b1d; margin: 0; font-weight:bold;}
			.page-dupl{padding: 1rem 0.5rem; color: white; background: #475b1d; margin: 0; font-weight:bold; }
			.page-title1{padding: 1rem 0.5rem; color: white; background: #475b1d; margin: 0; font-weight:bold;}
			.img2{border: 5px solid #475b1d; border-bottom: none;}
			.img1{border: 5px solid #475b1d; border-top: none;}
			.article-inner a:hover{text-decoration:none;}
			.article-inner p{font-size:1rem;height: 94px;}
			.page-title:hover{background: white; border: 4px solid #475b1d; color: #475b1d; border-bottom: none;}
			.page-dupl:hover{background: white; border: 4px solid #475b1d; color: #475b1d; border-bottom: none;}
			.page-title1:hover{background: white; border: 4px solid #475b1d; color: #475b1d; border-top: none;}
			.home{padding: 0.5rem 0; text-align: center; background: #6eb339;}
			.home a{color:white; font-weight:bold;}
			.home a:hover{text-decoration:none;}
			.home .fa{margin-right:0.5rem;}
			
			footer{padding:1rem 0; text-align:center;}
			.copy{color: #413987; font-weight: bold;}
			.page-link { position: relative; display: block; padding: .5rem .75rem; line-height: 1.25;    color: white; border: 1px solid #fff; border-radius: 5px;}
			.pagination li{margin-right:10px; border-radius:5px;}
			.pagination a{ color: #85bf5c; }
			.page-link:hover { z-index: 2; color: white; text-decoration: none; background-color: #85bf5c; border: 2px solid white;}			
			.page-link:focus { z-index: 3; outline: 0; box-shadow: 0 0 0 transparent}
			.page-dupl{display:none;}
			
			@media screen and (max-width: 768px) {
				.article-inner{margin:1rem; padding:0.7rem;}
				.article{padding-bottom : 0 !important;}
				.page-title1{display:none;}
				.page-dupl{display:block;}
				.home a{font-size:14px;}
			}
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row home">
				<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 col-xl-12 col-12 ">
					<a href="https://www.dinamani.com/"><i class="fa fa-angle-double-left"></i>முகப்பு</a>
				</div>
			</div>
		</div>	
		<header>
			<img src="https://images.dinamani.com/special_page/T20MainBanner.jpg" class="img-fluid" style="width:100%">
		</header>
		<section class="content content">
			<div class="container-fluid">
				<?php 
					//print_r($data); 
					$i=1;
					$j=1;
					$base_url= base_url();
					foreach($data as $article)
					{
						$title = strip_tags($article->title);
						if(mb_strlen($title) > 100){
							$title = mb_substr($title,0,100).'...';
						}
						$image = image_url. imagelibrary_image_path.'logo/dinamani_logo_600X300.jpg';
						$img_caption = 'Dinamani_caption';
						$img_alt = 'Dinamani_alt';
						if($article->article_page_image_path!=''){
							$Image600X300 	= str_replace("original","w600X300", $article->article_page_image_path);
							$image = image_url. imagelibrary_image_path . $Image600X300;
							$img_caption = $article->article_page_image_title;
							$img_alt = $article->article_page_image_alt;	
						}
						if($i==1)
						{
							echo '<div class="row pt-5 pb-5 article">';
						}
						echo '<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-12 ">';
							echo '<div class="article-inner">';
								echo '<a href="'.$base_url.$article->url.'" target="_BLANK">';
									if($j%2==0)
									{
										echo '<p class="page-title">'.$title.'</p>';
										echo '<img src="'.$image.'" class="img-fluid img1" style="width:100%" alt="'.$img_alt.'" title="'.$img_caption.'">';
									}
									else{
										echo '<p class="page-dupl">'.$title.'</p>';
										echo '<img src="'.$image.'" class="img-fluid img2" style="width:100%" alt="'.$img_alt.'" title="'.$img_caption.'">';
										echo '<p class="page-title1">'.$title.'</p>';
									}
								echo '</a>';
							echo '</div>';
						echo '</div>';
						if($i==3)		
						{
							echo '</div>';
							$i=1;
						}
						else
						{
							$i++;
						}
						$j++;
					}
				?>
			</div>
			<div class="pb-3">
				<?php echo str_replace('<a href=' , '<a class="page-link" href=' , $pagination); ?>
			</div>
		</section>
		<footer>
			<div class="copy">© Copyright <?php echo date('Y'); ?> Dinamani. All rights reserved.</div>
		</footer>
	</body>
</html> 