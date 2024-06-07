<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        return view('dashboard.survey', [
            'title' => 'Data Survey',
            'data' => Survey::all()
        ]);
    }
}
