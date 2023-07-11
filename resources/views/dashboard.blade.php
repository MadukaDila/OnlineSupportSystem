@extends('layout.sidenavbar')
<style>
    .page-item.active .page-link {
        z-index: 3 !important;
        color: #fff !important;
        background-color: #003366 !important;
        border-color: #003366 !important;
    }
    
    .pagination .page-item .page-link:hover {
        background-color: #94a1ad;
        border-color: #94a1ad;
        color: #ffffff;
    }
    
    .page-link {
        color: #003366 !important;
    }
    .row-highlight {
        background-color: #94a1ad;
    }
</style>
@section('content')
    <h1>Support Tickets</h1>
    <div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Reference Number</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = ($tickets->currentPage() - 1) * $tickets->perPage() + 1;
            @endphp
            @foreach ($tickets as $ticket)
                @php
                    $rowClass = $ticket->is_open == 0 ? 'row-highlight' : '';
                @endphp
                <tr class="{{ $rowClass }}">
                    <th scope="row">{{ $count }}</th>
                    <td>{{ $ticket->customer_name }}</td>
                    <td>{{ $ticket->email }}</td>
                    <td>{{ $ticket->phone_number }}</td>
                    <td>{{ $ticket->reference_number }}</td>
                    <td>{{ $ticket->problem_description }}</td>
                    <td>{{ $ticket->status }}</td>
                    <td>
                        <button class="btn btn-primary" style="background-color: #003366; " onclick="redirectToNewPage({{ $ticket->id }})">View</button>
                    </td>
                </tr>
                @php
                    $count++;
                @endphp
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $tickets->links('pagination::bootstrap-4') }}
    </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function redirectToNewPage(ticketId) {
        var url = '/supportreply/' + ticketId;
        window.location.href = url;
    }

    // Refresh the dashboard page upon returning
    window.onpageshow = function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    };
</script>

