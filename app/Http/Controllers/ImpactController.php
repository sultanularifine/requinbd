<?php

namespace App\Http\Controllers;

use App\Models\Impact;
use Illuminate\Http\Request;

class ImpactController extends Controller
{
    public function index()
    {
        $impacts = Impact::all();
        return view('admin.home.impacts.index', compact('impacts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|string|max:255',
            'title'  => 'required|string|max:255',
        ]);

        Impact::create($request->only('number', 'title'));

        return redirect()->back()->with('success', 'Impact added successfully.');
    }

    public function destroy(Impact $impact)
    {
        $impact->delete();
        return redirect()->back()->with('success', 'Impact deleted successfully.');
    }
}
