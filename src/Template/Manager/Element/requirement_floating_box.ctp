          <div class="row dmp-main-back-darkened hidden" id="floating-box-1" style="position:absolute;top:0px;left:0px;width:99.8%;height:1200px;opacity:0.965;border:2px solid #dc6b1d;overflow:auto;">
                <div class="row zero-margin zero-padding" id="content-floating-box-1">
                      <div class="row zero-margin" id="requirement-main-info" style="border-bottom:1.2px solid #dc6b1d;">
                          <div class="col s1 reducable-content">
                              <i class="ion-ios-medical white-text medium"></i> 
                          </div>
                          <div class="col s9 reducable-content">
                              <p class="dmp-grey-2-text">
                                  <span id="denomination_requirement_selected" class="bold requirement-api-variable-info"></span> <br>
                                  <span class="white-text">Ref CIS:</span> <span id="cis_code_requirement_selected" class="requirement-api-variable-info"></span> <br>
                                  <span class="white-text">Homéopathique:</span> <span id='is_homeopatic_requirement' class="requirement-api-variable-info"></span> <br>
                                  <span class="white-text">Titulaire(s):</span> <span id='license_owner' class="requirement-api-variable-info"></span>
                              </p>
                          </div>
                          <div class="col s2" id="closer-floating-box-1-wrapper">
                            <i class="ion-ios-close-outline small right close-floating-box-trigger tooltipped" data-tooltip='fermer' data-delay='5s' data-position="left" id="close-floating-box-1-trigger"></i>
                             <i class="ion-ios-minus-outline small right reduced-floating-box-trigger tooltipped" data-tooltip="réduire" data-delay='5s' data-position="left" id="reduced-floating-box-1-trigger"></i>
                          </div>
                      </div>
    
                      <div class="row reducable-content" id="requirements-info-wrapper" >
                              <ul class="tabs tabs-fixed-width dmp-main-back-darkened darkened-tabs custom-overflowed-tabs" ref="#floating-box-1" style="border-bottom:1px solid #dc6b1d;">
                                <li class="tab col s2" ref="#therapeutic-search-requirement"><a class="dmp-grey-2-text" href="#therapeutic-search-requirement-alt">Indications</a></li>
                                <li class="tab col s2" ref="#compositions-search-requirement"><a class="dmp-grey-2-text" href="#compositions-search-requirement-alt">Compositions</a></li>
                                <li class="tab col s2" ref="#molecular-search-requirement"><a class="dmp-grey-2-text" href="#molecular-search-requirement-alt">Substances Actives</a></li>
                                <li class="tab col s2" ref="#interactions-search-requirement-wrapper"><a class="dmp-grey-2-text" href="#interactions-search-requirement-alt">Intéractions </a></li>
                                <li class="tab col s2" ref="#family-search-requirement-wrapper"><a class="dmp-grey-2-text" href="#family-search-requirement-alt">Familles</a></li>
                                <li class="tab col s2" ref="#notice-table-wrapper-wrapper"><a class="dmp-grey-2-text" href="#notice-table-wrapper-wrapper-alt">Notice</a></li>
                              </ul>
                      </div>
  

                      <div class="section reducable-content custom-overflowed-tabs-content" id="therapeutic-search-requirement" style="padding:10px;">
                          <p class="dmp-grey-2-text requirement-api-variable-info" id="therapeutic-precision-requirement" style="padding:10px;font-size:16px;">
                              
                          </p>
                          <p class="dmp-grey-2-text">
                            <span class="white-text">Conditions de délivrance:</span> <span id="delivrance-ways-requirements" class="requirement-api-variable-info">
                              
                            </span> <br>

                            <span class="white-text">Voies d'administration:</span> <span id="administration-way-requirement" class="requirement-api-variable-info"></span> <br>

                             <span class="white-text">Présentations:</span> <span id="requirement-presentation-search" class="requirement-api-variable-info" style="padding-left:17px;"></span>
                          </p> 
                      </div> 

                     <div class="row requirement-api-variable-info reducable-content custom-overflowed-tabs-content" id="compositions-search-requirement" style="padding:10px;">
      
                      </div> 

                      <div class="row requirement-api-variable-info reducable-content custom-overflowed-tabs-content" id="molecular-search-requirement" style="padding:10px;">

                      </div> 


                      <div class="row reducable-content custom-overflowed-tabs-content" id="interactions-search-requirement-wrapper" style="padding:10px;overflow:auto; overflow-x:hidden;height:400px;">
                              <div class="row requirement-api-variable-info" id="interactions-search-requirement">
                                
                              </div> 
                      </div> 

                      <div class="row reducable-content custom-overflowed-tabs-content" id="family-search-requirement-wrapper" style="padding:10px;overflow:auto; overflow-x:hidden;height:800px;">
                              <div class="row requirement-api-variable-info" id="family-search-requirement">
                                
                              </div> 
                      </div> 

                      <div class="row reducable-content custom-overflowed-tabs-content" id="notice-table-wrapper-wrapper" style="padding:10px;overflow:auto; overflow-x:hidden;height:800px;">
                              <div class="row requirement-api-variable-info dmp-grey-2-text" id="notice-table-wrapper">
                              </div>
                      </div>

                <div class="row hidden center" style="margin-top:20%;" id="error-conatiner-floating-box-1">
                      <i class="ion-ios-medical large white-text"></i>
                      <h6 class="dmp-grey-2-text">Une érreur est survenue, veuilez réessayer</h6>
                </div>

                </div>

                <div class="row hidden center" style="margin-top:30%;" id="loader-floating-box-1">
                    <?= $this->Html->image('assets_dmp/ajax_loader/loading-mini-orange-darkened.gif') ?>
                </div>

  
                </div>

