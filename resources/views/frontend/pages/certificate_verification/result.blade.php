@extends('frontend.layouts.app')

@section('title', 'Certificate Verification - Requin BD')
@section('meta_description', 'Verify your internship certificate from Requin BD.')

@push('styles')
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-dark': '#03244B',
                        'accent-main': '#3E0093',
                        'accent-pop': '#EC672E',
                    },
                    fontFamily: {
                        sans: ['Inter', 'Noto Serif Bengali', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Noto+Serif+Bengali:wght@400;700&family=Playfair+Display:wght@400;700&display=swap"
        rel="stylesheet">

    <style>
        html {
            font-family: 'Inter', 'Noto Serif Bengali', sans-serif;
        }

        .certificate-card-frame {
            width: 1100px;
            aspect-ratio: 1100 / 730;
            border: 6px solid #3E0093;
            background-color: white;
            box-shadow: 0 20px 40px rgba(3, 36, 75, 0.2);
            border-radius: 12px;
            position: relative;
            overflow: hidden;
            flex-shrink: 0;
            transform-origin: top center;
        }

        .header-bar {
            background-color: #03244B;
            height: 16px;
        }

        .footer-bar {
            background-color: #03244B;
            height: 16px;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
        }

        .signature-line {
            height: 2px;
            width: 110px;
            background-color: #3E0093;
            margin-bottom: 0.25rem;
        }

        .sign-size {
            height: 60px;
        }

        .bod {
            background: white !important;
        }

        /* 📱 Responsive scaling for mobile */
        @media (max-width: 1024px) {
            .certificate-card-frame {
                transform: scale(0.9);
            }
        }

        @media (max-width: 768px) {
            .certificate-card-frame {
                transform: scale(0.6);
            }
        }

        @media (max-width: 640px) {
            .certificate-card-frame {
                transform: scale(0.45);
            }
        }

        @media (max-width: 480px) {
            .certificate-card-frame {
                transform: scale(0.4);
            }
        }

        @media (max-width: 380px) {
            .certificate-card-frame {
                transform: scale(0.3);
            }
        }
    </style>
@endpush

@section('content')
    <div class="mx-auto py-8 px-4 sm:px-6 lg:px-8 bod">

        <!-- 🔎 VERIFICATION FORM -->
        <div class="w-full max-w-md mx-auto mb-12 p-6 bg-white shadow-lg rounded-lg">
            <h2 class="text-2xl sm:text-3xl font-bold text-primary-dark mb-6 text-center">
                Certificate ID Verification
            </h2>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded mb-4 text-center text-sm sm:text-base">
                    🎉 Certificate verified successfully!
                </div>
            @elseif(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded mb-4 text-center text-sm sm:text-base">
                    ❌ Certificate not found. Showing placeholder certificate.
                </div>
            @endif

            <form action="{{ route('certificate.verification.verify') }}" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="certificate_no" id="certificate_no" placeholder="Enter Certificate ID"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-accent-pop/50 focus:border-accent-pop transition duration-150 text-base text-primary-dark"
                    required>
                <button type="submit"
                    class="w-full bg-accent-main hover:bg-[#32007D] text-white font-semibold py-3 rounded-lg shadow-lg transition duration-300 ease-in-out text-base">
                    Submit
                </button>
            </form>
        </div>

        <!-- 🏆 CERTIFICATE DESIGN -->
        <div class=" flex justify-center">
            <div class="certificate-card-frame rounded-lg relative">
                <div class="header-bar w-full"></div>

                <div class="p-12 h-full flex flex-col justify-between text-center">

                    <!-- Header & Title -->
                    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                        <div class="text-primary-dark mb-4 md:mb-0 flex items-center justify-center gap-3">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('frontend/logo/color-logo.png') }}" alt="Requin BD logo"
                                    class="h-12 rounded-md mx-auto md:mx-0">
                            </a>
                        </div>

                        <div class="text-center md:text-right">
                            <p class="text-5xl font-extrabold text-accent-pop font-serif mb-1 leading-none">
                                Certificate
                            </p>
                            <p class="text-2xl font-semibold text-primary-dark">of Internship</p>
                        </div>
                    </div>

                    <!-- Recipient Section -->
                    <div class="my-10">
                        <p class="text-lg text-gray-700 font-medium mb-2">is proudly presented to</p>
                        <h3 class="text-5xl font-black text-accent-main leading-tight tracking-tight uppercase">
                            {{ $intern->name ?? 'Full Name' }}
                        </h3>

                        <p class="text-xl text-primary-dark mt-6 max-w-3xl mx-auto leading-relaxed">
                            has <strong>successfully completed</strong> the
                            <strong>Virtual Internship Program</strong> in the
                            <span class="font-extrabold text-accent-pop">
                                {{ $intern->department->name ?? 'Department Name' }}
                            </span>
                            offered by <strong>Requin BD.</strong>
                            The tenure was from
                            <strong>
                                {{ isset($intern->joining_date) ? \Carbon\Carbon::parse($intern->joining_date)->format('j F Y') : 'Start Date' }}
                                to
                                {{ isset($intern->ending_date) ? \Carbon\Carbon::parse($intern->ending_date)->format('j F Y') : 'End Date' }}
                            </strong>.
                        </p>

                        <p class="text-base text-gray-600 mt-4 font-medium">
                            We wish him/her the best of luck in his/her future endeavours.
                        </p>
                    </div>

                    <!-- Footer Section -->
                    <div class="flex justify-between items-end mt-auto px-6 md:px-12 pb-6">
                        <p class="text-sm italic text-gray-600">
                            Certificate No: {{ $intern->certificate_no ?? 'XXXX-XXXX' }}
                        </p>

                        <div class="text-right text-primary-dark">
                            @if (isset($intern))
                                <img src="{{ asset('frontend/logo/sign.png') }}" alt="Signature"
                                    class="sign-size w-auto mx-auto md:mx-0 mb-1">
                                <div class="signature-line mb-1"></div>
                                <p class="text-sm font-bold">Sultanul Arifine</p>
                                <p class="text-xs text-gray-600">CEO, Requin BD</p>
                            @else
                                <div class="signature-line mb-1"></div>
                                <p class="text-sm font-bold">Full Name</p>
                                <p class="text-xs text-gray-600">Designation</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="footer-bar w-full"></div>
            </div>
        </div>

    </div>

   
@endsection
