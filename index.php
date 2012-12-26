<!doctype html>
<html>
	<head>
		<title>OctoEdit - Login</title>
		<link rel="stylesheet" type="text/css" href="src/css/main.css" />
		<script type="text/javascript" src="src/js/jquery-1.8.3.min.js"></script>
		<script src="src/notifications/js/notification.js"></script>
		<link href="src/notifications/main.css" rel="stylesheet" type="text/css" media="screen" />
		
	</head>
	<body>
		<script type="text/javascript">

		
		$(document).ready(function(){
			$("#submit").click(function() {
			  // validate and process form here
			  	var error = "";
				var username = $("input#txtUsername").val();
				if (username == "") {
					error = "username";
			  	}
				var password = $("input#txtPassword").val();
				if (password == "") {
					if (error != "") {
						error = error + " or password";
					}else {
						error = "password";
					}
			  	}
			  	if (error != "") {
			  		dialog("Error", "Unfortunately no " +error+" could be obtained.");
			  		return false;
			  	}
			  
			  var dataString = '&username=' + username + '&password=' + password;
			  //alert (dataString);return false;
			  $.ajax({
			    type: "POST",
			    url: "src/auth/login.php",
			    data: dataString,
			    success: function(output) {
			    	if (output == "success") {
			    		window.location = 'app/index.php';
			    	}else {
			    		dialog("Login", output);
			    	}
			    }
			  });
			  return false;
			  
			});
			
		     $("#txtPlainPassword").show();
		     $("#txtPassword").hide();
		     $("#txtPlainPassword").focus(function() {
		       $(this).hide();  
		       $("#txtPassword").show();
		       $("#txtPassword").focus();  
		     });
		    
		    $("#txtPassword").blur(function() {
		      
		       if($(this).val().length == 0)
		       {
		         $(this).hide();  
		         $("#txtPlainPassword").show();
		       }      
		     });
		      $("#txtPlainUsername").show();
		      $("#txtUsername").hide();
		      $("#txtPlainUsername").focus(function() {
		        $(this).hide();  
		        $("#txtUsername").show();
		        $("#txtUsername").focus();  
		      });
		     
		     $("#txtUsername").blur(function() {
		       
		        if($(this).val().length == 0)
		        {
		          $(this).hide();  
		          $("#txtPlainUsername").show();
		        }      
		      });
		  });
		  function dialog(dialogTitle, dialogContent) {
		  	$.notification( 
		  		{
		  			title: dialogTitle,
		  			content: dialogContent,
		  			img: "src/notifications/demo/thumb.png",
		  			border: false,
		  			timeout: 10000
		  		}
		  	);
		  }
				  
		</script>
		<div class="wrapper">
			<div id="content">
				<div id="header"><span class="textXLarge">OctoEdit</span></div>
				<div id="content-header"><span class="textLarge">Login or Register</span></div>
				<form>
					<input type="text" name="username" id="txtPlainUsername" value="Username" class="textfield" />
					<input required name="username" id="txtUsername" type="text" class="textfield" /> 
					
					<input type="text" name="password" id="txtPlainPassword" value="Password" class="textfield" />
					<input required name="password" type="password" id="txtPassword" class="textfield"/>
					
					<input class="submit-btn" id="submit" type="submit" value="Click to Continue" /> 
				</form>	
			</div>		
			<div class="push"></div>
		</div>
		<div class="footer">
			<div id="footer-content">
				<span>Made with love by Sebastian Ruiz.</span>
			</div>
		</div>
					
	</body>
</html>
