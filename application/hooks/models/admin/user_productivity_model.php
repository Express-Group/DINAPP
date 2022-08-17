<?php 
class user_productivity_model extends CI_Model 
{
	public function __contruct()
	{
		parent::__contruct();
		$CI =& get_instance();
		//setting the second parameter to TRUE (Boolean) the function will return the database object.
		$this->live_db = $CI->load->database('live_db', TRUE);
	}
	
	function user_report_datatable()
	{
		$set_object=new user_report_datatable();
		return $set_object->user_report_datatable();	
	}
	
	function user_excel_report()
	{
		$set_object=new user_report_excel;
		return $set_object->user_excel_report();	
	}
}

class user_report_datatable extends user_productivity_model
{
	public function user_report_datatable()
	{
		extract($_POST);
		
		$Field = $order[0]['column'];
		$order = $order[0]['dir'];

		switch ($Field) {
		
		case 0:
		   $order_field = 't1.Username';
			break;
		case 1:
		   $order_field = 't1.status';
			break;
		default:
		   $order_field = 't1.Username';
			break;
		}
		
		if($from_date != '')  {
		$check_in_date 	= new DateTime($from_date);
		$from_date = $check_in_date->format('Y-m-d');
		}
		
		if($to_date != '')  {
		$check_out_date = new DateTime($to_date);
		$to_date = $check_out_date->format('Y-m-d');
		}
		
		$Total_rows      = $this->db->query('CALL  user_productivity_report("","","","","")')->num_rows();
		$recordsFiltered = $this->db->query('CALL  user_productivity_report("'.$from_date.'", "'.$to_date.'",  "'.$status.'", "'.$roleid.'", "")')->num_rows();
		$user         =  $this->db->query('CALL  user_productivity_report("'.$from_date.'", "'.$to_date.'",  "'.$status.'", "'.$roleid.'", " ORDER BY '.$order_field.' '.$order.' LIMIT '.$start.','.$length.'")')->result_array();
		
		$data['draw']            = $draw;
		$data["recordsTotal"]    = $Total_rows;
		$data["recordsFiltered"] = $recordsFiltered;
		$data['data'] = array();
			
			$Count=0;
			foreach($user  as $user_productivity)
			{
				$subdata = array();
				
				$subdata[] = $user_productivity['Username'].'<input type="hidden" name="userID[]" id="userID" value="">';
				
				if($user_productivity['status']== '1')
					$subdata[] = '<td><i title="Published" class="fa fa-check"></i></td>';
				else
					$subdata[] = '<td><i title="Unpublished"  class="fa fa-times"></i></td>';
					
				$subdata[] ='<p><span>'. $user_productivity['article_draft'].'</span><span>'.$user_productivity['article_published'].'</span><span>'.$user_productivity['article_unpublished'].'</span></p>';
				
				$subdata[] ='<p><span>'.$user_productivity['gallery_draft'].'</span><span>'.$user_productivity['gallery_published'].'</span><span>'.$user_productivity['gallery_unpublished'].'</span></p>';
				
				
				$subdata[] ='<p><span>'. $user_productivity['video_draft'].'</span><span>'.$user_productivity['video_published'].'</span><span>'.$user_productivity['video_unpublished'].'</span></p>';
				
				$subdata[] ='<p><span>'. $user_productivity['audio_draft'].'</span><span>'.$user_productivity['audio_published'].'</span><span>'.$user_productivity['audio_unpublished'].'</span></p>';
				
				$subdata[] ='<p><span>'.$user_productivity['resource_draft'].'</span><span>'.$user_productivity['resource_published'].'</span><span>'.$user_productivity['resource_unpublished'].'</span></p>';
				
				$tot1=$user_productivity['article_draft']+$user_productivity['gallery_draft']+$user_productivity['audio_draft']+$user_productivity['resource_draft'] + $user_productivity['video_draft'];
				$tot2=$user_productivity['article_published']+$user_productivity['gallery_published']+$user_productivity['audio_published']+$user_productivity['resource_published'] +$user_productivity['video_published'] ;
				$tot3=$user_productivity['article_unpublished']+$user_productivity['gallery_unpublished']+$user_productivity['audio_unpublished']+$user_productivity['resource_unpublished'] +$user_productivity['video_unpublished'] ;
				$subdata[] = '<p><span>'.$tot1.'</span><span>'.$tot2.'</span><span> '.$tot3.'</span></p>';
				$data['data'][$Count] = $subdata;
				$Count++;
			}
			    
		echo json_encode($data);
		exit;
		
		}
	}
	
class user_report_excel extends user_productivity_model
{
	public function user_excel_report()
	{
		$query         =  $this->db->query('CALL user_productivity_report("","","","","")')->result_array();
		//print_r($query);exit;
		header("Content-type: application/csv");
		header("Content-Disposition: attachment; filename=\"user_report_".date('H-i-s d-m-Y').".csv\"");
		header("Pragma: no-cache");
		header("Expires: 0");
	
		$handle = fopen('php://output', 'w');
		fputcsv($handle, array(
			'Username',
			'Status',
			
			'Article - Draft',
			'Article - Published',
			'Article - Un Published',
			
			'Gallery - Draft',
			'Gallery - Published',
			'Gallery - Un Published',
			
			'Video - Draft',
			'Video - Published',
			'Video - Un Published',
			
			'Audio - Draft',
			'Audio - Published',
			'Audio - Un Published',
			
			'Resource - Draft',
			'Resource - Published',
			'Resource - Un Published',
			
			'Total - Draft',
			'Total - Published',
			'Total - Un Published',
		));
		
		foreach ($query as $export_excel) {
			       
			
			$get_status = $export_excel['status'];
				if($get_status == 0){ $view_status='In active'; }else {$view_status='Active';} 

			
			$tot1=$export_excel['article_draft']+$export_excel['gallery_draft']+$export_excel['audio_draft']+$export_excel['resource_draft'] + $export_excel['video_draft'];
			$tot2=$export_excel['article_published']+$export_excel['gallery_published']+$export_excel['audio_published']+$export_excel['resource_published'] +$export_excel['video_published'] ;
			$tot3=$export_excel['article_unpublished']+$export_excel['gallery_unpublished']+$export_excel['audio_unpublished']+$export_excel['resource_unpublished'] +$export_excel['video_unpublished'] ;
			
			fputcsv($handle, array(
				strip_tags($export_excel['Username']),
				strip_tags($view_status),
				
				$export_excel['article_draft'],
				$export_excel['article_published'],
				$export_excel['article_unpublished'],
				
				$export_excel['gallery_draft'],
				$export_excel['gallery_published'],
				$export_excel['gallery_unpublished'],
				
				$export_excel['video_draft'],
				$export_excel['video_published'],
				$export_excel['video_unpublished'],
				
				$export_excel['audio_draft'],
				$export_excel['audio_published'],
				$export_excel['audio_unpublished'],
				
				$export_excel['resource_draft'],
				$export_excel['resource_published'],
				$export_excel['resource_unpublished'],
				
				$tot1,
				$tot2,
				$tot3			
			));
		}
		fclose($handle);
		exit;
		
	}
	
}

