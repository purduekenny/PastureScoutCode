P<div class="content span8 properties">
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
            <h3><a href="<?=base_url() . 'properties/view/' . $row['id']; ?>"><?=$row['name']?></a></h3>
            <p><?=$row['city']?>, <?=$row['state']?> <?=$row['country']?></p>
            <p>Description: <?=$row['other_info']?></p>
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
