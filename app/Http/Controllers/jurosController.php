<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juros; // Substitua "SeuModelo" pelo nome do seu modelo

class JurosController extends Controller
{
    public function calcularJuros()
    {
        // Recupere os dados relevantes do banco de dados
        $dados = SeuModelo::first();

        // Inicialize as variáveis de juros, multa e total a pagar
        $juros = 0.03;
        $multa = 1;
        $total_pagar = $dados->valor;

        // Verifique se a data de baixa é posterior à data de vencimento
        if ($dados->data_baixa > $dados->data_vcto) {
            // Calcule os dias de atraso
            $dias_atraso = $dados->data_baixa->diffInDays($dados->data_vcto);

            // Calcule os juros
            $juros = ($dados->valor * $dados->taxa * $dias_atraso) / 100;

            // Calcule a multa (se necessário)
            $multa = $dados->multa * $dados->valor;

            // Calcule o total a pagar
            $total_pagar += $juros + $multa;
        }

        // Retorne os resultados como variáveis PHP
        return [
            'valor' => $dados->valor,
            'juros' => $juros,
            'multa' => $multa,
            'total_pagar' => $total_pagar,
            'dias_atraso' => isset($dias_atraso) ? $dias_atraso : null
        ];
    }
}

