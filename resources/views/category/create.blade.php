@extends('layouts.app')

@section('title', 'Nueva Categoría - TechStore')

@section('content')
<main class="flex-grow flex flex-col items-center py-10 px-4 sm:px-6 lg:px-8">

    <div class="w-full max-w-2xl mb-8">
        <h1 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">
            Nueva categoría
        </h1>
    </div>

    @if($errors->any())
    <div class="w-full max-w-2xl mb-6 p-4 bg-red-50 dark:bg-red-500/10 border
                border-red-200 dark:border-red-500/30 rounded-lg">
        <ul class="list-disc list-inside text-sm text-red-700 dark:text-red-300">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('category.store') }}" method="POST"
          class="w-full max-w-2xl bg-white dark:bg-[#1c1c27] rounded-xl border
                 border-slate-200 dark:border-[#282a39] shadow-sm p-8 space-y-6">
        @csrf

        <div class="flex flex-col gap-2">
            <label for="name"
                   class="text-slate-700 dark:text-slate-300 text-sm font-medium
                          uppercase tracking-wider">
                Nombre *
            </label>
            <input type="text" name="name" id="name"
                   value="{{ old('name') }}"
                   class="w-full rounded-lg bg-slate-50 dark:bg-[#111218] border
                          border-slate-200 dark:border-[#3b3d54] px-4 py-3 text-base
                          text-slate-900 dark:text-white focus:ring-2
                          focus:ring-primary focus:border-transparent outline-none"
                   placeholder="Ej: Smartphones"/>
        </div>

        <div class="flex flex-col gap-2">
            <label for="description"
                   class="text-slate-700 dark:text-slate-300 text-sm font-medium
                          uppercase tracking-wider">
                Descripción
            </label>
            <textarea name="description" id="description" rows="4"
                      class="w-full rounded-lg bg-slate-50 dark:bg-[#111218] border
                             border-slate-200 dark:border-[#3b3d54] px-4 py-3 text-base
                             text-slate-900 dark:text-white focus:ring-2
                             focus:ring-primary focus:border-transparent outline-none
                             resize-none"
                      placeholder="Descripción opcional de la categoría">{{ old('description') }}</textarea>
        </div>

        <div class="flex items-center justify-between pt-4">
            <a href="{{ route('category.index') }}"
               class="text-slate-500 dark:text-[#9d9fb9] hover:text-primary
                      transition-colors text-sm">
                Cancelar
            </a>
            <button type="submit"
                    class="px-8 py-3 rounded-lg bg-primary text-white font-medium
                           hover:bg-blue-600 transition-colors shadow-lg
                           shadow-primary/25 flex items-center gap-2">
                <span class="material-symbols-outlined text-[18px]">save</span>
                Guardar categoría
            </button>
        </div>
    </form>

</main>
@endsection