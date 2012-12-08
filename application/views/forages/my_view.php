
<div class="content span9 forages">
    <div class="left">
        <script>
            //confirmation for delete
            function confirmation(id) {
                var answer = confirm("Are you sure you want to delete this forage?")
                if (answer){
                    var url_part = "<?=base_url() . 'forages/archive/'?>";
                    var url = url_part.toString() + id.toString();

                    window.location = url;
                }
                else{
                    return false
                }
            }
        </script>
        <?php
            if(empty($forages)){
                ?>
                <h2>Oh no!</h2>
                <p>You have not created any forage listings. Head on over and <a href="/forages/create">make one</a>!</p>
                <?php
                }else{
        ?>
        <ul>
            <?php
                foreach($forages as $row){
                //get first photo
                list($photo) = explode(',', $row['photos']);
                $profile_image = $photo != "" ? 'files/' . $photo : 'assets/images/main/nopic.png';
            ?>
            <li>
                <div class="foragePic"><img src="<?=base_url("$profile_image")?>"></div>
                <div class="forageInfo">
                    <h3><a href="<?=base_url() . 'forages/view_mine/' . $row['id']; ?>"><?=$row['name']?></a></h3>
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
    </p><?=$pages?>
    <p>
    </div><!-- end class left -->
</div><!-- end content -->
</div><!-- end row_fluid -->
</div><!-- end container_fluid -->

