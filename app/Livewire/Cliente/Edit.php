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
    
    public function mount($id)
    {
        $cliente = Cliente::findOrFail($id);
        $this->clienteId = $cliente->id;
        $this->nome = $cliente->nome;
        $this->endereco = $cliente->endereco;
        $this->telefone = $cliente->telefone;
        $this->email = $cliente->email;
        $this->cpf = $cliente->cpf;
        $this->senha = $cliente->senha;
    }

    public function update()
    {
        $validated = $this->validate([
            'nome' => 'required|min:3',
            'email' => 'required|email',
            'cpf' => 'required',
            'telefone' => 'required'
        ]);

        $cliente = Cliente::findOrFail($this->clienteId);
        $cliente->update($validated);

        session()->flash('message', 'Cliente atualizado com sucesso!');
        return redirect()->route('cliente.index');
    }

    public function render()
    {
        return view('livewire.cliente.edit');
    }
}
