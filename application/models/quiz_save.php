<?php
Class quiz_save extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function save($data){
		return $this->db->insert('quizmaster',array('data'=>$data));
	}
	
	public function quizresults(){
	
		$data=$this->db->get_where('quizmaster',array('status'=>'0'))->result();
		return $data;
	}

}
?>