    $(".select-item-list").on("click",function(){
        $(".select-item-list").removeClass("actived");
        $(this).addClass("actived");
        var $reference=$(this).attr("reference");
        $.each($(".information-paper-wrapper"),function(){
                if($(this).attr("id")==$reference)
                {
                    $(this).removeClass("hidden");
                }
                else
                {
                    $(this).addClass("hidden");
                }
        });
    });
    $(".select-item-list:first-child").trigger("click"); 

    $(".increase-piod-validity").on("click",function(e){
            e.preventDefault();
            $("#diary_id_increase").val($(this).attr('line-value'));
            $("#increase-box-info").openModal({
                dismissible:false,
                ready: function(){
                        $("#confirm-increase-validity").unbind("click").bind("click",function(){
                            var $isErrorFree = true;
                            var $form = $("#form-increase-validity");
                            var $formWrapper = $("#increase-period-form-wrapper");
                            var $loader= $("#loader-increase-privilege-modal");

                           var validity = parseInt($("#validity_increase").val().trim());
                           if(!validity)
                            $isErrorFree = false;

                            if($isErrorFree)
                            {
                                $.ajax({
                                    beforeSend : function(){
                                        $loader.removeClass("hidden");
                                        $formWrapper.addClass("hidden");
                                    },
                                    type:'POST',
                                    data : $form.serialize(),
                                    url: "/patient/diary-tokens/edit",
                                    dataType:"text",
                                    success:function(data)
                                    {
                                        if(data==="ok")
                                        {
                                            Materialize.toast("Période modifiée avec succès",1500); 
                                            window.location.reload();
                                        }
                                        else
                                        {
                                            if(data==="shutdown")
                                            {
                                                Materialize.toast("la période de validité ne peut être négative",1500);
                                            }
                                            else
                                            {
                                              Materialize.toast("Une érreur est survenue Veuillez réessayer",1500);         
                                            }
                                        }
                                        $("#cancel-increase-validity").trigger("click");
                                    },
                                    error:function(){alert("Une érreur est survenue, veuillez réessayer");},
                                    complete : function(){
                                        $loader.addClass("hidden");
                                        $formWrapper.removeClass("hidden");
                                    }
                                });            
                            }
                            return false;
                        });
                },
                complete : function(){
                    $("#form-increase-validity")[0].reset();
                }
            });
    });

    $("#form-increase-validity").on("submit",function(){
        return false;
    });

$(".revok-privilege-validity").on("click",function(){
    $("#force_off").val($(this).attr("diary-id"));
    $("#turn-off-box-info").openModal({
        ready: function(){
            $("#confirm-turnoff-privilege").unbind('click').bind("click",function(){
                    var $data = "diary_id="+$("#force_off").val();
                    var $formWrapper = $("#revok-privilege-form-wrapper");
                    var $loader= $("#loader-remove-privilege-modal");

                        $.ajax({
                            beforeSend : function(){
                                $loader.removeClass("hidden");
                                $formWrapper.addClass("hidden");
                            },
                            type:'POST',
                            data : $data,
                            url: "/patient/diary-tokens/remove",
                            dataType:"text",
                            success:function(data)
                            {
                                if(data==="ok")
                                {
                                    Materialize.toast("Privilège retiré avec succès",1500); 
                                    window.location.reload();
                                }
                                else
                                {
                                    Materialize.toast("Une érreur est survenue Veuillez réessayer",1500);         
                                }
                            },
                            error:function(){alert("Une érreur est survenue, veuillez réessayer");},
                            complete : function(){
                                $loader.addClass("hidden");
                                $formWrapper.removeClass("hidden");
                            }
                        }); 
            });
        },
        dismissible:false,
        complete : function(){
            $("#force_off").val("");
        }
    });
});

    //search by keywords
    $("#search-doctor-privilege").on("keyup",function(e){
   
            if($(this).val().length>1)
            {
                var $tags = $(this).val().toLowerCase().trim();
                $(".doctor-item-search").each(function(){
                    var $classExp = $(this).attr("tag").toLowerCase().trim();
                    var regExp = new RegExp($tags);
                    if(regExp.test($classExp))
                        $(this).removeClass("hidden");
                    else
                        $(this).addClass("hidden");
                });
            }
            else
            {
                $(".doctor-item-search").removeClass("hidden");
            }
            return false;
    });


    $('.setting-privilege-trigger').on('click',function(){
        var $id_doctor = $(this).parents("tr").attr("doctor-id");
        var $form = $("#form-setting-privilege");
        $("#setting-privilege-box-info").openModal({
            ready: function(){
                $("#doctor_id_setting_privilege").val($id_doctor);
                $("#confirm-setting-privilege").unbind("click").bind("click",function(){
                    var $isErrorFree = true;
                    if(validateElement.isValid($('#validity'))==false)
                        $isErrorFree = false;

                    if($isErrorFree)
                    {
                        $.ajax({
                            beforeSend: function(){
                                $("#loader-privilege-modal").removeClass("hidden");
                                $("#setting-privilege-form-wrapper").addClass("hidden");
                            },
                            url:'/patient/diary-tokens/add',
                            type:'POST',
                            data: $form.serialize(),
                            dataType:'Text',
                            success: function(data){
                                if(data==="ko")
                                {
                                    Materialize.toast("Erreur Serveur, veuillez réessayer",1500);
                                }
                                else
                                {
                                    if(data ==="already")
                                    {
                                        Materialize.toast("Privilèges actifs pour ce praticien",1500);
                                    }
                                    else
                                    {
                                        Materialize.toast("Privilèges accordés avec succès",1500);
                                        window.location.reload();
                                    }
                                    $("#cancel-setting-privilege").trigger("click"); 
                   
                                }
                            },
                            complete: function(){
                                $("#loader-privilege-modal").addClass("hidden");
                                $("#setting-privilege-form-wrapper").removeClass("hidden");
                            },
                            error: function(){alert("Erreur Serveur, veuillez réessayer");}
                        });
                    }   
                    else
                    {
                        return false;
                    }

                });
            },
            complete: function(){
                $form[0].reset();
            }
        });
    });