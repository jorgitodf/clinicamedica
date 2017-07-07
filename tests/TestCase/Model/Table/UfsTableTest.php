<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UfsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UfsTable Test Case
 */
class UfsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UfsTable
     */
    public $Ufs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ufs',
        'app.cidades'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Ufs') ? [] : ['className' => UfsTable::class];
        $this->Ufs = TableRegistry::get('Ufs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ufs);

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
}
