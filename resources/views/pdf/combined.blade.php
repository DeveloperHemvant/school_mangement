<!DOCTYPE html>
<html>
<head>
    <title>Combined Documents</title>
</head>
<body>
    @foreach($pdfPaths as $path)
        @if($path)
            <embed src="{{ storage_path('app/' . $path) }}" width="100%" height="500px" type="application/pdf">
        @endif
    @endforeach
</body>
</html>
