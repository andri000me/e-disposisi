<script>
    $('#myModalform').submit(function() {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('users/submit_form'); ?>',            
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
                <h4 class="modal-title"><i class="icon-edit"></i> Form Pegawai</h4>
            </div>
			<div class="modal-body">
				<div class="form-group">
					<label class="col-lg-3 control-label">NIP<span class="text-danger">*</span></label>
					<div class="col-lg-9">
					    <input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="text" class="form-control" name="nip" value="<?php echo $nip; ?>">
					</div>
				</div>
				<div class="form-group">
                    <label class="col-lg-3 control-label">Nama Pegawai<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Departemen</label>
                    <div class="col-lg-9">
                        <?php echo form_dropdown('id_dep', $opt_dep, $id_dep, 'class="form-control"'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Jabatan</label>
                    <div class="col-lg-9">
                         <?php echo form_dropdown('id_pos', $opt_pos, $id_pos, 'class="form-control"'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Jenis Kelamin</label>
                    <div class="col-lg-9">
                        <label class="checkbox-inline">
                            <input type="radio" name="gender" value="L" <?php if($gender=='L') echo 'checked'; ?>> <i class="icon-male"></i> Laki-laki
                        </label>
                        <label class="checkbox-inline">
                            <input type="radio" name="gender" value="P" <?php if($gender=='P') echo 'checked'; ?>> <i class="icon-female"></i> Perempuan
                        </label>
                    </div>
                </div>
                <div role="tabpanel">
                    <ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active">
							<a href="#contact" aria-controls="home" role="tab" data-toggle="tab">Kontak</a>
						</li>
						<li role="presentation">
							<a href="#account" aria-controls="profile" role="tab" data-toggle="tab">Akun</a>
						</li>
					</ul>
	                <div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="contact">
						    <br />
							<div class="form-group">
                                <label class="col-lg-3 control-label">Telepon</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Email</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                                </div>
                            </div>
						</div>
						<div role="tabpanel" class="tab-pane" id="account">
						    <br />
							<div class="form-group">
                                <label class="col-lg-3 control-label">Hak Akses</label>
                                <div class="col-lg-9">
                                    <?php echo form_dropdown('id_pos', $opt_pos, $id_level, 'class="form-control"'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Password</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Status Akun</label>
                                <div class="col-lg-9">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="status" value="1" <?php if($status==1) echo 'checked'; ?>> Aktif
                                    </label>
                                </div>
                            </div>
						</div>						
					</div>
				</div>
			</div>
			<div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button"><i class="icon-remove"></i> Batal</button>
                <button class="btn btn-danger" type="button" onclick="myConfirm('users/delete_data/<?php echo $id; ?>')"><i class="icon-trash"></i> Hapus</button>
                <button class="btn btn-info" type="submit"><i class="icon-ok"></i> Simpan</button>
            </div>
		</div>
	</form>
</div>