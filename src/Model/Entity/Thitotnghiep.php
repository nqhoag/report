<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Thitotnghiep Entity
 *
 * @property int $id
 * @property int $report_id
 * @property int $nam
 * @property string $xep_hang
 * @property int $so_du_thi
 * @property int $so_tot_nghiep
 * @property int $so_kha_gioi
 *
 * @property \App\Model\Entity\Report $report
 */
class Thitotnghiep extends Entity
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
