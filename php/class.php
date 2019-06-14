<?php
session_start();

class Dumplings
{
  function dbConnection()
  {
    include('config.php');
    $dbConnection = mysqli_connect($config['connection_host'],$config['connection_user'],$config['connection_password'],$config['connection_database']);
    if(!mysqli_select_db($dbConnection,$config['connection_database']))
    {
      echo "Database connection failed";
      die();
    }
    return $dbConnection;
  }

  public function AdminLoginUsers($email, $password)
  {
    $db = $this->dbConnection();
    $sql = "insert into clients";
    $query = mysqli_query($db,$sql);
    $count = mysqli_num_rows($query);
    if($count > 0)
    {

      $response = 'true';
    }
    else
    {
      $response = 'false';
    }
    return $response;
  }

  public function clientlogin($email, $password)
  {
    $db = $this->dbConnection();
    $status='false';
    $content='';
    $sql = "SELECT hex(aes_encrypt(id,'tblclients')) as id,concat(firstname,' ',surname) as username FROM tblclients WHERE email='".$email."' AND password='".$password."'";
    $query = mysqli_query($db,$sql);
    $count = mysqli_num_rows($query);
    if($count > 0)
    {
      while($row = mysqli_fetch_assoc($query))
      {
        $id = $row['id'];
        $_SESSION['client_session']['id']=$row['id'];
        $_SESSION['client_session']['username']=$row['username'];
      }
      $status = 'true';
    }
    else
    {
      $content='Wrong email and password';
    }

    $response['status']=$status;
    $response['content']=$content;
    return $response;
  }

  public function validateAdminSession()
  {
    $session_id = $_SESSION['admin_session']['id'];
    $status=false;
    $content='';
    $db = $this->dbConnection();
    $sql = "SELECT concat(firstname,' ',surname) as usernamee FROM tblusers WHERE id=aes_decrypt(0x".$session_id.",'tblusers')";
    $query = mysqli_query($db,$sql);
    $count = mysqli_num_rows($query);
    if($count > 0)
    {
      $status = true;
    }
    $response['status']=$status;
    $response['content']=$content;
    return $response;
  }

  public function validateClientSession()
  {
    $session_id = $_SESSION['client_session']['id'];
    $status=false;
    $content='';
    $db = $this->dbConnection();
    $sql = "SELECT id FROM tblclients WHERE id=aes_decrypt(0x".$session_id.",'tblclients')";
    $query = mysqli_query($db,$sql);
    $count = mysqli_num_rows($query);
    if($count > 0)
    {
      $status = true;
    }
    $response['status']=$status;
    $response['content']=$content;
    return $response;
  }

  function getOrdersItems()
  {
    $returnResults=array();
    $status="false";
    $html=null;
    $dbConn = $this->dbConnection();
    $Query = "select *,hex(aes_encrypt(id,'tblorderitems')) as pkid from tblorderitems";
    $results = mysqli_query($dbConn,$Query);
    if($results)
    {
      $resultCount = mysqli_num_rows($results);
      if($resultCount>0)
      {
        $status='true';
        $num=0;
        while($row = mysqli_fetch_assoc($results))
        {
          $html[$num]['id']=$row['pkid'];
          $html[$num]['name']=$row['strname'];
          $html[$num]['value']=$row['value'];
          $num++;
        }
      }
    }

    $returnResults['status']=$status;
    $returnResults['results']=$html;
    return $returnResults;
  }

  function getFlavors($flavour='')
  {
    $returnResults=array();
    $status="false";
    $content=null;
    $dbConn = $this->dbConnection();
    if($flavour=='')
    {
      $Query = "select *,hex(aes_encrypt(id,'tblflavours')) as pk from tblflavours";
    }
    else
    {
      $Query = "select *,hex(aes_encrypt(id,'tblflavours')) as pk from tblflavours where id=aes_decrypt(0x".$flavour.",'tblflavours')";
    }
    $results = mysqli_query($dbConn,$Query);
    if($results)
    {
      $resultCount = mysqli_num_rows($results);
      if($resultCount>0)
      {
        $status='true';
        $cnt=0;
        while($row = mysqli_fetch_assoc($results))
        {
          if($flavour!='')
          {
            $content['pk']=$row['pk'];
            $content['value']=$row['value'];
            $content['rate']=$row['rate'];
          }
          else
          {
            $content[$cnt]['pk']=$row['pk'];
            $content[$cnt]['value']=$row['value'];
            $content[$cnt]['rate']=$row['rate'];
          }
          $cnt++;
        }
      }
    }

    $returnResults['status']=$status;
    $returnResults['content']=$content;
    return $returnResults;
  }

  function getOrderNumber()
  {
    $returnResults=array();
    $status="false";
    $num=0;
    $dbConn = $this->dbConnection();
    $Query = "select max(orderNum) as num from tblclientorders";
    $results = mysqli_query($dbConn,$Query);
    if($results)
    {
      $resultCount = mysqli_num_rows($results);
      if($resultCount>0)
      {
        $row = mysqli_fetch_assoc($results);
//        if($row['num']>0)
          $num = $row['num']+1;
//        else
//          $num = $row['num']+1;
      }
      $status='true';
    }

    $returnResults['status']=$status;
    $returnResults['results']=$num;
    return $returnResults;
  }

