
    <form wire:submit.prevent='logar'>
        <input type="text" wire:model="name">
        <input type="password" wire:model="password">
        <button wire:click='logar'>Aaaaa</button>
        <button type="submit">Logar</button>
    </form>