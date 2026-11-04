@extends('layouts.app')

@section('title', 'Laporan Peminjaman')

@section('content')
    <h1>Laporan Peminjaman</h1>
    <p>Data diambil langsung dari <code>GET /api/loans</code>, bukan query database langsung.</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Anggota</th>
                <th>Petugas</th>
                <th>Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($loans as $loan)
                <tr>
                    <td>{{ data_get($loan, 'id', '-') }}</td>
                    <td>{{ data_get($loan, 'member.nama', '-') }}</td>
                    <td>{{ data_get($loan, 'petugas.name', '-') }}</td>
                    <td>
                        @foreach (data_get($loan, 'books', []) as $book)
                            {{ data_get($book, 'judul', '-') }}@if (! $loop->last), @endif
                        @endforeach
                    </td>
                    <td>{{ data_get($loan, 'tanggal_pinjam', '-') }}</td>
                    <td>{{ data_get($loan, 'tanggal_kembali', '-') }}</td>
                    <td>{{ ucfirst(data_get($loan, 'status', '-')) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Belum ada data peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if (! empty($meta))
        @php
            $currentPage = (int) ($meta['current_page'] ?? 1);
            $lastPage = max((int) ($meta['last_page'] ?? $currentPage), $currentPage);
            $baseUrl = $meta['path'] ?? route('loans.report');
        @endphp

        <nav class="pagination">
            @if ($currentPage > 1)
                <a href="{{ $baseUrl.'?page='.($currentPage - 1) }}">&laquo; Sebelumnya</a>
            @else
                <span class="pagination-disabled">&laquo; Sebelumnya</span>
            @endif

            @for ($page = 1; $page <= $lastPage; $page++)
                @if ($page === $currentPage)
                    <span class="pagination-current">{{ $page }}</span>
                @else
                    <a href="{{ $baseUrl.'?page='.$page }}">{{ $page }}</a>
                @endif
            @endfor

            @if ($currentPage < $lastPage)
                <a href="{{ $baseUrl.'?page='.($currentPage + 1) }}">Berikutnya &raquo;</a>
            @else
                <span class="pagination-disabled">Berikutnya &raquo;</span>
            @endif
        </nav>
    @endif
@endsection
