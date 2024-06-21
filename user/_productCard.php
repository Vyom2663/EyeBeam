<?php
function component($pid,$pname,$price,$size,$description,$image,$image2,$max){

$element = "
<div class='col-md-4 my-3'>
    <form action='ProductDetail.php' method='get'>
    <div class='card' style='width:325px'>
        <a href=' ProductDetail.php?pid=$pid'>
          <div class='outer'>
                <img class='card-img-top' src='../admin/$image' alt='Card image' style='width:100%;'>
                    <div class='inner'>
                        <img class='card-img-top' src='../admin/$image2' style='width:100%;'>
                    </div>
                    </div>
            <div class='card-body'>
            <h4 class='card-title'>$pname</h4>
            <p class='card-text'>Size: $size</p>
            <p class='card-text'><span class='p'>₹$price</span> <del>₹$max</del> </p>
            <input type='hidden' name='pid' value='$pid'></input>
            </div>
            
            </a>
            </div>
    </form>
</div>";

 echo $element;
   
}

function formComponent($pname,$price,$size,$colour,$image1,$pid,$cid,$qty){
    // <button type='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-whatever='@mdo'> Edit </button>

        $element = "
        <form action='CartDetails.php?action=remove&pid=$pid' method='post' class='cart-items'>
                        <div class='border rounded '>
                            <div class='row bg-white'>
                                <div class='col-md-3'>
                                    <img src='../admin/$image1' alt='Image1' style='width:100%'>
                                </div>
                                <div class='col-md-6'>
                                    <h5 class='pt-2'>$pname</h5>
                                    <h5 class='pt-2'>$colour</h5>
                                    <h5 class='pt-2'>$price</h5>
                                    <h5 class='pt-2'>$size</h5>

                                    <button type='submit' class='btn btn-danger mx-2' name='remove'>Remove</button>
                                    <input type = 'hidden' value = '$cid' name ='cid' ></input>
                                </div>
                               </form>
                          <form action='UpdateQty.php' method='post' class='cart-items'>

                                <div class='col-md-3 py-4'>
                                    <p>Quantity :</p>
                                    <div class='counter'>
                                      <span class='down' onClick='decreaseCount(event, this)'>-</span>
                                      <input type='text' value='$qty' name='pro_qty'>
                                      <span class='up'  onClick='increaseCount(event, this)' >+</span>
                                      <input type = 'hidden' value = '$cid' name ='cid' ></input>
                                      <button type='submit' class='btn btn-warning mx-3' name='btnUpdate'>Update</button> 
                                    </div>
                                </div>
                    </form>
        ";
        echo $element;

}
function mostsoldproduct($pid,$pname,$price,$size,$image3,$reviews,$max,$colour){

    $element ="
    
    <form action ='Cart.php' method='POST'>
    <div style='display:flex;'>
    <div class='hot-sell'>
      <img src='../admin/$image3' style='width:70%; margin-top:20px;'>
      <input type='hidden' name='pro_img1' value='../admin/$image3'>
      <input type='hidden' name='pro_colour' value='$colour'>
    </div>
    <div class='hot-sell2' style='width:100%; border-left: 0.5px solid black;' >
      <p>EYE BEAM</p>
      <h4> $pname</h4>
      <input type ='hidden' value = '$pname' name ='pro_name'>
      <div class ='hs1' style='display :flex;'>
        <i class='fa-solid fa-star'></i>
        <i class='fa-solid fa-star'></i>
        <i class='fa-solid fa-star'></i>
        <i class='fa-solid fa-star'></i>
        <h6>$reviews reviews</h6>
      <input type ='hidden' value = '$reviews' name ='reviewsT'>

      </div>
      <p class='card-text'><span class='p'>₹$price</span> <del>₹$max</del></p>
      <input type ='hidden' value = '$price' name ='pro_price'>
      <div style='margin: 0 240px 0 0;'><hr></div>
      <div class ='hs2' style ='display :flex; margin-top:15px;'>
        <h6>Share :</h6>
        <a href='https://www.facebook.com'><i class='fa-brands fa-facebook-f'></i></a>
        <a href='https://twitter.com'><i class='fa-brands fa-twitter'></i></a>
        <a href='https://www.instagram.com'><i class='fa-brands fa-instagram'></i></a>
      </div>
      <div class='hs3'>
        <p>Size : $size</p>
      <input type ='hidden' value = '$size' name ='pro_size'>

      </div>
      <div class='bt'>
        <button type='submit' class='btn btn-outline-primary' name='AddtoCart'> Add to Cart </button>
        <input type= 'hidden' name = 'pro_id' value = '$pid'>
      </div>
    </div>
    </form>
  "; 
  echo $element;

}


?>