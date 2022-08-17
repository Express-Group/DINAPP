<?php if($error==false):
$table = json_decode($data[0]['table_properties'],true);
$table = $table['data'];
$id =rand(100,10000);
?>
<!DOCTYPE html>
<html lan="en">
	<head>
		<meta charset="UTF-8">
		<title>Election tables - Dinamani</title>
		<style>
			.nietb-<?php echo $id; ?>{border-collapse: collapse;width: 100%;float:left;font-family: Droid regular,sans-serif!important;font-size: <?php if($source=='DN'){ echo '10px';}else{ echo '12px';} ?>;}
			.nietb-<?php echo $id; ?> th , .nietb-<?php echo $id; ?> td{border: 1px solid #dddddd;text-align: left;padding: 11px;}
			.nietb-<?php echo $id; ?> thead tr:first-child{background:#e67a05;color:#fff;}
			.nietb-<?php echo $id; ?> thead tr:last-child{background:#ce3838;color:#fff;text-align:center;}
			.nietb-<?php echo $id; ?> thead tr:first-child th:last-child{text-align:left;}
			.nietb-<?php echo $id; ?> thead tr:last-child th{text-align:center;}
			.nietb-<?php echo $id; ?> thead tr:last-child th:first-child{border-left: 1px solid #ce3838;}
			.nietb-<?php echo $id; ?> thead tr:last-child th:last-child{border-right: 1px solid #ce3838;}
			.nietb-<?php echo $id; ?> tbody{background:#eeeeee3d;}
			.nietb-<?php echo $id; ?> tbody td{text-align:center;}
		</style>
	</head>
	<body style="margin:0;">
		<table class="nietb-<?php echo $id; ?>">
			<thead>
				<tr><th colspan="2"><?php echo $data[0]['table_name']; ?></th><!--<th><?php echo $data[0]['total']; ?></th>--></tr>
				<tr><th>Party</th><th style="display:none;">Lead</th><th style="display:none;">Won</th><th>Won</th></tr>
			</thead>
			<tbody>
				<?php
					for($i=0;$i<count($table);$i++){
						echo '<tr>';
						echo '<td>'.$table[$i]['field1'].'</td>';
						echo '<td style="display:none;">'.$table[$i]['field2'].'</td>';
						echo '<td style="display:none;">'.$table[$i]['field3'].'</td>';
						echo '<td>'.$table[$i]['field4'].'</td>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</body>

<?php else :  ?>
<!DOCTYPE html>
<html lan="en">
	<head>
		<meta charset="UTF-8">
		<title>Election tables</title>
	</head>
	<body>
		<h5 style="text-align:center;">No tables found</h5>
	</body>
</html>
<?php endif; ?> 