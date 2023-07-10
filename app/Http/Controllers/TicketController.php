<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketCreated;


class TicketController extends Controller
{
    public function create(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'customerName' => 'required',
            'description' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
        ]);

        // Generate a unique reference number
        $referenceNumber = uniqid();

        // Create a new ticket in the database
        $ticket = Ticket::create([
            'customer_name' => $request->input('customerName'),
            'problem_description' => $request->input('description'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('mobile'),
            'reference_number' => $referenceNumber,
            'status' => 'Open',
        ]);

        // Send acknowledgement email to the customer
        Mail::to($ticket->email)->send(new TicketCreated($ticket));
        
        // Prepare the response data
    $responseData = [
        'ticketId' => $ticket->id,
        'referenceNumber' => $referenceNumber,
        'message' => 'Ticket Created Successfully',
    ];

    return response()->json($responseData);
    }

    public function index()
    {
        $tickets = Ticket::paginate(10);

        return view('tickets.index', compact('tickets'));
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);

        return view('tickets.show', compact('ticket'));
    }

    public function reply(Request $request, $id)
    {
        // Validate the incoming request data

        // Retrieve the ticket by ID

        // Add a reply to the ticket

        // Send email notification to the customer

        // Redirect or return a response
    }
}
