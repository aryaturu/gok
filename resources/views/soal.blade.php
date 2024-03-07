@extends('master')
@section('konten')
<!DOCTYPE html>
<html>

<head>
    <title>Tugas</title>
</head>

<body>
    <br>
    <h2>Tugas</h2>
    <br>
    @if (session()->has('error'))
<div class="alert alert-danger position-absolute" role ="alert">
    {{ session('error')}}
</div>
@endif
    @if (Auth::user()->role == 'admin')
    <button class="btn btn-success" data-toggle="modal" data-target="#TambahSoal">Tambah Tugas</button>
    @endif
    <br>
    <br>


    <table class="table table-striped" style="background-color: #e6e6e6">
        <tr style="background-color: #00e1ff; color:rgb(0, 0, 0)">
            <th>No.Tugas</th>
            <th>Judul Materi</th>
            <th>Deskripsi Tugas</th>
            <th>Batas Waktu</th>
            <th>Keterangan</th>
        </tr>

        @foreach ($soal as $s)

        <tr>
            <td>{{ $s->idsoal }}</td>
            <td>{{ $s->judulmateri }}</td>
            <td>{{ $s->deskripsisoal }}</td>
            <td>{{ $s->bataswaktu }}</td>
            <td>
                @if (Auth::user()->role == 'admin')
                <button class="btn btn-success" data-toggle="modal" data-target="#EditSoal{{ $s->idsoal }}">
                    <i class="fas fa-pen"></i> Edit</button> |
                <button class="btn btn-danger" data-toggle="modal" data-target="#DelSoal{{ $s->idsoal }}">
                    <i class="far fa-trash-alt"></i> Delete
                </button>
                @endif

                @if (Auth::user()->role == 'siswa')
                @if ($s->bataswaktu >= date('Y-m-d'))
                    @if ($s->isAnswered > 0)
                        <button class="btn btn-success">selesai</button>
                    @else
                    <button class="btn btn-info" data-toggle="modal"
                    data-target="#WorkSoal{{ $s->idsoal }}">Kerjakan</button>
                    @endif
                @else
                    <span class="badge text-bg-primary text-wrap" style="width: 10rem;">Waktu habis</span>
                @endif

            @endif
            </td>
        </tr>
        <div class="modal fade" id="EditSoal{{ $s->idsoal }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header rounded" style="background-color: #ff0000; color: white;">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            <i class="fas fa-edit"></i> Update Tugas
                        </h1>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/soal/storeupdate" method="post" class="form-floating">

                            @csrf
                            <input type="hidden" name="idsoal" id="kode" readonly class="form-control"
                                value="{{ $s->idsoal }}">
                            <div class="form-floating mb-3">
                                <label for="floatingInputValue">Judul Materi</label>
                                <input type="text" name="judulmateri" required="required" class="form-control"
                                    value="{{ $s->judulmateri }}">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="floatingInputValue">Deskripsi Tugas</label>
                                <textarea name="deskripsisoal" class="form-control"
                                    rows="5">{{ $s->deskripsisoal }}</textarea>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="floatingInputValue">Tenggat Waktu</label>
                                <input type="date" name="bataswaktu" required="required" class="form-control"
                                    value="{{ $s->bataswaktu }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">tutup</button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Updates
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade" id="WorkSoal{{ $s->idsoal }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #1eff00; color: white;">
                        <h1 class="modal-title fs-5">
                            <i class="fas fa-edit"></i> Kerjakan Tugas
                        </h1>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/nilai/storeinput" method="post" class="form-floating">
                            @csrf
                            <input type="hidden" name="idsoal" readonly class="form-control" value="{{ $s->idsoal }}">
                            <div class="mb-3">
                                <label for="judulMateri" class="form-label">Judul Materi:</label>
                                <p id="judulMateri">{{ $s->judulmateri }}</p>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsiTugas" class="form-label">Deskripsi Tugas:</label>
                                <p id="deskripsiTugas">{{ $s->deskripsisoal }}</p>
                            </div>
                            <div class="mb-3">
                                <label for="batasWaktu" class="form-label">Batas Waktu:</label>
                                <p id="batasWaktu">{{ $s->bataswaktu }}</p>
                            </div>
                            <div class="mb-3">
                                <label for="jawaban" class="form-label"><i class="fas fa-file"></i> Jawaban:</label>
                                <input type="input" name="jawabansoal" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    <i class="fas fa-times"></i> Close
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Simpan Jawaban
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="DelSoal{{ $s->idsoal }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #33BBC5; color: white;">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            <i class="fas fa-trash"></i> Hapus Tugas
                        </h1>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/soal/delete/{{ $s->idsoal }}" method="get" class="form-floating">
                            @csrf
                            <div>
                                <h3>Yakin mau menghapus data <b>{{ $s->judulmateri }}</b> ?</h3>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-check"></i> Yes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </table>
    <div class="modal fade" id="TambahSoal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #00eeff; color: white;">
                    <h1 class="modal-title fs-5">
                        <i class="fas fa-book"></i> Tambah Tugas
                    </h1>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/soal/storeinput" method="post" class="form-floating" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <label for="floatingInputValue">Judul Materi</label>
                            <input type="text" name="judulmateri" required="required" class="form-control">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInputValue">Deskripsi Tugas</label>
                            <textarea name="deskripsisoal" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInputValue">Tenggat Waktu</label>
                            <input type="date" name="bataswaktu" required="required" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-check"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
@endsection