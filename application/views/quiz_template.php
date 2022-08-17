<!DOCTYPE HTML>
<html>
 <head>
 <link rel="alternate" href="http://www.dinamani.com/dmcpan/template_designer/add_widget_article/saveTemporary-savepermanent-publish_articles/s" hreflang="ta"/>
 <meta name="google-site-verification" content="ybWmewWrrASLVdqZYucf1_qAG3vV2gpo-wJAAlSt4Ec" />
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   	<meta http-equiv="Cache-control" content="max-age=360, public">  
   <!-- for-mobile-apps -->
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="title" content="முகப்பு" />
 <meta name="description" content="">
 <meta name="keywords" content="">
 <meta name="news_keywords" content="">
 <meta name="msvalidate.01" content="E3846DEF0DE4D18E294A6521B2CEBBD2" />
 <link rel="canonical" href="http://www.dinamani.com/" />
 <meta property="og:type" content="website" />
 <meta property="og:title" content="முகப்பு"/>
 <meta property="og:image" content=""/>
 <meta property="og:site_name" content="Dinamani"/>
 <meta property="og:description" content=""/>
 <meta name="twitter:site" content="Dinamani" />
 <meta name="twitter:title" content="முகப்பு" />
 <meta name="twitter:description" content="" />
 <meta name="twitter:image" content="" />
 <meta name="robots" content="INDEX, FOLLOW">
 <title>ஜல்லிக்கட்டு- தினமணி வாசகர்களின் கருத்து </title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ if (window.scrollY == 0) window.scrollTo(0,1); }; </script>
 <link rel="shortcut icon" href="http://images.dinamani.com/images/FrontEnd/images/favicon.ico" type="image/x-icon" />
 <link rel="stylesheet" href="http://images.dinamani.com/css/FrontEnd/css/font-awesome.min.css" type="text/css" />
 <link rel="stylesheet" href="http://images.dinamani.com/css/FrontEnd/css/bootstrap.min.css" type="text/css">
 <link rel="stylesheet" href="http://images.dinamani.com/css/FrontEnd/css/style.css" type="text/css" />
 <link rel="stylesheet" href="http://images.dinamani.com/css/FrontEnd/css/media.css" type="text/css">
 <link rel="stylesheet" href="http://images.dinamani.com/css/admin/jquery_step.css">

  <script src="http://images.dinamani.com/js/jquery-1.11.3.min.js"></script>
 <script src="http://images.dinamani.com/js/FrontEnd/js/jquery.lazyloadxt.js"></script>
 <script src="http://images.dinamani.com/js/FrontEnd/js/jquery-ui.js"></script>
 <script src="http://images.dinamani.com/js/FrontEnd/js/bootstrap.min.js" type="text/javascript"></script>


 <script src="http://images.dinamani.com/js/FrontEnd/js/turn.min.js" type='text/javascript' ></script>
 <link rel="stylesheet" type="text/css" href="http://images.dinamani.com/css/FrontEnd/css/slick.css"/>
 <script type="text/javascript" src="http://images.dinamani.com/js/FrontEnd/js/slick.js"></script>
 <script type="text/javascript" src="http://images.dinamani.com/js/FrontEnd/js/scripts.js"></script>
 <script src="http://images.dinamani.com/js/FrontEnd/js/easyResponsiveTabs.js"></script>

 <script src="http://images.dinamani.com/js/jquery.steps.js"></script>
 <script>
$(document).ready(function(){
 
	$("#questions").steps({
		headerTag: "h3",
		bodyTag: "section",
		transitionEffect: "slideLeft",
		autoFocus: true,
		labels:{
			finish: "Submit",
		},
		onStepChanging: function (event, currentIndex, newIndex){
			var c_index=newIndex+ 1;
			//alert(c_index);
		 if(currentIndex > newIndex){ $('.wizard > .content').css('min-height','16em');	if(c_index==11){ $('.pager_count').html("");  }else{ $('.pager_count').html((newIndex+1)+'/10');  }  return true;}
		 var answer=$('input[name="quiz'+newIndex+'"]').is(":checked");
		 if(answer==false){
			$('#error_'+newIndex).html('Please select any one option');
			return false;
		 }else{
			$('#error_'+newIndex).html('');
			var new_url=$('input[name="question_'+(newIndex +1)+'"]').val();
			var new_url=new_url.replace(/\ /g, '-');
			parent.location.hash = new_url+'.html'; 
			if(c_index==11){ $('.pager_count').html("");  }else{ $('.pager_count').html((newIndex+1)+'/10');  }
			if((newIndex +1)==11){
				$('.wizard > .content').css('min-height','29em');
			}else{
				$('.wizard > .content').css('min-height','16em');
			}
			return true;
		 }
		},
		 onFinished: function (event, currentIndex){
			var lastleaf=currentIndex+1;
			var error_log=0;
			var username=$('input[name=username]').val();
			var age=$('input[name=age]').val();
			var email=$('input[name=email]').val();
			 var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			if(username!='' && age!='' &&email!='' && emailReg.test( email )){
				 $('#quiz_form').submit();
				 $('#error_11').html('');
			}else{
				$('#error_11').html('Please Fill all mandatory fields or enter valid email address');
			}
			
		}
		
	});
	
	$('.actions').prepend('<p class="pager_count">1/10</p>');
});

</script>
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

 	<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async='async'></script>
	<script>
    var OneSignal = window.OneSignal || [];
	OneSignal.push(function() {
  	OneSignal.showHttpPrompt();
	});
    OneSignal.push(["init", {
      appId: "d8efcd52-30be-4a55-91dc-356eb3b95eec",
      autoRegister: false, /* Set to true to automatically prompt visitors */
      subdomainName: 'https://dinamani.onesignal.com',  
	  persistNotification: true, // Automatically dismiss the notification after ~20 seconds in Chrome Deskop v47+ 
      httpPermissionRequest: {
        enable: false
      },
      notifyButton: {
          enable: false /* Set to false to hide */
      },
	   promptOptions: {
	    siteName: 'OneSignal Documentation',
	    /* Change click allow text, limited to 30 characters */
        autoAcceptTitle: 'dinamani',
		 /* Example notification title */
        exampleNotificationTitle: 'www.dinamani.com',
        /* Example notification message */
        exampleNotificationMessage: 'Latest News notification from ',
        /* These prompt options values configure both the HTTP prompt and the HTTP popup. */
        /* actionMessage limited to 90 characters */
        actionMessage: "We'd like to show you notifications for the latest news and updates from www.dinamni.com",
        /* acceptButtonText limited to 15 characters */
        acceptButtonText: "ALLOW",
        /* cancelButtonText limited to 15 characters */
        cancelButtonText: "NO THANKS"
    }
    }]);
  </script>	
  
 <!-- Start Advertisement Script -->
 <script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
