<?php 
/**
 * Widget Model Controller Class
 *
 * @package	NewIndianExpress
 * @category	News
 * @author	NIE Team
 */

class Widget_model extends CI_Model
{
	
  public function __construct() 
	 {
		parent::__construct();
		 $CI = &get_instance();
		//setting the second parameter to TRUE (Boolean) the function will return the database object.
		/*$this->archieve_db = $CI->load->database('archive_db', TRUE);
		$this->load->driver('cache', array('adapter' => 'file'));*/
		$this->live_db = $this->load->database('live_db', TRUE);
		
	}
	
	public function get_all_available_articles_auto_other_stories($max_article, $section_id, $view_mode, $lead_story_maximum_Articles , $subsec_leadstory_remdering_mode, $leadstory_contentID)
	 {
	  $class_object = new Widget_config_class;
	  return $class_object->get_all_available_articles_auto_other_stories($max_article, $section_id, $view_mode, $lead_story_maximum_Articles , $subsec_leadstory_remdering_mode, $leadstory_contentID);
	 }
	  public function get_contentdetails_from_database($content_id,$content_type,$is_home, $view_mode)
	 {
	  $class_object = new Widget_config_class;
	  return $class_object->get_contentdetails_from_database($content_id,$content_type,$is_home, $view_mode);
	 }
	 
	 public function get_contentdetails_from_database_per_page($content_id,$content_type,$is_home, $view_mode, $start,$limit)
	 {
	  $class_object = new Widget_config_class;
	  return $class_object->get_contentdetails_from_database_per_page($content_id,$content_type,$is_home, $view_mode, $start,$limit);
	 }
	 
	 
	 
	   public function get_authorimagedetails_from_live($content_id)
	 {
	  $class_object = new Widget_config_class;
	  return $class_object->get_authorimagedetails_from_live($content_id);
	 }
	 
	 
	  public function get_all_available_articles_auto_live($content_id)
	 {
	  $class_object = new Widget_config_class;
	  return $class_object->get_all_available_articles_auto_live($content_id);
	 }
	 
	public function get_liveContents_by_sectionId_count($max_article, $section_id, $view_mode, $lead_story_maximum_Articles , $subsec_leadstory_remdering_mode, $leadstory_contentID, $contentType_id,$is_home)
	 {
	  $class_object = new Widget_config_class;
	  return $class_object->get_liveContents_by_sectionId_count($max_article, $section_id, $view_mode, $lead_story_maximum_Articles , $subsec_leadstory_remdering_mode, $leadstory_contentID, $contentType_id,$is_home);
	 }
	 
	 
	 public function get_liveContents_by_sectionId($max_article, $section_id, $view_mode, $lead_story_maximum_Articles , $subsec_leadstory_remdering_mode, $leadstory_contentID, $contentType_id,$is_home)
	 {
	  $class_object = new Widget_config_class;
	  return $class_object->get_liveContents_by_sectionId($max_article, $section_id, $view_mode, $lead_story_maximum_Articles , $subsec_leadstory_remdering_mode, $leadstory_contentID, $contentType_id,$is_home);
	 }

	 public function rightside_otherstories_articlepage($max_article,  $view_mode,$sectionid,$content_id)
	 {
	  $class_object = new Widget_config_class;
	  return $class_object->rightside_otherstories_articlepage($max_article, $view_mode,$sectionid,$content_id);
	 }
	 
