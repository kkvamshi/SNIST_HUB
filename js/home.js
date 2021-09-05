	

function prop(url){
	setTimeout(function(){
	var d=new Date();
	$('#propic').attr('style','background-image:url("'+url+'?'+d.getTime()+'");');
	}, 1000);
}
function notf(){
	
	$('#iframe').attr('src','notifications.php');
	
}
function msgs(){
	
	$('#iframe').attr('src','messages.php');
	
}
$("#head").hide();
$("#mainn").hide();
$("#loader-icon").show();
$(document).ready(function(){
	
$("#head").hide();
$("#mainn").hide();
$("#loader-icon").show();

$("#loader-icon").delay(3000).fadeOut("slow");
$("#head").delay(3000).show();
$("#mainn").delay(3000).show();
$("#iframe").click();


	
	setInterval(function(){
	 $.ajax({
			url: 'getnummsgs.php',
			async:true ,
			success: function(data){
				if(data > 0){
					if(data < 10 )
						$('#micon i').attr('data-badge',data);
					else
						$('#micon i').attr('data-badge','9+');
				}
				else{
						$('#micon i').removeAttr('data-badge');
						}
			}
			});
	},8000);
	setInterval(function(){
	 $.ajax({
			url: 'getnumnots.php',
			async:true ,
			success: function(data){
				if(data > 0){
					if(data < 10 )
						$('#nicon i').attr('data-badge',data);
					else
						$('#nicon i').attr('data-badge','9+');
				}
				else{
						$('#nicon i').removeAttr('data-badge');
						}
			}
			});
	},60000);

$(".hlinks").click(function(){
if($(window).width()<=500){
	  if($("#leftt").width()==0)
		   $("#leftt").width("100%");
	   else
		   $("#leftt").width("0%");
}
});
$("#slideshow > div:gt(0)").hide();
/*
setInterval(function() { 
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
},  3000);
*/

	$("#menuu").on('click',function(){
    document.getElementById("leftt").style.width = "100%";
	});
	$("#close_left").on('click',function(){
		document.getElementById("leftt").style.width="0%";
	});
	$(window).resize(function(){
		if($(window).width()>600){
		if($(window).width()>1050)
			$("#leftt").width("20%");
		else
			$("#leftt").width("30%");
		}
		else
			$("#leftt").width("0%");
	});
	$('.hlinks').click(function(){
		$('.hlinks').attr('id','');
		$(this).attr('id','gen');
		if(document.getElementById("leftt").style.width == "100%"){
			document.getElementById("leftt").style.width="0%";
		}
	});
});
$(document).ready(function(){
	$('#iframe').focus();
	$("#searchinput").keyup(function(){
		var l=$(this).val().length;
		var v=$(this).val();
	if(l > 2 ){
		$.ajax({
		type: "POST",
		url: "search.php",
		data:'key='+$(this).val(),
		beforeSend: function(){
		},
		success: function(data){
			var fdata='';
			var d1;
			var d2;
			var d3;
			var d4;
			var d5;
			fdata=data;
			d1=fdata.replace('#$$$#','###').split('###');
			while(d1[1]){
			d2=d1[1].replace('#^^^#','###').split('###');
			d4=v.toLowerCase();
			d5=d2[0].toLowerCase();
			if(d5==d4){
			fdata=d1[0]+'<span style="color:blue;">'+d5+'</span>'+d2[1];
			}
			else{
			d3=d5.split(d4);
			if(d3[1]||d3[1]=='')
			fdata=d1[0]+d3[0]+'<span style="color:blue;">'+v+'</span>'+d3[1]+d2[1];
		    else{
			fdata=d1[0]+d2[0]+d2[1];
			}
			}
			d1=fdata.replace('#$$$#','###').split('###');
			}
			$("#suggestions").html(fdata);
		}
		});
	}
	else{
		$("#suggestions").html("");
	}
	});
});
function select(val1,id1) {
	var a=String(id1);
	var b=String(val1);
	var val=b.replace(/\//g,'');
	var id=a.replace(/\//g,'');
$("#searchinput").val(val);
$("#suggestions").html("");
$('#iframe').attr('src','profile.php?pro_id='+id);
}