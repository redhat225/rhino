<?php $this->layout='blank'; ?>

		<div class="row item-bills-info-wrapper zero-margin">
				  		<div class="col s12 assets-item-bills-info zero-padding">
		                    <ul class="tabs dmp-main-back switch-bills-section zero-padding">
		                      
		                      <li class="tab col s3"><a class="active dmp-grey-2-text" href="#gestionnaire-table-wrapper">Gestionnaires <i class="ion-ios-refresh right small pointer-opaq dmp-grey-2-text" id="refresh-gestionnaire-info"> </i><?= $this->Html->image('assets_dmp/ajax_loader/loading-mini-white',['class'=>'hidden right','id'=>'bill-info-loader-icon','style'=>'margin-top:4%;']) ?></a></li>
		                      
		                      <li class="tab col s3"><a class="dmp-grey-2-text" href="#doctors-table-wrapper">Medecins <i class="ion-ios-refresh right small pointer-opaq dmp-grey-2-text" id="refresh-doctors-infos"> </i> <?= $this->Html->image('assets_dmp/ajax_loader/loading-mini-white',['class'=>'hidden right','id'=>'visit-info-loader-icon','style'=>'margin-top:4%;']) ?></a></li>
		                      
		                      <li class="tab col s3"><a class="dmp-grey-2-text" href="#auxiliary-table-wrapper">Auxilliaires <i class="ion-ios-refresh right small pointer-opaq dmp-grey-2-text" id="refresh-visits-infos"> </i> <?= $this->Html->image('assets_dmp/ajax_loader/loading-mini-white',['class'=>'hidden right','id'=>'visit-info-loader-icon','style'=>'margin-top:4%;']) ?></a></li>
		                      
		                      <li class="tab col s3"><a class="dmp-grey-2-text" href="#laboratory-table-wrapper">Pharmacie <i class="ion-ios-refresh right small pointer-opaq dmp-grey-2-text"> </i><?= $this->Html->image('assets_dmp/ajax_loader/loading-mini-white',['class'=>'hidden right','id'=>'visit-info-loader-icon','style'=>'margin-top:4%;']) ?></a></li>
		                      
		                      <li class="tab col s3"><a class="dmp-grey-2-text" href="#state-table-wrapper">Laboratoire<i class="ion-ios-refresh right small pointer-opaq dmp-grey-2-text" id="refresh-visits-infos"> </i> <?= $this->Html->image('assets_dmp/ajax_loader/loading-mini-white',['class'=>'hidden right','id'=>'visit-info-loader-icon','style'=>'margin-top:4%;']) ?></a></li>
		                    </ul>
				  		</div>
          </div>


    <div class="row" id="main-content-institution">
              <!-- Facturation - Zone -->
              <div class="row" id="gestionnaire-table-wrapper">
                    <div class="row center hidden" id="empty-bills-info">
                            <i class="ion-ios-filing-outline large red-text"></i>
                            <h5>Aucun Gestionnaire enregistré</h5>
                    </div>
                    <div class="row" id="table-container" style="overflow:auto;height:750px;">
                        <table class="MyTable striped bordered bold centered table-space zero-margin facturation-info-table" cellpadding="0" cellspacing="0" id="gestionnaire-table" style="margin-top:30px;">
                            <thead class="dmp-main-color">
                                <th class="zero-margin zero-padding"><?= __('Photo') ?></th>
                                <th class="zero-margin zero-padding"><?= __('Code') ?></th>
                                <th class="zero-margin zero-padding"><?= __('Nom') ?></th>
                                <th class="zero-margin zero-padding"><?= __('Prenom(s)') ?></th>
                                <th class="zero-margin zero-padding"><?= __('Age') ?></th>
                                <th class="zero-margin zero-padding"><?= __('Sexe') ?></th>
                                <th class="zero-margin zero-padding"><?= __('Contact(s)') ?></th>
                                <th class="zero-margin zero-padding"><?= __('Role') ?></th>
                                <th class="zero-margin zero-padding"><?= __('Voir Fiche') ?></th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="row center hidden" id="loader-gestionnaire-info">
                              <div class="progress dmp-orange-back">
                                  <div class="indeterminate grey"></div>
                              </div>
                            <span class="dmp-main-color">Importation en cours</span>
                        </div>
                    </div>
              </div>


              <div class="row" id="doctors-table-wrapper">
                    <div class="row center hidden" id="empty-visits-info">
                            <i class="ion-ios-filing-outline large red-text"></i>
                            <h5>Aucune Visite Disponible</h5>
                    </div>
                        <div class="row" id="table-container-doctors-institutions-info" style="overflow:auto;height:750px;">
                            <table class="MyTable striped bordered bold centered table-space zero-margin facturation-info-table" cellpadding="0" cellspacing="0" id="doctors-institutions-info-table" style="margin-top:30px;">
                                <thead class="dmp-main-color">
	                                <th class="zero-margin zero-padding"><?= __('Photo') ?></th>
	                                <th class="zero-margin zero-padding"><?= __('Code') ?></th>
	                                <th class="zero-margin zero-padding"><?= __('Nom') ?></th>
	                                <th class="zero-margin zero-padding"><?= __('Prenom(s)') ?></th>
	                                <th class="zero-margin zero-padding"><?= __('Age') ?></th>
	                                <th class="zero-margin zero-padding"><?= __('Sexe') ?></th>
	                                <th class="zero-margin zero-padding"><?= __('Contact(s)') ?></th>
	                                <th class="zero-margin zero-padding"><?= __('Voir Fiche') ?></th>
                                </thead>
                                <tbody changed="1">

                                </tbody>
                            </table>
                        <div class="row center hidden loader">
                              <div class="progress dmp-orange-back">
                                  <div class="indeterminate grey"></div>
                              </div>
                            <span class="dmp-orange-text light">Importation en cours</span>
                        </div>
                    </div>
               </div>
    </div>




