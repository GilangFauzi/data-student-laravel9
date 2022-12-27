@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row mt-3 justify-content-center">
            <div class="col-md-7">
                <div class="card shadow mb-3">
                    <div class="card-header text-center">
                        Please edit data student
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <form action="/studentUpdate/{{ $student->id }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    {{-- ini buat apus gambar yang udah ada, biar ga numpuk --}}
                                    <input type="hidden" name="oldImage" value="{{ $student->image }}">
                                    <div class="mb-3">
                                        <label for="class_id" class="form-label">Class ID</label>
                                        <div class="input-group">
                                            <label class="input-group-text " for="class_id">Options</label>
                                            <select class="form-select" id="class_id" name="class_id">
                                                <option value="{{ $student->class->id }}">{{ $student->class->name }}
                                                </option>
                                                @foreach ($class as $kelas)
                                                    <option value="{{ $kelas->id }}">
                                                        {{ $kelas->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $student->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nim" class="form-label">NIM</label>
                                        <input type="text" class="form-control" id="nim" name="nim"
                                            value="{{ $student->nim }}">

                                        @error('nim')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <div class="input-group">
                                            <label class="input-group-text " for="gender">Options</label>
                                            <select class="form-select" id="gender" name="gender">
                                                <option value="{{ $student->gender }}">{{ $student->gender }}</option>
                                                @if ($student->gender == 'Pria')
                                                    <option value="Wanita">Wanita</option>
                                                @else
                                                    <option value="Pria">Pria</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <label for="image" class="form-label">Image</label>

                                    @if ($student->image)
                                        <img src="{{ asset('storage/' . $student->image) }}" alt=""
                                            class="img-preview img-fluid mb-2 col-sm-2 d-block">
                                    @else
                                        <img class="img-preview img-fluid mb-2 col-sm-2">
                                    @endif

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
