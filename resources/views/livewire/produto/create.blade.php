<div class="container mt-4">
    <div class="bg-transparent border-0 d-flex justify-content-between align-items-center mb-4 pt-3">
        <h1 class="h3 text-primary"><i class="bi bi-box-seam"></i> Cadastrar Produto</h1>
        <a href="{{ route('produtos.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
    </div>

    <div class="card">
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
                        <label for="ingredientes" class="form-label">Ingredientes</label>
                        <input type="text" wire:model="ingredientes" id="ingredientes" class="form-control">
                        @error('ingredientes') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="valor" class="form-label">Valor</label>
                        <input type="number" wire:model="valor" id="valor" class="form-control" step="0.01">
                        @error('valor') <span class="text-danger">{{ $message }}</span> @enderror
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
                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                            <i class="bi bi-save"></i> Cadastrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
