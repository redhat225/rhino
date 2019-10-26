<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requirement Presentation'), ['action' => 'edit', $requirementPresentation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requirement Presentation'), ['action' => 'delete', $requirementPresentation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementPresentation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Presentations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Presentation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirements'), ['controller' => 'Requirements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement'), ['controller' => 'Requirements', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requirementPresentations view large-9 medium-8 columns content">
    <h3><?= h($requirementPresentation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Presentation Description') ?></th>
            <td><?= h($requirementPresentation->presentation_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement') ?></th>
            <td><?= $requirementPresentation->has('requirement') ? $this->Html->link($requirementPresentation->requirement->id, ['controller' => 'Requirements', 'action' => 'view', $requirementPresentation->requirement->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Presentation Code') ?></th>
            <td><?= h($requirementPresentation->presentation_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Presentation Administration Status') ?></th>
            <td><?= h($requirementPresentation->presentation_administration_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Presentation Administration State') ?></th>
            <td><?= h($requirementPresentation->presentation_administration_state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Presentation Renewal Indications') ?></th>
            <td><?= h($requirementPresentation->presentation_renewal_indications) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($requirementPresentation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Presentation Price') ?></th>
            <td><?= $this->Number->format($requirementPresentation->presentation_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Presentation Administration Date') ?></th>
            <td><?= h($requirementPresentation->presentation_administration_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Presentation Agreement') ?></th>
            <td><?= $requirementPresentation->presentation_agreement ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
