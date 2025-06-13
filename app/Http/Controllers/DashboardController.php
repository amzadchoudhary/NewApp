<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\StreamedResponse;



class DashboardController extends Controller
{
    public function getDashboardStatsReal()
    {
        $totalUsers = User::count();
        $lastMonthUsers = User::where('created_at', '<=', now()->subMonth())->count();
        $totalUsersChange = $totalUsers - $lastMonthUsers;
        $totalUsersPercentageChange = ($lastMonthUsers > 0) ? round(($totalUsersChange / $lastMonthUsers) * 100) : 0;

        $activeUsers = User::where(['status'=>'Active'])->count();
        $activeUsersPercentageChange = -1;
        $today = Carbon::today()->format('m-d');

        $birthdayUsers = Cache::remember('birthday_users_' . $today, 3600, function () use ($today) {
            return User::whereRaw("DATE_FORMAT(date_of_birth, '%m-%d') = ?", [$today])->get();
        });

        return view('dashboard', [
            'totalUsers' => $totalUsers,
            'totalUsersChange' => $totalUsersChange,
            'totalUsersPercentageChange' => $totalUsersPercentageChange,
            'activeUsers' => $activeUsers,
            'activeUsersPercentageChange' => $activeUsersPercentageChange,
            'birthdayUsers' => $birthdayUsers,
        ]);
    }
    /**
     * Export users data as CSV.
     *
     * @return StreamedResponse
     */
    public function export(): StreamedResponse
    {
        $users = User::all();
        $headers = ['Content-type' => 'text/csv', 'Content-Disposition' => 'attachment; filename=users.csv'];

        $callback = function () use ($users) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Name', 'Email', 'Date of Birth', 'City', 'Country', 'Status', 'Role']);
            foreach ($users as $user) {
                fputcsv($handle, [
                    $user->name,
                    $user->email,
                    $user->date_of_birth,
                    $user->city,
                    $user->country,
                    $user->status,
                    $user->role,
                ]);
            }
            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

}
