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
<link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- endmodal-->  


</head>
<style>
.product-image {
  width: 40%;
}
.price:after,
.subtotal:after,
.subtotal-value:after,
.total-value:after,
.promo-value:after {
  content: 'บาท ';
}
/* css textarea */
.shadow-textarea textarea.form-control::placeholder {
    font-weight: 300;
}
.shadow-textarea textarea.form-control {
    padding-left: 0.8rem;
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
	}
	.search-box {
        position: relative;
    }	
    .search-box input {
		box-shadow: none;
        padding-right: 35px;
        border-radius: 3px !important;
    }
	.search-box .input-group-addon {
        min-width: 35px;
        border: none;
        background: transparent;
        position: absolute;
        right: 0;
        z-index: 9;
        padding: 7px;
		height: 100%;
    }
    .search-box i {
        color: #a0a5b1;
		font-size: 19px;
    }
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
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

  <nav class="navbar navbar-default navbar-expand-xl navbar-light">
	<div class="navbar-header d-flex col">
		<a class="navbar-brand" href="#"><i class="fa fa-birthday-cake"></i>Thai<b>Dessert</b></a>  		
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
			<li class="nav-item active"><a href="{{URL::TO('main')}}" class="nav-link">หน้าหลัก</a></li>
			<li class="nav-item"><a href="#" class="nav-link">เกี่ยวกับเรา</a></li>
			<li class="nav-item"><a href="{{URL::TO('order')}}" class="nav-link">ทำรายการสั่งขนม</a></li>
			<li class="nav-item"><a href="#" class="nav-link">รายละเอียดการสั่งขนม</a></li>
			<li class="nav-item"><a href="#" class="nav-link">ติดต่อ</a></li>
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
					<li><a href="#" class="dropdown-item"><i class="fa fa-calendar-o"></i> Calendar</a></li>
					<li><a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Settings</a></li>
					<li class="divider dropdown-divider"></li>
					<li><a href="#" class="dropdown-item" data-toggle="modal" data-target="#logoutModal"><i class="material-icons">&#xE8AC;</i>Logout</a></li>
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
<style>
.table>tbody>tr>td, .table>tfoot>tr>td{
    vertical-align: middle;
}
@media screen and (max-width: 600px) {
    table#cart tbody td .form-control{
		width:20%;
		display: inline !important;
	}
	.actions .btn{
		width:36%;
		margin:1.5em 0;
	}
	
	.actions .btn-info{
		float:left;
	}
	.actions .btn-danger{
		float:right;
	}
	
	table#cart thead { display: none; }
	table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
	table#cart tbody tr td:first-child { background: #333; color: #fff; }
	table#cart tbody td:before {
		content: attr(data-th); font-weight: bold;
		display: inline-block; width: 8rem;
	}
	
	
	
	table#cart tfoot td{display:block; }
	table#cart tfoot td .btn{display:block;}
	img {
    width: 150px;
  }
}
</style>

</div>
	<!-- Recipes section -->
	<section class="recipes-section spad pt-0">

	<div class="container-fluid">
	<div class="card shadow mb-2">
	<div class="card-body">
		<div class="container">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
	<table id="cart" class="table table-hover table-condensed">
	
    				<thead>
						<tr>
							<th style="width:50%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:22%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>
						<tr>
						@foreach($dataset['productdetail'] as $var)
							<td data-th="Product">
								<div class="row">
							
									<div class="col-sm-8 hidden-xs"><img src="img/imgDessert/{{$var->product_pic}}" alt="..." class="img-responsive"/></div>
									<div class="col-sm-10">
										
										<h4 class="nomargin">{{$var->product_name}}</h4>
									
									</div>
								</div>
							</td>
							<td data-th="Price">${{$var->product_price}}</td>
							<td data-th="Quantity">
								<input type="number" class="form-control text-center" value="1">
							</td>
							<td data-th="Subtotal" class="text-center">1.99</td>
							<td class="actions" data-th="">
								<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
								<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>								
							</td>
						</tr>
					</tbody>
					<tfoot>
					
						<tr>
						
							@endforeach
						
						</tr>
					</tfoot>
				</table>
			<!-- <div class="section-title">
				<h2>ทำรายการสั่งทำขนม</h2>
				<form>
			<div class="form-row">
			<main>
			@foreach($dataset['productdetail'] as $var)
      <div class="basket-product">
        <div class="item">
		
          <div class="product-image">
		  <input id="productidpic" hidden>
		  <img id="myImg" >
		  <img src="img/imgDessert/{{$var->product_pic}}" alt="No Images">
          </div>
          <div class="product-details"><br>
         <h3>{{$var->product_name}}</h3><br>
        </div>
        <h3>ราคาต่อชิ้น : {{$var->product_price}} บาท<h3><br>
        <hr><p>
      </div>
	  @endforeach -->
    
        <button type="button"  class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">
        <span class="fa fa-edit" aria-hidden="true"></span>ทำรายการสั่งทำขนม</button>
		<br>
		</div>
		</div>
