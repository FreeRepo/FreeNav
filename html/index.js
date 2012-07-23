function QueryString()
{
var name,value,i;
var str=location.href;
var num=str.indexOf("?")
str=str.substr(num+1);
var arrtmp=str.split("&");
for(i=0;i < arrtmp.length;i++){
num=arrtmp[i].indexOf("=");
if(num>0){
name=arrtmp[i].substring(0,num);
value=arrtmp[i].substr(num+1);
this[name]=value;
}
}
}







var dataset="";
var animation=new Array();
$(document).ready(function(){

	var id="";
var subchoice="";
	$("#loading").html("<img src=\"img/loading.gif\" />");
	$("#slide").html("");
 $.get("../TestPHP/getCLick.php", function(data) {
		
			dataset = $.parseJSON(data);

			for(i=0;i<dataset.length;i++){
			animation[i]=0;
								$("#slide").append("<a target='_blanks' href=\""+dataset[i].URL+"\"><div class=\"content\" alt=\""+dataset[i].id+"\" title=\""+dataset[i].URL+"\"><div class=\"title\">"+dataset[i].name+"</div><div class=\"image\"><img src=\"http://223.4.134.183/FreeNav/Img/"+dataset[i].id+".jpg\" /></div><div class=\"discription\">"+dataset[i].content+"</div></div></a>");
	}
	
		$("#loading").html("");
		$("#slide").hide();
		$("#slide").fadeTo(1000,1);
		
	 });

 $.get("../TestPHP/getHierachy.php?level=1", function(data) {
	// $("#left ul").html("");
	$("#level1").append("<li class=\"choice\"><a class=\"cho\">热门<img id=\"arrow\" src=\"img/箭头开.png\" width=\"10\" height=\"10\" /></a></li>");
dataset = $.parseJSON(data);

	//alert(dataset.兴趣爱好);
	for (var key in dataset) 
{
	subchoice="";
		for(i=0;i<dataset[key].length;i++){
		
		subchoice=subchoice+"<li><a>"+dataset[key][i]+"</a><a>&nbsp;</a></li> ";

		}
	$("#level1").append("<li class=\"choice\"><a class=\"cho\">"+key+"<img id=\"arrow\" src=\"img/箭头关.png\" width=\"10\" height=\"10\" /></a><ul class=\"subchoice\">"+subchoice+"</ul></li>");
//alert(key);
//alert(dataset[key]);
}

	$(".subchoice").hide();
});




	var dis="";	  
	var width=document.body.clientWidth;
	var height=document.body.clientHeight;
	var rightwidth=document.body.clientWidth-120;
	$("#main").width(width+"px");
	$("#right").width(rightwidth+"px");
	$(".subchoice").hide();	
//==============================================
	$("#left").mouseenter(function(){
		$(".choice").css({
			"filter":"alpha(opacity=100)",
 			"-moz-opacity":"1",
 			"-khtml-opacity":"1",
 			"opacity":"1"	
		});		
	});
//==============================================
	$("#left").mouseleave(function(){
		$(".choice").css({
			"filter":"alpha(opacity=60)",
 			"-moz-opacity":"0.6",
 			"-khtml-opacity":"0.6",
 			"opacity":"0.6"	
		});	
		
	$(".subchoice li a").css({
	
		});		
	});	
//==============================================	
	$(".choice").live("mouseenter",function(){
		$(".choice").css({
			"color":"#777777"
		});	
		$(".subchoice li a").css({
			"filter":"alpha(opacity=100)",
 			"-moz-opacity":"1",
 			"-khtml-opacity":"1",
 			"opacity":"1"	
		});	
		$(this).css({
			"color":"#95c13d"
		});		
	});

	$(".choice").live("mouseleave",function(){ 
		$(".choice").css({
			"color":"#777777"
		});		
	});	
//==============================================	
	$(".subchoice li a").live("mouseenter",function(){ 
		$(this).css({
			"color":"#95c13d"
		});		
	});
	
	$(".subchoice li a").live("mouseleave",function(){ 

		if($(this).attr("id")=="selected"){
			$(this).css({
		});
			}
		else{
			$(this).css({
			"color":"#777777"
		});
			
			}
		
	});
//==============================================	
	 $(".cho").live("click",function(){
	if($(this).parent().index()==0){
		$("#loading").html("<img src=\"img/loading.gif\" />");
	$("#slide").html("");
 $.get("../TestPHP/getCLick.php", function(data) {
		
			dataset = $.parseJSON(data);

			for(i=0;i<dataset.length;i++){
			animation[i]=0;
			$("#slide").append("<a target='_blanks' href=\""+dataset[i].URL+"\"><div class=\"content\" alt=\""+dataset[i].id+"\" title=\""+dataset[i].URL+"\"><div class=\"title\">"+dataset[i].name+"</div><div class=\"image\"><img src=\"http://223.4.134.183/FreeNav/Img/"+dataset[i].id+".jpg\" /></div><div class=\"discription\">"+dataset[i].content+"</div></div></a>");
	}
	
		$("#loading").html("");
		$("#slide").hide();
		$("#slide").fadeTo(1000,1);
		
	 });
		}
    $(this).parent().find(".subchoice").slideToggle("normal");
	
		//$("#arrow").attr("src","img/箭头开.png");

		 
		 });
	 

//==============================================	
	$(".subchoice li").live("click",function(){
		
		$(".subchoice li").find("a").css({
			"color":"#777777"
		
		});	
		 $(this).find("a").css({
			"color":"#95c13d"

		});	
		$(".subchoice li a").attr("id","");
		$(this).find("a").attr("id","selected");
	$("#loading").html("<img src=\"img/loading.gif\" />");
	$("#slide").html("");
		var level=$(this).find("a").html();
		  $.get("../TestPHP/getData.php?level2="+level, function(data) {


			
			dataset = $.parseJSON(data);

			for(i=0;i<dataset.length;i++){
			animation[i]=0;
		$("#slide").append("<a target='_blanks' href=\""+dataset[i].URL+"\"><div class=\"content\" alt=\""+dataset[i].id+"\" title=\""+dataset[i].URL+"\"><div class=\"title\">"+dataset[i].name+"</div><div class=\"image\"><img src=\"http://223.4.134.183/FreeNav/Img/"+dataset[i].id+".jpg\" /></div><div class=\"discription\">"+dataset[i].content+"</div></div></a>");
	}
	
		$("#loading").html("");
		$("#slide").hide();
		$("#slide").fadeTo(1000,1);
		  });

	//	alert($(this).attr("title"));
		
	});
//==============================================	
$(".content").live("click",function(){ 

	//location.href=$(this).attr("title");
	//window.open($(this).attr("title"),"_blank"); 
	id=$(this).attr("alt");

	
	$.get("../TestPHP/setCLick.php?id="+id);
	});
//==============================================	
	$(".discription").live("mouseenter",function(){ 
	dis=$(this).html();	
	if(animation[$(this).parent().parent().index()]==0){
		animation[$(this).parent().parent().index()]=1;
			
	$(this).html(	"<span style='font-size:14px'>"+$(this).parent().find(".title").html()+"</span><br>"+$(this).html());
		 $(this).animate({top:"-213px"});	
		 $(this).css({
			"background-color":"#000000",
			"color":"#e5e5e5",
			"filter":"alpha(opacity=85)",
 			"-moz-opacity":"0.85",
 			"-khtml-opacity":"0.85",
 			"opacity":"0.85"	
		});	
		animation[$(this).parent().parent().index()]=0;	 
		}
	
	});
 
	$(".discription").live("mouseleave",function(){
				$(this).html(dis);	
			if(animation[$(this).parent().parent().index()]==0){
		animation[$(this).parent().parent().index()]=1;
		
		 $(this).animate({top:"10px"},function(){ $(this).css({
			"background-color":"#e5e5e5",
			"color":"#666666",
			"filter":"alpha(opacity=100)",
 			"-moz-opacity":"1",
 			"-khtml-opacity":"1",
 			"opacity":"1"	
		});		animation[$(this).parent().parent().index()]=0;});
			}
	});
//==============================================
});