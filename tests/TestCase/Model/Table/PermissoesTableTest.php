<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PermissoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PermissoesTable Test Case
 */
class PermissoesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PermissoesTable
     */
    public $Permissoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.permissoes',
        'app.usuarios',
        'app.estados_civis',
        'app.especialidades',
        'app.orgaos_expedidores',
        'app.enderecos',
        'app.bairros',
        'app.cidades',
        'app.ufs',
        'app.logradouros',
        'app.consultas',
        'app.emails',
        'app.telefones',
        'app.tipos_planos',
        'app.turnos_agendas_medicos',
        'app.permissoes_usuarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Permissoes') ? [] : ['className' => PermissoesTable::class];
        $this->Permissoes = TableRegistry::get('Permissoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Permissoes);

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
