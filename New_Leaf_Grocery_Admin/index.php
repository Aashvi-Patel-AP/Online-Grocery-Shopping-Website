<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 
    </style>
  </head>
  <body>
  <form action="verifyAdmin.php" method="post">
  <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Admin Login</h2>
              <p class="text-white-50 mb-5">Please enter your email and password!</p>

              <div class="form-outline form-white mb-4">
                <input type="email" id="email" name ="email" class="form-control form-control-lg" placeholder="Enter your Email Id" required="true"/>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter your Password" required="true"/>
              </div>

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

             
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>