	 public function get_sectionid_by_article($contentid, $view_mode)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_sectionid_by_article($contentid, $view_mode);
	}
	 public function get_section_top_story($content_id, $content_type)
	 {
	  $class_object = new Widget_config_class;
	  return $class_object->get_section_top_story($content_id, $content_type);
	 }
	 public function get_widget_byname($widgetname, $view_mode)
	 {
	  $class_object = new Widget_config_class;
	  return $class_object->get_widget_byname($widgetname, $view_mode);
	 }
    public function get_gallery_images_by_id($content_id)
	 {
	  $class_object = new Widget_config_class;
	  return $class_object->get_gallery_images_by_id($content_id);
	 }
 
	  public function get_RightSide_Galleries($max_article, $section_id, $view_mode,$sectionid)
	 {
	  $class_object = new Widget_config_class;
	  return $class_object->get_RightSide_Galleries($max_article, $section_id, $view_mode,$sectionid);
	 }
	  public function get_RightSide_Videos($max_article, $section_id, $view_mode,$sectionid)
	 {
	  $class_object = new Widget_config_class;
	  return $class_object->get_RightSide_Videos($max_article, $section_id, $view_mode,$sectionid);
	 }
	 
	  public function get_Stories_For_Author($max_article, $section_id, $view_mode,$sectionid)
	 {
	  $class_object = new Widget_config_class;
	  return $class_object->get_Stories_For_Author($max_article, $section_id, $view_mode,$sectionid);
	 }
	 public function get_RightSide_OtherStories_Contents_Type1($max_article, $view_mode,$sectionid, $parentsection_id)
	 {
	  $class_object = new Widget_config_class;
	  return $class_object->get_RightSide_OtherStories_Contents_Type1($max_article,  $view_mode,$sectionid, $parentsection_id);
	 }
	 
	 public function get_RightSide_OtherStories_Contents_Type2($max_article, $view_mode,$sectionid)
	 {
	  $class_object = new Widget_config_class;
	  return $class_object->get_RightSide_OtherStories_Contents_Type2($max_article, $view_mode,$sectionid);
	 }
	 
	 public function get_RightSide_OtherStories_Contents_Type3($max_article, $view_mode,$sectionid)
	 {
	  $class_object = new Widget_config_class;
	  return $class_object->get_RightSide_OtherStories_Contents_Type1($max_article, $view_mode,$sectionid);
	 }
	 public function rightside_otherstories_type2($max_article, $section_id, $view_mode,$sectionid)
	 {
	  $class_object = new Widget_config_class;
	  return $class_object->rightside_otherstories_type2($max_article, $section_id, $view_mode,$sectionid);
	 }
	 
	public function get_widget_breakingNews()
	{
		$class_object = new Widget_config_class;
		return $class_object->get_widget_breakingNews();
	}
	
	public function get_widget_breakingNews_content($view_mode)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_widget_breakingNews_content($view_mode);
	}
	
	public function get_widget_Polls()
	{
		$class_object = new Widget_config_class;
		return $class_object->get_widget_Polls();
	}
	
	public function fetch_poll_title($poll_id)
	{
		$class_object = new Widget_config_class;
		return $class_object->fetch_poll_title($poll_id);
	}
	
	public function select_poll($pollID)
	{
		$class_object = new Widget_config_class;
		return $class_object->select_poll($pollID);
	}
	
	
	
	public function insert_poll_results()
	{
		$class_object = new Widget_config_class;
		return $class_object->insert_poll_results();
	}

	
	public function get_section_article_for_common_widgets($section_id, $view_mode, $widgettype)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_section_article_for_common_widgets($section_id, $view_mode, $widgettype);
	}
	public function get_pagemasterdetails_using_pageid($page_id)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_pagemasterdetails_using_pageid($page_id);
	}
	
	
	public function get_all_available_articles_auto($max_article, $section_id, $content_type, $view_mode)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_all_available_articles_auto($max_article, $section_id, $content_type, $view_mode);
	}
	
	public function get_all_available_articles_auto_totalcount($max_article, $section_id, $content_type, $view_mode)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_all_available_articles_auto_totalcount($max_article, $section_id, $content_type, $view_mode);
	}
								
	public function get_widget_image_size($widget_id, $displayOrder)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_widget_image_size($widget_id, $displayOrder);
	}
	public function get_image_data_widget($content_id, $page_type)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_image_data_widget($content_id, $page_type);
	}
	
	public function get_image_data($content_id)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_image_data($content_id);
	}
	
	public function  get_gallery_image_data($content_id, $view_mode)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_gallery_image_data($content_id, $view_mode);
	}

	public function get_video_image_data($content_id)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_video_image_data($content_id);
	}
	
	public function get_parent_sectionmane($sectionID, $view_mode)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_parent_sectionmane($sectionID, $view_mode);
	}
	
	public function get_widget_setting()
    {
        $class_object = new widget_setting;
        return $class_object->get_widget_setting();
    }
    
    public function select_setting($view_mode)
    {
        $class_object = new widget_setting;
        return $class_object->select_setting($view_mode);
    }
	
	public function get_widget_mainsection_config($instance_mainsection_id,$instance_id)

	{
		$class_object = new Widget_config_class;
		return $class_object->get_widget_mainsection_config($instance_mainsection_id,$instance_id);
	}
	
	public function get_widget_mainsection_config_rendering($instance_mainsection_id, $instance_id, $view_mode)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_widget_mainsection_config_rendering($instance_mainsection_id, $instance_id, $view_mode);
	}
	
	public function get_widgetInstanceArticles_rendering($widget_instance, $mainSectionConfig_Id, $view_mode)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_widgetInstanceArticles_rendering($widget_instance, $mainSectionConfig_Id, $view_mode);
	}
	
	//
	public function get_widgetInstanceArticles_rendering_page($widget_instance, $mainSectionConfig_Id, $view_mode,$start,$limit)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_widgetInstanceArticles_rendering_page($widget_instance, $mainSectionConfig_Id, $view_mode,$start,$limit);
	}
	public function get_all_available_articles_auto_page($max_article, $section_id, $content_type, $view_mode,$start,$limit,$page_number,$TotalCount)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_all_available_articles_auto_page($max_article, $section_id, $content_type, $view_mode,$start,$limit,$page_number,$TotalCount);
	}
	//
	public function get_widgetInstanceRelatedArticles_rendering($widget_instance, $mainSectionConfig_Id, $subSectionConfig_Id, $Content_id, $view_mode)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_widgetInstanceRelatedArticles_rendering($widget_instance, $mainSectionConfig_Id, $subSectionConfig_Id, $Content_id, $view_mode);
	}
	
	
	public function get_WidgetInstancearticles_temporary_rendering($widget_instance, $mainSectionConfig_Id)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_WidgetInstancearticles_temporary_rendering($widget_instance, $mainSectionConfig_Id);
	}
	
		public function get_WidgetInstanceRelatedarticles_temporary_rendering($widget_instance, $mainSectionConfig_Id, $subSectionConfig_Id, $Content_id)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_WidgetInstanceRelatedarticles_temporary_rendering($widget_instance, $mainSectionConfig_Id, $subSectionConfig_Id, $Content_id);
	}
	
	public function get_widget_subsection_config($instance_subsection_id, $instance_mainsection_id)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_widget_subsection_config($instance_subsection_id, $instance_mainsection_id);
	}
	
	public function get_widgetInstanceArticles($widget_instance, $mainSectionConfig_Id,  $subSectionConfig_Id)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_widgetInstanceArticles($widget_instance, $mainSectionConfig_Id,  $subSectionConfig_Id);
	}
	public function get_tags_by_id($tags) {
		$class_object =  new widgettags_model;
		return $class_object->get_tags_by_id($tags);
	}
	public function get_tags($search_text) {
		$class_object =  new widgettags_model;
		return $class_object->get_tags($search_text);
	}
	public function get_tags_by_name($search_text) {
		$class_object =  new widgettags_model;
		return $class_object->get_tags_by_name($search_text);
	}
	public function get_author_by_id($authorid) {
		$class_object =  new Widget_content_class;
		return $class_object->get_author_by_id($authorid);
	}
	public function widget_article_content_by_id($contennt_id, $content_typeid, $url){
	    $class_object =  new Widget_content_class;
		return $class_object->widget_article_content_by_id($contennt_id, $content_typeid, $url);
	}
	public function widget_article_content_preview($content_id, $content_type_id){
	    $class_object =  new Widget_content_class;
		return $class_object->widget_article_content_preview($content_id, $content_type_id);
	}
	public function widget_article_admin_preview($section_id, $content_type_id){
	    $class_object =  new Widget_content_class;
		return $class_object->widget_article_admin_preview($section_id, $content_type_id);
	}
	public function get_image_by_contentid($content_id){
	    $class_object =  new Widget_content_class;
		return $class_object->get_image_by_contentid($content_id);
	}
	
	public function get_author_details($authorid) {
	    $class_object =  new Widget_content_class;
		return $class_object->get_author_details($authorid);
	}
	public function remodal_content_details_live($content_id, $content_type) {
		$class_object = new Widget_content_class;
		return $class_object->remodal_content_details_live($content_id, $content_type);
	}
	public function get_related_article_by_contentid($content_id, $view_mode) {
	   $class_object = new Widget_content_class;
		return $class_object->get_related_article_by_contentid($content_id, $view_mode);
	}
			
	public function update_most_hits_and_emailed($type, $content_type, $content_id, $title, $section_id){
		$class_object = new Widget_content_class;
		return $class_object->update_most_hits_and_emailed($type,$content_type, $content_id, $title, $section_id);
	}
	public function update_trending_read_hits($content_id, $content_type){
		$class_object = new Widget_content_class;
		return $class_object->update_trending_read_hits($content_id, $content_type);
	}	
	public function get_content_by_hit_count($time,$limit)
	{
		$class_object = new Widget_content_class;
		return $class_object->get_content_by_hit_count($time,$limit);
	}
	public function get_content_by_email_count($time,$limit)
	{
		$class_object = new Widget_content_class;
		return $class_object->get_content_by_email_count($time,$limit);
	}
	public function get_hit_for_content_by_id($content_id, $content_type_id)
	{
		$class_object = new Widget_content_class;
		return $class_object->get_hit_for_content_by_id($content_id, $content_type_id);
	}
	public function getWidgetInstance($section_id, $pagetype, $container_id, $widget_disp_order, $widget_instance, $mode )
	{
	    $class_object = new Widget_config_class;
		return $class_object->getWidgetInstance($section_id, $pagetype, $container_id, $widget_disp_order, $widget_instance, $mode );
	}
	public function  multiple_section_mapping_by_section_id($section_id) {
		$class_object = new Widget_config_class;
		return $class_object->multiple_section_mapping_by_section_id($section_id);
	}
	public function multiple_section_mapping()
	{
		$class_object = new Widget_config_class;
		return $class_object->multiple_section_mapping();
	}
	public function rss_section_mapping($view_mode)
	{
		$class_object = new Widget_config_class;
		return $class_object->rss_section_mapping($view_mode);
	}
	public function rss_section_articles($section_id, $content_type)
	{
	  	$class_object = new Widget_config_class;
		return $class_object->rss_section_articles($section_id, $content_type);
	}
	public function get_section_by_id($sectionID)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_section_by_id($sectionID);
	}
	public function CheckTopParentSection($section_id)
	{
		$class_object = new Widget_config_class;
		return $class_object->CheckTopParentSection($section_id);
	}
	public function get_sectionDetails($sectionID, $viewmode)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_sectionDetails($sectionID, $viewmode);
	}
	
	public function get_section_menudisplay($sectionID)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_section_menudisplay($sectionID);
	}

	public function display_askprabhu_qnlist($start,$per_page)
	{
		$class_object = new Widget_config_class;
		return $class_object->display_askprabhu_qnlist($start,$per_page);
	}
	

	public function get_gallery_imageId($GalleryVersionId)
	{
		$class_object =  new Widget_config_class;
		return $class_object->get_gallery_imageId($GalleryVersionId);
	}
	public function select_video_detby_ID($get_id,$content_type)
	{
		$class_object = new Widget_config_class;
		return $class_object->select_video_detby_ID($get_id,$content_type);
	}
	public function get_agency_byid($agency_id)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_agency_byid($agency_id);
	}
	public function get_sectionid_by_name($sectionname, $view_mode)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_sectionid_by_name($sectionname, $view_mode);
	}
	public function get_section_by_urlname($sectionname, $view_mode)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_section_by_urlname($sectionname, $view_mode);
	}
	public function get_author($author_id)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_author($author_id);
	}
	public function gettopic_name()
	{
		$class_object = new Widget_config_class;
		return $class_object->gettopic_name();
	}
	public function get_section_previous_article($content_id, $section_id,$content_type)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_section_previous_article($content_id, $section_id, $content_type);
	}
	public function get_section_next_article($content_id, $section_id,$content_type)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_section_next_article($content_id, $section_id, $content_type);
	}
	public function get_section_recent_article($content_id, $section_id,$content_type, $view_mode)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_section_recent_article($content_id, $section_id, $content_type, $view_mode);
	}
	
	public function get_gallery_images($content_id, $limit, $offset)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_gallery_images($content_id , $limit, $offset);
	}
	public function get_gallery_image_count($content_id)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_gallery_image_count($content_id);
	}
	
	public function get_widgetInstanceTempArticles($content_id, $user_id, $widget_type)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_widgetInstanceTempArticles($content_id, $user_id, $widget_type);
	}
	
	public function get_sub_sec_lead_stories_data($Pagesection_id, $Page_type, $WidgetDisplayOrder, $widgetId, $section_id, $version_id, $view_mode)
 {
  $class_object = new Widget_config_class;
  return $class_object->get_sub_sec_lead_stories_data($Pagesection_id, $Page_type, $WidgetDisplayOrder, $widgetId, $section_id, $version_id, $view_mode);
 }
 
 public function get_content_type($content_id)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_content_type($content_id);
	}
	public function get_content_type_byname($content_typename, $view_mode)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_content_type_byname($content_typename, $view_mode);
	}
	public function get_template_xmlcontent($pageId, $data)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_template_xmlcontent($pageId, $data);
	}
	public function get_sectionid_with_names($subsection_name, $parent_section_name, $special_section_name) 
    {
		$class_object = new Widget_config_class;
		return $class_object->get_sectionid_with_names($subsection_name, $parent_section_name, $special_section_name);
	}
	public function getPageDetails($section_id, $page_type)
	{
		$class_object = new Widget_config_class;
		return $class_object->getPageDetails($section_id, $page_type);
	}
	public  function getTemplateDetails($template_id)
	{
		$class_object = new Widget_config_class;
		return $class_object->getTemplateDetails($template_id);
	}
	public function getContainer($containerId)
	{
		$class_object = new Widget_config_class;
		return $class_object->getContainer($containerId);
	}
	
	public function get_search_result_data($order_field, $order, $start, $length, $frm_search, $to_search, $search_value, $search_by, $section, $content_type, $type_search, $datafrom)
	{
		$class_object = new Search;
		return $class_object->get_search_result_data($order_field, $order, $start, $length, $frm_search, $to_search, $search_value, $search_by, $section, $content_type, $type_search, $datafrom);
	}
	public function get_search_result_data_recursive($order_cond, $order, $start, $length, $frm_search, $to_search, $search_value, $search_by, $section, $content_type, $type_search, $table)
	{
		$class_object = new Search;
		return $class_object->get_search_result_data_recursive($order_cond, $order, $start, $length, $frm_search, $to_search, $search_value, $search_by, $section, $content_type, $type_search, $table);
	}
	function time2string($timeline)
	{
		$set_object=new Widget_config_class;
		return $set_object->time2string($timeline);
	}
	
	public function get_author_by_name($author_name)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_author_by_name($author_name);
	}
	
	public function get_author_content_auto($max_article, $author_name , $section_id, $content_type ,  $view_mode)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_author_content_auto($max_article, $author_name , $section_id, $content_type ,  $view_mode);
	}
	
	public function get_author_content_auto_page($max_article, $author_name , $content_type ,  $view_mode, $start , $limit, $section_id)
	{
		$class_object = new Widget_config_class;
		return $class_object->get_author_content_auto_page($max_article, $author_name , $content_type ,  $view_mode, $start, $limit, $section_id);
	}
	public function insert_subscribed_email($email)
	{
		$class_object = new Widget_config_class;
		return $class_object->insert_subscribed_email($email);
	}
	public function widget_archive_article_content_by_id($old_article_id, $content_type, $current_url, $table, $ecenic)
	{
	    $class_object = new Widget_content_class_archieve;
		return $class_object->widget_archive_article_content_by_id($old_article_id, $content_type, $current_url, $table, $ecenic);
	}
	public function get_related_article_from_archieve($old_article_id, $table)
	{
	 $class_object = new Widget_content_class_archieve;
		return $class_object->get_related_article_from_archieve($old_article_id, $table);
	}
}

class Widget_config_class extends Widget_model
{
	
