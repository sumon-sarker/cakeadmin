<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Setting'), ['action' => 'edit', $setting->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Setting'), ['action' => 'delete', $setting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $setting->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Settings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Setting'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="settings view large-9 medium-8 columns content">
    <h3><?= h($setting->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Site Title') ?></th>
            <td><?= h($setting->site_title) ?></td>
        </tr>
        <tr>
            <th><?= __('Site Email') ?></th>
            <td><?= h($setting->site_email) ?></td>
        </tr>
        <tr>
            <th><?= __('Email Verification Subject') ?></th>
            <td><?= h($setting->email_verification_subject) ?></td>
        </tr>
        <tr>
            <th><?= __('Footer Text') ?></th>
            <td><?= h($setting->footer_text) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($setting->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($setting->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($setting->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Email Verification Template') ?></h4>
        <?= $this->Text->autoParagraph(h($setting->email_verification_template)); ?>
    </div>
</div>
