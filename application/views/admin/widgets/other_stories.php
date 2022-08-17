<?php 
$domain_name = base_url();
$j = 0;
$show_simple_tab = "";
$widget_instance_contents_array = $data;
if(count(array_filter($widget_instance_contents_array)) > 0) {
$show_simple_tab .= '<h4 style="float: left;width: 100%;color: #004080!important;font-weight: 700 !important;">மேலும் இப்பிரிவில்</h4>';
$show_simple_tab .= '<div id="other_stories_slide1">';
$i = 1;
	foreach(array_filter($widget_instance_contents_array) as $from_get_content)
	{
		$original_image_path = "";
		$imagealt            = "";
		$imagetitle          = "";
		
		if(@$from_get_content['ImagePhysicalPath'] != '')
		{
			$original_image_path = $from_get_content['ImagePhysicalPath'];
			$imagealt            = $from_get_content['ImageCaption'];
			$imagetitle          = $from_get_content['ImageAlt'];
		}
		
		$show_image = "";
		if($original_image_path != '' && get_image_source($original_image_path, 1))
		{
			$imagedetails = get_image_source($original_image_path, 2);
			$imagewidth = $imagedetails[0];
			$imageheight = $imagedetails[1];	
		
			if ($imageheight > $imagewidth)
			{
				$Image100X65 	= $original_image_path;
			}
			else
			{
				$Image100X65 = str_replace("original", "w600X300", $original_image_path);
			}
			
			if(get_image_source($Image100X65, 1) && $Image100X65 != '')
			{
				$show_image = image_url . imagelibrary_image_path . $Image100X65;
			}
			else
			{
				$show_image = image_url . imagelibrary_image_path . 'logo/dinamani_logo_600X300.jpg';
			}
			$dummy_image = image_url . imagelibrary_image_path . 'logo/dinamani_logo_600X300.jpg';
		}
		else
		{
			$show_image  = image_url . imagelibrary_image_path . 'logo/dinamani_logo_600X300.jpg';
			$dummy_image = image_url . imagelibrary_image_path . 'logo/dinamani_logo_600X300.jpg';
		}
		$dummy_image = image_url . imagelibrary_image_path . 'logo/dinamani_logo_600X300.jpg';
		$content_url      = @$from_get_content['url'];
		$param            = $content['close_param'];
		$live_article_url = $domain_name . $content_url . $param;
		
		$custom_title  = @$from_get_content['title'];
		$display_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $custom_title); //to remove first<p> and last</p>  tag
		$display_title = '<a  href="' . $live_article_url . '" class="article_click" >' . $display_title . '</a>';
		
		$show_simple_tab .= '<div class="col-lg-4 col-md-4 col-sm-12 video-widget-up ms-list"> ';
		$show_simple_tab .= '<a  href="' . $live_article_url . '" ><img src="' . $dummy_image . '" data-src="'.$show_image.'"  title = "' . $imagetitle . '" alt = "' . $imagealt . '"></a><p>' . $display_title . '</p></div>'; 
		
		$i = $i + 1;
		
		$j++;
	}

$show_simple_tab .= '</div>';
$j++;
}
echo $show_simple_tab;
?>