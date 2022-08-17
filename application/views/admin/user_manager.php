<link href="<?php echo base_url(); ?>css/admin/bootstrap.min_3_3_4.css" rel="stylesheet" type="text/css">	
<link href="<?php echo base_url(); ?>css/admin/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>css/admin/jquery.datetimepicker.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/moment-with-locales.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.datetimepicker.js"></script>

<script>
function get_date(input) {
if(input == '') {
return false;
}	else {
// Split the date, divider is '/'
var parts = input.match(/(\d+)/g);
return parts[2]+'/'+parts[1]+'/'+parts[0];
} 
}

jQuery(function(){
 jQuery('#date_timepicker_start').datetimepicker({
  format:'d-m-Y',
  onShow:function(ct){
   this.setOptions({
	   maxDate:get_date($('#date_timepicker_end').val())?get_date($('#date_timepicker_end').val()):false,
   })
  },
  timepicker:false
 });
 jQuery('#date_timepicker_end').datetimepicker({
  format:'d-m-Y',
  onShow:function(ct){
   this.setOptions({
	   minDate:get_date($('#date_timepicker_start').val())?get_date($('#date_timepicker_start').val()):false,
   })
  },
  timepicker:false
 });
});

</script>



<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/w2ui-fields-1.0.min.js"></script>
<link href="<?php echo base_url(); ?>css/admin/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/admin/w2ui-fields-1.0.min.css">





<script>
$(document).ready(function() 
{
	
	
	
	
	$("#search_based_check").change(function()
   {
    if(this.checked) 
     {
     $("#checkin_checkout_div").show();
    } 
    else 
    {
		$("#date_timepicker_start").val('');
     $("#date_timepicker_end").val('');
     $("#checkin_checkout_div").hide();
    }
    $("#checkin_id").val('');
        $("#checkout_id").val('');
   });
	
	
	
});

</script>



</head>
<body>

<div class="Container">
	<div class="BodyWhiteBG">
		<div class="BodyHeadBg Overflow clear">
			<div class="FloatLeft BreadCrumbsWrapper ">
				<div class="breadcrumbs">Dashboard > User Manager</div>
 					<h2>User Manager</h2>
			</div>
			 <?php $data['Menu_id'] = get_menu_details_by_menu_name("User");
		if(defined("USERACCESS_ADD".$data['Menu_id']) && constant("USERACCESS_ADD". $data['Menu_id']) == 1) 
		{ ?>
             <p class="FloatRight SaveBackTop remoda1-bg"><a href="<?php echo base_url();?>dmcpan/user_manager/user_form_view" type="button" class="btn-primary btn"><i class="fa fa-plus-circle"></i>Add New</a></p>
			 <?php }?>
            
		</div>
       
<!--<form method="post" id="myform" action="<?php echo base_url(); ?>admin/askprabhu/call_search_class" enctype="multipart/form-data" />-->
			<div class="Overflow DropDownWrapper">
            <?php 
if($this->session->flashdata("success"))
{     
?>
 <div class="FloatLeft SessionSuccess" id="flash_msg_id"><?php echo $this->session->flashdata("success");?></div>
<?php
}
?> 
<?php 
if($this->session->flashdata("success_delete"))
{     
?>
 <div class="FloatLeft SessionSuccess" id="flash_msg_id"><?php echo $this->session->flashdata("success_delete");?></div>
<?php
}
?> 
<?php 
if($this->session->flashdata("failure_delete"))
{     
?>
 <div class="FloatLeft SessionSuccess" id="flash_msg_id"><?php echo $this->session->flashdata("failure_delete");?></div>
<?php
}
?> 
  				<div class="container">
    				<div id="" class="row AskPrabuCheckBoxWrapper">
            			<ul class="AskPrabuCheckBox FloatLeft">
                        
                        
        					<!--<li class="has-pretty-child">
                            <div class="clearfix prettycheckbox labelright  red"><input type="checkbox" readonly id="search_based_check"  class="myClass" value="yes" name="answer"><a class=" " href="#"></a>
<label for="search_based_check">Search Based on Date Range</label></div><a href="#" class=""></a>
    						</li>-->
    
     
       <li>
<p class="CalendarWrapper"  id="checkin_checkout_div"><label for="search_based_check">Search Based on Date Range</label><input type="text" value="" id="date_timepicker_start" placeholder="Start Date"><input type="text" value="" id="date_timepicker_end" placeholder="End Date" readonly></p>
 </li>
           
            
                    	</ul>
    			</div>
			</div>

<div class="FloatLeft Module02">
<div class="FloatLeft w2ui-field">
<select id="ddFilterBy" name="ddFilterBy" placeholder="Sort By: All" class="controls">
<!--<option value="">- Status -</option>-->
<option value="All">Search By- All</option>
<option value="1">Username</option>
<option value="2">Full Name</option>

</select>
</div>

<div class="FloatLeft w2ui-field">
<select id="ddStatus" name="ddStatus" class="controls">
<!--<option value="">- Status -</option>-->
<option value=2>Status- All</option>
<option value=1>Active</option>
<option value=0>In Active</option>
</select>
</div>
			
<div class="FloatLeft"><input type="search" placeholder="Search" class="SearchInput" name="txtSearch" id="txtSearch"></div>

<!--<i  id="user_search" class="fa fa-search FloatLeft" ></i>
<button class="btn-primary btn margin-left-50" type="button" id="clear_search">Clear Search</button>-->

<button class="btn btn-primary" type="button" id="user_search">Search</button>
<button class="btn btn-primary" type="button" id="clear_search">Clear Search</button>
</div>


<p id="srch_error" style="clear: left; color:#F00;margin:0"></p>



