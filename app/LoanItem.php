<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanItem extends Model
{
    protected $fillable = ['loan_id', 'book_id'];
}