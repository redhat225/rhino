jQuery(function($){

	$(".visit-meetings-info-trigger").on('click',function(){
		var $id_visit = parseInt($(this).parents('tr').attr('visit-id'));
		var $modal = $('#meeting_visit_info_modal');
		$('#meeting_visit_info_modal').openModal({
			ready: function(){
				$.ajax({
					beforeSend:function(){
						$('#visit-meetings-info').addClass('hidden');
						$('.loader-modal-box',$modal).removeClass('hidden');
						$('#meeting_visit_info_table tbody').empty();
					},
					type:'GET',
					url: '/doctor/visit-meetings/get?id='+$id_visit,
					dataType:'text',
					complete: function(){
						$('#visit-meetings-info').removeClass('hidden');
						$('.loader-modal-box',$modal).addClass('hidden');
					},
					success: function(data){
						if(data === 'ko')
						{
							Materialize.toast('Aucun rendez-vous enregistré pour cette visite',1500);
						}
						else
						{
							var results = JSON.parse(data);
							console.log(results);
							$.each(results,function(index, value){
								var $tr_element = $("<tr></tr>").attr('meeting-id',value.id).attr('treatment-id',value.treatment.id);
					   				for(var i=1; i<=8;i++)
						   			{	
						   			  var $td_element = $("<td style='padding:5px;'></td>");
						   			  $tr_element.append($td_element);
						   			}
						   		$tr_element.find("td:eq(0)").text(value.code_meeting);
						   		//element targetted pointer						   		
						   		$tr_element.find("td:eq(1)").text(value.formatted_rdv_date);
						   		$tr_element.find("td:eq(2)").text('Dr. '+value.doctor.person.lastname+' '+value.doctor.person.firstname);
								$tr_element.find("td:eq(3)").text(value.visit_invoice.manager_operator.institution.fullname);

								if(value.treatment.description)
								$tr_element.find("td:eq(4)").html(value.treatment.description);
								else
								{
									var $invoice_info_element_treatment = $('<i class="ion-edit dmp-main-color small pointer-opaq" style="font-size:2.2rem;"></i>');
									$invoice_info_element_treatment.addClass('trigger-edit-meeting').unbind('click').bind('click',triggerEditTreatment);
									$tr_element.find("td:eq(4)").append($invoice_info_element_treatment);
								}
								


								var $invoice_info_element_exam = $('<i class="ion-ios-information dmp-main-color small pointer-opaq" style="font-size:2.2rem;"></i>');
								$invoice_info_element_exam.addClass('trigger-exam-meeting').unbind('click').bind('click',triggerExamMeeting);

								var $print_info_element_exam = $('<i class="right ion-android-print dmp-main-color small pointer-opaq" style="font-size:2.2rem;"></i>');
								$print_info_element_exam.addClass('trigger-print-exam').unbind('click').bind('click',triggerPrintExamMeeting);

								$tr_element.find('td:eq(5)').append($invoice_info_element_exam)
															.append($print_info_element_exam);

								var $invoice_info_element_requirement = $('<i class="ion-ios-information dmp-main-color small pointer-opaq" style="font-size:2.2rem;"></i>');
								$invoice_info_element_requirement.addClass('trigger-requirement-meeting').unbind('click').bind('click',triggerRequirementMeeting);
								
								var $print_info_element_requirement = $('<i class="right ion-android-print dmp-main-color small pointer-opaq" style="font-size:2.2rem;"></i>');
								$print_info_element_requirement.addClass('trigger-print-requirement').unbind('click').bind('click',triggerPrintRequirementMeeting);


								$tr_element.find('td:eq(6)').append($invoice_info_element_requirement)
															.append($print_info_element_requirement);
									
								$tr_element.find("td:eq(7)").html('&nbsp;');

								$('#meeting_visit_info_table tbody').append($tr_element);

							});
						
						}
					},
					error: function(){alert('Une erreur est survenue lors de l\'importation.')}
				});
			},
			complete: function(){

			}
		});
	});


	$('.add-exams-item').on('click',function(){
		var $visit_meeting_id = $(this).parents('th').attr('visit-meeting-id');

		$.get('/doctor/exams/add-inline',{'visit-meeting-id':$visit_meeting_id},function(data){
			$('#exam-meetings-info tbody').append(data);
			$('#exam-meetings-info tbody tr:last-child a.save-item-exam-trigger').unbind('click').bind('click',saveExamItem);
			$('#exam-meetings-info tbody tr:last-child .type_exam_select').unbind('change').bind('change',getUnderExamItems);
			$('#exam-meetings-info tbody tr:last-child .retired-exams-item').unbind('click').bind('click',function(){
				$(this).parents('tr').remove();
			});
			initializator();
		});
	});

	$('.add-requirement-item').on('click',function(){
		var $treatment_id = $(this).parents('th').attr('treatment-id');

		$.get('/doctor/treatment-requirements/add',{'treatment-id':$treatment_id},function(data){
			$('#requirement-meetings-info tbody').append(data);
			$('#requirement-meetings-info .obs_requirement_textarea').unbind('keyup').bind('keyup',function(){
			    var $value = $(this).val().trim();
			    if($value.length===0)
			      $(this).removeClass('valid').removeClass('invalid').removeClass('required');
			    else
			      $(this).addClass('required');
			  });
			$('#requirement-meetings-info tbody tr:last-child a.save-item-requirement-trigger').unbind('click').bind('click',saveRequirementItem);
			$('#requirement-meetings-info tbody tr:last-child .retired-requirement-item').unbind('click').bind('click',function(){
				$(this).parents('tr').remove();
			});
			initializator();
		});
	});

	$("#carnet-generator").on("click",function()
	{
		var $idPatient=parseInt($(this).attr("id-patient"));

		var $data="patient_id="+$idPatient;
		$.ajax({
			beforeSend:function(){
				$("#asset-carnet-generator").addClass("hidden");
				$("#loader-carnet-generator").removeClass("hidden");
			},
			type:'POST',
			dataType:"text",
			url:'/doctor/patient-books/book-builder',
			data:$data,
			success:function(data){
				if(data==="ok")
				{
					window.open('/doctor/patient-books/view/'+$idPatient);
				}
				else
				{
					Materialize.toast("Vous n'avez pas le droit de consulter ce dossier.",1000);			
				}
			},
			complete:function(){
				$("#asset-carnet-generator").removeClass("hidden");
				$("#loader-carnet-generator").addClass("hidden");
			},
			error:function(){
				alert("Une erreur est survenue");
			}
		});

	});


});


