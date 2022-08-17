<?php
$css_path 		= base_url()."css/FrontEnd/";
$js_path 		= base_url()."js/FrontEnd/";
$images_path	= base_url()."images/FrontEnd/";
///if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
$content_id      = @$content['content_id'];
$content_from    = @$content['content_from'];
$content_type_id = @$content['content_type'];
$viewmode        = @$content['mode'];
//$page_det = $this->widget_model->widget_article_content_by_id($content_id, $content_type_id);
$page_det        = $article_details;
$page_det        = $page_det[0];
if($content_type_id=='1'){   // type article 
$Image600X390    = "";
$Image600X390 	 = $page_det['article_page_image_path'];
if (file_exists(destination_base_path . imagelibrary_image_path . $Image600X390) && $Image600X390 != '')
	{
	$imagedetails = getimagesize(destination_base_path . imagelibrary_image_path.$page_det['article_page_image_path']);
	$imagewidth   = $imagedetails[0];
	$imageheight  = $imagedetails[1];
	
	if ($imageheight > $imagewidth)
	{
		$Image600X390 	= $page_det['article_page_image_path'];
	}
	else
	{				
		$Image600X390 	= str_replace("original","w600X390", $page_det['article_page_image_path']);
	}
	$image_path='';
	
		$image_path = image_url. imagelibrary_image_path . $Image600X390;
		
	}
else
{
	$image_path	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
	$image_caption='';	
}
$image_path = ($image_path != '') ? $image_path : "no_image";

}elseif($content_type_id=='3'){  //type gallery
$image_path = "";
$Image600X390="";
$Image600X390 	= $page_det['first_image_path'];

if (file_exists(destination_base_path . imagelibrary_image_path . $Image600X390) && $Image600X390 != '')
	{
	$imagedetails = getimagesize(destination_base_path . imagelibrary_image_path.$page_det['first_image_path']);
	$imagewidth = $imagedetails[0];
	$imageheight = $imagedetails[1];
	
	if ($imageheight > $imagewidth)
	{
		$Image600X390 	= $page_det['first_image_path'];
	}
	else
	{				
		$Image600X390 	= str_replace("original","w600X390", $page_det['first_image_path']);
	}
	$image_path='';
	
		$image_path = image_url. imagelibrary_image_path . $Image600X390;
	}
	else
	{
   $image_path	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
}
}elseif($content_type_id=='4'){  //type video
$image_path = "";
$Image600X390 	= $page_det['video_image_path'];
if (file_exists(destination_base_path . imagelibrary_image_path . $Image600X390) && $Image600X390 != '')
	{
	$imagedetails = getimagesize(destination_base_path . imagelibrary_image_path.$page_det['video_image_path']);
	$imagewidth = $imagedetails[0];
	$imageheight = $imagedetails[1];
	
	if ($imageheight > $imagewidth)
	{
		$Image600X390 	= $page_det['video_image_path'];
	}
	else
	{				
		$Image600X390 	= str_replace("original","w600X390", $page_det['video_image_path']);
	}
	$image_path='';
	
		$image_path = image_url. imagelibrary_image_path . $Image600X390;
		
	}
else
{
$image_path	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
}
}
else{  //type audio
$image_path = "";
$Image600X390 	= @$page_det['audio_image_path'];
if (file_exists(destination_base_path . imagelibrary_image_path . $Image600X390) && $Image600X390 != '')
	{
	$imagedetails = getimagesize(destination_base_path . imagelibrary_image_path.$page_det['audio_image_path']);
	$imagewidth = $imagedetails[0];
	$imageheight = $imagedetails[1];
	
	if ($imageheight > $imagewidth)
	{
		$Image600X390 	= $page_det['audio_image_path'];
	}
	else
	{				
		$Image600X390 	= str_replace("original","w600X390", $page_det['audio_image_path']);
	}
	$image_path='';
	
		$image_path = image_url. imagelibrary_image_path . $Image600X390;
		
	}
else
{
$image_path	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
}
}
$content = strip_tags($page_det['summary_html']);
$current_url = explode('?', Current_url());
$share_url= $current_url[0];
$index= ($page_det['no_indexed']==1)? 'NOINDEX' : 'INDEX';
$follow= ($page_det['no_follow'] == 1) ? 'NOFOLLOW' : 'FOLLOW';
$Canonicalurl= ($page_det['canonical_url']!='') ? $page_det['canonical_url'] : '';
$meta_title = $page_det['meta_Title'];
$meta_description = $page_det['meta_description'];
$tags = count($page_det['tags'])? $page_det['tags'] : '';
?>
<?php
    $ExpireTime = ($content_from=="live") ? 600 : 86400; // seconds (= 10 mins)
	$this->output->set_header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
	$this->output->set_header("Cache-Control: cache, must-revalidate");
	$this->output->set_header("Cache-Control: max-age=".$ExpireTime);
	$this->output->set_header("Pragma: cache");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-control" content="max-age=600, public">
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="title" content="<?php echo strip_tags($meta_title);?>" />
<meta name="description" content="<?php echo $meta_description;?>">
<meta name="keywords" content="<?php echo $tags;?>">
<link rel="canonical" href="<?php echo $Canonicalurl;?>" />
<meta name="robots" content="<?php echo $index;?>, <?php echo $follow;?>">
<meta property="og:url" content="<?php echo $share_url;?>" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo strip_tags($page_det['title']);?>"/>
<meta property="og:image" content="<?php echo $image_path;?>"/>
<meta property="og:site_name" content="Dinamani"/>
<meta property="og:description" content="<?php echo $content;?>"/>
<meta name="twitter:card" content="<?php echo $content;?>" />
<meta name="twitter:site" content="Dinamani" />
<meta name="twitter:title" content="<?php echo strip_tags($page_det['title']);?>" />
<meta name="twitter:description" content="<?php echo $content;?>" />
<meta name="twitter:image" content="<?php echo $image_path;?>" />
<title><?php echo strip_tags($meta_title);?>- Dinamani</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ if (window.scrollY == 0) window.scrollTo(0,1); }; </script>
<link rel="shortcut icon" href="<?php echo $images_path; ?>images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="<?php echo $css_path; ?>css/font-awesome.css" type="text/css">
<link rel="stylesheet" href="<?php echo $css_path; ?>css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="<?php echo $css_path; ?>css/style.css" type="text/css">
<link rel="stylesheet" href="<?php echo $css_path; ?>css/media.css" type="text/css">
<link rel="stylesheet" href="<?php echo $css_path; ?>css/slick.css" type="text/css">
<script src="<?php echo $js_path; ?>js/jquery.js" type="text/javascript"></script>
<script src="<?php echo $js_path; ?>js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $js_path; ?>js/jquery.lazyloadxt.js"></script>
<script type="text/javascript" src="<?php echo $js_path; ?>js/slick.js"></script>
<script type="text/javascript" src="<?php echo $js_path; ?>js/scripts.js"></script>
<script type="text/javascript" src="<?php echo $js_path; ?>js/easyResponsiveTabs.js"></script>
<script type="text/javascript">
$(document).ready(function () {
<!--replace slick preview as arrow-->
$('.slick-prev').addClass('fa fa-chevron-left');
$('.slick-next').addClass('fa fa-chevron-right');	
});
</script>
<!-- Start Advertisement Script -->
<?php echo urldecode($header_ad_script); ?>
<!-- End Advertisement Script -->
</head>
<?php
$content_url = $page_det['url'];

