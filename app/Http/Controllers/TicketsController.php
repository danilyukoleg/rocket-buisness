<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TicketsController extends Controller
{
    public function index()
    {
        return Inertia::render("Tickets");
    }

	public function show(Request $request)
	{
		$validation = $request->validate([
			"nn1" => ["required", "exists:tickets,nn1"],
			"nn2" => ["required", "exists:tickets,nn2"],
			"date" => ["required"],
			"time" => ["required"]
		]);

		$tickets = Ticket::select("*")
					->where("nn1", "=", $request->query("nn1"))
					->where("nn2", "=", $request->query("nn2"))
					->where("date", "=", $request->query("date"))
					->where("time", ">=", $request->query("nn1"))
					->get();

		return Inertia::render("TicketsSearch", [
			"tickets" => $tickets
		]);
	}
}
