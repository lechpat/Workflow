<?php
namespace Workflow\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Workflow\Model\Entity\Workflow;

/**
 * Workflows Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Workflows
 */
class WorkflowsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('workflow_workflows');
        $this->displayField('workflow_name');
        $this->primaryKey('workflow_id');
        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'workflow_created' => 'new',
                ],
            ]
        ]);
        $this->hasMany('Nodes', [
            'foreignKey' => 'workflow_id',
            'dependent' => true,
            'cascadeCallbacks' => false,
            'className' => 'Workflow.Nodes'
        ]);
        $this->hasMany('VariableHandlers', [
            'foreignKey' => 'workflow_id',
            'dependent' => true,
            'cascadeCallbacks' => false,
            'className' => 'Workflow.VariableHandlers'
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
            ->requirePresence('workflow_name', 'create')
            ->notEmpty('workflow_name');
            
        $validator
            ->add('workflow_version', 'valid', ['rule' => 'numeric'])
            ->notEmpty('workflow_version');
            
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
        //$rules->add($rules->existsIn(['workflow_id'], 'Workflows'));
        return $rules;
    }
}
