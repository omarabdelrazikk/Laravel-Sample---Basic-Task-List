@extends('layouts.app')

@section('title')
    <h1>
        {{ $task->title }}
    </h1>
@endsection

@section('content')
    <h2>
        {{ $task->description }}
    </h2>

    @if ($task->long_description)
        <h2>
            {{ $task->long_description }}
        </h2>
    @endif
    <h2>
        {{ $task->completed ? 'Task completed' : 'Task not completed yet' }}
    </h2>
    <h2>
        {{ $task->created_at }}
    </h2>
    <h2>
        {{ $task->updated_at }}
    </h2>
    <div>
        <form action="{{ route('tasks.delete', ['task' => $task->id]) }} " method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Task</button>
        </form>
    </div>
    <div>
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"><button>Edit</button></a>
    </div>

    <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
        @csrf
        @method('PUT')
        <div>
            <button type="submit">
                @if ($task->completed)
                    {{ 'Set to not completed' }}
                @else
                    {{ 'Set to completed' }}
                @endif

            </button>
    </form>
@endsection
