<!-- supportreply.blade.php -->
@extends('layout.sidenavbar')

@section('content')
    <h1>Support Reply</h1>
    <div class="container border">
        <div class="form-group py-2">
            <label for="customerName">Reference ID:</label>
            <label>{{ $ticket->reference_number }}</label>
        </div>
        <div class="form-group py-2">
            <label for="customerName">Customer Name:</label>
            <label>{{ $ticket->customer_name }}</label>
        </div>
        <div class="form-group py-2">
            <label for="customerName">Customer Email:</label>
            <label>{{ $ticket->email }}</label>
        </div>
        <div class="form-group py-2">
            <label for="customerName">Customer Phone Number:</label>
            <label>{{ $ticket->phone_number }}</label>
        </div>
        <div class="form-group py-2">
            <label for="customerName">Ticket Status:</label>
            <label>{{ $ticket->status }}</label>
        </div>
        <div class="form-group py-2">
            <label for="customerName">Problem Description:</label>
            <label>{{ $ticket->problem_description }}</label>
        </div>
    </div>
    
    <form id="supportReplyForm">
        @csrf
        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
        <input type="hidden" name="email" value="{{ $ticket->email }}">
        <div class="form-group py-4">
            <label for="exampleInputEmail1">Problem Description Reply</label>
            <textarea  class="form-control" id="description" name="description"  placeholder="Problem Description Reply"></textarea> 
        </div>
        <div>
            <button type="submit" class="btn btn-primary" style="background-color: #003366;">Submit</button>
        </div>
    </form>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    // Handle form submission
    $('#supportReplyForm').submit(function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        var formData = $(this).serialize(); // Serialize the form data
        
        $.ajax({
            url: '{{ route("tickets.reply", $ticket->id) }}', // Replace with your Laravel route URL
            type: 'POST',
            data: formData,
            success: function(response) {
                console.log(response);
                alert(response.message);
                window.location.href = '/dashboard';
            },
            error: function(xhr) {
                // Handle the error response
                console.log(xhr.responseText);
            }
        });
    });
});
</script>


