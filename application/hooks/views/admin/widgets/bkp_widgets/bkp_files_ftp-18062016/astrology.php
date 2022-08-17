<?php

$widget_bg_color = $content['widget_bg_color'];
$widget_custom_title = $content['widget_title'];
$widget_instance_id =  $content['widget_values']['data-widgetinstanceid'];

$param = $content['page_param']; //parent id of rasi palangal

$SectionDetails = get_section_by_id($param);

if(isset($SectionDetails)) {
$rasi_id = $SectionDetails['Section_id'];
$rasi_name = $SectionDetails['Sectionname'];
}

if(isset($rasi_id) && $rasi_id != '') {
	
	switch($rasi_name) {
		case 'மேஷம்':
			$ClassName = "rasi_mesham";
		break;
		case 'ரிஷபம்':
			$ClassName = "rasi_rishabam";
		break;
		case 'தனுசு':
			$ClassName = "rasi_dhanusu";
		break;
		case 'கடகம்':
			$ClassName = "rasi_kadagam";
		break;
		case 'கன்னி':
		$ClassName = "rasi_kanni";
		break;
		case 'கும்பம்':
			$ClassName = "rasi_kumbam";
		break;
		case 'மகரம்':
			$ClassName = "rasi_magaram";
		break;
		case 'மிதுனம்':
			$ClassName = "rasi_midhunam";
		break;
		case 'சிம்மம்':
			$ClassName = "rasi_simmam";
		break;
		case 'துலாம்':
			$ClassName = "rasi_thulam";
		break;
		case 'விருச்சிகம்':
			$ClassName = "rasi_viruchigam";
		break;
		case 'மீனம்':
			$ClassName = "rasi_menam";
		break;
		default:
			$ClassName = "rasi_mesham";
		break;
	}
	
	
$astrology_results = astrology_list(@$rasi_id);

?>
<div class="rasi-full">
  <h4 class="rasi-title"><?php echo @$rasi_name; ?></h4>
  <div class="common-rasi"> 
  	<div class="rasi-cover">
       <span class="rais-img <?php echo $ClassName; ?>"></span>
    </div>
    <!--<p>20 March – 19 April</p>-->
   <?php echo $astrology_results['general_details']; ?>
  </div>
</div>
  
  <div class="rasi-today">
    <h4 class="rasi-title">இன்று</h4>
    <?php echo $astrology_results['daily_details']; ?>
  </div>
  <div class="rasi-today">
    <h4 class="rasi-title">இந்த வாரம்</h4>
     <?php echo $astrology_results['weekly_details']; ?>
  </div>
  <div class="rasi-today">
    <h4 class="rasi-title">இந்த மாதம்</h4>
    <?php echo $astrology_results['monthly_details']; ?>
  </div>
  <div class="rasi-today yearly-predictions">
    <h4 class="rasi-title">இந்த ஆண்டு</h4>
   <?php echo $astrology_results['yearly_details']; ?>
  </div>
<?php } ?>
