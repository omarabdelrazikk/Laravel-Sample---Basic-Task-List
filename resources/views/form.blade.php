@extends('layouts.app')

@section('title', isset($task) ? 'edit' : 'add Task')



@section('content')

    <form action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}" method="post">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-4">
            <label for="title">Title</label>
            <input type="text" name="title" id="tile" @class(['border-red-500' => $errors->has('title')])
                class="@error('title') border-red-500 @enderror border" value="{{ $task->title ?? old('title') }}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description">description</label>
            <textarea  class="@error('title') border-red-500 @enderror border" name="description" id="description" rows="5">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="long_description">long description</label>
            <textarea  class="@error('title') border-red-500 @enderror border" name="long_description" id="long_description" rows="5" placeholder="type here">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="btn flex gap-2 items-center" >
            <button  type="submit">{{ isset($task) ? 'Edit Task' : 'Add Task' }}</button>
            <a href="{{ route('tasks.index') }}" class="link">Cancel</a>
        </div>
    @endsection
