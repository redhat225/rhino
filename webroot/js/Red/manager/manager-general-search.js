jQuery(function($){
	//initialize select
	$("select").material_select();
	//trigger modal box
	$("#manage-visits-modal-trigger").on('click',function(){
			$("#manage-visits-modal-wrapper").openModal({
			dismissible:false,
			complete: function (){
				$("#form-visits-viewer")[0].reset();
				$("#change-patient-trigger").trigger("click");
				$("#search-doctor-wrapper").removeClass("hidden");
				$("#selected-doctor-info-box").addClass("hidden");
				$("#reason-visits-wrapper").empty();
				$("#insurance_patient_select").empty();
			}
		});
	});

	//item dropdown features
	$('.item-selected-dropdown').hover(function(){
		$(this).removeClass('dmp-main-back').addClass('dmp-orange-back');
	},function(){
		$(this).removeClass('dmp-orange-back').addClass('dmp-main-back');
	});

	$('#visit_type_selection').on('change',function(){
		var $value = $(this).find('option:checked').text().trim();
		    if($value==='Urgences')
		    {
			  $('#visit-bill-wrapper, #doctor-container, #content-speciality').addClass('hidden');
		      $('#visit_speciality_tag').val('Urgs');
		      $('#visit_speciality_id').val('88');
		      $('#visit_motif').val('Urgences');
		      $('#doctor_id').val('0');
		    }
			else
			{
			  $('#visit-bill-wrapper, #content-speciality, #doctor-container').removeClass('hidden');
			  $('#visit_speciality_tag').val('');
		      $('#visit_speciality_id').val('');
		      $('#visit_motif').val('Consultation');
			}
	});


	//additional items
   $("#item-visit-turn input").on("change",function(){
   		if($(this).prop("checked"))
   			{
				$("#items-visit-adding-content-table-main-container").removeClass("hidden");
   			}
   		else
	   		{
	   			$("#items-visit-adding-content-table-main-container table tbody").empty();
	   			$("#items-visit-adding-content-table-main-container").addClass("hidden");
	   		}
   });

    $(".add-items-visit-item-trigger").on("click",function(e){
		e.preventDefault();
		$.get(
				'/manager/visit-invoice-items/add-inline',
				function(data)
				{
						$("#items-visit-adding-content").append(data);
						var $last_child=$("#items-visit-adding-content tr:last-child");
						$last_child.find("select").material_select();
						$last_child.find(".retrieve-item-element").bind("click",function(){
							$last_child.remove();
						});
						$("#items-visit-adding-content-table-wrapper tbody tr:odd").addClass("dmp-sub");
						manage_additional_info_items();
				}
			);
	     });

	//flush visit_meeting_speciality_name on change
	$("#visit_meeting_speciality_id").on("change",function(){
		$("#visit_meeting_speciality_name").val($(this).find("option:checked").text().trim());
	});
	//search patient number
	$("#patient_number").on("keyup",function(){
			var $value = $(this).val().trim();
			if($value.length===8)
			{
				$("#patient_search_loader_wrapper").removeClass("hidden");
				$.post('/manager/patients/search-by-number',{'number':$value},function(data){
						if(data!=="ko")
						{
								var $result = JSON.parse(data);
								//set linked-visits
								$.each($result.visits,function(index,value){
									var $ref_item = $("<a href='#!'></a>");
									$ref_item.append(value.code_visit);
									
									var $item_visit = $("<li class='visit-item'></li>");
									$item_visit.attr("tag",value.code_visit);
									$item_visit.append($ref_item);
									$item_visit.bind("click",listenerClickItemVisit);
									$("#dropdown2").empty().append($item_visit);
								});	

								//set linked-insurances
								if($result.patient_insurances)
								{
									$.each($result.patient_insurances,function(index,value){

												var $option_item = $("<option></option>");
												var $option_value = value.number_card+"-"+value.patient_insurer.label;
											    $option_item.append($option_value);
											    $option_item.attr("value",$option_value);
											    $("#insurance_patient_select").append($option_item);
											

									});		
									
											$("#insurance_patient_select").material_select();								
								}


								//picture patient
								if($result.person.path_pic!=="")
								{
									var $img = $('<img style="width:120px;"/>');
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
								$("#identity-patients-found p:eq(3)").text("Adresse: "+$result.person.people_adress.country_township.country_city.label_city+'-'+$result.person.people_adress.country_township.label_township+'-'+$result.person.people_adress.city_quarter);
								$("#identity-patients-found p:eq(4)").text("Nationalité: "+$result.person.nationality);


							$("#search_visit").val("").addClass("required");
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
		//link-visit reinitialization
		$("#dropdown2").empty();
		$("#insurance_patient_select").empty();
		$("#search_visit").val("");
		$("#search_visit").css({'background':'transparent'});
		$("#search_visit").removeClass("linked-visit");
		$("#search_visit").removeClass("required");
	});


	$("#anonym_patient_checkbox").on("change",function(){
			if($(this).prop("checked"))
			{
				$("#patient_search_box").addClass("hidden");
				$("#patient_number").removeClass("required");
				$("#patient_id").val(0);
				$('#patient_anonym_infos').removeClass('hidden');
				$('#signature_anonym').val('');
			}
			else
			{
				$("#patient_search_box").removeClass("hidden");
				$("#patient_number").addClass("required");
				$("#patient_id").val("");
				$('#patient_anonym_infos').addClass('hidden');
				$('#signature_anonym').val('');

			}
				$('#patient_anonym_infos select').material_select();
				$('#patient_anonym_infos input').addClass('required').val('');


	});

	//rapid-search search_visit
	  $("#search_visit").on("keyup",function(){
	  	    $("#search_visit").removeClass("valid").addClass("invalid");   
	  		$("#search_visit").css({'background':'transparent'});
		 	$("#search_visit").removeClass("linked-visit");

  			if($(this).val().length>1)
  			{
				var $tags = $(this).val().toLowerCase().trim();
				$(".visit-item").each(function(){
					var $classExp = $(this).attr("tag").toLowerCase().trim();
					var regExp = new RegExp($tags);
					if(regExp.test($classExp))
						$(this).removeClass("hidden");
					else
						$(this).addClass("hidden");
				});
  			}
  			else
  			{
				$(".visit-item").removeClass("hidden");
  			}
  			return false;

		});

	//search doctor
		$("#search_doctor").on("keyup",function(){
			$("#search_doctor").removeClass("valid").removeClass("invalid");
			$("#doctor_id").val("0");
			$("#search_doctor").css({'background':'transparent'});
			
			if($('#search_doctor').hasClass('linked-doctor'))
			{
				$('#search_speciality').removeClass('selected-doctor');
				$('#search_doctor').val('');
				$("#search_doctor").removeClass("linked-doctor");
				$('#dropdown-speciality li').removeClass('hidden').removeClass('tagged')
			}
		 	
  			if($(this).val().length>1)
  			{
				var $tags = $(this).val().toLowerCase().trim();
				$(".doctor-item").each(function(){
					var $classExp = $(this).attr("tag").toLowerCase().trim();
					var regExp = new RegExp($tags);
					if(regExp.test($classExp))
						$(this).removeClass("hidden");
					else
						$(this).addClass("hidden");
				});
  			}
  			else
  			{
				$(".doctor-item").removeClass("hidden");
  			}
  			return false;

		});


	  $("#search_doctor_floating_box").on("keyup",function(){
			$("#search_doctor_floating_box").removeClass("valid").removeClass("invalid");
			$("#doctor_id_floating_box").val("0");
			$("#search_doctor_floating_box").css({'background':'transparent'});
			
			if($('#search_doctor_floating_box').hasClass('linked-doctor'))
			{
				$('#search_speciality_floating_box').removeClass('selected-doctor');
				$('#search_doctor_floating_box').val('');
				$("#search_doctor_floating_box").removeClass("linked-doctor");
				$('#dropdown-speciality-floating-box li').removeClass('hidden').removeClass('tagged')
			}
		 	
  			if($(this).val().length>1)
  			{
				var $tags = $(this).val().toLowerCase().trim();
				$(".doctor-item-floating-box").each(function(){
					var $classExp = $(this).attr("tag").toLowerCase().trim();
					var regExp = new RegExp($tags);
					if(regExp.test($classExp))
						$(this).removeClass("hidden");
					else
						$(this).addClass("hidden");
				});
  			}
  			else
  			{
				$(".doctor-item-floating-box").removeClass("hidden");
  			}
  			return false;

		});


	$("#search_doctor_floating_box").on("keyup",function(){
			$("#search_doctor_floating_box").removeClass("valid").removeClass("invalid");
			$("#doctor_id").val("0");
			$("#search_doctor_floating_box").css({'background':'transparent'});
			
			if($('#search_doctor_floating_box').hasClass('linked-doctor'))
			{
				$('#search_speciality').removeClass('selected-doctor');
				$('#search_doctor_floating_box').val('');
				$("#search_doctor_floating_box").removeClass("linked-doctor");
				$('#dropdown-speciality li').removeClass('hidden').removeClass('tagged')
			}
		 	
  			if($(this).val().length>1)
  			{
				var $tags = $(this).val().toLowerCase().trim();
				$(".doctor-item-floating-box").each(function(){
					var $classExp = $(this).attr("tag").toLowerCase().trim();
					var regExp = new RegExp($tags);
					if(regExp.test($classExp))
						$(this).removeClass("hidden");
					else
						$(this).addClass("hidden");
				});
  			}
  			else
  			{
				$(".doctor-item-floating-box").removeClass("hidden");
  			}
  			return false;
		});


	$(".doctor-item-floating-box").on("click",function(e){
		var $id_doctor = $(this).attr("tag-id");
		var $identity_doctor = $(this).attr("tag");

		$("#search_doctor_floating_box").val($identity_doctor);
		$("#search_doctor_floating_box").css({'background':'grey'});
		$("#search_doctor_floating_box").addClass("linked-doctor");
		$("#doctor_id_floating_box").val($id_doctor);
		$("#search_doctor_floating_box").removeClass("invalid").addClass("valid");

		$('#search_speciality').addClass('selected-doctor');

		search_doctor_specialities_floating($id_doctor);
	});



	$(".doctor-item").on("click",function(e){
		var $id_doctor = $(this).attr("tag-id");
		var $identity_doctor = $(this).attr("tag");

		$("#search_doctor").val($identity_doctor);
		$("#search_doctor").css({'background':'grey'});
		$("#search_doctor").addClass("linked-doctor");
		$("#doctor_id").val($id_doctor);
		$("#search_doctor").removeClass("invalid").addClass("valid");

		$('#search_speciality').addClass('selected-doctor');

		search_doctor_specialities($id_doctor);
	});

	//search speciality
		$("#search_speciality").on("keyup",function(){
			if($(this).hasClass('selected-doctor'))
				return false;
			else
			{

				$("#search_speciality").removeClass("valid").removeClass("invalid");
				$("#visit_speciality_id").val("");
				$("#visit_speciality_tag").val("");
				$("#search_speciality").css({'background':'transparent'});
			 	$("#search_speciality").removeClass("linked-doctor");
	  			if($(this).val().length>1)
	  			{
					var $tags = $(this).val().toLowerCase().trim();
					$(".speciality-item").each(function(){
						var $classExp = $(this).attr("tag").toLowerCase().trim();
						var regExp = new RegExp($tags);
						if(regExp.test($classExp))
							$(this).removeClass("hidden");
						else
							$(this).addClass("hidden");
					});
	  			}
	  			else
	  			{
					$(".speciality-item").removeClass("hidden");
	  			}
	  			return false;

			}
		});

	$(".speciality-item").on("click",function(e){
		var $visit_speciality_id = $(this).attr("tag-id");
		var $speciality_label = $(this).attr("tag");
		var $speciality_alias = $(this).attr('alias');

		$("#search_speciality").val($speciality_label);
		$("#search_speciality").css({'background':'grey'});
		$("#search_speciality").addClass("linked-doctor");
		$("#visit_speciality_id").val($visit_speciality_id);
		$("#visit_speciality_tag").val($speciality_alias);
		$("#search_speciality").removeClass("invalid").addClass("valid");
	});


		//search speciality floating box
		$("#search_speciality_floating_box").on("keyup",function(){
			if($(this).hasClass('selected-doctor'))
				return false;
			else
			{

				$("#search_speciality_floating_box").removeClass("valid").removeClass("invalid");
				$("#visit_speciality_id").val("");
				$("#visit_speciality_tag").val("");
				$("#search_speciality_floating_box").css({'background':'transparent'});
			 	$("#search_speciality_floating_box").removeClass("linked-doctor");
	  			if($(this).val().length>1)
	  			{
					var $tags = $(this).val().toLowerCase().trim();
					$(".speciality-item-floating-box").each(function(){
						var $classExp = $(this).attr("tag").toLowerCase().trim();
						var regExp = new RegExp($tags);
						if(regExp.test($classExp))
							$(this).removeClass("hidden");
						else
							$(this).addClass("hidden");
					});
	  			}
	  			else
	  			{
					$(".speciality-item-floating-box").removeClass("hidden");
	  			}
	  			return false;

			}
		});

			//search speciality
		$("#search_speciality_floating_box").on("keyup",function(){
			if($(this).hasClass('selected-doctor'))
				return false;
			else
			{

				$("#search_speciality_floating_box").removeClass("valid").removeClass("invalid");
				$("#visit_speciality_id_floating_box").val("");
				$("#visit_speciality_tag").val("0");
				$("#search_speciality_floating_box").css({'background':'transparent'});
			 	$("#search_speciality_floating_box").removeClass("linked-doctor");
	  			if($(this).val().length>1)
	  			{
					var $tags = $(this).val().toLowerCase().trim();
					$(".speciality-item-floating-box").each(function(){
						var $classExp = $(this).attr("tag").toLowerCase().trim();
						var regExp = new RegExp($tags);
						if(regExp.test($classExp))
							$(this).removeClass("hidden");
						else
							$(this).addClass("hidden");
					});
	  			}
	  			else
	  			{
					$(".speciality-item-floating-box").removeClass("hidden");
	  			}
	  			return false;

			}
		});

		$(".speciality-item-floating-box").on("click",function(e){
		var $visit_speciality_id = $(this).attr("tag-id");
		var $speciality_label = $(this).attr("tag");
		var $speciality_alias = $(this).attr('alias');

		$("#search_speciality_floating_box").val($speciality_label);
		$("#search_speciality_floating_box").css({'background':'grey'});
		$("#search_speciality_floating_box").addClass("linked-doctor");
		$("#visit_speciality_id_floating_box").val($visit_speciality_id);
		$('#visit_speciality_id_floating_box_tag').val($speciality_alias);
		$("#search_speciality_floating_box").removeClass("invalid").addClass("valid");
	});
	//manage payment_method
	$(".trigger-payment-method").on("click",function(e){
		var $reference = $(this).attr("reference").trim();
		$(".payment-method-wrapper :input").val("");
		$(".payment-method-wrapper :input").removeClass("required");
		$(".payment-method-wrapper").addClass("hidden");
		$(".payment-method-wrapper").each(function(){
			if($(this).attr("id")===$reference){
				$($reference).find(":input").addClass("required");
				$(this).removeClass("hidden");
			}
		});

	});



	$(".trigger-payment-method:eq(0)").trigger("click");

	//search patient on top bar
	$(".trigger-patient-info").on("click",function(e){
			e.preventDefault();
			var $table = $("#visit-info-patient-table");
			var $item_selected = $(this);
			$("#visit-info-patient-modal").openModal({
					ready: function(){
						var id_patient_table = $table.find("tbody").attr("patient-id");
						var id_selected_patient = $item_selected.attr("patient-id");
				
						if(id_patient_table!=id_selected_patient)
						{
								$.ajax({
									beforeSend: function(){
										$("#loader-visit-info-modal").removeClass("hidden");
										$table.find("tbody").empty();	
									},
									type: "GET",
									url: '/manager/patients/get-all-road?id='+id_selected_patient,
									dataType:"Text",
									success: function(data){
											if(data==="ko")
											{
												Materialize("Récupération des informations échouées",1500);
												$("#close-trigger-modal-get-patient-visit").trigger("click");
											}
											else
											{
												var results = JSON.parse(data);
												$.each(results, function(index, value)
												{
														var tr_element = $("<tr class='row-patients-info'></tr>").attr("visit-id",value.id);
														var tags = value.code_visit+" "+value.formated_created+" "+value.manager_operator.institution.fullname;
														tr_element.attr("tags",tags)
														for(var i=1; i<=8; i++)
														{
															var td_element = $("<td></td>");
															tr_element.append(td_element);
														}
														tr_element.find("td:eq(0)").append(value.code_visit);
														tr_element.find("td:eq(1)").append(value.formated_created);
														tr_element.find("td:eq(2)").append(value.manager_operator.institution.fullname);
														//rdv infos
														var element_rdv = $('<i class="rdv-patient-info ion-ios-information dmp-main-color medium pointer-opaq" style="font-size:2.2rem;"></i>');
														element_rdv.unbind("click").bind("click",getting_rdv_info);
														tr_element.find("td:eq(3)").append(element_rdv);
														//intervention infos
														var element_intervention = $('<i class="intervention-patient-info ion-ios-information dmp-main-color medium pointer-opaq" style="font-size:2.2rem;"></i>');
														element_intervention.unbind("click").bind("click",getting_intervention_info);
														tr_element.find("td:eq(4)").append(element_intervention);
														//bills infos
														var element_bills_infos = $('<i class="ion-ios-information dmp-main-color medium bills-patient-info pointer-opaq" style="font-size:2.2rem;"></i>');
														element_bills_infos.unbind("click").bind("click",getting_bills_info);
														tr_element.find("td:eq(5)").append(element_bills_infos);
														//additional infos
														var element_additional = $('<i class="ion-ios-information dmp-main-color medium additional-patient-info pointer-opaq" style="font-size:2.2rem;"></i>');
														element_additional.unbind("click").bind("click",getting_additional_info);
														tr_element.find("td:eq(6)").append(element_additional);
														//actions
														var $menu_trigger = $('<a href="#" data-activates="visit-'+value.id+'" data-beloworigin="true" data-alignment="right" data-constrainwidth="false" class="btn white dropdown-button" style="padding:0px 20px 20px 20px;"><i class="ion-android-menu  dmp-main-color" style="font-size:2.2rem;"></i></a>');
						   								var $menu_container = $('<ul class="dropdown-content" id="visit-'+value.id+'"></ul>');
														$('<li><a href="#!">Facturer Visite</a></li>').appendTo($menu_container);
														$('<li class="divider"></li>').appendTo($menu_container);
														$('<li><a href="#!">Définir une intervention</a></li>').appendTo($menu_container);
														$('<li class="divider"></li>').appendTo($menu_container);
														$('<li><a href="#!">Modifier Visite</a></li>').appendTo($menu_container);
														$('<li class="divider"></li>').appendTo($menu_container);
														$('<li><a href="#!">Supprimer Visite</a></li>').appendTo($menu_container);
														$('<li class="divider"></li>').appendTo($menu_container);

														tr_element.find("td:eq(7)").append($menu_trigger).append($menu_container);

														$table.find("tbody").append(tr_element);
														$menu_trigger.dropdown();

												});
												console.log(data);
											}
									},
									complete: function(){
											$("#loader-visit-info-modal").addClass("hidden");
									},
									error: function(){
											alert("Erreur serveur, veuillez réessayer");
									}
								});
						}
						else
						{

						}
					},
					complete: function(){}
			});
	});

	//search bar patients modal info box
	$("#search-visit-patient-info").on("keyup",function(){
            if($(this).val().length>1)
            {   
                var $value = $(this).val().trim().toLowerCase();
                $(".row-patients-info").each(function(){
                    var $item = $(this).attr("tags").toLowerCase().trim();
                    var regExp = new RegExp($value);
                    if(regExp.test($item))
                        $(this).removeClass("hidden");
                    else
                        $(this).addClass("hidden");
                });
            }
            else
            {
                $(".row-patients-info").removeClass("hidden");
            }
            return false;
	});

});

  	function listenerClickedElement () {
		var $doctorName=$(this).text().trim();
		$("#doctor_name").val($doctorName);
		$("#doctor_id").val($(this).attr("doctor_id"));
		$("#selected-doctor-info-box").removeClass("hidden");
		$("#search-doctor-wrapper").addClass("hidden");
		$("#search-doctor-wrapper input").val("");
  	}

  	function listenerClosingChip ()
  	{
			var $reason_desc = $(this).parents("div").attr("reason-desc");
			$(".reason-item[reason-desc='"+$reason_desc+"']").removeClass("actived");

  	}

  	function listenerClickItemVisit()
  	{

		 	var $value=$(this).attr("tag");
		 	$("#search_visit").val($value);
		 	$("#search_visit").css({'background':'grey'});
		 	$("#search_visit").addClass("linked-visit");
		 	$("#search_visit").removeClass("invalid").addClass("valid");
  	}

  	function resetPatientSearch()
  	{

  	}


	function getting_rdv_info(){
	   	var $visit_id = $(this).parents("tr").attr("visit-id");
   		var $table = $("#rdv-info-patient-table tbody");
   		var $value_table_id=$table.attr("rdv-id");


   		if($value_table_id==$visit_id)
   		{
	   		$("#rdv-info-patient-modal").openModal();
   		}
   		else
   		{
   			$table.attr("rdv-id",$visit_id);

   			$.ajax({
   				beforeSend: function(){
   					$table.empty();
   					$("#loader-rdv-info-modal").removeClass("hidden");
   				},
   				type:"GET",
   				url:'/manager/visit-meetings/all?id='+$visit_id,
   				dataType:'text',
   				success: function(data){
   					if(data==="ko")
		   			{
		   				Materialize.toast("Données rdv indisponibles",1000);
		   				return false;
		   			}
		   			else
		   			{
   					var $results = JSON.parse(data);
					console.log($results);		   			
		   			$.each($results,function(index,value){
		   				var $tr_element = $("<tr></tr>");
		   				if(value.visit_invoice.state==1)
		   					$tr_element.addClass("light-green-bill")
		   				else
		   					$tr_element.addClass("light-red-bill")
		   				for(var i=1; i<=13;i++)
		   				{
		   					var $td_element = $("<td class='zero-padding'></td>");
		   					$tr_element.append($td_element);
		   				}

		   				$tr_element.find("td:eq(0)").text(value.code_meeting);
		   				
		   				var $evidence = $('<a target="blank" class="btn dmp-main-back" style="padding:0px 20px 20px 20px;"><i class="ion-document white-text medium" style="font-size:2.2rem;"></i></a>')
		   				 $evidence.attr('href','/manager/visit-invoices/show-meeting-invoice/'+value.visit_invoice_id);
		   				$tr_element.find("td:eq(1)").append($evidence);

		   				$tr_element.find("td:eq(2)").text(value.format_amount+" F CFA");

		   				if(value.visit_invoice.visit_invoice_type_id==2)
		   				{
		   					$tr_element.find("td:eq(3)").text("Rdv");
		   				}
		   				else
		   				{
		   					$tr_element.find("td:eq(3)").text("Réservation");
		   				}

		   				$tr_element.find("td:eq(5)").text(value.formatted_created);

		   				if(value.done==0)
		   				$tr_element.find("td:eq(4)").text("Non");
		   				else
		   				$tr_element.find("td:eq(4)").text("Oui");

		   				$tr_element.find("td:eq(6)").text(value.formatted_sold);
		   				$tr_element.find("td:eq(7)").text(value.doctor.person.lastname+" "+value.doctor.person.firstname);
		   				$tr_element.find("td:eq(8)").text(value.visit_meeting_speciality.label);
		   				//constants infos
		   				if(value.visit_meeting_constant!=null)
		   				{
						var constant_additional = $('<i class="ion-ios-information dmp-main-color medium constants-patient-info pointer-opaq" style="font-size:2.2rem;" meeting-id="'+value.id+'"></i>');
						constant_additional.unbind("click").bind("click",getting_constant_info);
		   				}
						else
						{
						var constant_additional = $('<i class="ion-ios-information dmp-main-color medium constants-patient-info pointer-opaq" style="font-size:2.2rem;" meeting-id="'+value.id+'"></i>');
						constant_additional.unbind("click").bind("click",setting_constant_info);
						}
						$tr_element.find("td:eq(9)").append(constant_additional);
							switch(value.visit_invoice.visit_invoice_payment_way_id)
						   		{
									case 2:
										var $way='Cash';
									break;

									case 1:
										var $way='Chèque/CB';
									break;

									case 3:
										var $way='Assurance';
									break;

									case 4:
										var $way='Réservation';
									break;

									case 5:
										var $way='Echelonnement';
									break;

									default:
										var $way='Indéfini';
									break;
						   		}
						   		$tr_element.find("td:eq(10)").text($way);
						   		//build info payment
						   		if(value.visit_invoice.state==1){
						   		var $icon_payments = $('<i class="ion-information-circled small white-text dmp-main-color trigger-solded-payment-info-box pointer-opaq"></i>').attr("info-payment-id",value.visit_invoice_id);
						   		$icon_payments.unbind("click").bind("click",triggerSoldedPayment);
						   		}
						   		else
						   		{
						   		var $icon_payments = $('<i class="ion-information-circled small white-text dmp-main-color trigger-unsolded-payment-info-box pointer-opaq"></i>').attr("info-payment-id",value.visit_invoice_id);
						   		$icon_payments.unbind("click").bind("click",triggerUnSoldedPayment);	
						   		}
						   		$tr_element.find("td:eq(11)").html($icon_payments);
						   		//build menu invoice row
						   		var $menu_trigger = $('<a href="#" data-activates="rdv-'+value.id+'" data-beloworigin="true" data-alignment="right" data-constrainwidth="false" class="btn white dropdown-button" style="padding:0px 20px 20px 20px;"><i class="ion-android-menu  dmp-main-color" style="font-size:2.2rem;"></i></a>');
						   		var $menu_container = $('<ul class="dropdown-content" id="rdv-'+value.id+'"></ul>');
						   		if(value.done==0)
						   		{
						   			$('<li><a href="#!">Replanifier rdv</a></li>').appendTo($menu_container);
									$('<li class="divider"></li>').appendTo($menu_container);
						   		}

								$('<li><a href="/manager/visit-invoices/get-pdf-invoice/'+value.visit_invoice_id+'" target="blank">Téléchargement Pdf</a></li>').appendTo($menu_container);
								$('<li class="divider"></li>').appendTo($menu_container);
								$('<li><a href="/manager/visit-invoices/get-image-invoice/'+value.visit_invoice_id+'" target="blank">Téléchargement Image</a></li>').appendTo($menu_container);
								
								$tr_element.find("td:eq(12)").append($menu_trigger)
															.append($menu_container);

						   		$table.append($tr_element);
								$menu_trigger.dropdown();







		   				$table.append($tr_element);
		   			});
		   		  }
	   			},
   				complete: function(){
   					$("#loader-rdv-info-modal").addClass("hidden");
   				},
   				error: function(){alert("Erreur serveur, veuillez réessayer",1000);}
   			});
	   		$("#rdv-info-patient-modal").openModal();
   		}
	}

	function getting_intervention_info(){

	}
	function getting_bills_info(){

	}
	function getting_additional_info(){

	}

function getting_constant_info()
{
	var $id_meeting = $(this).attr("meeting-id");
	$("#getting-hemodynamic-patient-modal").openModal({
		ready: function(){
   			$.ajax({
   				beforeSend: function(){
   					$("#getting-hemodynamic-info-wrapper").addClass("hidden");
   					$("#loader-getting-constants-info-modal").removeClass("hidden");
   				},
   				type:"GET",
   				url:'/manager/visit-meeting-constants/get?visit_meeting_id='+$id_meeting,
   				dataType:'text',
   				success: function(data){
   					console.log(data);
   					if(data ==="ko")
   					{
   						Materialize.toast("Erreur lors du chargement des informations",1500);
   					}
   					else
   					{
   						var $result = JSON.parse(data);
   						$("#height-getting").val($result.height);
   						$("#weight-getting").val($result.weight);
   						$("#temperature-getting").val($result.temperature);
   						$("#tension-getting").val($result.tension);
   						$("#pouls-getting").val($result.pouls);


   						console.log($result);
   					}
	   			},
   				complete: function(){
   					$("#getting-hemodynamic-info-wrapper").removeClass("hidden");
   					$("#loader-getting-constants-info-modal").addClass("hidden");
   				},
   				error: function(){alert("Erreur serveur, veuillez réessayer",1000);}
   			});
		},
		complete: function(){
			$("#getting-hemodynamic-constants-form")[0].reset();
		}

	});
}	

function setting_constant_info()
{
	var $id_meeting = $(this).attr("meeting-id");
	$("#setting-hemodynamic-patient-modal").openModal({


	});
}


function manage_additional_info_items()
{
	$('.item-additional-element').unbind('change').bind('change',function(){
		var $parent_row = $(this).parents('tr');
		var $value_item_qte = parseFloat($('.item-qte',$parent_row).val());
		var $value_item_unit_price = parseFloat($('.unity-price',$parent_row).val());
		if($value_item_qte>=0 && $value_item_unit_price>=0)
			{
				var $result = parseFloat($value_item_qte * $value_item_unit_price);
				$('.total-amount-item',$parent_row).val($result);
			}
		else
			return false;

	});

	$('.visit_invoice_item_select').unbind('change').bind('change',function(){
		var $value = $(this).find('option:checked').text();
		$(this).parents('tr').find('.name_item').val($value);
		// console.log($value);
		// alert($value);	
	});
}


function search_doctor_specialities($id_doctor)
{
	$('#speciality-container img').removeClass('hidden');
	$.get('/manager/doctors/get-specialities',{'id_doctor':$id_doctor},function(data){

		$('#speciality-container img').addClass('hidden');

			if(data==='ko')
				Materialize.toast("Ce docteur n'est relié à aucune spécialité",1000);
			else
			{
				var $result = JSON.parse(data);
				$.each($result.institution_doctors[0].doctor_specialities,function(index,value){
						$('#dropdown-speciality li').each(function(){
								if($(this).attr('tag-id')==value.visit_speciality_id)
									$(this).addClass('tagged');
						});
				});
					$('#dropdown-speciality li').each(function(){
						if(!$(this).hasClass('tagged'))
							$(this).addClass('hidden');
					});
				// 
			}
	});
}

function search_doctor_specialities_floating($id_doctor)
{
	$('#floating-box-booking-img').removeClass('hidden');
	$.get('/manager/doctors/get-specialities',{'id_doctor':$id_doctor},function(data){

		$('#floating-box-booking-img').addClass('hidden');

			if(data==='ko')
				Materialize.toast("Ce docteur n'est relié à aucune spécialité",1000);
			else
			{
				var $result = JSON.parse(data);
				$.each($result.institution_doctors[0].doctor_specialities,function(index,value){
						$('#dropdown-speciality-floating-box li').each(function(){
								if($(this).attr('tag-id')==value.visit_speciality_id)
									$(this).addClass('tagged');
						});
				});
					$('#dropdown-speciality-floating-box li').each(function(){
						if(!$(this).hasClass('tagged'))
							$(this).addClass('hidden');
					});
				// 
			}
	});
}