$url_array = explode('/', $content_url);
$get_seperation_count = count($url_array)-4;

$sectionURL = ($get_seperation_count==1)? $url_array[0] : (($get_seperation_count==2)? $url_array[0]."/".$url_array[1] : $url_array[0]."/".$url_array[1]."/".$url_array[2]);
$section_url = base_url().$sectionURL."/";
/*if($content_from=="live"){
$section_url =  $section_url; 
}*/
?>
<body class="article_body" itemscope itemtype="<?php echo $section_url;?>">
<div class="remodal-main-overlay"> </div>
<div class="CenterMargin CenterMarginBg"> </div>
<style>
.cssload-container-article img{
position: absolute;
    right:0;
    top: 0;
    width: 70px;
}
.cssload-container-article .cssload-zenith {
    height: 70px;
    width: 70px;
}
.cssload-container-article figure{ 
    left: 50%;
    position: fixed;
    top: 50%;
}
</style>
<div class="cssload-container cssload-container-article" id="load_spinner">
  <figure> <img src="<?php echo $images_path; ?>images/loader-Dn.png" />
    <div class="cssload-zenith"></div>
  </figure>
</div>
<div class="container side-bar-overlay">
  <div class="left-trans"></div>
  <div class="right-trans"></div>
</div>
<?php //echo $header; ?>
<!--<div class="wait" id="load_spinner">
   <i class="wait-spinner wait-spin centerZone"></i>
  </div>-->
