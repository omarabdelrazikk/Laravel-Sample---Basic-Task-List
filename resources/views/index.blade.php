@extends('layouts.app')

@section('title', 'the list of tasks')
@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="link">Create
            Task</a>
    </nav>

    @forelse  ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['font-bold', 'line-through' => $task->completed])>
                {{ $task->title }}</a>
        </div>
    @empty
        <div>there aren't any tasks</div>
    @endforelse
    <nav style="font-size: 12px;">
        @if ($tasks->count())
            {{ $tasks->links() }}
        @endif
    </nav>

@endsection
