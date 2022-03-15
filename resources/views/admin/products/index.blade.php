@extends('layout.main-layout')

@section('title', 'Products')


@section('content')
    <section class="profile">
        <div class="container">
            <div class="profile__title">
                <a href="{{ route('admin.index') }}" class="admin-link">
                    Admin Panel
                </a>
            </div>
            <div class="profile__info">
                <div class="profile_info-title">
                    Products
                </div>
                <div class="users__inner">
                    @include('layout.adminMenu')
                    <div class="users__main">
                        <table class="table admin__Products">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Nickname</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Favorite</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($products as $product)
                                   <tr>
                                       <th title="Product ID" scope="row">{{ $product->id }}</th>
                                       <td title="Product title">
                                           <a href="{{ route('shop.product.show', $product->id) }}" class="link">
                                               {{ $product->title }}
                                           </a>
                                       </td>
                                       <td title="User nickname">
                                           <a href="{{ route('profile.index', \App\Models\User::find($product->user_id)->nickname) }}" class="link">
                                               {{ \App\Models\User::find($product->user_id)->nickname }}
                                           </a>
                                       </td>
                                       <td title="Product Category title">
                                           <a  href="{{ route('shop.category.show', $product->category_id) }}" class="link">
                                               {{ \App\Models\Shop\ProductCategory::withTrashed()->find($product->category_id)->title }}
                                           </a>
                                       </td>
                                       <td title="Favorite Counter">{{ $product->favorite_counter }}</td>
                                       <td title="Price">
                                           {{ $product->price }}
                                       </td>
                                       <td>
                                           @if($product->deleted_at == null)
                                               <a href="{{ route('admin.products.delete', $product->id) }}" title="Delete Product" class="admin-delete">
                                                   <img src="https://img.icons8.com/external-kiranshastry-lineal-color-kiranshastry/20/000000/external-delete-multimedia-kiranshastry-lineal-color-kiranshastry.png"/>
                                               </a>
                                           @else
                                               <a href="{{ route('admin.products.restore', $product->id) }}" title="Restore Product" class="admin-delete">
                                                   <img src="https://img.icons8.com/fluency/20/000000/settings-backup-restore.png"/>
                                               </a>
                                           @endif
                                       </td>
                                   </tr>
                               @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $products->links() }}
        </div>
    </section>
@endsection
