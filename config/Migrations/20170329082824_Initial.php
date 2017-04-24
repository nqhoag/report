<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('reports')
            ->addColumn('school_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('phienbanbaocao', 'string', [
                'comment' => 'phiên bản báo cáo',
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('solop', 'integer', [
                'comment' => 'tổng số lớp học của trường',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('hocsinhnam', 'integer', [
                'comment' => 'số học sinh nam',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('hocsinhnu', 'integer', [
                'comment' => 'số học sinh nữ',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('dansotrongdotuoi', 'integer', [
                'comment' => 'dân số trong độ tuổi',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('hocsinhmienhocphi', 'integer', [
                'comment' => 'sô hs đươc miễn học phí',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('sotienmien', 'integer', [
                'comment' => 'tổng số tiền miễn học phí',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('hocsinhgiamhocphi', 'integer', [
                'comment' => 'số hs được giảm học phí',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('sotiengiam', 'integer', [
                'comment' => 'tổng số tiền giảm học phí',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('hocsinhnhanhocbong', 'integer', [
                'comment' => 'số hs nhận học bổng',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('sotiennhanhocbong', 'integer', [
                'comment' => 'tổng số tiền trao học bổng',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('hocsinhgiam', 'integer', [
                'comment' => 'số lượng học sinh giảm so với đầu năm học',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('lydogiam', 'string', [
                'comment' => 'lý do giảm',
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('hocsinhbohoc', 'integer', [
                'comment' => 'số học sinh bỏ học',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('lydobo', 'string', [
                'comment' => 'lý do bỏ học',
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('bohocnu', 'integer', [
                'comment' => 'học sinh nữ bỏ học',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('bohocdantoc', 'integer', [
                'comment' => 'học sinh dân tộc bỏ học',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('hocsinhluuban', 'integer', [
                'comment' => 'hs lưu ban',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('hocsinhluubannu', 'integer', [
                'comment' => 'hs lưu ban nữ',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('hocsinhluubandantoc', 'integer', [
                'comment' => 'hs lưu ban dân tộc',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('hsduthitotnghiep', 'integer', [
                'comment' => 'hs dự thi tốt nghiệp',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('hstotnghiep', 'integer', [
                'comment' => 'hs được tốt nghiệp',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('hstotnghiepkhagioi', 'integer', [
                'comment' => 'hs tốt nghiệp khá giỏi',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('conhanchamsocdtlsvh', 'boolean', [
                'comment' => 'có nhận chăm sóc di tích lịch sử, văn hóa tại địa phương ?',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('tendtlsvh', 'string', [
                'comment' => 'Tên di tích lịch sử, văn hóa tại địa phương được trường nhận chăm sóc',
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('diachidtlsvh', 'string', [
                'comment' => 'Địa chỉ di tích lịch sử, văn hóa được đơn vị nhận chăm sóc',
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('ghichudtlsvh', 'string', [
                'comment' => 'ghi chu di tích lịch sử, văn hóa được đơn vị nhận chăm sóc',
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('cointernet', 'integer', [
                'comment' => 'có internet ?',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('nhamang', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('congnghe', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->create();

        $this->table('schools')
            ->addColumn('ten', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('diachi', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('caphoc', 'integer', [
                'comment' => '0: mẫu giáo, mầm non. 1: cấp 1. 2: cấp 2. 3: cấp 3. 4: bổ túc , GDTX',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('loaitruong', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('namthanhlap', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('sodienthoai', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->create();
    }

    public function down()
    {
        $this->dropTable('reports');
        $this->dropTable('schools');
    }
}
