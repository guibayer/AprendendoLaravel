<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desenvolvedor extends Model
{
    protected $table = 'Desenvolvedores';

    function projetos(){
        //Primeiro parametro, o modelo que vou retornar e o segundo parâmetro é em qual tabela que está essa relação
        return $this->belongsToMany('App\Projeto', 'alocacoes')->withPivot('horas_semanais');
    }

}
