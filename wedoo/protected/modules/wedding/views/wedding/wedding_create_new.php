<!--main -->
<div class="main">
    <!-- wedding-setup -->
    <div class="wedding-setup">
    	<a href="#" class="logout">LOGOUT</a>
    	<!--container -->
        <div class="container">
        
            <!--wedding-part-left-->
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 wedding-part-left">
            	<div class="setup-left">
                	<div class="setup-mid">
						<img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/cupple-logo.png" />		
                        <span class="setuptext">"Lorem ipsum dolor sit amet, consectetur<br /> adipiscing elit, sed do</span>
                        <a href="#"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/weddinglogo.png" class="weddinglogo"/></a>
                    </div>
                </div>
                
            </div>
            <!--wedding-part-left -->
            <!--wedding-part-right-->
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 wedding-part-right">
            	
            	<!--wedding-white -->
                <div class="wedding-white">
                	<!--wedding-vector -->
                    <div class="wedding-vector">
                        <span>Wedoo Wedding Setup</span>
                    </div>
                    <!--wedding-vector -->
                    <!--fields-wedding-->
                    <ul class="fields-wedding">
                        <li>
	                        <span class="name">Bride’s First Name</span>
                            <label class="drowp-name">
                            	<select class="selectpicker drop-name">
                                	<option>Bride</option>
                                	<option>Groom's</option>
                                	<option>Partner</option>
                                </select>
                            	<input type="text" value="" class="weding-tx-bx">
                            </label>
                        </li>
                        <li>
	                        <span class="name">Groom’s First Name</span>
                            <label class="drowp-name">
                            	<select class="selectpicker drop-name">
                                	<option>Bride</option>
                                	<option>Groom's</option>
                                	<option>Partner</option>
                                </select>
                            	<input type="text" value="" class="weding-tx-bx">
                            </label>
                        </li>
                        <li>
	                        <span class="name">Wedding Date</span>
                            <label>
                            	<input type="text" value="" class="weding-tx-bx" id="datepicker">
                                <i class="fa fa-calendar"></i>
                                <p class="pull-right">*Can edit later</p>
                            </label>
                        </li>
                        <li>
	                        <span class="name">Wedding Location</span>
                            <label>
                            	<input type="text" value="" class="weding-tx-bx">
                                <i class="fa fa-map-marker"></i>
                                <p class="pull-right">*Can edit later</p>
                            </label>
                        </li>
                        <li>
	                        <span class="name">Wedding ID</span>
                            <label>
                            	<p>This is how guests will join your Wedding!</p>
                            	<input type="text" value="" placeholder="weddingID" class="weding-tx-bx fullpad">
                                <p>*6 to 16 Alphanumeric characters only</p>
                            </label>
                        </li>
                        <li>
                        	<label><input type="button" value="finish" class="finish-but" /></label>
                        </li>
                    </ul>
                    <!-- fields-wedding -->
                </div>
                <!--wedding-white -->
            </div>
            <!--wedding-part-right-->
        <div class="clearfix"></div>
        </div>
        <!--container -->
    </div>
    <!-- wedding-setup -->
</div>
<!--main -->
<script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery-1.10.2"></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery-ui.js"></script> 
<script>
	$(document).ready(function() {
		$( "#datepicker" ).datepicker();
	});
</script>
<script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/bootstrap-select.min.js"></script>
<script>
	$(document).ready(function() {
		 $('.selectpicker').selectpicker();
	});
</script>
<script>
	$(document).ready(function() {
		var wedleftHeight = $(".wedding-part-right").height();
		$(".setup-mid").height(wedleftHeight);
	});

</script>