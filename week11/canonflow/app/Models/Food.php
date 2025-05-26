<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;

class Food extends Model
{
    protected $table = 'foods';
    use HasFactory;

    protected $fillable = [
        'name', 'nutritional_fact', 'description',
        'price', 'category_id'
    ];

    public function category() : BelongsTo
    {
        return $this
            ->belongsTo(Category::class, 'category_id')
            ->withTrashed();
    }
}
/*
protected $table = "" -> default nama dari model dengan plural form
protected $primaryKey = "" -> default id
public $incrementing  true; -> default e true
protected $keyType = ""; -> tipe data pk, default int
public $timestamps = true; -> apakah ada kolom created_at dan updated_at di db? default YA

const CREATED_AT = ""; -> nama kolom created_at, Default: "created_at"
const UPDATED_AT = ""; -> nama kolom updated_at, Default: "updated_at"

*/
