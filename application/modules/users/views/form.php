<script>
	$('#dd').submit(function() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url(); ?>',
			data: ($this).serialize(),
			success: function() {
				
			}			
		});
	});
</script>
<div class="modal-dialog">
	<form class="form-horizontal" id="dd">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Modal Tittle</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="col-lg-3 control-label">Email</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" id="inputEmail1" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Password</label>
					<div class="col-lg-9">
						<input type="password" class="form-control" id="inputPassword1" placeholder="Password">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
				<button class="btn btn-info" type="submit">Simpan</button>
			</div>
		</div>
	</form>
</div>