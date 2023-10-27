<?php
namespace App\Http\Controllers;

use App\Services\GoogleAdsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GoogleAdsController extends Controller
{
    public function compaignResults(GoogleAdsService $googleAdsService)
    {
        dd($googleAdsService->getCampaigns());
        try {
            $campaigns = $googleAdsService->getCampaigns();
            return view('campaigns.google.index', ['campaigns' => $campaigns]);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Error fetching campaigns: ' . $e->getMessage()]);
        }
    }
}
