<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'ref',
        'lot',
        'expiry',
        'quantity',
        'incomingdate',
        'asof',
        'ageing'
    ];

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->orWhere('ref', 'like', '%' . $search . '%')
            ->orWhere('lot', 'like', '%' . $search . '%')
            ->orWhere('quantity', 'like', '%' . $search . '%')
            ->orWhere('incomingdate', 'like', '%' . $search . '%')
            ->orWhere('asof', 'like', '%' . $search . '%')
            ->orWhere('ageing', 'like', '%' . $search . '%');
    }
}
