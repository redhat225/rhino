<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Doctor'), ['action' => 'edit', $doctor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Doctor'), ['action' => 'delete', $doctor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Doctors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Diary Tokens'), ['controller' => 'DiaryTokens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Diary Token'), ['controller' => 'DiaryTokens', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Doctor Speciality Details'), ['controller' => 'DoctorSpecialityDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor Speciality Detail'), ['controller' => 'DoctorSpecialityDetails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Meetings'), ['controller' => 'VisitMeetings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Meeting'), ['controller' => 'VisitMeetings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visits'), ['controller' => 'Visits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit'), ['controller' => 'Visits', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="doctors view large-9 medium-8 columns content">
    <h3><?= h($doctor->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Person') ?></th>
            <td><?= $doctor->has('person') ? $this->Html->link($doctor->person->id, ['controller' => 'People', 'action' => 'view', $doctor->person->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($doctor->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($doctor->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($doctor->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Avatar Doctor') ?></th>
            <td><?= h($doctor->avatar_doctor) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($doctor->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($doctor->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($doctor->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Password') ?></h4>
        <?= $this->Text->autoParagraph(h($doctor->password)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Diary Tokens') ?></h4>
        <?php if (!empty($doctor->diary_tokens)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Patient Id') ?></th>
                <th><?= __('Doctor Id') ?></th>
                <th><?= __('Diary Token') ?></th>
                <th><?= __('Created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($doctor->diary_tokens as $diaryTokens): ?>
            <tr>
                <td><?= h($diaryTokens->id) ?></td>
                <td><?= h($diaryTokens->patient_id) ?></td>
                <td><?= h($diaryTokens->doctor_id) ?></td>
                <td><?= h($diaryTokens->diary_token) ?></td>
                <td><?= h($diaryTokens->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DiaryTokens', 'action' => 'view', $diaryTokens->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DiaryTokens', 'action' => 'edit', $diaryTokens->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DiaryTokens', 'action' => 'delete', $diaryTokens->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diaryTokens->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Doctor Speciality Details') ?></h4>
        <?php if (!empty($doctor->doctor_speciality_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Doctor Speciality Id') ?></th>
                <th><?= __('Doctor Id') ?></th>
                <th><?= __('Created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($doctor->doctor_speciality_details as $doctorSpecialityDetails): ?>
            <tr>
                <td><?= h($doctorSpecialityDetails->id) ?></td>
                <td><?= h($doctorSpecialityDetails->doctor_speciality_id) ?></td>
                <td><?= h($doctorSpecialityDetails->doctor_id) ?></td>
                <td><?= h($doctorSpecialityDetails->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DoctorSpecialityDetails', 'action' => 'view', $doctorSpecialityDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DoctorSpecialityDetails', 'action' => 'edit', $doctorSpecialityDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DoctorSpecialityDetails', 'action' => 'delete', $doctorSpecialityDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctorSpecialityDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Visit Meetings') ?></h4>
        <?php if (!empty($doctor->visit_meetings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Code') ?></th>
                <th><?= __('Visit Id') ?></th>
                <th><?= __('Doctor Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Diary') ?></th>
                <th><?= __('Patient Id') ?></th>
                <th><?= __('Next Meeting') ?></th>
                <th><?= __('Done') ?></th>
                <th><?= __('Visit Meeting Speciality Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($doctor->visit_meetings as $visitMeetings): ?>
            <tr>
                <td><?= h($visitMeetings->id) ?></td>
                <td><?= h($visitMeetings->code) ?></td>
                <td><?= h($visitMeetings->visit_id) ?></td>
                <td><?= h($visitMeetings->doctor_id) ?></td>
                <td><?= h($visitMeetings->created) ?></td>
                <td><?= h($visitMeetings->modified) ?></td>
                <td><?= h($visitMeetings->diary) ?></td>
                <td><?= h($visitMeetings->patient_id) ?></td>
                <td><?= h($visitMeetings->next_meeting) ?></td>
                <td><?= h($visitMeetings->done) ?></td>
                <td><?= h($visitMeetings->visit_meeting_speciality_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitMeetings', 'action' => 'view', $visitMeetings->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitMeetings', 'action' => 'edit', $visitMeetings->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitMeetings', 'action' => 'delete', $visitMeetings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitMeetings->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Visits') ?></h4>
        <?php if (!empty($doctor->visits)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Institution Id') ?></th>
                <th><?= __('Visit Kind Transport Id') ?></th>
                <th><?= __('Visit Level Id') ?></th>
                <th><?= __('Doctor Id') ?></th>
                <th><?= __('Patient Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($doctor->visits as $visits): ?>
            <tr>
                <td><?= h($visits->id) ?></td>
                <td><?= h($visits->created) ?></td>
                <td><?= h($visits->institution_id) ?></td>
                <td><?= h($visits->visit_kind_transport_id) ?></td>
                <td><?= h($visits->visit_level_id) ?></td>
                <td><?= h($visits->doctor_id) ?></td>
                <td><?= h($visits->patient_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Visits', 'action' => 'view', $visits->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Visits', 'action' => 'edit', $visits->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Visits', 'action' => 'delete', $visits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visits->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
