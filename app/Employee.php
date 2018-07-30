<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * App\Employee
 *
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string|null $email
 * @property string $phone
 * @property int|null $companyid
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Company|null $company
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereCompanyid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Employee extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'phone',
        'email',
        'companyid',
        'logo',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'companyid');
    }

    public static function get_query(Request $request)
    {
        return Employee::with('company')
            ->when($request->filled('namefilter'), function ($query) use ($request) {
                $query->where('name', 'LIKE', "%{$request->input('namefilter')}%");
            })
            ->when($request->filled('lastnamefilter'), function ($query) use ($request) {
                $query->where('lastname', 'LIKE', "%{$request->input('lastnamefilter')}%");
            })
            ->when($request->filled('emailfilter'), function ($query) use ($request) {
                $query->where('email', 'LIKE', "%{$request->input('emailfilter')}%");
            })
            ->when($request->filled('phonefilter'), function ($query) use ($request) {
                $query->where('phone', 'LIKE', "%{$request->input('phonefilter')}%");
            })
            ->when($request->filled('companyfilter'), function ($query) use ($request) {
                $query->where('companyid', "{$request->input('companyfilter')}");
            });
    }
}
