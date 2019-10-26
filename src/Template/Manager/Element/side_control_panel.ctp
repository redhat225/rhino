    <div class="row side-control-panel-menu-items zero-margin">
            <h6 class="dmp-grey-2-text left-align dmp-main-back-darkened zero-margin" style="font-size:1.1rem;text-transform:uppercase;padding:10px;border-top:1px solid #dc6b1d;"><?= h(__('Menu')) ?></h6>
            
            <ul id='' class='manager-navbar' style="margin-left:10%;">
                <li style="height:42px !important;"><a href="#home" class="dmp-grey-2-text navigation-item" style="line-height:42px;"><i class="ion-home dmp-grey-2-text left" style="font-size:1.45rem;"></i> <span class="left" style="margin-left:10%;text-transform:uppercase;font-size:small;">Accueil</span></a>
                </li>

                <li style="height:42px !important;"><a href="#bills" class="dmp-grey-2-text navigation-item" style="line-height:42px;"><i class="ion-document-text dmp-grey-2-text left" style="font-size:1.45rem;"></i> <span class="left" style="margin-left:12%;text-transform:uppercase;font-size:small;">Facturation</span></a>
                </li>  


                <li style="height:42px !important;"><a href="#planning" class="dmp-grey-2-text navigation-item" style="line-height:42px;"><i class="ion-android-calendar dmp-grey-2-text small left" style="font-size:1.45rem;"></i> <span class="left" style="margin-left:9%;text-transform:uppercase;font-size:small;">Planning</span></a>
                </li>

                <li style="height:42px !important;"><a href="#institution" class="dmp-grey-2-text navigation-item" style="line-height:42px;"><i class="ion-fork-repo dmp-grey-2-text small left" style="font-size:1.45rem;"></i> <span class="left" style="margin-left:10%;text-transform:uppercase;font-size:small;"> Personnel</span></a>
                </li>   


                <li style="height:42px !important;"><a href="#patients" class="dmp-grey-2-text navigation-item" style="line-height:42px;"><i class="ion-person-stalker dmp-grey-2-text small left" style="font-size:1.45rem;"></i> <span class="left" style="margin-left:6%;text-transform:uppercase;font-size:small;">Patients</span></a>
                </li>  

                <li style="height:42px !important;"><a href="#tasks" class="dmp-grey-2-text navigation-item" style="line-height:42px;"><i class="ion-ios-list dmp-grey-2-text small left" style="font-size:1.45rem;"></i> <span class="left" style="margin-left:8%;text-transform:uppercase;font-size:small;">Tâches</span></a>
                </li> 


                <li id="about-dmp-info" class="pointer-opaq" style="height:42px !important;"><span class="dmp-grey-2-text" style="line-height:42px;"><i class="ion-help-circled dmp-grey-2-text small pointer-opaq left" style="font-size:1.45rem;"></i> <span class="left" style="margin-left:8%;text-transform:uppercase;font-size:small;">A propos</span></span>
                </li> 
            </ul>

            <h6 class="dmp-grey-2-text left-align dmp-main-back-darkened" style="font-size:1.1rem;text-transform:uppercase;padding:10px;"><?= h(__('Outils')) ?></h6>

            <ul id='' class='manager-navbar-tools' style="margin-left:10%;">
                <li style="height:42px !important;" class="pointer-opaq global-search-side-panel-trigger"><span class="dmp-grey-2-text navigation-item" style="line-height:42px;"><i class="ion-ios-search-strong dmp-grey-2-text left" style="font-size:1.45rem;"></i> <span class="left" style="margin-left:10%;text-transform:uppercase;font-size:small;">Recherche</span></a>
                </li>
            </ul>

            <h6 class="dmp-grey-2-text left-align dmp-main-back-darkened" style="font-size:1.1rem;text-transform:uppercase;padding:10px;"><?= h(__('Paramètres')) ?></h6>

            <ul id='' class='manager-navbar-tools' style="margin-left:10%;">
                <li  style="height:42px !important;" class="pointer-opaq">
                   <a class="dmp-grey-2-text custom-item-navigation" href="#account" style="line-height:42px;"><i class="ion-card dmp-grey-2-text left" style="font-size:1.45rem;"></i> <span class="left" style="margin-left:10%;text-transform:uppercase;font-size:small;">Compte</span></a>
                </li>

                <li style="height:42px !important;" class="pointer-opaq"><span class="dmp-grey-2-text navigation-item" style="line-height:42px;"><i class="ion-android-settings dmp-grey-2-text left" style="font-size:1.45rem;"></i> <span class="left" style="margin-left:10%;text-transform:uppercase;font-size:small;">Options</span></a>
                </li>

                <li style="height:42px !important;" class="pointer-opaq"><a href='/manager/manager-operators/logout' class="dmp-grey-2-text navigation-item" style="line-height:42px;"><i class="ion-power dmp-grey-2-text left" style="font-size:1.45rem;"></i> <span class="left" style="margin-left:10%;text-transform:uppercase;font-size:small;">Déconnexion</span></a>
                </li>
            </ul>
    </div>


    <ul id="dmp-menu" class="left-align dmp-main-back-darkened hidden zero-margin">

         <li style="border-top:1px solid #dc6b1d;">
            <span style="height:46px; display:inline-block;padding:0px 5px;" class="left pointer-opaq tooltipped hide-global-search-trigger" data-tooltip='retour' data-delay='50' data-position='top'><i class="ion-ios-arrow-back dmp-orange-text small center-align"></i></span> 
                <div class="container center item-search-list">
                     
                       <span reference='patients-search' style="height:46px; display:inline-block;padding:0px 5px;" class="center pointer-opaq tooltipped" data-tooltip='recherche-entité' data-delay='50' data-position='top'><i class="ion-person-stalker grey-text small center-align"></i></span> 

                        <span reference='bills-search' style="height:46px; display:inline-block;padding:0px 8px;" class="center pointer-opaq tooltipped" data-tooltip='recherche-facture' data-delay='50' data-position='top'><i class="ion-document-text grey-text small center-align"></i></span> 

                        <span reference='drugs-search' style="height:46px; display:inline-block;padding:0px 5px;" class="center pointer-opaq tooltipped" data-tooltip='recherche-médicaments' data-delay='50' data-position='top'><i class="ion-ios-medical grey-text small center-align"></i></span>
                </div>
    	 </li>	
    			
    	 <li style="border-top:1px solid #dc6b1d;" >
    	 	<div class="col s12 input-field darkened-input-field">
                 <i class="ion-ios-search-strong prefix" id="research-picto-side"></i> <?= $this->Html->image('assets_dmp/ajax_loader/loading-mini-white-darkened.gif',['id'=>'loader-research','class'=>'hidden','style'=>'position:absolute;']) ?> 
    	 		
    	 		<input type="text" id='global-search' class="global-serach-input" style="width: 150px;height:28px;padding:3px;">
    	 	</div>
    	 </li>

         <li>
             <div class="row zero-padding zero-margin" id='main-content-results-search'>
                        
             </div>
         </li>		
    </ul>

         <div class="row zero-margin dmp-grey-2-text" id="result-count-research">
                
         </div> 

    <div class="row zero-margin hidden" id="results-research" style="margin-top:25px;">
                 <ul class="collection" id="result-research-body" style="border:none !important; height:500px;overflow:auto;overflow-x:hidden;">
                   
                </ul>
    </div>

<?= $this->Html->script('Red/manager/manager-operators/general/navbar',['block'=>true]) ?>
<?= $this->Html->script('Red/manager/manager-general-search',['block'=>true]) ?>
<?= $this->Html->script('Red/manager/manager-amount-visit-meeting',['block'=>true]) ?>
<?= $this->Html->script('Red/manager/manager_side_control_panel',['block'=>true]) ?>

<script>
    $('.global-search-side-panel-trigger').unbind('click').bind('click', function(){
        $('.side-control-panel-menu-items').slideUp();
        $('#dmp-menu').slideDown();
         $('#result-research-body,#result-count-research, #results-research').removeClass('hidden');
    });
    $('.hide-global-search-trigger').unbind('click').bind('click', function(){
        $('#result-research-body,#result-count-research, #results-research').addClass('hidden');
        $('#dmp-menu').slideUp();
        $('.side-control-panel-menu-items').slideDown();
    });
    
</script>
