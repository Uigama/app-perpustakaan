<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'member' => $this->whenLoaded('member', fn () => new MemberResource($this->member)),
            'petugas' => $this->whenLoaded('user', fn () => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'email' => $this->user->email,
            ]),
            'tanggal_pinjam' => $this->tanggal_pinjam,
            'tanggal_kembali' => $this->tanggal_kembali,
            'tanggal_dikembalikan' => $this->tanggal_dikembalikan,
            'status' => $this->status,
            'books' => $this->whenLoaded('loanItems', function () {
                return $this->loanItems
                    ->map(function ($loanItem) {
                        return [
                            'id' => $loanItem->book_id,
                            'judul' => $loanItem->book?->judul,
                            'penulis' => $loanItem->book?->penulis,
                            'penerbit' => $loanItem->book?->penerbit,
                            'tahun_terbit' => $loanItem->book?->tahun_terbit,
                        ];
                    })
                    ->values();
            }),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
