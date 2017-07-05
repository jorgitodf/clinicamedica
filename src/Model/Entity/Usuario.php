<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Usuario Entity
 *
 * @property int $id_usuario
 * @property string $nome
 * @property int $cpf
 * @property string $rg
 * @property string $crm
 * @property \Cake\I18n\FrozenDate $data_nascimento
 * @property int $idade
 * @property string $tipo_pessoa
 * @property string $password
 * @property string $ativo
 * @property \Cake\I18n\FrozenTime $data_cadastro
 * @property int $estado_civil_id
 * @property int $especialidade_id
 * @property int $orgao_expedidor_id
 * @property int $endereco_id
 *
 * @property \App\Model\Entity\EstadosCivi $estados_civi
 * @property \App\Model\Entity\Especialidade $especialidade
 * @property \App\Model\Entity\OrgaosExpedidore $orgaos_expedidore
 * @property \App\Model\Entity\Endereco $endereco
 * @property \App\Model\Entity\Consulta[] $consultas
 * @property \App\Model\Entity\Email[] $emails
 * @property \App\Model\Entity\Telefone[] $telefones
 * @property \App\Model\Entity\TiposPlano[] $tipos_planos
 * @property \App\Model\Entity\TurnosAgendasMedico[] $turnos_agendas_medicos
 * @property \App\Model\Entity\Permisso[] $permissoes
 */
class Usuario extends Entity
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
        'id_usuario' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
