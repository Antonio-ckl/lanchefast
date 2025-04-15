<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $nome;
    public $ingredientes;
    public $valor;
    public $imagem;

    protected $rules =[
        'nome'=> 'required',
        'ingredientes' => 'required',
        'valor' => 'required',
        'imagem' => 'required|image|mimes:jpeg,jpg,png,bmp,gif,svg'
    ];
    public function store(){
        $this->validate();

        $imagemPath = null;
        if ($this->imagem) {
            $imagemPath = $this->imagem->store('produtos', 'public');
        }

        Produto::create([
            'nome'=>$this->nome,
            'ingredientes'=>$this->ingredientes,
            'valor'=>$this->valor,
            'imagem'=>$imagemPath
        ]);

        session()->flash('message', 'Produto cadastrado com sucesso!');
        return redirect()->to('/produtos');
    }
    public function render()
    {
        return view('livewire.produto.create');
    }
}
