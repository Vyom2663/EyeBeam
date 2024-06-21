
<li class="nav-item">
          <button class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
          <span class="navbar-toggler-icon"></span>    
          </button>

          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="mv-auto"></div>

          <div class="navbar-Nav" style="display:flex;">
              
            <a class="nav-item nav-link active" href="CartDetails.php"><img src="../img/cart.png" style="margin:-5px 0 0 0;"></img></a>
              <span style="margin: 5px 0 0 -5px;">
              <?php
                require_once("conn.php");

                $count = 0;

                if(isset($_SESSION['loggedin'])){
                
                  $uid = $_SESSION['uid'];
                  $sql_cart = "select * from cart where uid = $uid";
                  $select_cart = mysqli_query($con,$sql_cart);
                  $count = mysqli_num_rows($select_cart); 
                  // echo "<script>alert('$count');</script>";
                  echo"<span id='cart_count' class'btn btn-warning'> $count </span>";
                }
                else
                {
                  $count = 0;
                  echo"<span id='cart_count' class'btn btn-warning'> $count </span>";

                }
              ?>
</span>
          
          </div>
          
        </li>
