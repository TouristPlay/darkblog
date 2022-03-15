@extends('layout.main-layout')

@section('title', 'Posts')


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
                    Posts
                </div>
                <div class="users__inner">
                    @include('layout.adminMenu')
                    <div class="users__main">
                        <table class="table admin__posts">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Nickname</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Favorite</th>
                                    <th scope="col">Published</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($posts as $post)
                                   <tr>
                                       <th title="Post ID" scope="row">{{ $post->id }}</th>
                                       <td title="Post title">
                                           <a href="{{ route('blog.posts.show', $post->id) }}" class="link">
                                               {{ $post->title }}
                                           </a>
                                       </td>
                                       <td title="User nickname">
                                           <a href="{{ route('profile.index', \App\Models\User::find($post->user_id)->nickname) }}" class="link">
                                               {{ \App\Models\User::find($post->user_id)->nickname }}
                                           </a>
                                       </td>
                                       <td title="Post Category title">
                                           <a  href="{{ route('blog.category.show', $post->category_id) }}" class="link">
                                               {{ \App\Models\Blog\Category::withTrashed()->find($post->category_id)->title }}
                                           </a>
                                       </td>
                                       <td title="Favorite Counter">{{ $post->favorite }}</td>
                                       <td title="Post Status">
                                           @if($post->deleted_at == null)
                                               @if($post->published == 1)
                                                   Published
                                               @else
                                                   Unpublished
                                               @endif
                                           @else
                                                Deleted
                                           @endif
                                       </td>
                                       <td>
                                           @if($post->deleted_at == null)
                                               <a href="{{ route('admin.posts.delete', $post->id) }}" title="Delete Post" class="admin-delete">
                                                   <img src="https://img.icons8.com/external-kiranshastry-lineal-color-kiranshastry/20/000000/external-delete-multimedia-kiranshastry-lineal-color-kiranshastry.png"/>
                                               </a>
                                           @else
                                               <a href="{{ route('admin.posts.restore', $post->id) }}" title="Restore Post" class="admin-delete">
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
            {{ $posts->links() }}
        </div>
    </section>
@endsection
