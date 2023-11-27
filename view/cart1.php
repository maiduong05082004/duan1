@extends('client.layouts.client-layout')
@section('title', 'Giỏ hàng')
@section('main')
<div class="container">
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <td>Ảnh sản phẩm</td>
                <td>Tên sản phẩm</td>
                <td>Phân loại hàng</td>
                <td>Giá (VNĐ)</td>
                <td>Số lượng</td>
                <td>Đơn giá (VNĐ)</td>
                <td>Hành động</td>
            </tr>
            </tr>
        </thead>
        @if(isset($listProduct))
        <tbody>
            <?php $totalPrice = 0; ?>
            @foreach($listProduct as $key => $item )
            <tr>
                <!-- <pre>
                    <?php var_dump($_SESSION) ?>
                </pre> -->
                <td>{{ ++$key }}</td>
                <td style="max-width: 150px;"><img src="{{ './public/uploads/products/' . $item->products->image}}" alt="" style="width: 100px; height: 100px;"></td>
                <td style="max-width: 200px;" class="text-start">
                    <p class="short-3">{{ $item->products->name}}</p>
                </td>
                <td>
                    <span>{{ $item->size->name}}, {{ $item->color->name}}</span>
                </td>
                <td>
                    <p>{{ number_format($_SESSION['cart'][$item->id]['price'], 0, ',', '.') }}</p><span class="text-danger">{{ $item->discount !=0 ? '-' . $item->discount . '%' : ''}}</span>
                </td>
                <td>{{ $_SESSION['cart'][$item->id]['quantity'] }}</td>
                <td>
                    <span>{{ number_format(($_SESSION['cart'][$item->id]['price'] * $_SESSION['cart'][$item->id]['quantity']) - ($_SESSION['cart'][$item->id]['price'] * $item->discount / 100), 0, ',', '.') }}</span>
                    <?php $totalPrice += ($_SESSION['cart'][$item->id]['price'] * $_SESSION['cart'][$item->id]['quantity']) - ($_SESSION['cart'][$item->id]['price'] * $item->discount / 100) ?>
                </td>
                <td>
                    <form action="{{ BASE_URL . '/destroy-cart' }}">
                        <input type="number" value="{{ $item->id }}" name="id" hidden>
                        <button type="submit" class="btn btn-danger text-white border border-none p-2">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        @else
        <p class="text-danger">{{ $msg }}</p>
        @endif
    </table>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <p>Tổng tiền: <span class="text-danger">{{ isset($totalPrice) ? number_format($totalPrice, 0, ',', '.') . ' VNĐ' : '' }}</span></p>
        </div>
        <div class="d-flex">
            <form action="{{ BASE_URL . '/check-out' }}" method="POST">
                <input type="number" value="{{ $totalPrice }}" name="total-price" hidden>
                <button type="submit" class="btn btn-danger text-white border border-none px-3 me-2" {{ isset($msg) ? 'disabled' : '' }}>Mua hàng</button>
            </form>
        </div>
    </div>
</div>
<script>
</script>
@endsection