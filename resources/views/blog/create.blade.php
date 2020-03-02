@extends('layouts1.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.min.css') }}">
@endsection
@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Create Blog</h3>
          </div>
          @include('includes.messages')
          <!-- /.box-header -->
          <!-- form start -->
          <div class="box-body with-border">
            {{ Form::open(['action' => 'BlogController@store', 'method' => 'POST']) }}
             <div class="form-group">
                {{ Form::label('titre', 'Titre', ['class' => 'form-control']) }}
                {{ Form::text('titre', '', ['class' => 'form-control', 'placeholder' => 'Titre du Blog']) }}
             </div>
             <div class="form-group">
                {{ Form::label('description', 'Description', ['class' => 'form-control']) }}
                {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'decrivez votre blog ...']) }}
             </div>
             <div class="form-group">
                 {{Form::submit('Enregistrer', ['class' => 'btn btn-primary pull-right'])}}
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
