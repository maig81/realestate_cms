<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Exception\ProcessFailedException;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function migrate()
    {
        echo "Migration: " . Artisan::call('migrate', ['--force'=> true]);
    }


    public function update()
    {   

        $process = new Process('git init');
        $process -> setWorkingDirectory(base_path());
        $process -> run(function ($type, $buffer) {
                echo $buffer . "<br>";
                echo $type . "<br>";
        });


        $process1 = new Process('git remote add origin https://github.com/maig81/realestate_cms.git');
        $process1 -> setWorkingDirectory(base_path());
        $process1 -> run(function ($type, $buffer) {
                echo $buffer . "<br>";
                echo $type . "<br>";
        });

        $git_fetch = env('PROXY_SERVER') ? 'git -c "http.proxy=' . env('PROXY_SERVER') . '" fetch --all' : 'git fetch --all';
        $process2 = new Process( $git_fetch );
        $process2 -> setWorkingDirectory(base_path());
        $process2 -> setTimeout(3000);
        $process2 -> run(function ($type, $buffer) {
                echo $buffer . "<br>";
                echo $type . "<br>";
        });

        $process3 = new Process( 'git reset --hard origin/master');
        $process3 -> setWorkingDirectory(base_path());
        $process3 -> run(function ($type, $buffer) {
                echo $buffer . "<br>";
                echo $type . "<br>";
        });

        $this->migrate();
    }    
}
