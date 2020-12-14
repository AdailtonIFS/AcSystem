<?php

namespace App\Http\Controllers;

use App\Occurrence;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $occurrences = Occurrence::with('user:name', 'laboratory:description')
        ->select('id', 'user_registration', 'laboratory_id', 'occurrence', 'date')
        ->where('date', today())->get();

        return view('home')
            ->with('occurrences',
                $occurrences);
    }

}
