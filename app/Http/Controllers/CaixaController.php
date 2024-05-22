<?php
  
namespace App\Http\Controllers;
  

use App\Models\caixa;
use App\Models\PlanoContas;
use Illuminate\Http\Request;

use App\Models\Conta;
 
class CaixaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $caixa = caixa::orderBy('created_at', 'DESC')->get();
        return view('caixa.index', compact('caixa'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contas = PlanoContas::all();
        return view('caixa.create',compact('contas'));
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        Caixa::create($request->all());
        return redirect()->route('caixa')->with('success', 'caixa added successfully');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $caixa = Caixa::findOrFail($id);
        
        return view('caixa.show', compact('caixa'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        $contas = PlanoContas::all();
        $caixa = Caixa::findOrFail($id);
        return view('caixa.edit', compact('caixa','contas'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $caixa = Caixa::findOrFail($id);
        
        $caixa->update($request->all());
        
  
        return redirect()->route('caixa')->with('success', 'caixa updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    
    {
        
        $caixa = Caixa::findOrFail($id);
  
        $caixa->delete();
  
        return redirect()->route('caixa')->with('success', 'caixa deleted successfully');
    }
}

class ContaController extends Controller
{
    public function darBaixa($id)
    {
        $conta = Conta::findOrFail($id);
        // Aqui você faz o cálculo dos juros com base na data atual e outros dados da conta
        // Suponhamos que você tenha um método na model Conta para calcular os juros
        $juros = $conta->calcularJuros();
        $conta->baixar($juros);
        return redirect()->back()->with('success', 'Conta baixada com sucesso!');
        
    }
}
class ContaController2 extends Controller
{
    public function show($id)
    {
        $conta = Conta::findOrFail($id);
        return view('caixa.show', compact('conta'));
    }
}
