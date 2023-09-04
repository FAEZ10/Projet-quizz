@extends('userlayout.master')

@section('title')
USERS
@endsection

@section('content')
<!--container start-->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="table-responsive">
                    <table class="table table-striped title1">
                        <tr>
                            <td><b>S.N.</b></td>
                            <td><b>Name</b></td>
                            <td><b>Email</b></td>
                            <td><b>Role</b></td>
                            <td><b>Actions</b></td>
                            <td></td>
                        </tr>
                        @foreach($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->getRoleNames()->first() }}</td>
                            <td>
                                <form action="{{ route('admin.changeUserRole', $user->id) }}" method="POST">
                                    @csrf
                                    <select name="role" onchange="this.form.submit()">
                                        <option value="user" {{ $user->hasRole('user') ? 'selected' : '' }}>User
                                        </option>
                                        <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>Admin
                                        </option>
                                    </select>
                                </form>
                            </td>
                            <td><a title="Delete User" href="{{ route('admin.deleteUser', $user->id) }}"
                                    class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"
                                        aria-hidden="true"></span></a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection