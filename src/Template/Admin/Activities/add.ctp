<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Html->link(__('List Activities'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="activities form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($activity); ?>
    <fieldset>
        <legend><?= __('Add Activity') ?></legend>
            <?= $this->Form->input('name') ?>
            <?= $this->Form->input('entity_id') ?>
    </fieldset>
    <?= $this->Form->submit(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
