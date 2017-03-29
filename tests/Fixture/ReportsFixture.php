<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReportsFixture
 *
 */
class ReportsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'mã báo cáo', 'autoIncrement' => true, 'precision' => null],
        'school_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'phienbanbaocao' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'phiên bản báo cáo', 'precision' => null, 'fixed' => null],
        'solop' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'tổng số lớp học của trường', 'precision' => null, 'autoIncrement' => null],
        'hocsinhnam' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'số học sinh nam', 'precision' => null, 'autoIncrement' => null],
        'hocsinhnu' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'số học sinh nữ', 'precision' => null, 'autoIncrement' => null],
        'dansotrongdotuoi' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'dân số trong độ tuổi', 'precision' => null, 'autoIncrement' => null],
        'hocsinhmienhocphi' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'sô hs đươc miễn học phí', 'precision' => null, 'autoIncrement' => null],
        'sotienmien' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'tổng số tiền miễn học phí', 'precision' => null, 'autoIncrement' => null],
        'hocsinhgiamhocphi' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'số hs được giảm học phí', 'precision' => null, 'autoIncrement' => null],
        'sotiengiam' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'tổng số tiền giảm học phí', 'precision' => null, 'autoIncrement' => null],
        'hocsinhnhanhocbong' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'số hs nhận học bổng', 'precision' => null, 'autoIncrement' => null],
        'sotiennhanhocbong' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'tổng số tiền trao học bổng', 'precision' => null, 'autoIncrement' => null],
        'hocsinhgiam' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'số lượng học sinh giảm so với đầu năm học', 'precision' => null, 'autoIncrement' => null],
        'lydogiam' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'lý do giảm', 'precision' => null, 'fixed' => null],
        'hocsinhbohoc' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'số học sinh bỏ học', 'precision' => null, 'autoIncrement' => null],
        'lydobo' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'lý do bỏ học', 'precision' => null, 'fixed' => null],
        'bohocnu' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'học sinh nữ bỏ học', 'precision' => null, 'autoIncrement' => null],
        'bohocdantoc' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'học sinh dân tộc bỏ học', 'precision' => null, 'autoIncrement' => null],
        'hocsinhluuban' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'hs lưu ban', 'precision' => null, 'autoIncrement' => null],
        'hocsinhluubannu' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'hs lưu ban nữ', 'precision' => null, 'autoIncrement' => null],
        'hocsinhluubandantoc' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'hs lưu ban dân tộc', 'precision' => null, 'autoIncrement' => null],
        'hsduthitotnghiep' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'hs dự thi tốt nghiệp', 'precision' => null, 'autoIncrement' => null],
        'hstotnghiep' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'hs được tốt nghiệp', 'precision' => null, 'autoIncrement' => null],
        'hstotnghiepkhagioi' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'hs tốt nghiệp khá giỏi', 'precision' => null, 'autoIncrement' => null],
        'conhanchamsocdtlsvh' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'có nhận chăm sóc di tích lịch sử, văn hóa tại địa phương ?', 'precision' => null],
        'tendtlsvh' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Tên di tích lịch sử, văn hóa tại địa phương được trường nhận chăm sóc', 'precision' => null, 'fixed' => null],
        'diachidtlsvh' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Địa chỉ di tích lịch sử, văn hóa được đơn vị nhận chăm sóc', 'precision' => null, 'fixed' => null],
        'ghichudtlsvh' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'ghi chu di tích lịch sử, văn hóa được đơn vị nhận chăm sóc', 'precision' => null, 'fixed' => null],
        'cointernet' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'có internet ?', 'precision' => null, 'autoIncrement' => null],
        'nhamang' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'congnghe' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'school_id' => 1,
            'phienbanbaocao' => 'Lorem ipsum dolor sit amet',
            'solop' => 1,
            'hocsinhnam' => 1,
            'hocsinhnu' => 1,
            'dansotrongdotuoi' => 1,
            'hocsinhmienhocphi' => 1,
            'sotienmien' => 1,
            'hocsinhgiamhocphi' => 1,
            'sotiengiam' => 1,
            'hocsinhnhanhocbong' => 1,
            'sotiennhanhocbong' => 1,
            'hocsinhgiam' => 1,
            'lydogiam' => 'Lorem ipsum dolor sit amet',
            'hocsinhbohoc' => 1,
            'lydobo' => 'Lorem ipsum dolor sit amet',
            'bohocnu' => 1,
            'bohocdantoc' => 1,
            'hocsinhluuban' => 1,
            'hocsinhluubannu' => 1,
            'hocsinhluubandantoc' => 1,
            'hsduthitotnghiep' => 1,
            'hstotnghiep' => 1,
            'hstotnghiepkhagioi' => 1,
            'conhanchamsocdtlsvh' => 1,
            'tendtlsvh' => 'Lorem ipsum dolor sit amet',
            'diachidtlsvh' => 'Lorem ipsum dolor sit amet',
            'ghichudtlsvh' => 'Lorem ipsum dolor sit amet',
            'cointernet' => 1,
            'nhamang' => 'Lorem ipsum dolor sit amet',
            'congnghe' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
