var fontSize = 1;
function zoomIn() {
    fontSize += 0.1;
   // document.body.style.fontSize = fontSize + "em";
	 $('#txtHint').css("font-size", fontSize + "em");
}
function zoomOut() {
    fontSize -= 0.1;
   // document.body.style.fontSize = fontSize + "em";
   $('#txtHint').css("font-size", fontSize + "em");
}