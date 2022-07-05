@extends('layouts.backend') @section('title','Option') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Option Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Option</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> {{$module}}
              <a href="{{route('backend.option.create')}}" class="btn btn-info">Create</a>

            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
            </div>
        </div>
        <form action="{{route($base_route.'update',$data['record']->id)}}" method="post">
        <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{$data['record']->title}}" placeholder="Enter Title">
                </div>
                
                
                <div class="form-group">
                    <label for="active">Status</label><br>
                    @if($data['record']->status==1)
                    <input type="radio" name="status" id="active" value="1" checked> Enable<br>
                    <input type="radio" name="status" d="active" value="0"> Disable<br>   
                    @else
                    <input type="radio" name="status" id="active" value="1"> Enable<br>
                    <input type="radio" name="status" d="active" value="0" checked> Disable<br>
                    @endif              
                </div>
                <input type="hidden" value="{{auth()->user()->id}}" name="updated_by">


            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection