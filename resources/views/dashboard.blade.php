<x-app-layout>
    <head>
        <style>
            .gradient-custom {
                /* fallback for old browsers */
                background: #f6d365;

                /* Chrome 10-25, Safari 5.1-6 */
                background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

                /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
            }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    </head>
    </head>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                          <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col">
                              <div class="card mb-3" style="border-radius: .5rem;">
                                <div class="row g-0">
                                  <div class="col-md-4 gradient-custom text-center text-white pb-3"
                                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                    <center>
                                      @if ($user->image)
                                            <img src="{{ asset('storage/'.$user->image) }}" alt="" style="width:200px;" class="mt-2">
                                      @else
                                          <img src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fw7.pngwing.com%2Fpngs%2F178%2F595%2Fpng-transparent-user-profile-computer-icons-login-user-avatars-thumbnail.png&tbnid=HRpXPjhOPcdOrM&vet=12ahUKEwi2-4D6nYeDAxUAcmwGHaJiCa0QMygNegQIARBi..i&imgrefurl=https%3A%2F%2Fwww.pngwing.com%2Fen%2Fsearch%3Fq%3Duser&docid=8Qj_3LCalWAqLM&w=360&h=361&q=user&ved=2ahUKEwi2-4D6nYeDAxUAcmwGHaJiCa0QMygNegQIARBi"
                                          alt="Avatar" class="img-fluid my-5" style="width: 200px;" class="mt-2">
                                      @endif                                        
                                    </center>
                                    <h5>{{ $user->full_name }}</h5>
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body p-4">
                                      <h3>Information</h3>
                                      <hr class="mt-0 mb-4" style="width: 150px;">
                                      <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                          <h5>Username</h5>
                                          <p class="text-muted">{{ $user->name }}</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                          <h5>Email</h5>
                                          <p class="text-muted">{{ $user->email }}</p>
                                        </div>
                                      </div>
                                      <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                          <h5>Jenis Kelamin</h5>
                                          @if ($user->jenis_kelamin == 1)
                                            <p class="text-muted">Laki-laki</p>

                                          @else
                                            <p class="text-muted">Perempuan</p>   
                                          @endif
                                          
                                        </div>
                                        <div class="col-6 mb-3">
                                          <h5>Pertama kali bergabung</h5>
                                          <p class="text-muted">{{ $user->created_at->format('d M Y') }}</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                          <h5>No Telepon</h5>
                                          <p class="text-muted">{{ $user->no_telp }}</p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
