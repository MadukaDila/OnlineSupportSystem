<!DOCTYPE html>
<html>
    <meta name="csrf-token" content="{{ csrf_token() }}">

<head>
    <title>Online Support Sysytem</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 " style="background-color: #003366">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="{{ url('/dashboard') }}" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Support Sysytem</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link align-middle px-0 text-white">
                                <i class="fs-4 bi-speedometer2 "></i> <span class="ms-1 d-none d-sm-inline text-white">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a onclick="logout()" class="nav-link px-0 align-middle text-white pe-auto" >
                                <i class="fs-4 bi-person"></i> <span class="ms-1 d-none d-sm-inline">Sign Out</span></a>
                        </li> 
                    </ul>
                </div>
            </div>
            <div class="col py-3">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function logout() {

    
            // Get the CSRF token value from the meta tag
            var token = $('meta[name="csrf-token"]').attr('content');
    
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token // Set the CSRF token in the request headers
                }
            });
    
            $.ajax({
                url: '/logout',
                method: 'POST',
                success: function(response) {
                    console.log(response);
                    // Redirect the user to the desired location after successful logout
                    window.location.href = '/login';
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }
    </script>
    
        
    

    <!-- Footer or any other common admin elements -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>