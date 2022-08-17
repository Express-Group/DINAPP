<?php

/**
 * Release_template_locks Model Class
 *
 * @package	NewIndianExpress
 * @category	News
 * @author	Template Designer Developer
 */

class  Cloned_widgets_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();	
		$CI = &get_instance();
		//setting the second parameter to TRUE (Boolean) the function will return the database object.
		//$this->archieve_db = $CI->load->database('archive_db', TRUE);
		$this->live_db = $this->load->database('live_db', TRUE);
	}
	
	public function list_all_cloned_parent_widgets()
	{
		$class_object = new CloneParentWidgets;
		return $class_object->list_all_cloned_parent_widgets();
	}
	public function list_out_cloned_children($parent_clone_id)
	{
		$class_object = new CloneChildWidgets;
		return $class_object->list_out_cloned_children($parent_clone_id);
	}
	
	public function list_out_published_cloned_children($parent_clone_id)
	{
		$class_object = new CloneChildWidgets;
		return $class_object->list_out_published_cloned_children($parent_clone_id);
	}
	public function multiple_section_mapping()
	{
		$class_object = new SectionList;
		return $class_object->multiple_section_mapping();
	}
	public function list_out_template_locks($search_by_user_id, $search_by_lock_type, $search_by_section_id, $search_by_page_type)
	{
		$class_object = new ReleaseLockedTemplates;
		return $class_object->list_out_template_locks($search_by_user_id, $search_by_lock_type, $search_by_section_id, $search_by_page_type);
	}
	public function release_locks_by_lock_type($release_post_object)
	{
		$class_object = new ReleaseLockedTemplates;
		return $class_object->release_locks_by_lock_type($release_post_object);
	}
	public function create_release_lock_log($request_url, $release_post_object, $emsg, $last_query_executed, $locked_user_id, $release_lock_type, $release_lock_section_id, $release_lock_section_type, $release_lock_instance_id, $release_lock_section_version_id)
	{
		$class_object = new LogHistoryOfReleaseLocks;
		return $class_object->create_release_lock_log($request_url, $release_post_object, $emsg, $last_query_executed, $locked_user_id, $release_lock_type, $release_lock_section_id, $release_lock_section_type, $release_lock_instance_id, $release_lock_section_version_id);
	}
	
	
}/* End of Cloned_widgets_model - Class */

class CloneParentWidgets extends Cloned_widgets_model
{
	function list_all_cloned_parent_widgets()
	{
		$list_all_parent_clone 	= $this->db->query('CALL list_all_cloned_parent_widgets()');		
		$get_result 			= $list_all_parent_clone->result_array();
		return $get_result;
	}
}/* End of CloneParentWidgets - Class */
class CloneChildWidgets extends Cloned_widgets_model
{
	function list_out_cloned_children($parent_clone_id)
	{
		$list_clone_children 	= $this->db->query('CALL list_out_cloned_children("'.$parent_clone_id.'")');		
		$get_result 			= $list_clone_children->result_array(); 				
		return $get_result;
	}
	
	function list_out_published_cloned_children($parent_clone_id)
	{
		if($parent_clone_id == 'all'){
			$all_cloned_parents	= $this->cloned_widgets_model->list_all_cloned_parent_widgets();			
			$cloned_parents = join(',',array_column($all_cloned_parents, "cloned_instance_id"));
		}else{
			$cloned_parents	= $parent_clone_id;
		}
		$publishe_clone_children 	= $this->live_db->query('CALL list_out_published_cloned_children("'.$cloned_parents.'")');		
		$get_result 				= $publishe_clone_children->result_array();		
		
		return $get_result;
	}
	function get_clone_mapping_details($clone_instance_id){
		//CMS DB
		$get_clone_mapping = $this->db->query("CALL get_clone_mapping_details ('" . $clone_instance_id . "')");	
		$clone_map_details =  $get_clone_mapping->result_array();
		return $clone_map_details;
	}
	function get_frontend_clone_mapping_details($clone_instance_id){		
		//FRONTEND DB
		$get_clone_mapping_live = $this->live_db->query("CALL get_clone_mapping_details_live ('" . $clone_instance_id . "')");		
		$clone_map_details_live =  $get_clone_mapping_live->result_array();
	
		return $clone_map_details_live;
	}
}/* End of CloneChildWidgets - Class */

