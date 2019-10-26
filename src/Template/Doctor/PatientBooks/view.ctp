<?php  $this->layout = 'blank'; ?>
<!doctype html>
<html>
<head>
    <title>Carnet de Visite</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="IE=Edge" http-equiv="X-UA-Compatible"></meta>
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width" />
    <style type="text/css" media="screen">
        html, body	{ height:100%; }
        body { margin:0; padding:0; overflow:auto;}
        .infoBox > * {font-family:Lato;}
        #flashContent { display:none; }
    </style>

    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>


    <?= $this->Html->css('flowpaper') ?>

    <?= $this->Html->script('jquery.min') ?>
    <?= $this->Html->script('jquery.extensions.min') ?>
    <!--[if gte IE 10 | !IE ]><!-->
    <?= $this->Html->script('three.min') ?>
    <!--<![endif]-->
    <?= $this->Html->script('flowpaper') ?>
    <?= $this->Html->script('flowpaper_handlers') ?>
</head>
<body>
<div id="documentViewer" class="flowpaper_viewer" style="position:absolute;width:100%;height:100%;"></div>

<script type="text/javascript">
    $('#documentViewer').FlowPaperViewer(
            { config : {

                // SWFFile : 'docs/Paper.pdf.swf',
                // IMGFiles : 'docs/Paper.pdf_{page}.png',
                // JSONFile : 'docs/Paper.js',
                PDFFile :'<?= $url ?>',

                Scale : 0.6,
                cssDirectory:"/webroot/css/",
                jsDirectory:"/webroot/js/",
                localeDirectory:"/webroot/locale/",
                ZoomTransition : 'easeOut',
                ZoomTime : 0.5,
                ZoomInterval : 0.1,
                FitPageOnLoad : true,
                FitWidthOnLoad : false,
                FullScreenAsMaxWindow : false,
                ProgressiveLoading : false,
                MinZoomSize : 0.2,
                MaxZoomSize : 5,
                SearchMatchAll : false,
                InitViewMode : '',
                RenderingOrder : 'html5,html',
                StartAtPage : '',

                EnableWebGL : true,
                ViewModeToolsVisible : true,
                ZoomToolsVisible : true,
                NavToolsVisible : true,
                CursorToolsVisible : true,
                SearchToolsVisible : true,
                WMode : 'transparent',
                localeChain: 'en_US'
            }}
    );
</script>

<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>

<script type="text/javascript">
    var url = window.location.href.toString();

    if(location.length==0){
        url = document.URL.toString();
    }

    if(url.indexOf("file:")>=0){
        jQuery('#documentViewer').html("<div style='position:relative;background-color:#ffffff;width:420px;font-family:Verdana;font-size:10pt;left:22%;top:20%;padding: 10px 10px 10px 10px;border-style:solid;border-width:5px;'><img src=''>&nbsp;<b>You are trying to use FlowPaper from a local directory.</b><br/><br/> FlowPaper needs to be copied to a web server before the viewer can display its document properly.<br/><br/>Please copy the FlowPaper files to a web server and access the viewer through a http:// url.</div>");
    }
</script>
</body>
</html>