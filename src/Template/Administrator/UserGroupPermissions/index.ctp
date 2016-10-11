<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Group Permission'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Groups'), ['controller' => 'UserGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Group'), ['controller' => 'UserGroups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userGroupPermissions index large-9 medium-8 columns content">
    <h3><?= __('User Group Permissions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_group_id') ?></th>
                <th><?= $this->Paginator->sort('controller') ?></th>
                <th><?= $this->Paginator->sort('action') ?></th>
                <th><?= $this->Paginator->sort('allowed') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userGroupPermissions as $userGroupPermission): ?>
            <tr>
                <td><?= $this->Number->format($userGroupPermission->id) ?></td>
                <td><?= $userGroupPermission->has('user_group') ? $this->Html->link($userGroupPermission->user_group->name, ['controller' => 'UserGroups', 'action' => 'view', $userGroupPermission->user_group->id]) : '' ?></td>
                <td><?= h($userGroupPermission->controller) ?></td>
                <td><?= h($userGroupPermission->action) ?></td>
                <td><?= h($userGroupPermission->allowed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userGroupPermission->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userGroupPermission->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userGroupPermission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userGroupPermission->id)]) ?>
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
