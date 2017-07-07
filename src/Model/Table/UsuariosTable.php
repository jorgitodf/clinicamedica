<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;
use DateTime;

/**
 * Usuarios Model
 */
class UsuariosTable extends Table
{
    protected $connection;

    public function __construct()
    {
        parent::__construct();
        $this->connection = ConnectionManager::get('default');
    }
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('usuarios');
        $this->setDisplayField('id_usuario');
        $this->setPrimaryKey('id_usuario');

        $this->belongsTo('EstadosCivis', [
            'foreignKey' => 'estado_civil_id'
        ]);
        $this->belongsTo('Especialidades', [
            'foreignKey' => 'especialidade_id'
        ]);
        $this->belongsTo('OrgaosExpedidores', [
            'foreignKey' => 'orgao_expedidor_id'
        ]);
        $this->belongsTo('Enderecos', [
            'foreignKey' => 'endereco_id'
        ]);
        $this->hasMany('Consultas', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->hasMany('Emails', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->hasMany('Telefones', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->hasMany('TiposPlanos', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->hasMany('TurnosAgendasMedicos', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->belongsToMany('Permissoes', [
            'foreignKey' => 'usuario_id',
            'targetForeignKey' => 'permisso_id',
            'joinTable' => 'permissoes_usuarios'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id_usuario')
            ->allowEmpty('id_usuario', 'create');

        $validator
            ->allowEmpty('nome');

        $validator
            ->requirePresence('cpf', 'create')
            ->notEmpty('cpf');

        $validator
            ->allowEmpty('rg');

        $validator
            ->allowEmpty('crm');

        $validator
            ->date('data_nascimento')
            ->allowEmpty('data_nascimento');

        $validator
            ->integer('idade')
            ->allowEmpty('idade');

        $validator
            ->allowEmpty('tipo_pessoa');

        $validator
            ->allowEmpty('password');

        $validator
            ->requirePresence('ativo', 'create')
            ->notEmpty('ativo');

        $validator
            ->dateTime('data_cadastro')
            ->requirePresence('data_cadastro', 'create')
            ->notEmpty('data_cadastro');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['estado_civil_id'], 'EstadosCivis'));
        $rules->add($rules->existsIn(['especialidade_id'], 'Especialidades'));
        $rules->add($rules->existsIn(['orgao_expedidor_id'], 'OrgaosExpedidores'));
        $rules->add($rules->existsIn(['endereco_id'], 'Enderecos'));

        return $rules;
    }

    public function getEmailSenha($email, $password)
    {
        if (isset($email) && isset($password)) {
            return $this->connection->execute('SELECT u.nome AS nome, u.cpf AS cpf, u.password AS password, u.ativo AS ativo,
              e.email AS email FROM usuarios u JOIN emails e ON (u.id_usuario = e.id_email)
              WHERE e.email = :email AND u.password = :password', ['email' => trim($email), 'password' => trim($password)])->fetchAll('assoc');
        }
    }

    public function salvarUsuarios($usuarios)
    {
        return $this->connection->insert('usuarios', [
          'nome' => $usuarios['nome'],
          'cpf' => $usuarios['cpf'],
          'rg' => $usuarios['rg'],
          'data_nascimento' => $usuarios['data_nascimento'],
          'tipo_pessoa' => $usuarios['tipo_pessoa'],
          'password' => $usuarios['password'],
          'ativo' => 'S',
          'data_cadastro' => new DateTime('now'),
          'estado_civil_id' => $usuarios['estado_civil'],
          'orgao_expedidor_id' => $usuarios['orgao_expedidor']
        ], ['data_cadastro' => 'datetime']);
    }
}
