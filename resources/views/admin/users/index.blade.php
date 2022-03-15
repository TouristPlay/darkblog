@extends('layout.main-layout')

@section('title', 'Users')


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
                    Users
                </div>
                <div class="users__inner">
                    @include('layout.adminMenu')
                    <div class="users__main">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Nickname</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($users as $user)
                                   <tr>
                                       <th title="User ID" scope="row">{{ $user->id }}</th>
                                       <td title="User name">{{ $user->name }} {{ $user->lastname }}</td>
                                       <td title="User nickname">
                                           <a  class="user__nickname link" href="{{ route('profile.index', $user->nickname) }}">
                                               {{ '@'. $user->nickname }}
                                           </a>
                                       </td>
                                       <td title="User email">{{ $user->email }}</td>
                                       <td title="Change user role">
                                           <form action="{{ route('admin.users.update', $user->id) }}" method="post" class="users__form">
                                               @csrf
                                               <select name="role" class="role">
                                                   <option value="admin" @if($user->role === 'admin') selected @endif>Admin</option>
                                                   <option value="user" @if($user->role === 'user') selected @endif>User</option>
                                               </select>
                                               <input type="submit" title="Update role" class="admin-submit_btn role-change" value="">
                                           </form>
                                       </td>
                                   </tr>
                               @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $users->links() }}
        </div>
    </section>
@endsection
