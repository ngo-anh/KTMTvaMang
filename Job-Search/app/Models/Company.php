<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = '';

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [];


    /**
     * Get the user for the company.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Get the recruitment for the company.
     */
    public function recruitments()
    {
        return $this->hasMany(Recruitment::class);
    }
}
