<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Cadastrar Novo Produto</h2>
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>
        
        <div class="card-body">
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent="store" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" wire:model="nome" id="nome" class="form-control">
                        @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <input type="text" wire:model="descricao" id="descricao" class="form-control">
                        @error('descricao') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="preco" class="form-label">Preço</label>
                        <input type="number" wire:model="preco" id="preco" class="form-control" step="0.01">
                        @error('preco') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6 mb-3"> 

                        <label class="btn btn-outline-primary btn-sm mt-2"> 
                            <i class="bi bi-upload"></i> Escolher Foto 
                            <input type="file" wire:model="imagem" class="d-none" accept="image/*"> 
                        </label> 

                        @if ($imagem)
                            <div class="mt-2">
                                <img src="{{ $imagem->temporaryUrl() }}" alt="Preview da Imagem" style="max-width: 200px; max-height: 200px;">
                            </div>
                        @endif

                        @error('imagem') <small class="text-danger d-block">{{ $message }}</small> @enderror 

                    </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
