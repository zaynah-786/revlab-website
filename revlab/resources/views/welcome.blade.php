@extends('layouts.main')

@section('title', 'The Paddock')

@section('content')
    {{-- Asymmetric Hero Section --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-end pb-12 border-b border-[#2b2320]">
        <div class="lg:col-span-8">
            <p class="font-mono text-xs uppercase tracking-widest text-orange-400 mb-3">
                welcome to revlab by zaynah alam
            </p>
            <h2 class="font-display text-4xl sm:text-6xl font-bold tracking-tight text-[#f5efe9] leading-[1.05]">
                Specs on <span class="italic text-orange-400">ridiculously fast cars</span> &amp; chill vibes.
            </h2>
        </div>

        <div class="lg:col-span-4 lg:pl-6 lg:border-l lg:border-[#2b2320] space-y-4">
            <p class="text-sm text-[#a89c94] leading-relaxed">
                Explore the cars, get into the specs, and talk all things automotive. From intricate hypercar detail and engineering to yapping threads, opinions and everything in between. </p>
            <div class="flex flex-wrap items-center gap-3 pt-1">
                <a href="{{ route('cars.index') }}"
                   class="px-4 py-2.5 bg-orange-400 hover:bg-orange-300 text-[#120f0e] font-mono text-xs uppercase tracking-wider font-semibold transition-colors">
                    Step into the Vault (imagine it's your future garage) →
                </a>
                <a href="{{ route('posts.index') }}"
                   class="px-4 py-2.5 border border-[#362c28] hover:border-purple-300/60 text-purple-200 font-mono text-xs uppercase tracking-wider transition-colors">
                    Check out the Forum
                </a>
            </div>
        </div>
    </div>

    {{-- Offset Feature Split --}}
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 pt-10">
        <a href="{{ route('cars.index') }}"
           class="md:col-span-7 group border border-[#2b2320] bg-[#191513] p-7 hover:border-orange-400/60 transition-colors flex flex-col justify-between min-h-[240px]">
            <div class="flex items-center justify-between font-mono text-xs uppercase tracking-widest text-[#7d7068]">
                <span class="text-purple-300">the vault</span>
                <span class="group-hover:text-orange-400 group-hover:translate-x-1 transition-all">ready for speed? →</span>
            </div>

            <div class="mt-10">
                <h3 class="font-display text-3xl sm:text-4xl font-bold text-[#f5efe9] group-hover:text-orange-300 transition-colors">
                    Hypercar Vault
                </h3>
                <p class="text-sm text-[#a89c94] mt-2 max-w-md">
                    Check out a 3D model of the car, read about its specs, and get a feel for the engineering behind it.
                </p>
            </div>
        </a>

        <a href="{{ route('posts.index') }}"
           class="md:col-span-5 md:mt-8 group border border-[#2b2320] bg-[#191513] p-7 hover:border-purple-300/60 transition-colors flex flex-col justify-between min-h-[240px]">
            <div class="flex items-center justify-between font-mono text-xs uppercase tracking-widest text-[#7d7068]">
                <span class="text-orange-400">Pit Wall</span>
                <span class="group-hover:text-purple-300 group-hover:translate-x-1 transition-all">transform into your best car self →</span>
            </div>

            <div class="mt-10">
                <h3 class="font-display text-3xl font-bold text-[#f5efe9] group-hover:text-purple-200 transition-colors">
                    The Forum
                </h3>
                <p class="text-sm text-[#a89c94] mt-2">
                    Pretend you're a race engineer and talk about the cars, the specs, and everything in between. Might even be a good interview talking point for an F1 job ;D
                </p>
            </div>
        </a>
    </div>
@endsection