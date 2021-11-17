<!DOCTYPE html>
<html lang="en">
<head>
	<title>ตรวจสอบออเดอร์</title>
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


	<link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	
</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	<style type="text/css">
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
	body{
		background: #eeeeee;
	}
    .form-inline {
        display: inline-block;
    }
	.navbar-header.col {
		padding: 0 !important;
	}	
	.navbar {		
		background: #fff;
		padding-left: 16px;
		padding-right: 16px;
		border-bottom: 1px solid #d6d6d6;
		box-shadow: 0 0 4px rgba(0,0,0,.1);
	}
	.nav-link img {
		border-radius: 50%;
		width: 36px;
		height: 36px;
		margin: -8px 0;
		float: left;
		margin-right: 10px;
	}
	.navbar .navbar-brand {
		color: #555;
		padding-left: 0;
		padding-right: 50px;
		font-family: 'Merienda One', sans-serif;
	}
	.navbar .navbar-brand i {
		font-size: 20px;
		margin-right: 5px;

	.navbar .nav-item i {
		font-size: 18px;
	}
	.navbar .dropdown-item i {
		font-size: 16px;
		min-width: 22px;
	}
	.navbar .nav-item.open > a {
		background: none !important;
	}
	.navbar .dropdown-menu {
		border-radius: 1px;
		border-color: #e5e5e5;
		box-shadow: 0 2px 8px rgba(0,0,0,.05);
	}
	.navbar .dropdown-menu li a {
		color: #777;
		padding: 8px 20px;
		line-height: normal;
	}
	.navbar .dropdown-menu li a:hover, .navbar .dropdown-menu li a:active {
		color: #333;
	}	
	.navbar .dropdown-item .material-icons {
		font-size: 21px;
		line-height: 16px;
		vertical-align: middle;
		margin-top: -2px;
	}
	.navbar .badge {
		background: #f44336;
		font-size: 11px;
		border-radius: 20px;
		position: absolute;
		min-width: 10px;
		padding: 4px 6px 0;
		min-height: 18px;
		top: 5px;
	}
	.navbar ul.nav li a.notifications, .navbar ul.nav li a.messages {
		position: relative;
		margin-right: 10px;
	}
	.navbar ul.nav li a.messages {
		margin-right: 20px;
	}
	.navbar a.notifications .badge {
		margin-left: -8px;
	}
	.navbar a.messages .badge {
		margin-left: -4px;
	}	
	.navbar .active a, .navbar .active a:hover, .navbar .active a:focus {
		background: transparent !important;
	}
	@media (min-width: 1200px){
		.form-inline .input-group {
			width: 300px;
			margin-left: 30px;
		}
	}
	@media (max-width: 1199px){
		.form-inline {
			display: block;
			margin-bottom: 10px;
		}
		.input-group {
			width: 100%;
		}
	}
</style>
</head> 
<body>
<nav class="navbar navbar-default navbar-expand-xl navbar-light">
	<div class="navbar-header d-flex col">
		<a class="navbar-brand" href="#"><i class="fa fa-cube"></i>Thai<b>Dessert</b></a>  		
		<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle navbar-toggler ml-auto">
			<span class="navbar-toggler-icon"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
	
		<ul class="nav main-menu">
			
			@foreach( Session::get('menu') as $var)
			<li class="nav-item"><a href="{{$var->linkfunc}}" class="nav-link">{{$var->function_name}}</a></li>
			@endforeach
		
			<!-- <li class="nav-item dropdown">
				<a data-toggle="dropdown"  href="#">Services <b class="caret"></b></a>
				<ul class="dropdown-menu">					
					<li><a href="{{URL::TO('order')}}" class="dropdown-item">ทำรายการสั่งขนม</a></li>
					<li><a href="#" class="dropdown-item">รายละเอียดการสั่งขนม</a></li>
					<li><a href="#" class="dropdown-item">ชำระเงิน</a></li>
					<li><a href="#" class="dropdown-item">ติดต่อ</a></li>
				</ul>
			</li> -->
			
			<li class="nav-item dropdown">
				@if (Session::get('haslogin') == 1)
				<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action">
				<span class="fa fa-user-o" aria-hidden="true"></span>&nbsp;{{Session::get('getuser')}}</a>
				
				<ul class="dropdown-menu">
					<li><a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a></li>
				
					<li class="divider dropdown-divider"></li>
					<li><a href="#" class="dropdown-item" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-power-off "></i> Logout</a></li>
				</ul>
				@endif
			</li>
		</ul>
		
		<!-- <form class="navbar-form form-inline">
			<div class="input-group search-box">								
				<input type="text" id="search" class="form-control" placeholder="Search by Name">
				<span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
			</div>
		</form> -->

		
	</div>
</nav>

	

</head>

<h2><center>ตรวจสอบการจ่ายเงินและอัปเดตสถานะออเดอร์<center> </h2>
<div class="container">
<div class="card shadow mb-4">
<div class="card-body">
<table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
            	<th>รหัสรายการ</th>
                <th>รหัสผู้ใช้</th>
                <th>วิธีรับขนม</th>
				<th>วันที่รับขนม</th>
                <th>สถานะ</th>
                <th>Action</th>
                
               
            </tr>
        </thead>
        <tbody>
		@foreach($dataset['userorder'] as $var)
			<tr>
                <td>{{$var->order_id}}</td>
                <td>{{$var->username}}</td>
                <td>{{$var->pickup}}</td>
                <td>{{$var->pickup_date}}</td> 
				<td>{{$var->status}}</td> 
                <td> 
				<button type="button"  class="btn btn-success" onclick="UpdateModal('{{$var->order_id}}')" >
               <span class="fa fa-check"  aria-hidden="true"></span>&nbsp;เสร็จสิ้น</button>
             
			  
               </td>
            </tr>
			@endforeach
        </tbody>
    </table>

  </div>
  </div>
  </div>

  
	</section>


	<!--checkModal -->
<div class="modal fade" id="eyemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Update Success Status</h5>
			<button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			</div>
			<div class="modal-body">  

            <div class="modal-body">อัปเดตสถานะรายการหรือไม่?</div>
			<input id="orderid"  hidden>
			
			</div>
			<div class="modal-footer">
			<button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
			<button type="button" onclick="updatestatus()" class="btn btn-success">เสร็จสิ้น</button>
			</div>
		</div>
		</div>
	</div>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
			<button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			</div>
			<div class="modal-body">ออกจากระบบหรือไม่?</div>
			<div class="modal-footer">
			<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
			<a class="btn btn-primary" href="{{URL::TO('home')}}"> &nbsp;{{Session()->flash('log Out')}}Logout</a>
			</div>
		</div>
		</div>
	</div>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</body>
</html>
<script>

function UpdateModal(order_id){
        $('#orderid').val(order_id);

        $('#eyemodal').modal();

      }

function updatestatus(){

	order_id = $("#orderid").val();
    
        $.ajax({
        type:"POST",
        url:'{{URL::to("closeorder/updateStatusSuccessOrder")}}',
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



// function findpic(order_id){
   
//    $('#orderidpic').val(order_id);
//    $('#eyemodal').modal();
//    $.ajax({
//     type:"POST",
//     url:'{{URL::to("paymentupdate/findpic")}}',
//       data:{
// 		order_id: order_id,
//         _token:"{{ csrf_token() }}"
//       },success:function(result){
//         console.log(result);
//         //$('#imguppic').val(result.sql.uploadpic);
// 		$('#myImg').attr('src','img/images/'+result.sql.uploadpic);
//         },fail:function(result,status,error){
         
//         },error:function(result,status,error){
        
//         }
//          })
// }
  </script>