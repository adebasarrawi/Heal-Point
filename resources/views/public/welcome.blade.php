<x-app-layout>



    <!-- Slider Start -->
    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-xl-7">
                    <div class="block">
                        <div class="divider mb-3"></div>
                        <span class="text-uppercase text-sm letter-spacing ">Total Health care solution</span>
                        <h1 class="mb-3 mt-3">Your most trusted health partner</h1>

                        <p class="mb-4 pr-5">A repudiandae ipsam labore ipsa voluptatum quidem quae laudantium quisquam aperiam maiores sunt fugit, deserunt rem suscipit placeat.</p>
                        <div class="appointment-container ">
                            <div class="select-group">
                                <select class="appointment-select" id="governorate">
                                    <option value="">Select Governorate</option>
                                    <option value="ajloun">Ajloun</option>
                                    <option value="amman">Amman</option>
                                    <option value="aqaba">Aqaba</option>
                                    <option value="balqa">Balqa</option>
                                    <option value="irbid">Irbid</option>
                                    <option value="jerash">Jerash</option>
                                    <option value="karak">Karak</option>
                                    <option value="maan">Ma'an</option>
                                    <option value="madaba">Madaba</option>
                                    <option value="mafraq">Mafraq</option>
                                    <option value="tafilah">Tafilah</option>
                                    <option value="zarqa">Zarqa</option>
                                </select>
                            </div>

                            <div class="select-group">
                                <select class="appointment-select" id="specialty">
                                    <option value="">Select Specialty</option>
                                    <option value="cardiology">Cardiology</option>
                                    <option value="neurology">Neurology</option>
                                    <option value="pediatrics">Pediatrics</option>
                                    <option value="orthopedics">Orthopedics</option>
                                    <option value="dentistry">Dentistry</option>
                                    <option value="dermatology">Dermatology</option>
                                </select>
                            </div>

                            <div class="btn-container">
                                <a href="appointment.html" target="_blank" class="btn btn-main-2 btn-icon btn-round-full">
                                    Search   <i class="icofont-simple-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <section class="recommended-doctors">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row justify-center ">
                        <div class="col-lg-7 text-center">
                            <h2 class="section-title">Features Doctors</h2>
                            <div class="divider mx-auto my-4"></div>
                        </div>
                    </div>

                    <div class="splide" id="doctors-slider">
                        <div class="splide__track">
                            <ul class="splide__list">

                                <!-- Doctor Card 1 -->
                                <li class="splide__slide">
                                    <div class="doctor-card">
                                        <img src="/images/team/1.jpg" alt="Doctor" class="doctor-image">
                                        <div class="doctor-info">
                                            <h3 class="doctor-name">Dr. Rania Khalil</h3>
                                            <span class="doctor-specialty">Pediatrician</span>
                                            <div class="btn-container">
                                                <a href="appointment.html" class="btn btn-main">
                                                    Book <i class="icofont-simple-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!-- Doctor Card 2 -->
                                <li class="splide__slide">
                                    <div class="doctor-card">
                                        <img src="/images/team/2.jpg" alt="Doctor" class="doctor-image">
                                        <div class="doctor-info">
                                            <h3 class="doctor-name">Dr. Ahmad Al-Masri</h3>
                                            <span class="doctor-specialty">Cardiologist</span>
                                            <div class="btn-container">
                                                <a href="appointment.html" class="btn btn-main">
                                                    Book <i class="icofont-simple-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!-- Doctor Card 3 -->
                                <li class="splide__slide">
                                    <div class="doctor-card">
                                        <img src="/images/team/3.jpg" alt="Doctor" class="doctor-image">
                                        <div class="doctor-info">
                                            <h3 class="doctor-name">Dr. Sara Nasser</h3>
                                            <span class="doctor-specialty">Dermatologist</span>
                                            <div class="btn-container">
                                                <a href="appointment.html" class="btn btn-main">
                                                    Book <i class="icofont-simple-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!-- Add more doctor cards as needed -->

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Splide('#doctors-slider', {
            type: 'loop',
        perPage: 4,
        perMove: 2,
        autoplay: true,
        interval: 3000,
        gap: '20px',
        padding: '50px',
        pagination: false,
        breakpoints: {
          1200: {
            perPage: 3,
            gap: '50px',
            padding: '40px'
          },
          1024: {
            perPage: 2,
            gap: '40px',
            padding: '30px'
          }, // Show 2 slides on smaller screens
          768: {
            perPage: 2,
            perMove: 1,
            gap: '30px',
            padding: '20px'
          }, // Show 1 slide on mobile
          568: {
            perPage: 1,
            perMove: 1,
            gap: '40px',
            padding: '80px'
          }, // Show 1 slide on mobile
          400: {
            perPage: 1,
            perMove: 1,
            gap: '40px',
            padding: '60px'
          } // Show 1 slide on mobile
        }
      }).mount();
    });
