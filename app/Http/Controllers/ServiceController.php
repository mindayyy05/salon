<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use App\Models\Stylist;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     */
    public function index()
    {
        $services = Service::with('category', 'stylist')->get(); // Load category and stylist relationships
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create()
    {
        $categories = Category::all();
        $stylists = Stylist::all();
        return view('services.create', compact('categories', 'stylists'));
    }

    /**
     * Store a newly created service in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'stylist_id' => 'required|exists:stylists,id',
            'description' => 'nullable|string|max:500',
        ]);

        // Create the service
        Service::create($request->all());

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    /**
     * Show the form for editing the specified service.
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $categories = Category::all();
        $stylists = Stylist::all();
        return view('services.edit', compact('service', 'categories', 'stylists'));
    }

    /**
     * Update the specified service in the database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'stylist_id' => 'required|exists:stylists,id',
            'description' => 'nullable|string|max:500',
        ]);

        // Find the service
        $service = Service::findOrFail($id);

        // Update the service
        $service->update($request->all());

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified service from the database.
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }

    /**
     * Display the specified service.
     */
    public function show($id)
    {
        $service = Service::with('category', 'stylist')->findOrFail($id);
        return view('services.show', compact('service'));
    }
}
