<x-app-layout>
<div class="container mt-5">
        <h1>{{ isset($product) ? 'Editar Produto' : 'Criar Novo Produto' }}</h1>
        <form action="{{ isset($product) ? route('product.update', $product->id) : route('product.store') }}" method="POST">
            @csrf
            @if(isset($product))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name ?? '') }}" placeholder="Nome do Produto" required>
            </div>
            <div class="form-group">
                <label for="price">Preço</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $product->price ?? '') }}" placeholder="Preço do Produto" required>
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Descrição do Produto">{{ old('description', $product->description ?? '') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($product) ? 'Atualizar Produto' : 'Adicionar Produto' }}</button>
            <a href="{{ route('product.index') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>

</x-app-layout>
