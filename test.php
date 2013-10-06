<?php
$program = new program();
class program
  {
    function __construct()
      {
      $page = 'homepage';
$arg = NULL;
if(isset($_REQUEST['page'])) {
  $page = $_REQUEST['page'];	
}
if(isset($_REQUEST['arg'])) {
  $arg  = $_REQUEST['arg'];	
}
        
//echo $page;
        $page = new $page($arg);
      }
    function __destruct()
      {
      }
  }
abstract class page
  {
  public $content;

function menu() {
$menu = '<a href="./index.php">Homepage</a>';
$menu .= '<a href="./index.php?page=login">Login</a>';

return $menu;
}

    function __construct($arg = NULL)
      {
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
          {
            $this->get();
          }
        else
          {
            $this->post();
          }
      }
    function get()
      {
        
      }
    function post()
      {
      }
function __destruct() {

echo $this->content;
}  
  
  }
class homepage extends page
  {
    function get()
      {
        $this->content .= $this->menu();	
      }
  }
  class login extends page
  {
    function get()
      {
        $this->content .= $this->menu();
$this->content .= $this->loginForm();	
      }
function loginForm() {
$form = '<form action="index.php?page=login" method="post">
    <P>
    <LABEL for="username">Username: </LABEL>
              <INPUT type="text" name="username" id="username"><BR>
    <LABEL for="password">Password: </LABEL>
              <INPUT type="text" name ="password" id="password"><BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </P>
</form>
';
return $form;
}
function post() {	
print_r($_POST);
}
  
  }
?>