<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Report Entity
 *
 * @property int $id
 * @property int $school_id
 * @property string $phienbanbaocao
 * @property int $solop
 * @property int $hocsinhnam
 * @property int $hocsinhnu
 * @property int $dansotrongdotuoi
 * @property int $hocsinhmienhocphi
 * @property int $sotienmien
 * @property int $hocsinhgiamhocphi
 * @property int $sotiengiam
 * @property int $hocsinhnhanhocbong
 * @property int $sotiennhanhocbong
 * @property int $hocsinhgiam
 * @property string $lydogiam
 * @property int $hocsinhbohoc
 * @property string $lydobo
 * @property int $bohocnu
 * @property int $bohocdantoc
 * @property int $hocsinhluuban
 * @property int $hocsinhluubannu
 * @property int $hocsinhluubandantoc
 * @property int $hsduthitotnghiep
 * @property int $hstotnghiep
 * @property int $hstotnghiepkhagioi
 * @property bool $conhanchamsocdtlsvh
 * @property string $tendtlsvh
 * @property string $diachidtlsvh
 * @property string $ghichudtlsvh
 * @property int $cointernet
 * @property string $nhamang
 * @property string $congnghe
 *
 * @property \App\Model\Entity\School $school
 */
class Report extends Entity
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
