$(document).ready(function(){
		$("#set-doctor-privilege-link").on("click",function(){
			$("#modal-box-privilege-doctor").openModal({
				dismissible:false,
				complete:function(){
					$("#form-set-privilege-doctor")[0].reset();
				}
			});
		});	

		$("select").material_select();

		//rapid search doctor
		$("#search-doctor").on("keyup",function(){
			var $tags=$(this).val().trim().toUpperCase();
			var $list_parent = $("#dropdown1 li");

			if($tags.length>0)
			{
				var $regex = new RegExp($tags);
				$.each($list_parent,function(){
					var $valueAttrList = $(this).attr("name");
					if(!$regex.test($valueAttrList))
						$(this).addClass("hidden");
					else
						$(this).removeClass("hidden");
				});				
			}
			else
				$list_parent.removeClass("hidden");

		});	

		$("#dropdown1 li").on("click",function(e){
			e.preventDefault();
			$("#doctor_id").val($(this).attr("value"));
			$("#doctor_name").val($(this).text());
			$("#search-doctor-wrapper").addClass("hidden");
			$("#search-doctor-result-wrapper").removeClass("hidden");
		});

		$("#reset-form-search-doctor").on("click",function(){
			$("#search-doctor-wrapper").removeClass("hidden");
			$("#search-doctor-result-wrapper").addClass("hidden");
			$("#search-doctor-result-wrapper :input").val("");
		});


		$("#form-set-privilege-doctor").on("submit",function(){
			return null;
		});

		$("#valid-privilege-doctor-trigger").on("click",function(){
			var $form = $("#form-set-privilege-doctor");
			var $isErrorFree = true;

			$(".required",$form).each(function(){
					if(validateElement.isValid(this)==false)
					    $isErrorFree = false;
					});
			if($form.find("#doctor_id").val().trim()==="")
			{
				$isErrorFree=false;
				Materialize.toast("Veuillez choisir un praticien");
			}

			if($isErrorFree)
			{
				var $loader=$("#loader-privilege");

				$.ajax({
					beforeSend : function(){$form.addClass("hidden");$loader.removeClass("hidden");},
					type:'POST',
					url : '/diaries/add',
					dataType:'text',
					data : $form.serialize(),
					success : function(data){
						if(data==="ok")
						{
							$("#close-modal-privilege").trigger("click");
							Materialize.toast("privilèges accordés avec succès",1000);						}
						else
						{
							switch(data)
							{
								case "ko":
									Materialize.toast("Authentification échouée, veuillez réessayer",1500);
								break;

								case "already":
									Materialize.toast("Ce docteur possède déja des privilèges actifs",1500);
								break;
							}
						}
					},
					complete : function(){$form.removeClass("hidden");$loader.addClass("hidden");},
					error : function(){alert("Une erreur s'est produite");}
 				});	
			}
			return false;
		});
});