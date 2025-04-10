<?php

namespace App\Livewire\Cliente;

use Livewire\Component;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;

class Create extends Component
{
    public $nome;
    public $endereco;
    public $telefone;
    public $cpf;
    public $email;
    public $senha;

    protected $rules = [
        'nome' => 'required|min:3',
        'endereco' => 'required',
        'telefone' => 'required',
        'cpf' => 'required|unique:clientes,cpf',
        'email' => 'required|email|unique:clientes,email',
        'senha' => 'required|min:6'
    ];

    public function store()
    {
        $this->validate();

        Cliente::create([
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => Hash::make($this->senha)
        ]);

        session()->flash('message', 'Cliente cadastrado com sucesso!');
        return redirect()->to('/clientes');
    }


    public function render()
    {

        return view('livewire.cliente.create');
    }
}
