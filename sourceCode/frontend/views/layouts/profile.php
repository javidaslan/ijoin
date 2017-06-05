<?php

/* @var $this \yii\web\View */
/* @var $content string */
//test change
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\models\User;
use dosamigos\datepicker\DatePicker;
use backend\models\Category;


if(!\Yii::$app->user->isGuest)
{
   
  $user = User::findOne(Yii::$app->user->getId());
  $categories = Category::find()->all();
  //var_dump($user);die();
}

?>
<!DOCTYPE html>
<html>
<title><?= Html::encode($this->title) ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
a 
{
  cursor: pointer;
}
</style>
<style>
* {
  box-sizing: border-box;
}

#myInput1, ##myInput2, #myInput3 {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myEvents, #history, #upcoming {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myEvents li a, #history li a, #upcoming li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myEvents li a.header, #history li a.header, #upcoming li a.header {
  background-color: #e2e2e2;
  cursor: default;
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
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
      border: solid #7ba6ed;
      cursor: pointer;
      margin-left:80px;
      width:150px;
     
      
      
    }

    .createEvent:hover {
      background: #f0af7a;
        text-decoration: none;
    }

</style>
<body class="w3-light-grey">

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card-2">
    <a href="#home" class="w3-bar-item w3-button"><b>Logo</b></a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="#projects" class="w3-bar-item w3-button">Settings</a>
      <a href="#about" class="w3-bar-item w3-button">About</a>
      <a href="#contact" class="w3-bar-item w3-button">Contact</a>
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
          <div class="modal-body">
            <form>
            <input type="hidden" id="event_id" name="event_id" value="" />

              <div class="row" style="margin-left: 10px;margin-right: 10px;">
                <div class="form-group">
                  <label for="event_name">Event Name:</label>
                  <input type="text" disabled="" placeholder="Give name to your event" class="form-control" id="event_name_detail" name="event_name_detail">
                </div>
                <div class="form-group">
                  <label for="pwd">Description:</label>
                  <textarea rows="6" disabled="" id="event_description_detail" name="event_description_detail" class="form-control"></textarea>
                </div>
                
            </div>
            <div class="row" style="margin-left: 0px;margin-right: 0px;">
                <div class="form-group col-md-6">
                  <div>
                  <label for="event_name">Organizer:</label>
                  <input type="text" disabled value="<?= trim($user->name) . " " . trim($user->surname) ?>" class="form-control" id="organizer">
                  </div>
                  <div style="margin-top: 15px;">
                    <label for="event_name">Category:</label>
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
                  <a class="btn btn-default" id="closeEvent" data-dismiss="modal">Close</a>
                </div>
          </form>
          </div>

          </div>
      </div>
    </div>

<div id="eventDetailsModalJoin" class="modal fade" role="dialog">
    <div class="modal-dialog" style="">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align: center;">Event details</h4>
          </div>
          <div class="modal-body">
            <form>
            <input type="hidden" id="event_id" name="event_id" value="" />
            
              <div class="row" style="margin-left: 10px;margin-right: 10px;">
                <div class="form-group">
                  <label for="event_name">Event Name:</label>
                  <input type="text" disabled placeholder="Give name to your event" class="form-control" id="event_name_detailJ" name="event_name_detail">
                </div>
                <div class="form-group">
                  <label for="pwd">Description:</label>
                  <textarea rows="6" disabled id="event_description_detailJ" name="event_description_detail" class="form-control"></textarea>
                </div>
                
            </div>
            <div class="row" style="margin-left: 0px;margin-right: 0px;">
                <div class="form-group col-md-6">
                  <div>
                  <label for="event_name">Organizer:</label>
                  <input type="text" disabled value="<?= $user->name . " " . $user->surname ?>" class="form-control" id="organizerJ">
                  </div>
                  <div style="margin-top: 15px;">
                    <label for="event_name">Category:</label>
                    <input type="text" disabled value="" class="form-control" id="categoryJ">
                  </div>
                  <div style="margin-top: 15px;">
                  <label for="date">Event date and time:</label>
                    <?php
                    
                  echo DatePicker::widget([
                    'inline' => false,
                    'name' => 'date',
                    'id' => 'dateDetailJ',

                          'clientOptions' => [
                              'autoclose' => true,
                              'format' => 'dd-M-yyyy',
                              'todayHighlight' => true
                          ]
                  ]);?>
                  </div>
                  <div style="margin-top: 15px;">
                    <input id="timeDetailJ" disabled class="form-control" name="time" />
                  </div>                    
                </div>
                <div class="form-group col-md-6">
                  
                  <div style="">
                    <label for="pwd">Address:</label>
                    <textarea rows="6" disabled id="event_address_detailJ" name="address" cols="50" class="form-control"></textarea>
                  </div>
                  <label style="margin-top: 15px;" for="participants">Participants:</label>
                  <div style="margin-top: 4px;">
                    <input style="width:50px;float: left;" disabled id="quotaJ" name="quota" class="form-control"  />
                    <span style="margin-left: 2px;float: left;font-size: 20px;">/</span>
                    <input style="margin-left: 5px;width:50px;float: left;" disabled id="numOfPartJ" name="participants" class="form-control"  />
                    </div>

                  


                </div>
                
            </div>
            <div class="modal-footer">
                  <a class="btn btn-danger" onclick="Unsubscribe()">Unsubscribe</a>
                  <a class="btn btn-default" id="closeEvent" data-dismiss="modal">Close</a>
                </div>
          </form>
          </div>

          </div>
      </div>
    </div>


<br><br><br>

<?= $content; ?>

<footer class="w3-container w3-teal w3-center w3-margin-top">
  <p>iJoin</p>
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  
</footer>

</body>
<script>
function myEventsSearch() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput1");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myEvents");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
}
function historySearch() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput2");
    filter = input.value.toUpperCase();
    ul = document.getElementById("history");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
}
function upcomingSearch() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput3");
    filter = input.value.toUpperCase();
    ul = document.getElementById("upcoming");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
}


function Unsubscribe()
{
  if (confirm('Are you sure you want to cancel participation this event?')) {

    var event_id = $("#event_id").val();

    var data = {'event_id': event_id};

    $.ajax({
          url: 'delete',
          data: data,
          type: 'post',
          datatype: 'json',
          success: function (json_data) {
            if (json_data == 0)
            {
              alert("Your participation has been successfully cancelled.");
              //location.reload();

            }
            
          }
      });

  } else {
      alert("no");
  }
}

</script>
</html>
