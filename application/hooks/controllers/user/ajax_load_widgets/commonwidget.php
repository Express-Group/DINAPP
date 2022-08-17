<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Commonwidget extends CI_Controller 
{
	
	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('cookie');	
		//$this->load->model('admin/comment_model');
		$this->load->model('admin/widget_model');
		$this->load->driver('cache', array('adapter' => 'file'));	
	} 
	
	public function get_poll_results()
	{
		$class_object = new poll_result;
		$class_object->get_poll_results();
	}
	
	public function select_poll_results()
	{
		$class_object = new poll_result;
		$class_object->select_poll_results();
	}
	public function share_article_via_email()
	{
		$class_object = new email_section;
		$class_object->share_article_via_email();
	}
	public function update_most_hits_and_emailed($type, $content_id)
	{
		$class_object = new email_section;
		$class_object->update_most_hits_and_emailed($type, $content_id);
	}
	function post_comment()
	{
		$set_object=new view;
		$set_object->post_comment();
	}
	public function Search_datatable() {
		$class_object = new view;
		$class_object->Search_datatable();
	}
	public function get_tab_content(){
	    $class_object = new view;
		$class_object->get_tab_content();
	}
	public function get_cinematab_content(){
	    $class_object = new view;
		$class_object->get_cinematab_content();
	}
	public function get_menu_content(){
	    $class_object = new view;
		$class_object->get_menu_content();
	}	
	public function get_editor_pick_content(){
	    $class_object = new view;
		$class_object->get_editor_pick_content();
	}
	public function get_most_read_content(){
	    $class_object = new view;
		$class_object->get_most_read_content();
	}
	public function get_panchangam_content(){
	    $class_object = new view;
		$class_object->get_panchangam_content();
	}
	public function sutrulla_content(){
	    $class_object = new view;
		$class_object->sutrulla_content();
	}
	public function tnpsc_content(){
	    $class_object = new view;
		$class_object->tnpsc_content();
	}
		public function get_add_widget(){
	    $class_object = new view;
		$class_object->get_add_widget();
	}
	public function update_hits()
	{
		$class_object = new view;
		$class_object->update_hits();
	}
	public function subscribe_newsletter()
	{
		$class_object = new view;
		$class_object->subscribe_newsletter();
	}
	
	public function get_image_gallery_list()
	{
		$class_object = new view;
		$class_object->get_image_gallery_list();
	}
	
	public function fill_widget()
	{
		$widget_data                = json_decode($this->input->post('widget_data'), true);
		print_r(($widget_data['widgettab']));exit;
		$widget_location            = $widget_data['@attributes']['data-widgetfilepath'];
		$widget_instance_id         = $widget_data['@attributes']['data-widgetinstanceid'];
	
		$view_mode                  = $this->input->post('view_mode');
		$content_type               = $widget_data['@attributes']['data-contenttype'];
		$content['mode']            = $view_mode;
		$show_summary               = $widget_data['@attributes']['cdata-showSummary'];
		$content['page_param']      = $this->input->post('page_param');
		$content['content_from']    = $this->input->post('content_from');
		$content['is_home_page']    = (strtolower($content['page_param']) == 'home') ? 'y' : 'n';
		$content['widget_values']   = array('data-widgetinstanceid'=> $widget_instance_id,'cdata-showSummary'=>$show_summary);
		$string                     = '';
		$domain_name 				= base_url();
		$widget_section_url         = '';
		$widget_section_id          = '';
		$widget_sectionname_link    ='';
		$special_parent_section     = array();
			if($view_mode=="live"){
		$widget_instance_details    = $this->widget_model->getWidgetInstance('', '','', '', $widget_instance_id, $view_mode);	 //live db	
			}else{
		$widget_instance_details    = $this->template_design_model->getWidgetInstance('', '','', '', $widget_instance_id, $content['mode'],''); 		
			}
		
		if(count($widget_instance_details)>0){	
		if($widget_instance_details['WidgetSection_ID'] != '' && $widget_instance_details['WidgetSection_ID'] != "0")
		{
			$this->load->model('admin/template_design_model');
			$widget_section_details = $this->template_design_model->get_section_by_id($widget_instance_details['WidgetSection_ID']);
			$widget_custom_title    = ($widget_instance_details['CustomTitle']!= '') ? $widget_instance_details['CustomTitle'] : $widget_section_details['Sectionname'];
			if($widget_instance_details['CustomTitle']!= '' && $widget_instance_details['WidgetSection_ID']=='0')
			{
				$widget_sectionname_link = 0;
				$widget_section_id       = '';
				$widget_section_url      = '';
			}
			else
			{
				$widget_sectionname_link = 1;
				$widget_section_id       = $widget_instance_details['WidgetSection_ID'];
				$widget_section_url      = $domain_name.$widget_section_details['URLSectionStructure'];
			}
		}
		else
		{
			$widget_custom_title = ($widget_instance_details['CustomTitle']!= '') ? $widget_instance_details['CustomTitle'] : "";
		}
		
		$content_type_names			   = array("None"=>1,"Article" => 2,"Gallery" => 3,"Video" => 4,"Audio" => 5);
		$content_type_name			   = array_search($content_type, $content_type_names);
		
		$content_type_id			   = $this->widget_model->get_content_type_byname($content_type_name, $view_mode);	
		
		$content['content_type_id']    = (count($content_type_id) > 0) ? $content_type_id['contenttype_id'] : '' ;
		$content['widget_title'] 	   = $widget_custom_title;
		
		$content['sectionID']          = $widget_section_id;
		$content['widget_title'] 	   = $widget_custom_title;
		$content['widget_title_link']  = $widget_sectionname_link;
		
		$content['widget_bg_color']    = "style='background-color:".$widget_instance_details['Background_Color']. ";'";		
		$content['show_max_article']   = $widget_instance_details['Maximum_Articles'];
		$content['RenderingMode'] 	   = $widget_instance_details['RenderingMode'];
				
		$mode                          = $view_mode;		
		$widget_custom_title           = $content['widget_title'];
				
		$content['widget_section_url'] = $widget_section_url;
		
		$data['content']               = $content;		
		if($widget_location=="admin/widgets/article_details")
		{	
		$file_name                         = FCPATH."/application/views/admin/widgets/article_details_preview.php";
		$widget_location                   = "admin/widgets/article_details_preview";
		}else{
		$file_name                         = FCPATH.'/application/views/'.$widget_location.".php";
		}
		
		if (file_exists($file_name)) {
			$string = $this->load->view($widget_location, $data, true);			
		} else {
			$string = '<div class="row">The file '.$file_name.' does not exist</div>';
		}
		}
		//print_r($string);exit;	
		$widget_content['widget_detail']= $string;
		echo  json_encode($widget_content);
		
	
	}
}


