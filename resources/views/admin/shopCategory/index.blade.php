@extends('layout.main-layout')

@section('title', 'ShopCategory')


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
                    Shop Category
                </div>
                <div class="users__inner">
                    @include('layout.adminMenu')
                    <div class="users__main">
                        <table class="table admin__category">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">ShowProduct</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td>
                                    <form method="post" class="admin_category-form" action="{{ route('admin.shop-category.store') }}">
                                        @csrf
                                        <input title="Enter Category" placeholder="Gun" type="text" class="admin_category-input" name="title" autofocus>
                                        <input title="Create Category" type="submit" value="" class="admin-submit_btn create-category">
                                    </form>
                                </td>

                            </tr>
                               @foreach($categories as $category)
                                   <tr>
                                       <th title="Category Id" scope="row">{{ $category->id }}</th>
                                       <td>
                                           <form method="post" class="admin_category-form" action="{{ route('admin.shop-category.update', $category->id) }}">
                                               @csrf
                                               <input title="Enter Category" type="text" class="admin_category-input" name="title" autofocus value="{{ $category->title }}">
                                               <input title="Update Category" type="submit" value="" class="admin-submit_btn update-category">
                                           </form>
                                       </td>
                                       <td title="Product Category Counter">{{ $category->product_counter }}</td>
                                       <td>
                                           <a href="{{ route('shop.category.show', $category->id) }}" title="Show Category Post" class="link">
                                               <img src="https://img.icons8.com/office/20/000000/show-password.png"/>
                                           </a>
                                       </td>
                                       <td>
                                           @if($category->deleted_at == null)
                                               <a href="{{ route('admin.shop-category.delete', $category->id) }}" title="Delete Category" class="admin-delete">
                                                   <img src="https://img.icons8.com/external-kiranshastry-lineal-color-kiranshastry/20/000000/external-delete-multimedia-kiranshastry-lineal-color-kiranshastry.png"/>
                                               </a>
                                           @else
                                               <a href="{{ route('admin.shop-category.restore', $category->id) }}" title="Restore Category" class="admin-delete">
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
            {{ $categories->links() }}
        </div>
    </section>
@endsection
