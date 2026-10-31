<?php

namespace App\Http\Controllers\Api;

use App\Book;
use App\Http\Controllers\Controller;
use App\Loan;
use App\Member;

class StatsController extends Controller
{
    public function index()
    {
        return response()->json([
            'total_buku' => Book::count(),
            'total_anggota' => Member::count(),
            'peminjaman_aktif' => Loan::where('status', 'dipinjam')->count(),
        ]);
    }
}
