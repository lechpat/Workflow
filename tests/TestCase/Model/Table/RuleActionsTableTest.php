<?php
namespace Workflow\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Workflow\Model\Table\RuleActionsTable;

/**
 * Workflow\Model\Table\RuleActionsTable Test Case
 */
class RuleActionsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.workflow.rule_actions',
        'plugin.workflow.rules',
        'plugin.workflow.modules',
        'plugin.workflow.trigger_types',
        'plugin.workflow.record_actions',
        'plugin.workflow.module_fields',
        'plugin.workflow.actions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RuleActions') ? [] : ['className' => 'Workflow\Model\Table\RuleActionsTable'];
        $this->RuleActions = TableRegistry::get('RuleActions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RuleActions);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
