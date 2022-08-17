<?php
    $ExpireTime = 600; // seconds (= 10 mins)
	$this->output->set_header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
	$this->output->set_header("Cache-Control: cache, must-revalidate");
	$this->output->set_header("Cache-Control: max-age=".$ExpireTime);
	$this->output->set_header("Pragma: cache");
?>
<?php
$css_path 		= base_url()."css/FrontEnd/";
$js_path 		= base_url()."js/FrontEnd/";
$images_path	= base_url()."images/FrontEnd/";
//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
if(count($section_details) > 0){
$index= ($section_details['Noindexed']=='1')? 'NOINDEX' : 'INDEX';
$follow= ($section_details['Nofollow'] == '1') ? 'NOFOLLOW' : 'FOLLOW';
$Canonicalurl= ($section_details['Canonicalurl']!='') ? $section_details['Canonicalurl'] : '';
$meta_title = $section_details['MetaTitle'];
$meta_description = $section_details['MetaDescription'];
$meta_keywords = $section_details['MetaKeyword'];
$section_name = $section_details['Sectionname'];
$section_img_path = ($section_details['BGImage_path']!='')? image_url.$section_details['BGImage_path']: '';
}else{
	$index= "";
	$follow= "";
	$Canonicalurl= "";
	$meta_title = "";
	$meta_description = "";
	$meta_keywords = "";
	$section_name = "Clone widget Template";
	$section_img_path = "";
}

$page_variable = $this->input->get('per_page');
if($page_variable!='')
{
 if($this->uri->segment(1)!='topic'){
 $settings = $this->widget_model->select_setting($viewmode);
 $per_page = $settings['subsection_otherstories_count_perpage'];
 }else
 {
 $page_variable = $this->input->get('per_page');
 $per_page      = 15;
 }
 $page_variable = ($page_variable/$per_page)+1;
}

$background_image = ($section_img_path!='')? 'style="background:url('.$section_img_path.') left;"' : "";
?><!DOCTYPE HTML>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <?php if(strtolower($section_name)=="home" || strtolower($section_name)=="முகப்பு"){ ?>
	<meta http-equiv="Cache-control" content="max-age=360, public">  
  <?php }else{ ?>
	<meta http-equiv="Cache-control" content="max-age=480, public">  
  <?php } ?>
 <!-- for-mobile-apps -->
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="title" content="<?php echo strip_tags($meta_title);?>" />
 <meta name="description" content="<?php echo $meta_description;?>">
 <meta name="keywords" content="<?php echo $meta_keywords;?>">
 <link rel="canonical" href="<?php echo $Canonicalurl;?>" />
 <meta property="og:type" content="website" />
 <meta property="og:title" content="<?php echo strip_tags($meta_title);?>"/>
 <meta property="og:image" content="<?php echo $section_img_path;?>"/>
 <meta property="og:site_name" content="Dinamani"/>
 <meta property="og:description" content="<?php echo $meta_description;?>"/>
 <meta name="twitter:site" content="Dinamani" />
 <meta name="twitter:title" content="<?php echo strip_tags($meta_title);?>" />
 <meta name="twitter:description" content="<?php echo $meta_description;?>" />
 <meta name="twitter:image" content="<?php echo $section_img_path;?>" />
 <meta name="robots" content="<?php echo $index;?>, <?php echo $follow;?>">
 <title><?php echo $section_name;?>- Dinamani<?php echo ($page_variable!='')? "- page".$page_variable: "";?></title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ if (window.scrollY == 0) window.scrollTo(0,1); }; </script>
 <link rel="shortcut icon" href="<?php echo $images_path; ?>images/favicon.ico" type="image/x-icon" />
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
 <link rel="stylesheet" href="<?php echo $css_path; ?>css/font-awesome.css" type="text/css" />
 <link rel="stylesheet" href="<?php echo $css_path; ?>css/bootstrap.min.css" type="text/css">
 <link rel="stylesheet" href="<?php echo $css_path; ?>css/style.css" type="text/css" />
 <link rel="stylesheet" href="<?php echo $css_path; ?>css/media.css" type="text/css">
 <script src="<?php echo $js_path; ?>js/jquery.js" type="text/javascript"></script>
 <script src="<?php echo $js_path; ?>js/jquery.lazyloadxt.js"></script>
 <script src="<?php echo $js_path; ?>js/jquery-ui.js"></script>
 <script src="<?php echo $js_path; ?>js/bootstrap.min.js" type="text/javascript"></script>


 <script src="<?php echo $js_path; ?>js/turn.min.js" type='text/javascript' ></script>
 <link rel="stylesheet" type="text/css" href="<?php echo $css_path; ?>css/slick.css"/>
 <script type="text/javascript" src="<?php echo $js_path; ?>js/slick.js"></script>
 <script type="text/javascript" src="<?php echo $js_path; ?>js/scripts.js"></script>
 <script src="<?php echo $js_path; ?>js/easyResponsiveTabs.js"></script>
 <script type="text/javascript">
	  $(function () {	
		$('.photo-single').slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
		responsive: [
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2
      }
    }
	]
      });
	 $('.slick-prev').addClass('fa fa-chevron-left');
     $('.slick-next').addClass('fa fa-chevron-right');
	 $('.bn-navi span').addClass('fa fa-chevron-left');
     $('.bn-navi span:last-child').addClass('fa fa-chevron-right');
	 $(".line").css("display", "block");	
    });
 </script>

 <!-- Start Advertisement Script -->
 <?php echo urldecode(@$header_ad_script); ?>
 <!-- End Advertisement Script -->
 </head>
 <body>
<?php echo $header. $body. $footer; ?> 
<!--<script src="<?php echo $js_path; ?>js/slider-custom-lazy.min.js" type="text/javascript"></script> 
-->
<!--nav fixed--> 
<script type="text/javascript">
$('.top-fix ').affix({
      offset: {
        top: $('.top-fix').height()
      }
}); 
$(document).ready(function () {
$('#tabs_1 li').mouseover( function(){
    $(this).find('a').tab('show');
  });
  $('#tabs_1 li').mouseout( function(){
    $(this).find('a').tab('hide');
  });
  });

 function loadMore()
{
   console.log("More loaded");
   
   $('[id^="fill_widget_"]').each(function(i) {
   // console.log('ObjectID:'+$(this).attr('id')+'Content:'+$(this).text());
	if(i<3){
	var widget_ins      = $(this).attr('id');
	var widget_arr      = $('#widget_'+widget_ins).text();
	var page_section_id = $('#'+widget_ins).attr('data-pageparam');
	var content_from    = $('#'+widget_ins).attr('data-contentfrom');
	var instance_id     = $('#'+widget_ins).attr('data-instanceid');
	var widget_section  = $('#'+widget_ins).attr('data-pagesection');
	if (widget_ins){
	     $.ajax({
			url			: '<?php echo base_url(); ?>user/commonwidget/fill_widget',
			method		: 'post',
			dataType     : 'json',
			data		: { "widget_data": widget_arr ,"view_mode":"live", "page_param":page_section_id,"content_from":content_from, "instance_id": instance_id, "widget_section":widget_section  },
		    beforeSend	: function() {
			$('#'+widget_ins).removeAttr('id');				
			$('#add_article_process_img').css('display','block');	
			},
			success		: function(result){ 
			//console.log(result.widget_detail);
			//$('#'+widget_ins).html(result.widget_detail);
			$('.'+widget_ins).html(result.widget_detail);
			//$('#'+widget_ins).removeAttr('id');
				   },
				   complete: function (data) {
	  	$('.photo-single').slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
		responsive: [
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2
      }
    }
	]
      });
	 $('.slick-prev').addClass('fa fa-chevron-left');
     $('.slick-next').addClass('fa fa-chevron-right');
	  gallery_call(); 
	  cinema_slide();
	  $('.photo-single').slick('setPosition');
     }			
		});
	}
	}
  });
   
   $(window).bind('scroll', bindScroll);
 }

 function bindScroll(){
   if($(window).scrollTop() + $(window).height() > $(document).height() - 300) {
       $(window).unbind('scroll');
	  var Ajax_load = false;
	  if(Ajax_load){
	   loadMore();
	  }
   }
}
 var Ajax_load = false;
	  if(Ajax_load){
$(window).scroll(bindScroll);
	  }
</script> 
<!--nav fixed end-->
<?php if($this->uri->segment(1)=='dmcpan' || $this->uri->segment(1)=='topic'){ ?>
 <link rel="stylesheet" href="<?php echo $css_path; ?>css/datepicker.css" type="text/css">
<script src="<?php echo $js_path; ?>js/bootstrap-datepicker.js" type="text/javascript"></script>
<?php } ?>

<script type="text/javascript">
 var base_url = "<?php echo base_url(); ?>";
 var css_url  = "<?php echo $css_path; ?>";
</script>
<script type="text/javascript" src="<?php echo $js_path; ?>js/custom.js"></script>
<?php if($this->uri->segment(1)!='topic'){ ?>
<script type="text/javascript" src="<?php echo base_url(); ?>js/FrontEnd/js/cinema-slide.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/FrontEnd/js/jssor.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/FrontEnd/js/jssor.slider.js"></script>
<?php } ?>
<script src="<?php echo $js_path; ?>js/postscribe.min.js"></script>
</html>