class poll_result extends Commonwidget
{
	public function get_poll_results()
	{
		$this->widget_model->insert_poll_results();
	}
	
	public function select_poll_results()
	{
		extract($_POST);
		$poll_count = $this->widget_model->select_poll($get_poll_id)->row_array();
		echo json_encode($poll_count);
	}
}

class email_section extends Commonwidget
{
	public function share_article_via_email()
	{
    //load email helper
    $this->load->helper('email');
    //load email library
    $this->load->library('email');
    
    //read parameters from $_POST using input class
	$content_id = $this->input->post('content_id');
	$section_id = $this->input->post('section_id'); 
	$content_type = $this->input->post('content_type_id'); 
	$name = $this->input->post('name');  
	$share_email = $this->input->post('share_email',true);
	$refer_email = $this->input->post('refer_email',true);
	$share_content = $this->input->post('share_content');
	$share_url =  $this->input->post('share_url'); 
	$message =  $this->input->post('message'); 
	$body_text = $message.'</br>'.'shared url :'.$share_url;
  
    // check is email addrress valid or no
    if (valid_email($share_email)&&valid_email($refer_email)){  
      // compose email
      $this->email->from($share_email , $name);
      $this->email->to($share_email); 
	  $this->email->cc($refer_email);
      $this->email->subject($share_content);
      $this->email->message($body_text);  
      
      // try send mail ant if not able print debug
      if ( ! $this->email->send())
      {
        echo "Email not sent \n".$this->email->print_debugger();      
      }
	  
       $this->widget_model->update_most_hits_and_emailed('E', $content_type, $content_id, $share_content, $section_id);
	     // successfull message
        echo "Email was successfully sent to $share_email";
      
    } else {

      echo "Email address ($share_email) is not correct.";
    }
	
	}
	
	
}
class view extends Commonwidget
{
	public function tnpsc_content()
	{
		extract($_POST);
		if( isset($section_id)!='' && isset($section_id)!=0 )
		{
			$domain_name = base_url();
			if($rendermode == "manual")
			{
				$content_type= 1;
				$widget_instance_contents 	= $this->widget_model->get_widgetInstancearticles_rendering($widgetinstanceid, $section_id ,$mode); 						
			}
			else
			{
				$content_type= 1;
				$widget_instance_contents = $this->widget_model->get_all_available_articles_auto($max_article, $section_id ,$content_type, $mode);
			}
	if (function_exists('array_column')) 
	{
$get_content_ids = array_column($widget_instance_contents, 'content_id'); 
	}else
	{
$get_content_ids = array_map( function($element) { return $element['content_id']; }, $widget_instance_contents);
	} 
	$get_content_ids = implode("," ,$get_content_ids);
	$show_simple_tab = '';
	/*$show_simple_tab .='<div>';
	$show_simple_tab .='<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="tour-line">';*/

	if($get_content_ids!='')
	{
		$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, $is_home, $mode);	
		$widget_contents = array();
			foreach ($widget_instance_contents as $key => $value) {
				foreach ($widget_instance_contents1 as $key1 => $value1) {
					if($value['content_id']==$value1['content_id']){
					   $widget_contents[] = array_merge($value, $value1);
					}
				}
			}
			$i =1; 
			$show_simple_tab .='<div>
					<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
					<div class="outline job-sub-tab">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  ">
					<ul class="lead-list"  >';
if(count($widget_contents)>0)
		     {				
 		foreach($widget_contents as $get_content)
		{
		$imageid ="";
		// Code block C  starts here
		$original_image_path = "";
		$imagealt            = "";
		$imagetitle          = "";
		$custom_title        = "";
		$custom_summary      = "";
		if($rendermode == "manual")
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
				$Image600X390 	= $original_image_path;
				}
				else
				{				
				$Image600X390 	= str_replace("original","w600X390", $original_image_path);
				}
				
				$show_image = image_url. imagelibrary_image_path . $Image600X390;
			}	
			else 
			{
			$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
			}
			$dummy_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
		
		$content_url = $get_content['url'];
		$url_array = explode('/', $content_url);
		$get_seperation_count = count($url_array)-4;
		
		$sectionURL = ($get_seperation_count==1)? $domain_name.$url_array[0] : (($get_seperation_count==2)? $domain_name.$url_array[0]."/".$url_array[1] : $domain_name.$url_array[0]."/".$url_array[1]."/".$url_array[2]);
		
		$param = $param;
		$live_article_url = $domain_name.$content_url."?pm=".$param;
		// Assign block ends here
		// Assign article links block - creating links for  article summary Display article																
		
		
		if($rendermode == "manual")
		 {
		$custom_title = $get_content['CustomTitle'];
		 }
		if( $custom_title != '')
		{																	
		$display_title = $custom_title;
		}
		else
		{
		$display_title = $get_content['title'];
		}	
		$display_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$display_title);   //to remove first<p> and last</p>  tag
		$display_title = '<a  href="'.$live_article_url.'" class="article_click" >'.$display_title.'</a>';
		
		//  Assign article links block ends hers
		
		// Assign summary block - creating links for  article summary
		// Assign summary block starts here
		$custom_summary = '';
		if($rendermode == "manual")
		 {
			$custom_summary = $get_content['CustomSummary'];
		 }
		if( $custom_summary != '')
		{
		$summary =  $custom_summary;
		}
		else
		{
		$summary =  $get_content['summary_html'];
		}
		$summary  = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$summary);   //to remove first<p> and last</p>  tag
		
		// display title and summary block starts here
		if($i<=count($widget_contents))
		{
		//if($i==1)
		//																	{
		//																	$show_simple_tab.='<ul class="lead-list">';
		//																	}
		$show_simple_tab.='<li>
		<div><i class="fa fa-angle-right"></i></div>
		<p>'.$display_title.'</p>
		</li>';
		
		}
			
