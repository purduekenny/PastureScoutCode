
<div style="padding:10px">
<a href="<?=base_url() . 'properties/edit/' . $property['id']; ?>" class="btn btn-primary"><i class="icon-edit icon-white"></i> Edit</a>  
<a href="<?=base_url() . 'upload/index/' . $property['id']; ?>" class="btn btn-success"><i class="icon-picture icon-white"></i> Manage Images</a>
<a href="javascript:confirmation('<?=$property['id']?>')" class="btn btn-danger"><i class="icon-remove icon-white"></i> Delete</a>
</div>

<script type="text/javascript">
    function confirmation(property_id){
        var answer = confirm("Are you Sure you want to delete this pasture?")
        if (answer){
            window.location = "<?=base_url('properties/archive/" + property_id + "')?>";
        }
        else{
            return;
        }
    }
</script>


</div><!-- end content -->
</div><!-- end row_fluid -->
</div><!-- end container_fluid -->
