<!DOCTYPE html>
<html>
<head>
    <title>Online Support System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    
    <div class="center">
        <form id="loginForm" class="w-25 border border-primary rounded p-4"  style="background-color: #003366;" >
        @csrf
        <h1 class="text-white">Login</h1>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      
        <div class="form-outline mb-4">
          <input type="text" id="form2Example1" class="form-control form-control-sm" name="username" required>
          <label class="form-label text-white" for="form2Example1">Email address</label>
        </div>
      
        <div class="form-outline mb-4">
          <input type="password" id="form2Example2" class="form-control form-control-sm" name="password" required>
          <label class="text-white form-label" for="form2Example2">Password</label>
        </div>
      
        <button type="submit" class="btn btn-primary btn-block mb-4" style="background-color: #003366;">Sign in</button>
      </form>
      
    </div>


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
