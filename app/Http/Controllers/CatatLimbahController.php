<?php

namespace App\Http\Controllers;

use App\Models\JenisLimbah;
use App\Models\LimbahHarian;
use App\Models\TbsHarian;
use Illuminate\Http\Request;

class CatatLimbahController extends Controller
{
    private const NAMA_TKKS = 'Tandan Kosong (TKKS)';
    private const BATAS_WAJAR = 10;            // selisih di atas 10% = "Periksa data"

    private const PESAN = [
        'required'   => ':attribute wajib diisi.',
        'date'       => ':attribute harus berupa tanggal.',
        'numeric'    => ':attribute harus berupa angka.',
        'gt.numeric' => ':attribute harus lebih dari 0.',
        'exists'     => ':attribute tidak valid.',
    ];

    private const NAMA_KOLOM = [
        'tgl_limbah'      => 'Tanggal',
        'jenis_limbah_id' => 'Jenis limbah',
        'jumlah'          => 'Jumlah',
        'tgl_tbs'         => 'Tanggal',
        'jumlah_tbs'      => 'Jumlah TBS',
    ];

    public function index()
    {
        $jenisLimbah = JenisLimbah::where('aktif', true)->orderBy('nama')->get();

        $tkks = JenisLimbah::where('nama', self::NAMA_TKKS)->first();
        $persen = ($tkks?->persen_acuan ?? 22.5) / 100;

        $tbs = TbsHarian::orderByDesc('tanggal')->limit(10)->get();
        $daftarTanggal = $tbs->map(fn ($t) => $t->tanggal->toDateString())->all();

        // Jumlah TKKS yang dicatat per tanggal
        $tercatat = $tkks
            ? LimbahHarian::where('jenis_limbah_id', $tkks->id)
                ->whereIn('tanggal', $daftarTanggal)
                ->selectRaw('tanggal, SUM(jumlah) as total')
                ->groupBy('tanggal')
                ->get()
                ->mapWithKeys(fn ($r) => [$r->tanggal->toDateString() => (float) $r->total])
            : collect();

        $rekap = $tbs->map(function ($t) use ($persen, $tercatat) {
            $perkiraan = round((float) $t->jumlah * $persen, 1);
            $nilai = $tercatat[$t->tanggal->toDateString()] ?? 0;
            $selisih = $perkiraan > 0 ? round(($nilai - $perkiraan) / $perkiraan * 100, 1) : 0;

            return [
                'tanggal'   => $t->tanggal,
                'tbs'       => (float) $t->jumlah,
                'perkiraan' => $perkiraan,
                'tercatat'  => $nilai,
                'selisih'   => $selisih,
                'wajar'     => abs($selisih) <= self::BATAS_WAJAR,
            ];
        });

        // Catatan limbah hari ini (untuk kartu "Limbah hari ini" dan "Riwayat hari ini")
        $namaJenis = JenisLimbah::pluck('nama', 'id');

        $riwayatHariIni = LimbahHarian::whereDate('tanggal', today())
            ->orderByDesc('id')
            ->get()
            ->map(fn ($x) => [
                'jenis'  => $namaJenis[$x->jenis_limbah_id] ?? 'Limbah',
                'jam'    => $x->created_at?->format('H.i') ?? '-',
                'jumlah' => (float) $x->jumlah,
            ]);

        return view('operator.catat-limbah', [
            'jenisLimbah'    => $jenisLimbah,
            'rekap'          => $rekap,
            'tkksAda'        => (bool) $tkks,
            'riwayatHariIni' => $riwayatHariIni,
        ]);
    }

    public function simpanLimbah(Request $request)
    {
        $data = $request->validateWithBag('limbah', [
            'tgl_limbah'      => ['required', 'date'],
            'jenis_limbah_id' => ['required', 'exists:jenis_limbah,id'],
            'jumlah'          => ['required', 'numeric', 'gt:0'],
        ], self::PESAN, self::NAMA_KOLOM);

        LimbahHarian::create([
            'tanggal'         => $data['tgl_limbah'],
            'jenis_limbah_id' => $data['jenis_limbah_id'],
            'jumlah'          => $data['jumlah'],
        ]);

        return redirect()->route('catat-limbah')->with('sukses', 'Limbah dihasilkan berhasil disimpan.');
    }

    public function simpanTbs(Request $request)
    {
        $data = $request->validateWithBag('tbs', [
            'tgl_tbs'    => ['required', 'date'],
            'jumlah_tbs' => ['required', 'numeric', 'gt:0'],
        ], self::PESAN, self::NAMA_KOLOM);

        // Satu tanggal satu catatan: kalau sudah ada, angkanya diperbarui.
        TbsHarian::updateOrCreate(
            ['tanggal' => $data['tgl_tbs']],
            ['jumlah' => $data['jumlah_tbs']]
        );

        return redirect()->route('catat-limbah')->with('sukses', 'TBS yang diolah berhasil disimpan.');
    }
}
