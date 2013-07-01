<?php
	$body=$_POST["body"];
	$tels=$_POST["sendto"];
	$com=settings::model()->findByAttributes(array('name'=>'COM'));	
	$comStr="com=".$com->value;
	$telsStr="tels=".$tels;
	$bodyStr="body=".$body;
	$getStr=$comStr."&".$telsStr."&".$bodyStr;
?>

<iframe 
	src="<?php echo Yii::app()->request->hostInfo;?>/phpsms/send.php?<?php echo $getStr;?>" 
	width="100%" 
	height="100%">
</iframe>
