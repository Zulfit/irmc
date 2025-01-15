@extends('layouts.layout')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Academicians</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Academicians</a></li>
          <li class="breadcrumb-item active">Academicians List</li>
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
                        @foreach ($academicians as $academician)        
                        <tr>
                            <td>{{$academician->user->name}}</td>
                            <td>{{$academician->staff_number}}</td>
                            <td>{{$academician->user->email}}</td>
                            <td>{{$academician->college}}</td>
                            <td>{{$academician->department}}</td>
                            <td>{{$academician->position}}</td>
                        </tr>       
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
