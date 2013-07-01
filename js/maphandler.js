var mark = [];
var oldMark = [];
var checked=[];
  
function point(x, y){
    this.x = x;
    this.y = y;
}
function getOffset(obj){
    var x = 15, y = 19;
    x += obj.offset().left;
    y += obj.offset().top;
    return {x : x, y : y };
}
function addMark(p, x, y, index){
    newMark=$('<div></div>');
    newMark.addClass("mark");
    newMark.attr("id","mark"+index);
    newMark.css("left",x+"px");
    newMark.css("top",y+"px");
    newMark.css("background-image","url(css/pin.png)");
    $("#container").append(newMark);
    
}

function setHover(mp){
	mp.hover(
		function(){
			mp.css("background-image","url(css/gpin.png)");
		},
		function(){
			mp.css("background-image","url(css/pin.png)");
		}
	)	
}

function removeHover(mp){
	mp.hover(
		function(){
			mp.css("background-image","url(css/gpin.png)");
		},
		function(){
			mp.css("background-image","url(css/gpin.png)");
		}
	)	
}

function addOldMark(idx,item){
	var newOldMark=$('<div title="'+item.name+'"></div>');
	newOldMark.addClass("mark");
	newOldMark.attr("id","oldMark"+idx);
	newOldMark.css("left",item.lng+"px");
	newOldMark.css("top",item.lat+"px");
	newOldMark.css("background-image","url(css/pin.png)");
	setHover(newOldMark);
	checked[idx]=false;
	
	newOldMark.click(function(){
			if (checked[idx]){
				newOldMark.css("background-image","url(css/pin.png)");
				setHover(newOldMark);
				checked[idx]=false;
			}else{
				newOldMark.css("background-image","url(css/gpin.png)");
				removeHover(newOldMark);
				checked[idx]=true;
			}
			if (typeof($("#sendto").val())!="undefined"){
				var sendtoStr="";
				for (var c=0;c<checked.length;c++){
					if (checked[c]){
						if (sendtoStr!="")
							sendtoStr+=",";
						sendtoStr+=oldMark[c].tel;
					}
				}
				$("#sendto").val(sendtoStr);
			}
	})
	
	$("#container").append(newOldMark);
}

function bindEvent(){
    $("#map").dblclick(function(event){
        clearMark();
        
        var container = $("#container");
        var offset = getOffset(container);
        var x =  event.pageX-offset.x;
        var y =  event.pageY-offset.y;
        
        addMark(container, x, y, mark.length);
		$("#Map_lng").val(x);
		$("#Map_lat").val(y);
		$("#Map_lng").attr("readonly","readonly");
		$("#Map_lat").attr("readonly","readonly");
  
        mark.push(x + "," + y);       
    });
}
 
function loadMark(){
    $.get("http://localhost/senluomessager/index.php?r=map/getjsonnodes",function(data){
    	data=eval("("+data+")");
    	$.each(data,function(idx,item){
    		addOldMark(idx,item);
    		oldMark.push(item);
    	});
    });
}

function clearMark(){
    
    for(var i=0; i<mark.length; i++){
    	$("#mark"+i).detach();
    }
    mark = [];
 }