<?php require('../model/database.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
<div class="card bg-light mx-auto w-50">
    <div class="card-header" style="background-color:#bedcfa;">
        <h2 class="text-center">Scholarship Form</h2>
    </div>
  <div class="card-body">
        <form action='insert_student.php' method="post">
            <div class="form-group">
                <label for="studentNumber">Student Number</label>
                <input type="number" class="form-control" id="studentNumber" name="studentNumber" placeholder="Student Number..." required>
            </div>
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name..." required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name..." required>
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" maxlength="11" placeholder="Phone Number..." required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email..." required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="example-dateOfBirth-input">Date of Birth</label>
                <input class="form-control" type="date" id="dateOfBirth" name="dateOfBirth" required>
            </div>

            <div class="form-group">
                <label for="classStatus">Class Status</label>
                <select class="form-control" id="classStatus" name="classStatus" required>
                    <option>Freshmen</option>
                    <option>Sophmore</option>
                    <option>Junior</option>
                    <option>Senior</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cumulativeGpa">Cumulative GPA</label>
                <input type="number" step="0.01" max="4" class="form-control" id="cumulativeGpa" name="cumulativeGpa" placeholder="Cumulative GPA..." required>
            </div>
            <div class="form-group">
                <label for="gpaSemester">Semester GPA</label>
                <input type="number" step="0.01" max="4" class="form-control" id="gpaSemester" name="gpaSemester" placeholder="Semester GPA..." required>
            </div>

            <div class="form-group">
                <label for="credits">Number of Credits</label>
                <input type="number" class="form-control" id="credits" name="credits" placeholder="Number of Credits..." required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    
    </div>
</div>

</body>

</html>