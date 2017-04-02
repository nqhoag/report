<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lop Entity
 *
 * @property int $id
 * @property int $school_id
 * @property int $khoi_id
 * @property int $solop
 * @property int $sohocsinh
 *
 * @property \App\Model\Entity\School $school
 * @property \App\Model\Entity\Khois $khois
 */
class Lop extends Entity
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
        'id' => false
    ];
}
