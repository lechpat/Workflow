<div class="actions col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Html->link(__('Edit Record Action'), ['action' => 'edit', $recordAction->id]) ?> </li>
        <li class="list-group-item"><?= $this->Form->postLink(__('Delete Record Action'), ['action' => 'delete', $recordAction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recordAction->id)]) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Record Actions'), ['action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Record Action'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="recordActions view col-lg-10 col-md-9">
    <h2><?= h($recordAction->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= h($recordAction->id) ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($recordAction->name) ?></p>
        </div>
    </div>
</div>
