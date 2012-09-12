<script src="<?=base_url() . 'assets/plugins/countdown_plugin/jquery.countdown.js'?>" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$(function(){
	$('#counter').countdown({
		image: "<?=base_url() . 'assets/plugins/countdown_plugin/digits.png'?>",
		startTime: '01:12:12:00',
		timerEnd: function(){ alert('end!'); }
	});
});
</script>

<div id="counter_wrapper">
	<h2>Countdown</h2>
	<div id="counter"></div>
	<div class="desc">
		<div>Days</div>
		<div>Hours</div>
		<div>Minutes</div>
		<div>Seconds</div>
	</div>
</div>