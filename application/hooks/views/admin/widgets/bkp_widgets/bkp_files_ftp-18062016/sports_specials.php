<?php
$widget_bg_color        = $content['widget_bg_color'];
$widget_custom_title 	= $content['widget_title'];
$widget_instance_id 	=  $content['widget_values']['data-widgetinstanceid'];
$widgetsectionid 		= $content['sectionID'];
$main_sction_id 	    = "";
$is_home                = $content['is_home_page'];
$is_summary_required    = $content['widget_values']['cdata-showSummary'];
$widget_section_url     = $content['widget_section_url'];
$domain_name            =  base_url();
$view_mode              = $content['mode'];
$show_simple_tab        = "";
					$show_simple_tab.=' <div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
										<div class="margin-bottom-10">';       
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
		$show_simple_tab.=$widget_custom_title;
		}
	$show_simple_tab.=' </fiugre>
	<fiugre class="bg-right"></fiugre>';
}   

					$show_simple_tab.=' <div class="sports-thum sports-spe" '.$widget_bg_color.'>
					                    <ul>';
													
if($content['RenderingMode'] == "manual")
{
$content_type = $content['content_type_id'];
$widget_instance_contents 	= $this->widget_model->get_widgetInstancearticles_rendering($widget_instance_id , " " ,$content['mode']); 						
}
else
{
$content_type = $content['content_type_id'];  // auto article content type
$widget_instance_contents = $this->widget_model->get_all_available_articles_auto($content['show_max_article'], $content['sectionID'] , $content_type ,  $content['mode']);
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
		$original_image_path = "";
		$imagealt            = "";
		$imagetitle          = "";
		$custom_title        = "";
		$custom_summary      = "";
		if($content['RenderingMode'] == "manual")
		{
			if($get_content['custom_image_path'] != '')
			{
			$original_image_path = $get_content['custom_image_path'];
			$imagealt            = $get_content['custom_image_title'];	
			$imagetitle          = $get_content['custom_image_alt'];												
			}
			$custom_title   = $get_content['CustomTitle'];
			$custom_summary = $get_content['CustomSummary'];
		}
		if($original_image_path =="")                                                // from cms || live table    
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
		$param = $content['page_param'];
		$live_article_url = $domain_name.$content_url."?pm=".$param;
		
		if( $custom_title == '')
		{
		$custom_title = $get_content['title'];
		}	
		$display_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$custom_title);   //to remove first<p> and last</p>  tag
		$display_title = '<a  href="'.$live_article_url.'" class="article_click" >'.$display_title.'</a>';	
		// Assign summary block starts here
		if( $custom_summary == '')
		{
		$custom_summary =  $get_content['summary_html'];
		}
		$summary  = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$custom_summary);  //to remove first<p> and last</p>  tag	
		//  summary block endss here
		
		$show_simple_tab.=' <li> 
		<a href="'.$live_article_url.'" class="article_click" >
		<figure class="sports-thum-img special-sports">
		<img src="'.$dummy_image.'" data-src="'.$show_image.'" title = "'.$imagetitle.'" alt = "'.$imagealt.'" />
		</figure></a>
		<figcaption class="sports-thum-des special-sports-des">
		'.$display_title.'</figcaption>
		</li>';
		
		$i =$i+1;	
		
		}
    }
}
elseif($view_mode=="adminview")
{
$show_simple_tab .='<div class="margin-bottom-10" '.$widget_bg_color.'>'.no_articles.'</div>';
}
$show_simple_tab.=' </ul>';
if($content['widget_title_link'] == 1)
{
$show_simple_tab.=' <div class="arrow"><a href="'.$widget_section_url.'"><span class="arrow-span"> </span>
<div class="arrow-rightnew"></div>
</a></div>';
}

$show_simple_tab.=' </div>';

echo $show_simple_tab.='</div>
</div>
</div>';
?>