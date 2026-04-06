<?php

namespace App\Repositories;

use App\Models\Branch;

class BranchRepository
{
    public static function getQuery($param = [])
    {
        $query = Branch::query();
        $query->leftJoin('companies', 'companies.id', '=', 'branches.company_id');
        return $query;
    }
}
