   <!---Navigation Bar -->
   <div class="nav-all">
       <nav class="navbar navbar-expand-md" id="main-nav" style="display: flex;flex-wrap:nowrap;">

           <div class="menyu">
               <a href="auth"> <i class="fas fa-home" style="font-size: 2rem; margin-left:20px; color:black; " onclick="openfn()" id="home-btn"></i></a>
           </div>


           <div class="menyu">
               <img src="images/logo5.png" style="width: 150px;top:5px; float:center;   height: 120px; object-fit: contain; " alt="" class="align-top">
           </div>

           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" style="width: 60px; right:0; justify-content:center;">
               <span class="navbar-toggler-icon mr-1"></span>
           </button>
           <div class="menyu">
               <div class="collapse navbar-collapse" id="navbarNavDropdown" style="float:right; width:100%;">
                   <ul class="navlinkse" style="width: 100%; justify-content:center; ">
                       <li class="nav-item">
                           <?php
                            if (!isset($_SESSION['name'])) {
                                echo "<a href='login'>LOGIN | <i class='fal fa-sign-in' style='font-size:15px;'></i></a>";
                            } else {
                                echo "<a href='auth'>" . $_SESSION['name'] . " | <i class='bi bi-house' style='font-size:15px;'></i></a>";
                            }
                            ?>
                       </li>
                       <li class="nav-item">
                           <?php
                            if (!isset($_SESSION['name'])) {
                                echo "<a href='login'>HELP | <i class='bi bi-question-square' style='font-size:15px;'></i></a>";
                            } else {
                                echo "<a href='store'> STORE | <i class='fal fa-shopping-cart' style='font-size:15px;'></i></a>";
                            }

                            ?>
                       </li>
                       <li class="nav-item">
                           <?php
                            if (isset($_SESSION['name'])) {

                                echo "<a href='cart'> CART | <i class='bi bi-bag-dash' style='font-size:15px;''></i></a>";
                            }else{
                                echo "<a href='login'> SETTINGS | <i class='fal fa-cogs' style='font-size:15px;''></i></a>";
                            }
        
                            ?>

                       </li>
                   </ul>
               </div>
           </div>

       </nav>
   </div>
   <!---Side Navigation Bar -->
  