<script>
  var googletag = googletag || {};
  googletag.cmd = googletag.cmd || [];
</script>

<script>
  googletag.cmd.push(function() {
    googletag.defineSlot('/3167926/DNM_200x90', [200, 90], 'div-gpt-ad-1474962291422-0').addService(googletag.pubads());
    googletag.defineSlot('/3167926/DM_Home_468x60', [468, 60], 'div-gpt-ad-1474962291422-1').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
</script> <!-- End Advertisement Script -->
<style>
		.description{margin-top:1%;text-align: justify;}
		.img-top{margin-top:1%;}
		 .steps{display:none !important;} 
		.errors{color:red;}
		#questions p{font-weight:700;}
		sup{color:red;}
         .widget-container-188,.adv_container{margin-top:3%;}
		 .pager_count{text-align:center;}
	</style>
 </head>
 <body>
<section class="section-header">
<header class="container HeaderContainer">

	<div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "><div class="widget-container widget-container-386">
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-bottom-10">
    <div class="ad_script_6789" id="ad_script_6789"   style="text-align:center;">
                  <!-- Javascript tag: -->
<!-- begin ZEDO for channel:  DNM_Home_Skin , publisher: Dinamani , Ad Dimension: skin1x1 - 1 x 1 -->
<script language="JavaScript">
var zflag_nid="791"; var zflag_cid="440"; var zflag_sid="4"; var zflag_width="1"; var zflag_height="1"; var zflag_sz="88";
</script>
<script language="JavaScript" src="http://d3.zedo.com/jsc/d3/fo.js"></script>
<!-- end ZEDO for channel:  DNM_Home_Skin , publisher: Dinamani , Ad Dimension: skin1x1 - 1 x 1 -->    </div>
  </div>
</div>
<script type="text/javascript">
  // jQuery used as an example of delaying until load.
 /* $(function() {
  setTimeout(function(){
  var adscript = '';
    postscribe('#ad_script_6789', , {
      done: function() {
        //console.info('Dblclick script has been delivered.');
		//alert('script delievered successfully');
      }
    });
	}, 3000);
  });*/
</script></div></div></div><div class="row"><div class=" col-lg-9 col-md-9 col-sm-9 col-xs-12  "><div class="widget-container widget-container-150">
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-bottom-10">
    <div class="ad_script_4541" id="ad_script_4541"   style="text-align:center;">
                      </div>
  </div>
</div>
<script type="text/javascript">
  // jQuery used as an example of delaying until load.
  $(function() {
  setTimeout(function(){
  var adscript = '';
    postscribe('#ad_script_4541', "<!-- Javascript tag -->\n<!-- begin ZEDO for channel: DNM_home_728x90 , publisher: Dinamani , Ad Dimension: Super Banner - 728 x 90 -->\n<script language=\"JavaScript\">\nvar zflag_nid=\"791\"; var zflag_cid=\"393\"; var zflag_sid=\"4\"; var zflag_width=\"728\"; var zflag_height=\"90\"; var\nzflag_sz=\"14\"; <\/script>\n<script language=\"JavaScript\" src=\"http:\/\/d3.zedo.com\/jsc\/d3\/fo.js\"><\/script>\n<!-- end ZEDO for channel: DNM_home_728x90 , publisher: Dinamani , Ad Dimension: Super Banner - 728 x 90 -->", {
      done: function() {
        //console.info('Dblclick script has been delivered.');
		//alert('script delievered successfully');
      }
    });
	}, 3000);
  });
</script></div></div><div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12  "><div class="widget-container widget-container-150">
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-bottom-10">
    <div class="ad_script_4542" id="ad_script_4542"   style="text-align:center;">
                      </div>
  </div>
</div>
<script type="text/javascript">
  // jQuery used as an example of delaying until load.
  $(function() {
  setTimeout(function(){
  var adscript = '';
    postscribe('#ad_script_4542', "<!-- \/3167926\/DNM_200x90 -->\n<div id='div-gpt-ad-1474962291422-0' style='height:90px; width:200px;' style=\"float:right\">\n<script>\ngoogletag.cmd.push(function() { googletag.display('div-gpt-ad-1474962291422-0'); });\n<\/script>\n<\/div>", {
      done: function() {
        //console.info('Dblclick script has been delivered.');
		//alert('script delievered successfully');
      }
    });
	}, 3000);
  });
</script></div></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "><div class="widget-container widget-container-151">
<div class="row">
<div class="col-lg-12">
<div class="navbar navbar-inverse navbar-fixed-top main-menu menu top-fix menu-top-fix main-nav" role="navigation" style="margin-bottom:0; position:relative; color:#fff;">

<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand home_logo" rel="home" href="http://www.dinamani.com/"><i class="fa fa-home"></i></a>
</div>

<div class="collapse navbar-collapse">

<ul class="nav navbar-nav menus">
<li class="index_hide active"><a href="http://www.dinamani.com/"><i class="fa fa-home"></i></a></li>
<li class="StatesHover" id="tab478"><a class="MenuItem"  id="maintabs-478"  onmouseover="show_main_menu('478', 'main')"  href="http://www.dinamani.com/latest-news">தற்போதைய செய்திகள்</a>
<div class="MultiStatesContents MultiCitiesCont" id="maintabs_content-478">
<!-- Main menu content appear here-->
</div>
</li>
<li class="StatesHover" id="tab334"><a class="MenuItem"  id="maintabs-334"  onmouseover="show_main_menu('334', 'main')"  href="http://www.dinamani.com/sports">விளையாட்டு</a>
<div class="MultiStatesContents MultiCitiesCont" id="maintabs_content-334">
<!-- Main menu content appear here-->
</div>
</li>
<li class="StatesHover" id="tab386"><a class="MenuItem"  id="maintabs-386"  onmouseover="show_main_menu('386', 'main')"  href="http://www.dinamani.com/cinema">சினிமா</a>
<div class="MultiStatesContents MultiCitiesCont" id="maintabs_content-386">
<!-- Main menu content appear here-->
</div>
</li>
<li class="StatesHover" id="tab388"><a class="MenuItem"  id="maintabs-388"  onmouseover="show_main_menu('388', 'main')"  href="http://www.dinamani.com/health">மருத்துவம்</a>
<div class="MultiStatesContents MultiCitiesCont" id="maintabs_content-388">
<!-- Main menu content appear here-->
</div>
</li>
<li class="StatesHover" id="tab471"><a class="MenuItem"  id="maintabs-471"  onmouseover="show_main_menu('471', 'main')"  href="http://www.dinamani.com/lifestyle">லைஃப்ஸ்டைல்</a>
<div class="MultiStatesContents MultiCitiesCont" id="maintabs_content-471">
<!-- Main menu content appear here-->
</div>
</li>
<li class="StatesHover" id="tab389"><a class="MenuItem"  id="maintabs-389"  onmouseover="show_main_menu('389', 'main')"  href="http://www.dinamani.com/religion">ஆன்மிகம்</a>
<div class="MultiStatesContents MultiCitiesCont" id="maintabs_content-389">
<!-- Main menu content appear here-->
</div>
</li>
<li class="StatesHover" id="tab401"><a class="MenuItem"  id="maintabs-401"  onmouseover="show_main_menu('401', 'main')"  href="http://www.dinamani.com/astrology">ஜோதிடம்</a>
<div class="MultiStatesContents MultiCitiesCont" id="maintabs_content-401">
<!-- Main menu content appear here-->
</div>
</li>
<li class="StatesHover" id="tab335"><a class="MenuItem"  id="maintabs-335"  onmouseover="show_main_menu('335', 'main')"  href="http://www.dinamani.com/junction">ஜங்ஷன்</a>
<div class="MultiStatesContents MultiCitiesCont" id="maintabs_content-335">
<!-- Main menu content appear here-->
</div>
</li>
<li class="StatesHover"><a href="http://epaper.dinamani.com/" class="MenuItem"> இ-பேப்பர்</a></li>
<li class="AllSectionHover" id="AllSectionHoverId"><a class="MenuItem" href="javascript:void(0);">அனைத்துப் பிரிவுகள் &nbsp;<i class="fa fa-chevron-down"></i></a>

<div class="MultiSection">
<ul class="MultiSectionList full_width_menu" style="width:18%;" >
<li><a class="AllTopic" href="http://www.dinamani.com/">முகப்பு</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/tamilnadu">தமிழ்நாடு</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/india">இந்தியா</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/world">உலகம்</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/business">வர்த்தகம்</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/sports">விளையாட்டு</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/cinema">சினிமா </a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/junction">ஜங்ஷன்</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/cm-jayalalitha">ஜெ.- ஒரு சகாப்தம்</a></li>

</ul>
<ul class="MultiSectionList full_width_menu">
<li><a class="AllTopic" href="http://www.dinamani.com/health">மருத்துவம்</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/religion">ஆன்மிகம்</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/astrology">ஜோதிடம்</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/education">கல்வி</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/employment">வேலைவாய்ப்பு</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/automobiles">ஆட்டோமொபைல்ஸ்</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/lifestyle">லைஃப்ஸ்டைல்</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/agriculture">விவசாயம் </a></li>
</ul>

<ul class="MultiSectionList full_width_menu" style="width:18%;" >
<li><a class="AllTopic" href="http://www.dinamani.com/travel">சுற்றுலா</a></li>
<!--<li><a class="AllTopic" href="http://www.dinamani.com/tholliyalmani">தொல்லியல்மணி</a>
</li>-->
<li><a class="AllTopic" href="http://www.dinamani.com/editorial">தலையங்கம்</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/specials/cartoon">கார்ட்டூன்</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/weekly-supplements">வார இதழ்கள்</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/specials/sirukathaimani">சிறுகதைமணி</a></li>
<!--<li><a class="AllTopic" href="http://www.dinamani.com/specials/Makkal-Karuthu">மக்கள் கருத்து</a></li>-->
<!--<li><a class="AllTopic" href="http://www.dinamani.com/world_tamils">உலகத் தமிழர்</a></li>-->
<li><a class="AllTopic" href="http://www.dinamani.com/specials/nool-aragam">நூல் அரங்கம்</a></li>
<!--<li><a class="AllTopic" href="http://www.dinamani.com/kitchen-corner">கிச்சன் கார்னர்</a></li>-->
<li><a class="AllTopic" href="http://www.dinamani.com/videos">வீடியோக்கள்</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/galleries">புகைப்படங்கள்</a></li>
</ul>
<ul class="MultiSectionList full_width_menu" style="width:21%;">
<!--<li><a class="AllTopic" href="http://www.dinamani.com/audios"> ஆடியோ</a></li>-->
<li><a class="AllTopic" href="http://www.dinamani.com/specials/Parigara-thalangal">பரிகாரத் தலங்கள்</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/astrology">பஞ்சாங்கம்</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/specials">ஸ்பெஷல்ஸ்</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/specials/cinemaexpress">சினிமா எக்ஸ்பிரஸ்</a></li>
<!--<li><a class="AllTopic" href="http://www.dinamani.com/latest_news">தற்போதைய செய்திகள்</a></li>-->
<li><a class="AllTopic" href="http://www.dinamani.com/editorial-articles">கட்டுரைகள்</a></li>
<!--<li><a class="AllTopic" href="http://www.dinamani.com/special-stories">சிறப்புக் கட்டுரைகள்</a></li>-->
<li><a class="AllTopic" href="http://www.dinamani.com/specials/naalthorum-nammalvaar">நாள்தோறும் நம்மாழ்வார்</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/specials/dinanthorum-thirupugal">தினந்தோறும் திருப்புகழ்</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/specials/indha-naalil">இந்த நாளில்</a></li>
</ul>
<ul class="MultiSectionList full_width_menu">
<li><a class="AllTopic" href="http://www.dinamani.com/specials/world-tamils">உலகத் தமிழர்</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/specials/complaints">ஆராய்ச்சிமணி</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/specials/discussion-forum">விவாதமேடை</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/specials/kitchen-corner">கிச்சன் கார்னர்</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/specials/kavithaimani">கவிதைமணி </a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/tholliyalmani">தொல்லியல்மணி</a></li>
<li><a class="AllTopic" href="http://www.dinamani.com/specials/Thinam-oru-thavaram">தினம் ஒரு தேவாரம்</a></li>
<!--<li><a class="AllTopic" href="http://www.dinamani.com/specials/thirukural">திருக்குறள்</a></li>-->
<!--<li><a class="AllTopic" href="http://www.dinamani.com/specials/indha-naalil-andru">இந்த நாளில்...</a></li>-->

<!--<li><a class="AllTopic" href="http://www.dinamani.com/all-editions"> அனைத்துப் பதிப்புகள்</a></li>-->
<li><a class="AllTopic" href="http://epaper.dinamani.com/"> இ-பேப்பர்</a></li>
</ul>
</div>


</li>
</ul>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
<!--Dropdown Menu--> 
$( "#tabs332 li" ).hover( function(){
$(this).tab('show');
});
<!--Dropdown Menu--> 
$( "#tabs478 li" ).hover( function(){
$(this).tab('show');
});
<!--Dropdown Menu--> 
$( "#tabs334 li" ).hover( function(){
$(this).tab('show');
});
<!--Dropdown Menu--> 
$( "#tabs386 li" ).hover( function(){
$(this).tab('show');
});
<!--Dropdown Menu--> 
$( "#tabs388 li" ).hover( function(){
$(this).tab('show');
});
<!--Dropdown Menu--> 
$( "#tabs471 li" ).hover( function(){
$(this).tab('show');
});
<!--Dropdown Menu--> 
$( "#tabs389 li" ).hover( function(){
$(this).tab('show');
});
<!--Dropdown Menu--> 
$( "#tabs401 li" ).hover( function(){
$(this).tab('show');
});
<!--Dropdown Menu--> 
$( "#tabs335 li" ).hover( function(){
$(this).tab('show');
});
<!--Dropdown Menu--> 
$( "#tabs711 li" ).hover( function(){
$(this).tab('show');
});
<!--Dropdown Menu--> 
$( "#tabs715 li" ).hover( function(){
$(this).tab('show');
});
<!--Dropdown Menu--> 
$( "#tabs717 li" ).hover( function(){
$(this).tab('show');
});
setTimeout(function(){sessionStorage.clear(); }, 240000);  //clear Session Storage every 4 mins
});
//$('.menus li:nth-last-child(2)').addClass('jumbo_full');
//$('.menus li:nth-last-child(3)').addClass('jumbo_full');

