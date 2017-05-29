<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <title><?php echo $data['project']['title'] ?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <?php require_once 'app/view/partial/css.php'; ?>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .main {
            /*position: absolute;*/
            top: 50%;
            left: 50%;
            /*overflow: hidden;*/
            /*float: left;*/
        }

        #parent {
            position: relative;
        }

        #page a {
            cursor: pointer;
            text-decoration: none;
        }
    </style>
	
</head>
<body>

    <h3 class="title" style="float: left; margin: 10px;">Project: <?php echo $data['project']['title'] ?></h3>
    <h4 class="title" style="clear: both; margin: 10px;">Author: <?php echo $data['project']['author'] ?></h3>

    <?php 
        // $map = array();
        // for ($i = 0; $i < count($data['mocks']); $i++) { 
        // 	$mock = $data['mocks'][$i];
        // 	$map[$mock->client_id] = $mock;
        // }
        $scaleX; $scaleY;
        // $is_portrait = $data['project']['orientation'] == 'portrait';
        // showData($is_portrait);
        if ($data['project']['orientation'] == 'portrait') {
            $scaleX = 500 / (float) $data['project']['width'];
            $scaleY = 889 / (float) $data['project']['height'];
        } else {
            $scaleX = 889 / (float) $data['project']['width'];
            $scaleY = 500 / (float) $data['project']['height'];
        }
    ?>

    <?php 
        function showData($value) {
            echo "<pre>"; print_r($value); echo "</pre>"; die();
        }
    ?>

    <?php //showData(json_encode($data['mocks'])); ?>

    <div id="parent" data='<?php echo json_encode($data["mocks"]); ?>'>

        <?php for ($i = 0; $i < count($data['mocks']); $i++) { 

        ?> 

        <div class="main" position="<?php echo ($i + 1); ?>" id="<?php echo $data['mocks'][$i]->client_id; ?>" data="<?php echo $data['mocks'][$i]->image; ?>" style="<?php 
                if ($data['project']['orientation'] == 'portrait') {
                    echo "width: 500px; height: 889px; margin: 0 auto; margin-bottom: 10px;";
                } else {
                    echo "width: 889px; height: 500px; margin: 0 auto; margin-bottom: 10px;";
                }
            ?>">

            <?php 

                $elements = $data['mocks'][$i]->elements;
                if (isset($elements) && count($elements) > 0) {
                    for($j = 0; $j < count($elements); $j++) {
                        $element = $elements[$j];
                        if (!empty($element->link_to)) {
                            $top = ($element->y * $scaleY);
                            $left = ($element->x * $scaleX);
                            $width = ($element->w * $scaleX);
                            $height = ($element->h * $scaleY);

            ?>

                            <div class="test" linkto="<?php echo $element->link_to; ?>" style="margin-top: <?php echo $top; ?>px; margin-left: <?php echo $left; ?>px; width: <?php echo $width; ?>px; height: <?php echo $height; ?>px; background-color: rgba(0, 0, 0, 0); position: absolute;">

                            </div>

            <?php }}} ?>
        </div>

        <?php } ?> 


        <div id="bottom" style="width: 100px; margin: 0 auto;">
            <div id="page">
                <a id="prev"><i class="material-icons">keyboard_arrow_left</i></a>
                <a id="home"><i class="material-icons">home</i></a>
                <a id="mock">1</a>
                <a>of <?php echo count($data['mocks']); ?></a>
                <a id="next"><i class="material-icons">keyboard_arrow_right</i></a>
            </div>
        </div>

    </div>
    
    <script src="<?php echo DOMAIN; ?>res/js/jquery.js"></script>          
    <script src="https://www.gstatic.com/firebasejs/4.0.0/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.0.0/firebase-storage.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>res/js/device.js"></script>
    <script type="text/javascript">
        //check device and begin setup size
        var device = new device();          
        device.init();
        if (device.check == true) {
            // alert('mobile');	
            // var currentHeight = $('.main').height();
            // var currentWidth = $('.main').width();
            // var realHeight;
            // var realWidth;
            // var scale;
            // if (currentHeight > currentWidth) {
            //     realWidth = $(window).width();
            //     scale = realWidth/ currentWidth;
            //     realHeight = currentHeight * scale;
            // } else {
            //     realHeight = $(window).width;
            //     scale = realHeight/ currentHeight;
            //     realWidth = currentWidth * scale;
            // }
            jQuery(document).ready(function($) {
                $('h3').css('font-size', '16px');
                $('h4').css('font-size', '14px');
            });
            
            // $('.main').css({
            //     width: realWidth + 'px',
            //     height: realHeight + 'px',
            //     top: '0%',
            //     left: '0%'
            // });

        } else {
            // alert('brower');
            // var currentHeight = $('.main').height();
            // var currentWidth = $('.main').width();
            // var realHeight;
            // var realWidth;
            // if (currentHeight > currentWidth) {
            //     realHeight = $(window).height() - 100;
            // } else {
            //     realHeight = $(window).height() - 300;
            // }
            // var scale = realHeight / currentHeight;
            // realWidth = currentWidth * scale;	
        }

        // alert('brower');
        var currentHeight = $('.main').height();
        var currentWidth = $('.main').width();
        var realHeight;
        var realWidth;
        if (currentHeight > currentWidth) {
            realHeight = $(window).height() * 0.8;
        } else {
            realHeight = $(window).height() * 0.6;
        }
        var scale = realHeight / currentHeight;
        realWidth = currentWidth * scale;
        
        $('.main').css({
            width: realWidth + 'px',
            height: realHeight + 'px'
        });

        $('.test').each(function(i, obj) {
            var top = parseInt($(this).css('margin-top')) * scale;
            var left = parseInt($(this).css('margin-left')) * scale;
            var width = $(this).width() * scale;
            var height = $(this).height() * scale;
            $(this).css({
                width: width + 'px',
                height: height + 'px',
                margin: top + 'px 0 0 ' + left + 'px'
            });
        });   
		// end setup size
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {             
            var count = 0;

            var currentId;

            var config = {
                apiKey: "AIzaSyALCvd3jyi8XIltW9NLDetzbAS262KeE-8",
                authDomain: "test-40620.firebaseapp.com",
                databaseURL: "",
                storageBucket: "gs://test-40620.appspot.com",
            };
            firebase.initializeApp(config);

            mocks = JSON.parse($('#parent').attr('data'));

            // var map = {};

            for(var i = 0; i < mocks.length; i++) {
                var mock = mocks[i];
                var key = mock.client_id;
                loadImage('#' + key);
                // map[key] = mock;
            }

            function loadImage(selector) {
                var storage = firebase.storage();
                var img = $(selector).attr('data');
                var pathReference = storage.ref('mp/' + img);

                pathReference.getDownloadURL().then(function(url) {
                    var xhr = new XMLHttpRequest();
                    xhr.responseType = 'blob';
                    xhr.onload = function(event) {
                        var blob = xhr.response;
                    };
                    xhr.open('GET', url);
                    xhr.send();
                    
                    $(selector).css("background", "url('" + url + "')" + "no-repeat center"); 
                    $(selector).css("background-size", "100% 100%"); 
                    $(selector).css("border", "1px solid #ccc");
                    $(selector).hide(); 
                    count++;
                    if (count == mocks.length - 1) {
                        $('#' + mocks[0].client_id).show(); 
                        currentId = mocks[0].client_id;
                        // alert($('#' + currentId).css('margin-left'));
                        // alert($('#' + currentId).css('margin-right'));
                        $('#bottom').css('width', realWidth);
                        $('#page').css('text-align', 'center');
                    }
                }).catch(function(error) {
                    // Handle any errors
                });
            }

            $('.main').click(function(event) {
                event.stopPropagation();
                event.preventDefault();
                // alert('main');
                $('.test').css('background', 'rgba(0, 255, 0, 0.44)');
                setTimeout(function(){ $('.test').css('background', 'rgba(0, 0, 0, 0)'); }, 700);
            });	

            $('.test').click(function(event) {
                event.stopPropagation();
                event.preventDefault();
                var id = $(this).attr('linkto'); 
                $('#' + currentId).hide(500);
                currentId = id;
                $('#' + id).show(500);
                $('#mock').text($('#' + id).attr('position'));
                // alert(id);
            });

            $('#home').click(function(event) {
            	event.stopPropagation();
                event.preventDefault();
                $('#' + currentId).hide();
                currentId = mocks[0].client_id;
                $('#' + currentId).show();
                $('#mock').text(1);
            });

            $('#prev').click(function(event) {
            	event.stopPropagation();
                event.preventDefault();
                var currentPos = $('#' + currentId).attr('position');
                $('#' + currentId).hide();
                if (currentPos == 1) {
                	currentId = mocks[mocks.length - 1].client_id;
                	$('#' + currentId).show();
                	$('#mock').text(mocks.length);
                } else {
                	currentId = mocks[currentPos - 2].client_id;
                	$('#' + currentId).show();
                	$('#mock').text(currentPos - 1);
                }
            });

            $('#next').click(function(event) {
            	event.stopPropagation();
                event.preventDefault();
                var currentPos = $('#' + currentId).attr('position');
                $('#' + currentId).hide();
                if (currentPos == mocks.length) {
                	currentId = mocks[0].client_id;
                	$('#' + currentId).show();
                	$('#mock').text(1);
                } else {
                	currentId = mocks[currentPos].client_id;
                	$('#' + currentId).show();
                	currentPos = parseInt(currentPos) + 1;
                	$('#mock').text(currentPos);
                }
            });
        });
    </script>

</body>
</html>
