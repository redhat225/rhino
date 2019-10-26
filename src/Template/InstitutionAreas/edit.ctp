<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $institutionArea->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $institutionArea->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Institution Areas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="institutionAreas form large-9 medium-8 columns content">
    <?= $this->Form->create($institutionArea) ?>
    <fieldset>
        <legend><?= __('Edit Institution Area') ?></legend>
        <?php
            echo $this->Form->input('area');
            echo $this->Form->input('city');
            echo $this->Form->input('zone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
