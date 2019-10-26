<div class="row dmp-main-back-darkened hidden" id="floating-box-doctor" style="position:absolute;top:0px;left:0px;width:99.8%;height:1200px;opacity:0.965;border:2px solid #dc6b1d;overflow:auto;" doctor-id='0'>
                  <div class="row zero-margin zero-padding" id="content-floating-box-doctor">
                        <div class="row zero-margin" id="doctor-main-info" style="border-bottom:1.3px solid #dc6b1d;">
                          <div class="col s2 doctor-api-variable-info reducable-content" id="doctor-evidence-search-single">

                          </div>
                          <div class="col s5 reducable-content">
                              <p class="dmp-grey-2-text">
                                  <span id="fullname_doctor_selected" class="bold doctor-api-variable-info" style="font-size:17px;"></span> <br>
                                  <span id="age_doctor_selected_single" class="doctor-api-variable-info"></span> <br>
                                  <span id="sexe_doctor_selected_single" class="doctor-api-variable-info"></span> <br>
                                  <span id="nationality_doctor_selected_single" class="doctor-api-variable-info"></span> <br>
                                  <span id='contact_single_doctor' class="doctor-api-variable-info"></span> <br>
                              </p>
                          </div>
                          <div class="col s3 reducable-content">  
                              <p class="dmp-grey-2-text">
                                   <span id="adress_1_doctor_selected_single" class="doctor-api-variable-info"></span> <br>
                                   <span id="adress_2_doctor_selected_single" class="doctor-api-variable-info"></span> <br>
                                   <span id="adress_3_doctor_selected_single" class="doctor-api-variable-info"></span> <br>
                              </p>
                          </div>
                          <div class="col s2" id="closer-floating-box-doctor-wrapper">
                            
                          <i class="ion-ios-refresh-outline small right close-floating-box-trigger tooltipped" data-tooltip='Rafraîchir' data-delay='5s' data-position="left" id="refresh-floating-box-doctor-trigger"></i>
                            <i class="ion-ios-close-outline small right close-floating-box-trigger tooltipped" data-tooltip='fermer' data-delay='5s' data-position="left" id="close-floating-box-doctor-trigger"></i>
                             <i class="ion-ios-minus-outline small right reduced-floating-box-trigger tooltipped" data-tooltip="réduire" data-delay='5s' data-position="left" id="reduced-floating-box-doctor-trigger"></i>

                          </div>
                      </div>
    
                      <div class="row zero-margin reducable-content" id="doctors-info-wrapper" >
                              <ul class="tabs tabs-fixed-width dmp-main-back-darkened darkened-tabs custom-overflowed-tabs"  ref="#floating-box-doctor" style="border-bottom:1px solid #dc6b1d;">
                                <li class="tab col s4" ref="#doctor-interventions-info-single"><a class="dmp-grey-2-text" href="#doctor-bill-search-doctor-single">Interventions</a></li>
                                <li class="tab col s4" ref="#doctor-speciality-table-wrapper"><a class="dmp-grey-2-text" href="#doctor-alt-search-doctor-single">Spécialités <i class="right ion-ios-plus small dmp-grey-2-text pointer-opaq" id="add-doctor-speciality-floating" doctor-id='0' style="margin-right:8px;"></i></a></li>
                                <li class="tab col s4" ref="#doctor-single-state-table-wrapper"><a class="dmp-grey-2-text" href="#doctor-alt-search-doctor-single">Etats</a></li>
                                <li class="tab col s4" ref="#doctor-notifications-table-wrapper"><a class="dmp-grey-2-text" href="#doctor-alt-search-doctor-single">Notifications</a></li>
                              </ul>
                      </div>


                      <div class="section zero-padding reducable-content custom-overflowed-tabs-content" id="doctor-interventions-info-single" style="padding:10px;">
                        <div class="row" id="table-container" style="overflow:auto; height:850px;">
                            <table class="MyTable floating-striped bordered bold centered table-space zero-margin facturation-info-table" cellpadding="0" cellspacing="0" id="doctor-invoice-info-single-table" style="margin-top:30px;">
                                <thead class="dmp-main-back blue-text">
                                    <th class="zero-margin zero-padding"><?= __('Code Visite') ?></th>
                                    <th class="zero-margin zero-padding"><?= __('Date Création') ?></th>
                                    <th class="zero-margin zero-padding"><?= __('Date Prévue Intervention') ?></th>
                                    <th class="zero-margin zero-padding"><?= __('Date Intervention') ?></th>
                                    <th class="zero-margin zero-padding"><?= __('Etat Courant') ?></th>
                                    <th class="zero-margin zero-padding"><?= __('Patient') ?></th>
                                    <th class="zero-margin zero-padding"><?= __('Actes') ?></th>
                                    <th class="zero-margin zero-padding"><?= __('Facture') ?></th>
                                    <th class="zero-margin zero-padding"><?= __('Action') ?></th>
                                </thead>
                                <tbody class="doctor-api-variable-info">

                                </tbody>
                            </table>
                        </div>
                      </div> 


                    <div class="section zero-padding reducable-content custom-overflowed-tabs-content" id="doctor-speciality-table-wrapper" style="padding:10px;">
                          <div class="row" id="table-container" style="overflow:auto; height:850px;">
                              <ul class="collection zero-margin custom-floating-collection doctor-api-variable-info" id="specialities-doctor-floating-list" style="border-top:0px;">

                              </ul>
                          </div>
                          <div class="row center hidden">
                              <p class="dmp-grey-2-text">
                                 <h5>Aucune visite enregistrée</h5>
                                 <i class="ion-ios-filing-outline large dmp-grey-2-text">
                                    
                                 </i>
                              </p>
                          </div>
                     </div> 

                      <div class="row reducable-content custom-overflowed-tabs-content" id="doctor-single-booking-visits-table-wrapper">
                                <div class="row center hidden" id="empty-visits-info">
                                        <i class="ion-ios-filing-outline large red-text"></i>
                                        <h5>Aucune réservation disponible</h5>
                
                                </div>
                                 <div class="row" id="table-container" style="overflow:auto;height:800px;">
                                        <table class="MyTable floating-striped striped bordered bold centered table-space zero-margin facturation-info-table" cellpadding="0" cellspacing="0" id="doctor-visits-single-info-table" style="margin-top:30px;">
                                            <thead class="dmp-main-back blue-text">
                                                <th class="zero-padding"><?= __('Code Réservation') ?></th>
                                                <th class="zero-padding"><?= __('Code Visite') ?></th>
                                                <th class="zero-padding"><?= __('Date Réservation') ?></th>
                                                <th class="zero-padding"><?= __('Specialité') ?></th>
                                                <th class="zero-padding"><?= __('Praticien') ?></th>
                                                <th class="zero-padding"><?= __('Etat') ?></th>
                                                <th class="zero-padding"><?= __('Action') ?></th>
                                            </thead>
                                            <tbody class="doctor-api-variable-info">

                                            </tbody>
                                        </table>
                                </div>
                         </div>


                         <div class="row reducable-content custom-overflowed-tabs-content" id="doctor-single-complementary-table-wrapper">
                           
                         </div>

                      <div class="row hidden center error-loader-people" style="margin-top:30%;">
                        <i class="ion-android-people large white-text"></i>
                        <h6 class="dmp-grey-3-text">Une érreur est survenue, veuilez réessayer</h6>
                      </div>

                    </div>


                    <div class="row hidden center loader-people" style="margin-top:30%;" id="loader-floating-box-doctor">
                        <?= $this->Html->image('assets_dmp/ajax_loader/loading-mini-orange-darkened.gif') ?>
                    </div>

                </div>


          <!-- Modal Structure add a new speciality -->
          <div id="add-speciality-doctor-modal" class="modal modal-fixed-footer">
            <div class="modal-content zero-padding">
                    <div class="row dmp-main-back dmp-grey-2-text" style="padding:8px;">
                        <span><i class="ion-plus-round dmp-grey-2-text"></i>    Définir une nouvelle spécialité</span>
                    </div>
                    <div class="row" style="padding:40px;" id="add-speciality-floating-wrapper-content">
                        <form id="add-speciality-form">
                            <select name="speciality_select" class="" multiple>
                                 <?php foreach($specialities as $speciality) :?>
                                      <option value="<?= $speciality->id ?>"><?= $speciality->libelle ?></option>
                                 <?php endforeach; ?>
                            </select>
                            <input type="hidden" name='doctor_id' id='doctor_id_add_speciality_floating_input' value="0">
                        </form>
                        <div class="row center hidden loader">
                                <div class="progress dmp-orange-back">
                                    <div class="indeterminate grey"></div>
                                </div>
                              <span class="dmp-main-color">Enregistrement en cours</span>
                        </div>
                    </div>

            </div>
            <div class="modal-footer dmp-main-back">
              <a href="#!" class="waves-effect waves-green btn-flat left white-text" id="trigger-submit-modal-add-speciality">Valider</a>
              <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat right white-text" id="close-modal-add-speciality">Annuler</a>
            </div>
          </div>
