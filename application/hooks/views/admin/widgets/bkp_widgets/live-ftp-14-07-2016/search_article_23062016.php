<?php 
// widget config block Starts - This code block assign widget background colour, title and instance id. Do not delete it 
$is_home                = $content['is_home_page'];
$is_summary_required    = $content['widget_values']['cdata-showSummary'];
$view_mode              = $content['mode'];
$page_parameter         = $content['page_param'];
// widget config block ends  
//search related  terms
$tagname                = '';
$fromdate               = ($this->input->get('fdate') != '') ? $this->input->get('fdate'): "";
$todate                 = ($this->input->get('tdate') != '') ? $this->input->get('tdate'): "";
$sectionid              = "";
$content_type           = ($this->input->get('ctype') != '') ? $this->input->get('ctype'): "1";
$start_at               = ($this->input->get('per_page') != '') ? $this->input->get('per_page'): 0; 
$search_limit           = 15;
if($this->input->get('order_by')=='Title'){
$order_field = 'Title';
}else{
$order_field = 'last_updated_on';
}
if($this->input->get('order_dir') =='Asc'){
$order = 'Desc';
}elseif($this->input->get('order_dir') == 'Desc'){
$order = 'Asc';
}else
{
$order = 'Desc';	
}
$datafrom               = ($this->input->get('datafrom')== 'live') ? "live" : $this->input->get('datafrom');
$sid                    =  ($this->input->get('sid')!= '') ? $this->input->get('sid') : "";
if(($datafrom == "" || $datafrom=="live" )&& $sid =='')
{
$tag_segment            = $this->uri->segment(2);
if($tag_segment!=''){
	$tag_array              = explode('_', $tag_segment);
	$search_term            = urldecode(implode(" ", $tag_array));
	$tagname                = $search_term;
	$searchby               = "Tag";
	$type_search            = "All";
}elseif(isset($_GET['home_search']) && $_GET['home_search']!='') 
{
    $searchby          = ($this->input->get('home_search')!='')? $this->input->get('home_search') : "H";
	$search_term       = ($this->input->get('search_term')!='')? $this->input->get('search_term') : ""; //$_POST['search_term']
	$type_search       = "All";
}elseif(isset($_GET['searchbtn']) ) //|| isset($_POST['search_term'])
{
    $searchby          = $this->input->get('Searchby');//$_POST['Searchby'];
	$sectionid         = $this->input->get('Search_section');//$_POST['Search_section'];
	$fromdate          = $this->input->get('FromDate');//$_POST['FromDate'];
	$todate            = $this->input->get('ToDate');//$_POST['ToDate'];
	$type_search       = $this->input->get('search_type');//$_POST['search_type'];
	$content_type      = ($this->input->get('content_type')!="All")? $this->input->get('content_type') : "1"; //$_POST['content_type']
	$search_term       = ($this->input->get('search_term_txt')!='')? $this->input->get('search_term_txt') : ""; //$_POST['search_term_txt']
}else
{
	$searchby          = ($this->input->get('searchby') != '') ? $this->input->get('searchby'): "H";
	$search_term       = ($this->input->get('search_term') != '') ? $this->input->get('search_term'): "";
	$type_search       = ($this->input->get('stype') != '') ? $this->input->get('stype'): 1;

}
if($search_term!=''){
$live_result_contents         = $this->widget_model->get_search_result_data($order_field, $order, $start_at, $search_limit, $fromdate, $todate, $search_term , $searchby, $sectionid, $content_type, $type_search, $datafrom);
//print_r($result_contents);exit;
$live_TotalCount              = $this->widget_model->get_search_result_data("", "", "" , "", $fromdate, $todate, $search_term , $searchby, $sectionid, $content_type, $type_search, $datafrom);
$TotalCount                   = $live_TotalCount['Search_result'];
$seacrh_result_contents  = $live_result_contents['Search_result'];
}else
{
$TotalCount              = array();
$seacrh_result_contents  = array();
}
}else if($sid!='')
{
	
	$searchby          = ($this->input->get('searchby') != '') ? $this->input->get('searchby'): "H";
	$search_term       = ($this->input->get('search_term') != '') ? $this->input->get('search_term'): "";
	$type_search       = ($this->input->get('stype') != '') ? $this->input->get('stype'): 1;

$content_type                    = ($this->input->get('cid') != '') ? $this->input->get('cid'): 1;
$datafrom                        = ($datafrom=='')? "live" : $datafrom;//date('Y');
$archive_result_contents         = $this->widget_model->get_search_result_data($order_field, $order, $start_at, $search_limit, "", "", "" , "", $sid, $content_type, "", $datafrom);
//print_r($archive_result_contents);exit;
$archive_TotalCount                     = $this->widget_model->get_search_result_data("", "", "" , "", "", "", "" , "", $sid, $content_type, "", $datafrom);
$TotalCount              = $archive_TotalCount['Search_result'];            
$seacrh_result_contents  = $archive_result_contents['Search_result'];
//$datafrom                = $archive_result_contents['year'];
$section_details = $this->widget_model->get_section_by_id($sid); //live db
$section_name    = $section_details['Sectionname'];
}
else
{
	$searchby          = ($this->input->get('searchby') != '') ? $this->input->get('searchby'): "H";
	$search_term       = ($this->input->get('search_term') != '') ? $this->input->get('search_term'): "";
	$type_search       = ($this->input->get('stype') != '') ? $this->input->get('stype'): 1;

$archive_result_contents         = $this->widget_model->get_search_result_data($order_field, $order, $start_at, $search_limit, $fromdate, $todate, $search_term , $searchby, $sectionid, $content_type, $type_search, $datafrom);
//print_r($archive_result_contents);exit;
$archive_TotalCount                     = $this->widget_model->get_search_result_data("", "", "" , "", "", "", $search_term , $searchby, $sectionid, $content_type, $type_search, $datafrom);
$TotalCount              = $archive_TotalCount['Search_result'];            
$seacrh_result_contents  = $archive_result_contents['Search_result'];
$datafrom                = $archive_result_contents['year'];
$result_year             = $archive_result_contents['year'];
}
$sid_url         = ($sid !='')? "&sid=".$sid: "";
if($fromdate!='' || $todate!=''){
$query_string_segment          = "&search_term=".$search_term."&searchby=".$searchby."&ctype=".$content_type."&stype=".$type_search."&datafrom=".$datafrom."&fdate=".$fromdate."&tdate=".$todate;
}else
{
$query_string_segment          = "&search_term=".$search_term."&searchby=".$searchby."&ctype=".$content_type."&stype=".$type_search."&datafrom=".$datafrom.$sid_url;
}

$config['total_rows']           = count($TotalCount);
$config['per_page']             = 15; 
$config['page_query_string']    = TRUE;
$config['enable_query_strings'] = TRUE;
$config['custom_num_links']      = 5;
$config['suffix']               = $query_string_segment;
$config['cur_tag_open']         = "<a href='javascript:void(0);' class='active'>";
$config['cur_tag_close']        = "</a>";
$this->pagination->initialize($config); 
//$PaginationLink                 = $this->pagination->create_links();
$PaginationLink                 = $this->pagination->custom_search_create_links();

$section_mapping = $this->widget_model->multiple_section_mapping();
$show_hide       = 'style="display:none;"';

 ?>
<div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<!--<h4>Search</h4>-->
         <div class="WidthFloat_L">
		 <button class="reveal search-show">மேம்பட்ட தேடல்</button>
		 </div>
        <div class="toggle_container" <?php echo $show_hide;?>>
        <div class="block"> 
        <div class="archives-form" id="advanced_search">
        <h4>மேம்பட்ட தேடல்</h4>
		<span style="display: none;color:red;" id="emptySearchExpressionError">தேடும் சொல்லை சொற்களை உள்ளிடவும்</span>
        <div>
		<form name="searchform" id="searchform" method="get" action="<?php echo base_url()."topic/";?>"  enctype="multipart/form-data" role="form">
        <ul id="title_form">
        <li class="odd">தேடல் வகை</li>
        <li class="single-form even"><input type="text" name="search_term_txt" class="validate" id="search_term_txt" value="<?php if(isset($search_term)){ echo $search_term;}else{echo set_value('search_term');}?>"/></li>
        <li class="odd double-form">தேடல் சொற்க​ள் </li>