function getUnderExamItems()
{
	var $type_exam = parseInt($(this).find('option:checked').val().trim());
	var $current_line = $(this).parents('tr');
	$.get('/doctor/exams/add-under-exam-inline',{'type_exam_id':$type_exam},function(data){
		$('td:eq(3)',$current_line).empty().append(data);
		initializator();
	});
}

function saveExamItem()
{
	var $isErrorFree = true;
	var $current_line = $(this).parents('tr');

	$('.add-exam-select',$current_line).each(function(){
		if($(this).find('option:checked').val()==='')
			$isErrorFree = false;

	});

	if($('.libelle-exam-textarea',$current_line).val().trim()==='')
		$isErrorFree = false;

	if($isErrorFree)
	{ 		
		var $id_meeting = parseInt($(this).parents('tr').attr('visit-meeting-id'));
		var $form = $('.exam-item-form-wrapper',$current_line);
		var $data = 'visit_meeting_id='+$id_meeting+'&obs_exam='+$('.libelle-exam-textarea',$current_line).val().trim()+'&type_exam_id='+$('.type_exam_select option:checked',$current_line).val().trim()+'&exam_under_type_id='+$('.under-type-exam-select option:checked',$current_line).val().trim();
		$.ajax({
			beforeSend: function(){
				$('.save-item-exam-trigger',$current_line).addClass('hidden');
				$('.loader-saving-exam',$current_line).removeClass('hidden');
			},
			url: '/doctor/exams/save-exam',
			type:'POST',
			data: $data,
			success: function(data){
				if(data==='ko')
				{
					Materialize.toast('Une erreur est survenue lors de l\'enregistrement, veuillez réessayer',1200);
				}
				else
				{
					var exam = JSON.parse(data);
					// last index 
					var last_index = $('#exam_visit_info_table tbody tr:not(.exams-item)').length;

					$('td:eq(0)',$current_line).empty().text((last_index+1));
					$('td:eq(1)',$current_line).empty().text((exam.codexam));
					$('td:eq(2)',$current_line).empty().text((exam.obs_exam));
					$('td:eq(3)',$current_line).text($('.under-type-exam-select option:checked',$current_line).text().trim());
					$('td:eq(4)',$current_line).html('&nbsp;');
					$('td:eq(5)',$current_line).html('&nbsp;');
					$('td:eq(6)',$current_line).html('&nbsp;');

					$current_line.attr('exam-id',exam.id);
					$current_line.removeClass('exams-item');
					$current_line.removeAttr('visit-meeting-id');


				}
			},
			complete: function(){
				$('.save-item-exam-trigger',$current_line).removeClass('hidden');
				$('.loader-saving-exam',$current_line).addClass('hidden');
			},
			error: function(){alert('Erreur serveur, veuillez réessayer/contacter le support');}
		});
	}
	else
	{
		Materialize.toast('Veuillez corriger le formulaire avant l\'envoi',1200);
		return false;
	}
}

