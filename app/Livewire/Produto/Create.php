<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;

class Create extends Component
{
    public $nome;
    public $ingredientes;
    public $valor;
    public $imagem;

    protected $rules =[
        'nome'=> 'required',
        'ingredientes' => 'required',
        'valor' => 'required',
    ];
    public function store(){
        $this->validate();

        Produto::create([
            'nome'=>$this->nome,
            'ingredientes'=>$this->ingredientes,
            'valor'=>$this->valor,
            'imagem'=>$this->imagem
        ]);

        session()->flash('message', 'Produto cadastrado com sucesso!');
        return redirect()->to('/produtos');
    }
    public function render()
    {
        return view('livewire.produto.create');
    }
}
