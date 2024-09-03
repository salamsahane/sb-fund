<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    public function store(Request $request, Campaign $campaign): RedirectResponse
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $validatedData['user_id'] = Auth::check() ? Auth::id() : null;
        $validatedData['is_anonymous'] = !Auth::check();

        Donation::create([...$validatedData, 'campaign_id' => $campaign->id]);

        $campaign->checkCampaignStatus();

        return redirect()->back()->with('success', 'Donation made successfully');
    }
}
