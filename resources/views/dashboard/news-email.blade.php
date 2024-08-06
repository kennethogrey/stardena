<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subjectContent }}</title>
    <style>
        body {
            background-color: #001f3f; /* Dark blue background */
            color: #ffffff; /* White text */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #001f3f; /* Dark blue background */
        }
        .header {
            background-color: #002a66; /* Darker blue */
            padding: 10px;
            text-align: center;
            border-bottom: 2px solid #001f3f; /* Slightly darker border */
        }
        .header h1 {
            margin: 0;
            color: #ffffff;
            font-size: 24px;
        }
        .content {
            padding: 20px;
            background-color: #ffffff; /* White background */
            color: #001f3f; /* Dark blue text */
            border-radius: 10px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
            color: #001f3f; /* Dark blue text */
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>{{ $subjectContent }}</h1>
        </div>
        <div class="content">
            <p>{!! $messageContent !!}</p>
        </div>
    </div>
</body>
</html>
