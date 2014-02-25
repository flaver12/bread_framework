/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 * 
 * Load the tinyMCE editor for backend
 */

//To start tinymce
tinymce.init({
selector: "textarea#backendEditor"
});

//Save the input
window.onload = function(){

  var btn = document.getElementById('editor');

  btn.onclick = function(){
  	$.ajax({
  		url: "/editors/save",
  		method: "POST",
  		data: {editorInput:tinyMCE.activeEditor.getContent()},
  		success: function(msg) {
  			alert(msg);
  		}
  	});
  }
  return false;
}