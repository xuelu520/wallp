<?php
/**
 * Created by PhpStorm.
 * User: m_xuelu
 * Date: 2015/12/14
 * Time: 23:22
 */
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>哇扑-后台管理</title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="/public/js/offcanvas.js"></script>
    <script src="/public/js/public.js"></script>
    <link href="/public/css/offcanvas.css" rel="stylesheet">
    <link href="/public/css/public.css" rel="stylesheet">
    <style type="text/css">
    </style>
<body>
<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">哇扑-后台管理</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="/" title="后台管理主页">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    </a>
                </li>
                <li>
                    <a href="/login/logout" title="登出系统">
                        <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                    </a>
                </li>
            </ul>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->

<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas fixed" id="sidebar">
            <div class="list-group">
                <a href="/wall/index" id="nav-wall-index" class="list-group-item">
                    <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>&nbsp;&nbsp;壁纸干货
                </a>
                <a href="/wall/add" id="nav-wall-add" class="list-group-item">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;上传壁纸
                </a>
                <a href="/wgroup/index" id="nav-wgroup-index" class="list-group-item">
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>&nbsp;&nbsp;套图列表
                </a>
                <a href="/user/index" id="nav-user-index" class="list-group-item">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;用户列表
                </a>
            </div>
        </div><!--/.sidebar-offcanvas-->