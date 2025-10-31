@extends('frontend.layouts.app')

@section('title', 'Brand Guidelines - Requin BD')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<style>
/* --- Global Reset & Base --- */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

.all {
  background: #f9f9f9;
  color: #03244B !important;
  margin-bottom: 40px;
}

/* --- Header --- */
.requin-header {
  background: #fff;
  padding: 1rem 0;
  border-bottom: 2px solid #EC672E;
}
.requin-header .requin-container {
  display: flex;
  justify-content: center;
  align-items: center;
}
.requin-logo {
  display: flex;
  align-items: center;
  gap: 10px;
}
.requin-logo img {
  width: 60px;
  height: auto;
}
.requin-brand-text h1 {
  color: #3E0093;
  font-weight: 700;
}
.requin-brand-text p {
  font-size: 12px;
  color: #03244B;
}

/* --- Hero Section --- */
.requin-hero {
  background: linear-gradient(#9f3000, #b53c09);
  color: #fff;
  padding: 5rem 1rem;
  position: relative;
  text-align: center;
}
.requin-hero .requin-overlay {
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  
  z-index: 1;
}
.requin-hero-content {
  position: relative;
  z-index: 2;
  max-width: 800px;
  margin: auto;
}
.requin-hero h2 {
  font-size: 2.5rem;
  background: #03244B;
  padding: 0.5rem 1rem;
  display: inline-block;
  border-radius: 6px;
}
.requin-hero p {
  margin: 1rem 0;
  font-size: 1rem;
  color: #fff;
}
.requin-btn {
  background: #fff;
  color: #03244B;
  padding: 0.6rem 1.5rem;
  border-radius: 8px;
  font-weight: 600;
  text-decoration: none;
  display: inline-block;
  transition: 0.3s;
}
.requin-btn:hover {
  background: #3E0093;
  color: #fff;
}
.requin-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
  gap: 1rem;
  margin-top: 2rem;
}
.requin-card {
  background: #fff;
  color: #03244B;
  padding: 1rem;
  border-radius: 8px;
  text-decoration: none;
  font-weight: 600;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  transition: 0.3s;
  text-align: center;
}
.requin-card:hover {
  background: #3E0093;
  color: #fff;
}

/* --- Brand Colors --- */
.requin-colors {
  padding: 4rem 1rem;
  text-align: center;
  background: #fff;
}
.requin-colors h2 {
  color: #03244B;
  font-size: 2rem;
}
.requin-color-boxes {
  display: flex;
  justify-content: center;
  gap: 1rem;
  margin: 2rem 0;
  flex-wrap: wrap;
}
.requin-color-swatch {
  width: 100px;
  height: 100px;
  color: #fff;
  font-weight: 600;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 8px;
}
.requin-color-text {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 1.5rem;
  text-align: left;
  max-width: 1000px;
  margin: auto;
}
.requin-color-text h3 {
  color: #3E0093;
}

/* --- Mockups --- */
.requin-mockups {
  padding: 4rem 1rem;
  background: #f4f6f8;
  text-align: center;
}
.requin-mockup-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 1rem;
  margin-top: 2rem;
}
.requin-mockup-grid img {
  width: 100%;
  border-radius: 8px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  transition: 0.3s;
}
.requin-mockup-grid img:hover {
  transform: scale(1.03);
}

/* --- Footer --- */
.requin-footer {
  background: #03244B;
  color: #fff;
  text-align: center;
  padding: 1rem;
  font-size: 14px;
}

