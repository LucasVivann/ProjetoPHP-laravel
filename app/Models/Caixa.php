<?php


namespace App\Models;
 
use App\Models\PlanoContas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 
class Caixa extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'id',
        'data',
        'Historico',
        'valor',
        'debito_credito',
        'data_vcto',
        'data_baixa',
        'conta_ID',
        'juros',
        'multas',
        'acrecimos',
        'descontos',
        'valor_com_juros',
        'valor_com_multa',
        
        
    ];
    public function plano(){

        return $this->beLongsTo(PlanoContas::class,'conta_ID');

    }
}