function show_main_menu(menuId, type){
var storage_name = "menu_content-"+menuId;
if (sessionStorage.getItem(storage_name)) { 	// Code for localStorage/sessionStorage.
var sessiondata = sessionStorage.getItem(storage_name);
if(type=='main'){
$('#maintabs_content-'+menuId).html(sessiondata);
$('#maintabs-'+menuId).removeAttr('onmouseover');
}else{
$('#tabs-'+menuId).html(sessiondata);
$('#maintabs-'+type).removeAttr('onmouseover');
$('#subtabs-'+menuId).removeAttr('data-id');
$('#subtabs-'+menuId).removeAttr('onmouseover');
}
} else { // Sorry! No Web Storage support..
$.ajax({
url			: 'http://www.dinamani.com/user/commonwidget/get_menu_content',
method		: 'post',
data		: { menuid: menuId, mode: 'live', 'rendermode' : 'manual', is_home : 'y', param : '', menu_type : type},
beforeSend	: function() {				
console.log(menuId);
if(type=='main'){
document.getElementById('maintabs_content-'+menuId).innerHTML = '<figure style="text-align: center;"><img src="http://images.dinamani.com/images/FrontEnd/images/menu-loader.gif" style="width: 70px;"></figure>';
}else{
document.getElementById('tabs-'+menuId).innerHTML = '<figure style="text-align: center;"><img src="http://images.dinamani.com/images/FrontEnd/images/menu-loader.gif" style="width: 70px;position: absolute;top: 43%;left: 57%;"></figure>';
}
},
success		: function(result){ 
if(type=='main'){
$('#maintabs_content-'+menuId).html(result);  //.hide().fadeIn({ duration: 2000 })
$('#maintabs-'+menuId).removeAttr('onmouseover');
}else{
$('#tabs-'+menuId).html(result);
$('#maintabs-'+type).removeAttr('onmouseover');
$('#subtabs-'+menuId).removeAttr('data-id');
$('#subtabs-'+menuId).removeAttr('onmouseover');
}
sessionStorage.setItem('menu_content-'+menuId, result);
console.clear();
}			
});
}
}