class SectionList extends Cloned_widgets_model
{
	////////////// Get all available menus / Sections from sectionmaster table   //////////
	public function multiple_section_mapping()
	{		
		$empty_val = '';		  
		$list_multi_sectn 	= $this->db->query('CALL get_section_template_designer("'.$empty_val.'")');		
		$get_result 		= $list_multi_sectn->result_array();
		
		foreach($get_result as $key => $get_multi_section)
		{			
			$get_sec_id 					= $get_multi_section['Section_id'];
			$list_multi_sectn 				= $this->db->query('CALL get_section_template_designer("'.$get_sec_id.'")');					
			$subsection_page['special_section'] = '';
			$get_multi_section['sub_section'] = '';
			if($list_multi_sectn->num_rows() > 0)
			{
				$get_multi_section['sub_section'] 	= $list_multi_sectn->result_array();
				
				foreach($get_multi_section['sub_section'] as $subkey => $subsection_page)
				{				
					$get_subsec_id 					= $subsection_page['Section_id'];
					///// Is Special Menu /// 				
					$special_section_details		= $this->db->query('CALL get_seperatemenu ("'.$subsection_page['IsSeperateWebsite'].'", "'.$get_subsec_id.'")')->result_array();
					$specila_list = array();
					foreach($special_section_details as $splkey => $special_section)
					{
						$get_splsec_id 					= $special_section['Section_id']; 
						///////  Add Specialsection to main Subsection array object  /////
						$specila_list[$splkey] = $special_section;	
					}				
					$subsection_page['special_section'] = $specila_list;
					///////  Add Subsection to main section array object  /////
					$get_multi_section['sub_section'][$subkey] = $subsection_page;			
							
				}				
			}
			
			$get_result[$key] = $get_multi_section;
		}
		
		/////  for Standard Article page  ////////		  
		/* From CMS db */
		array_push($get_result,array(
										"Section_id" =>'10000',
										"Sectionname" =>'Standard Article',
										"DisplayOrder" =>'0',
										"Section_landing" =>'2',
										"IsSeperateWebsite" =>'',
										"LinkedToColumnist" =>'',										
										));												
		return $get_result;
	}
}

class ReleaseLockedTemplates extends Cloned_widgets_model
{
	public function list_out_template_locks($search_by_user_id, $search_by_lock_type, $search_by_section_id, $search_by_page_type)
	{
		////  List all templates which are in lock status = 2  //////
		$all_locks_details = $this->db->query("CALL list_out_template_locks('".$search_by_user_id."','".$search_by_lock_type."','".$search_by_section_id."','".$search_by_page_type."')");		
		return $all_locks_details->result_array();
	}
	public function release_locks_by_lock_type($release_post_object)
	{
		$request_url 			= uri_string();
		$this->db->trans_begin();
		foreach($release_post_object as $key => $object)
		{
			$this->db->query("CALL release_locks_by_lock_type('".$object['release_lock_type']."', '".$object['release_lock_section_id']."', '".$object['release_lock_section_type']."', '".$object['release_lock_instance_id']."', '".$object['release_lock_section_version_id']."', '".USERID."')");
			
			////  Add log of release lock functionality  ////		
			$last_query_executed 	= $this->db->last_query();
			$this->create_release_lock_log($request_url, '', '', $last_query_executed, $object['locked_userId'], $object['release_lock_type'], $object['release_lock_section_id'], $object['release_lock_section_type'], $object['release_lock_instance_id'], $object['release_lock_section_version_id']);
		}
		
		if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				$emsg	= array("msg"=>"Failed to release locks", "msg_type"=>2, "show_msg"=>1, "access_rights"=>"");
		}		
		else {
			$this->db->trans_commit();			
			$emsg	= array("msg"=>"Successfully lock(s) released", "msg_type"=>1, "show_msg"=>1, "access_rights"=>"");
		}
		
		////  Add log of release lock functionality  ////		
		$last_query_executed 	= ($last_query_executed) ? $last_query_executed : $this->db->last_query();
		$this->create_release_lock_log($request_url, $release_post_object, $emsg, $last_query_executed, '', '', '', '', '', '');
		
		return $emsg;
	}
}/* End of WidgetAddArticles - Class */

class LogHistoryOfReleaseLocks extends Cloned_widgets_model
{
	public function create_release_lock_log($request_url, $release_post_object, $response_msg, $last_query_executed, $locked_user_id, $release_lock_type, $release_lock_section_id, $release_lock_section_type, $release_lock_instance_id, $release_lock_section_version_id )
	{
		$user_acces_rights 	= (FPM_AddReleaseLocks) ? '1' : '2';
		$date_time 			= date('Y-m-d H:i:s', time());
		$this->db->query("CALL create_release_lock_log('".USERID."','".addslashes($request_url)."', '".addslashes(json_encode($release_post_object))."', '".addslashes(json_encode($response_msg))."', '".$date_time."', '".$user_acces_rights."', '".addslashes($last_query_executed)."','', '".$locked_user_id."', '".$release_lock_type."', '".$release_lock_section_id."', '".$release_lock_section_type."', '".$release_lock_instance_id."', '".$release_lock_section_version_id."' )");
		if(mysql_error() == '')
		{
			//return true;
		}
		else
		{
			$database_error = mysql_error();
			$this->db->query("CALL create_release_lock_log('' ,'' ,'' ,'' ,'' ,'','".addslashes($last_query_executed)."' ,'".addslashes($database_error)."','' ,'' ,'' ,'' ,'', '' )");
			//return false;
		}
	}
}/* End of WidgetAddArticles - Class */
/* End of Cloned_widgets_model.php File */
/* Location: ./application/models/admin/Cloned_widgets_model.php */
?>
