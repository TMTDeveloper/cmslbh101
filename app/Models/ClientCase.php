<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientCase extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'client_cases';

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
                  'person_id',
                  'application_id',
                  'case_title',
                  'recommendation',
                  'pp_piket',
                  'pp_penerima',
                  'pp_asisten'
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
     * Get the person for this model.
     */
    public function person()
    {
        return $this->belongsTo('App\Models\Person','person_id');
    }


    public function pp_piketUser()
    {
        return $this->belongsTo('App\User','pp_piket');
    }

    public function pp_penerimaUser()
    {
        return $this->belongsTo('App\User','pp_penerima');
    }

    public function pp_asistenUser()
    {
        return $this->belongsTo('App\User','pp_asisten');
    }


    /**
     * Get the application for this model.
     */
    public function application()
    {
        return $this->belongsTo('App\Models\Application','application_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function caseClassification()
    {
        return $this->hasMany('App\Models\CaseClassification');
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
