<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ventasModal extends Model
{
    protected $primaryKey = 'idVenta';

    protected $table ='ventas';

    protected $fillable = [
        'idVenta','fecha','idArticulo','cantidad',
    ];
}
