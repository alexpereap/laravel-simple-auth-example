@extends('layouts.app')

@push('dashboard-css')
    <link href="/css/dashboard.min.css" rel="stylesheet">
@endpush

@section('title', '2018 F1 Drivers Standings')
@section('mainContent')
<header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        
        <a class="navbar-brand" href="#">Welcome: {{ Auth::user()->username }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav px-3" >
            <li class="nav-item text-nowrap">
            <a class="nav-link" href="{{ route('logout') }}">Sign out</a>
            </li>
          </ul>
      </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
      <h1 class="mt-5">2018 F1 Drivers Standings</h1>

      <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Team</th>
              <th scope="col">Points</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($drivers as $driver)
              <tr>
                <th scope="row">{{ $loop->index +1 }} </th>
                <td>{{ $driver->name }}</td>
                <td>{{ $driver->team->name }}</td>
                <td>{{ $driver->points }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      
    </main>

    <footer class="footer">
      <div class="container">
        <span class="text-muted">2018 F1 Drivers Standings</span>
      </div>
    </footer>
@endsection