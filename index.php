<?php  header("Content-Type: text/html;charset=UTF-8"); ?>
<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="bootstrap.min.css">
  <title>Dynamic insert</title>
</head>
<body>
  <div class="container">

    <h1 class="mb-5 mt-3 text-center">Dynamic return data From Mysql with Ajax & PHP</h1>
    <p class="mb-5 text-center lead">For Cities & Zip codes of Croatia</p>



      <div class="col-md-6 float-left">
        <input type="text" id="posta" oninput="returnCityName()" class="form-control mb-2" placeholder="Enter ZIP code of HR city">
      </div>
      
      <div class="col-md-6 float-right">
        <input type="text" id="opcina" oninput="returnCityZIP()" class="form-control mb-2" placeholder="Enter HR city name">
      </div>

  </div>


  <script>

  function returnCityName() {
  var x = document.getElementById("posta").value;
  var x_lenght = x.length;
  if (x_lenght == 5) {

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_data.php?x='+x, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      xhr.onload = function(){
        if(this.status == 200){
          var response = JSON.parse(this.responseText);
    
          var html = "";

          for (var a in response) {
                html += response[a].opcina;
                }

          if (document.getElementById("posta").value == '') {
             document.getElementById("opcina").value('');
          } else{      
          document.getElementById("opcina").value = html;
          }   

        }
        console.log(this.responseText);
      }

      xhr.send();
   
  }
 
}

function returnCityZIP(){
  var z = document.getElementById("opcina").value;
  var z_lenght = z.length;
  if (z_lenght == 5) {

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_data.php?z='+z, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      xhr.onload = function(){
        if(this.status == 200){
          var response = JSON.parse(this.responseText);
    
          var html = "";

          for (var a in response) {
                html += response[a].postanski_broj;
                }

          if (document.getElementById("opcina").value == '') {
             document.getElementById("posta").value('');
          } else{      
          document.getElementById("posta").value = html;
          }   

        }
        console.log(this.responseText);
      }

      xhr.send();
   
  }
 
}
  
  </script>
</body>
</html>