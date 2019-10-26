<?php $this->layout="generator_invoice_meeting"; ?>

<?php $this->start('invoice_content') ?>

<style>
/*GENERIC CLASSES FOR TBODY CELLS*/
.table-spacement{
    margin-top: 15mm;
}

.center{
    align:center;
}

.cell-20{
    width:20%;
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
    width:1mm;
}

.bold{
    font-weight: bold;
}
.cell-100
{
    width:100%;
}


th {
        font-weight: bold;
        text-align:left;
    }


table{width:100%;}  

table tr{
    border-bottom:solid 2mm #130647 !important;
}

table td{
    text-align:left; padding:2mm 1mm 1.4mm 0mm;
    font-size: 2.78mm;
      }


/*Classes for img*/
td.logo-wrapper-circle{
position: relative;
left: 5%;
border:1mm solid #130647;
width: 27mm;
height: 22mm;
border-radius: 17mm;
background: white;
overflow: hidden;
-webkit-filter:50%;
-moz-filter: 50%;
}

td.logo-wrapper-circle img{
    position: relative;
    width: 23mm;
}

/*Classes for background tr*/
.light-blue-row{
    background:#ececec;
}
.light-red-row{
    background: #bbbbbb;
}

</style>

<page backcolor="#ffffff">
           <table align="center">
                <tr>
                    <td align="center" class="cell-100">
                        <?= $this->Html->image('http://rhino.dev/img/manager/'.$institution->slug.'/assets/'.$institution->logo_institution_2,['style'=>"width:60px;"]); ?>
                    </td>     
                </tr>
                <tr>
                    <td align="center" class="cell-100">
                           <strong style="font-size:3.3mm;">Facture <?= $visit->visit_invoices[0]->label_invoice ?></strong> 
                    </td>  
                </tr>
            </table>


            <table align="center"  style="border-top:dashed 0.1mm grey;vertical-align:top;">
                <tr>
                    <td align="left" class="cell-50" >
                        <p>
                            <strong>Date: </strong> <br>
                            <strong>N°Facture: </strong>  <br>
                            <strong>Code Visite:</strong> <br>
                            <strong>Opérateur: </strong> <br>
                        </p>
                    </td>
                    <td align="right" class="cell-50">
                        <p style="text-align:left;">
                            <?php $nowDate = new \DateTime('NOW'); echo $nowDate->format('d-m-Y H:i:s');?> <br>
                            <?= $visit->visit_invoices[0]->code_invoice ?> <br>
                            <?= $visit->code_visit ?> <br>
                            <strong><?= $operator['person']['lastname']." ".$operator['person']['firstname'] ?></strong> <br/>
                        </p>

                    </td>
                </tr>
            </table>


            <table align="center"  style="border-top:dashed 0.1mm grey;vertical-align:top;">
                <tr>
                    <td align="center" class="cell-100" style="font-size:3.5mm; font-weight:bold;">
                      Détails de la facture 
                    </td>
                </tr>
            </table>

            <table align="center" style="vertical-align:top;">

                <tbody>
                    <tr class="light-blue-row">
                            <td align="" class="bold" style="font-size:3mm;width:31mm;">Patient:</td>
                            <?php if($visit->patient_id!==0) :?>
                            <td align="" class="bold" style="font-size:3mm;width:31mm;"><?= $patient->person->lastname." ".$patient->person->firstname ?></td>
                            <?php else: ?>
                            <td align="" class="bold" style="font-size:3mm;width:31mm;"><?= h('Patient Inconnu') ?></td>
                            <?php endif; ?>
                        </tr>
                        <tr class="light-red-row">
                            <td align="" class="bold" style="font-size:3mm;width:31mm;">Spécialité:</td>
                            <td align="" class="bold" style="font-size:3mm;width:31mm; "><?= $visit->search_speciality    ?></td>
                        </tr>
                        <tr class="light-blue-row">
                            <td align="left " class="bold" style="font-size:3mm;width:31mm;">Montant rdv:</td>
                            <td align="" class="bold" style="font-size:3mm;width:31mm;"><?= $visit->visit_invoices[0]->amount." F CFA" ?></td>
                        </tr>
                    <?php if($visit->visit_invoice_payment_way_id=="1"): ?>
                        <tr class="light-red-row">
                            <td align="left " class="bold" style="font-size:3mm;width:31mm;">Moyen de Paiement:</td>
                            <td align=" " class="bold" style="font-size:3mm;width:31mm;">Cash</td>
                        </tr>
                    <?php elseif($visit->visit_invoice_payment_way_id=="2"): ?>
                        <tr class="light-red-row">
                            <td align="left" class="bold" style="font-size:3mm;width:31mm;">Moyen de Paiement:</td>
                            <td align="" class="" style="font-size:3mm;width:31mm;">Chèque/CB</td>
                        </tr>
                        <tr class="light-blue-row">
                            <td align="left" class="bold" style="font-size:3mm;width:31mm;">Référence Paiment:</td>
                            <td align="" class="" style="font-size:3mm;width:31mm;"><?= $visit->bank_reference ?></td>
                        </tr>

                    <?php elseif($visit->visit_invoice_payment_way_id=="3") :?>

                        <tr class="light-red-row">
                            <td align="left" class="bold" style="font-size:3mm;width:31mm;">Moyen de Paiement: 
                            </td>
                            <td align="" class="" style="font-size:3mm;width:31mm;">Assurances
                            </td>
                        </tr>
                        <tr class="light-blue-row">
                            <td align="left" class="bold" style="font-size:3mm;width:31mm; ">Ref Assureur:   
                            </td>
                            <td align="" class="" style="font-size:3mm;width:31mm;"><?= $visit->insurance_patient_select ?>
                            </td>
                        </tr>
                        <tr class="light-red-row">
                            <td align="left" class="bold" style="font-size:3mm;width:31mm;">Part Assureur: (<strong><?= $visit->perc_insurance."%" ?></strong>) </td>
                            <td align="" class="" style="font-size:3mm;width:31mm;"><?= $visit->visit_invoices[0]->visit_invoice_payments[1]->amount." F CFA" ?></td>
                        </tr>
                        <tr class="light-blue-row">
                            <td align="left" class="bold" style="font-size:3mm;width:31mm;">Part Assuré: (<strong><?= (100-$visit->perc_insurance)."%" ?></strong>)</td>
                            <td align="" class="" style="font-size:3mm;width:31mm;"><?= $visit->visit_invoices[0]->visit_invoice_payments[0]->amount." F CFA" ?></td>
                        </tr>

                    <?php elseif($visit->visit_invoice_payment_way_id=="4"): ?>
                        <tr class="light-red-row">
                            <td align="left" class="bold" style="font-size:3mm;width:31mm;">Moyen de Paiement:</td>
                            <td align="" class="" style="font-size:3mm;width:31mm;">Réservation</td>
                        </tr>       
                    <?php else :?>
                            <tr class="light-red-row">
                            <td align="left" class="bold" style="font-size:3mm;width:31mm;">Moyen de Paiement:</td>
                            <td align="" class="" style="font-size:3mm;width:31mm;">Echelonnement</td>
                        </tr>   
                            <?php for ($i=0; $i<count($visit->multiple_payment);$i++) :?>
                                <?php $date_expected_sold = new DateTime($visit->multiple_payment_dates[$i]) ?>
                                 <?php if( $visit->multiple_payment[$i]!=='') :?>
                                    <tr class="<?= $i%2===0?'light-blue-row':'light-blue-row' ?> cell-100">

                                        <td align="left" class="bold" style="font-size:3mm;width:31mm;">Reglement <?= ($i+1)  ?>:  
                                        </td>
                                        <td align="" class="" style="font-size:3mm;width:31mm;"><?= $visit->multiple_payment[$i]."F CFA" ?>
                                        / <?= $date_expected_sold->format('d-m-Y')   ?></td>
                                    </tr>
                                 <?php endif; ?>
                            <?php endfor; ?>
                    <?php endif; ?>

                    <tr class="light-blue-row">
                        <td align="left " class="bold" style="font-size:3mm;width:31mm;">Praticien:</td>
                        <?php if($visit->search_doctor!=='') :?>
                        <td align=" " class="" style="font-size:3mm;width:31mm;"><?= 'Dr. '.$visit->search_doctor ?></td>
                        <?php else: ?>
                        <td align=" " class="" style="font-size:3mm;width:31mm;"><?= 'Dr. Non spécifié' ?></td>
                    <?php endif; ?>
                    </tr>
                    <tr class="light-red-row">
                        <td align="left " class="bold" style="font-size:3mm;width:31mm;">Date de Rdv:</td>
                        <?php 
                            $expectedDate = new \DateTime($visit->visit_intervention_doctors[0]->expected_meeting_date);
                        ?>
                        <td align=" cell-75" class="" style="font-size:3mm;width:31mm;"><?= $expectedDate->format('d-m-Y H:i:s') ?></td>
                    </tr>
                </tbody>
            </table>

         <table align="center">
                <tr align="center">
                    <td align="center cell-100" style="font-size:2.3mm;">
                        Ce document représente une authentique facture.
                    </td>
                </tr>
         </table>

        <table align="center" style="border-top:0.1mm dashed grey;border-bottom:0.1mm dashed grey;">
    	            <tr>
    	                <td align="center" class="cell-100">
    	                    <strong> <?= $institution->institution_greeting ?></strong>  <br>     <br>
    	                    <?= $institution->country_township->country_city->label_city." ". $institution->country_township->label_township." - ".$institution->institution_quarter ?><br>  

    	                    Contacts : <?= $institution->institution_adress->tel." / ".$institution->institution_adress->contact1." / ".$institution->institution_adress->contact2 ?> <br> <br>
    	                    <?php if($institution->institution_adress->website!=="") :?>  
    	                      <strong><?= $institution->institution_adress->website ?></strong>
    	                    <?php else: ?>
    						  <strong><?= $institution->institution_adress->email ?></strong>
    	                    <?php endif; ?>
    	                </td>      
    	            </tr>
        </table>

