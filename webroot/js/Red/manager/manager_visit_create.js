$(document).ready(function(){
	$("select").material_select();

	$("#visit_specialities").on("keyup",function(){
		$("#visit_specialities").css({'background':'transparent'});
		$("visit_hidden_input").val("");

		var $value = $(this).val().trim().toLowerCase();
		if($value.length > 1)
		{
			var regExp = new RegExp($value); 
			$("#dropdown-specialities li").each(function(){
				var item_value = $(this).attr("speciality-label").trim().toLowerCase();
				if(regExp.test(item_value))
				{
					$(this).removeClass("hidden");
				}
				else
				{
					$(this).addClass("hidden");
				}
			});
		}
		else
		{
			$("#dropdown-specialities li").removeClass("hidden");
		}
	});


	$("#dropdown-specialities li").on("click",function(e){
		e.preventDefault();
		var $value_id = $(this).attr("speciality-id").trim();
		var $value_alias = $(this).attr("speciality-alias");
		var $value_libelle = $(this).attr("speciality-label").trim();
		$("#visit_speciality_id").val($value_id);
		$("#visit_speciality_alias").val($value_alias);
		$("#visit_specialities").val($value_libelle);
		$("#visit_specialities").css({'background':'grey'}).removeClass("dmp-main-color").addClass("white-text");
	});

	$("#acts-medical-turn input").on("change",function(){

		if($(this).prop("checked"))
		{
			$("#medical-acts-table").removeClass("hidden");
		}
		else
		{
			$("#medical-acts-table").addClass("hidden");
			$("#acts-adding-content").empty();
		}
	});

	$(".add-act-item-trigger").on("click",function(){
		$.post("/manager/visits/add-act",function(data){
			$("#acts-adding-content").append(data);
			$("#acts-adding-content .remove-item-act").bind("click",removeItem);
			$("select").material_select();
		});
	});

	$("#form-visits-add").on("submit",function(){
		var $form = $("#form-visits-add");

		var $isErrorFree = true;

		$("select",$form).each(function(){
				var val_checked = $(this).find("option:checked").val();
				var label = $(this).attr("literal-name");
				if(val_checked==="")
				{
					$isErrorFree = false;
					Materialize.toast("Des informations sur "+label+" ne sont pas renseignées.",2000);
				}
		});


		$("input.required",$form).each(function(){
					if(validateElement.isValid(this)==false)
					    isErrorFree = false;
					});

		if($("#visit_speciality_id").val().trim()==="")
				Materialize.toast('Veuillez définir une spécialité objet du dossier', 2000);

				if($isErrorFree)
					return true;
				else	
					return false;
	});

	//search patient number
	$("#patient_number").on("keyup",function(){
			var $value = $(this).val().trim();
			if($value.length==8)
			{
				$("#patient_search_loader_wrapper").removeClass("hidden");
				$.post('/manager/patients/search-by-number',{'number':$value},function(data){
						if(data!=="ko")
						{
								
								var $result = JSON.parse(data);
								//picture patient
								if($result.person.path_pic!=="")
								{
									var $img = $('<img/>');
									$img.attr("src","/webroot/img/patient/patient_identity/"+$result.person.path_pic);
									$("#pics-patients-found").empty().append($img);
								}
								else
								{
									var $icon_contact = $("<i class='large black-text ion-ios-contact-outline'></i>");
									$("#pics-patients-found").empty().append($icon_contact);
								}
								//string info
								if($result.person.lastname_young!=="")
									$("#identity-patients-found p:eq(0)").text("Identité: "+$result.person.lastname+" "+$result.person.firstname+" (Né "+$result.person.lastname_young+" )");
								else
									$("#identity-patients-found p:eq(0)").text("Identité: "+$result.person.lastname+" "+$result.person.firstname);
								
								if($result.person.people_descendant.sexe==="M")
									$("#identity-patients-found p:eq(1)").text("Nom du père(/tuteur): "+$result.person.people_descendant.lastname+" "+$result.person.people_descendant.firstname);
								else
									$("#identity-patients-found p:eq(1)").text("Nom de la mère(/tutrice): "+$result.person.people_descendant.lastname+" "+$result.person.people_descendant.firstname);

								var $date_born = new Date($result.person.dateborn);
								$("#identity-patients-found p:eq(2)").text("date de naissance: "+$date_born.getDate()+"-"+($date_born.getMonth()+1)+"-"+$date_born.getYear());
								$("#identity-patients-found p:eq(3)").text("Adresse: "+$result.person.people_adress.city_quarter+"-"+$result.person.people_adress.city);
								$("#identity-patients-found p:eq(4)").text("Nationalité: "+$result.person.nationality);

							$("#patient_id").val($result.id);
							$("#patient_search_result_wrapper").removeClass("hidden");
							$("#patient_search_number_wrapper").addClass("hidden");							
						}
						else
						{
							Materialize.toast("Patient introuvable dans la base",1500);
						}
						$("#patient_search_loader_wrapper").addClass("hidden");
						
				});
			}
			else
				return false;
	});

	$("#change-patient-trigger").on("click",function(e)
	{
		e.preventDefault();
		$("#identity-patients-found p").empty().html("&nbsp;");
		$("#patient_id").val("");

		$("#patient_search_result_wrapper").addClass("hidden");
		$("#patient_number").val("");
		$("#patient_search_number_wrapper").removeClass("hidden");
	});


	$("#anonym_patient_checkbox").on("change",function(){
			if($(this).prop("checked"))
			{
				$("#patient_search_box").addClass("hidden");
				$("#patient_number").removeClass("required");
				$("#patient_id").val(0);
			}
			else
			{
				$("#patient_search_box").removeClass("hidden");
				$("#patient_number").addClass("required");
				$("#patient_id").val("");
			}
	});
});

function removeItem(){
	$(this).parents("tr").remove();
	if($("#acts-adding-content tr").length==0)
		$("#acts-medical-turn input").trigger("click");
}