<?php
$widget_bg_color       = $content['widget_bg_color'];
$is_home               = $content['is_home_page'];
$view_mode             = $content['mode'];
$widget_instance_id 	= $content['widget_values']['data-widgetinstanceid'];
$domain_name           = base_url();
?>
		
		<div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="side-gap" >
                <div class="box-botton vote-button">மக்கள் கருத்து</div>
				
				      <?php
		$polls = $this->widget_model->get_widget_Polls()->row_array();
			if($polls) 
					{ 
						$show_image                  = '';
						if($polls['image_path']!="")
						{
							$Image150X150            = str_replace("original","w150X150", $polls['image_path']);
							$imagealt                = $polls['image_alt'];
							$imagetitle              = $polls['image_title'];
						
						if (file_exists(destination_base_path . imagelibrary_image_path . $Image150X150) && $Image150X150 != '')
						{
							$show_image = image_url. imagelibrary_image_path . $Image150X150;
						}
					}
						$poll_vote = $this->widget_model->select_poll($polls['Poll_id'])->row_array();
				?>

                <div class="box-one  vote-box " <?php echo $widget_bg_color;?>>
				<div class="BeforePoll" id="BeforePoll<?php echo $widget_instance_id; ?>">
                  
                  <articel class="people1">
					 <p><?php echo $polls['PollQuestion']; ?></p>
                  </articel>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="col-lg-6 col-md-7 col-sm-6 col-xs-6 people-mind ">
                        <form>
                          <ul class="form-vote">
						  	<?php if($polls['OptionText1']!="") { ?>
								<li>
								  <label class="form-list" for="radioOption1<?php echo $widget_instance_id; ?>"><?php echo $polls['OptionText1']; ?></label>
								  <input  class="pull-left" type="radio" value="1" set_value="<?php if(isset($poll_vote['textvalue1']) && $poll_vote['textvalue1']!="") { echo $poll_vote['textvalue1']+1; } else { echo 1; } ?>"  name="radioOption<?php echo $widget_instance_id; ?>" id="radioOption1<?php echo $widget_instance_id; ?>"/>
								</li>
							<?php } ?>
							<?php if($polls['OptionText2']!="") { ?>
								<li>
								  <label class="form-list" for="radioOption2<?php echo $widget_instance_id; ?>"><?php echo $polls['OptionText2']; ?></label>
								  <input  class="pull-left" type="radio" value="2" set_value="<?php if(isset($poll_vote['textvalue2']) && $poll_vote['textvalue2']!="") { echo $poll_vote['textvalue2']+1; } else { echo 1; } ?>" name="radioOption<?php echo $widget_instance_id; ?>" id="radioOption2<?php echo $widget_instance_id; ?>"/>
								</li>
							<?php } ?>
							<?php if($polls['OptionText3']!="") { ?>
								<li>
								  <label class="form-list" for="radioOption3<?php echo $widget_instance_id; ?>"><?php echo $polls['OptionText3']; ?></label>
								  <input  class="pull-left" type="radio" value="3" set_value="<?php if(isset($poll_vote['textvalue3']) && $poll_vote['textvalue3']!="") { echo $poll_vote['textvalue3']+1; } else { echo 1; } ?>" name="radioOption<?php echo $widget_instance_id; ?>" id="radioOption3<?php echo $widget_instance_id; ?>"/>
								</li>
							<?php } ?>
							<?php if($polls['OptionText4']!="") { ?>
								<li>
								  <label class="form-list" for="radioOption4<?php echo $widget_instance_id; ?>"><?php echo $polls['OptionText4']; ?></label>
								  <input  class="pull-left" type="radio" value="4" name="radioOption<?php echo $widget_instance_id; ?>" set_value="<?php if(isset($poll_vote['textvalue4']) && $poll_vote['textvalue4']!="") { echo $poll_vote['textvalue4']+1; } else { echo 1; } ?>" id="radioOption4<?php echo $widget_instance_id; ?>"/>
								</li>
							<?php } ?>
							<?php if($polls['OptionText5']!="") { ?>
								<li>
								  <label class="form-list" for="radioOption5<?php echo $widget_instance_id; ?>"><?php echo $polls['OptionText5']; ?></label>
								  <input  class="pull-left" type="radio" value="5" set_value="<?php if(isset($poll_vote['textvalue5']) && $poll_vote['textvalue5']!="") { echo $poll_vote['textvalue5']+1; } else { echo 1; } ?>"  name="radioOption<?php echo $widget_instance_id; ?>" id="radioOption5<?php echo $widget_instance_id; ?>"/>
								</li>
							<?php } ?>
                          </ul>
                        </form>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 vote">
                        
						<table>
                        <tr>
                        <td>
                        <button id="vote_button<?php echo $widget_instance_id; ?>" class="btn-primary" name="vote_button" type="button">வாக்களி</button>
                        </td>
						<td>
                         	<h4><a href="javascript:;" id="vote-list<?php echo $widget_instance_id; ?>" name="vote-list">முடிவுகள்</a></h4>
                        </td>
                        </tr>
                         
                        </table>
                      </div>
                    </div>
                  </div>
				  
				  <articel>
				   <?php if(isset($polls['Content_ID']) && $polls['Content_ID'] !="") { ?>
                   <h4 class="link-news">தொடர்புடைய செய்தி</h4>
                    <?php } ?>
				   <div>
				  	<?php if($show_image != "" ) {  ?>
					<figure class="kural-img people-img"><img src="<?php echo $show_image; ?>" data-src="<?php echo $show_image; ?>" title="<?php echo $imagetitle; ?>" alt="<?php echo $imagealt; ?>" /></figure>
					<?php } ?>
					
                    <?php if(isset($polls['Content_ID']) && $polls['Content_ID'] !="") { 
						$domain_name  = base_url();
						//$url_structure = $content['url_structure'];
					?>
                    
                    <?php 
					// getting content details 

					$content_details = $this->widget_model->get_contentdetails_from_database($polls['Content_ID'], 1, $is_home, $view_mode);	
					
					$content_url      = $content_details[0]['url'];
					$param            = $content['page_param'];
					$live_article_url = $domain_name. $content_url."?pm=".$param;
					$display_title    = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$content_details[0]['title']); //to remove first<p> and last</p>  tag
																
					?>
				
					  <p class="kural-mean people"><a href="<?php echo $live_article_url;?>" class="article_click"><?php if(isset($polls['Content_ID']) && $polls['Content_ID'] !="")echo preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$content_details[0]['title']); ?></a></p>
					  
				
                    <?php } ?>
					</div>
                  </articel>
				  </div>
				  
				<?php $get_count = $this->widget_model->select_poll($polls['Poll_id'])->num_rows();	?>
				  
				  <div class="after-vote" id="after-vote<?php echo $widget_instance_id; ?>">
                     <p id="poll_msg<?php echo $widget_instance_id; ?>"></p>
					   <table id="after_vote_table<?php echo $widget_instance_id; ?>">
                       
					   <tr>
					   <th>முடிவு</th>
					   </tr>
					   <?php if($polls['OptionText1']!="") { ?>
					   <tr>
					   <td class="vote-yes"><?php echo $polls['OptionText1']; ?></td>
					   <td class="vote-no"><div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="70"
						  aria-valuemin="0" aria-valuemax="100" id="result1<?php echo $widget_instance_id; ?>">
						  </div>
						</div></td>
					   </tr>
					   <?php } ?>
					   <?php if($polls['OptionText2']!="") { ?>
					   <tr>
					   <td class="vote-yes"><?php echo $polls['OptionText2']; ?></td>
					   <td class="vote-no"><div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="70"
						  aria-valuemin="0" aria-valuemax="100" id="result2<?php echo $widget_instance_id; ?>">
						  </div>
						</div></td>
					   </tr>
					   <?php } ?>
					   <?php if($polls['OptionText3']!="") { ?>
					   <tr>
					   <td class="vote-yes"><?php echo $polls['OptionText3']; ?></td>
					   <td class="vote-no"><div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="70"
						  aria-valuemin="0" aria-valuemax="100" id="result3<?php echo $widget_instance_id; ?>">
						  </div>
						</div></td>
					   </tr>
					   <?php } ?>
					   <?php if($polls['OptionText4']!="") { ?>
					   <tr>
					   <td class="vote-yes"><?php echo $polls['OptionText4']; ?></td>
					   <td class="vote-no"><div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="70"
						  aria-valuemin="0" aria-valuemax="100" id="result4<?php echo $widget_instance_id; ?>">
						  </div>
						</div></td>
					   </tr>
					   <?php } ?>
					   <?php if($polls['OptionText5']!="") { ?>
					   <tr>
					   <td class="vote-yes"><?php echo $polls['OptionText5']; ?></td>
					   <td class="vote-no"><div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="70"
						  aria-valuemin="0" aria-valuemax="100" id="result5<?php echo $widget_instance_id; ?>">
						  </div>
						</div></td>
					   </tr>
					   <?php } ?>
					   </table>
                       <p id="detailInfo<?php echo $widget_instance_id; ?>"></p>
					   <p class="back-botton" id="back-list<?php echo $widget_instance_id; ?>">BACK</p>
                </div>
                </div>
				
				
                <?php } ?>
              </div>
			  
            </div>
        </div>

