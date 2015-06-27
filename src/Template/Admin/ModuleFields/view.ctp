<div class="actions col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Html->link(__('Edit Module Field'), ['action' => 'edit', $moduleField->id]) ?> </li>
        <li class="list-group-item"><?= $this->Form->postLink(__('Delete Module Field'), ['action' => 'delete', $moduleField->id], ['confirm' => __('Are you sure you want to delete # {0}?', $moduleField->id)]) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Module Fields'), ['action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Module Field'), ['action' => 'add']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Modules'), ['controller' => 'Modules', 'action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Module'), ['controller' => 'Modules', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="moduleFields view col-lg-10 col-md-9">
    <h2><?= h($moduleField->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= h($moduleField->id) ?></p>
            <h6 class="subheader"><?= __('Module') ?></h6>
            <p><?= $moduleField->has('module') ? $this->Html->link($moduleField->module->name, ['controller' => 'Modules', 'action' => 'view', $moduleField->module->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($moduleField->name) ?></p>
        </div>
    </div>
</div>
