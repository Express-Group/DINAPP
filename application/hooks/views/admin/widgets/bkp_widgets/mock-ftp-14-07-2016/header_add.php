<?php
$widget_bg_color 		= $content['widget_bg_color'];
$widget_instance_id	 	= $content['widget_values']['data-widgetinstanceid'];
$view_mode              = $content['mode'];
$widget_instance_details= $this->widget_model->getWidgetInstance('', '','', '', $widget_instance_id, $content['mode']);		
?>
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="ad_script_<?php echo $widget_instance_id;?>" id="ad_script_<?php echo $widget_instance_id;?>"  <?php //echo $widget_bg_color;  ?> style="text-align:center;">
      <?php //echo urldecode($widget_instance_details['AdvertisementScript']); ?>
      <?php $add_acript = json_encode(urldecode($widget_instance_details['AdvertisementScript'])); ?>
      <?php //echo $widget_instance_details['AdvertisementScript']; ?>
    </div>
  </div>
</div>
<script type="text/javascript">
  // jQuery used as an example of delaying until load.
  $(function() {
  setTimeout(function(){
  var adscript = '';
    postscribe('#ad_script_<?php echo $widget_instance_id;?>', <?php echo $add_acript;?>, {
      done: function() {
        //console.info('Dblclick script has been delivered.');
		//alert('script delievered successfully');
      }
    });
	}, 3000);
  });
</script>
<script>
$(document).ready(function(){
var base_url = "<?php echo base_url(); ?>";
//setTimeout(call_add, 2000);
call_add();
function call_add(){
	var formData = {
			'instance_id'        : "<?php echo $widget_instance_id; ?>",
            'mode'               : "<?php echo $view_mode; ?>",
        };
	/*$.ajax({
			url			: base_url+'user/commonwidget/get_add_widget',
			method		: 'post',
			data		: formData,
			beforeSend	: function() {	
			$('.ad_script').html('<span style="vertical-align: middle; position: absolute;top: 37%;"><img style="width:15px"  src="'+base_url+'images/FrontEnd/images/add-loader.gif" ></span>');
			},
			success		: function(result){
			$('.ad_script_<?php echo $widget_instance_id;?>').html(result).hide().fadeIn({ duration: 2000 });
			},
	});*/
}
});
</script>