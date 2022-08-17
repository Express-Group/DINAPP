<?php
class Quiz extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}
	
	public function  index(){
		$this->load->helper('url');
		$this->load->helper('form');
		//$this->load->view('view_template/common_header');
		$this->load->view('quiz_template');
		//$this->load->view('view_template/common_footer');


	}
	
	public function save(){
		$question1=$this->input->post('question_1');
		$question2=$this->input->post('question_2');
		$question3=$this->input->post('question_3');
		$question4=$this->input->post('question_4');
		$question5=$this->input->post('question_5');
		$question6=$this->input->post('question_6');
		$question7=$this->input->post('question_7');
		$question8=$this->input->post('question_8');
		$question9=$this->input->post('question_9');
		$question10=$this->input->post('question_10');
		
		$answer1=$this->input->post('quiz1');
		$answer2=$this->input->post('quiz2');
		$answer3=$this->input->post('quiz3');
		$answer4=$this->input->post('quiz4');
		$answer5=$this->input->post('quiz5');
		$answer6=$this->input->post('quiz6');
		$answer7=$this->input->post('quiz7');
		$answer8=$this->input->post('quiz8');
		$answer9=$this->input->post('quiz9');
		$answer10=$this->input->post('quiz10');
		$name=$this->input->post('username');
		$age=$this->input->post('age');
		$phone=$this->input->post('phone');
		$email=$this->input->post('email');
		if($question1!='' && $question2!='' && $question3!='' && $question4!='' && $question5!='' && $question6!='' && $question7!='' && $question8!='' && $question9!='' && $question10!='' && $answer1!='' && $answer2!='' && $answer3!='' && $answer4!='' && $answer5!='' && $answer6!='' && $answer7!='' && $answer8!='' && $answer9!='' && $answer10!='' ):
			$data=array($question1=>$answer1,$question2=>$answer2,$question3=>$answer3,$question4=>$answer4,$question5=>$answer5,$question6=>$answer6,$question7=>$answer7,$question8=>$answer8,$question9=>$answer9,$question10=>$answer10,"username"=>$name,"age"=>$age,"phone"=>$phone,"email"=>$email);
			$data=json_encode($data);
			$this->load->model('quiz_save');
			$result=$this->quiz_save->save($data);
			if($result==1){
				echo '<script>alert("submitted Successfully")</script>';
				echo '<script>window.location.href="'.base_url('jallikattu_result').'"</script>';
			}
		else
				echo '<script>alert("Something went wrong.please try again")</script>';
				echo '<script>window.location.href="'.base_url().'"</script>';
		endif;
	} 
	
	public function fetch_results(){
		$question1=array();
		$question2=array();
		$question3=array();
		$question4=array();
		$question5=array();
		$question6=array();
		$question7=array();
		$question8=array();
		$question9=array();
		$question10=array();
		$this->load->model('quiz_save');
		$result=$this->quiz_save->quizresults();
		$count=0;
		foreach($result as $data){
		$json_data=json_decode($data->data,true);
			array_push($question1,$json_data['ஜல்லிக்கட்டை நீங்கள் ஆதரிக்கிறீர்களா?']);
			array_push($question2,$json_data['ஜல்லிக்கட்டு விஷயத்தில் தமிழர்களை மத்திய / மாநில அரசுகள் ஏமாற்றுகின்றனவா?']);
			array_push($question3,$json_data['பீட்டா போன்ற அமைப்புகள் தேவையா?']);
			array_push($question4,$json_data['ஜல்லிக்கட்டு விஷயத்தில் மாணவர்கள் தங்களை ஈடுபடுத்திக்கொள்வது?']);
			array_push($question5,$json_data['ஜல்லிக்கட்டுக்கு திரைத் துறையினரின் ஆதரவு தேவையா?']);
			array_push($question6,$json_data['ஜல்லிக்கட்டை சர்வதேச அளவிலான பிரச்னையாக முன்னெடுக்கலாமா?']);
			array_push($question7,$json_data['ஜல்லிக்கட்டு விஷயத்தில் தமிழக அரசியல் கட்சிகளின் நிலைப்பாடு எப்படி இருக்கிறது?']);
			array_push($question8,$json_data['ஜல்லிக்கட்டு குறித்து தமிழக அரசின் மௌனம் ஏற்புடையதா?']);
			array_push($question9,$json_data['ஜல்லிக்கட்டு போல் பிற பண்பாட்டு / கலாசார உரிமைகளை தமிழகம் இழந்து வருகிறதா?']);
			array_push($question10,$json_data['ஜல்லிக்கட்டு போராட்டம் போல், விவசாயிகள், காவிரி / முல்லைப் பெரியாறு, இலங்கைத் தமிழர், மீனவர் பிரச்னை போன்றவற்றுக்கும் மக்கள் முக்கியத்துவமும் முன்னுரிமையும் தருகிறார்களா?']);
		 $count++;
		}
		$Template='';
		$Template .='<table class="table table-bordered">';
		$Template .='<tr><th class="col-md-6">கேள்வி</th><th class="col-md-2">ஆம்</th><th class="col-md-2">இல்லை</th><th class="col-md-2">கருத்து இல்லை</th></tr>';
		$data=$this->validate_column("ஆம்","இல்லை","கருத்து இல்லை",$question1);	
		$Template .='<tr><td>ஜல்லிக்கட்டை நீங்கள் ஆதரிக்கிறீர்களா?</td><td>'.round(($data[0]/$count)*100) .'%</td><td>'.round(($data[1]/$count)*100) .'%</td><td>'.round(($data[2]/$count)*100) .'%</td></tr>';
		$Template .='</table>';
		
		$Template .='<table class="table table-bordered">';
		$Template .='<tr><th class="col-md-6">கேள்வி</th><th>ஆம்</th><th>இல்லை</th><th>சட்டச் சிக்கல்</th></tr>';
		$data=$this->validate_column("ஆம்","இல்லை","சட்டச் சிக்கல்",$question2);	
		$Template .='<tr><td>ஜல்லிக்கட்டு விஷயத்தில் தமிழர்களை மத்திய / மாநில அரசுகள் ஏமாற்றுகின்றனவா?</td><td>'.round(($data[0]/$count)*100) .'%</td><td>'.round(($data[1]/$count)*100) .'%</td><td>'.round(($data[2]/$count)*100) .'%</td></tr>';
		$Template .='</table>';
		
		$Template .='<table class="table table-bordered">';
		$Template .='<tr><th class="col-md-6">கேள்வி</th><th>ஆம்</th><th>இல்லை</th><th>கருத்து இல்லை</th></tr>';
		$data=$this->validate_column("ஆம்","இல்லை","கருத்து இல்லை",$question3);	
		$Template .='<tr><td>பீட்டா போன்ற அமைப்புகள் தேவையா?</td><td>'.round(($data[0]/$count)*100) .'%</td><td>'.round(($data[1]/$count)*100) .'%</td><td>'.round(($data[2]/$count)*100) .'%</td></tr>';
		$Template .='</table>';
		
		$Template .='<table class="table table-bordered">';
		$Template .='<tr><th class="col-md-6">கேள்வி</th><th>தேவை</th><th>தேவையற்ற ஒன்று</th><th>கருத்து இல்லை</th></tr>';
		$data=$this->validate_column("தேவை","தேவையற்ற ஒன்று","கருத்து இல்லை",$question4);	
		$Template .='<tr><td>ஜல்லிக்கட்டு விஷயத்தில் மாணவர்கள் தங்களை ஈடுபடுத்திக்கொள்வது?</td><td>'.round(($data[0]/$count)*100) .'%</td><td>'.round(($data[1]/$count)*100) .'%</td><td>'.round(($data[2]/$count)*100) .'%</td></tr>';
		$Template .='</table>';
		
		$Template .='<table class="table table-bordered">';
		$Template .='<tr><th class="col-md-6">கேள்வி</th><th>நிச்சயம் தேவை</th><th>தேவையில்லை</th><th>கருத்து இல்லை</th></tr>';
		$data=$this->validate_column("நிச்சயம் தேவை","தேவையில்லை","கருத்து இல்லை",$question5);	
		$Template .='<tr><td>ஜல்லிக்கட்டுக்கு திரைத் துறையினரின் ஆதரவு தேவையா?</td><td>'.round(($data[0]/$count)*100) .'%</td><td>'.round(($data[1]/$count)*100) .'%</td><td>'.round(($data[2]/$count)*100) .'%</td></tr>';
		$Template .='</table>';
		
		$Template .='<table class="table table-bordered">';
		$Template .='<tr><th class="col-md-6">கேள்வி</th><th>ஆம்</th><th>இல்லை</th><th>கருத்து இல்லை</th></tr>';
		$data=$this->validate_column("ஆம்","இல்லை","கருத்து இல்லை",$question6);	
		$Template .='<tr><td>ஜல்லிக்கட்டை சர்வதேச அளவிலான பிரச்னையாக முன்னெடுக்கலாமா?</td><td>'.round(($data[0]/$count)*100) .'%</td><td>'.round(($data[1]/$count)*100) .'%</td><td>'.round(($data[2]/$count)*100) .'%</td></tr>';
		$Template .='</table>';
		
		$Template .='<table class="table table-bordered">';
		$Template .='<tr><th class="col-md-6">கேள்வி</th><th>நன்றாக இருக்கிறது</th><th>சொல்லிக்கொள்ளும்படி இல்லை</th><th>கருத்து இல்லை</th></tr>';
		$data=$this->validate_column("நன்றாக இருக்கிறது","சொல்லிக்கொள்ளும்படி இல்லை","கருத்து இல்லை",$question7);	
		$Template .='<tr><td>ஜல்லிக்கட்டு விஷயத்தில் தமிழக அரசியல் கட்சிகளின் நிலைப்பாடு எப்படி இருக்கிறது?</td><td>'.round(($data[0]/$count)*100) .'%</td><td>'.round(($data[1]/$count)*100) .'%</td><td>'.round(($data[2]/$count)*100) .'%</td></tr>';
		$Template .='</table>';
		
		$Template .='<table class="table table-bordered">';
		$Template .='<tr><th class="col-md-6">கேள்வி</th><th>சட்டச் சிக்கல்</th><th>ஆம்</th><th>இல்லை</th></tr>';
		$data=$this->validate_column("சட்டச் சிக்கல்","ஆம்","இல்லை",$question8);	
		$Template .='<tr><td>ஜல்லிக்கட்டு குறித்து தமிழக அரசின் மௌனம் ஏற்புடையதா?</td><td>'.round(($data[0]/$count)*100) .'%</td><td>'.round(($data[1]/$count)*100) .'%</td><td>'.round(($data[2]/$count)*100) .'%</td></tr>';
		$Template .='</table>';
		
		$Template .='<table class="table table-bordered">';
		$Template .='<tr><th class="col-md-6">கேள்வி</th><th>ஆம்</th><th>இல்லை</th><th>கருத்து இல்லை</th></tr>';
		$data=$this->validate_column("ஆம்","இல்லை","கருத்து இல்லை",$question9);	
		$Template .='<tr><td>ஜல்லிக்கட்டு போல் பிற பண்பாட்டு / கலாசார உரிமைகளை தமிழகம் இழந்து வருகிறதா?</td><td>'.round(($data[0]/$count)*100) .'%</td><td>'.round(($data[1]/$count)*100) .'%</td><td>'.round(($data[2]/$count)*100) .'%</td></tr>';
		$Template .='</table>';
		
		$Template .='<table class="table table-bordered">';
		$Template .='<tr><th class="col-md-6">கேள்வி</th><th>ஆம்</th><th>இல்லை</th><th>கருத்து இல்லை</th></tr>';
		$data=$this->validate_column("ஆம்","இல்லை","கருத்து இல்லை",$question10,10);	
		$Template .='<tr><td>ஜல்லிக்கட்டு போராட்டம் போல், விவசாயிகள், காவிரி / முல்லைப் பெரியாறு, இலங்கைத் தமிழர், மீனவர் பிரச்னை போன்றவற்றுக்கும் மக்கள் முக்கியத்துவமும் முன்னுரிமையும் தருகிறார்களா?</td><td>'.round(($data[0]/$count)*100) .'%</td><td>'.round(($data[1]/$count)*100) .'%</td><td>'.round(($data[2]/$count)*100) .'%</td></tr>';
		$Template .='</table>';
		//$Template .='<div class="col-md-12 col-sm-12 col-lg-12">';
		//$Template .='<p class="poll_results">மொத்த கருத்துக்கள்: '.$count.'</p>';
		//$Template .='</div>';
		 
		 $views['template']=$Template;
		 $this->load->view('quiz_results',$views);
		
	}
	function validate_column($ans1,$ans2,$ans3,$questions,$type=0){
		$a=0;
		$b=0;
		$c=0;
		for($i=0;$i<count($questions);$i++){
		if($type==10){
			if($questions[$i]==$ans1 || $questions[$i]=="அரசியல்"){
				$a=$a+1;
			}elseif($questions[$i]==$ans2 || $questions[$i]=="போராட்டத் தலைமை இன்மை"){
				$b=$b+1;
			}elseif($questions[$i]==$ans3){
				$c=$c+1;
			}
		}else{
			if($questions[$i]==$ans1){
				$a=$a+1;
			}elseif($questions[$i]==$ans2){
				$b=$b+1;
			}elseif($questions[$i]==$ans3){
				$c=$c+1;
			}
		}
			
		}
		
		return array($a,$b,$c);
	
	
	}
}
?>