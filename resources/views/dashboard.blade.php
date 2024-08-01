<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listagem de Produtos') }}
        </h2>
    </x-slot>

    <div class="container-fluid">
        <div class="title mx-auto my-4" style="font-size: 30px;">
            <h1>Listagem de Produtos</h1>
        </div>

        <div class="mb-4">
            <a href="{{ route('product.create') }}" class="btn btn-primary">Adicionar Produto</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('product.destroy', $product->id) }}" class="delete-form" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
