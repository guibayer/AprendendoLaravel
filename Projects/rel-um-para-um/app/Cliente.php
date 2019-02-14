<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function endereco(){
        return $this->hasOne('App\Endereco');
        //caso não seja utilizado o padrão id é possível usar a função com mais argumentos, ex:
        // return $this->hasOne('App\Endereco', 'cliente_codigo', 'codigo');
    }
}
