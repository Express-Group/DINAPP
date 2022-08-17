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
	public function geo_country(){
		echo @$_SERVER['HTTP_CLOUDFRONT_VIEWER_COUNTRY'];
	}
	
	public function get_revision(){
		$CI = &get_instance();
		$this->live_db = $CI->load->database('live_db' , true);
		$year = $this->input->get('year');
		if($year == '')
		{
			$year = date('Y');
		}
		$template ='';
		$result = $this->live_db->query("SELECT author_name , description FROM revision WHERE status=1 AND year = '".$year."' ORDER BY rid DESC")->result();
		foreach($result as $revision){
			$template .='<div class="m-content">';
			$template .='<h5>'.$revision->author_name.'</h5>';
			$template .='<p>'.$revision->description.'</p>';
			$template .='</div>';
		}
		echo $template;
	}
	public function trending_tags(){
		$section = FCPATH.'application/views/view_template/trendingsection.php';
		if(file_exists($section)){
			echo file_get_contents($section);
		}
	}
	public function form_tags($tags){
		$result = '';
		foreach($tags as $tag){
			$splittedTag = explode(',',$tag['tag_name']);
			$list = '';
			$url = '';
			for($i=0;$i<count($splittedTag);$i++){
				if(mb_strlen($splittedTag[$i]) > mb_strlen($list)){
					$list = trim($splittedTag[$i]);
					$url = BASEURL.$tag['url'];
				}
			}
			$result .='<a target="_BLANK" href="'.$url.'">'.$list.'</a>';
			
		}
		return $result;
	}
	public function register_form(){
		if(count($_POST)==6){
			$username = trim($this->input->post('uname'));
			$email = trim($this->input->post('email'));
			$age = trim($this->input->post('age'));
			$phnumber = trim($this->input->post('phnumber'));
			$location = trim($this->input->post('location'));
			$experience = trim($this->input->post('experience'));
			if($username!='' && $email!='' && $age!='' && $phnumber!='' && $location!='' && $experience!=''){
				$CI = &get_instance();
				$this->live_db = $CI->load->database('live_db' , true);
				$userip = $_SERVER['REMOTE_ADDR'];
				$checkemail = $this->live_db->query("SELECT uid FROM user_form WHERE email='".$email."'")->num_rows();
				if($checkemail==0){
					$data = array("username" =>$username , "age"=>$age , "email"=>$email , "phone_number"=>$phnumber , "location"=>$location,"experience"=>$experience,"user_ip"=>$userip);
					echo $this->live_db->insert('user_form',$data);
				}else{
					echo 2;
				}
			}else{
				echo 0;
			}
		}else{
			echo 0;
		}
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
	public function get_district_content(){
	    $class_object = new view;
		$class_object->get_district_content();
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
	public function getMostReadContent(){
	    $class_object = new view;
		$class_object->getMostReadContent();
	}
	public function get_panchangam_content(){
	    $class_object = new view;
		$class_object->get_panchangam_content();
	}
	public function getPanchangamDetails(){
	    $class_object = new view;
		$class_object->getPanchangamDetails();
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

	public function get_breaking_news_contents()
	{
		$class_object = new view;
		$class_object->get_breaking_news_contents();
	}


	public function get_breaking_news_content()
	{
		$class_object = new view;
		$class_object->get_breaking_news_content();
	}
	public function get_breadcrumb(){
	extract($_POST);
	$content['mode'] 	    = $mode;
	$content['page_param']  = $section;
	$single['content']      = $content;
	$breadcrumb    = $this->load->view('admin/widgets/bread-crumb.php', $single, true);
	echo $breadcrumb;exit;
	}
	public function get_rightside_stories(){
	extract($_POST);
	$widget_instance_contents_array = $this->widget_model->rightside_otherstories_articlepage(10, $mode, $section, $contentid);
    if(count($widget_instance_contents_array) > 0)
    {
	$right_stories    = $this->load->view('admin/widgets/other_stories.php', ['data' => $widget_instance_contents_array], true);
	}else{
	$right_stories = '';
	}
	echo $right_stories;exit;
	}
	public function leadcontent_news(){
		$sectionID = filter_var($this->input->post('sectionID'), FILTER_SANITIZE_STRING);
		$result = '';
		$CI = &get_instance();
		$this->live_db = $CI->load->database('live_db' , TRUE);
		$response = $this->live_db->query("SELECT ln.lead_id , ln.title , ln.description , ln.result , ln.imagepath , ln.color FROM  leadcontent_master as ln RIGHT JOIN leadcontent_mapping as lnm ON lnm.lead_id = ln.lead_id WHERE lnm.section_id='".$sectionID."' AND ln.status='1' ORDER BY lnm.order_id ASC");
		foreach($response->result() as $data){
			$result .= '<div class="items">';
			$imgpath = image_url.'images/leadcontent/'.$data->imagepath;
			$result .= '<div class="img-s"><img src="'.$imgpath.'" class="img-responsive"></div>';
			$result .= '<div class="ln-content"><h5>'.$data->title.'</h5><p>'.$data->description.'</p><p style="color:'.$data->color.';">'.$data->result.'</p></div>';
			$result .= '</div>';
		}
		echo $result;
	}
	public function GetDynamicTables(){
		$Data= $this->widget_model->Get_dynamic_tables();
		$sectionName = $this->input->post('section',TRUE);
		$Template= $flipTemplate = $first ='';
		$flipTemplate='';
		if($Data=='NO ROWS'){
			$Template='<div>No tables found.</div>';
		}else{
			foreach($Data as $Datavalue):
				$Tid   =   $Datavalue->tid;
				$TableName   =   trim($Datavalue->table_name);
				$JsonTable  =   json_decode($Datavalue->table_properties,true);
				$JsonTable  =   $JsonTable['data'];
				$Total   =   $Datavalue->total;
				if(strtolower($TableName)==strtolower($sectionName)){
					$first .='<div class="col-md-12 dynamic-table-width">';
					$first .='<table class="table table-bordered common-table-election">';
					$first .='<tr class="table-header-wrapper"><td colspan="3" style="font-weight:bold;font-size:11px;">'.$TableName.'</td><td colspan="1" class="table-header-wrapper-second">'.$Total.'</td></tr>';
					$first .='<tr class="table-header-title"><td>Party</td><td>Lead</td><td>Won</td><td>Total</td></tr>';
							for($i=0;$i<count($JsonTable);$i++){
								$first .='<tr class="table-body-content">';
								$first .='<td>'.$JsonTable[$i]['field1'].'</td>';
								$first .='<td>'.$JsonTable[$i]['field2'].'</td>';
								$first .='<td>'.$JsonTable[$i]['field3'].'</td>';
								$first .='<td>'.$JsonTable[$i]['field4'].'</td>';
								$first .='</tr>';
							}
					$first .='</table>';
					$first .='</div>';
				}else{
					$Template .='<div class="dynamic-table-width">';
					$Template .='<table class="table table-bordered common-table-election">';
					$Template .='<tr class="table-header-wrapper"><td colspan="3" style="font-size:11px;">'.$TableName.'</td><td colspan="1" class="table-header-wrapper-second" >'.$Total.'</td></tr>';
					$Template .='<tr class="table-header-title"><td>Party</td><td>Lead</td><td>Won</td><td>Total</td></tr>';
							for($i=0;$i<count($JsonTable);$i++){
								$Template .='<tr class="table-body-content">';
								$Template .='<td>'.$JsonTable[$i]['field1'].'</td>';
								$Template .='<td>'.$JsonTable[$i]['field2'].'</td>';
								$Template .='<td>'.$JsonTable[$i]['field3'].'</td>';
								$Template .='<td>'.$JsonTable[$i]['field4'].'</td>';
								$Template .='</tr>';
							}
					$Template .='</table>';
					$Template .='</div>';
				}
			endforeach;
		}
		
		echo $first.$Template;
	}
	
	public function single_table(){
		$CI = &get_instance();
		$this->live_db = $CI->load->database('live_db' ,true);
		$details = $this->live_db->select('list , lid , title')->from('election_table')->where(['status' => 1 , 'lid'=>1])->get()->row_array();
		$template = '';
		if(count($details) > 0){
			$list = ($details['list']!='') ? json_decode($details['list']) : [];
			$template .='<table class="table table-tn">';
			$template .='<thead>';
			$template .='<tr><th colspan="4" class="text-center">'.$details['title'].'</th></tr>';
			$template .='<tr><th>Party</th><th>Lead</th><th>Won</th><th>Total</th></tr>';
			$template .='</thead>';
			$template .='<tbody>';
			for($i=0;$i<count($list);$i++){
				$partyName = $list[$i]->name;
				$partyList = $list[$i]->list;
				$temp = '';
				$lead =0;
				$won =0;
				$total =0;
				//print_r($partyList);
				foreach($partyList as $party){
					$lead += (int) $party->lead;
					$won += (int) $party->won;
					$total += (int) $party->total;
					$temp .= '<tr class="second-tr">';
					$temp .= '<td>'.$party->party.'</td>';
					$temp .= '<td>'.str_repeat('0' , (3 - strlen($party->lead))).$party->lead.'</td>';
					$temp .= '<td>'.str_repeat('0' , (3 - strlen($party->won))).$party->won.'</td>';
					$temp .= '<td>'.str_repeat('0' , (3 - strlen($party->total))).$party->total.'</td>';
					$temp .= '</tr>';
				}
				$template .='<tr class="first-tr">';
				$template .='<td>'.$partyName.'</td>';
				$template .='<td>'.str_repeat('0' , (3 - strlen($lead))).$lead.'</td>';
				$template .='<td>'.str_repeat('0' , (3 - strlen($won))).$won.'</td>';
				$template .='<td>'.str_repeat('0' , (3 - strlen($total))).$total.'</td>';
				$template .= '</tr>';
				$template .= $temp;
				
			}
			$template .='</tbody>';
			$template .='</table>';
		}
		echo $template;
	}
	
	public function corona(){
		$type = $this->input->get('type');
		if($type=='3'){
			$filepath =  FCPATH.'application/views/specialwidget/coronatable.widget';
		}else{
			$filepath =  FCPATH.'application/views/specialwidget/corona.widget';
		}
		$data = json_decode(file_get_contents($filepath) , true);
		$flipTemplate ='';
		if($type=='1'){
			$flipTemplate .='<div class="side">';
			$flipTemplate .='<h6 class="text-center">கரோனா <span><i class="fa fa-times"></i></span></h6>';
			$flipTemplate .='<table>';
			$flipTemplate .='<tbody>';
			$flipTemplate .='<tr><td style="font-size:35px;color:red;margin: 14px 0 5px;float: left;width: 100%;">'.$data['active_case_india'].'</td></tr>';
			$flipTemplate .='<tr><td style="font-size:10px;">இந்தியா - பாதிப்பு</td></tr>';
			$flipTemplate .='</tbody>';
			$flipTemplate .='</table>';
			$flipTemplate .='<h5><a href="'.$data['url'].'" style="cursor:pointer;">தகவல்கள் உடனுக்குடன்</a></h5>';
			$flipTemplate .='</div>';
			
			$flipTemplate .='<div class="side">';
			$flipTemplate .='<h6 class="text-center">கரோனா <span><i class="fa fa-times"></i></span></h6>';
			$flipTemplate .='<table>';
			$flipTemplate .='<tbody>';
			$flipTemplate .='<tr><td style="font-size:35px;color:red;margin: 14px 0 5px;float: left;width: 100%;">'.$data['deaths_case_india'].'</td></tr>';
			$flipTemplate .='<tr><td  style="font-size:10px;">இந்தியா - இறப்பு</td></tr>';
			$flipTemplate .='</tbody>';
			$flipTemplate .='</table>';
			$flipTemplate .='<h5><a href="'.$data['url'].'" style="cursor:pointer;">தகவல்கள் உடனுக்குடன்</a></h5>';
			$flipTemplate .='</div>';
			
			$flipTemplate .='<div class="side">';
			$flipTemplate .='<h6 class="text-center">கரோனா <span><i class="fa fa-times"></i></span></h6>';
			$flipTemplate .='<table>';
			$flipTemplate .='<tbody>';
			$flipTemplate .='<tr><td style="font-size:35px;color:red;margin: 14px 0 5px;float: left;width: 100%;">'.$data['re_case_india'].'</td></tr>';
			$flipTemplate .='<tr><td  style="font-size:10px;">இந்தியா - மீண்டவர்கள் </td></tr>';
			$flipTemplate .='</tbody>';
			$flipTemplate .='</table>';
			$flipTemplate .='<h5><a href="'.$data['url'].'" style="cursor:pointer;">தகவல்கள் உடனுக்குடன்</a></h5>';
			$flipTemplate .='</div>';
		}else if($type=='3'){
			$flipTemplate .='<div class="table-responsive">';
			$flipTemplate .='<table class="table table-bordered" style="width: 100%;">';
			$flipTemplate .='<thead>';
			if($data['country']!='1'){
				$flipTemplate .= '<tr>';
				$flipTemplate .= '<th style="background-color:#007499;color:white;padding: 10px 2px 10px 4px !important;">நாடுகள்</th>';
				for($i=0;$i<count($data['countrydata']);$i++){
					
					$flipTemplate .=  '<th style="background-color:#007499;color:white;">'.$data['countrydata'][$i].'</th>';
				}
				$flipTemplate .= '</tr>';
			}
			$flipTemplate .= '<thead>';
			$flipTemplate .= '<tbody>';
			if($data['active_cases']!='1'){
				$flipTemplate .= '<tr>';
				$flipTemplate .= '<th style="background-color:#007499;color:white;padding: 10px 2px 10px 4px !important;padding: 10px 2px 10px 4px !important;">பாதிப்பு</th>';
				for($i=0;$i<count($data['active_casesdata']);$i++){
					$flipTemplate .=  '<td class="text-right">'.$data['active_casesdata'][$i].'</td> ';
				}
				$flipTemplate .= '</tr>';
			}
			if($data['deaths']!='1'){
				$flipTemplate .= '<tr>';
				$flipTemplate .= '<th style="background-color:#007499;color:white;padding: 10px 2px 10px 4px !important;padding: 10px 2px 10px 4px !important;">உயிரிழப்பு</th>';
				for($i=0;$i<count($data['deathsdata']);$i++){
					$flipTemplate .=  '<td class="text-right">'.$data['deathsdata'][$i].'</td> ';
				}
				$flipTemplate .= '</tr>';
			}
			if($data['recovered']!='1'){
				$flipTemplate .= '<tr>';
				$flipTemplate .= '<th style="background-color:#007499;color:white;padding: 10px 2px 10px 4px !important;padding: 10px 2px 10px 4px !important;">மீண்டவர்கள்</th>';
				for($i=0;$i<count($data['recovereddata']);$i++){
					$flipTemplate .=  '<td class="text-right">'.$data['recovereddata'][$i].'</td> ';
				}
				$flipTemplate .= '</tr>';
			}
			$flipTemplate .= '</tbody>';
			$flipTemplate .='</table>';
			$flipTemplate .='</div>';
		}else{
			$flipTemplate .='<div class="side">';
			$flipTemplate .='<h6 class="text-center">கரோனா <span><i class="fa fa-times"></i></span></h6>';
			$flipTemplate .='<h6 class="text-center" style="font-size:10px;">இந்தியா </h6>';
			$flipTemplate .='<table>';
			$flipTemplate .='<tbody>';
			$flipTemplate .='<tr><td class="text-left">பாதிப்பு</td><td style="color:red;font-size:12px;">'.$data['active_case_india'].'</td></tr>';
			$flipTemplate .='<tr><td class="text-left">இறப்பு</td><td style="color:red;font-size:12px;">'.$data['deaths_case_india'].'</td></tr>';
			$flipTemplate .='<tr><td class="text-left">மீண்டவர்கள்</td><td style="color:red;font-size:12px;">'.$data['re_case_india'].'</td></tr>';
			$flipTemplate .='</tbody>';
			$flipTemplate .='</table>';
			$flipTemplate .='<h5><a href="'.$data['url'].'" style="cursor:pointer;">தகவல்கள் உடனுக்குடன்</a></h5>';
			$flipTemplate .='</div>';
			
			$flipTemplate .='<div class="side">';
			$flipTemplate .='<h6 class="text-center">கரோனா <span><i class="fa fa-times"></i></span></h6>';
			$flipTemplate .='<h6 class="text-center" style="font-size:10px;">தமிழகம்</h6>';
			$flipTemplate .='<table>';
			$flipTemplate .='<tbody>';
			$flipTemplate .='<tr><td class="text-left">பாதிப்பு</td><td style="color:red;font-size:12px;">'.@$data['active_case_tamilnadu'].'</td></tr>';
			$flipTemplate .='<tr><td class="text-left">இறப்பு</td><td style="color:red;font-size:12px;">'.@$data['deaths_case_tamilnadu'].'</td></tr>';
			$flipTemplate .='<tr><td class="text-left">மீண்டவர்கள்</td><td style="color:red;font-size:12px;">'.@$data['re_case_tamilnadu'].'</td></tr>';
			$flipTemplate .='</tbody>';
			$flipTemplate .='</table>';
			$flipTemplate .='<h5><a href="'.$data['url'].'" style="cursor:pointer;">தகவல்கள் உடனுக்குடன்</a></h5>';
			$flipTemplate .='</div>';
			
			$flipTemplate .='<div class="side">';
			$flipTemplate .='<h6 class="text-center">கரோனா <span><i class="fa fa-times"></i></span></h6>';
			$flipTemplate .='<h6 class="text-center" style="font-size:10px;">உலகம்</h6>';
			$flipTemplate .='<table>';
			$flipTemplate .='<tbody>';
			$flipTemplate .='<tr><td class="text-left">பாதிப்பு</td><td style="color:red;font-size:12px;">'.$data['active_case_world'].'</td></tr>';
			$flipTemplate .='<tr><td class="text-left">இறப்பு</td><td style="color:red;font-size:12px;">'.$data['deaths_case_world'].'</td></tr>';
			$flipTemplate .='<tr><td class="text-left">மீண்டவர்கள்</td><td style="color:red;font-size:12px;">'.$data['re_case_world'].'</td></tr>';
			$flipTemplate .='</tbody>';
			$flipTemplate .='</table>';
			$flipTemplate .='<h5><a href="'.$data['url'].'" style="cursor:pointer;">தகவல்கள் உடனுக்குடன்</a></h5>';
			$flipTemplate .='</div>';
			
			
		}
		echo $flipTemplate;
		
	}
	public function fetchadv()
	{
		$widgetins = $_POST['widgetinstance'];
		$file =FCPATH.'application/views/adv/'.$widgetins.'.adv';
		if(file_exists($file)){
			$response = json_decode(file_get_contents($file),true);
			echo $response['content'];
		}else{
			echo '';
		}
	}

	public function fetchelectionmodule()
	{
		$widgetins = $_POST['widgetinstance'];
		$file =FCPATH.'application/views/adv/'.$widgetins.'.adv';
		if(file_exists($file)){
			$template ='';
			$response = json_decode(file_get_contents($file),true);
			if($response['content']!='' && $response['content']!='0,0,0,0'){
				$content = explode(',',$response['content']);
				if( isset($content[0])){ $admk= $content[0];}else{ $admk= 0;}
				if( isset($content[1])){ $dmk= $content[1];}else{ $dmk= 0;}
				if( isset($content[2])){ $bjp= $content[2];}else{ $bjp= 0;}
				if( isset($content[3])){ $ind= $content[3];}else{ $ind= 0;}
				$data =[];
				$data['admk'] = [image_url.'images/static_img/election/AIADMK-candi.jpg','இ. மதுசூதனன்','அஇஅதிமுக'];
				$data['dmk'] = [image_url.'images/static_img/election/DMK-Candi.jpg','மருதுகணேஷ்','திமுக'];
				$data['bjp'] = [image_url.'images/static_img/election/BJP-Candi.jpg','கரு. நாகராஜன்','பாஜக'];
				$data['ind'] = [image_url.'images/static_img/election/IND-Candi.jpg','டிடிவி தினகரன்','சுயேச்சை'];
				$sortdata = ['admk'=>$admk,'dmk'=>$dmk,'bjp'=>$bjp,'ind'=>$ind];
				arsort($sortdata);
				$j=1;
				foreach($sortdata as $key=>$value):
					if($j==1){
						$arrow = image_url.'images/static_img/election/p-arrow.png';
					}else{
						$arrow = image_url.'images/static_img/election/down-arrow.png';
					}
					$template .='<div class="col-md-3 col-sm-12 col-xs-12 election_module_col">';
					$template .='<div class="split-25"><img src="'.$data[$key][0].'" class="img-responsive" ><img src="'.$arrow.'" class="img-responsive"  style="margin-top: 3px;"></div>';
					$template .='<div class="split-75"><h5>'.$data[$key][1].'</h5><h4>'.$data[$key][2].'</h4><h4 style="font-size:16px !important;">'.$value.' <span>வாக்குகள்</span></h4></div>';
					$template .='</div>';
					$j++;
				endforeach;
				echo $template;
			}else{
				echo '';
			}
		}else{
			echo '';
		}
	}
	
	public function post_file_intimation()
	{
		$file_name = $_POST['file_name'];
		$contents  = $_POST['file_contents'];
		$file_to_save = FCPATH.'application/views/view_template/'.$file_name;
		$handle = fopen($file_to_save , 'w+');
		if(flock($handle, LOCK_EX))
		{
			fwrite($handle, $contents);
			flock($handle, LOCK_UN);
		}
		return true;
	/*$get_home_file = HOMEURL.'application/views/view_template/home.php';
	$put_home_file = FCPATH.'application/views/view_template/home.php';
    $ch = curl_init ($get_home_file);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
	$rawdata = curl_exec($ch);
    $handle  = fopen($put_home_file , 'w+');
	if(flock($handle, LOCK_EX))
	{
		fwrite($handle, $rawdata);
		flock($handle, LOCK_UN);
	}*/
	}
	
	public function special_widget_put()
	{
		$file_name = $_POST['file_name'];
		$contents  = $_POST['file_contents'];
		$file_to_save = FCPATH.'application/views/specialwidget/'.$file_name;
		$handle = fopen($file_to_save , 'w+');
		if(flock($handle, LOCK_EX))
		{
			fwrite($handle, $contents);
			flock($handle, LOCK_UN);
		}
		return true;
	}
	
	public function save_trending()
	{
		$sectionfname = $_POST['sectionfname'];
		$scontent  = $_POST['scontent'];
		$file_to_save = FCPATH.'application/views/view_template/'.$sectionfname;
		chmod($file_to_save, 0777);
		$handle = fopen($file_to_save , 'w+');
		if(flock($handle, LOCK_EX)){
			fwrite($handle, $scontent);
			flock($handle, LOCK_UN);
		}
		fclose($handle);
		return true;
	} 
	
	public function Content_file_intimation()
	{
		$file_name = $_POST['file_name'];
		$contents  = $_POST['file_contents'];
		$file_to_save = FCPATH.'application/views/LIVENOW/'.$file_name;
		$handle = fopen($file_to_save , 'w+');
		if(flock($handle, LOCK_EX))
		{
			fwrite($handle, $contents);
			flock($handle, LOCK_UN);
		}
		return true;
	}
	
	//to save article page in article folder
	public function save_article_content()
	{
		$file_name = $_POST['file_name'];
		$contents  = $_POST['file_contents'];
		$file_to_save = FCPATH.'application/views/view_template/article/'.$file_name;
		$handle = fopen($file_to_save , 'w+');
		if(flock($handle, LOCK_EX))
		{
			fwrite($handle, $contents);
			flock($handle, LOCK_UN);
		}
		return true;
	}
	// end to save article page in article folder
	
	//to save adv in adv folder
	public function post_scriptfile_intimation()
	{
		$file_name = $_POST['file_name'];
		$contents  = $_POST['file_contents'];
		$type  = $_POST['type'];
		if($type==1){
			$file_to_save = FCPATH.'application/views/adv/'.$file_name;
			$handle = fopen($file_to_save , 'w+');
			if(flock($handle, LOCK_EX))
			{
				fwrite($handle, $contents);
				flock($handle, LOCK_UN);
			}
			chmod(FCPATH.'application/views/adv/'.$file_name,0777);
		}
		if($type==2){
			$file_to_save = FCPATH.'application/views/adv/'.$file_name;
			if(file_exists($file_to_save)){
				unlink($file_to_save);
			}
		}
		return true;
	}
	
	public function fill_widget()
	{
		$page_id                    = $this->input->post('widget_section');
		$instance_id                = $this->input->post('instance_id');
		$xml                        = simplexml_load_file(FCPATH.'uploads/page_layouts/'.$page_id.'_1.xml'); 
		$widget_data                = $xml->xpath("tplcontainer//widget[@data-widgetinstanceid='".$instance_id."']");
		//$widget_data                = json_decode($this->input->post('widget_data'), true);
		//print_r(($widget_data[0]['data-widgetfilepath']));exit;
		$widget_data                = $widget_data[0];
		$widget_location            = $widget_data['data-widgetfilepath'];
		$widget_instance_id         = $widget_data['data-widgetinstanceid'];
	
		$view_mode                  = $this->input->post('view_mode');
		$content_type               = $widget_data['data-contenttype'];
		$content['mode']            = $view_mode;
		$show_summary               = $widget_data['cdata-showSummary'];
		$content['page_param']      = $this->input->post('page_param');
		$content['content_from']    = $this->input->post('content_from');
		$content['is_home_page']    = (strtolower($content['page_param']) == 'home') ? 'y' : 'n';
		//$content['widget_values']   = array('data-widgetinstanceid'=> $widget_instance_id,'cdata-showSummary'=>$show_summary);
		$content['widget_values']   = $widget_data;
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
		
		if (getimagesize($file_name)) {
			$string = $this->load->view($widget_location, $data, true);			
		} else {
			$string = '<div class="row">The file '.$file_name.' does not exist</div>';
		}
		}
		//print_r($string);exit;	
		$widget_content['widget_detail']= $string;
		echo  json_encode($widget_content);
		
	
	}
	
	public function get_shorten_url(){
		$article_url  = $_POST['article_url'];
		$bitly        = getSmallLink($article_url); 
		$value['id']  = $bitly['id'];
		$value['msg'] = $bitly['msg'];
		echo json_encode($value);
	}
	
	public function getLivenowContentStatic(){
		
		$articleId=$this->input->post('article_id');
		$articleurl=$this->input->post('article_url');
		$image_url=$this->input->post('image_url');
		$image_url=($image_url=='')?image_url.imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg':$this->input->post('image_url');
		$FileName= $articleId.'.json';
		$path=FCPATH.'application/views/LIVENOW/';
		$Result=file_get_contents($path.$FileName);
		$Result=json_decode($Result,true);
		$Result=array_reverse($Result['details']);
		$i=0;
		$Template='';
		$pinTemplate='';
		foreach($Result as $Data):
			if($Data['status']==1):
			$Date=explode(' ',$Data['date']);
			$Date=explode(':',$Date[1]);
			$Date=$Date[0].':'.$Date[1];
			$Time=strtotime($Data['date']);
			$Time=Date('M j',$Time);
			
			if(isset($Data['pin']) && $Data['pin']=='1'){
				$pinTemplate .='<div style="box-shadow: 0px 2px 6px 2px #00000096;" class="live-inner-content lid_'.$i.'">';
				$pinTemplate .='<span class="livenow-title">'.$Date.' '.$Time.' <i class="fa fa-thumb-tack" aria-hidden="true"></i></span>';
				$pinTemplate .='<div class="livenow-socialicons"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.$articleurl.'&title='.$Data['title'].'&picture='.$image_url.'"><i class="fa fa-facebook" aria-hidden="true"></i></a><a target="_blank" href="https://twitter.com/intent/tweet?text='.$Data['title'].$articleurl.' via @DINAMANI"><i class="fa fa-twitter" aria-hidden="true"></i></a><a class="whatsapp1" style="padding:0;"  data-link="'.$articleurl.'" data-txt="'.$Data['title'].'" data-count="true"><i class="fa fa-whatsapp fa_social"></i></a></div>';
				if($Data['title']!=''):
					$pinTemplate .='<h3 class="livenow_h3">'.$Data['title'].'</h3>';
				endif;
				$pinTemplate .='<div class="livenow-description">'.$Data['content'].'</div>';
				$pinTemplate .='<input type="hidden" id="l_'.$i.'" value="'.$i.'">';
				//$Template .='<hr class="livenow-hr">';
				$pinTemplate .='</div>'; 
			}else{
				$Template .='<div class="live-inner-content lid_'.$i.'">';
				$Template .='<span class="livenow-title">'.$Date.' '.$Time.' </span>';
				$Template .='<div class="livenow-socialicons"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.$articleurl.'&title='.$Data['title'].'&picture='.$image_url.'"><i class="fa fa-facebook" aria-hidden="true"></i></a><a target="_blank" href="https://twitter.com/intent/tweet?text='.$Data['title'].$articleurl.' via @DINAMANI"><i class="fa fa-twitter" aria-hidden="true"></i></a><a class="whatsapp1" style="padding:0;"  data-link="'.$articleurl.'" data-txt="'.$Data['title'].'" data-count="true"><i class="fa fa-whatsapp fa_social"></i></a></div>';
				if($Data['title']!=''):
					$Template .='<h3 class="livenow_h3">'.$Data['title'].'</h3>';
				endif;
				$Template .='<div class="livenow-description">'.$Data['content'].'</div>';
				$Template .='<input type="hidden" id="l_'.$i.'" value="'.$i.'">';
				//$Template .='<hr class="livenow-hr">';
				$Template .='</div>'; 
			}
			endif;
			$i++;
		endforeach;
		echo $pinTemplate.$Template;
	}
	
	public function external_api(){
		$url = $this->input->post('url').'?t='.rand(10,10000);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 40);
		$Result = curl_exec($ch);
		$error=curl_error($ch);
		curl_close($ch);
		echo $Result;
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
	  
       $this->widget_model->update_most_hits_and_emailed('E', $content_type, $content_id, $share_content, $section_id, '');
	   
	    $insert_array = array(
							"content_id"	=> $content_id,
							"content_type" 	=> $content_type,
							"name"			=> addslashes($name),
							"from_email"	=> addslashes($share_email),
							"to_email"		=> addslashes($refer_email),
							"message"  		=> addslashes($message)
							);
	   
	   $this->widget_model->insert_share_email_details($insert_array);
	   
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
				$widget_instance_contents 	= $this->widget_model->get_widgetInstancearticles_rendering($widgetinstanceid, $section_id ,$mode,$max_article);
				if (function_exists('array_column')) 
					{
						$get_content_ids = array_column($widget_instance_contents, 'content_id'); 
					}
					else
					{
						$get_content_ids = array_map( function($element) { return $element['content_id']; }, $widget_instance_contents);
					}
					$get_content_ids = implode("," ,$get_content_ids); 
				$widget_contents = array();
				if($get_content_ids!='')
				{
					$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, $is_home, $mode);	
					foreach ($widget_instance_contents as $key => $value) {
						foreach ($widget_instance_contents1 as $key1 => $value1) {
							if($value['content_id']==$value1['content_id']){
								$widget_contents[] = array_merge($value, $value1);
							}
						}
					}
				}
			}
			else
			{
				$content_type= 1;
				$widget_instance_contents = $this->widget_model->get_all_available_articles_auto($max_article, $section_id ,$content_type, $mode, $is_home);
				if($mode=="live"){
				$widget_instance_contents = $this->widget_model->get_all_available_articles_auto($max_article, $section_id ,$content_type, $mode, $is_home);
				 }else{
					 $widget_instance_contents = $this->widget_model->get_all_available_articles_auto($max_article, $section_id ,$content_type, $mode, $is_home);
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
							$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, $is_home, $mode);
							foreach ($widget_instance_contents as $key => $value) {
								foreach ($widget_instance_contents1 as $key1 => $value1) {
									if($value['content_id']==$value1['content_id']){
										$widget_contents[] = array_merge($value, $value1);
									}
								}
							}
						 } 
				 }
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
			
		if ($original_image_path!='' && get_image_source($original_image_path, 1))
			{
			$imagedetails = get_image_source($original_image_path, 2);
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
		$live_article_url = $domain_name.$content_url.$param;
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
	/*	$custom_summary = '';
		if($rendermode == "manual")
		 {
			$custom_summary = $get_content['CustomSummary'];
		 }
		if( $custom_summary == '' && $rendermode== "auto")
		{
		$custom_summary =  $get_content['summary_html'];
		}
		$summary  = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$custom_summary);  //to remove first<p> and last</p> 
		*/
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
		$show_simple_tab = '';
		if( isset($section_id)!='' && isset($section_id)!=0 )
		{
			$domain_name	 	= base_url();
			$content_type		= 1;
			$widget_contents 	= array();
			if($rendermode == "manual")
			{
				$widget_instance_contents 	= $this->widget_model->get_widgetInstancearticles_rendering($widgetinstanceid, $section_id ,$mode,$max_article); 

				if (function_exists('array_column')) {
			$get_content_ids = array_column($widget_instance_contents, 'content_id'); 
				}else {
			$get_content_ids = array_map( function($element) { return $element['content_id']; }, $widget_instance_contents);
				} 
				$get_content_ids = implode("," ,$get_content_ids);

				if($get_content_ids!='')
				{
					$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, $is_home, $mode);	
					
						foreach ($widget_instance_contents as $key => $value) {
							foreach ($widget_instance_contents1 as $key1 => $value1) {
								if($value['content_id']==$value1['content_id']){
								   $widget_contents[] = array_merge($value, $value1);
								}
							}
						}
				}
				
			}
			else
			{
				//$widget_instance_contents = $this->widget_model->get_all_available_articles_auto($max_article, $section_id ,$content_type, $mode);
				
				if($mode=="live"){
					$widget_contents = $this->widget_model->get_all_available_articles_auto($max_article, $section_id , $content_type ,  $mode, $is_home);
				} else {
					$widget_instance_contents = $this->widget_model->get_all_available_articles_auto($max_article, $section_id , $content_type ,  $mode, $is_home);
					if (function_exists('array_column')) {
						$get_content_ids = array_column($widget_instance_contents, 'content_id'); 
					} else {
						$get_content_ids = array_map( function($element) { return $element['content_id']; }, $widget_instance_contents);
					}
					$get_content_ids = implode("," ,$get_content_ids); 
					if($get_content_ids!='')
					{
						$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, $is_home, $mode);
						foreach ($widget_instance_contents as $key => $value) {
							foreach ($widget_instance_contents1 as $key1 => $value1) {
								if($value['content_id']==$value1['content_id']){
									$widget_contents[] = array_merge($value, $value1);
								}
							}
						}
					 }
				}
			}
			
			$sutrulla_css = ($widget_type!= "suttrula") ? "sutrulla-tour" : "";
			$show_simple_tab .='<div>';
			$show_simple_tab .='<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="tour-line '.$sutrulla_css.'">';
			
			$i =1; $w = 1;
