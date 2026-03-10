@extends('layouts.app')

@section('title', 'Add New Product - TechStore')

@section('content')
    <main class="flex-grow flex flex-col items-center py-10 px-4 sm:px-6 lg:px-8">
        
        {{-- Asegúrate de que el nombre aquí coincida con el ->name() en web.php --}}
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="w-full flex flex-col items-center">
            @csrf

            <div class="w-full max-w-4xl mb-8">
                <div class="flex items-center gap-2 mb-6 text-sm">
                    <a class="text-slate-500 dark:text-[#9d9fb9] hover:text-primary transition-colors font-medium" href="#">Dashboard</a>
                    <span class="material-symbols-outlined text-[16px] text-slate-400 dark:text-[#56586d]">chevron_right</span>
                    <a class="text-slate-500 dark:text-[#9d9fb9] hover:text-primary transition-colors font-medium" href="#">Products</a>
                    <span class="material-symbols-outlined text-[16px] text-slate-400 dark:text-[#56586d]">chevron_right</span>
                    <span class="text-slate-900 dark:text-white font-medium">Add New</span>
                </div>
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div>
                        <h1 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white tracking-tight mb-2">Add New Product</h1>
                        <p class="text-slate-500 dark:text-[#9d9fb9] text-base">Create a new listing for your store inventory.</p>
                    </div>
                    <div class="flex gap-3">
                        <button type="button" class="px-5 py-2.5 rounded-lg border border-slate-200 dark:border-[#3b3d54] text-slate-700 dark:text-[#9d9fb9] font-medium hover:bg-slate-50 dark:hover:bg-[#282a39] transition-colors text-sm">Cancel</button>
                        
                        <button type="submit" class="px-5 py-2.5 rounded-lg bg-primary text-white font-medium hover:bg-blue-600 transition-colors shadow-lg shadow-primary/25 text-sm flex items-center gap-2">
                            <span class="material-symbols-outlined text-[18px]">save</span>
                            Save Product
                        </button>
                    </div>
                </div>
            </div>

            <div class="w-full max-w-4xl bg-white dark:bg-[#1c1c27] rounded-xl border border-slate-200 dark:border-[#282a39] shadow-sm overflow-hidden">
                <div class="p-8">
                    
                    {{-- INDICADOR DE ERRORES --}}
                    @if ($errors->any())
                        <div class="mb-8 p-4 bg-red-50 dark:bg-red-500/10 border border-red-200 dark:border-red-500/30 rounded-lg">
                            <div class="flex items-center gap-2 text-red-800 dark:text-red-400 font-bold mb-2">
                                <span class="material-symbols-outlined text-[20px]">error</span>
                                Por favor corrige los siguientes errores:
                            </div>
                            <ul class="list-disc list-inside text-sm text-red-700 dark:text-red-300">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-10">
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">info</span>
                            General Information
                        </h3>
                        <div class="space-y-6">
                            
                            <div class="flex flex-col gap-2">
                                <label class="text-slate-700 dark:text-slate-300 text-sm font-medium uppercase tracking-wider" for="nombre">Product Name</label>
                                <input name="nombre" id="nombre" value="{{ old('nombre') }}" class="w-full rounded-lg bg-slate-50 dark:bg-[#111218] border border-slate-200 dark:border-[#3b3d54] px-4 py-3 text-base text-slate-900 dark:text-white placeholder:text-slate-400 dark:placeholder:text-slate-500 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none" placeholder="Ej: Licencia de Software IDE Pro" type="text" />
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="flex flex-col gap-2">
                                    <label class="text-slate-700 dark:text-slate-300 text-sm font-medium uppercase tracking-wider" for="precio">Price (USD)</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <span class="text-slate-500 dark:text-slate-400 font-medium">$</span>
                                        </div>
                                        <input name="precio" id="precio" value="{{ old('precio') }}" class="w-full rounded-lg bg-slate-50 dark:bg-[#111218] border border-slate-200 dark:border-[#3b3d54] pl-8 pr-4 py-3 text-base text-slate-900 dark:text-white placeholder:text-slate-400 dark:placeholder:text-slate-500 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none" placeholder="99.99" step="0.01" type="number" />
                                    </div>
                                </div>
                                
                                <div class="flex flex-col gap-2">
                                    <label class="text-slate-700 dark:text-slate-300 text-sm font-medium uppercase tracking-wider" for="category_id">Category</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <span class="material-symbols-outlined text-[18px] text-slate-400 dark:text-slate-500">category</span>
                                        </div>
                                        <select name="category_id" id="category_id" class="w-full appearance-none rounded-lg bg-slate-50 dark:bg-[#111218] border border-slate-200 dark:border-[#3b3d54] pl-10 pr-4 py-3 text-base text-slate-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none" >
                                            <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Select a category</option>
                                            @foreach($myCategorias as $categoria)
                                                <option value="{{ $categoria->id }}" {{ old('category_id') == $categoria->id ? 'selected' : '' }}>{{ $categoria->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex flex-col gap-2">
                                <label class="text-slate-700 dark:text-slate-300 text-sm font-medium uppercase tracking-wider flex justify-between" for="description">
                                    Description
                                </label>
                                <textarea name="description" id="description" class="w-full rounded-lg bg-slate-50 dark:bg-[#111218] border border-slate-200 dark:border-[#3b3d54] px-4 py-3 text-base text-slate-900 dark:text-white placeholder:text-slate-400 dark:placeholder:text-slate-500 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none resize-none" placeholder="Características del producto..." rows="4" >{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="border-slate-200 dark:border-[#282a39] mb-10"/>
                    
                    <div class="mb-10">
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">image</span>
                            Product Media
                        </h3>
                        <div class="w-full">
                            <label class="text-slate-700 dark:text-slate-300 text-sm font-medium uppercase tracking-wider mb-2 block">Upload Image</label>
                            <div class="flex justify-center rounded-xl border-2 border-dashed border-slate-300 dark:border-[#3b3d54] hover:border-primary dark:hover:border-primary bg-slate-50 dark:bg-[#111218] hover:bg-slate-100 dark:hover:bg-[#16171f] transition-all px-6 py-10 group cursor-pointer relative">
                                <input name="imagen" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" type="file"/>
                                <div class="text-center">
                                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-slate-200 dark:bg-[#282a39] text-slate-400 dark:text-slate-400 group-hover:bg-primary/20 group-hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-3xl">cloud_upload</span>
                                    </div>
                                    <div class="mt-4 flex flex-col gap-1 text-sm leading-6 text-slate-600 dark:text-slate-400">
                                        <span class="font-semibold text-primary">Click to upload</span> or drag and drop
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="border-slate-200 dark:border-[#282a39] mb-10"/>
                    
                    <div class="flex flex-col md:flex-row gap-8 justify-between items-start">
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2 flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary">settings</span>
                                Visibility Status
                            </h3>
                            <p class="text-slate-500 dark:text-[#9d9fb9] text-sm">Control whether this product is visible to customers in the store listing.</p>
                        </div>
                        <div class="flex flex-col gap-4 min-w-[240px]">
                            <label class="text-slate-700 dark:text-slate-300 text-sm font-medium uppercase tracking-wider block">Product Status</label>
                            <div class="flex items-center gap-3">
                                <label class="relative inline-flex items-center cursor-pointer group">
                                    <input name="status" checked class="sr-only peer" type="checkbox" value="active"/>
                                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/50 dark:peer-focus:ring-primary/30 rounded-full peer dark:bg-[#3b3d54] peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
                                    <span class="ml-3 text-sm font-medium text-slate-900 dark:text-slate-300">Active</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection