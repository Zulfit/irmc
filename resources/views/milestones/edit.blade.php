@extends('layouts.layout')

@section('content')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Milestone</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
                <li class="breadcrumb-item">Milestone</li>
                <li class="breadcrumb-item active">Edit Milestone</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Milestone Details</h5>

                        <!-- Milestone Form -->
                        <form action="{{ route('milestones.update', $milestone->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Milestone Name (Read-Only) -->
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Milestone Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="background-color: #f0f0f0;" value="{{ $milestone->name }}" readonly>
                                </div>
                            </div>

                            <!-- Target Completion Date (Read-Only) -->
                            <div class="row mb-3">
                                <label for="target_complete_date" class="col-sm-2 col-form-label">Target Complete Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" style="background-color: #f0f0f0;" value="{{ $milestone->target_complete_date }}" readonly>
                                </div>
                            </div>

                            <!-- Deliverable (Read-Only) -->
                            <div class="row mb-3">
                                <label for="deliverable" class="col-sm-2 col-form-label">Deliverable</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="background-color: #f0f0f0;" value="{{ $milestone->deliverable }}" readonly>
                                </div>
                            </div>

                            <!-- Status (Editable) -->
                            <div class="row mb-3">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" id="status" class="form-control">
                                        <option value="In Progress" {{ $milestone->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="Completed" {{ $milestone->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="Pending" {{ $milestone->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Remark (Editable) -->
                            <div class="row mb-3">
                                <label for="remark" class="col-sm-2 col-form-label">Remark</label>
                                <div class="col-sm-10">
                                    <textarea name="remark" id="remark" class="form-control" rows="3">{{ $milestone->remark }}</textarea>
                                </div>
                            </div>

                            <!-- Date Updated (Read-Only) -->
                            <div class="row mb-3">
                                <label for="date_updated" class="col-sm-2 col-form-label">Date Updated</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="background-color: #f0f0f0;" value="{{ $milestone->updated_at->format('d/m/Y H:i:s') }}" readonly>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('milestones.index', $milestone->project_id) }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form><!-- End Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
