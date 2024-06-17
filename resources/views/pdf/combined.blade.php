<!DOCTYPE html>
<html>
<head>
    <title>Staff Documents</title>
    <style>
        .page-break {
            page-break-after: always;
        }
        .document {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    @foreach ($documents as $name => $path)
        <div>
            <h2>{{ $name }}</h2>
            <img src="{{ $path }}" alt="{{ $name }}" class="document">
        </div>
        
    @endforeach
</body>
</html>