if(count($widget_contents)>0)  {				

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
			
		if ($original_image_path!='' && get_image_source($original_image_path, 1))
			{
			$imagedetails = get_image_source($original_image_path, 2);
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
		
		$sectionURL = $domain_name.$tab_url;
		
		$param = $param;
		$live_article_url = $domain_name.$content_url.$param;
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
		
		if( $custom_summary == '' && $rendermode=="auto")
			$custom_summary =  $get_content['summary_html'];
				
		$summary  = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$custom_summary);  //to remove first<p> and last</p>  tag
		
		$summary  = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$summary);   //to remove first<p> and last</p>  tag
		$type_of_widget = $widget_type;
		// display title and summary block starts here
	if($type_of_widget== "suttrula"){
		if($i == 1)
		{
		$show_simple_tab .= '<div class="col-lg-4 col-md-6 col-sm-4 col-xs-12  tour">
		<a href="'.$live_article_url.'" class="article_click" >
		<figure><img src="'.$show_image.'" title = "'.$imagetitle.'" alt = "'.$imagealt.'"></figure>
		</a>
		</div>
		<figcaption class="col-lg-4 col-md-6 col-sm-4 col-xs-12  tour1">';
		$show_simple_tab .='<h4>'.$display_title.'</h4>';
		
		if($summary_option == 1)
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
		} 
	}else
	{
		if($i==1){
		$show_simple_tab.= '<div class="clear_both">';
		}
		$show_simple_tab .= '<div class="col-lg-4 col-md-6 col-sm-4 col-xs-12  tour">
		<a href="'.$live_article_url.'" class="article_click" >
		<figure><img src="'.$show_image.'" title = "'.$imagetitle.'" alt = "'.$imagealt.'"></figure>
		</a><figcaption class="tour1">';
		$show_simple_tab .='<h4>'.$display_title.'</h4>';
		if($summary_option == 1)
		$show_simple_tab .= '<p>'.$summary.'</p>';
		$show_simple_tab .= '</figcaption></div>';
		if($i==3 || $w == count($widget_contents)){
		$show_simple_tab.= '</div>';
		$i = 0;
		}
		
	}
		
		if($w == count($widget_contents))
		{
		$show_simple_tab .='<div class="arrow">
			<a href="'.$sectionURL.'" class="landing-arrow"><div class="arrow-span"> </div><div class="arrow-rightnew"></div></a></div>';
		}
			
		//Widget design code block 1 starts here																
		//Widget design code block 1 starts here			
		$i = $i+1;
		$w = $w+1;							  
		}
	  //}
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
		$widget_contents = array();
		$content_type		= 1;
		if($rendermode == "manual")
		{
			$widget_instance_contents 	= $this->widget_model->get_widgetInstancearticles_rendering($widgetinstanceid, $tabid ,$mode,$max_article); 	
			if (function_exists('array_column')) {
				$get_content_ids = array_column($widget_instance_contents, 'content_id'); 
			}else {
				$get_content_ids = array_map( function($element) { return $element['content_id']; }, $widget_instance_contents);
			} 
			$get_content_ids = implode("," ,$get_content_ids);
			if($get_content_ids!='')
			{
				$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, $is_home, $mode);	
					foreach ($widget_instance_contents as $key => $value) {
						foreach ($widget_instance_contents1 as $key1 => $value1) {
							if($value['content_id']==$value1['content_id']){
							   $widget_contents[] = array_merge($value, $value1);
							}
						}
					}
			}
					
		}
		else
		{
			// $widget_instance_contents = $this->widget_model->get_all_available_articles_auto($max_article, $tabid ,$content_type, $mode);
			 if($mode=="live"){
				$widget_contents = $this->widget_model->get_all_available_articles_auto($max_article, $tabid , $content_type ,  $mode, $is_home);
			}else{
				$widget_instance_contents = $this->widget_model->get_all_available_articles_auto($max_article, $tabid , $content_type ,  $mode, $is_home);
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
						$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, $is_home, $mode);
						foreach ($widget_instance_contents as $key => $value) {
							foreach ($widget_instance_contents1 as $key1 => $value1) {
								if($value['content_id']==$value1['content_id']){
									$widget_contents[] = array_merge($value, $value1);
								}
							}
						}
					 }
			 }
		}
	
	
	$show_simple_tab = '';
	$show_simple_tab .='<div><div class="row">';
	$show_simple_tab .='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="outline">';

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
		if (get_image_source($Image600X390, 1) && $Image600X390 != '')
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
		
		$sectionURL = $domain_name.$tab_url;
		
		$param = $param;
		$live_article_url = $domain_name.$content_url.$param;
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
		if($_POST['rendermode']  == "manual")
		 {
			$custom_summary = $get_content['CustomSummary'];
		 }
		
		if( $custom_summary == '' && $_POST['rendermode'] =="auto")
		{
			$custom_summary =  $get_content['summary_html'];
		}
		
		$summary  = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$custom_summary);  //to remove first<p> and last</p>  tag
		
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
	
	}elseif($_POST['mode']=="adminview")
	{
		 $show_simple_tab .='<div class="margin-bottom-10">'.no_articles.'</div>';
	}
	$show_simple_tab .= '</div></div></div></div>';
	echo $show_simple_tab;							
    }

}

