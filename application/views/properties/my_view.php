<div class="content span8 properties">
    <div class="left">
        <script>
            //confirmation for delete
            function confirmation(id) {
                var answer = confirm("Are you sure you want to delete this pasture?")
                if (answer){
                    var url_part = "<?=base_url() . 'properties/archive/'?>";
                    var url = url_part.toString() + id.toString();

                    window.location = url;
                }
                else{
                    return false
                }
            }
        </script>
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

                <h3><a href="<?=base_url() . 'properties/view_mine/' . $row['id']; ?>"><?=$row['name']?></a></h3>
                <p><?=$row['city']?>, <?=$row['state']?> <?=$row['country']?></p>
                <p>Description: <?=$row['other_info']?></p>
            </li>
            
            <?php
                }//end foreach
            }//end else
            ?>

        </ul>
    </p><?=$pages?><p>
    </div><!-- end class left -->
</div><!-- end content -->
</div><!-- end row_fluid -->
</div><!-- end container_fluid -->

