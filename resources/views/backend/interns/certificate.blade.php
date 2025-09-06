@extends('backend.layouts.app')

@section('title', 'Intern Certificate')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Intern Certificate</h1>
                <div class="section-header-breadcrumb ml-auto">
                    <a href="{{ route('admin.interns.certificate.download', $intern->id) }}" class="btn btn-success">
                        <i class="fa fa-download"></i> Download PDF
                    </a>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body p-0">
                        <!-- Certificate Container -->
                        <div
                            style="position: relative; width:220mm; height:160mm; 
                               margin:auto; background: url('{{ asset('backend/certificate/certificate.jpg') }}') no-repeat center; 
                               background-size: cover; font-family: 'Railway';">

                            <!-- Intern Name -->
                            <div
                                style="position:absolute; top:78mm; left:0; width:100%; 
                                   text-align:center; font-size:30pt; color:#000; font-family: 'certificate';">
                                {{ $intern->name }}
                            </div>

                            <!-- Details -->
                            <div
                                style="position:absolute; top:97mm; left:25mm; right:25mm; 
                                   font-size:12pt; color:#071b3e; text-align:center; line-height:1.3;">
                                has successfully completed the Virtual Internship Program in the
                                <b>{{ $intern->department ? $intern->department->name : 'N/A' }}</b> department offered by
                                <b>Requin BD</b>.
                                The tenure was from <b>{{ $intern->joining_date }}</b> to
                                <b>{{ $intern->ending_date }}</b>.
                                We wish him/her the best of luck in his/her future endeavours.
                            </div>

                            <!-- Left Signature -->
                            <div
                                style="position:absolute; bottom:15mm; left:16mm; text-align:center; line-height:1.3; font-size:10pt; color:#071b3e;">
                                @if ($certificate && $certificate->signature1)
                                    <img src="{{ asset('storage/' . $certificate->signature1) }}" alt="Signature 1"
                                        style="width:50px; height:auto; ;"><br>
                                @endif
                                 <div style="border-top: 1px solid #071b3e; margin-bottom:5px;"></div>
                                <b>{{ $certificate->name1 ?? '' }}</b><br>
                                {{ $certificate->designation1 ?? '' }}
                                <br>
                                Requin BD
                            </div>

                            <!-- Right Signature -->
                            <div
                                style="position:absolute; bottom:13mm; right:21mm; text-align:center; line-height:1.3; font-size:11pt; color:#071b3e;">
                                @if ($certificate && $certificate->signature2)
                                    <img src="{{ asset('storage/' . $certificate->signature2) }}" alt="Signature 2"
                                        style="width:50px; height:auto;"><br>
                                @endif
                                  <div style="border-top: 1px solid #071b3e; margin-bottom:5px;"></div>
                                <b>{{ $certificate->name2 ?? '' }}</b><br>
                                {{ $certificate->designation2 ?? '' }}<br>
                                Requin BD
                            </div>


                            <!-- Certificate No -->
                            <div
                                style="position:absolute; bottom:15mm; width:100%; text-align:center; font-size:10pt; color:#071b3e;">
                                Certificate No: <b>{{ $intern->certificate_no }}</b>
                            </div>

                        </div>
                        <!-- End Certificate Container -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
