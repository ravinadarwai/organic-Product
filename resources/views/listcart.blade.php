@php
    $totalPrice = 0;
@endphp


@include('layouts.header')

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    *{
        font-size:15px;
    }
      .delete-btn , .option-btn{
        height: 36px;
    width: 104px;
    border-radius: 5px;
    background-color: #04A459;
    border: none;
    color: white;
      }
      .option-btn{
        height: 36px;
    width: 15rem;
    border-radius: 5px;
    background-color: #04A459;
    border: none;
    color: white;
      }
      .up_btn{
        background-color: #04A459;
        border-radius: 5px ;
        color:white;
        height:36px;
      }
      .table{
        border: 2px solid #dad0d0;
      }
      .checkout-btn{
   text-align: center;
   margin-top: 1rem;
   background-color: #04A459;
   width: 25%;
   height:36px;
   display:block;
   margin: auto;
   border-radius: 4px;
}

 .checkout-btn a{
   display: inline-block;
   width: 59%;
   text-decoration: none;
    font-size: 18px;
    color: white;
    padding:4px;
}

.checkout-btn a.disabled{
   pointer-events: none;
   opacity: .3;
   user-select: none;
   color:black;
   width: 100%;
   background-color: white;
}


.input-border {
        border: 1px solid #ccc;
        padding: 5px; 
        border-radius: 3px; 
        margin-right:10px;
   
    }

    </style>


</head>
<body>
    <div class="container">
        <table class="table table-bordered mt-4">
            <thead>
                <tr class="align-middle">
                    <th scope="col">Product ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Rate</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col"> Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody style="text-align:center;">
                @foreach ($products as $product)
                <tr>
                    <td class="align-middle">{{ $product->product_id }}</td>
                    <td scope="row" class="align-middle">{{ $product->name }}</td>
                    <td scope="row" class="align-middle">
                        <img src="{{ asset($product->image) }}" width="100px" height="100px" alt="Product Image">
                    </td>
                    <td scope="row" class="align-middle">{{ $product->rate }}</td>
                    <td class="align-middle">
                    <form action="{{ route('cart.update', $product->id) }}" method="post" class="d-flex align-items-center">
    @csrf
    @method('PUT')
    <input type="hidden" name="update_id" value="{{ $product->id }}">
    <input type="number" id="quantity" name="quantity" min="1" max="30" value="{{ $product->quantity }}"  class="mr-2 input-border">
    <input type="submit" value="Update" name="update_btn" class="up_btn">
</form>

                    </td>
                    <td class="align-middle">{{ $product->rate * $product->quantity }}</td>
                    <td class="align-middle">
                    <a href="{{ route('cart.destroy', $product->id) }}" onclick="return confirm('Are you sure you want to remove this item from the cart?');">
    <button class="delete-btn"><i class="fas fa-trash"></i> Remove</button>
</a>
                    </td>
                </tr>
                @php
            $totalPrice += ($product->rate * $product->quantity);
        @endphp
                @endforeach


                 
                <tr  class="bg-light">
        <td>
          <a href="{{route('showAll')}}"  style="margin-top :0px;"><button class="option-btn">continue shopping</button></a>
        </td>
        
        <td colspan="4" style="font-size: 19px;
    font-weight: 500;">
            Total price
        </td>
        <td colspan="1">
        {{ $totalPrice }}

        @php
    session(['totalPrice' => $totalPrice]);
@endphp


        </td>
        <td colspan="3">
        <form method="post" action="{{ route('cart.deleteAll') }}">
    @csrf
    @method('POST') <!-- Add this line to override the POST method -->
    <button class="delete-btn" type="submit"><i class="fas fa-trash"></i> Delete All</button>
</form>


</td>       </tr>
                
            </tbody>
        </table>
        <div class="checkout-btn">
        <button onclick="window.location.href='{{ route('placeorder') }}'"  {{ $totalPrice > 1 ? '' : 'disabled' }} style="color:white; margin: auto;font-size: 17px; padding-top: 6px;">Proceed to Checkout</button>
       </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>