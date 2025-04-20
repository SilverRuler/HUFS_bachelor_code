<html>
<head>
<title>생년월일 운세</title>

<meta http-equiv="Content-Type" content="text/html; charset=EUC-KR">

<script language="javascript">

function check_jumin() { 

 var jumin=document.getElementById('jumin1').value + document.getElementById('jumin2').value;
  var fmt = /^\d{6}[1234]\d{6}$/;  //포맷 설정 ,양식체크 , regular expression 패턴임.
  if (!fmt.test(jumin)) {
      return false;
  }
  var birthYear = (jumin.charAt(6) <= "2") ? "19" : "20";
  birthYear += jumin.substr(0, 2);
  var birthMonth = jumin.substr(2, 2) - 1;
  var birthDate = jumin.substr(4, 2);
  var birth = new Date(birthYear, birthMonth, birthDate);

  if ( birth.getYear() % 100 != jumin.substr(0, 2) ||
       birth.getMonth() != birthMonth ||
       birth.getDate() != birthDate) {
     return false;
  }


  // Check Sum 코드의 유효성 검사
  var buf = new Array(13);
  for (var i = 0; i < 13; i++) buf[i] = parseInt(jumin.charAt(i));
 
  multipliers = [2,3,4,5,6,7,8,9,2,3,4,5];
  for (var sum = 0, i = 0; i < 12; i++) sum += (buf[i] *= multipliers[i]);

  if ((11 - (sum % 11)) % 10 != buf[12]) {
     return false;
  }

  
  return true;
}


function checks(){
 if(check_jumin())
  alert("구축중입니다...");

 else
  alert("생년월일 주민번호가 올바르지 않습니다.");
}



function nextgo(e){  
  if (e.value.length>=6) {
   document.getElementById('jumin2').focus();
  }
}



</script>
</head>


<body>
<?php
echo "<center> <h1> 운세를 점칠 생년월일을 기입하세요.</h1></center>";
?>



<input type="text" id="jumin1" name="jumin1" onKeyUp="nextgo(this);"/> 
-<input type="password" id="jumin2" name="jumin2" />

<input type="button" onClick="checks()" value="운세보기"/>

</body>
</html>