<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum PHP - Pemrograman Web Lanjutan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
        }
        h2, h3 {
            color: #3498db;
        }
        .container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tfoot td {
            font-weight: bold;
            background-color: #f2f2f2;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: inline-block;
            width: 100px;
        }
        input[type="text"],
        input[type="email"] {
            padding: 5px;
            width: 250px;
        }
        button {
            padding: 8px 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
        .btn {
            padding: 10px 20px;
            font-size: 1.1em;
        }
    </style>
</head>
<body>
    <h1>PHP Programming for Pemrograman Web</h1>

    <div class="container">
        <h2>Halo, {{ $name }}!</h2>
        
        <h3>Informasi Diri:</h3>
        <ul>
            <li>Nama: {{ $name }}</li>
            <li>Umur: {{ $age }} tahun</li>
            <li>Tinggi: {{ $height }} m</li>
            <li>Status: {{ $isActive ? 'Aktif' : 'Tidak Aktif' }}</li>
        </ul>

        @if($finalGrade >= 80)
            <p>Selamat! Anda mendapatkan nilai A</p>
        @elseif($finalGrade >= 70)
            <p>Anda mendapatkan nilai B</p>
        @else
            <p>Anda perlu belajar lebih giat lagi</p>
        @endif

        <h3>Perulangan For:</h3>
        <ul>
            @for($i = 1; $i <= 5; $i++)
                <li>Ini adalah perulangan ke-{{ $i }}</li>
            @endfor
        </ul>

        <h3>Daftar Mata Kuliah:</h3>
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Status</th>
                    <th>Jumlah Peserta</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                    @if($course['status'] === 'Aktif')
                        <tr>
                            <td>{{ $course['course_code'] }}</td>
                            <td>{{ $course['course_name'] }}</td>
                            <td style="text-align: center;">{{ $course['credit'] }}</td>
                            <td style="text-align: center;">{{ $course['status'] }}</td>
                            <td style="text-align: center;">{{ $course['participant_total'] }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" style="text-align: right;">Total:</td>
                    <td style="text-align: center;">{{ $creditTotal }} SKS</td>
                    <td style="text-align: center;">{{ $activeCoursesCount }} Mata Kuliah</td>
                    <td style="text-align: center;">{{ $participantTotal }} Peserta</td>
                </tr>
            </tfoot>
        </table>

        <p>Luas persegi panjang dengan panjang 10 dan lebar 5 adalah: {{ $area }}</p>
        
        <p>Sekarang tanggal: {{ $currentDateTime }} WIB</p>
    </div>

    <div class="container text-center mt-4">
        <a href="{{ route('contacts.form') }}" class="btn btn-primary">
            Buka Halaman Kontak
        </a>
    </div>
</body>
</html>
