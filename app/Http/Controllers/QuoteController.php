<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;


class QuoteController extends Controller
{
    public function index()
{
    $quotes = Quote::all(); // or filter by category etc.
    return view('quotes.index', compact('quotes'));
}

}
