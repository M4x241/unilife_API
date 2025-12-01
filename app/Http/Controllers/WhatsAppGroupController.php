<?php

namespace App\Http\Controllers;

use App\Models\WhatsAppGroup;
use Illuminate\Http\Request;

class WhatsAppGroupController extends Controller
{
    public function index()
    {
        return response()->json(WhatsAppGroup::all());
    }
}
