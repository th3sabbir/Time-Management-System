<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\TimeEntry;
use App\Project;
use App\WorkType;
use App\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home', [
            'time_entries_count' => class_exists('App\\TimeEntry') ? \App\TimeEntry::count() : '—',
            'projects_count'     => class_exists('App\\Project')   ? \App\Project::count()   : '—',
            'work_types_count'   => class_exists('App\\WorkType')  ? \App\WorkType::count()  : '—',
            'users_count'        => class_exists('App\\User')      ? \App\User::count()      : '—',
        ]);
    }
}

