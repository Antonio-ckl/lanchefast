<div class="container mt-4">
    <div class="bg-transparent border-0 d-flex justify-content-between align-items-center mb-4 pt-3">
        <h1 class="h3 text-primary"><i class="bi bi-box-seam"></i> Produtos</h1>
        <a href="{{ route('produtos.create') }}" class="btn btn-outline-secondary">
            <i class="bi bi-plus-circle"></i> Novo Produto
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" wire:model.debounce.300ms="search" 
                    class="form-control" placeholder="Buscar produtos...">
                </div>
                <div class="col-md-3">
                    <select wire:model="perPage" class="form-select">
                        <option value="10">10 por página</option>
                        <option value="25">25 por página</option>
                        <option value="50">50 por página</option>
                        <option value="100">100 por página</option>
                    </select>
                </div>
            </div>

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Imagem  </th>
                            <th>Nome</th>
                            <th>Ingredientes</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produtos as $produto)
                        <tr>
                            <td style="width: 120px;">
                                @if($produto->imagem)
                                    <div class="card shadow-sm" style="width: 100px; height: 100px; overflow: hidden; border-radius: 8px;">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($produto->imagem) }}" alt="{{ $produto->nome }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                @else
                                    <div class="d-flex align-items-center justify-content-center bg-light" style="width: 100px; height: 100px; border-radius: 8px;">
                                        <span class="text-muted">Sem imagem</span>
                                    </div>
                                @endif
                            </td>
                            <td class="align-middle fw-bold" style="font-size: 1.1rem;">{{ $produto->nome }}</td>
                            <td class="align-middle text-muted" style="max-width: 300px;">{{ $produto->ingredientes }}</td>
                            <td class="align-middle fw-semibold text-primary" style="font-size: 1.1rem;">R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('produtos.show', $produto->id) }}" 
                                    class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('produtos.edit', $produto->id) }}" 
                                    class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button wire:click="delete({{ $produto->id }})" 
                                    class="btn btn-sm btn-danger" onclick="return 
                                    confirm('Tem certeza?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    Nenhum produto encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $produtos->links() }}
            </div>
        </div>
    </div>
</div>
