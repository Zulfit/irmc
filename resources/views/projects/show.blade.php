@extends('layouts.layout')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Project Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Project</li>
                <li class="breadcrumb-item active">Project Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Project Details</h5>
                            <!-- Button aligned to the right -->
                            <a href="{{ route('milestones.create', $project->id) }}" class="btn btn-success">
                                Create Milestone
                            </a>
                        </div>

                        <!-- Read-Only View -->
                        <form>
                            @csrf

                            <!-- Project Leader -->
                            <div class="row mb-3">
                                <label for="leader_id" class="col-sm-2 col-form-label">Project Leader</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="background-color: #f0f0f0;" value="{{ $project->leader->user->name }}" readonly>
                                </div>
                            </div>

                            <!-- Project Title -->
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Project Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="background-color: #f0f0f0;" value="{{ $project->title }}" readonly>
                                </div>
                            </div>

                            <!-- Grant Provider -->
                            <div class="row mb-3">
                                <label for="grantProvider" class="col-sm-2 col-form-label">Grant Provider</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="background-color: #f0f0f0;" value="{{ $project->grantProvider }}" readonly>
                                </div>
                            </div>

                            <!-- Grant Amount -->
                            <div class="row mb-3">
                                <label for="grantAmount" class="col-sm-2 col-form-label">Grant Amount</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="background-color: #f0f0f0;" value="RM {{ $project->grantAmount }}" readonly>
                                </div>
                            </div>

                            <!-- Start Date -->
                            <div class="row mb-3">
                                <label for="startDate" class="col-sm-2 col-form-label">Start Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" style="background-color: #f0f0f0;" value="{{ $project->startDate }}" readonly>
                                </div>
                            </div>

                            <!-- Duration -->
                            <div class="row mb-3">
                                <label for="duration" class="col-sm-2 col-form-label">Duration (in months)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="background-color: #f0f0f0;" value="{{ $project->duration }}" readonly>
                                </div>
                            </div>

                            <!-- Project Members -->
                            <div class="row mb-3">
                                <label for="members" class="col-sm-2 col-form-label">Project Members</label>
                                <div class="col-sm-10">
                                    <ul class="list-group">
                                        @foreach ($project->members as $member)
                                            <li class="list-group-item" style="background-color: #f0f0f0;">{{ $member->user->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        </form><!-- End Read-Only Form -->

                        <div class="text-center">
                            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back to List</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

@endsection
