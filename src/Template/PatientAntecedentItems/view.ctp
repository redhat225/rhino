<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Patient Antecedent Item'), ['action' => 'edit', $patientAntecedentItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Patient Antecedent Item'), ['action' => 'delete', $patientAntecedentItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientAntecedentItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Patient Antecedent Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Antecedent Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patient Antecedent Under Types'), ['controller' => 'PatientAntecedentUnderTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Antecedent Under Type'), ['controller' => 'PatientAntecedentUnderTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patient Antecedents'), ['controller' => 'PatientAntecedents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Antecedent'), ['controller' => 'PatientAntecedents', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="patientAntecedentItems view large-9 medium-8 columns content">
    <h3><?= h($patientAntecedentItem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label Item') ?></th>
            <td><?= h($patientAntecedentItem->label_item) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient Antecedent Under Type') ?></th>
            <td><?= $patientAntecedentItem->has('patient_antecedent_under_type') ? $this->Html->link($patientAntecedentItem->patient_antecedent_under_type->id, ['controller' => 'PatientAntecedentUnderTypes', 'action' => 'view', $patientAntecedentItem->patient_antecedent_under_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($patientAntecedentItem->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Patient Antecedents') ?></h4>
        <?php if (!empty($patientAntecedentItem->patient_antecedents)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Patient Id') ?></th>
                <th scope="col"><?= __('Patient Antecedent Item Id') ?></th>
                <th scope="col"><?= __('Scope Antecedent') ?></th>
                <th scope="col"><?= __('Intensity') ?></th>
                <th scope="col"><?= __('Antecedent Note') ?></th>
                <th scope="col"><?= __('Begin') ?></th>
                <th scope="col"><?= __('End') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($patientAntecedentItem->patient_antecedents as $patientAntecedents): ?>
            <tr>
                <td><?= h($patientAntecedents->id) ?></td>
                <td><?= h($patientAntecedents->patient_id) ?></td>
                <td><?= h($patientAntecedents->patient_antecedent_item_id) ?></td>
                <td><?= h($patientAntecedents->scope_antecedent) ?></td>
                <td><?= h($patientAntecedents->intensity) ?></td>
                <td><?= h($patientAntecedents->antecedent_note) ?></td>
                <td><?= h($patientAntecedents->begin) ?></td>
                <td><?= h($patientAntecedents->end) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PatientAntecedents', 'action' => 'view', $patientAntecedents->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PatientAntecedents', 'action' => 'edit', $patientAntecedents->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PatientAntecedents', 'action' => 'delete', $patientAntecedents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientAntecedents->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
