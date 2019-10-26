$(document).ready(function(e){
        $('select').material_select();
        datePickerInitializator();
		
		
		//manage formular validation
		$("#game-gift-menu li.item-menu-visit-add").on("click",function(e){
				if(!$(this).hasClass("blocked"))
				{
					if($(this).hasClass("correct-actived") || $(this).hasClass("error-actived"))
					{
						//Current Selected Element 
						$currentItemVisitSelected = $("#game-gift-menu li.item-menu-visit-add.actived").index();
						$clickedItem = $(this).index();

						$("div.validation-container").fadeOut();
						$("div.validation-container[identifier="+$clickedItem+"]").fadeIn();

					}
					else if($(this).hasClass("actived"))
					{
						$("div.validation-container").fadeOut();
						$("div.validation-container[identifier="+$(this).index()+"]").fadeIn();
					}
					else
					{
						$(this).parents('ul').find('li.item-menu-visit-add').removeClass("actived");
						$(this).addClass("actived");
						validateStep();						
					}
					
				}
				else
				return false;
		});

        $("#game-gift-menu li.item-menu-visit-add:eq(0)").removeClass("blocked").trigger('click');
		$("#game-gift-menu li.item-menu-visit-add").on("click",function(){
			if($(this).hasClass('blocked'))
			Materialize.toast("Vous devez valider l'étape précédente", 1000);
		});

		$(".add-requirement-item").on("click",function(e){
		e.preventDefault();
		var $visit='';
		$.get(
				'/doctor/treatment-requirements/add',
				{'visit':$visit},
				function(data){$("#requirements-adding-content").append(data);
                    basicRequirementEvents();
					retiredRequirementListener();
					$("#add-requirements-table tbody tr:odd").addClass("dmp-sub");
				}
			);
	     });

		$(".add-exams-item").on("click",function(e){
			e.preventDefault();
			$.get(
					'/doctor/exams/add',
					{},
					function(data){$("#exams-adding-content").append(data);
	                    basicRequirementEvents();
						retiredExamsListener();
						$("#add-exams-table tbody tr:odd").addClass("dmp-sub");
						$("#exams-adding-content tr:last-child .type_exam_select").unbind('change').bind("change",manageSelectExams);
					}		
				);
		});

		//abort formular visit registering
		$("#game-gift-menu li:eq(6)").hover(function(){$(this).addClass("abort-actived")},function(){$(this).removeClass("abort-actived")})

		$(".warning-abort-visit-trigger").on("click",function(e){
			$linkRedirectAbort=$("#abort-visit-reference").attr("href");
			$("#warning-abort-visit-dmp").openModal({
				'dismissible' : false
			});
		});

		//verifying form before sending	
		$("#visit-new-form").on("submit",function(e){
				var $isErrorFree=true;

				$("textarea.required,input.required",this).each(function(){
							if(validateElement.isValid(this)==false)
							    $isErrorFree = false;
				});						

				$("select",this).each(function(){
						if($(this).attr("multiple"))
						{
							var $length=parseInt($("option",this).length)
							if($length>0)
							{
								if($("option:selected",this).length<1)
									$isErrorFree=false;
							}

						}
						if($(this).find("option:selected").val()=="")
							$isErrorFree=false;
				});

				if($isErrorFree)
				{
					return true;
				}
				else
				{
					Materialize.toast("Vous devez valider certaines étapes avant d'envoyer le formulaire",2000)
				    return false;
				}

		});

		//manage insurances lever
		$("input[name='insured']").on("change",function(){
			var $valueInsured=parseInt($(this).val());

			switch($valueInsured)
			{
				case 1 :
						$("#insurances-patient").removeClass("hidden");
				break;

				case 0 :
						$("#insurances-patient").addClass("hidden");
				break;

				default:
						Materialize.toast("Une érreur est survenue", 1000);
				break;
			}

		});

		$(".insurance-issue").on("click",function(e){
			e.preventDefault();
			return
		});

});
//validate forms
function validateStep()
{
		$(".dmp-next-button").on("click",function(e)
		{
			if($(this).hasClass(""))
				e.preventDefault();
				var $isErrorFree=true;

				var $identifier = parseInt($(this).parents("div.validation-container").attr("identifier"));
				var $wrapper=$("div.validation-container[identifier="+$identifier+"]");
				//locate current Element in procedure
				var $currentWrapperSide=$("#game-gift-menu li.item-menu-visit-add:eq("+$identifier+")");

				$("textarea.required,input.required",$wrapper).each(function(){
							if(validateElement.isValid(this)==false)
							    $isErrorFree = false;
				});						

				$("select",$wrapper).each(function(){
						if($(this).attr("multiple"))
						{
							var $length=parseInt($("option",this).length)
							if($length>0)
							{
								if($("option:selected",this).length<1)
									$isErrorFree=false;
							}

						}
						if($(this).find("option:selected").val()=="" && !($(this).hasClass("insurance-selector")))
							$isErrorFree=false;
				});

				if($isErrorFree)
				{
					if($currentWrapperSide.hasClass("correct-actived") || $currentWrapperSide.hasClass("error-actived"))
					{
						$currentWrapperSide.removeClass("error-actived")
						                         .addClass('correct-actived');
						$wrapper.fadeOut();

						$("div.validation-container[identifier="+($identifier+1)+"]").fadeIn();
						$("#game-gift-menu li.item-menu-visit-add:eq("+($identifier+1)+")").removeClass("blocked").addClass("actived");
					}
					else
					{
						$("#game-gift-menu li.item-menu-visit-add:eq("+($identifier)+")").removeClass("actived").addClass('correct-actived');
						$wrapper.fadeOut();
						$("#game-gift-menu li.item-menu-visit-add:eq("+($identifier+1)+")").removeClass("blocked").trigger("click");
						$("div.validation-container[identifier="+($identifier+1)+"]").fadeIn();
					}
				}
				else
				{


					$("#game-gift-menu li.item-menu-visit-add:eq("+$identifier+")").removeClass("actived")
																						  .removeClass('correct-actived')
																											.addClass('error-actived');
				}
		});

}


