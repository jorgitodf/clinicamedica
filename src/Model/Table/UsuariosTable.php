<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * Usuarios Model
 *
 * @property \App\Model\Table\EstadosCivisTable|\Cake\ORM\Association\BelongsTo $EstadosCivis
 * @property \App\Model\Table\EspecialidadesTable|\Cake\ORM\Association\BelongsTo $Especialidades
 * @property \App\Model\Table\OrgaosExpedidoresTable|\Cake\ORM\Association\BelongsTo $OrgaosExpedidores
 * @property \App\Model\Table\EnderecosTable|\Cake\ORM\Association\BelongsTo $Enderecos
 * @property \App\Model\Table\ConsultasTable|\Cake\ORM\Association\HasMany $Consultas
 * @property \App\Model\Table\EmailsTable|\Cake\ORM\Association\HasMany $Emails
 * @property \App\Model\Table\TelefonesTable|\Cake\ORM\Association\HasMany $Telefones
 * @property \App\Model\Table\TiposPlanosTable|\Cake\ORM\Association\HasMany $TiposPlanos
 * @property \App\Model\Table\TurnosAgendasMedicosTable|\Cake\ORM\Association\HasMany $TurnosAgendasMedicos
 * @property \App\Model\Table\PermissoesTable|\Cake\ORM\Association\BelongsToMany $Permissoes
 *
 * @method \App\Model\Entity\Usuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Usuario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Usuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usuario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario findOrCreate($search, callable $callback = null, $options = [])
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

}
