<?php
$widget_bg_color     = $content['widget_bg_color'];
$widget_custom_title = $content['widget_title'];
$widget_instance_id  =  $content['widget_values']['data-widgetinstanceid'];
$main_sction_id 	 = "";
$is_home             = $content['is_home_page'];
$widget_section_url  = $content['widget_section_url'];
$is_summary_required = $content['widget_values']['cdata-showSummary'];
$domain_name         =  base_url();
$view_mode           = $content['mode'];
$show_simple_tab     = "";

if($content['widget_values']['cdata-widgetCategory'] != '') {
	$section_id = (string)$content['widget_values']['cdata-widgetCategory'];
	$section_details = $this->widget_model->get_section_by_id($section_id);
	$widget_section_url = $domain_name .$section_details ['URLSectionStructure'];
	$SectionName 		= $section_details ['Sectionname'];
} else {
	$widget_section_url = '';
	$SectionName 		= '';
}

$show_simple_tab .='<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  ';
						
						if($widget_custom_title!='')
{     
							$show_simple_tab .='<figure class="bg-left"></figure>
							<figure class="bg-center1">';
								
							if($widget_custom_title!='')
							 {
								if($content['RenderingMode'] == "manual") 
								{
									$show_simple_tab.='<a href="'.$widget_section_url.'">'.$widget_custom_title.'</a>';
								} 
								else 
								{
									if($content['widget_values']['cdata-customTitle'] != '') 
									{
										$show_simple_tab.='<a href="'.$widget_section_url.'">'.$content['widget_values']['cdata-customTitle'].'</a>';
									}
									 else 
									{
										$show_simple_tab.='<a href="'.$widget_section_url.'">'.$SectionName.'</a>';
									}
								}
							 } 
							else
							 {
									$show_simple_tab.='<a href="'.$widget_section_url.'">'.$SectionName.'</a>';
							 }
							
							$show_simple_tab.='</figure><figure class="bg-right"></figure> ';
}

							$content_type = $content['content_type_id'];		
								
							if($content['RenderingMode'] == "manual") 	{
								
								$widget_instance_contents 	= $this->widget_model->get_widgetInstancearticles_rendering($widget_instance_id , " " ,$content['mode']); 						
							} else {
								$content_type = $content['content_type_id'];  // auto article content type
								$widget_instance_contents = $this->widget_model->get_all_available_articles_auto($content['show_max_article'], $content['sectionID'] , $content_type ,  $content['mode']);
							}
							
							$show_simple_tab .='<ul class="panchangam-kelvi" '.$widget_bg_color.'>';
							
							if (function_exists('array_column'))  {
								$get_content_ids = array_column($widget_instance_contents, 'content_id'); 
							}else {
								$get_content_ids = array_map( function($element) { return $element['content_id']; }, $widget_instance_contents);
							}
							$get_content_ids = implode("," ,$get_content_ids);
							if($get_content_ids!='') {
								
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
										if($content['RenderingMode'] == "manual")
										{
										$custom_title   = $get_content['CustomTitle'];
										}
										$content_url = $get_content['url'];
										$param = $content['page_param'];
										$live_article_url = $domain_name.$content_url."?pm=".$param;
										if( $custom_title == '')
										{
										$custom_title = @$get_content['title'];
										}	
										$display_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$custom_title);   //to remove first<p> and last</p>  tag
										$display_title = '<a  href="'.$live_article_url.'" class="article_click" >'.$display_title.'</a>';	
										
										$custom_summary = @$get_content['CustomSummary'];
										if( $custom_summary != '') {
											$summary =  $custom_summary;
										} else {
											$summary =  @$get_content['summary_html'];
										}
										$summary  = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$summary);
										//  Assign article links block ends hers
																					
												
										 $show_simple_tab .='<li class="odd">'.$display_title.'</li>
										 <li class="even"><p>'.$summary.'</p></li>';
										
										$i =$i+1;							  
									}
								}
								
							} elseif($view_mode=="adminview") {
								$show_simple_tab .='<li class="margin-bottom-10" '.$widget_bg_color.'>'.no_articles.'</li></ul>';
								
							} else {
								$show_simple_tab .='</ul>';
							}                                                
	
							
$show_simple_tab .='</div>
						</div>';
						
