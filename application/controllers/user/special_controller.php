<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class special_controller extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$CI = &get_instance();
		$this->live_db = $CI->load->database('live_db' , TRUE);
		$this->archive_db = $CI->load->database('archive_db' , TRUE);
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
		$data['title'] = "கிறிஸ்துமஸ் கொண்டாட்டம்  |  சிறப்புப் பக்கம்  |  எழுத்துச் சித்திரங்கள்   |  Christmas Festival | தினமணி  |  Dinamani";
		$total_rows1 = $this->live_db->query("SELECT ar.content_id FROM article as ar  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND section_id='796'")->num_rows();
		$total_rows2 = $this->archive_db->query("SELECT ar.content_id FROM article_2020 as ar  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND section_id='796'")->num_rows();
		$total_rows3 = $this->archive_db->query("SELECT ar.content_id FROM article_2019 as ar  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND section_id='796'")->num_rows();
		$data['total_rows'] = $total_rows1 + $total_rows2  + $total_rows3;
		$lists = [];
		$this->load->library('pagination');
		$config['base_url'] = BASEURL.'special-page/christmas_fest';
		$config['total_rows'] = $data['total_rows'];
		$config['per_page'] = 9;
		$config['page_query_string'] = TRUE;
		$config['num_links'] = 5;
		//$config['use_page_numbers'] = FALSE;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$row = (isset($_GET['per_page']) && $_GET['per_page']!='') ? $_GET['per_page'] : 0;		
		$data1 = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article as ar  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND section_id='796' GROUP BY ar.content_id ORDER BY ar.last_updated_on DESC LIMIT 60")->result();
		$data2 = $this->archive_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article_2020 as ar  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND section_id='796' GROUP BY ar.content_id ORDER BY ar.last_updated_on DESC LIMIT 60")->result();
		$data3 = $this->archive_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article_2019 as ar  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND section_id='796' GROUP BY ar.content_id ORDER BY ar.last_updated_on DESC LIMIT 60")->result();
		$finalData = array_merge($data1 , $data2 , $data3);
		$data4 = @array_chunk($finalData, (int) $config['per_page']);
		$data['data'] = $data4[$row / (int) $config['per_page']];
		$this->load->view('admin/specialpage/christmas_fest' , $data);
	}
	
	public function local_body_election($year=2019){
		$data['title'] = "Tamil Nadu local body election - Dinamani ";
/* 		$data['total_rows'] = $this->live_db->query("SELECT ar.content_id FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = '797' OR Section_id = '797' )) GROUP BY ar.content_id")->num_rows(); */
		$data['total_rows'] = $this->archive_db->query("SELECT ar.content_id FROM article_2019 as ar  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND section_id='797'")->num_rows();
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
		$data["data"] = $this->archive_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article_2019 as ar  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND section_id='797' GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT ".$row." , ".$config['per_page']."")->result();
		$this->load->view('admin/specialpage/local_body_election' , $data);
	}
	
	public function think_edu($year=2020){
		$data['title'] = "ThinkEdu Conclave 2020";
		$data['total_rows'] = $this->live_db->query("SELECT ar.content_id FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = '801' OR Section_id = '801' )) GROUP BY ar.content_id")->num_rows();
		$data['total_rows'] += $this->archive_db->query("SELECT ar.content_id FROM article_2020 as ar  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND section_id='801'")->num_rows();
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
		$data["data"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt, ar.publish_start_date FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = '801' OR Section_id = '801' )) GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT ".$row." , ".$config['per_page']."")->result();
		$data["data"] += $this->archive_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt, ar.publish_start_date FROM article_2020 as ar  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND section_id='801' GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT ".$row." , ".$config['per_page']."")->result();
		$this->load->view('admin/specialpage/think_edu' , $data);
	}
	
	public function bookfair($year=2020){
		$data['title'] = "புத்தக வெளி";
		$this->load->library('pagination');
		if($year=='news' || $year=='thadangal' || $year=='nenaipathu' || $year=='vanavil' || $year=='celebrities-books'){
			if($year=='news'){
				$sectionid =831;
				$data['pagetitle'] = "செய்திகள்";
			}else if($year=='thadangal'){
				$sectionid =804;
				$data['pagetitle'] = "பதிப்பகத்  தடங்கள்";
			}else if($year=='nenaipathu'){
				$sectionid =803;
				$data['pagetitle'] = "புத்தகக் காட்சி  |  வாசகர் கருத்து";
			}else if($year=='celebrities-books'){
				$sectionid =830;
				$data['pagetitle'] = "பிரபலங்களுக்குப் பிடித்த புத்தகங்கள்";
			}else{
				$sectionid =802;
				$data['pagetitle'] = "புத்தகம் புதிது";
			}
			$config['base_url'] = BASEURL.'special-page/bookfair/'.$year.'/';
			$total_rows1 = $this->live_db->query("SELECT ar.content_id FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id = '".$sectionid."' OR ar.section_id = '".$sectionid."')")->num_rows(); 
			$data['total_rows'] = $this->archive_db->query("SELECT ar.content_id FROM article_2020 as ar  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND section_id='".$sectionid."'")->num_rows();
			
			$config['total_rows'] = $data['total_rows'] + $total_rows1;
			$config['per_page'] = 16;
			$config['page_query_string'] = TRUE;
			$config['num_links'] = 5;
			$config['use_page_numbers'] = TRUE;
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();
			$row = (isset($_GET['per_page']) && $_GET['per_page']!='') ? $_GET['per_page'] : 0;

			//$data["data"] = $this->archive_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article_2020 as ar  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND section_id='".$sectionid."' GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT ".$row." , ".$config['per_page']."")->result();
			
			$data1 = $this->archive_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt , ar.publish_start_date FROM article_section_mapping_2020 as asp LEFT JOIN article_2020 as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id = '".$sectionid."' OR ar.section_id = '".$sectionid."') GROUP BY ar.content_id ORDER BY publish_start_date DESC")->result();
			$data2 = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt , ar.publish_start_date FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id = '".$sectionid."' OR ar.section_id = '".$sectionid."') GROUP BY ar.content_id ORDER BY publish_start_date DESC ")->result();
			$final =array_merge($data2 , $data1);
			$data['data'] = array_slice($final,$row,$config['per_page']);
			$data['type']=2;
			$this->load->view('admin/specialpage/book_fair' , $data);
		}else if($year=='arimukam'){
			$data['books'] = $this->db->query("SELECT title , content ,image FROM scrolling_newsmaster WHERE status=1 ORDER BY sid DESC")->result();
			$data['type']=3;
			$this->load->view('admin/specialpage/book_fair' , $data);
			
		}else{
			$config['base_url'] = BASEURL.'special-page/bookfair/'.$year;
			$row = (isset($_GET['per_page']) && $_GET['per_page']!='') ? $_GET['per_page'] : 0;
			$data["data"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt , ar.publish_start_date FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE  Section_id = '831' )) AND ar.content_id NOT IN (3327576 ,3326660) GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT 4")->result();
			if(count($data["data"])!=4){
				$c = 4-count($data["data"]);
				$data1 = $this->archive_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt , ar.publish_start_date FROM article_section_mapping_2020 as asp LEFT JOIN article_2020 as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id = '831' OR ar.section_id = '831') GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT ".$c."")->result();
				$data["data"] = array_merge($data["data"] , $data1);
			}
			
			
			//$data["vanavil"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt , ar.publish_start_date FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE  Section_id = '802' )) GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT 4")->result();
			$data["vanavil"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt ,ar.publish_start_date FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id = '802' OR ar.section_id = '802') GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT 4")->result();
			//$data["nenaipathu"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt , ar.publish_start_date FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE  Section_id = '803' )) GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT 4")->result();
			
			$data["nenaipathu"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt , ar.publish_start_date FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id = '803' OR ar.section_id = '803') GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT 4")->result();
			
			//$data["thadangal"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt , ar.publish_start_date FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE  Section_id = '804' )) GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT 4")->result();
			
			$data["thadangal"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt , ar.publish_start_date FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id = '804' OR ar.section_id = '804') GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT 4")->result();
			
			$data["celebrities"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt , ar.publish_start_date FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE  Section_id = '830' )) GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT 4")->result();
			
			$data['books'] = $this->db->query("SELECT title , content ,image FROM scrolling_newsmaster WHERE status=1 ORDER BY sid DESC LIMIT 8")->result();
			$data['type']=1;
			$this->load->view('admin/specialpage/book_fair' , $data);
		}
	}
	
	public function tamilnadu_state_budget($year=2020){
		$data['title'] = "Tamil Nadu State Budget 2020";

		$data['total_rows'] = $this->archive_db->query("SELECT ar.content_id FROM article_2020 as ar  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND section_id='807'")->num_rows();

		//$data['total_rows'] = $this->live_db->query("SELECT ar.content_id FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND  ar.content_id !=3357494  AND( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = '807' OR Section_id = '807' )) GROUP BY ar.content_id")->num_rows();
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

		$data["data"] = $this->archive_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article_2020 as ar  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND section_id='807' GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT ".$row." , ".$config['per_page']."")->result();

		//$data["data"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND  ar.content_id !=3357494 AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = '807' OR Section_id = '807' )) GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT ".$row." , ".$config['per_page']."")->result();

		$this->load->view('admin/specialpage/tamilnadu_state_budget' , $data);
	}
	
	public function womens_day($year=2020){
		$data['title'] = "Women's Day 2022";
		$prime = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article as ar WHERE ar.status='P' AND ar.publish_start_date < NOW() AND ar.content_id IN (3804379, 3803947, 3804385, 3804382, 3803948, 3803937, 3804356 , 3803958) ORDER BY FIELD(content_id, '3804379', '3803947', '3804385', '3804382', '3803948', '3803937' , '3804356' , '3803958')")->result();
		$latest = $this->archive_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article_2021 as ar WHERE ar.status='P' AND ar.publish_start_date < NOW() AND ar.content_id IN ( 3575702, 3576241, 3576243, 3576247, 3575101, 3575104, 3575106 , 3576249 , 3576252 ,3576255 , 3576729 , 3575701) ORDER BY FIELD(content_id, '3575702', '3576241', '3576243', '3576247', '3575101', '3575104', '3575106' , '3576249' , '3576252' ,'3576255' , '3576729' , '3575701')")->result();
		$latest = array_merge($prime , $latest);
		$latest1  = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article as ar WHERE ar.status='P' AND ar.publish_start_date < NOW() AND ar.content_id IN (3575715, 3576237, 3376723 , 3376052 , 3376069 , 3376041 , 3374477 , 3375237 , 3376011 , 3376016 , 3376032 , 3376040 , 3376044 , 3376048 , 3376049 , 3376050 , 3376051 , 3376054 , 3376056 , 3376058 , 3376061 , 3376062 , 3376063 , 3376067 , 3376070 , 3376072 , 3376074 , 3376076 , 3376077 , 3376078 , 3376080 , 3376086) ORDER BY FIELD(content_id, '3575715', '3576237' , '3376723' , '3376052' , '3376069' , '3376041' , '3374477' , '3375237' , '3376011' , '3376016' , '3376032' , '3376040' , '3376044' , '3376048' , '3376049' , '3376050' , '3376051' , '3376054' , '3376056' , '3376058' , '3376061' , '3376062' , '3376063' , '3376067' , '3376070' , '3376072' , '3376074' , '3376076' , '3376077' , '3376078' , '3376080' , '3376086')")->result();
		$data['articles'] = array_merge($latest , $latest1);
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
		$data['total_rows'] = $this->archive_db->query("SELECT ar.content_id FROM article_2020 as ar  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND section_id='809'")->num_rows();
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
		$data["articles"] = $this->archive_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article_2020 as ar  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND section_id='809' GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT ".$row." , ".$config['per_page']."")->result();
		$this->load->view('admin/specialpage/epep' , $data);
	}

	public function rose_day($year=2020){
		$data['title'] = "Rose Day";
		$set = $this->live_db->query("SELECT content_id FROM widgetinstancecontent_live WHERE WidgetInstance_id='14051'")->result();
		$arr= $arr1=[];
		foreach($set as $t){
			array_push($arr , $t->content_id);
			array_push($arr1 , "'".$t->content_id."'");
		}
		$data['articles']  = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article as ar WHERE ar.status='P' AND ar.publish_start_date < NOW() AND ar.content_id IN (".implode(',',$arr).") ORDER BY FIELD(content_id, ".implode(',',$arr1).")")->result();
	//	$data['articles']  = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article as ar WHERE ar.status='P' AND ar.publish_start_date < NOW() AND ar.content_id IN (3376723 , 3376052 , 3376069 , 3376041 , 3374477 , 3375237 , 3376011 , 3376016 , 3376032 , 3376040 , 3376044 , 3376048 , 3376049 , 3376050 , 3376051 , 3376054 , 3376056 , 3376058 , 3376061 , 3376062 , 3376063 , 3376067 , 3376070 , 3376072 , 3376074 , 3376076 , 3376077 , 3376078 , 3376080 , 3376086) ORDER BY FIELD(content_id, '3376723' , '3376052' , '3376069' , '3376041' , '3374477' , '3375237' , '3376011' , '3376016' , '3376032' , '3376040' , '3376044' , '3376048' , '3376049' , '3376050' , '3376051' , '3376054' , '3376056' , '3376058' , '3376061' , '3376062' , '3376063' , '3376067' , '3376070' , '3376072' , '3376074' , '3376076' , '3376077' , '3376078' , '3376080' , '3376086')")->result();
		$this->load->view('admin/specialpage/rose_day' , $data);
	}
	
	
	public function elders_day($year=2020){
		$data['title'] = "Elders Day Special";
		$set = $this->live_db->query("SELECT content_id FROM widgetinstancecontent_live WHERE WidgetInstance_id='14063'")->result();
		$arr= $arr1=[];
		foreach($set as $t){
			array_push($arr , $t->content_id);
			array_push($arr1 , "'".$t->content_id."'");
		}
		$data['articles']  = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article as ar WHERE ar.status='P' AND ar.publish_start_date < NOW() AND ar.content_id IN (".implode(',',$arr).") ORDER BY FIELD(content_id, ".implode(',',$arr1).")")->result();
	//	$data['articles']  = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article as ar WHERE ar.status='P' AND ar.publish_start_date < NOW() AND ar.content_id IN (3376723 , 3376052 , 3376069 , 3376041 , 3374477 , 3375237 , 3376011 , 3376016 , 3376032 , 3376040 , 3376044 , 3376048 , 3376049 , 3376050 , 3376051 , 3376054 , 3376056 , 3376058 , 3376061 , 3376062 , 3376063 , 3376067 , 3376070 , 3376072 , 3376074 , 3376076 , 3376077 , 3376078 , 3376080 , 3376086) ORDER BY FIELD(content_id, '3376723' , '3376052' , '3376069' , '3376041' , '3374477' , '3375237' , '3376011' , '3376016' , '3376032' , '3376040' , '3376044' , '3376048' , '3376049' , '3376050' , '3376051' , '3376054' , '3376056' , '3376058' , '3376061' , '3376062' , '3376063' , '3376067' , '3376070' , '3376072' , '3376074' , '3376076' , '3376077' , '3376078' , '3376080' , '3376086')")->result();
		$this->load->view('admin/specialpage/elders_day' , $data);
	}
	
	public function margazhi_urchavam(){ 
		$data['title'] = "மார்கழி உற்சவம்  |  Margazhi Urchavam | தினமணி  |  Dinamani";
		$data['total_rows'] = $this->live_db->query("SELECT ar.content_id FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = '813' OR Section_id = '813' )) GROUP BY ar.content_id")->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = BASEURL.'special-page/margazhi_urchavam';
		$config['total_rows'] = $data['total_rows'];
		$config['per_page'] = 9;
		$config['page_query_string'] = TRUE;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$row = (isset($_GET['per_page']) && $_GET['per_page']!='') ? $_GET['per_page'] : 0;
		
		$data["data"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = '813' OR Section_id = '813' )) GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT ".$row." , ".$config['per_page']."")->result();
		$this->load->view('admin/specialpage/margazhi_urchavam' , $data);
	}
	
	public function valentine_day($type=''){
		$data['type'] = ($type=='archive') ? 1 : 0;
		$pagerUrl == ($type=='archive') ? BASEURL.'special-page/valentine_day/archive' : BASEURL.'special-page/valentine_day';
		$data['title'] = "காதலுக்கு மரியாதை | காதலர் தின சிறப்புப் பக்கம்  | தினமணி  | Valentine's Day Spl| Dinamani";
		$row = (isset($_GET['per_page']) && $_GET['per_page']!='') ? $_GET['per_page'] : 0;
		$this->load->library('pagination');
		$config['base_url'] = $pagerUrl;
		$config['per_page'] = 10;
		$config['page_query_string'] = TRUE;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = TRUE;
		if($data['type']==0){
			$data['total_rows'] = $this->live_db->query("SELECT content_id FROM widgetinstancecontent_live WHERE WidgetInstance_id='14295' ORDER BY DisplayOrder ASC")->num_rows();
			$set = $this->live_db->query("SELECT content_id FROM widgetinstancecontent_live WHERE WidgetInstance_id='14295' ORDER BY DisplayOrder ASC LIMIT ".$row." , ".$config['per_page']."")->result();
			$arr= $arr1=[];
			foreach($set as $t){
				array_push($arr , $t->content_id);
				array_push($arr1 , "'".$t->content_id."'");
			}
			
		}else{
			$data['total_rows'] = $this->archive_db->query("SELECT ar.content_id FROM article_section_mapping_2020 as asp LEFT JOIN article_2020 as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN (817) GROUP BY ar.content_id")->num_rows();
		}
		$config['total_rows'] = $data['total_rows'];
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['showArchive'] = 0;
		if(($row+$config['per_page'] >= $config['total_rows']) && $data['type']==0){
			$data['showArchive'] = 1;
		}
		if($data['type']==0){
			$data['data']  = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article as ar WHERE ar.status='P' AND ar.publish_start_date < NOW() AND ar.content_id IN (".implode(',',$arr).") ORDER BY FIELD(content_id, ".implode(',',$arr1).")")->result();
		}else{
			$data["data"] = $this->archive_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article_section_mapping_2020 as asp LEFT JOIN article_2020 as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN (817)) GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT ".$row." , ".$config['per_page']."")->result();
		}
		$this->load->view('admin/specialpage/valentine_day' , $data);
	}
	
	public function world_food_day(){
		$data['title'] = "World Food Day | dinamani -  2021";
		$data['total_rows'] = $this->live_db->query("SELECT ar.content_id FROM  article as ar  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ar.tags LIKE '%food day%' ORDER BY ar.publish_start_date DESC")->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = BASEURL.'special-page/world_food_day';
		$config['total_rows'] = $data['total_rows'];
		$config['per_page'] = 10;
		$config['page_query_string'] = TRUE;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = $config['num_tag_open'] = $config['prev_tag_open'] = $config['next_tag_open']  = $config['last_tag_open']  = '<li class="page-item">';
		$config['first_tag_close'] = $config['num_tag_close'] = $config['prev_tag_close'] = $config['next_tag_close']  =  $config['last_tag_close']  = '</li>';
		$config['cur_tag_open']  ='<li><a class="page-link active">';
		$config['cur_tag_close']  ='</a></li>';
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$row = (isset($_GET['per_page']) && $_GET['per_page']!='') ? $_GET['per_page'] : 0;
		
		$data["data"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article as ar  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ar.tags LIKE '%food day%' ORDER BY ar.last_updated_on DESC LIMIT ".$row." , ".$config['per_page']."")->result();
		$this->load->view('admin/specialpage/world_food_day' , $data);
	}
	
	public function t20world_cup(){
		$data['title'] = "தமிழ் மொழித்  திருவிழா -  2020";
		$data['total_rows'] = $this->live_db->query("SELECT ar.content_id FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = '841' OR Section_id = '841' )) GROUP BY ar.content_id")->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = BASEURL.'special-page/t20world_cup';
		$config['total_rows'] = $data['total_rows'];
		$config['per_page'] = 12;
		$config['page_query_string'] = TRUE;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = $config['num_tag_open'] = $config['prev_tag_open'] = $config['next_tag_open']  = $config['last_tag_open']  = '<li class="page-item">';
		$config['first_tag_close'] = $config['num_tag_close'] = $config['prev_tag_close'] = $config['next_tag_close']  =  $config['last_tag_close']  = '</li>';
		$config['cur_tag_open']  ='<li><a class="page-link active">';
		$config['cur_tag_close']  ='</a></li>';
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$row = (isset($_GET['per_page']) && $_GET['per_page']!='') ? $_GET['per_page'] : 0;
		
		$data["data"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article_section_mapping as asp LEFT JOIN article as ar ON ar.content_id = asp.content_id  WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ( asp.section_id IN ( SELECT Section_id FROM sectionmaster WHERE IF(ParentSectionID !='0', ParentSectionID, Section_id) = '841' OR Section_id = '841' )) GROUP BY ar.content_id ORDER BY publish_start_date DESC LIMIT ".$row." , ".$config['per_page']."")->result();
		$this->load->view('admin/specialpage/t20world_cup' , $data);
	}
	
	public function mother_in_law_day(){
		$data['title'] = "தமிழ் மொழித்  திருவிழா -  2020";
		$data['total_rows'] = $this->live_db->query("SELECT content_id FROM widgetinstancecontent_live WHERE WidgetInstance_id = 14472")->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = BASEURL.'special-page/mother_in_law_day';
		$config['total_rows'] = $data['total_rows'];
		$config['per_page'] = 12;
		$config['page_query_string'] = TRUE;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = $config['num_tag_open'] = $config['prev_tag_open'] = $config['next_tag_open']  = $config['last_tag_open']  = '<li class="page-item">';
		$config['first_tag_close'] = $config['num_tag_close'] = $config['prev_tag_close'] = $config['next_tag_close']  =  $config['last_tag_close']  = '</li>';
		$config['cur_tag_open']  ='<li><a class="page-link active">';
		$config['cur_tag_close']  ='</a></li>';
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$row = (isset($_GET['per_page']) && $_GET['per_page']!='') ? $_GET['per_page'] : 0;
		$contentIdList = $this->live_db->query("SELECT content_id FROM widgetinstancecontent_live WHERE WidgetInstance_id = 14472 ORDER BY DisplayOrder ASC LIMIT ".$row." , ".$config['per_page']."")->result();
		$list = [];
		foreach($contentIdList as $contentID){
			array_push($list , $contentID->content_id);
		}
		$data["data"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article as ar WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ar.content_id IN(".implode(',' ,$list).") ORDER BY FIELD(content_id, ".implode(',',$list).")")->result();
		$this->load->view('admin/specialpage/mother_in_law_day' , $data);
	}
	
	public function childrens_day(){
		$data['title'] = "நம்பிக்கை நட்சத்திரங்கள் | குழந்தைகள் நாள் சிறப்புப் பக்கம்  | Children's Day Special Page | தினமணி  |	Dinamani";
		$data['total_rows'] = $this->live_db->query("SELECT content_id FROM widgetinstancecontent_live WHERE WidgetInstance_id = 14477")->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = BASEURL.'special-page/childrens_day';
		$config['total_rows'] = $data['total_rows'];
		$config['per_page'] = 12;
		$config['page_query_string'] = TRUE;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = $config['num_tag_open'] = $config['prev_tag_open'] = $config['next_tag_open']  = $config['last_tag_open']  = '<li class="page-item">';
		$config['first_tag_close'] = $config['num_tag_close'] = $config['prev_tag_close'] = $config['next_tag_close']  =  $config['last_tag_close']  = '</li>';
		$config['cur_tag_open']  ='<li><a class="page-link active">';
		$config['cur_tag_close']  ='</a></li>';
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$row = (isset($_GET['per_page']) && $_GET['per_page']!='') ? $_GET['per_page'] : 0;
		$contentIdList = $this->live_db->query("SELECT content_id FROM widgetinstancecontent_live WHERE WidgetInstance_id = 14477 ORDER BY DisplayOrder ASC LIMIT ".$row." , ".$config['per_page']."")->result();
		$list = [];
		foreach($contentIdList as $contentID){
			array_push($list , $contentID->content_id);
		}
		$data["data"] = $this->live_db->query("SELECT ar.content_id , ar.title , ar.summary_html , ar.url , ar.article_page_image_path , ar.article_page_image_title , ar.article_page_image_alt FROM article as ar WHERE ar.status = 'P' AND ar.publish_start_date < NOW() AND ar.content_id IN(".implode(',' ,$list).") ORDER BY FIELD(content_id, ".implode(',',$list).")")->result();
		$this->load->view('admin/specialpage/childrens_day' , $data);
	}

}
?> 