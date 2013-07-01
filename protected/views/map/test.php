<?php
	Yii::app()->clientScript->registerCoreScript('jquery');
?>
	<p>Hide</p>

<script type="text/javascript">
	$("p").load("http://localhost/senluomessager/index.php?r=map/getjsonnodes");
	
	function loadMark(){
	$.get("http://localhost/senluomessager/index.php?r=map/getjsonnodes",function(data){
		alert(data);
	});
	}
	loadMark();
</script>
