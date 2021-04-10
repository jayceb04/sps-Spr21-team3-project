


async function GetMessage() {
    const responseFromServer = await fetch('/question-data');
    const textFromResponse = await responseFromServer.text();
    const messageContainer = document.getElementById('account-name');
    messageContainer.innerText = textFromResponse;

}

 function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
  
// Google Sign in Auth
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  accountID = profile.getId();
  window.accountName = profile.getName();
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}

function loadUserInfo(googleUser){
    const messageContainer = document.getElementById('account-name');
    messageContainer.innerText = window.accountName;
}
function onLoadGoogleCallback(){
  gapi.load('auth2', function() {
    auth2 = gapi.auth2.init({
      client_id: '1055777818620-l4sjm83glehidqtf7niespm6qq5rjeig.apps.googleusercontent.com',
      cookiepolicy: 'single_host_origin',
      scope: 'profile'
    });
    auth2.attachClickHandler(element, {},
      function(googleUser) {
          console.log('Signed in: ' + googleUser.getBasicProfile().getName());
        }, function(error) {
          console.log('Sign-in error', error);
        }
      );
    });

    element = document.getElementById('googleSignIn');
  }


(function () {
  'use strict'
  var forms = document.querySelectorAll('.needs-validation')

  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      window.addEventListener('load', function (event) {
        //When the page is loaded, it checks to see if there is anything valid in each text box
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
})()

function ValidateEmail(form){
  var email = form.email.value;

  var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
 if(email.match(mailformat)){
    return (true)
  }
    alert("You have entered an invalid email address!")
    return (false)
    console.log(email);
}

function checkPassword(form) {
  password1 = form.password1.value;
  password2 = form.password2.value;
  fname = form.fname.value;
  lname = form.lname.value;

  if (fname == '')
    alert ("Please enter your first name");

  else if (fname == '')
    alert ("Please enter your last name");

  else if (password1 == '')
    alert ("Please enter Password");

  else if (password2 == '')
    alert ("Please enter confirm password");

  else if (password1 != password2) {
    alert ("Password did not match: Please try again...")
    return false;
  }
}
// Geez these were a pain in the ass
