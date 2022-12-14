<?php 
/*
Finame 		: 	cinema_ilamai_puthumai
Created On 	: 	27-4-2016
Purpose for	:	Display the cinema_ilamai_puthumai widget
*/

$widget_bg_color        = $content['widget_bg_color']; 
$widget_custom_title 	= $content['widget_title'];
$widget_instance_id 	= $content['widget_values']['data-widgetinstanceid'];
$widgetsectionid 		= $content['sectionID'];
$main_sction_id 	    = "";
$is_home                = $content['is_home_page'];
$is_summary_required    = $content['widget_values']['cdata-showSummary'];
$view_mode              = $content['mode'];
$widget_section_url     = $content['widget_section_url'];
$domain_name            =  base_url();

$widget_section_url = $content['widget_section_url'];
$show_simple_tab = "";
$show_simple_tab .='<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div '.$widget_bg_color.'>
					<div class="row">';
		  
		  $show_simple_tab.='	  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  margin-bottom-10">
					<figure class="bg-left"></figure>';
					
					if($content['widget_title_link'] == 1)
					{
					$show_simple_tab.=	'<figure class="bg-center1"><a href="'.$widget_section_url.'" >'.$widget_custom_title.'</a></figure>';
					}
					else
					{
						$show_simple_tab	.=	'<figure class="bg-center1">'.$widget_custom_title.'</figure>';
					}
					
					
					$show_simple_tab.=' <figure class="bg-right"></fiugre>
					</div>';
$show_simple_tab.=' <div class="cartoon1 puthumai">';


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

		$widget_contents = array();
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
}
if(count($widget_contents)>0)
{
														
														$i=1;
														$count = 1;
														foreach($widget_contents as $get_content)
														{
															$custom_title        = "";
															$custom_summary      = "";
															$original_image_path = "";
															$imagealt            = "";
															$imagetitle          = "";
															$Image600X390        = "";

															//$content_type = @$get_content['content_type_id'];
															//$content_details = $this->widget_model->get_contentdetails_from_live_database($get_content['content_id'], $content_type,$is_home);	
												
															if($content['RenderingMode'] == "manual")            // from widgetinstancecontent table    
{
	if($get_content['custom_image_path'] != '')
	{
		$original_image_path = $get_content['custom_image_path'];
		$imagealt            = $get_content['custom_image_title'];	
		$imagetitle          = $get_content['custom_image_alt'];												
	}
		$custom_title        = stripslashes($get_content['CustomTitle']);
		$custom_summary      = $get_content['CustomSummary'];

}
if($original_image_path =="")                         // from cms || Live table    
{
	   $original_image_path  = $get_content['ImagePhysicalPath'];
	   $imagealt             = $get_content['ImageCaption'];	
	   $imagetitle           = $get_content['ImageAlt'];	
}

if ($original_image_path!='' && file_exists(destination_base_path . imagelibrary_image_path .$original_image_path))
{
$imagedetails = getimagesize(destination_base_path . imagelibrary_image_path.$original_image_path);
$imagewidth = $imagedetails[0];
$imageheight = $imagedetails[1];	

if ($imageheight > $imagewidth)
{
	$Image600X390 	= $original_image_path;
}
else
{				
	$Image600X390 	= str_replace("original","w600X390", $original_image_path);
}
if (file_exists(destination_base_path . imagelibrary_image_path . $Image600X390) && $Image600X390 != '')
{
	$show_image = image_url. imagelibrary_image_path . $Image600X390;
}
else 
{
	$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
}
				$dummy_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
}	
else 
{
$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
				$dummy_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
}	
																
																	$content_url = $get_content['url'];
	$param = $content['page_param']; //page parameter
	$live_article_url = $domain_name. $content_url."?pm=".$param;
	
																if( $custom_title == '')
	{
		$custom_title = stripslashes($get_content['title']);
	}	
	$display_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$custom_title);   //to remove first<p> and last</p>  tag
	$display_title = '<a  href="'.$live_article_url.'" class="article_click" >'.$display_title.'</a>';				
	if( $custom_summary == '')
	{
		$custom_summary =  $get_content['summary_html'];
	}
	$summary  = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$custom_summary);  //to remove first<p> and last</p>  tag
																			
																//  Assign article links block ends hers
																$play_gallery_image = image_url. imagelibrary_image_path.'gallery-icon.png';
																
																
																
																$show_simple_tab .='<div class="col-lg-3 col-md-6 col-sm-3 col-xs-12  cart">
																					
																					<div class="box-botton">
																					<a href="#">'.$get_section['CustomTitle'].'</a>
																					</div>
																					
																					<div class="box-one">
																					<figure> <img src="'.$dummy_image.'" data-src="'.$show_image.'" title = "'.$imagetitle.'" alt = "'.$imagealt.'"> </figure>
																					
																					<figcaption>
																					<p>'.$display_title.' </p>
																					</figcaption>
																					
																					</div>
																					</div>';
																
															$i =$i+1;		
														}
													}
													
													elseif($view_mode=="adminview")
													{
													 $show_simple_tab .=' <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="margin-bottom-10">'.no_articles.'</div></div>';
													}else
													{
														 $show_simple_tab .='</div>';
													}

if($content['widget_title_link'] == 1)
{
	 $show_simple_tab .='<div class="arrow"><a href="'.$widget_section_url.'" class="landing-arrow"><div class="arrow-span"> </div><div class="arrow-rightnew"></div></a></div>';										
}
echo $show_simple_tab .='</div></div>
														</div></div>
														</div>';
               


?>
