@extends('layouts.main')

@section('title', 'Data Repository')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 text-gray-800">Data Repository</h1>
        <a href="{{route('repository.index')}}" class="btn btn-sm btn-outline-scondary shadow-sm"><i class="fas fa-arrow-left fa-sm"></i> Kembali</a>
    </div>

    <div class="row">
        @if (Session::has('error'))
        <div class="col-12 mb-2">
            <div class="alert alert-danger" role="alert">
                {{Session::get('error')}}
            </div>
        </div>
        @endif

        <div class="col-md-6">
            <div class="card shadow my-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Dokumen</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('repository.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="judul">Judul Dokumen</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder="Masukkan judul dokumen" value="{{ old('judul')}}">
                            @error('judul')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis Dokumen</label>
                            <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis" placeholder="Masukkan jenis dokumen" value="{{ old('jenis')}}">
                            @error('jenis')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="abstrak">Abstrak</label>
                            <textarea name="abstrak" id="abstrak" cols="30" rows="10" class="form-control @error('abstrak') is-invalid @enderror" placeholder="Masukkan abstrak dokumen" value="{{ old('abstrak')}}"></textarea>
                            @error('abstrak')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file">File Dokumen</label>
                            <small class="form-text text-muted mb-1">*Upload file dengan format PDF dan ukuran file maksimal 5 MB</small>
                            <input type="file" class="form-control-file" id="file" name="file" accept="application/pdf">
                            @error('file')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6" style="display: none;" id="card-view">
            <div class="card shadow my-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Preview Dokumen</h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-danger" role="alert" id="alert-view" style="display: none;"></div>
                    <div id="loading" style="display: none">
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        Proses preview dokumen..
                    </div>
                    <div style="height:600px;overflow-y:scroll;" id="pdfViewer" class="w-100"></div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

@section('script')

<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

<script>
    var pdfjsLib = window['pdfjs-dist/build/pdf'];
    // The workerSrc property shall be specified.
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';

    $("#file").on("change", function(e) {
        $('#card-view').show()
        $('#alert-view').hide();
        var file = e.target.files[0]
        if (file.type == "application/pdf") {
            var fileReader = new FileReader();
            fileReader.onload = function() {
                var pdfData = new Uint8Array(this.result);
                // Using DocumentInitParameters object to load binary data.
                var loadingTask = pdfjsLib.getDocument({
                    data: pdfData
                });
                $('#loading').show()
                loadingTask.promise.then(function(pdf) {
                    // var pageNumber = 1;
                    $('#loading').hide()
                    for (var i = 1; i <= pdf.numPages; i++) {
                        renderPage(i, pdf);
                    }
                }, function(reason) {
                    // PDF loading error
                    $('#loading').hide()
                    $('#alert-view').show();
                    $('#alert-view').html('Preview dokumen gagal. Silahkan ulangi input dokumen.');
                });
            };
            fileReader.readAsArrayBuffer(file);
        }
    });

    function renderPage(pageNumber, pdf) {
        pdf.getPage(pageNumber).then(function(page) {
            var canvasId = 'pdf-viewer-' + pageNumber;
            $('#pdfViewer').append($('<canvas />', {
                'id': canvasId
                , 'class': 'w-100'
            , }));
            var canvas = document.getElementById(canvasId);

            var scale = 1.5;
            var viewport = page.getViewport({
                scale: scale
            });

            // // Prepare canvas using PDF page dimensions
            // var canvas = $("#pdfViewer")[0];
            var context = canvas.getContext('2d');
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            // // Render PDF page into canvas context
            var renderContext = {
                canvasContext: context
                , viewport: viewport
            };
            var renderTask = page.render(renderContext);
            renderTask.promise.then(function() {
                // console.log('Page rendered');
            });
        });

    }

</script>

@endsection
