<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DB Leaks - Upload Form') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="{{ route('databases.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="databaseFile">Upload Database File</label>
                        <input type="file" class="form-control" id="databaseFile" name="databaseFile" accept=".sql">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>