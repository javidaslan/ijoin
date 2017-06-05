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