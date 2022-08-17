<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class special_controller extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$CI = &get_instance();
		$this->live_db = $CI->load->database('live_db' , TRUE);
	}
	
	public function index(){
		redirect('/' ,301);
	}
	
	public function language_fest(){
		$data['title'] = "தமிழ் மொழித்  திருவிழா -  2020";
		$data['total_rows'] = $this->live_db->query("SELECT ar.content_id FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = '795' OR Section_id = '795' )) GROUP BY ar.content_id")->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = BASEURL.'special-page/language_fest';
		$config['total_rows'] = $data['total_rows'];
		$config['per_page'] = 6;
		$config['page_query_string'] = TRUE;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$row = (isset($_GET['per_page']) && $_GET['per_page']!='') ? $_GET['per_page'] : 0;
		
		$data["data"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = '795' OR Section_id = '795' )) GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT ".$row." , ".$config['per_page']."")->result();
		$this->load->view('admin/specialpage/language_fest' , $data);
	}
	
	public function christmas_fest(){
		$data['title'] = "Christmas Festival - Dinamani ";
		$data['total_rows'] = $this->live_db->query("SELECT ar.content_id FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = '796' OR Section_id = '796' )) GROUP BY ar.content_id")->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = BASEURL.'special-page/christmas_fest';
		$config['total_rows'] = $data['total_rows'];
		$config['per_page'] = 6;
		$config['page_query_string'] = TRUE;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$row = (isset($_GET['per_page']) && $_GET['per_page']!='') ? $_GET['per_page'] : 0;
		
		$data["data"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = '796' OR Section_id = '796' )) GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT ".$row." , ".$config['per_page']."")->result();
		$this->load->view('admin/specialpage/christmas_fest' , $data);
	}
	
	public function local_body_election($year=2019){
		$data['title'] = "Tamil Nadu local body election - Dinamani ";
		$data['total_rows'] = $this->live_db->query("SELECT ar.content_id FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = '797' OR Section_id = '797' )) GROUP BY ar.content_id")->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = BASEURL.'special-page/local_body_election/2019';
		$config['total_rows'] = $data['total_rows'];
		$config['per_page'] = 15;
		$config['page_query_string'] = TRUE;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$row = (isset($_GET['per_page']) && $_GET['per_page']!='') ? $_GET['per_page'] : 0;
		
		$data["data"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = '797' OR Section_id = '797' )) GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT ".$row." , ".$config['per_page']."")->result();
		$this->load->view('admin/specialpage/local_body_election' , $data);
	}
	
	public function think_edu($year=2020){
		$data['title'] = "ThinkEdu Conclave 2020";
		$data['total_rows'] = $this->live_db->query("SELECT ar.content_id FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = '801' OR Section_id = '801' )) GROUP BY ar.content_id")->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = BASEURL.'special-page/think_edu/'.$year;
		$config['total_rows'] = $data['total_rows'];
		$config['per_page'] = 16;
		$config['page_query_string'] = TRUE;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$row = (isset($_GET['per_page']) && $_GET['per_page']!='') ? $_GET['per_page'] : 0;
		$data["data"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = '801' OR Section_id = '801' )) GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT ".$row." , ".$config['per_page']."")->result();
		$this->load->view('admin/specialpage/think_edu' , $data);
	}
	
	public function bookfair($year=2020){
		$data['title'] = "புத்தக வெளி";
		$this->load->library('pagination');
		if($year=='news' || $year=='thadangal' || $year=='nenaipathu' || $year=='vanavil'){
			if($year=='news'){
				$sectionid =800;
			}else if($year=='thadangal'){
				$sectionid =804;
			}else if($year=='nenaipathu'){
				$sectionid =803;
			}else{
				$sectionid =802;
			}
			$config['base_url'] = BASEURL.'special-page/bookfair/'.$year.'/';
			$data['total_rows'] = $this->live_db->query("SELECT ar.content_id FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE  Section_id = '".$sectionid."' )) AND ar.content_id NOT IN (3327576 ,3326660) GROUP BY ar.content_id")->num_rows();
			$config['total_rows'] = $data['total_rows'];
			$config['per_page'] = 16;
			$config['page_query_string'] = TRUE;
			$config['num_links'] = 5;
			$config['use_page_numbers'] = TRUE;
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();
			$row = (isset($_GET['per_page']) && $_GET['per_page']!='') ? $_GET['per_page'] : 0;
			$data["data"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt , ar.publish_start_date FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE  Section_id = '".$sectionid."' )) AND ar.content_id NOT IN (3327576 ,3326660) GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT ".$row." , ".$config['per_page']."")->result();
			$data['type']=2;
			$this->load->view('admin/specialpage/book_fair' , $data);
		}else if($year=='arimukam'){
			$data['books'] = $this->db->query("SELECT title , content ,image FROM scrolling_newsmaster WHERE status=1 ORDER BY sid DESC")->result();
			$data['type']=3;
			$this->load->view('admin/specialpage/book_fair' , $data);
			
		}else{
			$config['base_url'] = BASEURL.'special-page/bookfair/'.$year;
			$row = (isset($_GET['per_page']) && $_GET['per_page']!='') ? $_GET['per_page'] : 0;
			$data["data"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt , ar.publish_start_date FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE  Section_id = '800' )) AND ar.content_id NOT IN (3327576 ,3326660) GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT 4")->result();
			$data["vanavil"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt , ar.publish_start_date FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE  Section_id = '802' )) GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT 4")->result();
			$data["nenaipathu"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt , ar.publish_start_date FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE  Section_id = '803' )) GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT 4")->result();
			$data["thadangal"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt , ar.publish_start_date FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE  Section_id = '804' )) GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT 4")->result();
			$data['books'] = $this->db->query("SELECT title , content ,image FROM scrolling_newsmaster WHERE status=1 ORDER BY sid DESC LIMIT 8")->result();
			$data['type']=1;
			$this->load->view('admin/specialpage/book_fair' , $data);
		}
	}
	
	public function tamilnadu_state_budget($year=2020){
		$data['title'] = "Tamil Nadu State Budget 2020";
		$data['total_rows'] = $this->live_db->query("SELECT ar.content_id FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND  ar.content_id !=3357494  AND( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = '807' OR Section_id = '807' )) GROUP BY ar.content_id")->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = BASEURL.'special-page/tamilnadu_state_budget/'.$year;
		$config['total_rows'] = $data['total_rows'];
		$config['per_page'] = 15;
		$config['page_query_string'] = TRUE;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$row = (isset($_GET['per_page']) && $_GET['per_page']!='') ? $_GET['per_page'] : 0;
		$data["data"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND  ar.content_id !=3357494 AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = '807' OR Section_id = '807' )) GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT ".$row." , ".$config['per_page']."")->result();
		$this->load->view('admin/specialpage/tamilnadu_state_budget' , $data);
	}
	
	public function womens_day($year=2020){
		$data['title'] = "Women's Day 2020";
		$set = $this->live_db->query("SELECT content_id FROM widgetinstancecontent_live WHERE WidgetInstance_id='11064'")->result();
		$arr= $arr1=[];
		foreach($set as $t){
			array_push($arr , $t->content_id);
			array_push($arr1 , "'".$t->content_id."'");
		}
		$data['articles']  = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article as ar WHERE ar.status='P' AND ar.publish_start_date < NOW() AND ar.content_id IN (".implode(',',$arr).") ORDER BY FIELD(content_id, ".implode(',',$arr1).")")->result();
	//	$data['articles']  = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article as ar WHERE ar.status='P' AND ar.publish_start_date < NOW() AND ar.content_id IN (3376723 , 3376052 , 3376069 , 3376041 , 3374477 , 3375237 , 3376011 , 3376016 , 3376032 , 3376040 , 3376044 , 3376048 , 3376049 , 3376050 , 3376051 , 3376054 , 3376056 , 3376058 , 3376061 , 3376062 , 3376063 , 3376067 , 3376070 , 3376072 , 3376074 , 3376076 , 3376077 , 3376078 , 3376080 , 3376086) ORDER BY FIELD(content_id, '3376723' , '3376052' , '3376069' , '3376041' , '3374477' , '3375237' , '3376011' , '3376016' , '3376032' , '3376040' , '3376044' , '3376048' , '3376049' , '3376050' , '3376051' , '3376054' , '3376056' , '3376058' , '3376061' , '3376062' , '3376063' , '3376067' , '3376070' , '3376072' , '3376074' , '3376076' , '3376077' , '3376078' , '3376080' , '3376086')")->result();
		$this->load->view('admin/specialpage/womens_day' , $data);
	}

	public function world_water_day($year=2020){
		$data['title'] = "Water Day 2020";
		$set = $this->live_db->query("SELECT content_id FROM widgetinstancecontent_live WHERE WidgetInstance_id='11136'")->result();
		$arr= $arr1=[];
		foreach($set as $t){
			array_push($arr , $t->content_id);
			array_push($arr1 , "'".$t->content_id."'");
		}
		$data['articles']  = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article as ar WHERE ar.status='P' AND ar.publish_start_date < NOW() AND ar.content_id IN (".implode(',',$arr).") ORDER BY FIELD(content_id, ".implode(',',$arr1).")")->result();
	//	$data['articles']  = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article as ar WHERE ar.status='P' AND ar.publish_start_date < NOW() AND ar.content_id IN (3376723 , 3376052 , 3376069 , 3376041 , 3374477 , 3375237 , 3376011 , 3376016 , 3376032 , 3376040 , 3376044 , 3376048 , 3376049 , 3376050 , 3376051 , 3376054 , 3376056 , 3376058 , 3376061 , 3376062 , 3376063 , 3376067 , 3376070 , 3376072 , 3376074 , 3376076 , 3376077 , 3376078 , 3376080 , 3376086) ORDER BY FIELD(content_id, '3376723' , '3376052' , '3376069' , '3376041' , '3374477' , '3375237' , '3376011' , '3376016' , '3376032' , '3376040' , '3376044' , '3376048' , '3376049' , '3376050' , '3376051' , '3376054' , '3376056' , '3376058' , '3376061' , '3376062' , '3376063' , '3376067' , '3376070' , '3376072' , '3376074' , '3376076' , '3376077' , '3376078' , '3376080' , '3376086')")->result();
		$this->load->view('admin/specialpage/world_water_day' , $data);
	}
	
	public function epep($year=2020){
		/* $data['title'] = "EPEP 2020";
		$set = $this->live_db->query("SELECT content_id FROM widgetinstancecontent_live WHERE WidgetInstance_id='13834'")->result();
		$arr= $arr1=[];
		foreach($set as $t){
			array_push($arr , $t->content_id);
			array_push($arr1 , "'".$t->content_id."'");
		}
		$data['articles']  = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article as ar WHERE ar.status='P' AND ar.publish_start_date < NOW() AND ar.content_id IN (".implode(',',$arr).") ORDER BY FIELD(content_id, ".implode(',',$arr1).")")->result();
		$this->load->view('admin/specialpage/epep' , $data); */
		
		
		$data['title'] = "EPEP 2020";
		$data['total_rows'] = $this->live_db->query("SELECT ar.content_id FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND  ar.content_id !=3357494  AND( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = '809' OR Section_id = '809' )) GROUP BY ar.content_id")->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = BASEURL.'special-page/epep/'.$year;
		$config['total_rows'] = $data['total_rows'];
		$config['per_page'] = 15;
		$config['page_query_string'] = TRUE;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$row = (isset($_GET['per_page']) && $_GET['per_page']!='') ? $_GET['per_page'] : 0;
		$data["articles"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND  ar.content_id !=3357494 AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = '809' OR Section_id = '809' )) GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT ".$row." , ".$config['per_page']."")->result();
		$this->load->view('admin/specialpage/epep' , $data);
	}

