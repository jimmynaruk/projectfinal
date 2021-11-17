<!DOCTYPE html>
<html lang="en">
<head>
	<title>Food Blog - Web Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="Food Blog Web Template">
	<meta name="keywords" content="food, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="user-panel">
					<a href="{{URL::TO('register')}}">Register</a> / 
					<a href="{{URL::TO('login')}}">Login</a>
				</div>
			</div>
		</div>
		<div class="header-bottom">
			<div class="container">
				<a href="index.html" class="site-logo">
					<img src="img/ร้านขายส่ง.png" alt="">
				</a>
				<div class="nav-switch">
					<i class="fa fa-bars"></i>
				</div>
				<ul class="main-menu">
				<li><a href="index.html">หน้าหลัก</a></li>
					<li><a href="{{URL::TO('order')}}">ทำรายการสั่งขนม</a></li>
					<li><a href="recipes.html">รายละเอียดการสั่งขนม</a></li>
					<li><a href="{{URL::TO('payment')}}">ชำระเงิน</a></li>
					<li><a href="contact.html">ติดต่อ</a></li>
				</ul>
			</div>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Recipes section -->
	<section class="recipes-section spad pt-0">
		<div class="container">
			<div class="section-title">
				<h2>คำนวนส่วนผสม</h2></br>
				<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

</style>
</head>

<h2><center>คำนวนส่วนผสมขนมเปียกปูน<center> </h2>
<div class="form-group col-md-2">
@foreach($dataset['amountdesdaypoon'] as $var)
จำนวนที่ต้องผลิตวันนี้ :<input type="text" value="{{$var->totalamountpoon}}" id="usedtxtid" class="form-control" readonly></input>
@endforeach
</div>

<div class="container">
<div class="card shadow mb-4">
<div class="card-body">

<table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
            	<th>รหัสส่วนผสม</th>
                <th>ชื่อส่วนผสม</th>
				<th>จำนวนส่วนผสมในคลัง</th>
				<th>จำนวนส่วนผสม/ชิ้น(กรัม)</th>
                <th>จำนวนส่วนผสมที่ต้องใช้/กิโลกรัม</th>
			
            </tr>
        </thead>
        <tbody>
		@foreach($dataset['formulasumpoon'] as $var)
			<tr>
                <td>{{$var->id_formulapoon}}</td>
                <td>{{$var->name}}</td>
				<td>{{$var->amountinstock}}</td>
				<td>{{$var->amount}}</td>
                <td> <input type="text" value="{{$var->sum}}" id="usedtxtid" value=""class="form-control" readonly></input></td>
               
            </tr>
			@endforeach
        </tbody>
    </table>
	
  </div>
  </div>
  </div>

</div>

<h2><center>คำนวนส่วนผสมข้าวเหนียวปิ้ง<center> </h2>

<div class="form-group col-md-2">
@foreach($dataset['amountdesdayping'] as $var)
จำนวนที่ต้องผลิตวันนี้ :<input type="text" value="{{$var->totalamountping}}" id="usedtxtid" class="form-control" readonly></input>
@endforeach

</div>
<div class="container">
<div class="card shadow mb-4">
<div class="card-body">

<table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
            	<th>รหัสส่วนผสม</th>
                <th>ชื่อส่วนผสม</th>
				<th>จำนวนส่วนผสมในคลัง</th>
				<th>จำนวนส่วนผสม/ชิ้น(กรัม)</th>
                <th>จำนวนส่วนผสมที่ต้องใช้/กิโลกรัม</th>
			
            </tr>
        </thead>
        <tbody>
		@foreach($dataset['formulasumping'] as $var)
			<tr>
                <td>{{$var->id_formulaping}}</td>
                <td>{{$var->name}}</td>
				<td>{{$var->amountinstock}}</td>
				<td>{{$var->amount}}</td>

                <td> <input type="text" value="{{$var->sum}}" id="usedtxtid" class="form-control" readonly></input></td>
               
            </tr>
			@endforeach
        </tbody>
    </table>
	
  </div>
  </div>
  <div>

<button class="btn btn-info" onclick="upUsed()">ดำเนินการผลิต</button>



  </div>
  </div>
  
</div>



	</section>
	
	<!-- Recipes section end -->


	
			
	</section>
	<!-- Footer widgets section end -->
<!-- Gallery section -->
<div class="gallery">
		<div class="gallery-slider owl-carousel">
		<div class="gs-item set-bg" data-setbg="img/13PuddinginCoconutCreambig-1200x718.jpg"></div>
			<div class="gs-item set-bg" data-setbg="img/1478840938.jpg"></div>
			<div class="gs-item set-bg" data-setbg="img/9059003238_0f553d4b69_b.jpg"></div>
			<div class="gs-item set-bg" data-setbg="img/s_174223_3821.jpg"></div>
			<div class="gs-item set-bg" data-setbg="img/ee14.jpg"></div>
			<div class="gs-item set-bg" data-setbg="img/w644.jpg"></div>
		</div>
	</div>
	<!-- Gallery section end -->
	<!-- Footer section  -->
	<footer class="footer-section set-bg" data-setbg="img/footer-bg.jpg">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<div class="footer-logo">
						<img src="img/logo.png" alt="">
					</div>
					<div class="footer-social">
						<a href="#"><i class="fa fa-pinterest"></i></a>
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-dribbble"></i></a>
						<a href="#"><i class="fa fa-behance"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
					</div>
				</div>
				<div class="col-lg-6 text-lg-right">
					<ul class="footer-menu">
						<li><a href="#">Home</a></li>
						<li><a href="#">Features</a></li>
						<li><a href="#">Receipies</a></li>
						<li><a href="#">Reviews</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
					<p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<script>

		function upUsed(){
		
			window.location.href="{{URL::TO('showstock')}}"
		
		}
// function findAmountperday(){
  
//   $.ajax({
//     type:"POST",
//     url:'{{URL::to("detail_bookroom/finddetailbook")}}',
//       data:{
//         br_id: br_id,
//         _token:"{{ csrf_token() }}"
//       },success:function(result){
//         console.log(result);
//         $('#amounttxt').val(result[0].amount);
       
//         },fail:function(result,status,error){
         
//         },error:function(result,status,error){
         
//         }
//          })
     
// }   

function chkNum(ele)
			{
				var num = parseFloat(ele.value);
				ele.value = num.toFixed(2);
			}
</script>
