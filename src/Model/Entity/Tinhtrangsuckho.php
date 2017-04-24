<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tinhtrangsuckho Entity
 *
 * @property int $id
 * @property int $school_id
 * @property int $report_id
 * @property int $khoi_id
 * @property int $tong_nhom_lop
 * @property int $tong_so_tre
 * @property int $so_kham_suc_khoe_dinh_ki
 * @property int $so_theo_doi_bd_can_nang
 * @property int $so_theo_doi_bd_chieu_cao
 * @property int $so_SDD_the_nhe_can
 * @property int $so_SDD_the_thap_coi
 *
 * @property \App\Model\Entity\School $school
 * @property \App\Model\Entity\Khois $khois
 */
class Tinhtrangsuckho extends Entity
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
