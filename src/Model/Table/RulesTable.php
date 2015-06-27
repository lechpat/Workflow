<?php
namespace Workflow\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Workflow\Model\Entity\Rule;

/**
 * Rules Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Modules
 * @property \Cake\ORM\Association\BelongsTo $TriggerTypes
 * @property \Cake\ORM\Association\BelongsTo $RecordActions
 * @property \Cake\ORM\Association\BelongsTo $ModuleFields
 */
class RulesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('workflow_rules');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->belongsTo('Modules', [
            'foreignKey' => 'module_id',
            'className' => 'Workflow.Modules'
        ]);
        $this->belongsTo('TriggerTypes', [
            'foreignKey' => 'trigger_type_id',
            'className' => 'Workflow.TriggerTypes'
        ]);
        $this->belongsTo('RecordActions', [
            'foreignKey' => 'record_action_id',
            'className' => 'Workflow.RecordActions'
        ]);
        $this->belongsTo('ModuleFields', [
            'foreignKey' => 'module_field_id',
            'className' => 'Workflow.ModuleFields'
        ]);
        $this->hasMany('RuleConditions', [           
            'foreignKey' => 'rule_id',
            'className' => 'Workflow.RuleConditions'
        ]);
        $this->belongsToMany('Actions', [
            'foreignKey' => 'rule_id',
            'className' => 'Workflow.Actions',
            'through' => 'Workflow.RuleActions',
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
            ->allowEmpty('id', 'create');
            
        $validator
            ->allowEmpty('name');
            
        $validator
            ->add('is_active', 'valid', ['rule' => 'boolean'])
            ->requirePresence('is_active', 'create')
            ->notEmpty('is_active');
            
        $validator
            ->allowEmpty('description');
            
        $validator
            ->add('execution_days', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('execution_days');
            
        $validator
            ->allowEmpty('is_before_date');
            
        $validator
            ->add('execution_hour', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('execution_hour');
            
        $validator
            ->add('execution_min', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('execution_min');
            
        $validator
            ->allowEmpty('execution_cycle');

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
        $rules->add($rules->existsIn(['module_id'], 'Modules'));
        $rules->add($rules->existsIn(['trigger_type_id'], 'TriggerTypes'));
        $rules->add($rules->existsIn(['record_action_id'], 'RecordActions'));
        $rules->add($rules->existsIn(['module_field_id'], 'ModuleFields'));
        return $rules;
    }
}
