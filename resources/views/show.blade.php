@extends('layouts.app')

@section('title')
    <h1 class="mb-6">
        {{ $task->title }}
    </h1>
@endsection

@section('content')
    <div class="mb-4 text-gray-slate-700">
        <a href="{{ route('tasks.index') }}" class="link">⬅ GO back to Tasks
            list</a>
    </div>
    <h2>
        {{ $task->description }}
    </h2>

    @if ($task->long_description)
        <h2 class="mb-4 text-gray-slate-700">
            {{ $task->long_description }}
        </h2>
    @endif

    <h2 class="mb-4">
        {!! $task->completed
            ? '<span class="font-medium text-green-500"> Task completed</span>'
            : '<span class="font-medium text-red-500">Task not completed yet' !!}
    </h2>
    <h2 class="mb-4 text-sm-500">
        {{ 'created  :' . $task->created_at->diffForHumans() }} 🟤
        {{ 'updated  :' . $task->updated_at->diffForHumans() }}
    </h2>

    <div class="flex gap-3">
        <form action="{{ route('tasks.delete', ['task' => $task->id]) }} " method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Delete Task</button>
        </form>

        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn">Edit</a>
    </div>

    <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
        @csrf
        @method('PUT')

        <button type="submit" class="btn">
            @if ($task->completed)
                {{ 'Set to not completed' }}
            @else
                {{ 'Set to completed' }}
            @endif

        </button>
    </form>
    </div>
@endsection
