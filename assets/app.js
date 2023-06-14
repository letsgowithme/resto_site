/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';


console.log('Nanana');

const main_title = document.getElementById("main_title");

main_title.addEventListener("click", changeColor);

function changeColor() { 
   $('main_title').style.color = 'green';
  main_title.style.color = "red";
 
}

/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
 
 
import jquery from 'jquery';
const $ = require('jquery');
global.$ = global.jQuery = $;
 
//import { Tooltip, Toast, Popover } from 'bootstrap';
  
// start the Stimulus application
// import './bootstrap';