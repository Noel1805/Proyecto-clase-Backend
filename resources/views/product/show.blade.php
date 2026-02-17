@extends('layouts.app')

@section('title', 'Quantum Laptop - Product Detail')

@section('content')
    <main class="flex-grow flex justify-center w-full px-4 md:px-10 lg:px-40 py-8 lg:py-12">
        
        <div class="max-w-[1440px] w-full grid grid-cols-1 lg:grid-cols-2 gap-12 xl:gap-24 relative">
            
            <div class="flex flex-col gap-6 w-full">
                <div class="lg:hidden flex flex-wrap gap-2 text-sm mb-4">
                    <a class="text-slate-500 dark:text-[#9d9fb9] hover:text-primary dark:hover:text-white transition-colors" href="#">Home</a>
                    <span class="text-slate-400 dark:text-[#9d9fb9]">/</span>
                    <a class="text-slate-500 dark:text-[#9d9fb9] hover:text-primary dark:hover:text-white transition-colors" href="#">Products</a>
                    <span class="text-slate-400 dark:text-[#9d9fb9]">/</span>
                    <span class="text-primary font-medium">Quantum Series</span>
                </div>

                <div class="group relative w-full aspect-[4/3] bg-white dark:bg-[#1a1c2e] rounded-xl overflow-hidden border border-slate-200 dark:border-[#282a39] shadow-2xl">
                    <div class="absolute inset-0 bg-gradient-to-tr from-primary/10 to-transparent opacity-50"></div>
                    <div class="w-full h-full bg-cover bg-center transition-transform duration-700 group-hover:scale-105" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDyaYeN9iZ2oiEn_uG_--P5NQG4Z98qXQQ2h7U6rundUIyJdLO_5OGLOTXt9BfqZi4K-hnADAZMmvMbVj-l1Kh4INzmiXc4w02-qIQXUJWXdHugtGlWEpU_5MIksRgNly7ms6QH_2eso_hwl7KdFF-T3Wk2R2WteqfT1VMTKfu839N8Bkt1tqDZ4w-3f8T1uCIyJN21wpL581ot732LMt7LJa8TYRaCTJkhcdd8_QHCoHd5TjSBBNJEvFeRFfjXsIx_kkDL6oXNnwE');"></div>
                    <div class="absolute bottom-4 right-4 bg-black/50 backdrop-blur-md px-3 py-1.5 rounded-lg border border-white/10 flex items-center gap-2">
                        <span class="material-symbols-outlined text-white text-[16px]">zoom_in</span>
                        <span class="text-xs text-white font-medium">Hover to zoom</span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="aspect-[4/3] bg-white dark:bg-[#1a1c2e] rounded-xl overflow-hidden border border-slate-200 dark:border-[#282a39] cursor-pointer hover:border-primary/50 transition-colors relative group">
                        <div class="w-full h-full bg-cover bg-center opacity-90 group-hover:opacity-100 transition-opacity" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCdeMU5mIuAh9wEjs4tJjC69vtQ5yZyxRQLC_Oyith3ToI3rwLRP40ZqNedPB3h6ZRAJKGolmOAmnqMRcKOK-fTiVsKhC1sDt93jYKvVJ9oG3pPhL9EAsKRucEeVJlVcTrmZq7g9H4R5AA5JefULMBq86y9mHdvlLHhV_Gs0gZtszCRPj4Kmnu1GcAGMZp9XTgQUz-W2MIuCzL3F_e7cNsUhSyJsYjqzBl1MmU_SYfM6sP7k5gO4Pdr6gR4bowhhiy9E-_Sy_aF1h0');"></div>
                    </div>
                    <div class="aspect-[4/3] bg-white dark:bg-[#1a1c2e] rounded-xl overflow-hidden border border-slate-200 dark:border-[#282a39] cursor-pointer hover:border-primary/50 transition-colors relative group">
                        <div class="w-full h-full bg-cover bg-center opacity-90 group-hover:opacity-100 transition-opacity" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDIfzVxbVcI4J3M_A5iJzVY0Br41cj8SU7cd_xEvomwf4TMvrYkZAuCOqi5bEsqPGMhaYAv_aDG3PsAgE9MEMPzC_frLBRi6jIjwTiUPq9qRbMGDehkoSH5ry4Aav4ul97zt92d23UTdG7NcI4v0sf0NFLc6G-Q6uBQ1uSqq0VdHss4IAptDC17jf9wSp38zkudPR3LL1cX8_lHpOoFjqPcACUePrJ9rZqpnszpBnCwgy8IEtGrEJnGQg_uEHx3fVvYMTY0S_JOxs4');"></div>
                    </div>
                </div>

                <div class="w-full aspect-[21/9] bg-white dark:bg-[#1a1c2e] rounded-xl overflow-hidden border border-slate-200 dark:border-[#282a39] relative">
                    <div class="w-full h-full bg-cover bg-center opacity-90" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAK_hTdZ4uu9UErOhp7ee_vHsyB2juj3QRRRMxAJTJeAERienzUH3g40_BPsx7d0rJWVz4Hxbjh3lg2xG2KblnBKkhLKoJxEqfZAdJGH4a5EIucWvrUiSGcCu632z4pbTr48Evm21hy0QyMgV-xZ7cG89dgivZPHZnlp6LUelsfLDrG899b5tG_jA0FGCdVYl9HbGg12qN8Z9DrIcfDkxiILBLuFsMG86FykpHV1EZbk7KEmWfx9uK2FEmS-DMvh0zmBKBK-abjD7I');"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 left-6">
                        <p class="text-white font-medium text-sm tracking-widest uppercase">Immersive Display</p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="lg:sticky lg:top-32 flex flex-col h-full lg:h-auto gap-8">
                    
                    <div class="hidden lg:flex flex-wrap gap-2 text-sm">
                        <a class="text-slate-500 dark:text-[#9d9fb9] hover:text-primary dark:hover:text-white transition-colors" href="#">Home</a>
                        <span class="text-slate-300 dark:text-[#6366f1]">/</span>
                        <a class="text-slate-500 dark:text-[#9d9fb9] hover:text-primary dark:hover:text-white transition-colors" href="#">Products</a>
                        <span class="text-slate-300 dark:text-[#6366f1]">/</span>
                        <span class="text-primary font-medium">Quantum Series</span>
                    </div>

                    <div class="flex flex-col gap-2 border-b border-slate-200 dark:border-[#282a39] pb-6">
                        <div class="flex items-start justify-between">
                            <div>
                                <h1 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white tracking-tight mb-2">Quantum X1</h1>
                                <p class="text-slate-600 dark:text-[#9d9fb9] text-sm md:text-base max-w-md">
                                    The pinnacle of portable computing. Neural processing architecture meets stunning OLED clarity.
                                </p>
                            </div>
                            <button class="text-slate-400 dark:text-[#9d9fb9] hover:text-primary dark:hover:text-white transition-colors p-2 rounded-full hover:bg-slate-100 dark:hover:bg-[#282a39]">
                                <span class="material-symbols-outlined">ios_share</span>
                            </button>
                        </div>
                        <div class="mt-4 flex items-baseline gap-4">
                            <h2 class="text-3xl font-bold text-primary">$2,499.00</h2>
                            <span class="text-slate-400 dark:text-[#9d9fb9] line-through decoration-1">$2,799.00</span>
                            <span class="px-2 py-0.5 rounded text-xs font-bold bg-green-500/10 text-green-600 dark:text-green-400 border border-green-500/20">In Stock</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div class="group bg-slate-50 dark:bg-[#1a1c2e] p-4 rounded-lg border border-slate-200 dark:border-[#282a39] hover:border-primary/50 transition-all hover:bg-white dark:hover:bg-[#202336] flex items-center gap-4 hover:shadow-md">
                            <div class="p-2 rounded bg-slate-200 dark:bg-[#282a39] group-hover:bg-primary/20 text-slate-500 dark:text-[#9d9fb9] group-hover:text-primary transition-colors">
                                <span class="material-symbols-outlined">memory</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-xs text-slate-500 dark:text-[#9d9fb9] uppercase tracking-wider">Processor</span>
                                <span class="text-sm font-semibold text-slate-900 dark:text-white">M2 Ultra Chip</span>
                            </div>
                        </div>
                        <div class="group bg-slate-50 dark:bg-[#1a1c2e] p-4 rounded-lg border border-slate-200 dark:border-[#282a39] hover:border-primary/50 transition-all hover:bg-white dark:hover:bg-[#202336] flex items-center gap-4 hover:shadow-md">
                            <div class="p-2 rounded bg-slate-200 dark:bg-[#282a39] group-hover:bg-primary/20 text-slate-500 dark:text-[#9d9fb9] group-hover:text-primary transition-colors">
                                <span class="material-symbols-outlined">developer_board</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-xs text-slate-500 dark:text-[#9d9fb9] uppercase tracking-wider">RAM</span>
                                <span class="text-sm font-semibold text-slate-900 dark:text-white">64GB DDR5</span>
                            </div>
                        </div>
                        <div class="group bg-slate-50 dark:bg-[#1a1c2e] p-4 rounded-lg border border-slate-200 dark:border-[#282a39] hover:border-primary/50 transition-all hover:bg-white dark:hover:bg-[#202336] flex items-center gap-4 hover:shadow-md">
                            <div class="p-2 rounded bg-slate-200 dark:bg-[#282a39] group-hover:bg-primary/20 text-slate-500 dark:text-[#9d9fb9] group-hover:text-primary transition-colors">
                                <span class="material-symbols-outlined">videogame_asset</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-xs text-slate-500 dark:text-[#9d9fb9] uppercase tracking-wider">Graphics</span>
                                <span class="text-sm font-semibold text-slate-900 dark:text-white">RTX 4090 M</span>
                            </div>
                        </div>
                        <div class="group bg-slate-50 dark:bg-[#1a1c2e] p-4 rounded-lg border border-slate-200 dark:border-[#282a39] hover:border-primary/50 transition-all hover:bg-white dark:hover:bg-[#202336] flex items-center gap-4 hover:shadow-md">
                            <div class="p-2 rounded bg-slate-200 dark:bg-[#282a39] group-hover:bg-primary/20 text-slate-500 dark:text-[#9d9fb9] group-hover:text-primary transition-colors">
                                <span class="material-symbols-outlined">hard_drive</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-xs text-slate-500 dark:text-[#9d9fb9] uppercase tracking-wider">Storage</span>
                                <span class="text-sm font-semibold text-slate-900 dark:text-white">2TB NVMe SSD</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <span class="text-xs text-slate-500 dark:text-[#9d9fb9] font-bold uppercase tracking-widest">Color Variant</span>
                        <div class="flex gap-3">
                            <button class="size-10 rounded-full bg-slate-800 ring-2 ring-primary ring-offset-2 ring-offset-slate-100 dark:ring-offset-[#101222] shadow-lg"></button>
                            <button class="size-10 rounded-full bg-neutral-400 hover:ring-2 hover:ring-slate-400 dark:hover:ring-[#9d9fb9] ring-offset-2 ring-offset-slate-100 dark:ring-offset-[#101222] transition-all"></button>
                            <button class="size-10 rounded-full bg-neutral-200 hover:ring-2 hover:ring-slate-400 dark:hover:ring-[#9d9fb9] ring-offset-2 ring-offset-slate-100 dark:ring-offset-[#101222] transition-all border border-slate-300 dark:border-none"></button>
                        </div>
                    </div>

                    <div class="flex flex-col gap-4 mt-4">
                        <div class="flex gap-4 h-14">
                            <button class="flex-1 bg-primary hover:bg-blue-600 text-white font-bold rounded-lg shadow-lg hover:shadow-primary/50 transition-all flex items-center justify-center gap-2 text-lg">
                                <span>Buy Now</span>
                                <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                            </button>
                            <button class="aspect-square h-full flex items-center justify-center rounded-lg border border-slate-200 dark:border-[#282a39] bg-white dark:bg-[#1a1c2e] hover:border-primary hover:text-primary text-slate-700 dark:text-white transition-all group">
                                <span class="material-symbols-outlined group-hover:scale-110 transition-transform filled-icon">favorite</span>
                            </button>
                        </div>
                        <p class="text-xs text-slate-500 dark:text-[#9d9fb9] text-center flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-[16px] text-green-500 dark:text-green-400">verified_user</span>
                            2-Year Warranty Included · Free Global Shipping
                        </p>
                    </div>

                    <div class="flex flex-col border-t border-slate-200 dark:border-[#282a39] pt-4 mt-4">
                        <div class="py-3 flex justify-between items-center text-slate-900 dark:text-white cursor-pointer group hover:text-primary transition-colors">
                            <span class="font-medium">Technical Specifications</span>
                            <span class="material-symbols-outlined text-slate-400 dark:text-[#9d9fb9] group-hover:text-primary">expand_more</span>
                        </div>
                        <div class="py-3 flex justify-between items-center text-slate-900 dark:text-white cursor-pointer group border-t border-slate-200 dark:border-[#282a39]/50 hover:text-primary transition-colors">
                            <span class="font-medium">In the Box</span>
                            <span class="material-symbols-outlined text-slate-400 dark:text-[#9d9fb9] group-hover:text-primary">expand_more</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection