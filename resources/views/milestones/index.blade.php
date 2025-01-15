@extends('layouts.layout')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Milestone</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="index.html">Milestone</a></li>
          <li class="breadcrumb-item active">Milestone List</li>
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
                        <th scope="col" style="width: 25%; text-align: center;">Project Title</th>
                        <th scope="col" style="width: 25%; text-align: center;">Milestone Name</th>
                        <th scope="col" style="width: 15%; text-align: center;">Target Complete Date</th>
                        <th scope="col" style="width: 15%; text-align: center;">Status</th>
                        <th scope="col" style="width: 20%; text-align: center;"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($milestones as $milestone)
                            <tr>
                                <td style="text-align: center;">{{ $milestone->project->title }}</td>
                                <td style="text-align: center;">{{ $milestone->name }}</td>
                                <td style="text-align: center;">{{ $milestone->target_complete_date }}</td>
                                <td style="text-align: center;">{{ $milestone->status ?? 'N/A' }}</td>
                                <td style="text-align: center;">
                                    <a href={{route('milestones.show',$milestone)}}>
                                        <button type="button" class="btn btn-outline-info bi bi-eye"></button>
                                    </a>    
                                    <a href={{route('milestones.edit',$milestone)}}>
                                        <button type="button" class="btn btn-outline-success bi bi-pencil-square"></button>
                                    </a> 
                                    <form action="{{ route('milestones.destroy', $milestone->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this milestone?');" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger bi bi-trash3-fill"></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection


