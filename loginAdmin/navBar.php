
<nav class='navbar'>
   
        <a href="index.php">Home</a>
    
    <?php if(isset($_SESSION["user"])) { //check if user is logged in ?>
    
        <a href="logout.php">Logout</a>
    
    <?php } else{ ?>
    
        <a href="login.php">Login</a>

    <?php } if (!isset($_SESSION["level"]) || $_SESSION["level"] != 'admin'){?>
        
        <a href="login.php?type=admin">AdminLogin</a>
    <?php } elseif ($_SESSION["level"] == 'admin'){?>
        <a href="adminIndex.php">AdminHome</a>
    <?php }?>
</nav>
