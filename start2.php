<?php
	$user_id=$_POST['userid'];
	$img_link = $_POST['img_link'];
?>
<html>
    <head>
        <style>
            .header{
                background-color: #61B329;
                color: #FFF;
                margin-top: 0px !important;
                margin-bottom: 20px;
                padding-bottom: 9px;
            }
            
            .middle{
                background-color:Yellow;
            }
            
            .left{
                background-color:Green;
            }

            #input-collection {
                padding-bottom: 10px;
                margin: 20px 0;
            }

            .rating-collection {
                padding-bottom: 10px;
                position:relative;
            }

            #error-msg, #error-msg-rating {
                color: #b94a48;
            }

            .input-button-collection {
                display: block;
                margin-left: 24%;
                margin-right: 24%;
            }

            .custom-input-button {
                text-align: center;
                position:absolute;
                margin-left:33.7%;
                margin-top:-7.1%;
            }

            .image-profile {
                margin-top:20%;
                margin-left:-30%;
            }

            .rating-input {
                font-size: 25px;
                position:relative;
                left:101%;
            }

            #rating-slider {
                clear: left;
                cursor: pointer;
                float: left;
                width: 90%;
                display:inline-block;
                margin-right: 15px;
                margin-top: 10px;
                margin-left: 5px;
            }

            .rating-container {
                text-align: right;
            }

            .input-header {
                color: #7F7F7F;
                text-align: center;
                margin: auto;
            }

            .page-header-text {
                padding-left: 15px;
                padding-top: 20px;
                padding-bottom: 10px;
                margin: 0px;
		color:fff;
		font-size: 36px;
		font-family: Arial;
            }

            .preview-container {
                margin: auto;
            }

            .inside-collection {
                padding-bottom: 50px;
                border-bottom: solid;
                border-bottom-color: #C4C4C4;
                border-bottom-width: thin;
            }
		.c1
		{
			margin-top : 5%;
			margin-left: 5%;
			margin-right: 5%;

		}
		.c2
		{
			margin-top: 2%;
		}
	html, body { margin: 0; padding: 0; border: 0 }
	.header{margin-bottom:0 !important;}
        </style>
       <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" >
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <!-- jQuery UI -->
        <link rel="stylesheet" href="css/jquery-ui-min.css" type="text/css">
      </head>

    <body>
        <div class="page-header header">
            <h1 class="page-header-text">twitter timeline</h1>
        </div>
	<div class = "articleContent">
	</div>
            <table border="0" width="100%">
                <tr>
                    <div class="left">
                        <td style="width:0%" valign= "top">
                        </td>                       
                    </div>
                    
                    <div class="middle">
                        <td style="width:100%">					
				<div class = "c1">
					<div class="row demo-row">
					        <div class="col-xs-3">
					          <a class="btn btn-block btn-lg btn-primary" id="mention_this">Mention this month</a>
					        </div>
	  		              	<div class="col-xs-3">
				       	   <a href="#fakelink" class="btn btn-block btn-lg btn-danger" id="mention_prev">Mention previous month</a>
					        </div>
				              <div class="col-xs-3">
					          <a href="#fakelink" class="btn btn-block btn-lg btn-success" id="rt_this">Retweet this month</a>
	           	       	       </div>
					       <div class="col-xs-3">
					          <a href="#fakelink" class="btn btn-block btn-lg btn-info" id="rt_prev">Retweet previous month</a>
					        </div> 
					</div>   
					<div class="c2">
					<table class="table table-condensed">
				        <thead>
				          <tr>
				            <th>Total</th>
				            <th>Mention reach</th>
				            <th>Retweet reach</th>
				            <th>Count of mention</th>
				            <th>Count of retwet</th>
				          </tr>
				        </thead>
				        <tbody>
				          <tr>
				            <td></td>
				            <td>45</td>
				            <td>35</td>
				            <td>534</td>
				            <td>6343</td>
				          </tr>          
				        </tbody>
				      </table>
					</div>
					<div class = "c2">		
						<table class="table table-condensed">
						        <thead>
						            <tr class="active">
						                <td class="active">Results</td>
						                <td class="success">Date</td>
						                <td class="warning">Time</td>
						                <td class="danger">Twitter user</td>
						                <td class="info">Reach</td>
						                <td class="active">Contant</td>
						                <td class="active">Tweet</td>
						            </tr>
						        </thead>
						        <tbody>
						            <tr class="active">
						                  <td class="active">1</td>
						                  <td class="success">john</td>
						                  <td class="warning">carry</td>
						                  <td class="danger">..dfd.</td>
						                  <td class="info">.dfd..</td>
						                  <td class="active">.fdfd..</td>
						                  <td class="success">...dfd</td>
						            </tr>
						        </tbody>
					</div>
				</div>
                        </td>               
                    </div>
                    
                    <div class="right">
                        <td style="width:0%">
                        </td>
                    </div>
                </tr>
            </table>
	        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script>
			$( "#mention_this" ).click(function() {
						alert("fd");
				                var category = 'mention_this';
       				             $.ajax({
			                            url: "twitter_db.php",
			                            type: "POST",
			                            data: {"category": category},
			                            success: function(data) {
			                            $(".articleContent").html(data);                     	                                  }
			                        });				
			});		
		</script>
		
    </body> 
	
    



</html>
