<div class="sidebar employee" id="sidebar">
    <ul>
        <li><span><a href="dashboard-employee.php">Dashboard</a></span></li>
        <li><span class="dropdown" onclick="displayPatient();">Patient</span>
            <ul id="subpatient" class="submenubar">
                <li><a href="add-patient.php">Add Patient</a></li>
                <li><a href="#">View Patient</a></li>
            </ul>
        </li>
        <li><span><a href="#">Doctor</a></span></li>
        <li><span><a href="#">Schedule</a></span></li>
        <li><span class="dropdown" onclick="displayAppoitment();">Appointment</span>
            <ul id="subappoitment" class="submenubar">
                <li><a href="#">Add Appointment</a></li>
                <li><a href="#">View Appointment</a></li>
            </ul>
        </li>
        <li>
            <span class="dropdown" onclick="displayBloodGroup();">Blood Group</span>
            <ul id="subbloodgroup" class="submenubar">
                <li><a href="add-bloodgroup.php">Add Blood Group</a></li>
                <li><a href="view-bloodgroup.php">View Blood Group</a></li>
            </ul>
        </li>
    </ul>
</div>