  if(window==window.top){
	  window.location="home.php";
	}
	

	
	var pro_id =   $('#proid').val();
	function report(pid,tab){
		$(document).ready(function(){
		    $.ajax({
				type: 'POST' ,
			url: 'post_report.php',
			data : {
				pid : pid ,
				tab : tab
			},
			success: function(data){
				$('#'+pid).html("<p>Thank You<br>We will Notice your report and will take action soon.<br>-Team SNISTHUB</p>");
			}
			});
		});
		
	}
		function view(pid,tab){
			$(document).ready(function(){
		 window.location="view_gen_post.php?pid="+pid;
		});
	}
	function liked(pid,pbyid){
		$(document).ready(function(){
		    $.ajax({
			url: 'glike.php?pid='+pid+'&pbyid='+pbyid,
			success: function(data){
				if(data == 1)
				   $('#'+pid+' .like i').attr("style","color:black;");
			   else
				   $('#'+pid+' .like i').attr("style","color:blue;");
			     $.ajax({
			              url: 'glikes.php?pid='+pid,
			              success: function(dat){
				          $('#'+pid+' .likes').html(dat);
			              },
			              error: function(){} 	        
	                });
			},
			error: function(){} 	        
	   });
		});
	}
		function save(pid){
			var content=$('#'+pid+' .e_content').val();
			$('#'+pid+' .save_edit').css('display','none');
		$(document).ready(function(){
		    $.ajax({
			url: 'gedit.php?pid='+pid+'&content='+content,
			success: function(data){
				$('#'+pid+' .post_content').html(content);
			},
			error: function(){} 	        
	   });
		});
	}
	function edit1(pid){
			$('#'+pid+' .save_edit').css('display','block');
			var content=$('#'+pid+' .post_content').html();
			$('#'+pid+' .post_content').html('<textarea width="100%" height="150px" class="e_content" style="border:none; ">'+content+'</textarea>');
			$('#'+pid+' .e_content').focus().val("").val(content);
	}
	function delete1(pid,location){	
		$(document).ready(function(){
			if(confirm("If you delete,Your post won't be recovered again")){
	var pro_id =   $('#proid').val();
		    $.ajax({
			url: 'gdelete.php?pid='+pid+'&loc='+location,
			success: function(data){
				$('#'+pid).html('Your post is deleted');
				if(Number($(".pagenum:last").val()) < Number($(".total-page").val())) {
				    var posts = parseInt($(".posts:first").val());
					posts-=1;
					$(".posts:first").val(posts);
				var pagenum = parseInt($(".pagenum:last").val());
				var posts = parseInt($(".posts:first").val());
				if(pro_id.length>3)
				getresult('getGeneral.php?page='+pagenum+'&posts='+posts+'&pp=1&pro_id='+pro_id);
			    else
				getresult('getGeneral.php?page='+pagenum+'&posts='+posts+'&pp=1');
				$('#'+pid).html('Your post is deleted');
			}
			},
			error: function(){} 	        
	   });
	   function getresult(url) {
		$.ajax({
			url: url,
			beforeSend: function(){
			$('#loader-icon').show();
			$(window).scroll(function(){});
			},
			complete: function(){
			$('#loader-icon').hide();
			f=1;
			},
			success: function(data){
			$("#posts_display_area").append(data);
						componentHandler.upgradeDom();
			},
			error: function(){} 	        
	   });
	}
	
	}
		});
	}
	function selyear(){
		if($('#select-year').css('display')=='none')
			$('#select-year').css('display','block');
		else
			$('#select-year').css('display','none');
	}
	function selbranch(){
		if($('#select-branch').css('display')=='none')
			$('#select-branch').css('display','block');
		else
			$('#select-branch').css('display','none');
	}
		function commented(pid,pbyid){
		$(document).ready(function(){
			var com=$('#'+pid+' .com').val();
			if(com == ""){
			$('#'+pid+' .com').attr("placeholder","Please type your comment then click");
			}
			else{
			$('#'+pid+' .com').val("");
		    $.ajax({
			url: 'gcomment.php?pid='+pid+'&com='+com+'&pbyid='+pbyid,
			success: function(data){
				          $('#'+pid+' .comments').html(data);
			     $.ajax({
			              url: 'gcomments.php?pid='+pid,
			              success: function(dat){
				          $('#'+pid+' .post_comment').html(dat);
						  $('#'+pid+' .post_comment').animate({ scrollTop:0}, 1000);

			              },
			              error: function(){} 	        
	                });
			},
			error: function(){} 	        
	   });
			}
		});
	}
		function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
			$('#newposts').hide();
$(document).ready(function(){
			$('#loader-icon').hide();
			$('#newposts').hide();
$("#addnn").click(function(){
	  document.getElementById("bottom").style.height = "100%";
});
$("#closenn").click(function(){
	  document.getElementById("bottom").style.height = "0%";
});
$("#imgbtn").click(function(){
    $("#file").click();
});	
setInterval(function(){
	var posts= parseInt($(".posts:first").val());
		$.ajax({
			url:"newPost.php?posts="+posts,
			success:function(data){
				var b=parseInt(data);
				if(b==1){
			          $('#newposts').show();
				}
			},
			error: function(){} 	 
		});
	},60000);
	
$('input[type=checkbox]').change(function(){
	var branch =   $('#branch').val();
	var year   =   $('#year').val();
	if($(this).val()=='y'){
		if($(this).is(':checked'))
			$('.y').prop('checked',true);
		else
			$('.y').prop('checked',false);
	}
	if($(this).val()=='b'){
		if($(this).is(':checked'))
			$('.b').prop('checked',true);
		else
			$('.b').prop('checked',false);
	}
	
			var j=0;
			var i=0;
	
	try{
	$('input[type=checkbox][value='+branch+']').prop('checked',true);		
	$('input[type=checkbox][value='+year+']').prop('checked',true);	
	}	
	catch(err){}
	if(parseInt($(this).val())<=4){
		if(!$(this).is(':checked'))
			$('#y').prop('checked',false);
		else{
			j=0;
			for(i=1;i<5;i++){
			if($('input[type=checkbox][value='+i+']').is(':checked'))
				j+=1;
			}
			if(j==4)
			  $('#y').prop('checked',true);
		}
	}		
	if(parseInt($(this).val())>4){
		if(!$(this).is(':checked'))
			$('#b').prop('checked',false);
		else{
			j=0;
			for(i=5;i<11;i++){
			if($('input[type=checkbox][value='+i+']').is(':checked'))
				j+=1;
			}
			if(j==6)
			  $('#b').prop('checked',true);
		}
	}
});
	var f=1;
function getresult(url) {
		$.ajax({
			url: url,
			beforeSend: function(){
			$('#loader-icon').show();
			$(window).scroll(function(){});
			},
			complete: function(){
			$('#loader-icon').hide();
			f=1;
			},
			success: function(data){
			$("#posts_display_area").append(data);
			componentHandler.upgradeDom();
			},
			error: function(){} 	        
	   });
	}
	var pro_id =   $('#proid').val();
	$(window).scroll(function(){
		if(f==1){
		  if ($(window).scrollTop() > 650*($(document).height()/670-1)){
			    f=0;
				if(Number($(".pagenum:last").val()) < Number($(".total-page").val())) {
				var pagenum = parseInt($(".pagenum:last").val()) + 1;
				var posts = parseInt($(".posts:first").val());
				if(pro_id.length>3)
				getresult('getGeneral.php?page='+pagenum+'&posts='+posts+'&pro_id='+pro_id);
			    else
				getresult('getGeneral.php?page='+pagenum+'&posts='+posts);
					
			}
		  }
		}
	});
	$("#newposts").click(function(){
		location.reload();
	});
});