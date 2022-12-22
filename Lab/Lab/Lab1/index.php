<?php
if(array_key_exists('submit',$_GET)){
//Kiểm tra if nhập vào là rỗng
if(!$_GET['city']){
    $error="Xin lỗi, Bạn chưa nhập tên thành phố";
}
if ($_GET['city']){

$apiData=file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$_GET['city']."&appid=7eed830b3cec467e2904297641ad0172");
$weatherArray = json_decode($apiData,true);
if ($weatherArray['cod'] == 200){
//C=K-273.15
$tempCelsius = $weatherArray['main']['temp'] - 273;
$weather ="<b>".$weatherArray['name'].",".$weatherArray['sys']['country'].": ".intval($tempCelsius)."&deg;C</b> <br>";
$weather .="<br>Weather Condition :</b>".$weatherArray['weather']['0']['description']."<br>";
$weather .="<b>Atmosperic Pressure: </b>".$weatherArray['main']['pressure']."hPa<br> ";
$weather .="<b>Wind Speed : </b>".$weatherArray['wind']['speed']."meter/sec<br> ";
$weather .="<b>Cloudness :</b> " .$weatherArray['clouds']['all']." %<br>";date_default_timezone_set('Asia/karachi');
$sunrise = $weatherArray['sys']['sunrise'];
$weather .= "<b>Sunrise :</b>" .date("g:i a", $sunrise)."<br>";
$weather .= "<b>Current Time: </b>".date("F j ,Y, g:i a");
}
}
}
?>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<title>Weather App</title>
<style>
body{
margin: 0px;
padding: 0px;
box-sizing: border-box;
background-color: darkgray;
color: white;
font-family: poppin,'Times New Roman', Times,serif;
font-size: large;
background-size: cover;
background-attachment: fixed;
}
.container{
text-align: center;
justify-content: center;
align-items: center;
width: 440px;
}
h1{
font-weight: 700;
margin-top: 150px;
}
input{
width: 350px;
padding: 5px;
}

</style>
</head>
<body>
<div class="container">
<h1>Search Global Weather</h1>
<form action="" method="GET">
<p><label for="city">Nhập tên thành phố</label></p>
<p><input type="text" name="city" id="city" placeholder="CityName"></p>
<button type="submit" name="submit" class="btn btn-success mb-3">SubmitNow</button>
<div class="ouput">
<?php
if(isset($_GET['city'])) {
echo '<div class="alert alert-success" role="alert">
'.$weather.'
</div>';
}
?>
</div>
</form>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--

<script
src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.mi
n.js" integrity="sha384-
7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rt
R1zdB" crossorigin="anonymous"></script>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
integrity="sha384-
QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/Y
ESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>
