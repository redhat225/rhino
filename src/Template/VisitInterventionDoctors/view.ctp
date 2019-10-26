<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visit Intervention Doctor'), ['action' => 'edit', $visitInterventionDoctor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visit Intervention Doctor'), ['action' => 'delete', $visitInterventionDoctor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitInterventionDoctor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visit Intervention Doctors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Intervention Doctor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visits'), ['controller' => 'Visits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit'), ['controller' => 'Visits', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Invoices'), ['controller' => 'VisitInvoices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Invoice'), ['controller' => 'VisitInvoices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Exams'), ['controller' => 'Exams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam'), ['controller' => 'Exams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patient Bookings'), ['controller' => 'PatientBookings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient Booking'), ['controller' => 'PatientBookings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Treatments'), ['controller' => 'Treatments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment'), ['controller' => 'Treatments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Act Doctor Details'), ['controller' => 'VisitActDoctorDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Act Doctor Detail'), ['controller' => 'VisitActDoctorDetails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Notes'), ['controller' => 'VisitNotes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Note'), ['controller' => 'VisitNotes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visitInterventionDoctors view large-9 medium-8 columns content">
    <h3><?= h($visitInterventionDoctor->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Doctor') ?></th>
            <td><?= $visitInterventionDoctor->has('doctor') ? $this->Html->link($visitInterventionDoctor->doctor->id, ['controller' => 'Doctors', 'action' => 'view', $visitInterventionDoctor->doctor->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visit') ?></th>
            <td><?= $visitInterventionDoctor->has('visit') ? $this->Html->link($visitInterventionDoctor->visit->id, ['controller' => 'Visits', 'action' => 'view', $visitInterventionDoctor->visit->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visit Invoice') ?></th>
            <td><?= $visitInterventionDoctor->has('visit_invoice') ? $this->Html->link($visitInterventionDoctor->visit_invoice->id, ['controller' => 'VisitInvoices', 'action' => 'view', $visitInterventionDoctor->visit_invoice->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($visitInterventionDoctor->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($visitInterventionDoctor->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($visitInterventionDoctor->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($visitInterventionDoctor->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Intervention Done') ?></th>
            <td><?= $visitInterventionDoctor->intervention_done ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Intervention History Illness') ?></h4>
        <?= $this->Text->autoParagraph(h($visitInterventionDoctor->intervention_history_illness)); ?>
    </div>
    <div class="row">
        <h4><?= __('Intervention Report Exam') ?></h4>
        <?= $this->Text->autoParagraph(h($visitInterventionDoctor->intervention_report_exam)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Exams') ?></h4>
        <?php if (!empty($visitInterventionDoctor->exams)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Visit Intervention Doctor Id') ?></th>
                <th scope="col"><?= __('Obs Exam') ?></th>
                <th scope="col"><?= __('Exam Under Type Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Result Exam') ?></th>
                <th scope="col"><?= __('Codexam') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visitInterventionDoctor->exams as $exams): ?>
            <tr>
                <td><?= h($exams->id) ?></td>
                <td><?= h($exams->visit_intervention_doctor_id) ?></td>
                <td><?= h($exams->obs_exam) ?></td>
                <td><?= h($exams->exam_under_type_id) ?></td>
                <td><?= h($exams->created) ?></td>
                <td><?= h($exams->modified) ?></td>
                <td><?= h($exams->result_exam) ?></td>
                <td><?= h($exams->codexam) ?></td>
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
        <h4><?= __('Related Patient Bookings') ?></h4>
        <?php if (!empty($visitInterventionDoctor->patient_bookings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Code Booking') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Expected Date Booking') ?></th>
                <th scope="col"><?= __('Doctor Id') ?></th>
                <th scope="col"><?= __('Patient Id') ?></th>
                <th scope="col"><?= __('Institution Id') ?></th>
                <th scope="col"><?= __('Visit Intervention Doctor Id') ?></th>
                <th scope="col"><?= __('State') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visitInterventionDoctor->patient_bookings as $patientBookings): ?>
            <tr>
                <td><?= h($patientBookings->id) ?></td>
                <td><?= h($patientBookings->code_booking) ?></td>
                <td><?= h($patientBookings->created) ?></td>
                <td><?= h($patientBookings->modified) ?></td>
                <td><?= h($patientBookings->deleted) ?></td>
                <td><?= h($patientBookings->expected_date_booking) ?></td>
                <td><?= h($patientBookings->doctor_id) ?></td>
                <td><?= h($patientBookings->patient_id) ?></td>
                <td><?= h($patientBookings->institution_id) ?></td>
                <td><?= h($patientBookings->visit_intervention_doctor_id) ?></td>
                <td><?= h($patientBookings->state) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PatientBookings', 'action' => 'view', $patientBookings->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PatientBookings', 'action' => 'edit', $patientBookings->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PatientBookings', 'action' => 'delete', $patientBookings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patientBookings->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Treatments') ?></h4>
        <?php if (!empty($visitInterventionDoctor->treatments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Visit Intervention Doctor Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Diary') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visitInterventionDoctor->treatments as $treatments): ?>
            <tr>
                <td><?= h($treatments->id) ?></td>
                <td><?= h($treatments->visit_intervention_doctor_id) ?></td>
                <td><?= h($treatments->description) ?></td>
                <td><?= h($treatments->created) ?></td>
                <td><?= h($treatments->modified) ?></td>
                <td><?= h($treatments->diary) ?></td>
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
        <h4><?= __('Related Visit Act Doctor Details') ?></h4>
        <?php if (!empty($visitInterventionDoctor->visit_act_doctor_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Visit Act Id') ?></th>
                <th scope="col"><?= __('Visit Intervention Doctor Id') ?></th>
                <th scope="col"><?= __('Details') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visitInterventionDoctor->visit_act_doctor_details as $visitActDoctorDetails): ?>
            <tr>
                <td><?= h($visitActDoctorDetails->id) ?></td>
                <td><?= h($visitActDoctorDetails->visit_act_id) ?></td>
                <td><?= h($visitActDoctorDetails->visit_intervention_doctor_id) ?></td>
                <td><?= h($visitActDoctorDetails->details) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitActDoctorDetails', 'action' => 'view', $visitActDoctorDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitActDoctorDetails', 'action' => 'edit', $visitActDoctorDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitActDoctorDetails', 'action' => 'delete', $visitActDoctorDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitActDoctorDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Visit Notes') ?></h4>
        <?php if (!empty($visitInterventionDoctor->visit_notes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Content Note') ?></th>
                <th scope="col"><?= __('State') ?></th>
                <th scope="col"><?= __('Visit Intervention Doctor Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visitInterventionDoctor->visit_notes as $visitNotes): ?>
            <tr>
                <td><?= h($visitNotes->id) ?></td>
                <td><?= h($visitNotes->content_note) ?></td>
                <td><?= h($visitNotes->state) ?></td>
                <td><?= h($visitNotes->visit_intervention_doctor_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitNotes', 'action' => 'view', $visitNotes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitNotes', 'action' => 'edit', $visitNotes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitNotes', 'action' => 'delete', $visitNotes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitNotes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
