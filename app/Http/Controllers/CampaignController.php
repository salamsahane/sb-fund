<?php

namespace App\Http\Controllers;

use App\Enums\CampaignStatus;
use App\Http\Requests\CampaignRequest;
use App\Models\Campaign;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    public function index(): View
    {   
        $campaigns = Campaign::withSum('donations', 'amount')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('campaign/index', compact('campaigns'));
    }

    public function show(int $id): View
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->loadCount('donations');
        $campaign->loadSum('donations', 'amount');
        $donation_progression = ($campaign->donations_sum_amount / $campaign->goal_amount) * 100;
        
        return view('campaign/show', compact('campaign', 'donation_progression'));
    }

    public function create(): View
    {
        $categories = Category::all(['id', 'name'])->sortBy('name');
        return view('campaign/create', compact('categories'));
    }

    public function store(CampaignRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['image'] = $request->file('image')->store('campaign', 'public');

        $data['category_id'] = $data['category'];
        unset($data['category']);

        Campaign::create([...$data, 'user_id' => Auth::id(), 'status' => CampaignStatus::OPEN->value]);

        return redirect()->route('home')->with('success', 'Campaign created successfully');
    }
}
