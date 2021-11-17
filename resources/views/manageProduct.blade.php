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
	<section class="recipes-section spad pt-0 ">
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

<h2>จัดการสต๊อกส่วนผสม</h2>
<div class="container">
<div class="card shadow mb-4">
<div class="card-body">
<h2>จัดการสต๊อกส่วนผสมขนมเปียกปูน</h2>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="">
<span class="fa fa-plus" aria-hidden="true"></span>&nbsp;Add</button><p>

<table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>รหัสส่วนผสม</th>
                <th>ชื่อส่วนผสม</th>
                <th>จำนวนส่วนผสมในคลัง/กิโลกรัม</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
		@foreach($dataset['datastock'] as $var)
        <tr>
		
                <td>{{$var->id_formulapoon}}</td>
                <td>{{$var->name}}</td>
                <td>{{$var->amountinstock}}</td>
				
               <td> 
               <button type="button"  class="btn btn-warning" onclick="findDetailIngPoon('{{$var->id_formulapoon}}')"  >
               <span class="fa fa-edit" aria-hidden="true"></span>Update</button>
               <button type="button"class="btn btn-danger"  onclick="Delete('{{$var->id_formulapoon}}')">
               <span class="fa fa-trash" aria-hidden="true"></span>Delete</button>
               </td>
            </tr>
			@endforeach
        </tbody>
    </table>

  </div>
  </div>
  </div>

 

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
            <label for="recipient-name" class="col-form-label" >ชื่อส่วนผสม:</label>
            <input type="text" onkeypress="return checkText(this)" class="form-control" id="name_ing" >
          </div>
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label" >จำนวนส่วนผสมในคลัง:</label>
            <input type="text" onkeypress="return checkText(this)" class="form-control" id="amount_ing" >
          </div>

       
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button"  onclick="EditItemStockpoon()"  class="btn btn-primary">
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

   <!----- Add Modalpoon ---------------------------------------------------------->
<div class="modal fade" id="exampleModal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">กรอกข้อมูล</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
         <div class="modal-body">
         <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">ชื่อส่วนผสม:</label>
            <div class="inner-addon">
            <input type="text" class="form-control" id="txtnamedes">
			<div class="form-group">
            <label for="recipient-name" class="col-form-label">จำนวน:</label>
            <div class="inner-addon">
            <input type="number" class="form-control" id="txtamount">
          </div>
          </div>
      
          </div>
          </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        <button type="button"  onclick="saveManageStockpoon()"class="btn btn-primary">
        <span class="fa fa-save" aria-hidden="true"></span>&nbsp;Save</button>
      </div>
    </div>
  </div>
</div>
<!---------------------------------------------------------------->

 
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

</body>
</html>
<script>



function saveManageStockpoon(){

  txtnamedes = $("#txtnamedes").val();
  txtamount = $("#txtamount").val();

$.ajax({
type:"POST",
url:'{{URL::to("managestock/saveMangeStockpoon")}}',
data:{
  txtnamedes: txtnamedes,
  txtamount: txtamount,
  _token:"{{ csrf_token() }}"
      },success:function(result){
        alert(result.message);
        window.location.reload();
        
      },fail:function(result,status,error){
        alert("fail")
      },error:function(result,status,error){
        console.log(result);
        console.log(status);
        console.log(error);
        alert("error")
      }
  })
 
}


 function Delete(id_formulapoon){
  $('#id').val(id_formulapoon);

  $('#Deletemodal').modal();
}
  
function findDetailIngPoon(id_formulapoon){
    
    $('#id_ing').val(id_formulapoon);

    $('#editModal').modal();
  $.ajax({
    type:"POST",
    url:'{{URL::to("managestockpoon/finddataStockPoon")}}',
      data:{  
        id_formulapoon: id_formulapoon,
        _token:"{{ csrf_token() }}"
      },success:function(result){
        console.log(result);
        $('#id_ing').val(result[0].id_formulapoon);
        $('#name_ing').val(result[0].name);
        $('#amount_ing').val(result[0].amountinstock);
      
        },fail:function(result,status,error){
         
        },error:function(result,status,error){
         
        }
         })
     
}


function EditItemStockpoon(){

  id_ing = $("#id_ing").val();
  name_ing = $("#name_ing").val();
  amount_ing = $("#amount_ing").val();
if(name_ing==''){
  alert('กรุณาระบุชื่อส่วนผสม');
  return false;
}else if(amount_ing==''){
  alert('กรุณาระบุจำนวนส่วนผสม');
  return false;
}
  $.ajax({
    type:"POST",
    url:'{{URL::to("managestockpoon/EditstockPoon")}}',
    data:{
      id_ing: id_ing,
      name_ing: name_ing,
      amount_ing: amount_ing,
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

id_formulapoon = $("#id").val();

$.ajax({
type:"POST",
url:'{{URL::to("managestock/deleteStockpoon")}}',
  data:{
    id_formulapoon: id_formulapoon,
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