<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $visitActCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $visitActCategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Visit Act Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visit Act Sub Categories'), ['controller' => 'VisitActSubCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Act Sub Category'), ['controller' => 'VisitActSubCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitActCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($visitActCategory) ?>
    <fieldset>
        <legend><?= __('Edit Visit Act Category') ?></legend>
        <?php
            echo $this->Form->input('code_category');
            echo $this->Form->input('code_main_category');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
