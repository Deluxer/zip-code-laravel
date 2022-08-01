<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Import zipCode</title>
</head>
<body>
    <h2>Import Zip Code</h2>
    <form action="/import" method="POST" enctype="multipart/form-data">
        
        @csrf

        <input type="file" name="zip_codes" accept=".xlsx, .xls" required>

        <br>
        <br>
        <input type="submit" value="Upload">
    </form>

</body>
</html>