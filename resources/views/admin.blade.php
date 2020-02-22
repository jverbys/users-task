@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5>User list</h5>

                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)

                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        {!! $user->role == 'admin' ?
                                        '<span class="badge badge-pill badge-primary">' . $user->role . '</span>' :
                                        $user->role !!}
                                    </td>
                                    <td>
                                        
                                        @if ($user->id != Auth::user()->id)

                                            <form action="{{ route('user.role.update', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')


                                                <button class="btn btn-info btn-sm">Change role</button>
                                            </form>

                                        @endif

                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