<li class="even">
		<select id="search_type" class="controls type_validate" name="search_type" Value="<?php echo set_value('search_type'); ?>">
      <option value="All">தேடல் சொற்க​ள் </option>
	  <option <?php if(isset($_GET)){ if($type_search ==1){?> selected="selected" <?php }}?> value="1">எல்லாச் சொற்களுடனும் </option>
      <option <?php if(isset($_GET)){ if($type_search ==2){?> selected="selected" <?php }}?> value="2">குறிப்பிட்ட சொற்களுடன் மட்டும்</option>
	  <option <?php if(isset($_GET)){ if($type_search ==3){?> selected="selected" <?php }}?> value="3">குறிப்பிட்ட சொல் இல்லாமல்</option>
		</select>
</li>
		</ul>
		<ul>
        <li class="odd double-form">கால இடைவெளி</li>
        <li class="hero-unit even double-form" >
         <input  type="text" placeholder="From" name="FromDate" class="datefield"  value="<?php if(isset($fromdate)){ echo $fromdate;}else{echo set_value('FromDate');}?>"   id="example1">
         <input  type="text" placeholder="To" name="ToDate" class="datefield"  value="<?php if(isset($todate)){ echo $todate;}else{echo set_value('ToDate');}?>"   id="example2">
        </li>
        <li class="odd">பிரிவு </li>
        <li class="even"> 
        <select name="Search_section" class="controls" id="main_section_id" Value="<?php echo set_value('Search_section'); ?>">
   <option value="All">-All-</option>
  
 <?php if(isset($section_mapping)) { 
				 foreach($section_mapping as $mapping) {  ?>

<option  <?php if(isset($sectionid)){ if($sectionid ==$mapping['Section_id']){?> selected=	"selected"<?php }}?> class="blog_option"  sectoin_data="<?php echo $mapping['Sectionname']; ?>"   value="<?php echo $mapping['Section_id']; ?>"><?php echo strip_tags($mapping['Sectionname']); ?></option>
  <?php if(!(empty($mapping['sub_section'])) &&  $mapping['Sectionname'] != 'Columns') { ?>
 
  <?php foreach($mapping['sub_section'] as $sub_mapping) { ?>
    <option <?php if(isset($sectionid)){ if($sectionid ==$sub_mapping['Section_id']){?> selected="selected"<?php }}?>   sectoin_data="<?php echo $mapping['Sectionname']; ?>"   value="<?php echo $sub_mapping['Section_id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strip_tags($sub_mapping['Sectionname']); ?></option>
		
		 <?php if(!(empty($sub_mapping['sub_sub_section']))) { ?>
		 
		   <?php foreach($sub_mapping['sub_sub_section'] as $sub_sub_mapping) { ?>
    <option <?php if(isset($sectionid)){ if($sectionid ==$sub_sub_mapping['Section_id']){?> selected="selected"<?php }}?> value="<?php echo $sub_sub_mapping['Section_id']; ?>"  sectoin_data="<?php echo $mapping['Sectionname']; ?>" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strip_tags($sub_sub_mapping['Sectionname']); ?></option>
		 
		<?php } } ?>
  <?php  } } ?>


  <?php } } ?>

</select>        </li>
<li class="odd double-form"> செய்தி வகை</li>
<li class="even">
		<select id="content_type" class="controls" name="content_type" Value="<?php echo set_value('content_type'); ?>">
         <option value="All">-All-</option>
		<option <?php if(isset($_GET)){ if($content_type ==1){?> selected="selected" <?php }}?> value="1">செய்திகள்</option>
		<option <?php if(isset($_GET)){ if($content_type ==3){?> selected="selected" <?php }}?> value="3">புகைப்படங்கள்</option>
		<option <?php if(isset($_GET)){ if($content_type ==4){?> selected="selected" <?php }}?> value="4">வீடியோக்கள்</option>
		<option <?php if(isset($_GET)){ if($content_type ==5){?> selected="selected" <?php }}?> value="5">ஆடியோக்கள்</option>
		</select>
