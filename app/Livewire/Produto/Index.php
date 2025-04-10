<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
    ];

    public function render()
    {
        $produtos = Produto::where('nome', 'like', "%{$this->search}%")
        ->orWhere('ingredientes', 'like', "%{$this->search}%")
        ->paginate($this->perPage);

        return view('livewire.produto.index', compact('produtos'));
    }
    public function delete($id)
    {
        Produto::findOrFail($id)->delete();
        session()->flash('message', 'Produto deletado com sucesso.');
    }
}
