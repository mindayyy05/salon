<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Get all categories
    public function getCategories()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    // Get services based on category
    public function getServicesByCategory($categoryId = null)
    {
        if ($categoryId) {
            $services = Service::with('stylist')
                ->where('category_id', $categoryId)
                ->get();
        } else {
            $services = Service::with('stylist')->get(); // All services if no category is selected
        }

        return response()->json($services);
    }
}
