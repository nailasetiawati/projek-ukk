@extends('app.main')

@section('contents')

    <div class="row">
        <div class="col-8">
            <div class="p-4">
                <div class="card">
                    <div class="row">
                        @foreach ($kategoris as $kategori)    
                        <div class="col-2 py-2">
                            <a href="/home/{{ $kategori->id }}" class="my-auto ml-2 text-dark">{{ $kategori->name }}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="row mt-2">
                    @foreach ($products as $product)    
                    <div class="col-2 mx-auto mt-3">
                    <div class="card" style="width: 9rem;" onclick="addProduct({{ $product->id }})">
                        <img src="/img/item-image/{{ $product->image }}" class="card-img-top" width="100px" height="120px">
                        <p class="text-bold ml-2 my-2">{{ $product->name }}</p>
                        <h6 class="ml-2">Rp. {{ number_format($product->price,2,',','.') }}</h6>
                      </div>
                </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="p-4">
                <div class="card" id="listOrder">
                    <img class="mx-auto" src="https://www.zarla.com/images/zarla-n-1x1-2400x2400-20220729-94gbt9wpqyv394dmkdrb.png?crop=1:1,smart&width=250&dpr=2" height="250px" width="250px">
                    <h5 class="text-center mb-3 text-danger">Toko Nail's</h5>
                    <h5 class="card-title p-2 ml-3 my-auto">Daftar Pesanan</h5>
                    <hr>
                    <div class="card-body">
                        <div id="orderData"></div>
                        <div class="row">
                            <div class="col-7">
                                <h5 class="mt-5">Total</h5>
                            </div>
                            <div class="col-5">
                                <h5 class="text-primary mt-5" id="totalPrice">Rp.0</h5>
                                <input type="hidden" value="0" id="oldPrice">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-4">
                        <button class="btn btn-outline-primary col-12" id="pay" onclick="printDiv('listOrder')" disabled>Bayar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script>
        function addProduct(id)
        {
            $.ajaxSetup({
                            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') }
                        });
            $.ajax({
                    type: 'post',
                    url: "/home/getproduct",
                    data: {product_id:id},
                    cache: false,

                    success: function(msg){
                        const rupiah = (number)=>{
                            return new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR"
                            }).format(number);
                        }
                        var price = rupiah(msg.price)
                        console.log(msg);
                        $('#orderData').append(`<div class="row">
                            <div class="col-8">
                                <h6 class="name mt-1">${msg.name}</h6>
                            </div>
                            <div class="col-4">
                                <h6 class="text-primary mt-1">${price}</h6>
                            </div>
                        </div>
                        <hr>`);

                        var oldPrice = $('#oldPrice').val();
                        var price1 = Number(oldPrice)
                        var price2 = Number(msg.price)
                        $('#oldPrice').val(msg.price)
                        var newPrice = price1 + price2
                        console.log(newPrice);
                        var totalPrice = rupiah(newPrice)
                        $('#totalPrice').empty()
                        $('#totalPrice').append(totalPrice)
                        $('#oldPrice').val(newPrice)
                        $('#pay').prop('disabled', false)
                    },
                    error: function(data){
                        console.log('error:',data)
                    },
                })
        }

        function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;

		}
    </script>
@endsection