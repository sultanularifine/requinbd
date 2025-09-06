<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certificate</title>
</head>
<body style="margin:0; padding:0; font-family:'railway';">

    <div style="position: relative; width:297mm; height:210mm; 
        background: url('{{ URL::asset('backend/certificate/certificate.jpg') }}')  no-repeat center; 
        background-size: cover;">

        <!-- Name -->
        <div style="position:absolute; top:105mm; left:0; width:100%; 
            font-family:'certificate'; text-align:center; font-size:40pt; color:#000;">
           Radbin Habib Aopee
        </div>

        <!-- Details -->
        <div style="position:absolute; top:128mm; left:25mm; right:25mm; 
            font-size:12pt; color:#071b3e; text-align:center; line-height:1.3;">
            has successfully completed the Virtual Internship Program in the 
            <b>{{ $intern->department ? $intern->department->name : 'N/A' }}</b> department offered by Requin BD. 
            The tenure was from <b>{{ $intern->joining_date }}</b> to <b>{{ $intern->joining_date }}</b>. 
            We wish him/her the best of luck in his/her future endeavours.
        </div>

        <!-- Left Signature -->
        <div style="position:absolute; bottom:22mm; left:32mm; text-align:center; font-size:12pt; color:#071b3e;">
            <b>Shajuti Kundu</b><br>
            Head of Marketing and PR<br>
            Requin BD
        </div>

        <!-- Right Signature -->
        <div style="position:absolute; bottom:22mm; right:32mm; text-align:center; font-size:12pt; color:#071b3e;">
            <b>Sultanul Arifine</b><br>
            Chief Executive Officer<br>
            Requin BD
        </div>

        <!-- Certificate No -->
        <div style="position:absolute; bottom:15mm; width:100%; text-align:center; font-size:10pt; color:#071b3e;">
            Certificate No: <b>{{ $intern->certificate_no }}</b>
        </div>

    </div>
</body>
</html>
