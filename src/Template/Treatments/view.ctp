<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Treatment'), ['action' => 'edit', $treatment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Treatment'), ['action' => 'delete', $treatment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Treatments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Treatment Requirements'), ['controller' => 'TreatmentRequirements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment Requirement'), ['controller' => 'TreatmentRequirements', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="treatments view large-9 medium-8 columns content">
    <h3><?= h($treatment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($treatment->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($treatment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visit Intervention Doctor Id') ?></th>
            <td><?= $this->Number->format($treatment->visit_intervention_doctor_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($treatment->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($treatment->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Diary') ?></h4>
        <?= $this->Text->autoParagraph(h($treatment->diary)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Treatment Requirements') ?></h4>
        <?php if (!empty($treatment->treatment_requirements)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Label Requirement') ?></th>
                <th scope="col"><?= __('Requirement Cis Code') ?></th>
                <th scope="col"><?= __('Requirement Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Treatment Id') ?></th>
                <th scope="col"><?= __('Requirement Duration') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($treatment->treatment_requirements as $treatmentRequirements): ?>
            <tr>
                <td><?= h($treatmentRequirements->id) ?></td>
                <td><?= h($treatmentRequirements->label_requirement) ?></td>
                <td><?= h($treatmentRequirements->requirement_cis_code) ?></td>
                <td><?= h($treatmentRequirements->requirement_id) ?></td>
                <td><?= h($treatmentRequirements->created) ?></td>
                <td><?= h($treatmentRequirements->modified) ?></td>
                <td><?= h($treatmentRequirements->treatment_id) ?></td>
                <td><?= h($treatmentRequirements->requirement_duration) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TreatmentRequirements', 'action' => 'view', $treatmentRequirements->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TreatmentRequirements', 'action' => 'edit', $treatmentRequirements->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TreatmentRequirements', 'action' => 'delete', $treatmentRequirements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatmentRequirements->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
