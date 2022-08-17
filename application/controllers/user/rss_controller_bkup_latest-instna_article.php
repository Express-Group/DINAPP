<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rss_controller extends CI_Controller {

	public function __construct() 
	{		
		parent::__construct();
			$this->load->model("admin/widget_model");
		$CI = &get_instance();
		//setting the second parameter to TRUE (Boolean) the function will return the database object.
		$this->live_db = $CI->load->database('live_db', TRUE);
		
		$CI = &get_instance();
		//setting the second parameter to TRUE (Boolean) the function will return the database object.
		$this->archive_db = $CI->load->database('archive_db', TRUE);
		
	} 
	
	public function index()
	{
		$view_mode           = "live";
		$page_type		     = "1"; //rss section
		$this->load->library("memcached_library");
		//$this->memcached_library->flush();  // To clear the Memacache  , Un Comment this line
		$this->load->library("template_library");  // custom library to load xml and widgets;
		$section_id  =  $this->input->get('id');
	    $section_id  =  $this->widget_model->get_sectionDetails($section_id, $view_mode);
		$parent_section_name = '';
	   if(count($section_id)>0)
	   {
			if($section_id['ParentSectionID']!=''&& $section_id['ParentSectionID']!=0 ){
				 $parent_section     = $this->widget_model->get_sectionDetails($section_id['ParentSectionID'], $view_mode);
				 $data['Parentsection'] = ($parent_section['Sectionname']!='')? $parent_section['Sectionname'] : '';
				 $parent_section_name   = strtolower($parent_section['URLSectionName']);
			}else{
			$data['Parentsection'] = '';
			}
			$data['url_section'] = base_url().$section_id['URLSectionStructure'];
			$sectionname         = strtolower($section_id['URLSectionName']);
			switch ($sectionname) {
				case ($sectionname == "galleries" || $sectionname == "photos" || $parent_section_name=="galleries" ||  $parent_section_name=="photos"):
					$content_type = 3;
					break;
				case ($sectionname == "videos" || $parent_section_name=="videos"):
					$content_type = 4;
					break;
				case "audios":
					$content_type = 5;
					break;
				case "resources":
					$content_type = 6;
					break;
				default:
					$content_type = 1;
			}
			$data['viewmode']     = $view_mode; 
			$data['content_type'] = $content_type;
			$data['Section']      = $section_id['Sectionname'];
			$data['rss_article']  = $this->widget_model->rss_section_articles($section_id['Section_id'], $content_type);
			$this->load->view("admin/rssfeed", $data);
			unset($data);
		 }
		 else
		  {
			$section_404_details= $this->widget_model->get_sectionid_with_names("404-not-found", "", "");	
			if(count($section_404_details) > 0)
			{
			$page_details 	= $this->widget_model->getPageDetails($section_404_details[0]['Section_id'], "1");	
			$page_type		= "1";    //section
			}else
			{
			 /******  Condition comes here only when the above mentioned 404 page is Not Found  ********/
			 echo $this->load->view("admin/page_not_found_404", '', true);
			 exit;
		    }
		$section_page_id      = $page_details['menuid'];
		$section_details      = $this->widget_model->get_sectionDetails($section_page_id, $view_mode); 
		$page_param           = ($this->input->get('pm')!='')? $this->input->get('pm'): $page_details['menuid'];
		$is_home_page         = 'n';
		$xml                  = "";
		$xml				  = simplexml_load_string($page_details['published_templatexml']);   // home Xml details
        $tmpl_values          = (strlen($xml)!=0)? (string)$xml->attributes()->templatevalues: "";
		if($tmpl_values!="")
		{
		$tmpl_values 		  = explode("-", $tmpl_values);	
		}else{
		$template_id 		  = $page_details['templateid'];
		$template_details 	  = $this->widget_model->getTemplateDetails($template_id); 
		$tmpl_values 		  = explode("-", $template_details['template_values']);		
		}
		$data['viewmode']     = $view_mode; 
		if(strlen($xml)!= 0)
		{
			    $tplheader_values   = $xml->tplcontainer;
				$page_type          = $page_details['pagetype'];
				$header_param 		= $tplheader_values[0];
				$right_panel_param	= $tplheader_values[count($tplheader_values)-2];
				$footer_param 		= $tplheader_values[count($tplheader_values)-1];
				$body_loop_values	= $tplheader_values[0];
				
				if($page_details['common_header']==1 || $page_details['common_footer']==1 || $page_details['common_rightpanel']==1)
				{
					$common_xml         = $this->template_library->get_parent_article_page(10000, $page_type);
					$xml                = simplexml_load_string($common_xml['published_templatexml']);
					if(count($xml)> 1){
						$common_tplheader_values 	= $xml->tplcontainer; 
						if($page_details['common_header']==1){
						$header_param 	= $common_tplheader_values[0];
						}
						if($page_details['common_rightpanel']==1){
						$right_panel_param 	= $common_tplheader_values[count($common_tplheader_values)-2];				
						}
						if($page_details['common_footer']==1){
						$footer_param 	= $common_tplheader_values[count($common_tplheader_values)-1];
						}
					}
				}
				
				$data['header']   = $this->template_library->section_xml_containers($header_param, "header", $is_home_page, $view_mode, $page_type, $page_param);
	
				$data['body']	  = '<section class="section-content"><div class="container SectionContainer"><div class="row">';
				$template_values_body_content = explode(",",$tmpl_values[1]);
				$b_section_inc = 0;
			for($i=1; $i<=count($template_values_body_content); $i++){
			
				$body_section 	= $template_values_body_content;
				$section_cl_val	= $body_section[$b_section_inc] * (12 / array_sum($body_section));
				
				$col_sm_val		= "12";
				$col_xs_val		= "12";
				$home_last_column = "";
				if($b_section_inc != (count($body_section)-1) && count($body_section) > 0)
				{
					if(($section_cl_val == 3 || $section_cl_val == 6 ) && array_sum($body_section) == 4){
						$home_last_column = "";
					}
					else{
						$home_last_column = "ColumnSpaceRight";
					}
				}
				
				//////  For only three column template  ////
				if(count($body_section) == 3)
				{
						if($b_section_inc == 0)
						{
							$col_sm_val		= "3";
						}
						if($b_section_inc == 1)
						{
							$col_sm_val		= "9";
						}
				}
				$c_class_value 	= " col-lg-".$section_cl_val." col-md-".$section_cl_val." col-sm-".$col_sm_val." col-xs-".$col_xs_val." ".$home_last_column." ";
				$data['body'] .= '<div class="'. $c_class_value .'">';
				$pass_body_content = (($i) < count($template_values_body_content)) ? $tplheader_values[$i] : $right_panel_param;			
				//$pass_body_content = $tplheader_values[$i];
				$data['body'] 	  .= $this->template_library->section_xml_containers($pass_body_content, "template_body", $is_home_page,  $view_mode, $page_type, $page_param);			
				$data['body']	  .= '</div>';
				$b_section_inc ++;
			}
				$data['body']	  .= '</div></div></section>';
	
				$data['footer']   = $this->template_library->section_xml_containers($footer_param, "footer", $is_home_page, $view_mode, $page_type, $page_param);
				
				
				$data['header_ad_script']	= $page_details['Header_Adscript'];
				
				$data['page_type'] = $page_details['pagetype'];
				
				$data['section_details']	= $section_details;
		}
		else   // if xml is not created condition will call this
		{
			$data['header'] 	= "";
			$data['body'] 		= "";
			$data['footer'] 	= "";
		}
		$this->load->view("admin/view_frontend", $data); 
	  }	
	}
public function sitemap() {
		
		$data['sectionname_list'] 	= $this->widget_model->rss_section_mapping($view_mode = 'LIVE'); 
		$data['xml_type']			= "section_sitemap";
		
		echo $this->load->view("admin/section_sitemap",$data,true); 
		
	}
public function section_year_sitemap() {
		extract($_GET);
		
		$this->load->library("memcached_library");
		
		if(isset($year) && isset($section_id) && isset($content_type) && isset($month)) {
			
			$result = array();
		
		switch($content_type) {
			case 1:
			$tablename = "article";
			break;
			
			case 3: 
			$tablename = "gallery";
			break;
			
			case 4: 
			$tablename = "video";
			break;
			
			case 5: 
			$tablename = "audio";
			break;
		}
			

			if($year == date('Y')) { 
			
				$CacheID  = "SITEMAP- SELECT last_updated_on,url FROM ".$tablename." WHERE section_id=".$section_id." AND MONTH(last_updated_on) = ".$month;
				 
				 
				 
				if(!$this->memcached_library->get($CacheID) && $this->memcached_library->get($CacheID) == '') {
				
					$this->live_db->select("last_updated_on,url");
					$this->live_db->from($tablename);
					$this->live_db->where("section_id",$section_id);
					$this->live_db->where("MONTH(last_updated_on)",$month);
					$this->live_db->where("publish_start_date < NOW()");		
					$this->live_db->order_by("last_updated_on","desc");
					
					$get = $this->live_db->get();
					
					$live_result = $get->result_array();
					
					$this->memcached_library->add($CacheID,$live_result);
					
				} else {
					
					$live_result = $this->memcached_library->get($CacheID);
					
				}
				
				$archive_result =array();
				
				if($this->archive_db->table_exists($tablename."_".$year)) {
					
					$CacheID = "SITEMAP- SELECT last_updated_on,url FROM ".$tablename."_".$year." WHERE section_id=".$section_id." AND MONTH(last_updated_on) = ".$month;
					
					if(!$this->memcached_library->get($CacheID) && $this->memcached_library->get($CacheID) == '') {
					
					$this->archive_db->select("last_updated_on,url");
					$this->archive_db->from($tablename."_".$year);
					$this->archive_db->where("section_id",$section_id);
					$this->archive_db->where("MONTH(last_updated_on)",$month);
					$this->archive_db->where("publish_start_date < NOW()");		
					$this->archive_db->order_by("last_updated_on","desc");
					$get = $this->archive_db->get();
					
					$archive_result = $get->result_array();
					
					$this->memcached_library->add($CacheID,$archive_result);
					

					
					} else {
					
					$archive_result = $this->memcached_library->get($CacheID);
					
					}
				}
				
				$result = array_merge($live_result,$archive_result);
				
				
				
				
				
				} else {
					
					
					if($this->archive_db->table_exists($tablename."_".$year)) {
						
					$CacheID = "SITEMAP- SELECT last_updated_on,url FROM ".$tablename."_".$year." WHERE section_id=".$section_id." AND MONTH(last_updated_on) = ".$month;
					
					if(!$this->memcached_library->get($CacheID) && $this->memcached_library->get($CacheID) == '') {
					
						$this->archive_db->select("last_updated_on,url");
						$this->archive_db->from($tablename."_".$year);
						$this->archive_db->where("section_id",$section_id);
						$this->archive_db->where("MONTH(last_updated_on)",$month);
						$this->archive_db->where("publish_start_date < NOW()");		
						$this->archive_db->order_by("last_updated_on","desc");
						$get = $this->archive_db->get();
						
						$result = $get->result_array();
						
						$this->memcached_library->add($CacheID,$result);
					
					} else {
					
						$result = $this->memcached_library->get($CacheID);
					
					}
					
				}
				
			}
		
		
		$data['live_articles'] 	= $result; 
		$data['xml_type']			= "section_live_sitemap";
		
		echo $this->load->view("admin/section_sitemap",$data,true); 
		
		} 
			
		
	}
	
	public function new_sitemap() {
		
				$LatestNews=@$this->input->get('latest');
				if($LatestNews=='true'){ $CacheID='--LATES--NEWS--'; }else{
					
				$CacheID = "SITEMAP- SELECT title,publish_start_date,tags,last_updated_on,url FROM article ORDER BY publish_starte_date desc LIMIT 1000";	
					
				}
				
					
				if(!$this->memcached_library->get($CacheID) && $this->memcached_library->get($CacheID) == '') {
		
					if($LatestNews=='true'){
							$this->live_db->select("title,publish_start_date,tags,last_updated_on,url,article_page_image_path");
					$this->live_db->from("article");
					$this->live_db->where("section_id",478);		
					$this->live_db->order_by("last_updated_on","desc");
					$this->live_db->limit("1000");
						
						
					}else{
						
					$this->live_db->select("title,publish_start_date,tags,last_updated_on,url,article_page_image_path");
					$this->live_db->from("article");
					$this->live_db->where("publish_start_date < NOW()");		
					$this->live_db->order_by("last_updated_on","desc");
					$this->live_db->limit("1000");	
						
					}
					
					
					$get = $this->live_db->get();
					
					$live_result = $get->result_array();					
					
					$this->memcached_library->add($CacheID,$live_result);
				
				}  else {
					
					$live_result = $this->memcached_library->get($CacheID);
					
				}
				
				$data['new_articles'] 		= $live_result; 
				$data['xml_type']			= "new_sitemap";
		
				echo $this->load->view("admin/section_sitemap",$data,true); 
				
				
		
	}
	
	public function latest_sitemap(){
		$SectionIds = array(478,336,337,338,481,334,485,388,387,333,339,401,541,471,502);
		$Response ='';
		for($i=0;$i<count($SectionIds);$i++):
			$GetArticle = $this->live_db->query("SELECT title,summary_html,article_page_content_html,publish_start_date,tags,last_updated_on,url,article_page_image_path FROM article WHERE section_id='".$SectionIds[$i]."' ORDER BY last_updated_on DESC LIMIT 15");
			if($GetArticle->num_rows()!=0){
				foreach($GetArticle->result_array() as $ArticleDetails):
				
					if($ArticleDetails['article_page_image_path']==''){
						$imagePath = image_url.imagelibrary_image_path.'logo/dinamani_logo_600X300.jpg';
					}else{
						$imagePath = image_url.imagelibrary_image_path.$ArticleDetails['article_page_image_path'];
					}
					$title         = html_entity_decode($ArticleDetails['title'],null,"UTF-8");
					$search        = array('&', '&#39;');
					$replace       = array('&amp;', "'");
					$title         = strip_tags(str_replace($search, $replace , $title)); 
					$title			= preg_replace("|&([^;]+?)[\s<&]|","&amp;$1 ",$title);
					$publish_date_custom = new DateTime(@$ArticleDetails['publish_start_date']);
					$publish_updated_date_custom = new DateTime(@$ArticleDetails['last_updated_on']);
					$search1        = array('&', '&#39;','&amp;','&nbsp;','nbsp;','<br>','</br>','<br />');
					$replace1       = array('&amp;', "'",' ',' ',' ','','','');
					$content         	= str_replace($search1, $replace1 , $ArticleDetails['article_page_content_html']); 
					$content = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $content);
					$EncodedContent 	='<![CDATA[<!doctype html><html><head><link rel="canonical" href="'.BASEURL. html_entity_decode($ArticleDetails['url'],null,"UTF-8").'"/><meta charset="utf-8"/><meta property="op:markup_version" content="v1.0"/><meta property="fb:op-recirculation-ads" content="placement_id=593579497518236_687646294778222"/><meta property="fb:use_automatic_ad_placement" content="enable=true ad_density=default"/><meta property="fb:article_style" content="default"/><meta property="fb:likes_and_comments" content="enable"/></head><body><article><header><figure><img src="'.$imagePath.'"/></figure><h1>'.$title.'</h1><time class="op-published" datetime="'.$publish_date_custom->format('Y-m-d\TH:i:s+05:30').'">'.$publish_date_custom->format('Y-m-d\TH:i:s+05:30').'</time><time class="op-modified" datetime="'.$publish_updated_date_custom->format('Y-m-d\TH:i:s+05:30').'">'.$publish_updated_date_custom->format('Y-m-d\TH:i:s+05:30').'</time><address><a href="'.BASEURL. html_entity_decode($ArticleDetails['url'],null,"UTF-8").'">dinamani.com</a></address><figure class="op-ad"><iframe width="300" height="250" style="border:0; margin:0;" src="https://www.facebook.com/adnw_request?placement=253981245112736_253981258446068&adtype=banner300x250"></iframe></figure></header>'.$content.'<figure class="op-tracker"><iframe><script>';
					$EncodedContent 	.="(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
										  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
										  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
										  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

										  ga('create', 'UA-2311935-31', 'auto');
										  ga('require', 'displayfeatures');
										  ga('set', 'campaignSource', 'Facebook');
										  ga('set', 'campaignMedium', 'Social Instant Article');
										  ga('set', 'title', 'IA - '+ia_document.title);
										  ga('send', 'pageview');</script>";
					$EncodedContent 	.='</iframe></figure><footer><small>Copyright - '.date("Y").' dinamani.com. All rights reserved.</footer></small></article></body></html>]]>';
					$Description         	= strip_tags(str_replace($search1, $replace1 , $ArticleDetails['summary_html']));
					
					$Response .='<item>';
					$Response .='<title>'.$title.'</title>';
					$Response .='<link>'.BASEURL. html_entity_decode($ArticleDetails['url'],null,"UTF-8").'</link>';
					$Response .='<content:encoded>'.$EncodedContent.'</content:encoded>';
					$Response .='<guid isPermaLink="false">'.BASEURL. html_entity_decode($ArticleDetails['url'],null,"UTF-8").'</guid>';
					$Response .='<description>'.$Description.'</description>';
					$Response .='<pubDate>'.$publish_date_custom->format('Y-m-d\TH:i:s+05:30').'</pubDate>';
					$Response .='<modDate>'.$publish_updated_date_custom->format('Y-m-d\TH:i:s+05:30').'</modDate>';
					$Response .='</item>';
					$EncodedContent = '';
				endforeach;	
			}
		endfor;
		echo $this->load->view("admin/latestnews_sitemap",['data'=>$Response],true); 
	}
			
}?>