<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asistencia
 *
 * @property $id
 * @property $fecha_asistencia
 * @property $trabajador_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Trabajador $trabajador
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Asistencia extends Model
{
    
    static $rules = [
		'fecha_asistencia' => 'required',
		'trabajador_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha_asistencia','trabajador_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function trabajador()
    {
        return $this->hasOne('App\Models\Trabajador', 'id', 'trabajador_id');
    }
    

}
