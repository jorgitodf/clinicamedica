<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Telefone Entity
 *
 * @property int $id_telefone
 * @property int $fone_fixo
 * @property int $fone_celular
 * @property int $fone_trabalho
 * @property int $usuario_id
 *
 * @property \App\Model\Entity\Usuario $usuario
 */
class Telefone extends Entity
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
        'id_telefone' => false
    ];
}
