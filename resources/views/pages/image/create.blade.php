@extends('layouts.admin')



@section('content')
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Register Image</h4>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">

            {!! Form::open(['route' => 'event-image.store', 'enctype' => 'multipart/form-data', 'files' => true]) !!}
                @include('pages.image._form', ['submitButtonText' => 'Simpan', 'events' => $events, 'types' => $types])
            {!! Form::close() !!}

            {{-- <form action="{{ route('event-image.upload-image') }}" method="post" enctype="multipart/form-data" id="image-upload" class="dropzone">

                @csrf

                <div class="form-group mb-4">

                </div>

            </form> --}}

        </div>
    </div>
</div>
@endsection


@section('extra-head')
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> --}}

{{-- CSS assets in head section --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />

{{-- ... a lot of main HTML code ... --}}

{{-- JS assets at the bottom --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
{{-- ...Some more scripts... --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

@endsection


{{-- @section('scripts') --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/min/dropzone.min.js"></script> --}}
    {{-- <script>

        Dropzone.autoDiscover = false;

        $(document).ready(function() {
            var dropzone = new Dropzone('#image-upload', {

                thumbnailWidth: 200,
                maxFilesize: 1,
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                paramName: "images",
                url: 'route("event-image.upload-image")'

            });

        });
    </script> --}}
{{-- @endsection --}}


@section('scripts')
<script>
  var uploadedDocumentMap = {}
  console.log($('#image-type').val())
  Dropzone.options.documentDropzone = {
    url: "{{ route('event-image.store-image') }}",
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
      uploadedDocumentMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentMap[file.name]
      }
      $('form').find('input[name="images[]"][value="' + name + '"]').remove()
    },
    init: function () {
      @if(isset($event) && $event->images)
        var files =
          {!! json_encode($event->images) !!}
        for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="images[]" value="' + file.file_name + '">')
        }
      @endif
    }
  }
</script>
@stop
