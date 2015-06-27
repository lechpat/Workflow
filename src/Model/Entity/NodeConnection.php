<?php
namespace Workflow\Model\Entity;

use Cake\ORM\Entity;

/**
 * NodeConnection Entity.
 */
class NodeConnection extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'incoming_node_id' => true,
        'outgoing_node_id' => true,
        'node_connection' => true,
        'incoming_node' => true,
        'outgoing_node' => true,
    ];
}
