<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List People'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="people form large-9 medium-8 columns content">
    <?= $this->Form->create($person) ?>
    <fieldset>
        <legend><?= __('Add Person') ?></legend>
        <?php
            echo $this->Form->input('updated_by');
            echo $this->Form->input('lastname');
            echo $this->Form->input('firstname');
            echo $this->Form->input('dateborn');
            echo $this->Form->input('created_by');
            echo $this->Form->input('deleted', ['empty' => true]);
            echo $this->Form->input('bornplace');
            echo $this->Form->input('nationality');
            echo $this->Form->input('blood');
            echo $this->Form->input('rhesus');
            echo $this->Form->input('path_pic');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
