@extends('layouts.index')
@section('title', 'Formulário de produto')
@section('description', 'Edite, crie e atualize um determinado produto.')

@section('content')
    <section class="text-gray-600">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-2/4 w-full mx-auto overflow-auto">
                <div class="flex items-center justify-between mb-2">
                    <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Editar produto</h1>
                </div>

                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.products.update', $product->id) }}">
                    @csrf
                    @method('put')
                    <div class="flex flex-wrap">
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Nome do produto</label>
                                <input type="text" id="name" name="name" value="{{ $product->name }}"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Preço</label>
                                <input type="text" id="price" name="price" value="{{ $product->price }}"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Estoque</label>
                                <input type="text" id="stock" name="stock" value="{{ $product->stock }}"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Imagem de capa</label>
                                <input type="file" id="cover" name="cover"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Descrição</label>
                                <textarea id="description" name="description"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $product->description }}</textarea>
                            </div>
                        </div>
                        @if ($product->cover)
                            <div class="flex items-center justify-center w-max-[100px] h-max-[100px]">
                                <img alt="ecommerce" class="max-w-[100px] object-cover object-center rounded"
                                    src="{{ \Illuminate\Support\Facades\Storage::url($product->cover) }}">

                                <a href="{{ route('admin.products.destroyImage', $product->id) }}"
                                    class="flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">
                                    Deletar Imagem
                                </a>
                            </div>
                        @endif

                        <div class="p-2 w-full">
                            <button
                                class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Salvar
                                Alterações</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
