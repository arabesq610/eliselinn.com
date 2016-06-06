<?php
print ('hello');

error_log(var_dump($_GET));
error_log(var_dump($_POST));

    // if (isset($_POST["submit"])) {

    //     $name = $_POST['name'];
    //     $email = $_POST['email'];
    //     $message = $_POST['message'];
    //     $human = intval($_POST['human']);
    //     $from = $_POST['from'];
    //     $to = 'elise_81@yahoo.com'; 
    //     $subject = 'Message from Contact Demo ';
    //     $body = "From: $name\n E-Mail: $email\n Message:\n $message";
    // }


$obj = new stdObject();
$obj->name = isset($_POST['name']) ? $_POST['name'] : '';
$obj->email = isset($_POST['email']) ? $_POST['email'] : '';
$obj->message = isset($_POST['message']) ? $_POST['message'] : '';
$obj->recaptcha = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '';

error_log(var_dump(json_encode($obj)));

class stdObject {
    public function __construct(array $arguments = array()) {
        if (!empty($arguments)) {
            foreach ($arguments as $property => $argument) {
                if ($argument instanceOf Closure) {
                    $this->{$property} = $argument;
                } else {
                    $this->{$property} = $argument;
                }
            }
        }
    }

    public function __call($method, $arguments) {
        if (isset($this->{$method}) && is_callable($this->{$method})) {
            return call_user_func_array($this->{$method}, $arguments);
        } else {
            throw new Exception("Fatal error: Call to undefined method stdObject::{$method}()");
        }
    }
}
?>