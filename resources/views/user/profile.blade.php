@extends('layouts1.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.min.css') }}">
@endsection
@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
@if(Auth::user())
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Profile</h3>
          </div>
          @include('includes.messages')
          <!-- /.box-header -->
          <!-- form start -->
          <div class="box-body with-border">
            {{ Form::open(['action' => ['UserController@profile', Auth::user()->id], 'method' => 'POST', 'enctype'=> 'multipart/form-data']) }}
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="col-md-4">
                        <div class="form-group">
                            @if(Auth::user()->image != null)
                            <img src="{{ asset('avatars').'/'. Auth::user()->image }}" alt="" class="w-100">
                            @else
                            <img src="{{ asset("admin/dist/img/avatar5.png") }}" alt="" class="w-100">
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="validatedCustomFile" >
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            {{ Form::label('name', 'Nom', ['class' => 'form-control']) }}
                            {{ Form::text('name', Auth::user()->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'Email', ['class' => 'form-control']) }}
                            {{ Form::text('email', Auth::user()->email, ['class' => 'form-control', 'placeholder' => 'Email']) }}
                        </div>
                        <div class="form-group">
                            {{Form::submit('Enregistrer', ['class' => 'btn btn-primary pull-right'])}}
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
          </div>

        </div>
        <!-- /.box -->


      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>
  <!-- /.content -->
@endif
</div>
<!-- /.content-wrapper -->
@endsection
@section('footerSection')
<script src="{{ asset('admin/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{  asset('admin/ckeditor/ckeditor.js') }}"></script>
<script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1');
      //bootstrap WYSIHTML5 - text editor
      $(".textarea").wysihtml5();
    });
</script>
<script>
  $(document).ready(function() {
    $(".select2").select2();
  });
</script>
@endsection
