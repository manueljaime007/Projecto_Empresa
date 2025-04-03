@extends('layouts.app')
@section('title', 'Cadastrar Funcionário')

@section('content')
<div id="register_form" class="bg-[#f4f4f4]  grid place-items-center absolute top-[45%] left-[50%] translate-[-50%] px-4 py-7 rounded-md shadow-md gap-10">
    <h2 class="text-3xl font-bold mb-10">Funcionário</h2>
    <form action="{{ route('funcionario.update', ['id'=>$funcionario->id]) }}" method="POST" class="flex flex-col w-full gap-4">
    @csrf
    @method('PUT')
        <div class="flex gap-6 justify-between">
            <div class="flex flex-col gap-1 w-1/2">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" class="px-2 py-1.5 rounded-0 border-b-2 focus:border-blue-500" value="{{ $funcionario->nome }}" required>
            </div>
            <div class="flex flex-col gap-1 w-1/2">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" id="sobrenome" name="sobrenome" class="px-2 py-1.5 rounded-0 border-b-2 focus:border-blue-500" value="{{ $funcionario->sobrenome }}" required>
            </div>
        </div>
        <div class="flex flex-col gap-1">
            <label for="idade">Idade</label>
            <input type="number" id="idade" name="idade" class="px-2 py-1.5 rounded-0 border-b-2 focus:border-blue-500" value="{{ $funcionario->idade }}" min="15" max="99" required>
        </div>
        <div class="flex flex-col gap-1">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="px-2 py-1.5 rounded-0 border-b-2 focus:border-blue-500" value="{{ $funcionario->email }}" required>
        </div>
        <div class="flex items-center w-full gap-6 ">
            <div class="flex flex-col gap-1 w-1/2">
                <label for="nome">Telefone</label>
                <input type="tel" id="telefone" name="telefone" class="px-2 py-1.5 rounded-0 border-b-2 focus:border-blue-500" value="{{ $funcionario->nome }}" required>
            </div>
            <div class="flex flex-col w-1/2 gap-1">
                <label for="cargo">Cargo</label>
                <div class="flex-1">
                    <select name="id_cargo" id="id_cargo" class="border-b-2 px-2 py-1.5 w-full focus:border-blue-500">
                        @foreach ($cargos as $cargo)
                        <option value="{{ $funcionario->cargo->id }}" {{ old('id_cargo') == $cargo->id ? 'selected' : '' }}
                            class="rounded-none">{{ $cargo->cargo }}
                        </option>
                        @endforeach
                    </select>
                    @error('id_cargo')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="p-2 bg-blue-600 rounded-sm w-full text-white text-[1.15rem] font-semibold">Cadastrar</button>
        </div>
    </form>
</div>
@endsection
