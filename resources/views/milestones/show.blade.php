@extends('layouts.layout')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>View Milestone</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Milestone</li>
          <li class="breadcrumb-item active">Milestone View</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-16">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Milestone View</h5>

                        <!-- Display Milestone Data -->
                        <form>
                            <div class="row mb-3">
                                <label for="project_id" class="col-sm-2 col-form-label">Project Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="background-color: #f0f0f0;" id="project_id" value="{{ $milestone->project->title }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Milestone Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="background-color: #f0f0f0;" id="name" value="{{ $milestone->name }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="target_complete_date" class="col-sm-2 col-form-label">Target Complete Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" style="background-color: #f0f0f0;" id="target_complete_date" value="{{ $milestone->target_complete_date }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="deliverable" class="col-sm-2 col-form-label">Deliverable</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="background-color: #f0f0f0;" id="deliverable" value="{{ $milestone->deliverable }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="background-color: #f0f0f0;" id="status" value="{{ $milestone->status }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="remark" class="col-sm-2 col-form-label">Remark</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="background-color: #f0f0f0;" id="remark" value="{{ $milestone->remark }}" readonly>
                                </div>
                            </div>
                        </form><!-- End View Form -->

                        <div class="text-center">
                            <a href="{{ route('milestones.index') }}" class="btn btn-secondary">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection
