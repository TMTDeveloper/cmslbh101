<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'people';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'user_id',
                  'name',
                  'alias',
                  'count_unit',
                  'pob',
                  'dob',
                  'gender',
                  'religion',
                  'idcard_type',
                  'blood_type',
                  'idcard_number',
                  'no_contact',
                  'email',
                  'inability_letter',
                  'address',
                  'nationality_id',
                  'province_id',
                  'regency_id',
                  'district_id',
                  'has_disablility',
                  'education',
                  'marital_status',
                  'employment_id',
                  'income',
                  'home_status',
                  'represent',
                  'org_name',
                  'org_position',
                  'org_member'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the user for this model.
     */
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    /**
     * Get the nationality for this model.
     */
    public function nationality()
    {
        return $this->belongsTo('App\Models\Nationality','nationality_id');
    }

    /**
     * Get the province for this model.
     */
    public function province()
    {
        return $this->belongsTo('App\Models\Province','province_id');
    }

    /**
     * Get the regency for this model.
     */
    public function regency()
    {
        return $this->belongsTo('App\Models\Regency','regency_id');
    }

    /**
     * Get the district for this model.
     */
    public function district()
    {
        return $this->belongsTo('App\Models\District','district_id');
    }

    /**
     * Get the employment for this model.
     */
    public function employment()
    {
        return $this->belongsTo('App\Models\Employment','employment_id');
    }    


    /**
     * Get the familyasset for this model.
     */
    public function familyasset()
    {
        return $this->hasOne('App\Models\FamilyAsset');
    }  

    /**
     * Get the application for this model.
     */
    public function application()
    {
        return $this->hasOne('App\Models\Application');
    }

    /**
     * Get deleted_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getDeletedAtAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);

    }

    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);

    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);

    }

}
