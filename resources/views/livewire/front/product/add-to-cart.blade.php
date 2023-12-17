<div>
    <div class="add-cart-box">
        <div class="product-seller-row">
            <span>فروشنده :</span>
            <span>گرافیک شاپ</span>
        </div>
        <div class="product-seller-row">
            <span>قیمت :</span>
            <span class="text-danger"  >{{ priceFormat($product->price) }} تومان </span>
        </div>
        <button type="button" wire:click="addToCart({{ $product_id }})" class="btn add-cart-btn">افزودن به سبد خرید</button>
    </div>
</div>
