<x-app-layout>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row mt-3 mb-2 ms-2 me-2">
                    <h3>Total saldo anda adalah Rp. {{ $totalSaldo }}</h3>
                    
                    <h5 class="mt-3">Rincian Topup : </h5>
                    <table class="table table-primary table-striped m-auto mb-3" style="width: 90%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Topup</th>
                                <th>Nama Item</th>
                                <th>Nominal</th>
                            </tr>
                        </thead>
                            @forelse ($invoices as $invoice)
                            <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $invoice->created_at->format('d M Y') }}</td>
                                    <td>{{ $invoice->nama_nominal }}</td>
                                    <td>{{ $invoice->nominal }}</td>
                                </tr>
                            </tbody>
                            @empty
                            <tr>
                                <td colspan="3"><h5>Belum ada rincian Topup</h5></td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
