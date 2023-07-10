@extends('layout.header')

@section('content')
    <div class="container">
        <h1>Search Your Ticket</h1>
        <form id="referenceForm">
            @csrf
            <div class="form-group py-2">
                <label for="customerName">Search By Reference</label>
                <input type="text" class="form-control" id="referenceNo" name="referenceNo" placeholder="Reference" required>
            </div>
            <div class="py-2">
                <button type="submit" class="btn btn-primary" style="background-color: #003366;">Search</button>
            </div>
        </form>
        <div id="resultContainer" style="display: none;">
            <div class="form-group py-2">
                <label for="ticketId">Send Problem</label>
                <textarea type="text" class="form-control" id="description" name="description" readonly></textarea>
            </div>
            <div class="form-group py-2">
                <label for="description">Reply Problem</label>
                <textarea type="text" class="form-control" id="replydescription" name="replydescription" readonly></textarea>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Handle form submission
        $('#referenceForm').submit(function(event) {
            event.preventDefault(); // Prevent the form from submitting normally

            var formData = $(this).serialize(); // Serialize the form data

            $.ajax({
                url: '{{ route("myticket.search") }}', // Replace with your Laravel route URL
                type: 'get',
                data: formData,
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        // Show the result container and populate the textarea values
                        $('#resultContainer').show();
                        $('#description').val(response.data.description);
                        $('#replydescription').val(response.data.replydescription);
                    } else {
                        alert(response.message);
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
