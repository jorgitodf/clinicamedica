<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Endereco Entity
 *
 * @property int $id_endereco
 * @property string $complemento
 * @property string $numero
 * @property int $cep
 * @property int $bairro_id
 * @property int $logradouro_id
 *
 * @property \App\Model\Entity\Bairro $bairro
 * @property \App\Model\Entity\Logradouro $logradouro
 * @property \App\Model\Entity\Usuario[] $usuarios
 */
class Endereco extends Entity
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
        'id_endereco' => false
    ];
}