function saveRequirementItem()
{
	var $isErrorFree = true;
	var $current_line = $(this).parents('tr');

	$('.required',$current_line).each(function(){
			if(validateElement.isValid(this)==false)
				$isErrorFree = false;
	});


	if($isErrorFree)
	{ 
		var $treatment_id = parseInt($current_line.attr('treatment-id'));
		var $data ='treatment_id='+$treatment_id+'&label_requirement='+$('.label_requirement_input',$current_line).val().trim()+'&posologie_requirement='+$('.posologie_requirement_input',$current_line).val().trim()+'&obs_requirement='+$('.obs_requirement_textarea',$current_line).val().trim();
		$.ajax({
			beforeSend: function(){
				$('.save-item-requirement-trigger',$current_line).addClass('hidden');
				$('.loader-saving-requirement',$current_line).removeClass('hidden');
			},
			url: '/doctor/treatment-requirements/add',
			type:'POST',
			data: $data,
			success: function(data){
				if(data==='ko')
				{
					Materialize.toast('Une erreur est survenue lors de l\'enregistrement, veuillez réessayer',1200);
				}

				if(data === 'ok')
				{
					var label = $('.label_requirement_input',$current_line).val().trim();
					var posologie = $('.posologie_requirement_input',$current_line).val().trim();
					var obs_req = $('.obs_requirement_textarea',$current_line).val().trim();
					var length_requirement = $('#requirement-visit-table tbody tr:not(.requirement-item)').length;

					$('td:eq(0)',$current_line).text(length_requirement+1);
					$('td:eq(1)',$current_line).empty().text(label);
					$('td:eq(2)',$current_line).empty().text(posologie);
					$('td:eq(3)',$current_line).empty().text(obs_req);
					$('td:eq(4)',$current_line).html('&nbsp;');

					$current_line.removeClass('requirement-item');
					$current_line.removeAttr('treatment-id');
				}
			},
			complete: function(){
				$('.save-item-requirement-trigger',$current_line).removeClass('hidden');
				$('.loader-saving-requirement',$current_line).addClass('hidden');
			},
			error: function(){alert('Erreur serveur, veuillez réessayer/contacter le support');}
		});
	}
	else
	{
		Materialize.toast('Effectuer les corrections nécessaires avant l\'envoi du formulaire',1500);
		return false;
	}
}

