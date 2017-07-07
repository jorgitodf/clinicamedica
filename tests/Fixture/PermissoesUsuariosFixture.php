<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PermissoesUsuariosFixture
 *
 */
class PermissoesUsuariosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'usuario_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'permissao_id' => ['type' => 'integer', 'length' => 3, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'criacao_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_permissoes_usuarios__idx' => ['type' => 'index', 'columns' => ['usuario_id'], 'length' => []],
            'fk_permissoes_usuarios_permissoes_idx' => ['type' => 'index', 'columns' => ['permissao_id'], 'length' => []],
            'fk_permissoes_usuarios2_idx' => ['type' => 'index', 'columns' => ['criacao_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['usuario_id', 'permissao_id'], 'length' => []],
            'fk_permissoes_usuarios_permissoes' => ['type' => 'foreign', 'columns' => ['permissao_id'], 'references' => ['permissoes', 'id_permissoes'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
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
            'usuario_id' => 1,
            'permissao_id' => 1,
            'created' => '2017-07-07 14:36:50',
            'criacao_id' => 1
        ],
    ];
}