	public function get_template_xmlcontent($pageId, $data)
	{
		
		$result 	 = $this->live_db->query("CALL get_xmlpage_details('". $pageId."')");
		
		if($data == "xmldata")
		{
			foreach ($result->result() as $row)
			{			
			  $xml_content = $row->templatexml;		  
			}		
		}
		else
		{
			$xml_content = $result->row_array();
		}
		return  $xml_content;
		
	}
	public function get_sectionid_with_names($subsection_name, $parent_section_name, $special_section_name) 
	{
		$query = $this->live_db->query( "CALL get_sectionid_with_names ( '".$subsection_name."', '".$parent_section_name."', '".$special_section_name."' )" );
		$result = $query->result_array();	
		return $result;
	}
	public function getPageDetails($section_id, $page_type)
	{
		$sec_page_details = $this->live_db->query("CALL get_pagemaster_using_sectionid('".$section_id."', ".$page_type.")");
		$result = $sec_page_details->row_array();
		return $result;
	}
	
public function getWidgetInstance($section_id, $pagetype, $container_id, $widget_disp_order, $widget_instance, $mode )
	{
		if($mode == 'live'){
		$query 	= $this->live_db->query("CALL get_widget_instance('".$section_id."', '".$pagetype."', '".$container_id."', '".$widget_disp_order."', '".$widget_instance."')");
		}else{
		$query 	= $this->db->query("CALL get_widget_instance('".$section_id."', '".$pagetype."', '".$container_id."', '".$widget_disp_order."', '".$widget_instance."', '".$mode."', '')");
		}
	    $result = $query->row_array();		
		
		if($widget_instance != '')
		{
			return $result;
		}
		else
		{
			return $result['WidgetInstance_id'];
		}
	}
	public function getTemplateDetails($template_id)
	{
			$query  = $this->live_db->query("CALL get_pagetemplates('1', '".$template_id."')");	
			$result = $query->row_array();
		return $result; 
	}	
	public function getContainer($containerId)
	{
		$query  = $this->live_db->query("CALL get_containers('', '".$containerId."')");	
		$result = $query->row_array();
		return $result;
	}
public function get_sub_sec_lead_stories_data($Pagesection_id, $Page_type, $WidgetDisplayOrder, $widgetId, $section_id, $version_id,  $view_mode)
 {
	 if($view_mode == "live")
	 {
		$subsection_leadstory = $this->live_db->query("CALL get_widget_instance_other_stories('".$Pagesection_id."', '".$Page_type."', '".$WidgetDisplayOrder."', '".$section_id."','', '".$widgetId."', '".$version_id."')");
		
	 } else
	 {
		 $subsection_leadstory = $this->db->query("CALL get_widget_instance_other_stories('".$Pagesection_id."', '".$Page_type."', '".$WidgetDisplayOrder."', '".$section_id."','', '".$widgetId."', '".$version_id."')");
	 	
	 }
	//echo $this->db->last_query();die();
  return $subsection_leadstory;
 }
 public function get_section_top_story($content_id, $content_type)
 {
	  $top_story = $this->live_db->query("CALL get_section_top_story('".$content_id."', '".$content_type."')");
	  $result = $top_story->result_array();
	return $result; 
 }
public function get_widget_byname($widgetname, $view_mode)
 {
	 if($view_mode =="live"){
	  $subsection_widgetID = $this->live_db->query("CALL get_widget_byname('".$widgetname."')");
	 }else{
	  $subsection_widgetID = $this->db->query("CALL get_widget_byname('".$widgetname."')");
	 }
	  $result = $subsection_widgetID->row_array();
	  return $result;
 }
 function get_gallery_images_by_id($content_id)
 {
	$get_gallery = $this->live_db->query("CALL get_gallery_images_by_id('".$content_id."')");
	$result = $get_gallery->result_array();
	return $result; 
 }
 
public function rightside_otherstories_articlepage($max_article, $view_mode,$sectionid,$content_id)
{
	if($view_mode == "adminview")
	{
		$order_field    = "cm.Modifiedon";
		$order    = "DESC";
		$start_limt  = "0";
		$length   = $max_article;
		$check_in   = "";
		$check_out   = "";
		$Search_value  = "";
		$Search_by   = "";
		//$Section   = $section_id;
		$Status   = "P";
		$content_type  = "1";
				 
		$article_manager  =  $this->db->query('CALL  get_Rightside_Otherstories_Articlepage (" ORDER BY '.$order_field.' '.$order.' LIMIT '.$start_limt.', '.$length.'","'.$sectionid.'","'.$content_id.'")');
		$result = $article_manager->result_array();
	}
	else
	{
	  	$order_field    = "cm.last_updated_on";
		$order    = "DESC";
		$start_limt  = "0";
		$length   = $max_article;
		$check_in   = "";
		$check_out   = "";
		$Search_value  = "";
		$Search_by   = "";
		//$Section   = $section_id;
		$Status   = "P";
		$content_type  = "1";
				 
		$article_manager  =  $this->live_db->query('CALL  get_Rightside_Otherstories_Articlepage (" ORDER BY '.$order_field.' '.$order.' LIMIT '.$start_limt.', '.$length.'","'.$sectionid.'","'.$content_id.'")');
		$result = $article_manager->result_array();
	}
     return $result;
	 
}

public function get_sectionid_by_article($contentid, $view_mode)
	{
		if($view_mode == "adminview")
		{
			$sectionid = $this->db->query("CALL get_sectionid_by_article('".$contentid."')")->result_array();
		}
		else
		{
			$sectionid = $this->live_db->query("CALL get_sectionid_by_article('".$contentid."')")->result_array();
		}
		return $sectionid;
	}
 public function get_all_available_articles_auto_other_stories($max_article, $section_id, $view_mode, $lead_story_maximum_Articles , $subsec_leadstory_remdering_mode, $leadstory_contentID)
 {
  if($subsec_leadstory_remdering_mode == "manual")
  {
    $order_field    = "Modifiedon";
    $order    = "DESC";
    $start_limt  = $lead_story_maximum_Articles;
    $length   = $max_article;
    $check_in   = "";
    $check_out   = "";
    $Search_value  = "";
    $Search_by   = "";
    $Section   = $section_id;
    $Status   = "P";
    $content_type  = "1";
    	
    	$article_manager  =  $this->db->query('CALL  required_widget_auto_content_other_stories (" ORDER BY '.$order_field.' '.$order.' LIMIT '.$start_limt.', '.$length.'","'.$check_in.'","'.$check_out.'","'.$Search_value.'","'.$Search_by.'","'.$Section.'","'.$Status.'","'.$content_type.'","'.$view_mode.'", "'.$leadstory_contentID.'")');
		$result = $article_manager->result_array();
   
     return  $result;
 
  }
  else
  {
   
     $order_field    = "Modifiedon";
     $order    = "DESC";
     $start_limt  = $lead_story_maximum_Articles;
     $length   = $max_article;
     $check_in   = "";
     $check_out   = "";
     $Search_value  = "";
     $Search_by   = "";
     $Section   = $section_id;
     $Status   = "P";
     $content_type  = "1";
	 
    	 
			$article_manager  =  $this->db->query('CALL  required_widget_auto_content (" ORDER BY '.$order_field.' '.$order.' LIMIT '.$start_limt.', '.$length.'","'.$check_in.'","'.$check_out.'","'.$Search_value.'","'.$Search_by.'","'.$Section.'","'.$Status.'","'.$content_type.'","'.$view_mode.'")');
			$result = $article_manager->result_array();
  
 		
      return  $result;
  
  }
 }
 
 public function get_liveContents_by_sectionId_count($max_article, $section_id, $view_mode, $lead_story_maximum_Articles , $subsec_leadstory_remdering_mode, $leadstory_contentID, $contentType_id, $is_home)
{ 
  if($subsec_leadstory_remdering_mode == "manual")
  {
    $order_field    = "last_updated_on";
    $order    = "DESC";
    $start_limt  = $lead_story_maximum_Articles;
    //$length   = $max_article;
    $length   = '';
	$check_in   = "";
    $check_out   = "";
    $Search_value  = "";
    $Search_by   = "";
    $Section   = $section_id;
    $Status   = "P";
    $content_type  = $contentType_id;
	if($view_mode == "live")
	{
		$article_manager  =  $this->live_db->query('CALL other_stories_contents ("'.$leadstory_contentID.'","'.$Section.'","'.$start_limt.'", "'.$length.'","'.$is_home.'", "'.$contentType_id.'")');	
	}
	else
	{ 
		$article_manager  = $this->db->query('CALL other_stories_contents("'.$leadstory_contentID.'","'.$Section.'","'.$start_limt.'", "'.$length.'","'.$is_home.'", "'.$contentType_id.'")');	
	}
		
	// $result = $article_manager->num_rows();
	$result = $article_manager;	
     return $result;
  }
  else
  {
   
     $order_field    = "last_updated_on";
     $order    = "DESC";
     $start_limt  = $lead_story_maximum_Articles;
     $length   = $max_article;
     $check_in   = "";
     $check_out   = "";
     $Search_value  = "";
     $Search_by   = "";
     $Section   = $section_id;
     $Status   = "P";
     $content_type  = $contentType_id;
	if($view_mode == "live")
	{
		$article_manager  =   $this->live_db->query('CALL other_stories_contents ("'.$leadstory_contentID.'","'.$Section.'","'.$start_limt.'", "'.$length.'","'.$is_home.'", "'.$contentType_id.'")');	
	}
	else
	{
		$article_manager  = $this->db->query('CALL other_stories_contents("'.$leadstory_contentID.'","'.$Section.'","'.$start_limt.'", "'.$length.'","'.$is_home.'","'.$contentType_id.'")');	
		
	}	
	// $result = $article_manager->num_rows();	
     $result = $article_manager;	
	 return $result;
  }
 }
 
 public function get_contentdetails_from_database($content_id,$content_type,$is_home , $view_mode)
 {

	 if($view_mode == "live"){
	 $article_manager  =  $this->live_db->query('CALL  get_contentdetails_from_live ("'.$content_id.'","'.$content_type.'","'.$is_home.'")');
	 }else{
	 $article_manager  =  $this->db->query('CALL  get_contentdetails_from_cms ("'.$content_id.'","'.$content_type.'","'.$is_home.'")');
	 }
	 //echo $this->db->last_query(); die();
	 $result = $article_manager->result_array();
     return $result;
 }
 
 public function get_contentdetails_from_database_per_page($content_id,$content_type,$is_home , $view_mode, $start,$limit)
 {

	 if($view_mode == "live"){
	 $article_manager  =  $this->live_db->query('CALL  get_contentdetails_from_live_per_page ("'.$content_id.'","'.$content_type.'","'.$is_home.'" , "'.$start.'", "'.$limit.'")');
	 }else{
	 $article_manager  =  $this->db->query('CALL  get_contentdetails_from_cms_per_page ("'.$content_id.'","'.$content_type.'","'.$is_home.'", "'.$start.'", "'.$limit.'")');
	 }
		
	 $result = $article_manager->result_array();
     return $result;
 }
 
 public function get_authorimagedetails_from_live($content_id)
 {
		$article_manager  =  $this->live_db->query('CALL  get_authorimagedetails_from_live ("'.$content_id.'")');
		$result = $article_manager->result_array();
     return $result;
 }
 
 public function get_all_available_articles_auto_live($content_id,$content_type,$is_home)
 {
		$article_manager  =  $this->live_db->query('CALL  get_all_available_articles_auto_live ("'.$content_id.'","'.$content_type.'","'.$is_home.'")');
		$result = $article_manager->result_array();
     return $result;
 }
 
 public function get_liveContents_by_sectionId($max_article, $section_id, $view_mode, $lead_story_maximum_Articles , $subsec_leadstory_remdering_mode, $leadstory_contentID, $contentType_id,$is_home)
{

 if($subsec_leadstory_remdering_mode == "manual")
  {
    $order_field    = "last_updated_on";
    $order    = "DESC";
    $start_limt  = $lead_story_maximum_Articles;
    $length   = $max_article;
    $check_in   = "";
    $check_out   = "";
    $Search_value  = "";
    $Search_by   = "";
    $Section   = $section_id;
    $Status   = "P";
    $content_type  = $contentType_id;
	if($view_mode == "live")
	{
		$article_manager  =  $this->live_db->query('CALL other_stories_contents ("'.$leadstory_contentID.'","'.$Section.'","'.$start_limt.'", "'.$length.'","'.$is_home.'", "'.$contentType_id.'")');
	}
	else
	{ 
			//echo 'CALL  other_stories_contents ("'.$leadstory_contentID.'","'.$Section.'","'.$start_limt.'", "'.$length.'","'.$is_home.'", "'.$contentType_id.'")';die();

		$article_manager  = $this->db->query('CALL other_stories_contents("'.$leadstory_contentID.'","'.$Section.'","'.$start_limt.'", "'.$length.'","'.$is_home.'","'.$contentType_id.'")');		
	}
		
	 $result = $article_manager->result_array();
     return $result;
  }
  else
  {
   
     $order_field    = "last_updated_on";
     $order    = "DESC";
     $start_limt  = $lead_story_maximum_Articles;
     $length   = $max_article;
     $check_in   = "";
     $check_out   = "";
     $Search_value  = "";
     $Search_by   = "";
     $Section   = $section_id;
     $Status   = "P";
     $content_type  = $contentType_id;
	if($view_mode == "live")
	{
		$article_manager  =   $this->live_db->query('CALL  other_stories_contents ("'.$leadstory_contentID.'","'.$Section.'","'.$start_limt.'", "'.$length.'","'.$is_home.'", "'.$contentType_id.'")');	
	}
	else
	{
		//echo 'CALL  other_stories_contents ("'.$leadstory_contentID.'","'.$Section.'","'.$start_limt.'", "'.$length.'","'.$is_home.'", "'.$contentType_id.'")';die();

		$article_manager  = $this->db->query('CALL other_stories_contents("'.$leadstory_contentID.'","'.$Section.'","'.$start_limt.'", "'.$length.'","'.$is_home.'", "'.$contentType_id.'")');
	}
	 $result = $article_manager->result_array();
     return $result;
  
  }
 }
 
 public function get_RightSide_Galleries($max_article, $section_id, $view_mode,$sectionid)
 {
 
  
    $order_field    = "publish_on";
    $order    = "DESC";
    $start_limt  = "0";
    $length   = $max_article;
    $check_in   = "";
    $check_out   = "";
    $Search_value  = "";
    $Search_by   = "";
    $Section   = $section_id;
    $Status   = "P";
    $content_type  = "1";
	
 	$article_manager  =  $this->live_db->query('CALL  get_RightSide_Galleries (" ORDER BY '.$order_field.' '.$order.' LIMIT '.$start_limt.', '.$length.'","'.$sectionid.'")');
	
		$result = $article_manager->result_array();
     return $result;
 }
 
  public function get_RightSide_Videos($max_article, $section_id, $view_mode,$sectionid)
 {
 
  
    $order_field    = "publish_on";
    $order    = "DESC";
    $start_limt  = "0";
    $length   = $max_article;
    $check_in   = "";
    $check_out   = "";
    $Search_value  = "";
    $Search_by   = "";
    $Section   = $section_id;
    $Status   = "P";
    $content_type  = "1";
 	$article_manager  =  $this->live_db->query('CALL  get_RightSide_Videos (" ORDER BY '.$order_field.' '.$order.' LIMIT '.$start_limt.', '.$length.'","'.$sectionid.'")');
	
		$result = $article_manager->result_array();
     return $result;
 }
 
 public function get_Stories_For_Author($max_article, $section_id, $view_mode,$authorid)
 {
 
  
    $order_field    = "publish_on";
    $order    = "DESC";
    $start_limt  = "0";
    $length   = $max_article;
    $check_in   = "";
    $check_out   = "";
    $Search_value  = "";
    $Search_by   = "";
    $Section   = $section_id;
    $Status   = "P";
    $content_type  = "1";
	
		$article_manager  =  $this->live_db->query('CALL  get_Stories_For_Author (" ORDER BY '.$order_field.' '.$order.' LIMIT '.$start_limt.', '.$length.'","'.$authorid.'")');
	
		$result = $article_manager->result_array();
     return $result;
 }
 
 
 public function get_RightSide_OtherStories_Contents_Type1($max_article,  $view_mode,$sectionid, $parentsection_id)
 {
 
  if($view_mode == "live")
  {
  		$order_field    = "cm.last_updated_on";
		$order    = "DESC";
		$start_limt  = "0";
		$length   = $max_article;
		$check_in   = "";
		$check_out   = "";
		$Search_value  = "";
		$Search_by   = "";
		//$Section   = $section_id;
		$Status   = "P";
		$content_type  = "1";
		
		$article_manager  =  $this->live_db->query('CALL  get_RightSide_OtherStories_Contents_Type1 (" ORDER BY '.$order_field.' '.$order.' LIMIT '.$start_limt.', '.$length.'","'.$sectionid.'", "'.$parentsection_id.'")')->result_array();
  } 
  else 
  {
	  	$order_field    = "cm.Modifiedon";
		$order    = "DESC";
		$start_limt  = "0";
		$length   = $max_article;
		$check_in   = "";
		$check_out   = "";
		$Search_value  = "";
		$Search_by   = "";
		//$Section   = $section_id;
		$Status   = "P";
		$content_type  = "1";
		
		$article_manager  =  $this->db->query('CALL  get_RightSide_OtherStories_Contents_Type1 (" ORDER BY '.$order_field.' '.$order.' LIMIT '.$start_limt.', '.$length.'","'.$sectionid.'", "'.$parentsection_id.'")')->result_array();
		
  }
     return $article_manager;
 }
 
 public function get_RightSide_OtherStories_Contents_Type2($max_article, $view_mode,$sectionid)
 {
	 if($view_mode == "live")
	  {
			$order_field    = "cm.last_updated_on";
			$order    = "DESC";
			$start_limt  = "0";
			$length   = $max_article;
			$check_in   = "";
			$check_out   = "";
			$Search_value  = "";
			$Search_by   = "";
			//$Section   = $section_id;
			$Status   = "P";
			$content_type  = "1";
		
			
			$article_manager  =  $this->live_db->query('CALL  get_RightSide_OtherStories_Contents_Type2 (" ORDER BY '.$order_field.' '.$order.' LIMIT '.$start_limt.', '.$length.'","'.$sectionid.'")');
			
			$result = $article_manager->result_array();
	 } 
	  else 
	  {
		 $order_field    = "cm.Modifiedon";
		$order    = "DESC";
		$start_limt  = "0";
		$length   = $max_article;
		$check_in   = "";
		$check_out   = "";
		$Search_value  = "";
		$Search_by   = "";
		//$Section   = $section_id;
		$Status   = "P";
		$content_type  = "1";
		
			
			$article_manager  =  $this->db->query('CALL  get_RightSide_OtherStories_Contents_Type2 (" ORDER BY '.$order_field.' '.$order.' LIMIT '.$start_limt.', '.$length.'","'.$sectionid.'")');
			
			$result = $article_manager->result_array();
  	}
     return $result;
 }
 
 
 public function get_RightSide_OtherStories_Contents_Type3($max_article, $section_id, $view_mode,$sectionid,$parentsectionid)
 {
  
    $order_field    = "publish_on";
    $order    = "DESC";
    $start_limt  = "0";
    $length   = $max_article;
    $check_in   = "";
    $check_out   = "";
    $Search_value  = "";
    $Search_by   = "";
    $Section   = $section_id;
    $Status   = "P";
    $content_type  = "1";


    	$article_manager  =  $this->live_db->query('CALL  get_RightSide_OtherStories_Contents_Type3 (" ORDER BY '.$order_field.' '.$order.' LIMIT '.$start_limt.', '.$length.'","'.$Section.'","'.$view_mode.'","'.$sectionid.'","'.$parentsectionid.'")');
		
		$result = $article_manager->result_array();
     return $result;
 }
	public function multiple_section_mapping()
	{
		$empty_val = '';
		
			$get_result = $this->live_db->query('CALL get_section_menudisplay("'.$empty_val.'")')->result_array();
		
            foreach($get_result as $key => $get_multi_section)
            {
				$get_sec_id = $get_multi_section['Section_id'];
					
					$sub_section_result = $this->live_db->query('CALL get_section_menudisplay("'.$get_sec_id.'")')->result_array();
				
				foreach($sub_section_result as $sub_key => $sub_section) {
					
						$get_sub_sec_id = $sub_section['Section_id'];
					
						$sub_list_multi_sectn = $this->live_db->query('CALL get_section_menudisplay("'.$get_sub_sec_id.'")')->result_array();


				}
				
				$get_multi_section['sub_section'] = $sub_section_result;
				
				
                $get_result[$key] = $get_multi_section;
            }
		
            return $get_result;
	}
	
