<?php
namespace Workflow\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExecutionsFixture
 *
 */
class ExecutionsFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'workflow_executions';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'workflow_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'execution_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'execution_parent' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'execution_started' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'execution_suspended' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'execution_variables' => ['type' => 'binary', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'execution_waiting_for' => ['type' => 'binary', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'execution_threads' => ['type' => 'binary', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'execution_next_thread_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'execution_parent' => ['type' => 'index', 'columns' => ['execution_parent'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['execution_id', 'workflow_id'], 'length' => []],
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
            'execution_id' => 1,
            'execution_parent' => 1,
            'execution_started' => 1,
            'execution_suspended' => 1,
            'execution_variables' => 'Lorem ipsum dolor sit amet',
            'execution_waiting_for' => 'Lorem ipsum dolor sit amet',
            'execution_threads' => 'Lorem ipsum dolor sit amet',
            'execution_next_thread_id' => 1
        ],
    ];
}
