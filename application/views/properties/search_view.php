<?php
$profile_image = isset($property['images'][0])? 'files/'.$property['images'][0] : 'assets/images/main/nopic.png';
?>
<div class="content span9 properties">
<h2>Search Results</h2>
<?php

        if(empty($properties)){
            ?>
            <script type="text/javascript">
                window.location = baseurl + "properties/search"
            </script>
            <?php
            }else{

    ?>
    <ul>
        <?php
            foreach($properties as $row){

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
