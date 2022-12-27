<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        {{-- role->name di ambil dari relation yang dibuat di model yaitu nama method nya role --}}
        <a class="navbar-brand" href="#">{{ Auth::user()->role->name }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Home' ? 'active' : '' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Students' ? 'active' : '' }}" href="/students">Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Class' ? 'active' : '' }}" href="/class">Class</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Extracurricular' ? 'active' : '' }}"
                        href="/extracurricular">Extracurricular</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Teacher' ? 'active' : '' }}" href="/teacher">Teacher</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
        {{-- <div class="d-flex justify-content-end"> --}}
        {{-- <ul class="navbar-nav"> --}}
        {{-- <li class="nav-item">
            <a class="nav-link" href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li> --}}
        {{-- </ul> --}}
        {{-- </div> --}}
    </div>
</nav>