</script>

    <!-- ======= New: How It Works Section ======= -->
    <section class="steps-section pt-5 pb-5">
        <div class="container">
            <div class="row justify-center ">
                <div class="col-lg-7 text-center">
                    <h2 class="section-title">How To Book An Appointment</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p class="text-muted">Simple steps to get the care you need</p>
                </div>
            </div>

            <div class="row justify-center gap-5">
                <div class="col-lg-3 col-md-6">
                    <div class="step-card text-center p-4 bg-white rounded shadow-sm">
                        <div class="step-icon mb-4 bg-soft-primary rounded-circle d-inline-flex align-items-center justify-content-center">
                            <i class="icofont-doctor-alt text-primary" style="font-size: 2rem;"></i>
                            <span class="step-number bg-primary text-white rounded-circle">1</span>
                        </div>
                        <h4 class="text-dark">Find Your Doctor</h4>
                        <p class="text-muted">Search by specialty, location, or doctor name</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="step-card text-center p-4 bg-white rounded shadow-sm">
                        <div class="step-icon mb-4 bg-soft-primary rounded-circle d-inline-flex align-items-center justify-content-center">
                            <i class="icofont-ui-calendar text-primary" style="font-size: 2rem;"></i>
                            <span class="step-number bg-primary text-white rounded-circle">2</span>
                        </div>
                        <h4 class="text-dark">Select Time Slot</h4>
                        <p class="text-muted">Choose from available dates and times</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="step-card text-center p-4 bg-white rounded shadow-sm">
                        <div class="step-icon mb-4 bg-soft-primary rounded-circle d-inline-flex align-items-center justify-content-center">
                            <i class="icofont-check-alt text-primary" style="font-size: 2rem;"></i>
                            <span class="step-number bg-primary text-white rounded-circle">3</span>
                        </div>
                        <h4 class="text-dark">Confirm Booking</h4>
                        <p class="text-muted">Receive instant confirmation via SMS/Email</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= New: Specialties Grid Section ======= -->
    <section class="specialties-section pt-5 pb-5 bg-gray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <h2 class="section-title">Our Medical Specialties</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p class="text-muted">Book appointments across 10+ medical specialties</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <a href="#" class="specialty-card d-block p-4 bg-white rounded text-center h-100">
                        <i class="icofont-heart-beat-alt text-primary mb-3" style="font-size: 2.5rem;"></i>
                        <h5 class="text-dark">Cardiology</h5>
                        <p class="text-muted mb-0">Heart health specialists</p>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <a href="#" class="specialty-card d-block p-4 bg-white rounded text-center h-100">
                        <i class="icofont-brain-alt text-primary mb-3" style="font-size: 2.5rem;"></i>
                        <h5 class="text-dark">Neurology</h5>
                        <p class="text-muted mb-0">Brain & nervous system</p>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <a href="#" class="specialty-card d-block p-4 bg-white rounded text-center h-100">
                        <i class="icofont-baby text-primary mb-3" style="font-size: 2.5rem;"></i>
                        <h5 class="text-dark">Pediatrics</h5>
                        <p class="text-muted mb-0">Child healthcare</p>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <a href="#" class="specialty-card d-block p-4 bg-white rounded text-center h-100">
                        <i class="icofont-tooth text-primary mb-3" style="font-size: 2.5rem;"></i>
                        <h5 class="text-dark">Dentistry</h5>
                        <p class="text-muted mb-0">Oral health care</p>
                    </a>
                </div>


            </div>

            <div class="text-center mt-4">
                <a href="#" class="btn btn-main">View All Specialties</a>
            </div>
        </div>
    </section>

    <!-- ======= New: Stats Counter Section ======= -->
    <section class="stats-section pt-5 pb-5 bg-primary-darker text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="stat-card text-center">
                        <i class="icofont-doctor mb-3" style="font-size: 3rem;"></i>
                        <h3 class="mt-2 counter"><span class="counter">150</span>+</h3>
                        <p class="mb-0">Qualified Doctors</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="stat-card text-center">
                        <i class="icofont-google-map mb-3" style="font-size: 3rem;"></i>
                        <h3 class="mt-2"><span class="counter">12</span></h3>
                        <p class="mb-0">Governorates Covered</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-sm-0">
                    <div class="stat-card text-center">
                        <i class="icofont-laughing mb-3" style="font-size: 3rem;"></i>
                        <h3 class="mt-2 counter"><span class="counter">10,000</span>+</h3>
                        <p class="mb-0">Happy Patients</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="stat-card text-center">
                        <i class="icofont-clock-time mb-3" style="font-size: 3rem;"></i>
                        <h3 class="mt-2 counter"><span class="counter">24</span>/7</h3>
                        <p class="mb-0">Support Available</p>
                    </div>
                </div>
            </div>
        </div>
    </section>




