$(document).ready(function() {
$("#error_capslock").hide();
$( "#username" ).focus();
$(function () {
   var isShiftPressed = false;
   var isCapsOn = null;
   $("#passwors").bind("keydown", function (e) {
      var keyCode = e.keyCode ? e.keyCode : e.which;
      if (keyCode == 16) {
      isShiftPressed = true;
   }
   });
   $("#password").bind("keyup", function (e) {
      var keyCode = e.keyCode ? e.keyCode : e.which;
      if (keyCode == 16) {
         isShiftPressed = false;
      }
      if (keyCode == 20) {
         if (isCapsOn == true) {
             isCapsOn = false;
             $("#error_capslock").hide();
         } else if (isCapsOn == false) {
             isCapsOn = true;
             $("#error_capslock").show();
         }
      }
      });
      $("#password").bind("keypress", function (e) {
          var keyCode = e.keyCode ? e.keyCode : e.which;
          if (keyCode >= 65 && keyCode <= 90 
&& !isShiftPressed) {
             isCapsOn = true;
             $("#error_capslock").show();
          } else {
            $("#error_capslock").hide();
         }
         });
   });
	

});