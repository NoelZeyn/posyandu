<?php

namespace App\Http\Controllers;

use App\Models\AnggotaPos;
use Illuminate\Http\Request;

class AnggotaPosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggotaPos = AnggotaPos::all(); // Mengambil semua data anggota pos
        return response()->json($anggotaPos); // Mengembalikan data dalam format JSON
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id', // pastikan user_id valid dan ada di tabel users
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
        ]);

        // Menyimpan data anggota pos baru
        $anggotaPos = AnggotaPos::create([
            'user_id' => $validated['user_id'],
            'nama_lengkap' => $validated['nama_lengkap'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'alamat' => $validated['alamat'],
        ]);

        // Mengembalikan respons sukses
        return response()->json($anggotaPos, 201); // status code 201 untuk data baru
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mencari anggota pos berdasarkan ID
        $anggotaPos = AnggotaPos::find($id);

        if (!$anggotaPos) {
            return response()->json(['message' => 'Anggota Pos not found'], 404); // Jika data tidak ditemukan
        }

        // Mengembalikan data anggota pos yang ditemukan
        return response()->json($anggotaPos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Mencari anggota pos berdasarkan ID
        $anggotaPos = AnggotaPos::find($id);

        if (!$anggotaPos) {
            return response()->json(['message' => 'Anggota Pos not found'], 404); // Jika data tidak ditemukan
        }

        // Validasi input
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
        ]);

        // Memperbarui data anggota pos
        $anggotaPos->update([
            'user_id' => $validated['user_id'],
            'nama_lengkap' => $validated['nama_lengkap'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'alamat' => $validated['alamat'],
        ]);

        // Mengembalikan respons dengan data yang telah diperbarui
        return response()->json($anggotaPos);
    }

    public function destroy(string $id)
    {
        // Mencari anggota pos berdasarkan ID
        $anggotaPos = AnggotaPos::find($id);

        if (!$anggotaPos) {
            return response()->json(['message' => 'Anggota Pos not found'], 404); // Jika data tidak ditemukan
        }
        $anggotaPos->delete();
        return response()->json(['message' => 'Anggota Pos deleted successfully']);
    }
}
