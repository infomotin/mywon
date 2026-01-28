<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class QueueController extends Controller
{
    public function index()
    {
        $jobs = DB::table('jobs')->get();
        $failedJobs = DB::table('failed_jobs')->latest('failed_at')->get();
        $workerStatus = $this->checkWorkerStatus();

        return view('backend.admin.queue.index', compact('jobs', 'failedJobs', 'workerStatus'));
    }

    public function startWorker()
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            pclose(popen('start /B php artisan queue:work > NUL 2>&1', 'r'));
        } else {
            // Unix-based systems
            exec('php artisan queue:work > /dev/null 2>&1 &');
        }

        return redirect()->back()->with('success', 'Queue worker started successfully.');
    }

    public function stopWorker()
    {
        Artisan::call('queue:restart');
        return redirect()->back()->with('success', 'Queue worker restart signal sent. Workers will stop after processing current job.');
    }

    public function retryJob($id)
    {
        Artisan::call('queue:retry', ['id' => $id]);
        return redirect()->back()->with('success', 'Job retry command sent.');
    }

    public function deleteJob($id)
    {
        Artisan::call('queue:forget', ['id' => $id]);
        return redirect()->back()->with('success', 'Job deleted successfully.');
    }
    
    public function deleteAllFailed()
    {
        Artisan::call('queue:flush');
        return redirect()->back()->with('success', 'All failed jobs deleted successfully.');
    }

    private function checkWorkerStatus()
    {
        // Simple check if process exists (Windows specific)
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $output = [];
            exec('tasklist /FI "IMAGENAME eq php.exe" /FO CSV /V', $output);
            
            // This is a rough check, might return true for other php processes
            // But for local dev it's often "good enough" to see if *some* php CLI is running
            // A better way is to check the cache for last heartbeat if using Horizon, but we are using native queue:work
            foreach ($output as $line) {
                if (strpos($line, 'queue:work') !== false) {
                    return true;
                }
            }
            // Fallback: Check if any PHP process is running and assume it *might* be the worker if we just started it
            // Realistically, on Windows without Supervisor, accurate status is hard.
            // Let's rely on the user knowing they clicked "Start".
            return false;
        }
        return false;
    }
}