/* --- Logo Download Section --- */
.requin-logo-section {
 background: #071024;
  margin: 0 auto;
  padding: 30px 0;
  text-align: center;
}
.requin-header-pill {
  color: #ffffff;
  font-size: 1.8rem;
  font-weight: 700;
  display: inline-block;
  margin-bottom: 50px;
}
.requin-logo-options {
  display: flex;
  flex-wrap: wrap;
  gap: 30px;
  justify-content: center;
}
.requin-logo-card {
  background-color: white;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  width: calc(25% - 22.5px);
  min-width: 200px;
  padding: 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
  transition: transform 0.2s;
}
.requin-logo-card:hover { transform: translateY(-5px); }
.requin-logo-preview {
  height: 150px;
  width: 100%;
  margin-bottom: 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  border: 1px solid #ddd;
  background-color: #f9f9f9;
  padding: 10px;
  border-radius: 4px;
}
.requin-download-btn {
  background-color: #5B3A9B;
  color: white;
  font-size: 1rem;
  font-weight: 600;
  padding: 12px 0;
  width: 100%;
  border: none;
  text-decoration: none;
  border-radius: 6px;
  cursor: pointer;
  text-transform: uppercase;
  transition: background-color 0.2s;
}
.requin-download-btn:hover { background-color: #492e7d; }

/* --- Logo Practices --- */
.requin-practices {
  padding-top: 50px;
}
.requin-practice-list {
  display: flex;
  flex-direction: column;
  gap: 15px;
  max-width: 900px;
  margin: 0 auto;
}
.requin-practice-item {
  display: flex;
  background-color: white;
  border-radius: 6px;
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);
  overflow: hidden;
}
.requin-practice-logo {
  width: 35%;
  min-height: 80px;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  border-right: 1px solid #eee;
  background-color: #fcfcfc;
}
.requin-practice-rule {
  width: 65%;
  display: flex;
  align-items: center;
  padding: 15px 25px;
  font-size: 1.1rem;
  font-weight: 600;
  color: #283747;
}
.requin-rule-number {
  font-weight: 700;
  font-size: 1.3rem;
  margin-right: 15px;
  color: #5B3A9B;
}
.requin-logo-preview img {
  width: 100%;
  max-width: 200px;
  height: auto;
  display: block;
  margin: 0 auto;
}

.requin-practice-logo img {
  width: 160px;
  height: auto;
}

.requin-busy-bg {
  background: url('{{ asset('frontend/images/noisy-bg.jpg') }}') center/cover no-repeat;
  padding: 10px;
}

.requin-low-contrast-bg {
  background-color: #f4f4f4;
  padding: 10px;
}

/* --- Responsive --- */
@media (max-width: 1024px) {
  .requin-logo-card { width: calc(50% - 15px); }
}
@media (max-width: 768px) {
  .requin-header-pill { font-size: 1.5rem; padding: 12px 30px; margin-bottom: 30px; }
  .requin-logo-card { width: 100%; max-width: 400px; }
  .requin-practice-item { flex-direction: column; }
  .requin-practice-logo, .requin-practice-rule { width: 100%; border-right: none; text-align: center; }
}

/* Smooth scrolling for tabs */
html {
  scroll-behavior: smooth;
}





/* Section Container */
.logo-download-section {
   
    width: 100%;
   background: #071024;
    padding: 40px 20px;
    box-sizing: border-box;
}

/* Header Bar Styling */
.header-bar {
   
    color: white;
    text-align: center;
    padding: 15px 30px;
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); /* Soft shadow */
    margin-bottom: 50px;
    /* Optional: Add a subtle rounded-end effect */
    position: relative;
}

.header-bar h1 {
    font-size: 24px;
    font-weight: bold;
    margin: 0;
    letter-spacing: 2px;
}

/* Logo Cards Container (Flexbox for layout) */
.logo-cards-container {
    display: flex;
    justify-content: space-between; /* Distributes the cards evenly */
    gap: 30px; /* Space between the cards */
    padding: 0 50px; /* Padding for the container to match the image spacing */
}

/* Individual Card Styling */
.logo-card {
    flex: 1; /* Makes all cards take up equal space */
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for the card */
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: transform 0.3s ease;
}

.logo-card:hover {
    transform: translateY(-5px); /* Lift effect on hover */
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
}

/* Logo Placeholder Area */
.logo-placeholder {
    width: 100%;
    height: 150px; /* Fixed height for the logo area */
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
    border-bottom: 1px solid #eee; /* Separator line like in the image */
    box-sizing: border-box;
    padding: 10px;
}

/* Style for the logo image within the placeholder */
.logo-placeholder img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain; /* Ensures the whole logo is visible */
}

/* Adjustments for the logo variations (since they are images, this is for demonstration) */
/* The key is that you need to replace 'path/to/your/logo-X.png' with your actual logo images */
.light-logo {
    /* Maybe a slightly darker background if the logo is pure white, just for visibility */
    background-color: #f8f8f8; 
}
.symbol-only img {
    /* If the symbol needs to be larger/more centered */
    max-width: 60%;
}


/* Download Button Styling */
.download-button {
    width: 100%;
    padding: 15px 0;
    background-color: #673ab7; /* Purple/indigo color */
    color: white;
    border: none;
    text-align: center;
    border-radius: 5px;
    font-size: 16px;
    text-decoration: none;
    font-weight: bold;
    cursor: pointer;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: background-color 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.download-button:hover {
    background-color: #512da8; /* Slightly darker purple on hover */
}

/* Responsive adjustments for smaller screens */
@media (max-width: 900px) {
    .logo-cards-container {
        flex-wrap: wrap; /* Allows cards to stack */
        justify-content: center;
        padding: 0;
    }

    .logo-card {
        flex-basis: 45%; /* Two cards per row */
        margin-bottom: 20px;
    }
}

@media (max-width: 600px) {
    .logo-cards-container {
        flex-direction: column; /* Stacks all cards vertically */
    }

    .logo-card {
        flex-basis: 100%; /* Full width */
    }
}
</style>
@endpush

@section('meta_description', 'Custom IT services for startups & SMBs.')

@section('content')

<div class="all">
    <!-- Hero -->
<section class="requin-hero">
  <div class="requin-overlay"></div>
  <div class="requin-hero-content">
    <h2>BRAND GUIDELINES</h2>
    <p>Brand guidelines define how your brand should be presented consistently across all media and design.</p>
    <a href="" class="requin-btn">Learn with RequinBD</a>
    <div class="requin-grid">
      <a href="#colors" class="requin-card">COLORS</a>
      <a href="#mockups" class="requin-card">MOCKUP</a>
      <a href="#logo-practices" class="requin-card">LOGO PRACTICES</a>
      <a href="#logo-download" class="requin-card">LOGO DOWNLOAD</a>
    </div>
  </div>
</section>

<!-- Colors -->
<section id="colors" class="requin-colors">
  <div class="requin-container">
    <h2>BRAND COLORS</h2>
    <p>Color builds recognition and ensures brand consistency.</p>
    <div class="requin-color-boxes">
      <div class="requin-color-swatch" style="background:#3E0093">#3E0093</div>
      <div class="requin-color-swatch" style="background:#EC672E">#EC672E</div>
      <div class="requin-color-swatch" style="background:#03244B">#03244B</div>
    </div>
    <div class="requin-color-text">
      <div><h3>#3E0093</h3><p>Represents luxury, creativity, and sophistication.</p></div>
      <div><h3>#EC672E</h3><p>Symbolizes energy, enthusiasm, and confidence.</p></div>
      <div><h3>#03244B</h3><p>Conveys trust, stability, and professionalism.</p></div>
    </div>
  </div>
</section>

<!-- Mockups -->
<section id="mockups" class="requin-mockups">
  <div class="requin-container">
    <h2>LOGO MOCKUP</h2>
    <div class="requin-mockup-grid">
       <a href="{{ url('/') }}">
            <img src="https://media.licdn.com/dms/image/v2/D563DAQElSUmX-SzHjQ/image-scale_191_1128/image-scale_191_1128/0/1665899066491/requin_bd_cover?e=2147483647&v=beta&t=wBai8ob1_nBMDICRo2iZslBWG-UFz4K0i_D7v0BWrNQ" alt="Requin BD logo">
        </a>
       <a href="{{ url('/') }}">
            <img src="https://media.licdn.com/dms/image/v2/D563DAQElSUmX-SzHjQ/image-scale_191_1128/image-scale_191_1128/0/1665899066491/requin_bd_cover?e=2147483647&v=beta&t=wBai8ob1_nBMDICRo2iZslBWG-UFz4K0i_D7v0BWrNQ" alt="Requin BD logo">
        </a>
       <a href="{{ url('/') }}">
            <img src="https://media.licdn.com/dms/image/v2/D563DAQElSUmX-SzHjQ/image-scale_191_1128/image-scale_191_1128/0/1665899066491/requin_bd_cover?e=2147483647&v=beta&t=wBai8ob1_nBMDICRo2iZslBWG-UFz4K0i_D7v0BWrNQ" alt="Requin BD logo">
        </a>
       <a href="{{ url('/') }}">
            <img src="https://media.licdn.com/dms/image/v2/D563DAQElSUmX-SzHjQ/image-scale_191_1128/image-scale_191_1128/0/1665899066491/requin_bd_cover?e=2147483647&v=beta&t=wBai8ob1_nBMDICRo2iZslBWG-UFz4K0i_D7v0BWrNQ" alt="Requin BD logo">
        </a>
      
    </div>
  </div>
</section>

<section id="logo-download" class="logo-download-section">
    <div class="header-bar">
        <h1>LOGO DOWNLOAD</h1>
    </div>

    <div class="logo-cards-container">

        <!-- Primary Logo -->
        <div class="logo-card">
            <div class="logo-placeholder">
                <img src="https://media.licdn.com/dms/image/v2/D563DAQElSUmX-SzHjQ/image-scale_191_1128/image-scale_191_1128/0/1665899066491/requin_bd_cover?e=2147483647&v=beta&t=wBai8ob1_nBMDICRo2iZslBWG-UFz4K0i_D7v0BWrNQ" alt="Requin BD Primary Logo">
            </div>
            <a href="https://drive.google.com/drive/folders/1Ub8EgbvWXGkP3ytIHiN-YpNzywdbSHi7?usp=drive_link" target="_blank" class="download-button">CLICK HERE</a>
        </div>

        <!-- Light Version -->
        <div class="logo-card">
            <div class="logo-placeholder light-logo">
                <p>Requin iT</p>
            </div>
            <a href="https://drive.google.com/drive/folders/1LcPeZ-0nn3ROtpU2DzvpqmoHxta0iVfi?usp=drive_link" target="_blank" class="download-button">CLICK HERE</a>
        </div>

        <!-- Icon Only -->
        <div class="logo-card">
            <div class="logo-placeholder symbol-only">
                <p>Requin Nexus Creation</p>
            </div>
            <a href="https://drive.google.com/drive/folders/1MzKBvoxYW8CdfClN0HahrKVB1FLttDwb?usp=drive_link" target="_blank" class="download-button">CLICK HERE</a>
        </div>

        <!-- Dark Version -->
        <div class="logo-card">
            <div class="logo-placeholder dark-text">
                <p>The Light of Youth</p>
            </div>
            <a href="https://drive.google.com/drive/folders/1asA5CTUKO2uiyaaHV9M0aEqly7DXAqbp?usp=drive_link" target="_blank" class="download-button">CLICK HERE</a>
        </div>

    </div>
</section>

<!-- Logo Best Practices -->
<section id="logo-practices" class="requin-logo-section requin-practices-section">
  <div class="requin-header-pill">LOGO BEST PRACTICES</div>

  <div class="requin-practice-list">

    <!-- Rule 1 -->
    <div class="requin-practice-item">
      <div class="requin-practice-logo requin-normal-logo">
        <img src="https://media.licdn.com/dms/image/v2/D563DAQElSUmX-SzHjQ/image-scale_191_1128/image-scale_191_1128/0/1665899066491/requin_bd_cover?e=2147483647&v=beta&t=wBai8ob1_nBMDICRo2iZslBWG-UFz4K0i_D7v0BWrNQ" alt="Proper Logo Example">
      </div>
      <div class="requin-practice-rule">
        <span class="requin-rule-number">1.</span>
        <span class="requin-rule-text">Don't Stretch or Squeeze</span>
      </div>
    </div>

    <!-- Rule 2 -->
    <div class="requin-practice-item">
      <div class="requin-practice-logo requin-rotated-logo">
        <img src="https://media.licdn.com/dms/image/v2/D563DAQElSUmX-SzHjQ/image-scale_191_1128/image-scale_191_1128/0/1665899066491/requin_bd_cover?e=2147483647&v=beta&t=wBai8ob1_nBMDICRo2iZslBWG-UFz4K0i_D7v0BWrNQ" alt="Rotated Logo Example" style="transform: rotate(-10deg);">
      </div>
      <div class="requin-practice-rule">
        <span class="requin-rule-number">2.</span>
        <span class="requin-rule-text">Do Not Rotate</span>
      </div>
    </div>

    <!-- Rule 3 -->
    <div class="requin-practice-item requin-busy-background">
      <div class="requin-practice-logo">
        <div class="requin-busy-bg">
          <img src="https://media.licdn.com/dms/image/v2/D563DAQElSUmX-SzHjQ/image-scale_191_1128/image-scale_191_1128/0/1665899066491/requin_bd_cover?e=2147483647&v=beta&t=wBai8ob1_nBMDICRo2iZslBWG-UFz4K0i_D7v0BWrNQ" alt="Logo on Busy Background">
        </div>
      </div>
      <div class="requin-practice-rule">
        <span class="requin-rule-number">3.</span>
        <span class="requin-rule-text">Don't Use Busy Backgrounds</span>
      </div>
    </div>

    <!-- Rule 4 -->
    <div class="requin-practice-item requin-low-contrast">
      <div class="requin-practice-logo requin-low-contrast-bg">
        <img src="https://media.licdn.com/dms/image/v2/D563DAQElSUmX-SzHjQ/image-scale_191_1128/image-scale_191_1128/0/1665899066491/requin_bd_cover?e=2147483647&v=beta&t=wBai8ob1_nBMDICRo2iZslBWG-UFz4K0i_D7v0BWrNQ" alt="Low Contrast Logo">
      </div>
      <div class="requin-practice-rule">
        <span class="requin-rule-number">4.</span>
        <span class="requin-rule-text">Don't Use Low Contrast</span>
      </div>
    </div>

  </div>
</section>

</div>

@endsection
