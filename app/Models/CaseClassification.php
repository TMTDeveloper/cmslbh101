<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseClassification extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'case_classifications';

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
                  'user_id',
                  'case1_classification_id',
                  'case2_classification_id',
                  'case3_classification_id',
                  'case4_classification_id',
                  'violated_right_id'
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
     * Get the user for this model.
     */
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    /**
     * Get the case1Classification for this model.
     */
    public function case1Classification()
    {
        return $this->belongsTo('App\Models\Case1Classification','case1_classification_id');
    }

    /**
     * Get the case2Classification for this model.
     */
    public function case2Classification()
    {
        return $this->belongsTo('App\Models\Case2Classification','case2_classification_id');
    }

    /**
     * Get the case3Classification for this model.
     */
    public function case3Classification()
    {
        return $this->belongsTo('App\Models\Case3Classification','case3_classification_id');
    }

    /**
     * Get the case4Classification for this model.
     */
    public function case4Classification()
    {
        return $this->belongsTo('App\Models\Case4Classification','case4_classification_id');
    }

    /**
     * Get the violatedRight for this model.
     */
    public function violatedRight()
    {
        return $this->belongsTo('App\Models\ViolatedRight','violated_right_id');
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