<script>

var $doctor_floating_box = $('#floating-box-doctor');

  $('#close-floating-box-doctor-trigger').on('click',function(){
    $('#floating-box-doctor').addClass('hidden');
    $('#floating-box-doctor').removeClass('used');
    $('#closer-floating-box-doctor-wrapper').removeClass('right');
    $('#reduced-floating-box-doctor-trigger').removeClass('ion-ios-plus-outline').addClass('ion-ios-minus-outline');
    $('#reduced-floating-box-doctor-trigger').attr('data-tooltip','Réduire');
    $('#floating-box-doctor').css({'height':'650px'});
    $('.reducable-content').removeClass('hidden');
    $('#floating-box-doctor').attr('doctor-id','0');

        if($('#close-floating-box-doctor-trigger').hasClass('ion-ios-plus-outline'))
            $('#close-floating-box-doctor-trigger').trigger('click');
  }); 

  $('#reduced-floating-box-doctor-trigger').on('click',function(){
    if($(this).hasClass('ion-ios-minus-outline'))
    {

      if($('#error-conatiner-floating-box-doctor').hasClass('hidden'))
              $('.reducable-content').addClass('hidden');

      $('#closer-floating-box-doctor-wrapper').addClass('right');
      $(this).removeClass('ion-ios-minus-outline').addClass('ion-ios-plus-outline');
      $(this).attr('data-tooltip','Dérouler');
      $('#floating-box-doctor').css({'height':'50px'});
      $('.reducable-content',$doctor_floating_box).addClass('hidden');
    }
    else
    {
      if($('#error-conatiner-floating-box-doctor').hasClass('hidden'))
      {
           $('#closer-floating-box-doctor-wrapper').removeClass('right');
      }



      $('#closer-floating-box-doctor-wrapper').removeClass('right');
      $(this).removeClass('ion-ios-plus-outline').addClass('ion-ios-minus-outline');
      $(this).attr('data-tooltip','Réduire');
      $('#floating-box-doctor').css({'height':'1200px'});

            $('.reducable-content',$doctor_floating_box).removeClass('hidden');
      var $current_selected_tabs= $('#doctors-info-wrapper li a.active').parent().index();
      $('.custom-overflowed-tabs li:eq('+$current_selected_tabs+')',$doctor_floating_box).trigger('click');

    }

  });

  $('#refresh-floating-box-doctor-trigger').on('click',function(){
      var doctor_id = $doctor_floating_box.attr('doctor-id');

      $.ajax({
          beforeSend:function(){
            $doctor_floating_box.removeClass('hidden');
            $('#closer-floating-box-doctor-wrapper',$doctor_floating_box).addClass('right');
            $('.doctor-api-variable-info',$doctor_floating_box).empty();
            $('.reducable-content',$doctor_floating_box).addClass('hidden');
            $('.loader-people',$doctor_floating_box).removeClass('hidden');
          },
          type:'GET',
          url:'/manager/doctors/search-single',
          data:'people-id='+doctor_id,
          success: function(data){
              if(data!=='ko')
              {
               var results = JSON.parse(data);

                showDoctorInfo(results);
              }
          },
          complete: function(){
            $('.loader-people',$doctor_floating_box).addClass('hidden');
          },
          error: function(){alert('Une erreur est survenue , veuilez réessayer');}

      });
  });
  $('#add-speciality-form').on('submit',function(e){
      e.preventDefault();
  });

  $('#add-doctor-speciality-floating').on('click',function(){
    $('#doctor_id_add_speciality_floating_input').val($(this).attr('doctor-id'));
    $('#add-speciality-doctor-modal').openModal({
        ready: function(){
            $('#trigger-submit-modal-add-speciality').unbind('click').bind('click',function(){
                var $form = $('#add-speciality-form');
                var $isErrorFree = true;

                if($('#add-speciality-form select option:checked').length==0)
                {
                  Materialize.toast('Veuilez spécifier au moins une spécialité à ajouter',2000);
                  $isErrorFree = false;
                }

                if($isErrorFree)
                {
                  $.ajax({
                      beforeSend: function(){
                        $form.addClass('hidden');
                        $('#add-speciality-doctor-modal .modal-footer').slideUp();
                        $('#add-speciality-floating-wrapper-content .loader').removeClass('hidden');
                      },
                      url:'/manager/doctor-specialities/add-speciality',
                      dataType:'Text',
                      type:'POST',
                      data: 'specialities='+$('#add-speciality-form select').val()+'&doctor-id='+$('#doctor_id_add_speciality_floating_input').val(),
                      success: function(data){
                          if(data==='ok')
                          {
                            Materialize.toast('Spécialité(s) ajoutée(s) avec succès',2000);
                            $('#refresh-floating-box-doctor-trigger').trigger('click');
                            $('#close-modal-add-speciality').trigger('click');
                          }
                          else if(data==='already')
                          {
                            Materialize.toast('Ces(tte) spécialité(s) est déja attribuée à ce praticien',2000);
                          }
                          else
                          {
                            Materialize.toast('Une erreur est survenue lors de l\'opération, veuillez réessayer/contactez le support',2000);
                          }
                      },
                      complete: function(){
                        $form.removeClass('hidden');
                        $('#add-speciality-floating-wrapper-content .loader').addClass('hidden');
                        $('#add-speciality-doctor-modal .modal-footer').slideDown();
                        
                      },
                      error: function(){

                      }
                  });
                }
                else
                  return false;

            });
        },
        complete: function(){
          $('#doctor_id_add_speciality_floating_input').val('0');
          $('#add-speciality-form')[0].reset();
        }
    });
  });

</script>
