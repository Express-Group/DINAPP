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


// Code block A - this code block is needed for creating simple tab widget. Do not delete
$show_simple_tab = "";

// $show_simple_tab .='<figure class="puthusu-bg-center1">தலைப்புச் செய்திகள்</figure>';

if($content['widget_title_link'] == 1)
{
$widget_custom_title_content =	'<fiugre class="puthusu-bg-center1"><a href="'.$widget_section_url.'" >'.$widget_custom_title.'</a></fiugre>';
} else	{
$widget_custom_title_content =	'<fiugre class="puthusu-bg-center1">'.$widget_custom_title.'</fiugre>';
}




//getting content block ends here
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


$show_simple_tab .='	
<!--aside-1-->
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<figure class="puthusu-bg-left"></figure>'.$widget_custom_title_content;

$show_simple_tab .='<figure class="puthusu-bg-right"></figure>
<div id="flipbook_'.$widget_instance_id.'" class="ithu_flipbook" style="display:none">
<div class="hard"> </div>';
$count = 1;
$sub_count = 1;

foreach($widget_contents as $get_content)
{

$original_image_path = "";
$imagealt            = "";
$imagetitle          = "";
$custom_title        = "";
$custom_summary      = "";
$author_name         = ""; 
$Author_image_path   ="";
$Image150X150        = "";
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
if($view_mode == "adminview")
			{	
				
				if($original_image_path =="")                                                // from cms || live table    
				{
					$image_id=$get_content['image_id'] ;
					if($image_id!='')
					{
						$author_details = $this->widget_model->get_image_by_contentid($image_id);
						//echo '<pre>'; print_r($author_details); die();
						$Author_image_path  = $author_details['ImagePhysicalPath'];
						$imagealt             = $author_details['ImageCaption'];	
						$imagetitle           = $author_details['ImageAlt'];
					}
					else 
					{
						$original_image_path =="";
					}
					
					if($Author_image_path =="" || $original_image_path =="")            // from cms || live table    
					{
						$original_image_path  = $get_content['ImagePhysicalPath'];
						$imagealt             = $get_content['ImageCaption'];	
						$imagetitle           = $get_content['ImageAlt'];	
					}
				}
				
			}
			else if($view_mode =="live")
			{	
				if($original_image_path =="")
				{
					//$author_details = $this->widget_model->get_authorimagedetails_from_live($get_content['content_id']);
					$Author_image_path  =  $get_content['author_image_path'];
					$imagealt             = $get_content['author_image_alt'];	
					$imagetitle           = $get_content['author_image_title'];
				
				}
				if( $Author_image_path =="")                                                // from cms || live table    
				{
					$original_image_path  = $get_content['ImagePhysicalPath'];
					$imagealt             =$get_content['ImageCaption'];	
					$imagetitle           =$get_content['ImageAlt'];	
				}
				
			}
			$show_image="";
			if($Author_image_path !='')
			{
				$Image150X150  = str_replace("original","w150X150", $Author_image_path);
			
				if (file_exists(destination_base_path . imagelibrary_image_path . $Image150X150) && $Image150X150 != '')
				{
					$show_image = image_url. imagelibrary_image_path . $Image150X150;
				}
				else
				{
					$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_150X150.jpg';
				}
				$dummy_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_150X150.jpg';
			}
			else
			{
				if($original_image_path !='')
				{
					$Image150X150  = str_replace("original","w150X150", $original_image_path);
					
					if (file_exists(destination_base_path . imagelibrary_image_path . $Image150X150) && $Image150X150 != '')
					{
						$show_image = image_url. imagelibrary_image_path . $Image150X150;
					}
					else
					{
						$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_150X150.jpg';
					}
					$dummy_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_150X150.jpg';
				}
				else
				{
					$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_150X150.jpg';
					$dummy_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_150X150.jpg';
				}
			
			}
			
			if($view_mode == "adminview")
			{
				$author_id = $get_content['AuthorID']; 
				$author_name = $get_content['AuthorName'];				
			}
			else 
			{
				$author_name=$get_content['author_name'];
			}
			
			$content_url = $get_content['url'];
			$author_new_url = 'Author/'.$author_name;
			$url_array = explode('/', $content_url);
			$get_seperation_count = count($url_array)-5;
			$author_url = ($get_seperation_count==1)? $domain_name.$author_new_url : (($get_seperation_count==2)? $domain_name.$url_array[0]."/".$url_array[1] : $domain_name.$url_array[0]."/".$url_array[1]."/".$url_array[2]);
			
			$param = $content['page_param'];
			$live_article_url = $domain_name.$content_url."?pm=".$param;
			$display_title = ( $custom_title != '') ? $custom_title : ( ($get_content['title'] != '') ? $get_content['title']: '' ) ;
			$display_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$display_title);   //to remove first<p> and last</p>  tag
			$display_title = '<a  href="'.$live_article_url.'" class="article_click" >'.$display_title.'</a>';
			$summary = ( $custom_summary != '') ? $custom_summary : ( ($get_content['summary_html'] != '') ? $get_content['summary_html']: '' ) ;
			$summary  = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$summary);
			$lastpublishedon = $get_content['last_updated_on'];
//  Assign article links block ends hers


if($count == 1 ) {
$show_simple_tab .=' <div class="odd"  '.$widget_bg_color.'>
<h4>'.$author_name.'</h4>
<p>'. $display_title .'</p>
<img src="'.$show_image.'" title = "'.$imagetitle.'" alt = "'.$imagealt.'">';

if($count != 1) {
$show_simple_tab .='<div class="arrow-grey medai book-prev"><a href="#">
<div class="arrow-left-book"></div>
<span class="arrow-span"> </span>
</a></div>';
}
$show_simple_tab .='</div>';

$show_simple_tab .='<div class="book-discription"> <span style="line-height:20px"><p>'.$summary.'</p></span><div class="arrow-grey medai book-next"><a href="#"><span class="arrow-span"> </span>
<div class="arrow-rightnew"></div>
</a></div> </div>';
$sub_count = 0;
} else {
$show_simple_tab .='<div class="book-discription"  '.$widget_bg_color.'> <b>';
$show_simple_tab .='<h4>'.$display_title.'</h4>';
$show_simple_tab .='</b>'.$summary;

if($count%3 ==0 ){
if($count != count($widget_contents)) {
$show_simple_tab .='<div class="arrow-grey medai book-next"><a href="javascript:void(0);"><span class="arrow-span"> </span>
<div class="arrow-rightnew"></div>
</a></div>';	
}
}else {
$show_simple_tab .='<div class="arrow-grey medai book-prev"><a href="#">
<div class="arrow-left-book"></div>
<span class="arrow-span"> </span>
</a></div>';
}

$show_simple_tab .='</div>';
}

$sub_count++;
$count++;
}

$show_simple_tab .='
<div class="odd hard"></div>
</div>
</div>
</div>
<!--aside-1 end-->  ';

echo $show_simple_tab;

} 
}
?>


<script type='text/javascript'>//<![CDATA[
$(function(){
$(".ithu_flipbook") .css("display", "block");	
$("#flipbook_<?php echo $widget_instance_id; ?>").turn({
//width: 380,
width: '100%', //to make it responsive.. need browser refresh for each screen width
height: 200,
autoCenter: true,
page:2

});

$("#flipbook_<?php echo $widget_instance_id; ?>").bind("turning", function(event, page, pageObject) {
var totalPages = $("#flipbook_<?php echo $widget_instance_id; ?>").turn("pages");
//	alert( totalPages + " page:"+ page );
if (totalPages == page || page == 1){
event.preventDefault();
}
});

});//]]> 
</script>
