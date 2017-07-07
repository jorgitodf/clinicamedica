<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Permissoes Model
 *
 * @property \App\Model\Table\UsuariosTable|\Cake\ORM\Association\BelongsToMany $Usuarios
 *
 * @method \App\Model\Entity\Permisso get($primaryKey, $options = [])
 * @method \App\Model\Entity\Permisso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Permisso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Permisso|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Permisso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Permisso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Permisso findOrCreate($search, callable $callback = null, $options = [])
 */
class PermissoesTable extends Table
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

        $this->setTable('permissoes');
        $this->setDisplayField('id_permissoes');
        $this->setPrimaryKey('id_permissoes');

        $this->belongsToMany('Usuarios', [
            'foreignKey' => 'permisso_id',
            'targetForeignKey' => 'usuario_id',
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
            ->integer('id_permissoes')
            ->allowEmpty('id_permissoes', 'create');

        $validator
            ->requirePresence('permissao', 'create')
            ->notEmpty('permissao');

        return $validator;
    }
}
