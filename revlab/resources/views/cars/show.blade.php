@extends('layouts.main')

@section('title', $carModel->name)

@section('content')
    <div class="mb-8 flex items-center justify-between border-b border-[#2b2320] pb-4">
        <a href="{{ route('cars.index') }}"
           class="font-mono text-xs uppercase tracking-widest text-[#a89c94] hover:text-orange-400 transition-colors">
            ← Back to Vault
        </a>

        <span class="font-mono text-xs uppercase tracking-widest text-purple-300">
            Chassis #{{ str_pad($carModel->id, 3, '0', STR_PAD_LEFT) }}
        </span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
        {{-- Left Column: Identity, Editorial & Telemetry Specs --}}
        <div class="lg:col-span-5 space-y-6">
            <div>
                <div class="flex items-center gap-2 font-mono text-xs uppercase tracking-widest">
                    <span class="text-purple-300">{{ $carModel->company->name ?? 'Unknown Manufacturer' }}</span>
                    @if (!empty($carModel->country))
                        <span class="text-[#6e625b]">// {{ $carModel->country }}</span>
                    @endif
                </div>
                <h1 class="font-display text-3xl sm:text-5xl font-bold tracking-tight text-[#f5efe9] mt-1">
                    {{ $carModel->name }}
                </h1>
            </div>

            @if (!empty($carModel->description))
                <p class="text-sm sm:text-base text-[#cfc6be] leading-relaxed border-t border-[#2b2320] pt-5">
                    {{ $carModel->description }}
                </p>
            @endif

            {{-- Headline Performance Grid --}}
            <div class="grid grid-cols-2 gap-px bg-[#2b2320] border border-[#2b2320] font-mono">
                <div class="bg-[#14110f] p-3.5">
                    <span class="block text-[10px] uppercase tracking-widest text-[#7d7068]">Output</span>
                    <span class="text-lg font-bold text-orange-400 mt-0.5 block">
                        {{ $carModel->horsepower ? number_format($carModel->horsepower) . ' HP' : '—' }}
                    </span>
                </div>

                <div class="bg-[#14110f] p-3.5">
                    <span class="block text-[10px] uppercase tracking-widest text-[#7d7068]">Top Speed</span>
                    <span class="text-lg font-bold text-purple-300 mt-0.5 block">
                        {{ $carModel->top_speed_kmh ? $carModel->top_speed_kmh . ' km/h' : '—' }}
                    </span>
                </div>

                <div class="bg-[#14110f] p-3.5">
                    <span class="block text-[10px] uppercase tracking-widest text-[#7d7068]">0–100 km/h</span>
                    <span class="text-lg font-bold text-[#f5efe9] mt-0.5 block">
                        {{ $carModel->zero_to_hundred_s ? $carModel->zero_to_hundred_s . ' s' : '—' }}
                    </span>
                </div>

                <div class="bg-[#14110f] p-3.5">
                    <span class="block text-[10px] uppercase tracking-widest text-[#7d7068]">Kerb Weight</span>
                    <span class="text-lg font-bold text-[#f5efe9] mt-0.5 block">
                        {{ $carModel->weight_kg ? number_format($carModel->weight_kg) . ' kg' : '—' }}
                    </span>
                </div>
            </div>

            {{-- Detailed Technical Dossier --}}
            <dl class="divide-y divide-[#2b2320] border-t border-b border-[#2b2320] font-mono text-xs">
                @if (!empty($carModel->year))
                    <div class="py-3 flex justify-between gap-4">
                        <dt class="uppercase tracking-wider text-[#7d7068]">Model Year</dt>
                        <dd class="text-[#ede6e0] text-right">{{ $carModel->year }}</dd>
                    </div>
                @endif

                @if (!empty($carModel->production_numbers))
                    <div class="py-3 flex justify-between gap-4">
                        <dt class="uppercase tracking-wider text-[#7d7068]">Production</dt>
                        <dd class="text-[#ede6e0] text-right">{{ $carModel->production_numbers }}</dd>
                    </div>
                @endif

                @if (!empty($carModel->torque_nm))
                    <div class="py-3 flex justify-between gap-4">
                        <dt class="uppercase tracking-wider text-[#7d7068]">Peak Torque</dt>
                        <dd class="text-[#ede6e0] text-right">{{ number_format($carModel->torque_nm) }} Nm</dd>
                    </div>
                @endif

                @if (!empty($carModel->engine))
                    <div class="py-3 flex justify-between gap-4">
                        <dt class="uppercase tracking-wider text-[#7d7068] shrink-0">Powertrain</dt>
                        <dd class="text-[#ede6e0] text-right">{{ $carModel->engine }}</dd>
                    </div>
                @endif

                @if (!empty($carModel->transmission))
                    <div class="py-3 flex justify-between gap-4">
                        <dt class="uppercase tracking-wider text-[#7d7068] shrink-0">Gearbox</dt>
                        <dd class="text-[#ede6e0] text-right">{{ $carModel->transmission }}</dd>
                    </div>
                @endif

                @if (!empty($carModel->drivetrain))
                    <div class="py-3 flex justify-between gap-4">
                        <dt class="uppercase tracking-wider text-[#7d7068]">Drivetrain</dt>
                        <dd class="text-[#ede6e0] text-right">{{ $carModel->drivetrain }}</dd>
                    </div>
                @endif

                @if (!empty($carModel->chassis))
                    <div class="py-3 flex justify-between gap-4">
                        <dt class="uppercase tracking-wider text-[#7d7068] shrink-0">Chassis</dt>
                        <dd class="text-[#ede6e0] text-right">{{ $carModel->chassis }}</dd>
                    </div>
                @endif

                @if (!empty($carModel->aero_highlight))
                    <div class="py-3 flex justify-between gap-4">
                        <dt class="uppercase tracking-wider text-[#7d7068] shrink-0">Aero System</dt>
                        <dd class="text-orange-300 text-right">{{ $carModel->aero_highlight }}</dd>
                    </div>
                @endif
            </dl>
        </div>

        {{-- Right Column: Interactive 3D Inspection Bay --}}
        <div class="lg:col-span-7 lg:sticky lg:top-8">
            <div class="border border-[#2b2320] bg-[#191513] p-4 sm:p-6">
                <div class="flex items-center justify-between border-b border-[#2b2320] pb-3 mb-4 font-mono text-[11px] uppercase tracking-widest text-[#7d7068]">
                    <span>3D / Inspection Bay</span>
                    <span class="text-orange-400">Drag to Orbit // Scroll to Zoom</span>
                </div>

                @if (!empty($carModel->sketchfab_embed_url))
                    <div class="aspect-video w-full bg-[#120f0e] border border-[#2b2320] overflow-hidden">
                        <iframe
                            title="{{ $carModel->name }} 3D Model"
                            src="{{ $carModel->sketchfab_embed_url }}"
                            class="w-full h-full border-0"
                            allow="autoplay; fullscreen; xr-spatial-tracking"
                            xr-spatial-tracking
                            execution-while-out-of-viewport
                            execution-while-not-rendered
                            web-share
                            allowfullscreen>
                        </iframe>
                    </div>
                @else
                    <div class="min-h-[360px] flex flex-col items-center justify-center text-center px-6 py-12 border border-dashed border-[#362c28]">
                        <p class="font-mono text-xs uppercase tracking-widest text-purple-300">No 3D Mesh Attached</p>
                        <p class="text-sm text-[#a89c94] mt-2 max-w-md">
                            No Sketchfab CAD link logged for <span class="text-[#f5efe9]">{{ $carModel->name }}</span> yet.
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection