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
        <div class="lg:col-span-5 space-y-6">
            <div>
                <p class="font-mono text-xs uppercase tracking-widest text-purple-300">
                    {{ $carModel->company->name ?? 'Unknown Manufacturer' }}
                </p>
                <h1 class="font-display text-3xl sm:text-5xl font-bold tracking-tight text-[#f5efe9] mt-1">
                    {{ $carModel->name }}
                </h1>
            </div>

            @if (!empty($carModel->description))
                <p class="text-sm sm:text-base text-[#cfc6be] leading-relaxed border-t border-[#2b2320] pt-5">
                    {{ $carModel->description }}
                </p>
            @endif

            <dl class="divide-y divide-[#2b2320] border-t border-b border-[#2b2320] font-mono text-xs">
                <div class="py-3 flex justify-between gap-4">
                    <dt class="uppercase tracking-wider text-[#7d7068]">Marque</dt>
                    <dd class="text-[#ede6e0] text-right">{{ $carModel->company->name ?? 'Unknown' }}</dd>
                </div>

                @if (!empty($carModel->year))
                    <div class="py-3 flex justify-between gap-4">
                        <dt class="uppercase tracking-wider text-[#7d7068]">Model Year</dt>
                        <dd class="text-[#ede6e0] text-right">{{ $carModel->year }}</dd>
                    </div>
                @endif

                @if (!empty($carModel->horsepower))
                    <div class="py-3 flex justify-between gap-4">
                        <dt class="uppercase tracking-wider text-[#7d7068]">Output</dt>
                        <dd class="text-orange-400 text-right">{{ $carModel->horsepower }} HP</dd>
                    </div>
                @endif

                @if (!empty($carModel->top_speed))
                    <div class="py-3 flex justify-between gap-4">
                        <dt class="uppercase tracking-wider text-[#7d7068]">Top Speed</dt>
                        <dd class="text-purple-300 text-right">{{ $carModel->top_speed }} km/h</dd>
                    </div>
                @endif
            </dl>
        </div>

        <div class="lg:col-span-7">
            <div class="border border-[#2b2320] bg-[#191513] p-6">
                <div class="flex items-center justify-between border-b border-[#2b2320] pb-3 mb-6 font-mono text-[11px] uppercase tracking-widest text-[#7d7068]">
                    <span>3D / Visual Bay</span>
                    <span class="text-orange-400">RevLab // CAD View</span>
                </div>

                @if (!empty($carModel->model_path))
                    <div class="min-h-[320px] flex items-center justify-center text-sm font-mono text-[#a89c94]">
                        Model asset: {{ $carModel->model_path }}
                    </div>
                @else
                    <div class="min-h-[320px] flex flex-col items-center justify-center text-center px-6 py-12 border border-dashed border-[#362c28]">
                        <p class="font-mono text-xs uppercase tracking-widest text-purple-300">No 3D Mesh Attached</p>
                        <p class="text-sm text-[#a89c94] mt-2 max-w-md">
                            Add a model file or viewer component for <span class="text-[#f5efe9]">{{ $carModel->name }}</span> when you're ready to wire up the 3D bay.
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection