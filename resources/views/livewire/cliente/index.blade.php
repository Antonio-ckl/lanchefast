<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            <h1 class="h3 text-primary"><i class="bi bi-person-circle"></i>  Cliente</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('cliente.create') }}" class="btn btn-primary">
                <i class="bi bi-person-fill-add"></i> Novo Cliente
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
<input type="text" wire:model.lazy="search" class="form-control"
    placeholder="Buscar Clientes...">
                </div>
                <div class="col-md-3">
                    <select wire:model="perPage" class="form-select">
                        <option value="10">10 por pagina</option>
                        <option value="25">25 por pagina</option>
                        <option value="50">50 por pagina</option>
                        <option value="100">100 por pagina</option>
                    </select>
                </div>
            </div>
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{session("message")}}
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->nome}}</td>
                            <td>{{$cliente->cpf}}</td>
                            <td>{{$cliente->email}}</td>
                            <td>{{$cliente->telefone}}</td>
                            <td>
                                <a href="{{route('cliente.show', $cliente->id)}}"
                                    class="btn btn-sm btn-info">
                                    <i class="bi bi-info-circle-fill"></i>
                                </a>

                                
                                <a href="{{route('cliente.edit', $cliente->id)}}"
                                    class="btn btn-sm btn-warning">
                                    <i class="bi bi-person-fill-gear"></i>
                                </a>

                                
                                <button wire:click="delete({{$cliente->id}})"
                                    class="btn btn-sm btn-danger" onclick="return confirm('Tem Certeza')">
                                    <i class="bi bi-person-x-fill"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                         <tr>
                            <td colspan="5" class="text-center">Nenhum Cliente Encontrado.</td>
                        </tr>   
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{$clientes->links()}}
            </div>
        </div>
    </div>
</div>