		//Widget design code block 1 starts here																
		//Widget design code block 1 starts here			
		$i =$i+1;							  
		}
	  }
	  $show_simple_tab .='</ul>  
				 </div>
				 </div>
				 </div>
				 </div>
				 </div>';
	}
	elseif($mode=="adminview")
	{
		//echo 'hhh';
		 $show_simple_tab .='<div class="margin-bottom-10">'.no_articles.'</div>';
	}
	$show_simple_tab .= '</div></div></div></div>';
		echo $show_simple_tab;				
		}
		
	}

	public function sutrulla_content()
	{
		extract($_POST);
		if( isset($section_id)!='' && isset($section_id)!=0 )
		{
			$domain_name = base_url();
			if($rendermode == "manual")
			{
				$content_type= 1;
				$widget_instance_contents 	= $this->widget_model->get_widgetInstancearticles_rendering($widgetinstanceid, $section_id ,$mode); 						
			}
			else
			{
				$content_type= 1;
				$widget_instance_contents = $this->widget_model->get_all_available_articles_auto($max_article, $section_id ,$content_type, $mode);
			}
	if (function_exists('array_column')) 
	{
$get_content_ids = array_column($widget_instance_contents, 'content_id'); 
	}else
	{
$get_content_ids = array_map( function($element) { return $element['content_id']; }, $widget_instance_contents);
	} 
	$get_content_ids = implode("," ,$get_content_ids);
	$show_simple_tab = '';
	$show_simple_tab .='<div>';
	$show_simple_tab .='<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="tour-line">';

	if($get_content_ids!='')
	{
		$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, $is_home, $mode);	
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
		$imageid ="";
		// Code block C  starts here
		$original_image_path = "";
		$imagealt            = "";
		$imagetitle          = "";
		$custom_title        = "";
		$custom_summary      = "";
		if($rendermode == "manual")
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
				$Image600X390 	= $original_image_path;
				}
				else
				{				
				$Image600X390 	= str_replace("original","w600X390", $original_image_path);
				}
				
				$show_image = image_url. imagelibrary_image_path . $Image600X390;
			}	
			else 
			{
			$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
			}
			$dummy_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
		
		$content_url = $get_content['url'];
		$url_array = explode('/', $content_url);
		$get_seperation_count = count($url_array)-4;
		
		$sectionURL = ($get_seperation_count==1)? $domain_name.$url_array[0] : (($get_seperation_count==2)? $domain_name.$url_array[0]."/".$url_array[1] : $domain_name.$url_array[0]."/".$url_array[1]."/".$url_array[2]);
		
		$param = $param;
		$live_article_url = $domain_name.$content_url."?pm=".$param;
		// Assign block ends here
		// Assign article links block - creating links for  article summary Display article																
		
		
		if($rendermode == "manual")
		 {
		$custom_title = $get_content['CustomTitle'];
		 }
		if( $custom_title != '')
		{																	
		$display_title = $custom_title;
		}
		else
		{
		$display_title = $get_content['title'];
		}	
		$display_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$display_title);   //to remove first<p> and last</p>  tag
		$display_title = '<a  href="'.$live_article_url.'" class="article_click" >'.$display_title.'</a>';
		
		//  Assign article links block ends hers
		
		// Assign summary block - creating links for  article summary
		// Assign summary block starts here
		$custom_summary = '';
		if($rendermode == "manual")
		 {
			$custom_summary = $get_content['CustomSummary'];
		 }
		if( $custom_summary != '')
		{
		$summary =  $custom_summary;
		}
		else
		{
		$summary =  $get_content['summary_html'];
		}
		$summary  = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$summary);   //to remove first<p> and last</p>  tag
		
		// display title and summary block starts here
		if($i == 1)
		{
		$show_simple_tab .= '<div class="col-lg-4 col-md-6 col-sm-4 col-xs-12  tour">
		<a href="'.$live_article_url.'" class="article_click" >
		<figure><img src="'.$show_image.'" title = "'.$imagetitle.'" alt = "'.$imagealt.'"></figure>
		</a>
		</div>
		<figcaption class="col-lg-4 col-md-6 col-sm-4 col-xs-12  tour1">';
		$show_simple_tab .='<h4>'.$display_title.'</h4>';
		$show_simple_tab .= '<p>'.$summary.'</p>';
		$show_simple_tab .= '</figcaption><div class="col-lg-4 col-md-6 col-sm-4 col-xs-12 "><ul class="lead-list tour-list">';
		}
		else
		{
		$show_simple_tab .='
		<li><div><i class="fa fa-angle-right"></i></div>';
		$show_simple_tab .='<p>'.$display_title.'</p>';
		$show_simple_tab .='</li>';  
		} 
		
		if($i == count($widget_contents))
		{
			$show_simple_tab .='</ul></div>';
		$show_simple_tab .='<div class="arrow">
			<a href="'.$sectionURL.'" class="landing-arrow"><div class="arrow-span"> </div><div class="arrow-rightnew"></div></a></div>';
		}
			
		//Widget design code block 1 starts here																
		//Widget design code block 1 starts here			
		$i =$i+1;							  
		}
	  }
	}
	elseif($mode=="adminview")
	{
		//echo 'hhh';
		 $show_simple_tab .='<div class="margin-bottom-10">'.no_articles.'</div>';
	}
	$show_simple_tab .= '</div></div></div></div>';
		echo $show_simple_tab;				
		}
		
	}
	
	public function post_comment(){
		//$posted_comments =array();
		//$comments=new Comment_model();
		$this->load->model('admin/comment_model');
		$posted_comments = $this->comment_model->insert_article_comment();	
		/*$show_comments='<div>';
		foreach($posted_comments as $article_comment)
		{
		$show_comments .='<div class="ArticlePosts">
		<span class="UserIcon"><i class="fa fa-user"></i></span>
		<div class="ArticleUser">';
		$show_comments .='<h4>'.$article_comment['Guestname'].'</h4>';
		$show_comments .='<p>'.($article_comment['UpdatedComment']!='')? $article_comment['UpdatedComment'] : $article_comment['OriginalComment'].'</p>';
		$time= $article_comment['Createdon']; $post_time= $this->comment_model->time2string($time);
		 $show_comments .='<p class="PostTime">'.$post_time.'ago<span class="SiteColor"> reply(0)</span> <i class="fa fa-flag"></i></p>';
		$show_comments .='</div>
		</div>';
		 } 
		 $show_comments .='</div>';*/
		 //print_r($posted_comments);exit;
		//$show_comments;
		 
		echo $posted_comments['view_comments'];	
	}
	
	public function Search_datatable()
	{
		$this->widget_model->get_search_result_data();
	}
	
	public function get_tab_content(){
		extract($_POST);
	if(isset($tabid)!=''&& isset($tabid)!=0){
		$domain_name = base_url();
		if($rendermode == "manual")
		{
			$content_type= 1;
			$widget_instance_contents 	= $this->widget_model->get_widgetInstancearticles_rendering($widgetinstanceid, $tabid ,$mode); 						
		}
		else
		{
			$content_type= 1;
			$widget_instance_contents = $this->widget_model->get_all_available_articles_auto($max_article, $tabid ,$content_type, $mode);
		}
	if (function_exists('array_column')) 
	{
$get_content_ids = array_column($widget_instance_contents, 'content_id'); 
	}else
	{
$get_content_ids = array_map( function($element) { return $element['content_id']; }, $widget_instance_contents);
	} 
	$get_content_ids = implode("," ,$get_content_ids);
	$show_simple_tab = '';
	$show_simple_tab .='<div><div class="row">';
	$show_simple_tab .='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="outline">';

	if($get_content_ids!='')
	{
		$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, $is_home, $mode);	
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
		$show_image = "";
		$imageid ="";
		// Code block C  starts here
			$original_image_path = "";
			$imagealt ="";
			$imagetitle="";
			if($_POST['rendermode'] == "manual")
			{
				if($get_content['custom_image_path'] != '')
				{
					$original_image_path = $get_content['custom_image_path'];
					$imagealt            = $get_content['custom_image_title'];	
					$imagetitle          = $get_content['custom_image_alt'];												
				}
			}
			if($original_image_path =="")                                                // from cms imagemaster table    
				{
					   $original_image_path  = $get_content['ImagePhysicalPath'];
					   $imagealt             = $get_content['ImageCaption'];	
					   $imagetitle           = $get_content['ImageAlt'];	
				}
			
		if($original_image_path !='')
		{
		$Image600X390  = str_replace("original","w600X390", $original_image_path);
		$imagealt ="";
		$imagetitle="";
		if (file_exists(destination_base_path . imagelibrary_image_path . $Image600X390) && $Image600X390 != '')
		{
		$show_image = image_url. imagelibrary_image_path . $Image600X390;
		}
		else {
		$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
		}
		}
		else
		$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
		// Code block C ends here
		
		// Assign block - assigning values required for opening the article in light box
		// Assign block starts here
		
		$content_url = $get_content['url'];
		$url_array = explode('/', $content_url);
		$get_seperation_count = count($url_array)-4;
		
		$sectionURL = ($get_seperation_count==1)? $domain_name.$url_array[0] : (($get_seperation_count==2)? $domain_name.$url_array[0]."/".$url_array[1] : $domain_name.$url_array[0]."/".$url_array[1]."/".$url_array[2]);
		
		$param = $param;
		$live_article_url = $domain_name.$content_url."?pm=".$param;
		// Assign block ends here
		// Assign article links block - creating links for  article summary Display article																
		
		$custom_title = '';
		if($rendermode == "manual")
		 {
		$custom_title = $get_content['CustomTitle'];
		 }
		if( $custom_title != '')
		{																	
		$display_title = $custom_title;
		}
		else
		{
		$display_title = $get_content['title'];
		}	
		$display_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$display_title);   //to remove first<p> and last</p>  tag
		$display_title = '<a  href="'.$live_article_url.'" class="article_click" >'.$display_title.'</a>';
		
		//  Assign article links block ends hers
		
		// Assign summary block - creating links for  article summary
		// Assign summary block starts here
		$custom_summary = '';
		if($rendermode == "manual")
		 {
			$custom_summary = $get_content['CustomSummary'];
		 }
		if( $custom_summary != '')
		{
		$summary =  $custom_summary;
		}
		else
		{
		$summary =  $get_content['summary_html'];
		}
		$summary  = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$summary);   //to remove first<p> and last</p>  tag
		
		// display title and summary block starts here
		if($i == 1)
		{
		$show_simple_tab .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  "><article>';
		$show_simple_tab .= '<figure><a href="'.$live_article_url.'" class="article_click" >';
		$show_simple_tab .= '<img src="'.$show_image.'" title = "'.$imagetitle.'" alt = "'.$imagealt.'"></a>';
		$show_simple_tab .= '</figure><figcaption class="lead-news">';					
		$show_simple_tab .='<h4>'.$display_title.'</h4>';
		if($summary_option == 1){
			$show_simple_tab .= '<p>'.$summary.'</p>';
		}
		$show_simple_tab .= '</figcaption></article></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  pad-left"><ul class="lead-list">';
		}
		else
		{
		$show_simple_tab .='<li><div><i class="fa fa-angle-right"></i></div>';
		$show_simple_tab .='<p>'.$display_title.'</p>';
		$show_simple_tab .='</li>';  
		} 
		if($i == count($widget_contents))
		{
		$show_simple_tab .='</ul></div>';
			$show_simple_tab .='<div class="arrow"><a href="'.$sectionURL.'" class="landing-arrow">';
			$show_simple_tab .='<div class="arrow-span"> </div><div class="arrow-rightnew"></div></a></div>';
		}
			
		//Widget design code block 1 starts here																
		//Widget design code block 1 starts here			
		$i =$i+1;							  
		}
	}
	}elseif($_POST['mode']=="adminview")
	{
		 $show_simple_tab .='<div class="margin-bottom-10">'.no_articles.'</div>';
	}
	$show_simple_tab .= '</div></div></div></div>';
	echo $show_simple_tab;							
    }

}

