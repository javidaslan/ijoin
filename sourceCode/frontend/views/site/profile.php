<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\User;


$user = User::findOne(Yii::$app->user->getId());

$this->title = $user->name . " " . $user->surname;


Yii::$app->view->registerMetaTag(['property' => 'og:type','content' => 'article']);
Yii::$app->view->registerMetaTag(['property' => 'og:title','content' => 'iJoin']);
Yii::$app->view->registerMetaTag(['property' => 'og:description','content' => 'iJoin']);
Yii::$app->view->registerMetaTag(['property' => 'og:url','content' => '#']);
//Yii::$app->view->registerMetaTag(['property' => 'og:image','content' => Yii::$app->request->getHostInfo().$post->image]);

$imgUrl = "http://graph.facebook.com/" . $user->username . "/picture?width=640&height=480";
//var_dump($imgUrl);die();


?>
<!-- Page Container -->
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card-2">
    <a href="<?= Url::to(['index']) ?>" class="w3-bar-item w3-button"><b>IJoin</b></a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="<?= Url::to(['index']) ?>" class="w3-bar-item w3-button">Main Page</a>
      <a href="<?= Url::to(['logout']) ?>" class="w3-bar-item w3-button">Logout</a>
    </div>
  </div>
</div>
<br><br><br>
<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-quarter">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img src=<?= $imgUrl ?> style="width:100%" alt="Avatar">
          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h2 style="color: white"><?= $user->name . " " . $user->surname ?></h2>
          </div>
        </div>
        
        
      </div><br>
     <div class="w3-card-4">
    <div class="w3-container w3-blue">
    <h4>How is your day today?</h4>
    </div>
    <input class="w3-input" type="text" placeholder="Type here...">
   </div>
      <br>
       <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small" style="background-color: skyblue">
        
        </span>
        <p style="padding-top: 10px;"><strong>Hey!</strong></p>
        <p>Today my day is awesome!</p>
      </div>  
          
          
    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <!-- Modal -->
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-top">
    <header class="w3-container w3-theme-l1"> 
      <span onclick="document.getElementById('id01').style.display='none'"
      class="w3-button w3-display-topright">×</span>
      <h4>Events</h4>
    </header>
    <div class="w3-padding">
      <p>test</p>
      
    </div>
    <footer class="w3-container w3-theme-l1">
      <p>Modal footer</p>
    </footer>
    </div>
  </div>


    <div class="w3-twothird">
    <header class="w3-container w3-blue-grey">
    <h2 style="text-align: center">Events</h2>
    </header><br>
    <!-- Pricing Tables -->
    <div class="w3-row-padding" style="margin:0 -16px">

      <div class="w3-half w3-margin-bottom">
        <ul class="w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off">
          <li class="w3-red w3-xlarge w3-padding-32">Created by me</li>
          <input type="text" id="myInput1" class="form-control" onkeyup="myEventsSearch()" placeholder="Search for names.." title="Type in a name" style="margin-bottom: 13px;margin-top: 13px;">
          <ul id="myEvents">
            <?php for ($i = 0; $i < count($myEvents); $i++): ?>
                <li><a onclick="populateModal(<?= $myEvents[$i]->event->id ?>)"><?= $myEvents[$i]->event->title ?></a></li>
            <?php endfor; ?>
          </ul>      
        </ul>
      </div>
      
      
      
      <div class="w3-half">
        <ul class="w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off">
          <li class="w3-blue w3-xlarge w3-padding-32">I joined</li>
          <input type="text" class="form-control" id="myInput3" onkeyup="upcomingSearch()" placeholder="Search for events.." title="Type in a name" style="margin-bottom: 13px;margin-top: 13px;">
          <ul id="upcoming">
            <?php for ($i = 0; $i < count($joinedEvents); $i++): ?>
                <li><a onclick="populateModalJoin(<?= $joinedEvents[$i]->event->id ?>)"><?= $joinedEvents[$i]->event->title ?></a></li>
            <?php endfor; ?>
          </ul> 
      </div>
      <?php for ($i = 0; $i < count($joinedEvents); $i++): ?>
            <p class="events" style="display: none;">
                <?= $joinedEvents[$i]->event->title ?>,
                <?= $joinedEvents[$i]->event->lng ?>,
                <?= $joinedEvents[$i]->event->ltd ?>,
                <?= $joinedEvents[$i]->event->description ?>,
                <?= $joinedEvents[$i]->event->user->name ?>,
                <?= $joinedEvents[$i]->event->user->surname ?>,
                <?= $joinedEvents[$i]->event->address ?>,
                <?= $joinedEvents[$i]->event->date ?>,
                <?= $joinedEvents[$i]->event->numOfPart ?>,
                <?= $joinedEvents[$i]->event->quota ?>,
                <?= $joinedEvents[$i]->event->category->title ?>,
                <?= $joinedEvents[$i]->event->id ?>,
                <?= $joinedEvents[$i]->event->time ?>,
                <?= $joinedEvents[$i]->admin ?>
            </p>
      <?php endfor; ?>
    </div>
  </div>
  
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>

<script type="text/javascript">
  
  

  function populateModal(ind)
  {
    var events = [];

      $("p.events").each(function(){

         events.push($(this).text().split(","));
            
        });
      
      //alert(events[0]);
      var str, i;

      for (i = 0; i < events.length; i++)
      {
        if (events[i][11] == ind) str = events[i];
      }

      $("#event_name_detail").val(str[0].trim());
      $("#event_description_detail").val(str[3].trim());
      $("#organizer").val(str[4] + " " + str[5]);
      $("#event_address_detail").val(str[6].trim());
      $("#numOfPart").val(str[8].trim());
      $("#quota").val(str[9].trim());
      $("#category").val(str[10].trim());
      $("#dateDetail").val(str[7].trim());
      $("#dateDetail").prop('disabled', true);
      $("#timeDetail").val(str[12].trim());
      $("#event_id").val(str[11].trim());
      $("#event_admin").val(str[13].trim());

      $('#eventDetailsModal').modal('show');

  }

</script>

<script type="text/javascript">
  
  

  function populateModalJoin(ind)
  {
    var events = [];

      $("p.events").each(function(){

         events.push($(this).text().split(","));
            
        });
      
      //alert(events[0]);
      var str, i;

      for (i = 0; i < events.length; i++)
      {
        if (events[i][11] == ind) str = events[i];
      }

      $("#event_name_detailJ").val(str[0].trim());
      $("#event_description_detailJ").val(str[3].trim());
      $("#organizerJ").val(str[4] + " " + str[5]);
      $("#event_address_detailJ").val(str[6].trim());
      $("#numOfPartJ").val(str[8].trim());
      $("#quotaJ").val(str[9].trim());
      $("#categoryJ").val(str[10].trim());
      $("#dateDetailJ").val(str[7].trim());
      $("#dateDetailJ").prop('disabled', true);
      $("#timeDetailJ").val(str[12].trim());
      $("#event_id").val(str[11].trim());
      $("#event_adminJ").val(str[13].trim());

      $('#eventDetailsModalJoin').modal('show');

  }

</script>