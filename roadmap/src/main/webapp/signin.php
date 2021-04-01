<?php include("includes/header.html");?>
<body class="bg signin-banner">
  <div class="row">
    <div class="col-12">
      <div class="col-6 offset-1 ">
        <!-- Left Side Text here -->
      </div>
      <div class="col-6 offset-6">
        <div class="row white-bg">
          <div class="col-8 offset-2 d-flex justify-content-center">
            <div class="mx-auto">
              <a href="/#"><img src="img/node-tree.svg" width=90 height=90 alt="Node Tree"></a>
            </div>
          </div>
          <div class="col-8 offset-2">
            <h3 style="margin-bottom:75px">Sign In</h3>
            <form>
              <div class="form-outline btn-rounded form-floating mb-4">
                <input type="text" class="form-control" name="email" placeholder="Email" required>
                <label class="form-label">Email</label>
              </div>
              <div class="form-outline btn-rounded form-floating mb-4">
                <input type="text" class="form-control" name="password" placeholder="password" required>
                <label class="form-label">Password</label>
              </div>
              <button type="button" class="nav-link green-solid-btn btn-rounded" href="/#">Sign Up</button>
              <div class="text-center">
                <p>Not a member? <a href="/signup">Register</a></p>
                <button type="button" class="btn btn-success btn-floating mt-2 mx-auto">
                  <i id="googleSignIn" class="fab fa-google"></i>
                  <script src="https://apis.google.com/js/platform.js?onload=onLoadGoogleCallback" async defer></script>
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<script type="text/javascript">

// Google Sign in Auth
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
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

// Google Sign in Auth End
</script>
