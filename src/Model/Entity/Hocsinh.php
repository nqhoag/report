<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Hocsinh Entity
 *
 * @property int $id
 * @property int $report_id
 * @property int $khoi_id
 * @property int $tong_so_lop
 * @property int $tong_so_hs
 * @property int $tong_so_hs_nu
 * @property int $tong_so_hs_dan_toc
 * @property int $tong_so_hs_dan_toc_nu
 * @property int $tong_so_voi_dau_nam
 * @property int $tong_so_voi_nam_truoc
 * @property int $so_lop_2buoi_1ngay
 * @property int $so_hs_2buoi_1ngay
 * @property int $so_lop_ban_tru
 * @property int $so_hs_ban_tru
 * @property int $so_lop_tieng_anh
 * @property int $so_hs_tieng_anh
 * @property int $so_lop_tin_hoc
 * @property int $so_hs_tin_hoc
 * @property int $hoan_thanh_tieng_viet
 * @property int $chua_hoan_thanh_tieng_viet
 * @property int $hoan_thanh_toan
 * @property int $chua_hoan_toan
 * @property int $nang_luc_dat
 * @property int $nang_luc_can_co_gang
 * @property int $pham_chat_dat
 * @property int $pham_chat_can_co_gang
 * @property int $so_hs_luu_ban
 * @property int $so_hs_dan_toc_luu_ban
 * @property int $so_hs_sinh_mien_tien
 * @property int $so_tien_mien
 * @property int $so_hs_sinh_giam_tien
 * @property int $so_tien_giam
 * @property int $so_hs_sinh_nhan_hoc_bong
 * @property int $so_tien_hoc_bong
 * @property int $so_hs_giam
 * @property int $so_hs_giam_vi_chet
 * @property int $so_hs_giam_vi_dau_keo_dai
 * @property int $so_hs_giam_vi_chuyen_di
 * @property int $so_hs_giam_vi_di_hoc_nghe
 * @property int $so_hs_bo_hoc
 * @property int $so_hs_bo_hoc_nu
 * @property int $so_hs_bo_hoc_dan_toc
 * @property int $so_hs_bo_hoc_vi_hoc_yeu
 * @property int $so_hs_bo_hoc_vi_kinh_te
 * @property int $so_hs_bo_hoc_vi_thien_tai
 * @property int $so_hs_bo_hoc_vi_vi_pham_ki_luat
 * @property int $so_hs_bo_hoc_vi_chua_xac_dinh
 * @property int $tong_so_giam_va_bo_hoc
 * @property string $ghi_chu
 *
 * @property \App\Model\Entity\Report $report
 * @property \App\Model\Entity\Khois $khois
 */
class Hocsinh extends Entity
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
