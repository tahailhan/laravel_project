<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Veritabanındaki tüm kategorileri son eklenenden ilk eklenene doğru çeker
        $categories = Category::latest()->get();

        // Verileri index.blade.php dosyasına paslar
        return view('admin.categories.index', compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Verileri Doğrula (Status alanını mutlaka ekliyoruz)
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'keywords'    => 'required|string|max:255',
            'description' => 'required|string',
            'status'      => 'required|in:0,1', // Formdan gelen 0 veya 1 değerini güvenli şekilde doğrular
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // 2. Dosyayı Storage Alanına Yükle
        if ($request->hasFile('image')) {
            // public/uploads klasörüne benzersiz bir isimle kaydeder
            $validated['image'] = $request->file('image')->store('uploads', 'public');
        }

        // 3. Veritabanına Kaydet
        Category::create($validated);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
