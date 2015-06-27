<div class="actions col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Html->link(__('Edit Initiator'), ['action' => 'edit', $initiator->id]) ?> </li>
        <li class="list-group-item"><?= $this->Form->postLink(__('Delete Initiator'), ['action' => 'delete', $initiator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $initiator->id)]) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Initiators'), ['action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Initiator'), ['action' => 'add']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Workflows'), ['controller' => 'Workflows', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Workflow'), ['controller' => 'Workflows', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="initiators view col-lg-10 col-md-9">
    <h2><?= h($initiator->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($initiator->name) ?></p>
            <h6 class="subheader"><?= __('Event Name') ?></h6>
            <p><?= h($initiator->event_name) ?></p>
            <h6 class="subheader"><?= __('Subject Alias') ?></h6>
            <p><?= h($initiator->subject_alias) ?></p>
            <h6 class="subheader"><?= __('Workflow') ?></h6>
            <p><?= $initiator->has('workflow') ? $this->Html->link($initiator->workflow->workflow_name, ['controller' => 'Workflows', 'action' => 'view', $initiator->workflow->workflow_id]) : '' ?></p>
        </div>
        <div class="col-lg-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($initiator->id) ?></p>
        </div>
        <div class="col-lg-2 columns booleans end">
            <h6 class="subheader"><?= __('Enabled') ?></h6>
            <p><?= $initiator->enabled ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
</div>
