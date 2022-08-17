<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class readwhere_controller extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model("admin/widget_model");
		$CI = &get_instance();
		$this->live_db = $CI->load->database('live_db', TRUE);
		$this->load->library("memcached_library");
	}
	
	public function index(){
		$sectionId = $this->uri->segment(2);
		$sectionDetails  =  $this->widget_model->get_sectionDetails($sectionId, "live");
		$parentSectionName ='';
		if(count($sectionDetails) > 0){
			if($sectionDetails['ParentSectionID']!=''&& $sectionDetails['ParentSectionID']!=0 ){
				$parentSectionDetails = $this->widget_model->get_sectionDetails($sectionDetails['ParentSectionID'], "live");
				$parentSectionName = strtolower($parentSectionDetails['URLSectionName']);
			}
			$sectionName = strtolower($sectionDetails['URLSectionName']);
			switch ($sectionName){
				case ($sectionName == "galleries" || $sectionName == "photos" || $parentSectionName=="galleries" ||  $parentSectionName=="photos"):
					$contentType = 3;
					$query = "SELECT a.content_id, a.section_id, a.section_name, a.title, a.url, a.summary_html, a.first_image_path, a.first_image_title, a.first_image_alt, a.publish_start_date, a.last_updated_on, a.agency_name, a.author_name, a.tags,a.meta_Title FROM gallery AS a LEFT JOIN gallery_section_mapping AS b ON a.content_id=b.content_id WHERE b.section_id IN (SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = ".$sectionId." OR Section_id = ".$sectionId.") AND a.status='P' AND a.publish_start_date < NOW() GROUP BY a.content_id ORDER BY a.publish_start_date DESC LIMIT 20"; 
					break;
				case ($sectionName == "videos" || $parentSectionName=="videos"):
					$contentType = 4;
					$query = "SELECT a.content_id, a.section_id, a.section_name, a.title, a.url, a.summary_html, a.video_script, a.video_image_path, a.video_image_title, a.video_image_alt, a.publish_start_date, a.last_updated_on, a.agency_name, a.author_name, a.tags,a.meta_Title FROM video AS a LEFT JOIN video_section_mapping AS b ON a.content_id=b.content_id WHERE b.section_id IN (SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = ".$sectionId." OR Section_id = ".$sectionId.") AND a.status='P' AND a.publish_start_date < NOW() GROUP BY a.content_id ORDER BY a.publish_start_date DESC LIMIT 20"; 
					break;
				default:
					$contentType = 1;
					$query = "SELECT a.content_id, a.section_id, a.section_name, a.title, a.url, a.summary_html, a.article_page_content_html, a.article_page_image_path, a.article_page_image_title, a.article_page_image_alt, a.publish_start_date, a.last_updated_on, a.agency_name, a.author_name, a.tags,a.meta_Title FROM article AS a LEFT JOIN article_section_mapping AS b ON a.content_id=b.content_id WHERE b.section_id IN (SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = ".$sectionId." OR Section_id = ".$sectionId.") AND a.status='P' AND a.publish_start_date < NOW() GROUP BY a.content_id ORDER BY a.publish_start_date DESC LIMIT 20";
			}
			if(!$this->memcached_library->get($query) && $this->memcached_library->get($query) == ''){
				$data['content'] = $this->live_db->query($query)->result_array();
				$this->memcached_library->add($query,$data['content']);
			}else{
				$data['content']  = $this->memcached_library->get($query);
			}
			$data['sectionDetails'] = $sectionDetails;
			$data['contentType'] = $contentType;
			$data['baseUrl'] = base_url();
			$data['controller'] = $this;
			$this->load->view('admin/readwhere_view',$data);
			
		}else{
			show_404();
		}
	}
	
	public function seotags($contentID){
		$query = "SELECT tag_name FROM seo_tags WHERE content_id='".$contentID."'";
		if(!$this->memcached_library->get($query) && $this->memcached_library->get($query) == ''){
			$data = $this->live_db->query($query)->row_array();
			$this->memcached_library->add($query,$data);
		}else{
			$data  = $this->memcached_library->get($query);
		}
		if(count($data) > 0){
			return $data['tag_name'];
		}else{
			return '';
		}
	}
	
	public function livecontent(){
		$contentId =  $this->uri->segment(2);
		if($contentId!=''){
			$filePath=FCPATH.'application/views/LIVENOW/';
			$fileName= $contentId.'.json';
			if(file_exists($filePath.$fileName)){
				$Result=file_get_contents($filePath.$fileName);
				$Result=json_decode($Result,true);
				$Result=array_reverse($Result['details']);
				$this->load->view('admin/livenow_embed_view',['result' => $Result]);
			}else{
				show_404();
			}
		}else{
			show_404();
		}
	}
	
	public function breaking_news(){
		$data['breaking_news'] = $this->widget_model->get_widget_breakingNews_contents('live');
		$data['baseUrl'] = base_url();
		$data['controller'] = $this;
		$this->load->view('admin/breakingnews_xml_view',$data);
	}
	
	public function home_news(){
		$sectionDetails  =  $this->widget_model->get_sectionDetails(332, "live");
		$page_details  = $this->widget_model->getPageDetails($sectionDetails['Section_id'], 1);
		$list = [];
		$content =[];
		if(count($page_details) > 0){
			$template = $page_details['published_templatexml'];
			$xml = simplexml_load_string($template);
			if($xml!=false){
				if(isset($xml->tplcontainer[1])){
					$tplcontainer = $xml->tplcontainer[1];
					for($j=0;$j<count($tplcontainer->widgetcontainer);$j++):
						$widgetcontainer = $tplcontainer->widgetcontainer[$j];
						foreach($widgetcontainer->widget as $key =>$value):
							$attributes = $value->attributes();
							$widgetData = [];
							foreach($attributes as $attibutekey => $attibutevalue):
							$widgetData = [];
							foreach($attributes as $attibutekey => $attibutevalue):
								$widgetData[$attibutekey]  = (string) $attibutevalue;
							endforeach;
							if($widgetData['data-renderingtype']==1 && $widgetData['data-contenttype']!=1 && @$widgetData['data-clonedstatus']!=1 && @$widgetData['widgetTitle']!='external_api' && @$widgetData['widgetTitle']!='Footer' && $widgetData['cdata-widgetStatus']!=2):
								array_push($list , $widgetData);
							endif;
							endforeach;
						endforeach;
					endfor;
					if(count($list) > 2){
						$list = array_slice($list, 0, 2);
					}
					for($i=0 ;$i<count($list);$i++){
						$widgetInstanceId = $list[$i]['data-widgetinstanceid'];
						$maxArticles = $list[$i]['cdata-customMaxArticles'];
						$sectionId = $list[$i]['cdata-widgetCategory'];
						if($list[$i]['cdata-renderingMode']=='manual'){
							$articles = $this->live_db->query("SELECT content_id ,CustomTitle ,CustomSummary ,content_type_id ,custom_image_path ,custom_image_title ,custom_image_alt FROM widgetinstancecontent_live WHERE WidgetInstance_id='".$widgetInstanceId."' AND Status=1 ORDER BY DisplayOrder ASC LIMIT ".$maxArticles."")->result_array();
							foreach($articles as $article):
								$temp=[];
								switch($article['content_type_id']){
									case 3 :
										$tablename = "gallery";
										$query = " ,first_image_path as article_page_image_path ,first_image_title as article_page_image_title ,first_image_alt as article_page_image_alt ";
									break;
									case 4:
										$tablename = "video";
										$query = " ,video_image_path as article_page_image_path ,video_image_title as article_page_image_title ,video_image_alt as article_page_image_alt ";
									break;
									default:
										$tablename = "article";
										$query = " ,article_page_image_path ,article_page_image_title ,article_page_image_alt ";
									break;
								}
								$articleDetails = $this->live_db->query("SELECT title  ,url ,last_updated_on ,publish_start_date ".$query." FROM ".$tablename." WHERE content_id='".$article['content_id']."' AND status='P' AND publish_start_date < NOW()")->row_array();
								$temp['contentId'] = $article['content_id'];
								$temp['contentType'] = $article['content_type_id'];
								$temp['publish_start_date'] = $articleDetails['publish_start_date'];
								$temp['last_updated_on'] = $articleDetails['last_updated_on'];
								$temp['title'] = ($article['CustomTitle']!='') ? $article['CustomTitle'] : $articleDetails['title'];
								$temp['url'] = $articleDetails['url'];
								$temp['image'] = ($article['custom_image_path']!='') ? $article['custom_image_path'] : $articleDetails['article_page_image_path'];
								$temp['imageCaption'] = ($article['custom_image_path']!='') ? $article['custom_image_title'] : $articleDetails['article_page_image_title'];
								$temp['imageAlt'] = ($article['custom_image_path']!='') ? $article['custom_image_alt'] : $articleDetails['article_page_image_alt'];
								if(count($articleDetails) > 0){
									$content[] = $temp;
								}
								
							endforeach;
						}else{
							
						}
					}
					$data['sectionDetails'] = $sectionDetails;
					$data['article'] = $content;
					$data['baseUrl'] = base_url();
					$data['controller'] = $this;
					$this->load->view('admin/readwherehome_xml_view',$data);
				}else{
					show_404();
				}
			}else{
				show_404();
			}
		}else{
			show_404();
		}
	}
}
?> 