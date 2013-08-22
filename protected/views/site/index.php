<?php
/* @var $this SiteController */

	$this->pageTitle=Yii::app()->name;
	Yii::app()->clientScript->registerCoreScript('jquery');
?>

<div id="welcome-title">
	<!--<h1>欢迎使用 <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>-->
</div>

<form id="sender" action="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=site/sending" method="post">
	<div id="textport" class="work-form-1">
		<div class="work-form-header">			
		</div>
		<div class="work-form-body">
			<input type="radio" name="bodytype" value="batchbody" id="batchbodyradio"/>终端控制指令
			<!--<input type="radio" name="bodytype" value="textbody" checked="checked" id="textbodyradio"/>自定义指令-->
			<br/>
			指令内容:
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
	</div>
	
	<br/>
	
	<div id="numport" class="work-form">
		<div class="work-form-header"></div>
		<div class="work-form-body">
			<input type="radio" name="addrtype" id="mapaddr" value="mapaddr"/>预定义终端(地图)
			<input type="radio" name="addrtype" id="gridaddr" value="gridaddr"/>预定义终端 (表格)
			<!--<input type="radio" name="addrtype" id="numaddr" value="numaddr" checked="checked"/>自定义终端-->
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
		        		<img src="<?php echo Yii::app()->request->baseUrl;?>/images/1.jpg"/>
		    		</div>
				</div>
				<br />
			</div>
			
			<div id="griddiv">
				<?php
					$map=new Map;
					$this->widget('zii.widgets.grid.CGridView',array(
						'id'=>'grid-div',
						'dataProvider'=>$map->search(),						
						'columns'=>array(
							array(
								'class'=>'CCheckBoxColumn',
								'selectableRows'=>127,		
								'value'=>'$data->tel',						
								'checkBoxHtmlOptions'=>array(									
									'name'=>'gridcheckbox',									
								),
							),
							array(
								'name'=>'id',
								'value'=>'$data->id',
								'htmlOptions'=>array(
									'style'=>'text-align:center',
								)
							),
							array(
								'name'=>'终端名称',
								'value'=>'$data->name',
								'htmlOptions'=>array(
									'style'=>'text-align:center',
								)
							),
							array(
								'name'=>'终端号码',
								'value'=>'$data->tel',
								'htmlOptions'=>array(
									'style'=>'text-align:center',
								)
							)																					
						),						
					));
				?>
			</div>
		</div>
	</div>
	
	<br/>
	
	<input type="submit" id="sendbt" class="minibutton" value="发送"></input>
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
		inputHide("griddiv");
		$("#sendto").val('');
		clearMark();
		loadMark();
		$("input:checkbox[name='gridcheckbox']").each(function(i,item){
			$(item).attr("checked",false);
		});
		$("#grid-div_c3_all").attr("checked",false);
	});
	$("#mapaddr").click(function(){
		inputShow("mapdiv");
		inputHide("numdiv");
		inputHide("griddiv");
		$("#sendto").val('');
		$("input:checkbox[name='gridcheckbox']").each(function(i,item){
			$(item).attr("checked",false);
		});
		$("#grid-div_c3_all").attr("checked",false);
	});
	
	$("#gridaddr").click(function(){
		inputShow("griddiv");
		inputHide("mapdiv");
		inputHide("numdiv");
		$("#sendto").val('');
		clearMark();
		loadMark();	
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
	
	$("#mapaddr").click();
	$("#batchbodyradio").click();
	
	$("input:checkbox[name='gridcheckbox']").each(function(i,item){
		$(item).change(function(){
			var sendvalue="";
			$("input:checkbox[name=\"gridcheckbox\"]").each(function(i,item){
				if ($(item).attr("checked"))
					if (sendvalue==''){
						sendvalue+=$(item).attr("value");
					}else{
						sendvalue+=","+$(item).attr("value");
					}
			});
			$("#sendto").val(sendvalue);
		});
	});
	
	$("#grid-div_c3_all").change(function(){
		if ($("#grid-div_c3_all").attr("checked")){
			var sendvalue="";
			$("input:checkbox[name=\"gridcheckbox\"]").each(function(i,item){				
				if (sendvalue==''){
					sendvalue+=$(item).attr("value");
				}else{
					sendvalue+=","+$(item).attr("value");
				}
			});
			$("#sendto").val(sendvalue);
		}else{
			$("#sendto").val('');
		}
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
