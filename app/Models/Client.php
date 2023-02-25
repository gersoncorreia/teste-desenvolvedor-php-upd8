<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes, UsesUuid;
    protected $table = 'clients';
    protected $primaryKey = "id";
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'name','cpf','date_birth','sex'
    ];

    public function addresses(){
        return $this->hasMany(Address::class);
    }
}
