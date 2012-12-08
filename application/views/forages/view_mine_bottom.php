
<div style="padding:10px">
<a href="<?=base_url() . 'forages/edit/' . $forage['id']; ?>" class="btn btn-primary"><i class="icon-edit icon-white"></i> Edit</a>  
<a href="<?=base_url() . 'upload_forages/index/' . $forage['id']; ?>" class="btn btn-success"><i class="icon-picture icon-white"></i> Manage Images</a>
<a href="javascript:confirmation('<?=$forage['id']?>')" class="btn btn-danger"><i class="icon-remove icon-white"></i> Delete</a>
</div>

<script type="text/javascript">
    function confirmation(forage_id){
        var answer = confirm("Are you Sure you want to delete this forage?")
        if (answer){
            window.location = "<?=base_url('forages/archive/" + forage_id + "')?>";
        }
        else{
            return;
        }
    }
</script>


</div><!-- end content -->
</div><!-- end row_fluid -->
</div><!-- end container_fluid -->
