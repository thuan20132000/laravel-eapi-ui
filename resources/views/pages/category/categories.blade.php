
@extends('layouts.master')

@section('content')

<!-- Page Heading -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>

                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>STT</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Status</th>

                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($categories as $key => $c)
                    <tr>
                        <td>{{$key}}</td>
                        <td>{{$c->name}}</td>
                        <td>{{$c->description}}</td>
                        <td>
                            @if ($c->status == 1)
                               {{"Show"}}
                            @else
                                {{"Hide"}}
                            @endif
                        </td>

                        <td>
                            <button class="btn-circle btn-sm btn-success edit" data-toggle="modal" data-target="#editModal" data-id={{$c->id}} ><i class="fas fa-edit"></i></button>

                            <button class="btn-circle btn-sm btn-danger delete" data-toggle="modal" data-target="" data-id={{$c->id}} ><i class="fas fa-trash-alt"></i></button>
                        </td>
                      </tr>

                    @endforeach


                  </tbody>
                </table>
                <div style="width:100px;margin:auto">
                    {{$categories->links()}}
                </div>
              </div>
            </div>
          </div>

          {{--  Edit Modal  --}}
          <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content" style="padding:20px">

                <form >
                    @csrf

                    <div class="form-group">
                      <label for="exampleFormControlInput1"> Name</label>
                      <input  name="name" type="text" class="form-control  name"  >
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1"> Description</label>
                        <input  name="description" type="text" class="form-control @error('description') is-invalid @enderror description" >
                    </div>

                    <label for="exampleFormControlInput1"> Status</label>
                    <div class="form-check">
                        <input class="form-check-input status" type="radio" name="status" id="status-1" value="1" >
                        <label class="form-check-label" for="exampleRadios1">
                         Show
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input status" type="radio" name="status" id="status-0" value="0" >
                        <label class="form-check-label" for="exampleRadios2">
                         Hide
                        </label>
                    </div>

                    <div class="form-group" style="width:10%;margin:auto">
                        <button style="width:200px" type="button" class="btn btn-success update">Update</button>
                    </div>

                  </form>
              </div>
            </div>
          </div>

@endsection


