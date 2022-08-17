<?php 
$is_home             = $content['is_home_page'];
$is_summary_required = $content['widget_values']['cdata-showSummary'];
$widget_section_url  = $content['widget_section_url'];
$domain_name         = base_url();
$view_mode           = $content['mode'];
//if($this->uri->segment(1)!= "niecpan"){ 
if($view_mode == "live"){ 
$page_details	     = $this->widget_model->get_template_xmlcontent($content['widget_values']['data-widgetpageid'], ''); 
$page_menu_id        =  $page_details['menuid'];
}else{
$page_id 		     = $this->uri->segment('4');
$page_details	     = $this->widget_model->get_template_xmlcontent($page_id , '');
$page_menu_id        =  $page_details['menuid'];
}
$activesectionid = $page_details['menuid'];
if($page_details['menuid']==10000){
/*$menu_url_segment 	= explode("/",$this->uri->uri_string());
$segment_part       = (count($menu_url_segment)> 1) ? 2 : 1;
$page_name	        = $this->uri->segment($segment_part);

$page_details 	     = $this->widget_model->get_section_by_urlname($page_name , $view_mode);
*/
if($page_details['pagetype']!=2){
$activesectionid     = $content['page_param'];
$page_menu_id        = $content['page_param'];
}else{
$menu_url_segment 	= explode("/",$this->uri->uri_string());
$segment_part       = (count($menu_url_segment)-4);	
//print_r($segment_part);exit;
switch($segment_part)
	{
		case 1:
			$special_section	= '';
			$url_parent_section = '';
			$url_sub_section 	= $menu_url_segment[0];
		break;
		case 2:
			$special_section	 = '';
			$url_parent_section  = $menu_url_segment[0];
			$url_sub_section 	 = $menu_url_segment[1];
		break;
		case 3:
			$special_section	= $menu_url_segment[0];
			$url_parent_section = $menu_url_segment[1];
			$url_sub_section 	= $menu_url_segment[2];
	}	
	//var_dump($url_parent_section,$url_sub_section, $special_section);exit;
	$url_section_details = $this->widget_model->get_sectionid_with_names($url_sub_section, $url_parent_section, $special_section);	 //live db	
$page_details = $url_section_details[0];
$activesectionid     = $page_details['Section_id'];
$page_menu_id        = $page_details['Section_id'];
}
if($activesectionid=="home")
{
$page_details 	     = $this->widget_model->get_section_by_urlname("Home" , $view_mode);	
$activesectionid     = $page_details['Section_id'];
$page_menu_id        = $page_details['Section_id'];
}
}

$parent_section = $this->widget_model->get_parent_sectionmane($activesectionid, $view_mode);	
			
$parent_sectionname = "";
if(count($parent_section)>0)
{
	$parent_sectionname = $parent_section['Sectionname'];
}
				
/*function CheckTopParentSection($section_id) {
	 $widget_model = new Widget_model;
     $Section_Details = $widget_model->get_section_by_id($section_id);
	//$Section_Details = $this->widget_model->get_section_by_id($section_id); 
	
	if(isset($Section_Details['ParentSectionID']))
		return $Section_Details['ParentSectionID'];
	else 
		return 0;
}*/

	if(isset($activesectionid)) {
	
		if($activesectionid != '') {
              $Section_Details =  $this->widget_model->get_sectionDetails($activesectionid, $view_mode); // live db
				if($Section_Details['IsSubSection'] == '0' && $Section_Details['IsSeperateWebsite'] == '1') {
				$section_mapping 	= $this->widget_model->multiple_section_mapping_by_section_id($page_menu_id);

				$home_section 	= array($this->widget_model->get_sectionid_by_name("Home", $view_mode));
				$section_mapping = array_merge($home_section, $section_mapping);
				}else if((count($parent_section)>0 && $parent_section['IsSeperateWebsite'] == '1') &&( $Section_Details['IsSeperateWebsite'] == '0' ||  $Section_Details['IsSeperateWebsite'] == '1')) { 
				$CheckTopParentSection = $this->widget_model->CheckTopParentSection($Section_Details['ParentSectionID']);
				if($CheckTopParentSection == 0)
				{
				$section_mapping 	= $this->widget_model->multiple_section_mapping_by_section_id($Section_Details['ParentSectionID']);
				$home_section 	= array($this->widget_model->get_sectionid_by_name("Home", $view_mode));
				$section_mapping = array_merge($home_section, $section_mapping);
				}
				else 
				$section_mapping 	= $this->widget_model->multiple_section_mapping_by_section_id($CheckTopParentSection);
				}  
			else {
				$section_mapping 	= $this->widget_model->multiple_section_mapping();
			}
			
		}
	
	}
