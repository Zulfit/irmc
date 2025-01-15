@extends('layouts.layout')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Create Milestone</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Create Milestone</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create Milestone for Project: {{ $project->title }}</h5>

                        <form action="{{ route('milestones.store', $project->id) }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Milestone Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="target_complete_date" class="col-sm-2 col-form-label">Target Complete Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="target_complete_date" id="target_complete_date" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="deliverable" class="col-sm-2 col-form-label">Deliverable</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="deliverable" id="deliverable" required>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('projects.show', $project->id) }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form><!-- End Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
