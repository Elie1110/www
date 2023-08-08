<!DOCTYPE html>
<?php
include("PHP/connection.php");

// Check if the user is logged in (assuming you store a flag in the session after successful login)
$loggedIn = isset($_SESSION['email']);

if ($loggedIn) {
    // Redirect the user to the login page
    header("Location: home.php");
    exit();
}
?>
<html lang="en">
<head>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
    crossorigin="anonymous"
  />
  <link rel="stylesheet" href="CSS/login.css" />
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login page</title>
</head>
<body>
  <div class="title">
    <h3 class="text-primary">Sign up</h3>
  </div>
  <div class="container">
    <div class="card text-center" style="width: 18rem">
      <div class="card-body">
        <h5 class="card-title mb-4">New account</h5>
        <form action="PHP/signup.php" method="POST">
          <div class="mb-3">
            <label for="name">First name <span style="color: red;">*</span></label>
            <input
              type="text"
              id="name"
              name="name"
              placeholder="Name"
              class="form-control"
              required
            />
          </div>
          <div class="mb-3">
            <label for="last_name">Last name <span style="color: red;">*</span></label>
            <input
              type="text"
              id="last_name"
              name="last_name"
              placeholder="Last name"
              class="form-control"
              required
            />
          </div>
          <div class="mb-3">
            <label for="email">Email <span style="color: red;">*</span></label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="Email"
              class="form-control"
              required
            />
          </div>
          <div class="mb-3">
            <label for="phone">Phone number <span style="color: red;">*</span></label>
            <input
              type="text"
              id="phone"
              name="phone"
              placeholder="Phone"
              class="form-control"
              required
            />          
          </div>
          <div class="mb-3">
            <label for="password">Password <span style="color: red;">*</span></label>
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Password"
              class="form-control"
              required
            />
          </div>
          <div class="mb-3">
            <label for="confirm_password">Confirm password <span style="color: red;">*</span></label>
            <input
              type="password"
              id="confirm_password"
              name="confirm_password"
              placeholder="Confirm password"
              class="form-control"
              required
              oninput="checkPasswordMatch()"
            />
            <p id="password_match_message" style="color: red;"></p>
          </div>

          <button type="submit" class="btn btn-primary mb-2">Sign Up</button>
        </form>
      </div>
    </div>
  </div>

  <script>
    function checkPasswordMatch() {
      const password = document.getElementById("password").value;
      const confirm_password = document.getElementById("confirm_password").value;
      const password_match_message = document.getElementById("password_match_message");

      if (password !== confirm_password) {
        password_match_message.textContent = "Passwords do not match";
      } else {
        password_match_message.textContent = "";
      }
    }

    // Chargement des options pour les pays
    window.addEventListener("DOMContentLoaded", function() {
      const countrySelect = document.getElementById("country");
      const countries = [
        "Afghanistan",
        "Åland Islands",
        "Albania",
        "Algeria",
        "American Samoa",
        "Andorra",
        "Angola",
        "Anguilla",
        "Antarctica",
        "Antigua and Barbuda",
        "Argentina",
        "Armenia",
        "Aruba",
        "Australia",
        "Austria",
        "Azerbaijan",
        "Bahamas",
        "Bahrain",
        "Bangladesh",
        "Barbados",
        "Belarus",
        "Belgium",
        "Belize",
        "Benin",
        "Bermuda",
        "Bhutan",
        "Bolivia",
        "Bosnia and Herzegovina",
        "Botswana",
        "Bouvet Island",
        "Brazil",
        "British Indian Ocean Territory",
        "Brunei Darussalam",
        "Bulgaria",
        "Burkina Faso",
        "Burundi",
        "Cambodia",
        "Cameroon",
        "Canada",
        "Cape Verde",
        "Cayman Islands",
        "Central African Republic",
        "Chad",
        "Chile",
        "China",
        "Christmas Island",
        "Cocos (Keeling) Islands",
        "Colombia",
        "Comoros",
        "Congo",
        "Congo, The Democratic Republic of The",
        "Cook Islands",
        "Costa Rica",
        "Cote D'ivoire",
        "Croatia",
        "Cuba",
        "Curaçao",
        "Cyprus",
        "Czech Republic",
        "Denmark",
        "Djibouti",
        "Dominica",
        "Dominican Republic",
        "Ecuador",
        "Egypt",
        "El Salvador",
        "Equatorial Guinea",
        "Eritrea",
        "Estonia",
        "Ethiopia",
        "Falkland Islands (Malvinas)",
        "Faroe Islands",
        "Fiji",
        "Finland",
        "France",
        "French Guiana",
        "French Polynesia",
        "French Southern Territories",
        "Gabon",
        "Gambia",
        "Georgia",
        "Germany",
        "Ghana",
        "Gibraltar",
        "Greece",
        "Greenland",
        "Grenada",
        "Guadeloupe",
        "Guam",
        "Guatemala",
        "Guernsey",
        "Guinea",
        "Guinea-bissau",
        "Guyana",
        "Haiti",
        "Heard Island and Mcdonald Islands",
        "Holy See (Vatican City State)",
        "Honduras",
        "Hong Kong",
        "Hungary",
        "Iceland",
        "India",
        "Indonesia",
        "Iran, Islamic Republic of",
        "Iraq",
        "Ireland",
        "Isle of Man",
        "Israel",
        "Italy",
        "Jamaica",
        "Japan",
        "Jersey",
        "Jordan",
        "Kazakhstan",
        "Kenya",
        "Kiribati",
        "Korea, Democratic People's Republic of",
        "Korea, Republic of",
        "Kuwait",
        "Kyrgyzstan",
        "Lao People's Democratic Republic",
        "Latvia",
        "Lebanon",
        "Lesotho",
        "Liberia",
        "Libyan Arab Jamahiriya",
        "Liechtenstein",
        "Lithuania",
        "Luxembourg",
        "Macao",
        "Macedonia, The Former Yugoslav Republic of",
        "Madagascar",
        "Malawi",
        "Malaysia",
        "Maldives",
        "Mali",
        "Malta",
        "Marshall Islands",
        "Martinique",
        "Mauritania",
        "Mauritius",
        "Mayotte",
        "Mexico",
        "Micronesia, Federated States of",
        "Moldova, Republic of",
        "Monaco",
        "Mongolia",
        "Montenegro",
        "Montserrat",
        "Morocco",
        "Mozambique",
        "Myanmar",
        "Namibia",
        "Nauru",
        "Nepal",
        "Netherlands",
        "New Caledonia",
        "New Zealand",
        "Nicaragua",
        "Niger",
        "Nigeria",
        "Niue",
        "Norfolk Island",
        "Northern Mariana Islands",
        "Norway",
        "Oman",
        "Pakistan",
        "Palau",
        "Palestinian Territory, Occupied",
        "Panama",
        "Papua New Guinea",
        "Paraguay",
        "Peru",
        "Philippines",
        "Pitcairn",
        "Poland",
        "Portugal",
        "Puerto Rico",
        "Qatar",
        "Reunion",
        "Romania",
        "Russia",
        "Rwanda",
        "Saint Helena",
        "Saint Kitts and Nevis",
        "Saint Lucia",
        "Saint Pierre and Miquelon",
        "Saint Vincent and The Grenadines",
        "Samoa",
        "San Marino",
        "Sao Tome and Principe",
        "Saudi Arabia",
        "Senegal",
        "Serbia",
        "Seychelles",
        "Sierra Leone",
        "Singapore",
        "Slovakia",
        "Slovenia",
        "Solomon Islands",
        "Somalia",
        "South Africa",
        "South Georgia and The South Sandwich Islands",
        "Spain",
        "Sri Lanka",
        "Sudan",
        "Suriname",
        "Svalbard and Jan Mayen",
        "Eswatini",
        "Sweden",
        "Switzerland",
        "Syrian Arab Republic",
        "Taiwan (ROC)",
        "Tajikistan",
        "Tanzania, United Republic of",
        "Thailand",
        "Timor-leste",
        "Togo",
        "Tokelau",
        "Tonga",
        "Trinidad and Tobago",
        "Tunisia",
        "Turkey",
        "Turkmenistan",
        "Turks and Caicos Islands",
        "Tuvalu",
        "Uganda",
        "Ukraine",
        "United Arab Emirates",
        "United Kingdom",
        "United States",
        "United States Minor Outlying Islands",
        "Uruguay",
        "Uzbekistan",
        "Vanuatu",
        "Venezuela",
        "Vietnam",
        "Virgin Islands, British",
        "Virgin Islands, U.S.",
        "Wallis and Futuna",
        "Western Sahara",
        "Yemen",
        "Zambia",
        "Zimbabwe"
      ];

      countries.forEach(function(country) {
        const option = document.createElement("option");
        option.value = country;
        option.text = country;
        countrySelect.appendChild(option);
      });
    });
  </script>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"
  ></script>
</body>
</html>
