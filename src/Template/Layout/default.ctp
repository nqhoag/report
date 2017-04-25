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
    </head>

    <body>
        <!--Header Fixed-->
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">Viettechkey</a>
                    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar-main" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav">
                        <li class="avtive">
                            <a href="#">Thông tin trường</a>
                        </li>
                        <li>
                            <a href="#">Nhập báo cáo</a>
                        </li>
                        <li>
                            <a href="#">Xuất báo cáo</a>
                        </li>
                        <li>
                            <a href="#">Thông tin người dùng</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li>
                            <?=empty($_SESSION['Auth']['User']['username']) 
              ? $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) 
              : '<a href="#">Chào <u>' . $_SESSION['Auth']['User']['username'] . '</u></a>';?>
                        </li>
                        <li>
                            <?=$this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout'], ['class' => 'text-warning']);?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--Content-->
        <div class="container">
            <!--Flash message-->
            <?= $this->Flash->render() ?>
                <div id="wrapper">
                    <div id="sidebar-wrapper">
                        <aside id="sidebar">
                            <ul id="sidemenu" class="sidebar-nav">
                                <li>
                                    <a href="#">
                                        <span class="sidebar-icon"></span>
                                        <span class="sidebar-title">Các link tắt</span>
                                    </a>
                                </li>
                                <!--<li>
                                    <a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-2">
                                        <span class="sidebar-icon"><i class="fa fa-users"></i></span>
                                        <span class="sidebar-icon"></span>
                                        <span class="sidebar-title">Nhập cáo báo</span>
                                        <b class="caret"></b>
                                    </a>
                                    <ul id="submenu-2" class="panel-collapse collapse panel-switch" role="menu">
                                        <li><a href="#"><i class="fa fa-caret-right"></i>Users</a></li>
                                        <li>
                                            <a href="#">
                                                <span class="sidebar-icon"></span>
                                                <span class="sidebar-title">Roles</span></a>
                                        </li>
                                    </ul>
                                </li>-->
                            </ul>
                        </aside>
                    </div>
                    <!--Main content -->
                    <main id="page-content-wrapper" role="main">
                        <?= $this->fetch('content') ?>
                    </main>
                </div>
        </div>

        <!--footer-->
        <footer>
            <p>Viettechkey</p>
        </footer>
    </body>

    </html>