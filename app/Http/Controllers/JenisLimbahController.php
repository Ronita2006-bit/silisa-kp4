<?php

namespace App\Http\Controllers;

use App\Models\JenisLimbah;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JenisLimbahController extends Controller
{
    public function index()
    {
        $jenisLimbah = JenisLimbah::orderBy('nama')->paginate(10);

        return view('jenis-limbah.index', compact('jenisLimbah'));
    }

    public function create()
    {
        return view('jenis-limbah.create');
    }

    public function store(Request $request)
    {
        JenisLimbah::create($this->validated($request));

        return redirect()->route('jenis-limbah.index')
            ->with('success', 'Jenis limbah berhasil ditambahkan.');
    }

    public function edit(JenisLimbah $jenisLimbah)
    {
        return view('jenis-limbah.edit', compact('jenisLimbah'));
    }

    public function update(Request $request, JenisLimbah $jenisLimbah)
    {
        $jenisLimbah->update($this->validated($request, $jenisLimbah->id));

        return redirect()->route('jenis-limbah.index')
            ->with('success', 'Jenis limbah berhasil diperbarui.');
    }

    public function destroy(JenisLimbah $jenisLimbah)
    {
        $jenisLimbah->delete();

        return redirect()->route('jenis-limbah.index')
            ->with('success', 'Jenis limbah berhasil dihapus.');
    }

    private function validated(Request $request, ?int $ignoreId = null): array
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255', Rule::unique('jenis_limbah', 'nama')->ignore($ignoreId)],
            'satuan' => ['required', 'string', 'max:20'],
            'persen_acuan' => ['required', 'numeric', 'between:0,100'],
            'kapasitas' => ['required', 'numeric', 'min:0'],
            'harga_default' => ['nullable', 'numeric', 'min:0'],
        ]);

        $data['aktif'] = $request->boolean('aktif');

        return $data;
    }
}