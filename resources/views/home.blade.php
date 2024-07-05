{{-- <!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap demo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
  <li class="nav-item">
  <a class="nav-link active" aria-current="page" href="#">Home</a>
  </li>
  </ul>
  <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
  @csrf
  @method('DELETE')
  <button class="btn btn-danger" type="submit">Logout</button>
  </form>
  </div>
  </div>
  </nav>
  <div class="container">
  <h1> Welcome, {{ Auth::user()->name }}</h1>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html> --}}

<style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    
    tr:nth-child(even) {
      background-color: #dddddd;
    }
    </style>
@extends('layout')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @else
                    <div class="alert alert-success">
                        You are logged in!
                    </div>       
                @endif                
            </div>

            <div class="row">
                <div class="col-md-12">
                <!-- Your existing content goes here -->         
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center display-4">All Data Fetched</h1>
                    </div>
                    <div class="mt-3 ms-3">
                        <a href="/form" class="btn btn-primary btn-sm d-block d-md-inline">Add Income/Expense</a>
                    </div>
                    
                    <div class="card-body">


                        {{-- ================ --}}

                        <!-- Totals Section -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Total Income</h5>
                                        <p class="card-text">{{ $totalIncome }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Total Expense</h5>
                                        <p class="card-text">{{ $totalExpense }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Total Amount</h5>
                                        <p class="card-text">{{ $totalAmount }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  --}}
                        
                        <div class="table-responsive mb-3">
                            
                            <table class="table table-striped">
                                <tr>
                                    <th>ID</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Type(Income/Expense)</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($incomeExpenceDetails as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>
                                            <a href="{{ url('edit/'.$item->id) }}" class="btn btn-primary btn-sm" style="width: 100%;">Edit</a>
                                            <form method="post" action="{{ route('delete.student', $item->id) }}">
                                                @csrf
                                                <button style="width: 100%;" type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                              </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>    
</div>
    
@endsection