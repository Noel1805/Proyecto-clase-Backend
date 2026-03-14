@extends('layouts.app')

@section('title', 'Configuración Landing Page - TechStore')

@section('content')
<main class="flex-grow flex flex-col items-center py-10 px-4 sm:px-6 lg:px-8">

    <div class="w-full max-w-3xl mb-8">
        <h1 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">
            Configuración de Landing Page
        </h1>
        <p class="text-slate-500 dark:text-[#9d9fb9]">
            Personaliza lo que verán tus clientes al entrar a la tienda.
        </p>
    </div>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
    <div class="w-full max-w-3xl mb-6 p-4 bg-green-50 dark:bg-green-500/10
                border border-green-200 dark:border-green-500/30 rounded-lg
                text-green-800 dark:text-green-400 text-sm">
        {{ session('success') }}
    </div>
    @endif

    {{-- Errores --}}
    @if($errors->any())
    <div class="w-full max-w-3xl mb-6 p-4 bg-red-50 dark:bg-red-500/10
                border border-red-200 dark:border-red-500/30 rounded-lg">
        <ul class="list-disc list-inside text-sm text-red-700 dark:text-red-300">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.landing.update') }}" method="POST"
          enctype="multipart/form-data"
          class="w-full max-w-3xl bg-white dark:bg-[#1c1c27] rounded-xl border
                 border-slate-200 dark:border-[#282a39] shadow-sm p-8 space-y-6">
        @csrf
        @method('PUT')

        {{-- Título hero --}}
        <div class="flex flex-col gap-2">
            <label class="text-slate-700 dark:text-slate-300 text-sm font-medium
                          uppercase tracking-wider" for="hero_title">
                Título principal
            </label>
            <input type="text" name="hero_title" id="hero_title"
                   value="{{ old('hero_title', $settings->hero_title) }}"
                   class="w-full rounded-lg bg-slate-50 dark:bg-[#111218] border
                          border-slate-200 dark:border-[#3b3d54] px-4 py-3 text-base
                          text-slate-900 dark:text-white focus:ring-2
                          focus:ring-primary focus:border-transparent outline-none"/>
        </div>

        {{-- Subtítulo --}}
        <div class="flex flex-col gap-2">
            <label class="text-slate-700 dark:text-slate-300 text-sm font-medium
                          uppercase tracking-wider" for="hero_subtitle">
                Subtítulo
            </label>
            <textarea name="hero_subtitle" id="hero_subtitle" rows="3"
                      class="w-full rounded-lg bg-slate-50 dark:bg-[#111218] border
                             border-slate-200 dark:border-[#3b3d54] px-4 py-3 text-base
                             text-slate-900 dark:text-white focus:ring-2
                             focus:ring-primary focus:border-transparent outline-none
                             resize-none">{{ old('hero_subtitle', $settings->hero_subtitle) }}</textarea>
        </div>

        {{-- Texto del botón CTA --}}
        <div class="flex flex-col gap-2">
            <label class="text-slate-700 dark:text-slate-300 text-sm font-medium
                          uppercase tracking-wider" for="cta_text">
                Texto del botón
            </label>
            <input type="text" name="cta_text" id="cta_text"
                   value="{{ old('cta_text', $settings->cta_text) }}"
                   class="w-full rounded-lg bg-slate-50 dark:bg-[#111218] border
                          border-slate-200 dark:border-[#3b3d54] px-4 py-3 text-base
                          text-slate-900 dark:text-white focus:ring-2
                          focus:ring-primary focus:border-transparent outline-none"/>
        </div>

        {{-- Imagen banner --}}
        <div class="flex flex-col gap-2">
            <label class="text-slate-700 dark:text-slate-300 text-sm font-medium
                          uppercase tracking-wider">
                Imagen del banner
            </label>
            @if($settings->hero_image)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $settings->hero_image) }}"
                     alt="Banner actual"
                     class="h-32 object-contain rounded-lg border
                            border-slate-200 dark:border-[#3b3d54]"/>
                <p class="text-xs text-slate-400 mt-1">Imagen actual</p>
            </div>
            @endif
            <div class="flex justify-center rounded-xl border-2 border-dashed
                        border-slate-300 dark:border-[#3b3d54] hover:border-primary
                        bg-slate-50 dark:bg-[#111218] px-6 py-8 relative
                        transition-all cursor-pointer">
                <input type="file" name="hero_image" accept="image/*"
                       class="absolute inset-0 w-full h-full opacity-0
                              cursor-pointer z-10"/>
                <div class="text-center">
                    <span class="material-symbols-outlined text-3xl text-slate-400">
                        cloud_upload
                    </span>
                    <p class="text-sm text-slate-500 mt-2">
                        Haz clic para subir o arrastra la imagen
                    </p>
                </div>
            </div>
        </div>

        {{-- Cantidad productos destacados --}}
        <div class="flex flex-col gap-2">
            <label class="text-slate-700 dark:text-slate-300 text-sm font-medium
                          uppercase tracking-wider" for="featured_count">
                Cantidad de productos destacados
            </label>
            <input type="number" name="featured_count" id="featured_count"
                   min="1" max="20"
                   value="{{ old('featured_count', $settings->featured_count) }}"
                   class="w-full rounded-lg bg-slate-50 dark:bg-[#111218] border
                          border-slate-200 dark:border-[#3b3d54] px-4 py-3 text-base
                          text-slate-900 dark:text-white focus:ring-2
                          focus:ring-primary focus:border-transparent outline-none"/>
        </div>

        {{-- Toggles de secciones --}}
        <div class="flex flex-col gap-4">
            <label class="text-slate-700 dark:text-slate-300 text-sm font-medium
                          uppercase tracking-wider block">
                Secciones visibles
            </label>
            <label class="flex items-center gap-3 cursor-pointer group">
                <input type="checkbox" name="show_categories"
                       {{ $settings->show_categories ? 'checked' : '' }}
                       class="sr-only peer"/>
                <div class="w-11 h-6 bg-slate-200 peer-focus:ring-2
                            peer-focus:ring-primary/50 rounded-full peer
                            dark:bg-[#3b3d54] peer-checked:after:translate-x-full
                            peer-checked:after:border-white after:content-['']
                            after:absolute after:top-[2px] after:left-[2px]
                            after:bg-white after:rounded-full after:h-5 after:w-5
                            after:transition-all peer-checked:bg-primary relative">
                </div>
                <span class="text-sm text-slate-900 dark:text-slate-300">
                    Mostrar sección de categorías
                </span>
            </label>
            <label class="flex items-center gap-3 cursor-pointer group">
                <input type="checkbox" name="show_featured"
                       {{ $settings->show_featured ? 'checked' : '' }}
                       class="sr-only peer"/>
                <div class="w-11 h-6 bg-slate-200 peer-focus:ring-2
                            peer-focus:ring-primary/50 rounded-full peer
                            dark:bg-[#3b3d54] peer-checked:after:translate-x-full
                            peer-checked:after:border-white after:content-['']
                            after:absolute after:top-[2px] after:left-[2px]
                            after:bg-white after:rounded-full after:h-5 after:w-5
                            after:transition-all peer-checked:bg-primary relative">
                </div>
                <span class="text-sm text-slate-900 dark:text-slate-300">
                    Mostrar productos destacados
                </span>
            </label>
        </div>

        {{-- Submit --}}
        <div class="flex justify-end pt-4">
            <button type="submit"
                    class="px-8 py-3 rounded-lg bg-primary text-white font-medium
                           hover:bg-blue-600 transition-colors shadow-lg
                           shadow-primary/25 flex items-center gap-2">
                <span class="material-symbols-outlined text-[18px]">save</span>
                Guardar configuración
            </button>
        </div>

    </form>
</main>
@endsection