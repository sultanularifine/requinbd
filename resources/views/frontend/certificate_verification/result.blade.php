<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Certificate</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Railway', sans-serif;
            background: #f5f5f5;
        }

        .certificate-container {
            position: relative;
            width: 100%;
            max-width: 1100px; /* for screen preview */
            aspect-ratio: 220/160; /* maintain certificate ratio */
            margin: 30px auto;
            background: url('{{ asset('backend/certificate/certificate.jpg') }}') no-repeat center;
            background-size: cover;
            padding: 0 30px;
        }

        .certificate-name {
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            font-size: 3em;
            font-family: 'certificate', serif;
            color: #000;
            word-wrap: break-word;
        }

        .certificate-details {
            position: absolute;
            top: 61%;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            font-size: 20px;
            color: #071b3e;
            line-height: 1.4;
            width: 80%;
        }

        .signature-left,
        .signature-right {
            position: absolute;
            bottom: 40px;
            text-align: center;
            line-height: 1.2;
            color: #071b3e;
        }

        .signature-left {
            left: 80px;
        }

        .signature-right {
            right: 80px;
          
        }

        .signature-left img {
            max-width: 180px;
            height: 25px;
           
        }
        
        .signature-right img {
            max-width: 180px;
            height: 45px;
           margin-bottom: -10px;
        }

        .certificate-no {
            position: absolute;
            bottom: 40px;
            width: 100%;
            text-align: center;
            font-size: 0.9em;
            color: #071b3e;
        }

        @media print {
            .certificate-container {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="certificate-container">
        <!-- Name -->
        <div class="certificate-name">
            {{ $intern->name }}
        </div>

        <!-- Details -->
        <div class="certificate-details">
            has successfully completed the Virtual Internship Program in the
            <b>{{ $intern->department ? $intern->department->name : 'N/A' }}</b> department offered by Requin BD.
            The tenure was from <b>{{ date('d F, Y', strtotime($intern->joining_date)) }}</b> to
            <b>{{ $intern->ending_date ? date('d F, Y', strtotime($intern->ending_date)) : '-' }}</b>.
            We wish him/her the best of luck in his/her future endeavours.
        </div>

        <!-- Left Signature -->
        <div class="signature-left">
            @if ($certificate && $certificate->signature1)
                <img src="{{ asset('storage/' . $certificate->signature1) }}" alt="Signature 1">
            @endif
            <div style="border-top: 1px solid #071b3e; margin-bottom:5px;"></div>
            <b>{{ $certificate->name1 ?? '' }}</b><br>
            {{ $certificate->designation1 ?? '' }}<br>
            Requin BD
        </div>

        <!-- Right Signature -->
        <div class="signature-right">
            @if ($certificate && $certificate->signature2)
                <img src="{{ asset('storage/' . $certificate->signature2) }}" alt="Signature 2">
            @endif
            <div style="border-top: 1px solid #071b3e; margin-bottom:5px;"></div>
            <b>{{ $certificate->name2 ?? '' }}</b><br>
            {{ $certificate->designation2 ?? '' }}<br>
            Requin BD
        </div>

        <!-- Certificate No -->
        <div class="certificate-no">
            Certificate No: <b>{{ $intern->certificate_no }}</b>
        </div>
    </div>
</body>

</html>
