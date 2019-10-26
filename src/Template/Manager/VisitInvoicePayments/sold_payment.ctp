<?php $this->layout='sold_payment_voucher_builder' ?>
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
                    <?php if($payment->visit_invoice_payment_method_id=='2') :?>
                            <?php if($payment->visit_invoice->visit_invoice_payment_way_id=='3') :?>
                             <strong style="font-size:3.3mm;">Attestation Paiement Visite - Part Assureur</strong> 
                           <?php else: ?>
                             <strong style="font-size:3.3mm;">Attestation Paiement Visite - Chèque/CB</strong> 
                         <?php endif; ?>
                    <?php else: ?>
                           <strong style="font-size:3.3mm;">Reçu paiement visite</strong> 
                    <?php endif; ?>
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
                        <?= $payment->visit_invoice->visit->code_visit ?> <br>
                      </p>

                    </td>
                </tr>
            </table>


    <table align="center" style="vertical-align:top;">
        <tbody>
            <tr>
               <td class="bold center" style="border-bottom:0.2mm dotted grey; width:13mm; text-align:center;">Désignation</td>
              <td class="bold center" style="border-bottom:0.2mm dotted grey; width:13mm; text-align:center;">Pu*Qte</td>
              <td class="bold center" style="border-bottom:0.2mm dotted grey; width:13mm; text-align:center;">Montant HT</td>
              <td class="bold center" style="border-bottom:0.2mm dotted grey; width:13mm; text-align:center;">Montant TTC</td>
           </tr>

            <tr>
                <td style="border-bottom:dotted 0.15mm grey; width:13mm;">
                        <?= 'Visite '.$payment->visit_invoice->visit->visit_speciality->libelle ?>
                </td>
                <td class="" align="center" style="border-bottom:dotted 0.15mm grey; width:13mm;"><?= $payment->amount.' * 1' ?></td>
                    <td class="" align="center" style="border-bottom:dotted 0.15mm grey; width:13mm;"><?= number_format(($payment->amount-(0.18*$payment->amount)),2,',','.') ?></td>
                    <td class="" align="center" style="border-bottom:dotted 0.15mm grey; width:13mm;"><?= number_format($payment->amount,2,',','.') ?></td>
            </tr>

        </tbody>
    </table>

    <table>

            <tr class="light-blue-row">
                <td class="cell-50"><strong>Total</strong></td>
                  <td class="cell-50" align="right"><?= number_format($payment->amount,2,',','.').' F CFA' ?></td>
            </tr>
            <?php if($payment->visit_invoice_payment_method_id=='2') :?>
               <tr class="light-red-row">
                 <td class="cell-50"><strong>Référence</strong></td>
                 <td class="cell-50" align="right"><?= $payment->reference_payment ?></td>
               </tr>
            <?php else: ?>
              <tr class="light-red-row">
                <td class="cell-50"><strong>Montant versé</strong></td>
                <td class="cell-50" align="right"><?= number_format($payment->amount_receive,2,',','.').' F CFA' ?></td>
              </tr>
              <tr class="light-blue-row">
                <td class="cell-50"><strong>Rendu</strong></td>
                <td class="cell-50" align="right"><?= number_format($payment->amount_receive-$payment->amount,2,',','.').' F CFA' ?></td>
              </tr>
            <?php endif; ?>
    </table>

</page>