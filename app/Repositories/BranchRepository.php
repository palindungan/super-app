<?php

namespace App\Repositories;

use App\Models\Branch;
use Illuminate\Support\Facades\DB;

class BranchRepository
{
    public static function getQuery($param = [])
    {
        $query = Branch::query();
        $query->leftJoin('companies', 'companies.id', '=', 'branches.company_id');

        $branch_user_counts = DB::table('branch_users')
            ->select(
                'branch_id',
                DB::raw('COUNT(user_id) as count'),
            )
            ->groupBy('branch_id');
        $query->leftJoinSub($branch_user_counts, 'branch_user_counts', function ($join) {
            $join->on('branches.id', '=', 'branch_user_counts.branch_id');
        });

        return $query;
    }
}