public function get_district_content(){
	extract($_POST);
	$domain_name = base_url();
	$widget_contents = array();
	$sectionPath = '';
	$widget_instancemainsection	= $this->widget_model->get_widget_mainsection_config_rendering('', $widgetInstanceID, $mode);
	foreach($widget_instancemainsection as $sectionList):
		if($sectionList['Section_ID']==$tab_id){
			$sectionPath =$domain_name.$sectionList['URLSectionStructure'];
		}
	endforeach;
	if($renderMode == "manual"){
		$content_type = $contentType;
		$widget_instance_contents = $this->widget_model->get_widgetInstancearticles_rendering($widgetInstanceID, $widgetInstanceMainID,$mode,$maxArticle );
		if (function_exists('array_column')){
			$get_content_ids = array_column($widget_instance_contents, 'content_id'); 
		}else{
			$get_content_ids = array_map( function($element) { return $element['content_id']; }, $widget_instance_contents);
		}
		$get_content_ids = implode("," ,$get_content_ids);
		if($get_content_ids!=''){
			$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, $isHome, $mode);	
			$widget_contents = array();
			foreach($widget_instance_contents as $key => $value){
				foreach($widget_instance_contents1 as $key1 => $value1){
					if($value['content_id']==$value1['content_id']){
						$widget_contents[] = array_merge($value, $value1);
					}
				}
			}
		}
	}else{
		$content_type = $contentType;
		if($mode=="live"){
			$widget_contents = $this->widget_model->get_all_available_articles_auto($maxArticle,$tab_id , $content_type ,  $mode, 'z');
		}else{
			$widget_instance_contents = $this->widget_model->get_all_available_articles_auto($maxArticle, $tab_id , $content_type ,  $mode, $isHome);
			if (function_exists('array_column')){
				$get_content_ids = array_column($widget_instance_contents, 'content_id'); 
			}else{
				$get_content_ids = array_map( function($element) { return $element['content_id']; }, $widget_instance_contents);
			}
			$get_content_ids = implode("," ,$get_content_ids);
			if($get_content_ids!=''){
				$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, $isHome, $mode);
				foreach($widget_instance_contents as $key => $value){
					foreach($widget_instance_contents1 as $key1 => $value1){
						if($value['content_id']==$value1['content_id']){
							$widget_contents[] = array_merge($value, $value1);
						}
					}
				}
			}
		}
	}
	$i=1;
	$count = 1;
	$show_simple_tab         = "";
	if(count($widget_contents)>0){
		foreach($widget_contents as $get_content){
			$original_image_path = "";
			$imagealt            = "";
			$imagetitle          = "";
			$custom_title        = "";
			$custom_summary      = "";  
			$summary      = "";
			if($renderMode == "manual"){
				if($get_content['custom_image_path'] != ''){
					$original_image_path = $get_content['custom_image_path'];
					$imagealt            = $get_content['custom_image_title'];	
					$imagetitle          = $get_content['custom_image_alt'];												
				}
				$custom_title   = $get_content['CustomTitle'];
				$custom_summary = $get_content['CustomSummary'];
			}
			if($original_image_path ==""){
				$original_image_path  = $get_content['ImagePhysicalPath'];
				$imagealt             = $get_content['ImageCaption'];	
				$imagetitle           = $get_content['ImageAlt'];	
			}
			$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X300.jpg';
			$dummy_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X300.jpg';
			if($original_image_path !='' && get_image_source($original_image_path, 1)){
				$imagedetails = get_image_source($original_image_path, 2);
				$imagewidth = $imagedetails[0];
				$imageheight = $imagedetails[1];
				if ($imageheight > $imagewidth){
					//$Image600X300 	= $original_image_path;
					$Image600X300 	= str_replace("original","w600X300", $original_image_path);
				}else{				
					$Image600X300 	= str_replace("original","w600X300", $original_image_path);
				}
				if ($Image600X300 != '' && get_image_source($Image600X300, 1)){
					$show_image = image_url. imagelibrary_image_path . $Image600X300;
				}					
			}
			$content_url = $get_content['url'];
			
			$param = $content['close_param'];
			$live_article_url = $domain_name. $content_url.$param;	
			$display_title = ( $custom_title != '') ? $custom_title : ( ($get_content['title'] != '') ? stripslashes($get_content['title']) : '' ) ;
			$display_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$display_title);
			$display_title = '<a  href="'.$live_article_url.'" class="article_click" >'.$display_title.'</a>';
			if($custom_summary == '' && $renderMode == "auto"){
				$custom_summary =  $get_content['summary_html'];
			}
			$summary  = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$custom_summary);
			if($count <= 6){
				if($count==1){
				$show_simple_tab.= '<div class="WidthFloat_L">'; 
				}
				$show_simple_tab.= '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">';
				$show_simple_tab.= '<a  href="'.$live_article_url.'" class="article_click"><img src="'.$show_image.'" data-src="'.$show_image.'" title = "'.$imagetitle.'" alt = "'.$imagealt.'"></a>';
				$show_simple_tab .='<h4 class="subtopic1">'.$display_title.'</h4>';
				if($summaryRequired== 1){
					$show_simple_tab.='<p class="summary">'.$summary.'</p>';
				}
				$show_simple_tab.= '</div>';
				if($count==6 ){
					$show_simple_tab.=  '</div>';
					$count=0;
	
				}
				if($i == count($widget_contents)){
					if($i%6!=0){
						$show_simple_tab .='</div>';
					} 
					$show_simple_tab.= '<div class="WidthFloat_L">';
					$show_simple_tab.= '<a style="margin-top: 4px;" class="vivasayam-arrow" href="'.$sectionPath.'">மேலும்  <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>';
					$show_simple_tab .='</div>';
				}
				$count ++;	
			}
			$i =$i+1;
		}
		
	}
	echo $show_simple_tab;
}

