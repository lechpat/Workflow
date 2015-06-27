<?php
namespace Workflow\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NodeConnectionsFixture
 *
 */
class NodeConnectionsFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'workflow_node_connections';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'node_connection_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'incoming_node_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'outgoing_node_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['node_connection_id'], 'length' => []],
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
            'node_connection_id' => 1,
            'incoming_node_id' => 1,
            'outgoing_node_id' => 1
        ],
    ];
}