<div id="container_datatable" class="display"  style="width:100%; float:left; ">
	<div id="work_list" class="display">
    
    <table id="example" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th style="width:200px !important;">User Name</th>
					<th>Full Name</th>
					<th>Mobile No</th>
					<th>Created On</th>
                    <th>Status</th>
                    <?php if((defined("USERACCESS_DELETE".$data['Menu_id']) && constant("USERACCESS_DELETE".$data['Menu_id']) == 1) || (defined("USERACCESS_EDIT".$data['Menu_id']) && constant("USERACCESS_EDIT".$data['Menu_id']) == 1 )) { ?><th>Action</th><?php }?>
				</tr>
			</thead>
            </table>
		
 	</div>           
</div>


<script>
	
	function delete_userdetails(id)
		{
			var r = confirm("Are you sure you want to delete?");
			if(r==true){
			window.location.href="<?php echo base_url() ?>dmcpan/user_manager/delete_user/"+id;
		}
	}
</script>
<script>
$(document).ready(function()
{
	$('#example').dataTable(
	{});
	user_datatables();
	$('#txtSearch').keypress(function(e)
	{
		if ($.trim($('#txtSearch').val()) != '')
		{
			var key = e.which;
			if (key == 13)
			{
				user_datatables();
			}
		}
	});
	$("#clear_search").click(function()
	{
		$("#ddFilterBy").val('All');
		$("#ddStatus").val('2');
		$("#txtSearch").val('');
		$("#date_timepicker_start").val('');
		$("#date_timepicker_end").val('');
		$("#srch_error").html('').hide();

		//$("#article_status").val('');
		user_datatables();
	});
});

function user_datatables()
{
	var fromdate = $("#date_timepicker_start").val();
	var todate = $("#date_timepicker_end").val();
	var filterby = $("#ddFilterBy").val();
	var status = $("#ddStatus").val();
	var searchbox = $("#txtSearch").val();
	var searchondate = $("#check1:checked").val();
	$('#example').dataTable(
	{
		// filter:false,
		/*columnDefs: [
                        {
                            orderData: [[4, 'desc'], [5, 'asc']]//sort by age then by salary
                        }
                    ],
		*/
		/*fnInitComplete : function() {
      if ($(this).find('tbody tr').length<=1) {
         $(this).parent().hide();
      }
   } */
		"processing": true,
		"bServerSide": true,
		"bDestroy": true,
		"autoWidth": false,
		"searching": false,
		"iDisplayLength": 10,
		"order": [
			[0, "asc"]
		],
		
		"aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ -1 ] }
       ],
		//"order": [[5,"asc"] ],
		oLanguage:
		{
			sProcessing: "<img src='<?php echo base_url(); ?>images/admin/loadingroundimage.gif' style='width:40px; height:40px;'>"
		},
		"fnDrawCallback": function(oSettings)
		{
			$("html, body").animate(
			{
				scrollTop: 0
			}, "slow");
			//alert();
			if ($('span a.paginate_button').length <= 1)
			{
				$("#example_paginate").hide();
				// $("#example_length").hide();
			}
			else
			{
				$("#example_paginate").show();
				$("#example_length").show();
			}
			if ($(this).find('tbody tr').text() == "No matching records found")
			{
				$(oSettings.nTHead).hide();
				$('.dataTables_info').hide();
				$("#example_length").hide();
				$("#example").find('tbody tr').html($('<td valign="top" colspan="10" class="dataTables_empty BackArrow">No matching records found <a href="" data-toggle="tooltip" title="Back to list"><i class="fa fa-reply fa-2x"></i></a></td>'));
			}
			else
			{
				$(oSettings.nTHead).show();
			}
		},
		"ajax":
		{
			"url": "<?php echo base_url(); ?>dmcpan/user_manager/user_datatable",
			"type": "POST",
			"data":
			{
				"from_date": fromdate,
				"to_date": todate,
				"filterby": filterby,
				"searchtxt": searchbox,
				"searchondate": searchondate,
				"status": status
			},
			/*success:function(data)
		{
       
      	 	alert(data);
    	}*/
		},
	});
}
</script>
<script>
$(document).ready(function()
{
		$('body').keypress(function (e) {
			
			if(e.which == 13) {
				$("#user_search").click();
			}
			
		});
	
	
	$("#user_search").click(function()
 	{
	// console.log('ppp');
  		if($('#ddFilterBy').val() != 'All')
  		{
   			if($('#txtSearch').val() == '')
   			{
    			$("#srch_error").html("Please enter text to search").show();
    			return false;
   			}
   			else
   			{
    			user_datatables();
    			$("#srch_error").html("");
   			}
  		}
  		else
  		{
	 		$("#srch_error").html("");
   			user_datatables();
  		}
 	});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
<?php if($this->session->flashdata('success')){  ?>
$("#flash_msg_id").show();
$("#flash_msg_id").slideDown(function() {
    setTimeout(function() {
        $("#flash_msg_id").slideUp();
    }, 5000);
});
<?php } ?>
<?php if($this->session->flashdata('success_delete')){  ?>
$("#flash_msg_id").show();
$("#flash_msg_id").slideDown(function() {
    setTimeout(function() {
        $("#flash_msg_id").slideUp();
    }, 5000);
});
<?php } ?>

<?php if($this->session->flashdata('failure_delete')){  ?>
$("#flash_msg_id").show();
$("#flash_msg_id").slideDown(function() {
    setTimeout(function() {
        $("#flash_msg_id").slideUp();
    }, 5000);
});
<?php } ?>

});
</script>
            
                        
</div>                            
</div>                       
</div>
      
</body>
</html>

