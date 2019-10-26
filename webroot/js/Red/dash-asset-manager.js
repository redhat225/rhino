$(document).ready(function(){
		$(".button-collapse").sideNav();
		$.ajaxSetup({error:function(){alert("Une érreur s'est produite veuillez réessayer/contacter le support")},timeout:3e7});
});

		$("ul#game-gift-menu li.li-elements a.gg-li-a-elements").on('click',function(e){
				$(this).parent().parent().find("li.li-elements").removeClass("actived");
				$(this).parent("li.li-elements").addClass("actived");

		});

		$(".choice-general").hover(function(){
				$(this).find("i").removeClass("dmp-main-color").addClass("white-text");
		},function(){$(this).find("i").removeClass("white-text").addClass("dmp-main-color");});

		$(".side-nav-menu-item").hover(function(){
				$(this).find("i").removeClass("dmp-main-color").addClass("white-text");
		},function(){$(this).find("i").removeClass("white-text").addClass("dmp-main-color");});


		//accordion menu
		//accordion menu
		$("li.li-elements").on("click",function(){
				$(".submenu").addClass("hidden");
				$(this).find('.submenu').removeClass("hidden");
		});

		$(".submenu li").on('click',function(e){
				$(".submenu li").removeClass("activated-sub");
				$(this).addClass("activated-sub");

		});

		$("table.striped").find("tbody tr:even").addClass("dmp-sub black-text");


				//engine selector menu
			$(".item-selected-reference").on("click",function(e){
				e.preventDefault();
				var $reference = $(this).attr("reference").trim();

				$(".item-selected-reference").removeClass("actived");
				$(this).addClass("actived");
				$(".information-wrapper").each(function(){
					if($(this).attr('id')===$reference)
						$(this).removeClass('hidden');
					else
						$(this).addClass("hidden");
				});
			});	

			$(".item-selected-reference:first-child").trigger("click")

//client Side Validator
	validateElement = {
		
		isValid:function(element){
				var isValid= true;
				var $element=$(element);	
				var id=$element.attr('id');
				var name=$element.attr('name');
				var value= $element.val();

				var type=$element[0].type.toLowerCase();

				switch(type){
					case 'text':
							if(!/^[a-z0-9\s-!?()éè&+-à,ùêô'ï./]{2,1500}$/i.test(value)){
						 	isValid = false;
						 }
					break;

					case 'file':
							if(value=="")
							 isValid = false;
					break;						
					case 'password':
							if(!/^[a-z0-9_-]{8,25}$/i.test(value)){
								isValid = false;
							}
					break;
					case 'number':
							if(!/^\w{1,9}\.?\w{0,4}$/.test(value) || value<0 || value==="" || value==0){
								isValid = false;
							}
					break;
					case 'textarea' :
						if(value.length == 0 || value.replace(/\s/g,'').length == 0 )
						{
							isValid = false;
						}else
						{
							if(!/^[a-z0-9\s-!?()éè&àùêï+-,ô'./]{10,5000}$/i.test(value)){
						 	isValid = false;
						 }
						}
					break;

					case 'email' : 
						 if(!/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/i.test(value)){
						 	isValid = false;
						 }
						    break;

					case 'tel' : 
					     if(!/^([0-9]{2}){4}$/.test(value)){
					     	isValid = false;
						}
					break;

				}//end switch
			
			var method=isValid? 'valid' : 'invalid' ;
			
			 if(isValid)
			 	$element.removeClass('invalid').addClass(method);
			 else
			 	$element.removeClass('valid').addClass(method);

			 $element.unbind('change.isValid')
			 	.bind('change.isValid', function(){validateElement.isValid(this);});
				
			return isValid;

		}

	};
