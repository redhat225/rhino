<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Auxiliary'), ['action' => 'edit', $auxiliary->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Auxiliary'), ['action' => 'delete', $auxiliary->id], ['confirm' => __('Are you sure you want to delete # {0}?', $auxiliary->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Auxiliaries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Auxiliary'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Auxiliary Act Details'), ['controller' => 'AuxiliaryActDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Auxiliary Act Detail'), ['controller' => 'AuxiliaryActDetails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Auxiliary Role Details'), ['controller' => 'AuxiliaryRoleDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Auxiliary Role Detail'), ['controller' => 'AuxiliaryRoleDetails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Constants'), ['controller' => 'VisitConstants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Constant'), ['controller' => 'VisitConstants', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Intervention Auxiliaries'), ['controller' => 'VisitInterventionAuxiliaries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Intervention Auxiliary'), ['controller' => 'VisitInterventionAuxiliaries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Tasks'), ['controller' => 'VisitTasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Task'), ['controller' => 'VisitTasks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="auxiliaries view large-9 medium-8 columns content">
    <h3><?= h($auxiliary->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($auxiliary->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($auxiliary->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($auxiliary->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Person') ?></th>
            <td><?= $auxiliary->has('person') ? $this->Html->link($auxiliary->person->id, ['controller' => 'People', 'action' => 'view', $auxiliary->person->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($auxiliary->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Avatar Auxiliary') ?></th>
            <td><?= h($auxiliary->avatar_auxiliary) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($auxiliary->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Auxiliary Act Details') ?></h4>
        <?php if (!empty($auxiliary->auxiliary_act_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Auxiliary Id') ?></th>
                <th scope="col"><?= __('Auxiliary Act Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($auxiliary->auxiliary_act_details as $auxiliaryActDetails): ?>
            <tr>
                <td><?= h($auxiliaryActDetails->id) ?></td>
                <td><?= h($auxiliaryActDetails->auxiliary_id) ?></td>
                <td><?= h($auxiliaryActDetails->auxiliary_act_id) ?></td>
                <td><?= h($auxiliaryActDetails->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AuxiliaryActDetails', 'action' => 'view', $auxiliaryActDetails->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AuxiliaryActDetails', 'action' => 'edit', $auxiliaryActDetails->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AuxiliaryActDetails', 'action' => 'delete', $auxiliaryActDetails->], ['confirm' => __('Are you sure you want to delete # {0}?', $auxiliaryActDetails->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Auxiliary Role Details') ?></h4>
        <?php if (!empty($auxiliary->auxiliary_role_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Auxiliary Id') ?></th>
                <th scope="col"><?= __('Auxiliary Role Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($auxiliary->auxiliary_role_details as $auxiliaryRoleDetails): ?>
            <tr>
                <td><?= h($auxiliaryRoleDetails->id) ?></td>
                <td><?= h($auxiliaryRoleDetails->auxiliary_id) ?></td>
                <td><?= h($auxiliaryRoleDetails->auxiliary_role_id) ?></td>
                <td><?= h($auxiliaryRoleDetails->created) ?></td>
                <td><?= h($auxiliaryRoleDetails->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AuxiliaryRoleDetails', 'action' => 'view', $auxiliaryRoleDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AuxiliaryRoleDetails', 'action' => 'edit', $auxiliaryRoleDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AuxiliaryRoleDetails', 'action' => 'delete', $auxiliaryRoleDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $auxiliaryRoleDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Visit Constants') ?></h4>
        <?php if (!empty($auxiliary->visit_constants)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Visit Id') ?></th>
                <th scope="col"><?= __('Auxiliary Id') ?></th>
                <th scope="col"><?= __('Height') ?></th>
                <th scope="col"><?= __('Weight') ?></th>
                <th scope="col"><?= __('Temperature') ?></th>
                <th scope="col"><?= __('Pouls') ?></th>
                <th scope="col"><?= __('Tension') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($auxiliary->visit_constants as $visitConstants): ?>
            <tr>
                <td><?= h($visitConstants->id) ?></td>
                <td><?= h($visitConstants->visit_id) ?></td>
                <td><?= h($visitConstants->auxiliary_id) ?></td>
                <td><?= h($visitConstants->height) ?></td>
                <td><?= h($visitConstants->weight) ?></td>
                <td><?= h($visitConstants->temperature) ?></td>
                <td><?= h($visitConstants->pouls) ?></td>
                <td><?= h($visitConstants->tension) ?></td>
                <td><?= h($visitConstants->created) ?></td>
                <td><?= h($visitConstants->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitConstants', 'action' => 'view', $visitConstants->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitConstants', 'action' => 'edit', $visitConstants->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitConstants', 'action' => 'delete', $visitConstants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitConstants->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Visit Intervention Auxiliaries') ?></h4>
        <?php if (!empty($auxiliary->visit_intervention_auxiliaries)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Auxiliary Id') ?></th>
                <th scope="col"><?= __('Visit Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Details') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($auxiliary->visit_intervention_auxiliaries as $visitInterventionAuxiliaries): ?>
            <tr>
                <td><?= h($visitInterventionAuxiliaries->id) ?></td>
                <td><?= h($visitInterventionAuxiliaries->auxiliary_id) ?></td>
                <td><?= h($visitInterventionAuxiliaries->visit_id) ?></td>
                <td><?= h($visitInterventionAuxiliaries->created) ?></td>
                <td><?= h($visitInterventionAuxiliaries->modified) ?></td>
                <td><?= h($visitInterventionAuxiliaries->deleted) ?></td>
                <td><?= h($visitInterventionAuxiliaries->details) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitInterventionAuxiliaries', 'action' => 'view', $visitInterventionAuxiliaries->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitInterventionAuxiliaries', 'action' => 'edit', $visitInterventionAuxiliaries->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitInterventionAuxiliaries', 'action' => 'delete', $visitInterventionAuxiliaries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitInterventionAuxiliaries->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Visit Tasks') ?></h4>
        <?php if (!empty($auxiliary->visit_tasks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Content Task') ?></th>
                <th scope="col"><?= __('Visit Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Manager Operator Id') ?></th>
                <th scope="col"><?= __('Doctor Id') ?></th>
                <th scope="col"><?= __('Auxiliary Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($auxiliary->visit_tasks as $visitTasks): ?>
            <tr>
                <td><?= h($visitTasks->id) ?></td>
                <td><?= h($visitTasks->content_task) ?></td>
                <td><?= h($visitTasks->visit_id) ?></td>
                <td><?= h($visitTasks->created) ?></td>
                <td><?= h($visitTasks->modified) ?></td>
                <td><?= h($visitTasks->manager_operator_id) ?></td>
                <td><?= h($visitTasks->doctor_id) ?></td>
                <td><?= h($visitTasks->auxiliary_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitTasks', 'action' => 'view', $visitTasks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitTasks', 'action' => 'edit', $visitTasks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitTasks', 'action' => 'delete', $visitTasks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitTasks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
