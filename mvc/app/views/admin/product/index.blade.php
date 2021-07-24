@extends('admin.layouts.main')
@section('content')
    <form action="" method="GET">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Từ khóa:</label>
                    <input type="text" name="keyword" class="form-control" value="{{$keyword}}">
                </div>
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </div>
    </form>
    <br>
    <div class="row">
        <table class="table table-stripped">
            <thead>
                <th>STT</th>
                <th>Tên Sản phẩm</th>
                <th>Ảnh</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Màu</th>
                <th>
                    <a href="{{BASE_URL . 'admin/product/add'}}" class="btn btn-primary">Thêm mới</a>
                </th>
            </thead>
            <tbody>
                @foreach ($products as $p)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$p->name}}</td>
                        <td>
                            <img src="{{PUBLIC_PATH . $p->galleries[0]->img_url}}" width="80">
                        </td>
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
                            <ul>
                                @foreach ($p->colors as $c)
                                    <li>{{$c->name}}: 
                                    @foreach ($p->pQuantites as $pq)
                                        @if ($c->id == $pq->color_id)
                                            {{$pq->amount}}
                                            @break
                                        @endif
                                    @endforeach
                                    </li>
                                @endforeach
                            </ul>
                        </td>
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