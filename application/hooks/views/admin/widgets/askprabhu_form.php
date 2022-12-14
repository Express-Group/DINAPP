<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/additional-methods.min.js"></script>
<style>
label.error {
	color:#F00;
}
</style>
<script>
$(document).ready(function()
	{
	
		$("#AskPrabhuForm").validate({
		rules: 
		{			
			txtQuestion: 
			{ 
				required: true,
				//alphanumeric : true,
				//maxlength:255,
			},
			txtEmail: 
			{ 
				required: true,
				email:true,
				//alphanumeric : true,
				maxlength:50,
			},
			txtName: 
			{ 
				required: true,
				//alphanumeric : true,
				maxlength:50,
			},
			captcha:
			{
				required: true,
			}
			
		},
		messages: 
		{
			txtQuestion:
			{
				required: "Please enter your question",
				//alphanumeric:"Please enter valid characters",
				//maxlength:"Please do not enter more than 255 characters."
			},
			txtEmail:
			{
				required: "Please enter your email id",
				//alphanumeric:"Please enter valid characters",
				maxlength:"Please do not enter more than 50 characters."
			},
			txtName:
			{
				required: "Please enter your name",
				//alphanumeric:"Please enter valid characters",
				maxlength:"Please do not enter more than 50 characters."
			},
			captcha:
			{
				required: "Please enter captcha",
			}
			
		},
		errorPlacement: function (error, element) 
		{
        	if(element.attr("name") == 'captcha')
         	{   
				error.insertAfter($("#capcha_error"));
		 	}
		 	else
		 	{
			 	//alert(element.attr("name"));
			 	error.insertAfter($("#"+element.attr("name")));
		 	}
		},

	});
	
	$("#btnPost").click(function() 
		{
			if($("#AskPrabhuForm").valid())
			{
				var capicha=$('#captcha').val();
				
				$.ajax({
						type: "POST",
						data: {"capichatext":capicha},
						url:"<?php echo base_url(); ?>dmcpan/askprabhu/check_capicha",
						success: function(result)
						{
							if(result=="incorrect")
							{
								alert('Please enter correct captcha');
							}
							else
							{
								post_questions();
								
							}
							//alert(result);
							
						}
						});
	
			}
				
		});
	
	$("#btnrefresh").on("click", function()
	{
		
		var img = document.getElementById('captcha_code'),
        timestamp = new Date().getTime();
    	img.src = '<?php echo base_url();?>dmcpan/askprabhu/capicha?timestamp=' + new Date().getTime();
		
		
    		//$("#captcha_code").attr('src','<?php echo base_url();?>admin/askprabhu/capicha');
  	});	
 });

</script>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="AskPrabhuPost">
			<h3 class="AskPrabhuTitle title">POST YOUR QUESTION</h3>
			<div class="AskPrabhuForm">
				<form method="post" name="AskPrabhuForm" id="AskPrabhuForm"  enctype="multipart/form-data" action="">
					<table class="AskPrabhuFormTable">
						<tr>
							<td><label>Post Your question</label></td>
							<td class="PositionRelative"><textarea id="txtQuestion" name="txtQuestion"></textarea>
								<span class="PrabhuStar">*</span></td>
						</tr>
						<tr>
							<td><label>email</label></td>
							<td class="PositionRelative"><input type="text" id="txtEmail" name="txtEmail">
								<span class="PrabhuStar">*</span></td>
						</tr>
						<tr>
							<td><label>name</label></td>
							<td class="PositionRelative"><input type="text" id="txtName" name="txtName">
								<span class="PrabhuStar">*</span></td>
						</tr>
						<tr>
							<td><label>place</label></td>
							<td><input type="text" id="txtPlace" name="txtPlace"></td>
						</tr>
					</table>
					<table class="AskPrabhuSubmit">
						<tbody>
							<tr> 
								<!--
		<td>
  <div class="AskPrabhuCaptcha"> 
<img id="captcha_code" src="http://192.168.0.98:81/Indianexpress/admin/askprabhu/capicha"><br>
<span class="info" id="captcha-info"></span>
<div class="CaptchaBack">
<input type="text" class="demoInputBox error" id="captcha" name="captcha" aria-required="true" aria-invalid="true">
<label id="captcha-error" class="error" for="captcha">Please enter capicha</label>
<button name="submit" class="btnRefresh FloatLeft" onclick="refreshCaptcha();"><i class="fa fa-refresh"></i></button>
    </div>
	</div>
</td>-->
								
								<td><div class="AskPrabhuCaptcha"> <img id="captcha_code" class="CaptchaImg" src="<?php echo base_url();?>dmcpan/askprabhu/capicha" alt="" /> <span id="captcha-info" class="info"></span>
										<div class="CaptchaBack">
											<input type="text" name="captcha" id="captcha" placeholder="Enter the text" class="CaptchaInputBox">
											<input type="button" name="submit" id="btnrefresh" value="refresh" class="captcha-refresh">
											<p id="capcha_error"></p>
										</div>
									</div></td>
								<td><button id="btnPost" name="btnPost" type="button">Post</button></td>
							</tr>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
		function post_questions()
		{
			var question=$('#txtQuestion').val();
			var email=$('#txtEmail').val();
			var place=$('#txtPlace').val();
			var name=$('#txtName').val();
			$.ajax({
						type: "POST",
						data: {"question":question,"mailid":email,"place":place,"username":name},
						url:"<?php echo base_url(); ?>dmcpan/askprabhu/add_askprabhuquestion",
						success: function(result)
						{
							//console.log(result);
							if(result=="success")
							{
								
								alert('Your question posted successfully');	
								$('#txtQuestion').val('');
								$('#txtEmail').val('');
								$('#txtPlace').val('');
								$('#txtName').val('');
								$('#captcha').val('');
								var img = document.getElementById('captcha_code'),
        timestamp = new Date().getTime();
    	img.src = '<?php echo base_url();?>dmcpan/askprabhu/capicha?timestamp=' + new Date().getTime();
							}
							else
							{
								alert('Your question posted failed');	
							}
							//alert(result);
							
						}
						});
		}
		
	/*function refreshCaptcha() {
		//alert('sad');
		
		 
		//});
		
		
		
	//$("#captcha_code").attr('src','<?php echo base_url();?>admin/askprabhu/capicha');
}*/
		</script>