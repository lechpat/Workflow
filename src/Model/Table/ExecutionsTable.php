<?php
namespace Workflow\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Workflow\Model\Entity\Execution;

/**
 * Executions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Workflows
 * @property \Cake\ORM\Association\BelongsTo $Executions
 * @property \Cake\ORM\Association\BelongsTo $ExecutionNextThreads
 */
class ExecutionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('workflow_executions');
        $this->displayField('execution_id');
        $this->primaryKey(['execution_id', 'workflow_id']);
        $this->belongsTo('Workflows', [
            'foreignKey' => 'workflow_id',
            'joinType' => 'INNER',
            'className' => 'Workflow.Workflows'
        ]);
        $this->belongsTo('ParentExecution', [
            'foreignKey' => 'execution_parent',
            'joinType' => 'INNER',
            'className' => 'Workflow.Executions'
        ]);
        $this->hasMany('ChildExecutions', [
            'foreignKey' => 'execution_parent',
            'className' => 'Workflow.Executions'
        ]);
        $this->hasMany('States', [
            'foreignKey' => 'execution_id',
            'className' => 'Workflow.ExecutionStates'
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
            ->add('execution_parent', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('execution_parent');
            
        $validator
            ->add('execution_started', 'valid', ['rule' => 'numeric'])
            ->requirePresence('execution_started', 'create')
            ->notEmpty('execution_started');
            
        $validator
            ->add('execution_suspended', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('execution_suspended');
            
        $validator
            ->allowEmpty('execution_variables');
            
        $validator
            ->allowEmpty('execution_waiting_for');
            
        $validator
            ->allowEmpty('execution_threads');

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
        $rules->add($rules->existsIn(['execution_id'], 'Executions'));
        $rules->add($rules->existsIn(['execution_next_thread_id'], 'ExecutionNextThreads'));
        return $rules;
    }
}
