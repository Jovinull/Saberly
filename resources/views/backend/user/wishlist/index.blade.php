@extends('backend.user.master')

@section('content')
    <div class="row" id="wishlist-container">
        <!-- Wishlist items will be loaded here via Ajax -->
    </div><!-- end row -->

    @php
        $userId = auth()->id();

        $wishlistCount = $userId
            ? \App\Models\Wishlist::where('user_id', $userId)->count()
            : 0;
    @endphp

    @if ($wishlistCount)
        <div class="text-center py-3">
            <nav aria-label="Page navigation example" class="pagination-box">
                <ul class="pagination justify-content-center" id="pagination-box">
                    {{-- itens de paginação via JS --}}
                </ul>
            </nav>
        </div>
    @endif
@endsection
