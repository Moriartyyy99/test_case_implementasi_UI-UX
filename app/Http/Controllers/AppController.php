<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    // Fungsi bantuan untuk nentuin role
    private function getRole()
    {
        // Ambil role dari URL (?role=...), kalau kosong default ke 'owner'
        return request()->query('role', 'owner');
    }

    public function dashboard()
    {
        $role = $this->getRole();
        return view('dashboard', compact('role'));
    }

    public function projects()
    {
        $role = $this->getRole();
        return view('projects', compact('role'));
    }

        public function tasks()
    {
        $role = $this->getRole();
        return view('tasks', compact('role'));
    }
}