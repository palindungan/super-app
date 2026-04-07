<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    protected $fillable = [
        'company_id',
        'code',
        'name',
    ];

    public function branch_users(): HasMany
    {
        return $this->hasMany(BranchUser::class);
    }
}
