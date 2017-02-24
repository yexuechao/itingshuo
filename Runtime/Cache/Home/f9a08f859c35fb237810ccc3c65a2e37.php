<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <link rel="stylesheet" href="<?php echo (HOME_CSS); ?>bootstrap.min.css"/>
    <link  rel="stylesheet" href="<?php echo (HOME_CSS); ?>style2.css"/>
    <script src="<?php echo (HOME_JS); ?>jquery.js"></script>
    <script src="<?php echo (HOME_JS); ?>jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?php echo (HOME_JS); ?>swfobject.js"></script>
    <script type="text/javascript" src="<?php echo (HOME_JS); ?>recorder.js"></script>
    <script type="text/javascript" src="<?php echo (HOME_JS); ?>main.js"></script>
    <script type="text/javascript" src="<?php echo (HOME_JS); ?>modal.js"></script>
    <script type="text/javascript" src="<?php echo (HOME_JS); ?>bootstrap.min.js"></script>
    <style>

        a{
            outline: none;
            text-decoration: none;
            color:black;
            font-family: "微软雅黑";
            font-size: 16px;
        }
        a .uploading:hover, .feedbackbutton:hover{
            border-top:1px solid white;
            border-left:1px solid white;
            border-right:1px solid black;
            border-bottom:1px solid black;
        }
        *{
            margin:0px;
            padding:0px;
        }
        .cubewrapper{
            width:178px;
            height:400px;
            margin:0 auto;
            margin-top: 80px;
        }
        .cube1,.cube2,.cube3,.cube4{
            width:75px;
            height:75px;
            background-color: #CEEEF4;
            margin: 5px;
            display:inline-block;
            border-radius:5px;
            -webkit-animation-name:'blink';/*动画属性名，也就是我们前面keyframes定义的动画名*/
            -webkit-animation-timing-function: ease-in-out; /*动画频率，和transition-timing-function是一样的*/
            -webkit-animation-iteration-count: infinite;/*定义循环资料，infinite为无限次*/
            -webkit-animation-direction: alternate;/*定义动画方式*/
            -webkit-animation-duration: 0.41s;/*动画持续时间*/
        }
        .cube1{
            -webkit-animation-delay: -0.4s;/*动画延迟时间，跳过4秒进入动画*/

        }
        .cube2{
            -webkit-animation-delay: -0.3s;/*动画延迟时间*/
        }
        .cube3{
            -webkit-animation-delay: -0.1s;/*动画延迟时间*/
        }
        .cube4{
            -webkit-animation-delay: -0.2s;/*动画延迟时间*/
        }
        @-webkit-keyframes blink{
            from{
                background-color:#CEEEF4;
            }
            to{
                background-color:#3DAEC3;
            };
        }

        .info{
            width:152px;
            height:27px;
            background: url("uploading.png") no-repeat;
            background-size: 100%;
            background-position: 50% 50%;
            margin-top: 20px;
            margin-left: 20px;
        }

        .feedback{
            width:500px;
            height:500px;
            font-family: "微软雅黑";
            font-size: 24px;
        }
        .feedback .head{
            width:176px;
            height:33px;
            background:url("feedback.png") no-repeat;
            background-size:100%;
            margin:20px;
        }
        .feedback .detail{
            width:250px;
            margin:50px auto;
        }
        .feedback .detail span{
            margin:15px;
        }
        .feedback .mark_and_comment{
            width:400px;
            margin-left: 55px;
        }
    </style>
</head>
<body style="background-color:transparent">
<div id="recorder-audio" class="control_panel idle">
    <!--<button class="train" href="javascript:void(0);" onclick="audioplayOrPaused('firefox',this);"></button>-->
    <!--<button  class="text" href="javascript:void(0);" onclick="audio2playOrPaused('firefox',this);"></button>-->
    <button class="play_button" onclick="FWRecorder.playBack('audio');" title="Play" id="hideplayback"></button>
    <button class="stop_recording_button" id="stop_last" onclick="FWRecorder.stopRecording('audio');" title="Stop Recording" style="display: none"></button>
    <button class="record_button" id="record_next" onclick="FWRecorder.record('audio', 'audio.wav')" title="Record" ></button>
    <!--<button class="pause_playing_button" onclick="FWRecorder.pausePlayBack('audio');" title="Pause Playing" id="pause"></button>-->
    <!--<button class="stop_playing_button" onclick="FWRecorder.stopPlayBack();" title="Stop Playing">--><!--</button>-->
    <!--<div class="details" style="display: inline-block">-->
      <span id="save_button" >
            <span id="flashcontent">
               <p>Your browser must have JavaScript enabled and the Adobe Flash Player installed.</p>
            </span>
      </span>
</div>


<div class="modal fade" id="up_loading" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="cubewrapper">
                <div class="cube1"></div>
                <div class="cube2"></div>
                <div class="cube3"></div>
                <div class="cube4"></div>
                <div class="info"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="feed_back" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="feedback">
                <div class="head"></div>
                <div class="detail">
                    <span>音准：A</span>
                    <span>情感：B</span>
                    <span>重音：C</span>
                    <span>语速：D</span>
                    <span>节奏：E</span>
                    <span>语调：A</span>
                </div>
                <div class="mark_and_comment">
                    总评：C<br>
                    评语：<br>
                    <textarea name="" id="" cols="38" rows="4">。。。。。。。。。</textarea>
                </div>
            </div>


<form id="uploadForm" name="uploadForm" action="" >
    <input name="authenticity_token" value="xxxxx" type="hidden">
    <input name="upload_file[parent_id]" value="1" type="hidden">
    <input name="format" value="json" type="hidden">
</form>
<script type="text/javascript" src="<?php echo (HOME_JS); ?>jquery-1.11.2.min.js"></script>
<script type="text/javascript">
//    $("#record_next").click(function(){
//        $("#record_next").css("display","none");
//        $("#stop_last").css("display","inline-block");
//    })
//    $("#stop_last").click(function(){
//        $("#stop_last").css("display","none");
//        $("#record_next").css("display","inline-block");
//    })
</script>
</body>
</html>