</script>
</div></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "><div class="widget-container widget-container-223"><div class="row logo-mobile">
<div class="MobileInput">  <form class="" action="http://www.dinamani.com/topic"  name="SimpleSearchForm" id="mobileSearchForm" method="get" role="form">
<input type="text" placeholder="தேடல்" name="search_term" id="mobile_srch_term" value=""/> <a href="javascript:void(0);" id="mobile_search"><img src="http://images.dinamani.com/images/FrontEnd/images/search-mob.png" /></a></form></div>

    <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 brand-logo">
    <div class="top-gap margin-top-10">
      <figure class="part-logo"><img src="http://images.dinamani.com/images/FrontEnd/images/group.jpg" /></figure>
        <!--<div class="loc" id="current_time">
          <p class="date font-arial">
				06:44:46 PM  </br><span>புதன்கிழமை</span> </br>18 <span>ஜனவரி</span> 2017                </p>
          
      </div>-->
    </div>
    </div>
<div class=" col-lg-4 col-md-4 col-sm-6 col-xs-6">
    <div class="logo_pad ">
    <div class="main_logo">
      <a href="http://www.dinamani.com/">
<img src="http://images.dinamani.com/images/FrontEnd/images/dmlogo1.jpg"></a><p id="mobile_date">18 <span>ஜனவரி</span> 2017</p></div>
    </div>
  </div>
<div class=" col-lg-4 col-md-4 col-sm-6 col-xs-6">
<ul class="MobileNav">
                   
                   <li class="MobileSearch"><a class="SearchHide" href="javascript:void(0);"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                   <li class="MobileShare dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span><i class="fa fa-share-alt" aria-hidden="true"></i><i class="fa fa-caret-down" aria-hidden="true"></i></span></a><ul class="dropdown-menu">
          <li><a href="http://www.facebook.com/DinamaniDaily" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <li><a href="https://plus.google.com/116307064799770204456/" target="_blank"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="http://twitter.com/DINAMANI" target="_blank"><i class="fa fa-twitter"></i></a></li>
          <li><a href="http://www.dinamani.com/rss/" target="_blank"><i class="fa fa-rss"></i></i></a></li>
          
        </ul></li>
                  </ul>
