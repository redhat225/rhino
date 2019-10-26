$sdk_epad_signature_object ='';
function signPad(container){

	var message = {"firstName": "John" , "lastName": "Doe" , "eMail": "johndoe@demo.com" ,
	"location": "LosAngels,CA" , "imageFormat": 2 , "imageX": 200 , "imageY": 130 ,
	"imageTransparency": true , "imageScaling": false, "maxUpScalePercent": 0.0,
	"rawDataFormat": "ENC" , "minSigPoints":25, "penThickness": 2, "penColor":
	"#133f52"};

	document.addEventListener('SigCaptureWeb_SignResponse', SignResponse, false);

	var messageData = JSON.stringify(message);

	var element = document.createElement("SigCaptureWeb_ExtnDataElem");

	element.setAttribute("SigCaptureWeb_MsgAttribute", messageData);

	document.documentElement.appendChild(element);

	var evt = document.createEvent("Events");

	evt.initEvent("SigCaptureWeb_SignStartEvent", true, false);

	element.dispatchEvent(evt);
}


	function SignResponse(event)
	{
		
	    var str = event.target.getAttribute("SigCaptureWeb_msgAttri");
		var obj = JSON.parse(str);
		if(obj.isSigned)
				{
					switch($sdk_epad_signature_object.callback_function)
					{
						case 'registerVisit':
								$('#signature_anonym').attr('value',obj.imageData);
								var $form= $('#form-visits-viewer');
								registerVisit($form);
						break;

						case 'registerPatient':
							 var signature = $('<img style="text-align:center; width:200px;"/>').attr('src','data:image/png;base64,'+obj.imageData);
							  $('.signature-picto').remove();
							  $('.signature-area').append(signature);
							  $('#credential_patient').val(obj.imageData);
							  $('#ence_credential_patient').val(obj.rawData);
							  $('#submit-signin-patient').removeClass('hidden');
						break;
					}

				}
				else
				{
					Materialize.toast('Veuillez produire une signature valide',2000,'red');
				}
	}