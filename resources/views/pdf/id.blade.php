<!DOCTYPE html>
<html>
<head>
    <title>Staff ID Card</title>
    <style>
        .id-card {
            width: 350px;
            height: 200px;
            border: 1px solid #000;
            padding: 20px;
            font-family: Arial, sans-serif;
            position: relative;
        }
        .id-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .id-card .details {
            margin-left: 140px;
        }
        .id-card .details h2 {
            margin: 0;
            font-size: 18px;
        }
        .id-card .details p {
            margin: 5px 0;
            font-size: 14px;
        }
        .id-card .qr-code {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }
    </style>
</head>
<body>
    
    <div class="id-card">
        {{-- {{ asset('storage/' . $staff->photo) }} --}}
        <img src="{{ asset('storage/' . $staff->photo) }}" alt="Profile Photo">
        <div class="details">
            <h2>{{ $staff->name }}</h2>
            <p>Gender: {{ ucfirst($staff->gender) }}</p>
            <p>Date of Birth: {{ $staff->dob }}</p>
            <p>Phone: {{ $staff->phone_number }}</p>
            <p>Address: {{ $staff->address }}</p>
        </div>
        <div class="qr-code">
            {!! QrCode::size(100)->generate($staff->id) !!}
        </div>
    </div>
</body>
</html>
