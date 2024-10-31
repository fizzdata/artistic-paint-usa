 <!-- start quote area -->
 <section id="contact" class="home2 quote">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bg">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="image">
                                    <img src="assets/img/quote-img.png" alt="Quote">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="content">
                                    <div class="section-title wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1s" style="visibility: hidden; animation-duration: 1s; animation-delay: 0.3s; animation-name: none;">
                                        <h2>get a free quote</h2>
                                    </div>
                                    <form action="" id="ajax-form" class="wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1s" style="visibility: hidden; animation-duration: 1s; animation-delay: 0.5s; animation-name: none;">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label for="name">
                                                    <input type="text" id="name" placeholder="your name" class="inputs" name="name">
                                                    <i class="far fa-user"></i>
                                                </label>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="email">
                                                    <input type="email" id="email" placeholder="your email" class="inputs" name="email">
                                                    <i class="far fa-envelope-open"></i>
                                                </label>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="phn">
                                                    <input type="tel" id="phn" placeholder="phone no." class="inputs" name="phone">
                                                    <i class="fas fa-phone-alt"></i>
                                                </label>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="sub">
                                                    <input type="text" id="sub" placeholder="subject" class="inputs" name="subject">
                                                    <i class="far fa-edit"></i>
                                                </label>
                                            </div>
                                            <div class="col-lg-12">
                                                <label for="msg" class="msg">
                                                    <textarea class="inputs" id="msg" placeholder="your message" name="message"></textarea>
                                                    <i class="fas fa-comment-dots"></i>
                                                </label>
                                            </div>
                                            <p style="font-size: 12px; line-height:normal">By clicking "Submit" I agree to receive emails, text messages, and phone calls. Consent is not a condition of purchase. <br>Msg & data rates may apply. Message frequency varies. Unsubscribe at any time by replying STOP.</p>

                                            <div class="col-lg-12">
                                                <button id="submit-contact" type="submit" class="button-style">Submit</button>
                                            </div>
                                        </div>
                                        <div id="form-messages" class="alert" role="alert"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end quote area -->

<script>
        document.getElementById('ajax-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting the traditional way

            document.getElementById('submit-contact').innerHTML = "sending...";


            const formData = new FormData(this);
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '/contact', true); // Replace with your server endpoint

            // Set CSRF token header
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            //xhr.setRequestHeader('CONTENT-TYPE', 'application/json');
            
            xhr.onload = function() {

                
                try {
                const response = JSON.parse(xhr.responseText); // Parse the JSON response
                if (response.success === true){
                        document.getElementById('form-messages').style = "color:green"; // set color
                        document.getElementById('form-messages').innerHTML = response.msg; // Display the response
                        document.getElementById('ajax-form').reset(); // Reset the form
                        document.getElementById('submit-contact').innerHTML = "Submit";

                    } else{
                        document.getElementById('form-messages').style = "color:red"; // set color
                        document.getElementById('form-messages').innerHTML = response.msg; // Display the response

                        document.getElementById('submit-contact').innerHTML = "Try Again";
                    }

            } catch (e) {
                  document.getElementById('form-messages').style = "color:red"; // Display the response
                    document.getElementById('form-messages').innerHTML = 'An error occurred: ' + xhr.statusText;
                    document.getElementById('submit-contact').innerHTML = "Submit";
            }


            };

            xhr.onerror = function() {
                document.getElementById('form-messages').innerHTML = 'An error occurred during the request.';
            };

            xhr.send(formData); // Send the form data

        });
    </script>