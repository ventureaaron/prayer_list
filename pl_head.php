<!DOCTYPE html>
<html lang="en">
  <head><meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Prayerlist</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   

	<script>
		$(document).ready(function()
		{
		
		$('#submit').click(function()
		{
			var login=$("#login").val();
			var pwd=$("#pwd").val();
			var dataString = 'login='+login+'&pwd='+pwd;
			if($.trim(login).length>0 && $.trim(pwd).length>0)
			{
				$.ajax({
				type: "POST",
				url: "ajaxlogin.php",
				//data: dataString,
				data: {
					'login': login,
					'pwd': pwd
				}, 
				cache: false,
				beforeSend: function(){ $("#submit").val('Connecting...');},
				success: function(data){
					if(data)
					{
						$("body").load("prayerlist.php").hide().fadeIn(1500).delay(6000);
						//or
						//window.location.href = "prayerlist.php";
					}
					else
					{					
						$("#submit").val('submit');
						$("#error").html("<span style='color:#cc0000'>Error:</span> Invalid username and password. "+data);
					}
				}
		
				});
		
			}
			return false;
		});
		$('.pray').click(function()
				{
					$(this).css("background-color","#BEF781");
					return false;
				});


		$('#add').click(function()
				{
					var name=$("#name").val();
					var desc=$("#desc").val();
					var cont=$("#cont").val();
					var stat=$("#status").val();
			
					$.ajax({
						type: "POST",
						url: "ajaxadd.php",
						//data: dataString,
						data: {
							'name': name,
							'desc': desc,
							'cont': cont,
							'stat': stat
						}, 
						cache: false,
						success: function(data){
							if(data)
							{
								$("body").load("prayerlist.php").hide().fadeIn(1500).delay(6000);
								//or
								//window.location.href = "prayerlist.php";
							}
							else
							{
								$("#result").html("<span style='color:#cc0000'>Error:</span>Couldn't update! "+data);
							}
						}
				
					});
					
					return false;
				});
		
		$('.save').click(function()
				{
					var pid=$(this).attr("id");
					var name=$("#"+pid+"name").val();
					if (name==""){
						name=$("#"+pid+"name").attr("placeholder");
					}
					var desc=$("#"+pid+"desc").val();
					if (desc==""){
						desc=$("#"+pid+"desc").attr("placeholder");
					}
					var cont=$("#"+pid+"cont").val();
					if (cont==""){
						cont=$("#"+pid+"cont").attr("placeholder");
					}
					var stat=$("#"+pid+"status").val();
					
					$.ajax({
						type: "POST",
						url: "ajaxupdate.php",
						//data: dataString,
						data: {
							'pid': pid,
							'name': name,
							'desc': desc,
							'cont': cont,
							'stat': stat
						}, 
						cache: false,
						success: function(data){
							if(data)
							{
								$("body").load("prayerlist.php").hide().fadeIn(1500).delay(6000);
								//or
								//window.location.href = "prayerlist.php";
							}
							else
							{
								$("#result").html("<span style='color:#cc0000'>Error:</span>Couldn't update! "+data);
							}
						}
				
					});
					
					return false;
				});
		});
	</script>
  </head>
  <body id="body">
    <div class="container">
      <div class="well"><center><img src="logo.jpeg" class="img-thumbnail"><br />
        <p class="lead" id="result">Prayer List</p></center>
      </div>