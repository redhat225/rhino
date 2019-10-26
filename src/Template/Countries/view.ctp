<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Country'), ['action' => 'edit', $country->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Country'), ['action' => 'delete', $country->id], ['confirm' => __('Are you sure you want to delete # {0}?', $country->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Countries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Country Cities'), ['controller' => 'CountryCities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country City'), ['controller' => 'CountryCities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="countries view large-9 medium-8 columns content">
    <h3><?= h($country->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label Country') ?></th>
            <td><?= h($country->label_country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($country->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Country Cities') ?></h4>
        <?php if (!empty($country->country_cities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Label City') ?></th>
                <th scope="col"><?= __('Country Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($country->country_cities as $countryCities): ?>
            <tr>
                <td><?= h($countryCities->id) ?></td>
                <td><?= h($countryCities->label_city) ?></td>
                <td><?= h($countryCities->country_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CountryCities', 'action' => 'view', $countryCities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CountryCities', 'action' => 'edit', $countryCities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CountryCities', 'action' => 'delete', $countryCities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $countryCities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
