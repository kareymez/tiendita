<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class articulosModal extends Model
{
    protected $primaryKey = 'idArticulo';

    protected $table ='articulos';

    protected $fillable = [
        'idArticulo','nombre','descripcion','costo','idProveedor',
    ];
}