<script>
 var $requirement_floating_box = $('#floating-box-1');

  $('#close-floating-box-1-trigger').on('click',function(){
    $requirement_floating_box.addClass('hidden');

    $requirement_floating_box.removeClass('used');
    $('#closer-floating-box-1-wrapper').removeClass('right');
    $('#reduced-floating-box-1-trigger').removeClass('ion-ios-plus-outline').addClass('ion-ios-minus-outline');
    $('#reduced-floating-box-1-trigger').attr('data-tooltip','Réduire');
    $requirement_floating_box.css({'height':'1200px'});
    $('.reducable-content',$requirement_floating_box).removeClass('hidden');

    if($('#close-floating-box-1-trigger').hasClass('ion-ios-plus-outline'))
            $('#close-floating-box-1-trigger').trigger('click');
  }); 

  $('#reduced-floating-box-1-trigger').on('click',function(){
    if($(this).hasClass('ion-ios-minus-outline'))
    {
      if($('#error-conatiner-floating-box-1').hasClass('hidden'))
              $('.reducable-content',$requirement_floating_box).addClass('hidden');


      $('#closer-floating-box-1-wrapper').addClass('right');
      $(this).removeClass('ion-ios-minus-outline').addClass('ion-ios-plus-outline');
      $(this).attr('data-tooltip','Dérouler');
      $requirement_floating_box.css({'height':'50px'});


    }
    else
    {
      if($('#error-conatiner-floating-box-1').hasClass('hidden'))
      {
           $('#closer-floating-box-1-wrapper').removeClass('right');
      }

      $('.reducable-content',$requirement_floating_box).removeClass('hidden');
      var $current_selected_tabs= $('#requirements-info-wrapper li a.active').parent().index();
      console.log($current_selected_tabs);
      $('.custom-overflowed-tabs li:eq('+$current_selected_tabs+')',$requirement_floating_box).trigger('click');

      $(this).removeClass('ion-ios-plus-outline').addClass('ion-ios-minus-outline');
      $(this).attr('data-tooltip','Réduire');
      $requirement_floating_box.css({'height':'650px'});
      

      
    }

  });
</script>