<?php

include 'logic.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Bootstrap CSS -->
<link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/996973c893.js" crossorigin="anonymous"></script>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<!-- My Stylesheet -->
<link rel="stylesheet" href="style.css">
<!-- My jQuery -->
<script src="main.js"></script>
<!-- Chart.js -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<title>Covid-19</title>
</head>
<body>
<div class="container-fluid bg-light p-5 text-center my-3">
<h1 class="">Covid-19</h1>
<h5 class="text-muted">THỐNG KÊ COVID19 TRÊN TOÀN THẾ GIỚI.</h5>
</div>
<div class="container my-5">
<div class="row text-center">
<div class="col-4 text-warning">
<h5>Tổng nhiễm</h5>
<?php echo $total_confirmed;?>
</div>
<div class="col-4 text-success">
<h5>Khỏi bệnh</h5>
<?php echo $total_recovered;?>
</div>
<div class="col-4 text-danger">
<h5>Tử vong</h5>
<?php echo $total_deaths;?>
</div>
</div>
</div>

<div class="container bg-light p-3 my-5 text-center">

<h5 class="text-info">"Ngăn chặn và phòng ngừa là cách tốt nhất."</h5>
<p class="text-muted">Ở nhà và giữ khoảng cách an toàn</p>
</div>

<canvas id="myChart"></canvas>

<div class="container-fluid">
<div class="table-responsive">
<table class="table">
<thead class="thead-dark">
<tr>
<th scope="col">Quốc gia</th>
<th scope="col">Tổng nhiễm</th>
<th scope="col">Khỏi bệnh</th>
<th scope="col">Tử vong</th>
</tr>
</thead>
<tbody>
<?php
foreach($data as $key => $value){
$increase = $value[$days_count]['confirmed'] -
$value[$days_count_prev]['confirmed'];
?>
<tr>
<th scope="row"><?php echo $key?></th>
<td>
<?php echo $value[$days_count]['confirmed'];?>
<?php if($increase != 0){ ?>
<small class="text-danger pl-3">

<i class="fas fa-arrow-up"></i>
<?php echo $increase;?>
</small>
<?php } ?>
</td>
<td><?php echo $value[$days_count]['recovered'];?></td>
<td><?php echo $value[$days_count]['deaths'];?></td>
</tr>
<?php }?>
</tbody>
</table>
</div>
</div>

<footer class="footer mt-auto py-3 bg-light">
<div class="container text-center">

<span class="text-muted">Copyright &copy;2022, Sinh viên CNTT-
Hunre</a></span>

</div>
</footer>
</body>
</html>