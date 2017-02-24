<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <link  rel="stylesheet" href="<?php echo (HOME_CSS); ?>style2.css">
    <script src="<?php echo (HOME_JS); ?>jquery.js"></script>
    <script type="text/javascript" src="<?php echo (HOME_JS); ?>swfobject.js"></script>
    <script type="text/javascript" src="<?php echo (HOME_JS); ?>recorder.js"></script>
    <script type="text/javascript" src="<?php echo (HOME_JS); ?>main.js"></script>

</head>
<body>
<div id="recorder-audio" class="control_panel idle">
    <!--<button class="train" href="javascript:void(0);" onclick="audioplayOrPaused('firefox',this);"></button>-->
    <!--<button  class="text" href="javascript:void(0);" onclick="audio2playOrPaused('firefox',this);"></button>-->
    <button class="play_button" onclick="FWRecorder.playBack('audio');" title="Play" id="hideplayback"></button>
    <button class="stop_recording_button" id="stop_last" onclick="FWRecorder.stopRecording('audio');" title="Stop Recording" style="display: none"></button>
    <button class="record_button" id="record_next" onclick="FWRecorder.record('audio', 'audio.wav')" title="Record" ></button>
    <!--<button class="pause_playing_button" onclick="FWRecorder.pausePlayBack('audio');" title="Pause Playing" id="pause"></button>-->
    <!--<button class="stop_playing_button" onclick="FWRecorder.stopPlayBack();" title="Stop Playing">--><!--</button>-->
    <!--<div class="details" style="display: inline-block">-->
      <span id="save_button">
            <span id="flashcontent">
               <p>Your browser must have JavaScript enabled and the Adobe Flash Player installed.</p>
            </span>
      </span>
</div>
<form id="uploadForm" name="uploadForm" action="" >
    <input name="authenticity_token" value="xxxxx" type="hidden">
    <input name="upload_file[parent_id]" value="1" type="hidden">
    <input name="format" value="json" type="hidden">
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