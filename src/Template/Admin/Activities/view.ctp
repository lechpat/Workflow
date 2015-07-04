<div class="actions col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Html->link(__('Edit Activity'), ['action' => 'edit', $activity->id]) ?> </li>
        <li class="list-group-item"><?= $this->Form->postLink(__('Delete Activity'), ['action' => 'delete', $activity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->id)]) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Activities'), ['action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Activity'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="activities view col-lg-10 col-md-9">
    <h2><?= h($activity->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($activity->name) ?></p>
            <h6 class="subheader"><?= __('Entity Id') ?></h6>
            <p><?= h($activity->entity_id) ?></p>
        </div>
        <div class="col-lg-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($activity->id) ?></p>
        </div>
    </div>
</div>
