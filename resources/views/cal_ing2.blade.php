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
				<form>
			<div class="form-row">
                <div class="form-group col-md-2">
				จำนวนขนมเปียกปูน : <input type="number"value="0" min="0" max="3000" class="form-control"  id="amounttxt">
				</div>
                <div class="form-group col-md-2">
				แป้งข้าวเจ้า/กิโลกรัม :
				<input type="email" class="form-control" id="inputtxt1" readonly><br>
				
				แป้งมัน/กิโลกรัม :
				<input type="email" class="form-control" id="inputtxt2" readonly><br>
				
				แป้งท้าว/กิโลกรัม :
				<input type="email" class="form-control" id="inputtxt3" readonly><br>
				
				แป้งข้าวโพด/กิโลกรัม :
				<input type="email" class="form-control" id="inputtxt4" readonly><br>
                </div>

                <div class="form-group col-md-2">
				น้ำตาล/กิโลกรัม : 
				<input type="email" class="form-control" id="inputtxt5"  readonly><br>
				
				น้ำปูนใส/ลิตร :
				<input type="email" class="form-control" id="inputtxt6"  readonly><br>
				
				น้ำกะทิ/กิโลกรัม :
				<input type="email" class="form-control" id="inputtxt7"  readonly><br>
               
				น้ำใบเตย/ลิตร :
				<input type="email" class="form-control" id="inputtxt8"  readonly>
				</div>
	
		</div>
			
			<hr><p>
			
			<div class="form-row">
                <div class="form-group col-md-2">
				จำนวนข้าวเหนียวปิ้ง : <input type="number" min="0" max="3000"value="0"class="form-control" id="amounpingtxt">
				</div>
                <div class="form-group col-md-2">
				ข้าวเหนียว/กิโลกรัม :
				<input type="email" class="form-control" id="inputtxt21" readonly><br>

				แป้งมัน/กิโลกรัม :
				<input type="email" class="form-control" id="inputtxt22" readonly><br>
				
				น้ำตาล/กิโลกรัม : 
				<input type="email" class="form-control" id="inputtxt23"readonly><br>
			
                </div>

                <div class="form-group col-md-2">
				
				เผือก/กิโลกรัม : 
				<input type="email" class="form-control" id="inputtxt24"readonly><br>

				หัวกะทิ/กิโลกรัม :
				<input type="email" class="form-control" id="inputtxt25"readonly><br>

				น้ำกะทิ/กิโลกรัม :
				<input type="email" class="form-control" id="inputtxt26"readonly><br>
               
				</div>
	
		</div>
			</form>
			<div>
<button class="btn btn-info" onclick="summaryprice()">Calculate</button>
</div>
			</div>
	</section>

			</div>
		</div>

	
	</section>
	<!-- Recipes section end -->
	</section>

	<!-- Recipes section end -->


	
			
	</section>
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
// function summaryprice(){
//     amount  = parseInt($('#amounttxt').val());
    
//     sum1 = amount*8
// 	sum11 = (sum1/1000)
//     sum2 = amount*4
// 	sum12 = (sum2/1000)
//     sum3 = amount*2.5
// 	sum13 = (sum3/1000)
//     sum4 = amount*2.5
// 	sum14 = (sum4/1000)
//     sum5 = amount*7
// 	sum15 = (sum5/1000)
//     sum6 = amount*5
// 	sum16 = (sum6/1000)
// 	sum7 = amount*2
// 	sum17 = (sum7/1000)
// 	sum8 = amount*2
// 	sum18 = (sum8/1000)

//     $('#inputtxt1').val(sum11);
//     $('#inputtxt2').val(sum12);
//     $('#inputtxt3').val(sum13);
// 	$('#inputtxt4').val(sum14);
// 	$('#inputtxt5').val(sum15);
// 	$('#inputtxt6').val(sum16);
// 	$('#inputtxt7').val(sum17);
// 	$('#inputtxt8').val(sum18);

// 	amountping  = parseInt($('#amounpingtxt').val());
    
//     sum1 = amountping*0.010;
//     sum2 = amountping*0.005;
//     sum3 = amountping*0.005;
//     sum4 = amountping*0.005;
//     sum5 = amountping*0.015;
//     sum6 = amountping*0.004;
// 	sum7 = amountping*0.010;
// 	sum8 = amountping*0.010;

//     $('#inputtxt21').val(sum1);
//     $('#inputtxt22').val(sum2);
//     $('#inputtxt23').val(sum3);
// 	$('#inputtxt24').val(sum4);
// 	$('#inputtxt25').val(sum5);
// 	$('#inputtxt26').val(sum6);
// }
// function updatestatus(){
// 	order_id = $("#orderid2").val();
 
//         $.ajax({
//         type:"POST",
//         url:'{{URL::to("paymentupdate/acceptpayment")}}',
//         data:{
//           order_id: order_id,
//           _token:"{{ csrf_token() }}"
//               },success:function(result){
//                 alert(result.message);
//                 window.location.reload();

//               },fail:function(result,status,error){
//                 alert(result.message)
//               },error:function(result,status,error){
//                 console.log(result);
//                 console.log(status);
//                 console.log(error);
//                 alert(result.responseJSON.message)
//               }
//         });
        
// }
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

// function chkNum(ele)
// 			{
// 				var num = parseFloat(ele.value);
// 				ele.value = num.toFixed(2);
// 			}
</script>
