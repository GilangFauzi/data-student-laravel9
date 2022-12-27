@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row mt-4 justify-content-center">
            <div class="col-md-7">
                <div class="card shadow mb-3">
                    <div class="card-header text-center">
                        Please input data student
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <form action="studentCreate" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="class_id" class="form-label">Class ID</label>
                                        <div class="input-group">
                                            <label class="input-group-text " for="class_id">Options</label>
                                            <select class="form-select" id="class_id" name="class_id">
                                                <option selected>Choose...</option>
                                                @foreach ($class as $class_id)
                                                    @if (old('class_id') == $class_id->id)
                                                        <option value="{{ $class_id->id }}" selected>{{ $class_id->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $class_id->id }}">{{ $class_id->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="nim" class="form-label">NIM</label>
                                        <input type="text"
                                            class="form-control @error('nim') is-invalid @enderror"id="nim"
                                            name="nim">
                                        @error('nim')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="extracurricular" class="form-label">Extracurricular</label>
                                        @foreach ($eskul as $eskuls)
                                            <div class="form-check">
                                                {{-- todo name disini pakein array kosong buat nampung --}}
                                                <input class="form-check-input" type="checkbox" value="{{ $eskuls->id }}"
                                                    name="extracurricular[]" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $eskuls->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <div class="input-group">
                                            <label class="input-group-text " for="gender">Options</label>
                                            <select class="form-select" id="gender" name="gender">
                                                <option selected>Choose...</option>
                                                @foreach ($gender as $jk)
                                                    @if (old('gender') == $jk)
                                                        <option value="{{ $jk }}" selected>{{ $jk }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $jk }}">{{ $jk }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <label for="image" class="form-label">Image</label>
                                    <img class="img-preview img-fluid mb-2 col-sm-2">
                                    <div class="input-group">
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            id="image" aria-describedby="inputGroupFileAddon04" aria-label="Upload"
                                            name="image" onchange="previewImage()">
                                    </div>
                                    @error('image')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFRaeder = new FileReader();
            oFRaeder.readAsDataURL(image.files[0]);

            oFRaeder.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
