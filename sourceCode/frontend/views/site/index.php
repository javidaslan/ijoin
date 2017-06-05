<?php

use yii\helpers\Html;

$this->title = 'iJoin';


Yii::$app->view->registerMetaTag(['property' => 'og:type','content' => 'article']);
Yii::$app->view->registerMetaTag(['property' => 'og:title','content' => 'iJoin']);
Yii::$app->view->registerMetaTag(['property' => 'og:description','content' => 'iJoin']);
Yii::$app->view->registerMetaTag(['property' => 'og:url','content' => '#']);
//Yii::$app->view->registerMetaTag(['property' => 'og:image','content' => Yii::$app->request->getHostInfo().$post->image]);


?>
  
  <!-- Get started -->
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel" style="margin-top: 60px;">
    <!-- Indicators -->
  
   

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
    
      <div class="item active">
    
        <img src="<?= Yii::getalias('@web') ?>/static/img/sld2-min.jpg"style="width:100%">
       </div>
      <div class="item">
    
       <img src="<?= Yii::getalias('@web') ?>/static/img/sld3-min.jpg" style="width:100%">
       
      </div>
    
      
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="color:#7ba6ed; ! important"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" style="color:#7ba6ed; ! important" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


<!-- google Map -->
<!-- Add Google Maps -->
<div id="eventMap"  class="text-center" style="padding-top: 12px">

<div id="mapHeader" style = "background-color: #7ba6ed; !important height"><h3 style="padding-top:5px;color:white; !important" > Search for active events </h3></div>
<div id="googleMap" style="height:600px;width:100%;"></div>

</div>

<div id="dist" style = "width:100%; height:30px; background-color:white"></div>
<div id="about" class="container-fluid text-center bg-grey" >
  <div class="row ">
    <div class="col-sm-12" >
      <h2>About Developers</h2><br>
    <div class="row col-centered">
      
       <div class="col-sm-4">
      <div class="card">
      <img class="card-img-top img-circle grayscale" src="<?= Yii::getalias('@web') ?>/static/img/Javid.jpg" alt="Card image cap">
        <div class="card-block">
        <h3 class="card-title">Javid Aslanov</h3>
        
      
        </div>
      </div>
      </div>
       <div class="col-sm-4">
      <div class="card" style="">
      <img class="card-img-top img-circle grayscale" src="<?= Yii::getalias('@web') ?>/static/img/Firuz.jpg" alt="Card image cap">
        <div class="card-block">
        <h3 class="card-title">Firuz Mammadov</h3>
        
        
        </div>
      </div>
      </div>
      <div class="col-sm-4">
      <div class="card">
      <img class="card-img-top img-circle grayscale" src="<?= Yii::getalias('@web') ?>/static/img/Yerba.jpg" alt="Card image cap">>
        <div class="card-block">
        <h3 class="card-title">Yerbolat Tashkiyev</h3>
        
        </div>
      </div>
      </div>
    </div>
    </div>  
  </div>
</div>
<div id="dist" style = "width:100%; height:30px; background-color:white"></div>
<!-- Container (Contact Section) -->
<footer class="container-fluid text-center bg-grey">

  <div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker" style="color:#7ba6ed;"></span> Budapest, Hungary</p>
      <p>
        <span class="glyphicon glyphicon-phone" style="color:#7ba6ed;"></span> +36 20 321 4024
        <span class="glyphicon glyphicon-phone" style="margin-left: 10px;color:#7ba6ed;"></span> +36 20 243 5167
      </p>
      <p>
        <span class="glyphicon glyphicon-envelope"  style="color:#7ba6ed;"></span> support@ijoin.online
      </p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
</div>
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"  style="color:#7ba6ed;"></span>
  </a>
  <!-- Some data which is not sensitive but hidden in order to pass Javascript -->
  <?php foreach ($events as $event): ?>
    <p class="events" style="display: none;">
    <?= $event->title ?>,
    <?= $event->lng ?>,
    <?= $event->ltd ?>,
    <?= $event->description ?>,
    <?= $event->user->name ?>,
    <?= $event->user->surname ?>,
    <?= $event->address ?>,
    <?= $event->date ?>,
    <?= $event->numOfPart ?>,
    <?= $event->quota ?>,
    <?= $event->category->title ?>,
    <?= $event->id ?>,
    <?= $event->time ?>
 
    </p>
  <?php endforeach; ?>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>


<!-- This javascript should be here in order to work properly -->
<script>


    
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.watchPosition(showPosition);
        }
    }

    function showPosition(position) {

      var locations = [
        ['Your location',position.coords.latitude,position.coords.longitude,-1]
      ];


      $("p.events").each(function(){
        var str = $(this).text().split(",");
          locations.push([str[0],str[1],str[2],str[11]]);
      });
     

      var infowindow = new google.maps.InfoWindow();
      var marker, i;
      

      var myCenter = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
      var mapProp = {center:myCenter, zoom:12, scrollwheel:false, draggable:true, mapTypeId:google.maps.MapTypeId.ROADMAP};

      var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
      var marker = new google.maps.Marker({
        position:myCenter,
        title:"Click to view inf!"
      });

      for (i = 0; i < locations.length; i++) {  

        marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[i][1], locations[i][2]),
          map: map
        });
        //alert(marker['position']);
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            infowindow.setContent(locations[i][3]);
            //infowindow.open(map, marker);
            <?php if(!Yii::$app->user->isGuest): ?>
              $('#myModalMap').modal('show');
              <?php else: ?>
                  $('#myModal').modal('show');
              <?php endif; ?>
            $("#coordsss").val(this.getPosition().lat() + "," +this.getPosition().lng());

            populateModal(locations[i][3]);
          }
        })(marker, i));
      }

      marker.setMap(map);
       google.maps.event.addListener(map, 'click', function(event) {

          $("#coordsss").val(event.latLng.lat() + "," +event.latLng.lng());
          <?php if(!Yii::$app->user->isGuest): ?>
              $('#createEventModal').modal('show');
          <?php else: ?>
              $('#myModal').modal('show');
          <?php endif; ?>
          //alert(event.latLng.lng());

      });
      

        
    }

    getLocation();
  
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsubPP1BvhhImKMNUydhsSnpyuVzLo73U&callback=showPosition"></script>

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
      //alert(str[11].trim());

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

  }

</script>