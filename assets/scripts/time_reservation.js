document.write("<font color='#000000' size='4' face='arial'>")

// let day = document.querySelector('#day');

  let openingTimeMidday = document.querySelector('#openingTimeMidday');
  openingTimeMidday = '12:00';
let mydate=new Date()
let day=mydate.getDay()
let time=mydate.getHours()
let min=mydate.getMinutes()

// let daym=mydate.getDate()
// if (daym<10)
// daym="0"+daym
let dayarray=new Array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi")
let hours_array=new Array("12","12","12","12","13");
let min_array=new Array("00","15","30","45");

document.write("   "+dayarray[day]+", "+hours_array+" "+min_array+" ")
document.write("</b></i></font>")

