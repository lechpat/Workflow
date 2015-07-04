<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Html->link(__('List Activity Dialogs'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="activityDialogs form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($activityDialog); ?>
    <fieldset>
        <legend><?= __('Add Activity Dialog') ?></legend>
            <?= $this->Form->input('name') ?>
    </fieldset>
    <?= $this->Form->submit(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
