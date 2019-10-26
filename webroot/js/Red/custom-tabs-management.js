$('.custom-overflowed-tabs li').on('click',function(){
	var $href = $(this).attr('ref');
	var $parent = $(this).parents('ul').attr('ref');
	$('.custom-overflowed-tabs-content').addClass('hidden');
	$($href,$parent).removeClass('hidden');

});