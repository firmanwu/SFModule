<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div data-role="page" data-title="<?php echo $title; ?>" id="first">
    <div data-role="panel" id="panel" data-position="left" data-display="push">
        <div data-role="collapsible" data-collapsed-icon="flat-plus" data-expanded-icon="flat-cross" data-collapsed="true" data-theme="b">
            <h3>原料</h3>
            <a href="<?php echo base_url('materialentry');?>" data-role="button" data-icon="flat-new" data-theme="b" target="iframeContent">入料</a>
            <a href="<?php echo base_url('materialrequisition');?>" data-role="button" data-icon="flat-new" data-theme="b">領料</a>
            <a href="<?php echo base_url('material/addMaterialView');?>" data-role="button" data-icon="flat-new" data-theme="b">原料管理</a>
            <a href="<?php echo base_url('supplier/addSupplierView');?>" data-role="button" data-icon="flat-new" data-theme="b">供應商管理</a>
            <a href="<?php echo base_url('materialusage/addMaterialUsageView');?>" data-role="button" data-icon="flat-new" data-theme="b">使用單位管理</a>
        </div>

        <div data-role="collapsible" data-collapsed-icon="flat-plus" data-expanded-icon="flat-cross" data-theme="d">
            <h3>成品</h3>
            <a href="<?php echo base_url('finishedgoodentry');?>" data-role="button" data-icon="flat-new" data-theme="d">入貨</a>
            <a href="<?php echo base_url('finishedgoodrequisition');?>" data-role="button" data-icon="flat-new" data-theme="d">領貨</a>
            <a href="<?php echo base_url('finishedgood/addFinishedGoodView');?>" data-role="button" data-icon="flat-new" data-theme="d">成品管理</a>
        </div>

        <div data-role="collapsible" data-collapsed-icon="flat-plus" data-expanded-icon="flat-cross" data-theme="f">
            <h3>使用者</h3>
            <a href="<?php echo base_url('login');?>" data-role="button" data-icon="flat-new" data-theme="f">登入</a>
            <a href="<?php echo base_url('user/addUserView');?>" data-role="button" data-icon="flat-new" data-theme="f">帳號管理</a>
        </div>
    </div>
    <div data-role="header" data-theme="<?php echo $theme; ?>">
        <a data-iconpos="notext" href="#panel" data-role="button" data-icon="flat-menu"></a>
        <h1><?php echo $title; ?></h1>
        <a data-iconpos="notext" href="<?php echo base_url('welcome');?>" data-role="button" data-icon="home" target="iframeContent"></a>
    </div>
