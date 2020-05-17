<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container contact-form">
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
            </div>
            <form method="post" id="contactForm">
                @csrf
                <h3>Drop Us a Message</h3>
                  <span id="message"></span>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your Name *" value="" />
                        </div>
                        
                        
                        <div class="form-group">
                            <input type="button" onclick='submitform()' class="btnContact" value="Send Message" />
                        </div>
                    </div>
                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
                </div>
            </form>

            <script>
              function submitform(){
              var formData = $("#contactForm").serializeArray();

               $("#message").html("<small><img src='https://i.ya-webdesign.com/images/loading-animated-png-3.gif'  style='width: 70.6667px; height: 53px; margin: 2.75px 0px;'></small>Loading....");
               $.ajax({
                        url :"{{url('api/send')}}" ,
                        type: "POST",
                        data : formData,
                        success: function(data, textStatus, jqXHR)
                        {
                            if(data.success==true)
                                $("#message").html(data.msg)
                                 $("#contactForm").trigger("reset");
                            


                             
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                     
                        }
                    });
              }

            </script>
</div>