function initializator()
{
	$('select').material_select();
	$('.exam-item-form-wrapper').on('submit',function(){
		return false;
	});
}


function triggerTreatmentMeeting(){

}


function triggerPrintExamMeeting()
{
	var $id_meeting = $(this).parents('tr').attr('meeting-id');
	$url = '/doctor/exams/show/'+$id_meeting+'.pdf';
	window.open($url);	
}

function triggerPrintRequirementMeeting()
{
	var $id_meeting = $(this).parents('tr').attr('meeting-id');
	$url = '/doctor/treatment-requirements/show/'+$id_meeting+'.pdf';
	window.open($url);	
}


function triggerExamMeeting()
{
	var $meeting_id = parseInt($(this).parents('tr').attr('meeting-id'));
	$('.add-exams-item').parents('th').attr('visit-meeting-id',$meeting_id);


	$('#exam_visit_info_modal').openModal({
		ready: function(){
			var $modal = $('#exam_visit_info_modal');
			$.ajax({
				beforeSend: function(){
					$('#exam-meetings-info').addClass('hidden');
					$('.loader-modal-box',$modal).removeClass('hidden');
					$('#exam-meetings-info tbody').empty();
				},
				url:'/doctor/visit-meetings/get-exams?id='+$meeting_id,
				type: 'GET',
				dataType:'text',
				success: function(data){
					if(data==='ko')
					{
						Materialize.toast('Pas d\'examen spécifié pour cette visite',1500);
					}
					else
					{
							var results = JSON.parse(data);
							console.log(results);
							var ie=1;
							$.each(results,function(index, value){
								var $tr_element = $("<tr></tr>").attr('exam-id',value.id).addClass('dmp-grey-text');

					   				for(var i=1; i<=7;i++)
						   			{	
						   			  var $td_element = $("<td style='padding:5px;'></td>");
						   			  $tr_element.append($td_element);
						   			}
						   		$tr_element.find("td:eq(0)").text(ie);
						   		//element targetted pointer						   		
						   		$tr_element.find("td:eq(1)").text(value.codexam);
						   		$tr_element.find("td:eq(2)").text(value.obs_exam);
								$tr_element.find("td:eq(3)").text(value.exam_under_type.label_exam_under_type).addClass('left-align');
								$tr_element.find("td:eq(4)").text(value.result_exam);

								$.each(value.exam_evidences,function(index,value){
									var $evidence = $('<a target="blank" class="btn dmp-main-back" style="padding:0px 20px 20px 20px;"><i class="ion-document white-text medium" style="font-size:2.2rem;"></i></a>')
		   						    $evidence.attr('href','/doctor/exams/view/'+value.id);
		   						    $tr_element.find("td:eq(5)").append($evidence);	
								});

								
								$tr_element.find("td:eq(6)").html('&nbsp;');
							
								$('#exam-meetings-info tbody').append($tr_element);
								ie++;
							});
					}
				},
				complete: function(){
					$('#exam-meetings-info').removeClass('hidden');
					$('.loader-modal-box',$modal).addClass('hidden');
				},
				error: function(){alert('Erreur serveur, veuillez réessayer');}

			});
		},
		complete: function(){

		}
	});
}
function triggerRequirementMeeting()
{
	var $treatment_id = parseInt($(this).parents('tr').attr('treatment-id'));
	$('.add-requirement-item').parents('th').attr('treatment-id',$treatment_id);
	$('#requirement_visit_info_modal').openModal({
		ready: function(){
			var $modal = $('#requirement_visit_info_modal');
			$.ajax({
				beforeSend: function(){
					$('#requirement-meetings-info').addClass('hidden');
					$('.loader-modal-box',$modal).removeClass('hidden');
					$('#requirement-meetings-info tbody').empty();
				},
				url:'/doctor/treatment-requirements/get?id='+$treatment_id,
				type: 'GET',
				dataType:'text',
				success: function(data){
					if(data==='ko')
					{
						Materialize.toast('Aucune prescription spécifiée pour ce rendez-vous',3500);
					}
					else
					{
							var results = JSON.parse(data);
							console.log(results);
							var ie=1;
							$.each(results,function(index, value){
								var $tr_element = $("<tr></tr>").attr('requirement-id',value.id).addClass('dmp-grey-text');

					   				for(var i=1; i<=5;i++)
						   			{	
						   			  var $td_element = $("<td style='padding:5px;'></td>");
						   			  $tr_element.append($td_element);
						   			}
						   		$tr_element.find("td:eq(0)").text(ie);
						   		//element targetted pointer						   		
						   		$tr_element.find("td:eq(1)").text(value.label_requirement);
						   		$tr_element.find("td:eq(2)").text(value.posologie_requirement);
								$tr_element.find("td:eq(3)").text(value.obs_requirement).addClass('left-align');
								$tr_element.find("td:eq(4)").html('&nbsp;');
							
								$('#requirement-meetings-info tbody').append($tr_element);
								ie++;
							});
					}
				},
				complete: function(){
					$('#requirement-meetings-info').removeClass('hidden');
					$('.loader-modal-box',$modal).addClass('hidden');
				},
				error: function(){alert('Erreur serveur, veuillez réessayer');}

			});
		},
		complete: function(){

		}
	});
}


