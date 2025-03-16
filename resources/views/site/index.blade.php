@extends('layouts.app')
@section('title', 'Listar funcionários')

@section('content')
<div id="overlay"></div>
<main class="w-full px-20 py-10 flex flex-col gap-10 mb-4rem">
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-semibold">Funcionários</h1>
        <a href="{{ route('funcionario.create') }}" class="bg-red-700 py-2 px-4 rounded-sm text-white font-semibold cursor-pointer flex items-center gap-3">
            Novo Funcionário
            <span class="material-icons">
                add_circle
            </span>
        </a>
    </div>
    <section>
        <!-- Tabela -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 text-left text-gray-600">#</th>
                        <th class="py-2 px-4 text-left text-gray-600">Nome Completo</th>
                        <th class="py-2 px-4 text-left text-gray-600">Idade</th>
                        <th class="py-2 px-4 text-left text-gray-600">Email</th>
                        <th class="py-2 px-4 text-left text-gray-600">Telefone</th>
                        <th class="py-2 px-4 text-left text-gray-600">Cargo</th>
                        <th class="py-2 px-4 text-left text-gray-600" colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($funcionarios as $func)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4 font-semibold">{{ $func->id}}</td>
                            <td class="py-2 px-4 font-semibold">
                                {{ $func->nome }} {{ $func->sobrenome }}
                            </td>

                            <td class="py-2 px-4">{{ $func->idade }}</td>

                            <td class="py-2 px-4">
                                {{ Str::limit($func->email, 20, '...') }}
                            </td>

                            <td class="py-2 px-4">{{ $func->telefone }}</td>

                            <td class="py-2 px-4">{{ $func->cargo->cargo }}</td>

                            <td class="py-2 px-4 flex gap-4">
                                <a class="p-2 rounded-md grid place-items-center text-white bg-blue-600">
                                    <span class="material-icons">
                                        edit
                                    </span>
                                </a>
                                <a class="p-2 rounded-md grid place-items-center">
                                    <span class="material-icons">
                                        delete
                                    </span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</main>

@endsection

