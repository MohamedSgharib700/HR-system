<?php

namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Relations\HasOne as HasOneAlias;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\ClientRepository;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\Passport;
use Laravel\Passport\Token;
use Laravel\Passport\TokenRepository;

class User extends Authenticatable
{
    use HasApiTokens;
    use Notifiable;
    use SoftDeletes;
    use CanResetPassword;
    protected $table = 'users';
    protected $with = ['department', 'position'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'machine_code',
        'location_id',
        'department_id',
        'position_id',
        'insurance_number',
        'national_id_number',
        'medical_number',
        'name',
        'email',
        'image',
        'birthdate',
        'gender',
        'marital_status',
        'military_status',
        'mobile_number',
        'landline_number',
        'local_address',
        'current_address',
        'educational_qualification',
        'special_graduation',
        'university',
        'graduation_year',
        'graduation_grade',
        'hiring_date',
        'hiring_date_form_one',
        'contract_start_date',
        'contract_end_date',
        'termination_date',
        'termination_reason',
        'annual_vacation_balance',
        'net_salary',
        'type',
        'active',
        'token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'token'
    ];

    /**
     * @param $pass
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = \Hash::make($pass);
    }


    public function papers()
    {
        return $this->hasMany(UserPaper::class);
    }


    public function vacations()
    {
        return $this->hasMany(Vacation::class, 'user_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }


}
