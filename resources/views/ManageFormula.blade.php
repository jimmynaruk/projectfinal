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
<!--====== Javascripts & Jquery ======-->
<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">
	<!-- modal-->
  <link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
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

	<style type="text/css">
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
		<li class="nav-item active"><a href="{{URL::TO('main')}}" class="nav-link">หน้าหลัก</a></li>
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
					<li><a href="#" class="dropdown-item" data-toggle="modal" data-target="#logoutModal"><i class="material-icons">&#xE8AC;</i> Logout</a></li>
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
<div class="container">
<div class="card shadow mb-4">
<div class="card-body">

<h2><center>ดูสูตรขนม<center> </h2>
            <div class="container-fluid">
            <div class="card shadow mb-4">
            <div class="card-body">

            <div class="row">      
            <!-- <div>
            <select id="selectgroupdata">
            @foreach($dataset['productname'] as $index => $data)
            <option value="{{$data->product_id}}">{{$data->product_name}}</option>
            @endforeach
            </select>
            </div> -->
            </div><br>

            <table id="example" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            
                            <th>รหัสขนม</th>
							<th>ชื่อขนม</th>
                            <th>ชื่อส่วนผสม</th>
							<th>น้ำหนักที่ต้องใช้ต่อชิ้น/กรัม</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    @foreach($dataset['formuladetail'] as $var)
                    <tr> 
                       
                        <td>{{$var->product_id}}</td>
						<td>{{$var->product_name}}</td>
                        <td>{{$var->ing_name}}</td>
                        <td>{{$var->weight}}</td>
                        <td>
                        <button type="button"  class="btn btn-warning" onclick="findDetailformula('{{$var->formula_id}}')"  >
                        <span class="fa fa-edit" aria-hidden="true"></span>&nbsp; Edit</button>
                        <button type="button"  class="btn btn-danger" onclick=""  >
                        <span class="fa fa-trash" aria-hidden="true"></span>&nbsp; Delete</button>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
  </div>
  </div>
  </div>

  </div>
  </div>
  </div>

  
	</section>
<!---- editmodal poon------------->
<div class="modal fade" id="editModal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลส่วนผสม</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>

        <div class="form-group">
            <label for="recipient-name" class="col-form-label" >ID:</label>
            <div class="inner-addon left-addon">
            <i class="glyphicon glyphicon-credit-card"></i>
            <input type="text" class="form-control" id="id_ing"  readonly/>
          </div>
          </div> 
         
		  <div class="form-group">
            <label for="recipient-name" class="col-form-label" >ชื่อขนม:</label>
            <input type="text"  class="form-control" id="productname" readonly/>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label" >ชื่อส่วนผสม:</label>
            <input type="text"  class="form-control" id="name_ing" readonly/>
          </div>
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label" >จำนวนส่วนผสมในคลัง:</label>
            <input type="text" onkeypress="return chkNumber(this)" class="form-control" id="weight" >
          </div>

       
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button"  onclick="EditFormula()"  class="btn btn-primary">
        <span class="glyphicon glyphicon-save" aria-hidden="true"></span>Save change</button>
      </div>
    </div>
  </div>
</div>
	
	<!--Delete Modal -->
<div class="modal fade" id="Deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ลบบัญชีผู้ใช้</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"> ลบส่วนผสมหรือไม่?</div>
        <input id="id" type="hidden" >
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="button"  onclick="deleteIngPoon() " class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
	<!-- Review section end -->


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
			
					<p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
				
			</div>
		</div>
	</footer>
	<!-- Footer section end -->

</body>

  <script>

// function logout(){
// 		window.location="http://localhost/project/public/main";
// 	}
function chkNumber(ele) //พิมพ์ได้เฉพาะตัวเลข
	{
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	ele.onKeyPress=vchar;
  }

function Delete(formula_id){
  $('#id').val(formula_id);

  $('#Deletemodal').modal();
}
  
function findDetailformula(formula_id){
    
    $('#id_ing').val(formula_id);

    $('#editModal').modal();
  $.ajax({
    type:"POST",
    url:'{{URL::to("ManageFormula/finddataFormula")}}',
      data:{  
        formula_id: formula_id,
        _token:"{{ csrf_token() }}"
      },success:function(result){
        console.log(result);
        $('#id_ing').val(result[0].formula_id);
        $('#productname').val(result[0].product_name);
		$('#name_ing').val(result[0].ing_name);
        $('#weight').val(result[0].weight);
      
        },fail:function(result,status,error){
         
        },error:function(result,status,error){
         
        }
         })
     
}


function EditFormula(){

  id_ing = $("#id_ing").val();
 
  weight = $("#weight").val();
if(weight==''){
  alert('กรุณาระบุจำนวนส่วนผสม');
  return false;
}
  $.ajax({
    type:"POST",
    url:'{{URL::to("ManageFormula/EditFormula")}}',
    data:{
      id_ing: id_ing,
	  weight: weight,
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

})

}

function deleteIngPoon(){

	formula_id = $("#id").val();

$.ajax({
type:"POST",
url:'{{URL::to("ManageFormula/deleteFormula")}}',
  data:{
    formula_id: formula_id,
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
         })
}
</script>
</html>
