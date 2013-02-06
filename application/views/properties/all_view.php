<div class="content span9 properties">
	
	<div class="alert alert-info alert-block">

		<h4>Bug Reporting</h4>
		Please use the Feedback link at the bottom of the page to report bugs. Provide as much information as possible to ensure the bug's fix. If you see a bug already posted and you experience it as well, simply vote for that bug, do not duplicate reports.  

	</div>


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
				//get first photo
                list($photo) = explode(',', $row['photos']);
                $profile_image = $photo != "" ? 'thumbnails/' . $photo : 'assets/images/main/nopic.png';
		?>
		<li>
                <div class="pasturePic"><img src="<?=base_url("$profile_image")?>"></div>
                <div class="pastureInfo">
                    <h3><a href="<?=base_url() . 'properties/view/' . $row['id']; ?>"><?=$row['name']?></a></h3>
                    <p>
                        <div class="location"><?=$row['city']?>, <?=$row['state']?></div> <br />
                    </p>
                        <?php if(!empty($row["other_info"])) { ?>
                        <div class="description">
                            <div class="descriptionText"><?=$row['other_info']?></div>
                        </div>
                    <?php } ?>
                </div>
            </li>
		<?php
			}//end foreach
		}//end else
		?>

	</ul>
</div><!-- end content -->
<div class="span8 offset3" class="pagination">
<?=$pages?>
</div>
</div><!-- end row_fluid -->
</div><!-- end container_fluid -->
