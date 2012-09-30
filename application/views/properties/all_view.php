<div class="content span8 properties">
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
			<h3><a href="<?=base_url() . 'properties/view/' . $row['id']; ?>"><?=$row['name']?></a></h3>
			<p><?=$row['city']?>, <?=$row['state']?> <?=$row['country']?></p>
			<p><strong>Min Bid:</strong> <?php echo isset($row['min_bid']) ? $row['min_bid'] : 'Not specified'?> </p>
		</li>
		<?php
			}//end foreach
		}//end else
		?>

	</ul>
</div><!-- end content -->
<div class="span8 offset4">
<?=$pages?>
</div>
</div><!-- end row_fluid -->
</div><!-- end container_fluid -->
