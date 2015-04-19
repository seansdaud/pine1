//Zone
var country_arr = new Array("Mechi", "Koshi","Sagarmatha","Janakpur","Bagmati","Narayani", "Gandaki","Lumbini","Dhauligiri","Rapti","Karnali","Bheri","Seti","Mahakali");

// District
var s_a = new Array();
s_a[0]="";
s_a[1]="Ilam|Jhapa|Panchthar|Taplejung"; //Mechi
s_a[2]="Bhojpur|Dhankuta|Morang|Sankhuwasabha|Sunsari|Terhathum";
s_a[3]="Khotang|Okhaldhunga|Saptari|Siraha|Solukhumbu|Udayapur";
s_a[4]="Dhanusa|Dholkha|Mahottari|Ramechhap|Sarlahi|Sindhuli";
s_a[5]="Bhaktapur|Dhading|Kathmandu|Kavrepalanchok|Lalitpur|Nuwakot|Rasuwa|Sindhupalchok";
s_a[6]="Bara|Chitwan|Makwanpur|Parsa|Rautahat";
s_a[7]="Gorkha|Kaski|Lamjung|Manang|Syangja|Tanahu"; //Gandaki
s_a[8]="Arghakhanchi|Gulmi|Kapilvastu|Nawalparasi|Palpa|Rupandehi";
s_a[9]="Baglung|Mustang|Myagdi|Parbat"; //Dhauligiri
s_a[10]="Dang|Pyuthan|Rolpa|Rukum|Salyan";
s_a[11]="Dolpa|Humla|Jumla|Kalikot|Mugu";  //Karnali
s_a[12]="Banke|Bardiya|Dailekh|Jajarkot|Surkhet";
s_a[13]="Achham|Bajhang|Bajura|Doti|Kailali";
s_a[14]="Baitadi|Dadeldhura|Darchula|Kanchanpur";

function populateStates( countryElementId, stateElementId ){
	
	var selectedCountryIndex = document.getElementById( countryElementId ).selectedIndex;

	var stateElement = document.getElementById( stateElementId );
	
	stateElement.length=0;	
	stateElement.options[0] = new Option('Choose District','');
	stateElement.selectedIndex = 0;
	
	var state_arr = s_a[selectedCountryIndex].split("|");
	
	for (var i=0; i<state_arr.length; i++) {
		stateElement.options[stateElement.length] = new Option(state_arr[i],state_arr[i]);
	}
}

function populateCountries(countryElementId, stateElementId){
	// given the id of the <select> tag as function argument, it inserts <option> tags
	var countryElement = document.getElementById(countryElementId);
	countryElement.length=0;
	countryElement.options[0] = new Option('Select Zone','-1');
	countryElement.selectedIndex = 0;
	for (var i=0; i<country_arr.length; i++) {
		countryElement.options[countryElement.length] = new Option(country_arr[i],country_arr[i]);
	}

	// Assigned all countries. Now assign event listener for the states.

	if( stateElementId ){
		countryElement.onchange = function(){
			populateStates( countryElementId, stateElementId );
		};
	}
}
