<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Qatar Kerala Islahi Center - Admission Form</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      /* QKIC Theme Colors */
      --primary-color: #900838;
      /* Dark maroon from logo */
      --secondary-color: #f67f00;
      /* Orange from logo */
      --accent-color: #228c22;
      /* Green from logo */
      --light-color: #f8f5f7;
      --dark-color: #2c2c2c;
      --success-color: #228c22;
      --gray-light: #f8f9fa;
      --gray-medium: #e9ecef;
      --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.05);
      --shadow-md: 0 4px 8px rgba(0, 0, 0, 0.1);
      --shadow-lg: 0 8px 16px rgba(0, 0, 0, 0.1);
      --radius-sm: 6px;
      --radius-md: 10px;
      --radius-lg: 20px;
      --transition: all 0.3s ease;
    }

    body {
      background: linear-gradient(135deg, #f8f5f7 0%, #ffffff 100%);
      font-family: 'Poppins', sans-serif;
      color: var(--dark-color);
      min-height: 100vh;
      position: relative;
    }

    body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('/api/placeholder/1200/800') no-repeat center top;
      background-size: 100% auto;
      opacity: 0.03;
      z-index: -1;
      pointer-events: none;
    }

    .form-container {
      max-width: 1200px;
      margin: 30px auto;
      padding: 0 20px;
      position: relative;
    }

    .header-section {
      text-align: center;
      margin-bottom: 40px;
      position: relative;
    }

    .logo-container {
      width: 150px;
      height: 150px;
      margin: 0 auto 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    .logo-container img {
      max-width: 100%;
      max-height: 100%;
      object-fit: contain;
    }

    .form-title {
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
      color: white;
      padding: 20px 30px;
      border-radius: var(--radius-md);
      text-align: center;
      font-weight: 600;
      font-size: 24px;
      margin-bottom: 35px;
      box-shadow: var(--shadow-lg);
      position: relative;
      overflow: hidden;
      letter-spacing: 0.5px;
    }

    .form-title::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 100%);
      z-index: 1;
    }

    .subtitle {
      font-size: 16px;
      color: rgba(255, 255, 255, 0.8);
      margin-top: 5px;
      font-weight: 400;
    }

    .card {
      border-radius: var(--radius-md);
      box-shadow: var(--shadow-md);
      margin-bottom: 35px;
      border: none;
      overflow: hidden;
      transition: var(--transition);
      background-color: rgba(255, 255, 255, 0.98);
    }

    .card:hover {
      box-shadow: var(--shadow-lg);
      transform: translateY(-5px);
    }

    .card-header {
      background: linear-gradient(to right, rgba(144, 8, 56, 0.1), rgba(246, 127, 0, 0.05));
      border-bottom: 1px solid var(--gray-medium);
      padding: 18px 25px;
      border-radius: var(--radius-md) var(--radius-md) 0 0;
      position: relative;
    }

    .card-header::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      height: 100%;
      width: 4px;
      background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
    }

    .card-title {
      color: var(--primary-color);
      font-weight: 600;
      margin: 0;
      display: flex;
      align-items: center;
    }

    .card-title i {
      margin-right: 12px;
      font-size: 1.2em;
      opacity: 0.8;
    }

    .card-body {
      padding: 30px 25px;
    }

    .form-label {
      font-weight: 500;
      color: var(--dark-color);
      margin-bottom: 10px;
      display: block;
      font-size: 0.95rem;
    }

    .form-control,
    .form-select {
      padding: 12px 18px;
      border-radius: var(--radius-sm);
      border: 1px solid var(--gray-medium);
      font-size: 0.95rem;
      transition: var(--transition);
      background-color: white;
    }

    .form-control:focus,
    .form-select:focus {
      border-color: var(--secondary-color);
      box-shadow: 0 0 0 0.25rem rgba(246, 127, 0, 0.15);
    }

    .is-invalid {
      border-color: #dc3545 !important;
    }

    .form-check-input:checked {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }

    .form-section {
      padding-bottom: 10px;
      margin-bottom: 20px;
      color: var(--primary-color);
      font-weight: 500;
      display: flex;
      align-items: center;
      border-bottom: 1px solid var(--gray-medium);
    }

    .form-section i {
      margin-right: 10px;
      font-size: 1.1em;
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
      border: none;
      padding: 12px 30px;
      font-weight: 500;
      border-radius: var(--radius-sm);
      transition: var(--transition);
      box-shadow: var(--shadow-md);
      letter-spacing: 0.5px;
    }

    .btn-primary:hover {
      background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
      transform: translateY(-3px);
      box-shadow: var(--shadow-lg);
    }

    .note {
      font-style: italic;
      font-size: 0.85rem;
      color: #6c757d;
      margin-top: 5px;
      display: block;
    }

    .form-floating {
      position: relative;
    }

    .input-with-icon {
      position: relative;
    }

    .input-with-icon i {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      left: 15px;
      color: var(--primary-color);
      opacity: 0.7;
    }

    .input-with-icon .form-control,
    .input-with-icon .form-select {
      padding-left: 45px;
    }

    .section-divider {
      display: flex;
      align-items: center;
      margin: 30px 0;
    }

    .section-divider span {
      padding: 0 15px;
      color: var(--dark-color);
      font-weight: 500;
    }

    .section-divider::before,
    .section-divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: var(--gray-medium);
    }

    @media (max-width: 767.98px) {
      .card-body {
        padding: 20px 15px;
      }

      .card {
        margin-bottom: 25px;
      }

      .form-title {
        font-size: 20px;
        padding: 15px;
      }

      .logo-container {
        width: 130px;
        height: 130px;
      }

      .form-container {
        margin: 20px auto;
      }
    }

    .floating-decorations div {
      position: absolute;
      opacity: 0.15;
      z-index: -1;
    }

    .decoration-1 {
      top: 10%;
      left: 5%;
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background: linear-gradient(45deg, var(--primary-color), transparent);
      animation: float-1 15s ease-in-out infinite;
    }

    .decoration-2 {
      bottom: 15%;
      right: 5%;
      width: 150px;
      height: 150px;
      border-radius: 50%;
      background: linear-gradient(45deg, var(--secondary-color), transparent);
      animation: float-2 20s ease-in-out infinite;
    }

    .decoration-3 {
      top: 40%;
      right: 10%;
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background: linear-gradient(45deg, var(--accent-color), transparent);
      animation: float-3 18s ease-in-out infinite;
    }

    @keyframes float-1 {

      0%,
      100% {
        transform: translate(0, 0) rotate(0deg);
      }

      50% {
        transform: translate(15px, 15px) rotate(10deg);
      }
    }

    @keyframes float-2 {

      0%,
      100% {
        transform: translate(0, 0) rotate(0deg);
      }

      50% {
        transform: translate(-15px, 15px) rotate(-10deg);
      }
    }

    @keyframes float-3 {

      0%,
      100% {
        transform: translate(0, 0) rotate(0deg);
      }

      50% {
        transform: translate(10px, -15px) rotate(5deg);
      }
    }
  </style>
