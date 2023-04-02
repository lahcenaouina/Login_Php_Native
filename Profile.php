<?php
include "header.php";
if (isset($_SESSION["username"])) {
?>

<div class="container">
    <div class="row">

        <!-- code start -->
        <div class="twPc-div">
            <a class="twPc-bg twPc-block"></a>

            <div>
                <div class="twPc-button">
                    <!-- Twitter Button | you can get from: https://about.twitter.com/tr/resources/buttons#follow -->
                    <a href="https://twitter.com/mertskaplan" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false" data-dnt="true">Follow @mertskaplan</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                    <!-- Twitter Button -->
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
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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