</li>

        </ul>
		<div class="search-button">
		 <input  type="hidden" name="Searchby" value="<?php echo ($tagname!='')? 'Tag' : 'Title'; ?>"   id="Searchby">
		<input type="submit" id="searchbtn" name="searchbtn" value="தேடல்" /></div>

		</form>
        </div>
		
        </div>
	
		</div>
        </div>
        <?php 
		//print_r($datafrom);exit;

		if(count($seacrh_result_contents)>0) 
		{ 
		$query_url = current_url()."?search_term=".$search_term."&searchby=".$searchby."&ctype=";
		if($type_search!=3){
		$search_term = ($sid!='')? $section_name : $search_term;
		?>
        <ul class="ascending" id="table_sorter"><li style="float:left;">தேடல் முடிவுகள் உள்ள <span class="active"><?php echo $search_term;?></span></li></ul>
        <?php } ?>
		<ul class="ascending" id="table_sorter">
        <li>முடிவினைக் காட்டு <span id="ordering" class="active"><a href="<?php echo $query_url.$content_type."&stype=".$type_search."&datafrom=".$datafrom."&order_dir=".$order.$sid_url;?>"><?php if(isset($order)){ if($order =="Asc"){?> இறங்குவரிசை  <?php }else{?> ஏறுவரிசை <?php }}?></a></span> ஒழுங்கு</li>
       <?php if($sid ==''){ ?>
        <li>
        <span id="ordering" <?php if(isset($content_type)){ if($content_type ==1){?> class="active" <?php }}?>><a href="<?php if(isset($content_type)){ if($content_type ==1){ ?> javascript:void(0); <?php }else { echo $query_url."1"."&stype=".$type_search."&datafrom=".$datafrom; }}?>">செய்திகள்</a></span>| 
        <span id="ordering" <?php if(isset($content_type)){ if($content_type ==3){?> class="active" <?php }}?>><a href="<?php if(isset($content_type)){ if($content_type ==3){ ?> javascript:void(0); <?php }else { echo $query_url."3"."&stype=".$type_search."&datafrom=".$datafrom; }}?>">புகைப்படங்கள்</a></span> | 
        <span id="ordering" <?php if(isset($content_type)){ if($content_type ==4){?> class="active" <?php }}?>><a href="<?php if(isset($content_type)){ if($content_type ==4){ ?> javascript:void(0); <?php }else { echo $query_url."4"."&stype=".$type_search."&datafrom=".$datafrom; }}?>">வீடியோக்கள்</a></span>| 
        <span id="ordering" <?php if(isset($content_type)){ if($content_type ==5){?> class="active" <?php }}?>><a href="<?php if(isset($content_type)){ if($content_type ==5){ ?> javascript:void(0); <?php }else {echo $query_url."5"."&stype=".$type_search."&datafrom=".$datafrom; }}?>">ஆடியோக்கள்</a></span>
        </li>
        <?php } ?>
        <li>வரிசைப்படுத்தல்  : <span id="orderbydate" <?php if(isset($order_field)){ if($order_field !="Title"){?> class="active" <?php }}?>><a href="<?php if(isset($order_field)){ if($order_field !="Title"){ ?> javascript:void(0); <?php }else { $query_url.$content_type."&stype=".$type_search."&datafrom=".$datafrom."&order_dir=".$order."&order_by=Date".$sid_url; }}?>"> நாள்</a></span> | <span id="orderbytitle" <?php if(isset($order_field)){ if($order_field =="Title"){?> class="active" <?php }}?>><a href="<?php if(isset($order_field)){ if($order_field =="Title"){ ?> javascript:void(0); <?php }else { echo $query_url.$content_type."&stype=".$type_search."&datafrom=".$datafrom."&order_dir=".$order."&order_by=Title".$sid_url; }}?>">தலைப்பு</a></span></li>
        </ul>

		<table id="example" class="display result-section" cellspacing="0" width="100%">
				<thead>
					<tr>
					    <th>Image</th>
						<th>Title</th>
					</tr>
				</thead>
                <tbody>
                <?php 
				$Count = 0;
				$load_more ='';
				$last_content_id = '';
				$total_result = count($seacrh_result_contents);
			foreach($seacrh_result_contents as $article) {
			$image_path = $article['ImagePhysicalPath'];
			$image_title = $article['ImageCaption'];
			$image_alt = $article['ImageAlt'];
			$subdata = array();
			$Image600X390 	= $article['ImagePhysicalPath'];
			if (file_exists(destination_base_path . imagelibrary_image_path . $Image600X390) && $Image600X390 != '')
			{
			/*$imagedetails = getimagesize(destination_base_path . imagelibrary_image_path.$Image600X390);
						$imagewidth = $imagedetails[0];
						$imageheight = $imagedetails[1];
						
						if ($imageheight > $imagewidth)
						{
							$Image600X390 	= $article['ImagePhysicalPath'];
						}
						else
						{				
			*/
            $Image600X390 	= str_replace("original","w600X390", $article['ImagePhysicalPath']);
			/*}*/
			$image_path='';
				$image_path = image_url. imagelibrary_image_path . $Image600X390;
			}
			else{
			$image_path = image_url. imagelibrary_image_path.'logo/dinamani_logo_600X390.jpg';
			$image_title = '';	
			$image_alt = '';	
			}
			
			echo  '<tr role="row"><td><figure class="result-section-figure"><img  src="'.$image_path.'" title="'.$image_title.'" alt="'.$image_alt.'" /></figure></td>';	
			
	 $domain_name      = base_url();
	 $content_url      = $article['url'];
	 $param            = $content['page_param'];
	 $live_article_url = $domain_name.$content_url."?pm=".$param;
     $custom_title     = $article['title'];
	 $summary          = $article['summary_html'];
	 $publisheddate    = date('jS F Y', strtotime($article['last_updated_on']));
     $custom_title     = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$custom_title);

		echo  '<td><div class="search-content">
        <h4><a  href="'.$live_article_url.'"  class="article_click">'.$custom_title.'</a></h4><p>'.$summary.'</p>
		<date>பதிவுசெய்த நாள் '.$publisheddate.'</date>
        </div><td></tr>';
		$last_content_id = @$seacrh_result_contents[$total_result-1]['content_id'];
		if((count($seacrh_result_contents) < $search_limit) && ($Count == count($seacrh_result_contents)- 1) && ($last_content_id == $article['content_id']) )
		{
			$result_year = $this->input->get('datafrom');
			//var_dump($result_year-$datafrom);exit;
			$datafrom = ($datafrom=="live" || $datafrom=="")? date('Y') : ((($result_year-$datafrom)>1)? $datafrom :$datafrom-1);
			$acrchive_url = $query_url.$content_type."&stype=".$type_search."&datafrom=".$datafrom.$sid_url;
			
			/*echo '<tr role="row">
			<td class="load_more_archive">
			<a href="'.$acrchive_url.'">மேலும்</a>
			</td>
			<td></td>
			</tr>';*/
			$load_more = '<a href="'.$acrchive_url.'" class="load_more_archive">மேலும்</a>';
		}
		$Count++;
		}
		?>
                </tbody>
	</table>
