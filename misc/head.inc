$headername = "<h1>" . $result('NATIONAL PARK PLAZA') . "</h1>"
<!-- This code makes navigation menu -->
<ul>
    <!-- This is the active html page -->
    <li><a class="active" href="index.html">Search</a></li>
    <!-- These are links to other pages in the memu -->
    <li><a href="results.html">Parks</a></li>
    <!-- This is the bar with a dropdown sub menu -->
    <li class="dropdown">
        <!-- The main bar name is National Parks -->
        <a href="javascript:void(0)" class="dropbtn">National Parks</a>
        <!-- This is the section of dropdown memu, which style defined in the css -->
        <div class="dropdown-content">
            <!-- These are links to pages in the dropdown memu -->
            <a href="object1.html">Bruce Peninsula National Park</a>
            <a href="object2.html">Georgian Bay Islands National Park</a>
            <a href="object3.html">Point Pelee National Park</a>
        </div>
    </li>
    <li><a href="object_submission.html">Submit a Park</a></li>
    <li><a href="registration.html">Registration</a></li>
    <li><a href="login.html">LogIn</a></li>
</ul>