<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class TodoList extends Component
{
    public $todos;
    public $todoDescription = "";

    public function render()
    {
        return view('livewire.todo-list');
    }

    public function mount() {
        $this->selectTodos();
    }

    public function selectTodos() {
        $this->todos = Todo::orderBy('created_at', 'DESC')->get();
    }

    public function toggleTodo($id) {
        $todo = Todo::where('id', $id)->first();

        if(!$todo) {
            return;
        }
      
        dd($todo);

        $todo->save();

        $this->selectTodos();
    }

    public function addTodo() {
        $todo = new Todo();
        $todo->todoDescription = $this->todoDescription;
        $todo->completed = false;
        $todo->save();

        $this->todoDescription = '';
        $this->selectTodos();
    }

    public function deleteTodo($id) {
        $todo = Todo::where('id', $id)->first();
        if(!$todo) {
            return;
        }
        $todo->delete();
        $this->selectTodos();
    }
}
