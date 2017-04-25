<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'SỞ GIÁO DỤC VÀ ĐÀO TẠO QUẢNG NGÃI';
?>

    <!DOCTYPE html>
    <html>

    <head>
        <?= $this->Html->charset() ?>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>
                <?= $cakeDescription ?> -
                    <?= $this->fetch('title') ?>
            </title>
            <?= $this->Html->meta('icon') ?>
                <?= $this->Html->css('bootstrap.css') ?>
                    <?= $this->Html->css('custom.css') ?>
                        <?= $this->Html->script('jquery.js') ?>
                            <?= $this->Html->script('bootstrap.min.js') ?>
                                <?= $this->fetch('meta') ?>
                                    <?= $this->fetch('css') ?>
                                        <?= $this->fetch('script') ?>
                                            <!--<script id="_carbonads_projs" type="text/javascript" src="//srv.carbonads.net/ads/C6AILKT.json?segment=placement:bootswatchcom&amp;callback=_carbonads_go"></script>-->
                                            <style>
                                                body,
                                                html {
                                                    background: rgba(73, 155, 234, 1);
                                                    background: -moz-radial-gradient(center, ellipse cover, rgba(73, 155, 234, 1) 0%, rgba(32, 124, 229, 1) 100%);
                                                    background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(73, 155, 234, 1)), color-stop(100%, rgba(32, 124, 229, 1)));
                                                    background: -webkit-radial-gradient(center, ellipse cover, rgba(73, 155, 234, 1) 0%, rgba(32, 124, 229, 1) 100%);
                                                    background: -o-radial-gradient(center, ellipse cover, rgba(73, 155, 234, 1) 0%, rgba(32, 124, 229, 1) 100%);
                                                    background: -ms-radial-gradient(center, ellipse cover, rgba(73, 155, 234, 1) 0%, rgba(32, 124, 229, 1) 100%);
                                                    background: radial-gradient(ellipse at center, rgba(73, 155, 234, 1) 0%, rgba(32, 124, 229, 1) 100%);
                                                    filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#499bea', endColorstr='#207ce5', GradientType=1);
                                                }
                                            </style>
    </head>

    <body>
        <div class="container">
            <div style="margin-top: 5%;">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h2 class="panel-title">Đăng nhập</h2>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <span>Vui lòng nhập tài khoản vả mật khẩu</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?= $this->Flash->render() ?>
                                            <?= $this->Form->create() ?>
                                                <fieldset>
                                                    <legend>
                                                        <!--<small>Vui lòng nhập tài khoản vả mật khẩu</small>-->
                                                        <!--<?= __('Vui lòng nhập tài khoản vả mật khẩu') ?>-->
                                                    </legend>
                                                    <div class="form-group">
                                                        <?= $this->Form->control('username', ["class" => "form-control"]) ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <?= $this->Form->control('password', ["class" => "form-control"]) ?>
                                                    </div>
                                                </fieldset>
                                                <?= $this->Form->button('Đăng nhập', ["class" => "btn btn-primary"]); ?>
                                                    <?= $this->Form->end() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>