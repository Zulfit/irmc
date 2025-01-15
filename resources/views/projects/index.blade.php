@extends('layouts.layout')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Project</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Project</a></li>
          <li class="breadcrumb-item active">Projects List</li>
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
                        <th scope="col" style="width: 15%; text-align: center;">Grant Provider</th>
                        <th scope="col" style="width: 15%; text-align: center;">Grant Amount</th>
                        <th scope="col" style="width: 25%; text-align: center;">Leader</th>
                        <th scope="col" style="width: 20%; text-align: center;"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td style="text-align: center;">{{ $project->title }}</td>
                                <td style="text-align: center;">{{ $project->grantProvider }}</td>
                                <td style="text-align: center;">RM {{ $project->grantAmount }}</td>
                                {{-- <td>{{ $project->startDate }}</td>
                                <td>{{ $project->duration }}</td> --}}
                                <td style="text-align: center;">{{ $project->leader->user->name ?? 'N/A' }}</td>
                                {{-- <td>
                                    <ul>
                                        @foreach ($project->members as $member)
                                            <li>{{ $member->name }}</li>
                                        @endforeach
                                    </ul>
                                </td> --}}
                                <td style="text-align: center;">
                                    <a href={{route('projects.show',$project)}}>
                                        <button type="button" class="btn btn-outline-info bi bi-eye"></button>
                                    </a>    
                                    <a href={{route('projects.edit',$project)}}>
                                        <button type="button" class="btn btn-outline-success bi bi-pencil-square"></button>
                                    </a>  
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');" style="display: inline;">
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


