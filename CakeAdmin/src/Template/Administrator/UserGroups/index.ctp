<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Group'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Group Permissions'), ['controller' => 'UserGroupPermissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Group Permission'), ['controller' => 'UserGroupPermissions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userGroups index large-9 medium-8 columns content">
    <h3><?= __('User Groups') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('alias_name') ?></th>
                <th><?= $this->Paginator->sort('allowRegistration') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userGroups as $userGroup): ?>
            <tr>
                <td><?= $this->Number->format($userGroup->id) ?></td>
                <td><?= h($userGroup->name) ?></td>
                <td><?= h($userGroup->alias_name) ?></td>
                <td><?= $this->Number->format($userGroup->allowRegistration) ?></td>
                <td><?= h($userGroup->created) ?></td>
                <td><?= h($userGroup->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userGroup->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userGroup->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userGroup->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