//manage Select
function manageSelectExams()
{
				var $valueSelected = $(this).find("option:selected").val();
				var $index = $(this).parents("tr").index();
				var $underTypeLocation=$("#exams-adding-content tr:eq("+$index+") .under-type-exams-item");

	 			if($valueSelected!=="")
	 			{
						$.get(
								'/doctor/exams/add_under_type_exams',
								{'type_exam_id' : $valueSelected,'index':$index},
								 function(data){
									$underTypeLocation.empty();
								 	$underTypeLocation.append(data);
								 	$underTypeLocation.find("select").material_select();
								}		
							);	 				
	 			}
	 			else
	 			{
	 				$underTypeLocation.empty();
	 			}
}

//Attach Basic functionnalities
function basicRequirementEvents()
{
	$('select').material_select();
}

//triggerRetired Listener
function retiredExamsListener()
{
   $(".retired-exams-item").on("click",function(){
   		$(this).parents("tr").remove();
   });
}

//triggerRetired Listener
function retiredRequirementListener()
{
   $(".retired-requirement-item").on("click",function(){
   		$(this).parents("tr").remove();
   });
}

//datePicker Initializator
function datePickerInitializator()
{
        $('.datepicker').pickadate({
        		//Strings & Translations
                monthsFull: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
                monthsShort: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Dec'],
                weekdaysFull: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
                weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
                selectMonths: true,
  				selectYears: true,
                //Buttons
                today: 'Actuel',
				closelear: 'Clear',
				close: 'Fermer',

				//label Months
				format: 'dd mmmm yyyy',
				formatSubmit: 'yyyy-mm-dd',
				hiddenName: true,
    			// hiddenName: true,
				labelMonthNext: 'Mois suivant',
				labelMonthPrev: 'Mois précédent',
				labelMonthSelect: 'Selectionnez un mois',
				labelYearSelect: 'Selectionnez une année',

				//datePicker select
				min: 'today',

				//fireEvent
				 onSet: function(context) {
				 	var $selectorsDatePicker = $("#exp");
    				var $settingDate=new Date($selectorsDatePicker.val());
					var $difDate= Math.abs($settingDate.getTime()-new Date().getTime());
					var $dayEcart=Math.ceil($difDate / (1000 * 3600 * 24));
					$("#duree-treatment").val($dayEcart);
  				}

        });	
}