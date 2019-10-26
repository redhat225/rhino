$(function(){
	$('.custom_search_acts-billing_box').unbind('keyup').bind('keyup', function(){
		var $box_search = $(this).attr('data-search-box').trim();
		var $value = $(this).val().trim().toLowerCase();

		if($value.length>1)
		{
			var $regex = new RegExp($value);
			$('li',$($box_search)).each(function(){
				var $li_tag = $(this).attr('tags').trim().toLowerCase();
				if(!$regex.test($li_tag))
					$(this).addClass('hidden');
				else
					$(this).removeClass('hidden');
			});
		}
		else
		{
			$('li',$($box_search)).removeClass('hidden');
		}

	});


    $('.trigger-menu-acts').unbind('click').bind('click',function(){
    	var $main_box = $(this).attr('data-main-wrapper').trim();
    	console.log($main_box);
    	if($('.acts-box',$($main_box)).hasClass('hidden'))
    	{
    	   $('.acts-box',$($main_box)).fadeIn();
    	   $('.acts-box',$($main_box)).removeClass('hidden');
    	}
   	    else
   	    {
    	   $('.acts-box',$($main_box)).fadeOut();
    	   $('.acts-box',$($main_box)).addClass('hidden');   	
   	    }
    });
});