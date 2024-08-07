<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Employee extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'company_id',
        'identification',
        'name',
        'last_name',
        'charge_id',
        'area_id',
        'phone',
        'cell_phone',
        'email',
        'hiring_date',
        'discharge_date',
        'birthday',
        'observation',
        'code',
        'image',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'hiring_date'    => 'date',
        'discharge_date' => 'date',
        'birthday'       => 'date',
    ];

    protected $appends = ['full_name'];

       protected static function boot(){
        parent::boot();

        static::creating(function ($employee) {
            $employee->company_id = 1;
        });

        static::updating(function ($employee) {
            $employee->company_id = 1;
        });
    }

   protected function fullName(): Attribute
   {
        return Attribute::make(
            get: fn () => $this->name . ' ' . $this->last_name,
        );
    }

    protected function isBirthdayToday(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->birthday && Carbon::parse($this->birthday)->format('m-d') === Carbon::now()->format('m-d')
        );
    }

    public function age()
    {
        return $this->birthday->age;
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function charge()
    {
        return $this->belongsTo(Charge::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function workGroups()
    {
        return $this->belongsToMany(WorkGroup::class);
    }

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function scopeBirthdayInMonth($query, $month)
    {
        return $query->whereMonth('birthday', $month);
    }

    
}