</page>
<?php $this->end() ?>

<!-- If its a cash payment / assured part cash payment -->
<?php $this->start('voucher_content') ?>
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
        width:1mm;
    }

    .bold{
        font-weight: bold;
    }
    .cell-100
    {
        width:100%;
    }


    th {
            font-weight: bold;
            text-align:left;
        }


    table{width:100%;}  

    table tr{
        border-bottom:solid 1mm grey !important;
    }

    table td{
        text-align:left; padding:2mm 1mm 1.4mm 0mm;
        font-size: 2.78mm;
          }


    /*Classes for img*/
    td.logo-wrapper-circle{
    position: relative;
    left: 5%;
    border:1mm solid #130647;
    width: 27mm;
    height: 22mm;
    border-radius: 17mm;
    background: white;
    overflow: hidden;
    -webkit-filter:50%;
    -moz-filter: 50%;
    }

    td.logo-wrapper-circle img{
        position: relative;
        width: 23mm;
    }

    /*Classes for background tr*/
.light-blue-row{
    background:#ececec;
}
.light-red-row{
    background: #bbbbbb;
}

</style>

<page backcolor='#ffffff'>

           <table align="center">
                <tr>
                    <td align="center" class="cell-100" style="font-size:3mm;">
                        <?= $institution->fullname; ?>
                    </td>     
                </tr>
                <tr>
                    <td align="center" class="cell-100">
                           <strong style="font-size:3.3mm;">Reçu Paiement Rdv</strong> 
                    </td>  
                </tr>
            </table>

            <table align="center"  style="border-top:dashed 0.2mm grey;vertical-align:top;border-bottom:dashed 0.2mm grey;">
                <tr>
                    <td align="left" class="cell-50">
                        <p>
                        <strong>Date</strong> <br>
                        <strong>Opérateur</strong> <br>
                        <strong>Code visite: </strong> <br> 
                        </p>
                    </td>
                    <td align="right" class="cell-50">
                      <p style="text-align:left;">
                        <?php $nowDate = new \DateTime('NOW'); echo $nowDate->format('d-m-Y H:i:s') ?> <br>
                        <strong><?= $operator['person']['lastname']." ".$operator['person']['firstname'] ?></strong> <br/> 
                        <?= $visit->code_visit ?> <br>
                      </p>

                    </td>
                </tr>
            </table>


    <table align="center" style="vertical-align:top;">
        <tbody>
            <tr>
               <td class="bold center" style="border-bottom:0.2mm dotted grey; width:25%; text-align:center;">Désignation</td>
              <td class="bold center" style="border-bottom:0.2mm dotted grey; width:25%; text-align:center;">Pu*Qte</td>
              <td class="bold center" style="border-bottom:0.2mm dotted grey; width:25%; text-align:center;">Montant HT</td>
              <td class="bold center" style="border-bottom:0.2mm dotted grey; width:25%; text-align:center;">Montant TTC</td>
           </tr>
            <tr>
             <?php if($visit->visit_invoice_payment_way_id=='3') :?>
                <td style="border-bottom:dotted 0.15mm grey; width:13mm;">
                        <?php 

                                    switch($visit->visit_type_id)
                                    {
                                        case '1':
                                            echo 'Consultation '.$visit->search_speciality;
                                        break;

                                        case '7':
                                            echo 'Consultation Urgente - '.$visit->search_speciality;
                                        break;
                                    }

                             ?>
                </td>
                <td class="" align="center" style="border-bottom:dotted 0.15mm grey; width:13mm;"><?= $visit->visit_invoices[0]->visit_invoice_payments[0]->amount.' * 1' ?></td>
                    <td class="" align="center" style="border-bottom:dotted 0.15mm grey; width:13mm;"><?= number_format(($visit->visit_invoices[0]->visit_invoice_payments[0]->amount-(0.18*$visit->visit_invoices[0]->visit_invoice_payments[0]->amount)),2,',','.') ?></td>
                    <td class="" align="center" style="border-bottom:dotted 0.15mm grey; width:13mm;"><?= number_format($visit->visit_invoices[0]->visit_invoice_payments[0]->amount,2,',','.') ?></td>
             <?php else: ?>
                <td class="" align="center" style="border-bottom:dotted 0.15mm grey; width:13mm;">
                            <?php 
                                    switch($visit->visit_type_id)
                                    {
                                        case '1':
                                            echo 'Consultation '.$visit->search_speciality;
                                        break;

                                        case '7':
                                            echo 'Consultation Urgente - '.$visit->search_speciality;
                                        break;
                                    }

                             ?>
                </td>
                <td class="" align="center" style="border-bottom:dotted 0.15mm grey; width:13mm;"><?= $visit->montant.' * 1' ?></td>
                    <td class="" align="center" style="border-bottom:dotted 0.15mm grey; width:13mm;"><?= number_format(($visit->montant-(0.18*$visit->visit_invoices[0]->visit_invoice_payments[0]->amount)),2,',','.') ?></td>
                    <td class="" align="center" style="border-bottom:dotted 0.15mm grey; width:13mm;"><?= number_format($visit->montant,2,',','.') ?></td>
             <?php endif; ?>
            </tr>

            <?php if(isset($visit->visit_invoice_item_id)) :?>
                    <?php for($i=0;$i<count($visit->visit_invoice_item_id);$i++) :?>
                            <tr align="center" style="text-align:center;">
                                <td style="text-align:center;border-bottom:0.2mm dotted grey;"><?= $visit->item_name[$i] ?></td>
                               
                                <td style="text-align:center;border-bottom:0.2mm dotted grey;"><?= $visit->amount[$i].' * '.$visit->qty[$i] ?></td>
                                <td style="text-align:center;border-bottom:0.2mm dotted grey;"><?= number_format((($visit->amount[$i]*$visit->qty[$i])-(0.18*($visit->amount[$i]*$visit->qty[$i]))),2,',','.') ?></td>
                                <td style="text-align:center;border-bottom:0.2mm dotted grey;"><?= number_format($visit->amount[$i]*$visit->qty[$i],2,',','.') ?></td>

                            </tr>
                    <?php endfor; ?>
            <?php endif; ?>

            


        </tbody>
    </table>

    <table>

            <tr class="light-blue-row">
                <td class="cell-50"><strong>Total</strong></td>
                <?php if ($visit->visit_invoice_payment_way_id!='3') :?>
                  <td class="cell-50" align="right"><?= number_format($visit->visit_invoices[0]->amount,2,',','.')."F CFA" ?></td>
                <?php else: ?>
                  <td class="cell-50" align="right"><?= number_format($visit->visit_invoices[0]->visit_invoice_payments[0]->amount,2,',','.')."F CFA" ?></td>
                <?php endif; ?>
            </tr>
            <tr class="light-red-row">
                <td class="cell-50"><strong>Montant versé</strong></td>
                <td class="cell-50" align="right"><?= number_format($visit->visit_invoices[0]->visit_invoice_payments[0]->amount_receive,2,',','.').' F CFA' ?></td>
            </tr>
            <tr class="light-blue-row">
                <td class="cell-50"><strong>Rendu</strong></td>
                <td class="cell-50" align="right"><?= number_format($visit->visit_invoices[0]->visit_invoice_payments[0]->amount_receive-$visit->visit_invoices[0]->visit_invoice_payments[0]->amount,2,',','.').' F CFA' ?></td>
            </tr>
    </table>

</page>
<?php $this->end(); ?>
