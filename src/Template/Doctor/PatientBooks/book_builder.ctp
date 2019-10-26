<?php  $this->layout = 'book_patient_builder'; ?>
<style>
/*GENERIC CLASSES FOR TBODY CELLS*/
.table-spacement{
    margin-top: 15mm;
}

.center{
    align:center;
}

.cell-25
{
    width:25%;
}

.cell-50
{
    width:50%;
}

.cell-75
{
    width:75%;
}

.bold{
    font-weight: bold;
}
.cell-100
{
    width:100%;
}

.cell-border{
    border-bottom: 0.5px dashed blue;
     border-top: 0.5px dashed blue;
     background-color: #130647;
     color: white;
     
}

.cell-15{
    width: 15%;
}


th {
        font-weight: bold;
        text-align:left;
    }


table{width:100%;}  


table td{
    text-align:left; padding:2mm 1mm 1.4mm 0mm;
    font-size: 2.78mm;
      }

.hightlight-dark{
    background:#e0dcfb;
}

</style>
<!-- Main Cover -->
<page backcolor="#d5d6ff">
        <table style="vertical-align:top;">
                <tr>
                    <td class="cell-50" align="left">
                      <strong>Dossier Médical Personnel</strong> <br/>
                      <?= $this->Html->image("http://rhino.dev/img/assets_dmp/dmp2.png",['style'=>'width:34mm;margin-top:3mm;']) ?>
                    </td>

                    <td class="cell-50" align="right">
                    <?php if($patient->person->path_pic!==null): ?>
                      <?= $this->Html->image("http://rhino.dev/img/patient/patient_identity/".$patient->person->path_pic,['style'=>'width:25mm;margin-top:3mm;']) ?>
                    <?php else: ?>
                        <?= $this->Html->image("http://rhino.dev/img/patient/patient_identity/unknow.png",['style'=>'width:25mm;margin-top:3mm;']) ?>
                    <?php endif; ?>
                    </td>
                </tr>
         </table>   

        <!-- Body Page-Garde -->
        <table style="margin-top:25px;" align="center">
           <tr>
               <td class="" align="center" style="text-transform:uppercase; font-size:20px; width:62%; border-bottom:2px solid black;">Dossier Médical</td>
           </tr>
           <tr>
               <td class="" align="center" style="font-size:15px;">Carnet de Santé</td>
           </tr>  
       </table>


      <table style="margin-top:25px;margin-left:25mm;" align="left">
            <tr>
                <td align="left" style="font-size:15px;">
                    Code Patient : <strong> <?= $patient->code ?></strong> 
                </td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px;">
                    Nom : <strong style="text-transform:uppercase;"> <?= $patient->person->lastname ?></strong> 
                </td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px;">
                    Prénom(s) : <strong style="text-transform:uppercase;"> <?= $patient->person->firstname ?></strong> 
                </td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px;">
                    Sexe: <strong style="text-transform:uppercase;"> 
                    <?php if($patient->person->sexe==="M") echo "Masculin"; else echo "Féminin"; ?></strong> 
                </td>
            </tr>
            <tr>
              <?php $datenaiss=new \DateTime($patient->person->dateborn); 
                    $now=new \DateTime("NOW");
              ?>
                <td align="left" style="font-size:15px;">
                    Age : <strong>
                      <?php 
                            $diff_born_date = $datenaiss->diff($now);
                            echo $diff_born_date->format("%r %Y ans %m mois");
                       ?>
                    </strong> 
                </td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px;">
                    Profession : <strong style="text-transform:lowercase;"> <?= $patient->patient_companies[0]->_joinData->fonction ?></strong> 
                </td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px;">
                    Nationnalité : <strong style="text-transform:uppercase;"> <?= $patient->person->nationality ?></strong> 
                </td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px;">
                    Lieu de Naissance : <strong style="text-transform:uppercase;"> <?= $patient->person->bornplace ?></strong> 
                </td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px;">
                    Groupe Sanguin : <strong style="text-transform:uppercase;"> <?= $patient->person->blood.$patient->person->rhesus ?></strong> 
                </td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px;">
                    Situation : <strong>
                    <?php switch($patient->person->people_situation->status){
                          case 'C':
                            echo "Célibataire ";
                          break;

                          case 'M':
                            echo "Marié(e) ";
                          break;

                          case 'V':
                            echo "Veuf(ve) ";
                          break;

                          case 'D':
                            echo "Décédé ";
                          break;
                      } ?>
                     <?= $patient->person->people_situation->children.' enfant(s)' ?></strong> 
                </td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px;">
                    Taille : <strong style="text-transform:uppercase;"> <?= $patient->person->people_attribute->height.' m' ?></strong> 
                </td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px;">
                    Adresse : <strong> <?= $patient->person->people_adress->city_quarter." (".$patient->person->people_adress->city."-".$patient->person->people_adress->country.")" ?></strong> 
                </td>
            </tr>
            <tr>
                <td align="left" style="font-size:15px;">
                    Contacts : <strong style="text-transform:uppercase;"> <?= $patient->person->people_contact->contact1." <br> ".$patient->person->people_contact->contact2 ?></strong> 
                </td>
            </tr>
       </table>

    <page_footer >
            <table align="center" style="border-top:1px solid black;">
                    <tr>
                        <td align="center">
                            Dossier Médical Personnel © 2016 -Virtual Network Entreprise <br/> - tous droits réservés - <br/> <br/>
                        </td>
                    </tr>
            </table>
    </page_footer>
