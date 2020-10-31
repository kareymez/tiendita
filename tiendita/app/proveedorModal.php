<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proveedorModal extends Model
{
    protected $primaryKey = 'idProveedor';

    protected $table ='proveedores';

    protected $fillable = [
        'idProveedor','nombre','categoria',
    ];
}
