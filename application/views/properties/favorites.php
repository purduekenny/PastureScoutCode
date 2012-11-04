<div class="content span9 properties">
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
                <div class="pasturePic"></div>
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
<div class="span8 offset4">
<?=$pages?>
</div>
</div><!-- end row_fluid -->
</div><!-- end container_fluid -->
