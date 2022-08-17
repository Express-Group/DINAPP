<div class="row">
<?php
$widget_instance_id =  $content['widget_values']['data-widgetinstanceid'];
$is_home            = $content['is_home_page'];
$view_mode          = $content['mode'];
$header_details = $this->widget_model->select_setting($view_mode);
?>
    <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
    <div class="top-gap margin-top-10">
      <figure class="part-logo"><img src="<?php echo base_url(); ?>images/FrontEnd/images/group.jpg" /></figure>
        <div class="loc">
          <p class="date font-arial">
				<?php 
				date_default_timezone_set('Asia/Kolkata'); // this sets time zone to IST
                     echo date('h:i A ').'- IST'.', </br>'.date('l').' </br>'.date(' jS  F Y ');
			    ?>
                </p>
          
      </div>
    </div>
    </div>
<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
    <div class="logo_pad ">
    <div class="main_logo">
      <?php 
echo '<a href="'.base_url().'">
<img src="'.base_url().$header_details['sitelogo'].'"></a>';
?></div>
    </div>
  </div>
<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
    <div class="social_icons SocialCenter"> <a class="fb" href="<?php echo $header_details['facebook_url'];?>" target="_blank"><i class="fa fa-facebook"></i></a> <a class="google" href="<?php echo $header_details['google_plus_url'];?>" target="_blank"><i class="fa fa-google-plus"></i></a> <a class="twit" href="<?php echo $header_details['twitter_url'];?>" target="_blank"><i class="fa fa-twitter"></i></a> <a class="rss" href="<?php echo $header_details['rss_url'];?>" target="_blank"><i class="fa fa-rss"></i></a> </div>
          <div class="search1">
          <form class="navbar-form formb" action="<?php echo base_url(); ?>topic"  name="SimpleSearchForm" id="SimpleSearchForm" method="get" role="form">
            <div class="input-group">
              <input type="text" class="form-control tbox" placeholder="தேடல்" name="search_term" id="srch-term" value="<?php echo @$_GET['search_term'];?>">
              <div class="input-group-btn">
                <input type="hidden" class="form-control tbox"  name="home_search" value="H" id="home_search">
                <button class="btn btn-default btn-bac" id="search-submit" type="submit"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
          <label id="error_throw"></label>
        </div>
      </div>
</div>