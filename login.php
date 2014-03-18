<html>
	<head>
		<title>ThenWat</title>
		<link href = "css/button.css" rel = "stylesheet" type = "text/css">
		<link href = "css/rateit.css" rel = "stylesheet" type = "text/css">
		<!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" >
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
		<script src = "//connect.facebook.net/en_US/all.js"></script>
		<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src = "js/jquery.rateit.js" type = "text/javascript"></script>			
		<style>
			.middle{
				background-color:Yellow;
			}
			
			.left{
				background-color:Green;
			}
			.url{
				box-sizing: border-box;
				display: block;
			}
			.url:hover {
				box-shadow: 2px 2px 5px rgba(0,0,0,.2);
			}
			.header{
                background-color: #61B329;
                color: #FFF;
                margin-top: 0px !important;
                margin-bottom: 20px;
                padding-bottom: 9px;
            }
            .page-header-text {
                padding-left: 15px;
                padding-top: 20px;
                padding-bottom: 10px;
                margin: 0px;
            }

	.row
	{
		//display: block;
		width: 100%;
		text-align: center;    
	}
		
			
			html, body { margin: 0; padding: 0; border: 0 }
		</style>
		<script>
			$( document ).ready(function()
			{
				console.log( "ready!" );
				//alert("Welcome");
			});
		</script>
	</head>

	<body>
		<div class="page-header header">
            <h1 class="page-header-text">Twitter login </h1>
        </div>		
			<table border = "0" width = "100%">
				<tr>
		 			<div class = "middle">
		 				<td style = "width:40%">
							<div class="container">
								<div class="row">
					 			<!--	<input type = "button" id = "loginButton" class = "btn btn-primary" onclick = "authUser();" value = "Login | Facebook" /> -->
									<a href="./redirect.php"><input type = "button" id = "loginTwitter" class = "btn btn-primary"  value = "Login | Twitter "/></a>
								</div> 
							</div>
	
						</td> 				
				</div>
			</tr>		 		
		</table>
	<div id = "fb-root"></div>
	<script type = "text/javascript">

function getTwitterVal(clb)
{
    var xmlhttp;
    if (window.XMLHttpRequest)
    {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

    }
    xmlhttp.onreadystatechange=function()
    {
            if (xmlhttp.readyState == 4 && xmlhttp.status==200)
            {
                var result = xmlhttp.responseText;
		alert(result);
                var obj = JSON.parse(result);
//		var obj = '{"id":200582436,"name":"Karimkhan"}';
                clb(obj);
	     }
    }
    xmlhttp.open("POST","redirect.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send();
    // api_call();
}

$('#loginTwitter').click(function data() {
    getTwitterVal(function(obj) {
    //    alert(obj.id);
	var userid = obj.id;
					$.post('user_record.php',{ }, function(data)
					{
						var $form = $("<form id = 'form1' method = 'post' action = 'start.php'></form>");
						$form.append('<input type = "hidden" name = "userid" value = "'+userid+'" />');
						$('body').append($form);
						window.form1.submit();
					});
    });
});

		var userid;
		FB.init({
		//appId: '1413900632',
		appId: '1450682958492130',
		xfbml: true,
		status: true,
		cookie: true,
		});
		FB.getLoginStatus(checkLoginStatus);
		function authUser() 
		{
			FB.login(checkLoginStatus, {scope:'email'});
		}
		function checkLoginStatus(response) 
		{				
			if(response && response.status == 'connected') 
			{
			FB.api('/me?fields = movies,email,name,gender,locale,location,link', function(mydata)
			{
				console.log(mydata.email);
				console.log(mydata.id);
				userid = mydata.id;
				var name = mydata.name;
				gender = mydata.gender;
				locale = mydata.locale;
				city = mydata.location;
				link = mydata.link;
				//alert(name);
				var email = mydata.email;
				//var json = JSON.stringify(mydata.movies.data);
				//var a = JSON.parse(json);
				var picture = "https://graph.facebook.com/"+userid+"/picture?type = small";
				// alert(picture);
				$.post('user_record.php',{ name: name, email: email, userid:userid, picture:picture, gender: gender, locale: locale, city: city, link: link}, function(data)
				{
					var $form = $("<form id = 'form1' method = 'post' action = 'start.php'></form>");
						$form.append('<input type = "hidden" name = "userid" value = "'+userid+'" />  <input type = "hidden" name = "img_src" value = "fb" />');
						$('body').append($form);
						window.form1.submit();
					});
				});
				
				console.log('Access Token: ' + response.authResponse.accessToken);
				}
				else
				{
					document.getElementById('loginButton').style.display = 'block';
				}
			}
		</script>	
	</body>	
</html>

