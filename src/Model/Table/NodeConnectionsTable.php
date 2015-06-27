<?php
namespace Workflow\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Workflow\Model\Entity\NodeConnection;

/**
 * NodeConnections Model
 *
 * @property \Cake\ORM\Association\BelongsTo $NodeConnections
 * @property \Cake\ORM\Association\BelongsTo $IncomingNodes
 * @property \Cake\ORM\Association\BelongsTo $OutgoingNodes
 */
class NodeConnectionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('workflow_node_connections');
        $this->displayField('node_connection_id');
        $this->primaryKey('node_connection_id');
        $this->belongsTo('IncomingNodes', [
            'foreignKey' => 'incoming_node_id',
            'joinType' => 'INNER',
            'className' => 'Workflow.Nodes'
        ]);
        $this->belongsTo('OutgoingNodes', [
            'foreignKey' => 'outgoing_node_id',
            'joinType' => 'INNER',
            'className' => 'Workflow.Nodes'
        ]);
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
        $rules->add($rules->existsIn(['node_connection_id'], 'NodeConnections'));
        $rules->add($rules->existsIn(['incoming_node_id'], 'IncomingNodes'));
        $rules->add($rules->existsIn(['outgoing_node_id'], 'OutgoingNodes'));
        return $rules;
    }
}
