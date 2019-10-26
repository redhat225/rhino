<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Patient Act'), ['action' => 'edit', $patientAct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Patient Act'), ['action' => 'delete', $patientAct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientAct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Patient Acts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Act'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patient Act Details'), ['controller' => 'PatientActDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Act Detail'), ['controller' => 'PatientActDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="patientActs view large-9 medium-8 columns content">
    <h3><?= h($patientAct->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label Patient Act') ?></th>
            <td><?= h($patientAct->label_patient_act) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($patientAct->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Patient Act Details') ?></h4>
        <?php if (!empty($patientAct->patient_act_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Patient Id') ?></th>
                <th scope="col"><?= __('Patient Act Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($patientAct->patient_act_details as $patientActDetails): ?>
            <tr>
                <td><?= h($patientActDetails->id) ?></td>
                <td><?= h($patientActDetails->patient_id) ?></td>
                <td><?= h($patientActDetails->patient_act_id) ?></td>
                <td><?= h($patientActDetails->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PatientActDetails', 'action' => 'view', $patientActDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PatientActDetails', 'action' => 'edit', $patientActDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PatientActDetails', 'action' => 'delete', $patientActDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientActDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
