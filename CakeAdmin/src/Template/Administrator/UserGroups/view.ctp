<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Group'), ['action' => 'edit', $userGroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Group'), ['action' => 'delete', $userGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userGroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Group'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Group Permissions'), ['controller' => 'UserGroupPermissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Group Permission'), ['controller' => 'UserGroupPermissions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userGroups view large-9 medium-8 columns content">
    <h3><?= h($userGroup->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($userGroup->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Alias Name') ?></th>
            <td><?= h($userGroup->alias_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($userGroup->id) ?></td>
        </tr>
        <tr>
            <th><?= __('AllowRegistration') ?></th>
            <td><?= $this->Number->format($userGroup->allowRegistration) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($userGroup->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($userGroup->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related User Group Permissions') ?></h4>
        <?php if (!empty($userGroup->user_group_permissions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Group Id') ?></th>
                <th><?= __('Controller') ?></th>
                <th><?= __('Action') ?></th>
                <th><?= __('Allowed') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($userGroup->user_group_permissions as $userGroupPermissions): ?>
            <tr>
                <td><?= h($userGroupPermissions->id) ?></td>
                <td><?= h($userGroupPermissions->user_group_id) ?></td>
                <td><?= h($userGroupPermissions->controller) ?></td>
                <td><?= h($userGroupPermissions->action) ?></td>
                <td><?= h($userGroupPermissions->allowed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserGroupPermissions', 'action' => 'view', $userGroupPermissions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserGroupPermissions', 'action' => 'edit', $userGroupPermissions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserGroupPermissions', 'action' => 'delete', $userGroupPermissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userGroupPermissions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($userGroup->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Group Id') ?></th>
                <th><?= __('First Name') ?></th>
                <th><?= __('Last Name') ?></th>
                <th><?= __('Username') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('Designation') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Verification Token') ?></th>
                <th><?= __('Email Verified') ?></th>
                <th><?= __('Registration Step') ?></th>
                <th><?= __('Active') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($userGroup->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->user_group_id) ?></td>
                <td><?= h($users->first_name) ?></td>
                <td><?= h($users->last_name) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->designation) ?></td>
                <td><?= h($users->phone) ?></td>
                <td><?= h($users->verification_token) ?></td>
                <td><?= h($users->email_verified) ?></td>
                <td><?= h($users->registration_step) ?></td>
                <td><?= h($users->active) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