public function get_cinematab_content()
{
	
		extract($_POST);
	if(isset($tabid)!=''&& isset($tabid)!=0){
		$domain_name = base_url();
		if($rendermode == "manual")
		{
			$content_type= $content_type;
			$widget_instance_contents 	= $this->widget_model->get_widgetInstancearticles_rendering($widgetinstanceid, $tabid ,$mode); 						
		}
		else
		{
			$content_type= $content_type;
			$widget_instance_contents = $this->widget_model->get_all_available_articles_auto($max_article, $tabid ,$content_type, $mode);
		}
	if (function_exists('array_column')) 
	{
$get_content_ids = array_column($widget_instance_contents, 'content_id'); 
	}else
	{
$get_content_ids = array_map( function($element) { return $element['content_id']; }, $widget_instance_contents);
	} 
	$get_content_ids = implode("," ,$get_content_ids);
	$show_simple_tab = '';
	$show_simple_tab .='<div><div class="row">';
	$show_simple_tab .='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="cinema">';
	if($get_content_ids!='')
	{
		$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, $is_home, $mode);	
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
		$show_image = "";
		$imageid ="";
		// Code block C  starts here
			$original_image_path = "";
			$imagealt ="";
			$imagetitle="";
			if($_POST['rendermode'] == "manual")
			{
				if($get_content['custom_image_path'] != '')
				{
					$original_image_path = $get_content['custom_image_path'];
					$imagealt            = $get_content['custom_image_title'];	
					$imagetitle          = $get_content['custom_image_alt'];												
				}
			}
			if($original_image_path =="")                                                // from cms imagemaster table    
				{
					   $original_image_path  = $get_content['ImagePhysicalPath'];
					   $imagealt             = $get_content['ImageCaption'];	
					   $imagetitle           = $get_content['ImageAlt'];	
				}
			
		if($original_image_path !='')
		{
		$Image600X390  = str_replace("original","w600X390", $original_image_path);
		$imagealt ="";
		$imagetitle="";
		if (file_exists(destination_base_path . imagelibrary_image_path . $Image600X390) && $Image600X390 != '')
		{
		$show_image = image_url. imagelibrary_image_path . $Image600X390;
		}
		else {
		$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
		}
		}
		else
		$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
		// Code block C ends here
		
		// Assign block - assigning values required for opening the article in light box
		// Assign block starts here
		
		$content_url = $get_content['url'];
		$url_array = explode('/', $content_url);
		$get_seperation_count = count($url_array)-4;
		
		$sectionURL = ($get_seperation_count==1)? $domain_name.$url_array[0] : (($get_seperation_count==2)? $domain_name.$url_array[0]."/".$url_array[1] : $domain_name.$url_array[0]."/".$url_array[1]."/".$url_array[2]);
		
		$param = $param;
		$live_article_url = $domain_name.$content_url."?pm=".$param;
		// Assign block ends here
		// Assign article links block - creating links for  article summary Display article																
		
		$custom_title = '';
		if($rendermode == "manual")
		 {
		$custom_title = $get_content['CustomTitle'];
		 }
		if( $custom_title != '')
		{																	
		$display_title = $custom_title;
		}
		else
		{
		$display_title = $get_content['title'];
		}	
		$display_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$display_title);   //to remove first<p> and last</p>  tag
		$display_title = '<a  href="'.$live_article_url.'" class="article_click" >'.$display_title.'</a>';
		
		//  Assign article links block ends hers
		
		// Assign summary block - creating links for  article summary
		// Assign summary block starts here
		$custom_summary = '';
		if($rendermode == "manual")
		 {
			$custom_summary = $get_content['CustomSummary'];
		 }
		if( $custom_summary != '')
		{
		$summary =  $custom_summary;
		}
		else
		{
		$summary =  $get_content['summary_html'];
		}
		$summary  = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$summary);   //to remove first<p> and last</p>  tag
		
		// display title and summary block starts here
		if($i == 1)
				{
					$show_simple_tab .= '<article class="col-lg-7 col-md-6 col-sm-6 col-xs-12   cinema-padd">';
					$show_simple_tab .= '<figure><a href="'.$live_article_url.'" class="article_click" >';
					$show_simple_tab .= '<img src="'.$show_image.'"  title = "'.$imagetitle.'" alt = "'.$imagealt.'"></a>';
					$show_simple_tab .= '</figure><figcaption class="lead-news">';					
					$show_simple_tab .='<h4>'.$display_title.'</h4>';
					if($summary_option == 1){
						$show_simple_tab .= $summary;
					}
					$show_simple_tab .= '</figcaption></article>';
				}
				else
				{
					if($i == 2)
					{
						$show_simple_tab .='<article class="col-lg-5 col-md-6 col-sm-6 col-xs-12 cinema-list"><ul>';
					}
					$show_simple_tab .='<li><a href="'.$live_article_url.'" class="article_click" >';
					$show_simple_tab .='<img src="'.$show_image.'"  title = "'.$imagetitle.'" alt = "'.$imagealt.'"></a>';
					$show_simple_tab .='<p>'.$display_title.'</p>';
					$show_simple_tab .='</li>';  
				} 
				if($i == count($widget_contents))
				{
					$show_simple_tab .='</ul> </article>';
						$show_simple_tab .='<div class="arrow"><a href="'.$sectionURL.'" class="landing-arrow">';
						$show_simple_tab .='<div class="arrow-span"> </div><div class="arrow-rightnew"></div></a></div>';
					$show_simple_tab .='</div>';
				}
			
		//Widget design code block 1 starts here																
		//Widget design code block 1 starts here			
		$i =$i+1;							  
		}
	}
	}elseif($_POST['mode']=="adminview")
	{
		 $show_simple_tab .='<div class="margin-bottom-10">'.no_articles.'</div>';
	}
	$show_simple_tab .= '</div></div></div></div>';
	echo $show_simple_tab;							
    }


}
	
	public function get_menu_content(){
	$count=0;$show_simple_tab ='';
    $widget_instance_contents = $this->widget_model->get_section_article_for_common_widgets($_POST['menuid'], $_POST['mode'], 1); // last parammeter indicates jumbo menu
	if(count($widget_instance_contents)>0)
	{
	if (function_exists('array_column')) 
		{
	$get_content_ids = array_column($widget_instance_contents, 'content_id'); 
		}else
		{
	$get_content_ids = array_map( function($element) { return $element['content_id']; }, $widget_instance_contents);
		}
	$get_content_ids = implode("," ,$get_content_ids);
	if (function_exists('array_column')) 
		{
	$get_content_types = array_column($widget_instance_contents, 'content_type'); 
		}else
		{
	$get_content_types = array_map( function($element) { return $element['content_type']; }, $widget_instance_contents);
		}
	$content_type = $get_content_types[0];
	$show_image= "";
	$view_mode = $_POST['mode'];
	if($get_content_ids!='')
	{
	$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, "n", $view_mode);	
	
	$widget_contents = array();
		foreach ($widget_instance_contents as $key => $value) {
			foreach ($widget_instance_contents1 as $key1 => $value1) {
				if($value['content_id']==$value1['content_id']){
			       $widget_contents[] = array_merge($value, $value1);
				}
			}
		}
		
	if(isset($widget_contents)) { 
		foreach($widget_contents  as $get_content) {
		/*$content_type =1;
		$show_image="";
		$view_mode = $_POST['mode'];
		$from_contents_table = $this->widget_model->get_contentdetails_from_database($get_content['content_id'], $content_type, $_POST['is_home'] , $view_mode);	*/
		    $show_image= "";
			$image_path = $get_content['image_path'];
			if($image_path!= '')
			{
				$Image600X390 	= str_replace("original","w600X390", $image_path);
				$imagealt ="";
				$imagetitle="";
				if (file_exists(destination_base_path . imagelibrary_image_path . $Image600X390) && $Image600X390 != '')
				{
					$show_image = image_url. imagelibrary_image_path . $Image600X390;
					if ($get_content['image_alt'] != '')
					$imagealt = $get_content['image_alt'];
					if($get_content['image_caption'] != '')
					$imagetitle = $get_content['image_caption'];
				}
			}else{
				$content_type = $get_content['content_type'];
				//print_r($widget_contents);exit;
				$image_path   = ($content_type==3 && $view_mode=="live")? $get_content['first_image_path']: (($content_type==4 && $view_mode=="live")? $get_content['video_image_path']: $get_content['ImagePhysicalPath']);
				$Image600X390 = str_replace("original","w600X390", $image_path);
				$imagealt     = ($content_type==3 && $view_mode=="live")? $get_content['first_image_alt']: (($content_type==4 && $view_mode=="live")? $get_content['video_image_alt']: $get_content['ImageAlt']);
				$imagetitle   = ($content_type==3 && $view_mode=="live")? $get_content['first_image_title']: (($content_type==4 && $view_mode=="live")? $get_content['video_image_title']: $get_content['ImageCaption']);
				if (file_exists(destination_base_path . imagelibrary_image_path . $Image600X390) && $Image600X390 != '')
				{
					$show_image = image_url. imagelibrary_image_path . $Image600X390;
				}
			}
			
			$parent_sectionname = ($_POST['mode']=="live")? $get_content['parent_section_name'] : '';
			$parent_sectionname = ($parent_sectionname!='')? $parent_sectionname.'/' : '';
			
			$content_url = $get_content['url'];  //article url
			$param = $_POST['param']; //page parameter
			$domain_name =  base_url();
			$live_article_url = $domain_name.$content_url."?pm=".$param;
				
			// Assign block ends here
			// Assign article links block - creating links for  article 
			$custom_title = $get_content['CustomTitle'];
			if( $custom_title != '')
			{																	
				$display_title = $custom_title;
			}
			else
			{
				$display_title = $get_content['title'];
			}	
			$display_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$display_title);
			$display_title = '<a  href="'.$live_article_url.'" class="article_click" >'.$display_title.'</a>';

	if($count<=3 && $show_image!='' && $parent_sectionname !='Columns/'){
	
	   $show_simple_tab .='<div class="MultiImageContent">';
		 $show_simple_tab .='<a  href="'.$live_article_url.'" class="article_click">';
		$show_simple_tab .='<img src="'.$show_image.'"  title = "'.$imagetitle.'" alt = "'.$imagealt.'"></a>
	 '.$display_title.'</div>';
	
	$count++;
	}else if($parent_sectionname =='Columns/'){ 
	$show_simple_tab .='<div class="MultiImageContent">
		
	 '.$display_title.'</div>';
	$count++;
	}
	} 
	}
	}
	}
	echo $show_simple_tab;
	}
	
