<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certificate Verification</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .verified {
            color: green;
            font-size: 22px;
            font-weight: bold;
        }

        .badge {
            display: inline-block;
            padding: 5px 12px;
            background: #28a745;
            color: white;
            border-radius: 20px;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .section {
            margin-top: 15px;
        }

        img {
            max-width: 100%;
            border-radius: 8px;
        }

        .qr {
            width: 150px;
        }

        /* ✅ NEW FLEX FIX */
        .top-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }

        .left {
            width: 70%;
        }

        .right {
            width: 30%;
            text-align: center;
        }

    </style>
</head>

<body>

    <div class="container">

        {{-- VERIFIED HEADER --}}
        <div class="badge">
            ✔ VERIFIED CERTIFICATE
        </div>

        <h1 class="verified">
            Certificate of Authenticity
        </h1>

        <hr>

        {{-- TOP ROW (LEFT DETAILS + RIGHT QR) --}}
        <div class="top-row">

            {{-- LEFT SIDE --}}
            <div class="left">

                <div class="section">
                    <p><b>Product Name:</b> {{ $certification->product->name }}</p>
                </div>

                <div class="section">
                    <h3>Certificate Details</h3>

                    <p><b>Title:</b> {{ $certification->title }}</p>

                    <p><b>Issued Date:</b> {{ $certification->created_at->format('d M Y') }}</p>
                </div>

            </div>

            {{-- RIGHT SIDE (QR) --}}
            <div class="right">

                <h3>Verification QR</h3>

                <img class="qr"
                 src="{{ asset('storage/'.$certification->certificate_qr) }}">

            </div>
        </div>
        {{-- CERTIFICATE IMAGE (FULL WIDTH BELOW) --}}
        <div class="section">
            <h3>Certificate Document</h3>

            <img src="{{ asset('storage/' . $certification->certificate_image) }}"
             alt="Certificate Image">
        </div>
        <hr>
        <p style="font-size:12px; color:gray;">
            This certificate was automatically generated and verified through the system.
        </p>

    </div>
</body>
</html>