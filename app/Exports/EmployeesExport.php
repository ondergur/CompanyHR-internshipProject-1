<?php
/**
 * Created by PhpStorm.
 * User: onder
 * Date: 7/26/18
 * Time: 2:15 PM
 */

namespace App\Exports;


use App\Employee;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

class EmployeesExport implements FromQuery, WithMapping
{

    /**
     * @return Builder
     */
    public function query()
    {
        return Employee::get_query(request());
    }


    /**
     * @param Employee $row
     *
     * @return array
     */
    public function map($row): array
    {
        return [
          $row->name,
          $row->lastname,
          $row->email,
          $row->phone,
          $row->company->name,
        ];
    }
}