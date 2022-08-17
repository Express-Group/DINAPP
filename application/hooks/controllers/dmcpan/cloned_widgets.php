<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cloned_widgets extends CI_Controller {

	public function __construct() 
	{		
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');		
		$this->load->model('admin/cloned_widgets_model');		
		
	} 
	
	//////// Release_template_locks Index page  /////	
	public function index()
	{
		$cloned_parent_instance_id 			= (isset($_POST['cloned_parent_instance_id'])) ? $this->input->post('cloned_parent_instance_id') : "";
		//Get all cloned parent widgets			
		$all_cloned_parents 				= array();
		$all_cloned_parents 				= $this->cloned_widgets_model->list_all_cloned_parent_widgets();		
		$data["cloned_parents"] 			= $all_cloned_parents;
		$data['cloned_parent_instance_id']	= $cloned_parent_instance_id;
		
		$data['title']			= 'Cloned Widgets';
		$data['template'] 		= 'cloned_widgets';
		$this->load->view('admin_template',$data);
	}
	
	public function show_cloned_children(){
		$search_by_cloned_parent 		= $this->input->post('search_by_cloned_parent');
		$cloned_children_list 			= $this->cloned_widgets_model->list_out_cloned_children($search_by_cloned_parent);
		$data['cloned_children_list'] 	= $cloned_children_list;
		
		$published_children_list		= $this->cloned_widgets_model->list_out_published_cloned_children($search_by_cloned_parent);
		$data['published_children_list']= $published_children_list;
		
		$content = $this->load->view("admin/cloned_widgets_details", $data, true);
		echo $content;
	}
	
	public function show_locks()
	{
		//$this->verify_user_access();
		$search_by_user_id 		= $this->input->post('search_by_user');
		$search_by_lock_type 	= $this->input->post('search_by_lock_type');
		$search_by_section_id 	= $this->input->post('search_by_section');
		$search_by_page_type 	= $this->input->post('search_by_section_type');
		
		$all_locked_templates_list = $this->release_template_locks_model->list_out_template_locks($search_by_user_id, $search_by_lock_type, $search_by_section_id, $search_by_page_type);
		$data['all_locked_templates_list'] = $all_locked_templates_list;
		$content = $this->load->view("admin/release_lock_details", $data, true);
		echo $content;
		
		////  Add log of release lock functionality  ////
		$request_url 			= uri_string();
		$last_query_executed 	= $this->db->last_query();
		$this->create_release_lock_log($request_url, 'List of available locks (search results after loading table)', $all_locked_templates_list, $last_query_executed);
	}
	
	public function get_section_group()
	{
		$section = $this->release_template_locks_model->multiple_section_mapping();
		//print_r($section); exit;
		foreach($section as $key => $value)
		{	
			$childCategories = "";
			$special_section = "";
			//print_r($value);
			//////  Sub section ///////
			$childCategories = array("");
			$special_section = array("");
			if(@$value['sub_section']!='')
			foreach(@$value['sub_section'] as $skey => $svalue)
			{
				$special_section_count = (@$svalue['special_section'] =='') ? 0 : count(@$svalue['special_section']);
				$childCategories[] = array('categoryId' => $svalue['Section_id'], 'categoryName' => $svalue['Sectionname'], "Section_landing" 	=> $svalue['Section_landing'], "special_section_count"=>$special_section_count );	
				if($special_section_count > 0)
				{
					foreach(@$svalue['special_section'] as $splkey => $spl_value)
					{
						$special_section[] = array('categoryId' => $spl_value['Section_id'], 'categoryName' => $spl_value['Sectionname'] );										
					}
				}
			}	
			$data['categoryList'][] = array(
											"categoryId" 		=> $value['Section_id'],
											"categoryName" 		=> $value['Sectionname'],
											"childCategories" 	=> $childCategories,
											"special_section"	=> $special_section,
											"Section_landing" 	=> $value['Section_landing'],
										 );
		}
		//print_r($data); exit;
		return $data;
	}
	
	public function release_selected_locks()
	{
		$this->verify_user_access();
		$release_post_object = $this->input->post('release_required_values');
		if(count($release_post_object) > 0)
		{			
			$released_object = $this->release_template_locks_model->release_locks_by_lock_type($release_post_object);
		}
		//header("content-type: application/json");
		echo json_encode($released_object);
	}
	
	public function create_release_lock_log($request_url, $parameters, $msg, $response)
	{
		$this->release_template_locks_model->create_release_lock_log($request_url, $parameters, $msg, $response, '', '', '', '', '', '');
	}
}
?>