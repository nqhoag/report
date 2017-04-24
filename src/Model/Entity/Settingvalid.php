<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Settingvalid Entity
 *
 * @property int $id
 * @property string $mapping_table
 * @property string $mapping_column
 * @property int $type
 * @property int $caphoc_id
 * @property int $sheet_index
 * @property string $cell
 * @property string $validate
 *
 * @property \App\Model\Entity\Caphoc $caphoc
 */
class Settingvalid extends Entity
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
