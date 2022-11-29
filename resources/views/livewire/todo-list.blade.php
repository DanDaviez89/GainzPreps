<div>
    <input type="text" wire:model="todoDescription" wire:keydown.enter="addTodo">

    <button wire:Click="addTodo">ADD</button>
    
    @if(count($todos) == 0)
        <span>There are no todos</span>
    @endif

    @foreach($todos as $index => $todo)
        <div class="todo-container">
            <input type="checkbox" wire:change="toggleTodo({{$todo->id}})">
            <span class="{{$todo->completed ? 'line-through' : ''}}">{{$todo->todoDescription}}</span>
            <button wire:click="deleteTodo({{$todo->id}})">X</button>
        </div>
    @endforeach
</div>
