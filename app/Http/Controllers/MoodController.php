<?php

namespace App\Http\Controllers;

use App\Models\Mood;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoodController extends Controller
{
    
    public function index()
    {
        $latestMood = Mood::where('user_id', Auth::id())->latest()->first();
        $quote = null;

        if ($latestMood) {
            $quote = Quote::where('category', $latestMood->mood)->inRandomOrder()->first();
        }

        return view('dashboard', compact('latestMood', 'quote'));
    }

    /**
     * Store a newly submitted mood.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mood' => 'required|in:happy,sad,angry,neutral,excited',
            'note' => 'nullable|string|max:255',
        ]);

        Mood::create([
            'user_id' => Auth::id(),
            'mood' => $request->mood,
            'note' => $request->note,
        ]);

        return redirect()->route('dashboard')->with('success', 'Mood tracked successfully!');
    }
}