<section class="testimonials-section pt-5 pb-5 bg-gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <h2 class="section-title">What Patients Say</h2>
                <div class="divider mx-auto my-4"></div>
                <p class="text-muted">Hear from our satisfied patients</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="splide" id="testimonials-slider">
                    <div class="splide__track p-1">
                        <ul class="splide__list ">
                            <!-- Testimonial 1 -->
                            <li class="splide__slide">
                                <div class="testimonial-item bg-white p-4 rounded shadow-sm h-100">
                                    <div class="testimonial-content mb-4">
                                        <i class="icofont-quote-left text-primary mb-3" style="font-size: 1.5rem;"></i>
                                        <p class="font-italic">"Found the perfect cardiologist through this platform. The booking process was seamless and the doctor was excellent."</p>
                                    </div>
                                    <div class="patient-info d-flex align-items-center">
                                        <img src="/images/testimonial-1.jpg" alt="Patient" class="rounded-circle me-3" width="50">
                                        <div>
                                            <h5 class="mb-1">Mohammad Ali</h5>
                                            <span class="text-muted small">Amman</span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <!-- Testimonial 2 -->
                            <li class="splide__slide">
                                <div class="testimonial-item bg-white p-4 rounded shadow-sm h-100">
                                    <div class="testimonial-content mb-4">
                                        <i class="icofont-quote-left text-primary mb-3" style="font-size: 1.5rem;"></i>
                                        <p class="font-italic">"The pediatrician we found was wonderful with my children. The whole experience was stress-free."</p>
                                    </div>
                                    <div class="patient-info d-flex align-items-center">
                                        <img src="/images/testimonial-2.jpg" alt="Patient" class="rounded-circle me-3" width="50">
                                        <div>
                                            <h5 class="mb-1">Layla Hassan</h5>
                                            <span class="text-muted small">Irbid</span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <!-- Testimonial 3 -->
                            <li class="splide__slide">
                                <div class="testimonial-item bg-white p-4 rounded shadow-sm h-100">
                                    <div class="testimonial-content mb-4">
                                        <i class="icofont-quote-left text-primary mb-3" style="font-size: 1.5rem;"></i>
                                        <p class="font-italic">"I needed an urgent appointment and the system helped me find available slots immediately. Very efficient!"</p>
                                    </div>
                                    <div class="patient-info d-flex align-items-center">
                                        <img src="/images/testimonial-3.jpg" alt="Patient" class="rounded-circle me-3" width="50">
                                        <div>
                                            <h5 class="mb-1">Omar Khalid</h5>
                                            <span class="text-muted small">Zarqa</span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <!-- Testimonial 4 (additional example) -->
                            <li class="splide__slide">
                                <div class="testimonial-item bg-white p-4 rounded shadow-sm h-100">
                                    <div class="testimonial-content mb-4">
                                        <i class="icofont-quote-left text-primary mb-3" style="font-size: 1.5rem;"></i>
                                        <p class="font-italic">"The dental specialist I found was extremely professional. The online booking saved me hours of phone calls."</p>
                                    </div>
                                    <div class="patient-info d-flex align-items-center">
                                        <img src="/images/testimonial-4.jpg" alt="Patient" class="rounded-circle me-3" width="50">
                                        <div>
                                            <h5 class="mb-1">Rana Ahmad</h5>
                                            <span class="text-muted small">Aqaba</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Splide('#testimonials-slider', {
            type: 'loop',
            perPage: 3,
            perMove: 1,
            autoplay: true,
            interval: 3000,
            gap: '20px',
            padding: '50px',
            pagination: false,
            breakpoints: {
                1200: {
                    perPage: 3,
                    gap: '20px',
                    padding: '40px'
                },
                1024: {
                    perPage: 2,
                    gap: '20px',
                    padding: '30px'
                },
                768: {
                    perPage: 1,
                    gap: '20px',
                    padding: '20px'
                },
                568: {
                    perPage: 1,
                    gap: '20px',
                    padding: '10px'
                },
                400: {
                    perPage: 1,
                    gap: '20px',
                    padding: '10px'
                }
            }
        }).mount();
    });
