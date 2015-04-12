<script src="<?php echo base_url('assets/js/jquery.dataTables.js'); ?>"></script>
<script>
	//dataTables
	$(document).ready(function() {
		$('#grid_data').dataTable( {
		  "aaSorting": [[ 4, "desc" ]]
		});
	});
	
	//call modal form
	function call_modal(id) {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('users/call_form'); ?>/'+id, 
			success: function (data) {
				$('#myModal').html(data).modal('show');
			}
		});
	}
</script>