<div class="large-screen-search">
                   <div class="search1">
          <form class="navbar-form formb" action="http://www.dinamani.com/topic"  name="SimpleSearchForm" id="SimpleSearchForm" method="get" role="form">
            <div class="input-group">
              <input type="text" class="form-control tbox" placeholder="தேடல்" name="search_term" id="srch-term" value="">
              <div class="input-group-btn">
                <input type="hidden" class="form-control tbox"  name="home_search" value="H" id="home_search">
                <button class="btn btn-default btn-bac" id="search-submit" type="submit"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
          <label id="error_throw"></label>
        </div>
                   <div class="social_icons SocialCenter"><span> <a class="android" href="https://play.google.com/store/apps/details?id=com.dinamani.news&hl=en" target="_blank"><i class="fa fa-android" aria-hidden="true"></i></a> <a class="apple" href="https://itunes.apple.com/in/app/dinamani-news-official/id986248960?mt=8" target="_blank" ><i class="fa fa-apple" aria-hidden="true"></i></a></span> <a class="fb" href="http://www.facebook.com/DinamaniDaily" target="_blank"><i class="fa fa-facebook"></i></a> <a class="google" href="https://plus.google.com/116307064799770204456/" target="_blank"><i class="fa fa-google-plus"></i></a> <a class="twit" href="http://twitter.com/DINAMANI" target="_blank"><i class="fa fa-twitter"></i></a> <a class="rss" href="http://www.dinamani.com/rss/" target="_blank"><i class="fa fa-rss"></i></a> </div>
        </div>
      </div>
</div></div></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "><div class="widget-container widget-container-319"><div class="row">
	<div class="col-lg-12">
		<div class="navbar navbar-inverse navbar-fixed-top main-menu menu top-fix2" role="navigation" style="margin-bottom:0px; position:relative; color:#fff;">
			
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand home_logo" rel="home" href="http://www.dinamani.com/"><i class="fa fa-home"></i></a>
			</div>
			
			<div class="collapse navbar-collapse">
			
				<ul class="nav navbar-nav menus">
                <li  class="StatesHover"><a class="MenuItem " href="http://www.dinamani.com/education">கல்வி</a></li><li  class="StatesHover"><a class="MenuItem " href="http://www.dinamani.com/employment">வேலைவாய்ப்பு</a></li><li id="tab481" class="StatesHover"><a class="MenuItem " href="http://www.dinamani.com/business">வர்த்தகம்</a></li><li id="tab339" class="StatesHover"><a class="MenuItem " href="http://www.dinamani.com/agriculture">விவசாயம்</a></li><li id="tab541" class="StatesHover"><a class="MenuItem " href="http://www.dinamani.com/automobiles">ஆட்டோமொபைல்ஸ்</a></li><li id="tab502" class="StatesHover"><a class="MenuItem " href="http://www.dinamani.com/travel">சுற்றுலா</a></li><li id="tab340" class="StatesHover"><a class="MenuItem " href="http://www.dinamani.com/editorial">தலையங்கம்</a></li><li id="tab341" class="StatesHover"><a class="MenuItem " href="http://www.dinamani.com/editorial-articles">கட்டுரைகள்</a></li><li id="tab615" class="StatesHover"><a class="MenuItem " href="http://www.dinamani.com/specials/cartoon">கார்ட்டூன்</a></li><li id="tab390" class="StatesHover"><a class="MenuItem " href="http://www.dinamani.com/weekly-supplements">வார இதழ்கள்</a></li><li id="tab552" class="StatesHover"><a class="MenuItem " href="http://www.dinamani.com/all-editions">அனைத்துப் பதிப்புகள்</a></li>				</ul>
				
			</div>
		</div>
	</div>
</div>


