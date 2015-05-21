<script src="<?php echo base_url('assets/js/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/DT_bootstrap.js'); ?>"></script>
<script>
	//dataTables
	$(document).ready(function() {
		oTable = $('#grid_data').dataTable( {
            'sDom': "<'row'<'col-lg-6 add-btn'><'col-lg-6'f>r>t<'row'<'col-lg-6'i><'col-lg-6'p>>",
            'bProcessing': true,
            'bServerSide': true,
            'stateSave':true,
            'sAjaxSource': '<?php  if(isset($source)) echo $source; ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                $.ajax ({
                    type : 'POST',
                    url : sSource,
                    data : aoData,
                    dataType : 'json',
                    success : fnCallback
                });
            }
		});		
		
		// Custom Button
		$('div.add-btn').html(
		    '<div id="grid_data_length" class="dataTables_length">'+
                '<label>'+
                    '<button class="btn btn-info" onclick="call_modal(0)">'+
                        '<i class="icon-plus-sign"></i> Tambah data'+
                    '</button>'+
                '</label>'+
            '</div>'
        );
        
        // Custom Placehoder
        $('.dataTables_filter input').attr('placeholder','Cari Data');
	});
	
	//call modal form
	function call_modal(id) {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('mail_types/call_form'); ?>/'+id, 
			success: function (data) {
				$('#myModal').html(data).modal('show');
			}
		});
	}
</script>