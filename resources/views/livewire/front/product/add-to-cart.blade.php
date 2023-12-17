<div>
    <div class="add-cart-box">
        <div class="product-seller-row">
            <span>فروشنده :</span>
            <span>گرافیک شاپ</span>
        </div>
        <div class="product-seller-row">
            <span>قیمت :</span>
            <span class="text-danger" wire:click="addToCart({{ $product->id }})" >{{ priceFormat($product->price) }} تومان </span>
        </div>
        <button type="button" class="btn add-cart-btn">افزودن به سبد خرید</button>
    </div>
</div>
