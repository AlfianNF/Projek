<x-app-layout>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <form action="/topup_saldo" method="post" class="mx-auto d-block mx-3 my-2" style="width: 70%;">
                        @csrf
                        <div class="text-center">
                            <h3 class="card-title mb-3">Form Topup Saldo</h3>
                            <img src="img/MegumiStore.png" alt="Megumi Store" class="mb-3 rounded">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @elseif(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-success text-white">Username</span>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="username" autofocus required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-success text-white">Email</span>
                            <input type="text" class="form-control" placeholder="Email" aria-label="Email" name="email" autocomplete="off" required>
                            
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-success text-white ">Saldo</span>
                            <input type="text" class="form-control" placeholder="Nominal Saldo" aria-label="Saldo" name="saldo" autocomplete="off" required>
                            <span class="input-group-text bg-success text-white rounded-start ms-2">Payment</span>
                            <select class="form-select" id="inputGroupSelect01" name="nama_nominal" required>
                                <option value="BRI">BRI</option>
                                <option value="BCA">BCA</option>
                                <option value="BNI">BNI</option>
                                <option value="Shopee Pay">Shopee Pay</option>
                                <option value="Dana">Dana</option>
                                <option value="Ovo">Ovo</option>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary mt-3 mb-3">
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
