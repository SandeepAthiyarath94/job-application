/* Author : Sandeep Athiyarath   102005528
 * Target : apply.html and jobs.html
 * Purpose: To timer and slideshow
 * Created: 25/04/2019
 * Updated: 27/04/2019
 */
"use strict";
// total seconds of time for filling the form before redirecting
  var totalSeconds = 200;
/******************************************************************************/
/*                          TIMER FUNCTION                                    */
/******************************************************************************/
function timedCount() {
  var min = totalSeconds;
  // spliting the time into minutes and seconds
  var minutes = Math.floor(min / 60);
  var secd = min % 60;
  var seconds = Math.ceil(secd);
  //display timer in form page
  document.getElementById("timer").innerHTML = "Time left  " + minutes+":"+seconds;
  /*if timer runs out alert message is displayed and the page is redirected
   to the home page(index.html)*/
  if(totalSeconds==0){
    alert("Sorry!!!!..  Page Timed out");
     window.location.href = "index.html";// redirect to home page
  }
  /*change the color of time displayed to red as a warning to the user*/
  if(totalSeconds<30){
    document.getElementById("timer").style.color = "red";
  }
  //incrementing the total seconds
  totalSeconds = totalSeconds - 1;
  //recursive calling of timeCount function until totalSeconds become zero
  setTimeout(timedCount, 1000);
}


/******************************************************************************/
/*                          SLIDE SHOW FUNCTION                               */
/******************************************************************************/
var index = 0;
var images = [];
var time = 3000;
// images are repetitvely changed every 3 seconds
function changeImg(){
  images[0]="images/image1.jpg";
  images[1]="images/image2.jpg";
  images[2]="images/image3.jpg";
  document.getElementById("slide").src=images[index];
//increment array index by 1 if value of i is less that (length of array - 1)
  if(index<images.length - 1){
    index++;
  }
  //reset the value of index to 0
  else{
    index=0;
  }
  setTimeout(changeImg, time);
}
