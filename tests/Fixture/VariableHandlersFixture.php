<?php
namespace Workflow\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VariableHandlersFixture
 *
 */
class VariableHandlersFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'workflow_variable_handlers';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'workflow_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'variable' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'class' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['workflow_id', 'class'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'workflow_id' => 1,
            'variable' => 'Lorem ipsum dolor sit amet',
            'class' => '8aa5c146-177d-40dd-aa56-f4532fd4f75b'
        ],
    ];
}