	public function rss_section_mapping($view_mode)
	{
		$empty_val = '';
        if($view_mode == "live"){
		$list_multi_sectn = $this->live_db->query('CALL get_rss_section_list("'.$empty_val.'")');
		}else{
		$list_multi_sectn = $this->db->query('CALL get_rss_section_list("'.$empty_val.'")');
		}
		
		$get_result = $list_multi_sectn->result_array();
		
            foreach($get_result as $key => $get_multi_section)
            {
				
				$get_sec_id = $get_multi_section['Section_id'];
				 if($view_mode == "live"){
				$list_multi_sectn = $this->live_db->query('CALL get_rss_section_list("'.$get_sec_id.'")');
				 }
				 else{
				 $list_multi_sectn = $this->db->query('CALL get_rss_section_list("'.$get_sec_id.'")');
				 }
				
               $sub_section_result = $list_multi_sectn->result_array();
				
				foreach($sub_section_result as $sub_key => $sub_section) {
					
					$get_sub_sec_id = $sub_section['Section_id'];
					 if($view_mode == "live"){
					$sub_list_multi_sectn = $this->live_db->query('CALL get_rss_section_list("'.$get_sub_sec_id.'")');
					 }
					 else
					 {
					 $sub_list_multi_sectn = $this->db->query('CALL get_rss_section_list("'.$get_sub_sec_id.'")');
					 }
					
					
					$sub_section_result[$sub_key]['sub_sub_section'] = $sub_list_multi_sectn->result_array();
					
				}
				
				$get_multi_section['sub_section'] = $sub_section_result;
				
				
                $get_result[$key] = $get_multi_section;
            }
			
            return $get_result;

	}
	public function rss_section_articles($section_id,$content_type)
	{
	$order_field ='last_updated_on';
	$order = 'Desc';
	$start = 0;
	$length =100;
	$rss_article =  $this->live_db->query('CALL get_rss_section_articles("'.$section_id.'","'.$content_type.'", " ORDER BY '.$order_field.' '.$order.' LIMIT '.$start.', '.$length.'")')->result_array();
	 return $rss_article;
	}
		
	public function multiple_section_mapping_by_section_id($sec_id)
	{
		$empty_val = '';
		
			$list_multi_sectn = $this->live_db->query('CALL get_section_menudisplay("'.$sec_id.'")');
			
			$get_result = $list_multi_sectn->result_array();

            foreach($get_result as $key => $get_multi_section)
            {
				
				$get_sec_id = $get_multi_section['Section_id'];
				
					$list_multi_sectn = $this->live_db->query('CALL get_section_menudisplay("'.$get_sec_id.'")')->result_array();
					
                $get_multi_section['sub_section'] = $list_multi_sectn;
                $get_result[$key] = $get_multi_section;
            }
            return $get_result;
	}
	
	public function get_widget_mainsection_config($instance_mainsection_id, $instance_id)
	{
		$result 	= $this->db->query("CALL get_widget_mainsection_config('".$instance_mainsection_id."', '".$instance_id."')")->result_array();	
		return $result;
	}
	
	
public function get_widget_mainsection_config_rendering($instance_mainsection_id, $instance_id, $view_mode)
	{
		if($view_mode=='live'){
		$select_query 	= $this->live_db->query("CALL get_widget_mainsection_config_rendering('".$instance_mainsection_id."', '".$instance_id."')")->result_array();
		}else{
		$select_query 	= $this->db->query("CALL get_widget_mainsection_config_rendering('".$instance_mainsection_id."', '".$instance_id."')")->result_array();		
		}
		
		return $select_query;
	}
	
	
	public function get_widgetInstanceArticles_rendering($widget_instance, $mainSectionConfig_Id, $view_mode)
	{
		if($view_mode=='live'){
		$select_query 	= $this->live_db->query("CALL get_WidgetInstancearticles_rendering('".$widget_instance."','".$mainSectionConfig_Id."')")->result_array();
		}else{
		$select_query 	= $this->db->query("CALL get_WidgetInstancearticles_rendering('".$widget_instance."','".$mainSectionConfig_Id."')")->result_array();
		}
		return $select_query;
	}
	//
	public function get_widgetInstanceArticles_rendering_page($widget_instance, $mainSectionConfig_Id, $view_mode,$start,$limit) 
	{
		$order_field    = "publish_on";
        $order          = "DESC";
	    $length=$limit;
		if($view_mode=='live'){
		$select_query 	= $this->live_db->query('CALL  get_widgetInstanceArticles_rendering_page ("'.$widget_instance.'","'.$mainSectionConfig_Id.'","'.$start.'", "'.$length.'")')->result_array();
		}else{
		$select_query 	= $this->db->query('CALL  get_widgetInstanceArticles_rendering_page ("'.$widget_instance.'","'.$mainSectionConfig_Id.'","'.$start.'", "'.$length.'")')->result_array();
		}
		return $select_query;
	}
	public function get_all_available_articles_auto_page($max_article, $section_id, $content_type, $view_mode,$start,$limit,$page_number,$TotalCount)
	{
		
		if($TotalCount>$limit)
	{
			
		$a= floor($TotalCount/$limit);
		$b= $TotalCount%$limit;
		if($a>=$page_number)
		{
			$limit=$limit;
		}
		if($a<$page_number)
		{
			if($b!=0)
			{
				$limit=$b;
			}else 
			{
				$limit=$limit;
			}
			
		}
	}
	else 
	{
		  $limit=$TotalCount; 
	}
		
	   if($view_mode == 'live')
	   {
			$order_field 	 	    = "last_updated_on";
		    $order				    = "DESC";
			$start_limt		        = $start;
			$length			        = $limit ;
			$Section			    = $section_id;
			$Status			        = "P";
			$content_type		    = $content_type;
			$start_page= $start;
			$length_page=$limit;
            $article_manager 	=  $this->live_db->query('CALL  required_widget_auto_content (" ORDER BY '.$order_field.' '.$order.' LIMIT '.$start_limt.','.$length.' ","'.$Section.'","'.$Status.'","'.$content_type.'" )')->result_array();
			
	   }
	   else
	   {
			
		    $order_field 			= "content_id";
			$order       			= "DESC";
			$start_limt		        = $start;
			$length			        = $limit ;

			$Section			    = $section_id;
			$Status			        = "P";
			$content_type		    = $content_type;
		
		$article_manager 	=  $this->db->query('CALL  required_widget_auto_content (" ORDER BY '.$order_field.' '.$order.' LIMIT '.$start_limt.','.$length.' ","'.$Section.'","'.$Status.'","'.$content_type.'")')->result_array();
	   }
		return $article_manager;
	}
	//
	public function get_widgetInstanceRelatedArticles_rendering($widget_instance, $mainSectionConfig_Id, $subSectionConfig_Id, $Content_id, $view_mode)
	{
		if($view_mode=='live'){
			$select_query 	= $this->live_db->query("CALL get_widgetInstanceRelatedArticles_rendering('".$widget_instance."','".$mainSectionConfig_Id."','".$subSectionConfig_Id."','".$Content_id."')")->result_array();	
		}
		else{
			$select_query 	= $this->db->query("CALL get_widgetInstanceRelatedArticles_rendering('".$widget_instance."','".$mainSectionConfig_Id."','".$subSectionConfig_Id."','".$Content_id."')")->result_array();	
		}
		return $select_query;
	}
	
	
	
	public function get_WidgetInstancearticles_temporary_rendering($widget_instance, $mainSectionConfig_Id)
	{
		$select_query 	= $this->db->query("CALL get_WidgetInstancearticles_temporary_rendering('".$widget_instance."','".$mainSectionConfig_Id."')");
		$result			= $select_query->result_array();	
		return $result;
	}	
	
	public function get_WidgetInstanceRelatedarticles_temporary_rendering($widget_instance, $mainSectionConfig_Id, $subSectionConfig_Id, $Content_id)
	{
		$select_query 	= $this->db->query("CALL get_WidgetInstanceRelatedarticles_temporary_rendering('".$widget_instance."','".$mainSectionConfig_Id."','".$subSectionConfig_Id."','".$Content_id."')");		
		$result			= $select_query->result_array();	
		return $result;
	}	
	
	public function get_widget_subsection_config($widget_subsection_config_id, $widget_mainsection_config_id)
	{
		$select_query 	= $this->db->query("CALL get_widget_subsection_config('".$widget_subsection_config_id."', '".$widget_mainsection_config_id."')")->result_array();	
		return $select_query;
	}
	
	
	public function get_widgetInstanceArticles($widget_instance, $mainSectionConfig_Id,  $subSectionConfig_Id)
	{
		$select_query 	= $this->db->query("CALL get_WidgetInstancearticles('','','".$widget_instance."','".$mainSectionConfig_Id."','".$subSectionConfig_Id."')")->result_array();	
		return $select_query;
	}
	
	public function get_widget_breakingNews()
	{
		$breaking_news = $this->db->query('CALL breakingNews_datatable("ORDER BY status , Displayorder ","","","","","1")');
		return $breaking_news;
	}
	
	public function get_widget_breakingNews_content($view_mode)
	{
		if($view_mode == 'live')
			$breaking_news = $this->live_db->query('CALL select_breakingnews()');
		else
		$breaking_news = $this->db->query('CALL breakingNews_datatable("ORDER BY status , Displayorder ","","","","","1")');
		return $breaking_news->result_array();
	}
	
	public function get_widget_Polls()
	{
		$polls = $this->db->query('CALL poll_datatable("","","","","","1")');
		return $polls;
	}
	
	public function fetch_poll_title($poll_id)
	{
		 
		$fetch_article_title = $this->db->query('CALL select_article_title("'.$poll_id.'", "poll")');
		
		return $fetch_article_title;
	}
	
	public function select_poll($pollID)
	{
		 
		$polls_vote = $this->db->query('CALL select_poll_result("'.$pollID.'")');
		
		return $polls_vote;
	}
	public function get_sectionid_by_name($sectionname, $view_mode)
	{
		if($view_mode=='live'){
		$section_name = $this->live_db->query('CALL get_sectionid_by_name("'.$sectionname.'")')->row_array();
		}else{
		$section_name = $this->db->query('CALL get_sectionid_by_name("'.$sectionname.'")')->row_array();
		}
		
		return $section_name;
	}
	public function get_section_by_urlname($sectionname, $view_mode)
	{
		if($sectionname==""){
		$sectionname		     = "Home";
		}
		if($view_mode=='live'){
		$section_name = $this->live_db->query('CALL get_section_by_urlname("'.$sectionname.'")')->row_array();
		}else{
		$section_name = $this->db->query('CALL get_section_by_urlname("'.$sectionname.'")')->row_array();
		}
		return $section_name;
	}
	public function get_image_data_widget($content_id, $page_type)
	{
	$image_data = $this->db->query('CALL get_image_data_widget("'.$content_id.'", "'.$page_type.'" )')->row_array();
		return $image_data;
	}
	
