
<?php
     if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     }

?>
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST">

    <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Send Promotion Message</h1>
          </div> 
       </div> 
                  <div class="form-group">
                            <div class="form-group col-md-12">
                                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                            </div>                         
                            <div class="form-group col-md-12">
                                <input type="submit" name="save" class="btn btn-primary pull-right" value="Send">
                            </div>
                  </div>
          
        </form>
      
 