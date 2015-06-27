<?php
namespace Workflow\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Workflow\Model\Entity\Initiator;

/**
 * Initiators Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Workflows
 */
class InitiatorsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('workflow_initiators');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->belongsTo('Workflows', [
            'foreignKey' => 'workflow_id',
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->allowEmpty('name');
            
        $validator
            ->add('enabled', 'valid', ['rule' => 'boolean'])
            ->requirePresence('enabled', 'create')
            ->notEmpty('enabled');
            
        $validator
            ->allowEmpty('event_name');
            
        $validator
            ->allowEmpty('subject_alias');

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
