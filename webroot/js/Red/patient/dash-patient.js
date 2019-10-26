	$("a#carnet-generator").on("click",function()
	{
		var $idPatient=parseInt($(this).attr("idpatient"));

		var $data="patient_id="+$idPatient;
		$.ajax({
			beforeSend:function(){
				$("#asset-carnet-generator").addClass("hidden");
				$("#loader-carnet-generator").removeClass("hidden");

			},
			type:'POST',
			dataType:"text",
			url:'/patient/patient-books/book-builder',
			data:$data,
			success:function(data){
				if(data==="ok")
				{
					window.location.href='/patient/patient-books/view';		

				}
				else
				{
					Materialize.toast("Vous n'avez pas le droit de consulter ce dossier.",1000);			
				}
			},
			complete:function(){
				$("#asset-carnet-generator").removeClass("hidden");
				$("#loader-carnet-generator").addClass("hidden");
			},
			error:function(){
				alert("Une erreur est survenue");
			}
		});

	});