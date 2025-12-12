@extends('layouts.app')

@section('title', 'the list of tasks')
@section('content')
    @forelse  ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        <div>there aren't any tasks</div>
    @endforelse
    <nav style="font-size: 12px;">
        @if ($tasks->count())
            {{ $tasks->links() }}
        @endif
    </nav>
    <a href="{{ route('tasks.create') }}"><button>Create Task</button></a>
@endsection
