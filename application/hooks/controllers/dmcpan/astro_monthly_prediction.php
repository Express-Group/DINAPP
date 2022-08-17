<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Astro_monthly_prediction extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/astro_monthlyPrediction_model');
	}
	
	public function index()
	{
		
		$data['Menu_id'] = get_menu_details_by_menu_name('Monthly Predictions');
		if(defined("USERACCESS_VIEW".$data['Menu_id']) && constant("USERACCESS_VIEW". $data['Menu_id']) == '1') 
		{
			
			$data['title']		= 'Astrology - Monthly Predictions';
			$data['template'] 	= 'astro_monthly_predictions';
			$data['raasi_lists'] = $this->get_raasi_list();
			//$data['results'] = 
			$this->load->view('admin_template',$data);
			
		}
		else 
		{ 
			redirect('dmcpan/common/access_permission/astro_monthly_prediction');		
		}
	}
	
	public function create_page()
	{
		$data['Menu_id'] = get_menu_details_by_menu_name('Monthly Predictions');	
		if(defined("USERACCESS_ADD".$data['Menu_id']) && constant("USERACCESS_ADD". $data['Menu_id']) == '1') 
		{
			$data['title']		= 'Create Monthly Predictions';
			$data['template'] 	= 'astro_monthly_prediction_form';
			$data['raasi_lists'] = $this->get_raasi_list();
			$this->load->view('admin_template',$data);
		}
		else
		{
			redirect('dmcpan/common/access_permission/add_monthly_predictions');		
		}
	}
	
	public function update_monthly_predictions()
	{
		$data['Menu_id'] = get_menu_details_by_menu_name('Monthly Predictions');
		if(defined("USERACCESS_EDIT".$data['Menu_id']) && constant("USERACCESS_EDIT".$data['Menu_id']) == '1') 
		{			
			$raasi_id = base64_decode(urldecode($this->uri->segment(4))); 
			$data['raasi_lists'] = $this->get_raasi_list();
			$data['fetch_values'] = $this->astro_monthlyPrediction_model->get_monthly_predictions($raasi_id);
			$data['title']		= 'Edit Monthly Predictions';
			$data['template'] 	= 'astro_monthly_prediction_form';
			$this->load->view('admin_template',$data);
		}
		else 
		{
			redirect('dmcpan/common/access_permission/edit_monthly_predictions');		
		}
		
	}
	
	public function add_monthly_predictions() //func for inerting values
	{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('txtPredictionDetails','Monthly Predicitons', 'trim|required');			
			$this->form_validation->set_rules('raasi_name','Raasi Name','trim|required|strip_tags|xss_clean');
			
			if($this->form_validation->run() == FALSE)
			{
				$this->create_page();
			}
			else
			{
				$this->astro_monthlyPrediction_model->manipulate(USERID);
			}
	}
	
	public function get_astro_monthlypredictions(){
		$this->astro_monthlyPrediction_model->get_astro_monthlypredictions();	
	}
	
	public function get_raasi_list(){
		return $this->astro_monthlyPrediction_model->get_raasi_list();	
	}

	public function check_alreadyExists()
	{
		$rows = $this->astro_monthlyPrediction_model->check_alreadyExists();
		if($rows > 0)
		{
			echo "exists";
			//return FALSE;
		}	
		else
		{
			//return TRUE;
		}
	}
	
	public function change_dateFormat()
	{
		$selected_date = $this->input->post('selected_date');
		$date_format = date('Y-m-d',strtotime($selected_date));
		$start_date =  $this->firstOfMonth($date_format);
		$end_date = $this->lastOfMonth($date_format);
		echo $end_date;
	}
	
	public function firstOfMonth($date) {
		return date("d-m-Y", strtotime($date));
	}
	
	public function lastOfMonth($date) {
		return date("d-m-Y", strtotime('-1 second',strtotime('+1 month',strtotime($date))));
	}
}

?>