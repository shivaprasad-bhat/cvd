<?php
#Start the session if not set
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = new mysqli('localhost', strval($_SESSION['user']), strval($_SESSION['password']), 'CVDCareDB') or die('Error' . $conn->connect_error);
if (!$conn->connect_error) {
    #Doctor Data
    $query = "SELECT id,DName FROM `doctor`";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $doctors = array();
        $did = array();
        while ($row = $result->fetch_array()) {
            $doctors[] = $row['DName'];
            $did[] = $row['id'];
        }
    }

    #get user details
    $userName = trim(strval($_SESSION['user']));
    $query = "SELECT * FROM `caregiver` WHERE CGName like '" . ucfirst($userName) . "%'";

    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_array();
        $CGId = $row['id'];
    } else {
        $CGId = '';
    }



    #Medical condition NameCondition Name
    $query = "SELECT id, CondName FROM `medcondmaster` WHERE Type = 'Medical Condition'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $conditions = array();
        $mcmid = array();
        while ($row = $result->fetch_array()) {
            $conditions[] = $row['CondName'];
            $mcmid[] = $row['id'];
        }
    }

    #Patient ids
    $query = "SELECT id FROM `patient`";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $patIds = array();
        while ($row = $result->fetch_array()) {
            $patIds[] = $row['id'];
        }
    }

    #Symptom Query
    $query = 'SELECT id, CondName FROM `medcondmaster` WHERE Type = "Symptom"';
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $symptoms = array();
        $sid = array();
        while ($row = $result->fetch_array()) {
            $symptoms[] = $row['CondName'];
            $sid[] = $row['id'];
        }
    }

    #investigation
    $query = 'SELECT id, InvMName from `investmaster`';
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $invName = array();
        $invId = array();
        while ($row = $result->fetch_array()) {
            $invName[] = $row['InvMName'];
            $invId[] = $row['id'];
        }
    }
}

#Close connection
$conn->close();
