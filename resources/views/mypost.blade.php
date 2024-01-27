<style>
    .card-header {
        display: flex;
        align-items: center;
    }

    .card-header img {
        border-radius: 50%;
        margin-right: 10px;
    }

    .card-header span {
        font-weight: bold;
    }

    body {
        margin-bottom: 60px;
        /* Tinggi tombol + */
    }

    /* Custom style untuk tombol + */
    .circle-button {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #272727;
        color: #fff;
        text-align: center;
        line-height: 50px;
        font-size: 24px;
        text-decoration: none;
        position: fixed;
        bottom: 15px;
        /* Jarak dari bawah */
        right: 15px;
        /* Jarak dari kanan */
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Post') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                @if($databases->count() > 0)
                @foreach($databases as $database)
                <div class="card mt-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/profile.jpg') }}" alt="Profil Pengguna 1" width="40"
                                height="40">
                            <span class="ml-2">{{ $database->user->name }}</span>
                        </div>
                        <div>
                            {{ $database->created_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="card-body">
                        <p class="card-text">{!! nl2br(e($database->description)) !!}</p>
                        <p style="margin-top: 40px" class="card-text">
                            @if(pathinfo($database->file_path, PATHINFO_EXTENSION) === 'sql')
                            <i class="fa-solid fa-database"></i> <!-- Ikon untuk file .sql -->
                            @elseif(in_array(pathinfo($database->file_path, PATHINFO_EXTENSION), ['rar', 'zip']))
                            <i class="fa-solid fa-file-zipper"></i> <!-- Ikon untuk file .rar atau .zip -->
                            @endif
                            <strong>File:</strong> <a href="{{ $database->file_path }}" target="_blank">{{
                                basename($database->file_path) }}</a>
                            <br><span class="text-muted">Size: {{ formatFileSize($database->file_path) }}</span>
                            <a href="{{ $database->file_path }}" target="_blank"
                                class="btn btn-success btn-sm float-right" download>Download</a>
                        </p>
                    </div>
                </div>
                @endforeach
                @else
                <p>No posts found.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>