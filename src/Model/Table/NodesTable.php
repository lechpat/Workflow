<?php
namespace Workflow\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Workflow\Model\Entity\Node;

/**
 * Nodes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Workflows
 * @property \Cake\ORM\Association\BelongsTo $Nodes
 */
class NodesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('workflow_nodes');
        $this->displayField('node_id');
        $this->primaryKey('node_id');
        $this->belongsTo('Workflows', [
            'foreignKey' => 'workflow_id',
            'joinType' => 'INNER',
            'className' => 'Workflow.Workflows'
        ]);
        $this->belongsToMany('OutNodes', [
            'foreignKey' => 'incoming_node_id',
            'targetForeignKey' => 'outgoing_node_id',
            'through' => 'NodeConnections',
            'className' => 'Workflow.Nodes',
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
            ->requirePresence('node_class', 'create')
            ->notEmpty('node_class');
            
        $validator
            ->allowEmpty('node_configuration');

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
        $rules->add($rules->existsIn(['node_id'], 'Nodes'));
        return $rules;
    }
}
