<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $patientBook->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $patientBook->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Patient Books'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientBooks form large-9 medium-8 columns content">
    <?= $this->Form->create($patientBook) ?>
    <fieldset>
        <legend><?= __('Edit Patient Book') ?></legend>
        <?php
            echo $this->Form->input('patient_id', ['options' => $patients]);
            echo $this->Form->input('book_path');
            echo $this->Form->input('changed');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
