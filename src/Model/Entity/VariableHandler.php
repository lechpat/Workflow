<?php
namespace Workflow\Model\Entity;

use Cake\ORM\Entity;

/**
 * VariableHandler Entity.
 */
class VariableHandler extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'variable' => true,
        'workflow' => true,
    ];
}
