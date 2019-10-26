<?php  $this->layout = 'default'; ?>
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


th {
        font-weight: bold;
        text-align:left;
    }


table{width:100%;}  

table tr{
    border-bottom:solid 2mm pink !important;
}

table td{
    text-align:left; padding:2mm 1mm 1.4mm 0mm;
    font-size: 2.78mm;
      }

</style>

<page backcolor="#d5d6ff" backimg="http://rhino.dev/img/assets_dmp/dmp2-trans.png">
	
    <table style="vertical-align:top;">
         <tr>
            <td class="cell-50" align="left">Dossier Médical Personnel <strong><?= h($requirements[0]->patient->code) ?>
                <br/><br/>
            <?= h($requirements[0]->patient->person->lastname." ".$requirements[0]->patient->person->firstname) ?>
            </strong></td>
            <td class="cell-50" align="right">
            République de Côte d'Ivoire <br>
            Ministère de la Santé et de la lutte contre le SIDA</td>
        </tr>
        <tr>
            <td class="cell-50" align="left">
            <strong>Code rdv :</strong> <?= h($requirements[0]->code_meeting) ?> <br/>
            <strong>Date rdv : </strong> <?php $created=new \DateTime($requirements[0]->modified); echo $created->format("d-m-Y à H:i:s");?> <br>
            <strong>Medecin Traitant : Dr. <span style="text-transform:uppercase;">  <?= $requirements[0]->doctor->person->lastname." ".$requirements[0]->doctor->person->firstname ?></span></strong>
            </td>
        </tr>  
    </table>

    <table style="border-bottom:1.8px solid black;margin-top:25px;" align="center">
           <tr>
               <td class="" align="center" style="text-transform:uppercase; font-size:20px; width:62%;">Ordonnance Médicale</td>
           </tr> 
    </table>

    <table style="margin-top:5mm;">
        <tr>
            <td class='cell-100' style="font-size:3.3mm;"><strong>Histoire de la maladie : </strong> <?= $requirements[0]->diary ?></td>
        </tr>
    </table>

    <table align="center" style="margin-top:8mm;border-bottom:0.5px dashed blue;">

            <tr>
                <td class="cell-25" style="font-size:3.7mm; font-weight:bold;border-bottom:0.5px dashed blue;border-top:0.5px dashed blue;">Prescription</td>
                <td class="cell-25" align="left" style="font-size:3.7mm; font-weight:bold;border-bottom:0.5px dashed blue;border-top:0.5px dashed blue;">Posologie</td>
              
                <td class="cell-50" style="font-size:3.7mm; font-weight:bold;border-bottom:0.5px dashed blue;border-top:0.5px dashed blue;">Indications complémentaires</td>
            </tr>

        <?php foreach ($requirements[0]->treatment->treatment_requirements as $requirement) :?>
            <tr>
                <td class="cell-25"><?= $requirement->label_requirement ?></td>
                <td class="cell-25"><?=  $requirement->posologie_requirement ?></td>
                <td class="cell-50"><?= $requirement->obs_requirement ?></td>
            </tr>
        <?php endforeach; ?>

  
    </table>

    <table style="margin-top:40px;">
        <tr>
            <td class="cell-50" style="font-size:3.3mm;"">Conclusion:</td>
            <td class="cell-50" align="right" style="font-size:3.1mm;text-decoration:underline;"><strong>Signature & Cachet</strong></td>
        </tr>
    </table>



    <page_footer >
     
     <table align="center">
            <tr align="center">
                <td align="center cell-100" style="font-size:2.3mm;">
                    Ce document représente un authentique réquisitoire d'requirementsens médicaux, après apposition du cachet et de la signature du medecin traitant
                </td>
            </tr>
     </table>
            <table align="center" style="border-top:1px solid black;">
                    <tr>
                        <td align="center">
                            Dossier Médical Personnel © 2016 - tous droits réservés - Virtual Network Entreprise<br/>
                            22-48-88-82 <br/>

                        </td>
                    </tr>
            </table>
    </page_footer>
</page>