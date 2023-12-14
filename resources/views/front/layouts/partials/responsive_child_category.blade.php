@foreach( $category as $child )
        <li class="">
            <a class="font-12 child-category link-dark d-inline text-decoration-none"
               href="{{ route('search.category',['slug' => $child->title]) }}">{{ $child->title }}</a>
        </li>
        @if( $child->children != null  )
            @include('front.layouts.partials.child_category',['category' => $child->children])
        @endif
@endforeach

