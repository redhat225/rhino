<li style="margin-right:15px;" class="pointer tooltipped" id="inbox-meetings-trigger"  data-position="bottom" data-delay="2000" data-tooltip="vous avez <?= $unpracticed_count ?> nouvelle(s) notification(s)">
   <i class="ion-android-pin white-color small" style="display:inline-block;"></i>
	<a href="#!" class="zero-padding"><span class="badge orange white-text"><?= $unpracticed_count ?></span> </a>
</li>

     <div class="row special hidden" id="floating-box-inbox-cell-doctor" style="z-index: 100;position: absolute;width: 350px;right: 280px;">
        <div class="white dmp-main-color">
          <div class="card">
           
           <div class="row orange title-card white-text zero-margin" style="padding:5px;">
               <span class="card-title bold"><i class="ion-android-pin small" style="display:inline-block; margin-right:20px;"></i> File d'attente <i class="ion-ios-information-outline pointer-opaq white-text right small" style="display:inline-block; margin-right:20px;"></i></span>
            </div>

            <div class="card-content dmp-main-color zero-padding">
            	<div class="row zero-margin" style="height:350px; overflow-y:auto;">
                    <?php if($unpracticed->isEmpty()) :?>
                        <p class="center bold" style="margin-top:20px;">
                            <span class="dmp-main-color"><i class="ion-android-pin medium orange-text"></i> Pas de patients en attente pour aujourd'hui</span>
                        </p>
                    <?php else: ?>
                    <ul class="collection zero-margin" id="inbox-content-wrapper">
                     <?php $countdown=0; ?>
                     <?php foreach ($unpracticed as $meeting) :?>
                          <?php   if($meeting->patient_booking!==null) $booking_line='lime lighten-4'; else $booking_line='blank'; ?>

                          <li class="collection-item zero-padding bold patient-queue-element tooltipped <?= $booking_line ?>" data-position="right" data-delay='500' data-tooltip='Cliquez pour effectuer la consultation' href="/doctor/visit-meetings/add/<?= $meeting->id ?>">
                          
                             <div class="col s12 zero-margin zero-padding">
                                <div class="col s3">
                                  <?php if($meeting->visit->patient->person->path_pic===null) :?>
                                    <i class="ion-android-contact dmp-main-color"></i>
                                  <?php else: ?>
                                    <?= $this->Html->image('patient/patient_identity/'.$meeting->visit->patient->person->path_pic,['style'=>'width:100%;']) ?> 
                                  <?php endif; ?>   
                                  </div>
                                <div class="col s1">
                                 <p class="dmp-main-back white-text" style="border-radius:50%;width: 22px;margin-top: 30px;text-align: center;">
                                    <?= ++$countdown; ?>
                                 </p>
                                </div>    
                                <div class="col s8">
                                  <p class="patient-name"><?= $meeting->visit->patient->person->lastname.' '.$meeting->visit->patient->person->firstname ?></p>     
                                  <p class="patient-meeting-code right-text"><?= $meeting->code_meeting ?></p>  
                                  <p class="patient-meeting-created"><?php 
                                            $createdmeeting = new \DateTime($meeting->expected_meeting_date);
                                            echo $createdmeeting->format('d-m-Y H:i:s');
                                   ?></p>
                                   <p class="patient-institution-care">
                                        <?= $meeting->visit->manager_operator->institution->fullname ?>
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
              <a href="/doctor/doctors/inbox-notifications" class="white-text right zero-margin" id="close-floating-modal-trigger"> Voir tout</a>
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

				if(!($(this).attr("id")===("inbox-meetings-trigger")) && !($(this).parents("div").attr("id")===("floating-box-inbox-cell-doctor")))
				{
					$floatingBox.addClass("hidden");
					$("#inbox-meetings-trigger").removeClass("selected");
				}
				else
				{
				  if($(this).attr("id")===("inbox-meetings-trigger"))
				  {
					$("#inbox-meetings-trigger").toggleClass("selected");

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
				$("#inbox-meetings-trigger").removeClass("selected");
				e.stopPropagation();
		});

		$("#inbox-content-wrapper li").css('width','100%');
		$(".collection-item").hover(function(){$(this).addClass("pointer selected-floating-box-item");},function(){$(this).removeClass("pointer selected-floating-box-item");});

		$(".patient-queue-element").on("click",function(e){
				e.stopPropagation();
				var $href = $(this).attr("href");
				window.location.href=$href;
		});

        $(".collection-item:odd").addClass("dmp-sub");
	});
</script>