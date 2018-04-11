<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome</title>

    <style type="text/css">
        #iframeTop {
            width: 100%;
            height: 70px;
        }
        #iframeLeft {
            width: 15%;
            height: 700px;
            float: left;
        }
        #iframeContent {
            width: 84%;
            height: 700px;
        }

    </style>
</head>
<body>
<div>
    <iframe id="iframeTop" name="iframeTop" frameborder="0" src=""></iframe>
    <iframe id="iframeLeft" name="iframeLeft" frameborder="0" src="<?php echo base_url('welcome/iframeLeft');?>"></iframe>
    <iframe id="iframeContent" name="iframeContent" frameborder="0" src="<?php echo base_url('welcome/iframeContent');?>"></iframe>
</div>
</body>
</html>