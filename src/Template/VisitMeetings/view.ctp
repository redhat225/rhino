<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visit Meeting'), ['action' => 'edit', $visitMeeting->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visit Meeting'), ['action' => 'delete', $visitMeeting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitMeeting->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visit Meetings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Meeting'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visits'), ['controller' => 'Visits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit'), ['controller' => 'Visits', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Exams'), ['controller' => 'Exams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam'), ['controller' => 'Exams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Treatments'), ['controller' => 'Treatments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment'), ['controller' => 'Treatments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Meeting Constants'), ['controller' => 'VisitMeetingConstants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Meeting Constant'), ['controller' => 'VisitMeetingConstants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visitMeetings view large-9 medium-8 columns content">
    <h3><?= h($visitMeeting->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Visit') ?></th>
            <td><?= $visitMeeting->has('visit') ? $this->Html->link($visitMeeting->visit->id, ['controller' => 'Visits', 'action' => 'view', $visitMeeting->visit->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Doctor') ?></th>
            <td><?= $visitMeeting->has('doctor') ? $this->Html->link($visitMeeting->doctor->id, ['controller' => 'Doctors', 'action' => 'view', $visitMeeting->doctor->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Diary') ?></th>
            <td><?= h($visitMeeting->diary) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient') ?></th>
            <td><?= $visitMeeting->has('patient') ? $this->Html->link($visitMeeting->patient->id, ['controller' => 'Patients', 'action' => 'view', $visitMeeting->patient->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($visitMeeting->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visit Invoice Id') ?></th>
            <td><?= $this->Number->format($visitMeeting->visit_invoice_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Done') ?></th>
            <td><?= $this->Number->format($visitMeeting->done) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Manager Operator Id') ?></th>
            <td><?= $this->Number->format($visitMeeting->manager_operator_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visit Meeting Type Id') ?></th>
            <td><?= $this->Number->format($visitMeeting->visit_meeting_type_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($visitMeeting->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($visitMeeting->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($visitMeeting->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expected Meeting Date') ?></th>
            <td><?= h($visitMeeting->expected_meeting_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Next Meeting') ?></th>
            <td><?= h($visitMeeting->next_meeting) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Code') ?></h4>
        <?= $this->Text->autoParagraph(h($visitMeeting->code)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Exams') ?></h4>
        <?php if (!empty($visitMeeting->exams)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Visit Meeting Id') ?></th>
                <th scope="col"><?= __('Obs Exam') ?></th>
                <th scope="col"><?= __('Exam Type Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Result Exam') ?></th>
                <th scope="col"><?= __('Codexam') ?></th>
                <th scope="col"><?= __('Under Exams') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visitMeeting->exams as $exams): ?>
            <tr>
                <td><?= h($exams->id) ?></td>
                <td><?= h($exams->visit_meeting_id) ?></td>
                <td><?= h($exams->obs_exam) ?></td>
                <td><?= h($exams->exam_type_id) ?></td>
                <td><?= h($exams->created) ?></td>
                <td><?= h($exams->modified) ?></td>
                <td><?= h($exams->result_exam) ?></td>
                <td><?= h($exams->codexam) ?></td>
                <td><?= h($exams->under_exams) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Exams', 'action' => 'view', $exams->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Exams', 'action' => 'edit', $exams->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Exams', 'action' => 'delete', $exams->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exams->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Treatments') ?></h4>
        <?php if (!empty($visitMeeting->treatments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Visit Meeting Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Exp') ?></th>
                <th scope="col"><?= __('Treatment Type Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visitMeeting->treatments as $treatments): ?>
            <tr>
                <td><?= h($treatments->id) ?></td>
                <td><?= h($treatments->visit_meeting_id) ?></td>
                <td><?= h($treatments->description) ?></td>
                <td><?= h($treatments->created) ?></td>
                <td><?= h($treatments->modified) ?></td>
                <td><?= h($treatments->exp) ?></td>
                <td><?= h($treatments->treatment_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Treatments', 'action' => 'view', $treatments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Treatments', 'action' => 'edit', $treatments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Treatments', 'action' => 'delete', $treatments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Visit Meeting Constants') ?></h4>
        <?php if (!empty($visitMeeting->visit_meeting_constants)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Visit Meeting Id') ?></th>
                <th scope="col"><?= __('Height') ?></th>
                <th scope="col"><?= __('Weight') ?></th>
                <th scope="col"><?= __('Temperature') ?></th>
                <th scope="col"><?= __('Pouls') ?></th>
                <th scope="col"><?= __('Tension') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visitMeeting->visit_meeting_constants as $visitMeetingConstants): ?>
            <tr>
                <td><?= h($visitMeetingConstants->id) ?></td>
                <td><?= h($visitMeetingConstants->visit_meeting_id) ?></td>
                <td><?= h($visitMeetingConstants->height) ?></td>
                <td><?= h($visitMeetingConstants->weight) ?></td>
                <td><?= h($visitMeetingConstants->temperature) ?></td>
                <td><?= h($visitMeetingConstants->pouls) ?></td>
                <td><?= h($visitMeetingConstants->tension) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitMeetingConstants', 'action' => 'view', $visitMeetingConstants->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitMeetingConstants', 'action' => 'edit', $visitMeetingConstants->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitMeetingConstants', 'action' => 'delete', $visitMeetingConstants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitMeetingConstants->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