	public function display_askprabhu_qnlist($start,$per_page)
	{
		$Order = " ORDER BY SubmittedOn DESC LIMIT ".$start.", ".$per_page."";
		$image_data = $this->db->query('CALL display_askprabhu_qnlist("'.$Order.'")');
		return $image_data->result_array();
	}
	public function get_widgetInstanceTempArticles($content_id, $user_id, $widget_type)
	{
		$select_query 	= $this->db->query("CALL get_sectionWidgetArticles('".$content_id."', '".$user_id."',  1, '".$widget_type."')");
		$result			= $select_query->result_array();	
		return $result;
	}
	
	public function insert_poll_results()
	{
		extract($_POST);
		$option1="";
		$option2="";
		$option3="";
		$option4="";
		$option5="";
		if($get_option=='1')
			$option1 .= $get_count;
		elseif($get_option=='2')
			$option2 .= $get_count;
		elseif($get_option=='3')
			$option3 .= $get_count;
		elseif($get_option=='4')
			$option4 .= $get_count;
		elseif($get_option=='5')
			$option5 .= $get_count;

		
		
		$fetch_poll_vote = $this->db->query('CALL select_poll_result("'.$get_poll_id.'")')->num_rows();
         
		
	
		if($fetch_poll_vote==0)
		{
			$poll_result = $this->db->query("CALL insert_poll_result('".$option1."', '".$option2."', '".$option3."', '".$option4."', '".$option5."', '".$get_poll_id."', '')");
		    
		}
		else 
		{
			$poll_result = $this->db->query("CALL update_poll_result('".$option1."', '".$option2."', '".$option3."', '".$option4."', '".$option5."', '".$get_poll_id."', '')");
		     
		}
		if($poll_result==true)
		{
			$cookie= array(
			  'name'   => 'IE_pollID'.$instance_id,
			  'value'  => $get_poll_id,
			  'expire' => '0',
			  );
			  $this->input->set_cookie($cookie);
			echo "success";
		}
		else{
			echo "failure";
		}
	}
	

	public function get_section_article_for_common_widgets($section_id, $view_mode, $widgettype)
	{
	if($view_mode == 'live'){  // changes after 26/02/2016
	$article_manager 	=  $this->live_db->query('CALL  get_section_article_for_common_widgets('.$section_id.', "'.$widgettype.'")')->result_array();
	}else{
	$article_manager 	=  $this->db->query('CALL  get_section_article_for_common_widgets('.$section_id.', "'.$widgettype.'")')->result_array();
	}
		return $article_manager;
	}
	
	
	public function get_pagemasterdetails_using_pageid($page_id)
	{
			$article_manager 	=  $this->db->query('CALL  get_pagemasterdetails_using_pageid('.$page_id.')')->result_array();
		return $article_manager;
	}
	public function get_all_available_articles_auto($max_article, $section_id, $content_type, $view_mode)
	{
	   if($view_mode == 'live')
	   {
			$order_field 	 	    = "last_updated_on";
		    $order				    = "DESC";
			$start_limt		        = "0";
			$length			        = ($max_article!='' && $max_article!='0') ? $max_article : 5 ;
			
			$Section			    = $section_id;
			$Status			        = "P";
			$content_type		    = $content_type;

			$article_manager 	=  $this->live_db->query('CALL  required_widget_auto_content (" ORDER BY '.$order_field.' '.$order.' LIMIT '.$start_limt.','.$length.' ","'.$Section.'","'.$Status.'","'.$content_type.'")')->result_array();
	   }
	   else
	   {
			$order_field 			= "Modifiedon";
			$order       			= "DESC";
			$start_limt     		= "0";
			$length 				= ($max_article!='' && $max_article!='0') ? $max_article : 5 ;

			$Section			    = $section_id;
			$Status			        = "P";
			$content_type		    = $content_type;
		
		$article_manager 	=  $this->db->query('CALL  required_widget_auto_content (" ORDER BY '.$order_field.' '.$order.' LIMIT '.$start_limt.','.$length.' ","'.$Section.'","'.$Status.'","'.$content_type.'")')->result_array();
	   }
		return $article_manager;
	}
	
	public function get_all_available_articles_auto_totalcount($max_article, $section_id, $content_type, $view_mode)
	{
	   if($view_mode == 'live')
	   {
			$order_field 	 	    = "last_updated_on";
		    $order				    = "DESC";
			$start_limt		        = "0";
			//$length			        = ($max_article!='' && $max_article!='0') ? $max_article : 5 ;
			$length			        = $max_article ;
			$Section			    = $section_id;
			$Status			        = "P";
			$content_type		    = $content_type;

			$article_manager 	=  $this->live_db->query('CALL  required_widget_auto_content_totalcount (" ORDER BY '.$order_field.' '.$order.'","'.$Section.'","'.$Status.'","'.$content_type.'","'.$start_limt.'","'.$length.'")')->result_array();
	   }
	   else
	   {
			$order_field 			= "Modifiedon";
			$order       			= "DESC";
			$start_limt     		= "0";
			//$length 				= ($max_article!='' && $max_article!='0') ? $max_article : 5 ;
			$length			        = $max_article ;
			$Section			    = $section_id;
			$Status			        = "P";
			$content_type		    = $content_type;
		
		$article_manager 	=  $this->db->query('CALL  required_widget_auto_content_totalcount (" ORDER BY '.$order_field.' '.$order.'","'.$Section.'","'.$Status.'","'.$content_type.'","'.$start_limt.'","'.$length.'")')->result_array();
	   }
		return $article_manager;
	}
	
	public function get_widget_image_size($widget_id, $displayOrder)
	{
			$widget_image_size = $this->db->query("CALL select_widget_image_details('".$widget_id."', '".$displayOrder."')")->result_array();
		return $widget_image_size;
	}
	public function get_section_by_id($sectionID)
	{
		$get_sectionname = $this->live_db->query("CALL get_section_by_id('".$sectionID."')")->row_array();
		return $get_sectionname;
	}
	public function CheckTopParentSection($section_id)
	{
		$Section_Details = $this->live_db->query("CALL get_section_by_id('".$section_id."')")->row_array();
		if(isset($Section_Details['ParentSectionID']))
			return $Section_Details['ParentSectionID'];
		else 
			return 0;
	}
	public function get_sectionDetails($sectionID, $viewmode)
	{
		if($viewmode =='live'){
		$get_sectionname = $this->live_db->query("CALL get_section_details('".$sectionID."')")->row_array();
		return $get_sectionname;
		}else{
		$get_sectionname = $this->db->query("CALL get_section_details('".$sectionID."')")->row_array();
		return $get_sectionname;
		}
	}
	public function get_section_menudisplay($sectionID)
	{
			$parent_sectionname = $this->db->query("CALL get_section_menudisplay('".$sectionID."')")->result_array();
		return $parent_sectionname;
	}
	
	public function get_parent_sectionmane($sectionID, $view_mode)
	{
		if($view_mode == 'live'){
		$parent_sectionname = $this->live_db->query("CALL get_parent_sectionname('".$sectionID."')");
		}else{
		$parent_sectionname = $this->db->query("CALL get_parent_sectionname('".$sectionID."')");
		}
		return $parent_sectionname->row_array();
	}
	
	public function get_image_data($content_id)
	{
		$image_data = $this->db->query('CALL get_image_data("'.$content_id.'")')->row_array();
		return $image_data;
	}
	
	public function get_gallery_image_data($content_id, $view_mode)
	{
		if($view_mode=="live"){
		$content_type = 3;
		$image_data = $this->live_db->query('CALL get_gallery_images("'.$content_id.'")')->result_array();
		}else
		{
		$content_type = 3;
		$image_data = $this->db->query('CALL widget_article_content_preview("'.$content_id.'","'.$content_type.'")')->result_array();	
		}
		return $image_data;
	}		
	public function get_video_image_data($content_id)
	{
		 
		$image_data = $this->db->query('CALL get_video_image_data("'.$content_id.'")')->row_array();
		return $image_data;
	}
	public function get_gallery_imageId($galleryversion_id)
	{
			$gallery_images = $this->db->query('CALL get_gallery_images(' . $galleryversion_id . ')');
		return $gallery_images;
	}
	public function select_video_detby_ID($get_id,$content_type)
	{
		
		$video_values = $this->db->query('CALL get_video_audio_details("'.$get_id.'", "'.$content_type.'")');
		
		return $video_values;
	}
	public function get_agency_byid($agency_id)
	{
		$agency_values = $this->db->query('CALL get_agency_by_id("'.$agency_id.'")')->row_array();
		return $agency_values;
	}
	public function get_author($id)
	{
			$query=$this->db->query("CALL getauthordetails('".$id."')")->result_array();
		return $query;
	}
	public function gettopic_name()
	{
		$agency = $this->db->query("CALL get_topicname()")->result_array();
		return $agency; 
	}
	public function get_section_previous_article($content_id, $section_id, $content_type)
	{
	$prev_id =$this->live_db->query("CALL select_section_previous_article('".$content_id."','".$section_id."', '".$content_type."', 'ORDER BY content_id DESC LIMIT 1')")->row_array();
		return $prev_id; 
	}
    public function get_section_next_article($content_id, $section_id, $content_type)
	{
		$next_id = $this->live_db->query("CALL select_section_next_article('".$content_id."','".$section_id."','".$content_type."', 'ORDER BY content_id ASC LIMIT 1')")->row_array();
		return $next_id; 
	}
	public function get_section_recent_article($content_id, $section_id, $content_type, $view_mode)
	{
		if($view_mode == "live")
		{
		$recent_id = $this->live_db->query("CALL select_section_recent_article('".$content_id."','".$section_id."','".$content_type."')")->row_array();
		}else{
		$recent_id = $this->live_db->query("CALL select_section_recent_article('".$content_id."','".$section_id."','".$content_type."')")->row_array();
		}
		return $recent_id; 
	}
	
