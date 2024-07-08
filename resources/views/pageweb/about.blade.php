@extends('template-web.layout')

@section('content')
  <!--? About Start-->
  <div class="about-area section-padding2">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-lg-6 col-md-10">
                <div class="about-caption mb-50">
                    <!-- Section Title -->
                    <div class="section-tittle section-tittle2 mb-35">
                        <span>About Our Company</span>
                        <h2>Welcome To Our Klinik</h2>
                    </div>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                </div>
            </div>
            
            <!-- Contact Section -->
            <div class="col-lg-6 col-md-12">
                <div class="section-tittle section-tittle2 mb-35">
                    <span>Contact</span>
                </div>
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Send Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
  </div>
  <!-- About End-->
@endsection
