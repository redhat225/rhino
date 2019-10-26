<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Diary Token'), ['action' => 'edit', $diaryToken->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Diary Token'), ['action' => 'delete', $diaryToken->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diaryToken->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Diary Tokens'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Diary Token'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Diaries'), ['controller' => 'Diaries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Diary'), ['controller' => 'Diaries', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="diaryTokens view large-9 medium-8 columns content">
    <h3><?= h($diaryToken->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Patient') ?></th>
            <td><?= $diaryToken->has('patient') ? $this->Html->link($diaryToken->patient->id, ['controller' => 'Patients', 'action' => 'view', $diaryToken->patient->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Doctor') ?></th>
            <td><?= $diaryToken->has('doctor') ? $this->Html->link($diaryToken->doctor->id, ['controller' => 'Doctors', 'action' => 'view', $diaryToken->doctor->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Diary Token') ?></th>
            <td><?= h($diaryToken->diary_token) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tracking Code') ?></th>
            <td><?= h($diaryToken->tracking_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($diaryToken->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Delay') ?></th>
            <td><?= $this->Number->format($diaryToken->delay) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($diaryToken->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Diaries') ?></h4>
        <?php if (!empty($diaryToken->diaries)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Diary Token Id') ?></th>
                <th scope="col"><?= __('Diary Type Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Diary Content') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($diaryToken->diaries as $diaries): ?>
            <tr>
                <td><?= h($diaries->id) ?></td>
                <td><?= h($diaries->diary_token_id) ?></td>
                <td><?= h($diaries->diary_type_id) ?></td>
                <td><?= h($diaries->created) ?></td>
                <td><?= h($diaries->diary_content) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Diaries', 'action' => 'view', $diaries->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Diaries', 'action' => 'edit', $diaries->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Diaries', 'action' => 'delete', $diaries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diaries->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