<div class="search_count">
<?php 
$count_from             = ($start_at==0)? 1 : $start_at;
$count_to               = (($count_from!=1)? $count_from: "")+count($seacrh_result_contents);
?>
<p>தேடல் முடிவுகள் <?php echo $count_from;?> - <?php echo $count_to;?> இல் <?php echo count($TotalCount);?></p>
</div>   
<div class="pagina">
<?php echo $PaginationLink.$load_more;?>
</div>
<?php }else{ 
if($datafrom!="table_not_exist"){
$query_url = current_url()."?search_term=".$search_term."&searchby=".$searchby."&ctype=";
$datafrom = ($datafrom=="live" || $datafrom=="")? "" : $datafrom-1;  //date('Y')
$acrchive_url = $query_url.$content_type."&stype=".$type_search."&datafrom=".$datafrom;
$search_term = ($sid!='')? $section_name : $search_term;
?>
 <ul class="ascending" id="table_sorter"><li style="float:left;">தேடல் முடிவுகள் உள்ள : <span class="active"><?php echo $search_term;?></span></li></ul>
		<ul class="ascending" id="table_sorter">
        <li>முடிவினைக் காட்டு <span id="ordering" class="active"><a href="<?php echo $query_url.$content_type."&stype=".$type_search."&datafrom=".$datafrom."&order_dir=".$order.$sid_url;?>"><?php if(isset($order)){ if($order =="Asc"){?> இறங்குவரிசை <?php }else{?> ஏறுவரிசை <?php }}?></a></span> ஒழுங்கு</li>
         <?php if($sid ==''){ ?>
        <li>
        <span id="ordering" <?php if(isset($content_type)){ if($content_type ==1){?> class="active" <?php }}?>><a href="<?php if(isset($content_type)){ if($content_type ==1){ ?> javascript:void(0); <?php }else { echo $query_url."1"."&stype=".$type_search."&datafrom=".$datafrom; }}?>">செய்திகள்</a></span>| 
        <span id="ordering" <?php if(isset($content_type)){ if($content_type ==3){?> class="active" <?php }}?>><a href="<?php if(isset($content_type)){ if($content_type ==3){ ?> javascript:void(0); <?php }else { echo $query_url."3"."&stype=".$type_search."&datafrom=".$datafrom; }}?>">புகைப்படங்கள்</a></span> | 
        <span id="ordering" <?php if(isset($content_type)){ if($content_type ==4){?> class="active" <?php }}?>><a href="<?php if(isset($content_type)){ if($content_type ==4){ ?> javascript:void(0); <?php }else { echo $query_url."4"."&stype=".$type_search."&datafrom=".$datafrom; }}?>">வீடியோக்கள்</a></span>| 
        <span id="ordering" <?php if(isset($content_type)){ if($content_type ==5){?> class="active" <?php }}?>><a href="<?php if(isset($content_type)){ if($content_type ==5){ ?> javascript:void(0); <?php }else {echo $query_url."5"."&stype=".$type_search."&datafrom=".$datafrom; }}?>">ஆடியோக்கள்</a></span>
        </li>
         <?php } ?>
        <li>வரிசைப்படுத்தல் : <span id="orderbydate" <?php if(isset($order_field)){ if($order_field !="Title"){?> class="active" <?php }}?>><a href="<?php if(isset($order_field)){ if($order_field !="Title"){ ?> javascript:void(0); <?php }else { $query_url.$content_type."&stype=".$type_search."&datafrom=".$datafrom."&order_dir=".$order."&order_by=Date".$sid_url; }}?>"> நாள்</a></span> | <span id="orderbytitle" <?php if(isset($order_field)){ if($order_field =="Title"){?> class="active" <?php }}?>><a href="<?php if(isset($order_field)){ if($order_field =="Title"){ ?> javascript:void(0); <?php }else { echo $query_url.$content_type."&stype=".$type_search."&datafrom=".$datafrom."&order_dir=".$order."&order_by=Title".$sid_url; }}?>">தலைப்பு</a></span></li>
        </ul>
        <?php 
		 } ?>
        <div class="search-result">
		<div class="col-md-<?php echo ($search_term!='' && $sid=='')? 6 : 12;?> col-xs-12">
        <p>உங்கள் தேடல் எந்தச் சொல்லுடனும் ஒத்துப்போகவில்லை</p>
        <h4>பரிந்துரைகள்:</h4>
        <ul>
        <li><i class="fa fa-angle-right"></i> அனைத்து சொற்களும் சரியாக இடப்பட்டதை உறுதிசெய்யுங்கள்.</li>
        <li><i class="fa fa-angle-right"></i> வேறு சொற்களை இட்டு முயற்சி செய்யுங்கள்.</li>
        <li><i class="fa fa-angle-right"></i> வேறு பொதுவான சொற்களை இட்டு முயற்சி செய்யுங்கள்.</li>
        </ul>
        </div>
        <?php if($datafrom!="table_not_exist"){ ?>
        <?php if($search_term!=''){ ?>
        <div class="col-md-6 col-xs-12">
			<p class="load_more_archive">
			<a href="<?php echo $acrchive_url;?>">மேலும்</a>
			</p>
        </div>
        <?php } ?>
        <?php } ?>
        </div>
        <?php } ?>
		</div>
		</div>
         <script>
        $(document).ready(function(){
$("button.reveal").click(function(){
    $(".toggle_container").slideToggle("slow");
    
    /*if ($.trim($(this).text()) === 'Hide Advance Search') {
        $(this).text('Show Advance Search');
    } else {
        $(this).text('Hide Advance Search');        
    }*/
    
    return false; 
});
});
</script>
	<script>
		$(document).ready(function () {
        var base_url = "<?php echo base_url(); ?>";

		 /*$('#example1').datepicker({
			format: "dd-mm-yyyy"
		});  
		 $('#example2').datepicker({
			format: "dd-mm-yyyy"
		}); 
		$("#example2").on("dp.change",function (e) {
		   //moment.max(e.date);
			$('#example1').data("DateTimePicker").maxDate(e.date);
		});*/
		
		var dpOptions = {
        format: 'dd-mm-yyyy',
     };
		var startDate=null;
		var endDate=null;
		$(document).ready(function(){
			$('#example1').datepicker(dpOptions)
				.on('changeDate', function(ev){
					startDate=new Date(ev.date.getFullYear(),ev.date.getMonth(),ev.date.getDate(),0,0,0);
					if(endDate!=null&&endDate!='undefined'){
						if(endDate<startDate){
								alert("End Date is less than Start Date");
								$("#example1").val("");
						}
					}
				});
			$("#example2").datepicker(dpOptions)
				.on("changeDate", function(ev){
					endDate=new Date(ev.date.getFullYear(),ev.date.getMonth(),ev.date.getDate(),0,0,0);
					if(startDate!=null&&startDate!='undefined'){
						if(endDate<startDate){
							alert("End Date is less than Start Date");
							$("#example2").val("");
						}
					}
				});
			$('.datefield').keypress(function(e) {
				if (e.keyCode == 8 || e.keyCode == 46) {
					return true;
				}else{
				e.preventDefault();
				}
			});
		});
		    // Date Pickers
  /* var dpOptions = {
        format: 'dd/mm/yyyy',
     };
		var datePicker1 = $("#example1").datepicker(dpOptions).
			on('changeDate', function (e) {
					datePicker2.datepicker('setStartDate', e.date);
					datePicker2.datepicker('update');
			});
		
    var datePicker2 = $("#example2").datepicker(dpOptions).
			on('changeDate', function (e) {
					datePicker1.datepicker('setEndDate', e.date);
					datePicker1.datepicker('update');
			});*/
		
		$("#searchbtn").click(function() 
		{
		   var search_term = $('input[name=search_term_txt]').val();
		   var search_type = $('input[name=search_type]').val();
			if(search_term.trim() =='')
			{
				$('#emptySearchExpressionError').show();
				$('.validate').addClass('error');
				return false;
			}else
			{
				if(search_type ==''){
				$('#emptySearchExpressionError').text('Please choose type of search').show();
				$('.type_validate').addClass('error');
                 return false;
				}
				$('#emptySearchExpressionError').hide();
				$('.validate').removeClass('error');
				return true;
			}
		});
		$('input').keyup(function(){
		$(this).removeClass('error');
		$('#emptySearchExpressionError').hide();
		});
		
	            });
	 </script>