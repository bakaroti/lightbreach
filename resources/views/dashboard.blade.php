<style>
    .card-container {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .card {
        flex: 1;
        padding: 20px;
        margin: 0 10px;
        border-radius: 10px;
        background-color: #34495e;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Tambahkan box-shadow di sini */
    }

    .card-title {
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: #ecf0f1;
    }

    .card-text {
        font-size: 1rem;
        color: #bdc3c7;
    }

    .small-card {
        flex: 1;
        padding: 10px;
        margin: 10px 10px 0 10px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>

@php
use App\Models\Databases;
use App\Models\User;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title fw-bold">Leaks</h5>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="leaks">
                                {{-- <a href="{{ route('games') }}" --}} <a href="/game"
                                    class="card-body d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-gamepad me-3"></i>
                                        <div>
                                            <h5 class="card-title fw-bold">Games</h5>
                                            <p class="card-text">Game Leaks are posted here. Code, Plugins, Leaked
                                                Videos or anything similar to that may be posted here.</p>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <div
                                            class="fw-bold d-flex flex-column justify-content-center align-items-center">
                                            <p class="card-text mb-0">2,210</p>
                                            <p class="card-text">Post</p>
                                        </div>
                                    </div>
                                </a>
                                <hr>
                                <a href="{{ route('databases.index') }}"
                                    class="card-body d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-database me-3"></i>
                                        <div>
                                            <h5 class="card-title fw-bold">Databases</h5>
                                            <p class="card-text">Database leaks are posted here.</p>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <div
                                            class="fw-bold d-flex flex-column justify-content-center align-items-center">
                                            <p class="card-text mb-0">{{ \App\Models\Databases::count() }}</p>
                                            <p class="card-text">
                                                {{ Databases::count() === 1 ? 'Post' : 'Posts' }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <hr>
                                {{-- <a href="{{ route('anime_manga') }}" --}} <a href="/anime"
                                    class="card-body d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-dragon me-3"></i>
                                        <div>
                                            <h5 class="card-title fw-bold">Anime & manga</h5>
                                            <p class="card-text">Discuss various things related to Manga and Anime.</p>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <div
                                            class="fw-bold d-flex flex-column justify-content-center align-items-center">
                                            <p class="card-text mb-0">2,115</p>
                                            <p class="card-text">Post</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>