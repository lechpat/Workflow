<div class="actions col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Html->link(__('Edit Activity Dialog'), ['action' => 'edit', $activityDialog->id]) ?> </li>
        <li class="list-group-item"><?= $this->Form->postLink(__('Delete Activity Dialog'), ['action' => 'delete', $activityDialog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activityDialog->id)]) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Activity Dialogs'), ['action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Activity Dialog'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="activityDialogs view col-lg-10 col-md-9">
    <h2><?= h($activityDialog->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($activityDialog->name) ?></p>
        </div>
        <div class="col-lg-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($activityDialog->id) ?></p>
        </div>
    </div>
</div>
