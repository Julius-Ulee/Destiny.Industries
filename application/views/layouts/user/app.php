<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= isset($title) ? $title : 'Destiny.Industries' ?> - Destiny.Industries</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Montserrat Font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">
	<!-- favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>assets/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/favicon-16x16.png">
	<link rel="manifest" href="<?= base_url() ?>assets/site.webmanifest">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/owl-carousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/owl-carousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
</head>
<body>
	
	<!-- Navbar -->
	<?php $this->load->view('layouts/user/_navbar') ?>
	<!-- End Navbar -->

	<!-- Content -->
    <?php $this->load->view($page) ?>
	<!-- End Content -->

	<!-- Footer -->
	<div class="mt-5" style="width: 100%;
    height: 50px;
    padding-left: 0px;
    line-height: 50px;">
		<footer class="text-white">
			<div class="container">
				<div class="row py-4">
					<div class="col-lg-4 col-sm-12 mb-3">
						<h4>Kontak</h4>
						<p class="mt-4">
							Jl Kramat 98, jakarta
							<br><br>
							WA: +62 6666 6666 6666 <br>
							MAIL: cloth@mail.com
						</p>
					</div>
					<div class="col-lg-4 col-sm-12 mb-3">
						<h4>Bantuan</h4>
						<div class="mt-4">
							<a href="" class="text-white">Tentang Kami</a><br>
							<a href="" class="text-white">Cara Belanja</a><br>
							<a href="" class="text-white">Konfirmasi Transfer</a>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 mb-3">
						<h4>Sosial Media</h4>
						<div class="mt-4">
							<a href="" class="text-white mr-3"><i class="fab fa-facebook-f"></i></a>
							<a href="" class="text-white mr-3"><i class="fab fa-twitter"></i></a>
							<a href="" class="text-white mr-3"><i class="fab fa-instagram"></i></a>
							<a href="" class="text-white mr-3"><i class="fab fa-linkedin-in"></i></a>
							<a href="" class="text-white mr-3"><i class="fab fa-youtube"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="mt-1 border-top border-white">
				<div class="container mt-3">
					<div class="row">
						<div class="col-lg-6 col-sm-12">
							<p>&copy; 2025 Destiny.Industries</p>
						</div>
						<div class="col-lg-6 col-sm-12">
							<a href="" class="text-white">Developer</a> |
							<a href="" class="text-white">Kebijakan Privasi</a> |
							<a href="" class="text-white">Persyaratan & Ketentuan</a>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<!-- End Footer -->


	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/owl-carousel/owl.carousel.min.js"></script>
	<script type="text/javascript">
		
		$(document).ready(function() {
 
		  	$("#owl-demo").owlCarousel({
		 
		      	navigation : true, // Show next and prev buttons
		 		loop	: true,
		 		autoplay	: true,
		 		autoplayTimeout : 5000,

		      	slideSpeed : 300,
		      	paginationSpeed : 400,
		 	
		      	items : 1, 
		      	itemsDesktop : false,
		      	itemsDesktopSmall : false,
		      	itemsTablet: false,
		      	itemsMobile : false
		 
		  	});
		 
		});
	</script>
    <script>
        $(document).ready(function(){
            if($('select[name=province]').length > 0 && $('select[name=city]').length > 0){
                $('select[name=province]').change(function(){
                    $('select[name=city]').html('<option value="">Loading...</option>');
                    var province = $(this).val();
                    $.ajax({
                        url: "<?= base_url('api/address/city/') ?>" + province,
                        context: document.body,
                        success: function(response){
                            $('select[name=city]').html('<option value="">-- pilih kota --</option>');
                            if(response){
                                var cities = response;
                                for(let i = 0; i < cities.length; i++){
                                    $('select[name=city]').append('<option value="'+cities[i].code+'">'+cities[i].name+'</option>');
                                }
                            }
                        }
                    });
                });
                
            }
        });
    </script>
</body>
</html>