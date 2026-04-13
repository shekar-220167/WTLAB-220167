<?php
session_start();
$isLoggedIn = isset($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <!-- Google Fonts for Modern Typography -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styler.css">
</head>
<body>
    <input type="checkbox" id="menu-toggle">
    <div id="mySidenav" class="sidenav">
        <label for="menu-toggle" class="closebtn">&times;</label>
        <a href="#">Home</a>
        <?php if($isLoggedIn): ?>
            <a href="profile.html">Profile</a>
            <a href="attendance.html">Attendance</a>
            <a href="marks.html">Marks</a>
            <a href="dashboard.php">Dashboard</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="sign.html">Sign Up</a>
        <?php endif; ?>
    </div>

    <div class="header">
        <label for="menu-toggle" class="menu-btn">&#9776;</label>
        <div>
            <a href="#">Home</a>
            <?php if($isLoggedIn): ?>
                <a href="dashboard.php" style="margin-right: 15px;">Dashboard</a>
                <a href="logout.php" class="login-btn" style="background: var(--danger); box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);">Logout</a>
            <?php else: ?>
                <a href="login.php" class="login-btn">Log In</a>
            <?php endif; ?>
            <a href="#">About</a>
        </div>
    </div>

    <h1 class="page-title">Welcome to Student Portal</h1>
    
    <!-- SLIDER -->
    <section class="slideshow">
        <div class="slide">
            <img src="slide1.jpg" alt="College Life">
            <p>College life isn’t freedom. It’s deadlines.</p>
        </div>
        <div class="slide">
            <img src="slide2.JPG" alt="Career Journey">
            <p>Your first job teaches faster than college ever did.</p>
        </div>
        <div class="slide">
            <img src="slide3.JPG" alt="Planning">
            <p>Projects succeed on planning, not motivation.</p>
        </div>
    </section>

    <!-- Table Section -->
    <div style="display:flex; justify-content:center; padding: 0 20px;">
        <table class="cells glass">
            <thead>
                <tr>
                    <th>Notice</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>RGUKT Semester Registration Extended</td>
                    <td>19 Dec</td>
                </tr>
                <tr>
                    <td>Christmas Holiday – RGUKT Campuses Closed</td>
                    <td>25 Dec</td>
                </tr>
                <tr>
                    <td>Mid-Term Examinations Schedule Released</td>
                    <td>28 Dec</td>
                </tr>
                <tr>
                    <td>RGUKT Scholarship Verification Process Started</td>
                    <td>02 Jan</td>
                </tr>
                <tr>
                    <td>Online Fee Payment Last Date for E2 Students</td>
                    <td>05 Jan</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Registration Form -->
    <div class="formal glass">
        <form action="register.php" method="POST">
            <fieldset style="border-radius:12px; border-color: var(--border);">
                <legend>Student Registration</legend>

                <input type="text" name="fname" placeholder="First Name" required>
                <input type="text" name="lname" placeholder="Last Name" required>

                <div style="margin-bottom: 20px;">
                    <strong style="color:var(--text-muted)">Gender:</strong><br><br>
                    <label><input type="radio" name="gender" value="Male" style="width:auto; margin-right:8px;"> Male</label> &nbsp;
                    <label><input type="radio" name="gender" value="Female" style="width:auto; margin-right:8px;"> Female</label> &nbsp;
                    <label><input type="radio" name="gender" value="Other" style="width:auto; margin-right:8px;"> Other</label>
                </div>

                <div style="margin-bottom: 20px;">
                    <strong style="color:var(--text-muted)">Branch:</strong><br><br>
                    <label><input type="checkbox" name="branch[]" value="CSE" style="width:auto; margin-right:8px;"> CSE</label> &nbsp;
                    <label><input type="checkbox" name="branch[]" value="ECE" style="width:auto; margin-right:8px;"> ECE</label> &nbsp;
                    <label><input type="checkbox" name="branch[]" value="MECH" style="width:auto; margin-right:8px;"> MECH</label>
                </div>

                <select name="year" required>
                    <option value="" disabled selected>Select Year...</option>
                    <option value="E-1">E-1</option>
                    <option value="E-2">E-2</option>
                    <option value="E-3">E-3</option>
                    <option value="E-4">E-4</option>
                </select>

                <input list="courses" name="course" placeholder="Select Course..." required>
                <datalist id="courses">
                    <option value="AI">
                    <option value="ML">
                    <option value="Cyber Security">
                    <option value="Data Scientist">
                    <option value="Web Developer">
                </datalist>

                <button type="submit" style="width:100%">Register</button>
            </fieldset>
        </form>
    </div>

    <!-- Upload Section -->
    <div class="upload glass">
        <h2 style="color: var(--accent); text-align: center; margin-top:0;">Upload Assignment</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="file-upload-wrapper">
                <div class="file-upload-icon">📁</div>
                <div style="color: var(--text-muted);">Drop your file here or click to browse</div>
                <input type="file" name="uploadFile" required>
            </div>
            <div class="file-name-preview" style="text-align: center; margin-bottom: 20px;"></div>
            <button type="submit" class="btn" style="width:100%">Upload File</button>
        </form>
    </div>

    <!-- Update Section -->
    <div class="formal glass">
        <h2 style="color: var(--accent); text-align: center; margin-top:0;">Update Profile Name</h2>
        <form action="update.php" method="post">
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="text" name="name" placeholder="New Name" required>
            <button type="submit" style="width:100%">Update</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
