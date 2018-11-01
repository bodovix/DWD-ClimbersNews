$(function() {
  $(document).on('click','#redOff',function () {
      $.ajax({
          type: "POST",
          url: 'https://agent.electricimp.com/Dt8DLEVLvk8W?state=0'
      });
  });
  $(document).on('click','#redOn',function () {
      $.ajax({
          type: "POST",
          url: 'https://agent.electricimp.com/Dt8DLEVLvk8W?state=1'
      });
  });
  $(document).on('click','#greenOff',function () {
      $.ajax({
          type: "POST",
          url: 'https://agent.electricimp.com/Dt8DLEVLvk8W?state=2'
      });
  });
  $(document).on('click','#greenOn',function () {
      $.ajax({
          type: "POST",
          url: 'https://agent.electricimp.com/Dt8DLEVLvk8W?state=3'
      });
  });

});
