$(document).ready(function(){
	//Routing file for enabling spa features
	$('.manager-navbar a.navigation-item, .navigation-subitem, .custom-item-navigation').unbind('click').bind('click',function(){
			    var $hash = $(this).attr('href').substr(1).split('#');
			    var $current_hash = window.location.hash.substr(1).split('#');

			    console.log($current_hash);

			    if($hash[0].length>0 && $current_hash[0]!==$hash[0])
				   xhr_dynamic_content($hash[0],$content);
				else
					return false;
	});

	if(window.location.pathname==='/manager/manager-operators/general')
	{
		var $content = $('#dmp-variable-content');
		var $hash = window.location.hash.substr(1).split('#');
		
		if($hash[0].length>0)
				xhr_dynamic_content($hash[0],$content);
		else
			$('.manager-navbar a.navigation-item:eq(0)').trigger('click');
	}
	else
	{
		window.location.href='/manager/manager-operators/general#home';
	}
});

function xhr_dynamic_content($hash,$content)
{
		 		switch($hash)
		 		{
		 			case 'home':
		 				 $url= '/manager/manager-operators/general';	
		 			break;

		 			case 'bills':
		 				$url = '/manager/visit-invoices';
		 			break;

		 			case 'planning':
		 				$url = '/manager/institutions/planning'; 
		 			break;

		 			case 'institution':
		 				$url='/manager/institutions';
		 			break;

		 			case 'patients':
		 				$url='/manager/patients';
		 			break;


		 			case 'tasks':
		 				$url='/manager/visit-tasks';
		 			break;

		 			case 'add-patient':
		 				$url = '/manager/patients/add';
		 			break;

		 			case 'account':
		 				$url = '/manager/manager-operators/account';
		 			break;

		 			default:
		 				$url = '/manager/manager-operators/general';
		 			break;
		 		}


	 		$.ajax({
	 			beforeSend:function(){
	 				$('.manager-navbar a, .manager-navbar i').removeClass('dmp-orange-text').addClass('dmp-grey-2-text');
	 				var $custom_hash = '#'+$hash;
	 				$('.manager-navbar a').each(function(){
	 					if($(this).attr('href')===$custom_hash)
	 					{
							$(this).addClass('dmp-orange-text').removeClass('dmp-grey-2-text');
	 						$(this).find('i').addClass('dmp-orange-text').removeClass('dmp-grey-2-text');
	 					}
	 				});
	 				
	 				$content.empty();
	 				var $loader_ajax = $('<div class="container" id="loader-wrapper-ajax" style="margin-top:25%;"><div class="container"><div class="container"><div class="container"><div class="container"><img src="/webroot/img/assets_dmp/ajax_loader/loader-orange.gif" id="ajax-loader"/></div></div></div></div></div>');
	 				$content.append($loader_ajax);

	 				// window.location.replace('/manager/manager-operators/general'+$custom_hash);
	 			},
	 			url:$url,
	 			dataType:'html',
	 			type:'GET',
	 			success: function(data)
	 			{
	 				$content.append(data);
	 			},
	 			complete: function(){
	 				$('#loader-wrapper-ajax',$content).remove();
	 			},
	 			error: function(){
	 				alert('Une Erreur est survenue lors de l\'opération, veuilez réessayer');
	 			}

	 		});
}