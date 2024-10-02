<?php

namespace App\Http\Controllers;

use App\Models\Stylist;
use Illuminate\Http\Request;

class StylistController extends Controller
{
    public function index()
    {
        $stylists = Stylist::all();
        return view('stylists.index', compact('stylists'));
    }

    public function create()
    {
        return view('stylists.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);

        Stylist::create($request->all());

        return redirect()->route('stylists.index')->with('success', 'Stylist created successfully.');
    }

    public function show(Stylist $stylist)
    {
        return view('stylists.show', compact('stylist'));
    }

    public function edit(Stylist $stylist)
    {
        return view('stylists.edit', compact('stylist'));
    }

    public function update(Request $request, Stylist $stylist)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);

        $stylist->update($request->all());

        return redirect()->route('stylists.index')->with('success', 'Stylist updated successfully.');
    }

    public function destroy(Stylist $stylist)
    {
        $stylist->delete();

        return redirect()->route('stylists.index')->with('success', 'Stylist deleted successfully.');
    }
}
