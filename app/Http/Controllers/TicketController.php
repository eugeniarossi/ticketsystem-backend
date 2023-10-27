<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        return response()->json($tickets, 200);
    }

    /**
     * Store a newly created ticket in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'boolean',
            'priority' => 'in:low,medium,high,critical',
            'category' => 'string|max:255',
            'assigned_to' => 'exists:users,id',
            'created_by' => 'required|exists:users,id',
        ]);

        $ticket = new Ticket([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status', false),
            'priority' => $request->input('priority', 'medium'),
            'category' => $request->input('category', ''),
            'assigned_to' => $request->input('assigned_to'),
            'created_by' => $request->input('created_by'),
        ]);

        $ticket->save();

        return response()->json($ticket, 201);
    }

    /**
     * Display the specified ticket.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return response()->json($ticket, 200);
    }

    /**
     * Update the specified ticket in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'string|max:255',
            'description' => 'string',
            'status' => 'boolean',
            'priority' => 'in:low,medium,high,critical',
            'category' => 'string|max:255',
            'assigned_to' => 'exists:users,id',
        ]);

        $ticket = Ticket::findOrFail($id);

        $ticket->title = $request->input('title', $ticket->title);
        $ticket->description = $request->input('description', $ticket->description);
        $ticket->status = $request->input('status', $ticket->status);
        $ticket->priority = $request->input('priority', $ticket->priority);
        $ticket->category = $request->input('category', $ticket->category);
        $ticket->assigned_to = $request->input('assigned_to', $ticket->assigned_to);

        $ticket->save();

        return response()->json($ticket, 200);
    }

    /**
     * Remove the specified ticket from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        return response()->json(null, 204);
    }
}