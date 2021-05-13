/* Author : Sandeep Athiyarath   102005528
 * Target : apply.html and jobs.html
 * Purpose: To create a basic html and use javascript on it
 * Created: 20/04/2019
 * Updated: 24/04/2019
 */

 "use strict";
 //function to check if the form validates true for all requirements
 function validate(){
   var errmsg="";
 	 var result=true;
/*-------------------------------------------------------------------------*/
/*             AGE CALCULATION AND CHECK FOR ELIGIBILITY FOR JOB           */
/*-------------------------------------------------------------------------*/
   var date = document.getElementById("dob").value;
  // splitting the date(dd/mm/yyyy) into 3 components(dd,mm and yyyy)
  //and storing them in an array
   var  split = date.split('/');
   //changing the date format to mm/dd/yyyy for age calculation
   var dob = [split[1], split[0], split[2]].join('/');
   //storing the date of birth as a date type variable
   var birth = new Date(dob);
   var ageErr = calculateAge(birth);
   //printing age error below date of birth field in form
   if(ageErr!=""){
      errmsg+= ageErr.link("apply.html#dob") + "<br/>";
      document.getElementById("ageerror").style.color = "red";
      document.getElementById("ageerror").textContent = ageErr;
   }
   else{
     document.getElementById("ageerror").textContent = "";
   }

   /*-------------------------------------------------------------------------*/
   /*                   POSTCODE AND STATE VALIDATION                         */
   /*-------------------------------------------------------------------------*/
   var postcode = document.getElementById("post").value;
   var state = document.getElementById("state").value;
   //call the function to check for validity of postcode and state
   var stateErr = statePostcodeValidator(state,postcode);
   //print error message below post code in form
   if(stateErr!=""){
      errmsg+= stateErr.link("apply.html#post") + "<br/>";
      document.getElementById("addresserror").textContent = stateErr;
      document.getElementById("addresserror").style.color = "red";
   }
   else{
     document.getElementById("addresserror").textContent = "";
   }
   /*-------------------------------------------------------------------------*/
   /*                        OTHER SKILLS CHECK                               */
   /*-------------------------------------------------------------------------*/
   var skillErr = otherSkillsValidation();
   //call the function to validate other skills
   var other = document.getElementById("comments");
   if(skillErr!=""){
     errmsg+=skillErr.link("apply.html#comments") + "<br/>";
     document.getElementById("skillserror").textContent = skillErr;
     document.getElementById("skillserror").style.color = "red";
   }
   else{
     document.getElementById("skillserror").textContent = "";
   }
   /*-------------------------------------------------------------------------*/
   /*            DISPLAY ERROR MESSAGES ON VALIDATION ERRORS                  */
   /*               ELSE STORE VALUES OF ALL FORM ELEMENTS                    */
   /*-------------------------------------------------------------------------*/
   //displays all error messages above submit buttons as hyperlinks to where
   //error has occured
   if(errmsg!=""){
     var displayError = document.getElementById("errmsg");
     displayError.innerHTML = errmsg;
     displayError.style.color = "red";
     result = false;
   }
   //if no errors are found the valid data is storedd in local storage
   else {
     storeDataInSessionStorage(date,state,postcode);
   }
   //return result of all form checks
   //form will be submitted only if result value is true
   return result;
 }

 //function for calculating age and checking eligibility to apply
 function calculateAge(birth) {
     var today = new Date();
     var tempmsg ="";
     var age = today.getFullYear() - birth.getFullYear();
     if(today.getMonth() <= birth.getMonth() && today.getDate() > birth.getDate()){
       age--;
     }
     if(age<15 || age>80){
        tempmsg = "You do not fall under the specific age limit. You should be between 15 and 80 to apply.";
     }
     return tempmsg;
 }

 //function for postcode and state validation
function statePostcodeValidator(state,postcode){
  //extract the first digit(now in floating form)
   var firstPostcodeDigit = postcode/1000;
   var errmsg = "";
   //converts the value to its floor value and is used as input for switch case
   switch (Math.floor(firstPostcodeDigit)) {
     case 3:
     case 8: if(state!="VIC"){
                  errmsg = postcode + "is postcode for VIC, please enter a valid postcode for "+state;
                }
              break;
     case 1:
     case 2: if(state!="NSW"){
                  errmsg = postcode + " is postcode for NSW, please enter a valid postcode for "+state;
                }
                break;
      case 4:
      case 9: if(state!="QLD"){
                  errmsg = postcode + " is postcode for QLD, please enter a valid postcode for "+state;
                 }
                 break;
      case 0: if(state!="NT" && state!="ACT"){
                  errmsg = postcode + " is postcode for ACT or NT, please enter a valid postcode for "+state;
              }
              break;
      case 6:if(state!="WA"){
                  errmsg = postcode + " is postcode for WA, please enter a valid postcode for "+state;
             }
             break;
      case 7:if(state!="TAS"){
                  errmsg = postcode + "is postcode for TAS, please enter a valid postcode for "+state;
             }
            break;
      case 5:if(state!="SA"){
                  errmsg = postcode + " is postcode for SA, please enter a valid postcode for "+state;
             }
             break;
     default: errmsg = "Unknown postcode"
   }
   return errmsg;
 }

//function to check other skills
function otherSkillsValidation(){
  var otherSkills = document.getElementById("other").checked;
  var comments = document.getElementById("comments").value;
  var errmsg = "";
  if(otherSkills && comments.length==0){
      errmsg = "Please enter other skills in comments section";
  }
  return errmsg;
}
/*-------------------------------------------------------------------------*/
/*               STORING JOB REFNO TO LOCAL STORAGE                        */
/*-------------------------------------------------------------------------*/
function storeJobTitle(){
  var formTitle = this.id;
  localStorage.ref = formTitle;
}

/*-------------------------------------------------------------------------*/
/*     STORING ALL FIELDS TO SESSION STORAGE UPON SUCCESSFUL               */
/*                   VALIDATION OF ALL REQUIREMENTS                        */
/*-------------------------------------------------------------------------*/
function storeDataInSessionStorage(dob,state,postcode) {
  var firstName = document.getElementById("fname").value;
  var lastName = document.getElementById("lname").value;
  var street = document.getElementById("street").value;
  var suburb = document.getElementById("sub").value;
  var email = document.getElementById("email").value;
  var phone = document.getElementById("ph").value;
  var otherSkills = document.getElementById("comments").value;
  var gender = document.querySelector('input[name="gender"]:checked');
  sessionStorage.firstName = firstName;
  sessionStorage.lastName = lastName;
  sessionStorage.dob = dob;
  sessionStorage.street = street;
  sessionStorage.suburb = suburb;
  sessionStorage.state = state;
  sessionStorage.postCode = postcode;
  sessionStorage.email = email;
  sessionStorage.phone = phone;
  sessionStorage.otherSkills = otherSkills;
  sessionStorage.gender = gender.value;
  sessionStorage.skills = getSelectedSkills();
}

//function to store all the selected skills to sessionStorage
function getSelectedSkills(){
  var skills = document.getElementsByName('skills[]');
  var skillsArray = [];
  for(var i=0;i<skills.length;i++) {
    if(skills[i].checked){
      skillsArray.push(skills[i].value);
    }
  }
  return skillsArray;
}

/*-------------------------------------------------------------------------*/
/*               AUTOFILL ALL FIELDS WITH THE STORED VALUES                */
/*-------------------------------------------------------------------------*/
function prefillForm(){
  if(sessionStorage.firstName != undefined ){

    document.getElementById("fname").value = sessionStorage.firstName;
    document.getElementById("lname").value = sessionStorage.lastName;
    document.getElementById("dob").value = sessionStorage.dob;

    document.getElementById("street").value = sessionStorage.street;
    document.getElementById("sub").value = sessionStorage.suburb;
    document.getElementById("state").value = sessionStorage.state;
    document.getElementById("post").value = sessionStorage.postCode;
    document.getElementById("email").value = sessionStorage.email;
    document.getElementById("ph").value = sessionStorage.phone;
    document.getElementById("comments").value = sessionStorage.otherSkills;

    prefillgender();
    prefillSkills();
}
}
//function to prefill skills
function prefillSkills(){
  var skills = sessionStorage.skills.split(',');
  var skillsInputs = document.getElementsByName("skills[]");
  if(sessionStorage.skills != undefined && sessionStorage.skills != "" && sessionStorage.skills != null){
    for (var i = 0; i < skills.length; i++) {
      for (var j = 0; j < skillsInputs.length; j++) {
        if(skills[i]==skillsInputs[j].value){
          skillsInputs[j].checked = true;
        }
      }
    }
  }
}
//function to prefill gender
function prefillgender(){
  var gender = document.getElementsByName("gender");
  if(sessionStorage.gender != undefined && sessionStorage.gender != "" && sessionStorage.gender != null){
    for(var i=0;i<gender.length;i++) {
        if(gender[i].value == sessionStorage.gender) {
            gender[i].checked = true;
      }
    }
  }
}
/*-------------------------------------------------------------------------*/
/*                        MAIN/INITIALISATION FUNCTION                     */
/*-------------------------------------------------------------------------*/
 function init(){
   //to read the reference id from jobs.html
   var applyNow = document.getElementsByClassName("btn job");
   if (applyNow){
     //changeImg();
     for(var i =0;i<applyNow.length;i++) {
         applyNow[i].onclick = storeJobTitle;
     }
   }
   // to create slide show in jobs page
   var slide = document.getElementById("slide");
   if(slide){
     changeImg();
   }
  //to validate and check for form elements data integrity
 	var regForm = document.getElementById("regform");
  if(regForm){
    // calling the fundtion from enhancemnets.js for timer
    timedCount();
    if(localStorage.ref!=undefined){
      document.getElementById("ref").value = localStorage.ref;
    }
 //function to prefill the form with valid data stored in sessionStorage
      prefillForm();
     // regForm.onsubmit = validate;
  }

 }
 window.onload = init;
