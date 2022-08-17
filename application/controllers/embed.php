<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class embed extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function chart($widgetInstanceId=''){
		$widgetInstanceId = base64_decode($widgetInstanceId);
		$filename = $widgetInstanceId.'.json';
		$filepath = FCPATH.'application/views/piechart/';
		if(file_exists($filepath.$filename)){
			$response = [];
			$response['error'] = false;
			$response['wid'] = $widgetInstanceId;
			$this->load->view('admin/embed_chart',$response);
		}else{
			$this->load->view('admin/embed_chart',['error'=>true , 'wid'=>$widgetInstanceId]);
		}
	}
	
	public function table($tableid ,$source=''){
		$tid = (int) base64_decode(trim($tableid));
		if($tid!='' && is_numeric($tid)){
			$response =[];
			$response['source'] = $source;
			$this->load->database();
			$data = $this->db->query("SELECT tid , table_name , total , table_properties FROM tablemaster WHERE tid='".$tid."' LIMIT 1");
			if($data->num_rows()==0){
				$response['error'] = true;
				$response['data'] = [];
			}else{
				$response['error'] = false;
				$response['data'] = $data->result_array();
			}
			$this->load->view('admin/embed_table',$response);
		}else{
			$this->load->view('admin/embed_table',['error'=>true , 'tid'=>$tid]);
		}
	}

	public function highlight($id){
		$hid = (int) base64_decode(trim($id));
		$response ='<!doctype HTML>';
		$response .='<html>';
		$response .='<head><link rel="stylesheet" href="'.image_url.'css/FrontEnd/css/font-awesome.min.css" type="text/css"><style>@font-face{font-family:Droid-regular; src:url("'.image_url.'css/FrontEnd/fonts/DroidSerifFonts/droid-serif.regular.ttf");}.hcenter{text-align:center;}.highlight-n{width: 96%;margin: 1%;float: left;/* box-shadow: 0px 0px 7px 1px #0000001f; */border: 1px solid #ddd;padding: 1%;border-radius: 5px;font-family:Droid-regular;font-size: 18px;    line-height: 30px;} .highlight-n p{margin: 0;}.highlight-n .h-time span:first-of-type{color: #1DA1F2;font-size: 15px;}.highlight-n .h-time span:last-of-type{float: right;width: 30%;text-align: right;}</style><meta charset="UTF-8"><title>Highlights</title>';
		$response .='</head><body style="margin:0;">';
		if($hid!='' && is_numeric($hid)){
			$this->load->database();
			$data = $this->db->query("SELECT content , DATE_FORMAT(created_on ,'%D %M %Y %r') as created  FROM scrolling_newsmaster WHERE sid='".$hid."' AND status=1 LIMIT 1");
			if($data->num_rows() > 0){
				$result = $data->row_array();
				$response .='<div class="highlight-n">';
				$response .='<div class="h-time"><span><i class="fa fa-clock-o" aria-hidden="true"></i> '.$result['created'].'</span><span><a onclick="hshare(1);" style="    margin-right: 7px;color: #1DA1F2;cursor:pointer;"><i class="fa fa-facebook" aria-hidden="true"></i></a><a onclick="hshare(2);" style="color: #1DA1F2;cursor:pointer;"><i class="fa fa-twitter" aria-hidden="true"></i></a></span></div>';
				$response .='<div class="h-content">'.$result['content'].'</div>';
				$response .='</div>';
			}
		}else{
			$response .='<h5 class="hcenter">No records</h5>';
		}
		$response .='<script>function hshare(type){
			var durl = document.referrer;
			if(type==1){
				window.open("https://www.facebook.com/sharer/sharer.php?u="+durl,"", "width=670,height=340");
			}else{
				window.open("https://twitter.com/intent/tweet?text="+encodeURIComponent(durl) +" via @NewIndianXpress","", "width=550,height=420");
			}
		}</script></body></html>';
		echo $response;
	}

	public function highlights($sectionId){
		$sid = (int) base64_decode(trim($sectionId));
		$response['result'] = false;
		if($sid!='' && is_numeric($sid)){
			$this->load->model('admin/scrolling_data');
			$rendered=$this->scrolling_data->fetch_scrolling_data('',$sid);
			$Template='<ul style="float:left;">';
			foreach($rendered as $data){
				$date=explode(' ',$data->created_on);
				$date=explode(':',$date[1]);
				$date=$date[0].':'.$date[1];
				$Template .='<li><span class="date-color">'.$date.' :<br>
					<a target="_blank" href="" class="fb_share"><i class="fa fa-facebook custom_social" ></i></a>
					<br><a target="_blank" href="" class="twitter_share"><i class="fa fa-twitter custom_social"></i></a>
					</span> <span class="content-color">'.$data->content.'</span></li>';
			}
			$Template .='</ul>';
			$response['result'] = true;
			$response['data'] = $Template;
			
		}
		$this->load->view('admin/highlights',$response);
	}
	
	public function leadcontent($id=''){
		$single = false;
		$this->load->library("memcached_library");
		$query = "SELECT lead_id , title , description , result , imagepath , color FROM leadcontent_master WHERE status=1";
		if($id!='' && is_numeric($id)){
			$query .=" AND lead_id='".$id."'";
			$single = true;
		}else if($id!='' && gettype($id)=='string'){
			$idlist = array_filter(explode('-',$id), 'strlen');
			$query .=" AND lead_id IN (".implode(',' ,$idlist).")";
		}
		if(!$this->memcached_library->get($query) && $this->memcached_library->get($query) == ''){
			$CI = &get_instance();
			$this->live_db = $this->load->database('live_db' , TRUE);
			$result = $this->live_db->query($query)->result();
			$this->memcached_library->add($query,$result);
		}else{
			$result = $this->memcached_library->get($query);
		}
		$this->load->view('admin/embed_leadcontent',['data' => $result ,'single' => $single]);
		
	}
	
	public function dac_form(){
		?>
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<style>
		#dac_form{border: 1px solid #1b91ce;}
		#dac_form h3{background: #1b91ce;color: #fff !important;margin: 0;padding: 15px 0 15px;font-weight: 700;}
		#dac_form .dac-wrapper{padding:5%;}
		#dac_form .dac-wrapper label{color:#1b91ce;}
		#dac_form .dac-wrapper span{width: 100%;text-align: center;float: left;color: red;}
		#dac_form .dac-wrapper label sup{color:red;}
		#dac_form .btn-primary{background:#1b91ce !important;width:100%;border: 1px solid #1b91ce !important;}
		</style>
		<form action="javascript:void(0)" method="post" id="dac_form">
			<h3 class="text-center">விவரங்களைப் பெற</h3>
			<div class="dac-wrapper">
				<span id="error" style="display: none;"></span>
				<div class="form-group">
					<label>பெயர் <sup>*</sup></label>
					<input type="text" class="form-control" name="name" value="" maxlength="50" style="border: 1px solid #0000804f;">
				</div>
				<div class="form-group">
					<label>ஊர்<sup>*</sup></label>
					<input type="text" class="form-control" name="place" value="" maxlength="50" style="border: 1px solid #0000804f;">
				</div>
				<div class="form-group">
					<label>போன் நம்பர்<sup>*</sup></label>
					<input type="number" class="form-control" name="mobile" value="" maxlength="12" style="border: 1px solid #0000804f;">
				</div>
				<div class="form-group">
					<label>நீங்கள் விரும்பும் புராஜெக்ட்<sup>*</sup></label>
					<select name="projects" class="form-control">
						<option value="">நீங்கள் விரும்பும் புராஜெக்ட்</option>
						<option value="DAC ராயர் குடில்">DAC ராயர் குடில்</option>
						<option value="DAC ஸ்ரீகர்">DAC ஸ்ரீகர்</option>
						<option value="DAC மஹதி">DAC மஹதி</option>
						<option value="DAC மதுவந்தி">DAC மதுவந்தி</option>
						<option value="DAC வர்தினி & வர்ஷினி ">DAC வர்தினி & வர்ஷினி </option>
					</select>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="submit" value="Submit">
				</div>
			</div>
		</form>
		<script>
		$(document).ready(function(e){
			$('#dac_form').submit(function(e){
				e.preventDefault();
				$("#error").hide();
				var name = $("input[name='name']").val();
				var place = $("input[name='place']").val();
				var mobile = $("input[name='mobile']").val();
				var projects = $("select[name='projects']").val();
				if(name == ""){
					$("#error").fadeIn().text("Name field is required");
					$("input[name='name']").focus();
					return false;
				}
				if(place == ""){
					$("#error").fadeIn().text("Place field is required");
					$("input[name='place']").focus();
					return false;
				}
				if(mobile == ""){
					$("#error").fadeIn().text("Mobile field is required");
					$("input[name='mobile']").focus();
					return false;
				}
				if(projects == ""){
					$("#error").fadeIn().text("Projects field is required");
					$("select[name='projects']").focus();
					return false;
				}
				$.ajax({
					type:"POST",
					url: "https://www.dinamani.com/embed/dac_form_save",
					data: $(this).serialize(),
					success: function(data){
						if(data==1){
							alert('form Summited successfully');
							$("#error").hide();
							$("#dac_form").trigger("reset");
						}
					}
				});
        
			});  
 
		});
		</script>
		<?php
	}
	
	public function dac_form_save(){
		$CI = &get_instance();
		$this->live_db = $CI->load->database('live_db' , TRUE);
		$name = $this->input->post('name');
		$place = $this->input->post('place');
		$mobile = $this->input->post('mobile');
		$projects = $this->input->post('projects');
		if($name!='' && $place!='' && $mobile!='' && $projects!=''){
			echo $this->live_db->insert('dac_form' , ['name' => htmlentities($name) , 'place' => htmlentities($place) , 'mobile' => htmlentities($mobile) , 'projects' => htmlentities($projects)]);
		}else{
			echo 0;
		}
	}
}
?> 