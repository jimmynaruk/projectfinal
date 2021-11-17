<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>สมัครสมาชิก</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">LOGIN</h2>
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-2" type="text"onkeypress="return checkText(this)" placeholder="ชื่อผู้ใช้" name="id"id="idtxt">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="password" onkeypress="return checkText(this)" placeholder="รหัสผ่าน" name="password" id="passtxt">
                        </div>
                        <p><a href="{{URL::TO('register')}}">สมัครสมาชิกเข้าใช้งานระบบ</a></p>
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" onclick="Checklogin()"type="button">login</button>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
<script>
function Checklogin(){
    idtxt = $("#idtxt").val();
    passtxt = $("#passtxt").val();
		if(idtxt==''){
            alert('กรุณากรอกชื่อผู้ใช้');
            return false;
        }else if(passtxt ==''){
		alert('กรุณากรอกรหัสผ่าน');
		return false;
		}
		$.ajax({
        type:"POST",
        url:'{{URL::to("login/checkusernamepassword")}}', 
        data:{
            idtxt: idtxt,
            passtxt: passtxt,
          _token:"{{ csrf_token() }}"
          },success:function(result){
		   alert(result.message);
           window.location="http://localhost/projectfinal/public/main";
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