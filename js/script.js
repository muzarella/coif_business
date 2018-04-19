/*
create a global array to hold all areas 

then create a function that allows each 



*/



// create for city that allows it to show ups  

var all_city = [" ","Abia","Abuja","Adamawa","Akwa-Ibom","Anambra",
 "Bauchi","Bayelsa","Benue","Borno","Cross","River",
 "Delta","Ebonyi","Edo","Ekiti","Enugu","Gombe",
 "Imo","Jigawa","Kaduna","Kano","Katsina",
 "Kebbi","Kogi","Kwara","Lagos","Nasarawa","Niger",
 "Ogun","Ondo","Osun","Oyo","Plateau","Rivers","Sokoto",
 "Taraba","Yobe","Zamfara" ] ;


function create_element_city() {
	var y = document.getElementById("location");
	var dar = document.createElement("option");
	dar.setAttribute("class", "city");
	y.appendChild(dar);
}

function clear_Parent_city() {
	var k = document.getElementById("location");
	var z = document.getElementsByClassName("city");
	
	for (var b = 0; b <= 10; b++) {
		for (var a = 0; a <= z.length - 1; a++){
		z[a].remove();
		}
	}
}

function validate_city() {
	var x = document.getElementById("country").value;
	
if (x == "Nigeria") {
	clear_Parent_city();
	for(var i = 0; i <= all_city.length - 1; i++){
		create_element_city();
		var tags = document.getElementsByClassName("city");
		tags[i].innerHTML = all_city[i];
	}

} else {
	clear_Parent_city();
		for(var i = 0; i <= no.length - 1; i++){
		create_element_city();
		var tags = document.getElementsByClassName("city");
		tags[i].innerHTML = no[i];
	}
	alert("Service available in nigeria Only");
}




};






var lag = [" ","Alimosho","Ajeromi-Ifelodun","Kosofe","Mushin","Oshodi-Isolo","Ojo","Ikorodu","Surulere","Agege","Ifako-Ijaye","Shomolu","Amuwo-Odofin","Lagos Mainland","Ikeja","Eti-Osa","Badagry","Apapa","Lagos Island","Epe","Ibeju-Lekki"];

var abj =[" ","Asokoro District","Maitama District","Wuse I","Wuse II","Garki I District","Garki II","Gwarinpa","Durumi District","Kukwuaba","Gudu","Wuye"];

var no = ["Location Unavailable"];

function create_element() {
	var y = document.getElementById("area");
	var dar = document.createElement("option");
	dar.setAttribute("class", "areas");
	y.appendChild(dar);
}

function clear_Parent() {
	var k = document.getElementById("area");
	var z = document.getElementsByClassName("areas");
	
	for (var b = 0; b <= 10; b++) {
		for (var a = 0; a <= z.length - 1; a++){
		z[a].remove();
		}
	}
}

function validate() {
	var x = document.getElementById("location").value;
	
if (x == "Lagos") {
	clear_Parent();
	for(var i = 0; i <= lag.length - 1; i++){
		create_element();
		var tags = document.getElementsByClassName("areas");
		tags[i].innerHTML = lag[i];
	}

} else if (x == "Abuja") {
	clear_Parent();
		for(var i = 0; i <= abj.length - 1; i++){
		create_element();
		var tags = document.getElementsByClassName("areas");
		tags[i].innerHTML = abj[i];
	}

	
} else {
	clear_Parent();
		for(var i = 0; i <= no.length - 1; i++){
		create_element();
		var tags = document.getElementsByClassName("areas");
		tags[i].innerHTML = no[i];
	}
	alert("Service available in Lagos and Abuja Only");
}




};

