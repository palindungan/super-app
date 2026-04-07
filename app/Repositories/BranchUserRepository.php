<?php

namespace App\Repositories;

use App\Models\BranchUser;
use Illuminate\Support\Facades\DB;

class BranchUserRepository
{
    public static function getQuery($param = [])
    {
        $query = BranchUser::query();
        $query->leftJoin('users', 'users.id', '=', 'branch_users.user_id');
        return $query;
    }
}
