<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\Specialization;
use App\Models\Specialist;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Article;
use App\Models\User;
use App\Models\Rate;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'hospitals_count' => Hospital::count(),
            'specializations_count' => Specialization::count(),
            'specialists_count' => Specialist::count(),
            'offers_count' => Offer::count(),
            'orders_count' => Order::count(),
            'articles_count' => Article::count(),
            'users_count' => User::count(),
            'rates_count' => Rate::count(),
            'total_rating_avg' => Rate::avg('rating') ?? 0,
        ];

        $recentHospitals = Hospital::latest()->take(5)->get();
        $recentSpecializations = Specialization::withCount('hospitals')->latest()->take(5)->get();
        $recentOrders = Order::with(['hospital', 'specialization'])->latest()->take(5)->get();
        $recentUsers = User::latest()->take(5)->get();
        $topRatedHospitals = Hospital::withAvg('rates', 'rating')
            ->withCount('rates')
            ->get()
            ->filter(fn ($hospital) => $hospital->rates_avg_rating > 0)
            ->sortByDesc('rates_avg_rating')
            ->take(5)
            ->values();

        $hospitalsByCity = Hospital::selectRaw('city, count(*) as total')
            ->groupBy('city')
            ->orderByDesc('total')
            ->take(10)
            ->pluck('total', 'city');

        return view('dashboard.index', compact(
            'stats',
            'recentHospitals',
            'recentSpecializations',
            'recentOrders',
            'recentUsers',
            'topRatedHospitals',
            'hospitalsByCity'
        ));
    }
}
