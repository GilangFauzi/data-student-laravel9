   @extends('layouts.main')
   @section('content')
       <div class="container">
           <div class="row mt-5">
               <div class="col">
                   <div class="card text-center shadow">
                       <div class="card-header">
                           <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                               class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
                               aria-label="Warning:">
                               <path
                                   d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                           </svg>Warning!
                       </div>
                       <div class="card-body">
                           <h5 class="card-title">Are you sure you want to delete data with name <b> {{ $student->name }}
                                   ?</b>
                           </h5>
                           <form action="/studentDestroy/{{ $student->id }}" method="post" class="d-inline">
                               @csrf
                               @method('delete')
                               <button class="btn btn-danger" type="submit">Delete</button>
                           </form>
                           <a href="/students" class="btn btn-primary">Cencel</a>
                       </div>
                       <div class="card-footer text-muted">
                           40 Menit yang lalu
                       </div>
                   </div>
               </div>
           </div>
       </div>
   @endsection
