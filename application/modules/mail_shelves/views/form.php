<script>
    $('#myModalform').submit(function() {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('mail_shelves/submit_form'); ?>',            
            datatype: 'json',
            data: $(this).serialize(),
            success: function(data) {
                jsonData = $.parseJSON(data);
                if(jsonData.status == 0) {
                    gritter_alert(jsonData.alert);
                } else {
                    $('#myModal').modal('toggle');
                    gritter_alert(jsonData.alert); 
                    oTable.fnDraw();                                 
                }
            }           
        });
        return false;
    });
</script>
<div class="modal-dialog">
    <form class="form-horizontal" id="myModalform">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="icon-edit"></i> Form Rak Surat</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Kode Rak<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="text" name="shelf_code" class="form-control" value="<?php echo $shelf_code; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Nama Rak<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <input type="text" name="shelf_name" class="form-control" value="<?php echo $shelf_name; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Keterangan</label>
                    <div class="col-lg-8">
                        <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button"><i class="icon-remove"></i> Batal</button>
                <button class="btn btn-danger" type="button" onclick="myConfirm('mail_shelves/delete_data/<?php echo $id; ?>')"><i class="icon-trash"></i> Hapus</button>
                <button class="btn btn-info" type="submit"><i class="icon-ok"></i> Simpan</button>
            </div>
        </div>
    </form>
</div>