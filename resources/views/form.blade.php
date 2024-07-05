<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Add Income and expense</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container mt-5">
        @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        @endif    
        <form  method="post" action="{{ route('validate.form') }}" novalidate>
            @csrf
            {{-- <div class="form-group mb-2">
                <label>Description</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="description" id="description">
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> --}}
            <div class="form-group mb-2">
                <label>Amount</label>
                <input type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" id="amount" required>
                @error('amount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>date</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date">
                @error('date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            {{-- <div class="form-group mb-2">
                <label>Type(Income\Expence)</label>
                <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject">
                @error('subject')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror                
            </div> --}}
            <div class="form-group mb-2">
                <label>Type (Income/Expense)</label>
                <select class="form-control @error('subject') is-invalid @enderror" name="type" id="type" required>
                    <option value="">Select Type</option>
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
                @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="4"></textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror                     
            </div>
            <div class="d-grid mt-3">
              <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
            </div>
        </form>
    </div>
</body>
</html>