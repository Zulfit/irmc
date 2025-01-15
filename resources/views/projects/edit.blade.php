@extends('layouts.layout')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Project</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Project</li>
          <li class="breadcrumb-item active">Edit Project</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-16">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Edit Project</h5>
                            <!-- Button aligned to the right -->
                            <a href="{{ route('milestones.create', $project->id) }}" class="btn btn-success">
                                Create Milestone
                            </a>
                        </div>

                        <!-- Horizontal Form -->
                        <form action="{{ route('projects.update', $project) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="leader_id" class="col-sm-2 col-form-label">Project Leader</label>
                                <div class="col-sm-10">
                                    {{-- @dump($project->academician_id) --}}
                                    <select name="leader_id" id="leader_id" class="form-control">
                                        <!-- Current leader as the default option -->
                                        <option value="{{ $project->academician_id }}" selected>{{ $project->leader->user->name }}</option>
                                        
                                        <!-- Other leaders in the dropdown -->
                                        @foreach ($academicians as $academician)
                                            @if ($academician->id != $project->academician_id)
                                                <option value="{{ $academician->id }}">{{ $academician->user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Project Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $project->title }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="grantProvider" class="col-sm-2 col-form-label">Grant Provider</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="grantProvider" id="grantProvider" value="{{ $project->grantProvider }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="grantAmount" class="col-sm-2 col-form-label">Grant Amount</label>
                                <div class="col-sm-10">
                                    <input type="double" class="form-control" name="grantAmount" id="grantAmount" value="{{ $project->grantAmount }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="startDate" class="col-sm-2 col-form-label">Start Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="startDate" id="startDate" value="{{ $project->startDate }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="duration" class="col-sm-2 col-form-label">Duration (in month)</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="duration" id="duration" value="{{ $project->duration }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="members" class="col-sm-2 col-form-label">Project Members</label>
                                <div class="col-sm-10">
                                    @foreach ($academicians as $academician)
                                        <div class="form-check">
                                            <input class="form-check-input" 
                                                type="checkbox" 
                                                name="members[]" 
                                                value="{{ $academician->id }}" 
                                                id="member{{ $academician->id }}"
                                                {{ in_array($academician->id, $project->members->pluck('id')->toArray()) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="member{{ $academician->id }}">
                                                {{ $academician->user->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form><!-- End Horizontal Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
