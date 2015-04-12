var Gritter = function () {

    $('#add-sticky').click(function(){
        var unique_id = $.gritter.add({
            text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" style="color:#ccc">magnis dis parturient</a> montes, nascetur ridiculus mus.',
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
		}, 1500);
    });





  



}();