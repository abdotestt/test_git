<?php

namespace App\Http\Controllers;

use App\Models\CaisseJournaliere;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    //
    public function getChartData()
    {
        // Get revenue data for the last 7 days
        $endDate = now()->toDateString();
        $startDate = now()->subDays(6)->toDateString();

        $revenueData = CaisseJournaliere::whereBetween('date_caissse', [$startDate, $endDate])
            ->orderBy('date_caissse')
            ->get(['date_caissse', 'montant_total'])
            ->toArray();

        return response()->json($revenueData);
    }
}
