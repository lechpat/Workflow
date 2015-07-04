<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $activity->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $activity->id)]
            )
        ?></li>
        <li class="list-group-item"><?= $this->Html->link(__('List Activities'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="activities form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($activity); ?>
    <fieldset>
        <legend><?= __('Edit Activity') ?></legend>
            <?= $this->Form->input('name') ?>
            <?= $this->Form->input('entity_id') ?>
    </fieldset>
    <?= $this->Form->submit(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
