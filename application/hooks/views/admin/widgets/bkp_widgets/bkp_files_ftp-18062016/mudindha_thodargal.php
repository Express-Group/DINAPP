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
$article_count       = $widget_auto_count['subsection_otherstories_count_perpage'];

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
	$widget_instance_contents_pageination = $this->widget_model->get_widgetInstancearticles_rendering($widget_instance_id, " ", $view_mode);
}
else
{
	$content_type = $content['content_type_id'];  // auto article content type
	$widget_instance_contents_pageination = $this->widget_model->get_all_available_articles_auto_totalcount($content['show_max_article'], $content['sectionID'] , $content_type ,  $view_mode);
}


if (function_exists('array_column')) 
{
	$get_content_ids = array_column($widget_instance_contents_pageination, 'content_id'); 
}
else
{
	$get_content_ids = array_map( function($element) { return $element['content_id']; }, $widget_instance_contents);
}
$get_content_ids = implode("," ,$get_content_ids);
		
		$widget_contents_pagination = array();
$content_id = '';

$archive =  '';

if($get_content_ids!='')
{
	$widget_instance_article = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, $is_home, $view_mode);	
	$content_id = array();
	foreach ($widget_instance_contents_pageination as $key => $value) {
		foreach ($widget_instance_article as $key1 => $value1) {
			if($value['content_id']==$value1['content_id']){
			   $widget_contents_pagination[] = array_merge($value, $value1);
			   $content_id[] = $value1['content_id'];
			}
		}
	}
	$content_id = implode("," ,$content_id);

}


$TotalCount= count($widget_contents_pagination); 

$last_content_id = @$widget_contents_pagination[$TotalCount-1]['content_id'];

$this->load->library('pagination');
$config['total_rows'] = $TotalCount; 
$config['per_page'] = $article_count; 
$config['custom_num_links'] = 5;
$config['page_query_string'] = TRUE;
$config['enable_query_strings']=TRUE;
$config['use_page_numbers'] = TRUE;
$config['cur_tag_open'] = "<a href='javascript:void(0);' class='active'>";
$config['cur_tag_close'] = "</a>";
$page_num = $config['use_page_numbers'];
$article_limit = ($this->input->get('per_page') != '')?$this->input->get('per_page'):0;

$start = $article_limit; 
$page_number=$this->input->get('per_page')/$config['per_page'] + 1;
$limit =$article_count;
$config['use_page_numbers'] = TRUE;
$this->pagination->initialize($config); 
//$PaginationLink = $this->pagination->create_links();
$PaginationLink = $this->pagination->custom_create_links();

$load_more_url = $domain_name.'topic/?sid='.$content['page_param'].'&cid=1';






		if($content_id!='')
{
	$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database_per_page($content_id, $content_type, $is_home, $view_mode, $start,$limit);	
	
	$widget_contents = array();
	foreach ($widget_instance_contents_pageination as $key => $value) {
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
		//print_r($get_content);exit;
		$original_image_path = "";
		$imagealt            = "";
		$imagetitle          = "";
		$custom_title        = "";
		$custom_summary      = "";
if($view_mode == "adminview")
{	
      $Author_image_path="";
	  /*$image_id=$get_content['image_id'] ;
		if($image_id!='')
		{
		$author_details = $this->widget_model->get_image_by_contentid($image_id);
			if(count($author_details)>0)
			{
			$Author_image_path  = $author_details['ImagePhysicalPath'];
			$Author_image_path; 
			$imagealt             = $author_details['ImageCaption'];	
			$imagetitle           = $author_details['ImageAlt'];
			}
			else
			{ 
			$Author_image_path="";
			$imagealt="";
			$imagetitle="";
			}
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



/*}  */     
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
		if( $custom_summary == '')
		{
		$custom_summary =  $get_content['summary_html'];
		}
		$summary  = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$custom_summary);  //to remove first<p> and last</p>  tag	
		//  summary block endss here
		
		if($view_mode == "adminview")
{
	
	$author_name = $get_content['AuthorName'];
	$url_section_value = $domain_name.$get_content['URLStructure'];
}
else 
{
$author_name=$get_content['author_name'];
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
		//if($i==1 || $i==6)
		//if($i==1 || $i%2==1)
		//{ echo $i;
		if($i==1 || $i%2==1)
		{
			$show_simple_tab.='<div class="clear_both">';
		}
			$show_simple_tab   .='<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
	   $show_simple_tab   .='<ul class="old-junction">';
		//}
		 
	
	
	$show_simple_tab   .='<li>
            <figure><a href="'.$url_section_value.'" > <img  src="'.$show_image.'"  title = "'.$imagetitle.'" alt = "'.$imagealt.'"></a>
              <figcaption>
                <h4>'.$author_name.'</h4>
                <p><a href="'.$url_section_value.'" >'.$get_content['section_name'].'</a></p>
				<p> '.$display_title.'</p>
              </figcaption>
            </figure>
          </li>';
		  
		//if($i==count($widget_contents)|| $i%2==0 || $i==1) 
		//{ 
	$show_simple_tab   .='</ul>
                          </div>';
						  	
						  if($i==count($widget_contents)|| $i%2==0)
						  {
							  $show_simple_tab  .='</div>';
						  }
		//}
		 if(($TotalCount < $article_count) && ($i == count($widget_contents))  || ($last_content_id == $get_content['content_id']))
				{
					//$show_simple_tab.= '<div class="col-sm-12"><p class="load_more_archive" style="margin-bottom:10px;"><a href="'.$load_more_url.'">More from Archieve</a></p></div>';
					$archive .= '<a class="load_more_archive" href="'.$load_more_url.'">More</a>';
				}	  
		  
		$i =$i+1;
		 }
		
		
       }
	
	}
elseif($view_mode=="adminview")
{
	
/*$show_simple_tab .='<div class="margin-bottom-10" style="width:100%" '.$widget_bg_color.'>'.no_articles.'</div>';
*/

$show_simple_tab .='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">';
$show_simple_tab .='<div class="margin-bottom-10" '.$widget_bg_color.'>'.no_articles.'</div>';
$show_simple_tab .='</div>';

}	
	$show_simple_tab .='<div class="pagina">';
$show_simple_tab .= $PaginationLink ;
$show_simple_tab .=$archive.'</div>';

	echo $show_simple_tab       .='</div></div></div>';
	

?>
