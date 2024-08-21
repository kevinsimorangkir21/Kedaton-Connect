@extends('layouts.user_type.auth')

@section('content')


<div class="tabel">
    <div class="tabelrec">
        <table id="data-tabel" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>BULAN</th>
                    <th>NAMA PELANGGAN</th>
                    <th>STO</th>
                    <th>KETERANGAN</th>
                    <th>MITRA</th>
                    <th>AREA</th>
                </tr>
            </thead>
        </table>
        <script src="{{ asset('js/tabel.js') }}"></script>           
    </div>
</div>
</div>
  </main>
  
  @endsection