<script>


<?php if($polls) { ?>
$(document).ready(function()
{
	var poll_id = "<?php echo $polls['Poll_id']; ?>";
	$("#vote_button"+<?php echo $widget_instance_id; ?>).click(function()
	{
		var vote_count = $('input:radio[name=radioOption<?php echo $widget_instance_id; ?>]:checked').attr('set_value');
		var option = $('input:radio[name=radioOption<?php echo $widget_instance_id; ?>]:checked').val();
			
		$.ajax({
			type: "POST",
			data: {"get_option":option, "get_poll_id":poll_id, "get_count":vote_count, "instance_id":'<?php echo $widget_instance_id; ?>'},
			url: "<?php echo base_url(); ?>user/commonwidget/get_poll_results",
			success:function(data)
			{
				if(data == "success")
				{
					var session = "<?php echo $this->input->cookie('IE_pollID'); ?>";
					$('input:radio[name=radioOption<?php echo $widget_instance_id; ?>]').attr('disabled', true);
					$('#vote_button'+<?php echo $widget_instance_id; ?>).attr('disabled', true);
					
					poll_results<?php echo $widget_instance_id; ?>();
					$("#poll_msg"+<?php echo $widget_instance_id; ?>).html("Thank you for voting.");
					$('#vote_button'+<?php echo $widget_instance_id; ?>).hide();
				}
			}
		});
	});
	
	
	$("#vote-list"+<?php echo $widget_instance_id; ?>).bind("click", function(){
		poll_results<?php echo $widget_instance_id; ?>();
	});
	
	$("#vote_button"+<?php echo $widget_instance_id; ?>).bind("click", function(){
		poll_results<?php echo $widget_instance_id; ?>();
	});

	$("#back-list"+<?php echo $widget_instance_id; ?>).bind("click", function(){
		$("#poll_msg"+<?php echo $widget_instance_id; ?>).html("");		
    	$("#BeforePoll"+<?php echo $widget_instance_id; ?>).show();
		$("#after-vote"+<?php echo $widget_instance_id; ?>).hide();
	});
	
	disable_buttton<?php echo $widget_instance_id; ?>();
	
function poll_results<?php echo $widget_instance_id; ?>()
{	
	$.ajax({
			type: "POST",
			data: {"get_poll_id":poll_id},
			url: "<?php echo base_url(); ?>user/commonwidget/select_poll_results",
			dataType: "JSON",
			success:function(data)
			{
				//alert(data.textvalue3);
				if(data != "")
				{
					var calculate_count = (+data.textvalue1) + (+data.textvalue2) + (+data.textvalue3) + (+data.textvalue4) + (+data.textvalue5); 
					var option1_perc = data.textvalue1*100/calculate_count;
					var option2_perc = data.textvalue2*100/calculate_count;
					var option3_perc = data.textvalue3*100/calculate_count;
					var option4_perc = data.textvalue4*100/calculate_count;
					var option5_perc = data.textvalue5*100/calculate_count;
					
					var get_option1_perc = option1_perc.toFixed(0);
					var get_option2_perc = option2_perc.toFixed(0);
					var get_option3_perc = option3_perc.toFixed(0);
					var get_option4_perc = option4_perc.toFixed(0);
					var get_option5_perc = option5_perc.toFixed(0);
					
					$("#result1"+<?php echo $widget_instance_id; ?>).html('('+data.textvalue1+')'+get_option1_perc+'%');
					$("#result2"+<?php echo $widget_instance_id; ?>).html('('+data.textvalue2+')'+get_option2_perc+'%');
					$("#result3"+<?php echo $widget_instance_id; ?>).html('('+data.textvalue3+')'+get_option3_perc+'%');
					$("#result4"+<?php echo $widget_instance_id; ?>).html('('+data.textvalue4+')'+get_option4_perc+'%');
					$("#result5"+<?php echo $widget_instance_id; ?>).html('('+data.textvalue5+')'+get_option5_perc+'%');
					
					$("#result1"+<?php echo $widget_instance_id; ?>).css('width', get_option1_perc+'%');
					$("#result2"+<?php echo $widget_instance_id; ?>).css('width', get_option2_perc+'%');
					$("#result3"+<?php echo $widget_instance_id; ?>).css('width', get_option3_perc+'%');
					$("#result4"+<?php echo $widget_instance_id; ?>).css('width', get_option4_perc+'%');
					$("#result5"+<?php echo $widget_instance_id; ?>).css('width', get_option5_perc+'%');
					//alert(calculate_count);
					$('#detailInfo'+<?php echo $widget_instance_id; ?>).html('Votes so far: '+calculate_count+'');
				}
				else
				{
					var result_id_list = '#'+ result1+<?php echo $widget_instance_id; ?> +','+ '#'+ result2+<?php echo $widget_instance_id; ?> +','+ '#'+ result3+<?php echo $widget_instance_id; ?> +','+'#'+ result4+<?php echo $widget_instance_id; ?> +','+'#'+ result5+<?php echo $widget_instance_id; ?>;
					//$("#result1, #result2, #result3, #result4, #result5").html('('+0+')'+0+'%');
					//$("#result1, #result2, #result3, #result4, #result5").css('width', 0+'%');
					
					$(result_id_list).html('('+0+')'+0+'%');
					$(result_id_list).css('width', 0+'%');
					$('#detailInfo'+<?php echo $widget_instance_id; ?>).html('Votes so far: 0');
				}
				
				$("#BeforePoll"+<?php echo $widget_instance_id; ?>).hide();
				$("#after-vote"+<?php echo $widget_instance_id; ?>).show();	
			}
		});
}
});
function disable_buttton<?php echo $widget_instance_id; ?>()
{
	var poll_id = "<?php echo $polls['Poll_id']; ?>";
	var session = "<?php echo $this->input->cookie('IE_pollID'.$widget_instance_id); ?>";

	if(session == poll_id)
	{
		$('input:radio[name=radioOption<?php echo $widget_instance_id; ?>]').attr('disabled', true);
		$('#vote_button'+<?php echo $widget_instance_id; ?>).attr('disabled', true);
		$('#vote_button'+<?php echo $widget_instance_id; ?>).hide();
	}
}

 <?php } ?>
</script>