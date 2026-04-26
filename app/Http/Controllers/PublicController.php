<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublicController extends Controller
{
    public function home()
    {
        $articles = Article::with('category')->latest()->get();
        return view('welcome', compact('articles'));
    }

    public function createReport()
    {
        $categories = Category::all();
        return view('report', compact('categories'));
    }

    public function storeReport(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'photo' => 'nullable|image|max:5120',
            'perpetrator_name' => 'nullable|string|max:255',
            'incident_location' => 'nullable|string|max:255',
            'incident_date' => 'nullable|date',
            'severity' => 'nullable|string|in:Ringan,Sedang,Parah'
        ]);

        $photo_path = null;
        if ($request->hasFile('photo')) {
            $photo_path = $request->file('photo')->store('reports', 'public');
        }

        // Generate tracking code
        $code = strtoupper(Str::random(6));
        while(Report::where('tracking_code', $code)->exists()) {
            $code = strtoupper(Str::random(6));
        }

        Report::create([
            'tracking_code' => $code,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'perpetrator_name' => $request->perpetrator_name,
            'incident_location' => $request->incident_location,
            'incident_date' => $request->incident_date,
            'severity' => $request->severity,
            'photo_path' => $photo_path,
            'status' => 'Pending'
        ]);

        return back()->with('success_code', $code);
    }

    public function trackReport()
    {
        return view('track');
    }

    public function checkReport(Request $request)
    {
        $request->validate(['tracking_code' => 'required|string']);
        
        $report = Report::where('tracking_code', strtoupper($request->tracking_code))
                        ->with(['category', 'response'])
                        ->first();

        if (!$report) {
            return back()->with('error', 'Kode Pelacakan tidak ditemukan.');
        }

        return view('track', compact('report'));
    }
}
