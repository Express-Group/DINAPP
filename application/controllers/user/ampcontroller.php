<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ampcontroller extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('admin/articleamp_model');
	}
	
	public function index(){
		$UrlCount = $this->uri->total_segments();
		$url_seg                 = explode(".amp", $this->uri->segment($UrlCount));
		$split_uri 	             = preg_split('~--(?=[^--]*$)~', $url_seg[0]);
		$content_id_from_url     = (count($split_uri)>=2)? @end(explode("-", $split_uri[0])):  @end(explode("-", $split_uri[0]));
		$contentId              = (!is_numeric($content_id_from_url))? ((count($split_uri)>1)? $split_uri[1]: "") :$content_id_from_url; 
		$sectionName = $this->uri->segment(1);
		$contentType = 1;
		$year = $this->uri->segment($UrlCount-3);
		switch($sectionName){
			case ($sectionName == "galleries" || $sectionName == "photos"):
				$contentType = 3;
				break;
			case ($sectionName == "videos" || $sectionName=="e-videos"):
				$contentType = 4;
				break;
			default:
				$contentType = 1;
				break;
		
		}
		$data['contenttype'] = $contentType;
		$ArticleDetails = $this->articleamp_model->articleDetails($contentType , $contentId , $sectionName , $year );
		if($ArticleDetails['hasarticle']==1){
			$data['article'] = $this->articleamp_model->article($contentType , $contentId , $sectionName , $year ,$ArticleDetails['archive']);
			$data['more_articles'] = array();
			$data['more_articles'] = $this->articleamp_model->more_articles($ArticleDetails['data'][0],$contentType,$contentId);
			if($contentType==3){
				$data['gallert_images'] = $this->articleamp_model->gallery_images($contentId , $year, $ArticleDetails['archive']);
			}
			$this->load->view('admin/amp_view',$data);
		}else{
			$view['controller'] = $this;
			$this->load->view('admin/section_view_error',$view);
		}
		
		
	} 
}
?>