</div></div></div>
</header>
</section><section class="section-content"><div class="container SectionContainer"><div class="row"><div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12 ColumnSpaceRight "><!--<section class="section-content">
<div class="container SectionContainer">-->
	<div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "></div></div>
	
	<div class="row">
		<div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 img-top">
			<div class="col-md-12 col-sm-12">
				<img src="http://www.dinamani.com/static_img/banner_jallijkattu_1.jpg "class="img-responsive img-thumbnail">
			</div>
			<div class="col-md-12 col-sm-12">
				<div class="well description">
					ஜல்லிக்கட்டு என்பது ஒரு விளையாட்டு மட்டுமல்ல; அது தமிழர்களின் கலாசாரம், பண்பாட்டுடன் தொடர்புகொண்ட ஒரு உணர்வுபூர்வமான செயல்பாடு. பல ஆயிரக்கணக்கான ஆண்டுகளாக வெற்றிகரமாக நடைபெற்று வந்த ஜல்லிக்கட்டுக்குத் தடை விதிக்கப்பட்டுள்ளது. அந்தத் தடை நீக்கப்பட வேண்டும் என்பதை வலியுறுத்தி தமிழகம் மட்டுமல்லாமல், வெளிமாநிலங்களிலும், வெளிநாடுகளிலும் இருந்தும் பெருமளவு ஆதரவு தெரிவிக்கப்பட்டு வருகிறது. அந்த நடவடிக்கையில், தினமணி இணையதளமும், மக்களின் கருத்தை அறிய விரும்புகிறது.
				</div>
			</div>
		</div>
		<div class="col-md-12 col-lg-12 col-sm-12">
			<form method="post" action="<?php print site_url('jallikattu_save')?>" id="quiz_form">
			<div id="questions">
				<h3>question1</h3>
				<section>
					<p>1. ஜல்லிக்கட்டை நீங்கள் ஆதரிக்கிறீர்களா?</p>
					<div class="radio">
						<label><input type="radio" name="quiz1"  value="ஆம்">ஆம்</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="quiz1"  value="இல்லை">இல்லை</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="quiz1"  value="கருத்து இல்லை">கருத்து இல்லை</label>
					</div>
					<span class="errors" id="error_1"></span>
					<input type="hidden" name="question_1" value="ஜல்லிக்கட்டை நீங்கள் ஆதரிக்கிறீர்களா?">
				</section>
				<h3>question2</h3>
				<section>
					<p>2. ஜல்லிக்கட்டு விஷயத்தில் தமிழர்களை மத்திய / மாநில அரசுகள் ஏமாற்றுகின்றனவா?</p>
					<div class="radio">
						<label><input type="radio" name="quiz2" value="ஆம்">ஆம்</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="quiz2" value="இல்லை">இல்லை</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="quiz2" value="சட்டச் சிக்கல்">சட்டச் சிக்கல்</label>
					</div>
					<span class="errors" id="error_2"></span>
					<input type="hidden" name="question_2" value="ஜல்லிக்கட்டு விஷயத்தில் தமிழர்களை மத்திய / மாநில அரசுகள் ஏமாற்றுகின்றனவா?">
				</section>
				<h3>question3</h3>
				<section>
					<p>3. பீட்டா போன்ற அமைப்புகள் தேவையா?</p>
					<div class="radio">
						<label><input type="radio" name="quiz3" value="ஆம்">ஆம்</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="quiz3" value="இல்லை">இல்லை</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="quiz3" value="கருத்து இல்லை">கருத்து இல்லை</label>
					</div>
					<span class="errors" id="error_3"></span>
					<input type="hidden" name="question_3" value="பீட்டா போன்ற அமைப்புகள் தேவையா?">
				</section>
				<h3>question4</h3>
				<section>
					<p>4. ஜல்லிக்கட்டு விஷயத்தில் மாணவர்கள் தங்களை ஈடுபடுத்திக்கொள்வது?</p>
					<div class="radio">
						<label><input type="radio" name="quiz4" value="தேவை">தேவை</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="quiz4" value="தேவையற்ற ஒன்று">தேவையற்ற ஒன்று</label>
					</div>
					<div class="radio">
						<label><input type="radio"  name="quiz4" value="கருத்து இல்லை">கருத்து இல்லை</label>
					</div>
					<span class="errors" id="error_4"></span>
					<input type="hidden" name="question_4" value="ஜல்லிக்கட்டு விஷயத்தில் மாணவர்கள் தங்களை ஈடுபடுத்திக்கொள்வது?">
				</section>
				<h3>question5</h3>
				<section>
					<p>5. ஜல்லிக்கட்டுக்கு திரைத் துறையினரின் ஆதரவு தேவையா?</p>
					<div class="radio">
						<label><input type="radio" name="quiz5" value="நிச்சயம் தேவை">நிச்சயம் தேவை</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="quiz5" value="தேவையில்லை">தேவையில்லை</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="quiz5" value="கருத்து இல்லை">கருத்து இல்லை</label>
					</div>
					<span class="errors" id="error_5"></span>
					<input type="hidden" name="question_5" value="ஜல்லிக்கட்டுக்கு திரைத் துறையினரின் ஆதரவு தேவையா?">
				</section>
				<h3>question6</h3>
				<section>
					<p>6. ஜல்லிக்கட்டை சர்வதேச அளவிலான பிரச்னையாக முன்னெடுக்கலாமா?</p>
					<div class="radio">
						<label><input type="radio" name="quiz6" value="ஆம்">ஆம்</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="quiz6" value="இல்லை">இல்லை</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="quiz6" value="கருத்து இல்லை">கருத்து இல்லை</label>
					</div>
					<span class="errors" id="error_6"></span>
					<input type="hidden" name="question_6" value="ஜல்லிக்கட்டை சர்வதேச அளவிலான பிரச்னையாக முன்னெடுக்கலாமா?">
				</section>
				<h3>question7</h3>
				<section>
					<p>7. ஜல்லிக்கட்டு விஷயத்தில் தமிழக அரசியல் கட்சிகளின் நிலைப்பாடு எப்படி இருக்கிறது?</p>
					<div class="radio">
						<label><input type="radio" name="quiz7" value="நன்றாக இருக்கிறது">நன்றாக இருக்கிறது</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="quiz7" value="சொல்லிக்கொள்ளும்படி இல்லை">சொல்லிக்கொள்ளும்படி இல்லை</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="quiz7" value="கருத்து இல்லை">கருத்து இல்லை</label>
					</div>
					<span class="errors" id="error_7"></span>
					<input type="hidden" name="question_7" value="ஜல்லிக்கட்டு விஷயத்தில் தமிழக அரசியல் கட்சிகளின் நிலைப்பாடு எப்படி இருக்கிறது?">
				</section>
				<h3>question8</h3>
				<section>
					<p>8. ஜல்லிக்கட்டு குறித்து தமிழக அரசின் மௌனம் ஏற்புடையதா?</p>
					<div class="radio">
						<label><input type="radio" name="quiz8" value="சட்டச் சிக்கல்">சட்டச் சிக்கல்</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="quiz8" value="ஆம்">ஆம்</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="quiz8" value="இல்லை"> இல்லை</label>
					</div>
					<span class="errors" id="error_8"></span>
					<input type="hidden" name="question_8" value="ஜல்லிக்கட்டு குறித்து தமிழக அரசின் மௌனம் ஏற்புடையதா?">
				</section>
				<h3>question9</h3>
				<section>
					<p>9. ஜல்லிக்கட்டு போல் பிற பண்பாட்டு / கலாசார உரிமைகளை தமிழகம் இழந்து வருகிறதா?</p>
					<div class="radio">
						<label><input type="radio" name="quiz9" value="ஆம்">ஆம்</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="quiz9" value="இல்லை">இல்லை</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="quiz9" value="கருத்து இல்லை"> கருத்து இல்லை</label>
					</div>
					<span class="errors" id="error_9"></span>
					<input type="hidden" name="question_9" value="ஜல்லிக்கட்டு போல் பிற பண்பாட்டு / கலாசார உரிமைகளை தமிழகம் இழந்து வருகிறதா?">
				</section>
				<h3>question10</h3>
				<section>
					<p>10. ஜல்லிக்கட்டு போராட்டம் போல், விவசாயிகள், காவிரி / முல்லைப் பெரியாறு, இலங்கைத் தமிழர், மீனவர் பிரச்னை போன்றவற்றுக்கும் மக்கள் முக்கியத்துவமும் முன்னுரிமையும் தருகிறார்களா?</p>
					<div class="radio">
						<label><input type="radio"  name="quiz10" value="ஆம்">ஆம்</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="quiz10" value="இல்லை">இல்லை</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="quiz10" value="கருத்து இல்லை"> கருத்து இல்லை</label>
					</div>
					<span class="errors" id="error_10"></span>
					<input type="hidden" name="question_10" value="ஜல்லிக்கட்டு போராட்டம் போல், விவசாயிகள், காவிரி / முல்லைப் பெரியாறு, இலங்கைத் தமிழர், மீனவர் பிரச்னை போன்றவற்றுக்கும் மக்கள் முக்கியத்துவமும் முன்னுரிமையும் தருகிறார்களா?">
				</section>
				<h3>question11</h3>
				<section>
					<p>Please Enter your Details</p>
						<div class="form-group">
							<label>Enter Your Name:<sup>*</sup></label>
							<input type="text" name="username" class="form-control">
						</div>
						<div class="form-group">
							<label>Enter Your Age:<sup>*</sup></label>
							<input type="number" name="age" class="form-control">
						</div>
						<div class="form-group">
							<label>Enter Your Mobile Number:</label>
							<input type="text" name="phone" class="form-control">
						</div>
						<div class="form-group">
							<label>Enter Your Email:<sup>*</sup></label>
							<input type="email" name="email" class="form-control">
							<input type="hidden" name="question_11" value="submit-form">
						</div>
						<span class="errors" id="error_11"></span>
				</section>
			</div>
			</form>
		</div>
	</div>

