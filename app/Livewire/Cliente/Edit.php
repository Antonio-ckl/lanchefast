<?php

namespace App\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Component;

class Edit extends Component
{
    public $clienteId;
    public $nome;
    public $endereco;
    public $telefone;
    public $email;
    public $cpf;
    public $senha;
    
    public function mount($id){
        $clientes=Cliente::find($id);
        $this->clienteId>$clientes->id;
        $this->nome->$clientes->nome;
        $this->endereco->$clientes->endereco;
        $this->telefone->$clientes->telefone;
        $this->email->$clientes->email;
        $this->cpf->$clientes->cpf;
        $this->senha->$clientes->senha;
    }

    public function save(){
        $clientes= Cliente::find($this->id);
        $this->nome->$clientes->nome;
        $this->endereco->$clientes->endereco;
        $this->telefone->$clientes->telefone;
        $this->email->$clientes->email;
        $this->cpf->$clientes->cpf;
        $this->senha->$clientes->senha;

        $clientes->save();
        session()->flash('success', 'Cliente Atualizado');
    }
    public function render()
    {
        return view('livewire.cliente.edit');
    }
}
