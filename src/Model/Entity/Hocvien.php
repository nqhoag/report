<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Hocvien Entity
 *
 * @property int $id
 * @property int $report_id
 * @property int $hoc_vien
 * @property int $so_lop
 * @property int $so_hoc_vien
 * @property int $so_nu
 * @property int $so_dan_toc
 * @property int $so_ngoai_do_tuoi
 *
 * @property \App\Model\Entity\Report $report
 */
class Hocvien extends Entity
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
