<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{

    public $autoId = false;

    public function up()
    {

        $this->table('agendas_medicos')
            ->addColumn('id_agenda_medico', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id_agenda_medico'])
            ->addColumn('inicio', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('termino', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('turno_agenda_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'turno_agenda_id',
                ]
            )
            ->create();

        $this->table('bairros')
            ->addColumn('id_bairro', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id_bairro'])
            ->addColumn('bairro', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('cidade_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'cidade_id',
                ]
            )
            ->create();

        $this->table('cidades')
            ->addColumn('id_cidade', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id_cidade'])
            ->addColumn('cidade', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('uf_id', 'integer', [
                'default' => null,
                'limit' => 3,
                'null' => false,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'uf_id',
                ]
            )
            ->create();

        $this->table('consultas')
            ->addColumn('id_consulta', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addPrimaryKey(['id_consulta'])
            ->addColumn('data_consulta', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('anamnese', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('peso_paciente', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('altura_paciente', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('cigarro', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('bebida', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('turno_agenda_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('tipo_consulta_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('usuario_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'tipo_consulta_id',
                ]
            )
            ->addIndex(
                [
                    'turno_agenda_id',
                ]
            )
            ->addIndex(
                [
                    'usuario_id',
                ]
            )
            ->create();

        $this->table('emails')
            ->addColumn('id_email', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id_email'])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => false,
            ])
            ->addColumn('usuario_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'usuario_id',
                ]
            )
            ->create();

        $this->table('enderecos')
            ->addColumn('id_endereco', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id_endereco'])
            ->addColumn('complemento', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('numero', 'string', [
                'default' => null,
                'limit' => 12,
                'null' => false,
            ])
            ->addColumn('cep', 'integer', [
                'default' => null,
                'limit' => 8,
                'null' => false,
            ])
            ->addColumn('bairro_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('logradouro_id', 'integer', [
                'default' => null,
                'limit' => 5,
                'null' => false,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'bairro_id',
                ]
            )
            ->addIndex(
                [
                    'logradouro_id',
                ]
            )
            ->create();

        $this->table('especialidades')
            ->addColumn('id_especialidade', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 5,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id_especialidade'])
            ->addColumn('nome', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->create();

        $this->table('estados_civis')
            ->addColumn('id_estado_civil', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 6,
                'null' => false,
            ])
            ->addPrimaryKey(['id_estado_civil'])
            ->addColumn('descricao', 'string', [
                'default' => null,
                'limit' => 40,
                'null' => false,
            ])
            ->create();

        $this->table('exames')
            ->addColumn('id_exame', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addPrimaryKey(['id_exame'])
            ->addColumn('nome_exame', 'string', [
                'default' => null,
                'limit' => 80,
                'null' => false,
            ])
            ->create();

        $this->table('fabricantes')
            ->addColumn('id_fabricante', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id_fabricante'])
            ->addColumn('sigla', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('nome_fabricante', 'string', [
                'default' => null,
                'limit' => 120,
                'null' => false,
            ])
            ->create();

        $this->table('logradouros')
            ->addColumn('id_logradouro', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 5,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id_logradouro'])
            ->addColumn('nome', 'string', [
                'default' => null,
                'limit' => 90,
                'null' => false,
            ])
            ->create();

        $this->table('medicamentos')
            ->addColumn('id_medicamento', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addPrimaryKey(['id_medicamento'])
            ->addColumn('nome_generico', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('nome_fabrica', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('fabricante_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'fabricante_id',
                ]
            )
            ->create();

        $this->table('medicamentos_receitas')
            ->addColumn('id_medicamento_receita', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id_medicamento_receita'])
            ->addColumn('quantidade', 'integer', [
                'default' => null,
                'limit' => 5,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('medicamento_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('receita_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'medicamento_id',
                ]
            )
            ->addIndex(
                [
                    'receita_id',
                ]
            )
            ->create();

        $this->table('orgaos_expedidores')
            ->addColumn('id_orgao_expedidor', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 5,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id_orgao_expedidor'])
            ->addColumn('nome', 'string', [
                'default' => null,
                'limit' => 130,
                'null' => false,
            ])
            ->create();

        $this->table('permissoes')
            ->addColumn('id_permissoes', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 3,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id_permissoes'])
            ->addColumn('permissao', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->create();

        $this->table('permissoes_usuarios')
            ->addColumn('usuario_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('permissao_id', 'integer', [
                'default' => null,
                'limit' => 3,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['usuario_id', 'permissao_id'])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('criacao_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'permissao_id',
                ]
            )
            ->addIndex(
                [
                    'usuario_id',
                ]
            )
            ->addIndex(
                [
                    'criacao_id',
                ]
            )
            ->create();

        $this->table('planos_saudes')
            ->addColumn('id_plano_saude', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id_plano_saude'])
            ->addColumn('nome_plano', 'string', [
                'default' => null,
                'limit' => 70,
                'null' => false,
            ])
            ->create();

        $this->table('receitas')
            ->addColumn('id_receita', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addPrimaryKey(['id_receita'])
            ->addColumn('descricao', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('consulta_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'consulta_id',
                ]
            )
            ->create();

        $this->table('telefones')
            ->addColumn('id_telefone', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id_telefone'])
            ->addColumn('fone_fixo', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('fone_celular', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('fone_trabalho', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('usuario_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'usuario_id',
                ]
            )
            ->create();

        $this->table('temps')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('nome', 'string', [
                'default' => null,
                'limit' => 200,
                'null' => false,
            ])
            ->addColumn('username', 'string', [
                'default' => null,
                'limit' => 200,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('tipos_consultas')
            ->addColumn('id_tipo_consulta', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addPrimaryKey(['id_tipo_consulta'])
            ->addColumn('descricao', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addIndex(
                [
                    'descricao',
                ]
            )
            ->create();

        $this->table('tipos_exames')
            ->addColumn('id_tipo_exame', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addPrimaryKey(['id_tipo_exame'])
            ->addColumn('descricao', 'string', [
                'default' => null,
                'limit' => 200,
                'null' => false,
            ])
            ->addColumn('consulta_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('exame_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'consulta_id',
                ]
            )
            ->addIndex(
                [
                    'exame_id',
                ]
            )
            ->create();

        $this->table('tipos_planos')
            ->addColumn('id_tipo_plano', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id_tipo_plano'])
            ->addColumn('tipo_plano', 'string', [
                'default' => null,
                'limit' => 70,
                'null' => false,
            ])
            ->addColumn('numero_carteira', 'biginteger', [
                'default' => null,
                'limit' => 12,
                'null' => false,
            ])
            ->addColumn('data_validade', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('ativo', 'string', [
                'default' => 'S',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('plano_saude_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('usuario_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'plano_saude_id',
                ]
            )
            ->addIndex(
                [
                    'usuario_id',
                ]
            )
            ->create();

        $this->table('turnos_agendas_medicos')
            ->addColumn('id_turno_agenda', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id_turno_agenda'])
            ->addColumn('descricao', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->addColumn('usuario_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'usuario_id',
                ]
            )
            ->create();

        $this->table('ufs')
            ->addColumn('id_uf', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 3,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id_uf'])
            ->addColumn('uf', 'string', [
                'default' => null,
                'limit' => 2,
                'null' => true,
            ])
            ->create();

        $this->table('users')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 200,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 200,
                'null' => false,
            ])
            ->addColumn('username', 'string', [
                'default' => null,
                'limit' => 200,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 200,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('usuarios')
            ->addColumn('id_usuario', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id_usuario'])
            ->addColumn('nome', 'string', [
                'default' => null,
                'limit' => 120,
                'null' => true,
            ])
            ->addColumn('cpf', 'biginteger', [
                'default' => null,
                'limit' => 11,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('rg', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => true,
            ])
            ->addColumn('crm', 'string', [
                'default' => null,
                'limit' => 12,
                'null' => true,
            ])
            ->addColumn('data_nascimento', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('idade', 'integer', [
                'default' => null,
                'limit' => 2,
                'null' => true,
            ])
            ->addColumn('tipo_pessoa', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 200,
                'null' => true,
            ])
            ->addColumn('ativo', 'string', [
                'default' => 'S',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('data_cadastro', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('estado_civil_id', 'integer', [
                'default' => null,
                'limit' => 6,
                'null' => true,
            ])
            ->addColumn('especialidade_id', 'integer', [
                'default' => null,
                'limit' => 5,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('orgao_expedidor_id', 'integer', [
                'default' => null,
                'limit' => 5,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('endereco_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'endereco_id',
                ]
            )
            ->addIndex(
                [
                    'especialidade_id',
                ]
            )
            ->addIndex(
                [
                    'estado_civil_id',
                ]
            )
            ->addIndex(
                [
                    'orgao_expedidor_id',
                ]
            )
            ->create();

        $this->table('agendas_medicos')
            ->addForeignKey(
                'turno_agenda_id',
                'turnos_agendas_medicos',
                'id_turno_agenda',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('bairros')
            ->addForeignKey(
                'cidade_id',
                'cidades',
                'id_cidade',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('cidades')
            ->addForeignKey(
                'uf_id',
                'ufs',
                'id_uf',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('consultas')
            ->addForeignKey(
                'tipo_consulta_id',
                'tipos_consultas',
                'id_tipo_consulta',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'turno_agenda_id',
                'turnos_agendas_medicos',
                'id_turno_agenda',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('enderecos')
            ->addForeignKey(
                'bairro_id',
                'bairros',
                'id_bairro',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'logradouro_id',
                'logradouros',
                'id_logradouro',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('medicamentos')
            ->addForeignKey(
                'fabricante_id',
                'fabricantes',
                'id_fabricante',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('medicamentos_receitas')
            ->addForeignKey(
                'medicamento_id',
                'medicamentos',
                'id_medicamento',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'receita_id',
                'receitas',
                'id_receita',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('permissoes_usuarios')
            ->addForeignKey(
                'permissao_id',
                'permissoes',
                'id_permissoes',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('receitas')
            ->addForeignKey(
                'consulta_id',
                'consultas',
                'id_consulta',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('tipos_exames')
            ->addForeignKey(
                'consulta_id',
                'consultas',
                'id_consulta',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'exame_id',
                'exames',
                'id_exame',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('tipos_planos')
            ->addForeignKey(
                'plano_saude_id',
                'planos_saudes',
                'id_plano_saude',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('usuarios')
            ->addForeignKey(
                'endereco_id',
                'enderecos',
                'id_endereco',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'especialidade_id',
                'especialidades',
                'id_especialidade',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'estado_civil_id',
                'estados_civis',
                'id_estado_civil',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'orgao_expedidor_id',
                'orgaos_expedidores',
                'id_orgao_expedidor',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('agendas_medicos')
            ->dropForeignKey(
                'turno_agenda_id'
            );

        $this->table('bairros')
            ->dropForeignKey(
                'cidade_id'
            );

        $this->table('cidades')
            ->dropForeignKey(
                'uf_id'
            );

        $this->table('consultas')
            ->dropForeignKey(
                'tipo_consulta_id'
            )
            ->dropForeignKey(
                'turno_agenda_id'
            );

        $this->table('enderecos')
            ->dropForeignKey(
                'bairro_id'
            )
            ->dropForeignKey(
                'logradouro_id'
            );

        $this->table('medicamentos')
            ->dropForeignKey(
                'fabricante_id'
            );

        $this->table('medicamentos_receitas')
            ->dropForeignKey(
                'medicamento_id'
            )
            ->dropForeignKey(
                'receita_id'
            );

        $this->table('permissoes_usuarios')
            ->dropForeignKey(
                'permissao_id'
            );

        $this->table('receitas')
            ->dropForeignKey(
                'consulta_id'
            );

        $this->table('tipos_exames')
            ->dropForeignKey(
                'consulta_id'
            )
            ->dropForeignKey(
                'exame_id'
            );

        $this->table('tipos_planos')
            ->dropForeignKey(
                'plano_saude_id'
            );

        $this->table('usuarios')
            ->dropForeignKey(
                'endereco_id'
            )
            ->dropForeignKey(
                'especialidade_id'
            )
            ->dropForeignKey(
                'estado_civil_id'
            )
            ->dropForeignKey(
                'orgao_expedidor_id'
            );

        $this->dropTable('agendas_medicos');
        $this->dropTable('bairros');
        $this->dropTable('cidades');
        $this->dropTable('consultas');
        $this->dropTable('emails');
        $this->dropTable('enderecos');
        $this->dropTable('especialidades');
        $this->dropTable('estados_civis');
        $this->dropTable('exames');
        $this->dropTable('fabricantes');
        $this->dropTable('logradouros');
        $this->dropTable('medicamentos');
        $this->dropTable('medicamentos_receitas');
        $this->dropTable('orgaos_expedidores');
        $this->dropTable('permissoes');
        $this->dropTable('permissoes_usuarios');
        $this->dropTable('planos_saudes');
        $this->dropTable('receitas');
        $this->dropTable('telefones');
        $this->dropTable('temps');
        $this->dropTable('tipos_consultas');
        $this->dropTable('tipos_exames');
        $this->dropTable('tipos_planos');
        $this->dropTable('turnos_agendas_medicos');
        $this->dropTable('ufs');
        $this->dropTable('users');
        $this->dropTable('usuarios');
    }
}