<div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "><div class="widget-container widget-container-170"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></div></div>

</div></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "><div class="widget-container widget-container-150">
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-bottom-10">
    <div class="ad_script_6585" id="ad_script_6585"   style="text-align:center;">
                      </div>
  </div>
</div>
</div></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "><div class="widget-container widget-container-150">
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-bottom-10">
    <div class="ad_script_4543" id="ad_script_4543"   style="text-align:center;">
                      </div>
  </div>
</div>
</div></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "></div></div><div class="row"><div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12  "></div><div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12  "></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "></div></div><div class="row"><div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12  "></div><div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12  "></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "><div class="widget-container widget-container-150">
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-bottom-10">
    <div class="ad_script_5203" id="ad_script_5203"   style="text-align:center;">
                      </div>
  </div>
</div>
<script type="text/javascript">
  // jQuery used as an example of delaying until load.
  $(function() {
  setTimeout(function(){
  var adscript = '';
    postscribe('#ad_script_5203', "<!-- Javascript tag: -->\n<!-- begin ZEDO for channel:  DNM_Home_StayonFooter , publisher: Dinamani , Ad Dimension: stay on footer - 1 x 1 -->\n<script language=\"JavaScript\">\nvar zflag_nid=\"791\"; var zflag_cid=\"566\"; var zflag_sid=\"4\"; var zflag_width=\"1\"; var zflag_height=\"1\"; var zflag_sz=\"87\"; \n<\/script>\n<script language=\"JavaScript\" src=\"http:\/\/d3.zedo.com\/jsc\/d3\/fo.js\"><\/script>\n<!-- end ZEDO for channel:  DNM_Home_StayonFooter , publisher: Dinamani , Ad Dimension: stay on footer - 1 x 1 -->", {
      done: function() {
        //console.info('Dblclick script has been delivered.');
		//alert('script delievered successfully');
      }
    });
	}, 3000);
  });
</script></div></div></div><div class="row"><div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12  "><div class="widget-container widget-container-150">

<script type="text/javascript">
  // jQuery used as an example of delaying until load.
  $(function() {
  setTimeout(function(){
  var adscript = '';
    postscribe('#ad_script_7224', "<div  style=\"border:1px solid #ccc;padding:10px;\"><a href=\"http:\/\/www.knowledgehut.com\/courses\"\nstyle=\"font-size:18px;font-weight:bold;color:#000;\"  target=\"_blank\">Online training for Professional<\/a> <p style=\"text-align:right;font-size:10px;color:blue;font-style:italic;width:100%;\">Sponsored link<\/p><\/div>", {
      done: function() {
        //console.info('Dblclick script has been delivered.');
		//alert('script delievered successfully');
      }
    });
	}, 3000);
  });
</script></div></div><div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12  "><div class="widget-container widget-container-150">
<script type="text/javascript">
  // jQuery used as an example of delaying until load.
  $(function() {
  setTimeout(function(){
  var adscript = '';
    postscribe('#ad_script_7225', "<div  style=\"border:1px solid #ccc;padding:10px;\"><a href=\"https:\/\/www.zeolearn.com\/all-courses\"\nstyle=\"font-size:18px;font-weight:bold;color:#000;\"  target=\"_blank\">Online training for developers<\/a> <p style=\"text-align:right;font-size:10px;color:blue;font-style:italic;width:100%;\">Sponsored link<\/p><\/div>", {
      done: function() {
        //console.info('Dblclick script has been delivered.');
		//alert('script delievered successfully');
      }
    });
	}, 3000);
  });
</script></div></div></div>    <!--</div>
</section>--></div><div class=" col-lg-4 col-md-4 col-sm-12 col-xs-12  "><!--<section class="section-content">
<div class="container SectionContainer">-->
<div class="row">
<div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  adv_container">
	<!-- Javascript tag: -->
<!-- begin ZEDO for channel:  Dinamani_Article_300x250_DGM , publisher: Dinamani , Ad Dimension: Medium Rectangle - 300 x 250 -->
<script language="JavaScript">
var zflag_nid="791"; var zflag_cid="662"; var zflag_sid="4"; var zflag_width="300"; var zflag_height="250"; var zflag_sz="9";
</script>
<script language="JavaScript" src="http://d3.zedo.com/jsc/d3/fo.js"></script>
<!-- end ZEDO for channel:  Dinamani_Article_300x250_DGM , publisher: Dinamani , Ad Dimension: Medium Rectangle - 300 x 250 -->
</div>
</div> 
	<div class="row">
	<div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "><div class="widget-container widget-container-188"><div class="row">
	
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div id="parentHorizontalTab1142">
<div class="most-read-content">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<ul class="resp-tabs-list hor_1 most-read-li">
<li id="most_read_tab">அதிகம் </br>படிக்கப்பட்டவை</li>
<li id="most_email_tab">அதிகம் இ-மெயில் செய்யப்பட்டவை</li>
<!--<li id="most_commented_tab">அதிகம் </br>விமரிசிக்கப்பட்டவை</li>-->
</ul>
</div>
</div>
<div class="resp-tabs-container hor_1 cinema-tab">
<div>
<div class="row">
<article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<ul class="lead-list more-read" id="most_read">
</ul>
<article>
</div>
</div>
<div>
<div class="row">
<article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<ul class="lead-list more-read" id="most_email">
</ul>
<article>
</div>
<!--<div class="row">
<article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<ul class="lead-list more-read" id="most_comments">
</ul>
<article>
</div>-->
</div>
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">

var most_article = function(){
var most_type = '';
var most_name = '';

obj = {};

obj.Init = function(most_type){
most_name = most_type;
}

obj.Start = function(){
document.getElementById(most_name).innerHTML = '<div class="cssload-container" id="add_article_process_imgtest" style="display:block;"><div class="cssload-zenith"></div></div>';
}

obj.FillMostRead = function() {
$.ajax({
url			: 'http://www.dinamani.com/user/commonwidget/get_most_read_content',
method		: 'get',
data		: { type: most_name, param: '',mode:'live'},
success		: function(result){ 
$('#'+most_name).html(result).hide().fadeIn({ duration: 2000 });
},
error: function (error) {			
document.getElementById(most_name).innerHTML = 'Failed to load the content...';
}
});
}	


return obj;

};


