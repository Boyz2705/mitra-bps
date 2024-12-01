<?php

namespace App\Imports;

use App\Models\Mitra;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;

class MitrasImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        // Cek jika SOBAT ID sudah ada di database
        $mitra = Mitra::where('sobat_id', $row['sobat_id'])->first();

        if ($mitra) {
            // Jika SOBAT ID sudah ada, update data lain termasuk Satker, tapi tidak menimpa sobat_id
            $mitra->update([
                'nama_mitra' => $row['nama_mitra'] ?? $mitra->nama_mitra,
                'jenis_kelamin' => $row['jenis_kelamin'] ?? $mitra->jenis_kelamin,
                'email' => $row['email'] ?? $mitra->email,
                'posisi' => $row['posisi'] ?? $mitra->posisi,
                'satker' => $row['satker'] ?? $mitra->satker,  // Tambah mapping Satker
            ]);
            return null; // Skip insert baru jika sudah ada Sobat ID
        }

        // Jika SOBAT ID tidak ada, buat data baru termasuk Satker
        return new Mitra([
            'sobat_id' => $row['sobat_id'],
            'nama_mitra' => $row['nama_mitra'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'email' => $row['email'],
            'posisi' => $row['posisi'],
            'satker' => $row['satker'],  // Tambahkan Satker ke data baru
        ]);
    }

    public function rules(): array
    {
        return [
            'sobat_id' => 'required',
            'nama_mitra' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required|email',
            'posisi' => 'required',
            'satker' => 'required',  // Tambahkan validasi untuk Satker
        ];
    }

    public function customValidationMessages()
    {
        return [
            'sobat_id.required' => 'SOBAT ID harus diisi.',
            'nama_mitra.required' => 'Nama Mitra harus diisi.',
            'email.required' => 'Email harus diisi.',
            'satker.required' => 'Satker harus diisi.',  // Pesan error untuk Satker
        ];
    }
}



