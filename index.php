<?php
$program = new program();
class program
{
    function __construct()
    {
        $page = 'homepage';
        $arg  = NULL;
        if (isset($_REQUEST['page'])) {
            $page = $_REQUEST['page'];
        }
        if (isset($_REQUEST['arg'])) {
            $arg = $_REQUEST['arg'];
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
    
    function menu()
    {
        $menu = '<a href="./index.php">Homepage</a>';
        $menu .= '&nbsp';
        $menu .= '<a href="./index.php?page=login">Login</a>';
        $menu .= '&nbsp';
        $menu .= '<a href="./index.php?page=register">Register</a>';
        $menu .= '&nbsp';
        $menu .= '<a href="./index.php?page=trans">Make Transactions</a>';
        $menu .= '&nbsp';
        $menu .= '<a href="./index.php?page=strans">See Transactions</a>';
        
        return $menu;
    }
    
    function __construct($arg = NULL)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->get();
        } else {
            $this->post();
        }
    }
    function get()
    {
        
    }
    function post()
    {
    }
    function __destruct()
    {
        
        echo $this->content;
    }
    
}


class homepage extends page
{
    function get()
    {
        $this->content .= $this->menu();
        $this->content .= $this->welcome();
    }
    function welcome()
    {
      $welcome = '<P>Hello, and welcome to the Bank of Hard Knocks</p>';
      
      return $welcome;
    }
}



class login extends page
{
    function get()
    {
        $this->content .= $this->menu();
        $this->content .= $this->loginForm();
        $this->content .= $this->forgotPass();
    }
    function loginForm()
    {
        $form = '<form action="index.php?page=login" method="post">
    <P>
    <LABEL for="username">Username: </LABEL>
              <INPUT type="text" name="username" id="username"><BR>
    <LABEL for="password">Password: </LABEL>
              <INPUT type="password" name ="password" id="password"><BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </P>
</form>
';
        return $form;
    }
    function forgotPass()
    {
      $uhoh = '<form action="index.php?page=login" method="post">
      <P>
      Forgot Password?
      <P>
      <LABEL for="email">E-Mail</LABEL>
        <INPUT type = "email" name = "email" id = "email"><BR>
      <INPUT type = "submit" value = "Send"><INPUT type = "reset">';
      
      return $uhoh;
    }
    function post()
    {
        print_r($_POST);
    }
    
}

class register extends page
{
    function get()
    {
        $this->content .= $this->menu();
        $this->content .= $this->registerForm();
    }
    function registerForm()
    {
        $form = '<form action="index.php?page=register" method="post">
    <P>
    <LABEL for="username">Username: </LABEL>
              <INPUT type="text" name="username" id="username"><BR>
    <LABEL for="password">Password: </LABEL>
              <INPUT type="password" name ="password" id="password"><BR>
    <LABEL for="email">E-Mail Address: </LABEL>
              <INPUT type="email" name ="email" id="email"><BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </P>
</form>
';
        return $form;
    }
    function post()
    {
        print_r($_POST);
    }
    
}

class trans extends page
  {
    function get()
  {
    $this->content .= $this->menu();
    $this->content .= $this->transType();
  }
  function transType()
  {
    $transType = '<p><a href="./index.php?page=deposit">Deposit</a><br>';
    $transType .= '<a href="./index.php?page=withdraw">Withdraw</a><br>';
    $transType .= '<a href="./index.php?page=transfer">Transfer</a><br>';
    
    return $transType;
  }
  }
  

class deposit extends page
  {
    function get()
    {
      $this->content .= $this->menu();
      $this->content .= $this->depositChecking();
      $this->content .= $this->depositSavings();
    }
    
    function depositChecking()
    {
      $depositChecking = '<form action="index.php?page=deposit" method="post">
    <P>
    <LABEL for="money">Checking<br>Amount: $</LABEL>
      <INPUT type="number" step="0.01" name="money" id="money"><BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </P>
    </form>';
      
      return $depositChecking;
    }
    
    function depositSavings()
    {
      $depositSavings = '<form action="index.php?page=deposit" method="post">
    <P>
    <LABEL for="money">Savings<br>Amount: $</LABEL>
      <INPUT type="number" step="0.01" name="money" id="money"><BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </P>
    </form>';;
      
      return $depositSavings;
    }
    
    function post()
    {
      print_r($_POST);
    }
  }

class withdraw extends page
  {
    function get()
    {
      $this->content .= $this->menu();
      $this->content .= $this->withdrawChecking();
      $this->content .= $this->withdrawSavings();
    }
    
    function withdrawChecking()
    {
      $withdrawChecking = '<form action="index.php?page=withdraw" method="post">
    <P>
    <LABEL for="money">Checking<br>Amount: $</LABEL>
      <INPUT type="number" step="0.01" name="money" id="money"><BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </P>
    </form>';
      
      return $withdrawChecking;
    }
    
    function withdrawSavings()
    {
      $withdrawSavings = '<form action="index.php?page=withdraw" method="post">
    <P>
    <LABEL for="money">Savings<br>Amount: $</LABEL>
      <INPUT type="number" step="0.01" name="money" id="money"><BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </P>
    </form>';
      
      return $withdrawSavings;
    }
  }

class transfer extends page
  {
    function get()
    {
      $this->content .= $this->menu();
      $this->content .= $this->transfertoChecking();
      $this->content .= $this->transfertoSavings();
    }
    
    function transfertoChecking()
    {
      $transfertoChecking = '<form action="index.php?page=transfer" method="post">
    <P>
    <LABEL for="money">Savings -> Checking<br>Amount: $</LABEL>
      <INPUT type="number" step="0.01" name="money" id="money"><BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </P>
    </form>';
      
      return $transfertoChecking;
    }
    
    function transfertoSavings()
    {
      $transfertoSavings = '<form action="index.php?page=transfer" method="post">
    <P>
    <LABEL for="money">Checking -> Savings<br>Amount: $</LABEL>
      <INPUT type="number" step="0.01" name="money" id="money"><BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </P>
    </form>';
      
      return $transfertoSavings;
    }
  }

class strans extends page
  {
    function get()
    {
      $this->content .= $this->menu();
      $this->content .= $this->tabley();
    }
    
    function tabley()
    {
      $tabley = '';
      
      return $tabley;
    }
  }

?>