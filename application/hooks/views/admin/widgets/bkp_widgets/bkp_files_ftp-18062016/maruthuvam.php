<?php 
// widget config block Starts - This code block assign widget background colour, title and instance id. Do not delete it 
$widget_bg_color         = $content['widget_bg_color'];
$widget_custom_title     = $content['widget_title'];
$widget_instance_id      =  $content['widget_values']['data-widgetinstanceid'];
$widget_section_url      = $content['widget_section_url'];
$is_home                 = $content['is_home_page'];
$main_sction_id 	     = "";
$is_summary_required     = $content['widget_values']['cdata-showSummary'];
$domain_name             =  base_url();
$view_mode               = $content['mode'];
$show_simple_tab         = "";
// widget config block ends

$domain_name =  base_url();
$show_simple_tab = "";
$show_simple_tab .='<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
$show_simple_tab .='<div class="sec-11"><div class="row">';
$show_simple_tab .='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
$show_simple_tab .='<figure class="bg-left"></figure>';

if($content['widget_title_link'] == 1)
{
	$show_simple_tab .= '<figure class="bg-center1"><a href="'.$widget_section_url.'" >'.$widget_custom_title.'</a></figure>';
}
else
{
	$show_simple_tab .='<figure class="bg-center1">'.$widget_custom_title.'</figure>';
}
$show_simple_tab .='<figure class="bg-right"></figure>';
$show_simple_tab .='</div></div><div class="row">';
$show_simple_tab .='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">';
$show_simple_tab .='<div class="job-boder"'.$widget_bg_color.'>';


//getting content block starts here . Do not change anything
if($content['RenderingMode'] == "manual")
{
$content_type = $content['content_type_id'];  // auto article content type
$widget_instance_contents 	= $this->widget_model->get_widgetInstancearticles_rendering($widget_instance_id , " " , $view_mode ); 						
}
else
{
$content_type = $content['content_type_id'];  // auto article content type
$widget_instance_contents = $this->widget_model->get_all_available_articles_auto($content['show_max_article'], $content['sectionID'], $content_type ,  $view_mode );
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
foreach($widget_contents as $get_content)
{
$custom_title        = "";
$custom_summary      = "";
$original_image_path = "";
$imagealt            = "";
$imagetitle          = "";
$Image600X390        = "";
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
}	
else 
{
$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
}	

							   /******************** article title and summary and url ********************/
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

// display title and summary block starts here

if($i==1)
{

$show_simple_tab .='<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  ">
<article>
<figure><a href="'.$live_article_url.'"><img src="'.$show_image.'" title = "'.$imagetitle.'" alt = "'.$imagealt.'"></a></figure>
<figcaption class="lead-news">';

$show_simple_tab .='<h4>'.$display_title.'</h4>';

if($is_summary_required=='y'){

$show_simple_tab .= '<p>'.$summary.'</p>';
}
$show_simple_tab .= '</figcaption>
</article>
</div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pad-left ">
<ul class="lead-list">';

}else{

$show_simple_tab .='<li><div><i class="fa fa-angle-right"></i></div>';

$show_simple_tab .='<p>'.$display_title.'</p>';

$show_simple_tab .='</li>';

if($i == count($widget_contents))
{
// Adding content Block ends here

$show_simple_tab .='</ul></div>';

if($content['widget_title_link'] == 1)
{

$show_simple_tab .='<div class="arrow"><a href="'.$widget_section_url.'" ><div class="arrow-span"> </div><div class="arrow-rightnew">												
</div></a></div>';
}
$show_simple_tab .='</div></div></div></div>';

}
}
// display title and summary block ends here					
//Widget design code block 1 starts here																
//Widget design code block 1 starts here			
$i =$i+1;	

}
// content list iteration block ends here

}
}
else
{
$show_simple_tab .='<div class="margin-bottom-10">'.no_articles.'</div>';
}

$show_simple_tab .='</div></div>';


echo $show_simple_tab;
?>