  function placeOrder($orderArray)
  {
    $returnResults=array();
    $status="false";
    $returnData=null;
    $orderNum = trim($orderArray['orderNum']);
    $orderitem_fk = trim($orderArray['orderitem_fk']);
    $client_fk = trim($orderArray['client_fk']);
    $contact = trim($orderArray['contact']);
    $fname = trim($orderArray['fname']);
    $deilveryaddres = trim($orderArray['deilveryaddres']);
    $dbConn = $this->dbConnection();
    $Query = "insert into tblclientorders(orderNum,orderitem_fk,client_fk,fname,contact,deilveryaddres,dtcaptured)
    values(".$orderNum.",aes_decrypt(0x".$orderitem_fk.",'tblorderitems'),aes_decrypt(0x".$client_fk.",'tblclients'),'".$fname."','".$contact."','".$deilveryaddres."',now());";
    $results = mysqli_query($dbConn,$Query);
    if($results)
    {
      $status='true';
    }
    $returnData .= $Query;

    $returnResults['status']=$status;
    $returnResults['results']=$returnData;
    return $returnResults;
  }

  function getDeliveryAddress($session_id)
  {
    $returnResults=array();
    $status="false";
    $resultsContent=null;
    $dbConn = $this->dbConnection();
    $Query = "select concat(firstname,' ',surname) as fullnames,contact,address1,address2,address3,zipCode from tblclients where id=aes_decrypt(0x".$session_id.",'tblclients')";
    $results = mysqli_query($dbConn,$Query);
    if($results)
    {
      $resultCount = mysqli_num_rows($results);
      if($resultCount>0)
      {
        $status='true';
        while($row = mysqli_fetch_assoc($results))
        {
          $resultsContent['id']=$session_id;
          $resultsContent['fullnames']=$row['fullnames'];
          $resultsContent['contact']=$row['contact'];
          $resultsContent['address1']=$row['address1'];
          $resultsContent['address2']=$row['address2'];
          $resultsContent['address3']=$row['address3'];
          $resultsContent['zipCode']=$row['zipCode'];
        }
      }
    }

    $returnResults['status']=$status;
    $returnResults['results']=$resultsContent;
    return $returnResults;
  }

  function addToCart($client_id,$flavour_id,$qty)
  {
    $returnResults=array();
    $status="true";
    $returnData=null;
    $cnt=0;
    $dbConn = $this->dbConnection();
    $Query = "insert into tblcart(client_id,flavour_id,qty) values(aes_decrypt(0x".$client_id.",'tblclients'),aes_decrypt(0x".$flavour_id.",'tblflavours'),".$qty.")";
    $results = mysqli_query($dbConn,$Query);
    if($results)
    {
      if(mysqli_num_rows($results)>0)
      {
        /*while($row = mysqli_fetch_assoc($results))
        {
          $returnData[$cnt]['ordernum']=$row['orderNum'];
          $returnData[$cnt]['ordernumcount']=$row['cnt'];
          $returnData[$cnt]['clientname']=$row['clientname'];
          $cnt++;
        }*/

      }
    }
    else
    {
      $status='false';
      $returnData="here".$Query;
    }

    $returnResults['status']=$status;
    $returnResults['results']=$returnData;
    return $returnResults;
  }

  function getClientCart($client_id)
  {
    $returnResults=array();
    $status="true";
    $returnData=null;
    $cnt=0;
    $dbConn = $this->dbConnection();
    $Query = "SELECT *,hex(aes_encrypt(tblcart.id,'tblcart')) as pk,tblflavours.value as flavour,tblflavours.rate as rate
    FROM tblcart
    inner join tblflavours on (tblflavours.id=tblcart.flavour_id)
    where client_id=aes_decrypt(0x".$client_id.",'tblclients');";
    $results = mysqli_query($dbConn,$Query);
    if($results)
    {
      if(mysqli_num_rows($results)>0)
      {
        while($row = mysqli_fetch_assoc($results))
        {
          $returnData[$cnt]['pk']=$row['pk'];
          $returnData[$cnt]['flavour']=$row['flavour'];
          $returnData[$cnt]['rate']=$row['rate'];
          $returnData[$cnt]['qty']=$row['qty'];
          $cnt++;
        }
      }
    }
    else
    {
      $status='false';
      $returnData = 'Error: could\'nt fetch you cart.';
    }

    $returnResults['status']=$status;
    $returnResults['results']=$returnData;
    return $returnResults;
  }

  function fulfillClientOrder($orderNumber)
  {
    $returnResults=array();
    $status="true";
    $returnData=null;
    $cnt=0;
    $dbConn = $this->dbConnection();
    $Query = "update tblclientorders set dtdelivered=now()
    where orderNum=".$orderNumber;
    $results = mysqli_query($dbConn,$Query);
    if($results)
    {

    }
    else
    {
      $status='false';
      $returnData = $Query;
    }

    $returnResults['status']=$status;
    $returnResults['results']=$returnData;
    return $returnResults;
  }

}

$Class = new Dumplings();

function sessionMessages()
{
  unset($_SESSION['message']);
  unset($_SESSION['messageStatus']);
}

function checkClientSession()
{
  if(isset($_SESSION['client_session']['id']))
  {
    return true;
  }
  else
  {
    header('Location: index.php');
  }
}
?>