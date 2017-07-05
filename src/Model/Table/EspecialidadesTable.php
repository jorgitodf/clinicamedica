<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Especialidades Model
 *
 * @property \App\Model\Table\UsuariosTable|\Cake\ORM\Association\HasMany $Usuarios
 *
 * @method \App\Model\Entity\Especialidade get($primaryKey, $options = [])
 * @method \App\Model\Entity\Especialidade newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Especialidade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Especialidade|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Especialidade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Especialidade[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Especialidade findOrCreate($search, callable $callback = null, $options = [])
 */
class EspecialidadesTable extends Table
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

        $this->setTable('especialidades');
        $this->setDisplayField('id_especialidade');
        $this->setPrimaryKey('id_especialidade');

        $this->hasMany('Usuarios', [
            'foreignKey' => 'especialidade_id'
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
            ->integer('id_especialidade')
            ->allowEmpty('id_especialidade', 'create');

        $validator
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        return $validator;
    }
}
