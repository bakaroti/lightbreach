<!-- resources/views/databases/upload.blade.php -->
<style>
    .form-control-file {
        display: none;
        /* Sembunyikan tombol bawaan */
    }

    #dropArea {
        border: 2px dashed #ccc;
        border-radius: 8px;
        padding: 90px;
        margin-top: 10px;
        text-align: center;
        cursor: pointer;
    }

    #dropArea.dragover {
        background-color: #d1d1d1;
    }

    /* CSS */
    .button-31 {
        background-color: #222;
        border-radius: 4px;
        border-style: none;
        box-sizing: border-box;
        color: #000000;
        cursor: pointer;
        display: inline-block;
        font-family: "Farfetch Basis", "Helvetica Neue", Arial, sans-serif;
        font-size: 16px;
        font-weight: 700;
        line-height: 1.5;
        margin: 0;
        max-width: none;
        min-height: 44px;
        min-width: 10px;
        outline: none;
        overflow: hidden;
        padding: 9px 20px 8px;
        position: relative;
        text-align: center;
        text-transform: none;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        width: 100%;
    }

    .button-31:hover,
    .button-31:focus {
        opacity: .75;
    }
</style>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Upload Post') }}
                        </h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('databases.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <!-- Deskripsi Form -->
                            <div class="form-group">
                                <label for="description"></label>
                                <textarea class="form-control" name="description" id="description" rows="4" cols="50"
                                    style="resize: none;" placeholder="Deskripsi"></textarea>
                            </div>

                            <div class="form-group drop-area pt-2" id="dropArea">
                                <label for="file">Pilih file (RAR/ZIP) atau seret dan lepaskan:</label>
                                <input type="file" class="form-control-file" name="file" accept=".rar, .zip,"
                                    id="fileInput">
                                <p class="text-muted">Seret dan lepaskan file di sini atau klik untuk memilih file.</p>
                                <i class="fs-4 pt-3 fa-solid fa-file"></i>
                                <p id="fileNameDisplay" class="text-muted">Tidak ada file terpilih.</p>

                            </div>

                            <!-- Tombol Submit -->
                            <div class="form-group pt-3">
                                <button type="submit" class="button-31" role="button">Upload</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    // Fungsi untuk mencegah penanganan bawaan peramban untuk seret dan lepaskan
    function preventDefaultBehavior(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    // Mendapatkan elemen-elemen formulir dan area drop
    var dropArea = document.getElementById('dropArea');
    var fileInput = document.getElementById('fileInput');
    var uploadForm = document.getElementById('uploadForm');

    // Menangani peristiwa seret masukkan ke dalam area drop
    dropArea.addEventListener('dragenter', preventDefaultBehavior, false);
    dropArea.addEventListener('dragover', function(e) {
        preventDefaultBehavior(e);
        dropArea.classList.add('dragover');
    }, false);
    dropArea.addEventListener('dragleave', function() {
        dropArea.classList.remove('dragover');
    }, false);
    dropArea.addEventListener('drop', function(e) {
        preventDefaultBehavior(e);
        dropArea.classList.remove('dragover');
        fileInput.files = e.dataTransfer.files;
    }, false);

    // Menangani peristiwa pemilihan file
fileInput.addEventListener('change', function() {
    dropArea.classList.remove('dragover');
    displayFileName(fileInput.files[0]);
});

// Menangani peristiwa drop file
dropArea.addEventListener('drop', function(e) {
    preventDefaultBehavior(e);
    dropArea.classList.remove('dragover');
    displayFileName(e.dataTransfer.files[0]);
});

// Fungsi untuk menampilkan nama file
function displayFileName(file) {
    if (file) {
        var fileNameDisplay = document.getElementById('fileNameDisplay');
        fileNameDisplay.textContent = `File terpilih: ${file.name}`;
    }
}

    // Menangani peristiwa klik pada label
    dropArea.addEventListener('click', function() {
        fileInput.click();
    });

    // Menangani peristiwa submit formulir
    uploadForm.addEventListener('submit', function() {
        // Lakukan pengolahan tambahan atau validasi jika diperlukan sebelum mengirim formulir
    });
</script>