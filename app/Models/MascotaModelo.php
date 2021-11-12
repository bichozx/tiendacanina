<?php

namespace App\Models;

use CodeIgniter\Model;

class MascotaModelo extends Model
{
    // ...
    protected $table      = 'mascota';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'foto', 'edad', 'descripcion', 'tipo'];
}
