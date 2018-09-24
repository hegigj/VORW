$(document).ready(function () {
   $("#regUsr").click(function () {
       $("#userLogin").load("UsrReg.php");
       $("#userLogin").css('height','620px')
   });
   $("#logUsr").click(function () {
       $("#userLogin").load("UsrLog.php");
       $("#userLogin").css('height','250px')
   });
   $("#usrWait,#usrCW").click(function () {
      $("#usrAction").load("UwaiterR.php");
      $("#usrAction").css('width','30%');
      $("#usrAction").css('height','505px');
      $("#usrAction").css('background-color','green');
      $("#usrAction").css('border-radius','10px');
   });
    $("#usrProd,#usrCP").click(function () {
        $("#usrAction").load("UproductR.php");
        $("#usrAction").css('width','30%');
        $("#usrAction").css('height','570px');
        $("#usrAction").css('background-color','green');
        $("#usrAction").css('border-radius','10px');
    });
    $("#usrInvent,#usrRM").click(function () {
        $("#usrAction").load("UinventoryR.php");
        $("#usrAction").css('width','30%');
        $("#usrAction").css('height','615px');
        $("#usrAction").css('background-color','green');
        $("#usrAction").css('border-radius','10px');
    });
    $("#usrShtoM").click(function () {
        $("#usrAction").css('width','30%');
        $("#usrAction").css('height','615px');
        $("#usrAction").css('background-color','green');
        $("#usrAction").css('border-radius','10px');
    });
   $("#usrMW").click(function () {
      $("#usrAction").load("UwaiterM.php");
       $("#usrAction").css('width','80%');
       $("#usrAction").css('height','inherit');
       $("#usrAction").css('background-color','white');
       $("#usrAction").css('border-radius','10px');
       $("#usrAction").css('border','2px solid green');
   });
    $("#usrMP").click(function () {
        $("#usrAction").load("UproductM.php");
        $("#usrAction").css('width','80%');
        $("#usrAction").css('height','inherit');
        $("#usrAction").css('background-color','white');
        $("#usrAction").css('border-radius','10px');
        $("#usrAction").css('border','2px solid green');
    });
    $("#usrRRP").click(function () {
        $("#usrAction").load("UinventoryR1.php");
        $("#usrAction").css('width','30%');
        $("#usrAction").css('height','660px');
        $("#usrAction").css('background-color','green');
        $("#usrAction").css('border-radius','10px');
    });
    $("#usrMI").click(function () {
        $("#usrAction").load("UinventoryM.php");
        $("#usrAction").css('width','80%');
        $("#usrAction").css('height','inherit');
        $("#usrAction").css('background-color','white');
        $("#usrAction").css('border-radius','10px');
        $("#usrAction").css('border','2px solid green');
    });
    $("#usrSales").click(function () {
        $("#usrAction").load("UsalesW.php");
        $("#usrAction").css('width','80%');
        $("#usrAction").css('height','inherit');
        $("#usrAction").css('background-color','white');
        $("#usrAction").css('border-radius','10px');
        $("#usrAction").css('border','2px solid green');
    });
    $("#usrAcco").click(function () {
        $("#usrAction").load("UaccountM.php");
        $("#usrAction").css('width','80%');
        $("#usrAction").css('height','inherit');
        $("#usrAction").css('background-color','white');
        $("#usrAction").css('border-radius','10px');
        $("#usrAction").css('border','2px solid green');
    });
});