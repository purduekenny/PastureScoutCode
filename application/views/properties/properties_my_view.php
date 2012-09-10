<div class="dashboard_content">
	<div class="left">
	<?php
		if(empty($properties)){
			?>
			<h2>There are currently no Pastures to view.</h2>
			<?php
			}else{
	?>
	<ul>
		<?php
			foreach($properties as $row){

		?>
		<li>
			<h3><?=$row['name']?><span style="float: right; margin-right: 10px; font-size:15px;"><a href="<?=base_url() . 'properties/edit/' . $row['id']; ?>">edit</a> | <a href="<?=base_url() . 'properties/archive/' . $row['id']; ?>">delete</a></span></h3>
			<p><?=$row['city']?>, <?=$row['state']?> <?=$row['country']?></p>
			<p><strong>Location:</strong> <?=$row['city']?> </p>
			<p><strong>Region:</strong> <?=$row['region']?> </p>
			<p><strong>Restricted Stock Type:</strong> <?php echo $row['restricted_stock_type'] = '' ? $row['restricted_stock_type'] : 'None specified'?> </p>
			<p><strong>Max Head Count:</strong> <?php echo isset($row['max_head_count']) ? $row['max_head_count'] : 'Not specified'?> </p>
			<p><strong>Min Bid:</strong> <?php echo isset($row['min_bid']) ? $row['min_bid'] : 'Not specified'?> </p>
		</li>
		<?php
			}//end foreach
		}//end else
		?>

	</ul>
</p><?=$pages?><p>
</div>
