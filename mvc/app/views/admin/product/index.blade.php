@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <table class="table table-stripped">
            <thead>
                <th>STT</th>
                <th>Tên Sản phẩm</th>
                <th>Ảnh</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>
                    <a href="{{BASE_URL . 'admin/product/add'}}" class="btn btn-primary">Thêm mới</a>
                </th>
            </thead>
            <tbody>
                @foreach ($products as $p)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$p->name}}</td>
                        <td></td>
                        <td>{{$p->category->name}}</td>
                        <td>
                            @if($p->sale_price > 0)
                            <del>${{$p->price}}</del> <b>${{$p->sale_price}}</b>
                            @else
                            ${{$p->price}}
                            @endif
                        </td>
                        <td>{{$p->quantity}}</td>
                        <td>
                            <a href="{{BASE_URL . 'admin/product/edit?id=' . $p->id}}" class="btn btn-info">Sửa</a>
                            <a href="{{BASE_URL . 'admin/product/remove?id=' . $p->id}}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection