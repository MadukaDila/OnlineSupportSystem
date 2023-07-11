<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\ProblemReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketCreated;
use App\Mail\ReplyNotification;


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
        $ticketUpdate = Ticket::findOrFail($id); // Replace $ticketId with the ID of the ticket you want to update        
        $ticketUpdate->is_open = '1';
        $ticketUpdate->save();
        return view('tickets.show', compact('ticket'));
    }

    public function reply(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'description' => 'required',
        ]);

        $email = $request->input('email');
        // Retrieve the ticket by ID
        $ticket = ProblemReply::create([
            'ticket_id' => $request->input('ticket_id'),
            'reply' => $request->input('description'),
        ]);

        $ticketUpdate = Ticket::findOrFail($id); // Replace $ticketId with the ID of the ticket you want to update        
        $ticketUpdate->status = 'Closed';
        $ticketUpdate->save();

        $responseData = [
            'ticketId' => $ticket->id,
            'message' => 'Reply Successfully',
        ];
    
        $data = [
            'ticketId' => $ticketUpdate->reference_number,
            'reply' => $ticket->reply,
        ];

        Mail::to($email)->send(new ReplyNotification($data));
        return response()->json($responseData);
      
    }
}
