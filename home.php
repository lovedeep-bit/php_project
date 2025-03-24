<!DOCTYPE html>
<html lang="en">

<head>
    <title>Discuss Project</title>
    <?php include('./client/CommonFiles.php') ?>
</head>

<body>
    <?php
    session_start();
    include('./client/Header.php');

    // Check if the user is logged in function
    function is_logged_in() {
        return isset($_SESSION['user']);
    }

    // Redirect to login page if the user is not logged in
    function redirect_to_login() {
        header("Location:?login=true");
        exit();
    }

    // Include appropriate content based on query parameters
    if (isset($_GET['signup']) && (!isset($_SESSION['user']) || !isset($_SESSION['user']['username']))) {
        include('./client/signup.php');
    } else if (isset($_GET['login']) && (!isset($_SESSION['user']) || !isset($_SESSION['user']['username']))) {
        include('./client/login.php');
    } elseif (!empty($_GET['ques'])) {
        include('./client/ques.php');
    } elseif (!empty($_GET['q-id'])) {
        // If question ID exists, display question details and answers
        if (!is_logged_in()) {
            redirect_to_login();
        }

        $qid = $_GET['q-id'];
        include('./client/answer.php');
    } elseif (!empty($_GET['c-id'])) {
        // If category ID exists, display category questions
        $cid = $_GET['c-id'];
        include('./client/questionslist.php');
    } elseif (!empty($_GET['u-id'])) {
        // If user ID exists, display user's questions
        $uid = $_GET['u-id'];
        include('./client/questionslist.php');
    } elseif (!empty($_GET['latest'])) {
        // If "latest" exists, display the latest questions
        include('./client/questionslist.php');
    } elseif (!empty($_GET['search'])) {
        // If search query exists, display search results
        $search = $_GET['search'];
        include('./client/questionslist.php');
    } else {
        // Default case, display all questions
        include('./client/questionslist.php');
    }
    ?>

</body>

</html>