	 function get_gallery_images($content_id, $limit,$offset)
	{
		$gallery_images = $this->db->query('CALL get_gallery_images_by_limit(' . $content_id . ', '.$limit.', '.$offset.')');
		return $gallery_images;
	}
	  
	  function get_gallery_image_count($content_id)
	{
		
		$gallery_images = $this->db->query('CALL get_gallery_images(' . $content_id . ')');
		
		return $gallery_images;

	}

   public function get_content_type($content_id) {
      	
		$content_type = $this->db->query('CALL check_content_type(' . $content_id . ')');
		
		return $content_type;
   }
   public function get_content_type_byname($content_typename, $view_mode) {
	   if($view_mode=='live'){
		$content_type_result = $this->live_db->query("CALL get_content_type('" . $content_typename . "')");
	   }else{
	   $content_type_result = $this->db->query("CALL get_content_type('" . $content_typename . "')");
	   }
		return $content_type_result->row_array();
   }
   
   public function time2string($timeline) 
   {
		$datetime1 = new DateTime(); // Today's Date/Time
		$datetime2 = new DateTime($timeline);
		$interval = $datetime1->diff($datetime2);
		$post_year = $interval->y; // %D years ago
		$post_month = $interval->m; // %D month ago
		$post_date = $interval->d; // %D days ago
		$post_hours = $interval->h; //  %H hours ago
		$post_mins = $interval->i; //  %I minutes ago
		$post_secs = $interval->s; //  %s seconds ago
		
		if($interval->format('%i%h%d%m%y')=="00000"){		
			if($post_secs == 1)
			return $post_secs." second";
			else
			return $post_secs." seconds";	
		}
		else if($interval->format('%h%d%m%y')=="0000"){		
			if($post_mins == 1)
			return $post_mins." minute";
			else
			return $post_mins." minutes";	
		}
		else if($interval->format('%d%m%y')=="000"){
			if($post_hours== 1)
			return $post_hours." hour";
			else
			return $post_hours." hours";	
		}
		else if($interval->format('%m%y')=="00"){
			if($post_date == 1)
			return $post_date." day";
			else
			return $post_date." days";	
		}
		else if($interval->format('%y')=="0"){		
			if($post_month== 1)
			return $post_month." month";
			else
			return $post_month." months";	
		}
		else{
			if($post_year== 1)
			return $post_year." year";
			else
			return $post_year." years";
		}
	}
	
	public function get_author_by_name($author_name)
	{
		$query=$this->db->query("CALL get_author_by_name('".$author_name."')")->result_array();
		return $query;
	}
   	
	public function get_author_content_auto($max_article, $author_name , $section_id, $content_type ,  $view_mode)
	{
		$query=$this->live_db->query("CALL get_author_content_auto('".$author_name."', '".$section_id."')")->result_array();
		return $query;
	}
	
	public function get_author_content_auto_page($max_article, $author_name , $content_type ,  $view_mode, $start, $limit, $section_id)
	{
		$query=$this->live_db->query("CALL get_author_content_auto_page('".$author_name."', '".$start."', '".$limit."', '".$section_id."')")->result_array();
		return $query;
	}
	
	public function insert_subscribed_email($email)
	{
		$user_ip    = addslashes($_SERVER['REMOTE_ADDR']);	
		$query      = $this->db->query("CALL add_subscribed_email('".$email."', '".$user_ip."', @insert_id)")->result_array();
		$result 	= $this->db->query("SELECT @insert_id")->row_array();
		$insert_id  = $result['@insert_id'];
		return $insert_id;
	}
	
}

class Search extends Widget_model
{
  
    public function get_search_result_data($order_field, $order, $start, $length, $frm_search, $to_search, $search_value, $search_by, $section, $content_type, $type_search, $datafrom)
	{
		
		$search_value  = addslashes(trim(strip_tags($search_value)));
		$search_value  = htmlentities($search_value, ENT_QUOTES | ENT_IGNORE, "UTF-8");
		if($type_search=='All' || $type_search==1)
		{
		$search_value  =  str_replace(" ","|", preg_replace('/\s\s+/', ' ', $search_value));
		//print_r($search_value);exit;
		}
		
		if($section=='All' || $section=='')
		{
		$section ='';
		}
		$type_search = ($type_search=='All')? 1 : $type_search;
		
		if($order_field!=''){
		if($order_field == "last_updated_on" || $order_field == "Title")
		{
		$order_cond = ($order_field!='') ? " ORDER BY ".$order_field." ".$order." LIMIT ".$start.", ".$length." " : "";
		}else
		{
		$order_cond = $order_field;	
		}
		}
		else
		{
		$order_cond = "";
		}
		
		if($frm_search!='')
		{
		$frmdate_arr = explode('-', $frm_search);
        $frm_search = $frmdate_arr[2].'-'.$frmdate_arr[1].'-'.$frmdate_arr[0];
		}else
		{
			$frm_search = '';
		}
		//$frm_search  = ($frm_search!='') ? date('Y-m-d', strtotime($frm_search)): '';
		//$to_search  = ($to_search!='')? date('Y-d-m', strtotime($to_search)) : '';
		if($to_search!='')
		{
		$todate_arr = explode('-', $to_search);
        $to_search  = $todate_arr[2].'-'.$todate_arr[1].'-'.$todate_arr[0];
		}else{
		  $to_search = '';
		}
		//print_r($order_cond);exit;
		if(($frm_search!='' && $frmdate_arr[2]< date("Y"))|| ($to_search!='' && ($todate_arr[2] < date("Y"))))
		{
			$datafrom = $frmdate_arr[2];
		}
		if(($datafrom=="live" || $datafrom==""))
		{	
		$year = date("Y");	
		$live_result_manager =  $this->live_db->query('CALL search_result("'.$order_cond.'","'.$frm_search.'","'.$to_search.'","'.addslashes($search_value).'","'.$search_by.'","'.$section.'","'.$content_type.'", "'.$type_search.'")')->result_array();	
		//echo $this->live_db->last_query();exit;
		$result_manager['Search_result'] = $live_result_manager;
		$result_manager['year'] = $year;
		}
		else
		{
		$year = date("Y");
		if(is_numeric($datafrom)){
		if($datafrom < $year)
		{
			$year = $datafrom;
		}
		}
		else
		{
			$table     = $datafrom;
			$table_prefix = explode("_", $table);
			$year  = $table_prefix[1];
			//$table = $table_prefix[0]."_".$year;
            //print_r($year);exit;
		}
		switch ($content_type) {
			case 3:
				$table           = "gallery_".$year;
				break;
			case 4:
				$table           = "video_".$year;
				break;
			case 5:
				$table           = "audio_".$year;
				break;
			default:
				$table           = "article_".$year;
		}
		$archive_db    = $this->load->database('archive_db', TRUE);
		$table_exist  = $archive_db->query("show tables like '".$table."'")->num_rows();
		if($table_exist!=0)
		{
		/*$query =  $archive_db->query("SELECT * FROM  ".$table."");
		echo $archive_db->last_query();exit;
        if(!$query){
         $year =  $year-1;
		 }*/
		 
		$archive_result_manager =  $archive_db->query('CALL search_result("'.$order_cond.'","'.$frm_search.'","'.$to_search.'","'.addslashes($search_value).'","'.$search_by.'","'.$section.'","'.$content_type.'", "'.$type_search.'","'.$table.'")')->result_array();
		//echo $archive_db->last_query();exit;
		if(count($archive_result_manager) == 0)
		{
			$table_prefix = explode("_", $table);
			$year  = $table_prefix[1]-1;
			$table = $table_prefix[0]."_".$year;
			$result_data =  $this->get_search_result_data_recursive($order_cond, $order, $start, $length, $frm_search, $to_search, $search_value, $search_by, $section, $content_type, $type_search, $table);
			//print_r($result_data);exit;
			/*$recursive_result = $this->get_search_result_data_recursive($order_cond, $order, $start, $length, $frm_search, $to_search, $search_value, $search_by, $section, $content_type, $type_search, $table);
*/
          if($result_data!=''){
		  $archive_result_manager = $result_data['Search_result'];
		  $year                   = $result_data['year'];
		  }else
		  {
		   $archive_result_manager = array();
		   $year = "table_not_exist";
		  }
		}
		
		$archive_db->close();
        $result_manager['Search_result'] = $archive_result_manager;
		$result_manager['year'] = $year;
		}else
		{
		$result_manager['Search_result'] = array();
		$result_manager['year'] = "table_not_exist";
		}
		}
			//print_r($result_manager);exit;
		return $result_manager;
	}
	public function get_search_result_data_recursive($order_cond, $order, $start, $length, $frm_search, $to_search, $search_value, $search_by, $section, $content_type, $type_search, $table)
	{
		$archive_db    = $this->load->database('archive_db', TRUE);
		$table_exist  = $archive_db->query("show tables like '".$table."'")->num_rows();
		$table_prefix = explode("_", $table);
		$year  = $table_prefix[1]-1;
		if($table_exist!=0)
		{
		$archive_result_manager =  $archive_db->query('CALL search_result("'.$order_cond.'","'.$frm_search.'","'.$to_search.'","'.addslashes($search_value).'","'.$search_by.'","'.$section.'","'.$content_type.'", "'.$type_search.'","'.$table.'")')->result_array();
		if(count($archive_result_manager)==0)
		{
			$table_prefix = explode("_", $table);
			$year  = $table_prefix[1]-1;
			$table = $table_prefix[0]."_".$year;
			$archive_result_manager =  $this->get_search_result_data_recursive($order_cond, $order, $start, $length, $frm_search, $to_search, $search_value, $search_by, $section, $content_type, $type_search, $table);
		}
		$archive_db->close();
		if(count($archive_result_manager)>0)
		{
		$result_manager['Search_result'] = $archive_result_manager;
		$result_manager['year'] = $year;
		return $result_manager;
		}
		}
	}
	public function get_search_result_data_ajax()
	{
		extract($_POST);
		
		$Field = $order[0]['column'];
		if($Order =='Ascending'){
		$order = 'Asc';
		}elseif($Order =='Descending'){
		$order = 'Desc';
		}else{
		$order = $order[0]['dir'];
		}
		
		if($draw == 1) {
			if($Content_type == '2') $Field = 5; else $Field = 6;
		}
	
		
		 switch($Content_type) {
			 case 1:
				$content_type = "1";
			   $menu_name		= "Article";
			 
			 break;
			 case 2; 
			 	$content_type = "2";
			   $menu_name		= "Image Library";
			 break;
			 case 3; 
			 	$content_type = "3";
			   	$menu_name		= "Gallery";
			 break;
			 case 4; 
			 $content_type = "4";
			   $menu_name		= "Video";
			 break;
			 case 5; 
			 $content_type = "5";
			   $menu_name		= "Audio";
			 break;
			default: 
			$content_type = "1"; 
			 $menu_name		= "Article";
		 }
		 
		if($Orderby=='Title'){
	    $order_field = 'title';
		}else{
        $order_field = 'last_updated_on';
		}
		//$live_db    = $this->load->database('live_db', TRUE);
		$Total_rows = $this->live_db->query('CALL search_result("","","","","","","'.$content_type.'","")')->num_rows();
        
      
		$Search_value = $Search_text;
		
		if($check_in != '')  {
		$check_in_date 	= strtotime($check_in);
		$check_in = date('Y-m-d',$check_in_date);
		}
		
		if($check_out != '')  {
		$check_out_date = strtotime($check_out);
		$check_out = date('Y-m-d',$check_out_date); 
		}
				
		$Search_value = htmlentities($Search_value, ENT_QUOTES | ENT_IGNORE, "UTF-8");
		
		$Search_value =  str_replace("&#039","&#39",$Search_value);

		if($Search_by =='Tag')
		{ 
		$tagname = $Search_text;
		}
      
		if($Section=='All')
		{
		$Section ='';
		}
	
		$type_search = ($search_type=='All')? 1 : $search_type;
		
		$result_manager= array();
				
		$result_manager =  $this->live_db->query('CALL search_result(" ORDER BY '.$order_field.' '.$order.' LIMIT '.$start.', '.$length.'","'.$check_in.'","'.$check_out.'","'.addslashes($Search_value).'","'.$Search_by.'","'.$Section.'","'.$content_type.'", "'.$type_search.'")')->result_array();	
				
		$recordsFiltered =  $this->live_db->query('CALL search_result(" ORDER BY '.$order_field.' '.$order.' LIMIT '.$start.', '.$length.'","'.$check_in.'","'.$check_out.'","'.addslashes($Search_value).'","'.$Search_by.'","'.$Section.'","'.$content_type.'", "'.$type_search.'")')->num_rows();
		 
		 
		$data['draw'] = $draw;
		$data["recordsTotal"] = $Total_rows;
  		$data["recordsFiltered"] = $recordsFiltered ;
		$data['data'] = array();
		$Count = 0;
		
//print_r($result_manager);exit;
		foreach($result_manager as $article) {
			$image_path = $article['ImagePhysicalPath'];
			$image_title = $article['ImageCaption'];
			$image_alt = $article['ImageAlt'];
			$subdata = array();
			$Image600X390 	= $article['ImagePhysicalPath'];
			if (file_exists(destination_base_path . imagelibrary_image_path . $Image600X390) && $Image600X390 != '')
			{
			$imagedetails = getimagesize(destination_base_path . imagelibrary_image_path.$Image600X390);
			$imagewidth = $imagedetails[0];
			$imageheight = $imagedetails[1];
			
			if ($imageheight > $imagewidth)
			{
				$Image600X390 	= $article['ImagePhysicalPath'];
			}
			else
			{				
				$Image600X390 	= str_replace("original","w600X390", $article['ImagePhysicalPath']);
			}
			$image_path='';
				$image_path = image_url. imagelibrary_image_path . $Image600X390;
			}
			else{
			$image_path = image_url. imagelibrary_image_path.'logo/nie_logo_600X390.jpg';
			$image_title = '';	
			$image_alt = '';	
			}
			
			$subdata[] = '<td><figure class="result-section-figure"><img  src="'.$image_path.'" title="'.$image_title.'" alt="'.$image_alt.'" /></figure></td>';	
			
	 $domain_name      = base_url();
	 $content_url      = $article['url'];
	 $param            = $page_param;
	 $live_article_url = $domain_name.$content_url."?pm=".$param;
     $custom_title     = $article['title'];
	 $summary          = $article['summary_html'];
	 $publisheddate    = date('jS F Y', strtotime($article['last_updated_on']));
     $custom_title     = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$custom_title);

		$subdata[] ='<div class="search-content">
        <h4><a  href="'.$live_article_url.'"  class="article_click">'.$custom_title.'</a></h4><p>'.$summary.'</p>
		<date>Published on '.$publisheddate.'</date>
        </div>';

			$data['data'][$Count] = $subdata;
			$Count++;
		}
		echo json_encode($data);
		exit;
		
	}

}

