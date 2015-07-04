<div class="actions col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Html->link(__('Edit Transition Action'), ['action' => 'edit', $transitionAction->id]) ?> </li>
        <li class="list-group-item"><?= $this->Form->postLink(__('Delete Transition Action'), ['action' => 'delete', $transitionAction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transitionAction->id)]) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Transition Actions'), ['action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Transition Action'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="transitionActions view col-lg-10 col-md-9">
    <h2><?= h($transitionAction->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($transitionAction->name) ?></p>
        </div>
        <div class="col-lg-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($transitionAction->id) ?></p>
        </div>
    </div>
</div>
