<x-app-layout>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    </head>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="mb-2"><strong>Selamat Datang Admin!!!</strong></h3>
                    <div class="row ">
                        <div class="col">
                            <div class="card-body">
                                {!! $data['jenisKelaminChart']->container() !!}
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                {!! $game['topupChart']->container() !!}
                            </div>
                        </div>
                    </div>
                    @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @elseif(session('failed'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('failed') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                    
                    <a href="/admin/tambah" class="btn btn-success"><i class="bi bi-plus-circle-fill"></i> Tambah Data</a>

                    <table class="table table-primary table-striped m-auto mb-3 mt-2 text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Game</th>
                                <th scope="col">Nama Nominal</th>
                                <th scope="col">Nominal</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nominals as $nominal)
                                <tr>
                                    <td>{{ ($nominals->currentPage() - 1) * $nominals->perPage() + $loop->iteration }}</td>

                                    <td>
                                        @if ($nominal->game_id == 1)
                                            Genshin Impact
                                        @elseif($nominal->game_id == 2)
                                            Honkai Star Rail
                                        @elseif($nominal->game_id == 3)
                                            Mobile Legends
                                        @else 
                                            Clash Of Clans                                      
                                        @endif
                                    </td>

                                    <td>{{ $nominal->nama_nominal }}</td>
                                    <td>{{ $nominal->nominal }}</td>
                                    <td>
                                        <a href="/admin/update/{{ $nominal->id }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        <a href="/admin/delete/{{ $nominal->id }}" class="btn btn-danger" onclick="return confirm('Yakin untuk menghapus postingan?')">
                                            <i class="bi bi-trash3-fill"></i>
                                        </a>                                        
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $nominals->links() }}
                </div>
            </div>
        </div>
        <script src="{{ $data['jenisKelaminChart']->cdn() }}"></script>
        <script src="{{ $game['topupChart']->cdn() }}"></script>
        {{ $data['jenisKelaminChart']->script() }}
        {{ $game['topupChart']->script() }}

</x-app-layout>