<!DOCTYPE html>
<html>
<head>
    <title>Online Support System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
       
    </style>
</head>
<body>

  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100" >
      <div class="row d-flex justify-content-center align-items-center h-100" >
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card text-white" style="border-radius: 1rem; background-color: #003366;">
            <div class="card-body p-5 text-center">
  
              <div class="mb-md-5 mt-md-4 pb-5">
  
                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <p class="text-white-50 mb-5">Please enter your login and password!</p>
                <form id="loginForm">
                  @csrf
                <div class="form-outline form-white mb-4">
                  <input type="text" id="username" name="username" class="form-control form-control-lg" />
                  <label class="form-label" for="typeEmailX">Email</label>
                </div>
  
                <div class="form-outline form-white mb-4">
                  <input type="password" id="password" name="password" class="form-control form-control-lg" />
                  <label class="form-label" for="typePasswordX">Password</label>
                </div>
  
                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                </form>
  
              </div>

  
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




  {{-- <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card w-auto">
        <div class="card-header">
            LogIn
        </div>
        <div class="card-body">
            <form id="loginForm">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group row py-2">
                    <label for="email_address" class="col-md-4 col-form-label text-md-right">User Name</label>
                    <div class="col-md-8">
                        <input type="text" id="username" class="form-control" name="username" required autofocus>
                    </div>
                </div>

                <div class="form-group row py-2">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                    <div class="col-md-8">
                        <input type="password" id="password" class="form-control" name="password" required>
                    </div>
                </div>

                <div class="form-group row py-2">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" style="background-color: #003366;" class="btn btn-primary btn-block">
                            Log In
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> --}}

</body>
</html>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
      $(document).ready(function() {
        // Handle form submission
        $('#loginForm').submit(function(event) {
            event.preventDefault(); // Prevent the form from submitting normally
            
            var formData = $(this).serialize(); // Serialize the form data
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                url: '{{ route("login") }}', // Replace with your Laravel route URL
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log(response);
                    alert(response.message);
                    if (response.success) {
                      // Redirect to the dashboard or desired page
                      window.location.href = '/dashboard';
                    } else {
                      // Clear the form inputs
                      $('#loginForm')[0].reset();
                    }
                },
                error: function(xhr) {
                    // Handle the error response
                    console.log(xhr.responseText);
                }
            });
        });
    });
    </script>
</body>
</html>
