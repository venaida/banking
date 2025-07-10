
<?php
// PHP array of all countries
$countries = array(
    'Afghanistan',
    'Albania',
    'Algeria',
    'Andorra',
    'Angola',
    'Antigua and Barbuda',
    'Argentina',
    'Armenia',
    'Australia',
    'Austria',
    'Azerbaijan',
    'Bahamas',
    'Bahrain',
    'Bangladesh',
    'Barbados',
    'Belarus',
    'Belgium',
    'Belize',
    'Benin',
    'Bhutan',
    'Bolivia',
    'Bosnia and Herzegovina',
    'Botswana',
    'Brazil',
    'Brunei',
    'Bulgaria',
    'Burkina Faso',
    'Burundi',
    'Cabo Verde',
    'Cambodia',
    'Cameroon',
    'Canada',
    'Central African Republic',
    'Chad',
    'Chile',
    'China',
    'Colombia',
    'Comoros',
    'Congo (Brazzaville)',
    'Congo (Kinshasa)',
    'Costa Rica',
    'Côte d’Ivoire',
    'Croatia',
    'Cuba',
    'Cyprus',
    'Czechia',
    'Denmark',
    'Djibouti',
    'Dominica',
    'Dominican Republic',
    'Ecuador',
    'Egypt',
    'El Salvador',
    'Equatorial Guinea',
    'Eritrea',
    'Estonia',
    'Eswatini',
    'Ethiopia',
    'Fiji',
    'Finland',
    'France',
    'Gabon',
    'Gambia',
    'Georgia',
    'Germany',
    'Ghana',
    'Greece',
    'Grenada',
    'Guatemala',
    'Guinea',
    'Guinea-Bissau',
    'Guyana',
    'Haiti',
    'Holy See',
    'Honduras',
    'Hungary',
    'Iceland',
    'India',
    'Indonesia',
    'Iran',
    'Iraq',
    'Ireland',
    'Israel',
    'Italy',
    'Jamaica',
    'Japan',
    'Jordan',
    'Kazakhstan',
    'Kenya',
    'Kiribati',
    'Korea, North',
    'Korea, South',
    'Kuwait',
    'Kyrgyzstan',
    'Laos',
    'Latvia',
    'Lebanon',
    'Lesotho',
    'Liberia',
    'Libya',
    'Liechtenstein',
    'Lithuania',
    'Luxembourg',
    'Madagascar',
    'Malawi',
    'Malaysia',
    'Maldives',
    'Mali',
    'Malta',
    'Marshall Islands',
    'Mauritania',
    'Mauritius',
    'Mexico',
    'Micronesia',
    'Moldova',
    'Monaco',
    'Mongolia',
    'Montenegro',
    'Morocco',
    'Mozambique',
    'Myanmar (Burma)',
    'Namibia',
    'Nauru',
    'Nepal',
    'Netherlands',
    'New Zealand',
    'Nicaragua',
    'Niger',
    'Nigeria',
    'North Macedonia',
    'Norway',
    'Oman',
    'Pakistan',
    'Palau',
    'Palestine',
    'Panama',
    'Papua New Guinea',
    'Paraguay',
    'Peru',
    'Philippines',
    'Poland',
    'Portugal',
    'Qatar',
    'Romania',
    'Russia',
    'Rwanda',
    'Saint Kitts and Nevis',
    'Saint Lucia',
    'Saint Vincent and the Grenadines',
    'Samoa',
    'San Marino',
    'Sao Tome and Principe',
    'Saudi Arabia',
    'Senegal',
    'Serbia',
    'Seychelles',
    'Sierra Leone',
    'Singapore',
    'Slovakia',
    'Slovenia',
    'Solomon Islands',
    'Somalia',
    'South Africa',
    'South Sudan',
    'Spain',
    'Sri Lanka',
    'Sudan',
    'Suriname',
    'Sweden',
    'Switzerland',
    'Syria',
    'Taiwan',
    'Tajikistan',
    'Tanzania',
    'Thailand',
    'Timor-Leste',
    'Togo',
    'Tonga',
    'Trinidad and Tobago',
    'Tunisia',
    'Turkey',
    'Turkmenistan',
    'Tuvalu',
    'Uganda',
    'Ukraine',
    'United Arab Emirates',
    'United Kingdom',
    'United States of America',
    'Uruguay',
    'Uzbekistan',
    'Vanuatu',
    'Vatican City',
    'Venezuela',
    'Vietnam',
    'Yemen',
    'Zambia',
    'Zimbabwe'
);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register an Account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    <style>

    h2 {
        text-align: center;
        color: #b6922e;
        margin-bottom: 25px;
        font-size: 28px;
    }

    form {
        display: flex;
        flex-direction: column;
        background-image: url('images/bg.png'); /* Background image */
        background-size: cover; /* Make the image cover the entire form */
        background-position: center; /* Center the image */
        background-repeat: no-repeat; /* Avoid image repetition */
        padding: 30px;
        border-radius: 12px; /* Give the form rounded corners */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        background-color: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

   

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin: 10px 0 5px;
        font-weight: bold;
        color: #333;
    }

    input, select {
        padding: 15px;
        border: 3px solid #b6922e;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 16px;
        background: #fff;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        width: 100%; /* Ensure full width for inputs */
        box-sizing: border-box; /* Include padding in width */
    }

    input:focus, select:focus {
        border-color: #a08123;
        background: #fafafa;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        outline: none;
    }

    input:hover, select:hover {
        border-color: #a08123;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    input::placeholder {
        color: #999;
        font-size: 14px;
    }

    input[type="submit"] {
        background-color: #b6922e;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 18px;
        padding: 15px;
        border-radius: 8px;
        font-weight: bold; /* Bold text for the register button */
        transition: background-color 0.3s;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    input[type="submit"]:hover {
        background-color: #a08123; /* Darker color on hover */
    }

    /* Popup Styles */
    .popup {
        display: none; /* Hidden by default */
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .popup-content {
        background-color: #fff;
        padding: 30px;
        border-radius: 12px;
        text-align: center;
        width: 350px; /* Fixed width for popup */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    }

    .popup-button {
        background-color: #b6922e;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        cursor: pointer;
        margin: 10px 0;
        font-size: 16px;
        transition: background-color 0.3s;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .popup-button:hover {
        background-color: #a08123; /* Darker color on hover */
    }

    /* Responsive Design */
    @media (max-width: 600px) {
        .container {
            padding: 20px; /* Adjust padding for mobile */
        }

        .popup-content {
            width: 90%; /* Popup adapts to smaller screens */
        }
    }
    </style>

</head>
<body>

<div class="container">
    <img src="images/logo.png" alt="" style="height: 3rem;">
    <h2>Create an Account</h2>
    <form id="registrationForm" method="POST" action="register.php">
        <label for="firstName">Customer's First Name</label>
        <input type="text" id="firstName" name="firstName" placeholder="Enter your first name" required>

        <label for="lastName">Customer's Last Name</label>
        <input type="text" id="lastName" name="lastName" placeholder="Enter your last name" required>

        <label for="phone">Customer's Phone</label>
        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email address" required>

        <label for="country">Select Country</label>
        <select id="country" name="country" required>
            <option value="">--Select Country--</option>
             <?php
            // Generate country options
            foreach ($countries as $country) {
                echo '<option value="' . htmlspecialchars($country) . '">' . htmlspecialchars($country) . '</option>';
            }
            ?>
            <!-- Add more options as needed -->
        </select>



<label for="state">Enter State</label>
        <input type="text" id="state" name="state" placeholder="Enter your state" required>


        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" required>

        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
            <option value="">--Select Gender--</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>

        <label for="city">Enter City</label>
        <input type="text" id="city" name="city" placeholder="Enter your city" required>

        <label for="loginId">Login ID</label>
        <input type="text" id="loginId" name="loginId" placeholder="Create a login ID" required>

        <label for="loginPassword">Login Password</label>
        <input type="password" id="loginPassword" name="loginPassword" placeholder="Create a login password" required>

        <label for="transactionPassword">Transaction Password</label>
        <input type="password" id="transactionPassword" name="transactionPassword" placeholder="Create a transaction password" required>

        <label for="bankBranch">Select Bank Branch</label>
        <select id="bankBranch" name="bankBranch" required>
    <!-- US Branch -->
    <option value="Main Branch - New York City, USA">Main Branch - New York City, USA</option>

    <!-- China Branch -->
    <option value="Main Branch - Beijing, China">Main Branch - Beijing, China</option>

    <!-- Germany Branch -->
    <option value="Main Branch - Berlin, Germany">Main Branch - Berlin, Germany</option>

    <!-- UK Branch -->
    <option value="Main Branch - London, UK">Main Branch - London, UK</option>

    <!-- France Branch -->
    <option value="Main Branch - Paris, France">Main Branch - Paris, France</option>

    <!-- Japan Branch -->
    <option value="Main Branch - Tokyo, Japan">Main Branch - Tokyo, Japan</option>

    <!-- Australia Branch -->
    <option value="Main Branch - Sydney, Australia">Main Branch - Sydney, Australia</option>

    <!-- Canada Branch -->
    <option value="Main Branch - Toronto, Canada">Main Branch - Toronto, Canada</option>

    <!-- South Africa Branch -->
    <option value="Main Branch - Johannesburg, South Africa">Main Branch - Johannesburg, South Africa</option>

    <!-- UAE Branch -->
    <option value="Main Branch - Dubai, UAE">Main Branch - Dubai, UAE</option>

    <!-- Singapore Branch -->
    <option value="Main Branch - Singapore">Main Branch - Singapore</option>

    <!-- India Branch -->
    <option value="Main Branch - Mumbai, India">Main Branch - Mumbai, India</option>

    <!-- Brazil Branch -->
    <option value="Main Branch - São Paulo, Brazil">Main Branch - São Paulo, Brazil</option>

    <!-- Mexico Branch -->
    <option value="Main Branch - Mexico City, Mexico">Main Branch - Mexico City, Mexico</option>

    <!-- Italy Branch -->
    <option value="Main Branch - Rome, Italy">Main Branch - Rome, Italy</option>

    <!-- Russia Branch -->
    <option value="Main Branch - Moscow, Russia">Main Branch - Moscow, Russia</option>

    <!-- Nigeria Branch -->
    <option value="Main Branch - Lagos, Nigeria">Main Branch - Lagos, Nigeria</option>

    <!-- Argentina Branch -->
    <option value="Main Branch - Buenos Aires, Argentina">Main Branch - Buenos Aires, Argentina</option>

    <!-- South Korea Branch -->
    <option value="Main Branch - Seoul, South Korea">Main Branch - Seoul, South Korea</option>

    <!-- Spain Branch -->
    <option value="Main Branch - Madrid, Spain">Main Branch - Madrid, Spain</option>

    <!-- Kenya Branch -->
    <option value="Main Branch - Nairobi, Kenya">Main Branch - Nairobi, Kenya</option>

    <!-- Egypt Branch -->
    <option value="Main Branch - Cairo, Egypt">Main Branch - Cairo, Egypt</option>

    <!-- Saudi Arabia Branch -->
    <option value="Main Branch - Riyadh, Saudi Arabia">Main Branch - Riyadh, Saudi Arabia</option>

    <!-- Turkey Branch -->
    <option value="Main Branch - Istanbul, Turkey">Main Branch - Istanbul, Turkey</option>

    <!-- Switzerland Branch -->
    <option value="Main Branch - Zurich, Switzerland">Main Branch - Zurich, Switzerland</option>

    <!-- Netherlands Branch -->
    <option value="Main Branch - Amsterdam, Netherlands">Main Branch - Amsterdam, Netherlands</option>

    <!-- Sweden Branch -->
    <option value="Main Branch - Stockholm, Sweden">Main Branch - Stockholm, Sweden</option>

    <!-- New Zealand Branch -->
    <option value="Main Branch - Auckland, New Zealand">Main Branch - Auckland, New Zealand</option>

    <!-- Norway Branch -->
    <option value="Main Branch - Oslo, Norway">Main Branch - Oslo, Norway</option>

    <!-- Malaysia Branch -->
    <option value="Main Branch - Kuala Lumpur, Malaysia">Main Branch - Kuala Lumpur, Malaysia</option>

    <!-- Indonesia Branch -->
    <option value="Main Branch - Jakarta, Indonesia">Main Branch - Jakarta, Indonesia</option>

    <!-- Philippines Branch -->
    <option value="Main Branch - Manila, Philippines">Main Branch - Manila, Philippines</option>

    <!-- Thailand Branch -->
    <option value="Main Branch - Bangkok, Thailand">Main Branch - Bangkok, Thailand</option>

    <!-- Vietnam Branch -->
    <option value="Main Branch - Ho Chi Minh City, Vietnam">Main Branch - Ho Chi Minh City, Vietnam</option>

    <!-- Portugal Branch -->
    <option value="Main Branch - Lisbon, Portugal">Main Branch - Lisbon, Portugal</option>

    <!-- Greece Branch -->
    <option value="Main Branch - Athens, Greece">Main Branch - Athens, Greece</option>

    <!-- Israel Branch -->
    <option value="Main Branch - Tel Aviv, Israel">Main Branch - Tel Aviv, Israel</option>

    <!-- Chile Branch -->
    <option value="Main Branch - Santiago, Chile">Main Branch - Santiago, Chile</option>

    <!-- Colombia Branch -->
    <option value="Main Branch - Bogotá, Colombia">Main Branch - Bogotá, Colombia</option>

    <!-- Venezuela Branch -->
    <option value="Main Branch - Caracas, Venezuela">Main Branch - Caracas, Venezuela</option>

    <!-- Peru Branch -->
    <option value="Main Branch - Lima, Peru">Main Branch - Lima, Peru</option>
</select>

        <label for="accountType">Select Account Type</label>
        <select id="accountType" name="accountType" required>
            <option value="Savings Account">Savings Account</option>
            <option value="Current Account">Current Account</option>
            <option value="Fixed Deposit Account">Fixed Deposit Account</option>
            <option value="Joint Account">Joint Account</option>
            <option value="Business Account">Business Account</option>
            <option value="Student Account">Student Account</option>
            <option value="Health Savings Account (HSA)">Health Savings Account (HSA)</option>
            <option value="Offshore Account">Offshore Account</option>
            <option value="Money Market Account">Money Market Account</option>
            <option value="Retirement Account">Retirement Account</option>
        </select>

        <input type="submit" value="Register">
    </form>
</div>

<!-- Popup -->
<div class="popup" id="popup">
    <div class="popup-content">
        <h2>Thank You!</h2>
        <p>Your registration is successful!</p>
        <p>Your account is currently pending verification. Once 
        <b>approved,</b> you will receive your login details via email.</p>
        <button class="popup-button" id="closePopup">Close</button>
        <button class="popup-button" onclick="location.href='login.php'">Login</button>

    </div>
</div>

<script>
    // Handle form submission using AJAX
    document.getElementById("registrationForm").onsubmit = function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Prepare form data for submission
        const formData = new FormData(this);

        // Send the form data using AJAX
        fetch(this.action, {
            method: this.method,
            body: formData
        })
        .then(response => {
            if (response.ok) {
                // Show the popup on successful registration
                document.getElementById("popup").style.display = "flex"; // Show the popup
                launchConfetti(); // Start the confetti animation
            } else {
                alert("Registration failed. Please try again.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("There was an error with your submission. Please try again.");
        });
    };

    // Close the popup
    document.getElementById("closePopup").onclick = function() {
        document.getElementById("popup").style.display = "none"; // Hide the popup
    };

    // Function to launch confetti
    function launchConfetti() {
        const duration = 5 * 1000; // Duration of the confetti in milliseconds
        const animationEnd = Date.now() + duration;

        const interval = setInterval(() => {
            // Launch random confetti
            confetti({
                particleCount: 100,
                startVelocity: 30,
                spread: 360,
                ticks: 60,
                origin: { x: Math.random(), y: Math.random() - 0.2 }
            });

            if (Date.now() > animationEnd) {
                clearInterval(interval);
            }
        }, 250); // Adjust the interval for how frequently to release confetti
    }
</script>

</body>
</html>