<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Visit Act Sub Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visit Act Categories'), ['controller' => 'VisitActCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Act Category'), ['controller' => 'VisitActCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Acts'), ['controller' => 'VisitActs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Act'), ['controller' => 'VisitActs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitActSubCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($visitActSubCategory) ?>
    <fieldset>
        <legend><?= __('Add Visit Act Sub Category') ?></legend>
        <?php
            echo $this->Form->input('visit_act_category_id', ['options' => $visitActCategories]);
            echo $this->Form->input('label_sub_category');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
