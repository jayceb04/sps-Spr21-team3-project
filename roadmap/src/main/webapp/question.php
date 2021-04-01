<?php include("includes/header.html");?>
<body class="bg question-banner">
  <div class="mask" style="background-color: rgba(0,0,0,0.6)">
  <div class="row">
    <div class="col-12">
      <div class="col-6 offset-3 white-bg">
        <div class="col-8 offset-2 d-flex justify-content-center">
          <div class="mx-auto">
            <a href="/#"><img src="img/node-tree.svg" width=90 height=90 alt="Node Tree"></a>
          </div>
        </div>
        <form class="row g-3 needs-validation" name="signupForm" onSubmit="return checkInput(this)" style="position:relative; top:55px;" novalidate>
          <div class="col-md-8 offset-2">
            <h3 style="margin-bottom:75px">Welcome, <strong>|*FNAME*|</strong></h3>
          </div>
          <div class="form-outline btn-rounded form-floating col-md-8 offset-2">
            <input type="text" class="form-control" name="college" placeholder="College" required>
            <label class="form-label">What College Do You Attend?</label>
          </div>
          <div class="form-outline btn-rounded form-floating col-md-8 offset-2">
            <input type="text" class="form-control" name="major" placeholder="major" value="Computer Science" required disabled>
            <label class="form-label">Major</label>
          </div>
          <div class="form-outline btn-rounded form-floating col-md-8 offset-2">
            <input type="text" class="form-control" name="graduationDate" maxlength="4" placeholder="graduationDate" required>
            <label class="form-label">Expected Graduation Date</label>
          </div>
          <div class="col-8 offset-2 text-center">
            <button type="submit" value="Submit" class="nav-link green-solid-btn btn-rounded" href="#">Confirm</button>
          </div>
        </form>
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

function checkInput(form) {
  college = form.college.value;
  graduationDate = form.graduationDate.value;
  major = form.major.value;

  if(isNaN(graduationDate))
    alert ("Graduation Date must be numbers")
  else if (college == '')
    alert ("Please enter your College");

  else if (password2 == '')
    alert ("Please enter confirm password");

  else if (password1 != password2) {
    alert ("Password did not match: Please try again...")
    return false;
  }
}

</script>
