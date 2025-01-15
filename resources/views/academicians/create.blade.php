@extends('layouts.layout')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>New Academician</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Academician</li>
          <li class="breadcrumb-item active">Academician Form</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-16">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Academician Form</h5>

                    <!-- Horizontal Form -->
                    <form action="{{ route('academicians.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        </div>
                        <div class="row mb-3">
                            <label for="staffNum" class="col-sm-2 col-form-label">Staff Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="staffNum" id="staffNum">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="college" class="col-sm-2 col-form-label">College</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="college" id="college">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="department" class="col-sm-2 col-form-label">Department</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="department" id="department">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="position" class="col-sm-2 col-form-label">Position</label>
                            <div class="col-sm-10">
                                <select name="position" id="position" class="form-control" required>
                                    <option value="">Select Position</option>
                                    <option value="Professor">Professor</option>
                                    <option value="Assoc Prof">Assoc Professor</option>
                                    <option value="Senior Lecturer">Senior Lecturer</option>
                                    <option value="Lecturer">Lecturer</option>
                                </select>
                            </div>
                        </div>
                        
                        
                        <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- End Horizontal Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection

