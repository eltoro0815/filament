<style>
    .btn {
        text-decoration: none;
        text-align: center;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        border: solid 1px rgb(209 213 219);
        background-color: white;
    }
</style>

<div class="btn">
    <span class="text-sm font-medium leading-4 text-gray-700">
        {{ $getLabel() }}
    </span>
    <div class="filament-forms-placeholder-component text-2xl">
        {{ number_format($getRecord()->bookings->sum('amount'), 2, ',', '.') }} EUR
    </div>
</div>
