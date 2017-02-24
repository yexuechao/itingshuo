<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <link rel="stylesheet" href="<?php echo (HOME_CSS); ?>bootstrap.min.css">
    <link  rel="stylesheet" href="<?php echo (HOME_CSS); ?>style3.css">
    <script src="<?php echo (HOME_JS); ?>jquery.js"></script>
    <script type="text/javascript" src="<?php echo (HOME_JS); ?>swfobject.js"></script>
    <script type="text/javascript" src="<?php echo (HOME_JS); ?>recorder.js"></script>
    <script type="text/javascript" src="<?php echo (HOME_JS); ?>main.js"></script>
    <style>
    .control_panel{
        padding-top: 35px;
    }
    </style>
</head>
<body>
<div id="recorder-audio" class="control_panel idle">
    <button class="play_button" onclick="FWRecorder.playBack('audio');" title="Play" id="hideplayback"></button>
    <button class="stop_recording_button" id="stop_last" onclick="FWRecorder.stopRecording('audio');" title="Stop Recording" style="display: none"></button>
    <button class="record_button" id="record_next" onclick="FWRecorder.record('audio', 'audio.wav')" title="Record" ></button>
      <span id="save_button">
            <span id="flashcontent">
               <p>Your browser must have JavaScript enabled and the Adobe Flash Player installed.</p>
            </span>
      </span>
</div>
<form id="uploadForm" name="uploadForm" action="/its/index.php/Home/common/upload" >
    <input name="authenticity_token" value="xxxxx" type="hidden">
    <input name="upload_file[parent_id]" value="1" type="hidden">
    <input name="format" value="json" type="hidden">
    <input type="hidden" value="<?php echo $type_id?>" id="type_id" name="type_id"/>
    <input type="hidden" value="<?php echo $text_id?>" id="text_id" name="text_id"/>
    <input type="hidden" value="3" id="flag" name="flag"/>
    <input type="hidden" value="1" name="test_flag" id="test_flag"/>
</form>
<script type="text/javascript" src="<?php echo (HOME_JS); ?>jquery-1.11.2.min.js"></script>
<script type="text/javascript">
    $("#record_next").click(function(){
        $("#record_next").css("display","none");
        $("#stop_last").css("display","inline-block");
    })
    $("#stop_last").click(function(){
        $("#stop_last").css("display","none");
        $("#record_next").css("display","inline-block");
    })
</script>
</body>
</html>