?>

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
		<a class="navbar-brand home_logo" rel="home" href="<?php echo base_url(); ?>"><i class="fa fa-home"></i></a>
	</div>
	
	<div class="collapse navbar-collapse">
		
		<ul class="nav navbar-nav menus">
          <?php
		  if(isset($section_mapping)) { 
			 $Section_Count  = 0;

				 foreach($section_mapping as $mapping) {  
				 $Section_Count++;

			   $url_section_value = $mapping['URLSectionStructure'];
			   $MainSectionPageURL = base_url(). $url_section_value;												
					 				
				 if(strtolower($mapping['Sectionname']) != "home" && $mapping['Sectionname']!='முகப்பு')
				 {
					 
					 	if(((strtolower($Section_Details['Sectionname']) == strtolower($mapping['Sectionname'])) && $Section_Details['IsSubSection'] == '0') || (strtolower($parent_sectionname) == strtolower($mapping['Sectionname'])))
						{
				 ?>
          <li class="<?php  if(!empty( $mapping['sub_section'])) { echo "CitiesHover";  } else { echo "StatesHover";  } ?>" ><a class="MenuItem active" id="maintabs-<?php echo $mapping['Section_id']; ?>" <?php if(count($mapping['sub_section']) == 0) { ?> onmouseover="show_main_menu('<?php echo $mapping['Section_id'];?>', 'main')" <?php } else { ?> onmouseover="show_main_menu('<?php echo $mapping['sub_section'][0]['Section_id']; ?>','<?php echo $mapping['Section_id'];?>')"  <?php }?> href="<?php echo $MainSectionPageURL; ?>"><?php echo preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$mapping['SectionnameInHTML']); ?></a>
            <?php
						}
						elseif((strtolower($Section_Details['Sectionname']) == strtolower($mapping['Sectionname'])) && $Section_Details['IsSubSection'] == '1' && $parent_section['IsSeperateWebsite'] == '1')
						{ 
				 ?>
          <li class="<?php  if(!empty( $mapping['sub_section'])) { echo "CitiesHover";  } else { echo "StatesHover";  } ?>" ><a class="MenuItem active"  id="maintabs-<?php echo $mapping['Section_id']; ?>" <?php if(count($mapping['sub_section']) == 0) { ?> onmouseover="show_main_menu('<?php echo $mapping['Section_id'];?>', 'main')" <?php } else { ?> onmouseover="show_main_menu('<?php echo $mapping['sub_section'][0]['Section_id']; ?>','<?php echo $mapping['Section_id'];?>')"  <?php }?> href="<?php echo $MainSectionPageURL; ?>"><?php echo preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$mapping['SectionnameInHTML']); ?></a>
            <?php
						}else
						{
				 ?>
          <li class="<?php  if(!empty( $mapping['sub_section'])) { echo "CitiesHover";  } else { echo "StatesHover";  } ?>" ><a class="MenuItem"  id="maintabs-<?php echo $mapping['Section_id']; ?>" <?php if(count($mapping['sub_section']) == 0) { ?> onmouseover="show_main_menu('<?php echo $mapping['Section_id'];?>', 'main')" <?php } else { ?> onmouseover="show_main_menu('<?php echo $mapping['sub_section'][0]['Section_id']; ?>','<?php echo $mapping['Section_id'];?>')"  <?php }?> href="<?php echo $MainSectionPageURL; ?>"><?php echo preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$mapping['SectionnameInHTML']); ?></a>
            <?php
						}
					
				 ?>
         <?php if(!empty( $mapping['sub_section']) && strtolower($mapping['Sectionname']) != "lifestyle" && strtolower($mapping['Sectionname']) != "columns" && strtolower($mapping['Sectionname']) != "magazine") { ?>
            <div class="MultiCities" id="tabs<?php echo $mapping['Section_id']; ?>">
              <ul class="MultiCitiesList">
                <?php $i=1; foreach($mapping['sub_section'] as $key=>$sub_section) {
					$subSectionPageURL = base_url().$sub_section['URLSectionStructure'];
							 ?>
                <li class="<?php echo ($i==1)?'active':'';?>" data-target="#tabs-<?php echo $sub_section['Section_id']; ?>"><a href="<?php echo $subSectionPageURL;?>" id="subtabs-<?php echo $sub_section['Section_id']; ?>" onmouseover="show_main_menu('<?php echo $sub_section['Section_id']; ?>','')" data-id="<?php echo $sub_section['Section_id']; ?>" ><?php echo preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$sub_section['SectionnameInHTML']); ?><i class="fa fa-chevron-right"></i></a></li>
                <?php 	
					$i++;
						if($key  == 6)
							break;
					} ?>
              </ul>
              <?php if(!empty( $mapping['sub_section'])) { ?>
              <div class="MultiCitiesContents tab-content">
                <?php $i=1; foreach($mapping['sub_section'] as $key=>$sub_section) { 
					?>
                <div id="tabs-<?php echo $sub_section['Section_id']; ?>" class="MultiCitiesCont tab-pane <?php echo ($i==1)?'active':'';?>">
                  <!-- Sub menu content appear here-->
                </div>
                <?php 
					$i++;
					}?>
              </div>
              <?php 
					
					} ?>
            </div>
            <?php } else { ?>
            <div class="MultiStatesContents MultiCitiesCont" id="maintabs_content-<?php echo $mapping['Section_id'];?>">
             <!-- Main menu content appear here-->
            </div>
            <?php } ?>
          </li>
          <?php
				 }
				 else
				 {
					 if(strtolower($Section_Details['Sectionname']) == 'home' || $Section_Details['Sectionname'] == 'முகப்பு')
					 {
				 ?>
          <li class="index_hide active"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i></a></li>
          <?php 
                     }
                     else
                     { ?>
          <li class="index_hide "><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i></a></li>
          <?php }
					 }
				if ($Section_Count == 10 ) 
				break;   
				
				}
			 } 
			 
			
			 
			 ?>
          <li class="AllSectionHover" id="AllSectionHoverId"><a class="MenuItem" href="javascript:void(0);">அனைத்து பிரிவுகள்  &nbsp;<i class="fa fa-chevron-down"></i></a>
            
            <div class="MultiSection">
               <ul class="MultiSectionList">
            <li><a class="AllTopic" href="<?php echo base_url(); ?>">முகப்பு</a></li>
            <li><a class="AllTopic" href="<?php echo base_url()."specials/chudachuda"; ?>">சுடச்சுட</a></li>
            <li><a class="AllTopic" href="<?php echo base_url()."latest_news"; ?>">தற்போதைய செய்திகள்</a>
            <ul>
            <li><a class="AllList" href="<?php echo base_url()."latest_news/mukkiya_seithikal"; ?>"><i class="fa fa-caret-right"></i> முக்கியச் செய்திகள்</a></li>
            <li><a class="AllList" href="<?php echo base_url()."latest_news"; ?>"><i class="fa fa-caret-right"></i> தலைப்புச் செய்திகள்</a></li>
            </ul>
            </li>
            <li><a class="AllTopic" href="<?php echo base_url()."tamilnadu"; ?>">தமிழ்நாடு</a>
            <ul>
            <li> <a class="AllList" href="<?php echo base_url()."tamilnadu/chennai"; ?>"><i class="fa fa-caret-right"></i> சென்னை</a></li>
            <li><a class="AllList" href="<?php echo base_url()."tamilnadu"; ?>"><i class="fa fa-caret-right"></i> திருச்சி</a></li>
            <li><a class="AllList" href="<?php echo base_url()."tamilnadu"; ?>"><i class="fa fa-caret-right"></i> மதுரை</a></li>
            <li> <a class="AllList" href="<?php echo base_url()."tamilnadu/coimbatore"; ?>"><i class="fa fa-caret-right"></i> கோயம்புத்தூர்</a></li>
            <li><a class="AllList" href="<?php echo base_url()."tamilnadu"; ?>"><i class="fa fa-caret-right"></i> திருநெல்வேலி</a></li>
            <li><a class="AllList" href="<?php echo base_url()."tamilnadu"; ?>"><i class="fa fa-caret-right"></i> சேலம்</a></li>
            </ul>
            </li>
            <li><a class="AllTopic" href="<?php echo base_url()."india"; ?>">இந்தியா</a></li>
            <li><a class="AllTopic" href="<?php echo base_url()."world"; ?>">உலகம்</a></li>
            <li><a class="AllTopic" href="<?php echo base_url()."sports"; ?>">விளையாட்டு</a>
            <ul>
            <li> <a class="AllList" href="<?php echo base_url()."sports/sports_news"; ?>"><i class="fa fa-caret-right"></i> செய்திகள்</a></li>
            <li><a class="AllList" href="<?php echo base_url()."videos/videos_sports"; ?>"><i class="fa fa-caret-right"></i> வீடியோ</a></li>
            <li><a class="AllList" href="<?php echo base_url()."galleries/sports_gallery"; ?>"><i class="fa fa-caret-right"></i> புகைப்படங்கள்</a></li>
            </ul>
            </li>
            <li><a class="AllTopic" href="<?php echo base_url()."business"; ?>">வர்த்தகம்</a>
            <li><a class="AllTopic" href="<?php echo base_url()."cinema"; ?>">சினிமா</a>
            <ul>
            <li> <a class="AllList" href="<?php echo base_url()."cinema/cinema_news"; ?>"><i class="fa fa-caret-right"></i> செய்திகள்</a></li>
            <li><a class="AllList" href="<?php echo base_url()."videos/cinema"; ?>"><i class="fa fa-caret-right"></i> வீடியோ</a></li>
            <li><a class="AllList" href="<?php echo base_url()."galleries/cinema"; ?>"><i class="fa fa-caret-right"></i> புகைப்படங்கள்</a></li>
            </ul>
            </li>
            <li><a class="AllTopic" href="<?php echo base_url()."religion"; ?>">ஆன்மிகம்</a>
            <ul>
            <li><a class="AllList" href="<?php echo base_url()."religion"; ?>"><i class="fa fa-caret-right"></i> செய்திகள்</a></li>
            <!--<li><a class="AllList" href="<?php echo base_url()."audios/audio_aanmeegam"; ?>"><i class="fa fa-caret-right"></i> ஆடியோ</a></li>-->
            <li><a class="AllList" href="<?php echo base_url()."videos/spiritual"; ?>"><i class="fa fa-caret-right"></i> வீடியோ</a></li>
            <li><a class="AllList" href="<?php echo base_url()."galleries/gelleries_aanmeegam"; ?>"><i class="fa fa-caret-right"></i> புகைப்படங்கள்</a></li>
            </ul>
            </li>
            </ul>
               <ul class="MultiSectionList">
            <!--<li><a class="AllTopic" href="javascript:void(0);">அனைத்துப் பிரிவுகள்</a></li>-->
            <li><a class="AllTopic" href="<?php echo base_url()."junction"; ?>">ஜங்ஷன்</a>
            <ul>
            <li><a class="AllList" href="<?php echo base_url()."junction/pazhuppu-nira-pakkangal"; ?>"><i class="fa fa-caret-right"></i> பழுப்பு நிறப் பக்கங்கள்</a></li>
            <li><a class="AllList" href="<?php echo base_url()."junction/arithalin-ellaiyil"; ?>"><i class="fa fa-caret-right"></i> அறிதலின் எல்லையில்</a></li>
            <li><a class="AllList" href="<?php echo base_url()."junction/paleo-diet"; ?>"><i class="fa fa-caret-right"></i> பேலியோ டயட்</a></li>
            <li><a class="AllList" href="<?php echo base_url()."junction/Lee-Kuwan-Yee"; ?>"><i class="fa fa-caret-right"></i> லீ குவான் யூ</a></li>
            <li><a class="AllList" href="<?php echo base_url()."junction/azhagiya-maram"; ?>"><i class="fa fa-caret-right"></i> அழகிய மரம்</a></li>
            <li><a class="AllList" href="<?php echo base_url()."junction/thaththuva-dharisanam"; ?>"><i class="fa fa-caret-right"></i> தத்துவ தரிசனம்</a></li>
            <li><a class="AllList" href="<?php echo base_url()."junction/yogam-tharum-yogam"; ?>"><i class="fa fa-caret-right"></i> யோகம் தரும் யோகம்</a></li>
            <li><a class="AllList" href="<?php echo base_url()."junction/duplex-veedhi"; ?>"><i class="fa fa-caret-right"></i> தியூப்ளே வீதி</a></li>
             <li><a class="AllList" href="<?php echo base_url()."junction/mudiyum-varai-kal"; ?>"><i class="fa fa-caret-right"></i> முடியும் வரை கல்</a></li>
            <li><a class="AllList" href="<?php echo base_url()."junction/kanavukkannigal"; ?>"><i class="fa fa-caret-right"></i> கனவுக்கன்னிகள்</a></li>
            <li><a class="AllList" href="<?php echo base_url()."junction/anbudai-nenjam"; ?>"><i class="fa fa-caret-right"></i> பண்புடை நெஞ்சம்</a></li>
            </ul>
            </li>
            <li><a class="AllTopic" href="<?php echo base_url()."education"; ?>">கல்வி</a></li>
             <li><a class="AllTopic" href="<?php echo base_url()."job"; ?>">வேலைவாய்ப்பு</a></li>
              <li><a class="AllTopic" href="<?php echo base_url()."Life-Style"; ?>">லைஃப்ஸ்டைல்</a></li>
              <li><a class="AllTopic" href="<?php echo base_url()."sutrula"; ?>">சுற்றுலா</a>
               <ul>
                <li><a class="AllList" href="<?php echo base_url()."sutrula/sutrula-tamilnadu"; ?>"><i class="fa fa-caret-right"></i> தமிழ்நாடு</a></li>
            <li><a class="AllList" href="<?php echo base_url()."sutrula/sutrula-india"; ?>"><i class="fa fa-caret-right"></i> இந்தியா</a></li>
            <li><a class="AllList" href="<?php echo base_url()."sutrula/sutrula-world"; ?>"><i class="fa fa-caret-right"></i> உலகம்</a></li>
            </ul>
               </li>
               <li><a class="AllTopic" href="<?php echo base_url()."weekly_supplements/tholliyalmani"; ?>">தொல்லியல்மணி</a>
               <ul>
                <li><a class="AllList" href="<?php echo base_url()."weekly_supplements/tholliyalmani/yuththa-bhoomi"; ?>"><i class="fa fa-caret-right"></i> யுத்தபூமி</a></li>
            <li><a class="AllList" href="<?php echo base_url()."weekly_supplements/tholliyalmani/pudhaiyunda-thamizhagam"; ?>"><i class="fa fa-caret-right"></i> புதையுண்ட தமிழகம்</a></li>
            </ul>
            </li>
             <li><a class="AllTopic" href="<?php echo base_url()."editorial_articles"; ?>">கட்டுரைகள்</a></li>
             <li><a class="AllTopic" href="<?php echo base_url()."agriculture"; ?>">விவசாயம்</a></li>
              <li><a class="AllTopic" href="<?php echo base_url()."astrology"; ?>">ஜோதிடம்</a></li>
              </ul>
               <ul class="MultiSectionList">
               
               
            
              <li><a class="AllTopic" href="<?php echo base_url()."weekly_supplements"; ?>">வார இதழ்கள்</a>
               <ul>
                <li><a class="AllList" href="<?php echo base_url()."weekly_supplements/kadhir"; ?>"><i class="fa fa-caret-right"></i> தினமணி கதிர்</a></li>
                 <li><a class="AllList" href="<?php echo base_url()."weekly_supplements/ilaignarmani-weekly"; ?>"><i class="fa fa-caret-right"></i> இளைஞர்மணி</a></li>
                  <li><a class="AllList" href="<?php echo base_url()."weekly_supplements/magalirmani-weekly"; ?>"><i class="fa fa-caret-right"></i> மகளிர்மணி</a></li>
                 <li><a class="AllList" href="<?php echo base_url()."weekly_supplements/siruvarmani"; ?>"><i class="fa fa-caret-right"></i> சிறுவர்மணி</a></li>
                  <li><a class="AllList" href="<?php echo base_url()."weekly_supplements/vellimani"; ?>"><i class="fa fa-caret-right"></i> வெள்ளிமணி</a></li>
                 <li><a class="AllList" href="<?php echo base_url()."weekly_supplements/tamil_mani"; ?>"><i class="fa fa-caret-right"></i> தமிழ்மணி</a></li>
            </ul>
            </li>
            <li><a class="AllTopic" href="<?php echo base_url()."specials"; ?>">ஸ்பெஷல்ஸ்</a>
               <ul>
                <li><a class="AllList" href="<?php echo base_url()."specials/dinam-oru-thiruvasagam"; ?>"><i class="fa fa-caret-right"></i> தினம் ஒரு திருவாசகம்</a></li>
                 <li><a class="AllList" href="<?php echo base_url()."specials/dinanthorum-thirupugal"; ?>"><i class="fa fa-caret-right"></i> தினந்தோறும் திருப்புகழ்</a></li>
                  <li><a class="AllList" href="<?php echo base_url()."religion/dinam-oru-devaram"; ?>"><i class="fa fa-caret-right"></i> தினம் ஒரு தேவாரம்</a></li>
                  <li><a class="AllList" href="<?php echo base_url()."specials/impressions"; ?>"><i class="fa fa-caret-right"></i> இந்த நாளில் அன்று</a></li>
                 <li><a class="AllList" href="<?php echo base_url()."specials/sirukathaimani"; ?>"><i class="fa fa-caret-right"></i> சிறுகதைமணி</a></li>
            </ul>
            </li>
             <li><a class="AllList" href="<?php echo base_url()."kadhaimani"; ?>"><i class="fa fa-caret-right"></i> கதைமணி</a></li>
                 <li><a class="AllList" href="<?php echo base_url()."astrology"; ?>"><i class="fa fa-caret-right"></i> பஞ்சாங்கம்</a></li>
                 <!-- <li><a class="AllList" href="<?php echo base_url()."tamil_mani"; ?>"><i class="fa fa-caret-right"></i> மக்கள் கருத்து</a></li>-->
                 <li><a class="AllList" href="<?php echo base_url()."tamil_mani"; ?>"><i class="fa fa-caret-right"></i> இது புதுசு</a></li>
                  <li><a class="AllList" href="<?php echo base_url()."world_tamils"; ?>"><i class="fa fa-caret-right"></i> உலகத் தமிழர்</a></li>
                 <li><a class="AllList" href="<?php echo base_url()."nadupakka_katturaigal"; ?>"><i class="fa fa-caret-right"></i> நடுப்பக்கக் கட்டுரைகள்</a></li>
                   <li><a class="AllList" href="<?php echo base_url()."tamil_mani"; ?>"><i class="fa fa-caret-right"></i> சிறப்புக் கட்டுரைகள்</a></li>
                 <li><a class="AllList" href="<?php echo base_url()."tamil_mani"; ?>"><i class="fa fa-caret-right"></i> நூல் அரங்கம்</a></li>
                  <li><a class="AllList" href="<?php echo base_url()."kitchen-corner"; ?>"><i class="fa fa-caret-right"></i> கிச்சன் கார்னர்</a></li>
                 <li><a class="AllList" href="<?php echo base_url()."videos"; ?>"><i class="fa fa-caret-right"></i> வீடியோ</a></li>
                  <li><a class="AllList" href="<?php echo base_url()."galleries"; ?>"><i class="fa fa-caret-right"></i> புகைப்படங்கள்</a></li>
                  <li><a class="AllList" href="<?php echo base_url()."vivadhamedai"; ?>"><i class="fa fa-caret-right"></i> விவாதமேடை</a></li>
                 <!-- <li><a class="AllList" href="<?php echo base_url()."tamil_mani"; ?>"><i class="fa fa-caret-right"></i> கருத்துக்களம்</a></li>-->
              </ul>
               <ul class="MultiSectionList">
                  <li><a class="AllList" href="<?php echo base_url()."aaraichimani"; ?>"><i class="fa fa-caret-right"></i> ஆராய்ச்சிமணி</a></li>
                 <!--<li><a class="AllList" href="<?php echo base_url()."weekly_supplements/tamil_mani"; ?>"><i class="fa fa-caret-right"></i> சிரிக்க… சிந்திக்க…</a></li>-->
                  <!--<li><a class="AllTopic" href="<?php echo base_url()."weekly_supplements/tamil_mani"; ?>">சட்ட ஆலோசனை</a>
                  <ul>
                   <li><a class="AllList" href="<?php echo base_url()."weekly_supplements/tamil_mani"; ?>"><i class="fa fa-caret-right"></i> வாரம் ஒரு சட்டம்</a></li>
                   </ul>
                  </li>-->
               
                  <li><a class="AllTopic" href="javascript:void(0);"> அனைத்துப் பதிப்புகள்</a>
                  <ul>
                   <li><a class="AllTopic" href="<?php echo base_url()."edition_chennai/chennai"; ?>"> சென்னை</a>
                   <ul>
                       <li><a class="AllList" href="<?php echo base_url()."edition_chennai/chennai"; ?>"><i class="fa fa-caret-right"></i> சென்னை</a></li>
                       <li><a class="AllList" href="<?php echo base_url()."edition_chennai/thiruvallur"; ?>"><i class="fa fa-caret-right"></i> திருவள்ளூர்</a></li>
                       <li><a class="AllList" href="<?php echo base_url()."edition_chennai/kanchipuram"; ?>"><i class="fa fa-caret-right"></i> காஞ்சிபுரம்</a></li>
                       <li><a class="AllList" href="<?php echo base_url()."edition_vellore/vellore"; ?>"><i class="fa fa-caret-right"></i> வேலூர்</a></li>
                       <li><a class="AllList" href="<?php echo base_url()."edition_vellore/thiruvannamalai"; ?>"><i class="fa fa-caret-right"></i> திருவண்ணாமலை்</a></li>
                   </ul>
                   </li>
                   </ul>
                  </li>
                  <li><a class="AllTopic" href="<?php echo base_url()."edition_trichy/trichy"; ?>">திருச்சி</a>
                        <ul>
                          <li><a class="AllList" href="<?php echo base_url()."edition_trichy/trichy"; ?>"><i class="fa fa-caret-right fa-lg"></i> திருச்சி</a></li>
                          <li><a class="AllList" href="<?php echo base_url()."edition_trichy/ariyalur"; ?>"><i class="fa fa-caret-right fa-lg"></i>  அரியலூர்</a></li>
                          <li> <a class="AllList" href="<?php echo base_url()."edition_trichy/karur"; ?>"><i class="fa fa-caret-right fa-lg"></i>  கரூர்</a></li>
                           <li><a class="AllList" href="<?php echo base_url()."edition_trichy/pudukottai"; ?>"><i class="fa fa-caret-right fa-lg"></i> புதுக்கோட்டை</a></li>
                          <li><a class="AllList" href="<?php echo base_url()."edition_trichy/tanjore"; ?>"><i class="fa fa-caret-right fa-lg"></i>  தஞ்சாவூர்</a></li>
                          <li> <a class="AllList" href="<?php echo base_url()."edition_trichy/perambalur"; ?>"><i class="fa fa-caret-right fa-lg"></i>  பெரம்பலூர்</a></li>
                           <li> <a class="AllList" href="<?php echo base_url()."edition_trichy/thiruvarur"; ?>"><i class="fa fa-caret-right fa-lg"></i>  திருவாரூர்</a></li>
                        </ul>
            </li>
            <li><a class="AllTopic" href="<?php echo base_url()."edition_madurai/madurai"; ?>">மதுரை</a>
                        <ul>
                          <li><a class="AllList" href="<?php echo base_url()."edition_madurai/madurai"; ?>"><i class="fa fa-caret-right fa-lg"></i> மதுரை</a></li>
                          <li><a class="AllList" href="<?php echo base_url()."edition_madurai/dindigul"; ?>"><i class="fa fa-caret-right fa-lg"></i>  திண்டுக்கல்</a></li>
                          <li> <a class="AllList" href="<?php echo base_url()."edition_madurai/theni"; ?>"><i class="fa fa-caret-right fa-lg"></i>  தேனி</a></li>
                           <li><a class="AllList" href="<?php echo base_url()."edition_madurai/sivagangai"; ?>"><i class="fa fa-caret-right fa-lg"></i>சிவகங்கை</a></li>
                          <li><a class="AllList" href="<?php echo base_url()."edition_madurai/virudhnagar"; ?>"><i class="fa fa-caret-right fa-lg"></i>  விருதுநகர்</a></li>
                          <li> <a class="AllList" href="<?php echo base_url()."edition_madurai/ramanathapuram"; ?>"><i class="fa fa-caret-right fa-lg"></i>  ராமநாதபுரம்</a></li>
                        </ul>
            </li>
              </ul>
               <ul class="MultiSectionList">
                  
                  <li><a class="AllTopic" href="<?php echo base_url()."edition_coimbatore/coimbatore"; ?>">கோயம்புத்தூர்</a>
                        <ul>
                          <li><a class="AllList" href="<?php echo base_url()."edition_coimbatore/coimbatore"; ?>"><i class="fa fa-caret-right fa-lg"></i> கோயம்புத்தூர்</a></li>
                          <li><a class="AllList" href="<?php echo base_url()."edition_coimbatore/tirupur"; ?>"><i class="fa fa-caret-right fa-lg"></i> திருப்பூர்</a></li>
                          <li><a class="AllList" href="<?php echo base_url()."edition_coimbatore/erode"; ?>"><i class="fa fa-caret-right fa-lg"></i> ஈரோடு</a></li>
                           <li><a class="AllList" href="<?php echo base_url()."edition_coimbatore/nilgiri"; ?>"><i class="fa fa-caret-right fa-lg"></i> நீலகிரி</a></li>
                        </ul>
            </li>
                  <li><a class="AllTopic" href="<?php echo base_url()."edition_thirunelveli"; ?>">திருநெல்வேலி</a>
                         <ul>
                          <li><a class="AllList" href="<?php echo base_url()."edition_thirunelveli"; ?>"><i class="fa fa-caret-right fa-lg"></i>திருநெல்வேலி</a></li>
                          <li><a class="AllList" href="<?php echo base_url()."edition_thirunelveli/tuticorin"; ?>"><i class="fa fa-caret-right fa-lg"></i> தூத்துக்குடி</a></li>
                          <li> <a class="AllList" href="<?php echo base_url()."edition_thirunelveli/kanyakumari"; ?>"><i class="fa fa-caret-right fa-lg"></i> கன்னியாகுமரி</a></li>
                        </ul>
            </li>
                  <li><a class="AllTopic" href="<?php echo base_url()."edition_dharmapuri/dharmapuri"; ?>">தருமபுரி</a>
                         <ul>
                          <li><a class="AllList" href="<?php echo base_url()."edition_dharmapuri/dharmapuri"; ?>"><i class="fa fa-caret-right fa-lg"></i>தருமபுரி</a></li>
                          <li><a class="AllList" href="<?php echo base_url()."edition_dharmapuri/namakkal"; ?>"><i class="fa fa-caret-right fa-lg"></i> நாமக்கல்</a></li>
                          <li> <a class="AllList" href="<?php echo base_url()."edition_dharmapuri/krishnagiri"; ?>"><i class="fa fa-caret-right fa-lg"></i> கிருஷ்ணகிரி</a></li>
                          <li><a class="AllList" href="<?php echo base_url()."edition_dharmapuri/salem"; ?>"><i class="fa fa-caret-right fa-lg"></i> சேலம்</a></li>
                        </ul>
            </li>
                  <li><a class="AllTopic" href="<?php echo base_url()."edition_villupuram/villupuram"; ?>">விழுப்புரம்</a>
                          <ul>
                          <li><a class="AllList" href="<?php echo base_url()."edition_villupuram/villupuram"; ?>"><i class="fa fa-caret-right fa-lg"></i>விழுப்புரம்</a></li>
                          <li><a class="AllList" href="<?php echo base_url()."edition_villupuram/cuddalore"; ?>"><i class="fa fa-caret-right fa-lg"></i> கடலூர்</a></li>
                          <li><a class="AllList" href="<?php echo base_url()."edition_villupuram/puducherry"; ?>"><i class="fa fa-caret-right fa-lg"></i> புதுச்சேரி</a></li>
                        </ul>
            </li>
               <li><a class="AllTopic" href="<?php echo base_url()."edition_trichy/nagapattinam"; ?>">நாகப்பட்டினம்</a></li>
                <li><a class="AllTopic" href="<?php echo base_url()."edition_bangalore"; ?>">பெங்களூரு</a></li>
                 <li><a class="AllTopic" href="<?php echo base_url()."edition_new_delhi"; ?>">புதுதில்லி</a></li>
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
   <?php if(isset($section_mapping)) { 

				 foreach($section_mapping as $mapping) {  ?>
     <!--Dropdown Menu--> 
	$( "#tabs<?php echo $mapping['Section_id']; ?> li" ).hover( function(){
      $(this).tab('show');
    });
		  <?php } } ?>
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
			url			: '<?php echo base_url(); ?>user/commonwidget/get_menu_content',
			method		: 'post',
			data		: { menuid: menuId, mode: '<?php echo $content['mode'];?>', 'rendermode' : '<?php echo $content['RenderingMode'];?>', is_home : '<?php echo $is_home;?>', param : '<?php echo $content['page_param'];?>', menu_type : type},
			beforeSend	: function() {				
				console.log(menuId);
				if(type=='main'){
				  document.getElementById('maintabs_content-'+menuId).innerHTML = '<div class="cssload-container"><div class="cssload-zenith"></div></div><div class="cssload-container"><div class="cssload-zenith"></div></div><div class="cssload-container"><div class="cssload-zenith"></div></div><div class="cssload-container"><div class="cssload-zenith"></div></div>';
				   }else{
				   document.getElementById('tabs-'+menuId).innerHTML = '<div class="cssload-container"><div class="cssload-zenith"></div></div><div class="cssload-container"><div class="cssload-zenith"></div></div><div class="cssload-container"><div class="cssload-zenith"></div></div>';
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