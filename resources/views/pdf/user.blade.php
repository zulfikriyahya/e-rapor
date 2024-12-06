<div>ID: {{ $record->id }}</div>
<div>Nama: {{ $record->name }}</div>
<div>Email: {{ $record->email }}</div>
<br>
{{-- <div>Logo: <img src="{{ url('/storage/')}}  {{ $record->avatar }}" alt=""></div> --}}
<div>Logo: <img width="100px" src="{{ 'storage/'.$record->avatar }}" alt="Gambar Avatar"></div>

