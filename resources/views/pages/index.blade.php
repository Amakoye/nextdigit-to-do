@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 jumbotron mx-auto text-center">
                <h1>nextdigit.co.ke Laravel Assignment</h1>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum porro
                    dolorem magni asperiores at voluptate!
                </p>
                <p>To test different user roles use the following credentials:</p>
                    <table class="table table-bordered">
                        <tr>
                            <th>Role</th>
                            <th>Operations</th>
                            <th>Email</th>
                            <th>Password</th>
                        </tr>
                        <tr>
                            <td>superadmin</td>
                            <td>All CRUD</td>
                            <td>admin@info.com</td>
                            <td>admin@123</td>
                        </tr>
                        <tr>
                            <td>user1</td>
                            <td>Create/Read</td>
                            <td>user1@info.com</td>
                            <td>user1@123</td>
                        </tr>
                        <tr>
                            <td>user1</td>
                            <td>Create/Read/Update</td>
                            <td>user2@info.com</td>
                            <td>user2@123</td>
                        </tr>
                    </table>
                    <a href="/login" class="btn btn-success">Get Started</a>
            </div>
        </div>
    </div>
@endsection
