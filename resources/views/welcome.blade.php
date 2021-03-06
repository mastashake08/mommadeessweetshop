<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Welcome to Momma Dees Sweet Shop! Organic loving goodness delivered right to your door!
    Order our peanut butter no bake $10 for a tin deal, have it at your door NEXT DAY!">
    <meta name="author" content="Jyrone Parker">

    <script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Product",
  "name": "Peanut Butter No Bake Cookies 18 Count",
  "image": "https://mommadeessweetshop.com/theme/img/header.jpg",
  "description": "No bake peanut butter cookies make organically with love! All orders include next day shipping! Perfect for parties and cozy nights.",
  "sku": "ten-for-a-tin",
  "brand": {
    "@type": "Thing",
    "name": "Momma Dees Sweets"
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.4",
    "reviewCount": "89"
  },
  "offers": {
    "@type": "Offer",
    "priceCurrency": "USD",
    "price": "10.00",
    "availability": "http://schema.org/InStock",
    "seller": {
      "@type": "Organization",
      "name": "Momma Dees Sweet Shop"
    }
  }
}
</script>

<!-- jQuery -->
<script src="theme/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="theme/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="theme/js/jquery.easing.min.js"></script>
<script src="theme/js/jquery.fittext.js"></script>
<script src="theme/js/wow.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="theme/js/creative.js"></script>

    <title>Momma Dees Sweet Shop</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="theme/css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="theme/css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="theme/css/creative.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Momma Dees Sweet Shop</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#example-sweets">Example Sweets</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Your Favorite Source of Sweet Goodness</h1>
                <hr>
                <p>Country baked cookies delivered right to your door!</p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">I've got what you need!</h2>
                    <hr class="light">
                    <p class="text-faded">Order a 18 count tin deal and have the delicious no-bake cookies delivered to your door!</p>


                    <script src="https://checkout.stripe.com/checkout.js"></script>

<button class="btn btn-lg btn-success" id="customButton">Buy some NOW!</button>

<script>


  $('#customButton').on('click', function(e) {
    // Open Checkout with further options
    var ans = prompt('How many tins would you like to buy?');
    if(ans >=1)
    {
    var handler = StripeCheckout.configure({
      key: "{{env('STRIPE_KEY')}}",
      image: 'theme/img/header.jpg',
      locale: 'auto',
      shippingAddress: true,
      token: function(token) {
        // Use the token to create the charge with a server-side script.
        // You can access the token ID with `token.id`
        if(token.card.address_line2 != null){
        var data ={
          quantity: ans,
          stripeToken: token.id,
          name:token.card.name,
          email: token.email,
          address: token.card.address_line1 + ' ' + token.card.address_line2 + ' ' + token.card.address_city + ' ' + token.card.address_state + ' ' + token.card.address_zip
        };
        $.post("/charge",data, function(data, status){
       alert(data);
   });
      }
      else{
        var data ={
          quantity: ans,
          stripeToken: token.id,
          name:token.card.name,
          email: token.email,
          address: token.card.address_line1  + ' ' + token.card.address_city + ' ' + token.card.address_state + ' ' + token.card.address_zip
        };
        $.post("/charge",data, function(data, status){
       alert(data);
   });
      }
        console.log(data);
      }
    });
    handler.open({
      name: 'Momma Dees Sweet Shop',
      description: ans + ' 18 count No Bake Cookies',
      amount: 3998 * ans
    });
  }
  else {
    alert('MUST BUY AT LEAST 1 TIN!');
  }
    e.preventDefault();
  });

  // Close Checkout on page navigation
  $(window).on('popstate', function() {
    handler.close();
  });
</script>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">At Your Service</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>
                        <h3>Organic Goodness</h3>
                        <p class="text-muted">My cookies are always made with the freshest ingredients.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>Ready to Ship</h3>
                        <p class="text-muted">Simply place an order and it will be over nighted!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>Custom Services</h3>
                        <p class="text-muted">Need cakes and other goodies? Contact me and place a special order!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>Made with Love</h3>
                        <p class="text-muted">You can taste in every bite!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding" id="example-sweets">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="theme/img/portfolio/1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    <!-- Category -->
                                </div>
                                <div class="project-name">
                                    <!-- Project Name -->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="theme/img/portfolio/2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    <!-- Category -->
                                </div>
                                <div class="project-name">
                                    <!-- Project Name -->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="theme/img/portfolio/3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    <!-- Category -->
                                </div>
                                <div class="project-name">
                                    <!-- Project Name -->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="theme/img/portfolio/4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    <!-- Category -->
                                </div>
                                <div class="project-name">
                                    <!-- Project Name -->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="theme/img/portfolio/5.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    <!-- Category -->
                                </div>
                                <div class="project-name">
                                    <!-- Project Name -->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="theme/img/portfolio/6.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    <!-- Category -->
                                </div>
                                <div class="project-name">
                                    <!-- Project Name -->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>



    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="primary">
                    <p>Want to do a bulk or custom order? That's great! Give me a call or send me an email and I will get back to you as soon as possible!</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>859-325-3731</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:orders@mommadeessweetshop.com">orders@mommadeessweetshop.com</a></p>
                </div>
            </div>
        </div>
    </section>



</body>

</html>
