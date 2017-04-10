<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cosovatchat Entity
 *
 * @property int $id
 * @property int $report_id
 * @property int $khoi_id
 * @property int $kieuphong_id
 * @property int $kien_co
 * @property int $ban_kien_co
 * @property int $cap_4
 * @property int $phong_tam
 * @property int $phong_muon
 * @property int $phong_thua
 * @property int $phong_thieu
 * @property int $phong_xay_moi_trong_nam
 * @property int $ca_3
 *
 * @property \App\Model\Entity\Report $report
 * @property \App\Model\Entity\Khois $khois
 * @property \App\Model\Entity\Kieuphong $kieuphong
 */
class Cosovatchat extends Entity
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
