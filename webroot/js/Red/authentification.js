$(document).ready(function(){
	$("#authentification-form").on("submit",function(e){
			e.preventDefault();
			var isErrorFree= true;

			$("input.required",this).each(function(){
					if(validateElement.isValid(this)==false)
					    isErrorFree = false;
					});
					if (isErrorFree){
						//switching target
						switch($(this).attr("target"))
						{
							case "patient":
								var $url = "/patient/patients/login";
								var $redirect ="/patient/patients/general";
							break;

							case "doctor":
								var $url = "/doctor";
								var $redirect ="/doctor/doctors/general";
							break;

							case "manager" :
								var $url = "/manager/manager-operators/login";
								var $redirect = "/manager/manager-operators/general";
							break;

							case "pharmacy" :
								var $url = "/pharmacy";
								var $redirect = "/pharmacy/pharmacy-operators/general";
							break;

							case "laboratory":
								var $url = "/laboratory";
								var $redirect = "/laboratory/examiners/general";
							break;
						}
				  					var $form=$(this);
									$.ajax({
										beforeSend : function(){
											$(".loaderAjax").fadeIn();
											$("#authentification-form").addClass('hidden');
											$("html").attr('style',"");
											$("html").addClass('smooth-background-transition');
											$('.submit-login-admin').addClass('hidden');
											$('nav, footer').addClass('hidden');
										},
										type:'POST',
										data : $form.serialize(),
										url: $url,
										dataType:"text",
										success:function(data){
													if(data==="ok")
													{
														window.location.href=$redirect;
													}
													else
													{
														$('.submit-login-admin').removeClass('hidden');
														$(".loaderAjax").fadeOut();
														$("#authentification-form").removeClass('hidden');
														$("html").attr('style',"background:url('webroot/img/assets_dmp/family.jpg') repeat-x 1%;");
														$("html").removeClass('smooth-background-transition');
														$('nav, footer').removeClass('hidden');

														$("#mainModal-suiviAdmin h6.authentication-failure-message").text("Login/Mot de passe incorrects veuillez réessayer");
														$("#mainModal-suiviAdmin").openModal({
															'dismissible' : false
														});
													}
												},
										complete : function(){

											
										}
									});

				  }
				  else
				  	return false;
	});

});

//client Side Validator
	validateElement = {
		
		isValid:function(element){
				var isValid= true;
				var $element=$(element);	
				var id=$element.attr('id');
				var name=$element.attr('name');
				var value= $element.val();

				var type=$element[0].type.toLowerCase();

				switch(type){				
					case 'password':
							if(!/^[a-z0-9_-]{8,25}$/i.test(value)){
								isValid = false;
							}
					break;

					case 'text':
							if(!/^[a-z0-9_-]{8,50}$/i.test(value)){
								isValid = false;
							}
					break;

					case 'tel' : 
					     if(!/^[0-9]{8}$/.test(value)){
					     	isValid = false;
						}
					break;

				}//end switch
			
			var method=isValid? 'valid' : 'invalid' ;
			
			 if(isValid)
			 	$element.removeClass('invalid').addClass(method);
			 else
			 	$element.removeClass('valid').addClass(method);

			 $element.unbind('change.isValid')
			 	.bind('change.isValid', function(){validateElement.isValid(this);});
				
			return isValid;

		}

	};