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
                <h2>Edit Todo List</h2>

                <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Whats need to be done?" name="title" value="{{ $todo->title }}">
                        <button type="submit" class="btn btn-success" name="update-btn">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
