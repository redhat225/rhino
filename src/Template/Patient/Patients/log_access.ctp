<div class="col l2 m2 s2 center" id="side-control-panel">
        
    <h5 class="white-text" style="font-size:1.3rem;"><?= h(__('Actions')) ?></h5>

    <ul id="game-gift-menu" class="left-align black">  

        <li style="border-top:1px solid white;"> <a href="/patient/patients/view"><i class="ion-skip-backward small white-text"></i> Retour</a> </li>
        <li style="border-bottom:1px solid white;"> <a href="/patient/patients/general"><i class="ion-home small white-text"></i> Retour à l'écran de bord</a> </li>
    </ul>
    <!-- Filter Infos -->
    <h5 class="white-text" style="font-size:1.3rem; padding-bottom:8px; margin-bottom:0px;"><?= h(__('Filtres')) ?></h5>
    <div class="col s12 zero-padding" id="filter-bills-wrapper">
                <div class="row zero-padding" id="filter-tabs">
                     <div class="col s12 teal darken-3" style="padding-bottom:8px;">
                         <ul class="tabs tabs-fixed-width" id="tabs-bills-filter" style="background:transparent;">
                             <li class="tab col s4"><a href="#filter-by-keywords"><i class="active ion-chatbubble-working white-text small"></i></a></li>
                             <li class="tab col s4"><a href="#filter-by-dates"><i class="ion-android-calendar white-text small"></i></a></li>
                         </ul>
                     </div>
                     <div id="filter-by-keywords">
                         <div class="col s12 input-field">
                             <i class="ion-chatbubble-working prefix  teal-text small"></i>
                             <textarea class="materialize-textarea teal-text" name="keywords-search" id="keywords-search-id"></textarea>
                             <label for="keywords-search-id" class="teal-text">Mots clé(s)</label>
                         </div>
                     </div>
                     <div id="filter-by-dates">
                       <form id="form-search-by-date-bill" style="padding-top:25px;">
                            <div class="col s12">
                                <h6 class="teal-text"><?= h('Date Début') ?></h6>
                                <input type="date" class="teal-text date-filter-bill" required name="begin-date-filter-bills" id="begin-date-filter">
                            </div>
                            <div class="col s12">
                                <h6 class="teal-text"><?= h('Date Fin') ?></h6>
                                <input type="date" class="teal-text date-filter-bill" required name="end-date-filter-bills" id="end-date-filter">
                            </div>
                            <div class="row">
                                <div class="col s12 center">
                                   <button class="btn teal darken-3 white-text" id="trigger-search-by-date" style="margin-top:30px;">Rechercher</button>
                                </div>
                            </div>
                       </form>
                     </div>
                </div>
            </div>
</div>



<div class="col l10 m10 s10 info-dmp-container">
      <h5 class="dmp-main-color bold"><i class="ion-document-text dmp-main-color medium" style="padding-right:10px;" style="border-bottom:1.5px solid #130647;"></i><?= h(__('Journal de Consultation')) ?></h5>

    <table class="MyTable striped bordered bold centered" cellpadding="0" cellspacing="0" id="">
        <thead class="dmp-main-back white-text">
          <th><?= __('Code Suivi') ?></th>
          <th><?= __('Date') ?></th>
          <th><?= __('Praticien') ?></th>
          <th><?= __('email') ?></th>
          <th><?= __('Contact(s)') ?></th>
          <th><?= __('Action') ?></th>
          <th><?= __('Détails') ?></th>
          <th><?= __('Plus') ?></th>
        </thead>
          <tbody> 
                <?php foreach ($logs as $log) :?>
                  <?php foreach ($log->diaries as $diary) :?>
                    <tr class="dmp-grey-text">
                    <td>
                        <?= h($log->tracking_code) ?>
                    </td>
                    <td class="zero-padding">
                        <?php $createdLog= new \DateTime($log->created); echo $createdLog->format('d-m-Y à H:i:s'); ?>
                    </td>
                    <td class="zero-padding">
                        <?= h("Dr. ".strtoupper($log->doctor->person->lastname)." ".$log->doctor->person->firstname) ?>
                    </td>
                    <td class="zero-padding"><?= h($log->doctor->email) ?>

                    </td>
                    <td class="zero-padding">
                       <?= h($log->doctor->person->people_contact->contact1) ?><br> <br>
                     <?= h($log->doctor->person->people_contact->contact2) ?>  </td>
                    <td class="zero-padding">
                       <?= h($diary->diary_type->label) ?></td>
                    <td class="zero-padding">
                        <?php if($diary->diary_content) :?>
                                <?= $diary->diary_content ?>
                        <?php else: ?>
                            <i class="ion-minus-round dmp-main-color small"></i>
                        <?php endif; ?>
                    </td>
                    <td class="zero-padding">
                        <a href="#!">Vérifier</a>
                    </td>               
                    </tr>
                  <?php endforeach; ?>
                <?php endforeach; ?>
          </tbody>
    </table>

<div class="container">
  <div class="container">
          <p class="dmp-info-bubble bold dmp-grey-text"> 
        <i class="ion-information-circled medium dmp-main-color left" style="margin-bottom: 25px;"> </i>
        Ce tableau retrace l'ensemble des accès enregistrés sur votre dossier médical par les praticiens. En cas de doutes, veuillez  contacter par téléphone 2248-8882 ou par email le support: support@dmp-ci.com.
    </p>
  </div>
</div>

</div>
