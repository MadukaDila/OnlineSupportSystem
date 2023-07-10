@extends('layout.header')

@section('content')
    <div class="container">
        <h1>Submit the Ticket</h1>
        <form id="supportForm">
            @csrf
            <div class="form-group py-2">
                <label for="exampleInputEmail1">Full Name</label>
                <input type="text" class="form-control" id="customerName" name="customerName"  placeholder="Full Name" required> 
            </div>
            <div class="form-group py-2">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" required> 
            </div>
            <div class="form-group py-2">
                <label for="exampleInputEmail1">Phone Number</label>
                <input type="number" class="form-control" id="mobile" name="mobile"  placeholder="Phone Number" required> 
            </div>
            <div class="form-group py-2">
                <label for="exampleInputEmail1">Problem Description</label>
                <textarea type="text" class="form-control" id="description" name="description"  placeholder="Problem Description" required >
                </textarea> 
            </div>
            <div class="py-2">
                <button type="submit" class="btn btn-primary" style="background-color: #003366;">Submit</button>
            </div>
        </form>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    // Handle form submission
    $('#supportForm').submit(function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        var formData = $(this).serialize(); // Serialize the form data
        
        $.ajax({
            url: '{{ route("tickets.create") }}', // Replace with your Laravel route URL
            type: 'POST',
            data: formData,
            success: function(response) {
                console.log(response);
                alert(response.message);
                window.location.reload();
            },
            error: function(xhr) {
                // Handle the error response
                console.log(xhr.responseText);
            }
        });
    });
});
</script>

