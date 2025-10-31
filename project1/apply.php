<!-- Person In Charge: Do Trung Son
 Student ID: 103803451 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="NetVision - Job Application Page">
    <meta name="keywords" content="NetVision, Careers, Network Jobs, Recruitment, Opportunities, IT Jobs">
    <meta name="SonDo" content="Group 2 - COS10026">
    <title>NetVision - Apply</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/apply.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Cal+Sans&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- Header inclusion -->
    <?php include 'header.inc'; ?>

    <main>
        <a id="back" class="secondary" href="#"><img src="images/svg/to_top.svg" alt="" aria-hidden="true"></a>

        <div class="center_aligned">
            <h1>Join Us</h1>
            <p>Take the first step and apply today, we'd love to have you on board!</p>
        </div>

        <form id="applicationForm" action="https://mercury.swin.edu.au/it000000/formtest.php" method="post">
            <h3 class="formtitle">Application form</h3>
            <p class="formtitle">Fill out the form - Be a part of our team!</p>
            <!-- Job reference number -->
            <div class="section">
                <label for="jobRef">Job reference number:</label>
                <select id="jobRef" name="jobRef" required>
                    <option value="">Select job reference</option>
                    <option value="JNT01">JNT01 - Junior Network Technician </option>
                    <option value="IBA02">IBA02 - Intern Business Analysis</option>
                    <option value="TSL03">TSL03 - Telephone Sales Representative</option>
                </select>
            </div>
            <br>
            <!-- Personal details -->
            <div class="section">
                <aside>
                    <div class="row">
                        <img src="images/svg/personal_info.svg" alt="Personal Information">
                        <h3>Personal details</h3>
                    </div>
                </aside><br>
                <!-- First name and Last name -->
                <div id="name">
                    <div class="textbox">
                        <label for="firstName">First name:</label>
                        <input type="text" id="firstName" name="firstName" maxlength="20" pattern="[A-Za-z]{1,20}"
                            title="Please enter your first name" required>
                    </div>
                    <div class="textbox">
                        <label for="lastName">Last name:</label>
                        <input type="text" id="lastName" name="lastName" maxlength="20" pattern="[A-Za-z]{1,20}"
                            title="Please enter your last name" required>
                    </div>
                </div><br>
                <!-- Date of birth and Gender -->
                <div id="dobgender">
                    <div id="dob">
                        <label for="DateOfBirth">Date of Birth:</label>
                        <input type="date" name="dob" id="DateOfBirth" required>
                    </div>
                    <div id="gender">
                        <fieldset>
                            <legend>Gender</legend>
                            <label>
                                <input type="radio" id="male" name="gender" value="Male" required> Male
                            </label>
                            <label>
                                <input type="radio" id="female" name="gender" value="Female"> Female
                            </label>
                            <label>
                                <input type="radio" id="other" name="gender" value="Other"> Other
                            </label>
                        </fieldset>
                    </div>
                </div>
                <br><br>
            </div>
            <br>
            <div class="section">
                <!-- Street and Suburb Address -->
                <aside>
                    <div class="row">
                        <img src="images/svg/form_location.svg" alt="location information">
                        <h3>Region and location</h3>
                    </div>
                </aside><br>
                <div id="location">
                    <div class="textbox">
                        <label for="street">Street Address:</label>
                        <input type="text" id="street" name="street" maxlength="40"
                            title="Please enter your street address" placeholder="123Main street" required>
                    </div>

                    <div class="textbox">
                        <label for="suburb">Suburb/Town:</label>
                        <input type="text" id="suburb" name="suburb" maxlength="40"
                            title="Please enter your suburb or town" placeholder="Location" required>
                    </div>
                </div><br>

                <!-- State and Postcode -->
                <div id="address">
                    <div class="textbox">
                        <label for="state">State:</label>
                        <select id="state" name="state" required>
                            <option value="">-- Select state --</option>
                            <option value="VIC">VIC</option>
                            <option value="NSW">NSW</option>
                            <option value="QLD">QLD</option>
                            <option value="NT">NT</option>
                            <option value="WA">WA</option>
                            <option value="SA">SA</option>
                            <option value="TAS">TAS</option>
                            <option value="ACT">ACT</option>
                        </select>
                    </div>
                    <div class="textbox">
                        <label for="postcode">Postcode:</label>
                        <input type="text" id="postcode" name="postcode" pattern="[0-9]{4}" maxlength="4"
                            title="Please enter your postcode" placeholder="1234" required>
                    </div>
                </div>
            </div>
            <br>
            <div class="section">
                <aside>
                    <div class="row">
                        <img src="images/svg/contact_info.svg" alt="Contact Information">
                        <h3>Contact information</h3>
                    </div>
                </aside><br>

                <!-- Email and phone number -->
                <div id="contactinfo">
                    <div class="textbox">
                        <label for="emailapply">Email address:</label>
                        <input id="emailapply" type="email" name="email"
                            pattern="[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}$"
                            title="Please enter a valid email address" placeholder="example@email" required>
                    </div>
                    <div class="textbox">
                        <label for="phone">Phone number:</label>
                        <input type="tel" id="phone" name="phone" pattern="[0-9]{8,12}"
                            title="Please enter your phone number" placeholder="XXXXXXXX" required>
                    </div>
                </div>
            </div>
            <br>
            <div class="section">
                <aside>
                    <div class="row">
                        <img src="images/svg/skills.svg" alt="Skills and Experience">
                        <h3>Skills and expertise</h3>
                    </div>
                </aside><br>

                <!-- Required technical skills -->
                <fieldset>
                    <legend>Required technical skills</legend>


                    <label for="skill1">Networking
                        <input type="checkbox" id="skill1" name="skills" value="Networking">
                    </label>

                    <label for="skill2">Communication
                        <input type="checkbox" id="skill2" name="skills" value="Communication">
                    </label>

                    <label for="skill3">Coding
                        <input type="checkbox" id="skill3" name="skills" value="Coding">
                    </label>

                    <label for="skill4">Database knowledge
                        <input type="checkbox" id="skill4" name="skills" value="DB_knowledge">
                    </label>
                </fieldset>
                <br>

                <!-- Other skills -->
                <label for="otherSkills">Other skills:</label><br>
                <textarea id="otherSkills" name="otherSkills" rows="4" cols="40"
                    placeholder="Describe other skills..."></textarea>
            </div>
            <br>
            <button type="submit" value="Submit Application" class="primary">
                Submit Application
            </button>
            <br>
            <button type="reset" value="Reset Form" class="secondary">
                Reset Form
            </button>
        </form>
    </main>
    <!-- Footer inclusion -->
    <?php include 'footer.inc'; ?>
</body>


</html>