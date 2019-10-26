<li style="margin-right:15px;" class="pointer-opaq tooltipped" id="inbox-bookings-trigger"  data-position="bottom" data-delay="1000" data-tooltip="vous avez <?= $patient_booking_count ?> nouvelle(s) réservation(s)">
   <i class="ion-clipboard white-color" style="display:inline-block;font-size:2.5rem;"></i>
	<a href="#!" class="zero-padding"><span class="badge orange white-text" id="badge_count_booking_patient"><?= $patient_booking_count ?></span> </a>
</li>

     <div class="row special hidden" id="floating-box-inbox-cell-doctor" style="z-index: 100;position: absolute;width: 350px;right: 280px;">
        <div class="white dmp-main-color">
          <div class="card">
           
           <div class="row orange title-card white-text zero-margin" style="padding:5px;">
               <span class="card-title bold"><i class="ion-clipboard small" style="display:inline-block; margin-right:20px;"></i>En attente de validation</span>
            </div>

            <div class="card-content dmp-main-color zero-padding">
            	<div class="row zero-margin" style="height:180px; overflow-y:auto;">
                    <?php if($patient_bookings->isEmpty()) :?>
                        <p class="center bold" style="margin-top:20px;" id="no-booking-content-wrapper">
                            <span class="dmp-main-color"><i class="ion-android-clipboard medium orange-text"></i> Pas de nouvelles réservations</span>
                        </p>
                    <?php else: ?>
                    <ul class="collection zero-margin" id="inbox-content-wrapper">
                     <?php $countdown=0; ?>
                     <?php foreach ($patient_bookings as $booking) :?>

                                <?php $date_booking = new \DateTime($booking->created); ?>      
                                <?php $date_exp_booking = new \DateTime($booking->expected_date_booking); ?>      

                          <li class="collection-item zero-padding bold trigger-booking-patient-info" href="#!" date-created-booking="<?= $date_booking->format('d-m-Y H:i:s'); ?>" full-name-patient="<?= $booking->patient->person->lastname.' '.$booking->patient->person->firstname ?>" full-name-doctor="<?= $booking->doctor->person->lastname.' '.$booking->doctor->person->firstname ?>" id-patient="<?= $booking->patient->id ?>" id-doctor="<?= $booking->doctor->id ?>" id-booking="<?= $booking->id ?>" time-exp-booking="<?= $date_exp_booking->format('H:i') ?>" date-exp-booking="<?= $date_exp_booking->format('Y-m-d') ?>">
                          
                             <div class="col s12 zero-margin zero-padding">
                                <div class="col s3">
                                  <?php if($booking->patient->person->path_pic==null) :?>
                                    <i class="ion-android-contact dmp-grey-text"></i>
                                  <?php else: ?>
                                    <?= $this->Html->image('patient/patient_identity/'.$booking->patient->person->path_pic,['style'=>'width:100%;']) ?> 
                                  <?php endif; ?>   
                                  </div>
                                <div class="col s1">
                                 <p class="dmp-main-back white-text" style="border-radius:50%;width: 22px;margin-top: 30px;text-align: center;">
                                    <?= ++$countdown; ?>
                                 </p>
                                </div>    
                                <div class="col s8">
                                  <p class="patient-name"><?= $booking->patient->person->lastname.' '.$booking->patient->person->firstname ?></p>     
                                  <p class="patient-booking-code right-text">
                                    <?php 
                                        //sexe patient 
                                        if($booking->patient->person->sexe==="M")
                                          $sex_patient = "Homme";
                                        else
                                          $sex_patient = "Femme";
                                        // age patient
                                        $born_date = new \DateTime($booking->patient->person->dateborn);
                                        $diff_born = $born_date->diff(new \DateTime('NOW'));
                                        echo $diff_born->format("%r %Y an(s)")." / ".$sex_patient;
                                     ?>
                                  </p>  
                                  <p class="patient-booking-created">
                                    <?= $booking->patient->person->people_contact->contact1 ?>
                                    <?php if($booking->patient->person->people_contact->contact2) echo " - ".$booking->patient->person->people_contact->contact2;?>
                                  </p>
                                   <p class="patient-institution-care">
                                        <?= $date_booking->format('d-m-Y H:i:s'); ?>
                                   </p>
                                 </div>
                            </div>  
                          </li> 
                        <?php endforeach; ?> 
                    </ul>
                    <?php endif; ?>	

            	</div>

            </div>

            <div class="card-action zero-padding orange white-text bold">
              <a href="#" class="white-text waves-effect waves-red" id="close-floating-modal-trigger">Fermer</a>
              <a href="/manager/patient-bookings" class="white-text right zero-margin" id="close-floating-modal-trigger"> Voir tout</a>
            </div>
          </div>
        </div>
      </div>




