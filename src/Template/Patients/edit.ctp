<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $patient->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $patient->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Diary Tokens'), ['controller' => 'DiaryTokens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Diary Token'), ['controller' => 'DiaryTokens', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Antecedents'), ['controller' => 'PatientAntecedents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Antecedent'), ['controller' => 'PatientAntecedents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Books'), ['controller' => 'PatientBooks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Book'), ['controller' => 'PatientBooks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Company Details'), ['controller' => 'PatientCompanyDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Company Detail'), ['controller' => 'PatientCompanyDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Meetings'), ['controller' => 'VisitMeetings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Meeting'), ['controller' => 'VisitMeetings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visits'), ['controller' => 'Visits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit'), ['controller' => 'Visits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patients form large-9 medium-8 columns content">
    <?= $this->Form->create($patient) ?>
    <fieldset>
        <legend><?= __('Edit Patient') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('people_id', ['options' => $people]);
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('email');
            echo $this->Form->input('avatar_patient');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
