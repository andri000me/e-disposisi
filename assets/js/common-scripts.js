/*--- Confirmation Modal----*/
function myConfirm(url) {
	if ($("#confirmModal").length > 0) {
		$("#confirmModal").remove();
	}
	divModal = $('<div class="modal bs-example-modal-sm" id="confirmModal">');
	divModal.append (
		'<div class="modal-dialog modal-sm">'+
			'<div class="modal-content">'+
				'<div class="modal-header">'+
					'<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+
					'<h4 class="modal-title"><i class="icon-exclamation-sign"></i> Confirmation</h4>'+
				'</div>'+
				'<div class="modal-body">'+
					'<p>Anda yakin akan menghapus ?</p>'+
				'</div>'+
				'<div class="modal-footer">'+
					'<button data-dismiss="modal" class="btn btn-default" type="button"><i class="icon-remove"></i> Tidak</button>'+
	                '<a class="btn btn-info" href='+url+'><i class="icon-ok"></i> Ya</a>'+
				'</div>'+
			'</div>'+
		'</div>'
	);
	$('body').append(divModal);
	$('#confirmModal').modal('show');
	return false;
}

/*---Gritter Notification----*/
function gritter_alert(message) {
	var unique_id = $.gritter.add({
		text: message,
		sticky: false,
		before_open: function(){
			if($('.gritter-item-wrapper').length == 3)
			{
				return false;
			}
		}
	});
	setTimeout(function(){
		$.gritter.remove(unique_id, {
			fade: true,
			speed: 'slow'
		});
	}, 5000);	
}

/*---Left Bar Accordion----*/
$(function() {
    $('#nav-accordion').dcAccordion({
        eventType: 'click',
        autoClose: true,
        saveState: true,
        disableLink: true,
        speed: 'slow',
        showCount: false,
        autoExpand: true,
		//cookie: 'dcjq-accordion-1',
        classExpand: 'dcjq-current-parent'
    });
});

var Script = function () {

//    sidebar dropdown menu auto scrolling

    jQuery('#sidebar .sub-menu > a').click(function () {
        var o = ($(this).offset());
        diff = 250 - o.top;
        if(diff>0)
            $("#sidebar").scrollTo("-="+Math.abs(diff),500);
        else
            $("#sidebar").scrollTo("+="+Math.abs(diff),500);
    });

//    sidebar toggle

    $(function() {
        function responsiveView() {
            var wSize = $(window).width();
            if (wSize <= 768) {
                $('#container').addClass('sidebar-close');
                $('#sidebar > ul').hide();
            }

            if (wSize > 768) {
                $('#container').removeClass('sidebar-close');
                $('#sidebar > ul').show();
            }
        }
        $(window).on('load', responsiveView);
        $(window).on('resize', responsiveView);
    });

    $('.icon-reorder').click(function () {
        if ($('#sidebar > ul').is(":visible") === true) {
            $('#main-content').css({
                'margin-left': '0px'
            });
            $('#sidebar').css({
                'margin-left': '-210px'
            });
            $('#sidebar > ul').hide();
            $("#container").addClass("sidebar-closed");
        } else {
            $('#main-content').css({
                'margin-left': '210px'
            });
            $('#sidebar > ul').show();
            $('#sidebar').css({
                'margin-left': '0'
            });
            $("#container").removeClass("sidebar-closed");
        }
    });

// custom scrollbar
    $("#sidebar").niceScroll({styler:"fb",cursorcolor:"#e8403f", cursorwidth: '3', cursorborderradius: '10px', background: '#404040', spacebarenabled:false, cursorborder: ''});

    $("html").niceScroll({styler:"fb",cursorcolor:"#e8403f", cursorwidth: '6', cursorborderradius: '10px', background: '#404040', spacebarenabled:false,  cursorborder: '', zindex: '1000'});

// widget tools

    jQuery('.panel .tools .icon-chevron-down').click(function () {
        var el = jQuery(this).parents(".panel").children(".panel-body");
        if (jQuery(this).hasClass("icon-chevron-down")) {
            jQuery(this).removeClass("icon-chevron-down").addClass("icon-chevron-up");
            el.slideUp(200);
        } else {
            jQuery(this).removeClass("icon-chevron-up").addClass("icon-chevron-down");
            el.slideDown(200);
        }
    });

    jQuery('.panel .tools .icon-remove').click(function () {
        jQuery(this).parents(".panel").parent().remove();
    });


//    tool tips

    $('.tooltips').tooltip();

//    popovers

    $('.popovers').popover();



// custom bar chart

    if ($(".custom-bar-chart")) {
        $(".bar").each(function () {
            var i = $(this).find(".value").html();
            $(this).find(".value").html("");
            $(this).find(".value").animate({
                height: i
            }, 2000)
        })
    }


}();