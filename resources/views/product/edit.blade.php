@extends('layouts.app')

@section('title', 'Edit Product - TechStore')

@section('content')
    <main class="flex-grow flex flex-col items-center py-10 px-4 sm:px-6 lg:px-8">
        
        {{-- Formulario apuntando a la ruta de actualización y método PUT --}}
        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="w-full flex flex-col items-center">
            @csrf
            @method('PUT')

            <div class="w-full max-w-4xl mb-8">
                <div class="flex items-center gap-2 mb-6 text-sm">
                    <a class="text-slate-500 hover:text-primary transition-colors font-medium" href="#">Dashboard</a>
                    <span class="material-symbols-outlined text-[16px] text-slate-400">chevron_right</span>
                    <a class="text-slate-500 hover:text-primary transition-colors font-medium" href="{{ route('produc.index') }}">Products</a>
                    <span class="material-symbols-outlined text-[16px] text-slate-400">chevron_right</span>
                    <span class="text-slate-900 font-medium">Edit Product</span>
                </div>
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div>
                        <h1 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight mb-2">Edit: {{ $product->name }}</h1>
                        <p class="text-slate-500 text-base">Update the information for this listing.</p>
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('produc.index') }}" class="px-5 py-2.5 rounded-lg border border-slate-200 text-slate-700 font-medium hover:bg-slate-50 transition-colors text-sm flex items-center justify-center">Cancel</a>
                        
                        <button type="submit" class="px-5 py-2.5 rounded-lg bg-primary text-white font-medium hover:bg-blue-600 transition-colors shadow-lg shadow-primary/25 text-sm flex items-center gap-2">
                            <span class="material-symbols-outlined text-[18px]">save</span>
                            Update Product
                        </button>
                    </div>
                </div>
            </div>

            <div class="w-full max-w-4xl bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="p-8">
                    
                    {{-- INDICADOR DE ERRORES --}}
                    @if ($errors->any())
                        <div class="mb-8 p-4 bg-red-50 border border-red-200 rounded-lg">
                            <div class="flex items-center gap-2 text-red-800 font-bold mb-2">
                                <span class="material-symbols-outlined text-[20px]">error</span>
                                Por favor corrige los siguientes errores:
                            </div>
                            <ul class="list-disc list-inside text-sm text-red-700">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-10">
                        <h3 class="text-lg font-bold text-slate-900 mb-6 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">info</span>
                            General Information
                        </h3>
                        <div class="space-y-6">
                            
                            <div class="flex flex-col gap-2">
                                <label class="text-slate-700 text-sm font-medium uppercase tracking-wider" for="nombre">Product Name</label>
                                <input name="nombre" id="nombre" value="{{ old('nombre', $product->name) }}" class="w-full rounded-lg bg-slate-50 border border-slate-200 px-4 py-3 text-base text-slate-900 placeholder:text-slate-400 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none" placeholder="Ej: Licencia de Software IDE Pro" type="text" />
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="flex flex-col gap-2">
                                    <label class="text-slate-700 text-sm font-medium uppercase tracking-wider" for="precio">Price (USD)</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <span class="text-slate-500 font-medium">$</span>
                                        </div>
                                        <input name="precio" id="precio" value="{{ old('precio', $product->price) }}" class="w-full rounded-lg bg-slate-50 border border-slate-200 pl-8 pr-4 py-3 text-base text-slate-900 placeholder:text-slate-400 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none" placeholder="99.99" step="0.01" type="number" />
                                    </div>
                                </div>
                                
                                <div class="flex flex-col gap-2">
                                    <label class="text-slate-700 text-sm font-medium uppercase tracking-wider" for="category_id">Category</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <span class="material-symbols-outlined text-[18px] text-slate-400">category</span>
                                        </div>
                                        <select name="category_id" id="category_id" class="w-full appearance-none rounded-lg bg-slate-50 border border-slate-200 pl-10 pr-4 py-3 text-base text-slate-900 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none" >
                                            <option value="" disabled>Select a category</option>
                                            @foreach($myCategorias as $categoria)
                                                <option value="{{ $categoria->id }}" {{ old('category_id', $product->category_id) == $categoria->id ? 'selected' : '' }}>{{ $categoria->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex flex-col gap-2">
                                <label class="text-slate-700 text-sm font-medium uppercase tracking-wider flex justify-between" for="description">
                                    Description
                                </label>
                                <textarea name="description" id="description" class="w-full rounded-lg bg-slate-50 border border-slate-200 px-4 py-3 text-base text-slate-900 placeholder:text-slate-400 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none resize-none" placeholder="Características del producto..." rows="4" >{{ old('description', $product->description) }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="border-slate-200 mb-10"/>
                    
                    <div class="mb-10">
                        <h3 class="text-lg font-bold text-slate-900 mb-6 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">image</span>
                            Product Media
                        </h3>
                        <div class="w-full">
                            <label class="text-slate-700 text-sm font-medium uppercase tracking-wider mb-2 block">Upload Image (Optional)</label>
                            
                            {{-- Mostrar imagen actual si existe --}}
                            @if($product->image && $product->image !== 'no hay ruta')
                                <div class="mb-4">
                                    <p class="text-sm text-slate-500 mb-2">Current Image:</p>
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-32 object-contain rounded-lg border border-slate-200 bg-slate-50 p-2">
                                </div>
                            @endif

                            <div class="flex justify-center rounded-xl border-2 border-dashed border-slate-300 hover:border-primary bg-slate-50 hover:bg-slate-100 transition-all px-6 py-10 group cursor-pointer relative">
                                <input name="imagen" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" type="file"/>
                                <div class="text-center">
                                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-slate-200 text-slate-400 group-hover:bg-primary/20 group-hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-3xl">cloud_upload</span>
                                    </div>
                                    <div class="mt-4 flex flex-col gap-1 text-sm leading-6 text-slate-600">
                                        <span class="font-semibold text-primary">Click to upload a new image</span> or drag and drop
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="border-slate-200 mb-10"/>
                    
                    <div class="flex flex-col md:flex-row gap-8 justify-between items-start">
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-slate-900 mb-2 flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary">settings</span>
                                Visibility Status
                            </h3>
                            <p class="text-slate-500 text-sm">Control whether this product is visible to customers in the store listing.</p>
                        </div>
                        <div class="flex flex-col gap-4 min-w-[240px]">
                            <label class="text-slate-700 text-sm font-medium uppercase tracking-wider block">Product Status</label>
                            <div class="flex items-center gap-3">
                                <label class="relative inline-flex items-center cursor-pointer group">
                                    <input name="status" type="checkbox" value="active" class="sr-only peer" {{ old('status', $product->status) == 'active' ? 'checked' : '' }} />
                                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/50 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                                    <span class="ml-3 text-sm font-medium text-slate-900">Active</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection