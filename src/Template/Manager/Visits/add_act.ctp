<tr class="item-act-visit zero-margin zero-padding">
	<td class="zero-margin zero-padding dmp-main-color bold">
	</td>
	<td class="zero-margin zero-padding">
		<div class="col s12 input-field">
			<select name="visit_act_id[]" id="" class="required">
				<?php foreach ($acts as $act) :?>
					<option value="<?= $act->id ?>"><?= $act->label ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</td>
	<td class="zero-margin zero-padding">
		<div class="col s12 input-field">
			<input name="details[]" id="" class=""/>
		</div>
	</td>
	<td class="remove-item-act pointer-opaq">
		<i class="ion-close-circled dmp-main-color small"></i>
	</td>
</tr>