<!-- 	
	<div class="form-group col-3">
				<label for="inputAddress2">วันที่รับ</label>
				<input type="date" class="form-control" id="pickuptxt">
	</div>
  <div class="form-group shadow-textarea col-5">
        <label for="exampleFormControlTextarea6">รายละเอียดเพิ่มเติม</label>
        <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
      </div>
      <button  type="button" onclick="saveorder()">บันทึกการทำรายการ</button>
  
  </main>
  </div>
 </div> -->
<style>
 .form-checkout {
    display: flex;
    justify-content: space-around;
    align-items: center;
  }
  img {
    width: 150px;
  }
  .amount-text {
    display: flex;
    flex-flow: column;
    align-items: center;
  }
  .ant-form-item-control {
    width: 80px;
  }
  .button-submit {
    display: flex;
    // justify-content: flex-end;
    padding-top: 20px;
    padding-left: 70%;
  }
</style>
 <!-- modal1 -->
 <div class="modal fade" id="exampleModal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">กรอกข้อมูลการสั่งทำขนม</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      <div class="form-group">
          <label for="message-text" class="col-form-label" >รหัสผู้ใช้:</label>
            <input type="text" class="form-control" id="usernametxt" value="{{Session::get('getuser')}}"readonly>
           </div>
    

		   @foreach($dataset['productdetail'] as $var)
		   <div className="container-card" >
          <div className="container-img">
            <img alt="pay" src="img/imgDessert/{{$var->product_pic}}" />
          </div>
          <span>
          <input type="checkbox" value="{{$var->product_id}}" id="check1txt">{{$var->product_name}} 
          </span>
         
          <div>
		  ราคาต่อชิ้น :{{$var->product_price}} 
          </div>
        
		  @endforeach
        </div>

          <!-- <div class="form-group">
		  
		  @foreach($dataset['productdetail'] as $var)
		  <label for="name3">
          <input type="checkbox" value="{{$var->product_id}}" id="check1txt">{{$var->product_name}} 
		  </label>
		  <input type="text" id="name3" name="name3" /><br>
		  @endforeach
          </div> -->
       
         
        
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        <button type="button"  class="btn btn-primary" onclick="saveorder();">
        <span class="glyphicon glyphicon-save" aria-hidden="true"></span>Save</button>
      </div>
</body>
		<!-- endmodal1-->

 
	</section>
	<!-- Recipes section end -->
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
			<a class="btn btn-primary" href="{{URL::TO('login')}}"> &nbsp;{{Session()->flash('log Out')}}Logout</a>
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
				<div class="col-lg-3">
					<div class="footer-logo">
						<img src="img/logo.png" alt="">
					</div>
					
				</div>
				<div class="col-lg-6 text-lg-right">
				
				
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


 
function summaryprice(){
    amount1    = parseInt($('#amount1txt').val());
    amount2   = parseInt($('#amount2txt').val());
  
    sum = (amount1+amount2)*3.5;
    
    $('#pricetxt').val(sum)

}



function saveorder(){
           
            // check1txt = (document.getElementById("check1txt").checked == true );
            usernametxt = $("#usernametxt").val();
			txtqua = $("txtqua").val();
			
         checkArr = [];
         console.log(checkArr);
         $('input[type="checkbox"]').each(function(){
          if(this.checked){
            var str = this.value;
            checkArr.push(str);
          }
          });
         
      
            $.ajax({
            type:"POST",
            url:'{{URL::to("order/createOrder")}}', 
            data:{
              
              usernametxt: usernametxt,
              checkArr: checkArr,
			  txtqua: txtqua,
               _token:"{{ csrf_token() }}"
               },success:function(result){
               alert(result.message);00
                //  window.location.href="{{URL::TO('manageUserOrder')}}"
               },fail:function(result,status,error){
                 alert('failFunction');
               },error:function(result,status,error){
             let msg = result.responseJSON.message
                 
             alert(msg);
               }
             
           })
}



</script>