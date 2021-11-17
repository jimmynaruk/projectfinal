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

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">REGISTER</h2>
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-2" onkeypress="return checkText(this)"type="text" placeholder="ชื่อผู้ใช้" name="id"id="usernametxt">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" onkeypress="return checkText(this)"type="text" placeholder="รหัสผ่าน" name="password" id="passtxt">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2"onkeypress="return checkText(this)" type="text" placeholder="ยืนยันรหัสผ่าน"  id="conpasstxt">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="ชื่อ"  id="nametxt">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="นามสกุล"  id="lastnametxt">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text"onkeyup="autoTab(this)" onkeypress="return chkNumber(this)" placeholder="เบอร์โทรศัพท์"  id="teltxt">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="ที่อยู่จัดส่ง"  id="shiptxt">
                        </div>
                        
                        <p><a href="{{URL::TO('login')}}">ไปหน้าเข้าใช้งานระบบ</a></p>
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="button" onclick="createUser()">สมัครสมาชิก</button>
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
  
    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
<script>
function createUser(){
           
           usernametxt = $("#usernametxt").val();
           passtxt = $("#passtxt").val();
           conpasstxt = $("#conpasstxt").val();
           nametxt = $("#nametxt").val();
           lastnametxt = $("#lastnametxt").val();
           teltxt = $("#teltxt").val();
           shiptxt = $("#shiptxt").val();
           if(usernametxt==''){
           alert('กรุณากรอกชื่อ');
           return false;
           }else if(passtxt ==''){
           alert('กรุณากรอกรหัสผ่าน');
           return false;
           }else if(passtxt.length < 5  ){
           alert('กรอกรหัสผ่านอย่างน้อย 5 ตัว');
           return false;
           }else if(conpasstxt == ''){
           alert('กรุณายืนยันรหัสผ่าน');
           return false;
           }else if(passtxt != conpasstxt){
           alert('รหัสผ่านไม่ตรงกัน');		
           return false;
           }else if(nametxt == ''){
           alert('กรุณากรอกชื่อ');		
           return false;
           }else if(lastnametxt ==''){
           alert('กรุณากรอกนามสกุล');		
           return false;
           }else if(teltxt == ''){
           alert('กรุณากรอกเบอร์โทร');		
           return false;
           }else if(shiptxt == ''){
           alert('กรุณากรอกที่อยู่จัดส่ง');		
           return false;
           }
           $.ajax({
           type:"POST",
           url:'{{URL::to("register/createUser")}}', 
           data:{
            usernametxt: usernametxt,
            passtxt: passtxt,
            nametxt: nametxt,
            lastnametxt: lastnametxt,
            teltxt: teltxt,
            shiptxt:shiptxt,
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
   function chkNumber(ele) //พิมพ์ได้เฉพาะตัวเลข
	{
  //var phoneno = /^(?([0-9]{3}))*-([0-9]{3})*-([0-9]{4})$/;
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	ele.onKeyPress=vchar;
  }

  function checkText(ele)
	{
		var elem = String.fromCharCode(event.keyCode);
		if(!elem.match(/^([a-z0-9\_])+$/i)) return false;
		ele.onKeyPress=vchar;
		
	}

    function autoTab(obj){
    /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
    หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
    4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
    รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
    หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
    ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
    */
        var pattern=new String("___-___-____"); // กำหนดรูปแบบในนี้
        var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
        var returnText=new String("");
        var obj_l=obj.value.length;
        var obj_l2=obj_l-1;
        for(i=0;i<pattern.length;i++){           
            if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
                returnText+=obj.value+pattern_ex;
                obj.value=returnText;
            }
        }
        if(obj_l>=pattern.length){
            obj.value=obj.value.substr(0,pattern.length);           
        }
}
   </script>