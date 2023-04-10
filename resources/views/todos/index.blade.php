@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-7">
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif

            @if ($errors->any())
                @foreach($errors->all() as $error )
                <div class="alert alert-success">
                    {{ $error }}
                </div>
                @endforeach
            @endif

        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="todo-form text-center">
                <h2>Awesome Todo List</h2>

                <form action="{{ route('todos.store') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Whats need to be done?" name="title">
                        <button type="button" class="btn btn-success" name="save-btn">Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="todo-list mt-3">
                @foreach ($todos as $todo)
                    <div class="d-flex w-100 justify-between align-items-center">
                        <div class="flex-grow-1">


                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_completed"
                                {{-- @if ($todo->is_complete ) checked @else  @endif --}}
                                {{ $todo->is_completed ? 'checked' : '' }}
                                id="{{ $todo->id }}">
                            <label class="form-check-label {{ $todo->is_completed ? 'text-decoration-line-through ' : '' }}" for="{{ $todo->id }}" >
                                {{ $todo->title }}
                            </label>
                        </div>

                        </div>
                        <div class="flex-shrink-0 ms-3">
                            <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                                <a href="{{ route('todos.edit', $todo->id) }}" class="text-info"><span
                                        class="material-symbols-outlined">border_color</span></a>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border-0 bg-transparent text-danger"><span
                                        class="material-symbols-outlined">delete</span></button>
                            </form>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
@endsection
