<?php

namespace App\Http\Controllers;

use App\Models\Ticket;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('category')->get();
        return response()->json($tickets);
    }
}