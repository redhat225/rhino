<?php $this->layout='blank'?>


            <div class="row" id="visits-table-wrapper">
                    <div class="row center hidden" id="empty-visits-info">
                            <i class="ion-ios-filing-outline large red-text"></i>
                            <h5>Aucune Patient</h5>
    
                    </div>
                        <div class="row" id="table-container-patients-info-table" style="overflow:auto;height:750px;">
                            <table class="MyTable striped bordered bold centered table-space zero-margin facturation-info-table" cellpadding="0" cellspacing="0" id="visits-info-table" style="margin-top:30px;">
                                <thead class="dmp-main-color">
                                    <th class="zero-padding"><?= __('Photo') ?></th>
                                    <th class="zero-padding"><?= __('Code Patient') ?></th>
                                    <th class="zero-padding"><?= __('Nom') ?></th>
                                    <th class="zero-padding"><?= __('Prenom(s)') ?></th>
                                    <th class="zero-padding"><?= __('Age') ?></th>
                                    <th class="zero-padding"><?= __('Sexe') ?></th>
                                    <th class="zero-padding"><?= __('Contact(s)') ?></th>
                                    <th class="zero-padding"><?= __('Voir fiche') ?></th>
                                </thead>
                                <tbody changed="1">

                                </tbody>
                            </table>
                        <div class="row center hidden loader">
                              <div class="progress dmp-orange-back">
                                  <div class="indeterminate grey"></div>
                              </div>
                            <span class="dmp-orange-text light">Importation en cours</span>
                        </div>
                    </div>
             </div>


<?= $this->Html->script('Red/manager/patients/index') ?>