public function get_editor_pick_content(){
  $domain_name =  base_url();
  $type        = $this->input->get('type');
  $view_mode   = $this->input->get('mode');
	if($type=='editor_pick'){
  $editor_pick_articles = $this->widget_model->get_section_article_for_common_widgets(0, $view_mode, 2);    // last parameter indicates trending now
  
 // print_r($editor_pick_articles); exit;
  }
  elseif($type=='trending'){
  $editor_pick_articles = $this->widget_model->get_section_article_for_common_widgets(0, $view_mode, 3);    // last parameter indicates trending now
  }else if($type=='most_read'){
  $get_time       = $this->widget_model->select_setting($view_mode);
  $time_mostread  = $get_time['timeintervalformostreadarticle'];
  $mostread_limit = $get_time['articlecountformostreadnow'];
  $time_mostread  = strtotime($time_mostread) - strtotime('today');
  $editor_pick_articles = $this->widget_model->get_content_by_hit_count($time_mostread,$mostread_limit);
  }
		
	  if (function_exists('array_column')) 
		{
	$get_content_ids = array_column($editor_pick_articles, 'content_id'); 
		}else
		{
	$get_content_ids = array_map( function($element) { return $element['content_id']; }, $editor_pick_articles);
		}
	$get_content_ids = implode("," ,$get_content_ids);
	$content_type = 1;
	if($get_content_ids!='')
	{
	$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, 'n', $view_mode);	
	
	$widget_contents = array();
		foreach ($editor_pick_articles as $key => $value) {
			foreach ($widget_instance_contents1 as $key1 => $value1) {
				if($value['content_id']==$value1['content_id']){
			       $widget_contents[] = array_merge($value, $value1);
				}
			}
		}
		
	if(count($widget_contents)>0)
		     {				
 		foreach($widget_contents as $get_content)
		{
		 $custom_title = '';
		 $content_url = $get_content['url'];  //article url
		 $param = $this->input->get('param');; //page parameter
		 $domain_name =  base_url();
		 $live_article_url = $domain_name.$content_url."?pm=".$param;
		  if($type=='trending'){
		 $custom_title    = $get_content['CustomTitle'];
		  }
			if( $custom_title != '')
			{																	
				$display_title = $custom_title;
			}
			else
			{
				$display_title = $get_content['title'];
			}
		echo '<p><i class="fa fa-angle-right"></i>
		  <a  href="'.$live_article_url.'"  class="article_click" >'.preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $display_title).'</a></p>';
		}
	}
		}elseif($view_mode=="adminview"){
		 echo '<div class="margin-bottom-10">'.no_articles.'</div>';
		}
  }
  
  
