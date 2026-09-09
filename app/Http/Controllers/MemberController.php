<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private array $members = [
        ['id' => 1, 'nama' => 'Siti Rahma', 'nim' => '2141720001', 'email' => 'siti.rahma@example.com', 'nomor_telepon' => '081234567801', 'alamat' => 'Jl. Merdeka No. 10, Malang', 'status' => 'aktif'],
        ['id' => 2, 'nama' => 'Budi Santoso', 'nim' => '2141720002', 'email' => 'budi.santoso@example.com', 'nomor_telepon' => '081234567802', 'alamat' => 'Jl. Sudirman No. 25, Malang', 'status' => 'aktif'],
        ['id' => 3, 'nama' => 'Dewi Anggraini', 'nim' => '2141720003', 'email' => 'dewi.anggraini@example.com', 'nomor_telepon' => '081234567803', 'alamat' => 'Jl. Kawi No. 7, Malang', 'status' => 'nonaktif'],
    ];

    public function index()
    {
        $members = $this->members;

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();

        return redirect()->route('members.index')
            ->with('success', "Anggota \"{$validated['nama']}\" berhasil ditambahkan (data dummy, belum tersimpan ke database).");
    }

    public function show(string $id)
    {
        return "MemberController@show, id: {$id}";
    }

    public function edit(string $id)
    {
        return "MemberController@edit, id: {$id}";
    }

    public function update(Request $request, string $id)
    {
        return "MemberController@update, id: {$id}";
    }

    public function destroy(string $id)
    {
        return "MemberController@destroy, id: {$id}";
    }
}