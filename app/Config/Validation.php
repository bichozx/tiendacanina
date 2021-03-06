<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    public $formularioProducto = [

        'nombreproducto' => 'required',
        'foto' => 'required',
        'precio' => 'required',
        'descripcion' => 'required',
        'tipo' => 'required'
    ];

    public $formularioMascota = [

        'nombre' => 'required',
        'foto' => 'required',
        'edad' => 'required',
        'descripcion' => 'required',
        'tipo' => 'required'
    ];

    public $EditformularioProducto = [

        'nombreproducto' => 'required',
        'foto' => 'required',
        'precio' => 'required',
        'descripcion' => 'required'
        
    ];

    public $EditarformularioMascota =[
        
        'nombre' => 'required',
        'foto' => 'required',
        'edad' => 'required',
        'descripcion' => 'required'
    ];



    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
}