function triggerEditTreatment()
{
	var $current_line = $(this).parents('tr');
	var $current_cel = $(this).parents('td');
	var $input_element = $('<textarea name="edit-treatment" class="edit-treatment-textarea materialize-textarea"></textarea>');
		$input_element.unbind('keyup').bind('keyup',function(e){
			var $keyCode=e.keyCode||e.which;
			if($keyCode===13)
			{
				var $value = $('.edit-treatment-textarea',$current_line).val().trim();
				if($value==='' || $value.length<10)
				{
					Materialize.toast('Veuillez remplir le champ traitement avec au moins 10 caractères.',1000);
				}
				else
				{
					$('#treatment_visit_info_modal').openModal({
						ready: function(){
							$('#trigger-confirm-edit-treatment').unbind('click').bind('click',function(){
								var $id_meeting = $current_line.attr('meeting-id');
								var $value = $('.edit-treatment-textarea',$current_line).val().trim();

								$.ajax({
									beforeSend: function(){
										$('#treatment-meetings-info').addClass('hidden');
										$('#treatment_visit_info_modal .loader-modal-box').removeClass('hidden');
									},
									url:'/doctor/treatments/edit',
									data:'description='+$value+'&visit_meeting_id='+$id_meeting,
									type:'POST',
									dataType:'Text',
									success: function(data){
										if(data === 'ko')
										{
											Materialize.toast('Une erreur est survenue, veuilez réessayer/contacter le support',1200);
										}

										if(data === 'ok')
										{
											$('#cancel-confirm-edit-treatment').trigger('click');
											$current_cel.empty().append($value);
										}
									},
									error: function(){alert('Erreur serveur, veuillez réessayer');},
									complete: function(){
										$('#treatment-meetings-info').removeClass('hidden');
										$('#treatment_visit_info_modal .loader-modal-box').addClass('hidden');
									}
								});
							});
						},
						complete: function(){}
					});
				}

			}
		});
		$input_element.unbind('blur').bind('blur',function(){
			var $value = $(this).val().trim();
			if($value==='')
				{
					var $invoice_info_element_treatment = $('<i class="ion-edit dmp-main-color small pointer-opaq" style="font-size:2.2rem;"></i>');
					$invoice_info_element_treatment.addClass('trigger-edit-meeting').unbind('click').bind('click',triggerEditTreatment);
					$(this).parents('td').empty().append($invoice_info_element_treatment);
				}
		});
	$current_cel.empty().append($input_element);
}

