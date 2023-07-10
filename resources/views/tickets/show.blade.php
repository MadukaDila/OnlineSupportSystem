<!-- supportreply.blade.php -->
@extends('layout.sidenavbar')

@section('content')
    <h1>Support Reply</h1>

    <form>
        <label for="customerName">Customer Name:</label>
        <input type="text" id="customerName" name="customerName" value="{{ $ticket->customer_name }}" readonly>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="{{ $ticket->email }}" readonly>
        
        <!-- Additional input fields... -->
        
        <button type="submit">Submit</button>
    </form>
@endsection