</head>

<body>
  <div class="form-container">
    <div class="floating-decorations">
      <div class="decoration-1"></div>
      <div class="decoration-2"></div>
      <div class="decoration-3"></div>
    </div>

    <div class="header-section">
      <div class="logo-container" style="width: 300px;
        height: 100px;">
        <img src="https://portal.qkic.org/storage///66cf834dc48378.063146731724875597.png" alt="Qatar Kerala Islahi Center Logo">
      </div>
      <div class="form-title">
        <i class="fas fa-graduation-cap me-2"></i>Qatar Kerala Islahi Center
        <div class="subtitle">Al Manar Madrasa Admission Form 2026-2027</div>
      </div>
    </div>

    <form id="admissionForm" method="post" action="/admission" name="myForm">
      @csrf
      
      <!-- Display validation errors -->
      @if ($errors->any())
        <div class="alert alert-danger mb-4" role="alert">
          <h6><i class="fas fa-exclamation-triangle me-2"></i>Please correct the following errors:</h6>
          <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- Display success message -->
      @if (session('success'))
        <div class="alert alert-success mb-4" role="alert">
          <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
      @endif

      <!-- Display error message -->
      @if (session('error'))
        <div class="alert alert-danger mb-4" role="alert">
          <i class="fas fa-times-circle me-2"></i>{{ session('error') }}
        </div>
      @endif
      <!-- Personal Details -->
      <div class="card">
        <div class="card-header align-items-center d-flex">
          <h4 class="card-title mb-0 flex-grow-1"><i class="fas fa-user me-2"></i>Personal Details</h4>
        </div>
        <div class="card-body">
          <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
              <label for="name" class="form-label">Name (As per QID/Passport)</label>
              <div class="input-with-icon">
                <i class="fas fa-user-circle"></i>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
              </div>
              @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label class="form-label">Gender</label>
              <div class="d-flex mt-2">
                <div class="form-check me-4">
                  <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" value="Male" id="genderMale" {{ old('gender') == 'Male' ? 'checked' : '' }} required>
                  <label class="form-check-label" for="genderMale"><i class="fas fa-mars me-1" style="color: var(--primary-color);"></i> Male</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" value="Female" id="genderFemale" {{ old('gender') == 'Female' ? 'checked' : '' }}>
                  <label class="form-check-label" for="genderFemale"><i class="fas fa-venus me-1" style="color: var(--secondary-color);"></i> Female</label>
                </div>
              </div>
              @error('gender')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="dob" class="form-label">Date of Birth</label>
              <div class="input-with-icon">
                <i class="fas fa-calendar-alt"></i>
                <input type="text" class="form-control datepicker @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob') }}" required>
              </div>
              @error('dob')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="blood_group" class="form-label">Blood Group</label>
              <div class="input-with-icon">
                <i class="fas fa-tint"></i>
                <select class="form-select @error('blood_group') is-invalid @enderror" name="blood_group" id="blood_group" required>
                  <option value="">Select Blood Group</option>
                  <option value="A+" {{ old('blood_group') == 'A+' ? 'selected' : '' }}>A+</option>
                  <option value="A-" {{ old('blood_group') == 'A-' ? 'selected' : '' }}>A-</option>
                  <option value="B+" {{ old('blood_group') == 'B+' ? 'selected' : '' }}>B+</option>
                  <option value="B-" {{ old('blood_group') == 'B-' ? 'selected' : '' }}>B-</option>
                  <option value="O+" {{ old('blood_group') == 'O+' ? 'selected' : '' }}>O+</option>
                  <option value="O-" {{ old('blood_group') == 'O-' ? 'selected' : '' }}>O-</option>
                  <option value="AB+" {{ old('blood_group') == 'AB+' ? 'selected' : '' }}>AB+</option>
                  <option value="AB-" {{ old('blood_group') == 'AB-' ? 'selected' : '' }}>AB-</option>
                </select>
              </div>
              @error('blood_group')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="email" class="form-label">Email</label>
              <div class="input-with-icon">
                <i class="fas fa-envelope"></i>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
              </div>
              @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="location" class="form-label">Location</label>
              <div class="input-with-icon">
                <i class="fas fa-map-marker-alt"></i>
                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}" required>
              </div>
              @error('location')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="zone_number" class="form-label">Zone Number</label>
              <div class="input-with-icon">
                <i class="fas fa-map"></i>
                <input type="text" class="form-control @error('zone_number') is-invalid @enderror" id="zone_number" name="zone_number" value="{{ old('zone_number') }}" required>
              </div>
              @error('zone_number')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="street_num" class="form-label">Street Number</label>
              <div class="input-with-icon">
                <i class="fas fa-road"></i>
                <input type="text" class="form-control @error('street_num') is-invalid @enderror" id="street_num" name="street_num" value="{{ old('street_num') }}" required>
              </div>
              @error('street_num')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="building_num" class="form-label">Building Number</label>
              <div class="input-with-icon">
                <i class="fas fa-building"></i>
                <input type="text" class="form-control @error('building_num') is-invalid @enderror" id="building_num" name="building_num" value="{{ old('building_num') }}" required>
              </div>
              @error('building_num')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="landmark" class="form-label">Landmark</label>
              <div class="input-with-icon">
                <i class="fas fa-landmark"></i>
                <input type="text" class="form-control @error('landmark') is-invalid @enderror" id="landmark" name="landmark" value="{{ old('landmark') }}">
              </div>
              @error('landmark')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-lg-4 col-md-6">
              <label for="idcard_type" class="form-label">ID Card Type</label>
              <div class="input-with-icon">
                <i class="fas fa-id-card"></i>
                <select class="form-select @error('idcard_type') is-invalid @enderror" name="idcard_type" id="idcard_type" required>
                  <option value="">Select ID Card Type</option>
                  <option value="QID" {{ old('idcard_type') == 'QID' ? 'selected' : '' }}>QID</option>
                  <option value="Passport" {{ old('idcard_type') == 'Passport' ? 'selected' : '' }}>Passport</option>
                </select>
              </div>
              @error('idcard_type')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="idcard_num" class="form-label">ID Card Number</label>
              <div class="input-with-icon">
                <i class="fas fa-hashtag"></i>
                <input type="text" class="form-control @error('idcard_num') is-invalid @enderror" id="idcard_num" name="idcard_num" value="{{ old('idcard_num') }}" required>
              </div>
              @error('idcard_num')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
      </div>

      <!-- Family Details -->
      <div class="card">
        <div class="card-header align-items-center d-flex">
          <h4 class="card-title mb-0 flex-grow-1"><i class="fas fa-users me-2"></i>Family Details</h4>
        </div>
        <div class="card-body">
          <div class="row gy-4">
            <!-- Father Details -->
            <div class="col-md-12">
              <h5 class="form-section"><i class="fas fa-male"></i>Father's Details</h5>
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="father_name" class="form-label">Father Name (As per QID/Passport)</label>
              <div class="input-with-icon">
                <i class="fas fa-user"></i>
                <input type="text" class="form-control @error('father_name') is-invalid @enderror" id="father_name" name="father_name" value="{{ old('father_name') }}" required>
              </div>
              @error('father_name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="father_mobile" class="form-label">Father Mobile</label>
              <div class="input-with-icon">
                <i class="fas fa-mobile-alt"></i>
                <input type="tel" class="form-control @error('father_mobile') is-invalid @enderror" id="father_mobile" name="father_mobile" value="{{ old('father_mobile') }}" required>
              </div>
              @error('father_mobile')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="father_whatsapp" class="form-label">Father Whatsapp Number</label>
              <div class="input-with-icon">
                <i class="fab fa-whatsapp"></i>
                <input type="tel" class="form-control @error('father_whatsapp') is-invalid @enderror" id="father_whatsapp" name="father_whatsapp" value="{{ old('father_whatsapp') }}">
              </div>
              @error('father_whatsapp')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="father_occupation" class="form-label">Father Occupation</label>
              <div class="input-with-icon">
                <i class="fas fa-briefcase"></i>
                <input type="text" class="form-control @error('father_occupation') is-invalid @enderror" id="father_occupation" name="father_occupation" value="{{ old('father_occupation') }}">
              </div>
              @error('father_occupation')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="father_idcard_type" class="form-label">Father ID Card Type</label>
              <div class="input-with-icon">
                <i class="fas fa-id-card"></i>
                <select class="form-select @error('father_idcard_type') is-invalid @enderror" name="father_idcard_type" id="father_idcard_type">
                  <option value="">Select ID Card Type</option>
                  <option value="QID" {{ old('father_idcard_type') == 'QID' ? 'selected' : '' }}>QID</option>
                  <option value="Passport" {{ old('father_idcard_type') == 'Passport' ? 'selected' : '' }}>Passport</option>
                </select>
              </div>
              @error('father_idcard_type')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="father_idcard_num" class="form-label">Father ID Card Number</label>
              <div class="input-with-icon">
                <i class="fas fa-hashtag"></i>
                <input type="text" class="form-control @error('father_idcard_num') is-invalid @enderror" id="father_idcard_num" name="father_idcard_num" value="{{ old('father_idcard_num') }}">
              </div>
              @error('father_idcard_num')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <!-- Mother Details -->
            <div class="col-md-12 mt-3">
              <h5 class="form-section"><i class="fas fa-female"></i>Mother's Details</h5>
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="mother_name" class="form-label">Mother Name (As per QID/Passport)</label>
              <div class="input-with-icon">
                <i class="fas fa-user"></i>
                <input type="text" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name" name="mother_name" value="{{ old('mother_name') }}" required>
              </div>
              @error('mother_name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="mother_mobile" class="form-label">Mother Mobile</label>
              <div class="input-with-icon">
                <i class="fas fa-mobile-alt"></i>
                <input type="tel" class="form-control @error('mother_mobile') is-invalid @enderror" id="mother_mobile" name="mother_mobile" value="{{ old('mother_mobile') }}" required>
              </div>
              @error('mother_mobile')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="mother_whatsapp" class="form-label">Mother Whatsapp Number</label>
              <div class="input-with-icon">
                <i class="fab fa-whatsapp"></i>
                <input type="tel" class="form-control @error('mother_whatsapp') is-invalid @enderror" id="mother_whatsapp" name="mother_whatsapp" value="{{ old('mother_whatsapp') }}">
              </div>
              @error('mother_whatsapp')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="mother_occupation" class="form-label">Mother Occupation</label>
              <div class="input-with-icon">
                <i class="fas fa-briefcase"></i>
                <input type="text" class="form-control @error('mother_occupation') is-invalid @enderror" id="mother_occupation" name="mother_occupation" value="{{ old('mother_occupation') }}">
              </div>
              @error('mother_occupation')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="mother_idcard_type" class="form-label">Mother ID Card Type</label>
              <div class="input-with-icon">
                <i class="fas fa-id-card"></i>
                <select class="form-select @error('mother_idcard_type') is-invalid @enderror" name="mother_idcard_type" id="mother_idcard_type">
                  <option value="">Select ID Card Type</option>
                  <option value="QID" {{ old('mother_idcard_type') == 'QID' ? 'selected' : '' }}>QID</option>
                  <option value="Passport" {{ old('mother_idcard_type') == 'Passport' ? 'selected' : '' }}>Passport</option>
                </select>
              </div>
              @error('mother_idcard_type')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="mother_idcard_num" class="form-label">Mother ID Card Number</label>
              <div class="input-with-icon">
                <i class="fas fa-hashtag"></i>
                <input type="text" class="form-control @error('mother_idcard_num') is-invalid @enderror" id="mother_idcard_num" name="mother_idcard_num" value="{{ old('mother_idcard_num') }}">
              </div>
              @error('mother_idcard_num')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
      </div>

      <!-- Academic Details -->
      <div class="card">
        <div class="card-header align-items-center d-flex">
          <h4 class="card-title mb-0 flex-grow-1"><i class="fas fa-book me-2"></i>Academic Details</h4>
        </div>
        <div class="card-body">
          <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
              <label for="class_admission" class="form-label">Admission to Which Class is Required</label>
              <div class="input-with-icon">
                <i class="fas fa-school"></i>
                <select class="form-select @error('class_admission') is-invalid @enderror" name="class_admission" id="class_admission" required>
                  <option value="">Select Class</option>
                  <option value="18" {{ old('class_admission') == '18' ? 'selected' : '' }}>1</option>
                  <option value="20" {{ old('class_admission') == '20' ? 'selected' : '' }}>2</option>
                  <option value="22" {{ old('class_admission') == '22' ? 'selected' : '' }}>3</option>
                  <option value="23" {{ old('class_admission') == '23' ? 'selected' : '' }}>4</option>
                  <option value="24" {{ old('class_admission') == '24' ? 'selected' : '' }}>5</option>
                  <option value="25" {{ old('class_admission') == '25' ? 'selected' : '' }}>6</option>
                  <option value="26" {{ old('class_admission') == '26' ? 'selected' : '' }}>7</option>
                  <option value="27" {{ old('class_admission') == '27' ? 'selected' : '' }}>8</option>
                </select>
              </div>
              @error('class_admission')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="current_madrasa" class="form-label">Currently studying Madrasa Name</label>
              <div class="input-with-icon">
                <i class="fas fa-mosque"></i>
                <input type="text" class="form-control @error('current_madrasa') is-invalid @enderror" id="current_madrasa" name="current_madrasa" value="{{ old('current_madrasa') }}">
              </div>
              @error('current_madrasa')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="current_school" class="form-label">Currently studying School Name</label>
              <div class="input-with-icon">
                <i class="fas fa-school"></i>
                <input type="text" class="form-control @error('current_school') is-invalid @enderror" id="current_school" name="current_school" value="{{ old('current_school') }}">
              </div>
              @error('current_school')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-lg-4 col-md-6">
              <label for="transportation" class="form-label">Transportation Required <br><span class="note">(At present No transportation; This ask is for Transportation requirement Survey)</span></label>
              <div class="input-with-icon">
                <i class="fas fa-bus"></i>
                <select class="form-select @error('transportation') is-invalid @enderror" name="transportation" id="transportation">
                  <option value="">Select</option>
                  <option value="YES" {{ old('transportation') == 'YES' ? 'selected' : '' }}>YES</option>
                  <option value="NO" {{ old('transportation') == 'NO' ? 'selected' : '' }}>NO</option>
                </select>
              </div>
              @error('transportation')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
      </div>

      <div class="text-end mb-4">
        <button id="submit" name="submit" type="submit" class="btn btn-primary">
          <i class="fas fa-check-circle me-2"></i>Submit Application
        </button>
      </div>
    </form>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {

      // Initialize date picker
      flatpickr(".datepicker", {
        dateFormat: "d-m-Y",
        defaultDate: new Date()
      });

      // // Form submission
      // document.getElementById("admissionForm").addEventListener("submit", function(e) {
      //   e.preventDefault();

      //   // Custom validation
      //   let isValid = validateForm();

      //   if (isValid) {
      //     // Use a direct reference to the form instead of "this"
      //     const form = document.getElementById("admissionForm");
      //     // Remove the event listener before submitting to prevent recursion
      //     form.removeEventListener('submit', arguments.callee);
      //     // Submit the form using the native method
      //     form.submit();
      //   }
      // });

      // Form submission
      // document.getElementById("admissionForm").addEventListener("submit", function(e) {
      //   e.preventDefault();

      //   // Custom validation
      //   let isValid = validateForm();

      //   if (isValid) {
      //     // Just use traditional form submission by setting a flag
      //     this._isValidated = true;
      //     // Then re-submit the form which will bypass our validation
      //     this.submit(); // This will work if we don't have an element named "submit"
      //   }
      // });

      function validateForm() {
        // Simple validation logic
        const requiredFields = document.querySelectorAll('[required]');
        let valid = true;

        requiredFields.forEach(field => {
          if (!field.value.trim()) {
            field.classList.add('is-invalid');
            valid = false;
          } else {
            field.classList.remove('is-invalid');
          }
        });

        // Check if gender is selected
        const genderSelected = document.querySelector('input[name="gender"]:checked');
        if (!genderSelected) {
          document.getElementById('genderMale').parentElement.classList.add('is-invalid');
          valid = false;
        }

        // If validation fails, scroll to the first error
        if (!valid) {
          const firstInvalid = document.querySelector('.is-invalid');
          if (firstInvalid) {
            firstInvalid.scrollIntoView({
              behavior: 'smooth',
              block: 'center'
            });
          }
        }

        return valid;
      }

      // Clear validation errors when user inputs data
      document.querySelectorAll('.form-control, .form-select, .form-check-input').forEach(element => {
        element.addEventListener('input', function() {
          this.classList.remove('is-invalid');
          if (this.closest('.input-with-icon')) {
            this.closest('.input-with-icon').classList.remove('is-invalid');
          }
        });
      });

      // Add animation effects on scroll
      const animateOnScroll = () => {
        const elements = document.querySelectorAll('.card');
        elements.forEach(element => {
          const elementPosition = element.getBoundingClientRect().top;
          const windowHeight = window.innerHeight;

          if (elementPosition < windowHeight - 100) {
            element.style.opacity = '1';
          }
        });
      };

      // Initial state for cards (for animation)
      document.querySelectorAll('.card').forEach(card => {
        card.style.opacity = '0';
        card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
      });

      // Run animation function on load and scroll
      window.addEventListener('load', animateOnScroll);
      window.addEventListener('scroll', animateOnScroll);
    });
  </script>
</body>

</html>