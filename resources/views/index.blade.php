<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'CoWork')</title>

    {{-- Include your CSS files here --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Additional styles section if you need page-specific styles --}}
    @stack('styles')
</head> 
<body>
    <div class="wrapper">
        <section class="hero">
          <header>
            <div class="container">
              <nav class="navbar navbar-light navbar-toggleable-sm">
                <a href="#" class="navbar-brand mb-0">CoWork</a>

                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#headerNav" aria-controls="headerNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div id="headerNav" class="collapse navbar-collapse justify-content-end">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link" href="#sec-about">About</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="#sec-features">Features</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="#sec-pricing">Pricing</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="#sec-testimonials">Testimonials</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="#sec-contact">Contact</a>
                    </li>
                  </ul>
                </div>
              </nav>
            </div>
          </header>

          <div class="jumbotron jumbotron-fluid mb-0">
            <div class="container">
              <div class="row justify-content-center text-center">
                <div class="col-md-10 col-lg-6">
                  <h1 class="display-5">The Coolest Co-Working Space in Prague</h1>

                  <p class="lead">Where you choose to work has impact on your productivity and creativity. It also says a lot about your business. We are the right office space.</p>

                  <p class="lead">
                    <a class="btn btn-primary btn-lg" href="#sec-pricing" role="button">Reserve Your Spot</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section id="sec-about" class="sec-about pt-5 pb-5">
          <div class="container">
            <div class="row justify-content-center text-center">
              <div class="col-md-10 col-lg-8">
                <h1 class="h4">About us</h1>
                <p class="mt-4 mb-4">Co-working spaces are brilliant for smaller companies of up to 4 people who want a regular workspace. Cost effective, flexible and full of a vibrant energy that comes from hundreds of like-minded people going it alone.</p>
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-sm-4">
                <h4>350</h4>

                <hr />

                <h5>members</h5>
              </div>

              <div class="col-sm-4">
                <h4>60</h4>

                <hr />

                <h5>co-working spaces </h5>
              </div>

              <div class="col-sm-4">
                <h4>3</h4>

                <hr />

                <h5>members' bars</h5>
              </div>
            </div>
          </div>
        </section>

        <section id="sec-features" class="sec-features pt-5 pb-5">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-6">
                <h3 class="h4">Lockers</h3>

                <hr />

                <p>Lockers come in all different shapes and sizes and can be hired in any building, even if it’s not your home building.</p>
              </div>

              <div class="col-md-6 text-center">
                {{-- SVG Icon --}}
              </div>
            </div>

            <div class="row align-items-center">
              <div class="col-md-6 text-center">
                {{-- SVG Icon --}}
              </div>

              <div class="col-md-6">
                <h3 class="h4">Building address/Mail handling</h3>

                <hr />

                <p>A Czech business address for you and your mail. We can either hold your mail for you to collect, or forward it on to wherever you are.</p>
              </div>
            </div>

            <div class="row align-items-center">
              <div class="col-md-6">
                <h3 class="h4">Call answering</h3>

                <hr />

                <p>We’ll provide someone to answer your calls professionally using your company name. They’ll be put through to you, or we’ll take a message if you’re unavailable.</p>
              </div>

              <div class="col-md-6 text-center">
                {{-- SVG Icon --}}
              </div>
            </div>
          </div>
        </section>

        <section id="sec-pricing" class="sec-pricing">
          <div class="container">
            <h1 class="h4 mb-5 text-center">Great prices for everyone</h1>

            <div class="row justify-content-center">
              <div class="col-md-4">
                <div class="card text-center">
                  <div class="card-block">
                    <h4 class="card-title h5">Individual</h4>

                    <h5 class="card-title h6">100 &euro;/month</h5>

                    <p class="card-text">The flexible place to grow your projects in a community of start-ups, freelancers and entrepreneurs, flex desk.</p>

                    <a href="#" class="btn btn-primary">Find out more</a>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card text-center">
                  <div class="card-block">
                    <h4 class="card-title h5">Small Group</h4>

                    <h5 class="card-title h6">320 &euro;/month</h5>

                    <p class="card-text">Your own personal area in an open space: desk, drawers, locker and bookcase to accessorise however you like.</p>

                    <a href="#" class="btn btn-primary">Find out more</a>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card text-center">
                  <div class="card-block justify-content-center">
                    <h4 class="card-title h5">Large Group</h4>

                    <h5 class="card-title h6">640 &euro;/month</h5>

                    <p class="card-text">Your own private space, perfect for work teams of up to 50 people, inside a structure that’s always in motion</p>

                    <a href="#" class="btn btn-primary">Find out more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section id="sec-testimonials" class="sec-testimonials">
          <div class="container">
            <h1 class="h4 mb-5 text-center">Words from our members</h1>

            <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselIndicators" data-slide-to="1"></li>
                <li data-target="#carouselIndicators" data-slide-to="2"></li>
              </ol>

              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <div class="row justify-content-center">
                    <div class="col-md-6">
                      <blockquote class="blockquote">
                        <small>The vibe here is bright and very optimistic. Clients love to visit us here and every day we make new friends and contacts with other start-ups. Being a a member is our secret super power.</small>

                        <footer class="blockquote-footer mt-2">Timothy Wilson, CTO</footer>
                      </blockquote>
                    </div>
                  </div>
                </div>

                <div class="carousel-item">
                  <div class="row justify-content-center">
                    <div class="col-md-6">
                      <blockquote class="blockquote">
                        <small>I've been a member for over 3 years. We have always been welcomed by friendly faces and helpful staff. This co-working space has everything we need from Wi-Fi to fresh and delicious coffee.</small>

                        <footer class="blockquote-footer mt-2">Ziva Stark, CEO</footer>
                      </blockquote>
                    </div>
                  </div>
                </div>

                <div class="carousel-item">
                  <div class="row justify-content-center">
                    <div class="col-md-6">
                      <blockquote class="blockquote">
                        <small>I joined since its opening and I couldn't have found a better working space. Being a member is so inspiring and I love the work environment: spacious, bright and full of entrepreneurs like me!</small>

                        <footer class="blockquote-footer mt-2">Teresa Swanson, CEO</footer>
                      </blockquote>
                    </div>
                  </div>
                </div>
              </div>

              <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                <span class="fa fa-angle-left fa-2x"></span>
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>

              <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                <span class="fa fa-angle-right fa-2x"></span>
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </section>

        <section id="sec-contact" class="sec-contact pt-5 pb-5">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-7">
                <h1 class="h4">Have a question? Get in touch with us!</h1>

                <form action="#" method="POST">
                  @csrf
                  <fieldset class="form-group">
                    <label for="formName">Your Name:</label>
                    <input id="formName" name="name" class="form-control" type="text" placeholder="Your Name" required>
                  </fieldset>

                  <fieldset class="form-group">
                    <label for="formEmail1">Email address:</label>
                    <input id="formEmail1" name="email" class="form-control" type="email" placeholder="Enter email" required>
                  </fieldset>

                  <fieldset class="form-group">
                    <label for="formMessage">Your Message:</label>
                    <textarea id="formMessage" name="message" class="form-control" rows="3" placeholder="Your message" required></textarea>
                  </fieldset>

                  <fieldset class="form-group text-center">
                    <button class="btn btn-primary" type="submit">Send Message</button>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </section>

        <footer class="footer">
          <div class="container">
            <ul class="list-inline mb-0 text-center">
              <li class="list-inline-item">
                <a href="#"><span class="fa fa-twitter"></span></a>
              </li>

              <li class="list-inline-item">
                <a href="#"><span class="fa fa-google-plus"></span></a>
              </li>

              <li class="list-inline-item">
                <a href="#"><span class="fa fa-instagram"></span></a>
              </li>

              <li class="list-inline-item">
                <a href="#"><span class="fa fa-envelope-o"></span></a>
              </li>
            </ul>
          </div>
        </footer>
      </div>
      <script src="{{ asset('js/app.js') }}"></script>
</body>
