<div class="actions col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Html->link(__('Edit Trigger Type'), ['action' => 'edit', $triggerType->id]) ?> </li>
        <li class="list-group-item"><?= $this->Form->postLink(__('Delete Trigger Type'), ['action' => 'delete', $triggerType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $triggerType->id)]) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Trigger Types'), ['action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Trigger Type'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="triggerTypes view col-lg-10 col-md-9">
    <h2><?= h($triggerType->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= h($triggerType->id) ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($triggerType->name) ?></p>
        </div>
    </div>
</div>
