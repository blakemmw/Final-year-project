<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EpaymentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EpaymentsTable Test Case
 */
class EpaymentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EpaymentsTable
     */
    public $Epayments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.epayments',
        'app.bookings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Epayments') ? [] : ['className' => EpaymentsTable::class];
        $this->Epayments = TableRegistry::getTableLocator()->get('Epayments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Epayments);

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
