<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Hoithi Entity
 *
 * @property int $id
 * @property int $report_id
 * @property int $thanh_phan
 * @property int $so_luong_tham_gia
 * @property string $noi_dung_thi
 * @property int $nhat_cap_huyen
 * @property int $nhi_cap_huyen
 * @property int $ba_cap_huyen
 * @property int $khuyen_khich_cap_huyen
 * @property int $nhat_cap_tinh
 * @property int $nhi_cap_tinh
 * @property int $ba_cap_tinh
 * @property int $khuyen_khich_cap_tinh
 * @property int $nhat_cap_quoc_gia
 * @property int $nhi_cap_quoc_gia
 * @property int $ba_cap_quoc_gia
 * @property int $khuyen_khich_cap_quoc_gia
 * @property string $ghichu
 *
 * @property \App\Model\Entity\Report $report
 */
class Hoithi extends Entity
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
