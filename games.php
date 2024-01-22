<?php include 'includes/header.php'; ?>



	<!-- ===========PageHeader Section Start Here========== -->
	<section class="pageheader-section" style="background-image: url(assets/images/pageheader/bg.jpg);">
		<div class="container">
            <div class="section-wrapper text-center text-uppercase">
                <h2 class="pageheader-title">most popular game</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">matche</li>
                    </ol>
                </nav>
            </div>
		</div>
	</section>
	<!-- ===========PageHeader Section Ends Here========== -->


	<!-- ===========match schedule Section start Here========== -->
	<section class="match-section padding-top padding-bottom">
		<div class="container">
			<div class="section-wrapper">
                <ul class="match-filter-button-group common-filter-button-group d-flex flex-wrap justify-content-center mb-5 text-uppercase">  
                    <li class="is-checked" data-filter="*">All matches</li>
                    <li data-filter=".match-one">today’s matches</li>
                    <li data-filter=".match-two">upcoming matches</li>
                    <li data-filter=".match-three">matche results</li>
                </ul>
				<div class="row g-4 match-grid grid">
                    <div class="col-lg-6 col-12 matchlistitem match-one">
                        <div class="game__item item-layer">
							<div class="game__inner text-center p-0">
								<div class="game__thumb mb-0">
									<img src="assets/images/game/01.jpg" alt="game-img" class="rounded-3 w-100">
								</div>
								<div class="game__overlay">
									<div class="game__overlay-left">
										<h4>Fast Parity Games</h4>
										<p>Catagory: Roulette</p>
									</div>
									<div class="game__overlay-right">
										<a href="parity.php" class="default-button"><span>play now <i class="icofont-circled-right"></i></span> </a>
									</div>
								</div>
							</div>
						</div>
                    </div>
                    <div class="col-lg-6 col-12 matchlistitem match-two">
                        <div class="game__item item-layer">
							<div class="game__inner text-center p-0">
								<div class="game__thumb mb-0">
									<img src="assets/images/game/02.jpg" alt="game-img" class="rounded-3 w-100">
								</div>
								<div class="game__overlay">
									<div class="game__overlay-left">
										<h4>free poker games</h4>
										<p>Catagory: Roulette</p>
									</div>
									<div class="game__overlay-right">
										<a href="aviator.php" class="default-button"><span>play now <i class="icofont-circled-right"></i></span> </a>
									</div>
								</div>
							</div>
						</div>
                    </div>
					<div class="col-lg-6 col-12 matchlistitem match-three">
                        <div class="game__item item-layer">
							<div class="game__inner text-center p-0">
								<div class="game__thumb mb-0">
									<img src="assets/images/game/03.jpg" alt="game-img" class="rounded-3 w-100">
								</div>
								<div class="game__overlay">
									<div class="game__overlay-left">
										<h4>free poker games</h4>
										<p>Catagory: Roulette</p>
									</div>
									<div class="game__overlay-right">
										<a href="#" class="default-button"><span>play now <i class="icofont-circled-right"></i></span> </a>
									</div>
								</div>
							</div>
						</div>
                    </div>
                    <div class="col-lg-6 col-12 matchlistitem match-one">
                        <div class="game__item item-layer">
							<div class="game__inner text-center p-0">
								<div class="game__thumb mb-0">
									<img src="assets/images/game/04.jpg" alt="game-img" class="rounded-3 w-100">
								</div>
								<div class="game__overlay">
									<div class="game__overlay-left">
										<h4>free poker games</h4>
										<p>Catagory: Roulette</p>
									</div>
									<div class="game__overlay-right">
										<a href="#" class="default-button"><span>play now <i class="icofont-circled-right"></i></span> </a>
									</div>
								</div>
							</div>
						</div>
                    </div>
				</div>
			</div>
		</div>
	</section>
	<!-- ===========match schedule Section Ends Here========== -->





<?php include 'includes/footer.php'; ?>