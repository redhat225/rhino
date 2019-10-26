<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Visit Acts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visit Act Sub Categories'), ['controller' => 'VisitActSubCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Act Sub Category'), ['controller' => 'VisitActSubCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Act Auxiliary Details'), ['controller' => 'VisitActAuxiliaryDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Act Auxiliary Detail'), ['controller' => 'VisitActAuxiliaryDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Act Doctor Details'), ['controller' => 'VisitActDoctorDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Act Doctor Detail'), ['controller' => 'VisitActDoctorDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitActs form large-9 medium-8 columns content">
    <?= $this->Form->create($visitAct) ?>
    <fieldset>
        <legend><?= __('Add Visit Act') ?></legend>
        <?php
            echo $this->Form->input('label');
            echo $this->Form->input('visit_act_sub_category_id', ['options' => $visitActSubCategories]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
