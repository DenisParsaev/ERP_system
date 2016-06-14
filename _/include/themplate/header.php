<?php
session_start();
$url=$_SERVER['SERVER_NAME'];
include($_SERVER['DOCUMENT_ROOT'] . '/include/config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/function/function.php');
include($_SERVER['DOCUMENT_ROOT'] . '/function/function_price.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<base href="http://cabinet.xn----7sbbaed1bza5aeses.xn--j1amh/">
<title>Cистема автоматизации производства</title>

<link href="/css/main.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css' />

<link rel="icon" href="http://<?php echo $url;?>/images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="http://<?php echo $url;?>/images/favicon.ico" type="image/x-icon" />

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

<script type="text/javascript" src="/js/plugins/tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="/js/plugins/tables/colResizable.min.js"></script>

<script type="text/javascript" src="/js/plugins/forms/forms.js"></script>
<script type="text/javascript" src="/js/plugins/forms/jquery.autosize.js"></script>
<script type="text/javascript" src="/js/plugins/forms/autotab.js"></script>
<script type="text/javascript" src="/js/plugins/forms/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="/js/plugins/forms/jquery.validationEngine.js"></script>
<script type="text/javascript" src="/js/plugins/forms/jquery.dualListBox.js"></script>
<script type="text/javascript" src="/js/plugins/forms/jquery.select2.min.js"></script>
<script type="text/javascript" src="/js/plugins/forms/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="/js/plugins/forms/jquery.inputlimiter.min.js"></script>
<script type="text/javascript" src="/js/plugins/forms/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="/js/plugins/forms/jquery.wysiwyg.js"></script>

<script type="text/javascript" src="/js/plugins/other/calendar.min.js"></script>
<script type="text/javascript" src="/js/plugins/other/elfinder.min.js"></script>

<script type="text/javascript" src="/js/plugins/uploader/plupload.js"></script>
<script type="text/javascript" src="/js/plugins/uploader/plupload.html5.js"></script>
<script type="text/javascript" src="/js/plugins/uploader/plupload.html4.js"></script>
<script type="text/javascript" src="/js/plugins/uploader/jquery.plupload.queue.js"></script>

<script type="text/javascript" src="/js/plugins/ui/jquery.progress.js"></script>
<script type="text/javascript" src="/js/plugins/ui/jquery.jgrowl.js"></script>
<script type="text/javascript" src="/js/plugins/ui/jquery.tipsy.js"></script>
<script type="text/javascript" src="/js/plugins/ui/jquery.alerts.js"></script>
<script type="text/javascript" src="/js/plugins/ui/jquery.colorpicker.js"></script>
<script type="text/javascript" src="/js/plugins/ui/jquery.mousewheel.js"></script>

<script type="text/javascript" src="/js/plugins/wizards/jquery.form.wizard.js"></script>
<script type="text/javascript" src="/js/plugins/wizards/jquery.validate.js"></script>

<script type="text/javascript" src="/js/plugins/ui/jquery.breadcrumbs.js"></script>
<script type="text/javascript" src="/js/plugins/ui/jquery.collapsible.min.js"></script>
<script type="text/javascript" src="/js/plugins/ui/jquery.ToTop.js"></script>
<script type="text/javascript" src="/js/plugins/ui/jquery.listnav.js"></script>
<script type="text/javascript" src="/js/plugins/ui/jquery.sourcerer.js"></script>
<script type="text/javascript" src="/js/plugins/ui/jquery.timeentry.min.js"></script>
<script type="text/javascript" src="/js/plugins/ui/jquery.prettyPhoto.js"></script>

<script type="text/javascript" src="/js/custom.js"></script>
<script type="text/javascript" src="/js/function.js"></script>

<style>
    #page-preloader {
        position: fixed;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        background: #FFFFFF;
        z-index: 100500;
    }

    #page-preloader .spinner {
        width: 32px;
        height: 32px;
        position: absolute;
        left: 50%;
        top: 50%;
        background: url('images/loaders/loader8.gif') no-repeat 50% 50%;
        margin: -16px 0 0 -16px;
    }
</style>

    <script type="application/javascript">
        $(window).on('load', function () {
            var $preloader = $('#page-preloader'),
                $spinner   = $preloader.find('.spinner');
            $spinner.fadeOut();
            $preloader.delay(350).fadeOut('slow');
        });

        $(function(){
            $.datepicker.setDefaults(
                $.extend($.datepicker.regional["ru"])
            );
            $("#datepicker").datepicker();
        });

    </script>
