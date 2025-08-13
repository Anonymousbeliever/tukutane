<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Event;
use App\Models\Payment;
use App\Models\MpesaTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard with statistics and recent activity.
     */
    public function index()
    {
        // Get basic statistics
        $totalAlumni = User::where('role', 'alumnus')->count();
        $totalEvents = Event::count();
        $totalPayments = Payment::where('status', 'completed')->count();
        $totalRevenue = Payment::where('status', 'completed')->sum('amount');

        // Get recent statistics (last 30 days)
        $recentAlumni = User::where('role', 'alumnus')
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->count();
        
        $upcomingEvents = Event::where('date', '>=', Carbon::now())
            ->orderBy('date', 'asc')
            ->limit(5)
            ->get();

        $recentPayments = Payment::with(['user', 'event'])
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Monthly revenue data for the last 6 months
        $monthlyRevenue = Payment::where('status', 'completed')
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('SUM(amount) as total')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        // Recent alumni registrations
        $recentAlumniList = User::where('role', 'alumnus')
            ->with('alumniProfile')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalAlumni',
            'totalEvents', 
            'totalPayments',
            'totalRevenue',
            'recentAlumni',
            'upcomingEvents',
            'recentPayments',
            'monthlyRevenue',
            'recentAlumniList'
        ));
    }
}
