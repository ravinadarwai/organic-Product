@include('layouts.header')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        *{
            font-size:20px;
        }
        .product-container {
            display: flex;
            align-items: center;
            margin-left: 10rem;
          
            padding: 20px;

    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: space-evenly;
        }

        .product-image {
            max-width: 300px;
        }

        .product-description {
            max-width: 400px;
            margin-left: 10rem;
        }

        .btn-container {
            display: flex;
            gap: 19px;
            margin-left: 30px;

            margin-top: 7rem;
        }
        .price-container {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }

        .price-label {
            font-size: 18px;
            font-weight: bold;
        }

        .product-price {
            font-size: 24px;
            color: #04A459;
        }
       .btn{
        width: 16rem;
    height: 3rem;
    padding-bottom: 32px;
    font-size: 16px;
       }
    </style>
</head>
<body style="background-color:#e6dbdb1a">
<div class="container" style="margin-top: 10rem;">
    <div class="product-container con">
        <!-- Left column with product image and buttons -->
        <div class="product-image">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="img-fluid">
            <div class="btn-container">
                <button class="btn btn-primary">Add to Cart</button>
                <button class="btn btn-success">Buy Now</button>
            </div>
        </div>

        <!-- Right column with product description and size options -->
        <div class="product-description">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <div class="price-container">
                <span class="price-label">Price:</span>
                <span class="product-price">${{ $product->sprice }}</span>
            </div>
            <div class="price-container">
                <span class="price-label">Quantity:</span>
                <span class="product-price">{{ $product->quant }}</span>
            </div>
            <!-- You can customize the view further based on the productType -->
            @if ($productType === 'vegetable')
                <!-- Display vegetable-specific content -->
            @elseif ($productType === 'fish')
                <!-- Display fish-specific content -->
            @endif
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>