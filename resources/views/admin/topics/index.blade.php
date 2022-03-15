@extends('layout.main-layout')

@section('title', 'Topics')


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
                    Topics
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
                                    <th scope="col">Rubric</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($topics as $topic)
                                   <tr>
                                       <th title="Post ID" scope="row">{{ $topic->id }}</th>
                                       <td title="Post title">
                                           <a href="{{ route('forum.topic.show', $topic->id) }}" class="link">
                                               {{ $topic->title }}
                                           </a>
                                       </td>
                                       <td title="User nickname">
                                           <a href="{{ route('profile.index', \App\Models\User::find($topic->user_id)->nickname) }}" class="link">
                                               {{ \App\Models\User::find($topic->user_id)->nickname }}
                                           </a>
                                       </td>
                                       <td title="Rubric title">
                                           <a  href="{{ route('forum.rubric.show', $topic->rubric_id) }}" class="link">
                                               {{ \App\Models\Forum\Rubric::withTrashed()->find($topic->rubric_id)->title }}
                                           </a>
                                       </td>
                                       <td title="Message Counter">{{ $topic->message_counter }}</td>
                                       <td title="Topic Status">
                                           @if($topic->status === 'open')
                                               <img title="This topic open" src="https://lun-eu.icons8.com/a/V8RdbZ-EZEqPJtQNGYecLA/xIl7OgcUOEmAMBKoLXA1cA/id%3DMR7Wh2bERF5j-format%3Dpng.png"/>
                                           @else
                                               <img title="This topic close" src="https://lun-eu.icons8.com/a/V8RdbZ-EZEqPJtQNGYecLA/GWeG4ndTHkWsHPo46BPVBA/id%3DeIN3yzdnX3bq-format%3Dpng.png"/>
                                           @endif
                                       </td>
                                       <td>
                                           @if($topic->deleted_at == null)
                                               <a href="{{ route('admin.topics.delete', $topic->id) }}" title="Delete Topic" class="admin-delete">
                                                   <img src="https://img.icons8.com/external-kiranshastry-lineal-color-kiranshastry/20/000000/external-delete-multimedia-kiranshastry-lineal-color-kiranshastry.png"/>
                                               </a>
                                           @else
                                               <a href="{{ route('admin.topics.restore', $topic->id) }}" title="Restore Topic" class="admin-delete">
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
            {{ $topics->links() }}
        </div>
    </section>
@endsection
