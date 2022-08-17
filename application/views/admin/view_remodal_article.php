<?php
$readwhereQStr ='';
if(count($_GET) > 0){
	$readwhereQStr ='?'.$this->input->server('QUERY_STRING');
}
$css_path 		= static_url."css/FrontEnd/";
$js_path 		= static_url."js/FrontEnd/";
$images_path	= static_url."images/FrontEnd/";
//$MobileUrl = "https://m.dinamani.com/";
$MobileUrl = base_url();
///if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
$content_id      = @$content['content_id'];
$content_from    = @$content['content_from'];
$content_type_id = @$content['content_type'];
$viewmode        = @$content['mode'];
$settings = $this->widget_model->select_setting($viewmode);
//$page_det = $this->widget_model->widget_article_content_by_id($content_id, $content_type_id);
$page_det        = $article_details;
$page_det        = $page_det[0];
$Image600X390    = "";
$Image600X390 	 = ($content_type_id==1)? $page_det['article_page_image_path']: (($content_type_id==3)? $page_det['first_image_path']: (($content_type_id==4)? $page_det['video_image_path']: $page_det['audio_image_path']));
if ($Image600X390 != '' && getimagesize(image_url_no . imagelibrary_image_path . $Image600X390))
	{
	$imagedetails = getimagesize(image_url_no . imagelibrary_image_path.$Image600X390);
	$imagewidth   = $imagedetails[0];
	$imageheight  = $imagedetails[1];
	
	if ($imageheight > $imagewidth)
	{
		$Image600X390 	= $Image600X390;
	}
	/* else
	{				
		$Image600X390 	= str_replace("original","w600X390", $Image600X390);
	} */
	$image_path='';
		$image_path = image_url. imagelibrary_image_path . $Image600X390;
	}
else
{
	$image_path	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
	$image_caption='';	
}

$content = strip_tags($page_det['summary_html']);
$current_url = explode('?', Current_url());
$share_url= base_url().$page_det['url'];//$current_url[0];
$ampshare_url= $MobileUrl.str_replace('.html' ,'.amp',$page_det['url']);//$current_url[0];
$AMP=0;
$ampUrl = $mobileArticleUrl='';
 /* $uri = urldecode($this->uri->segment($this->uri->total_segments()));
$uriPos = strrpos($uri, "-");
$uri = substr($uri , 0 , $uriPos);
$pwaYear = date('Y' , strtotime($page_det['last_updated_on']));
if($content_type_id==3){
	$pwaContentId = 'G'.$pwaYear.'-'.$content_id;
}else if($content_type_id==4){
	$pwaContentId = 'V'.$pwaYear.'-'.$content_id;
}else{
	$pwaContentId = 'A'.$pwaYear.'-'.$content_id;
}
$ampUrl = MOBILEURL.'article/'.$uri.'/'.$pwaContentId.'/amp'.$readwhereQStr;
if($content_type_id==3):
	$mobileArticleUrl = MOBILEURL.'article/galleries/'.$uri.'/'.$pwaContentId.$readwhereQStr;
else:
	$mobileArticleUrl = MOBILEURL.'article/'.$this->uri->segment(1).'/'.$uri.'/'.$pwaContentId.$readwhereQStr;
endif; */ 
$ampUrl = MOBILEURL.str_replace('.html' , '.amp' ,$page_det['url']);
$index= ($page_det['no_indexed']==1)? 'NOINDEX' : 'INDEX';
$follow= ($page_det['no_follow'] == 1) ? 'NOFOLLOW' : 'FOLLOW';
$Canonicalurl= ($AMP==1) ? $ampshare_url : $share_url;//($page_det['canonical_url']!='') ? $page_det['canonical_url'] : '';
$meta_title = $page_det['meta_Title'];
$metadescription = $page_det['meta_description'];
$meta_description = (trim($metadescription)=='')? $content: $page_det['meta_description'];
//$meta_description = $page_det['meta_description'];
$tags = count($page_det['tags'])? $page_det['tags'] : '';

$seo_tags	= ($seotags !='')? $seotags :$tags;


$query_string = ($_SERVER['QUERY_STRING']!='') ? "?".$_SERVER['QUERY_STRING'] : "";
$pubDate = date_format(date_create($page_det['publish_start_date']),"Y-m-d\TH:i:s\+05:30");
$LastUpDate = date_format(date_create($page_det['last_updated_on']),"Y-m-d\TH:i:s\+05:30");
if($content_from =='archive'){
	$index        = 'INDEX';
	$follow       = 'FOLLOW';
}
?>
<?php
  //  $ExpireTime = ($content_from=="live") ? 600 : 86400; // seconds (= 10 mins)
    $ExpireTime = ($content_from=="live") ? 240 : 86400; // seconds (= 4 mins)
	$this->output->set_header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
	$this->output->set_header("Cache-Control: cache, must-revalidate");
	$this->output->set_header("Cache-Control: max-age=".$ExpireTime);
	$this->output->set_header("Pragma: cache");
?>
<!DOCTYPE HTML>
<html lang="ta">
<head>
<noscript>
	<div class="no-script-ce">Enable Javscript for better performance</div>
 </noscript>
<meta name="google-site-verification" content="ybWmewWrrASLVdqZYucf1_qAG3vV2gpo-wJAAlSt4Ec" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-control" content="max-age=600, public">
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="title" content="<?php echo strip_tags($meta_title);?>" />
<meta name="description" content="<?php echo $meta_description;?>">
<meta name="keywords" content="<?php echo $tags; ?>">
<meta name="news_keywords" content="<?php echo $seo_tags; ?>">
<meta name="msvalidate.01" content="E3846DEF0DE4D18E294A6521B2CEBBD2" />
<link rel="canonical" href="<?php echo $share_url;?>" />
<?php if($content_type_id==1 && isset($page_det['amp_status']) && $page_det['amp_status']=='1'): ?>
<link rel="amphtml" href="<?php echo $ampUrl;?>" />
<?php endif; ?>
<?php if($content_type_id!=1 && $ampUrl!=''): ?>
<link rel="amphtml" href="<?php echo $ampUrl;?>" />
<?php endif; ?>
<meta name="robots" content="<?php echo $index;?>, <?php echo $follow;?>">
<meta property="fb:pages" content="144731995537638" />
<meta property="og:url" content="<?php echo $share_url;?>" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo strip_tags($page_det['title']);?>"/>
<meta property="og:image" content="<?php echo $image_path;?>"/>
<meta property="og:image:width" content="450"/>
<meta property="og:image:height" content="298"/>
<meta property="og:site_name" content="Dinamani"/>
<meta property="og:description" content="<?php echo $content;?>"/>
<meta name="twitter:card" content="summary_large_image" /> 
<meta name="twitter:creator" content="DinamaniDaily" />
<meta name="twitter:site" content="@dinamani.com" />
<meta name="twitter:title" content="<?php echo strip_tags($page_det['title']);?>" />
<meta name="twitter:description" content="<?php echo $content;?>" />
<meta name="twitter:image" content="<?php echo $image_path;?>" />

<title><?php echo strip_tags($meta_title);?>- Dinamani</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ if (window.scrollY == 0) window.scrollTo(0,1); }; </script>
<link rel="shortcut icon" href="<?php echo $images_path; ?>images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="<?php echo $css_path; ?>css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="<?php echo $css_path; ?>css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="<?php echo $css_path; ?>css/style_latest.css?v=13.0" type="text/css" />
<link rel="stylesheet" href="<?php echo $css_path; ?>css/media.css?v=1.4" type="text/css">
<link rel="stylesheet" href="<?php echo $css_path; ?>css/slick.css?v=1.2" type="text/css">
<script src="<?php echo $js_path; ?>js/jquery.js" type="text/javascript"></script>
<script src="<?php echo $js_path; ?>js/bootstrap.min.js" type="text/javascript"></script>
<!--<script src="<?php echo $js_path; ?>js/jquery.lazyloadxt.js"></script>-->
<script type="text/javascript" src="<?php echo $js_path; ?>js/slick.js"></script>
<script type="text/javascript" src="<?php echo $js_path; ?>js/scripts.js"></script>
<script type="text/javascript" src="<?php echo $js_path; ?>js/easyResponsiveTabs.js"></script>
<script type="text/javascript">
$(document).ready(function () {
<!--replace slick preview as arrow-->
$('.slick-prev').addClass('fa fa-chevron-left');
$('.slick-next').addClass('fa fa-chevron-right');
<?php if(isset($html_header)&& $html_header==true){ 
$section_id              = $page_det['section_id'];
$parent_section_id       = $page_det['parent_section_id'];
$grand_parent_section_id = $page_det['grant_section_id'];
?>
$('.navbar-nav li').removeClass('active');
if ($('#tab<?php echo $section_id;?>').length) {
$('#tab<?php echo $section_id;?>').addClass('active');
}else if ($('#tab<?php echo $parent_section_id;?>').length) {
$('#tab<?php echo $parent_section_id;?>').addClass('active');
}else{
$('#tab<?php echo $grand_parent_section_id;?>').addClass('active');
}
<?php } ?>	
});
</script>
<!-- Start Advertisement Script -->
<?php 
if(SHOWADS):
	echo urldecode($header_ad_script);
	echo rawurldecode(stripslashes($settings['article_header_script'])); 
endif;
?>
<!-- End Advertisement Script -->
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
<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "WebSite", 
  "name" : "Dinamani",
  "url" : "<?php echo BASEURL ?>",
  "potentialAction" : {
    "@type" : "SearchAction",
    "target" : "<?php echo BASEURL; ?>topic?term={search_term}&request=ALL&search=short",
    "query-input" : "required name=search_term"
  }                     
}
</script>

<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "Organization",
  "name" : "Dinamani",
  "url" : "<?php echo BASEURL ?>",
  "sameAs" : [
    "https://www.facebook.com/DinamaniDaily",
    "https://twitter.com/DinamaniDaily",
	"https://en.wikipedia.org/wiki/Dinamani",
    "https://www.youtube.com/channel/UC3jcdpf8dWtljex9PyhSM6w"
  ]
}
</script>

<?php
$schematitle = strip_tags($page_det['title']);
mb_internal_encoding("UTF-8");
$schematitle = (count($schematitle) >= 110) ? $schematitle : mb_substr($schematitle , 0 , 107).'...';
$schemadata= [
	"@context" => "http://schema.org",
	"@type" => "NewsArticle",
	"mainEntityOfPage" => [
		"@type" => "WebPage",
		"@id" => $share_url
	],
	"headline" => $schematitle,
	"description" => stripslashes(html_entity_decode(strip_tags($page_det['summary_html'])))
];
if($content_type_id==1){
$schemadata["articleBody"] = strip_tags(stripslashes(html_entity_decode($page_det['article_page_content_html'])));
$schemadata["wordCount"] = strlen(strip_tags($page_det['article_page_content_html']));
}
$schemadata["datePublished"] = $pubDate;
$schemadata["dateModified"] = $LastUpDate;
$schemadata["publisher"] = [
	"@type" => "Organization",
	"name" => "Dinamani",
	"logo" =>[
		"@type" => "ImageObject",
		"url" => image_url."images/FrontEnd/images/dmlogo1.jpg",
		"width" => 268,
		"height" => 108
	]
];
$schemadata["inLanguage"] = "ta";
$schemadata["keywords"] = strip_tags($seo_tags);
$schemadata["author"] = [
	"@type" => "Person",
	"name" => ($page_det['author_name']!='') ? $page_det['author_name'] : $page_det['agency_name']
];
$schemadata["image"] = [
	"@type" => "ImageObject",
	"url" => $image_path.'?w=1200&h=800&dpr=1.3',
	"width" => 1200,
	"height" =>800
	
];
$schemadata = str_replace(["\\n" ,'\"' ,'/"',"\\t" ,"\n\n" ,"\n"], ["" ,"\u0022","\u0022","","",""], $schemadata);
?>
<script type="application/ld+json">
<?php echo json_encode($schemadata ,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES); ?>
</script>
<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window,document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '1969965129788704'); 
	fbq('track', 'PageView');
	</script>
	<noscript>
	<img height="1" width="1" 
	src="https://www.facebook.com/tr?id=1969965129788704&ev=PageView&noscript=1"/>
	</noscript>
<!-- End Facebook Pixel Code -->
<script type="text/javascript">
	window.GUMLET_CONFIG = {
		hosts: [{
			current: "images.dinamani.com",
			gumlet: "images.dinamani.com"
		}],
		lazy_load: true
	};
	(function(){d=document;s=d.createElement("script");s.src="https://cdn.gumlet.com/gumlet.js/2.0/gumlet.min.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();
</script>
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
<!--<div class="remodal-main-overlay"> </div>
<div class="CenterMargin CenterMarginBg"> </div>-->

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
.modal-backdrop{
	opacity:0 !important;
	display:none;
}
.sticky-right{width:300px;}
@media only screen and (max-width: 992px){
	.scrollToTop{bottom: 130px;}
}
</style>
<div class="cssload-container cssload-container-article" id="load_spinner">
  <figure> <img src="<?php echo $images_path; ?>images/loader-Dn.png" />
    <div class="cssload-zenith"></div>
  </figure>
</div>
<!--<div class="container side-bar-overlay">
  <div class="left-trans"></div>
  <div class="right-trans"></div>
</div>-->
<?php //echo $header; ?>

<?php echo  $header.$body .$footer; ?>
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
<?php if($content_type_id==1 || $content_type_id==3){ ?>
<script src="<?php echo $js_path; ?>js/jquery.twbsPagination.min.js" type="text/javascript"></script>
<?php } ?>
<script>
var close_url = "<?php echo $close_url;?>";
$( document ).ready(function() {
	$('#load_spinner').hide();
	$('body').bind('copy paste cut',function(e) {
		e.preventDefault();
		alert('cut,copy & paste options are disabled !!');
	});

   $(document).on('closed', '.remodal', function () {	
	<?php /*?><?php if($close_url =='home'){ ?>
	window.location.href = '<?php echo base_url();?>';
    <?php } else {	?>
	window.location.href = '<?php echo $close_url;?>';
	 <?php }?><?php */?>

		 var bck = localStorage.getItem("callback_section");
	 if(bck =='null'||bck ==null)
	   {
		window.location.href ="https://www.dinamani.com/";
	   }
	 else
	   {
	 window.location.href = localStorage.getItem("callback_section");
	   }

	// window.location.href = (localStorage.getItem("callback_url")!="null")? localStorage.getItem("callback_url"): window.location.origin;
   });

/* $('.remodal-main-overlay:not(.container)').click(function(){
inst.close();
}); */
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
<?php 
	if($viewmode == "live")
	{
	?>

<?php	
	}
?>
<script src="<?php echo $js_path; ?>js/postscribe.min.js"></script>
<div class="mobile_share">
	<!--<span id="mbp" style="display:none;" onclick="mfb('prev')"><img src="<?php echo image_url ?>images/FrontEnd/images/social-article/prev.png?v=1"></span>-->
	<span class="mfb" onclick="mfb('flipboard')"><svg aria-hidden="true" data-prefix="fab" data-icon="flipboard" class="" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="font-size: 24px;width: 23px;float: left;margin: 0 32%;box-shadow: 2px 2px #2c457c;"><path fill="#fff" d="M0 32v448h448V32H0zm358.4 179.2h-89.6v89.6h-89.6v89.6H89.6V121.6h268.8v89.6z"></path></svg> flipboard</span>
	<span class="mf" onclick="mfb('facebook')"><i class="fa fa-facebook-square" aria-hidden="true"></i> facebook</span>
	<span class="mt" onclick="mfb('twitter')"><i class="fa fa-twitter-square" aria-hidden="true"></i> twitter</span>
	<span class="mw" onclick="mfb('whatsapp')"><i class="fa fa-whatsapp" aria-hidden="true"></i> whatsapp</span>
	<span class="mbn" id="mbn" style="display:none;" onclick="mfb('next')"><i class="fa fa-caret-square-o-right" aria-hidden="true"></i> Next</span> 
	<script>
		var mb_prev = $('#mb_prev').val();
		var mb_next = $('#mb_next').val();
		if(mb_prev!='' && mb_prev!=undefined){
			$('#mbn').show();
		}
		/* if(mb_next!='' && mb_next!=undefined){
			$('#mbn').show();
		} */
		function mfb(type){
			if(type=='whatsapp'){
				$('.whatsapp').click();
			}else if(type=='email'){
				var sub =$('a[data-type="twitter"]').attr('data-txt');
				var body  =$('meta[property="og:url"]').attr('content');
				window.open('mailto:?subject='+sub+'&body='+body);
			}else if(type=='prev'){
				window.location.href= mb_prev;
			}else if(type=='next'){
				window.location.href= mb_next;
			}else{
				$('a[data-type="'+type+'"]').click();
			}
		}
	</script>
</div>
<?php
//$countryCode = ['US','EU'];
$countryCode = ['MALS'];
if(in_array(@$_SERVER['HTTP_CLOUDFRONT_VIEWER_COUNTRY'] , $countryCode) && SHOWADS==true):
?>
<script type="text/javascript">
    (function (){ var s,m,n,h,v,se,lk,lk1,bk; n=false; s= decodeURIComponent(document.cookie); m = s.split(';'); for(h=0;h<m.length;h++){ if(m[h]==' cookieagree=1'){n=true;break;}}if(n==false){v = document.createElement('div');v.setAttribute('style','position: fixed;left: 0px;right: 0px;height: auto;min-height: 15px;z-index: 2147483647;background: linear-gradient(255deg,#802727 0,#ec3f3f 100%);color: rgb(255, 255, 255);line-height: 15px;padding: 8px 18px;font-size: 14px;text-align: left;bottom: 0px;opacity: 1;');v.setAttribute('id','ckgre');se = document.createElement('span');se.setAttribute('style','padding: 5px 0 5px 0;float:left;');lk =document.createElement('button');lk.setAttribute('onclick','ckagree()');lk.setAttribute('style' , 'float: right;display: block;padding: 5px 8px;min-width: 100px;margin-left: 5px;border-radius: 25px;cursor: pointer;color: rgb(0, 0, 0);background: rgb(241, 214, 0);text-align: center;border: none;font-weight: bold;outline: none;');lk.appendChild(document.createTextNode("Agree"));	se.appendChild(document.createTextNode("We use cookies to enhance your experience. By continuing to visit our site you agree to our use of cookies."));lk1 = document.createElement('a');lk1.href=document.location.protocol+"//"+document.location.hostname+"/cookies-info";lk1.setAttribute('style','text-decoration: none;color: rgb(241, 214, 0);margin-left: 5px;');lk1.setAttribute('target','_BLANK');lk1.appendChild(document.createTextNode("More info"));se.appendChild(lk1);v.appendChild(se);v.appendChild(lk);bk = document.getElementsByTagName('body')[0];bk.insertBefore(v,bk.childNodes[0]);}})();function ckagree(){ document.cookie = "cookieagree=1;path=/";$('#ckgre').hide(1000, function(){ $(this).remove();});}
</script>
<?php
endif;
?>
<script type="text/javascript">
	var stickyRight = {};stickyRight.isDesktop = "<?php echo (isset($_SERVER['HTTP_CLOUDFRONT_IS_DESKTOP_VIEWER']) && $_SERVER['HTTP_CLOUDFRONT_IS_DESKTOP_VIEWER']=='true') ? 1 : 0 ?>";stickyRight.advClass = $( ".sticky-right" ).last();	stickyRight.advInnerClass = $(stickyRight.advClass).children(".sticky");stickyRight.articleContainer = $('.SectionContainer');stickyRight.offset = {top : 0 , left: 0 , right : 10 , bottom : 25};	stickyRight.execute = function(){if(this.isDesktop=='1' && this.advClass.length > 0 && this.articleContainer.length > 0){window.addEventListener("scroll", function(){			var fh = stickyRight.articleContainer.height() + stickyRight.articleContainer.offset().top - stickyRight.advInnerClass.height() - stickyRight.offset.top - stickyRight.offset.bottom;var wh = $(window).scrollTop() | $("body").scrollTop();var jh = stickyRight.advClass.offset().top;stickyRight.offset.left = stickyRight.offset.left + stickyRight.advInnerClass.offset().left;if (wh  > jh - stickyRight.offset.top && wh < fh){		stickyRight.advClass.removeAttr("style");stickyRight.advInnerClass.css({ position: "fixed", top: stickyRight.offset.top + "px", bottom: "auto" ,zIndex :1});}else{if(wh > jh - stickyRight.offset.top && wh > fh){						stickyRight.advClass.css({ position: "absolute", left: "auto", bottom: stickyRight.offset.bottom + "px", top: "auto" });stickyRight.advInnerClass.removeAttr("style");}else{if(wh < jh){stickyRight.advClass.removeAttr("style");				stickyRight.advInnerClass.removeAttr("style");}}}});}};stickyRight.execute();
</script>
</body>
</html>