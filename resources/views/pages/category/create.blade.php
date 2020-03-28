@extends('layouts.master')

@section('content')

     <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('category.store')}}">
            @csrf

            <div class="form-group">
              <label for="exampleFormControlInput1"> Name</label>
              <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"  >

                @error('name')
                <div class="alert">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1"> Description</label>
                <input name="description" type="text" class="form-control @error('description') is-invalid @enderror" >
                @error('description')
                <div class="alert">{{ $message }}</div>
                @enderror
            </div>

            <label for="exampleFormControlInput1"> Status</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" checked>
                <label class="form-check-label" for="exampleRadios1">
                 Show
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0">
                <label class="form-check-label" for="exampleRadios2">
                 Hide
                </label>
            </div>
            <div class="form-group" style="width:50%;margin:auto">
                <button style="width:200px" type="submit" class="btn btn-success">Create</button>
                <button style="width:200px" type="button" class="btn btn-success">Edit</button>
            </div>

          </form>
     </div>

@endsection