var most_read = most_article();
var most_email = most_article();

most_read.Init('most_read');
most_read.Start();
most_read.FillMostRead();

$(document).ready(function() {
$('#parentHorizontalTab1142').easyResponsiveTabs({ activate: function(event, tab){
//alert('tab');

//accordion load
var list =$('#parentHorizontalTab1142 .resp-tab-item').attr('aria-controls');
var accord=$('#parentHorizontalTab1142 .resp-accordion').attr('aria-controls');
//console.log(accord);
var itemCount = 0;
$( "#parentHorizontalTab1142 .resp-tab-item" ).each(function() {
if(list==accord){
var idattr = $(this).attr('id');
var category_attr = $(this).attr('data-contentype');
$('#parentHorizontalTab1142 .resp-accordion:eq(' + itemCount + ')').attr('id',idattr);
$('#parentHorizontalTab1142 .resp-accordion:eq(' + itemCount + ')').attr('data-contentype',category_attr);
}
itemCount++;
});

if ($(this).attr('id') == 'most_read_tab'){
most_read.Init('most_read');
most_read.Start();
most_read.FillMostRead();
}
if ($(this).attr('id') == 'most_email_tab'){ // most_email_tab //most_commented_tab
most_email.Init('most_email');  //most_email //most_comments
most_email.Start();
most_email.FillMostRead();
}
},

});
});
</script>
</div></div></div>

<div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "></div></div><div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "></div>   <!--</div> </section>--></div></div></div></div>
   <!--</div></section>--></div></div></div></section><section class="section-footer">
<footer class="container FooterContainer">
	<div class="row"><div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12  "><div class="widget-container widget-container-327"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer1">
  <div class="col-lg-1 col-md-1 col-xs-12">
    <figure class="nie"><a href="#"><img src="http://images.dinamani.com/images/FrontEnd/images/group.jpg" /></a></figure>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
    <div class="news"><a href="javascript:void(0)" class="scrollToTop"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
      <h3 class="foot_head">NEWS LETTER</h3>
      <div class="newsbox">
        <form class="navbar-form news_form" id="newsletter_form" name="newsletter_form" role="search" action="http://www.dinamani.com/user/common_widget/subscribe_newsletter">
          <div class="input-group">
            <input type="text" class="form-control ntb"  placeholder="மின்னஞ்சல்" name="email_newsletter" id="email-newsletter" disabled>
            <div class="input-group-btn">
              <button class="btn btn-default btn-back" id="submit_newsletter" type="button" disabled><i class="fa fa-chevron-right"></i></button>
            </div>
          </div>
        </form>
        
      </div>
      <span id="news_error_throw"></span> 
    </div>
  </div>
  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
        <div class="follow">
      <h3 class="foot_head">FOLLOW US</h3>
      <div class="footer_social"> <a class="fb" href="http://www.facebook.com/DinamaniDaily"><i class="fa fa-facebook"></i></a> <a class="google" href="https://plus.google.com/116307064799770204456/"><i class="fa fa-google-plus"></i></a> <a class="twit" href="http://twitter.com/DINAMANI"><i class="fa fa-twitter"></i></a> <a class="rss" href="http://launch.dinamani.com/rss/"><i class="fa fa-rss"></i></a> </div>
    </div>
  </div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer2bac">
  <div class="footer2">
    <p>Copyright - Express Network Pvt Ltd - 2017</p>
   <!-- <p> <a class="AllTopic" href="http://www.dinamani.com/">முகப்பு | </a> <a class="AllTopic" href="http://www.dinamani.com/Sports">விளையாட்டு | </a> <a class="AllTopic" href="http://www.dinamani.com/Cinema">சினிமா | </a> <a class="AllTopic" href="http://www.dinamani.com/Junction">ஜங்ஷன் | </a> <a class="AllTopic" href="http://www.dinamani.com/job">வேலைவாய்ப்பு | </a> <a class="AllTopic" href="http://www.dinamani.com/Religion">ஆன்மிகம் </a></p>-->
    <p> <a class="AllTopic" href="http://www.dinamani.com/Contact-Us">Contact Us | </a> <a class="AllTopic" href="http://www.dinamani.com/About-Us">About Us | </a> <a class="AllTopic" href="http://www.dinamani.com/Privacy-Policy">Privacy Policy | </a> <a class="AllTopic" href="http://www.dinamani.com/Terms-of-Use">Terms of Use | </a> <a class="AllTopic" href="http://www.dinamani.com/Advertise-With-Us">Advertise With Us </a></p>
  </div>
</div>
<script>
var $ = $.noConflict();
$(document).ready(function( $ ){
    scrollToTop.init( );
});
var scrollToTop =
{
    init: function(  ){
        //Check to see if the window is top if not then display button
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollToTop').fadeIn();
            } else {
                $('.scrollToTop').fadeOut();
            }
        });
        // Click event to scroll to top
        $('.scrollToTop').click(function(){
            $('html, body').animate({scrollTop : 0},800);
            return false;
        });
    }
};
</script>
</div></div></div></footer>
</section> 
<!--<script src="http://images.dinamani.com/js/FrontEnd/js/slider-custom-lazy.min.js" type="text/javascript"></script> 
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
  $('.article_click').click(function(){localStorage.setItem("callback_url", window.location);});
  });
</script> 
<!--nav fixed end-->
 <link rel="stylesheet" href="http://images.dinamani.com/css/FrontEnd/css/datepicker.css" type="text/css">
<script src="http://images.dinamani.com/js/FrontEnd/js/bootstrap-datepicker.js" type="text/javascript"></script>

<script type="text/javascript">
 var base_url = "http://www.dinamani.com/";
 var css_url  = "http://images.dinamani.com/css/FrontEnd/";
</script>
<script type="text/javascript" src="http://images.dinamani.com/js/FrontEnd/js/custom.js"></script>
<script type="text/javascript" src="http://images.dinamani.com/js/FrontEnd/js/cinema-slide.js"></script> 
<script type="text/javascript" src="http://images.dinamani.com/js/FrontEnd/js/jssor.js"></script> 
<script type="text/javascript" src="http://images.dinamani.com/js/FrontEnd/js/jssor.slider.js"></script>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-2311935-31', 'auto');
ga('send', 'pageview');
</script>
<script src="http://images.dinamani.com/js/FrontEnd/js/postscribe.min.js"></script>


</html>