<div>
    <input type="number" wire:model="number1" placeholder="Number 1">

    <select wire:model="action">
        <option>+</option>
        <option>-</option>
        <option>*</option>
        <option>/</option>
        <option>%</option>
    </select>

    <input type="number" wire:model="number2" placeholder="Number 2">

    <button wire:click="calculate">=</button>

    <span>{{$result}}</span>
</div>
