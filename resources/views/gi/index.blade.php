@extends('layouts.main')

@section('container')
    <div class="container ">
      <div class="row mt-3 mb-3">
        <div class="col-md-6 offset-md-3">
            <div class="card">
              <div class="card-body">
                <form action="{{ url('store') }}" method="post" id="topupForm">
                  @csrf
                    <center>
                      <h3 class="card-title mb-3">Form Top Up Genshin Impact</h3>
                      <img src="img/genshin.jpg" alt="" class="mb-2 rounded">
                    </center>
                    <div class="input-group mb-3">
                      <span class="input-group-text bg-success text-white">Username</span>
                      <input type="text" class="form-control" placeholder="Username Player" aria-label="Username" name="username" autofocus required><br>
                    </div> 
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-success text-white">UID</span>
                        <input type="text" class="form-control" placeholder="UID" aria-label="uid" name="uid" autocomplete="off" required>
                        <span class="input-group-text bg-success text-white rounded-start ms-2">Server</span>
                        <input type="text" class="form-control" placeholder="Server Player" aria-label="Server" name="server" autocomplete="off" required>
                    </div>
                    <div class="input-group mb-3">
                      <label class="input-group-text bg-success text-white" for="inputGroupSelect01">Items</label>
                      <select class="form-select" id="inputGroupSelect01" name="nama_nominal" required>
                        <option selected>Choose Nominal</option>
                        @foreach ($topup as $data)
                          @if ($data->game_id == 1)
                              <option value="{{ $data->nama_nominal}} {{ $data->nominal}}">{{ $data->nama_nominal }} - {{ $data->nominal}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                      <a href="/" class="btn btn-primary mt-3">Back</a>
                      <button type="button" class="btn btn-primary mt-3" onclick="validateAndSubmit()">Submit</button>
                </form>
              </div>
            </div>
        </div>
    </div>
@endsection