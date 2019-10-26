<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Patient Insurer'), ['action' => 'edit', $patientInsurer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Patient Insurer'), ['action' => 'delete', $patientInsurer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientInsurer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Patient Insurers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Insurer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patient Insurances'), ['controller' => 'PatientInsurances', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Insurance'), ['controller' => 'PatientInsurances', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="patientInsurers view large-9 medium-8 columns content">
    <h3><?= h($patientInsurer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label') ?></th>
            <td><?= h($patientInsurer->label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Logo Insurance') ?></th>
            <td><?= h($patientInsurer->logo_insurance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($patientInsurer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($patientInsurer->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Patient Insurances') ?></h4>
        <?php if (!empty($patientInsurer->patient_insurances)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Number Card') ?></th>
                <th scope="col"><?= __('Patient Insurer Id') ?></th>
                <th scope="col"><?= __('Patient Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Expired Insurance Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($patientInsurer->patient_insurances as $patientInsurances): ?>
            <tr>
                <td><?= h($patientInsurances->id) ?></td>
                <td><?= h($patientInsurances->number_card) ?></td>
                <td><?= h($patientInsurances->patient_insurer_id) ?></td>
                <td><?= h($patientInsurances->patient_id) ?></td>
                <td><?= h($patientInsurances->created) ?></td>
                <td><?= h($patientInsurances->modified) ?></td>
                <td><?= h($patientInsurances->deleted) ?></td>
                <td><?= h($patientInsurances->expired_insurance_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PatientInsurances', 'action' => 'view', $patientInsurances->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PatientInsurances', 'action' => 'edit', $patientInsurances->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PatientInsurances', 'action' => 'delete', $patientInsurances->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientInsurances->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
