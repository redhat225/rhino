<tr class="item-invoice-meeting zero-margin zero-padding">
	<td class="zero-padding zero-margin">
		<input type="hidden" name="item_name[]" class="name_item">
	</td>
	<td class="zero-padding zero-margin">
		<div class="col s12 input-field">
			<select name="visit_invoice_item_id[]" class="visit_invoice_item_select">
					<option value="">Selectionnez une valeur</option>
				<?php foreach ($items as $item) :?>
					<option value="<?= $item->id ?>"><?= $item->label_item ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</td>
	<td class="zero-padding zero-margin">
		<div class="col s12 input-field">
			<input type="number" name='amount[]' class="unity-price item-additional-element" />
		</div>
	</td>
	<td class="zero-padding zero-margin">
		<div class="col s12 input-field">
			<input type="number" name='qty[]' class="item-qte item-additional-element" />
		</div>		
	</td>
	<td class="zero-padding zero-margin">
		<div class="col s12 input-field">
			<input type="number" name='total_amount[]' class="total-amount-item" readonly />
		</div>		
	</td>
	<td class='retrieve-element-wrapper'>
		<i class="ion-close-circled small dmp-orange-text retrieve-item-element pointer-opaq"></i>
	</td>
</tr>