<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseDocument extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'case_documents';

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
                  'surat_polisi',
                  'surat_gugatan',
                  'jwbn_gugatan',
                  'surat_dakwaan',
                  'eksepsi',
                  'tanggapan_eksepsi',
                  'putusan_sela',
                  'bukti',
                  'pledoi',
                  'replik',
                  'duplik',
                  'kesimpulan',
                  'putusan_pn',
                  'pernyataan_banding',
                  'memori_banding',
                  'kontra_memori_banding',
                  'putusan_pt',
                  'pernyataan_kasasi',
                  'memori_kasasi',
                  'kontra_memori_kasasi',
                  'putusan_ma',
                  'surat',
                  'lainnya',
                  'user_id'
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
