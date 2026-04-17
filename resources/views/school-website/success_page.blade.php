<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Qatar Kerala Islahi Center - Admission Success</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
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
      display: flex;
      align-items: center;
      justify-content: center;
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

    .success-container {
      max-width: 800px;
      width: 100%;
      padding: 40px 20px;
      text-align: center;
      position: relative;
    }

    .logo-container {
      width: 300px;
      height: 100px;
      margin: 0 auto 30px;
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

    .success-card {
      background-color: white;
      border-radius: var(--radius-md);
      box-shadow: var(--shadow-lg);
      padding: 40px;
      position: relative;
      overflow: hidden;
      animation: fadeIn 1s ease-out;
    }

    .success-icon {
      font-size: 80px;
      color: var(--success-color);
      margin-bottom: 20px;
      animation: scaleIn 0.5s ease-out;
    }

    .success-title {
      font-size: 28px;
      font-weight: 600;
      color: var(--primary-color);
      margin-bottom: 15px;
    }

    .admission-number {
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
      color: white;
      padding: 15px 30px;
      border-radius: var(--radius-md);
      font-size: 24px;
      font-weight: 700;
      display: inline-block;
      margin: 20px 0;
      box-shadow: var(--shadow-md);
      letter-spacing: 1px;
    }

    .message {
      font-size: 18px;
      line-height: 1.6;
      margin-bottom: 30px;
      color: var(--dark-color);
    }

    .btn-action {
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
      border: none;
      padding: 12px 30px;
      font-weight: 500;
      border-radius: var(--radius-sm);
      transition: var(--transition);
      box-shadow: var(--shadow-md);
      color: white;
      text-decoration: none;
      display: inline-block;
      margin: 10px;
    }

    .btn-action:hover {
      background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
      transform: translateY(-3px);
      box-shadow: var(--shadow-lg);
      color: white;
    }
    
    .btn-action i {
      margin-right: 8px;
    }

    .contact-info {
      margin-top: 30px;
      font-size: 16px;
      color: #6c757d;
    }

    .contact-info i {
      margin-right: 5px;
      color: var(--primary-color);
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
      0%, 100% {
        transform: translate(0, 0) rotate(0deg);
      }
      50% {
        transform: translate(15px, 15px) rotate(10deg);
      }
    }

    @keyframes float-2 {
      0%, 100% {
        transform: translate(0, 0) rotate(0deg);
      }
      50% {
        transform: translate(-15px, 15px) rotate(-10deg);
      }
    }

    @keyframes float-3 {
      0%, 100% {
        transform: translate(0, 0) rotate(0deg);
      }
      50% {
        transform: translate(10px, -15px) rotate(5deg);
      }
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes scaleIn {
      0% {
        opacity: 0;
        transform: scale(0.5);
      }
      100% {
        opacity: 1;
        transform: scale(1);
      }
    }

    .important-note {
      background-color: rgba(34, 140, 34, 0.1);
      border-left: 4px solid var(--accent-color);
      padding: 15px;
      margin-top: 25px;
      border-radius: var(--radius-sm);
      text-align: left;
    }

    .important-note strong {
      color: var(--accent-color);
    }

    @media (max-width: 767.98px) {
      .success-card {
        padding: 30px 20px;
      }
      
      .success-title {
        font-size: 24px;
      }
      
      .admission-number {
        font-size: 20px;
        padding: 12px 20px;
      }
      
      .message {
        font-size: 16px;
      }
    }
  </style>
</head>

<body>
  <div class="success-container">
    <div class="floating-decorations">
      <div class="decoration-1"></div>
      <div class="decoration-2"></div>
      <div class="decoration-3"></div>
    </div>

    <div class="logo-container">
      <img src="https://portal.qkic.org/storage///66cf834dc48378.063146731724875597.png" alt="Qatar Kerala Islahi Center Logo">
    </div>

    <div class="success-card">
      <div class="success-icon">
        <i class="fas fa-check-circle"></i>
      </div>
      
      <h1 class="success-title">Registration Successful!</h1>
      
      <p class="message">
        Thank you for submitting your application to Al Manar Madrasa. 
        Your admission request has been received and is now being processed.
      </p>
      
      <div>
        <p>Your Admission Number is:</p>
        <div class="admission-number" id="admissionNumber">
          <span id="randomNum">{{$admission_no}}</span>
        </div>
      </div>
      
      <!-- <p class="message">
        Please save this number for future reference. You will need this admission number for all 
        communication regarding your application.
      </p>
      <div class="contact-info">
        <p><i class="fas fa-envelope"></i> Email: info@qkic.org</p>
        <p><i class="fas fa-phone"></i> Phone: +974 xxxx xxxx</p>
      </div> -->
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get admission number from URL parameters if available
      const urlParams = new URLSearchParams(window.location.search);
      const admissionId = urlParams.get('admission_id');
      
      if (admissionId) {
        // If admission ID is in URL, use it
        document.getElementById('randomNum').textContent = admissionId;
      } else {
        // Otherwise generate a random 5-digit number for display purposes
        // In a real application, this would come from the backend
        const randomNum = Math.floor(10000 + Math.random() * 90000);
        document.getElementById('randomNum').textContent = randomNum;
      }
      
      // Add confetti effect for a celebratory feel
      // This is a simplified version for demonstration
      function createConfetti() {
        const colors = ['#900838', '#f67f00', '#228c22', '#FFD700'];
        
        for (let i = 0; i < 100; i++) {
          const confetti = document.createElement('div');
          confetti.style.position = 'fixed';
          confetti.style.zIndex = '1000';
          confetti.style.width = Math.random() * 10 + 5 + 'px';
          confetti.style.height = Math.random() * 10 + 5 + 'px';
          confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
          confetti.style.opacity = Math.random();
          confetti.style.pointerEvents = 'none';
          
          // Random starting position at the top
          confetti.style.left = Math.random() * 100 + 'vw';
          confetti.style.top = '-20px';
          
          document.body.appendChild(confetti);
          
          // Animate falling with some randomness
          const duration = Math.random() * 3 + 2;
          const delay = Math.random() * 2;
          
          confetti.style.transition = `top ${duration}s ease ${delay}s, 
                                      left ${duration}s ease ${delay}s, 
                                      opacity ${duration}s ease ${delay}s`;
                                      
          setTimeout(() => {
            confetti.style.top = '100vh';
            confetti.style.left = (parseInt(confetti.style.left) + (Math.random() * 20 - 10)) + 'px';
            confetti.style.opacity = '0';
            
            // Remove confetti element after animation
            setTimeout(() => {
              confetti.remove();
            }, duration * 1000 + delay * 1000);
          }, 10);
        }
      }
      
      // Create confetti effect
      createConfetti();
    });
  </script>
</body>

</html>