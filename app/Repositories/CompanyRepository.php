<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository
{
    public static function getQuery($param = [])
    {
        $query = Company::query();
        $query->leftJoin('currencies AS default_currencies', 'default_currencies.id', '=', 'companies.default_currency_id');
        return $query;
    }
}
