<?php
include "header.php";
if (isset($_SESSION["username"])) {
?>
<style>
  .container,.row {
      display: flex;
      justify-content: center;
      align-items: center;

  }
  .row{
      margin-bottom: 5px;
  }
  .rr{
      padding: 10px;
  }

</style>
<div class="container">
    <div class="row">

        <!-- code start -->
        <div class="twPc-div">
            <a class="twPc-bg twPc-block"></a>

            <div>
                <div class="twPc-button">
                    <button style="width: 100px ;margin-top: -12px" class="btn btn-info">Follow</button>
                </div>

                <a title="<?php echo $_SESSION["username"] ?>" href="https://twitter.com/mertskaplan" class="twPc-avatarLink">
                    <img alt="Mert S. Kaplan" src="https://cdn.pixabay.com/photo/2017/11/10/05/48/user-2935527_960_720.png" class="twPc-avatarImg">
                </a>

                <div class="twPc-divUser">
                    <div class="twPc-divName">
                        <a href="https://twitter.com/mertskaplan"><?php echo $_SESSION["username"] ?></a>
                    </div>
                    <span>
				<a href="https://twitter.com/mertskaplan">EMAIL : <span><?php echo $_SESSION["email"] ?></span></a>
			</span>
                </div>

                <div class="twPc-divStats">
                    <ul class="twPc-Arrange">
                        <li class="twPc-ArrangeSizeFit">
                            <a href="https://twitter.com/mertskaplan" title="9.840 Tweet">
                                <span class="twPc-StatLabel twPc-block">Tweets</span>
                                <span class="twPc-StatValue">9.840</span>
                            </a>
                        </li>
                        <li class="twPc-ArrangeSizeFit">
                            <a href="https://twitter.com/mertskaplan/following" title="885 Following">
                                <span class="twPc-StatLabel twPc-block">Following</span>
                                <span class="twPc-StatValue">885</span>
                            </a>
                        </li>
                        <li class="twPc-ArrangeSizeFit">
                            <a href="https://twitter.com/mertskaplan/followers" title="1.810 Followers">
                                <span class="twPc-StatLabel twPc-block">Followers</span>
                                <span class="twPc-StatValue">1.2m</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide rr" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="https://media.istockphoto.com/id/517188688/fr/photo/paysage-de-montagne.jpg?s=612x612&w=0&k=20&c=pB4ewEznPPXu63-wemLp-I9O6zZmKWbsFKpyNBiMXiU=" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://media.istockphoto.com/id/1146517111/photo/taj-mahal-mausoleum-in-agra.jpg?s=612x612&w=0&k=20&c=vcIjhwUrNyjoKbGbAQ5sOcEzDUgOfCsm9ySmJ8gNeRk=" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="..." alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>







<?php
}else {
    header("location: index.php");
    exit();
}
?>
