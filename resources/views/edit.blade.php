<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Form Validation in Laravel</title>
    
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
        <form method="post" action="{{ route('update.form', ['id' => $incomeExpenceDetails->id]) }}" novalidate>
             @csrf
            {{-- <div class="form-group mb-2">
                <label>Name</label>
                
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $student->name) }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$student->email ) }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Phone</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('email',$student->phone ) }}">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Subject</label>
                <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" value="{{ old('email',$student->subject ) }}">
                @error('subject')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror                
            </div>
            <div class="form-group mb-2">
                <label>Message</label>
                <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" rows="4">{{ old('message', $student->message) }}</textarea>
                @error('message')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror                     
            </div>
            <div class="d-grid mt-3">
              <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
            </div> --}}

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
                <input type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" id="amount" value="{{ old('amount', $incomeExpenceDetails->amount) }}">
                @error('amount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>date</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" value="{{ old('date', $incomeExpenceDetails->date) }}">
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
            {{-- <div class="form-group mb-2">
                <label>Type (Income/Expense)</label>
                <select class="form-control @error('subject') is-invalid @enderror" name="type" id="type" value="{{ old('type', $incomeExpenceDetails->type) }}">
                    <option value="">Select Type</option>
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
                @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> --}}
            <div class="form-group mb-2">
                <label>Type (Income/Expense)</label>
                <select class="form-control @error('type') is-invalid @enderror" name="type" id="type">
                    <option value="" {{ old('type', $incomeExpenceDetails->type) == '' ? 'selected' : '' }}>Select Type</option>
                    <option value="income" {{ old('type', $incomeExpenceDetails->type) == 'income' ? 'selected' : '' }}>Income</option>
                    <option value="expense" {{ old('type', $incomeExpenceDetails->type) == 'expense' ? 'selected' : '' }}>Expense</option>
                </select>
                @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            {{-- <div class="form-group mb-2">
                <label>Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="4" value="{{ old('description', $incomeExpenceDetails->description) }}"></textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror                     
            </div> --}}
            <div class="form-group mb-2">
                <label>Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="4">{{ old('description', $incomeExpenceDetails->description) }}</textarea>
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