</page>

<!-- Antecedents -->

<page pageset="new" backcolor="#d5d6ff">
    <table style="margin-top:25px;" align="center">
           <tr>
               <td class="" align="center" style="text-transform:uppercase; font-size:20px; width:62%; border-bottom:2px solid black;">Antécédents</td>
           </tr>  
    </table>
    <table class="" cellpadding="" cellspacing="" align="center" style="margin-top:5mm;vertical-align:top;">
            <tbody>
                <tr class="" style="font-size:5mm;">
                    <td class="cell-border bold" style="font-size:3.5mm;padding:2mm;"><?= __('Description') ?></td>
                    <td class="cell-border bold" style="font-size:3.5mm;padding:2mm;"><?= __('Type') ?></td>
                    <td class="cell-border bold" style="font-size:3.5mm;padding:2mm;"><?= __('Traitement') ?></td>
                    <td class="cell-border bold" style="font-size:3.5mm;padding:2mm;"><?= __('Date de début') ?></td>
                    <td class="cell-border bold" style="font-size:3.5mm;padding:2mm;"><?= __('Date de fin') ?></td>
                    <td class="cell-border bold" style="font-size:3.5mm;padding:2mm;"><?= __('Durée') ?></td>
                </tr>
                <?php $countdown=true; ?>
                <?php foreach ($patient->patient_antecedents as $antecedent) :?>
                    <?php if($countdown) :?>
                        <?php $countdown=false; ?>
                        <tr class="hightlight-dark">
                    <?php else: ?>
                        <?php $countdown=true; ?>
                        <tr>
                    <?php endif; ?>
                        <td class="bold" align="center" style="width:12mm; border-bottom:0.5px solid dashed blue;font-size:2.9mm;"><?= $antecedent->description_antecedent ?></td>
                        <td class="bold" align="center" style="width:12mm; border-bottom:0.5px solid dashed blue;font-size:2.9mm;"><?= $antecedent->patient_antecedent_type->label_antecedent_type ?></td>
                        <td class="bold" align="center" style="width:12mm; border-bottom:0.5px solid dashed blue;font-size:2.9mm;"><?= $antecedent->treatment_antecedent ?></td>
                        <td class="bold" align="center" style="width:12mm; border-bottom:0.5px solid dashed blue;font-size:2.9mm;">
                        <?php $begin=new \DateTime($antecedent->begin); echo $begin->format("d-m-Y"); ?></td>
                        <td class="bold" align="center" style="width:12mm; border-bottom:0.5px solid dashed blue;font-size:2.9mm;">
                        <?php if($antecedent->end!==null) :?>
                            <?php $end=new \DateTime($antecedent->end); echo $end->format("d-m-Y"); ?>
                        <?php else: ?>
                            <?= "Indéfini" ?> 
                        <?php endif; ?>
                        </td>
                        <td class="bold" align="center" style="width:12mm; border-bottom:0.5px solid dashed blue;font-size:2.9mm;">

                         <?php  if( !($antecedent->end==null)) :?>
                                 <?php 
                                      $diff = $begin->diff($end);
                                      echo $diff->format("%r %Y année(s) %m mois %d jour(s)");
                                  ?>
                              <?php   else: ?>
                                  <?= __('En cours') ?>
                              <?php endif; ?>
  
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
     </table>
