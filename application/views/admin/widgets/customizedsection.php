<?php 
// widget config block Starts - This code block assign widget background colour, title and instance id. Do not delete it 
$widget_bg_color 		= $content['widget_bg_color'];
$widget_custom_title 	= $content['widget_title'];
$widget_instance_id 	=  $content['widget_values']['data-widgetinstanceid'];
$view_mode              =  $content['mode'];
$widget_instancemainsection	= $this->widget_model->get_tab_sectiondetails($widget_instance_id, $content['mode']);
// Code block A - this code block is needed for creating simple tab widget. Do not delete
$domain_name =  base_url();
?>
<div class="row">
	<div class="col-lg-12">
		<div class="navbar navbar-inverse navbar-fixed-top main-menu menu top-fix2" role="navigation" style="margin-bottom:0px; position:relative; color:#fff;">
			
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand home_logo" rel="home" href="<?php echo base_url(); ?>"><i class="fa fa-home"></i></a>
			</div>
			
			<div class="collapse navbar-collapse">
			
				<ul class="nav navbar-nav menus">
                <?php
				$l=0; 
				//echo '<li class="StatesHover"><a style="color: #ffeb00 !important;" target="_BLANK" class="MenuItem" href="http://www.dinamani.com/asian-games/">ஆசிய விளையாட்டு 2018</a></li>'; 
				echo '<li class="StatesHover"><a style="color: #e67a05 !important;" class="MenuItem" href="https://www.dinamani.com/dinamani-video" target="_BLANK"><i class="fa fa-video-camera"></i></a></li>';
				foreach($widget_instancemainsection as $get_section)
				{
				$MainSectionPageURL = base_url(). $get_section['URLSectionStructure'];
				$SectionPageURL     = $get_section['URLSectionStructure'];
				$url_segment = $this->uri->uri_string();
				$add_active = ($view_mode=="live" && ($SectionPageURL==$url_segment))? "active" : "";
				$add_attr = ($l>1)?'id="tab'.$get_section['Section_ID'].'"' : '';
				if($get_section['CustomTitle']=='வார இதழ்கள்'){
				$get_section['CustomTitle'] = 'இதழ்கள்';
				}
				if($get_section['CustomTitle']=='திருமணப் பொருத்தம்'){
					echo '<li '.$add_attr.' class="StatesHover"><a style="color: #ffeb00 !important;" class="MenuItem '.$add_active.'" href="'.$MainSectionPageURL.'">'.$get_section['CustomTitle'].'</a></li>';
				}else{
					echo '<li '.$add_attr.' class="StatesHover"><a class="MenuItem '.$add_active.'" href="'.$MainSectionPageURL.'">'.$get_section['CustomTitle'].'</a></li>';
				}
				$l++;
				}			
				?>
				</ul>
				
			</div>
		</div>
	</div>
</div>


