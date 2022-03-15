@extends('layout.main-layout')

@section('title', 'Rubric')


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
                    Rubrics
                </div>
                <div class="users__inner">
                    @include('layout.adminMenu')
                    <div class="users__main">
                        <table class="table admin__category">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Topics</th>
                                    <th scope="col">ShowTopic</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td>
                                    <form method="post" class="admin_category-form" action="{{ route('admin.rubrics.store') }}">
                                        @csrf
                                        <input title="Enter rubric" placeholder="Gun" type="text" class="admin_category-input" name="title" autofocus>
                                        <input title="Create rubric" type="submit" value="" class="admin-submit_btn create-category">
                                    </form>
                                </td>

                            </tr>
                               @foreach($rubrics as $rubric)
                                   <tr>
                                       <th title="Category Id" scope="row">{{ $rubric->id }}</th>
                                       <td>
                                           <form method="post" class="admin_category-form" action="{{ route('admin.rubrics.update', $rubric->id) }}">
                                               @csrf
                                               <input title="Enter rubric" type="text" class="admin_category-input" name="title" autofocus value="{{ $rubric->title }}">
                                               <input title="Update rubric" type="submit" value="" class="admin-submit_btn update-category">
                                           </form>
                                       </td>
                                       <td title="Use Category Counter">{{ $rubric->topic_counter }}</td>
                                       <td>
                                           <a href="{{ route('forum.rubric.show', $rubric->id) }}" title="Show Rubric Topic" class="link">
                                               <img src="https://img.icons8.com/office/20/000000/show-password.png"/>
                                           </a>
                                       </td>
                                       <td>
                                           @if($rubric->deleted_at == null)
                                               <a href="{{ route('admin.rubrics.delete', $rubric->id) }}" title="Delete Rubric" class="admin-delete">
                                                   <img src="https://img.icons8.com/external-kiranshastry-lineal-color-kiranshastry/20/000000/external-delete-multimedia-kiranshastry-lineal-color-kiranshastry.png"/>
                                               </a>
                                           @else
                                               <a href="{{ route('admin.rubrics.restore', $rubric->id) }}" title="Restore Rubric" class="admin-delete">
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
            {{ $rubrics->links() }}
        </div>
    </section>
@endsection
