<x-app-layout>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Update Data Mahasiswa</title>
    </head>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <body>
                            <div class="container mt-4">
                                @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                                @endif
                            </div>
                            <div class="container">
                            <div class="card">
                                <div class="card-header text-center font-weight-bold">
                                    <strong>Update Data Nominal Topup</strong> 
                                </div>
                                <div class="card-body">
                                    <form action="/admin/store" method="post" name="add-blog-post-form" id="add-blog-post-form">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="game_id">Nama Game</label>
                                        <select id="game_id" name="game_id" class="form-control">
                                            <option selected disabled>Select a game</option>
                                            @foreach ($games as $game)
                                                <option value="{{ $game['game_id'] }}">{{ $game['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                        <div class="form-group mb-3">
                                            Nama Nominal
                                            <input type="text" id="nama_nominal" name="nama_nominal" class="form-control" >
                                        </div>
                                        <div class="form-group mb-3">
                                            Nominal
                                            <input type="text" id="nominal" name="nominal" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </body>
            </div>
        </div>
    </div>
</x-app-layout>
