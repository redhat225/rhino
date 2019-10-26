$(function(){
    $("select").material_select();
    $('.datepicker').pickadate();
    $('.tooltipped').tooltip();
    $('.civilite-radio-select').on('change',function(){
    		var $value = $(this).val();
    				$('#name-young-girl').addClass('hidden');
    				$('#lastname_young').val('').removeClass('required').removeClass('invalid');
    				$('.name-patient-input-area').removeClass('s4').addClass('s6');
    		switch($value)
    		{
    			case 'Mr':
    				
    			break;

    			case 'Mlle':
    			break;

    			case 'Mme':
    				$('.name-patient-input-area').removeClass('s6').addClass('s4');
    				$('#name-young-girl').removeClass('hidden');
    				$('#lastname_young').addClass('required');
    			break;
    		}
    });

    $('.descendant-infos').unbind('blur').bind('blur',function(){
    	var $value = $(this).val();
    	if($value.length>0)
    	{
    		$('.descendant-infos').addClass('required');
    	}
    	else
    	{
    		$('.descendant-infos').removeClass('required').removeClass('invalid');		
    	}
    });

    $('.patient_work_info').unbind('blur').bind('blur',function(){
    	var $value = $(this).val();
    	if($value.length>0)
    	{
    		$(this).addClass('required');
    	}
    	else
    	{
    		$(this).removeClass('required').removeClass('invalid');		
    	}
    });

    $('#contact2').unbind('blur').bind('blur',function(){
    	var $value = $(this).val();
    	if($value>0)
    		$(this).addClass('required').removeClass('invalid');
    	else
    		$(this).removeClass('required');
    });


    //add insurances
     $("#insurance-turn input").on("change",function(){
   		if($(this).prop("checked"))
   			{
				$("#insurances-infos-main-container").removeClass("hidden");
   			}
   		else
	   		{
	   			$("insurances-infos-main-container table tbody").empty();
	   			$("#insurances-infos-main-container").addClass("hidden");
	   		}
   });


     $(".add-insurances-item-trigger").on('click',function(e){
     	e.preventDefault();
		$.get(
				'/doctor/insurances/add-ajax',
				function(data)
				{
						$("#insurances-adding-content").append(data);
						var $last_child=$("#insurances-adding-content tr:last-child");
						$last_child.find("select").material_select();
						$last_child.find(".retrieve-insurance-item").bind("click",function(){
							$last_child.remove();
						});
						$("#insurances-adding-content tbody tr:odd").addClass("dmp-sub");
				}
			);
     });


     //submit form
  	 $("#form-sigin-patient").on("submit",function(e){

  	 		var $isErrorFree = true;
  	 		var $form = $('#form-sigin-patient');

  	 		if($('.civilite-radio-select:checked', $form).length>1 || $('.civilite-radio-select:checked', $form).length===0)
  	 		 $isErrorFree = false;

  	 		$('input.required', $form).each(function(){
  	 			if(validateElement.isValid(this)===false)
  	 				$isErrorFree = false;
  	 		});

  	 		$('select.required', $form).each(function(){
  	 				if($('option:checked',this).length===0 || $('option:checked',this).length>1 || $('option:checked',this).val()==='')
  	 					$isErrorFree = false;
  	 		});



  	 		if($('#dateborn').val().trim()==="")
  	 			$isErrorFree=false;
  	 		else
  	 		{
  	 			var $value = $('#dateborn').val().trim();
  	 			if(/^[1-2][0-9]{3}-[0-9]{2}-[0-9]{2}$/.test($value)===false)
  	 			{
  	 				$isErrorFree = false;
  	 				Materialize.toast('veuillez spécifier une date valide',1000);
  	 			}

  	 		}

  	 		if($('#children').val()==='')
  	 		{
  	 			$isErrorFree = false;
  	 			$(this).removeClass('valid').addClass('invalid');
  	 		}else
  	 		{
  	 			$(this).addClass('valid').removeClass('invalid');
  	 		}

  	 		if($('.descendant-infos').hasClass('required'))
  	 		{
  	 			if($('.descendant-sexe-radio-select:checked').length!=1)
  	 				$isErrorFree = false;
  	 		}

        if($('.signature_credential').val()==="")
          $isErrorFree = false;

  	 		if($isErrorFree)
  	 		{
  	 			return true;
  	 		}
  	 		else
  	 		{
  	 			Materialize.toast('veuillez corriger le formulaire avant de continuer',2000);
  	 		}
  	 		
  	 		e.preventDefault();
  	 });

  	 var $form = $('#form-sigin-patient');
  	 $('input[name="patient_identity"]',$form).on('change',function(e){
  	 		var files = $(this)[0].files;
  	 		$image_preview = $('#image_previews');
  	 		$('i, img',$image_preview).remove(); 
  	 		
  	 		$image_preview.slideUp();
  	 		if(files.length > 0)
  	 		{
  	 			var file = files[0];
  	 			
  	 			var $img = $('<img />').attr('src',window.URL.createObjectURL(file)).attr('style','width:100%;');
  	 			$image_preview.append($img);
  	 			$image_preview.removeClass('dmp-main-back');
  	 		}
  	 		else
  	 		{
  	 			var icon = $('<i class="ion-ios-contact-outline white-text large"></i>');
  	 			$image_preview.append(icon);
  	 			$image_preview.addClass('dmp-main-back');
  	 		}
  	 		$image_preview.slideDown();

  	 });

  	 $('#btn-login-generator').on('click',function(){
  	 	var $isError = false;
  	 	$('.name-input-patient-signin').each(function(){
  	 		var $value = $(this).val().trim();
  	 		if($value==='')
  	 			$isError = true;
  	 	});
		var $number = $('#contact1').val().trim();
  	 	if($number.length!=8 || /^([0-9]{2}){4}$/.test($number)===false)
  	 		$isError = true;

  	 	if(!$isError)
  	 	{
			wait();
  	 		//generate login
  	 		var meta = ['-','_','.'];
  	 		var suggest = new Array();
  	 		var $value_lastname = $('#lastname').val().trim().toLowerCase();
  	 		var $value_firstname= $('#firstname').val().trim().toLowerCase();
  	 		

			var login_suggest1 =$value_lastname+meta[0]+$value_firstname.substr(0,4);
		    var login_suggest2 =$value_firstname.substr(0,4)+meta[1]+$value_lastname+meta[1]+$number.substr(0,2);
		    var login_suggest3 =$number.substr(0,2)+meta[2]+$value_firstname.substr(0,4)+meta[2]+$value_lastname;

				suggest.push(login_suggest1,login_suggest2,login_suggest3);
				  $('#username').autocomplete({
				    source: suggest,
				    minLength: 0
				  });
  	 	}
  	 	else
  	 	{
  	 		Materialize.toast('Veuillez corriger le formulaire avant de générer des suggestions',1200);
  	 	}

  	 });	


      $('#edit_signature_patient').unbind('click').bind('click', function(){
            $sdk_epad_signature_object ={callback_function:'registerPatient'};
            signPad();
      });

      $('.renew-signature').on('click', function(){  
        var icon = $('<i class="ion-edit dmp-main-color large signature-picto"></i>');
        $('.signature-area').empty().append(icon);
        $('#credential_patient, #ence_credential_patient').val('');
        $('#submit-signin-patient').addClass('hidden');

      });



});


function sleep(ms)
{
  return new Promise(resolve => setTimeout(resolve, ms));
}

async function wait() {
 $('#btn-login-generator').addClass('hidden');
 $('#loader-login-generator').removeClass('hidden');
  await sleep(2000);
 $('#btn-login-generator').removeClass('hidden');
 $('#loader-login-generator').addClass('hidden');
}
