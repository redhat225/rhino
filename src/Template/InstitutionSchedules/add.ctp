<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Institution Schedules'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="institutionSchedules form large-9 medium-8 columns content">
    <?= $this->Form->create($institutionSchedule) ?>
    <fieldset>
        <legend><?= __('Add Institution Schedule') ?></legend>
        <?php
            echo $this->Form->input('schedule_content');
            echo $this->Form->input('schedule_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
