function drawboard(coords) {
	var canvas = document.getElementById("map");
	var context2D = canvas.getContext("2d");
	
	//console.log(coords);
	var coordsLength = coords.length;
	for (var i = 0 ; i < coordsLength ; i++) {
		var coorddata = coords[i];
		//console.log(coorddata.x);
		//console.log(coorddata.y);
		//console.log(coorddata.color);

		var x = coorddata.x * 20;
		var y = coorddata.y * 20;
		color = coorddata.color;
		context2D.fillStyle = color;
		context2D.fillRect(x, y, 20, 20);
	}
};

function colorSquare(event) {
	if (typeof color === 'undefined' || color === null) {
		console.log("Set color to purple");
		color = "purple"; 
	}
	var canvas = document.getElementById("map");
	var context2D = canvas.getContext("2d");
	//document.body.textContent =
	console.log(
		"clientX: " + event.clientX +
		" - clientY: " + event.clientY );
	startX = Math.round(event.clientX / 20) * 20 - 20;
	//console.log("startX is" + startX);
	startY = Math.round(event.clientY / 20) * 20 - 20;
	//console.log("startY is" + startY);
	context2D.fillStyle = color;
	context2D.fillRect(startX, startY, 20, 20);
	//coords[startX / 20][startY / 20] = color;
	coords.push({"x":startX / 20,"y":startY / 20,"color":color });
	
}

function setColor(event) {
	var color = document.getElementById("color").value;
}

//function saveCoords(coords) {
//	$.ajax({		
//		type: "POST",
//		url: "save.php",
//		//]coords: { coords: coords },
//		data: { coords: JSON.stringify(coords) },
//		success: function() {
//			$("#lengthQuestion").fadeOut('slow');		
//		}
//	});
//	console.log(coords);
//	console.log("Trying to save");
//
//}


document.addEventListener("click", colorSquare);

window.onload = drawboard(coords);
