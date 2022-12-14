<?php 
// widget config block Starts - This code block assign widget background colour, title and instance id. Do not delete it 
$widget_bg_color     = $content['widget_bg_color'];
$widget_custom_title = $content['widget_title'];
$widget_instance_id  =  $content['widget_values']['data-widgetinstanceid'];
$main_sction_id 	 = "";
$is_home             = $content['is_home_page'];
$is_summary_required = $content['widget_values']['cdata-showSummary'];
$widget_section_url  = $content['widget_section_url'];
$view_mode           = $content['mode'];
$tab_sections	     = $content['widget_values']->widgettab;

// widget config block ends
//getting tab list for hte widget
if($content['RenderingMode'] == "manual")
{
$widget_instancemainsection	= $this->widget_model->get_widget_mainsection_config_rendering('', $widget_instance_id, $content['mode']);
}else{
$widget_instancemainsection	= $content['widget_values']->widgettab;
}// Code block A - this code block is needed for creating simple tab widget. Do not delete
$domain_name        =  base_url();
$show_simple_tab    = "";
$show_simple_tab .='<div class="row">
						<div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
						<div '.$widget_bg_color.'>
							<div class="cartoon">
								<div class="row">
									<div class="right-padding">';
				
$show_simple_tab .='<div id="features"><div class="col-lg-6 col-md-12 col-sm-6 col-xs-12   child-wrold cart ">
					  <div class="box-botton child-button font-size padding-6">அனைத்துப் பதிப்புகள்</div>
					  <div class="box-one child-box all-story">
						<div class="slider single-item ">
						  <div>
							<h4><a  href="'.base_url().'all-editions/edition_chennai">சென்னை</a></h4>
							<ul class="box-li area-li">
							  <li><a href="'.base_url().'all-editions/edition_chennai/chennai"><i class="fa fa-caret-right fa-lg"></i> சென்னை</a></li>
							  <li><a href="'.base_url().'all-editions/edition_chennai/thiruvallur"><i class="fa fa-caret-right fa-lg"></i>  திருவள்ளூர்</a></li>
							  <li> <a href="'.base_url().'all-editions/edition_chennai/kanchipuram"><i class="fa fa-caret-right fa-lg"></i>  காஞ்சிபுரம்</a></li>
							  <li><a href="'.base_url().'all-editions/edition_vellore/vellore"><i class="fa fa-caret-right fa-lg"></i> வேலூர்</a></li>
							  <li><a href="'.base_url().'all-editions/edition_vellore/thiruvannamalai"><i class="fa fa-caret-right fa-lg"></i> திருவண்ணாமலை</a></li>
							</ul>
						  </div>
						  <div>
							<h4><a href="'.base_url().'all-editions/edition_trichy">திருச்சி</a></h4>
							<ul class="box-li area-li2">
							  <li><a href="'.base_url().'all-editions/edition_trichy/trichy"><i class="fa fa-caret-right fa-lg"></i>  திருச்சி</a></li>
							  <li><a href="'.base_url().'all-editions/edition_trichy/ariyalur"><i class="fa fa-caret-right fa-lg"></i> அரியலூர்</a></li>
							  <li> <a href="'.base_url().'all-editions/edition_trichy/karur"><i class="fa fa-caret-right fa-lg"></i>  கரூர்</a></li>
								<li><a href="'.base_url().'all-editions/edition_trichy/pudukottai"><i class="fa fa-caret-right fa-lg"></i>  புதுக்கோட்டை</a></li>
							  <li><a href="'.base_url().'all-editions/edition_trichy/tanjore"><i class="fa fa-caret-right fa-lg"></i> தஞ்சாவூர்</a></li>
							  <li> <a href="'.base_url().'all-editions/edition_trichy/perambalur"><i class="fa fa-caret-right fa-lg"></i>  பெரம்பலூர்</a></li>
							</ul>
						  </div>
						  <div>
							<h4><a href="'.base_url().'all-editions/edition_madurai/madurai">மதுரை</a></h4>
							<ul class="box-li area-li3">
							  <li><a href="'.base_url().'all-editions/edition_madurai/madurai"><i class="fa fa-caret-right fa-lg"></i> மதுரை</a></li>
							  <li><a href="'.base_url().'all-editions/edition_madurai/dindigul"><i class="fa fa-caret-right fa-lg"></i>  திண்டுக்கல்</a></li>
							  <li> <a href="'.base_url().'all-editions/edition_madurai/theni"><i class="fa fa-caret-right fa-lg"></i>  தேனி</a></li>
							   <li><a href="'.base_url().'all-editions/edition_madurai/sivagangai"><i class="fa fa-caret-right fa-lg"></i>சிவகங்கை</a></li>
							  <li><a href="'.base_url().'all-editions/edition_madurai/virudhnagar"><i class="fa fa-caret-right fa-lg"></i>  விருதுநகர்</a></li>
							  <li> <a href="'.base_url().'all-editions/edition_madurai/ramanathapuram"><i class="fa fa-caret-right fa-lg"></i>  ராமநாதபுரம்</a></li>
							</ul>
						  </div>
						  <div>
							<h4><a href="'.base_url().'all-editions/edition_coimbatore">கோயம்புத்தூர்</a></h4>
							<ul class="box-li area-li4">
							  <li><a href="'.base_url().'all-editions/edition_coimbatore/coimbatore"><i class="fa fa-caret-right fa-lg"></i>கோயம்புத்தூர்</a></li>
							  <li><a href="'.base_url().'all-editions/edition_coimbatore/tirupur"><i class="fa fa-caret-right fa-lg"></i>  திருப்பூர்</a></li>
							  <li> <a href="'.base_url().'all-editions/edition_coimbatore/erode"><i class="fa fa-caret-right fa-lg"></i>  ஈரோடு</a></li>
							   <li><a href="'.base_url().'all-editions/edition_coimbatore/nilgiri"><i class="fa fa-caret-right fa-lg"></i>நீலகிரி</a></li>
							</ul>
						  </div>
						  <div>
							<h4><a href="'.base_url().'all-editions/edition_thirunelveli">திருநெல்வேலி</a></h4>
							<ul class="box-li area-li5">
							  <li><a href="'.base_url().'all-editions/edition_thirunelveli/thirunelveli"><i class="fa fa-caret-right fa-lg"></i>திருநெல்வேலி</a></li>
							  <li><a href="'.base_url().'all-editions/edition_thirunelveli/tuticorin"><i class="fa fa-caret-right fa-lg"></i> தூத்துக்குடி</a></li>
							  <li> <a href="'.base_url().'all-editions/edition_thirunelveli/kanyakumari"><i class="fa fa-caret-right fa-lg"></i> கன்னியாகுமரி</a></li>
							</ul>
						  </div>
						  <div>
							<h4><a href="'.base_url().'all-editions/edition_dharmapuri">தருமபுரி</a></h4>
							<ul class="box-li area-li6">
							  <li><a href="'.base_url().'all-editions/edition_dharmapuri/dharmapuri"><i class="fa fa-caret-right fa-lg"></i>தருமபுரி</a></li>
							  <li><a href="'.base_url().'all-editions/edition_dharmapuri/namakkal"><i class="fa fa-caret-right fa-lg"></i> நாமக்கல்</a></li>
							  <li> <a href="'.base_url().'all-editions/edition_dharmapuri/krishnagiri"><i class="fa fa-caret-right fa-lg"></i> கிருஷ்ணகிரி</a></li>
							  <li><a href="'.base_url().'all-editions/edition_dharmapuri/salem"><i class="fa fa-caret-right fa-lg"></i> சேலம்</a></li>
							</ul>
						  </div>
						  <div>
							<h4><a href="'.base_url().'all-editions/edition_villupuram">விழுப்புரம்</a></h4>
							<ul class="box-li area-li7">
							  <li><a href="'.base_url().'all-editions/edition_villupuram/villupuram"><i class="fa fa-caret-right fa-lg"></i>விழுப்புரம்</a></li>
							  <li><a href="'.base_url().'all-editions/edition_villupuram/cuddalore"><i class="fa fa-caret-right fa-lg"></i> கடலூர்</a></li>
							  <li> <a href="'.base_url().'all-editions/edition_villupuram/puducherry"><i class="fa fa-caret-right fa-lg"></i> புதுச்சேரி</a></li>
							</ul>
						  </div>
						  <div>
							<h4><a href="'.base_url().'all-editions/edition_villupuram">நாகப்பட்டினம்</a></h4>
							<ul class="box-li area-li7">
							  <li><a href="'.base_url().'all-editions/edition_trichy/nagapattinam"><i class="fa fa-caret-right fa-lg"></i>நாகப்பட்டினம் </a></li>
							  <li> <a href="'.base_url().'all-editions/edition_trichy/thiruvarur"><i class="fa fa-caret-right fa-lg"></i>  திருவாரூர்</a></li>
							  <li> <a href="'.base_url().'all-editions/edition_trichy/nagapattinam/karaikal"><i class="fa fa-caret-right fa-lg"></i>  காரைக்கால்</a></li>
							</ul>
						  </div>
						  <div>
						  <ul class="box-li area-li8">
							<li><a href="'.base_url().'all-editions/edition_bangalore"><i class="fa fa-caret-right fa-lg"></i>பெங்களூரு </a></li>
							<li><a href="'.base_url().'all-editions/edition_new_delhi"><i class="fa fa-caret-right fa-lg"></i>புதுதில்லி </a></li>
							</ul>
						  </div>
						</div>
					  </div>
					</div></div>';
							
					if(count($widget_instancemainsection)>0) {
						$j = 0;
						
						// // Tab Creation Block- Below code gets the record from windgetinstancemainsection table to create tabs for this widget 
						// Adding content Block - to add contents for each tab
						// Adding content Block starts here
						foreach($widget_instancemainsection as $get_section) 	{

							if($j == 0)	 {
								
								if($content['RenderingMode'] == "manual")	{
									$content_type = $content['content_type_id'];
									$widget_instance_contents 	= $this->widget_model->get_widgetInstancearticles_rendering($widget_instance_id , $get_section['WidgetInstanceMainSection_id'] ,$content['mode'],$content['show_max_article']); 						
								} else {
									$content_type = $content['content_type_id'];  // auto article content type
									$widget_instance_contents = $this->widget_model->get_all_available_articles_auto($content['show_max_article'], $get_section['cdata-categoryId'] , $content_type ,  $content['mode']);
								}
								$section_id = (string)$tab_sections[$j]['cdata-categoryId'];
								$section_details = $this->widget_model->get_section_by_id($section_id);
								$widget_section_url = $domain_name .$section_details ['URLSectionStructure'];
								//getting content block ends here
								//Widget code block - code required for simple tab structure creation. Do not delete
								//Widget code block Starts here
								
								$show_simple_tab .='<div class="col-lg-6 col-md-12 col-sm-6 col-xs-12    week-pair cart">';
								
								$show_simple_tab.=	'<div class="box-botton child-button">';
								
								if($content['RenderingMode'] == "manual")
									{
										$show_simple_tab.='<a href="'.$widget_section_url.'">'.$get_section['CustomTitle'].'</a>';
									}
									else
									{
										$show_simple_tab.='<a href="'.$widget_section_url.'">'.$get_section['cdata-customTitle'].'</a>';
									}
								$show_simple_tab.=	'</div>';
								
								
								//Widget code block ends here
								
								// content list iteration block - Looping through content list and adding it the list
								// content list iteration block starts here
								
									if (function_exists('array_column'))  {
										$get_content_ids = array_column($widget_instance_contents, 'content_id'); 
									}
									else {
										$get_content_ids = array_map( function($element) { return $element['content_id']; }, $widget_instance_contents);
									}
								
								$get_content_ids = implode("," ,$get_content_ids);
								
								if($get_content_ids!='') {
									
									$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, $is_home, $view_mode);	
																
									$widget_contents = array();
										foreach ($widget_instance_contents as $key => $value) {
										   foreach ($widget_instance_contents1 as $key1 => $value1) {
												if($value['content_id']==$value1['content_id']){
													$widget_contents[] = array_merge($value, $value1);
											}
										}
									}	
									
									if(count($widget_contents)>0)
									{
										$i =1;
										
										   $show_simple_tab.=	'<div class="box-one pair-box all-story"><div class="slider pair-auto ">';               
										
										foreach($widget_contents as $get_content) {
										
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
												$show_image	= image_url. imagelibrary_image_path.'logo/custom120x180.jpg';
												}
												$dummy_image	= image_url. imagelibrary_image_path.'logo/custom120x180.jpg';
												
												
											
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
										/*	if( $custom_summary == '')
											{
											$custom_summary =  $get_content['summary_html'];
											}
											$summary  = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$custom_summary);  //to remove first<p> and last</p>  tag	*/
											//  summary block endss here
											
												$show_simple_tab .= '<div><figure class="ithal-date"><a  href="'.$live_article_url.'"> <img src="'.$dummy_image.'"  title = "'.$imagetitle.'" data-src="'.$show_image.'" alt = "'.$imagealt.'"> <time>'.date('d.m.Y',strtotime(@$get_content['publish_start_date'])).'</time></a> </figure></div>';
												
												
												if($i == count($widget_instance_contents))
												{
														$show_simple_tab .= '</div></div></div>';
												}
												// display title and summary block ends here					
												//Widget design code block 1 starts here																
											//Widget design code block 1 starts here			
											$i =$i+1;	
									
										}
									}	
								}else {
																	  
									if($view_mode=="adminview") {
										$show_simple_tab .='<div class="margin-bottom-10">'.no_articles.'</div>';
										$show_simple_tab .='</div>';
									} else {
										$show_simple_tab .='</div>';
									}
								}
								$j++;
							}
						}
						
						
					} elseif($view_mode=="adminview") {
						$show_simple_tab .='<div class="margin-bottom-10">'.no_articles.'</div>';
					}
							
							

$show_simple_tab .='</div></div></div></div></div></div>';
echo $show_simple_tab;
							

?>
<script>
$('.pair-auto').slick({
        dots: true,
        infinite: false,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
  arrows: false
      });
</script>