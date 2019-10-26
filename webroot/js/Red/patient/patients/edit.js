$(document).ready(function(){
	//edit form validation 
	$("#edit-patient-account-form").on('submit',function(){
		var $isErrorFree = true;
		var $form = $("#edit-patient-account-form");

		//check changing avatar 
		if($("#avatar_patient").val()!=="")
			$(this).addClass('required');

		//validate form
		$(".required",$form).each(function(){
			if(validateElement.isValid(this)==false)
				$isErrorFree = false;
		});

		if($(".password-alter").val().length>0)
		{
			if(($("#new_password").val().length<8 && $("#conf_new_password").val().length<8) || ($("#new_password").val()!==$("#conf_new_password").val()))
			{
				$isErrorFree = false;
				$("#conf_new_password").addClass("invalid").removeClass("valid");
				$("#new_password").addClass("invalid").removeClass("valid");
				//bind checkingEquality
				$("#conf_new_password").unbind("blur").bind("blur",checkEquality);
				$("#new_password").unbind("blur").bind("blur",checkEquality);
				
			}else
			{
				$("#conf_new_password").addClass("valid").removeClass("invalid");
				$("#new_password").addClass("valid").removeClass("invalid");	
			}
		}

		if($isErrorFree)
		{
			Materialize.toast("Yes",1500);

			return true	;
		}
		else
		{
			Materialize.toast("Veuillez effectuer les corrections nécessaires",1500);
			return false;
		}

	});
});


function checkEquality()
{	
	if($("#new_password").val().length==0 && $("#conf_new_password").val().length==0)
	{
				$("#conf_new_password").removeClass("valid").removeClass("invalid");
				$("#new_password").removeClass("valid").removeClass("invalid");	
	}
	else
	{
			if(($("#new_password").val().length<8 && $("#conf_new_password").val().length<8)  || ($("#new_password").val()!==$("#conf_new_password").val()))
			{
				$("#conf_new_password").addClass("invalid").removeClass("valid");
				$("#new_password").addClass("invalid").removeClass("valid");
			}
			else
			{
				$("#conf_new_password").addClass("valid").removeClass("invalid");
				$("#new_password").addClass("valid").removeClass("invalid");	
			}
	}

}