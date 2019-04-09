<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseHandling extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'case_handlings';

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
                  'client_case_id',
                  'position',
                  'litigation',
                  'nonlitigation',
                  'advocacy_target',
                  'condition_achievement',
                  'obstacle',
                  'strategy_plan'
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
     * Get the clientCase for this model.
     */
    public function clientCase()
    {
        return $this->belongsTo('App\Models\ClientCase','client_case_id');
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
