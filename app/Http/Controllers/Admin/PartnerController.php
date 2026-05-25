<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $query = Partner::query();

        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $partners = $query->latest()->paginate(12)->withQueryString();

        return view('admin.partners.index', compact('partners', 'search'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'logo' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'website_url' => ['required', 'url', 'max:1024'],
        ]);

        $data['logo_path'] = $request->file('logo')->store('partner-logos', 'public');
        unset($data['logo']);

        Partner::create($data);

        return Redirect::route('admin.partners.index')->with('success', 'Partner berhasil ditambahkan.');
    }

    public function update(Request $request, Partner $partner)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'website_url' => ['required', 'url', 'max:1024'],
        ]);

        if ($request->hasFile('logo')) {
            if ($partner->logo_path) {
                Storage::disk('public')->delete($partner->logo_path);
            }
            $data['logo_path'] = $request->file('logo')->store('partner-logos', 'public');
        }

        unset($data['logo']);
        $partner->update($data);

        return Redirect::route('admin.partners.index')->with('success', 'Partner berhasil diperbarui.');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();

        return Redirect::route('admin.partners.index')->with('success', 'Partner berhasil dihapus.');
    }
}
