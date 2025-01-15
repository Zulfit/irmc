@extends('layouts.layout')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Staff</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Staff</a></li>
          <li class="breadcrumb-item active">Staff List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-16">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Staff Number</th>
                        <th scope="col">Email</th>
                        <th scope="col">College</th>
                        <th scope="col">Department</th>
                        <th scope="col">Position</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($staff as $staf)        
                        <tr>
                            <td>{{$staf->user->name}}</td>
                            <td>{{$staf->staff_number}}</td>
                            <td>{{$staf->user->email}}</td>
                            <td>{{$staf->college}}</td>
                            <td>{{$staf->department}}</td>
                            <td>{{$staf->position}}</td>
                        </tr>       
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
