@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contact Form</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        <div class="submission-result">
            <h3>Data yang Dikirim:</h3>
            <p>Nama: {{ session('name') }}</p>
            <p>Email: {{ session('email') }}</p>
        </div>
    @endif

    <form method="POST" action="{{ route('contacts.store') }}" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                   id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                   id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>

    <div class="mt-4">
        <a href="{{ route('web-programming.index') }}" class="btn btn-secondary">
            Kembali ke Halaman Utama
        </a>
    </div>
</div>

<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }
    h1 {
        color: #2c3e50;
        text-align: center;
        margin-bottom: 30px;
    }
    .form-label {
        font-weight: 500;
    }
    .submission-result {
        margin-top: 20px;
        padding: 15px;
        background-color: #e8f7ff;
        border-radius: 5px;
        border-left: 4px solid #3498db;
    }
    .btn {
        margin-right: 10px;
    }
</style>
@endsection
