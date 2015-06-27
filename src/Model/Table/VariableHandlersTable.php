<?php
namespace Workflow\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Workflow\Model\Entity\VariableHandler;

/**
 * VariableHandlers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Workflows
 */
class VariableHandlersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('workflow_variable_handlers');
        $this->displayField('variable');
        $this->primaryKey(['workflow_id', 'class']);
        $this->belongsTo('Workflows', [
            'foreignKey' => 'workflow_id',
            'joinType' => 'INNER',
            'className' => 'Workflow.Workflows'
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
            ->requirePresence('variable', 'create')
            ->notEmpty('variable');
            
        $validator
            ->allowEmpty('class', 'create');

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
        $rules->add($rules->existsIn(['workflow_id'], 'Workflows'));
        return $rules;
    }
}
