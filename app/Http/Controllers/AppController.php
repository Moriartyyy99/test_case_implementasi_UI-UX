<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    // Fungsi bantuan untuk mengambil role dari database
    private function getRole()
    {
        return Auth::user()->role ?? 'owner';
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

    public function orders()
    {
        $role = $this->getRole();
        return view('orders', compact('role'));
    }

    public function customers()
    {
        $role = $this->getRole();
        return view('customers', compact('role'));
    }

    public function finance()
    {
        $role = $this->getRole();
        return view('finance', compact('role'));
    }

    public function reports()
    {
        $role = $this->getRole();
        return view('reports', compact('role'));
    }

    public function expenses()
    {
        $role = $this->getRole();
        return view('expenses', compact('role'));
    }

    public function users()
    {
        $role = $this->getRole();
        return view('users', compact('role'));
    }

    public function roles()
    {
        $role = $this->getRole();
        return view('roles', compact('role'));
    }

    public function staff()
    {
        $role = $this->getRole();
        return view('staff', compact('role'));
    }

    public function logactivity()
    {
        $role = $this->getRole();
        return view('logactivity', compact('role'));
    }
}