<script>
	jQuery(function($){

    		$("#close-floating-modal-trigger").on("click",function(){
    			$("#floating-box-inbox-cell-doctor").addClass("hidden");
    		});

    		$("*").on("click",function(e){

    			var $floatingBox = $("#floating-box-inbox-cell-doctor");

    				if(!($(this).attr("id")===("inbox-bookings-trigger")) && !($(this).parents("div").attr("id")===("floating-box-inbox-cell-doctor")))
    				{
    					$floatingBox.addClass("hidden");
    					$("#inbox-bookings-trigger").removeClass("selected");
    				}
    				else
    				{
    				  if($(this).attr("id")===("inbox-bookings-trigger"))
    				  {
    					$("#inbox-bookings-trigger").toggleClass("selected");

    				  	if(!($(this).hasClass("selected")))
    						$floatingBox.addClass("hidden");
    					else
    						$floatingBox.removeClass("hidden");
    				  }
    				  else
    				  {
    				  	$floatingBox.removeClass("hidden");
    				  }


    					e.stopPropagation();
    				
    					
    				}

    		});

    		$("#close-floating-modal-trigger").on("click",function(e){
    				$("#floating-box-inbox-cell-doctor").addClass("hidden");
    				$("#inbox-bookings-trigger").removeClass("selected");
    				e.stopPropagation();
    		});

    		$("#inbox-content-wrapper li").css('width','100%');
    		$(".collection-item").hover(function(){$(this).addClass("pointer selected-floating-box-item");},function(){$(this).removeClass("pointer selected-floating-box-item");});

            $(".collection-item:odd").addClass("dmp-sub");


      //add Scrpit for modal boxes
      $(".trigger-booking-patient-info").on("click",function()
      {
          //chaing selected line
          $selected_current_line_booking = $(this);
          //info booking
          $('#date_booking_patient').val($(this).attr('date-created-booking'));
          $('#patient_full_booking_info').val($(this).attr('full-name-patient'));
          $('#patient_id_booking').val($(this).attr('id-patient'));
          
          $('#doctor_fullname_booking').val($(this).attr('full-name-doctor'));
          $('#doctor_id_booking_patient').val($(this).attr('id-doctor'))
          
          $('#booking_patient_id').val($(this).attr('id-booking'));

          $('#time_expected_booking_patient').val($(this).attr('time-exp-booking'));
          $('#date_expected_booking_patient').val($(this).attr('date-exp-booking'));
          
            //search linked-visits
            $.get('/manager/visits/all',{'id':$(this).attr('id-patient')},function(data){
                if(data!=='ko')
                {
                  var results = JSON.parse(data);
                  $.each(results,function(index,value){
                      var li_element = $("<li></li>").attr('code-visit',value.code_visit).addClass('item-visit-booking');
                      var anchor_element = $("<a href='#!'></a>").append(value.code_visit).addClass('dmp-grey-text');
                      anchor_element.appendTo(li_element);
                      li_element.unbind('click').bind('click',set_booking_visit);
                      $('#dropdown-visits-booking').append(li_element);
                  });
                  
                }
                else
                {
                  Materialize.toast('Chargement des informations visite échoué veuillez réessayer',1500);
                }
            });

            $("#booking-info-patient-modal").openModal({
     
                ready: function(){

                  $('#visit_meeting_speciality_booking').on('change',function(){
                     var $value = $(this).find('option:checked').text().trim();
                     $('#visit_meeting_speciality_name_booking').val($value);
                  });

                   $("#form-patient-booking-info").unbind('submit').bind('submit',function(){
                      return false;
                   });

                 $('#trigger-validate-booking').unbind('click').bind('click', function(){
                      var $isErrorFree = true;
                      var $form = $("#form-patient-booking-info");
                      $(".chrono_reference_booking_patient",$form).each(function(){
                          if($(this).val()==="")
                              $isErrorFree = false;
                      });

                      $("input.required",$form).each(function(){
                          if(validateElement.isValid(this)==false)
                            $isErrorFree = false;
                      });

                      $("select.required",$form).each(function(){
                        if($(this).find("option:checked").val()==="")
                               $isErrorFree = false;
                      });

                      $(".patient_booking_refrence_info",$form).each(function(){
                           if($(this).val()==="")
                              $isErrorFree = false;
                      });

                      if(!$("#search_visit_booking").hasClass('selected-booking-visit'))
                      {
                        $isErrorFree = false;
                        $(this).addClass('invalid').removeClass('valid');
                        $(this).unbind('blur').bind('blur',checking_search_visit);
                      }


                        if($isErrorFree)
                        {
                          $.ajax({
                            beforeSend: function()
                            {
                              $("#booking-patient-info-form-wrapper").addClass('hidden');
                              $("#loader-booking-patient").removeClass('hidden');
                              $("#booking-info-patient-modal .modal-footer").slideUp('hidden');
                            },
                            url:'/manager/visit-invoices/add-meeting',
                            type:'POST',
                            dataType:'text',
                            data: $form.serialize(),
                            success: function(data)
                            {
                              if(data === 'ko')
                              {
                                Materialize.toast('Une erreur est survenue, veuillez réessayer/contacter le support',1000);
                              }
                              else
                              {
                                window.open(data);
                                $selected_current_line_booking.remove();
                                var $unpaid_invoices = parseInt($('#unpaid-invoices-count').text());
                                $('#unpaid-invoices-count').text($unpaid_invoices+1);

                                var $rest_booking=parseInt($('#badge_count_booking_patient').text());
                                if(($rest_booking-1)!=0)
                                $('#badge_count_booking_patient').text($rest_booking-1);
                                else
                                {
                                  $('#badge_count_booking_patient').text(0);
                                  $('#no-booking-content-wrapper').removeClass('hidden');
                                  $('#inbox-content-wrapper').addClass('hidden');
                                }


                                $('#trigger-close-validate-booking').trigger('click');
                                Materialize.toast('Réservation validée',1500);
                              }
                              console.log(data);
                            },
                            complete: function()
                            {
                              $("#booking-patient-info-form-wrapper").removeClass('hidden');
                              $("#loader-booking-patient").addClass('hidden');
                              $("#booking-info-patient-modal .modal-footer").slideDown('hidden');
                            },
                            error: function(){
                              alert('Erreur serveur, veuillez réessayer.');
                            },

                          });
                        }
                        else
                        {
                          Materialize.toast('Veuillez effectuer les correction nécessaires avant l\'envoi',1000);
                        }
                 });

            },

            complete: function(){
              $("#form-patient-booking-info")[0].reset();
              $('#dropdown-visits-booking').empty();
              $("#search_visit_booking").css({'background':'transparent'});
            },

            dismissible: false

          });
      });

});// end ready document


  function set_booking_visit()
  {
    var $value_visit = $(this).attr('code-visit').trim();
    $("#search_visit_booking").val($value_visit);
    $('#search_visit_booking').addClass('valid').removeClass('invalid');
    $("#search_visit_booking").addClass('selected-booking-visit');
    $("#search_visit_booking").css({'background':'grey'});
    $("#search_visit_booking").on('keyup',function(){
        $(this).removeClass('selected-booking-visit');
         $("#search_visit_booking").css({'background':'transparent'});
         $('#search_visit_booking').addClass('invalid').removeClass('valid');
    });
  }

  function checking_search_visit()
  {
   if(!$(this).hasClass('selected-booking-visit'))
   {
     $(this).addClass('invalid').removeClass('valid');
   }
   else
   {
    $(this).removeClass('invalid').addClass('valid');
   }
  }
</script>