echo $show_simple_tab;
							
							
/*
// widget config block ends
//getting tab list for hte widget

$widget_instancemainsection	= $this->widget_model->get_widget_mainsection_config_rendering('', $widget_instance_id, $content['mode']);

echo "<pre>";
print_r($widget_instancemainsection);
exit;

// Code block A - this code block is needed for creating simple tab widget. Do not delete
$domain_name =  base_url();

$widget_auto_count = $this->widget_model->select_setting($view_mode);
$max_article_count = $widget_auto_count['subsection_otherstories_autoCount'];
$subsec_leadstory_max_article = 0;
$subsec_leadstory_remdering_mode = '';
$subsec_leadstory_instanceID = '';
$subsec_leadstory_mainsection_id= '';

$show_simple_tab = "";
$show_simple_tab .='<div class="row">
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <fiugre class="bg-left"></fiugre>';
													
													$url_structure = $content['url_structure'];
													$section_landing =  "0,".$content['sectionID'].", 'section', this, '".$url_structure."'";
													
													if($content['widget_title_link'] == 1)
													{
														
							$show_simple_tab.='<fiugre class="bg-center1"><a href="javascript:;" onclick="call_url('.$section_landing.')"  >'.$widget_custom_title.'</a></fiugre>';
													}
													else
													{
														$show_simple_tab.=	'<fiugre class="bg-center1"> '.$widget_custom_title.'</fiugre>';
													}
                                                $show_simple_tab.='<fiugre class="bg-right"></fiugre> ';
													
													
													// Code Block A ends here
													
													
													// Tab Creation Block Starts here
													$j = 0;
													// Adding content Block starts here
													foreach($widget_instancemainsection as $get_section)
													{
														if($content['RenderingMode'] == "manual") {
																$widget_instance_contents 	= $this->widget_model->get_widgetInstancearticles_rendering($get_section['WidgetInstance_id'], $get_section['WidgetInstanceMainSection_id'],$content['mode']);			
														} else {
															//$widget_instance_contents = $this->widget_model->get_all_available_articles_auto($content['show_max_article'], $widget_instancemainsection[$j]['Section_ID'], $content['mode']);
															$widget_instance_contents 	= $this->widget_model->get_widgetInstancearticles_rendering($get_section['WidgetInstance_id'], $get_section['WidgetInstanceMainSection_id'],$content['mode']); 
														}
														//$i =1;
														//$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_150X150.jpg';
														
														$show_simple_tab .='<ul class="panchangam-kelvi">';
														
														if(empty($widget_instance_contents))
														{
															$show_simple_tab .='</ul>';
														
														}else{	
															$i =1;															
															foreach($widget_instance_contents as $get_content)
															{
																$content_type = @$get_content['content_type_id'];
																$content_details = $this->widget_model->get_contentdetails_from_live_database($get_content['content_id'], $content_type,$is_home);	
																
																	
																	if(@$content_details[0]['grant_parent_section_name']!='' &&  @$content_details[0]['parent_section_name']!='')
																	{
																		 $url_section_value = join( "-",( explode(" ",$content_details[0]['grant_parent_section_name'] ) ) )."/".join( "-",( explode(" ",$content_details[0]['parent_section_name'] ) ) )."/".join( "-",( explode(" ",$content_details[0]['section_name'] ) ) ); 
																	}
																	else if(@$content_details[0]['parent_section_name'] != '')
																	{
																	 $url_section_value = join( "-",( explode(" ",@$content_details[0]['parent_section_name'] ) ) )."/".join( "-",( explode(" ",@$content_details[0]['section_name'] ) ) ); 
																	}
																	else
																	{
																		$url_section_value = join( "-",( explode(" ",@$content_details[0]['section_name'] ) ) ); 
																	}
																	
																	$contentID = @$get_content['content_id'];
																	$section_ID = @$content_details[0]['Section_id'];
																	$contentTypeID = @$get_content['content_type_id'];
																																	
																	$string_value = $contentID.",".$section_ID.", 'article', this, '".$url_structure."'";
																	
																	$content_url_title = join( "-",( explode(" ",@$content_details[0]['url_title']) ) );
																	
																	$content_url_title = preg_replace('/[^A-Za-z0-9\-]/', '', $content_url_title);
																	$param = @$content['page_param'];
																	$live_string_value = $domain_name.$url_section_value."/". $content_url_title."-". $contentID."?pm=".$param;
																
																	$custom_title = @$get_content['CustomTitle'];
																	if( $custom_title != '')
																	{																	
																		$display_title = $custom_title;
																	}
																	else
																	{
																		$display_title = @$content_details[0]['title'];
																	}	
																	$display_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$display_title);
																	$display_title = '<a  href="#"  >'.$display_title.'</a>';
																//  Assign article links block ends hers
																
																// Assign summary block - creating links for  article summary
																	// Assign summary block starts here
																	$custom_summary = $get_content['CustomSummary'];
																	if( $custom_summary != '')
																	{
																		$summary =  $custom_summary;
																	}
																	else
																	{
																		$summary =  @$content_details[0]['summary_html'];
																	}
																	$summary  = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$summary);
																//  Assign article links block ends hers
																												
																			
																	 $show_simple_tab .='<li class="odd">'.$display_title.'</li>
																	 <li class="even"><p>'.$summary.'</p></li>';
																			 
																	// display title and summary block ends here					
																	//Widget design code block 1 starts here																
																//Widget design code block 1 starts here			
																$i =$i+1;							  
															}
														
														}
														
														$j++;	
													}
													// Adding content Block ends here
													
 
 $show_simple_tab .='</div>';
echo $show_simple_tab;
echo '<div class="pagina">';
//echo $PaginationLink ;
echo '</div></div>';

*/


?>
	   
	   