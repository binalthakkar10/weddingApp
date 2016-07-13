<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true);?>/css/style.css">
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true);?>/site-js/script.js"></script>
<script type="text/javascript" src="http://evanw.github.com/glfx.js/glfx.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true);?>/site-js//jquery.ui.slider.js"></script>
</head><body>
    <div id="toolbar">
        <div class="button" id="load">Load</div>
        <div class="button" id="save">Save</div>
        <!-- <div class="button disabled">Undo</div>
        <div class="button disabled">Redo</div> -->
        <div class="button" id="about">About</div>
    </div>
    <div id="sidebar"></div>
    <div id="editor">
        <div class="contents">
            <div id="placeholder"></div>
            <canvas id="canvas2d"></canvas>
            
        </div>
    </div>
    <div id="fade"></div>
    <div id="dialog"></div>
    <div id="loading">
        <script type="text/javascript">document.write('Loading...');</script>
        <noscript>Please enable JavaScript and refresh this page</noscript>
    </div>