public function get_most_read_content(){
  $domain_name =  base_url();
  $type        = $this->input->get('type');
  $view_mode   = $this->input->get('mode');
  
  $get_time       = $this->widget_model->select_setting($view_mode);
  $time_mostread  = $get_time['timeintervalformostreadarticle'];
  $mostread_limit = $get_time['articlecountformostreadnow'];
  $time_mostread  = strtotime($time_mostread) - strtotime('today');
  
  $most_read_articles = $this->widget_model->get_content_by_hit_count($time_mostread,$mostread_limit);
  
	if (function_exists('array_column'))  {
						$get_content_ids = array_column($most_read_articles, 'content_id'); 
					} else {
						$get_content_ids = array_map( function($element) { return $element['content_id']; }, $most_read_articles);
					}
					$get_content_ids = implode("," ,$get_content_ids);
					$content_type = 1;
					if($get_content_ids!='')	{
						
						$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, 'n', $view_mode);	

						$widget_contents = array();
							foreach ($most_read_articles as $key => $value) {
								foreach ($widget_instance_contents1 as $key1 => $value1) {
									if($value['content_id']==$value1['content_id']){
									   $widget_contents[] = array_merge($value, $value1);
									}
								}
							}
							
						if(count($widget_contents)>0)  {				
							foreach($widget_contents as $get_content) {
								
							 $custom_title = '';
							 $content_url = $get_content['url'];  //article url
							 $domain_name =  base_url();
							 $live_article_url = $domain_name.$content_url;
							  
							if( $custom_title != '')
							{																	
								$display_title = $custom_title;
							}
							else
							{
								$display_title = $get_content['title'];
							}											
			
						  echo '<li>
							<div><i class="fa fa-angle-right"></i></div>
							<p><a href="'.$live_article_url.'" class="article_click" >'.$display_title.'</a></p>
						  </li>';
					  
							 }
						}
						  
					  } else{
							if($view_mode=="adminview")
								echo '<li><p class="margin-bottom-10">'.no_articles.'</p></li>';
							else
								echo "<li><p></p></li>";
					  }

  }
  
  
