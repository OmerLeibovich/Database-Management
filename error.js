function error() { 
   var name = document.getElementById("username").value; 
    if (name.length < 5 || name.length > 20) {
     window.alert("השם חייב להכיל בין 5 ל20 תווים");
     exit;
    }
    
}

function errormail() {
    var MaiL =document.getElementById("mail").value;
    var firstS = MaiL.indexOf("@");
    var lastS = MaiL.lastIndexOf("@");
  if (firstS != lastS || firstS == -1 ) {
       window.alert("המייל חייב להכיל סימן @ אחד בלבד")
       exit;
       }
       
 }

 function success(){
    window.open("success_Contact.php");

 }