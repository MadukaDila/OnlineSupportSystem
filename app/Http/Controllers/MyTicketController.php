<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\ProblemReply;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class MyTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('support');
    }

    public function view()
    {
        return view('tickertstatus');
    }

    public function search(Request $request)
    {
        $request->validate([
            'referenceNo' => 'required',
        ]);
    
        $reference = $request->input('referenceNo');
    
        // Retrieve the ticket based on the reference ID
        $ticket = DB::table('tickets')
            ->join('problem_reply', 'tickets.id', '=', 'problem_reply.ticket_id')
            ->select('tickets.*', 'problem_reply.reply')
            ->where('tickets.reference_number', $reference)
            ->first();
            if ($ticket) {
                $data = [
                    'description' => $ticket->problem_description,
                    'replydescription' => $ticket->reply,
                ];
                
                // Check if the ticket has a reply
                if ($ticket->reply) {
                    $message = 'Ticket found with a reply for the given reference ID.';
                } else {
                    $message = 'Ticket found without a reply for the given reference ID.';
                }
                
             
            // Return a success response with the data and reply status
            return response()->json([
                'success' => true,
                'message' => $message,
                'data' => $data,
            ], Response::HTTP_OK);
        } else {
            $message = 'Ticket not found for the given reference ID.';
            return response()->json([
                'success' => false,
                'message' => $message,
            ], Response::HTTP_OK);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
