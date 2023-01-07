<?php

namespace App\Http\Controllers;

// use alert;

use Carbon\Carbon;
use App\Mail\sendMail;
use App\Models\Student;
// use Illuminate\Support\Carbon;
use App\Models\ClassModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
// use PDF;
use App\Exports\StudentExport;
// use Barryvdh\DomPDF\PDF;
// use Barryvdh\DomPDF\Facade as PDF;

use App\Imports\StudentImport;
use App\Models\Extracurricular;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreStudentRequest;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        // $student = Student::with('class')->get();
        // foreach ($student as $s) {
        //     dd($s->class->name);
        // }

        // * pagination with search
        $keyword = $request->keyword;
        // $student = Student::orderBy('id', 'desc')->where('name', 'LIKE', '%' . $keyword . '%')->paginate(6);
        // * kalau mau mencari lebih dari 1 column
        // $student = Student::orderBy('id', 'desc')->where('name', 'LIKE', '%' . $keyword . '%')->orWhere('gender', $keyword)->orWhere('nim', 'LIKE', '%' . $keyword . '%')->paginate(6);
        // * search dengan relasi table
        $student = Student::orderBy('id', 'desc')
            ->with('class')
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('gender', $keyword)
            ->orWhere('nim', 'LIKE', '%' . $keyword . '%')
            // fungsi use di dalam function biar variable diluar function dapat dikenali
            ->orWhereHas('class', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })
            ->paginate(6);
        // ===== PERBANDINGAN PHP BIASA DAN COLLECTION =====
        // $nilai = [10, 5, 1, 9, 8, 9, 7, 6, 8, 9]; // cari nilai rata-rata

        // ===== PHP BIASA =====
        // $jumlahNilai = count($nilai); // hitung jumlah nilai
        // $totalNilai = array_sum($nilai); // hitung total nilai di dalam array
        // $nilaiRataRata =  $totalNilai / $jumlahNilai; // cari nilai rata-rata

        // mencari tahu hasil nilai dikali 2 dari data yang ada di array
        // $hasil = [];
        // foreach ($nilai as $value) {
        //     array_push($hasil, $value * 2);
        // }
        // dd($hasil); // hasilnya gini 10*2 = 20, 5*2 =10 seterusnya..
        // ===== COLLECTION =====
        // $nilaiRataRata = collect($nilai)->avg();

        // [map = mencari tahu hasil nilai dikali 2 dari data yang ada di array]
        // $hasilKaliDua = collect($nilai)->map(function ($value) {
        //     return $value * 2;
        // })->all();
        // dd($hasilKaliDua);

        // [contains = untuk cek apakah sebuah array memiliki sesuatu]
        // $mhs = collect($nilai)->contains(10); // akan bernilai true jika ada nilai 10
        // cek apakah ada mahasiswa yang nilainya kurang dari 7
        // $mhs = collect($nilai)->contains(function($value){
        // return $value < 7; // jika ada akan bernilai true
        // });

        // penggunaan [diff] berfungsi untuk membandingkan data
        // $restaurantA = ["Bakso", "Mie Ayam", "Mie Dok Dok", "Siomay", "Burger"];
        // $restaurantB = ["Bakso", "Spageti", "Burger", "Cireng", "Pizza", "Siomay"];
        // $menuRestaurantA = collect($restaurantA)->diff($restaurantB);
        // jadi di restauran A punya menu yang ga ada di restaurant B
        // dd($menuRestaurantA);

        // [fillter]
        // $filter = collect($nilai)->filter(function ($value){
        //     return $value > 7;
        // })->all();
        // jika nilai di dalam data > 7 maka akan disimpan kedalam variable
        // dd($filter);

        // [pluck] digunakan buat ambil salah satu field data tanpa perulangan
        // $biodata = [
        //     ['nama' => 'Gilang Faui', 'umur' => 21, 'pekerjaan' => 'Fullstack Web Developer'],
        //     ['nama' => 'Maya Andriana', 'umur' => 20, 'pekerjaan' => 'Junior Web Developer'],
        //     ['nama' => 'Intan Sapira', 'umur' => 22, 'pekerjaan' => 'Programmer']
        // ];
        // $pluck = collect($biodata)->pluck('nama')->all();
        // dd($pluck);

        //  === ada 3 cara buat query di laravel ===
        // eloquent ORM (recomended from laravel)

        // ===== CREATE =====
        // $s = Student::create([
        //     'class_id' => 1,
        //     'name' => 'Eloquent',
        //     'nim' => 181011400312,
        //     'gender' => 'Pria'
        // ]);
        // dd($s);
        // ===== SHOW =====
        // ini cara EAGER LOADING, yang buat manggil relationship table [recomended = lebih cepat buat koneksi ke db. terus class disini di ambil dari method ralation yang ada di model student]
        // $student = Student::with('class')->get();

        // karena manggil relation nya lebih dari 1 maka pakein array kek gini
        // $student = Student::with(['class','extracurriculars'])->get();

        // ini lanjutan dari model student. yaitu penggunaan nested relationship. atau bisa disebut relasi yang lebih dari 2 table. buat pemanggilannya kek gini doang
        // $student = Student::with(['class.homeroomTeacher','extracurriculars'])->get();
        // ini cara LAZZY LOADING, buat manggil relationship table
        // $student = Student::all();

        // $student = Student::all();
        // todo urutkan dari bawah ke atas
        // $student = Student::orderBy('id', 'desc')->paginate(6);
        // $count = Student::all();
        // ====== UPDATE =======
        // $student = Student::find(53)->update([
        //     'name' => 'Eloquent Update',
        //     'class_id' => 1
        // ]);
        // dd($student);
        // ===== DELETE =====
        // $delete = Student::find(53)->delete();
        // dd($delete);


        // query builder (standar)
        // ===== SHOW =====
        // $count = DB::table('students')->get();
        // ===== INSERT =====
        //   $insert =  DB::table('students')->insert([
        //         'class_id' => 1,
        //         'name' => 'Gilang Ganteng',
        //         'nim' => 181011400312,
        //         'gender' => 'Pria'
        //     ]);
        // dd($count);
        // ===== UPDATE =====
        // $update = DB::table('students')->where('id', 52)->update([
        //     'name' => 'Update Query Builder',
        //     'class_id' => 3,
        // ]);
        // dd($update);
        // ===== DELETE =====
        // $delete = DB::table('students')->where('id', 51)->delete();
        // ddd($delete);
        // row query (tidak disarankan)

        // return view('student.student', [
        //     'title' => 'Students',
        //     'name' => 'Gilang Fauzi',
        //     'listStudent' => $student,
        //     // 'count' => $count
        // ]);

        $eskul = Extracurricular::all();
        $class = ClassModel::select('id', 'name')->get();
        $gender = ['Pria', 'Wanita'];
        return view('student.index', [
            'title' => 'Students',
            'name' => 'Gilang Fauzi',
            'listStudent' => $student,
            'gender' => $gender,
            'class' => $class,
            'eskul' => $eskul
            // 'count' => $count
        ]);
    }

    public function show($slug)
    {
        // kalau cuma pake find, jika data dicari dari url dia bakal error
        // kalau pake findOrFail jika data dicari ga ada dia bakal notfound (recomended)
        // $student = Student::find($id);
        // $student = Student::findOrFail($id);

        // $student = Student::with(['class.homeroomTeacher', 'extracurriculars'])->findOrFail($id);
        // todo pake prety URL biar cari berdasarkan id di ganti dengan slug
        $student = Student::with('class.homeroomTeacher', 'extracurriculars')->where('slug', $slug)->first();
        return view('student.showDetailStudent', [
            'student' => $student,
            'title' => 'Students',
            // 'name' => 'Gilang Fauzi',
        ]);
    }

    public function create()
    {
        // $class = ClassModel::all();
        // todo biar lebih optimal, panggil yang dibutuhkan aja
        $eskul = Extracurricular::all();
        $class = ClassModel::select('id', 'name')->get();
        $gender = ['Pria', 'Wanita'];
        return view('student.create', [
            'title' => 'Students',
            'class' => $class,
            'gender' => $gender,
            'eskul' => $eskul
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        // todo custom validation
        // * open terminal typing php artisan make:request StoreStudentRequest
        $validate = $request->validate([
            'nim' => 'required|unique:students|max_digits:15|numeric',
            'name' => 'required',
            'email' => 'required|email:dns|unique:students',
            // 'slug' => 'alpha_dash',
            'gender' => 'required',
            'class_id' => 'required',
            'image' => 'image|file|max:1024'
        ]);
        // todo jika image kosong atau gak di isi, ini bakal di skip
        if ($request->file('image')) {
            $validate['image'] = $request->file('image')->store('student-images');
        }

        if ($request->class_id == 'Choose...') {
            return redirect('/studentCreate')->with('warning', 'Choose ID Class');
        }
        if ($request->gender == 'Choose...') {
            return redirect('/studentCreate')->with('warning', 'Choose Gender');
        }

        // todo menambahkan slug dari name, jadi buat field slug nya dulu di db, baru bisa dipake
        // * slug dapat di aplikasikan ketika lebih dari 1 kata.
        // * simbol - bisa diganti jadi _ atau anything

        // $validate['slug'] = Str::slug($validate['name'], '_');
        // todo kalau pake sluggable, slug manual nya apus aja
        
        $student = Student::create($validate);
        // Student::create($validate);

        // todo save use eloquent
        // $student = new Student;
        // $student->class_id = $request->class_id;
        // $student->name = $request->name;
        // $student->nim = $request->nim;
        // $student->gender = $request->gender;
        // $student->save();
        // * save use mass assignment. should setting in model student, add fillable or guarded
        // $student =  Student::create($request->all());
        // todo multiple line flash message
        // if ($student) {
        //     Session::flash('message', 'Success');
        // }

        // ini buat ngisi relasi table student_extracuricular many_to_many
        // *extracurriculars() di ambil dari relasi atau method yang ada di dalam model student
        // todo extracurricular di request di ambil dari name yang ada di form input array kosong
        // todo attach digunakan jika mau isi table manyToMany
        $student->extracurriculars()->attach($request->extracurricular);
        Alert::success('Success', 'Success add student');

        // return redirect('/students');
        // todo one line flash message
        return redirect('/students')->with('message', 'Add data student has been success');
    }
    public function edit(Request $request, $slug)
    {
        $eskul = Extracurricular::all();
        // $student = Student::with('class')->findOrFail($id);
        $student = Student::with('class')->where('slug', $slug)->first();

        // $class = ClassModel::get(['id', 'name']);
        // todo ambil field id, name dan cariin id yang bukan id dari student
        // * buat akalin biar ga ada duplicate name di selection box ID CLASS
        $class = ClassModel::where('id', '!=', $student->class_id)->get(['id', 'name']);
        return view('student.update', [
            'title' => 'Students',
            'student' => $student,
            'class' => $class,
            'eskul' => $eskul
        ]);
    }

    public function update(Request $request, $slug)
    {
        // $student = Student::findOrFail($id);
        $student = Student::where('slug', $slug)->first();

        $validate = [
            // 'nim' => 'required|unique:students|max_digits:15|numeric',
            'name' => 'required',
            // 'email' => 'required|email',
            // 'email' => 'required|email:dns|unique:students',
            'gender' => 'required',
            'class_id' => 'required',
            'image' => 'image|file|max:1024'
        ];
        if ($request->nim != $student->nim) {
            $validate['nim'] = 'required|unique:students|max_digits:15|numeric';
        }
        if ($request->email != $student->email) {
            $validate['email'] = 'required|email:dns|unique:students';
        }
        
        $validateData = $request->validate($validate);
        
        // todo jika image kosong atau gak di isi, ini bakal di skip
        if ($request->file('image')) {
            // * jika gambar lama nya ada ketika yang awalnya kosong di upload gambar baru, jika gambar lama nya ada maka dihapus
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('student-images');
        }

        // todo update cara 1
        // $student->class_id = $request->class_id;
        // $student->name = $request->name;
        // $student->nim = $request->nim;
        // $student->gender = $request->gender;
        // $student->save();

        $student->extracurriculars()->sync($request->extracurricular);

        // todo update use mass assigment
        $student->update($validateData);
        // return redirect('/students');
        return redirect('/students')->with('message', 'Updated data student has been success');
    }

    // public function delete($id)
    // {

    //     $student = Student::findOrFail($id);

    //     return view('student.delete', [
    //         'title' => 'Students',
    //         'student' => $student
    //     ]);
    // }

    public function destroy($slug)
    {
        // todo penggunaan delete dengan query builder
        // $studentDestory = DB::table('students')->where('id', $id)->delete();
        // todo penggunaan delete dengan eloquent ORM
        // * delete gambar nya
        // $studentDeleted = Student::findOrFail($id);

        // todo kalau pake slug gini
        $studentDeleted = Student::where('slug', $slug)->first();

        // if ($studentDeleted->image) {
        //     Storage::delete($studentDeleted->image);
        // }
        // example:

        $studentDeleted->delete();
        return redirect('/students')->with('message', 'Data has been deleted!');
    }

    // * jika menggunakan softDelete, maka method destroy tidak akan menjadi delete secara permanent
    public function softDelete()
    {
        $softDelete = Student::with('class')->onlyTrashed()->get();
        // $current = Carbon::now();
        // $current = Carbon::now();
        // $timer = Student::onlyTrashed()->where('deleted_at', '>', Carbon::addSeconds(15))->forceDelete();
        return view('student.trash', [
            'title' => 'Students',
            'softDelete' => $softDelete
        ]);
    }
    public function restore($slug)
    {
        $restore = Student::withTrashed()->where('slug', $slug)->restore();
        return redirect('/students')->with('message', 'Data has been restore!');
    }
    public function forceDelete($slug)
    {
        // todo buat delete gambar biar ga menuhin
        // $student = Student::with('class')->onlyTrashed()->findOrFail($id);
        $student = Student::with('class')->onlyTrashed()->where('slug', $slug)->first();
        if ($student->image) {
            Storage::delete($student->image);
        }
        // dd($student->image);
        Alert::success('Success', 'Success delete permanent');
        // Student::onlyTrashed()->find($id)->forceDelete();
        Student::onlyTrashed()->where('slug', $slug)->forceDelete();
        return redirect('/trash')->with('message', 'Data has been delete permanent!');
    }

    public function createPDF()
    {
        $student = Student::with('class')->get();
        $data = ['student' => $student];
        // $dompdf = new Dompdf();
        $pdf = Pdf::loadView('student.exportPDF', $data);

        return $pdf->download('data-student.pdf');
    }
    public function export()
    {
        return Excel::download(new StudentExport, 'student.xlsx');
    }
    public function import(Request $request)
    {
        // if (new StudentImport) {
        // Excel::import(new StudentImport, request()->file('file'));
        // } else {
        // return back()->with('message', 'Import Data Not Found');
        // }
        // dd($request->file);

        if ($request->file) {
            $import = Excel::import(new StudentImport, request()->file('file'));
            // if ($import->failures()) {
            //     return back()->withFailures($import->failures());
            // }
            return back()->with('message', 'Import Data Success');
        } else {
            return back()->with('warning', 'Import Data Not Found');
        }

        // Excel::import(new StudentImport, request()->file('file'));
        // return back()->with('message', 'Import Data Success');
    }

    // public function updateSlugAll()
    // {
    // ? update semua slug yang datanya masih null
    // $student = Student::whereNull('slug')->get();
    // ? upadate semua slug yang null di db secara otomatis
    // $student = Student::all();
    // collect($student)->map(function ($item) {
    //     $item->slug = Str::slug($item->name, '_');
    //     $item->save();
    // });
    // echo "OKE";
    // }
    // todo STUDENT MAIL
    public function studentMail($slug)
    {
        $student = Student::with('class.homeroomTeacher', 'extracurriculars')->where('slug', $slug)->first();
        return view('student.sendMail', [
            'student' => $student,
            'title' => 'Students',
            // 'name' => 'Gilang Fauzi',
        ]);
    }
    // TODO SEND MAIL
    public function sendMail(Request $request, $slug)
    {
        $student = Student::where('slug', $slug)->first();

        $request->validate([
            'subject' => 'required',
            // 'sender_name' => 'gilangfauzi648@gmail.com',
            'message' => 'max:1200'
        ]);

        $data_email = [
            'subject' =>  $request->subject,
            'message' => $request->message,
            'senderName' => $request->senderName,
            // 'senderNamer' => 'no-reply@gmail.com'
        ];

        // dd($data_email);

        Mail::to($request->email)->send(new sendMail($data_email));
        return redirect('/students')->with('message', 'Send mail has been success');
    }
    // todo Student Mail All
    public function studentMailAll()
    {
        // $student = Student::select('email')->get();
        return view('student/sendMailAll', [
            'title' => 'Students',
            // 'student' => $student
        ]);
    }
    // TODO SEND MAIL
    public function sendMailAll(Request $request)
    {
        $student = Student::select('email')->get();
        $pluck = collect($student)->pluck('email')->all();
        $request->validate([
            'subject' => 'required',
            // 'sender_name' => 'gilangfauzi648@gmail.com',
            'message' => 'max:1200',
            'confirmation' => 'required'
        ]);

        $data_email = [
            'subject' =>  $request->subject,
            'message' => $request->message,
            'senderName' => $request->senderName,
            // 'senderNamer' => 'no-reply@gmail.com'
        ];

        // dd($data_email);

        foreach ($pluck as $email) {
            Mail::to($email)->send(new sendMail($data_email));
        }

        return redirect('/students')->with('message', 'Send mail has been success');
    }
}