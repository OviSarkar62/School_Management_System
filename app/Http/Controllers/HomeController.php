<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
        // Dashboard Page
        public function index()
        {

                return view('user.user-dashboard');

        }
}
