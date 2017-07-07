<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PermissoesUsuariosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PermissoesUsuariosTable Test Case
 */
class PermissoesUsuariosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PermissoesUsuariosTable
     */
    public $PermissoesUsuarios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.permissoes_usuarios',
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
        'app.permissoes',
        'app.criacaos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PermissoesUsuarios') ? [] : ['className' => PermissoesUsuariosTable::class];
        $this->PermissoesUsuarios = TableRegistry::get('PermissoesUsuarios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PermissoesUsuarios);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
