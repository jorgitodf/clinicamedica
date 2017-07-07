<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PermissoesUsuarios Model
 *
 * @property \App\Model\Table\UsuariosTable|\Cake\ORM\Association\BelongsTo $Usuarios
 * @property \App\Model\Table\PermissoesTable|\Cake\ORM\Association\BelongsTo $Permissoes
 * @property \App\Model\Table\CriacaosTable|\Cake\ORM\Association\BelongsTo $Criacaos
 *
 * @method \App\Model\Entity\PermissoesUsuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\PermissoesUsuario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PermissoesUsuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PermissoesUsuario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PermissoesUsuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PermissoesUsuario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PermissoesUsuario findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PermissoesUsuariosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('permissoes_usuarios');
        $this->setDisplayField('usuario_id');
        $this->setPrimaryKey(['usuario_id', 'permissao_id']);

        $this->addBehavior('Timestamp');

        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Permissoes', [
            'foreignKey' => 'permissao_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Criacaos', [
            'foreignKey' => 'criacao_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['usuario_id'], 'Usuarios'));
        $rules->add($rules->existsIn(['permissao_id'], 'Permissoes'));
        $rules->add($rules->existsIn(['criacao_id'], 'Criacaos'));

        return $rules;
    }
}
