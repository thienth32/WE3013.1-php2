<h2>Trang chủ</h2>
<p>Dữ liệu: {{$data}}</p>
<p>Dữ liệu: {!! $data !!}</p>
<p>
    {{-- Giới tính: @if($gender == 1) 
                    Nam 
                @elseif($gender == 2) 
                    Nữ 
                @else 
                    Khác 
                @endif --}}
    Giới tính: {{ $gender == 1 ? "Nam" : "Nữ" }}
</p>