<div class="remodal" data-remodal-id="article" data-remodal-options="hashTracking: false, closeOnOutsideClick: false" role="dialog"  id="openmodal" style="position:relative;"> <?php echo  $header.$body .$footer; ?> </div>
<?php 
if(isset($_GET['pm'])!=0 && is_numeric($_GET['pm'])){
$section_details = $this->widget_model->get_section_by_id($_GET['pm']); //live db
$close_url       = (count($section_details)>0)? base_url().$section_details['URLSectionStructure']: "home";
}else{
$close_url ="home";
}

?>
<!--<script src="<?php echo $js_path; ?>js/remodal_custom.min.js" type="text/javascript"></script>
--> 
<script src="<?php echo $js_path; ?>js/jquery.csbuttons.js" type="text/javascript"></script> 
<script src="<?php echo $js_path; ?>js/remodal.js" type="text/javascript"></script>
<?php if($content_type_id==1){ ?>
<script src="<?php echo $js_path; ?>js/article-pagination.js" type="text/javascript"></script>
<?php } ?>
<?php if($content_type_id==1 || $content_type_id==3){ ?>
<script src="<?php echo $js_path; ?>js/jquery.twbsPagination.min.js" type="text/javascript"></script>
<?php } ?>
<script>
var close_url = "<?php echo $close_url;?>";
$( document ).ready(function() {
/*$("html, body").animate({
	scrollTop: 0
});*/
//$('html').addClass('loading_time');
var inst = $('[data-remodal-id=article]').remodal();
inst.open();
 //$('[data-remodal-id=article]').remodal();

$(document).on('opened', '.remodal', function () {
  console.log('Modal is opened');
   $('.SectionContainer').append('<button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>');
 $('.CenterMarginBg').hide();
  $('#load_spinner').hide();
  $('.side-bar-overlay').show();
   $('.menu').affix({
	offset: {
	top: $('header').height()
	}
	});	
	$('.remodal-close').affix({
	offset: {
	top: $('header').height()
	}
	});
});

   $(document).on('closed', '.remodal', function () {	
	<?php if($close_url =='home'){ ?>
	window.location.href = '<?php echo base_url();?>';
    <?php } else {	?>
	window.location.href = '<?php echo $close_url;?>';
	 <?php }?>
   });

$('.remodal-main-overlay:not(.container)').click(function(){
inst.close();
});
  $('.LeftArrow').click(function(){
  //inst.close();
  $('#load_spinner').show();
 });
  $('.RightArrow').click(function(){
  //inst.close();
  $('#load_spinner').show();
 });
});
</script> 
<script src="<?php echo $js_path; ?>js/postscribe.min.js"></script>
</body>
</html>
