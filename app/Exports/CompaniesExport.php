<?php
/**
 * Created by PhpStorm.
 * User: onder
 * Date: 7/26/18
 * Time: 2:15 PM
 */

namespace App\Exports;


use App\Company;
use Maatwebsite\Excel\Concerns\FromCollection;

class CompaniesExport implements FromCollection
{
    public function collection()
    {
        // TODO: Implement collection() method.
        return Company::all();
    }
}