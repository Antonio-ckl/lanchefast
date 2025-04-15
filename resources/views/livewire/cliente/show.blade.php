<x-layouts.app>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 text-primary"><i class="bi bi-person-circle"></i> Detalhes do Cliente</h1>
            <a href="{{ route('cliente.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>

        @if($nome)
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Informações Pessoais</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-semibold">Nome:</div>
                            <div class="col-sm-8">{{ $nome }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-semibold">CPF:</div>
                            <div class="col-sm-8">{{ $cpf }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-semibold">Email:</div>
                            <div class="col-sm-8">{{ $email }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-semibold">Telefone:</div>
                            <div class="col-sm-8">{{ $telefone }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-semibold">Endereço:</div>
                            <div class="col-sm-8">{{ $endereco ?? 'Não Informado' }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">Ações</h5>
                    </div>
                    <div class="card-body d-flex flex-column gap-2">
                        <a href="{{ route('cliente.edit', $clienteId) }}" class="btn btn-warning w-100">
                            <i class="bi bi-person-fill-gear"></i> Editar Cliente
                        </a>
                        <button wire:click="delete({{ $clienteId }})" class="btn btn-danger w-100" onclick="return confirm('Tem certeza que deseja deletar este cliente?')">
                            <i class="bi bi-person-x-fill"></i> Deletar Cliente
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="alert alert-warning" role="alert">
            Cliente não encontrado.
        </div>
        @endif
    </div>
</x-layouts.app>
