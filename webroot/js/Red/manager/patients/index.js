jQuery(function($){
	getPatientInfo();
});



function getPatientInfo()
{
	var $patient_table = $('#table-container-patients-info-table');



	$.ajax({
		beforeSend: function(){	$('.loader',$patient_table).removeClass('hidden');
		$('#table-container-patients-info-table table tbody').empty();
		},
		type:'GET',
		url:'/manager/patients/all',
		dataType:'text',
		success: function(data)
		{
			if(data==='ko')
			{
				Materialize.toast('Aucune patient n\'est enregistré dans la base',2000);
			}
			else
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
			   			var $pic_element = $('<img>').attr('src','/webroot/img/patient/patient_identity/'+value.person.path_pic)
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

 				    var $age = Math.abs(actual_date.getFullYear()-parseInt(value.person.formatted_dateborn));
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

 				    var $list_patient_icon = $('<i role="patient" class="ion-android-list medium dmp-main-color pointer-opaq"></i>').attr('people-id',value.person.id);
 				    $list_patient_icon.unbind('click').bind('click',showPeopleInfos);
 				        $tr_element.find('td:eq(7)').append($list_patient_icon);

 				   	

 				    // $tr_element.find('td:eq(0)').append($pic_element);

					// $('$patient_table')
					$('#table-container-patients-info-table table tbody').append($tr_element);

				});

			}
		},
		complete: function(){
			$('.loader',$patient_table).addClass('hidden');
		},
		error:function(){alert('Une erreur est survenue lors de l\opération, veuillez réessayer');}
	});


}
