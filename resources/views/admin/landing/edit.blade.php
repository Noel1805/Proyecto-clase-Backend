@extends('layouts.app')

@section('title', 'Configuración Landing Page - TechStore')

@section('content')
<main class="flex-grow w-full max-w-[1440px] mx-auto px-4 lg:px-10 py-6 lg:py-10">

    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900 dark:text-white">
            Configuración de Landing Page
        </h1>
        <p class="text-slate-500 dark:text-[#9d9fb9] mt-1">
            Personaliza lo que verán tus clientes al entrar a la tienda.
        </p>
    </div>

    {{-- Alerta éxito --}}
    @if(session('success'))
    <div class="mb-6 p-4 bg-green-50 dark:bg-green-500/10 border
                border-green-200 dark:border-green-500/30 rounded-lg
                text-green-800 dark:text-green-400 text-sm flex items-center gap-2">
        <span class="material-symbols-outlined text-[18px]">check_circle</span>
        {{ session('success') }}
    </div>
    @endif

    {{-- Errores --}}
    @if($errors->any())
    <div class="mb-6 p-4 bg-red-50 dark:bg-red-500/10 border
                border-red-200 dark:border-red-500/30 rounded-lg">
        <div class="flex items-center gap-2 text-red-800 dark:text-red-400
                    font-medium mb-2">
            <span class="material-symbols-outlined text-[18px]">error</span>
            Corrige los siguientes errores:
        </div>
        <ul class="list-disc list-inside text-sm text-red-700 dark:text-red-300
                   space-y-1">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- Formulario --}}
        <div class="lg:col-span-2">
            <form action="{{ route('admin.landing.update') }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="bg-white dark:bg-[#1c1c27] rounded-xl border
                            border-slate-200 dark:border-[#282a39] shadow-sm
                            overflow-hidden">

                    {{-- Sección: Contenido hero --}}
                    <div class="p-6 border-b border-slate-200 dark:border-[#282a39]">
                        <h2 class="text-base font-bold text-slate-900 dark:text-white
                                   mb-5 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-[20px]">
                                title
                            </span>
                            Contenido principal
                        </h2>

                        <div class="space-y-5">

                            {{-- Título --}}
                            <div class="flex flex-col gap-2">
                                <label for="hero_title"
                                       class="text-slate-700 dark:text-slate-300
                                              text-xs font-medium uppercase
                                              tracking-wider">
                                    Título principal *
                                </label>
                                <input type="text" name="hero_title" id="hero_title"
                                       value="{{ old('hero_title', $settings->hero_title) }}"
                                       class="w-full rounded-lg bg-slate-50
                                              dark:bg-[#111218] border border-slate-200
                                              dark:border-[#3b3d54] px-4 py-3 text-sm
                                              text-slate-900 dark:text-white
                                              placeholder:text-slate-400
                                              dark:placeholder:text-[#9d9fb9]
                                              focus:ring-2 focus:ring-primary
                                              focus:border-transparent outline-none
                                              transition-all"
                                       placeholder="Ej: El Futuro es Plegable."/>
                            </div>

                            {{-- Subtítulo --}}
                            <div class="flex flex-col gap-2">
                                <label for="hero_subtitle"
                                       class="text-slate-700 dark:text-slate-300
                                              text-xs font-medium uppercase
                                              tracking-wider">
                                    Subtítulo
                                </label>
                                <textarea name="hero_subtitle" id="hero_subtitle"
                                          rows="3"
                                          class="w-full rounded-lg bg-slate-50
                                                 dark:bg-[#111218] border
                                                 border-slate-200 dark:border-[#3b3d54]
                                                 px-4 py-3 text-sm text-slate-900
                                                 dark:text-white placeholder:text-slate-400
                                                 dark:placeholder:text-[#9d9fb9]
                                                 focus:ring-2 focus:ring-primary
                                                 focus:border-transparent outline-none
                                                 transition-all resize-none"
                                          placeholder="Descripción breve de tu tienda">{{ old('hero_subtitle', $settings->hero_subtitle) }}</textarea>
                            </div>

                            {{-- Texto del botón --}}
                            <div class="flex flex-col gap-2">
                                <label for="cta_text"
                                       class="text-slate-700 dark:text-slate-300
                                              text-xs font-medium uppercase
                                              tracking-wider">
                                    Texto del botón *
                                </label>
                                <input type="text" name="cta_text" id="cta_text"
                                       value="{{ old('cta_text', $settings->cta_text) }}"
                                       class="w-full rounded-lg bg-slate-50
                                              dark:bg-[#111218] border border-slate-200
                                              dark:border-[#3b3d54] px-4 py-3 text-sm
                                              text-slate-900 dark:text-white
                                              placeholder:text-slate-400
                                              dark:placeholder:text-[#9d9fb9]
                                              focus:ring-2 focus:ring-primary
                                              focus:border-transparent outline-none
                                              transition-all"
                                       placeholder="Ej: Ver productos"/>
                            </div>

                        </div>
                    </div>

                    {{-- Sección: Imagen banner --}}
                    <div class="p-6 border-b border-slate-200 dark:border-[#282a39]">
                        <h2 class="text-base font-bold text-slate-900 dark:text-white
                                   mb-5 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-[20px]">
                                image
                            </span>
                            Imagen del banner
                        </h2>

                        @if($settings->hero_image)
                        <div class="mb-4 flex items-center gap-4 p-3 bg-slate-50
                                    dark:bg-[#111218] rounded-lg border
                                    border-slate-200 dark:border-[#3b3d54]">
                            <img src="{{ asset('storage/' . $settings->hero_image) }}"
                                 alt="Banner actual"
                                 class="h-16 w-16 object-contain rounded"/>
                            <div>
                                <p class="text-sm font-medium text-slate-900
                                          dark:text-white">
                                    Imagen actual
                                </p>
                                <p class="text-xs text-slate-500 dark:text-[#9d9fb9]">
                                    Sube una nueva para reemplazarla
                                </p>
                            </div>
                        </div>
                        @endif

                        <div class="flex justify-center rounded-xl border-2 border-dashed
                                    border-slate-300 dark:border-[#3b3d54]
                                    hover:border-primary dark:hover:border-primary
                                    bg-slate-50 dark:bg-[#111218]
                                    hover:bg-slate-100 dark:hover:bg-[#16171f]
                                    transition-all px-6 py-10 relative cursor-pointer">
                            <input name="hero_image" accept="image/*"
                                   class="absolute inset-0 w-full h-full opacity-0
                                          cursor-pointer z-10"
                                   type="file"/>
                            <div class="text-center">
                                <div class="mx-auto flex h-12 w-12 items-center
                                            justify-center rounded-full
                                            bg-slate-200 dark:bg-[#282a39]
                                            text-slate-400 dark:text-slate-400">
                                    <span class="material-symbols-outlined text-2xl">
                                        cloud_upload
                                    </span>
                                </div>
                                <p class="mt-3 text-sm text-slate-500
                                          dark:text-[#9d9fb9]">
                                    <span class="font-medium text-primary">
                                        Haz clic para subir
                                    </span>
                                    o arrastra la imagen
                                </p>
                                <p class="text-xs text-slate-400 dark:text-[#56586d] mt-1">
                                    PNG, JPG, GIF hasta 2MB
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Sección: Configuración de secciones --}}
                    <div class="p-6 border-b border-slate-200 dark:border-[#282a39]">
                        <h2 class="text-base font-bold text-slate-900 dark:text-white
                                   mb-5 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-[20px]">
                                tune
                            </span>
                            Configuración de secciones
                        </h2>

                        <div class="space-y-5">

                            {{-- Cantidad productos --}}
                            <div class="flex flex-col gap-2">
                                <label for="featured_count"
                                       class="text-slate-700 dark:text-slate-300
                                              text-xs font-medium uppercase
                                              tracking-wider">
                                    Cantidad de productos destacados
                                </label>
                                <input type="number" name="featured_count"
                                       id="featured_count" min="1" max="20"
                                       value="{{ old('featured_count', $settings->featured_count) }}"
                                       class="w-32 rounded-lg bg-slate-50
                                              dark:bg-[#111218] border border-slate-200
                                              dark:border-[#3b3d54] px-4 py-3 text-sm
                                              text-slate-900 dark:text-white
                                              focus:ring-2 focus:ring-primary
                                              focus:border-transparent outline-none
                                              transition-all"/>
                            </div>

                            {{-- Toggles --}}
                            <div class="space-y-4">
                                <label class="text-slate-700 dark:text-slate-300
                                              text-xs font-medium uppercase
                                              tracking-wider block">
                                    Secciones visibles
                                </label>

                                {{-- Toggle categorías --}}
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <div class="relative">
                                        <input type="checkbox" name="show_categories"
                                               {{ $settings->show_categories ? 'checked' : '' }}
                                               class="sr-only peer"/>
                                        <div class="w-11 h-6 bg-slate-200
                                                    dark:bg-[#3b3d54] rounded-full
                                                    peer peer-checked:bg-primary
                                                    transition-colors">
                                        </div>
                                        <div class="absolute top-0.5 left-0.5 w-5 h-5
                                                    bg-white rounded-full shadow
                                                    transition-transform
                                                    peer-checked:translate-x-5">
                                        </div>
                                    </div>
                                    <span class="text-sm text-slate-900 dark:text-white">
                                        Mostrar sección de categorías
                                    </span>
                                </label>

                                {{-- Toggle productos destacados --}}
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <div class="relative">
                                        <input type="checkbox" name="show_featured"
                                               {{ $settings->show_featured ? 'checked' : '' }}
                                               class="sr-only peer"/>
                                        <div class="w-11 h-6 bg-slate-200
                                                    dark:bg-[#3b3d54] rounded-full
                                                    peer peer-checked:bg-primary
                                                    transition-colors">
                                        </div>
                                        <div class="absolute top-0.5 left-0.5 w-5 h-5
                                                    bg-white rounded-full shadow
                                                    transition-transform
                                                    peer-checked:translate-x-5">
                                        </div>
                                    </div>
                                    <span class="text-sm text-slate-900 dark:text-white">
                                        Mostrar productos destacados
                                    </span>
                                </label>
                            </div>

                        </div>
                    </div>

                    {{-- Submit --}}
                    <div class="p-6 flex justify-end">
                        <button type="submit"
                                class="px-8 py-3 rounded-lg bg-primary text-white
                                       font-medium hover:bg-blue-600 transition-colors
                                       shadow-lg shadow-primary/25 flex items-center
                                       gap-2">
                            <span class="material-symbols-outlined text-[18px]">
                                save
                            </span>
                            Guardar configuración
                        </button>
                    </div>

                </div>
            </form>
        </div>

        {{-- Panel de ayuda --}}
        <div class="lg:col-span-1 space-y-4">

            <div class="bg-white dark:bg-[#1c1c27] rounded-xl border
                        border-slate-200 dark:border-[#282a39] shadow-sm p-6">
                <h3 class="text-sm font-bold text-slate-900 dark:text-white mb-4
                           flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary text-[18px]">
                        info
                    </span>
                    Vista previa
                </h3>
                <p class="text-xs text-slate-500 dark:text-[#9d9fb9] leading-relaxed">
                    Los cambios que guardes aquí se reflejarán inmediatamente en la
                    página principal de tu tienda.
                </p>
                <a href="{{ url('/') }}" target="_blank"
                   class="mt-4 w-full py-2.5 rounded-lg border
                          border-slate-200 dark:border-[#3b3d54]
                          text-slate-700 dark:text-[#9d9fb9] text-sm font-medium
                          hover:bg-slate-50 dark:hover:bg-[#282a39] transition-colors
                          flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-[16px]">
                        open_in_new
                    </span>
                    Ver landing page
                </a>
            </div>

            <div class="bg-primary/5 dark:bg-primary/10 rounded-xl border
                        border-primary/20 p-6">
                <h3 class="text-sm font-bold text-slate-900 dark:text-white mb-3
                           flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary text-[18px]">
                        tips_and_updates
                    </span>
                    Consejos
                </h3>
                <ul class="space-y-2 text-xs text-slate-500 dark:text-[#9d9fb9]
                           leading-relaxed">
                    <li class="flex items-start gap-2">
                        <span class="material-symbols-outlined text-primary text-[14px] mt-0.5">
                            check_circle
                        </span>
                        El título debe ser corto e impactante.
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="material-symbols-outlined text-primary text-[14px] mt-0.5">
                            check_circle
                        </span>
                        Usa imágenes en PNG o JPG con fondo transparente.
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="material-symbols-outlined text-primary text-[14px] mt-0.5">
                            check_circle
                        </span>
                        Muestra entre 4 y 8 productos destacados para mejor rendimiento.
                    </li>
                </ul>
            </div>

        </div>
    </div>

</main>
@endsection