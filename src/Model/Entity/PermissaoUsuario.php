
<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PermissoesUsuario Entity
 *
 * @property int $usuario_id
 * @property int $permissao_id
 * @property \Cake\I18n\FrozenTime $created
 * @property int $criacao_id
 *
 * @property \App\Model\Entity\Usuario $usuario
 * @property \App\Model\Entity\Permisso $permisso
 * @property \App\Model\Entity\Criacao $criacao
 */
class PermissaoUsuario extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'usuario_id' => false,
        'permissao_id' => false
    ];
}
