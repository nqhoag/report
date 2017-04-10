<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ketnoiinternet Entity
 *
 * @property int $id
 * @property int $report_id
 * @property int $nha_mang
 * @property int $tong_so_may
 * @property int $cn_ADSL
 * @property int $cn_cap_quang
 *
 * @property \App\Model\Entity\Report $report
 */
class Ketnoiinternet extends Entity
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
