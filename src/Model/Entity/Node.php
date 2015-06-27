<?php
namespace Workflow\Model\Entity;

use Cake\ORM\Entity;

/**
 * Node Entity.
 */
class Node extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'workflow_id' => true,
        'node_class' => true,
        'node_configuration' => true,
        'workflow' => true,
        'node' => true,
    ];
}
