<?php
$profile_image = isset($forage['images'][0])? 'files/'.$forage['images'][0] : 'assets/images/main/nopic.png';
?>
<div class="content span9 forages">
    <?php
        if(empty($forages)){
            ?>
            <h2>Favorite Forages</h2>
            <p><strong>Nothing here.</strong></p>
            <p>You haven't favorited any public forages. To favorite a forage, browse to the forage you want to favorite and click the star at the top-right corner of the listing.</p>

            <?php
            }else{
    ?>
    <ul>
        <?php
            foreach($forages as $row){
                list($photo) = explode(',', $row['photos']);
                $profile_image = $photo != "" ? 'thumbnails/' . $photo : 'assets/images/main/nopic.png';
        ?>
        <li>
                <div class="foragePic img-polaroid"><img src="<?=base_url("$profile_image")?>"></div>
                <div class="forageInfo">
                    <h3><a href="<?=base_url() . 'forages/view/' . $row['id']; ?>"><?=$row['name']?></a></h3>
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
<div class="span8 offset4">
<?=$pages?>
</div>
</div><!-- end row_fluid -->
</div><!-- end container_fluid -->
