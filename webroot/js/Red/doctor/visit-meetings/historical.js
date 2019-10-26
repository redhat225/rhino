jQuery(function($){
	$('.trigger-get-more-meeting').on('click',function(e){
		
		var index = $(this).parents('tbody').attr('index');
		


		if($(this).hasClass('ion-ios-plus'))
		{
			$(this).parents('tr').addClass('light-orange-bill');
			$(this).removeClass('ion-ios-plus').addClass('ion-minus-circled');
			$('.treatment_info_thead,.treatment_info_tbody,.exams_info_thead,.exams_info_tbody,.requirements_info_thead,.requirements_info_tbody').each(function(){
				if($(this).attr('index')==index)
					$(this).removeClass('hidden');
			});
		}
		else if($(this).hasClass('ion-minus-circled'))
		{
			$(this).parents('tr').removeClass('light-orange-bill');
			$(this).removeClass('ion-minus-circled').addClass('ion-ios-plus');
			$('.treatment_info_thead,.treatment_info_tbody,.exams_info_thead,.exams_info_tbody,.requirements_info_thead,.requirements_info_tbody').each(function(){
				if($(this).attr('index')==index)
					$(this).addClass('hidden');
			});
		}

	});
});