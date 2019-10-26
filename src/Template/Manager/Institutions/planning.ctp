<?php $this->layout('blank') ?>
<?= $this->Html->css('../js/fullcalendar-scheduler-1.4.0/lib/fullcalendar.min') ?>
<?= $this->Html->css('../js/fullcalendar-scheduler-1.4.0/scheduler.min') ?>
			

<div class="row" style="padding:10px;">
   <div class="row" id='calendar-wrapper'>
		<div class="col s9 zero-padding">
			<div class="row" id="calendar">
			</div>
		</div>
		<div class="col s3 zero-padding">
		    <div class="col s12 zero-padding left-align" style="position:relative;">
			  		<i class="dropdown-button btn ion-android-calendar small dmp-main-back white-text tooltipped" data-tooltip="Créer un evennement" data-delay="5s" data-position="left" id="event-generator-trigger" style="padding:0px 13px; border-radius:0px; margin-right:5px" ></i>

			  		<i class="dropdown-button btn ion-android-sync small dmp-main-back white-text tooltipped waves-green" data-tooltip="Régénerer le calendrier" data-delay="5s" data-position="left" id="calendar-regen-trigger"  style="padding:0px 13px; border-radius:0px; margin-right:5px"></i>


			  		<i class="dropdown-button btn ion-information-circled small dmp-main-back white-text tooltipped waves-green" data-tooltip="Légende" data-delay="5s" data-position="left" id="legend-calendar-trigger"  style="padding:0px 13px; border-radius:0px; margin-right:5px;"></i>
		    </div>

		    <div class="col s12 event-viewer zero-padding dmp-main-back zero-padding" style="margin-top:37px; border:1px dotted white; padding:5px;">
		    			<h6 class="dmp-grey-2-text center zero-margin" style="padding:3px; border-bottom:1.9px dotted orange;">Panneau de visualisation</h6>
		    			<div class="col s12 dmp-grey-2-text calendar-quick-viewer">	
							<div class="col s3 zero-padding"><i class="ion-ios-list small white-text dmp-orange-text tooltipped" data-tooltip='Descriptif'></i></div> <div class="col s9 event-description zero-padding dmp-grey-2-text"></div>
		    			</div>

		    			<div class="col s12 dmp-grey-2-text calendar-quick-viewer" style="position:relative;">	
							<i class="ion-ios-play dmp-orange-text small tooltipped" data-tooltip='Début' style="font-size:2.9rem;"></i> <span class="begin-date-info" style="margin-left:35px;position:absolute; top:22px;"></span>
		    			</div>

		    			<div class="col s12 dmp-grey-2-text calendar-quick-viewer" style="position:relative;">	
							<i class="ion-stop dmp-orange-text small tooltipped" data-tooltip='Fin'></i> <span class="end-date-info" style="margin-left:35px;position:absolute; top:10px;"></span>
		    			</div>
		    				<div class="col s12 center zero-padding dmp-orange-back calendar-quick-viewer">	
							<button class="btn-flat dmp-orange-back white-text center" id="event-supressor" event-id="0">Supprimer</button>
		    			</div>

		    			<div class="col s12 loader-ajax center hidden" style="padding:40px 0px;">
		    				<?= $this->Html->image('assets_dmp/ajax_loader/loading-mini-orange')  ?>
		    			</div>
		    </div>

		</div>
   </div>

   <div class="row calendar-loader hidden center">
   		<?= $this->Html->image('assets_dmp/ajax_loader/loader-orange',['style'=>'margin-top:30%;']) ?>
   </div>

</div>
<!-- Legend Calendar -->
 <!-- Modal Structure -->
  <div id="legend-calendar" class="modal">
    <div class="modal-content zero-padding">
		<div class="row dmp-main-back">
			<h6 class="light zero-margin dmp-grey-2-text" style="padding:10px;">Légende</h6>
		</div>

	    <div class="row">
	    	
	    </div>

    </div>
  </div>


