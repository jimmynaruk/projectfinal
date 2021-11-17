<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js" >
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
body {
    padding-top: 90px;
}
.panel-login {
	border-color: #ccc;
	-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
	color: #00415d;
	background-color: #fff;
	border-color: #fff;
	text-align:center;
}
.panel-login>.panel-heading a{
	text-decoration: none;
	color: #666;
	font-weight: bold;
	font-size: 15px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
	color: #029f5b;
	font-size: 18px;
}
.panel-login>.panel-heading hr{
	margin-top: 10px;
	margin-bottom: 0px;
	clear: both;
	border: 0;
	height: 1px;
	background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
	background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
	height: 45px;
	border: 1px solid #ddd;
	font-size: 16px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
	outline:none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	border-color: #ccc;
}
.btn-login {
	background-color: #59B2E0;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #59B2E6;
}
.btn-login:hover,
.btn-login:focus {
	color: #fff;
	background-color: #53A3CD;
	border-color: #53A3CD;
}
/* .forgot-password {
	text-decoration: underline;
	color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
	text-decoration: underline;
	color: #666;
} */

.btn-register {
	background-color: #1CB94E;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #1CB94A;
}
.btn-register:hover,
.btn-register:focus {
	color: #fff;
	background-color: #1CA347;
	border-color: #1CA347;
}

</style>
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-login">
		<div class="panel-heading">
			<div class="row">

				<div class="col-xs-6">
				<a href="#" class="active" id="login-form-link">เข้าสู่ระบบ</a>
			</div>
		<div class="col-xs-6">
				<a href="#" id="register-form-link">ยืนยันสิทธิ์เข้าใช้ระบบ</a>
			</div>
			</div>
	<hr>
		</div>
		<div class="panel-body">
		<div class="row">
		<div class="col-lg-12">
			<form id="login-form"  method="post" role="form" style="display: block;">
			<div class="form-group">
			<input type="text" name="username" onkeypress="return checkText(this)"id="loginusername" tabindex="1" class="form-control" placeholder="ชื่อผู้ใช้" value="">
			</div>
			<div class="form-group">
				<input type="password" onkeypress="return checkText(this)"name="password" id="loginpassword" tabindex="2" class="form-control" placeholder="รหัสผ่าน">
			</div>
			
				<div class="form-group">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
					<button type="button" name="login" id="btnlogin"onclick="Checklogin()" tabindex="4" 
					class="form-control btn btn-login">เข้าสู่ระบบ</button>

				</div>
				</div>
				</div>
				<div class="form-group">
				<div class="row">
				<div class="col-lg-12">
						
				</div>
			</div>
		</div>
				</form>
				<form id="register-form"  method="post" role="form" style="display: none;">

				<div class="form-group">
			<input type="text" name="employid" onkeypress="return chkNumber(this)"id="txtemployid" tabindex="1" class="form-control" min="5" onkeypress="Checklang()" placeholder="รหัสพนักงานของคุณ" >
				</div>
				

				

				<div class="form-group">
					<input type="text" name="username" id="txtusernameregis"  onkeypress="return checkText(this)" tabindex="1" class="form-control" placeholder="ชื่อผู้ใช้">
				</div>
			
			
					<div class="form-group">
					<input type="password" onkeypress="return checkText(this)"  name="password" id="txtpasswordregis" tabindex="2" class="form-control"  placeholder="รหัสผ่าน">
				</div>
			<div class="form-group">
				<input type="password" onkeypress="return checkText(this)"name="confirm-password" id="txtconfirmpassword" tabindex="2" class="form-control" placeholder="ยืนยันรหัสผ่าน">
				</div>
				<div class="form-group">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
					<button type="button" name="register-submit" id="register-submit" onclick="createUser()" tabindex="4"
					 class="form-control btn btn-register" value="Register Now">ยืนยันสิทธิ์</button>
					
								</div>
							</div>
						</div>
				</form>
				</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
    <script>
	var input = document.getElementById("txtemployid");
	input.addEventListener("keypress", function(event) {
		console.log('event', event);
		console.log('event key', event.key);
  if (event.key === "Enter") {
   console.log(event.key);
  }
});


    $(function() {

$('#login-form-link').click(function(e) {
    $("#login-form").delay(100).fadeIn(100);
     $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
  
});
$('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
     $("#login-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $(this).addClass('active');
   
});

});

function createUser(){
           
			txtusernameregis = $("#txtusernameregis").val();
			txtemployid = $("#txtemployid").val();
			txtpasswordregis = $("#txtpasswordregis").val();
			txtconfirmpassword = $("#txtconfirmpassword").val();
			if(txtusernameregis==''){
            alert('กรุณากรอกชื่อ');
            return false;
            }else if(txtemployid==''){
			alert('กรุณากรอกรหัสพนักงาน');
            return false;
			}else if(txtpasswordregis ==''){
			alert('กรุณากรอกรหัสผ่าน');
			return false;
			}else if(txtpasswordregis.length < 5  ){
			alert('กรอกรหัสผ่านอย่างน้อย 5 ตัว');
			return false;
			}else if(txtconfirmpassword == ''){
			alert('กรุณายืนยันรหัสผ่าน');
			return false;
			}else if(txtpasswordregis != txtconfirmpassword){
			alert('รหัสผ่านไม่ตรงกัน');		
			return false;
			}
            $.ajax({
            type:"POST",
            url:'{{URL::to("login_register/createUser")}}', 
            data:{
			txtusernameregis: txtusernameregis,
			txtemployid: txtemployid,
			txtpasswordregis: txtpasswordregis,
          _token:"{{ csrf_token() }}"
          },success:function(result){
            alert(result.message);00
            window.location.reload();
          },fail:function(result,status,error){
            alert('failFunction');
          },error:function(result,status,error){
			  let msg = result.responseJSON.message
            
				alert(msg);
          }
        
      })
	}
	
	function chkString(ele)
	{
		var elem = String.fromCharCode(event.keyCode);
		 if(document.frmMain.inputcontact_topic.value.length < 5 || document.frmMain.inputcontact_topic.value.length > 20)
		 {
			alert('Please input String [5-20 Character] .');
			return false;
		 }
		 ele.onKeyPress=vchar;
	}
	function Checklogin(){
		loginusername = $("#loginusername").val();
		loginpassword = $("#loginpassword").val();
		if(loginusername==''){
            alert('กรุณากรอกชื่อผู้ใช้');
            return false;
        }else if(loginpassword ==''){
		alert('กรุณากรอกรหัสผ่าน');
		return false;
		}else if(loginpassword.length < 5  ){
		alert('กรอกรหัสผ่านอย่างน้อย 5 ตัว');
		return false;
		}
		$.ajax({
        type:"POST",
        url:'{{URL::to("login_register/checkusernamepassword")}}', 
        data:{
				loginusername: loginusername,
				loginpassword: loginpassword,
          _token:"{{ csrf_token() }}"
          },success:function(result){
		   alert(result.message);
           window.location="http://localhost/project/public/main";
          },fail:function(result,status,error){
            alert('failFunction');
          },error:function(result,status,error){
            console.log(result);
            console.log(status);
            console.log(error);
            alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
          }
        
      })
	}	
	function checkText(ele)
	{
		var elem = String.fromCharCode(event.keyCode);
		if(!elem.match(/^([a-z0-9\_])+$/i)) return false;
		ele.onKeyPress=vchar;
		
	}
	function chkNumber(ele) //พิมพ์ได้เฉพาะตัวเลข
	{
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	ele.onKeyPress=vchar;
  }
    </script>