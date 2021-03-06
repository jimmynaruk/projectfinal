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
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"/> 
  
    <!-- modal-->
  <link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
  
	<!-- endmodal-->  
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
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
			<li class="nav-item active"><a href="{{URL::TO('main')}}" class="nav-link">????????????????????????</a></li>
			
			<li class="nav-item"><a href="" class="nav-link"></a></li>
			
			<!-- <li class="nav-item dropdown">
				<a data-toggle="dropdown"  href="#">Services <b class="caret"></b></a>
				<ul class="dropdown-menu">					
					<li><a href="{{URL::TO('order')}}" class="dropdown-item">?????????????????????????????????????????????</a></li>
					<li><a href="#" class="dropdown-item">????????????????????????????????????????????????????????????</a></li>
					<li><a href="#" class="dropdown-item">????????????????????????</a></li>
					<li><a href="#" class="dropdown-item">??????????????????</a></li>
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
	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
			<button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">??</span>
			</button>
			</div>
			<div class="modal-body">????????????????????????????????????????????????????</div>
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
        
</head>


</style>
<h2><center>??????????????????????????????????????????????????????????????????????????????<center> </h2>
<div class="container">
<div class="card shadow mb-4">
<div class="card-body">

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
<span class="fa fa-plus" aria-hidden="true"></span>&nbsp;Create</button><p>
@foreach($dataset['dataProductivity'] as $index => $var)
<label>?????????????????????:</label><input type="text" id="idtxt" name="idtxt[]"  value="{{$var->product_id}}" class="form-control"readonly>
<label>????????????????????????:</label><input type="text" id="vitytxt" name="vitytxt[]"  value="{{$var->Amount}}" class="form-control"readonly></br>
@endforeach
<table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>????????????????????????????????????</th>
            <th>????????????????????????????????????</th>
            <th>?????????????????????????????????</th>
            <th>?????????????????????????????????????????????</th>
            <th>???????????????????????????????????????????????????</th>
        </tr>
        </thead>
        <tbody>
        
           <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
     
        </tbody>
      
    </table>
	<button type="button" class="btn btn-primary"onclick="SaveFormula()" >
		<span class="fa fa-save" aria-hidden="true"></span>&nbsp;Save</button><p>
  
  
  </div>
  </div>
  </div>

  
  <!----- Add Modal ---------------------------------------------------------->
<div class="modal fade" id="exampleModal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">??????????????????????????????</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
         <div class="modal-body">
         <form>
          <div class="form-group">
          <label for="recipient-name" class="col-form-label">?????????????????????:</label>
          <select id="txtproid">
          @foreach($dataset['dataproduct'] as $var)
            <option value="{{$var->product_id}}">{{$var->product_name}}</option>
            @endforeach
            </select>
           
        </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">?????????????????????????????????????????????:</label>
            <div class="inner-addon">
            <input type="number" class="form-control" id="txtperday">
          </div>
          </div>

     
    </div>
    
         
          </form>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">??????????????????</button>
        <button type="button"  onclick="saveAmountPerday()"class="btn btn-primary">
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
			<div class="gs-item set-bg" data-setbg="img/instagram/1.jpg"></div>
			<div class="gs-item set-bg" data-setbg="img/instagram/2.jpg"></div>
			<div class="gs-item set-bg" data-setbg="img/instagram/3.jpg"></div>
			<div class="gs-item set-bg" data-setbg="img/instagram/4.jpg"></div>
			<div class="gs-item set-bg" data-setbg="img/instagram/5.jpg"></div>
			<div class="gs-item set-bg" data-setbg="img/instagram/6.jpg"></div>
		</div>
	</div>
	<!-- Gallery section end -->


	<!-- Footer section  -->
	<footer class="footer-section set-bg" data-setbg="img/footer-bg.jpg">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<div class="footer-logo">
						<img src="img/??????????????????????????????.png" alt="">
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
	
</body>
</html>
<script type="text/javascript" >
$('#example').DataTable( {
    
} );

</script>
<script>
  function saveAmountPerday(){
  
    txtproid = $("#txtproid").val();
    txtperday = $("#txtperday").val();
  $.ajax({
  type:"POST",
  url:'{{URL::to("EditAmountPerday/saveProductivity")}}',
  data:{
    txtproid: txtproid,
    txtperday: txtperday,
    _token:"{{ csrf_token() }}"
        },success:function(result){
          alert(result.message);00
          window.location.reload();
        },fail:function(result,status,error){
          alert("fail")
        },error:function(result,status,error){
          
          alert("error")
        }
    })
   
  }

  function SaveFormula(){
	
	idtxt = [];
         $('input[name="idtxt[]"]').each(function(){
			if(this.value){
            var str = this.value;
            idtxt.push(str);
			}
          });
		  vitytxt = [];
         $('input[name="vitytxt[]"]').each(function(){
			if(this.value){
            var str = this.value;
            vitytxt.push(str);
			}
          });
$.ajax({
type:"POST",
url:'{{URL::to("EditAmountPerday/uptotalPerday")}}',
data:{
	idtxt: idtxt,
	vitytxt: vitytxt,
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
  </script>