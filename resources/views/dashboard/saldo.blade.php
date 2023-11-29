<x-app-layout>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row mt-2 mb-2 ms-2 me-2">
                    <h3>Total saldo anda adalah Rp. {{ $totalSaldo }}</h3>
                    
                    <h5 class="mt-3">Rincian Topup Saldo : </h5>
                    <table class="table-primary ms-5 me-5 ">
                        <thead>
                            <tr>
                                <th>Tanggal Topup</th>
                                <th>Jumlah Topup</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($saldos as $saldo)
                                <tr>
                                    <td>{{ $saldo->created_at }}</td>
                                    <td>{{ $saldo->saldo }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