</script>


    <!-- ======= New: Emergency CTA Section ======= -->
    <section class="emergency-section pt-5 pb-5 bg-primary-darker text-white">
        <div class="container">
            <div class="emergency-cta p-4 rounded">
                <div class="row align-items-center">
                    <div class="col-lg-8 mb-3 mb-lg-0">
                        <h3 class="mb-2">Need Emergency Care?</h3>
                        <p class="mb-0">24/7 emergency appointment availability with our network of hospitals</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="tel:+962790000000" class="btn btn-white btn-round-full">
                            <i class="icofont-phone me-2"></i> Call Now: +962 79 000 0000
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= New: FAQ Section ======= -->
    <section class="faq-section pt-5 pb-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <h2 class="section-title">Frequently Asked Questions</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p class="text-muted">Find answers to common questions about our services</p>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6 mb-4">
                    <div class="faq-item bg-gray p-4 rounded">
                        <h5 class="text-dark mb-3">How do I book an appointment?</h5>
                        <p class="text-muted">Use our search tool to find doctors by specialty or location, select your preferred time slot, and complete the booking form.</p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="faq-item bg-gray p-4 rounded">
                        <h5 class="text-dark mb-3">Can I reschedule my appointment?</h5>
                        <p class="text-muted">Yes, you can reschedule up to 24 hours before your appointment time through the link in your confirmation email.</p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="faq-item bg-gray p-4 rounded">
                        <h5 class="text-dark mb-3">What payment methods do you accept?</h5>
                        <p class="text-muted">We accept cash payments at the clinic. Some clinics may accept credit cards - this will be specified during booking.</p>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="faq-item bg-gray p-4 rounded">
                        <h5 class="text-dark mb-3">Is my personal information secure?</h5>
                        <p class="text-muted">Yes, we use industry-standard encryption to protect all patient data and comply with medical privacy regulations.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= New: Final CTA Section ======= -->
    <section class="final-cta pt-5 pb-5 bg-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-3 mb-lg-0">
                    <h3 class="text-white mb-2">Ready to book your appointment?</h3>
                    <p class="text-white mb-0">Find the right specialist for your healthcare needs today</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="#search-doctors" class="btn btn-main border btn-round-full btn-lg">
                        Find a Doctor Now <i class="icofont-simple-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>






</x-app-layout>



