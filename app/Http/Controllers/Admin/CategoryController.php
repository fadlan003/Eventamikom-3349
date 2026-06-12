<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $query = Category::query();

        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $categories = $query->latest()->paginate(12)->withQueryString();

        return view('admin.categories.index', compact('categories', 'search'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $data['slug'] = $this->makeUniqueSlug($data['name']);
        Category::create($data);

        return Redirect::route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $data['slug'] = $this->makeUniqueSlug($data['name'], $category->id);
        $category->update($data);

        return Redirect::route('admin.categories.index')->with('success', 'Nama kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return Redirect::route('admin.categories.index')->with('success', 'Kategori berhasil dihapus.');
    }

    private function makeUniqueSlug(string $name, ?int $exceptId = null): string
    {
        $slug = Str::slug($name);
        $original = $slug;
        $count = 1;

        while (Category::where('slug', $slug)
            ->when($exceptId, fn ($query) => $query->where('id', '!=', $exceptId))
            ->exists()) {
            $slug = "{$original}-{$count}";
            $count++;
        }

        return $slug;
    }
}