class widget_setting extends Widget_model
{
	public function get_widget_setting()
	{
		extract($_POST);
		
		$this->db->trans_begin();
		$this->live_db->trans_begin(); 
		 $this->db->query("CALL insert_settings('".$scroll_txt."')");
		 $this->live_db->query("CALL insert_settings('".$scroll_txt."')");
		
		if ($this->db->trans_status() === FALSE || $this->live_db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$this->live_db->trans_rollback();
			echo "error";
		} else {
			$this->db->trans_commit();
			$this->live_db->trans_commit();
			echo "success";
		}
	}
	
	public function select_setting($view_mode)
	{
		if($view_mode=='live'){
		$select_etting = $this->live_db->query("CALL select_setting()");
		}else{
		$select_etting = $this->db->query("CALL select_setting()");
		}
		
		return  $select_etting->row_array();
	}
}
class widgettags_model extends Widget_config_class 
{
	public function get_tags($search_text) {
		
		$search = 'tag_name LIKE "%'.$search_text.'%"';
		
		$select_query 	= $this->db->query("CALL get_tags('','".$search."')")->result();	
		return  $select_query;
	}
	public function get_tags_by_name($search_text) {
		
		$search = 'tag_name LIKE "'.$search_text.'"';
		
			$select_query 	= $this->db->query("CALL get_tags('','".$search."')")->result_array();	
		return $select_query;	
	}
	public function get_tags_by_id($tags) {
		
			$select_query 	= $this->db->query("CALL get_tags('".$tags."','')")->result();		
		return $select_query;
	}
}
class Widget_content_class extends Widget_config_class {
	
	public function get_author_by_id($authorid)
	{
			$author_details = $this->db->query('CALL get_author_by_id(' . $authorid . ')');
			$row_array = $author_details->row_array();
		return $row_array['AuthorName'];
	}
	public function widget_article_content_by_id($contennt_id, $content_typeid, $url)
	{
		$content_result 	=  $this->live_db->query('CALL widget_article_content_by_id("'.$contennt_id.'", "'.$content_typeid.'" , "'.urldecode($url).'")')->result_array();
		return $content_result;
	}
	
	public function widget_article_content_preview($contennt_id, $content_typeid)
	{
		$content_result 	=  $this->db->query('CALL widget_article_content_preview("'.$contennt_id.'", "'.$content_typeid.'")')->result_array();
		return $content_result;
	}
	
	public function widget_article_admin_preview($section_id, $content_type_id)
	{
	$content_result 	=  $this->db->query('CALL widget_article_template_preview("'.$section_id.'", "'.$content_type_id.'")')->result_array();
	return $content_result;
	}
	
	public function get_image_by_contentid($content_id)
	{
			$article_details = $this->db->query('CALL get_imagedetails_by_contentid(' . $content_id . ')')->row_array();
		return $article_details;
	}
	
	public function get_author_details($authorid) {
		$authors =$this->db->query("CALL getauthordetails('".$authorid."')")->result_array();
		return $authors; 
	}
			
	public function remodal_content_details_live($content_id, $content_type) {
		$type_value = $this->live_db->query('CALL remodal_content_details_live ('.$content_id.', '.$content_type.')')->result_array();
		return $type_value;
	}
	
	public function get_related_article_by_contentid($content_id, $view_mode) {
		if($view_mode == "live"){
		$type_value = $this->live_db->query('CALL get_related_article_by_contentid ('.$content_id.')')->result_array();
		}else if($view_mode == "preview"){
		$type_value = $this->db->query('CALL get_related_article_by_id (' . $content_id . ')')->result_array();
		}
		return $type_value;
	}
	
	public function update_most_hits_and_emailed($type, $content_type, $content_id, $title, $section_id){
		$data = $this->live_db->query('CALL  update_most_hits_and_emailed("'.$type.'", '.$content_type.', '.$content_id.', "'.addslashes($title).'", "'.$section_id.'", "'.date("Y-m-d H:i:s").'")');
		//return $data;
	}
	public function update_trending_read_hits($content_id, $content_type){
		$datetime= date("Y-m-d H:i:s");
		$user_ip= $_SERVER['REMOTE_ADDR'];	
		$data = $this->live_db->query('CALL  update_trending_hits('.$content_id.', '.$content_type.', "'.$datetime.'", "'.$user_ip.'")')->result_array();
		return $data;
	}
	public function get_content_by_hit_count($time,$limit)
	{
		$article = $this->live_db->query('CALL get_content_by_hit_count("'.$time.'","'.$limit.'")');
		return $article->result_array();
	}
	public function get_content_by_email_count($time,$limit)
	{
		$article = $this->live_db->query('CALL get_content_by_email_count("'.$time.'","'.$limit.'")');
		return $article->result_array();
	}
	public function get_hit_for_content_by_id($content_id, $content_type_id)
	{
		$article = $this->live_db->query('CALL get_hit_for_content("'.$content_id.'", "'.$content_type_id.'")');
		return $article->row_array();
	}	
}
class Widget_content_class_archieve extends CI_Model
{
	public function widget_archive_article_content_by_id($old_article_id, $content_type, $current_url, $table, $ecenic)
	{
		$archive_db = $this->load->database('archive_db', TRUE);
		$result = $archive_db->query("CALL widget_article_content_by_id ('".$old_article_id."','".$content_type."','".$table."', '".$ecenic."', '".$current_url."')");
		//echo $archive_db->last_query();exit;
		$archive_db->close();
		return $result->result_array();
	}
	public function get_related_article_from_archieve($old_article_id, $table)
	{
		$archive_db = $this->load->database('archive_db', TRUE);
		$result = $archive_db->query("CALL get_related_article_by_contentid ('".$old_article_id."','".$table."')");
		$archive_db->close();
		return $result->result_array();
	}
}
?>