public function roseday($year=2020){
		$data['title'] = "Rose Day";
		$set = $this->live_db->query("SELECT content_id FROM widgetinstancecontent_live WHERE WidgetInstance_id='11136'")->result();
		$arr= $arr1=[];
		foreach($set as $t){
			array_push($arr , $t->content_id);
			array_push($arr1 , "'".$t->content_id."'");
		}
		$data['articles']  = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article as ar WHERE ar.status='P' AND ar.publish_start_date < NOW() AND ar.content_id IN (".implode(',',$arr).") ORDER BY FIELD(content_id, ".implode(',',$arr1).")")->result();
	//	$data['articles']  = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article as ar WHERE ar.status='P' AND ar.publish_start_date < NOW() AND ar.content_id IN (3376723 , 3376052 , 3376069 , 3376041 , 3374477 , 3375237 , 3376011 , 3376016 , 3376032 , 3376040 , 3376044 , 3376048 , 3376049 , 3376050 , 3376051 , 3376054 , 3376056 , 3376058 , 3376061 , 3376062 , 3376063 , 3376067 , 3376070 , 3376072 , 3376074 , 3376076 , 3376077 , 3376078 , 3376080 , 3376086) ORDER BY FIELD(content_id, '3376723' , '3376052' , '3376069' , '3376041' , '3374477' , '3375237' , '3376011' , '3376016' , '3376032' , '3376040' , '3376044' , '3376048' , '3376049' , '3376050' , '3376051' , '3376054' , '3376056' , '3376058' , '3376061' , '3376062' , '3376063' , '3376067' , '3376070' , '3376072' , '3376074' , '3376076' , '3376077' , '3376078' , '3376080' , '3376086')")->result();
		$this->load->view('admin/specialpage/world_water_day' , $data);
	}

}
?> 