public function get_cinematab_content()
{
	
		extract($_POST);
	if(isset($tabid)!=''&& isset($tabid)!=0){
		
		$domain_name 	= base_url();
		$content_type	= $content_type;
		
		$widget_contents = array();
		if($rendermode == "manual") {
			$widget_instance_contents 	= $this->widget_model->get_widgetInstancearticles_rendering($widgetinstanceid, $tabid ,$mode,$max_article); 

			if (function_exists('array_column')) {
				$get_content_ids = array_column($widget_instance_contents, 'content_id'); 
			}else {
				$get_content_ids = array_map( function($element) { return $element['content_id']; }, $widget_instance_contents);
			} 
			$get_content_ids = implode("," ,$get_content_ids);
			
			if($get_content_ids!='')
			{
				$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, $is_home, $mode);	
			
					foreach ($widget_instance_contents as $key => $value) {
						foreach ($widget_instance_contents1 as $key1 => $value1) {
							if($value['content_id']==$value1['content_id']){
							   $widget_contents[] = array_merge($value, $value1);
							}
						}
					}
			}
			
		} else {
			// $widget_instance_contents = $this->widget_model->get_all_available_articles_auto($max_article, $tabid ,$content_type, $mode);
			
			  if($mode=="live"){
				$widget_contents = $this->widget_model->get_all_available_articles_auto($max_article, $tabid ,$content_type, $mode,$is_home);
				  }else{
					  $widget_instance_contents = $this->widget_model->get_all_available_articles_auto($max_article, $tabid ,$content_type, $mode,$is_home);
					if (function_exists('array_column')) {
						$get_content_ids = array_column($widget_instance_contents, 'content_id'); 
					} else {
						$get_content_ids = array_map( function($element) { return $element['content_id']; }, $widget_instance_contents);
					}
					$get_content_ids = implode("," ,$get_content_ids); 
					if($get_content_ids!='')
					{
						$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, $is_home, $mode);
						
						foreach ($widget_instance_contents as $key => $value) {
							foreach ($widget_instance_contents1 as $key1 => $value1) {
								if($value['content_id']==$value1['content_id']){
									$widget_contents[] = array_merge($value, $value1);
								}
							}
						}
					 }
				  }
		}

	$show_simple_tab = '';
	$show_simple_tab .='<div><div class="row">';
	$show_simple_tab .='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="cinema">';
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
				$summary             = "";
				$is_vertical         = false;
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
				
				if($original_image_path =="") // from cms || Live table    
				{
				$original_image_path  = $get_content['ImagePhysicalPath'];
				$imagealt             = $get_content['ImageCaption'];	
				$imagetitle           = $get_content['ImageAlt'];	
				}
				
				//$SourceURL = $content['widget_img_phy_path'];
				$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
				$dummy_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
				if($i==1){
				if($original_image_path !='' && get_image_source($original_image_path, 1))
				{
					$imagedetails = get_image_source($original_image_path, 2);
					$imagewidth = $imagedetails[0];
					$imageheight = $imagedetails[1];				
					if ($imageheight > $imagewidth)
					{
						$Image600X390 	= $original_image_path;
						$is_vertical    = true;
					}
					else
					{				
						$Image600X390 	= str_replace("original","w600X390", $original_image_path);
					}
					if (get_image_source($Image600X390, 1) && $Image600X390 != '')
					{
						$show_image = image_url. imagelibrary_image_path . $Image600X390;
					}
				}
		}
		else{
			$show_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_100X65.jpg';
			$dummy_image	= image_url. imagelibrary_image_path.'logo/dinamani_logo_100X65.jpg';
		    if($original_image_path !='' && get_image_source($original_image_path, 1))
				{
					$imagedetails = get_image_source($original_image_path, 2);
					$imagewidth = $imagedetails[0];
					$imageheight = $imagedetails[1];				
						$Image100X65 	= str_replace("original","w100X65", $original_image_path);
					if (get_image_source($Image100X65, 1) && $Image100X65 != '')
					{
						$show_image = image_url. imagelibrary_image_path . $Image100X65;
					}
				}
		}
		$content_url = $get_content['url'];
		$url_array = explode('/', $content_url);
		$get_seperation_count = count($url_array)-4;
		
		$sectionURL = $domain_name.$tab_url;
		
		$param = $param;
		$live_article_url = $domain_name.$content_url.$param;
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
			$summary =  $get_content['CustomSummary'];
		 }
		if( $custom_summary != '' && $rendermode == "auto")
		{
		$summary =  $get_content['summary_html'];
		}
		$summary  = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$summary);   //to remove first<p> and last</p>  tag
		
		// display title and summary block starts here
		if($i == 1)
				{
					$show_simple_tab .= '<article class="col-lg-6 col-md-6 col-sm-6 col-xs-12   cinema-padd">';
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
					$show_image = ($is_vertical)? str_replace("original", "w600X390", $show_image) : $show_image;
					if($i == 2)
					{
						$show_simple_tab .='<article class="col-lg-6 col-md-6 col-sm-6 col-xs-12 cinema-list"><ul>';
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
	//}
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
	if($_POST){
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
	$menu_count = ($_POST['menu_type']=="main")? 3 : 2;
	if($get_content_ids!='')
	{
	$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database($get_content_ids, $content_type, "n", $view_mode);	
	
	$widget_contents = array();
		foreach ($widget_instance_contents as $key => $value) {
			foreach ($widget_instance_contents1 as $key1 => $value1) {
				if($value['content_id']==$value1['content_id']){
			       $widget_contents[] = array_merge($value1, $value);
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
				if (get_image_source($Image600X390, 1) && $Image600X390 != '')
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
				if (get_image_source($Image600X390, 1) && $Image600X390 != '')
				{
					$show_image = image_url. imagelibrary_image_path . $Image600X390;
				}
			}
		
			$content_url = $get_content['url'];  //article url
			$param = '';//$_POST['param']; //page parameter
			$domain_name =  base_url();
			$live_article_url = $domain_name.$content_url.$param;
				
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

	if($count<=$menu_count && $show_image!=''){
	
	   $show_simple_tab .='<div class="MultiImageContent">';
		 $show_simple_tab .='<a  href="'.$live_article_url.'" class="article_click">';
		$show_simple_tab .='<img src="'.$show_image.'"  title = "'.$imagetitle.'" alt = "'.$imagealt.'"></a>
	 '.$display_title.'</div>';
	
	$count++;
	}
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
		 $param = $this->input->get('param'); //page parameter
		 $domain_name =  base_url();
		 $live_article_url = $domain_name.$content_url.$param;
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
  
  if($type == 'most_read') {
	  $time_mostread  = strtotime($time_mostread) - strtotime('today');
	  $most_read_articles = $this->widget_model->get_content_by_hit_count($time_mostread,$mostread_limit);
  } 
  else if($type == 'most_comments') {
	   $time_mostread  = 1;
	  $most_read_articles = $this->widget_model->get_content_by_most_commented($time_mostread,$mostread_limit); 
  }else {
	   $time_mostread  = 1;
	  $most_read_articles = $this->widget_model->get_content_by_email_count($time_mostread,$mostread_limit); 
	  
  }
  
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
  
  public function getMostReadContent(){
  $domain_name =  base_url();
  $type        = $this->input->get('type');
  $view_mode   = $this->input->get('mode');
  
	$get_time       = $this->widget_model->select_setting($view_mode);
	$time_mostread  = $get_time['timeintervalformostreadarticle'];
	$mostread_limit = $get_time['articlecountformostreadnow'];
  
  if($type == 'most_read') {
	  $time_mostread  = strtotime($time_mostread) - strtotime('today');
	  $most_read_articles = $this->widget_model->get_content_by_hit_count($time_mostread,$mostread_limit);
  } 
  else if($type == 'most_comments') {
	   $time_mostread  = 1;
	  $most_read_articles = $this->widget_model->get_content_by_most_commented($time_mostread,$mostread_limit); 
  }else {
	   $time_mostread  = 1;
	  $most_read_articles = $this->widget_model->get_content_by_email_count($time_mostread,$mostread_limit); 
	  
  }
  
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
							$num=1;
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
						  if($num==6 && strrpos($this->input->get('is_home'),".html")!=false){
							 echo "<li><div class=\"scc\"><span class=\"scc-span\">ADVERTISEMENT</span><div class=\"scc-div\"><!-- GPT AdSlot 4 for Ad unit 'DNM_Desktop_AP_MID_RHS_300x250' ### Size: [[300,250]] --><div id='div-gpt-ad-3788216-4'><script>googletag.cmd.push(function() { googletag.display('div-gpt-ad-3788216-4'); });</script></div><!-- End AdSlot 4 --></div></div></li>"; 
						  }
						  echo '<li>
							<p class="num">'.$num.'</p>
							<p><a href="'.$live_article_url.'" class="article_click" >'.$display_title.'</a></p>
						  </li>';
							$num++;
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
			$Natchatram = $panchangam['Natchatram'];
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
							 <p class="rasi-time color-red">நல்ல நேரம்</p>
							 <table>
                            <tr>
                            <td><span class="padding-left-10">காலை</span></td>
                            <td>:</td>
                            <td>'. @$nalla_nearm_kalai.'</td>
                            </tr>
                            <tr>
                            <td><span class="padding-left-10">மாலை   </span></td>
                            <td>:</td>
                            <td>'. @$nalla_nearm_malai.'</td>
                            </tr>
                            <tr>
                            <td><span class="color-red">ராகு காலம்</span></td>
                            <td>:</td>
                            <td>'. @$raagu_kaalam.'</td>
                            </tr>
                            <tr>
                            <td><span class="color-red">எமகண்டம்</span></td>
                            <td>:</td>
                            <td>'. @$yemmakandam.'</td>
                            </tr>
                            <tr>
                            <td><span class="color-red">குளிகை</span></td>
                            <td>:</td>
                            <td>'. @$kuligai.'</td>
                            </tr>
                            </table>';
                     // $Content .='<p class="thithi"><span class="color-red">திதி: </span>'. @$thithi.'</p>';
                     // $Content .='<p class="thithi"><span class="color-red">நட்சத்திரம்: </span>'. @$Natchatram.'</p>';
                     // $Content .='<p class="natchatram"><span class="color-red">சந்திராஷ்டமம்: </span>'. @$chandrashtam.'</p>';
                      $Content .='<table class="margin-top-10">';
                      $Content .='<tr><td><span class="color-red">திதி</span></td><td>:</td><td>'. @$thithi.'</td></tr>';
                      $Content .='<tr><td><span class="color-red">நட்சத்திரம்</span></td><td>:</td><td>'. @$Natchatram.'</td></tr>';
                      $Content .='<tr><td><span class="color-red">சந்திராஷ்டமம்</span></td><td>:</td><td>'. @$chandrashtam.'</td></tr>';
                      $Content .='</table>';
							
							
                       $Content .=' </div>
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
  
  public function getPanchangamDetails(){
	$Content ='';
	$panchangam_manager = $this->db->query('CALL get_panchangamFP()')->result_array(); 
	foreach($panchangam_manager as $panchangam){
		$tamil_day = $panchangam['Tamilday'];
		$tamil_year_month=  $panchangam['Tamilyearandmonth'];
		$nalla_nearm_kalai = $panchangam['NallaNeramKalai'];
		$nalla_nearm_malai = $panchangam['NallaNeramMalai'];
		$raagu_kaalam = $panchangam['RaaguKaalam'];
		$yemmakandam = $panchangam['Yemmakandam'];
		$kuligai = $panchangam['Kuligai'];
		$thithi = $panchangam['Thithi'];
		$Natchatram = $panchangam['Natchatram'];
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
		$Content .='<div class="panchangam-heading">';
		$Content .='<p><span>'.@$current_date.' '.$month_tamil.' '.$current_year.', </span><span>'.@$tamil_year_month.'</span></p>';
		$Content .='</div>';
		
		$Content .='<div class="panchangam-footer">';
		$Content .='<table border="1">';
		$Content .='<tbody>';
		
		$Content .='<tr><td>';
		$Content .='<p><span>கிழமை :  </span>'.@$tamil_day.' </p>';
		$Content .='</td>';
		$Content .='<td colspan="2">';
		$Content .='<p style="float: left"><span>நல்ல நேரம் (காலை) :  </span>'.@$nalla_nearm_kalai.' <span>(மாலை) :  </span>'.@$nalla_nearm_malai.' </p>';
		$Content .='</td></tr>';
		
		$Content .='<tr><td>';
		$Content .='<p><span>ராகு காலம் :  </span>'.@$raagu_kaalam.' </p>';
		$Content .='</td>';
		$Content .='<td>';
		$Content .='<p><span>எமகண்டம் :  </span>'.@$yemmakandam.' </p>';
		$Content .='</td>';
		$Content .='<td>';
		$Content .='<p><span>குளிகை :  </span>'.@$kuligai.' </p>';
		$Content .='</td></tr>';
		
		$Content .='<tr><td>';
		$Content .='<p><span>திதி :  </span>'.@$thithi.' </p>';
		$Content .='</td>';
		$Content .='<td>';
		$Content .='<p><span>நட்சத்திரம் :  </span>'.@$Natchatram.' </p>';
		$Content .='</td>';
		$Content .='<td>';
		$Content .='<p><span>சந்திராஷ்டமம் :  </span>'.@$chandrashtam.' </p>';
		$Content .='</td>';
		$Content .='</td></tr>';
		
		$Content .='</tbody>';
		$Content .='</table>';
		$Content .='</div>';
		
		
		$Content .='<div class="panchangam-content">';
		$Content .='<div class="row margin-top-10">';
		$Content .='<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><div class="zodiac-item"><img alt="mesham" data-src="'.image_url.'images/panjangam/mesham.jpg" src="'.image_url.'images/panjangam/lazy.jpg"><p>'.@$mesham.'</p></div></div>';
		$Content .='<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><div class="zodiac-item"><img alt="rishabam" data-src="'.image_url.'images/panjangam/rishbam.jpg" src="'.image_url.'images/panjangam/lazy.jpg"><p>'.@$rishabam.'</p></div></div>';
		$Content .='<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><div class="zodiac-item"><img alt="midhunam" data-src="'.image_url.'images/panjangam/mithunam.jpg" src="'.image_url.'images/panjangam/lazy.jpg"><p>'.@$midhunam.'</p></div></div>';
		$Content .='<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><div class="zodiac-item"><img alt="kadagam" data-src="'.image_url.'images/panjangam/kadagan.jpg" src="'.image_url.'images/panjangam/lazy.jpg"><p>'.@$kadagam.'</p></div></div>';
		$Content .='<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><div class="zodiac-item"><img alt="simmam" data-src="'.image_url.'images/panjangam/simmam.jpg" src="'.image_url.'images/panjangam/lazy.jpg"><p>'.@$simmam.'</p></div></div>';
		$Content .='<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><div class="zodiac-item"><img alt="kanni" data-src="'.image_url.'images/panjangam/kanni.jpg" src="'.image_url.'images/panjangam/lazy.jpg"><p>'.@$kanni.'</p></div></div>';
		$Content .='</div>';
		$Content .='<div class="row margin-bottom-10">';
		$Content .='<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><div class="zodiac-item"><img alt="thulam" data-src="'.image_url.'images/panjangam/dhulam.jpg" src="'.image_url.'images/panjangam/lazy.jpg"><p>'.@$thulam.'</p></div></div>';
		$Content .='<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><div class="zodiac-item"><img alt="viruchigam" data-src="'.image_url.'images/panjangam/viruchagam.jpg" src="'.image_url.'images/panjangam/lazy.jpg"><p>'.@$viruchigam.'</p></div></div>';
		$Content .='<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><div class="zodiac-item"><img alt="danusu" data-src="'.image_url.'images/panjangam/dhanusu.jpg" src="'.image_url.'images/panjangam/lazy.jpg"><p>'.@$danusu.'</p></div></div>';
		$Content .='<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><div class="zodiac-item"><img alt="magaram" data-src="'.image_url.'images/panjangam/magaram.jpg" src="'.image_url.'images/panjangam/lazy.jpg"><p>'.@$magaram.'</p></div></div>';
		$Content .='<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><div class="zodiac-item"><img alt="kumbam" data-src="'.image_url.'images/panjangam/kumbam.jpg" src="'.image_url.'images/panjangam/lazy.jpg"><p>'.@$kumbam.'</p></div></div>';
		$Content .='<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><div class="zodiac-item"><img alt="meenam" data-src="'.image_url.'images/panjangam/meenam.jpg" src="'.image_url.'images/panjangam/lazy.jpg"><p>'.@$meenam.'</p></div></div>';
		$Content .='</div>';
		$Content .='</div>';
		$Content .='</div>';
		
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
	  $domain_name     = base_url();
	  $email_count_update_for = $this->input->post('update_emailed_count');
	  $content_id      = $this->input->post('content_id');
	  $content_type_id = $this->input->post('content_type_id');
	  if($email_count_update_for== "article"){
	  $view_mode       = ($this->input->post('content_from')=="preview")? "adminview": "live";
	  $title           = addslashes($this->input->post('title'));
	  $section_id      = $this->input->post('section_id');
	  $page_param      = '';//$this->input->post('page_param');
	  $content_created_on = $this->input->post('article_created');
	  $section_structure = $this->input->post('section_structure');
	  $recent_article_show = (strrpos($section_structure, "cartoon")!= false)? false: true;  
	                       /* --------- increase hits in content_hit_history -------------*/ 
	  $this->widget_model->update_most_hits_and_emailed('H' , $content_type_id,  $content_id, $title, $section_id, $content_created_on);
      $this->widget_model->update_trending_read_hits($content_id, $content_type_id);
	                     /* ------------------------ end hits adding ------------------- */
						 
						  /* ------------------------ Get Recent Article ------------------- */
	$show_recent_article = "No_News";
	if($recent_article_show){
	$recent_articles = $this->widget_model->get_section_article_for_common_widgets($section_id, $view_mode, 5); // last parammeter indicates Recent related articles
	if(count($recent_articles)>0)
	{
	if (function_exists('array_column')) 
		{
	$get_content_ids = array_column($recent_articles, 'content_id'); 
		}else
		{
	$get_content_ids = array_map( function($element) { return $element['content_id']; }, $recent_articles);
		}
		shuffle($get_content_ids);
	$get_content_id = array_rand($get_content_ids, 2);
	if (function_exists('array_column')) 
		{
	$get_content_types = array_column($recent_articles, 'content_type'); 
		}else
		{
	$get_content_types = array_map( function($element) { return $element['content_type']; }, $recent_articles);
		}
	$content_type = $get_content_types[0];
	$article_id   = $get_content_ids[$get_content_id[0]];
	if($article_id!='')
	{
	$widget_instance_contents1 = $this->widget_model->get_contentdetails_from_database($article_id, $content_type, "n", $view_mode);	
	
	$widget_contents = array();
		foreach ($recent_articles as $key => $value) {
			foreach ($widget_instance_contents1 as $key1 => $value1) {
				if($value['content_id']==$value1['content_id']){
			       $widget_contents[] = array_merge($value1, $value);
				}
			}
		}
	}
	if(count($widget_contents)>0)
		     {				
 		foreach($widget_contents as $get_content)
		{
	        $content_type = $get_content['content_type'];
			$original_image_path            = $get_content['image_path'];
			$image_alt                      = $get_content['image_alt'];
			$image_title                    = $get_content['image_caption'];
			$custom_title                   = stripslashes($get_content['CustomTitle']);
			$custom_summary                 = stripslashes($get_content['CustomSummary']);
			if($original_image_path=='')
			{
						
			   $original_image_path  = $get_content['ImagePhysicalPath'];
			   $image_alt             = $get_content['ImageCaption'];	
			   $image_title           = $get_content['ImageAlt'];	
			}
			
			if($original_image_path!= '' && getimagesize(image_url_no . imagelibrary_image_path .$original_image_path))
			{
				$Image600X300 	= str_replace("original","w600X300", $original_image_path);
				if (getimagesize(image_url_no . imagelibrary_image_path . $Image600X300) && $Image600X300 != '')
				{
					$recent_article_img = image_url. imagelibrary_image_path . $Image600X300;
				}else{
					$recent_article_img	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X300.jpg';
					}
			   }else{
					$recent_article_img	= image_url. imagelibrary_image_path.'logo/dinamani_logo_600X300.jpg';
					}			
$content_url         = $get_content['url'];
$param               = $page_param; //page parameter
$recent_string_value = $domain_name. $content_url.$param;

if( $custom_title == '')
{
	$custom_title = stripslashes($get_content['title']);
}	
$display_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$custom_title);   //to remove first<p> and last</p>  tag
if( $custom_summary == '')
{
	$custom_summary = stripslashes($get_content['summary_html']);
}	
$custom_summary = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$custom_summary);   //to remove first<p> and last</p>  tag
$section_name   = $get_content['section_name'];
$recent_text    = ($content_type==3)? "புகைப்படங்கள்" : (($content_type==4)? "வீடியோக்கள்": (($content_type==5)? "ஆடியோக்கள்" : "செய்திகள்" ));
$recent_text = '';
$show_recent_article = '<div id="slidebox" class="slide-box"> <i class="fa fa-times slide-close"></i>';
 $show_recent_article.='<h4 class=" article-recent">'.$section_name.' '.$recent_text.' - '.'இப்பிரிவில் மேலும்...'.'</h4>';
  $show_recent_article.='<div class="slide-headlines"> <img src="'.$recent_article_img.'" title="'.$image_title.'" alt="'.$image_alt.'" />
    <h4 class="subtopic"><a href="'.$recent_string_value.'">'.$display_title.'</a></h4>';
    $show_recent_article.='<div class="slider-lead">
      '.mb_substr($custom_summary, 0, 150).'
      <a href="'.$recent_string_value.'"><span class="arrows SiteColor">மேலும் வாசிக்க  <i class="fa fa-angle-double-right"></i> </span></a> </div>
  </div>
</div>';
//echo $show_recent_article;
		}
			 }
	}else{
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

$recent_string_value = $domain_name.$recent_article['url'].$page_param;
if (getimagesize(image_url_no . imagelibrary_image_path . $img_path) && $img_path != '')
{
$recent_article_img = image_url. imagelibrary_image_path.$img_path;	
}else{
$recent_article_img = image_url. imagelibrary_image_path.'logo/dinamani_logo_600X300.jpg';
}
$show_recent_article = '<div id="slidebox" class="slide-box"> <i class="fa fa-times slide-close"></i>';
$recent_text = '';
 $show_recent_article.='<h4 class=" article-recent">'.$recent_article['section_name'].' '.$recent_text.' - '.'இப்பிரிவில் மேலும்...'.'</h4>';
  $show_recent_article.='<div class="slide-headlines"> <img src="'.$recent_article_img.'" title="'.$img_title.'" alt="'.$img_alt.'" />
    <h4 class="subtopic"><a href="'.$recent_string_value.'">'.$recent_article['title'].'</a></h4>';
    $show_recent_article.='<div class="slider-lead">
      '.mb_substr($recent_article['summary_html'], 0, 150).'
      <a href="'.$recent_string_value.'"><span class="arrows SiteColor">மேலும் வாசிக்க <i class="fa fa-angle-double-right"></i> </span></a> </div>
  </div>
</div>';
//echo $show_recent_article;
}
	}
}
$return_value['recent_news'] = $show_recent_article;
}
$hit_value = $this->widget_model->get_hit_for_content_by_id($content_id, $content_type_id);  
$return_value['emailed']     = (count($hit_value)>0)? $hit_value['emailed']: 0 ; 
echo json_encode($return_value);
						  
						    /* ------------------------ Get Recent Article END------------------- */
						  
						 
						 
  }
  
  public function subscribe_newsletter()
  {
	$email  = $this->input->post('email_newsletter');
	$result =  $this->widget_model->insert_subscribed_email($email);
	if($result!=0)
	{
		echo "உங்கள் மின்னஞ்சல் எங்கள் செய்திமடல் சேவையில்  சந்தா செய்யப்பட்டுள்ளது..";
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
		echo "மின்னஞ்சல் முகவரி ஏற்கனவே பதிவு செய்யப்பட்டுள்ளது!";exit;
	}
	 	  
  }
  
  public function get_image_gallery_list()
  {
	  extract($_POST);
	  $gallery_details = $this->widget_model->get_gallery_image_data($content_id, $view_mode);
	$gallery_url     = $this->widget_model->get_contentdetails_from_database($content_id, 3, "n", $view_mode);	
	$content_url     = @$gallery_url[0]['url'];
		$param            = $param;
		$live_article_url = base_url().$content_url.$param;

		$show_simple_tab = '';
		krsort($gallery_details);
		foreach($gallery_details as $gallery_list){
			$original_image_path  = $gallery_list['ImagePhysicalPath'];
			$imagealt             = $gallery_list['ImageCaption'];	
			$imagetitle           = $gallery_list['ImageAlt'];	
		
			if(get_image_source($original_image_path, 1) && $original_image_path != '')
			{			
				$Image600X390   = "";
				$Image600X390 	= str_replace("original","w600X390", $original_image_path);
			
				if ( $Image600X390 != '' && get_image_source($Image600X390, 1))
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
			$show_simple_tab .= '<a href="'.$live_article_url.'"><img u="image" src="'.$show_image.'" title = "'.$imagetitle.'" alt = "'.$imagealt.'"></a>';
			$show_simple_tab .= '<img u="thumb" src="'.$show_image.'" title = "'.$imagetitle.'" alt = "'.$imagealt.'">';
			$show_simple_tab .= '</div>';

	}
            echo $show_simple_tab;
  }
  
  	 public function get_breaking_news_content()
	 {
			$view_mode = $this->input->get('mode');
			$param = $this->input->get('param');
			$breaking_news = $this->widget_model->get_widget_breakingNews_content($view_mode);
			
			$scroll_speed = $this->widget_model->select_setting($view_mode);
			$news = "";
			$domain_name =  base_url();
			foreach($breaking_news as $news_content)
			{
				$news_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $news_content['Title']);   //to remove first<p> and last</p>  tag
				if($news_content['Content_ID'] != '')
				{
					$content_type = $this->input->get('type');
					$is_home = $this->input->get('is_home');
					if($view_mode=='live'){
					$content_details = $this->widget_model->get_contentdetails_from_database($news_content['Content_ID'], $content_type,$is_home,$view_mode);
					$content_url = $content_details[0]['url'];
					}else{
					$content_url = $news_content['url'];
					}
					$live_article_url = $domain_name.$content_url.$param;					
					$news_content = '<a  href="'.$live_article_url.'" class="article_click"  >'.$news_title.'</a>';
				}
				else
				{
					$news_content = $news_title;
				}
				
				$news .=  '<div><p>'.$news_content.'</p></div>';
			}		
             $scroll_amount = ($scroll_speed['breakingNews_scrollSpeed'] != "" && $scroll_speed['breakingNews_scrollSpeed'] != 0) ?  $scroll_speed['breakingNews_scrollSpeed']*1000 : 5*1000 ;  
			 			
			if(count($breaking_news)>0){
				 $value['news']= $news;
				 $value['scroll_amount']= $scroll_amount;
			}else{
			     $value['news']= "no_news";
				 $value['scroll_amount']= $scroll_amount;

			}
			echo json_encode($value);

	 }

	 public function get_breaking_news_contents()
	 {
			$view_mode = $this->input->post('mode');
			$param = $this->input->post('param');
			$breaking_news = $this->widget_model->get_widget_breakingNews_contents($view_mode);	
		//	print_r($breaking_news);
			$news = "";
			$domain_name =  base_url();
			foreach($breaking_news as $news_content)
			{
				$news_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $news_content['Title']);   //to remove first<p> and last</p>  tag
				$news_published_time = $this->widget_model->time2string($news_content['Modifiedon']);
				if($news_content['Content_ID'] != '')
				{
					$content_type = $this->input->post('type');
					$is_home = $this->input->post('is_home');
					if($view_mode=='live'){
					$content_details = $this->widget_model->get_contentdetails_from_database($news_content['Content_ID'], $content_type,$is_home,$view_mode);
					$content_url = $content_details[0]['url'];
					}else{
					$content_url = $news_content['url'];
					}
					$live_article_url = $domain_name.$content_url.$param;					
					//$news_content = '<li class="marqueeinnercontent"><a  href="'.$live_article_url.'" class="article_click"  >'.$news_title.'</a><p><i class="fa fa-clock-o" aria-hidden="true"></i> '.$news_published_time.'</p></li>';
					$news_content = '<li><a style="color:#fff;font-weight:700;" href="'.$live_article_url.'" class="article_click"  >'.$news_title.'</a> <img src="'.image_url.'images/FrontEnd/images/breakborder.png"></li>';
				}
				else
				{
					//$news_content = '<li class="marqueeinnercontent">'.$news_title.'<p><i class="fa fa-clock-o" aria-hidden="true"></i> '.$news_published_time.'</p></li>';
					$news_content = '<li style="color:#fff;">'.$news_title.' <img src="'.image_url.'images/FrontEnd/images/breakborder.png"></li>';
				}
				
				$news .=  $news_content;
			}	
			echo $news;			
          

	 }
	 
}
?>