<!-- create an event modal box -->
  <!-- Modal Structure -->
  <div id="modal-create-event" class="modal modal-fixed-footer">
    <div class="modal-content zero-padding">
		 <div class="row" style="padding:0px 80px;">
		 		<form id="event-create-form">
		 				<div class="col s12 input-field">
		 			     	 <i class="ion-android-textsms small prefix"></i>
		 					 <input type="text" name="schedule_title" id="schedule_title" class="required" required>
		 					 <label for="schedule_title">Titre</label>
		 				</div>
		
						<h6 class="bold dmp-main-color">Début</h6>
						<div class="row">
							<div class="col s6 input-field">
								<input type="date" name="schedule_start_part1" id="schedule_start_part1" required>
							</div>						
							<div class="col s6 input-field">
								<input type="time" name="schedule_start_part2" id="schedule_start_part2" required>
							</div>
						</div>


						<h6 class="bold dmp-main-color">Fin (Optionnel)</h6>
						<div class="row">
							<div class="col s6 input-field">
								<input type="date" name="schedule_end_part1" id="schedule_end_part1">
							</div>						
							<div class="col s6 input-field">
								<input type="time" name="schedule_end_part2" id="schedule_end_part2">
							</div>
						</div>
						<input type="hidden" name='state-operation' value="add">
		 		</form>

                <div class="row center hidden loader" style="margin-top:30%;">
                      <div class="progress dmp-orange-back">
                          <div class="indeterminate grey"></div>
                      </div>
                      <span class="dmp-main-color">Enregistrement en cours</span>
                </div>
		 </div>
    </div>
    <div class="modal-footer dmp-main-back">
      <a href="#!" class=" waves-effect waves-green btn-flat white-text right" id="create-event-trigger">Créer</a>
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat white-text left" id="cancel-create-event">Annuler</a>
    </div>
  </div>
          





<?= $this->Html->script("fullcalendar-scheduler-1.4.0/lib/moment.min") ?>
<?= $this->Html->script("fullcalendar-scheduler-1.4.0/lib/fullcalendar.min") ?>
<?= $this->Html->script("fullcalendar-scheduler-1.4.0/scheduler.min") ?>
<!-- locale -->
<?= $this->Html->script('fullcalendar-scheduler-1.4.0/locale/fr-ca') ?>
<script>

