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


$domain_name =  base_url();
$show_simple_tab = "";
$show_simple_tab .='<div class="main-junction"'.$widget_bg_color.'><div class="row">';
$show_simple_tab .='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " >';
if($widget_custom_title == '')
{
	$widget_custom_title='ஜங்ஷன்';
}

if($widget_custom_title!='')
{
		$show_simple_tab .='<figure class="bg-left"></figure>';
		
		if($content['widget_title_link'] == 1)
		{
		$show_simple_tab.=	'<figure class="bg-center1"><a href="'.$widget_section_url.'" >'.$widget_custom_title.'</a></figure>';
		}
		else
		{
		$show_simple_tab.=	'<figure class="bg-center1">'.$widget_custom_title.'</figure>';
		}
		$show_simple_tab.= '<figure class="bg-right"></figure>';
}
$show_simple_tab .='</div></div>';
$show_simple_tab .='<section id="features"><div class="row">';
$show_simple_tab .='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >';
$show_simple_tab .='<div class="slider autoplay pre-arrow " id="singleplay" >';


//getting content block starts here . Do not change anything
if($content['RenderingMode'] == "manual")
{
	$content_type = $content['content_type_id'];  // auto article content type
	$widget_instance_contents = $this->widget_model->get_widgetInstancearticles_rendering($widget_instance_id , " " , $view_mode); 						
}
else
{
	$content_type = $content['content_type_id'];  // auto article content type
	$widget_instance_contents = $this->widget_model->get_all_available_articles_auto($content['show_max_article'], $content['sectionID'], $content_type , $view_mode);
}


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
	$slider_side = 'L';
	if(count($widget_contents)>0)
	{
		//print_r($widget_contents);exit;
		foreach($widget_contents as $get_content)
		{
			//print_r($get_content);exit;
			// Code Block B starts here - Do not change
			$original_image_path = "";
			$imagealt            = "";
			$imagetitle          = "";
			$custom_title        = "";
			$custom_summary      = "";
			$author_name         = ""; 
			$Author_image_path   = "";
			$topic_name          = "";
if($view_mode == "adminview")
{	
      $Author_image_path="";
	  /*$image_id=$get_content['image_id'] ;
		if($image_id!='')
		{
		$author_details = $this->widget_model->get_image_by_contentid($image_id);
	    $Author_image_path  = $author_details['ImagePhysicalPath'];
        $Author_image_path; 
		$imagealt             = $author_details['ImageCaption'];	
		$imagetitle           = $author_details['ImageAlt'];
		}
		if($Author_image_path=="")
		{
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
		}*/
		
		$image_path=$get_content['image_path'] ;
		if($image_path!='')
		{
	    $Author_image_path    = $get_content['image_path'];
		$imagealt             =  $get_content['image_alt'];
		$imagetitle           =  $get_content['image_caption'];
		}
	}
else if($view_mode =="live")
{	
		$Author_image_path  =  $get_content['author_image_path'];
		$imagealt             = $get_content['author_image_alt'];	
		$imagetitle           = $get_content['author_image_title'];
	
	
	/*if($Author_image_path=="")
		{
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
		}*/
		/*if( $Author_image_path =="")                                                // from cms || live table    
		{
		$original_image_path  = $get_content['ImagePhysicalPath'];
		$imagealt             =$get_content['ImageCaption'];	
		$imagetitle           =$get_content['ImageAlt'];	
		}*/
	}
			$show_image="";
if($Author_image_path !='')
{
	
	/*$Image150X150  = str_replace("original","w150X150", $Author_image_path);

	if (file_exists(destination_base_path . imagelibrary_image_path . $Image150X150) && $Image150X150 != '')
	{ 
	$show_image = image_url. imagelibrary_image_path . $Image150X150;
	}
	else
	{
	$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_150X150.jpg';
	}*/
	if (file_exists(destination_base_path . $Author_image_path) && $Author_image_path != '')
	{ 
	$show_image = image_url. $Author_image_path;
	}
	else
	{
	$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_150X150.jpg';
	}
	
	
}
else
{
	/*if($original_image_path !='')
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
		
	}
	else
	{*/
		$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_150X150.jpg';
	/*}*/

}
$dummy_image = image_url. imagelibrary_image_path.'logo/dinamani_logo_150X150.jpg';		
			if($view_mode == "adminview")
			{
				$author_id = $get_content['AuthorID']; 
				$author_name = $get_content['AuthorName'];	
				if($author_id!=''){
				$author_details = $this->widget_model->get_author_details($author_id);	
				$topic_name = $author_details[0]['column_name'];
				}
			}
			else 
			{
				$author_name = $get_content['author_name'];
				$topic_name = $get_content['column_name'];
			}
			
			//echo $topic_name;exit;
			
			/*if ($author_name == "")
			{
			$author_name=$get_content['section_name'] ;
			}*/			
			//$Columnist_section_landing =  "0,".$section_ID.", 'section', this, '".$url_structure."'";
			
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
			
			$time = $lastpublishedon; 
			$post_time = $this->widget_model->time2string($time);
			if($slider_side == 'L') 
			{
				//echo $i;
				$show_simple_tab .='<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
				$show_simple_tab .='<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
				$show_simple_tab .='<div class="row"><article class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mani pad-right">';
				$show_simple_tab .='<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mani-list junction padding-both">';
				$show_simple_tab .='<h4>'.$author_name.'</h4>';
				$show_simple_tab .='<h5>'.$topic_name.'</h5>';
				$show_simple_tab .='<p>'.$display_title.'</p>';
				$show_simple_tab .='<time>'.date('d.m.Y',strtotime($time)).'</time></div>';
				$show_simple_tab .='<a href="'.$live_article_url.'" class="article_click"><figure class="col-lg-6 col-md-6 col-sm-6 col-xs-6  mani-img">';
				$show_simple_tab .='<div class="arrow-left"></div>';
				$show_simple_tab .='<img src="'.$dummy_image.'" data-src="'.$show_image.'"  title = "'.$imagetitle.'" alt = "'.$imagealt.'" /></figure></a>';
				$show_simple_tab .='</article></div></div></div></div>';				
				$slider_side ='R';
			} 
			else if($slider_side == 'R') 
			{			
				$show_simple_tab .='<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
				$show_simple_tab .='<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
				$show_simple_tab .='<div class="row"><article class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mani2 pad-left">';
				$show_simple_tab .='<a href="'.$live_article_url.'" class="article_click"><figure class="col-lg-6 col-md-6 col-sm-6 col-xs-3 mani-img2 ">';
				$show_simple_tab .='<img src="'.$dummy_image.'" data-src="'.$show_image.'"  title = "'.$imagetitle.'" alt = "'.$imagealt.'">';
				$show_simple_tab .='<div class="arrow-right"></div></figure></a>';
				$show_simple_tab .='<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mani-list2 junction padding-both">';
				$show_simple_tab .='<h4>'.$author_name.'</h4>';
				$show_simple_tab .='<h5>'.$topic_name.'</h5>';
				$show_simple_tab .='<p>'.$display_title.'</p>';
				$show_simple_tab .='<time>'.date('d.m.Y',strtotime($time)).'</time>';
				$show_simple_tab .='</div></a></article>';
				$show_simple_tab .='</div></div></div></div>';
				$slider_side ='L';
			}		
			$i =$i+1;							  
		}
	
	}
}
else
{
	$show_simple_tab .='<div class="margin-bottom-10">'.no_articles.'</div>';
}
$show_simple_tab .='</div>';
// Adding content Block ends here
if($content['widget_title_link'] == 1)
{
	$show_simple_tab .='<div class="arrow"><a href="'.$widget_section_url.'" ><div class="arrow-span"></div>';
	$show_simple_tab .='<div class="arrow-rightnew"></div></a></div>';
}
$show_simple_tab .='</div></div></section></div>';
echo $show_simple_tab;
?>


