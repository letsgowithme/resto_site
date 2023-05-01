 

  let mydate = new Date()
	let day = mydate.getDay()

	 {/* let day = document.querySelector('#day');  */}
  let openingTimeMidday = document.querySelector('#openingTimeMidday');
  let closingTimeMidday = document.querySelector('#closingTimeMidday');
  let openingTimeEvening = document.querySelector('#openingTimeEvening');
  let closingTimeEvening = document.querySelector('#closingTimeEvening');  
	 
	//    let day = document.getElementById('day');
  // let openingTimeMidday = document.getElementById('openingTimeMidday');
  // let closingTimeMidday = document.getElementById('closingTimeMidday');
  // let openingTimeEvening = document.getElementById('openingTimeEvening');
  // let closingTimeEvening = document.getElementById('closingTimeEvening'); 

	
	switch(day) {
		case 1: 'Lundi'+' :'+openingTimeMidday+' - '+closingTimeMidday+' - '+openingTimeEvening+' - '+closingTimeEvening;
		break;
		case 2: 'Mardi'+' :'+openingTimeMidday+' - '+closingTimeMidday+' - '+openingTimeEvening+' - '+closingTimeEvening;;
		break;
		case 3: 'Mercredi - Fermé';
		break;
		case 4:'Jeudi'+' :'+openingTimeMidday+' - '+closingTimeMidday+' - '+openingTimeEvening+' - '+closingTimeEvening;;
		break;
		case 5: 'Vendredi'+' :'+openingTimeMidday+' - '+closingTimeMidday+' - '+openingTimeEvening+' - '+closingTimeEvening;;
		break;
		case 6: 'Samedi'+' :'+openingTimeMidday+' - '+closingTimeMidday+' - '+openingTimeEvening+' - '+closingTimeEvening;;
		break;
		case 7: 'Dimanche'+' :'+openingTimeMidday+' - '+closingTimeMidday+' - '+openingTimeEvening+' - '+closingTimeEvening;;
		break;

	}
	// let month = mydate.getMonth() 
	// let daym = mydate.getDate()
	
	let dayarray=new Array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi")
	//  let montharray=new Array(" janvier "," fevrier "," mars ","avril ","mai ","juin","juillet ","aout ","septembre "," octobre "," novembre "," décembre ") 
	
document.write(dayarray[day]+' '+openingTimeMidday+' '+closingTimeMidday)
 {/* document.write("   "+dayarray[day]+", "+daym+" "+montharray[month]+year+" ") 
	 document.write(day+':'+openingTimeMidday+' - '+closingTimeMidday+'<br>'+openingTimeEvening+' - '+closingTimeEvening); 
	 */}



/* Fonction Heure */
// function dsptime() {
//   var heure;
//   date = new Date();
//   h = date.getHours();
//   m = date.getMinutes();
//   s = date.getSeconds();
//   hh = date.getHours();
//   h = h > 12 ? h % 12 : h;





// document.write("<font color='#000000' size='4' face='arial'>")
// let mydate=new Date()
// let year=mydate.getYear()
// if (year<2000)
// year += (year < 1900) ? 1900 : 0
// let day=mydate.getDay()
// let month=mydate.getMonth()
// let daym=mydate.getDate()
// if (daym<10)
// daym="0"+daym
// let dayarray=new Array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi")
// let montharray=new Array(" janvier "," fevrier "," mars ","avril ","mai ","juin","juillet ","aout ","septembre "," octobre "," novembre "," décembre ")
// document.write("   "+dayarray[day]+", "+daym+" "+montharray[month]+year+" ")
// document.write("</b></i></font>")





// function dspSchedule() {
//   let day = document.querySelector('#day');
//   let openingTimeMidday = document.querySelector('#openingTimeMidday');
//   let closingTimeMidday = document.querySelector('#closingTimeMidday');
//   let openingTimeEvening = document.querySelector('#openingTimeEvening');
//   let closingTimeEvening = document.querySelector('#closingTimeEvening');

//   let time = document.querySelector('#time');

//   var heure;
//   date = new Date();
//   h = date.getHours();
//   m = date.getMinutes();
//   s = date.getSeconds();
//   hh = date.getHours();
//   h = h > 12 ? h % 12 : h;

//   heure = (h < 10 ? '0' : '') + h + ':' + (m < 10 ? '0' : '') + m + ':' + (s < 10 ? '0' : '') + s + (hh < 12 ? ' am' : ' pm');
  
//   document.querySelector('#time').innerHTML = heure;
  
//   return heure;
// }
// dsptime();