$('#legend-calendar-trigger').on('click',function(){
	$('#legend-calendar').openModal();
});


	$('#calendar').fullCalendar({
		  header : {
            left : 'title',
            center: 'prevYear nextYear month agendaWeek timelineMonth listMonth',
            right:  ''
          },
		  displayEventTime:true,
		  selectable:true,
		  select: function(start, end, jsEvent, view){
		  		storeEventSelection(start,end);
		  },
		  unselect: function(view, jsEvent){
		  		if(view.target.id!=='event-generator-trigger')
		  		{
		  			clearEventSelection();
		  		}
		  },
		  eventMouseover: function(event, jsEvent, view){
		  		$('.event-description').text(event.title);
		  		var $date_parser = frenchParser(event.start, event.end);
		  		$('.begin-date-info').text($date_parser[0]+' '+$date_parser[1]);
				$('.end-date-info').text($date_parser[2]+' '+$date_parser[3]);
				$('#event-supressor').attr('event-id',event.id);
		  },
          nowIndicator : true,
          navLinks :true,
          selectHelper:true,
          theme: true,
		  eventDrop: function(event, delta, revertFunc, jsEvent, ui, view){
		  		updateCalendar(event);
		  },
		  eventResize:function(event, delta, revertFunc, jsEvent, ui, view){
		  	    updateCalendar(event);
		  },
          schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
          //events indicators
		  events: function(start, end, timezone, callback) {
		        $.ajax({
		        	beforeSend:function(){
						// $('.calendar-loader').removeClass('hidden');
		        	},
		            url: '/manager/institutions/planning',
		            type:'get',
		            data:{'get_institution_planning':true},
		            dataType: 'json',
		            success: function(doc) {
		                var events = [];
		                $.each(doc,function(index, value){
		                	//setting some extra values
		                	var color_schedule ='';
		                	switch(value.schedule_type)
		                	{
		                		case 'booking':
									color_schedule = 'green';
		                		break;

		                		case 'meeting':
									color_schedule = 'blue';
		                		break;

		                		case 'programmation':
		                			color_schedule = '#dc6b1d';
		                		break;
		                	}

		                	if(value.repeated===0)
		                		var is_repeated = false;
		                	else
		                		var is_repeated = true;

		                	if(value.editable===1)
		                		var is_editable = true;
		                	else
		                		var is_editable =false;

		                    events.push({
		                    		id:value.id,
		                        title: value.schedule_title,
		                        start: value.schedule_start,
		                          end: value.schedule_end,
		                        color: color_schedule,
		                       allDay: is_repeated,
		                       editable:is_editable,
		                       dragScroll:is_editable
		                    });
		                });

		                callback(events);
		            },
		            complete: function(){
						// $('#calendar-wrapper').slideDown();
						// $('.calendar-loader').addClass('hidden');
		            }
		        });
			}

	});

	function updateCalendar($event)
	{
		var $date_parser = dateParser($event.start, $event.end);
		var $schedule_start = $date_parser[0]+' '+$date_parser[1]+':00';
		var $schedule_end = $date_parser[2]+' '+$date_parser[3]+':00';
		var $event_id = parseInt($event.id);

		$.post('/manager/institutions/planning',{'id':$event_id,'schedule_start':$schedule_start,'schedule_end':$schedule_end,'state-operation':'event-drop'},function(data){
				if(data==='ko')
					Materialize.toast('La replanification a échouée, veuillez réessayer',2000,'notification-back-color2');

		});
	}

	function clearEventSelection(){
	   	$('#event-create-form')[0].reset();	
	}

	function dateParser($start_date, $end_date)
	{
		var $start_date = new Date($start_date);
		var $end_date = new Date($end_date);
		//formatting first part start/end

		//formatting start/end month
		if(($start_date.getMonth()+1)<10)
			var $formatted_start_month = '0'+($start_date.getMonth()+1);
		else
			var $formatted_start_month = ($start_date.getMonth()+1);

		if(($end_date.getMonth()+1)<10)
			var $formatted_end_month = '0'+($end_date.getMonth()+1);
		else
			var $formatted_end_month = ($end_date.getMonth()+1);

		//formatting days
		if($start_date.getDate()<10)
			var $formatted_start_date = '0'+$start_date.getDate();
		else
			var $formatted_start_date = $start_date.getDate();

		if($end_date.getDate()<10)
			var $formatted_end_date = '0'+$end_date.getDate();
		else
			var $formatted_end_date = $end_date.getDate();

		//formatting second part start/end
		if($start_date.getMinutes()<10)
			var $formatted_start_minutes = '0'+$start_date.getMinutes();
		else
			var $formatted_start_minutes = $start_date.getMinutes();

		if($start_date.getHours()<10)
			var $formatted_start_hours = '0'+$start_date.getHours();
		else
			var $formatted_start_hours = $start_date.getHours();


		if($end_date.getMinutes()<10)
			var $formatted_end_minutes = '0'+$end_date.getMinutes();
		else
			var $formatted_end_minutes = $end_date.getMinutes();

		if($end_date.getHours()<10)
			var $formatted_end_hours = '0'+$end_date.getHours();
		else
			var $formatted_end_hours = $end_date.getHours();			

		var $formatted_start_date_part_1 = $start_date.getFullYear()+'-'+$formatted_start_month+'-'+$formatted_start_date;
		var $formatted_start_date_part_2 =$formatted_start_hours+':'+$formatted_start_minutes;
		
		var $formatted_end_date_part_1 = $end_date.getFullYear()+'-'+$formatted_end_month+'-'+$formatted_end_date;
		var $formatted_end_date_part_2 = $formatted_end_hours+':'+$formatted_end_minutes;

		var $array = [$formatted_start_date_part_1,$formatted_start_date_part_2,$formatted_end_date_part_1,$formatted_end_date_part_2];

		return $array;
	}

	function frenchParser($start_date, $end_date)
	{
			var $start_date = new Date($start_date);
			var $end_date = new Date($end_date);
			//formatting first part start/end

			//formatting start/end month
			if(($start_date.getMonth()+1)<10)
				var $formatted_start_month = '0'+($start_date.getMonth()+1);
			else
				var $formatted_start_month = ($start_date.getMonth()+1);

			if(($end_date.getMonth()+1)<10)
				var $formatted_end_month = '0'+($end_date.getMonth()+1);
			else
				var $formatted_end_month = ($end_date.getMonth()+1);

			//formatting days
			if($start_date.getDate()<10)
				var $formatted_start_date = '0'+$start_date.getDate();
			else
				var $formatted_start_date = $start_date.getDate();

			if($end_date.getDate()<10)
				var $formatted_end_date = '0'+$end_date.getDate();
			else
				var $formatted_end_date = $end_date.getDate();

			//formatting second part start/end
			if($start_date.getMinutes()<10)
				var $formatted_start_minutes = '0'+$start_date.getMinutes();
			else
				var $formatted_start_minutes = $start_date.getMinutes();

			if($start_date.getHours()<10)
				var $formatted_start_hours = '0'+$start_date.getHours();
			else
				var $formatted_start_hours = $start_date.getHours();


			if($end_date.getMinutes()<10)
				var $formatted_end_minutes = '0'+$end_date.getMinutes();
			else
				var $formatted_end_minutes = $end_date.getMinutes();

			if($end_date.getHours()<10)
				var $formatted_end_hours = '0'+$end_date.getHours();
			else
				var $formatted_end_hours = $end_date.getHours();			

			var $formatted_start_date_part_1 = $formatted_start_date+'-'+$formatted_start_month+'-'+$start_date.getFullYear();
			var $formatted_start_date_part_2 =$formatted_start_hours+':'+$formatted_start_minutes;
			
			var $formatted_end_date_part_1 = $formatted_end_date+'-'+$formatted_end_month+'-'+$end_date.getFullYear();
			var $formatted_end_date_part_2 = $formatted_end_hours+':'+$formatted_end_minutes;

			var $array = [$formatted_start_date_part_1,$formatted_start_date_part_2,$formatted_end_date_part_1,$formatted_end_date_part_2];

			return $array;
	}

	function storeEventSelection($start_date, $end_date)
	{
		$date_parser = dateParser($start_date, $end_date);
		$('#schedule_start_part1').val($date_parser[0]);
		$('#schedule_start_part2').val($date_parser[1]);
		$('#schedule_end_part1').val($date_parser[2]);
		$('#schedule_end_part2').val($date_parser[3])
	}




	$('#event-generator-trigger').on('click',function(){
		$('#modal-create-event').openModal({

			ready: function(){
				$('#create-event-trigger').unbind('click').bind('click',function(){
						var $form = $('#event-create-form');
						var $modal = $('#modal-create-event');
						var $isErrorFree = true;
						$('.required', $form).each(function(){
							if(validateElement.isValid($(this))===false)
								$isErrorFree = false;
						});

						if($('#schedule_start_part1').val()=="" || $('#schedule_start_part2').val()=="")
								$isErrorFree = false;

						if($isErrorFree)
						{
							$.ajax({
								beforeSend: function(){
									$('.loader', $modal).removeClass('hidden');
									$form.addClass('hidden');
									$('.modal-footer', $modal).slideUp();
								},
								url:'/manager/institutions/planning',
								data: $form.serialize(),
								type:'POST',
								dataType:'Text',
								success: function(data){
									if(data==='ok')
									{
										$('#cancel-create-event').trigger('click');
										Materialize.toast('Evennement enregistré',1500,'green');
										reloadPlanning();
									}
									else
									{
										Materialize.toast('Une erreur est survenue lors de l\'opération',1500,'red');
									}
							
								},
								error: function(){alert('Une erreur est survenue lors de l\'opération')},
								complete:function(){
									$('.loader', $modal).addClass('hidden');
									$form.removeClass('hidden');
									$('.modal-footer', $modal).slideDown();
								}
							});
						}
						else
						{
							Materialize.toast('Veuillez Corriger le formulaire avant envoi',1500,'red white-text');
						}
				});
			},

			complete: function(){
				$('#event-create-form')[0].reset();
			},

			dismissible:false
		})
	});

	$('.dropdown-button').dropdown();
	$('.tooltipped').tooltip();
	$('select').material_select();

	$('#calendar-regen-trigger').on('click',function(){
  		reloadPlanning();
	});

	$('#event-supressor').unbind('click').bind('click', function(){
		if($(this).attr('event-id')!=0)
		{
			$('.calendar-quick-viewer').addClass('hidden');
			$('.loader-ajax').removeClass('hidden');
			$.post('/manager/institutions/planning',{'event-id':$(this).attr('event-id'),'state-operation':'delete-event'},function(data){
					if(data==='ok')
					{
												$('.event-description').empty();
						$('.begin-date-info').empty();
						$('.end-date-info').empty();
						$('#event-supressor').attr('event-id','0');
												reloadPlanning();
					}
					else
					{
						if(data==='ko')
						{
						Materialize.toast('Une erreur est survenue',2000,'notification-back-color2');
						}

						if(data==='down')
						{
						Materialize.toast('Vous ne pouvez pas supprimer cette catégorie d\'évennement',2000,'notification-back-color2');

						}
					}
					$('.calendar-quick-viewer').removeClass('hidden');
					$('.loader-ajax').addClass('hidden');

			});
		}
		else
			return null;

	});

	function reloadPlanning(){
		$('#calendar').fullCalendar('refetchEvents');
	}
</script>