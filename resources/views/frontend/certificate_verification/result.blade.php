<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Certificate Verification</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    background: #6a0dad; /* Purple background */
    overflow: hidden;
}

/* Removed body::after effect completely */

/* Go Back button */
.btn-back {
    position: fixed;
    top: 20px;
    left: 20px;
    font-weight: bold;
    color: #fff;
    text-decoration: underline;
    background: none;
    border: none;
    cursor: pointer;
    font-size: 1rem;
    z-index: 10;
}

.btn-back:hover {
    color: #ffd700;
}

/* Certificate frame */
.certificate-frame {
    position: relative;
    width: 800px;
    max-width: 95%;
    height: 500px;
    background: #0b2347; /* Card background */
    border-radius: 15px;
    padding: 40px 60px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    /* Orange glowing border */
    border: 5px solid;
    border-image: linear-gradient(45deg, #ff8c00, #ffae00, #ff8c00) 1;
    box-shadow: 0 0 20px rgba(255,140,0,0.5);
}

/* Name text */
.certificate-title {
    font-size: 3rem;
    font-weight: bold;
    color: #ed8f00;
    margin-bottom: 20px;
    text-shadow: 0 0 8px rgba(0,0,0,0.3);
}

/* Details */
.details {
    font-size: 1.3rem;
    line-height: 1.6;
    text-align: center;
    color: #ffffff;
}

/* Highlighted text */
.details b {
    color: #eb692a;
}

/* Status */
.status {
    font-size: 2.2rem;
    font-weight: bold;
    margin-bottom: 20px;
    color: #ffffff;
}

.status.failed { color: #ff4c4c; }

/* Approved text */
.approved {
    margin-top: auto;
    font-size: 1rem;
    color: #fdfdfd;
    font-style: italic;
    margin-top: 30px;
}

/* Subtle glow */
.certificate-frame::after {
    content: "";
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    border-radius: 15px;
    box-shadow: 0 0 30px rgba(255,215,0,0.2);
    pointer-events: none;
}
</style>
</head>
<body>

<button onclick="window.history.back()" class="btn-back">Go Back</button>

<div class="certificate-frame">
    @if($intern)
        <div class="status success">🎉 Congratulations! 🎉</div>
        <div class="certificate-title">{{ $intern->name }}</div>
        <div class="details">
            has successfully completed the Virtual Internship Program in the <b>{{ $intern->department ? $intern->department->name : 'N/A' }}</b> department.<br>
            Certificate No: <b>{{ $intern->certificate_no }}</b>
        </div>
        <div class="approved">Approved by Requin BD Authority</div>
    @else
        <div class="status failed">❌ Certificate Not Found</div>
        <div class="certificate-title">Oops!</div>
        <div class="details">
            Please check your certificate number and try again.
        </div>
    @endif
</div>

</body>
</html>
