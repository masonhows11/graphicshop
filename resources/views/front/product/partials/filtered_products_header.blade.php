<div class="col-12 mb-2"><!-- start sort nav -->
    <ul class="nav nav-pills sort-by">
        <span class="font-13 mt-2 me-2"> مرتب سازی بر اساس :</span>
        <li class="nav-item">
            <a href="{{ route('search.products',['search' => request()->search ,'sort' => '1' , 'min_price' => request()->min_price , 'max_price' => request()->max_price ,'brands' => request()->brands ]) }}" class="nav-link font-13 {{ request()->sort == 1 ? 'active' : 'text-dark' }} ">جدید ترین</a></li>
        <li class="nav-item">
            <a href="{{ route('search.products',['search' => request()->search ,'sort' => '2' , 'min_price' => request()->min_price , 'max_price' => request()->max_price ,'brands' => request()->brands ]) }}" class="nav-link font-13 {{ request()->sort == 2 ? 'active' : 'text-dark' }}">ارزان ترین</a></li>
        <li class="nav-item">
            <a href="{{ route('search.products',['search' => request()->search ,'sort' => '3' , 'min_price' => request()->min_price , 'max_price' => request()->max_price ,'brands' => request()->brands ]) }}" class="nav-link font-13 {{ request()->sort == 3 ? 'active' : 'text-dark' }}">گران ترین</a></li>
        <li class="nav-item">
            <a href="{{ route('search.products',['search' => request()->search ,'sort' => '4' , 'min_price' => request()->min_price , 'max_price' => request()->max_price  ,'brands' => request()->brands ]) }}" class="nav-link font-13 {{ request()->sort == 4 ? 'active' : 'text-dark' }}">پر بازدیدترین</a></li>
        <li class="nav-item">
            <a href="{{ route('search.products',['search' => request()->search ,'sort' => '5' , 'min_price' => request()->min_price , 'max_price' => request()->max_price  ,'brands' => request()->brands ]) }}" class="nav-link font-13 {{ request()->sort == 5 ? 'active' : 'text-dark' }}">پر فروش ترین </a></li>
    </ul>
</div>
