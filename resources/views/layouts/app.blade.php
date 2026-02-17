<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'TechStore')</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#2b3bee",
                        "background-light": "#f6f6f8",
                        "background-dark": "#101222",
                    },
                    fontFamily: {
                        "display": ["Space Grotesk", "sans-serif"],
                        "sans": ["Space Grotesk", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #1c1c27; }
        ::-webkit-scrollbar-thumb { background: #3b3d54; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #4b4d66; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
        
        /* Remove number input spinner */
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; margin: 0; 
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-white font-display min-h-screen flex flex-col">

    <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-slate-200 dark:border-[#282a39] px-4 lg:px-10 py-4 bg-white dark:bg-[#111218] sticky top-0 z-50">
        <div class="flex items-center gap-8">
            <div class="flex items-center gap-3 text-slate-900 dark:text-white group">
                <div class="size-8 flex items-center justify-center bg-primary rounded-lg text-white">
                    <span class="material-symbols-outlined text-xl">grid_view</span>
                </div>
                <h2 class="text-xl font-bold leading-tight tracking-[-0.015em] group-hover:text-primary transition-colors">TechStore</h2>
            </div>
            <nav class="hidden md:flex items-center gap-9">
                <a class="text-slate-500 dark:text-[#9d9fb9] hover:text-primary dark:hover:text-white text-sm font-medium leading-normal transition-colors" href="#">Dashboard</a>
                <a class="text-primary dark:text-white text-sm font-medium leading-normal" href="#">Products</a>
                <a class="text-slate-500 dark:text-[#9d9fb9] hover:text-primary dark:hover:text-white text-sm font-medium leading-normal transition-colors" href="#">Orders</a>
                <a class="text-slate-500 dark:text-[#9d9fb9] hover:text-primary dark:hover:text-white text-sm font-medium leading-normal transition-colors" href="#">Analytics</a>
            </nav>
        </div>
        <div class="flex flex-1 justify-end gap-6 items-center">
            <div class="hidden sm:flex relative w-full max-w-xs h-10">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400 dark:text-[#9d9fb9]">
                    <span class="material-symbols-outlined text-[20px]">search</span>
                </div>
                <input class="w-full bg-slate-100 dark:bg-[#282a39] border-none rounded-lg text-sm pl-10 pr-4 text-slate-900 dark:text-white placeholder:text-slate-400 dark:placeholder:text-[#9d9fb9] focus:ring-2 focus:ring-primary focus:outline-none transition-all" placeholder="Search products, orders..." type="text"/>
            </div>
            <button class="relative p-2 text-slate-500 dark:text-[#9d9fb9] hover:bg-slate-100 dark:hover:bg-[#282a39] rounded-lg transition-colors">
                <span class="material-symbols-outlined">notifications</span>
                <span class="absolute top-2 right-2 size-2 bg-primary rounded-full border-2 border-white dark:border-[#111218]"></span>
            </button>
            <div class="bg-center bg-no-repeat bg-cover rounded-full size-10 ring-2 ring-slate-100 dark:ring-[#282a39] cursor-pointer" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBvaJYHWNHhTT2XtZ-97kpvFwCzkSruEhT9l9dGAxPda01CdkZCKcBGShOngoy1Rt9t9kzGFoy-oACvO_xfu9NUaoj8qoYKAijLSLjt8dn6hUcxGU96yRqv011nfj7Rh5IHQhgvXU4Bm2wbfiXnXWKlwU_YgHv1v34qTHsTMgWD5IAhz1g0iYs7KpQgwpzdJSNVNQf2JmSCOBDwEFz2iEvzEE-EM0sgDMaTDVYn42IxM_K8y8rB4V5GE2wQclKHd8FSzZvPyjCxNKw");'></div>
        </div>
    </header>

    @yield('content')

    <footer class="mt-auto border-t border-slate-200 dark:border-[#282a39] bg-white dark:bg-[#111218] py-8 px-10">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-slate-500 dark:text-[#9d9fb9] text-sm font-normal">© 2023 TechStore Inc. All rights reserved.</p>
            <div class="flex gap-6">
                <a class="text-slate-500 dark:text-[#9d9fb9] hover:text-primary transition-colors text-sm" href="#">Privacy Policy</a>
                <a class="text-slate-500 dark:text-[#9d9fb9] hover:text-primary transition-colors text-sm" href="#">Terms of Service</a>
                <a class="text-slate-500 dark:text-[#9d9fb9] hover:text-primary transition-colors text-sm" href="#">Help Center</a>
            </div>
        </div>
    </footer>

</body>
</html>