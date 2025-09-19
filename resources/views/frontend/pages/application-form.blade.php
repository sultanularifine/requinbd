@extends('frontend.layouts.app')

@section('title', 'Internship Application - Requin BD')
@push('styles')
    <style>
        /* ------------------- Form Card ------------------- */
        .form-card {
            background: var(--bg-2);
            border-radius: var(--radius);
            padding: 40px;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.5);
            display: grid;
            gap: 25px;
            /* spacing between rows */
            margin-bottom: 50px;
        }

        /* ------------------- Form Heading ------------------- */
        h2 {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 30px;
            margin-left: 30px;
            border-bottom: 2px solid var(--brand);
            padding-bottom: 10px;
            color: var(--text);
            letter-spacing: 0.5px;
        }

        /* ------------------- Labels ------------------- */
        label {
            display: block;
            font-weight: 500;
            margin-bottom: 10px;
            color: var(--muted);
            font-size: 14px;
        }

        /* ------------------- Inputs, Selects, Textareas ------------------- */
        input.form-control,
        select.form-control,
        textarea.form-control {
            width: 100%;
            padding: 16px 18px;
            font-size: 14px;
            border: 1px solid #2a2f4a;
            border-radius: var(--radius);
            background: var(--bg);
            color: var(--text);
            transition: all 0.3s ease;
            margin-bottom: 20px;
            /* vertical spacing between fields */
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        input.form-control::placeholder,
        textarea.form-control::placeholder {
            color: var(--muted);
        }

        /* Focus state */
        input.form-control:focus,
        select.form-control:focus,
        textarea.form-control:focus {
            border: 1px solid var(--brand);
            box-shadow: 0 0 10px rgba(91, 134, 255, 0.6), inset 0 2px 5px rgba(0, 0, 0, 0.3);
            outline: none;
        }

        /* ------------------- Select Styling ------------------- */
        select.form-control {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-color: var(--bg);
            color: var(--text);
            padding-right: 35px;
            position: relative;
        }

        /* Optional: custom arrow */
        select.form-control::after {
            content: "▼";
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            pointer-events: none;
        }

        /* ------------------- Grid Layout ------------------- */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            /* horizontal & vertical spacing */
        }

        .form-grid .full-width {
            grid-column: 1 / -1;
        }

        /* ------------------- File Inputs ------------------- */
        input[type="file"].form-control {
            padding: 12px;
            margin-bottom: 20px;
        }

        /* ------------------- Submit Button (Apply Button Style) ------------------- */
        button.btn-primary {
            background-color: #E9692C;
            color: #fff;
            font-weight: bold;
            border: none;
            padding: 8px 20px;
            /* smaller size like Apply button */
            font-size: 14px;
            /* smaller font */
            border-radius: 4px;
            /* rounded corners */
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px #fd5f16;
            /* glow effect */
            text-align: center;
        }

        /* Hover effect */
        button.btn-primary:hover {
            background-color: #ca4f16;
            box-shadow: 0 0 20px #ff5203;
        }

        /* ------------------- Success Message ------------------- */
        .alert-success {
            color: var(--white);
            background: linear-gradient(90deg, var(--brand), var(--brand-2));
            border: none;
            padding: 16px 20px;
            border-radius: var(--radius);
            margin-bottom: 25px;
            text-align: center;
            font-weight: 500;
            box-shadow: var(--shadow);
        }

        /* ------------------- Responsive ------------------- */
        /* ------------------- Responsive Enhancements ------------------- */
        @media (max-width: 992px) {
            .form-grid {
                grid-template-columns: repeat(2, 1fr);
                /* 2 columns on medium screens */
                gap: 15px;
                /* slightly smaller gap */
            }

            h2 {
                font-size: 28px;
                margin-left: 0;
            }
        }

        @media (max-width: 768px) {
            .form-card {
                padding: 30px 20px;
                /* reduce padding on tablets */
            }

            input.form-control,
            select.form-control,
            textarea.form-control {
                padding: 14px 16px;
                font-size: 14px;
            }
        }

        @media (max-width: 576px) {
            .form-grid {
                grid-template-columns: 1fr;
                /* single column on mobile */
                gap: 20px;
                /* vertical spacing */
            }

            .form-card {
                padding: 25px 15px;
                /* reduce padding on small screens */
            }

            h2 {
                font-size: 24px;
                text-align: left;
            }

            button.btn-primary {
                width: 100%;
                /* button fills the screen width */
                padding: 12px 0;
                font-size: 15px;
            }
        }
    </style>
@endpush
@section('content')
    <div class="container my-5">
        <h2>Internship Application Form</h2>

        <div class="form-card">
            @if (session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('intern-applications.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="timestamp" value="{{ now() }}">

                <div class="form-grid">
                    <div>
                        <label for="formal_name">Full Name *</label>
                        <input type="text" class="form-control" name="formal_name" id="formal_name" required>
                    </div>

                    <div>
                        <label for="email">Email *</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>

                    <div>
                        <label for="department">Department *</label>
                        <select class="form-control" name="department_id" id="department" required>
                            <option value="">Select Department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>



                    <div>
                        <label for="contact_no">Contact No *</label>
                        <input type="tel" class="form-control" name="contact_no" id="contact_no" required>
                    </div>

                    <div>
                        <label for="dob">Date of Birth *</label>
                        <input type="date" class="form-control" name="dob" id="dob" required>
                    </div>

                    <div>
                        <label for="whatsapp_no">WhatsApp No *</label>
                        <input type="text" class="form-control" name="whatsapp_no" id="whatsapp_no" required>
                    </div>

                    <div>
                        <label for="facebook_profile">Facebook Profile</label>
                        <input type="url" class="form-control" name="facebook_profile" id="facebook_profile">
                    </div>

                    <div>
                        <label for="linkedin_profile">LinkedIn Profile</label>
                        <input type="url" class="form-control" name="linkedin_profile" id="linkedin_profile">
                    </div>

                    <div>
                        <label for="institution">Institution *</label>
                        <input type="text" class="form-control" name="institution" id="institution" required>
                    </div>

                    <div>
                        <label for="present_address">Present Address *</label>
                        <textarea class="form-control" name="present_address" id="present_address" rows="2" required></textarea>
                    </div>
                    <div>
                        <label for="designation">Designation *</label>
                        <select class="form-control" name="designation" id="designation" required>
                            <option value="">Select Designation</option>
                            <option value="Intern">Intern</option>

                        </select>
                    </div>

                    <div class="full-width">
                        <label for="why_join">Why do you want to join as an Intern? *</label>
                        <textarea class="form-control" name="why_join" id="why_join" rows="4" required></textarea>
                    </div>

                    <div>
                        <label for="cv">Upload your CV *</label>
                        <input type="file" class="form-control" name="cv" id="cv" accept="application/pdf"
                            required>
                    </div>

                    <div>
                        <label for="photo">Attach Photo *</label>
                        <input type="file" class="form-control" name="photo" id="photo" accept="image/*" required>
                    </div>

                    <div class="full-width">
                        <button type="submit" class="btn-primary">Submit Application</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
