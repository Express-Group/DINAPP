<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class articleamp_model extends CI_Model{ 

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$CI = &get_instance();
		$this->live_db = $CI->load->database('live_db' ,TRUE);
		$this->archive = $CI->load->database('archive_db' ,TRUE);
	}
	
	public function articleDetails($contentType , $contentId , $sectionName , $year ){
		if($contentType==1){
			$tblname = "article";
			$tableName = 'article_'.$year;
		}else if($contentType==3){
			$tblname = "gallery";
			$tableName = 'gallery_'.$year;
		}else if($contentType==4){
			$tblname = "video";
			$tableName = 'video_'.$year;
		}
		$Details = $this->live_db->query("SELECT content_id, section_id, url FROM ".$tblname." WHERE content_id='".$contentId."' AND status='P' AND publish_start_date <=NOW()");
			if($Details->num_rows() > 0){
				return ['hasarticle'=>1,'data'=>$Details->result(),'archive'=>0];
			}else{
				if($this->archive->table_exists($tableName)){
					$Details = $this->archive->query("SELECT content_id, section_id, url FROM ".$tableName." WHERE content_id='".$contentId."' AND status='P' AND publish_start_date <=NOW()");
					if($Details->num_rows() > 0){
						return ['hasarticle'=>1,'data'=>$Details->result(),'archive'=>1];
					}else{
						return ['hasarticle'=>0,'data'=>'','archive'=>0];
					}
				
				}else{
					return ['hasarticle'=>0,'data'=>'','archive'=>0];
				}
			}
	}
	
	public function article($contentType , $contentId , $sectionName , $year , $archive){
		if($contentType==1){
			$tableName = ($archive==1) ? 'article_'.$year : 'article';
			$dbname = ($archive==1) ? 'archive' : 'live_db';
			return $this->$dbname->query("SELECT content_id, section_id , section_name, publish_start_date , last_updated_on , title , url , summary_html , article_page_content_html , article_page_image_path , article_page_image_alt , article_page_image_title , tags , agency_name , author_name , author_image_path , author_image_title , author_image_alt , no_indexed , no_follow , meta_Title , meta_description  FROM ".$tableName." WHERE content_id='".$contentId."' AND status='P' AND publish_start_date <=NOW()")->result();
		}else if($contentType==3){
			$tableName = ($archive==1) ? 'gallery_'.$year : 'gallery';
			$dbname = ($archive==1) ? 'archive' : 'live_db';
			return $this->$dbname->query("SELECT content_id, section_id , section_name, publish_start_date , last_updated_on , title , url , summary_html , first_image_path as article_page_image_path , first_image_alt as article_page_image_alt , first_image_title as article_page_image_title , tags , agency_name , author_name , no_indexed , no_follow , meta_Title , meta_description  FROM ".$tableName." WHERE content_id='".$contentId."' AND status='P' AND publish_start_date <=NOW()")->result();
		}else if($contentType==4){
			$tableName = ($archive==1) ? 'video_'.$year : 'video';
			$dbname = ($archive==1) ? 'archive' : 'live_db';
			return $this->$dbname->query("SELECT content_id, section_id , section_name, publish_start_date , last_updated_on , title , url , summary_html , video_script , video_image_path as article_page_image_path , video_image_alt as article_page_image_alt , video_image_title as article_page_image_title , tags , agency_name , author_name , no_indexed , no_follow , meta_Title , meta_description  FROM ".$tableName." WHERE content_id='".$contentId."' AND status='P' AND publish_start_date <=NOW()")->result();
		}
	
	}
	
	public function more_articles($articleData,$contentTypeId,$contentID){
		if($contentTypeId==1){
			return $this->live_db->query("SELECT ar.title , ar.url ,ar.article_page_image_path ,ar.article_page_image_title FROM article as ar JOIN article_section_mapping as armap ON ar.content_id = armap.content_id WHERE armap.section_id='".$articleData->section_id."' AND  ar.content_id!='".$contentID."' AND ar.status='P' AND ar.publish_start_date <=NOW() ORDER BY ar.publish_start_date DESC LIMIT 5")->result();
		}else if($contentTypeId==3){
			return $this->live_db->query("SELECT ar.title , ar.url ,ar.first_image_path as article_page_image_path ,ar.first_image_title as article_page_image_title FROM gallery as ar JOIN gallery_section_mapping as armap ON ar.content_id = armap.content_id WHERE armap.section_id='".$articleData->section_id."' AND  ar.content_id!='".$contentID."' AND ar.status='P' AND ar.publish_start_date <=NOW() ORDER BY ar.publish_start_date DESC LIMIT 5")->result();
		}else if($contentTypeId==4){
			return $this->live_db->query("SELECT ar.title , ar.url ,ar.video_image_path as article_page_image_path ,ar.video_image_title as article_page_image_title FROM video as ar JOIN video_section_mapping as armap ON ar.content_id = armap.content_id WHERE armap.section_id='".$articleData->section_id."' AND  ar.content_id!='".$contentID."' AND ar.status='P' AND ar.publish_start_date <=NOW() ORDER BY ar.publish_start_date DESC LIMIT 5")->result();
		}
	}
	
	public function gallery_images($contentId , $year, $archive){
		$tableName = ($archive==1) ? 'gallery_related_images_'.$year : 'gallery_related_images';
		$dbname = ($archive==1) ? 'archive' : 'live_db';
		return $this->$dbname->query("SELECT gallery_image_path , gallery_image_title , gallery_image_alt FROM ".$tableName." WHERE content_id='".$contentId."' ORDER BY display_order ASC")->result();
	
	}
}
?>