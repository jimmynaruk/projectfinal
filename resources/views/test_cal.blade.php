
<h3><center>โปรแกรมคำนวนส่วนผสม<center> </h3>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  xml:lang="tr" lang="tr" dir="ltr">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<style type="text/css">

html,body,div,span,h1,h2,h3,p,hr,br,img,form,input,ul,li,a {
 margin:0;
 padding:0;
 border:0;
}
ul li {list-style:none;}
body {
 font-family:Helvetica, Arial, Tahoma, sans-serif;
 font-size:13px;
 color:#444;
 line-height:1.5em;
} 
#kapsayici {
background:#fff;
margin:10px auto;
width:960px;
border:1px solid #dfdfdf;
min-height: 700px;
}
input {
border:1px solid #dfdfdf;
}

</style>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" ></script>
<script type="text/javascript">
$.fn.fonkTopla = function() {
var total = 0;
this.each(function() {
   var deger = fonkDeger($(this).val());
   total += deger;
});
return total;
};


function fonkDeger(veri) {
    return (veri != '') ? parseInt(veri) : 0;
}

$(document).ready(function(){
$('input[name^="za"]').bind('keyup', function() {
   $('#total').html( $('input[name^="za"]').fonkTopla());
});
});
</script>
</head>
<body>
<div id="kapsayici">

 <ul>
  <li><input type="text" name="za[]" /></li>
  <li><input type="text" name="za[]" /></li>
  <li><input type="text" name="za[]" /></li>
 </ul>
Toplam: <span id="total"></span>

</div>
</body>
</html>