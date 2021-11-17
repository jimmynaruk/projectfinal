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
	<!-- modal-->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<!-- endmodal-->  
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

<h2><center>ตรวจสอบการจ่ายเงินและอัปเดตสถานะออเดอร์<center> </h2>
<div class="container">
<div class="card shadow mb-4">
<div class="card-body">
<table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
            <th>Order id</th>
                <th>Username</th>
                <th>ชื่อขนม</th>
                <th>จำนวน</th>
                <th>ราคา</th>
				<th>วันที่รับขนม</th>
				<th>สถานะรายการ</th>
                <th>Action</th>
                
               
            </tr>
        </thead>
        <tbody>
		@foreach($dataset['dataorder'] as $var)
			<tr>
                <td>{{$var->order_id}}</td>
                <td>{{$var->username}}</td>
                <td>{{$var->dessert_name}}</td>
                <td>{{$var->amount}}</td>
                <td>{{$var->total_price}}</td>
                <td>{{$var->pickup_date}}</td> 
				<td>{{$var->status}}</td> 
                <td> 
               <button type="button"  class="btn btn-success" onclick="acceptmodal('{{$var->order_id}}')" >
               <span class="fa fa-check"  aria-hidden="true"></span>&nbsp;จ่ายแล้ว</button>
               </td>
            </tr>
			@endforeach
        </tbody>
    </table>

  </div>
  </div>
  </div>

  <!--AcceptModal -->
	<div class="modal fade" id="Accmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">อนุมัติ</h5>
			<button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			</div>
			<div class="modal-body"> อนุมัติการจอง?
			<input id="orderid2"  hidden>
			</div>
			<div class="modal-footer">
			<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
			<button type="button" onclick="updatestatus()" class="btn btn-success">Accept</button>
			</div>
		</div>
		</div>
	</div>
	</section>


	<!-- Footer section  -->
	<footer class="footer-section set-bg" data-setbg="img/footer-bg.jpg">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<div class="footer-logo">
						<img src="img/ร้านขายส่ง.png" alt="">
					</div>
					
				</div>
				<div class="col-lg-6 text-lg-right">
				
					<p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="fa fa-heart-o" aria-hidden="true"></i>Jimmy Website</a>
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
 function acceptmodal(order_id){
  $('#orderid2').val(order_id);

  $('#Accmodal').modal();
}

function updatestatus(){
	order_id = $("#orderid2").val();
 
        $.ajax({
        type:"POST",
        url:'{{URL::to("paymentupdate/acceptpayment")}}',
        data:{
          order_id: order_id,
          _token:"{{ csrf_token() }}"
              },success:function(result){
                alert(result.message);
                window.location.reload();

              },fail:function(result,status,error){
                alert(result.message)
              },error:function(result,status,error){
                console.log(result);
                console.log(status);
                console.log(error);
                alert(result.responseJSON.message)
              }
        });
        
}
  
  </script>