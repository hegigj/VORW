$(document).ready(function () {
   $('#AL').click(function () {
       $.cookie('googtrans','/sq');
       $('#content').load('CproceedP.php');
   });
    $('#EN').click(function () {
        $.cookie('googtrans','/en');
        $('#content').load('CproceedP.php');
    });
    $('#EL').click(function () {
        $.cookie('googtrans','/el');
        $('#content').load('CproceedP.php');
    });
    $('#IT').click(function () {
        $.cookie('googtrans','/it');
        $('#content').load('CproceedP.php');
    });
    $('#TR').click(function () {
        $.cookie('googtrans','/tr');
        $('#content').load('CproceedP.php');
    });
    $('#proceed').click(function () {
        $('#content').load('CorderR.php');
    });
});
function desc(params) {
    var tr, td, img;
        tr=document.getElementsByTagName('tr');
        td=tr.getElementById(params[0]);
        img=td.getElementsByTagName('img');
        img.style.width='400px';
        img.style.height='inherit';
        img.src=params[1];
}
