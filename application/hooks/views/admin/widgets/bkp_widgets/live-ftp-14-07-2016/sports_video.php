<?php
$widget_bg_color        = $content['widget_bg_color'];
$widget_custom_title 	= $content['widget_title'];
$widget_instance_id 	=  $content['widget_values']['data-widgetinstanceid'];
$widgetsectionid 		= $content['sectionID'];
$main_sction_id 	    = "";
$is_home                = $content['is_home_page'];
$is_summary_required    = $content['widget_values']['cdata-showSummary'];
$view_mode              = $content['mode'];

$widget_section_url     = $content['widget_section_url'];
$domain_name            =  base_url();
$show_simple_tab        = "";
$show_simple_tab       .='<div class="row">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-bottom-10">
		                  <div class="health-food " '.$widget_bg_color.'>';
 $show_simple_tab      .='<div class="row">';

$show_simple_tab.=' <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border">';
if($widget_custom_title!='')
{
	$show_simple_tab.=' <fiugre class="bg-left"></fiugre>
	<fiugre class="bg-center1">';
	if($content['widget_title_link'] == 1)
	{
	$show_simple_tab.='<a href="'.$widget_section_url.'" >'.$widget_custom_title.'</a>';
	}
	else
	{
	$show_simple_tab.=	$widget_custom_title;
	}
	$show_simple_tab.='</fiugre>
	<fiugre class="bg-right"></fiugre>
	';
}
$show_simple_tab.='</div>';

$show_simple_tab.=' <div class="sports-padd" >';
													
if($content['RenderingMode'] == "manual")
{
$content_type = $content['content_type_id'];  // manual article content type
$widget_instance_contents 	= $this->widget_model->get_widgetInstancearticles_rendering($widget_instance_id , " " ,$content['mode'],$content['show_max_article']); 						
}
else
{
$content_type = $content['content_type_id'];  // auto article content type
$widget_instance_contents = $this->widget_model->get_all_available_articles_auto($content['show_max_article'], $content['sectionID'], $content_type ,  $view_mode);	
}

       if (function_exists('array_column')) 
					{
				    $get_content_ids = array_column($widget_instance_contents, 'content_id'); 
					}else
					{
				    $get_content_ids = array_map( function($element) { return $element['content_id']; }, $widget_instance_contents);
					} 
				    $get_content_ids = implode("," ,$get_content_ids);
				if($get_content_ids!='')
				{
					$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, $is_home, $view_mode);	
					$widget_contents = array();
					foreach ($widget_instance_contents as $key => $value) 
					{
						foreach ($widget_instance_contents1 as $key1 => $value1)
						 {
							if($value['content_id']==$value1['content_id'])
							{
							   $widget_contents[] = array_merge($value, $value1);
							}
						}
					}
$i =1;
if(count($widget_contents)>0)
{
	foreach($widget_contents as $get_content)
	{
		$custom_title        = "";
		$original_image_path = "";
		$imagealt            = "";
		$imagetitle          = "";
		$Image600X300        = "";
		if($content['RenderingMode'] == "manual")            // from widgetinstancecontent table    
		{
			if($get_content['custom_image_path'] != '')
			{
			$original_image_path = $get_content['custom_image_path'];
			$imagealt            = $get_content['custom_image_title'];	
			$imagetitle          = $get_content['custom_image_alt'];												
			}
			$custom_title        = stripslashes($get_content['CustomTitle']);
		}
		// Code block C - if rendering mode is auto then this code blocks retrieve required image from article related image if content type is article (This widget uses only article- Do not change
		// Code block C  starts here
					if($original_image_path =="")                         // from cms imagemaster table    
			{
			$original_image_path  = $get_content['ImagePhysicalPath'];
			$imagealt             = $get_content['ImageCaption'];	
			$imagetitle           = $get_content['ImageAlt'];	
			}
		
		$show_image="";
		if ($original_image_path!='' && file_exists(destination_base_path . imagelibrary_image_path .$original_image_path))
			{
			$imagedetails = getimagesize(destination_base_path . imagelibrary_image_path.$original_image_path);
			$imagewidth = $imagedetails[0];
			$imageheight = $imagedetails[1];	
			
				if ($imageheight > $imagewidth)
				{
				$Image600X300 	= $original_image_path;
				}
				else
				{				
				$Image600X300 	= str_replace("original","w600X300", $original_image_path);
				}
				
				$show_image = image_url. imagelibrary_image_path . $Image600X300;
			}	
			else 
			{
			$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X300.jpg';
			}	
		$dummy_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X300.jpg';
		
		$content_url = $get_content['url'];
		$param = $content['page_param']; //page parameter
		$live_article_url = $domain_name. $content_url."?pm=".$param;
		
		if( $custom_title == '')
		{
		$custom_title = stripslashes($get_content['title']);
		}	
		$display_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$custom_title);   //to remove first<p> and last</p>  tag
		$display_title = '<a  href="'.$live_article_url.'" class="article_click" >'.$display_title.'</a>';
		
		// Assign summary block starts here
		
		$play_video_image = image_url. imagelibrary_image_path.'play-circle.png';
		if($i==1 || $i%4==1)
		{
			$show_simple_tab.='<div class="clear_both">';
		}
		$show_simple_tab.='  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 food-box">';
		$show_simple_tab .='<div class="food-mdi">
		<a href="'.$live_article_url.'" class="article_click" >';
		
		$show_simple_tab .='<figure>
						   <img src="'.$dummy_image.'" data-src="'.$show_image.'" title = "'.$imagetitle.'" alt = "'.$imagealt.'" />
						   <div class="play-icon"></div>';
		$show_simple_tab .='</figure>';
		
		$show_simple_tab.='</a>';
		
		$show_simple_tab .='<figcaption><p>'.$display_title.'</p></figcaption>';
		$show_simple_tab.='</div>
		</div>';
		if($i%4==0)
		{
			$show_simple_tab.='</div>';
		}
		if($i== count($widget_contents))
		{
			$cou=$i%4;
			if( $cou==1 || $cou==2 || $cou==3)
			{
				$show_simple_tab.='</div>';
			}
			
		}
		$i =$i+1;	
		
		}
    }
}
elseif($view_mode=="adminview")
{
$show_simple_tab .=' <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "><div class="margin-bottom-10" '.$widget_bg_color.'>'.no_articles.'</div></div>';
}

$show_simple_tab.='</div>';
if($content['widget_title_link'] == 1)
{
	$show_simple_tab.=' <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">';
		$show_simple_tab.='<div class="arrow"><a href="'.$widget_section_url.'"  class="landing-arrow"><span class="arrow-span"> </span>
		<div class="arrow-rightnew"></div>
		</a></div>';
		$show_simple_tab.=' </div>';	
}
$show_simple_tab.=' </div>';
echo $show_simple_tab.='</div>
</div>
</div>';

?>