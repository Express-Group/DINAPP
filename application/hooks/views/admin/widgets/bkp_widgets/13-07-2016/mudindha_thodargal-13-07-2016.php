<?php
$widget_bg_color     = $content['widget_bg_color'];
$widget_custom_title = $content['widget_title'];
$widget_instance_id  = $content['widget_values']['data-widgetinstanceid'];
$main_sction_id 	 = "";
$is_home             = $content['is_home_page'];
$widget_section_url  = $content['widget_section_url'];
$is_summary_required = $content['widget_values']['cdata-showSummary'];
$widget_section_url  = $content['widget_section_url'];
$view_mode           = $content['mode'];
$domain_name         =  base_url();
$show_simple_tab     = "";

$widget_auto_count = $this->widget_model->select_setting($view_mode);
//$article_count       = $widget_auto_count['subsection_otherstories_count_perpage'];
$load_more_url = $domain_name.'topic/?sid='.$content['page_param'].'&cid=1';

$show_simple_tab       .='<div class="row">';


$show_simple_tab       .=' <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  margin-top-10">';
if($widget_custom_title!='')
{	
    $show_simple_tab    .='<figure class="bg-left"></figure>';				
	if($content['widget_title_link'] == 1)
	{
	$show_simple_tab.=	' <figure class="bg-center1"><a href="'.$widget_section_url.'">'.$widget_custom_title.'</a></figure>';
	}
	else
	{
	$show_simple_tab.=	' <figure class="bg-center1">  '.$widget_custom_title.' </figure>';
	}
	$show_simple_tab .=' <figure class="bg-right"> </figure>';
}
$show_simple_tab       .='</div>';


 $show_simple_tab       .='<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">';
	
if($content['RenderingMode'] == "manual")
{
	$content_type = $content['content_type_id'];  // manual article content type
	$widget_instance_contents = $this->widget_model->get_widgetInstancearticles_rendering($widget_instance_id, " ", $view_mode,$content['show_max_article']);
}
else
{
	$content_type = $content['content_type_id'];  // auto article content type
	$widget_instance_contents = $this->widget_model->get_all_available_articles_auto_totalcount($content['show_max_article'], $content['sectionID'] , $content_type ,  $view_mode);
}


if (function_exists('array_column')) 
{
	$get_content_ids = array_column($widget_instance_contents, 'content_id'); 
}
else
{
	$get_content_ids = array_map( function($element) { return $element['content_id']; }, $widget_instance_contents);
}
$get_content_ids = implode("," ,$get_content_ids);
		
$archive =  '';

if($get_content_ids!='')
{
	$widget_instance_article = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, $is_home, $view_mode);	
	$content_id = array();
	foreach ($widget_instance_contents as $key => $value) {
		foreach ($widget_instance_article as $key1 => $value1) {
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
		$original_image_path = "";
		$imagealt            = "";
		$imagetitle          = "";
		$custom_title        = "";
		$custom_summary      = "";
		$author_image    ="";

if($view_mode == "adminview")
{
$section_id=$get_content['Section_id'];
$section_details = $this->widget_model->get_section_by_id($section_id);
//print_r($section_details);exit;
$author_id = $section_details['AuthorID'];
$author_det = $this->widget_model->get_author($author_id);	
//print_r($author_det);
//  summary block endss here
	if(count($author_det)>0)
	{
			$author_name = $author_det[0]['AuthorName'];
			
			$author_image = "";
			$imagealt = "";
			$imagetitle  = "";
			$image_id  = $author_det[0]['image_id'] ;
			
			$image_path=$author_det[0]['image_path'] ;
			if($image_path !='')
			{
			$author_image  = $author_det[0]['image_path']; 
			$imagealt             = $author_det[0]['image_alt'];	
			$imagetitle           = $author_det[0]['image_caption'];
	       }	
    }
}
else if($view_mode =="live")
{	
		$author_image         =  $get_content['author_image_path'];
		$imagealt             = $get_content['author_image_alt'];	
		$imagetitle           = $get_content['author_image_title'];
        $author_name=$get_content['author_name'];

}



if($author_image  !='')
{
	if (file_exists(destination_base_path . $author_image ) && $author_image  != '')
	{	
		 $show_image = image_url. $author_image ;
	}
	else
	{
	$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_150X150.jpg';
	}
}
else
{
$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_150X150.jpg';
}
$dummy_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_150X150.jpg';	
        $content_url = $get_content['url'];
		$param = $content['page_param'];
		$live_article_url = $domain_name.$content_url."?pm=".$param;
		
		if( $custom_title == '')
		{
		$custom_title = $get_content['title'];
		}	
		$display_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$custom_title);   //to remove first<p> and last</p>  tag
		$display_title = '<a  href="'.$live_article_url.'" class="article_click" >'.$display_title.'</a>';	
		
if($view_mode == "adminview")
{
	
	//$author_name = $get_content['AuthorName'];
	$url_section_value = $domain_name.$get_content['URLStructure'];
}
else 
{
//$author_name=$get_content['author_name'];
$url_array = explode('/', $content_url);
$get_seperation_count = count($url_array)-4;

$sectionURL = ($get_seperation_count==1)? $domain_name.$url_array[0] : (($get_seperation_count==2)? $domain_name.$url_array[0]."/".$url_array[1] : $domain_name.$url_array[0]."/".$url_array[1]."/".$url_array[2]);

$url_section_value = $sectionURL;
}
if ($author_name == "")
{
$author_name=$get_content['section_name'];
}
		//  Assign article links block ends hers
		if($i==1 || $i%2==1)
		{
			$show_simple_tab.='<div class="clear_both">';
		}
			$show_simple_tab   .='<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
	   $show_simple_tab   .='<ul class="old-junction">';
	
	$show_simple_tab   .='<li>
            <figure><a href="'.$url_section_value.'" > <img  src="'.$show_image.'"  title = "'.$imagetitle.'" alt = "'.$imagealt.'"></a>
              <figcaption>
                <h4>'.$author_name.'</h4>
                <p><a href="'.$url_section_value.'" >'.$get_content['section_name'].'</a></p>
              </figcaption>
            </figure>
          </li>';  //<p> '.$display_title.'</p>
		  
	$show_simple_tab   .='</ul>
                          </div>';
						  	
						  if($i==count($widget_contents)|| $i%2==0)
						  {
							  $show_simple_tab  .='</div>';
						  }
		 /*if(($i == count($widget_contents)))
				{
					$archive .= '<a class="load_more_archive" href="'.$load_more_url.'">மேலும்</a>';
				}	 */ 
		  
		$i =$i+1;
		 }
		
		
       }
	
	}
elseif($view_mode=="adminview")
{
$show_simple_tab .='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">';
$show_simple_tab .='<div class="margin-bottom-10" '.$widget_bg_color.'>'.no_articles.'</div>';
$show_simple_tab .='</div>';

}	
	$show_simple_tab .='<div class="pagina">';
$show_simple_tab .=$archive.'</div>';

	echo $show_simple_tab       .='</div></div></div>';
	

?>
