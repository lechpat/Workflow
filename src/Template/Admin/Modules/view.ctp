<div class="actions col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Html->link(__('Edit Module'), ['action' => 'edit', $module->id]) ?> </li>
        <li class="list-group-item"><?= $this->Form->postLink(__('Delete Module'), ['action' => 'delete', $module->id], ['confirm' => __('Are you sure you want to delete # {0}?', $module->id)]) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Modules'), ['action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Module'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="modules view col-lg-10 col-md-9">
    <h2><?= h($module->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= h($module->id) ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($module->name) ?></p>
        </div>
    </div>
</div>
