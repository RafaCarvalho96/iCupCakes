<div id="counter">
    <h1>{{ $count }}</h1>
 
    <button wire:click="increment">+</button>
 
    <button wire:click="decrement">-</button>
    <script src="{{ asset('js/app.js') }}" defer></script>
</div>
