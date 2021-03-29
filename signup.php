<?php include("includes/header.html");?>
<body class="bg signup-banner">
  <div class="row">
    <div class="col-12">
      <div class="col-6 white-bg">
        <div class="col-8 offset-2 d-flex justify-content-center">
          <div class="mx-auto">
            <a href="/#"><img src="img/node-tree.svg" width=90 height=90 alt="Node Tree"></a>
          </div>
        </div>
        <form class="row g-3 needs-validation" name="signupForm" onSubmit="return !!(checkPassword(this) & ValidateEmail(this)) " style="position:relative; top:55px;" novalidate>
          <div class="col-md-8 offset-2">
            <h3 style="margin-bottom:75px">Sign Up</h3>
          </div>
          <div class="form-outline btn-rounded form-floating col-md-4 offset-2">
            <input type="text" class="form-control" name="fname" placeholder="fname" required>
            <label class="form-label">First Name</label>
          </div>
          <div class="form-outline btn-rounded form-floating col-md-4">
            <input type="text" class="form-control" name="lname" placeholder="lname" required>
            <label class="form-label">Last Name</label>
          </div>
          <div class="form-outline btn-rounded form-floating col-md-8 offset-2">
            <input type="text" class="form-control" name="email" placeholder="Email" required>
            <label class="form-label">Email</label>
          </div>
          <div class="form-outline btn-rounded form-floating col-md-8 offset-2">
            <input type="text" class="form-control" name="password1" placeholder="Password" required>
            <label class="form-label">Password</label>
          </div>
          <div class="form-outline btn-rounded form-floating col-md-8 offset-2">
            <input type="text" class="form-control" name="password2" placeholder="Confirm Password" required>
            <label class="form-label">Confirm Password</label>
          </div>
          <div class="col-8 offset-2 text-center">
            <a href="/question"><button type="submit" value="Submit" class="nav-link green-solid-btn btn-rounded" href="#">Sign Up</button></a>
            <button type="button" class="btn btn-success btn-floating mt-2 mx-auto">
              <i id="googleSignIn" class="fab fa-google"></i>
              <script src="https://apis.google.com/js/platform.js?onload=onLoadGoogleCallback" async defer></script>
            </button>
          </div>
        </form>
      <div class="col-6 offset-1 ">
        <!-- Right Side Text here -->
      </div>
    </div>
  </div>
</body>

<script type="text/javascript">

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

function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}

//This is taken straight from Google's walk-through, please edit it as needed
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

</script>
