
    $(document).ready(function(){
      $("#randomizeData").click(function(){
          var tanggals1 = $('#tg1').val();
          var tanggals2 = $('#tg2').val();
      $.ajax({
        url: "http://localhost/new_chart/database/page1_summary_hourly.php",
        data:"tanggal=" + tanggals1 + "&tanggal2=" + tanggals2,
        type: "POST",
        dataType: 'json',
        cache: false,
        success: function(data) { //data = objek variabel penampung dari query yg digunakan 
          console.log(data);
          var toth1 = [];
          var toth2 = [];
          var avgh1 = [];
          var avgh2 = [];
          var growthOrReduce = [];
          var tgl1 = [];
          var tgl2= [];
         

           for(var i in data){
            toth1.push(data[i].TotalHour1);
            toth2.push(data[i].TotalHour2);
            avgh1.push(data[i].AverageHour1);
            avgh2.push(data[i].AverageHour2);
            tgl1.push(data[i].tg1);
            tgl2.push(data[i].tg2);
            growthOrReduce.push(data[i].Percentage_Growth_Reduce);
          }

          function mFormatter(num) {
            return num > 999999 ? (num/1000000).toFixed(1) +" "+ 'M' : num
          }

          function convertDate(inputFormat) {
              function pad(s) { return (s < 10) ? '0' + s : s; }
                var d = new Date(inputFormat);
                return [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('-');
          }

          // FOR HOURLY
          document.getElementById("total_h1").innerHTML =
          "Total of Transaction in"+" "+(convertDate(tgl1))+" = "+(mFormatter(toth1));
          document.getElementById("total_h2").innerHTML =
          "Total of Transaction in"+" "+(convertDate(tgl2))+" = "+(mFormatter(toth2));
          document.getElementById("rata_h1").innerHTML =
          "Average of Transaction in"+" "+(convertDate(tgl1))+" = "+avgh1;
          document.getElementById("rata_h2").innerHTML =
          "Average of Transaction in"+" "+(convertDate(tgl2))+" = "+avgh2;
           document.getElementById("date").innerHTML =
           "From "+(convertDate(tgl2));
            document.getElementById("percentage").innerHTML = growthOrReduce+" "+"%";
          
        },
         error: function(xhr,err){
              /*alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
              alert("responseText: "+xhr.responseText);*/
            }
      });
    });
      });

    $(document).ready(function(){
        $("#randomizeData").click(function(){
          var tanggals1 = $('#tg1').val();
          var tanggals2 = $('#tg2').val();
          // alert("Berhasil I");
          // alert(tanggals1);
          // alert(tanggals2);
          $.ajax({
            url: "http://localhost/new_chart/database/page1_hourly.php",
            data:"tanggal=" + tanggals1 + "&tanggal2=" + tanggals2,
            type: "POST",
            dataType: 'json',
            cache: false,
            success:function(msg){ //data = objek variabel penampung dari query yg digunakan 
              /*alert("Berhasil II");*/
              
              var trans = [];
              var tgl = [];
              var trans2 = [];
              var tgl2 = [];
              var jam = [];
              var prem_trans = [];
              var prem_tgl = [];
              var prem_trans2 = [];
              var prem_tgl2 = [];
              var massive_trans = [];
              var massive_tgl = [];
              var massive_trans2 = [];
              var massive_tgl2 = [];

              for(var i in msg) {
                trans.push(msg[i].sum1);
                tgl.push(msg[i].tanggal);
                trans2.push(msg[i].sum2);
                tgl2.push(msg[i].tanggal2);
                jam.push(msg[i].jam1);
                prem_trans.push(msg[i].prem_sum1);
                prem_tgl.push(msg[i].prem_tgl1);
                prem_trans2.push(msg[i].prem_sum2);
                prem_tgl2.push(msg[i].prem_tgl2);
                massive_trans.push(msg[i].massive_sum1);
                massive_tgl.push(msg[i].massive_tgl1);
                massive_trans2.push(msg[i].massive_sum2);
                massive_tgl2.push(msg[i].massive_tgl2);
                
              }

              function convertDate(inputFormat) {
                function pad(s) { return (s < 10) ? '0' + s : s; }
                  var d = new Date(inputFormat);
                  return [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('-');
              }

              var barGraph = new Chart(document.getElementById("chart-hourly"), {
                    type: 'bar',
                    data: {
                    labels: jam,
                    datasets: [{
                          label: ""+(convertDate(tgl[0])),
                          type: "line",
                          borderColor: window.chartColors.red,
                          borderWidth: 2,
                          data: trans,
                          fill: false
                         },
                         {
                          label: ""+(convertDate(tgl2[0])),
                          type: "bar",
                          backgroundColor: window.chartColors.green,
                          data: trans2
                         }   
                        ]
                      },
                    options: {
                     responsive: true,
                    title: {
                        display: false,
                        text: ''
                        },
                    tooltips: {
                        mode: 'index',
                        intersect: true
                      },
                    legend: { display: true }
              }
              });

              var barGraph2 = new Chart(document.getElementById("prem-chart-hourly"), {
                    type: 'bar',
                    data: {
                    labels: jam,
                    datasets: [{
                          label: ""+(convertDate(prem_tgl[0])),
                          type: "line",
                          borderColor: window.chartColors.red,
                          borderWidth: 2,
                          data: prem_trans,
                          fill: false
                         },
                         {
                          label: ""+(convertDate(prem_tgl2[0])),
                          type: "bar",
                          backgroundColor: window.chartColors.green,
                          data: prem_trans2
                         }   
                        ]
                      },
                    options: {
                     responsive: true,
                    title: {
                        display: false,
                        text: ''
                        },
                    tooltips: {
                        mode: 'index',
                        intersect: true
                      },
                    legend: { display: true }
              }
              });

              var barGraph3 = new Chart(document.getElementById("massive-chart-hourly"), {
                    type: 'bar',
                    data: {
                    labels: jam,
                    datasets: [{
                          label: ""+(convertDate(prem_tgl[0])),
                          type: "line",
                          borderColor: window.chartColors.red,
                          borderWidth: 2,
                          data: massive_trans,
                          fill: false
                         },
                         {
                          label: ""+(convertDate(prem_tgl2[0])),
                          type: "bar",
                          backgroundColor: window.chartColors.green,
                          data: massive_trans2
                         }   
                        ]
                      },
                    options: {
                     responsive: true,
                    title: {
                        display: false,
                        text: ''
                        },
                    tooltips: {
                        mode: 'index',
                        intersect: true
                      },
                    legend: { display: true }
              }
              });
                /*barGraph.destroy();*/
                /*barGraph.data.datasets[0].msg = trans;
                barGraph.data.datasets[1].msg = trans2;*/
                barGraph.update();
                barGraph2.update();
                barGraph3.update();
            },
            error: function(xhr,err){
              /*alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
              alert("responseText: "+xhr.responseText);*/
            }
          });
          /*alert("STEP III");*/
        });
      });

    /*$(document).ready(function(){
      $.ajax({
        url: "http://localhost/new_chart/database/page1_hourly.php",
        method: "GET",
        success: function(data) { //data = objek variabel penampung dari query yg digunakan 
          console.log(data);
          var trans = [];
          var tgl = [];
          var trans2 = [];
          var tgl2 = [];

          for(var i in data) {
            trans.push(data[i].sum1);
            tgl.push(data[i].tanggal);
            trans2.push(data[i].sum2);
            tgl2.push(data[i].tanggal2);
          }

          function convertDate(inputFormat) {
              function pad(s) { return (s < 10) ? '0' + s : s; }
                var d = new Date(inputFormat);
                return [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('-');
          }

          var barGraph = new Chart(document.getElementById("chart-hourly"), {
                    type: 'bar',
                    data: {
                    labels: ["00:00 AM", "01:00 AM","02:00 AM","03:00 AM","04:00 AM",
                            "05:00 AM","06:00 AM","07:00 AM","08:00 AM","09:00 AM","10:00 AM",
                            "11:00 AM","12:00 PM","13:00 PM","14:00 PM","15:00 PM","16:00 PM",
                            "17:00 PM","18:00 PM","19:00 PM","20:00 PM","21:00 PM","22:00 PM",
                            "23:00 PM"],
                    datasets: [{
                                label: ""+(convertDate(tgl[0])),
                                type: "line",
                                borderColor: window.chartColors.red,
                                borderWidth: 2,
                                data: trans,
                                fill: false
                               },
                               {
                                label: ""+(convertDate(tgl2[0])),
                                type: "bar",
                                backgroundColor: window.chartColors.green,
                                data: trans2
                               }   
                              ]
                          },
                    options: {
                       responsive: true,
                    title: {
                            display: false,
                            text: ''
                            },
                    tooltips: {
                            mode: 'index',
                            intersect: true
                        },
                    legend: { display: true }
          }
        });
           document.getElementById('randomizeData').addEventListener('click', function() {
            barGraph.data.datasets[0].data = trans;
            barGraph.data.datasets[1].data = trans2;
            barGraph.update();
          });
        },
        error: function(data) {
          console.log(data);
        }
      });
    });*/


    $(document).ready(function(){
      $.ajax({
        url: "http://localhost/new_chart/database/page1_summary_weekly.php",
        method: "GET",
        cache: false,
        success: function(data) { //data = objek variabel penampung dari query yg digunakan 
          console.log(data);
          var tot1 = [];
          var tot2 = [];
          var avg1 = [];
          var avg2 = [];
          var g_r = [];
          

          for(var i in data){
            tot1.push(data[i].TotalWeek1);
            tot2.push(data[i].TotalWeek2);
            avg1.push(data[i].AverageWeek1);
            avg2.push(data[i].AverageWeek2);
            g_r.push(data[i].growth_reduce);
          }


          function mFormatter(num) {
            return num > 999999 ? (num/1000000).toFixed(1) +" "+ 'M' : num
          }

          /*function addIntegers() {
            var displayObj = document.getElementById("growth");
            displayObj.innerHTML = g_r+" "+"%"; 
            if (g_r < 0){
               displayObj.style.color = "red";
            }
            else {
              displayObj.style.color = "green";
            }
          }*/

          // FOR WEEKLY
          document.getElementById("total1").innerHTML = 
          "Total of Transaction This Week = "+(mFormatter(tot1));
          document.getElementById("total2").innerHTML = 
          "Total of Transaction Last Week = "+mFormatter(tot2);
          document.getElementById("rata1").innerHTML  = 
          "Average of Transaction This Week = "+avg1;
          document.getElementById("rata2").innerHTML  = 
          "Average of Transaction Last Week = "+avg2;
          document.getElementById("growth").innerHTML = g_r+" "+"%";
        }
      });
    });

    $(document).ready(function(){
      $("#randomizeWeek").click(function(){
          var weeks1 = $('#w1').val();
          var weeks2 = $('#w2').val();
          alert("Berhasil I");
          alert(weeks1);
          alert(weeks1);
      $.ajax({
        url: "http://localhost/new_chart/database/page1_weekly.php",
        data:"minggu1=" + weeks1 + "&minggu2=" + weeks2,
            type: "POST",
            dataType: 'json',
            cache: false,
        success: function(msg) { //data = objek variabel penampung dari query yg digunakan 
          var trans = [];
          var tgl = [];
          var trans2 = [];
          var tgl2 = [];

          for(var i in msg) {
            trans.push(msg[i].sum);
            tgl.push(msg[i].minggu1);
            trans2.push(msg[i].sum2);
            tgl2.push(msg[i].minggu2);
          }

          var barGraph = new Chart(document.getElementById("chart-weekly"), {
                    type: 'bar',
                    data: {
                    labels: ["Day-1","Day-2","Day-3","Day-4","Day-5","Day-6","Day-7"],
                    datasets: [{
                                label: ""+tgl[0],
                                type: "line",
                                borderColor: window.chartColors.red,
                                borderWidth: 3,
                                data: trans,
                                fill: true
                               },
                               {
                                label: ""+tgl[1],
                                type: "bar",
                                backgroundColor: window.chartColors.green,
                                data: trans2
                               }   
                              ]
                          },
                    options: {
                    title: {
                            display: false,
                            text: ''
                            },
                    tooltips: {
                            mode: 'index',
                            intersect: true
                        },
                    legend: { display: true }
            }
          });
              barGraph.update();
          },
            error: function(xhr,err){
                alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
                alert("responseText: "+xhr.responseText);
            }
          });
            alert("STEP III");
        });
     });


    $(document).ready(function(){
      $.ajax({
        url: "http://localhost/new_chart/database/page1_summary_monthly.php",
        method: "GET",
        cache: false,
        success: function(data) { //data = objek variabel penampung dari query yg digunakan 
          console.log(data);
          var totm1 = [];
          var totm2 = [];
          var g_r = [];

           for(var i in data){
            totm1.push(data[i].TotalCurrentMonth);
            totm2.push(data[i].TotalLastMonth);
            g_r.push(data[i].Percentage_Growth_Reduce);
          }

          function mFormatter(num) {
            return num > 999999 ? (num/1000000).toFixed(1) +" "+ 'M' : num
          }



          // FOR HOURLY
          document.getElementById("total_m1").innerHTML =
          "Total of Transaction in Last Month = " +(mFormatter(totm1));
          document.getElementById("total_m2").innerHTML =
          "Total of Transaction in Previous Month = " +(mFormatter(totm2));
          document.getElementById("gor").innerHTML =
          g_r+" "+"%";
        }
      });
    });


    //Mixed chart monthly


    $(document).ready(function(){
      $.ajax({
        url: "http://localhost/new_chart/database/page1_monthly.php",
        method: "GET",
        cache: false,
        success: function(data) { //data = objek variabel penampung dari query yg digunakan 
          console.log(data);
          var jlh = [];
          var minggu = [];
          var jlh2 = [];
          var prem_trx = [];
          var prem_trx2 = [];
          var mass_trx = [];
          var mass_trx2 = [];

          var d = new Date();
          var n = d.getFullYear();
          var n2 = d.getFullYear()-1;

          for(var i in data) {
            jlh.push(data[i].jumlah);
            minggu.push(data[i].minggu);
            jlh2.push(data[i].jumlah2);
            prem_trx.push(data[i].prem_trx);
            prem_trx2.push(data[i].prem_trx2);
            mass_trx.push(data[i].massive_trx);
            mass_trx2.push(data[i].massive_trx2);
            
          }


          var barGraph = new Chart(document.getElementById("chart-annually"), {
                    type: 'bar',
                    data: {
                    labels: minggu,
                    datasets: [{
                                label: n,
                                type: "line",
                                borderColor: window.chartColors.red,
                                borderWidth: 3,
                                data: jlh,
                                fill: false
                               },
                               {
                                label: n2,
                                type: "bar",
                                backgroundColor: window.chartColors.green,
                                data: jlh2
                               }   
                              ]
                          },
                    options: {
                    title: {
                            display: false,
                            text: ''
                            },
                    tooltips: {
                            mode: 'index',
                            intersect: true
                        },
                   
                    legend: { display: true }
          }
        });

        var barGraph2 = new Chart(document.getElementById("premium-chart-annually"), {
                    type: 'bar',
                    data: {
                    labels: minggu,
                    datasets: [{
                                label: n,
                                type: "line",
                                borderColor: window.chartColors.red,
                                borderWidth: 3,
                                data: prem_trx,
                                fill: false
                               },
                               {
                                label: n2,
                                type: "bar",
                                backgroundColor: window.chartColors.green,
                                data: prem_trx2
                               }   
                              ]
                          },
                    options: {
                    title: {
                            display: false,
                            text: ''
                            },
                    tooltips: {
                            mode: 'index',
                            intersect: true
                        },
                   
                    legend: { display: true }
          }
        });


        var barGraph3 = new Chart(document.getElementById("massive-chart-annually"), {
                    type: 'bar',
                    data: {
                    labels: minggu,
                    datasets: [{
                                label: n,
                                type: "line",
                                borderColor: window.chartColors.red,
                                borderWidth: 3,
                                data: mass_trx,
                                fill: false
                               },
                               {
                                label: n2,
                                type: "bar",
                                backgroundColor: window.chartColors.green,
                                data: mass_trx2
                               }   
                              ]
                          },
                    options: {
                    title: {
                            display: false,
                            text: ''
                            },
                    tooltips: {
                            mode: 'index',
                            intersect: true
                        },
                   
                    legend: { display: true }
          }
        });

        },
        error: function(data) {
          console.log(data);
        }
      });
    });

