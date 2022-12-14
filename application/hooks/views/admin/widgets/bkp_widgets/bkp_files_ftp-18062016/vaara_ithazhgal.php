<?php 
// widget config block Starts - This code block assign widget background colour, title and instance id. Do not delete it 
$widget_bg_color         = $content['widget_bg_color'];
$widget_custom_title     = $content['widget_title'];
$widget_instance_id      =  $content['widget_values']['data-widgetinstanceid'];
$widget_section_url      = $content['widget_section_url'];
$is_home                 = $content['is_home_page'];
$main_sction_id 	     = "";
$is_home                 = $content['is_home_page'];
$is_summary_required     = $content['widget_values']['cdata-showSummary'];
$domain_name             =  base_url();
$view_mode               = $content['mode'];
$show_simple_tab         = "";
// widget config block ends

//getting tab list for hte widget
$widget_instancemainsection	= $this->widget_model->get_widget_mainsection_config_rendering('', $widget_instance_id, $content['mode']);
// Code block A - this code block is needed for creating simple tab widget. Do not delete
$domain_name =  base_url();
$show_simple_tab = "";
$show_simple_tab .='<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
<div id="features">
<div class="lead-stories side-gap week-story" '.$widget_bg_color.'>';

if($content['widget_title_link'] == 1)
{
$show_simple_tab.=	'<div class="box-botton week-button "><a href="#" >'.$widget_custom_title.'</a></div>';
}
else
{
$show_simple_tab.=	'<div class="box-botton week-button ">'.$widget_custom_title.'</div>';
}
$show_simple_tab.= '  <div class="box-one week-box">';

											
//getting content block - getting content list based on rendering mode
//getting content block starts here . Do not change anything
if($content['RenderingMode'] == "manual")
{
	$content_type = $content['content_type_id'];  // auto article content type
	$widget_instance_contents 	= $this->widget_model->get_widgetInstancearticles_rendering($widget_instance_id , " " ,$content['mode']); 						
}
else
{
   $content_type = $content['content_type_id'];  // auto article content type
   $widget_instance_contents = $this->widget_model->get_all_available_articles_auto($content['show_max_article'], $content['sectionID'], $content_type ,  $content['mode']);
}
//getting content block ends here

// content list iteration block starts here
if (function_exists('array_column')) 
{
$get_content_ids = array_column($widget_instance_contents, 'content_id'); 
}
else
{
$get_content_ids = array_map( function($element) { return $element['content_id']; }, $widget_instance_contents);
}
$get_content_ids = implode("," ,$get_content_ids);
if($get_content_ids!='')
{
$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, $is_home, $view_mode);	
$widget_contents = array();
foreach ($widget_instance_contents as $key => $value) {
	foreach ($widget_instance_contents1 as $key1 => $value1) {
		if($value['content_id']==$value1['content_id']){
		   $widget_contents[] = array_merge($value, $value1);
		}
	}
}
$i =1;
if(count($widget_contents)>0)
{
//echo '<pre>'; print_r($widget_contents); die();

foreach($widget_contents as $get_content)
{
$original_image_path = "";
$imagealt            = "";
$imagetitle          = "";
$custom_title        = "";
$custom_summary      = "";  
$summary      = "";
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

if($original_image_path =="") // from cms || Live table    
{
$original_image_path  = $get_content['ImagePhysicalPath'];
$imagealt             = $get_content['ImageCaption'];	
$imagetitle           = $get_content['ImageAlt'];	
}


//$SourceURL = $content['widget_img_phy_path'];
$show_image="";
if($original_image_path !='')
{
	$Image600X300  = str_replace("original","w600X300", @$original_image_path);
	$dummy_image	= ( $i % 2 == 1)  ? image_url. imagelibrary_image_path.'logo/custom120x180.jpg' : image_url. imagelibrary_image_path.'logo/dinamani_logo_600X300.jpg' ;
	$show_image	= ( $i % 2 == 1)  ? image_url. imagelibrary_image_path.'logo/custom120x180.jpg' : image_url. imagelibrary_image_path.'logo/dinamani_logo_600X300.jpg' ;
	if (file_exists(destination_base_path . imagelibrary_image_path . $Image600X300) && $Image600X300 != '')
	{
		$show_image = image_url. imagelibrary_image_path . $Image600X300;
	}
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
// Assign summary block starts here

// display title and summary block starts here
//print_r($from_contents_table[0]);exit;
$add_active =($i==1) ? 'active' : '';	
if($i==1){
$show_simple_tab .='<div class="slider single-item">';
}
$show_simple_tab .='<div '.$add_active.'">
<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12   week"> <figure class="ithal-date">';
$lastpublishedon = $get_content['last_updated_on'];
$publish_date =date('d-m-Y', strtotime($lastpublishedon));
$custom_imagealt = '';
$custom_imagetitle= '';

$show_simple_tab .='<img src="'.$show_image.'" title = "'.$imagetitle.'" alt = "'.$imagealt.'" />
<time>'.$publish_date.'</time> 
</figure>
</div>
<div class="col-lg-7 col-md-7 col-sm-6 col-xs-12   week1">'; 

$show_simple_tab .='<h5>'.$display_title.'</h5>';

$show_simple_tab .=' <figure><img src="'.$show_image.'" title = "'.$imagetitle.'" alt = "'.$imagealt.'" /> </figure>';
if($is_summary_required=='y'){
$show_simple_tab .= '<p>'.$summary.'</p>';
}
$show_simple_tab .= '</div>
</div>';

// display title and summary block ends here					
//Widget design code block 1 starts here																
//Widget design code block 1 starts here			
$i =$i+1;							  
}

}
}
else
{
	$show_simple_tab .='<div class="margin-bottom-10">'.no_articles.'</div></div>';
}

// content list iteration block ends here


// Adding content Block ends here
$show_simple_tab .='</div>
</div>
</div>
</div>
</div></div>';
echo $show_simple_tab;
?>
