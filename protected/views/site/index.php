<?php
/* @var $this SiteController */

	$this->pageTitle=Yii::app()->name;
	Yii::app()->clientScript->registerCoreScript('jquery');
?>

<h1>欢迎使用 <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<form id="sender" action="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=site/sending" method="post">
	<div id="textport" style="border-style: dotted;border-width: 2px;width:50%;border-color: #004F7A;">
		<input type="radio" name="bodytype" value="textbody" checked="checked" id="textbodyradio"/>自定义指令
		<input type="radio" name="bodytype" value="batchbody" id="batchbodyradio"/>终端控制指令
		<br/>
		短信内容:
		<?php
			echo CHtml::dropDownlist(
				'body',
				'',
				CHtml::listData(
					Batch::model()->findAll(),
					'body',
					'batchname'
				),
				array(
					'id'=>'batchname'
				)
				);
		?>
		<input type="text" name="body" id="textbody"/>
	</div>
	
	<br/>
	
	<div id="numport" style="border-style: dotted;border-width: 2px;width:75%;border-color: #004F7A;">
		<input type="radio" name="addrtype" id="numaddr" value="numaddr" checked="checked"/>自定义终端
		<input type="radio" name="addrtype" id="mapaddr" value="mapaddr"/>预定义终端
		<br/>
		发送号码:
		<input type="text" name="sendto" id="sendto" readonly="readonly"/>
		<div id="numdiv">
			输入号码:
			<input type="text" name="inum" id="inum"/>
			<div id="inumbts">
				<input type="button" id="inumadd" value="添加"/>
				<input type="button" id="inumreset" value="重置"/>
			</div>
		</div>
		<div id="mapdiv">
			<div id="container">
	    		<div id="map">
	        		<img src="<?php echo Yii::app()->request->baseUrl;?>/images/1.jpg" />
	    		</div>
			</div>
			<br />
		</div>
	</div>
	
	<br/>
	
	<input type="submit" id="sendbt" value="发送"></input>
</form>

<script type="text/javascript">
	function inputHide(inn){
		$("#"+inn).attr("disabled","disabled").hide(100);
	}
	
	function inputShow(inn){
		$("#"+inn).removeAttr("disabled").show(100);
	}
	
	inputHide("batchname");
	
	$("#batchbodyradio").click(function(){
		//inputHide("textbody");
		inputShow("batchname");
	});
	
	$("#textbodyradio").click(function(){
		inputHide("batchname");
		//inputShow("textbody");
	});
	
	$("#batchname").change(function(){
		$("#textbody").val($("#batchname option:selected").val());
	});
	
	$("#numaddr").click(function(){
		inputShow("numdiv");
		inputHide("mapdiv");
	});
	$("#mapaddr").click(function(){
		inputShow("mapdiv");
		inputHide("numdiv");
	});
	
	inputHide("mapdiv");
	
	$("#inumadd").click(function(){
		var newNum=$("#inum").val();
		if (newNum==""){
			alert("号码不能为空！");
		}else{
			var prevalue=$("#sendto").val();
			if (prevalue==''){
				$("#sendto").val(newNum);
			}else{
				$("#sendto").val(prevalue+","+newNum);
			}
			$("#inum").val("");
		}
	});
	$("#inumreset").click(function(){
		$("#sendto").val("");
	});
// 	
	// $("#sendbt").attr("disabled","disabled");
// 	
	// $("#textbody").change(function(){
		// if (($("#textbody").val()=="")||($("#sendto").val()=="")){
			// $("#sendbt").attr("disabled","disabled");			
		// }else{
			// $("#sendbt").removeAttr("disabled");
		// }
	// });
	// $("#sendto").change(function(){
		// if (($("#textbody").val()=="")||($("#sendto").val()=="")){
			// $("#sendbt").attr("disabled","disabled");			
		// }else{
			// $("#sendbt").removeAttr("disabled");
		// }		
	// });
</script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/maphandler.js"></script>
<script type="text/javascript">
  window.onload = function(){
      //bindEvent();
      loadMark();
  };
</script>
