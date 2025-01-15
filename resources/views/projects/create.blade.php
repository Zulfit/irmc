@extends('layouts.layout')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>New Project</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Project</li>
          <li class="breadcrumb-item active">Project Form</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-16">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Project Form</h5>

                    <!-- Horizontal Form -->
                    <form action="{{ route('projects.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                        <label for="leader_id" class="col-sm-2 col-form-label">Project Leader</label>
                        <div class="col-sm-10">
                            <select name="leader_id" id="leader_id" class="form-control" required>
                                <option value="">Select Leader</option>
                                @foreach ($academicians as $academician)
                                    <option value="{{ $academician->id }}">{{ $academician->user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Project Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="grantProvider" class="col-sm-2 col-form-label">Grant Provider</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="grantProvider" id="grantProvider">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="grantAmount" class="col-sm-2 col-form-label">Grant Amount</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="grantAmount" id="grantAmount">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="startDate" class="col-sm-2 col-form-label">Start Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="startDate" id="startDate">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="duration" class="col-sm-2 col-form-label">Duration (in month)</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="duration" id="duration">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="members" class="col-sm-2 col-form-label">Project Members</label>
                            <div class="col-sm-10">
                                @foreach ($academicians as $academician)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="members[]" value="{{ $academician->id }}" id="member{{ $academician->id }}">
                                        <label class="form-check-label" for="member{{ $academician->id }}">
                                            {{ $academician->user->name }}
                                        </label>
                                    </div>
                                @endforeach
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