<script>
	$('ul.tabs').tabs();

	$('#refresh-gestionnaire-info').on('click',function(){
		$.ajax({
			beforeSend: function(){
				$('#gestionnaire-table').addClass('hidden');
				$('#gestionnaire-table tbody').empty();
				$('#loader-gestionnaire-info').removeClass('hidden');
			},
			type:'GET',
			url:'/manager/institutions/getOperators',
			dataType:'text',
			success: function(data){
				if(data)
				{
					var results = JSON.parse(data);

				$.each(results, function(index,value){
					var $tr_element = $("<tr class='visit-item dmp-grey-text zero-padding'></tr>");			 	    

			   		for(var i=1; i<=9;i++)
			   		{
			   			var $td_element = $("<td class='zero-padding light-mixed-text'></td>");
			   			$tr_element.append($td_element);
			   		}

			   		if(value.person.path_pic)
			   		{
			   			var $pic_element = $('<img>').attr('src','/webroot/img/manager/'+value.institution.slug+'/manager_identity/'+value.person.path_pic)
			   											.attr('style','width:90px;');
			   		}
			   		else
			   		{
			   			var $pic_element = $('<i class="ion-ios-contact-outline medium dmp-grey-2-text"></i>');
			   		}
 				    $tr_element.find('td:eq(0)').append($pic_element);
 				    $tr_element.find('td:eq(1)').append(value.code);
 				    $tr_element.find('td:eq(2)').append(value.person.lastname);
 				    $tr_element.find('td:eq(3)').append(value.person.firstname);

 				    var actual_date = new Date();

 				    var $age = Math.abs(actual_date.getFullYear()-parseInt(value.person.dateborn));
 				    $tr_element.find('td:eq(4)').append($age>1?$age+' ans':$age+' an');


 				    switch(value.person.sexe)
 				    {
 				    	case 'M':
 				    		var $sexe_patient = 'Homme';						
 				    	break;


 				    	case 'F':
 				    		var $sexe_patient = 'Femme';						
 				    	break;
 				    }
 				    $tr_element.find('td:eq(5)').append($sexe_patient);
 				    if(value.person.people_contact.contact2)
 				       $tr_element.find('td:eq(6)').append(value.person.people_contact.contact1+' '+value.person.people_contact.contact2);
 		     		else
 				       $tr_element.find('td:eq(6)').append(value.person.people_contact.contact1);

 				    var $list_patient_icon = $('<i role="manager" class="ion-android-list medium dmp-main-color pointer-opaq"></i>').attr('people-id',value.person.id);
 				    $list_patient_icon.unbind('click').bind('click',showPeopleInfos);
 				        $tr_element.find('td:eq(8)').append($list_patient_icon);


					$tr_element.find('td:eq(7)').html('&nbsp;');
 				   	

 				    // $tr_element.find('td:eq(0)').append($pic_element);

					// $('$patient_table')
					$('#gestionnaire-table tbody').append($tr_element);

				});
				}
			},
			complete: function(){
				$('#gestionnaire-table').removeClass('hidden');
				$('#loader-gestionnaire-info').addClass('hidden');

			},
			error: function(){
				alert('Une erreur est survenue lors de l\'opération, veuillez réessayer');
			}
		});
	});


	$('#refresh-doctors-infos').on('click',function(){
		$.ajax({
			beforeSend: function(){
				$('#doctors-institutions-info-table').addClass('hidden');
				$('#doctors-institutions-info-table tbody').empty();
				$('#table-container-doctors-institutions-info .loader').removeClass('hidden');
			},
			type:'GET',
			url:'/manager/institutions/getDoctors',
			dataType:'text',
			success: function(data){
				if(data)
				{
					var results = JSON.parse(data);

				$.each(results, function(index,value){
					var $tr_element = $("<tr class='visit-item dmp-grey-text zero-padding'></tr>");			 	    

			   		for(var i=1; i<=8;i++)
			   		{
			   			var $td_element = $("<td class='zero-padding light-mixed-text'></td>");
			   			$tr_element.append($td_element);
			   		}

			   		if(value.person.path_pic)
			   		{
			   			var $pic_element = $('<img>').attr('src','/webroot/img/doctor/doctor_identity/'+value.person.path_pic)
			   											.attr('style','width:90px;');
			   		}
			   		else
			   		{
			   			var $pic_element = $('<i class="ion-ios-contact-outline medium dmp-grey-2-text"></i>');
			   		}
 				    $tr_element.find('td:eq(0)').append($pic_element);
 				    $tr_element.find('td:eq(1)').append(value.code);
 				    $tr_element.find('td:eq(2)').append(value.person.lastname);
 				    $tr_element.find('td:eq(3)').append(value.person.firstname);

 				    var actual_date = new Date();

 				    var $age = Math.abs(actual_date.getFullYear()-parseInt(value.person.dateborn));
 				    $tr_element.find('td:eq(4)').append($age>1?$age+' ans':$age+' an');


 				    switch(value.person.sexe)
 				    {
 				    	case 'M':
 				    		var $sexe_patient = 'Homme';						
 				    	break;


 				    	case 'F':
 				    		var $sexe_patient = 'Femme';						
 				    	break;
 				    }
 				    $tr_element.find('td:eq(5)').append($sexe_patient);
 				    if(value.person.people_contact.contact2)
 				       $tr_element.find('td:eq(6)').append(value.person.people_contact.contact1+' '+value.person.people_contact.contact2);
 		     		else
 				       $tr_element.find('td:eq(6)').append(value.person.people_contact.contact1);

 				    var $list_patient_icon = $('<i role="medecin" class="ion-android-list medium dmp-main-color pointer-opaq"></i>').attr('people-id',value.person.id);
 				    $list_patient_icon.unbind('click').bind('click',showPeopleInfos);
 				        $tr_element.find('td:eq(7)').append($list_patient_icon);

					$('#doctors-institutions-info-table tbody').append($tr_element);

				});
				}
			},
			complete: function(){
				$('#doctors-institutions-info-table').removeClass('hidden');
				$('#table-container-doctors-institutions-info .loader').addClass('hidden');
			},
			error: function(){
				alert('Une erreur est survenue lors de l\'opération, veuillez réessayer');
			}
		});
	});

	$('#refresh-doctors-infos').trigger('click');

	$('#refresh-gestionnaire-info').trigger('click');
</script>