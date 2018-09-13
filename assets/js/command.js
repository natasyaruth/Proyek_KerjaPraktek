$(document).ready(function(){
  $.ajax({
    url: "http://localhost/chart/database/command_all.php",
    method: "GET",
    success: function(data) { //data = objek variabel penampung dari query yg digunakan 
      console.log(data);
      var trans = [];
      var param = [];

      for(var i in data) {
        trans.push(data[i].sum);
        param.push(data[i].parameter);
      }

      var chartdata = {
        labels: param,
        datasets : [
          {
            label: "Jumlah Transaksi Command",
            backgroundColor: ["#3e95cd","#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
            data: trans
          }
        ]
      };

      var ctx = $("#command_all-chart");

      var barGraph = new Chart(ctx, {
        type: 'pie',
        data: chartdata
      });
    },
    error: function(data) {
      console.log(data);
    }
  });    
});