$(document).ready(function(){
		//initialization assets
		$("select").material_select();

		//cancel booking patient 
		$(".cancel-booking-patient-trigger").on("click",function(){
			var $id_booking = $(this).attr("id-meeting");
			var $current_parent_element = $(this).parents("tr");
			$("#cancel-booking-modal-box").openModal({
				ready: function(){
					$('#cancel-booking-confirm-trigger').unbind('click').bind('click',function(){
						$.ajax({
							beforeSend: function(){
								$("#cancel-booking-modal-box .modal-footer").slideUp();
								$("#content-cancel-booking").addClass('hidden');
								$("#loader-cancel-booking").removeClass('hidden');
							},
							type:'POST',
							url:'/patient/patient-bookings/remove',
							data: 'id_booking='+$id_booking,
							success: function(data){
								if(data === "ko")
								{
									Materialize.toast("Annulation échouée, veuillez réessayer/contacter le support",1500);
								}
								else
								{
									$current_parent_element.removeClass("light-orange-bill").addClass("light-red-bill");
									$current_parent_element.find('td:last').empty();
									$("#cancel-booking-abort-trigger").trigger("click");
								}
							},
							complete: function(){
								$("#cancel-booking-modal-box .modal-footer").slideDown();
								$("#content-cancel-booking").removeClass('hidden');
								$("#loader-cancel-booking").addClass('hidden');
							},
							error: function(){alert("Erreur serveur, veuillez réessayer");}
						});
					});

				},
				complete: function(){

				}
			});
		});

		//view legend booking
		$(".trigger-info-booking").on('click',function()
		{
			$("#info-booking-modal-box").openModal();
		});	

		//Edit Booking
		$(".edit-booking-patient-trigger").on("click", function()
		{
					var time_meeting = $(this).attr("time-meeting");
					var date_meeting = $(this).attr("date-meeting");
					var $form = $("#form-edit-booking");
					var id_booking = $(this).attr("id-booking");
					$("#booking_id").val(id_booking);
			$("#edit-booking-modal-box").openModal({
				ready: function(){
						$("#expected_meeting_date").val(date_meeting);
						$("#expected_meeting_time").val(time_meeting);
						$("#edit-booking-confirm-trigger").unbind('click').bind('click',function(){
							var $isErrorFree = true;

							$(".edit-booking-hidden").each(function(){
								if($(this).val()==="")
									$isErrorFree = false;
							});

							if($isErrorFree)
							{
								$.ajax({
									beforeSend: function(){
										$("#edit-booking-modal-box .modal-footer").slideUp();
										$("#form-edit-booking").addClass("hidden");
										$("#loader-edit-booking").removeClass("hidden");
									},
									url: '/patient/patient-bookings/edit',
									type: 'POST',
									dataType: 'Text',
									data: $form.serialize(),
									success: function(data){
										if(data==="ok")
										{
											Materialize.toast("Modification réussie",1000);
											$("#edit-booking-abort-trigger").trigger("click");
											window.location.reload();
										}
										else
										{
											Materialize.toast("Erreur Serveur veuillez réessayer",1000);
										}
									},
									complete: function(){
										$("#edit-booking-modal-box .modal-footer").slideDown();
										$("#form-edit-booking").removeClass("hidden");
										$("#loader-edit-booking").addClass("hidden");
									},
									error: function(){alert("Erreur serveur veuillez réessayer");}
								});
							}
							return false;

						});
				},
				complete: function(){
					$("#booking_id").val("");
				}
			});
		});

		//search doctor
		$("#search_doctor").on("keyup",function(){
			$("#search_doctor").removeClass("valid").removeClass("invalid");
			$("#doctor_id").val("");
			$("#search_doctor").css({'background':'transparent'});
		 	$("#search_doctor").removeClass("linked-doctor");
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

		$(".doctor-item").on("click",function(e){
			var $id_doctor = $(this).attr("tag-id");
			var $identity_doctor = $(this).attr("tag");

			$("#search_doctor").val($identity_doctor);
			$("#search_doctor").css({'background':'grey'});
			$("#search_doctor").addClass("linked-doctor");
			$("#doctor_id").val($id_doctor);
			$("#search_doctor").removeClass("invalid").addClass("valid");
		});


				//search doctor edit booking
		$("#search_doctor_edit").on("keyup",function(){
			$("#search_doctor_edit").removeClass("valid").removeClass("invalid");
			$("#doctor_id_edit").val("");
			$("#search_doctor_edit").css({'background':'transparent'});
		 	$("#search_doctor_edit").removeClass("linked-doctor");
  			if($(this).val().length>1)
  			{
				var $tags = $(this).val().toLowerCase().trim();
				$(".doctor-item-edit").each(function(){
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
				$(".doctor-item-edit").removeClass("hidden");
  			}
  			return false;

		});

		$(".doctor-item-edit").on("click",function(e){
			var $id_doctor = $(this).attr("tag-id");
			var $identity_doctor = $(this).attr("tag");

			$("#search_doctor_edit").val($identity_doctor);
			$("#search_doctor_edit").css({'background':'grey'});
			$("#search_doctor_edit").addClass("linked-doctor");
			$("#doctor_id_edit").val($id_doctor);
			$("#search_doctor_edit").removeClass("invalid").addClass("valid");
		});



	//search establishment
		$("#search_institution").on("keyup",function(){
			var $form = $(this).parents("form");
			$(this).removeClass("valid").removeClass("invalid");
			$("#institution_id",$form).val("");
			$(this).css({'background':'transparent'});
		 	$(this).removeClass("linked-doctor");
  			if($(this).val().length>1)
  			{
				var $tags = $(this).val().toLowerCase().trim();
				$(".institution-item").each(function(){
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
				$(".institution-item").removeClass("hidden");
  			}
  			return false;

		});

	$(".institution-item").on("click",function(e){
		var $form = $(this).parents("form");
		var $id_institution = $(this).attr("tag-id");
		var $fullname_institution = $(this).attr("tag");

		$("#search_institution",$form).val($fullname_institution);
		$("#search_institution",$form).css({'background':'grey'});
		$("#search_institution",$form).addClass("linked-doctor");
		$("#institution_id",$form).val($id_institution);
		$("#search_institution",$form).removeClass("invalid").addClass("valid");
	});

		//search establishment edit booking
		$("#search_institution_edit").on("keyup",function(){
			var $form = $(this).parents("form");
			$(this).removeClass("valid").removeClass("invalid");
			$("#institution_id_edit",$form).val("");
			$(this).css({'background':'transparent'});
		 	$(this).removeClass("linked-doctor");
  			if($(this).val().length>1)
  			{
				var $tags = $(this).val().toLowerCase().trim();
				$(".institution-item").each(function(){
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
				$(".institution-item").removeClass("hidden");
  			}
  			return false;

		});

	$(".institution-item-edit").on("click",function(e){
		var $id_institution = $(this).attr("tag-id");
		var $fullname_institution = $(this).attr("tag");

		$("#search_institution_edit").val($fullname_institution);
		$("#search_institution_edit").css({'background':'grey'});
		$("#search_institution_edit").addClass("linked-doctor");
		$("#institution_id_edit").val($id_institution);
		$("#search_institution_edit").removeClass("invalid").addClass("valid");
	});

	//flush establishement on change


	//form-add-booking
	$("#form-add-booking").on("submit",function(e){
		// e.preventDefault();
		var $isErrorFree = true;
		var $form = $(this);
		$(".add-booking-hidden,.date-add-booking",$form).each(function(){
			var $value = parseInt($(this).val());
			    if(!$value)
			    	$isErrorFree = false;
		});

		if($isErrorFree)
		{
			Materialize.toast("ok",1500);
			// 
			return true;
		}
		else
		{
			Materialize.toast("Veuillez corriger le formulaire",1500);
			return false;
			
		}		

	});


});//finished loading document
