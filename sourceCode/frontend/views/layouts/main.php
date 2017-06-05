<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\models\User;
use backend\models\Category;
use dosamigos\datepicker\DatePicker;


if(!\Yii::$app->user->isGuest)
{
	 
	$user = User::findOne(Yii::$app->user->getId());
	$categories = Category::find()->all();
	//var_dump($user);die();
}
$isFrontend = strpos(Yii::$app->request->url, "frontend");
$fbUrl = "";

if ($isFrontend)
{
	$fbUrl = str_replace('/frontend/web/', '', Yii::$app->request->url);
}
else
{
	$fbUrl = substr(Yii::$app->request->url, 0, strlen(Yii::$app->request->url) - 1);

}


$isFrontend = strpos(Yii::$app->request->url, "frontend");
$fbUrl = "";

if ($isFrontend)
{
	$fbUrl = str_replace('/frontend/web/', '', Yii::$app->request->url);
}
else
{
	$fbUrl = substr(Yii::$app->request->url, 0, strlen(Yii::$app->request->url) - 1);

} 


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title><?= Html::encode($this->title) ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php $this->head(); ?>
  
  <style type="text/css">
  	.navbar{
		background-color:#7ba6ed; !important
		
	}
	.navbar-nav{
		text-color:#7ba6ed; !important
	}
	
	.createEvent {
			
		  display: block;
		  -webkit-border-radius: 6;
		  -moz-border-radius: 6;
		  border-radius: 6px;
		  font-family: Arial;
		  color: #ffffff;
		  font-size: 18px;
		  background: #F4511E;
		  padding: 10px 20px 10px 20px;
		  text-align:center;
		  background-color: #7ba6ed; !important;
		  border: solid #7ba6ed 1px;
		  cursor: pointer;
		  margin-left:80px;
		  width:150px;
		  
		 
		  
		  
		}

		

		.closeEvent {
		  -webkit-border-radius: 4;
		  -moz-border-radius: 4;
		  border-radius: 4px;
		  font-family: Arial;
		  color: #000000!important;
		  font-size: 18px;
		  background: #fffff;
		  padding: 10px 20px 10px 20px;
		  border: solid #030608 1px;
		  text-decoration: none;
		  cursor: pointer;
		}

		.closeEvent:hover {
		  background: #f5f2ed!important;
		  text-decoration: none;
		}
		.createEventModButton{
			
		  -webkit-border-radius: 6;
		  -moz-border-radius: 6;
		  border-radius: 6px;
		  font-family: Arial;
		  color: #ffffff;
		  font-size: 18px;
		  background: #F4511E;
		  padding: 10px 20px 10px 20px;
		  text-align:center;
		  background-color: #7ba6ed; !important;
		  border: solid #7ba6ed 1px;
		  cursor: pointer;
		  width:150px;
		  
		}
		
		a:link {
			text-decoration: none;
		}
		

		.dropbtn {
		    background-color: #4CAF50;
		    color: white;
		    padding: 16px;
		    font-size: 16px;
		    border: none;
		    cursor: pointer;
		}

		

		.dropdown-content {
		    display: none;
		    position: absolute;
		    background-color: #f9f9f9;
		    min-width: 160px;
		    z-index: 1;
		}

		.dropdown-content a {
		    color: black;
		    padding: 3px 16px 10px;
		    text-decoration: none;
		    display: block;
		}

		.dropdown-content a:hover {background-color: #f1f1f1; color: #788A96!important;}

		.dropdown:hover .dropdown-content {
		    display: block;
		}

		.dropdown:hover .dropbtn {
		    background-color: #3e8e41;
		}
    
    	.img-circle {
    border-radius: 50%;
}

  </style>

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<?php $this->beginBody() ?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage"  style="padding-top: 18px;">iJoin</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar" style="padding-top: 5px;">
      <ul class="nav navbar-nav navbar-right">
        
        <li><a href="#eventMap">Event Map</a></li>
		<li><a href="#about">About us</a></li>
		 <li><a href="#contact">Contact</a></li>
		<li id="userDetails" class="dropdown">
		<?php if(!\Yii::$app->user->isGuest): ?>
		  
		  <a href="<?= Url::to(['profile']) ?>" >
			Hi, <?= $user->name?>
			  <div class="dropdown-content">
			    <a href="<?= Url::to(['logout']) ?>" style="color: black!important;">Logout</a>
			  </div>
			</a>

		<?php else: ?>
			<a href="#login"  data-toggle="modal" data-target="#myModal">
				Login
			</a>
		<?php endif; ?>
		</li>
		</ul>

		</div>

		
    </div>
  </div>
  <div id="myModal" class="modal fade" role="dialog">
					<div class="modal-dialog" style="width:240px;">

			<!-- Modal content-->
						<div class="modal-content">
					<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="text-align: center;">Sign up with</h4>
			  </div>
			  <div class="modal-body" style="text-align: center;">
			 
				<a href="" onclick="window.open('<?= $fbUrl ?>/frontend/web/auth?authclient=facebook', '_blank', 'location=yes,height=520,width=520,scrollbars=yes,status=yes')" style="background-color:transparent; border-color:transparent;"> 
					<img src="<?= Yii::getalias('@web') ?>/static/img/facebook.png" height="35"/>
				</a>

			  </div>
			</div>

		  </div>
		</div>
		<!--google map modal div -->
		<div id="myModalMap" class="modal fade" role="dialog">
				<div class="modal-dialog" style="width:350px;">

		<!-- Modal content-->
					<div class="modal-content">
				<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title" style="margin-left: 72px;">Action panel</h4>
		  </div>
		  <div class="modal-body">
		  <?php if(!Yii::$app->user->isGuest): ?>
			<a class="createEvent" id="create" style ="margin-bottom: 20px;" >
					Create
			</a>

			<a class="createEvent"   id="join">
					Join
			</a>
			<?php else: ?>
				<a href="" onclick="window.open('<?= $fbUrl ?>/frontend/web/auth?authclient=facebook', '_blank', 'location=yes,height=520,width=520,scrollbars=yes,status=yes')" style="background-color:transparent; border-color:transparent;"> 
				<img src="<?= Yii::getalias('@web') ?>/static/img/facebook.png" height="35"/>
			</a>
		<?php endif; ?>
		  </div>
		</div>

	  </div>
	</div>
	
	<div id="createEventModal" class="modal fade" role="dialog">
		<div class="modal-dialog" >
		<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" style="text-align: center;">Create your event</h4>
		  		</div>
		  		<?php if(!Yii::$app->user->isGuest): ?>
		  		<div class="modal-body">
		  			<form id="eventForm" name="eventForm" onclick="Create">
		  			<input type="hidden" id="csrf" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
		  			<input type="hidden" id="coordsss" name="coords" value="" />
		  				<div class="row" style="margin-left: 10px;margin-right: 10px;">
							  <div class="form-group">
							    <label for="event_name" >Event Name:</label>
							    <input type="text" placeholder="Give name to your event" class="form-control" id="event_name" name="event_name">
							  </div>
							  <div class="form-group">
							    <label for="pwd">Description:</label>
							    <textarea rows="6" name="event_description" class="form-control"></textarea>
							  </div>
							  
						</div>
						<div class="row" style="margin-left: 0px;margin-right: 0px;">
							  <div class="form-group col-md-6">
							  	<div>
							    <label for="event_name">Organizer:</label>
							    <input type="text" disabled value="<?= $user->name . " " . $user->surname ?>" class="form-control" id="organizer" name="organizer">
							    </div>
							    <div style="margin-top: 15px;">
							    	<label for="event_name">Categories:</label>
								    <select name="category" class="form-control" style="">
									  <?php foreach ($categories as $category): ?>
  										<option name="<?= $category->id ?>" value="<?= $category->id ?>"><?= $category->title?></option>
									  <?php endforeach; ?>
									</select>
							    </div>
							    <div style="margin-top: 15px;">
							    <label for="date">Event date and time:</label>
							    	<?php
							    	
									echo DatePicker::widget([
										'inline' => false,
										'name' => 'date',
									        'clientOptions' => [
									            'autoclose' => true,
									            'format' => 'dd-M-yyyy',
									            'todayHighlight' => true
									        ]
									]);?>
							    </div>
							    <div style="margin-top: 15px;">
							    	<input type="time" class="form-control" name="time" />
							    </div>								    
							  </div>
							  <div class="form-group col-md-6">
								  
								  <div style="">
								    <label for="pwd">Address:</label>
								    <textarea rows="6" name="address" cols="50" class="form-control"></textarea>
								  </div>
								  <div style="margin-top: 15px;">
							    	<label for="participants">Number of Participants:</label>
							    	<input type="number" name="participants" class="form-control"  />
							    </div>
							  </div>
							  
						</div>
						<div class="modal-footer">
				          <a onclick = "Create()" class="createEventModButton" id="createEvent">Create</a>
				          <a class="closeEvent" id="closeEvent" data-dismiss="modal">Close</a>
				        </div>
					</form>
		  		</div>
		  		<?php else: ?>
		  			<div class="modal-body">
					<a href="" onclick="window.open('<?= $fbUrl ?>/frontend/web/auth?authclient=facebook', '_blank', 'location=yes,height=520,width=520,scrollbars=yes,status=yes')" style="background-color:transparent; border-color:transparent;"> 
					<img src="<?= Yii::getalias('@web') ?>/static/img/facebook.png" height="35"/>
					</a>
					</div>
					<?php endif; ?>

		  		</div>
			</div>
		</div>

		<div id="eventDetailsModal" class="modal fade" role="dialog">
		<div class="modal-dialog" style="">
		<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" style="text-align: center;">Event details</h4>
		  		</div>
		  		<?php if(!Yii::$app->user->isGuest): ?>
		  		<div class="modal-body">
		  			<form>
		  			<input type="hidden" id="event_id" name="event_id" value="" />
		  				<div class="row" style="margin-left: 10px;margin-right: 10px;">
							  <div class="form-group">
							    <label for="event_name">Event Name:</label>
							    <input type="text" disabled placeholder="Give name to your event" class="form-control" id="event_name_detail" name="event_name_detail">
							  </div>
							  <div class="form-group">
							    <label for="pwd">Description:</label>
							    <textarea rows="6" disabled id="event_description_detail" name="event_description_detail" class="form-control"></textarea>
							  </div>
							  
						</div>
						<div class="row" style="margin-left: 0px;margin-right: 0px;">
							  <div class="form-group col-md-6">
							  	<div>
							    <label for="event_name">Organizer:</label>
							    <input type="text" disabled value="<?= $user->name . " " . $user->surname ?>" class="form-control" id="organizer">
							    </div>
							    <div style="margin-top: 15px;">
							    	<label for="event_name">Categories:</label>
								    <input type="text" disabled value="" class="form-control" id="category">
							    </div>
							    <div style="margin-top: 15px;">
							    <label for="date">Event date and time:</label>
							    	<?php
							    	
									echo DatePicker::widget([
										'inline' => false,
										'name' => 'date',
										'id' => 'dateDetail',

									        'clientOptions' => [
									            'autoclose' => true,
									            'format' => 'dd-M-yyyy',
									            'todayHighlight' => true
									        ]
									]);?>
							    </div>
							    <div style="margin-top: 15px;">
							    	<input id="timeDetail" disabled class="form-control" name="time" />
							    </div>								    
							  </div>
							  <div class="form-group col-md-6">
								  
								  <div style="">
								    <label for="pwd">Address:</label>
								    <textarea rows="6" disabled id="event_address_detail" name="address" cols="50" class="form-control"></textarea>
								  </div>
								  <label style="margin-top: 15px;" for="participants">Participants:</label>
								  <div style="margin-top: 4px;">
							    	<input style="width:50px;float: left;" disabled id="quota" name="quota" class="form-control"  />
							    	<span style="margin-left: 2px;float: left;font-size: 20px;">/</span>
							    	<input style="margin-left: 5px;width:50px;float: left;" disabled id="numOfPart" name="participants" class="form-control"  />
							      </div>

						      


							  </div>
							  
						</div>
						<div class="modal-footer">
				          <a onclick = "Join()" class="createEventModButton" id="createEvent">Join</a>
				          <a class="closeEvent" id="closeEvent" data-dismiss="modal">Close</a>
				        </div>
					</form>
		  		</div>
		  		<?php else: ?>
		  			<div class="modal-body">
					<a href="" onclick="window.open('<?= $fbUrl ?>/frontend/web/auth?authclient=facebook', '_blank', 'location=yes,height=520,width=520,scrollbars=yes,status=yes')" style="background-color:transparent; border-color:transparent;"> 
					<img src="<?= Yii::getalias('@web') ?>/static/img/facebook.png" height="35"/>
					</a>
					</div>
					<?php endif; ?>

		  		</div>
			</div>
		</div>
</nav>

<?= $content; ?>

<footer class="container-fluid text-center">
  
</footer>


<?php $this->endBody() ?>

</body>
<?php $this->registerJs("<script>"+
        "$(document).ready(function(){"+
            "$('#w0').authchoice();"+
        "});"+
    "</script>",\yii\web\View::POS_END);
?>

<script>
    
    function Create() {
		var checkBool = true;
		var result="";
			var evnm = document.forms["eventForm"]["event_name"].value;
			var evdsc = document.forms["eventForm"]["event_description"].value;
			var calendar = document.forms["eventForm"]["w0"].value;
			var hour = document.forms["eventForm"]["time"].value;
			var address = document.forms["eventForm"]["address"].value;
			var participants = document.forms["eventForm"]["participants"].value;
			
			
			
			
			if (evnm == "") {
				result+= "-Event name is Empty,please fill it \n"
        
			} 
			if (evdsc == "") {
				result+= "-Event Description is Empty,please fill it \n"
        
			}
			
			if (calendar == "") {
				result+= "-You have not choosen the date,please choose it \n"
        
			}
			if (hour == "") {
				result+= "-You did not select the exact time of meeting,please select it \n"
        
			}
			if (address == "") {
				result+= "-Address can not be empty,please fill it \n"
        
			}
			if (participants == "") {
				result+= "-Declare the limit of meeting \n"
        
			}
			if(result != ""){
			alert(result);
			}
			else{
    	var form = $("#eventForm").serialize();
    	
        
        var csrf = $("#csrf").val();
        //alert(form);
        var data = form
        $.ajax({
            url: 'index',
            data: data,
            type: 'post',
            datatype: 'json',
            success: function (json_data) {
            	if (json_data == 1)
            	{
            		alert("New event has been created successfully");
					document.forms["eventForm"]["event_name"].value="";
					document.forms["eventForm"]["event_description"].value="";
					document.forms["eventForm"]["w0"].value="";
					document.forms["eventForm"]["time"].value="";
					document.forms["eventForm"]["address"].value="";
					document.forms["eventForm"]["participants"].value="";
            		$('#createEventModal').modal('hide');
            		location.reload();
            	}
            	
            }
        });
			}
    }

     function Join() {

    	var event_id = $("#event_id").val();
    	var qty = parseInt($("#quota").val());
    	var participants = parseInt($("#numOfPart").val());
    	
        if(qty >= participants)
        {
        	alert("Unfortunately, there are max number of participants");
        }
        else
        {
        	var data = 
        	{
        		'event_id': event_id,
        	}

        	$.ajax({
	            url: 'join',
	            data: data,
	            type: 'post',
	            datatype: 'json',
	            success: function (json_data) {
	            	if (json_data == 0)
	            	{
	            		alert("You have already registered for this event");
	            		$('#eventDetailsModal').modal('hide');
	            	}
	            	else if (json_data == 1)
	            	{
	            		alert("You have successfully registered");
	            		$('#eventDetailsModal').modal('hide');

	            	}

	            }
	        });
        }
        //var data = form
        

    }

</script>
<script type="text/javascript">
	
	$(document).ready(function(){
	    $("a#join").click(function(){
	        $('#myModalMap').modal('hide');
	        $('#eventDetailsModal').modal('show');
	    });

	    $("a#create").click(function(){
	        $('#myModalMap').modal('hide');
	        $('#createEventModal').modal('show');
	    });

	});
	
		
		

</script>


</html>
<?php $this->endPage() ?>
