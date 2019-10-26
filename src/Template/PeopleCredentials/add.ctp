<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List People Credentials'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="peopleCredentials form large-9 medium-8 columns content">
    <?= $this->Form->create($peopleCredential) ?>
    <fieldset>
        <legend><?= __('Add People Credential') ?></legend>
        <?php
            echo $this->Form->input('signature_path');
            echo $this->Form->input('stamp_path');
            echo $this->Form->input('people_id', ['options' => $people]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
