@extends('layouts.main')

@section('title', 'Hypercar Vault')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 pb-6 border-b border-[#2b2320]">
        <div>
            <p class="font-mono text-xs uppercase tracking-widest text-orange-400">Chassis Registry</p>
            <p class="text-sm text-[#a89c94] mt-1">
                Showing {{ $carModels->count() }} of {{$carModels->total() }} logged machines
            </p>
        </div>

        <form method="GET" action="{{ route('cars.index') }}" class="flex items-center gap-3">
            <label for="company_id" class="font-mono text-xs uppercase tracking-wider text-[#a89c94]">
                Marque
            </label>
            <select name="company_id" id="company_id" onchange="this.form.submit()"
                    class="bg-[#191513] border border-[#362c28] focus:border-orange-400 focus:outline-none px-3 py-2 font-mono text-xs text-[#ede6e0]">
                <option value="">All Marques</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" @selected(request('company_id') == $company->id)>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>

    <div class="divide-y divide-[#2b2320] border-b border-[#2b2320]">
        @forelse ($carModels as $index =>$car)
            <a href="{{ route('cars.show', ['id' => $car->id]) }}"
               class="group py-5 px-2 flex flex-col sm:flex-row sm:items-center justify-between gap-3 hover:bg-[#191513] transition-colors">
                <div class="flex items-baseline gap-5">
                    <span class="font-mono text-xs text-[#6e625b] group-hover:text-orange-400 transition-colors">
                        {{ str_pad($carModels->firstItem() +$index, 2, '0', STR_PAD_LEFT) }}
                    </span>

                    <div>
                        <div class="flex items-center gap-2 font-mono text-[11px] uppercase tracking-widest">
                            <span class="text-purple-300/90">{{ $car->company->name ?? 'Unknown Manufacturer' }}</span>
                            @if (!empty($car->year))
                                <span class="text-[#6e625b]">// {{ $car->year }}</span>
                            @endif
                        </div>
                        <h2 class="font-display text-2xl sm:text-3xl font-bold tracking-tight text-[#f5efe9] group-hover:translate-x-1 group-hover:text-orange-300 transition-all">
                            {{ $car->name }}
                        </h2>
                    </div>
                </div>

                <div class="flex items-center gap-5 font-mono text-xs uppercase tracking-wider pl-9 sm:pl-0">
                    @if (!empty($car->horsepower))
                        <span class="hidden md:inline text-orange-400/90">{{ number_format($car->horsepower) }} HP</span>
                    @endif

                    @if (!empty($car->top_speed_kmh))
                        <span class="hidden lg:inline text-[#8a7d75]">{{ $car->top_speed_kmh }} KM/H</span>
                    @endif

                    @if (!empty($car->sketchfab_embed_url))
                        <span class="px-2 py-0.5 border border-[#362c28] text-[10px] text-purple-300">3D</span>
                    @endif

                    <div class="flex items-center gap-2 text-[#7d7068] group-hover:text-orange-400 transition-colors">
                        <span>Spec Sheet</span>
                        <span>→</span>
                    </div>
                </div>
            </a>
        @empty
            <div class="py-12 text-center font-mono text-sm text-[#7d7068]">
                No vehicles match that filter.
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $carModels->links() }}
    </div>
@endsection