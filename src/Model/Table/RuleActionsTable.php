<?php
namespace Workflow\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Workflow\Model\Entity\RuleAction;

/**
 * RuleActions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Rules
 * @property \Cake\ORM\Association\BelongsTo $Actions
 */
class RuleActionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('workflow_rule_actions');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->belongsTo('Rules', [
            'foreignKey' => 'rule_id',
            'className' => 'Workflow.Rules'
        ]);
        $this->belongsTo('Actions', [
            'foreignKey' => 'action_id',
            'className' => 'Workflow.Actions'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->allowEmpty('name');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['rule_id'], 'Rules'));
        $rules->add($rules->existsIn(['action_id'], 'Actions'));
        return $rules;
    }
}
