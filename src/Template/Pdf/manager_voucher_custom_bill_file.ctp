<div class="col s12 center" style="border-bottom: 1px dotted black;">
   <?= $this->Html->image('manager/'.$institution['slug'].'/assets/'.$institution['logo_institution_2'],['style'=>'width:100px;','fullBase'=>true]) ?>
</div>
<div class="col s12 center" style="border-bottom: 1px dotted black;">
	<?= h(__('Reçu paiement-facture visite')) ?>
</div>
<div class="row" style="border-bottom: 1px dotted black;">
<?php $now= new \DateTime('NOW'); ?>
	<div class="col s12">
		<div class="col s4">Date</div>
		<div class="col s8 bold right-align"><?= $now->format('d-m-Y H:i') ?></div>
	</div>

	<div class="col s12">
		<div class="col s4">Opérateur</div>
		<div class="col s8 bold right-align"><?= $manager['person']['lastname'].' '.$manager['person']['firstname'] ?></div>
	</div>


	<div class="col s12">
		<div class="col s4 bold">Code Visite</div>
		<div class="col s8 bold right-align"><?= $visit_invoice->visit->code_visit ?></div>
	</div>

	<div class="col s12">
		<div class="col s4 bold">Facture</div>
		<div class="col s8 bold right-align"><?= $visit_invoice->code_invoice ?></div>
	</div>
</div>

<div class="col s12 zero-padding zero-margin">
	<div class="col s12">
		<div class="col s6 dmp-grey-back zero-padding">Montant HT</div>
		<?php if($visit_invoice->visit_invoice_payment_way_id===3) :?>
			<div class="col s6 zero-padding right-align" style="background:#cccccc;"><?= number_format(($visit_invoice->visit_invoice_payments[0]->amount-$visit_invoice->visit_invoice_payments[0]->amount*0.18),2,',','.').' CFA' ?></div>
		<?php else: ?>
			<div class="col s6 zero-padding right-align" style="background:#cccccc;"><?= number_format(($visit_invoice->amount-$visit_invoice->amount*0.18),2,',','.').' CFA' ?></div>
		<?php endif; ?>
	</div>
		<div class="col s12">
		<div class="col s6 dmp-grey-back zero-padding">Montant TTC</div>
			<?php if($visit_invoice->visit_invoice_payment_way_id===3) :?>
				<div class="col s6 zero-padding right-align" style="background:#cccccc;"><?= number_format($visit_invoice->visit_invoice_payments[0]->amount,2,',','.').' CFA' ?></div>
			<?php else: ?>
				<div class="col s6 zero-padding right-align" style="background:#cccccc;"><?= number_format($visit_invoice->amount,2,',','.').' CFA' ?></div>
			<?php endif; ?>
	</div>
	<div class="col s12">
		<div class="col s6 dmp-grey-back zero-padding">Moyen Paiement</div>
		<div class="col s6 zero-padding right-align" style="background:#cccccc;"><?php 
				switch($visit_invoice->type){
					case 'cash':
						echo 'Cash';
					break;

					case 'cb':
						echo 'Chèque/CB';
					break;

					case 'insurance':
						echo 'Part Assuré '.$visit_invoice->perc_insurance_setting_mode.'%(Cash)';
					break;
				}
		 ?></div>
	</div>
	<div class="col s12">
		<div class="col s6 dmp-grey-back zero-padding">Montant Versé</div>
		<?php if($visit_invoice->visit_invoice_payment_way_id===3) :?>
			<div class="col s6 zero-padding right-align" style="background:#cccccc;"><?= number_format($visit_invoice->visit_invoice_payments[0]->amount_receive,2,',','.').' CFA' ?></div>
		<?php else: ?>
			<div class="col s6 zero-padding right-align" style="background:#cccccc;"><?= number_format($visit_invoice->amount_receive,2,',','.').' CFA' ?></div>
		<?php endif; ?>
	</div>
	<div class="col s12">
		<div class="col s6 dmp-grey-back zero-padding">Rendu</div>
		<?php if($visit_invoice->visit_invoice_payment_way_id===3) :?>
			<div class="col s6 zero-padding right-align" style="background:#cccccc;"><?= number_format(($visit_invoice->visit_invoice_payments[0]->amount_receive-$visit_invoice->visit_invoice_payments[0]->amount),2,',','.').' CFA' ?></div>
		<?php else: ?>
			<div class="col s6 zero-padding right-align" style="background:#cccccc;"><?= number_format(($visit_invoice->amount-$visit_invoice->amount_receive),2,',','.').' CFA' ?></div>
		<?php endif; ?>

	</div>
</div>
