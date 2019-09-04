<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/23/2019
 * Time: 5:33 AM
 */
require_once("../../database/core/CRUD.class.php");

class Helper
{

    public function createCircles($circleNo, $maxValue, $marks, $passingValue)
    {
        $circleNo = (int)$circleNo;
        $maxValue = (int)$maxValue;
        $marks = (int)$marks;
        $passingValue = (double)$passingValue;
        $passing = $maxValue * ($passingValue / 100);
        if ($marks < $passing) {
            $color = '#F25961';
        } else {
            $color = '#2BB930';
        }
        return <<<CIRCLE
        <script>
            $(document).ready(function(){
                addCircle({$circleNo}, {$maxValue}, {$marks}, '{$color}');
            });
        </script>
CIRCLE;
    }

    public function getHeadingName($sourceString)
    {
        if (strcasecmp($sourceString, "view-all-quizzes.php") == 0) {
            return "All Quizzes";
        } elseif (strcasecmp($sourceString, "create-quiz") == 0) {
            return "Create a quiz";
        } elseif (strcasecmp($sourceString, "add-quiz-question") == 0) {
            return "Add Questions For Quiz";
        }
    }

    public function getOptions($rs)
    {
        $options = "";
        foreach ($rs as $row) {
            $options .= "<option value=\"$row->id\">$row->name</option>";
        }
        return $options;
    }

    public function processLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rs = CRUD::table("user")->join("user_role", "user.user_id", "user_role.user_id")->where("email", $email)->select("user.user_id,user.username,user.password,user_role.role")->get();
        $entry = $rs->rowCount();
        if ($entry == 1) {
            $row = $rs->fetch();
            $user_id = $row->user_id;
            $dbpassword = $row->password;
            $role = $row->role;
            if (password_verify($password, $dbpassword)) {
                if (!isset($_SESSION['user_id'])) {
                    session_start();
                }
                $_SESSION['user_id'] = $user_id;
                $_SESSION['role'] = $role;
                if ($role == 1) {
                    header("Location: pages/teacher/index.php");
                } elseif ($role == 2) {
                    header("Location: pages/student/index.php");
                } else {
                    //HEADER FOR ADMIN
                }
            } else {
                //UI FOR WRONG PASSWORD
            }
        } else {
            //UI FOR DISPLAYING ERROR IN INPUT
        }
    }

    public function processLogout()
    {
        session_start();
        $_SESSION['user_id'] = null;
        $_SESSION['role'] = null;
        session_unset();
        header("Location: ../../login.php");
    }

    public function processForgotPassword($email)
    {
        $rs = CRUD::table("user")->where("email", $email)->select("user_id")->get();
        $row = $rs->rowCount();
        if ($row == 1) {
            $length = 50;
            $token = bin2hex(openssl_random_pseudo_bytes($length));
            CRUD::table("user")->where("email", $email)->update(array("token" => $token));
            $to = $email;
            $subject = "Reset Password";
            $message = "To reset your password please click the above link<br>";
            $message .= "<a href = 'http://localhost/QuizApplication/pages/includes/reset.php?token={$token}'>http://localhost/QuizApplication/reset.php?token={$token}</a>";

            $header = "From:noreply@cms.com\r\n";
            $header .= "MIME-version: 1.0\r\n";
            $header .= "Content-Type: text/html\r\n";
            if (mail($to, $subject, $message, $header)) {
                echo "sent";
            } else {
                echo "Error";
            }
        } else {
            echo "NO USER FOUNDDD";
        }
    }

    public function processResetPassword($token, $password, $confirm_password)
    {
        if ($password === $confirm_password) {
            $result = CRUD::table("user")->where("token", $token)->select("user_id")->get();
            $entry = $result->rowCount();
            if ($entry === 1) {
                $row = $result->fetch();
                $user_id = $row->user_id;
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                CRUD::table("user")->where("user_id",$user_id)->update(array("password" => $hashed_password));
                header("Location: ../../login.php");
            } else {
            }

        }

    }

}

