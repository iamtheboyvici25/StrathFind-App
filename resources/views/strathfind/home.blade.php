<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StrathFind · Lost & Found Hub</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-[#FFF7F0] via-white to-[#E9F4FF] text-slate-900 antialiased">
    <div class="min-h-screen flex flex-col">
        <header class="border-b border-white/30 bg-white/70 backdrop-blur-xl">
            <div class="mx-auto max-w-6xl px-6 py-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-orange-500/10 text-orange-600 font-semibold text-lg shadow-inner shadow-orange-200">SF</span>
                    <div>
                        <p class="font-semibold text-lg text-slate-900">StrathFind</p>
                        <p class="text-xs uppercase tracking-widest text-slate-500">Lost &amp; Found desk</p>
                    </div>
                </div>
                <nav class="hidden md:flex items-center gap-6 text-sm font-medium text-slate-600">
                    <a href="#lost-items" class="hover:text-slate-900 transition">Lost items</a>
                    <a href="#claims" class="hover:text-slate-900 transition">Claims</a>
                    <a href="#notifications" class="hover:text-slate-900 transition">Alerts</a>
                    <a href="#faq" class="hover:text-slate-900 transition">FAQ</a>
                </nav>
                <div class="flex items-center gap-3">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="hidden md:inline-flex px-4 py-2 text-sm font-semibold text-slate-700 border border-slate-200 rounded-lg hover:border-slate-400">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="hidden md:inline-flex px-4 py-2 text-sm font-medium text-slate-600 hover:text-slate-900">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex px-4 py-2 rounded-xl bg-gradient-to-r from-orange-500 to-pink-500 text-white text-sm font-semibold shadow-lg shadow-orange-300/40 hover:opacity-90 transition">Create account</a>
                            @endif
                        @endauth
                    @endif
                    <button class="md:hidden inline-flex items-center justify-center w-10 h-10 rounded-xl border border-slate-200 shadow-sm" type="button">
                        <span class="sr-only">Menu</span>
                        <svg class="h-5 w-5 text-slate-600" viewBox="0 0 20 20" fill="none">
                            <path d="M4 7h12M4 13h12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>
            </div>
        </header>

        <main class="flex-1">
            <section class="relative">
                <div class="absolute inset-x-0 -top-20 opacity-60">
                    <div class="mx-auto max-w-6xl h-40 bg-gradient-to-r from-pink-300/40 via-orange-200/60 to-sky-200/40 blur-3xl rounded-full"></div>
                </div>
                <div class="mx-auto max-w-6xl px-6 py-20 grid lg:grid-cols-2 gap-12 items-center relative">
                    <div>
                        <span class="inline-flex items-center gap-2 rounded-full bg-white/80 px-4 py-2 text-xs font-semibold text-orange-500 shadow shadow-orange-100 uppercase tracking-wide">
                            <span class="h-1.5 w-1.5 rounded-full bg-orange-500"></span>
                            Campus Safety
                        </span>
                        <h1 class="mt-6 text-4xl md:text-5xl font-semibold text-slate-900 leading-tight">
                            Locate, verify &amp; return lost items faster with StrathFind.
                        </h1>
                        <p class="mt-6 text-lg text-slate-600 leading-relaxed">
                            A single command centre for students, staff and security to track lost property, review claims and broadcast collection alerts — no database setup required yet.
                        </p>
                        <div class="mt-8 flex flex-wrap gap-4">
                            <button class="inline-flex items-center gap-2 rounded-xl bg-slate-900 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-slate-900/10 hover:bg-slate-800">
                                Report lost item
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none">
                                    <path d="M5 10h10M10 5l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            <button class="inline-flex items-center gap-2 rounded-xl border border-slate-200 px-6 py-3 text-sm font-semibold text-slate-700 hover:border-slate-400">
                                Broadcast found item
                            </button>
                        </div>
                        <div class="mt-10 flex flex-wrap items-center gap-6 text-sm text-slate-500">
                            <div class="flex items-center gap-2">
                                <span class="h-2.5 w-2.5 rounded-full bg-green-400"></span>
                                Security desk is online
                            </div>
                            <div>Last sync · {{ now()->format('M d, h:i a') }}</div>
                        </div>
                    </div>
                    <div class="bg-white rounded-[32px] shadow-2xl shadow-orange-200/60 border border-white/60 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-slate-500">Quick search</p>
                                <p class="text-xl font-semibold text-slate-900">Check if your item exists</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-orange-100 text-orange-600">Live mock data</span>
                        </div>
                        <form class="mt-6 space-y-4">
                            <div>
                                <label class="text-sm font-medium text-slate-700">Item name</label>
                                <input type="text" class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:border-orange-400 focus:ring-2 focus:ring-orange-100" placeholder="e.g. HP Pavilion laptop">
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="text-sm font-medium text-slate-700">Last seen location</label>
                                    <input type="text" class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:border-orange-400 focus:ring-2 focus:ring-orange-100" placeholder="Building or room">
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-slate-700">Category</label>
                                    <select class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                                        <option>Electronics</option>
                                        <option>Documents</option>
                                        <option>Apparel</option>
                                        <option>Personal</option>
                                    </select>
                                </div>
                            </div>
                            <button type="button" class="w-full rounded-2xl bg-gradient-to-r from-orange-500 via-pink-500 to-indigo-500 px-4 py-3 text-white font-semibold shadow-lg shadow-orange-500/30 hover:opacity-95 transition">
                                Search catalogue
                            </button>
                        </form>
                        <div class="mt-6 rounded-2xl border border-dashed border-slate-200 p-4 text-sm text-slate-600">
                            <p class="font-semibold text-slate-900">Heads-up!</p>
                            <p>These are static mock interactions. Hook this flow to real APIs once the backend is ready.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mx-auto max-w-6xl px-6 py-12" id="stats">
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach ($stats as $stat)
                        <div class="rounded-2xl border border-white/70 bg-white/80 backdrop-blur p-6 shadow-lg shadow-slate-200/40">
                            <p class="text-sm text-slate-500">{{ $stat['label'] }}</p>
                            <p class="mt-3 text-3xl font-semibold text-slate-900">{{ $stat['value'] }}</p>
                            <p class="mt-2 text-sm font-medium text-emerald-600">{{ $stat['trend'] }}</p>
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="mx-auto max-w-6xl px-6 pb-6 grid lg:grid-cols-[2fr,1fr] gap-8" id="lost-items">
                <div class="bg-white/90 rounded-3xl border border-white/70 shadow-xl shadow-slate-200/60 p-6 backdrop-blur">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-orange-500 uppercase tracking-wide">Live board</p>
                            <h2 class="mt-2 text-2xl font-semibold text-slate-900">Recently logged items</h2>
                        </div>
                        <button class="rounded-xl border border-slate-200 px-4 py-2 text-sm font-medium text-slate-600 hover:border-slate-400">Filter</button>
                    </div>
                    <div class="mt-6 space-y-4">
                        @foreach ($lostItems as $item)
                            <article class="rounded-2xl border border-slate-100 bg-gradient-to-br from-white via-slate-50 to-slate-100/60 p-5 hover:border-orange-200 transition shadow-sm">
                                <div class="flex items-center justify-between gap-4">
                                    <div>
                                        <h3 class="text-lg font-semibold text-slate-900">{{ $item['title'] }}</h3>
                                        <p class="text-sm text-slate-500">{{ $item['location'] }}</p>
                                    </div>
                                    <span class="text-xs font-semibold text-slate-500">{{ $item['time'] }}</span>
                                </div>
                                <p class="mt-3 text-sm text-slate-600">{{ $item['description'] }}</p>
                                <div class="mt-4 flex flex-wrap gap-2">
                                    @foreach ($item['tags'] as $tag)
                                        <span class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-slate-600 border border-slate-200">{{ $tag }}</span>
                                    @endforeach
                                </div>
                                <div class="mt-4 flex flex-wrap gap-3 text-sm font-medium">
                                    <button class="inline-flex items-center gap-1 rounded-lg bg-slate-900 px-3 py-2 text-white">Claim</button>
                                    <button class="inline-flex items-center gap-1 rounded-lg border border-slate-200 px-3 py-2 text-slate-700">Notify friend</button>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="rounded-3xl border border-white/70 bg-white/90 shadow-lg shadow-slate-200/50 p-5 backdrop-blur" id="claims">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-semibold text-slate-500 uppercase tracking-wide">Claims</p>
                            <a href="#" class="text-sm font-medium text-orange-500">View queue</a>
                        </div>
                        <div class="mt-4 space-y-4">
                            @foreach ($claims as $claim)
                                <div class="rounded-2xl border border-slate-100 p-4">
                                    <div class="flex items-center justify-between">
                                        <p class="font-semibold text-slate-900">{{ $claim['owner'] }}</p>
                                        <span class="text-xs font-semibold uppercase tracking-wide {{ $claim['status'] === 'matched' ? 'text-emerald-600' : 'text-amber-600' }}">{{ $claim['status'] }}</span>
                                    </div>
                                    <p class="text-sm text-slate-600">{{ $claim['item'] }}</p>
                                    <p class="mt-2 text-sm text-slate-500">{{ $claim['detail'] }}</p>
                                    <p class="mt-2 text-xs text-slate-400">{{ $claim['submitted_at'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="rounded-3xl border border-white/70 bg-white/90 shadow-lg shadow-slate-200/50 p-5 backdrop-blur" id="notifications">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-semibold text-slate-500 uppercase tracking-wide">Notifications</p>
                            <span class="rounded-full bg-slate-900/5 px-3 py-1 text-xs font-semibold text-slate-600">Live feed</span>
                        </div>
                        <div class="mt-4 space-y-3">
                            @foreach ($notifications as $note)
                                <div class="rounded-2xl border border-slate-100 p-4 bg-slate-50/80">
                                    <p class="text-sm font-semibold text-slate-900">{{ $note['type'] }}</p>
                                    <p class="text-sm text-slate-600">{{ $note['message'] }}</p>
                                    <p class="mt-2 text-xs text-slate-400">{{ $note['time'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <section class="mx-auto max-w-6xl px-6 py-12 grid lg:grid-cols-2 gap-8">
                <div class="rounded-3xl border border-white/70 bg-white/90 shadow-xl shadow-slate-200/60 p-6 backdrop-blur" id="faq">
                    <p class="text-sm font-semibold text-orange-500 uppercase tracking-wide">Support</p>
                    <h2 class="mt-2 text-2xl font-semibold text-slate-900">Frequently asked questions</h2>
                    <div class="mt-6 space-y-4">
                        @foreach ($faqs as $faq)
                            <details class="rounded-2xl border border-slate-100 bg-slate-50/70 p-4" {{ $loop->first ? 'open' : '' }}>
                                <summary class="cursor-pointer text-sm font-semibold text-slate-900">{{ $faq['question'] }}</summary>
                                <p class="mt-2 text-sm text-slate-600">{{ $faq['answer'] }}</p>
                            </details>
                        @endforeach
                    </div>
                </div>
                <div class="rounded-3xl border border-indigo-200 bg-gradient-to-br from-slate-900 via-indigo-900 to-purple-900 text-white p-6 flex flex-col justify-between shadow-2xl shadow-indigo-900/40">
                    <div>
                        <p class="text-sm font-semibold text-orange-200 uppercase tracking-wide">Next steps</p>
                        <h2 class="mt-4 text-3xl font-semibold">Plug into the real backend when ready.</h2>
                        <p class="mt-4 text-slate-200 text-sm leading-6">
                            This UI currently reads from curated arrays. Once the APIs are available, replace the arrays in <code class="text-orange-200">StrathFindController</code> with live data and wire the forms to Laravel routes or a JS client.
                        </p>
                    </div>
                    <div class="mt-8">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-white px-5 py-3 text-slate-900 font-semibold text-sm hover:bg-slate-100">
                                Get early access
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none">
                                    <path d="M5 10h10M10 5l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        @else
                            <button class="inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-white/10 px-5 py-3 text-white font-semibold text-sm">
                                Contact support
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none">
                                    <path d="M5 10h10M10 5l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        @endif
                        <p class="mt-3 text-xs text-slate-400 text-center">or email support@strathfind.app</p>
                    </div>
                </div>
            </section>
        </main>

        <footer class="border-t border-white/40 bg-white/70 backdrop-blur">
            <div class="mx-auto max-w-6xl px-6 py-6 flex flex-wrap items-center justify-between gap-4 text-sm text-slate-500">
                <p>© {{ date('Y') }} StrathFind · Campus Lost &amp; Found.</p>
                <div class="flex gap-4">
                    <a href="#" class="hover:text-slate-900">Privacy</a>
                    <a href="#" class="hover:text-slate-900">Terms</a>
                    <a href="#" class="hover:text-slate-900">Support</a>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>

