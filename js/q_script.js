    if(window==window.top){
	  window.location="home.php";
	}
	var pro_id =   $('#proid').val();
		function liked(pid,pbyid){
		$(document).ready(function(){
		    $.ajax({
			url: 'qlike.php?pid='+pid+'&pbyid='+pbyid,
			success: function(data){
				if(data == 1)
				   $('#'+pid+' .likebtn').css("color","black");
			   else
				   $('#'+pid+' .likebtn').css("color","blue");
			     $.ajax({
			              url: 'qlikes.php?pid='+pid,
			              success: function(dat){
				          $('#'+pid+' .qlikes').html(dat);
			              },
			              error: function(){} 	        
	                });
			},
			error: function(){} 	        
	   });
		});
	}	function likedc(pid){
		$(document).ready(function(){
		    $.ajax({
			url: 'qalike.php?pid='+pid,
			success: function(data){
				if(data == 1)
				   $('#'+pid+' .likebtn').css("color","black");
			   else
				   $('#'+pid+' .likebtn').css("color","blue");
			     $.ajax({
			              url: 'qalikes.php?pid='+pid,
			              success: function(dat){
				          $('#'+pid+' .qalikes').html(dat);
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
			url: 'qedit.php?pid='+pid+'&content='+content,
			success: function(data){
				$('#'+pid+' .post_content').html(data);
			},
			error: function(){} 	        
	   });
		});
	}
		function view(pid,tab){
			$(document).ready(function(){
		 window.location="view_q_post.php?pid="+pid;
		});
	}
	function edit1(pid){
			$('#'+pid+' .save_edit').css('display','block');
			var content=$('#'+pid+' .post_content').html();
			$('#'+pid+' .post_content').html('<textarea style="width:100%; border:none; height:200px; "  class="e_content">'+content+'</textarea>');
			$('#'+pid+' .e_content').focus().val("").val(content);
	}
			function savec(pid){
			var content=$('#'+pid+' .e_content').val();
			$('#'+pid+' .save_edit').css('display','none');
		$(document).ready(function(){
		    $.ajax({
			url: 'q_ans_edit.php?pid='+pid+'&content='+content,
			success: function(data){
				$('#'+pid+' .post_content').html(data);
			},
			error: function(){} 	        
	   });
		});
	}
	
	function editc(pid){
			$('#'+pid+' .save_edit').css('display','block');
			var content=$('#'+pid+' .post_content').html();
			$('#'+pid+' .post_content').html('<textarea style="width:100%; border:none; height:200px; "  class="e_content">'+content+'</textarea>');
			$('#'+pid+' .e_content').focus().val("").val(content);
	}
		function deletec(pid,ploc){	
		$(document).ready(function(){
			if(confirm("If you delete,Your post won't be recovered again")){
	var pro_id =   $('#proid').val();
		    $.ajax({
			url: 'q_ans_delete.php?pid='+pid+'&ploc='+ploc,
			success: function(data){
				$('#'+pid).html('Deleted');
			},
			error: function(){} 	        
	   });
			}
			});
		}
	function delete1(pid){	
		$(document).ready(function(){
			if(confirm("If you delete,Your post won't be recovered again")){
	var pro_id =   $('#proid').val();
		    $.ajax({
			url: 'qdelete.php?pid='+pid,
			success: function(data){
				$('#'+pid).html('Your post is deleted');
				if(Number($(".pagenum:last").val()) < Number($(".total-page").val())) {
				    var posts = parseInt($(".posts:first").val());
					posts-=1;
					$(".posts:first").val(posts);
				var pagenum = parseInt($(".pagenum:last").val());
				var posts = parseInt($(".posts:first").val());
				if(pro_id.length>3)
				getresult('getQueries.php?page='+pagenum+'&posts='+posts+'&pp=1&pro_id='+pro_id);
			    else
				getresult('getQueries.php?page='+pagenum+'&posts='+posts+'&pp=1');
				$('#'+pid).html('Your query is deleted');
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
	
function preview_file(event) 
{
$('#ufile').val($('#file').val().split('\\').pop());
}
function getExtension(filename) {
    var parts = filename.split('.');
    return parts[parts.length - 1];
}

function isFile(filename) {
    var ext = getExtension(filename);
    switch (ext.toLowerCase()) {
    case 'jpg':
    case 'gif':
    case 'bmp':
    case 'png':
    case 'mp3':
    case 'mp4':
    case 'mov':
    case 'jpeg':
    case 'avi':
    case 'flv':
    case 'wmv':
    case 'mpeg':
    case '3gp':
    case 'ogg':
    case 'wav':
    case 'rar':
    case 'zip':
    case 'tar':
    case 'wma':
    case 'm4a':
    case 'm4b':
    case 'vlc':
        //etc
        return false;
    }
    return true;
}

$(function() {
    $('form').submit(function() {
        function failValidation(msg) {
            alert(msg); // just an alert for now but you can spice this up later
            return false;
        }

        var file = $('#file');
        if (isFile(file.val())) {
			return true;
        }
		else{
			return failValidation('Do not select images,video,audio,etc.,<br>Select text files');
		}
    });

});

$(document).ready(function(){
			$('#loader-icon').hide();
				$('#newposts').hide();
				$("#addnn").click(function(){
	  document.getElementById("bottom").style.height = "100%";
});

$("#imgbtn").click(function(){
    $("#file").click();
});	

$("#closenn").click(function(){
	  document.getElementById("bottom").style.height = "0%";
});
setInterval(function(){
	var posts= parseInt($(".posts:first").val());
		$.ajax({
			url:"newQueries.php?posts="+posts,
			success:function(data){
				var b=parseInt(data);
				if(b){
			          $('#newposts').show();
				}
			},
			error: function(){} 	 
		});
	},20000);
	
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
	
	try{
	$('input[type=checkbox][value='+branch+']').prop('checked',true);		
	$('input[type=checkbox][value='+year+']').prop('checked',true);	
	}	
	catch(err){}
			var j=0;
			var i=0;
			
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
	$("#newposts").click(function(){
		location.reload();
	});
	var pro_id =   $('#proid').val();
	$(window).scroll(function(){
		if(f==1){
		  if (Number($(window).scrollTop()) > Number(650*($(document).height()/670-1))){
			    f=0;
				if($(".pagenum:last").val() <= $(".total-page").val()) {
				var pagenum = parseInt($(".pagenum:last").val()) + 1;
				var posts = parseInt($(".posts:first").val());
				if(pro_id.length>3)
				getresult('getQueries.php?page='+pagenum+'&posts='+posts+'&pro_id='+pro_id);
			    else
				getresult('getQueries.php?page='+pagenum+'&posts='+posts);
					
			}
		  }
		}
	});
});