<?php 
/*
Finame 		: 	anmeegam
Created On 	: 	27-4-2016
Purpose for	:	Display the anmeegam widget
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

$show_simple_tab = "";

			if($content['RenderingMode'] == "manual")
			{
			$content_type = $content['content_type_id'];
			$widget_instance_contents 	= $this->widget_model->get_widgetInstancearticles_rendering($widget_instance_id , " " ,$content['mode'],$content['show_max_article']); 						
			}
			else
			{
			$content_type = $content['content_type_id'];  // auto article content type
			$widget_instance_contents = $this->widget_model->get_all_available_articles_auto($content['show_max_article'], $content['sectionID'] , $content_type ,  $content['mode']);
			}
/*if($content['widget_title_link'] == 1)
{
	 //$show_simple_tab .='<div class="arrow"><a href="'.$widget_section_url.'" class="landing-arrow"><div class="arrow-span"> </div><div class="arrow-rightnew"></div></a></div>';										
}*/

if($widget_custom_title == '')
{
	$widget_custom_title='இது புதுசு';
}

if($content['widget_title_link'] == 1)
{
	$widget_custom_title_content =	'<figure class="puthusu-bg-center1"><a href="'.$widget_section_url.'" class="FontWhite" >'.$widget_custom_title.'</a></figure>';
} else	{
	$widget_custom_title_content =	'<fiugre class="puthusu-bg-center1">'.$widget_custom_title.'</fiugre>';
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
			  
			  foreach($widget_contents as $key=>$get_content)
				{

					$custom_title        = "";
															$custom_summary      = "";
															$original_image_path = "";
															$imagealt            = "";
															$imagetitle          = "";
															$Image150X150        = "";

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

//if ($imageheight > $imagewidth)
if (false)
{
	$Image150X150 	= $original_image_path;
}
else
{				
	$Image150X150 	= str_replace("original","w150X150", $original_image_path);
}
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
																
																	$content_url = $get_content['url'];
	$param = $content['page_param']; //page parameter
	$live_article_url = $domain_name. $content_url."?pm=".$param;
	
																if( $custom_title == '')
	{
		$custom_title = stripslashes($get_content['title']);
	}	
	$display_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $custom_title);   //to remove first<p> and last</p>  tag
	$display_title = '<a  href="'.$live_article_url.'" class="article_click" >'.$display_title.'</a>';				
	if( $custom_summary == '' && $content['RenderingMode'] == "auto")
	{
		$custom_summary =  $get_content['summary_html'];
	}
	$summary  = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$custom_summary);  //to remove first<p> and last</p>  tag
							// Assign summary block starts here
																
								
								if($count == 1 ) {
							  $show_simple_tab .=' <div class="odd"  '.$widget_bg_color.'>
								<h4>'.@$from_contents_table[0]['AuthorName'].'</h4>
								<p>'. $display_title .'</p>
								<img src="'.$dummy_image.'" data-src="'.$show_image.'" title = "'.$imagetitle.'" alt = "'.$imagealt.'">';
								
								if($count != 1) {
							$show_simple_tab .='<div class="arrow-grey medai book-prev"><a href="#">
									  <div class="arrow-left-book"></div>
									  <span class="arrow-span"> </span>
									  </a></div>';
								}
							  $show_simple_tab .='</div>';


								$show_simple_tab .='<div class="book-discription"> <span style="line-height:20px"><p>'.(($is_summary_required== 1) ? $summary : "").'</p></span><div class="arrow-grey medai book-next"><a href="#"><span class="arrow-span"> </span>
							  <div class="arrow-rightnew"></div>
							  </a></div> </div>';

							   
							   $sub_count = 0;
							  } else {
								  //echo $summary;exit;
							   $show_simple_tab .='<div class="book-discription"  '.$widget_bg_color.'> <b>';
								 $show_simple_tab .='<h4>'.$display_title.'</h4>';
								 $show_simple_tab .='</b>'; //mb_substr($custom_summary,0, 60).".."
								$show_simple_tab .='<p>'.(($is_summary_required== 1) ? $summary : "").'</p>';
								if($count%3 ==0 ){
									if($count != count($widget_contents)) {
										
										if($content['widget_title_link'] == 1)
										{
											 $show_simple_tab .='<div class="arrow"><a href="'.$widget_section_url.'" class="landing-arrow"><div class="arrow-span"> </div><div class="arrow-rightnew"></div></a></div>';										
										}
										
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
								if($count == count($widget_contents)) {
								$show_simple_tab .='
										  <div class="odd hard"></div>
										</div>
									  </div>
									</div>
									<!--aside-1 end-->  ';
								}
								$sub_count++;
			 			 $count++;
			  }
			}
			 elseif($view_mode=="adminview")
			{
			 $show_simple_tab .='<div class="margin-bottom-10">'.no_articles.'</div>';
			}else
			{
				 $show_simple_tab .='';
			}
  		    
		echo $show_simple_tab;
		
 
 if(count($widget_contents)>0)
{
	?>
	
	
	<script type='text/javascript'>//<![CDATA[
$(function(){
$(".ithu_flipbook") .css("display", "block");	
$("#flipbook_<?php echo $widget_instance_id; ?>").turn({
//width: 380,
width: '100%', //to make it responsive.. need browser refresh for each screen width
height: 200,
autoCenter: true,
page:2,
acceleration:false
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

<?php
}
?>
