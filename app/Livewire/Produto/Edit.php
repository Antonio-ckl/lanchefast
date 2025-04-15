<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;

use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $produtoId;
    public $nome;
    public $valor;
    public $ingredientes;
    public $imagem;
    public $imagemAtual;

    public function mount($id){
        $produto= Produto::findOrFail($id);   
        $this->produtoId=$produto->id;
        $this->nome=$produto->nome;
        $this->valor=$produto->valor;
        $this->ingredientes=$produto->ingredientes;
        $this->imagemAtual=$produto->imagem;
    }
      
    public function update(){
        $validate = $this -> validate([
            'nome'=> 'required',
            'valor'=>'required',
            'ingredientes'=>'required',
            'imagem' => 'nullable|image|max:1024', // max 1MB
        ]);

        $produto = Produto::findOrFail($this->produtoId);

        if ($this->imagem && $this->imagem !== $this->imagemAtual) {
            $path = $this->imagem->store('produtos', 'public');
            $validate['imagem'] = $path;
        } else {
            $validate['imagem'] = $this->imagemAtual;
        }

        $produto->update($validate);
        session()->flash('message','Produto Atualizado');
        return redirect()->route('produtos.index');
    }


    
    public function render()
    {
        return view('livewire.produto.edit');
    }
}