public function get_panchangam_content(){

		extract($_POST);
  
		 $panchangam_manager =  $this->db->query('CALL get_panchangamFP()')->result_array();
		foreach($panchangam_manager as $panchangam) {
			
			//$panchangamdetails=$panchangam['PanchangamDetails'];
			
			$tamil_day = $panchangam['Tamilday'];
			$tamil_year_month=  $panchangam['Tamilyearandmonth'];
			$nalla_nearm_kalai = $panchangam['NallaNeramKalai'];
			$nalla_nearm_malai = $panchangam['NallaNeramMalai'];
			$raagu_kaalam = $panchangam['RaaguKaalam'];
			$yemmakandam = $panchangam['Yemmakandam'];
			$kuligai = $panchangam['Kuligai'];
			$thithi = $panchangam['Thithi'];
			$chandrashtam = $panchangam['Chandrashtam'];
			
			$mesham = $panchangam['MeshamRasiPalan'];
			$rishabam = $panchangam['RishabamRasiPalan'];
			$midhunam = $panchangam['MidhunamRasiPalan'];
			$kadagam = $panchangam['KadahamRasiPalan'];
			$simmam = $panchangam['SimamRasiPalan'];
			$kanni = $panchangam['KanniRasiPalan'];
			$thulam = $panchangam['ThulamRasiPalan'];
			$viruchigam = $panchangam['ViruchagammRasiPalan'];
			$danusu = $panchangam['DanushuRasiPalan'];
			$magaram = $panchangam['MagaramRasiPalan'];
			$kumbam = $panchangam['KumbamRasiPalan'];
			$meenam = $panchangam['MenamRasiPalan'];
			$scheduleddate = $panchangam['Panchangam_date'];
			$current_date = date('d',strtotime($scheduleddate));
			$current_year = date('Y',strtotime($scheduleddate));
			$current_month = date('F',strtotime($scheduleddate));
			$month_tamil = tamil_month($current_month);
		
		}
		
			if($tab_type =='panchangam') {
				$Content = '<div class="row">
                    <article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="row">
                      <div class="rasi-gap">
                        <div class="col-lg-4  col-md-4 col-sm-6 col-xs-4  date">
                          <div class="tamil-date">
                            <h1>'. @$current_date.'</h1>
                            <h4>'.$month_tamil.' '.$current_year.'</h4><br/>
                          <p>'. @$tamil_year_month.'</p>
                          </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8  rasi1">
                  			 <h4 style="color:#064877 !important;">'. @$tamil_day.'</h4>
                      	<ul>
                        <li class="rasi-time color-red">நல்ல நேரம்</li>
                        <li class="rasi-odd"><span>காலை:</span> </li>
                        <li class="rasi-even">'. @$nalla_nearm_kalai.'</li>
                        <li class="rasi-odd"><span>மதியம்:</span> </li>
                        <li class="rasi-even">'. @$nalla_nearm_malai.'</li>
                        <li class="rasi-odd"><span class="color-red">ராகு காலம்:</span> </li>
                        <li class="rasi-even">'. @$raagu_kaalam.'</li>
                        <li class="rasi-odd"><span class="color-red">எம கண்டம்: </span></li>
                        <li class="rasi-even">'. @$yemmakandam.'</li>
                        <li class="rasi-odd"><span class="color-red">குளிகை: </span></li>
                        <li class="rasi-even">'. @$kuligai.'</li>
                      </ul>
                      <p class="thithi"><span class="color-red">திதி: </span>'. @$thithi.'</p>
							
							
                        </div>
                        </div>
                      </div>
                    </article>
                  </div>'; 
			} else {
				$Content = '<div class="row">
                    <article  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 rasi-icon">
                     <div class="right-rasi">
                     <ul>
                    <li>மேஷம்: <span>'. @$mesham.'</span></li>
                    <li>ரிஷபம்: <span>'. @$rishabam.'</span></li>
                    <li>மிதுனம்: <span>'. @$midhunam.'</span></li>
                    <li>கடகம்: <span>'. @$kadagam.'</span></li>
                    <li>சிம்மம்: <span>'. @$simmam.'</span></li>
                    <li>கன்னி: <span>'. @$kanni.'</span></li>
                     </ul>
                     </div>
                       <div class="left-rasi">
                    <ul>
                    <li>துலாம்: <span>'. @$thulam.'</span></li>
                    <li>விருச்சிகம்: <span>'. @$viruchigam.'</span></li>
                    <li>தனுசு: <span>'. @$danusu.'</span></li>
                    <li>மகரம்: <span>'. @$magaram.'</span></li>
                    <li>கும்பம்: <span>'. @$kumbam.'</span></li>
                    <li> மீனம்: <span>'. @$meenam.'</span></li>
                    </ul>
                     </div>
                    </article>
                  </div>';
			}
			
			echo $Content;
  }
  
  public function get_add_widget(){
  $widget_instance_id = $_POST['instance_id'];
  $view_mode = $_POST['mode'];
   $widget_instance_details = $this->widget_model->getWidgetInstance('', '','', '', $widget_instance_id, $view_mode);		
   echo $widget_instance_details['AdvertisementScript'];exit;
  }
  
  public function update_hits()
  {
	  $content_id      = $this->input->post('content_id');
	  $content_type_id = $this->input->post('content_type_id');
	  $title           = addslashes($this->input->post('title'));
	  $section_id      = $this->input->post('section_id');
	  $page_param      = $this->input->post('page_param');
	                       /* --------- increase hits in content_hit_history -------------*/ 
	  $this->widget_model->update_most_hits_and_emailed('H' , $content_type_id,  $content_id, $title, $section_id);
      $this->widget_model->update_trending_read_hits($content_id, $content_type_id);
	                     /* ------------------------ end hits adding ------------------- */
						 
						  /* ------------------------ Get Recent Article ------------------- */
$recent_article = $this->widget_model->get_section_recent_article($content_id, $section_id,$content_type_id, "live");  
$domain_name = base_url();
if(count($recent_article)> 0){ 
$recent_text = "செய்திகள்";	
if($content_type_id=='3'){
$recent_text = "புகைப்படங்கள்";	
$img_path = $recent_article['first_image_path']; 
$img_title = $recent_article['first_image_path']; 
$img_alt = $recent_article['first_image_alt']; 
}elseif($content_type_id=='4'){
$recent_text = "வீடியோக்கள்";
$img_path = $recent_article['video_image_path']; 
$img_title = $recent_article['video_image_title']; 
$img_alt = $recent_article['video_image_alt']; 
}elseif($content_type_id=='5'){
$recent_text = "ஆடியோக்கள்";
$img_path = $recent_article['audio_image_path']; 
$img_title = $recent_article['audio_image_title']; 
$img_alt = $recent_article['audio_image_alt']; 
}else{
$img_path = $recent_article['article_page_image_path']; 
$img_title = '';
$img_alt = '';
}

$recent_string_value = $domain_name.$recent_article['url']."?pm=".$page_param;
if (file_exists(destination_base_path . imagelibrary_image_path . $img_path) && $img_path != '')
{
$recent_article_img = image_url. imagelibrary_image_path.$img_path;	
}else{
$recent_article_img = image_url. imagelibrary_image_path.'logo/dinamani_logo_600X300.jpg';
}
$show_recent_article = '<div id="slidebox" class="slide-box"> <i class="fa fa-times slide-close"></i>';
 $show_recent_article.='<h4 class="SiteColor article-recent"> தற்போதைய  '.$recent_article['section_name'].' '.$recent_text.'</h4>';
  $show_recent_article.='<div class="slide-headlines"> <img src="'.$recent_article_img.'" title="'.$img_title.'" alt="'.$img_alt.'" />
    <h4 class="subtopic"><a href="'.$recent_string_value.'">'.$recent_article['title'].'</a></h4>';
    $show_recent_article.='<div class="slider-lead">
      '.substr($recent_article['summary_html'], 0, 150).'
      <a href="'.$recent_string_value.'"><span class="arrows SiteColor">Read More <i class="fa fa-angle-double-right"></i> </span></a> </div>
  </div>
</div>';
//echo $show_recent_article;
}else
{
$show_recent_article = "No_News";	
}
$hit_value = $this->widget_model->get_hit_for_content_by_id($content_id, $content_type_id);  
$return_value['recent_news'] = $show_recent_article;
$return_value['emailed']     = $hit_value['emailed']; 
echo json_encode($return_value);
						  
						    /* ------------------------ Get Recent Article END------------------- */
						  
						 
						 
  }
  
  public function subscribe_newsletter()
  {
	$email  = $this->input->post('email_newsletter');
	$result =  $this->widget_model->insert_subscribed_email($email);
	if($result!=0)
	{
		echo "உங்கள் மின்னஞ்சல் எங்கள் செய்திமடல் சேவையை சந்தா ..";
		$settings       = $this->widget_model->select_setting("live");
		$email_on = $settings['send_email'];
		$email_to = $settings['email_to'];
		//load email helper
		$this->load->helper('email');
		//load email library
		$this->load->library('email');
		  if (($email_on==1)&&valid_email($email_to)&&valid_email($email_to)){  
		  // compose email
		  $body_text = "Hi , Here is a new subscriber ".$email;
		  $this->email->from($email , "News Letter user");
		  $this->email->to($email_to); 
		  $this->email->subject("New Subscriber For News Letter!");
		  $this->email->message($body_text);  
		  
		  // try send mail ant if not able print debug
		  if ( ! $this->email->send())
		  {
			echo "Email not sent \n".$this->email->print_debugger();      
		  }
		  }
		exit;
	}else
	{
		echo "மன்னிக்கவும் மின்னஞ்சல் ஏற்கனவே சந்தா!";exit;
	}
	 	  
  }
  
  public function get_image_gallery_list()
  {
	  extract($_POST);
	  $gallery_details = $this->widget_model->get_gallery_image_data($content_id, $view_mode);
		$show_simple_tab = '';
		krsort($gallery_details);
		foreach($gallery_details as $gallery_list){
			$original_image_path  = $gallery_list['ImagePhysicalPath'];
			$imagealt             = $gallery_list['ImageCaption'];	
			$imagetitle           = $gallery_list['ImageAlt'];	
		
			if(file_exists(destination_base_path . imagelibrary_image_path. $original_image_path) && $original_image_path != '')
			{			
				$Image600X390   = "";
				$Image600X390 	= str_replace("original","w600X390", $original_image_path);
			
				if (file_exists(destination_base_path . imagelibrary_image_path. $Image600X390) && $Image600X390 != '')
				{
					$show_image = image_url. imagelibrary_image_path . $Image600X390;
				}
				else {			
					$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
				}
			
			}
			else {			
				$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
			}
		
			$show_simple_tab .= '<div>';
			$show_simple_tab .= '<img u="image" src="'.$show_image.'" title = "'.$imagetitle.'" alt = "'.$imagealt.'">';
			$show_simple_tab .= '<img u="thumb" src="'.$show_image.'" title = "'.$imagetitle.'" alt = "'.$imagealt.'">';
			$show_simple_tab .= '</div>';

	}
            echo $show_simple_tab;
  }
	 
}
?>