</page>


<!-- Vaccinations -->
<page pageset="new" backcolor="#d5d6ff">
    <table style="margin-top:25px;" align="center">
           <tr>
               <td class="" align="center" style="text-transform:uppercase; font-size:20px; width:62%; border-bottom:2px solid black;">Vaccinations</td>
           </tr>  
    </table>
</page>



<!-- Visits info & interventions -->
<?php foreach ($patient->visits as $visit) :?>


  <page pageset="new" backcolor="#d5d6ff" backtop="40mm">
      <table style="margin-top:25px;" align="center">
             <tr>
                 <td class="" align="center" style="text-transform:uppercase; font-size:25px; width:62%;">Visite</td>
             </tr> 
      </table>
      <table class="" cellpadding="" cellspacing="" align="center" style="margin-top:5mm;vertical-align:top;">
            <tr>
              <td class="cell-75" style="font-size:3.7mm; border-bottom:2px solid black; padding:5mm 0mm;border-top:2px solid black;">
                      Code: <strong><?= $visit->code_visit; ?></strong>  <br/><br/>
                      Date Création:  <strong> <?php $created_visit = new \DateTime($visit->created); echo $created_visit->format("d-m-Y à H:i:s"); ?> </strong>  <br/><br>

                      Type de passage: <strong style="text-transform:uppercase;"><?= $visit->visit_type->label ?></strong>  <br/><br>
                     
                      Etablissement: <strong><?= $visit->manager_operator->institution->fullname ?></strong> <br><br>
              </td>
            </tr>
      </table>
  </page>

    <!-- Associated Interventions -->
    <!-- Upcoming soon ... -->

    <!-- Associated Rdv -->
    <?php foreach($visit->visit_meetings as $meeting) :?>
      <?php if($meeting->done===1) :?>
      <page pageset="new" backcolor="#d5d6ff" backbottom="10mm">
         <table style="margin-top:25px;" align="center">
               <tr>
                   <td class="" align="center" style="text-transform:uppercase; font-size:20px; width:62%; border-bottom:2px solid black;">Rendez-Vous</td>
               </tr>  
        </table>
        <table class="" cellpadding="" cellspacing="" align="left" style="margin-top:5mm;vertical-align:top;">
              <tr>  
                  <td class="cell-50" align="left" style="text-align:left; font-size:3.3mm;">
                            Code rdv : <strong><?= $meeting->code_meeting; ?></strong>         <br>
                            Date Visite : <strong><?php $date_rdv=new \DateTime($meeting->modified); echo $date_rdv->format("d-m-Y à H:i:s") ?></strong>          <br>
                            
                            Praticien : Dr.  <strong style="text-transform:uppercase;"><?= $meeting->doctor->person->lastname." ".$meeting->doctor->person->firstname ?></strong>       <br>
        
                            Date Prochaine Visite :  
                            <strong><?php if($meeting->next_meeting!==null){
                                    $next_meeting= new \DateTime($meeting->next_meeting);echo $next_meeting->format("d-m-Y");
                                }else{echo "Non spécifiée";} ?> </strong>
                              <br> 
                  </td>
                  <td class="cell-50" align="right">
                      <?php if ($meeting->doctor->person->path_pic!==null) :?>
                      <?= $this->Html->image("http://rhino.dev/img/doctor/doctor_identity/".$meeting->doctor->person->path_pic,['style'=>'width:34mm;margin-top:3mm;']) ?>
                      <?php else: ?>
                       Photo Praticien
                      <?php endif; ?>
                  </td>
              </tr>
         </table>
         <table>
               <tr align="center">
                  <td class="cell-100" style="font-size:3.1mm;">Histoire de la maladie : <strong><?= $meeting->diary ?></strong> </td>
              </tr>
         </table>

          <!-- Associated Treatment -->
          <table style="margin-top:25px;" align="center">
              <tr>
                  <td class="" align="center" style="text-transform:uppercase; font-size:20px; width:62%; border-bottom:2px solid black;">Traitement</td>
              </tr>  
          </table>

          <table class="" cellpadding="" cellspacing="" align="center" style="vertical-align:top;">
                <tr>
                  <td class="cell-75" style="font-size:3.2mm;">
                      <?php if($meeting->treatment!==null) :?>
                       Libelle Traitement:  <strong><?= $meeting->treatment->description ?></strong> <br/>
                     <?php else: ?>
                       <strong>Traitement non spécifié</strong> 
                     <?php endif; ?>
                  </td>
                </tr>
          </table>

                   <!-- Associated Requirements -->
        <table style="margin-top:25px;" align="center">
               <tr>
                   <td class="" align="center" style="text-transform:uppercase; font-size:20px; width:62%; border-bottom:2px solid black;">Prescriptions</td>
               </tr>  
        </table>
        <table class="" cellpadding="" cellspacing="" align="center" style="margin-top:5mm;vertical-align:top;">
            <tbody>
                <tr class="" style="font-size:5mm;">
                    <td align="center" class="cell-border bold" style="font-size:3.5mm;padding:2mm;"><?= __('N°') ?></td>
                    <td align="center" class="cell-border bold" style="font-size:3.5mm;padding:2mm;"><?= __('Prescription') ?></td>
                    <td align="center" class="cell-border bold" style="font-size:3.5mm;padding:2mm;"><?= __('Posologie') ?></td>
                    <td align="center" class="cell-border bold" style="font-size:3.5mm;padding:2mm;"><?= __('Observations') ?></td>
                </tr>
               
                  <?php if($meeting->treatment->treatment_requirements!==null) :?>

                      <?php $countdown=true; 
                          $counter=1;
                      ?>
                      <?php foreach ($meeting->treatment->treatment_requirements as $requirement) :?>
                          <?php if($countdown) :?>
                              <?php $countdown=false; ?>
                              <tr class="hightlight-dark">
                          <?php else: ?>
                              <?php $countdown=true; ?>
                              <tr>
                          <?php endif; ?>
                              <td class="bold" align="center" style="width:5mm; border-bottom:0.5px solid dashed blue;font-size:3.1mm;"><?=  $counter ?></td>
                              <td class="bold" align="center" style="width:27mm; border-bottom:0.5px solid dashed blue;font-size:3.1mm;"><?= $requirement->label_requirement ?></td>
                              <td class="bold" align="center" style="width:27mm; border-bottom:0.5px solid dashed blue;font-size:3.1mm;"><?= $requirement->posologie_requirement ?></td>
                               <td class="bold" align="center" style="width:27mm; border-bottom:0.5px solid dashed blue;font-size:3.1mm;"><?= $requirement->obs_requirement ?></td>
                          </tr>
                          <?php $counter++; ?>

                       <?php endforeach; ?>
                    <?php endif; ?>

            </tbody>
     </table>

                <!-- Associated Examens -->
                <table style="margin-top:25px;" align="center">
                       <tr>
                           <td class="" align="center" style="text-transform:uppercase; font-size:20px; width:62%; border-bottom:2px solid black;">Examens</td>
                       </tr>  
                </table>
                <table class="" cellpadding="" cellspacing="" align="center" style="margin-top:5mm;vertical-align:top;">
                    <tbody>
                        <tr class="" style="font-size:5mm;">
                            <td align="center" class="cell-border bold" style="font-size:3.3mm;padding:2mm;"><?= __('N°') ?></td>
                            <td align="center" class="cell-border bold" style="font-size:3.3mm;padding:2mm;"><?= __('Type Examen') ?></td>
                            <td align="center" class="cell-border bold" style="font-size:3.3mm;padding:2mm;"><?= __('Examen') ?></td>
                            <td align="center" class="cell-border bold" style="font-size:3.3mm;padding:2mm;"><?= __('Renseignements Cliniques') ?></td>
                            <td align="center" class="cell-border bold" style="font-size:3.3mm;padding:2mm;"><?= __('Résultats') ?></td>
                        </tr>
                        <?php $countdown=true; 
                                $counter=1;
                        ?>
                        <?php foreach ($meeting->exam_under_types as $exam) :?>
                            <?php if($countdown) :?>
                                <?php $countdown=false; ?>
                                <tr class="hightlight-dark">
                            <?php else: ?>
                                <?php $countdown=true; ?>
                                <tr>
                            <?php endif; ?>
                                <td class="bold" align="center" style="width:5mm; border-bottom:0.5px solid dashed blue;font-size:3.1mm;"><?= $counter ?></td>
                                <td class="bold" align="center" style="width:18mm; border-bottom:0.5px solid dashed blue;font-size:3.1mm;"><?= $exam->exam_type->label_exam_type ?></td>
                                <td class="bold" align="center" style="width:18mm; border-bottom:0.5px solid dashed blue;font-size:3.1mm;">
                                <?= $exam->label_exam_under_type ?>
                                </td>
                                 <td class="bold" align="center" style="width:20mm; border-bottom:0.5px solid dashed blue;font-size:3.1mm;"><?= $exam->_joinData->obs_exam ?></td>
                                 <td class="bold" align="center" style="width:22mm; border-bottom:0.5px solid dashed blue;font-size:3.1mm;"><?= $exam->_joinData->result_exam ?>
                                   
                                 </td>
                            </tr>
                            <?php $counter++; ?>
                        <?php endforeach; ?>
                    </tbody>
             </table>
         </page>
       <?php endif; ?>
    <?php endforeach; ?>
<?php endforeach; ?>





<!-- Notes 1 -->
<page pageset="new" backcolor="#d5d6ff">
    <table style="margin-top:25px;" align="center">
           <tr>
               <td class="" align="center" style="text-transform:uppercase; font-size:20px; width:62%; border-bottom:2px solid black;">Notes</td>
           </tr>  
    </table>
</page>

<!-- End Cover-->
<page backcolor="#d5d6ff" backimg="http://rhino.dev/img/assets_dmp/dmp2-trans.png">
      <page_footer>
            <table align="center" style="border-top:1px solid black;">
                    <tr>
                        <td align="center">
                            Dossier Médical Personnel © 2016 -Virtual Network Entreprise <br/> - tous droits réservés - <br/> <br/>
                        </td>
                    </tr>
            </table>
     </page_footer>
</page>

<!-- Notes 2 -->
<page pageset="new" backcolor="#d5d6ff">
    <table style="margin-top:25px;" align="center">
           <tr>
               <td class="" align="center" style="text-transform:uppercase; font-size:20px; width:62%; border-bottom:2px solid black;">Notes</td>
           </tr>  
    </table>
</page>

