   @extends('layouts.main')
   @section('content')
       <div class="container">
           <div class="row mt-5">
               <div class="col">
                   @if (Session::has('message'))
                       <div class="alert alert-success alert-dismissible fade show" role="alert">
                           <strong>Congrats!</strong> {{ session('message') }}
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                       </div>
                   @endif
                   <div class="card text-center shadow">
                       <div class="card-header">
                           Information
                       </div>
                       <div class="card-body">
                           {{-- * buat munculin nama orang yang lagi login --}}
                           <h5 class="card-title">Hallo {{ Auth::user()->name }}</h5>
                           <p class="card-text">Disini kamu sebagai seorang {{ Auth::user()->role->name }}</p>

                           {{-- ==== IF ==== --}}
                           {{-- @if ($role == 'CTO')
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        @elseif($role == 'Direktur')
                            <a href="#" class="btn btn-primary">Go Form Direktur</a>
                        @else
                        <div class="callout">...</div>
                        @endif --}}

                           {{-- === CASE === --}}
                           {{-- @switch($role)
                            @case($role == 'CTO')
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                @break
                            @case($role == 'Direktur')
                            <a href="#" class="btn btn-primary">Go Form Direktur</a>
                                @break
                            @default
                            <div class="callout">...</div>
                        @endswitch --}}

                           {{-- === LOOPING === --}}
                           {{-- @for ($i = 0; $i < 5; $i++)
                        <p>{{ $i }}</p><br>
                        @endfor --}}


                       </div>
                       <div class="card-footer text-muted">

                       </div>
                   </div>
               </div>
           </div>
       </div>
   @endsection
