<?php 
//print_r($content); exit;
// widget config block Starts - This code block assign widget background colour, title and instance id. Do not delete it 
$widget_bg_color = $content['widget_bg_color'];
$widget_custom_title = $content['widget_title'];
$widget_instance_id =  $content['widget_values']['data-widgetinstanceid'];
$main_sction_id 	= "";
$is_home = $content['is_home_page'];
$is_summary_required = 'y';
$widget_section_url = $content['widget_section_url'];

// widget config block ends
//getting tab list for hte widget
$widget_instancemainsection	= $this->widget_model->get_widget_mainsection_config_rendering('', $widget_instance_id, $content['mode']);
// Code block A - this code block is needed for creating simple tab widget. Do not delete
$domain_name =  base_url();
$show_simple_tab = "";
$show_simple_tab .='<div class="row">
          <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
            <div class="cartoon">
            <div class="row">
             <div class="right-padding">
              <div id="features">';
													
													$url_structure = $content['url_structure'];
													$section_landing =  "0,".$content['sectionID'].", 'section', this, '".$url_structure."'";
													
													// Code Block A ends here
													
													
													// Tab Creation Block Starts here
													$j = 0;
													
												    // // Tab Creation Block- Below code gets the record from windgetinstancemainsection table to create tabs for this widget 
													// Adding content Block - to add contents for each tab
													// Adding content Block starts here
													foreach($widget_instancemainsection as $get_section)
													{
													
														//getting content block - getting content list based on rendering mode
														//getting content block starts here . Do not change anything
														if($content['RenderingMode'] == "manual")
														{
																$widget_instance_contents 	= $this->widget_model->get_widgetInstancearticles_rendering($get_section['WidgetInstance_id'], $get_section['WidgetInstanceMainSection_id'],$content['mode']); 						
														}
														else
														{
															$widget_instance_contents = $this->widget_model->get_all_available_articles_auto($content['show_max_article'], $widget_instancemainsection[$j]['Section_ID'], $content['mode']);
														}
														//getting content block ends here
														//Widget code block - code required for simple tab structure creation. Do not delete
														//Widget code block Starts here
														if($j==0){
														$add_class='box-botton';
														$add_sub_class='box-one';
														}elseif($j==1){
														$add_class='box-botton box-botton1';
														$add_sub_class='box-one box-one1';	
														}
														
														$show_simple_tab .='<div class="col-lg-6 col-md-12 col-sm-6 col-xs-12  cart">';
														$section_landing =  "0,".$get_section['Section_ID'].", 'section', this, '".$url_structure."'";	
													
														$show_simple_tab.=	'<div class="'.$add_class.'"><a href="javascript:;" onclick="call_url('.$section_landing.')">'.$get_section['CustomTitle'].'</a></div>';
													
                                                                                
														//Widget code block ends here
														
														// content list iteration block - Looping through content list and adding it the list
														// content list iteration block starts here
														
													   if(empty($widget_instance_contents))
														{
															$show_simple_tab .='</div>';
														
														}else{	
														$i =1;
														foreach($widget_instance_contents as $get_content)
														{
															
															$show_image = "";
															// Code Block B - if rendering mode is manual then if custom image is available then assigning the imageid to a variable
															// Code Block B starts here - Do not change
															$show_image = "";
															$imageid ="";
															if($content['RenderingMode'] == "manual")
															{
																if($get_content['customimage_id'] != '')
																{
																	$imageid = $get_content['customimage_id'];
																}
															}
															
															if($imageid =='')
															{
																$imageid = $get_content['content_id'];
																$image_data = $this->widget_model->get_image_data_widget($imageid,$is_home);
															}
															else
															{
																$image_data = $this->widget_model->get_image_data($imageid,$is_home);
															}															// Code Block B ends here
															// getting content details from database - Do not change
															$from_contents_table = $this->template_design_model->required_widget_content_by_id($get_content['content_id'], '1');	
															$SourceURL = $content['widget_img_phy_path'];
															// Code block C - if rendering mode is auto then this code blocks retrieve required image from article related image if content type is article (This widget uses only article- Do not change
															// Code block C  starts here
																if($imageid !='')
																{
																	
																	$Image600X300="";
																	$imageheight = @$image_data['Height'];
																	$imagewidth = @$image_data['Width'];
																	if ($imageheight > $imagewidth)
																	{
																		$Image600X300 	= @$image_data['ImagePhysicalPath'];
																	}
																
																	else
																	{				
																		
																		$Image600X300 	= str_replace("original","w600X300", @$image_data['ImagePhysicalPath']);
																	}
																

																	$imagealt ="";
																	$imagetitle="";
																	if (file_exists(destination_base_path . imagelibrary_image_path. $Image600X300) && $Image600X300 != '')
																	{
																		$show_image = image_url. imagelibrary_image_path . $Image600X300;
																		if (@$image_data['ImageAlt'] != '')
																		$imagealt = $image_data['ImageAlt'];
																		
																		if(@$image_data['Title'] != '')
																		$imagetitle = $image_data['Title'];
																		
																	}

																	else {

																		$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X300.jpg';
																	}

																}
																else {

																		$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X300.jpg';
																	}
																// Code block C ends here
																
																// Assign block - assigning values required for opening the article in light box
																// Assign block starts here
																
																
																$parent_section = $this->widget_model->get_parent_sectionmane($from_contents_table[0]['Section_id'])->row_array();	
																$parent_sectionname = "";
																if(count($parent_section)>0)
																{
																	$parent_sectionname = $parent_section['Sectionname'].'/';
																}
																
																$contentID = $get_content['content_id'];
																$section_ID = $from_contents_table[0]['Section_id'];
																$contentTypeID = @$get_content['content_type_id'];
																	
																// Assign block ends here
																// Assign article links block - creating links for  article summary Display article																$custom_title = $get_content['CustomTitle'];
																
																$string_value = $contentID.",".$section_ID.", 'article', this, '".$url_structure."'";
																$custom_title = $get_content['CustomTitle'];
																
																$content_url_title = join( "-",( explode(" ",$from_contents_table[0]['url_title']) ) );
																$special_parent_section = array();
																if(@$parent_section['ParentSectionID'] != 0)
																{
																	$special_parent_section 	= $this->widget_model->get_section_by_id($parent_section['ParentSectionID']);	
																	//echo $this->db->last_query();
																}
																
																if(@$special_parent_section['Sectionname'] != '')
																{
																 $url_section_value = join( "-",( explode(" ",$special_parent_section['Sectionname'] ) ) )."/".join( "-",( explode(" ",$parent_sectionname ) ) ).join( "-",( explode(" ",$from_contents_table[0]['Sectionname'] ) ) ); 

																}																
																else if($parent_sectionname != '')
																{
																 $url_section_value = join( "-",( explode(" ",$parent_sectionname ) ) ).join( "-",( explode(" ",$from_contents_table[0]['Sectionname'] ) ) ); 

																}
																else
																{
																 $url_section_value = join( "-",( explode(" ",$from_contents_table[0]['Sectionname'] ) ) ); 																 
																}
																$content_url_title = preg_replace('/[^A-Za-z0-9\-]/', '', $content_url_title);
																$content_url_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $content_url_title);
 																$live_string_value = $domain_name.$url_section_value."/". $content_url_title."-". $contentID;
															
															
																if( $custom_title != '')
																{																
																	$display_title = $custom_title;
																}
																else
																{																	
																	$display_title = $from_contents_table[0]['Title'];
																}	
																	$display_title = '<a  href="'.$live_string_value.'"  class="article_click" >'.preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $display_title).'</a>';
															//  Assign article links block ends hers
															
															// Assign summary block - creating links for  article summary
																// Assign summary block starts here
																$custom_summary = $get_content['CustomSummary'];
																if( $custom_summary != '')
																{
																	$custom_summary = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $custom_summary);
																}
																else
																{
																	$custom_summary =preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',  $from_contents_table[0]['SummaryPlaintext']);
																}
																// Assign summary block starts here
																
																// display title and summary block starts here
																if($i == 1)
																{
																 $show_simple_tab .= '<div class="'.$add_sub_class.' cook">';
                  
																		if($j==0){
																		
																		 $show_simple_tab .='<figure> <img src="'.$show_image.'" title = "'.$imagetitle.'" alt = "'.$imagealt.'"> </figure>
																		 <figcaption><h4>'.$display_title.'</h4>
																		 <p>'.$custom_summary.'</p>';
																		
																		}elseif($j==1){
																		
																			
																		 $show_simple_tab .='<figure><img src="'.$show_image.'" title = "'.$imagetitle.'" alt = "'.$imagealt.'"> </figure>
																		 <figcaption><h4>'.$display_title.'</h4>';
																	          
																		}
																		 
																}
																
																
																if($i == count($widget_instance_contents))
																{
																	
															
															$show_simple_tab .='<div class="arrow-grey medai"><a href="'.$widget_section_url.'" onclick="call_url('.$section_landing.')"><span class="arrow-span"> </span>
										  <div class="arrow-rightnew"></div>
										  </a></div>';
																
																		$show_simple_tab .=' </div></div>';
																}
																// display title and summary block ends here					
																//Widget design code block 1 starts here																
															//Widget design code block 1 starts here			
															$i =$i+1;							  
														}
														
														}
														 
														// content list iteration block ends here
														//$show_simple_tab .= '</div>';
														$j++;
													}
													// Adding content Block ends here
													
 
 $show_simple_tab .='</div></div></div>';
echo $show_simple_tab;
?>
