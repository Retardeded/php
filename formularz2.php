<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Wpis formularz</title>
    
    
<script type="text/javascript">

var filesNumber = 1;
const maxFiles = 3;


function UpdateDate() {

var date = document.getElementById('dateValue');
var updatedDate = new Date();
var day = updatedDate.getDate();
if(day < 10)
{       
day = '0' + day;
}

var month = updatedDate.getMonth()+1;
if (month < 10)
{
month = '0' + month;
}
var year = updatedDate.getFullYear();
var fullDate = year + '-' + month + '-' + day;
date.value = fullDate;

}

function UpdateTime() {

var time = document.getElementById('timeValue');
var updatedTime = new Date();
var hours = updatedTime.getHours();
var minutes = updatedTime.getMinutes();
if(minutes < 10)
{       
minutes = '0' + minutes;
}

var fullTime = hours + ':' + minutes;
time.value = fullTime;

}

function CreateButton() {
   if (filesNumber < maxFiles){
      filesNumber++;

      var newButton = document.createElement('input');
      newButton.setAttribute("type", "file");
      newButton.setAttribute("name", "zalacznik" + filesNumber);
      newButton.setAttribute("onclick", "CreateButton()");

      var newLine = document.createElement('br');
      var filesSection = document.getElementById("filesSection");
      
     filesSection.appendChild(newButton);
     filesSection.appendChild(newLine);
     }

}

function VerifyDate()
{
   var dateText = document.getElementById('dateValue').value;
   var regexp = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/gi;
   if (!regexp.test(dateText)) {
      UpdateDate();
   }
}
    
function VerifyTime()
{
   var timeText = document.getElementById('timeValue').value;
   var regexp = /^(0[0-9]|1[0-9]|2[0-3]|[0-9]):[0-5][0-9]$/gi;
   if (!regexp.test(timeText)) {
      UpdateTime();
   }
}

function onload1() {
   UpdateDate();
   UpdateTime();
}


</script>

</head>
<body onload="onload1()">
    
    <?php include 'menu.php';?>
    
	<form action="wpis.php" method="post">

  <div>

  Nazwa użytkownika:<br />

  <input name="nazwaUzytkownika" value="" /><br />

  Hasło użytkownika:<br />

  <input type="password" name="hasloUzytkownika"  value="" /><br />

  Wpis:<br />

  <textarea name="wpis" rows="15" cols="40"></textarea><br />

  <input type="text" name="dateValue" id="dateValue" onchange="VerifyDate()">

  <input type="text" name="timeValue" id="timeValue" onchange="VerifyTime()">

  Załącz pliki: <br />
			<div id="filesSection">
 <input type="file" name="zalacznik1" onclick="CreateButton()"><br />
			 
		  </div>
		  	  <br />


  <input type="reset" value="Wyczyść" name="wyczysc" />
  <input type="submit" value="Wyślij" name="submit" />

  </div>

  </form>
</body>
</html>

