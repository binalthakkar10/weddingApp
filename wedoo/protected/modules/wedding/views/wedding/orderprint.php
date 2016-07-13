<!--admin-content -->
<div id="admin-content">
	<!--admin-main -->
	<div class="admin-main">
	        <!--order-prints-main-->
			<div class="order-prints-main selectfirst">
				<section class="admin-white-head">
					<h1><i class="fa fa-print"></i><span>Order prints</span></h1>
				</section>
				<!--order-print -->
				<div class="order-print">
					<div class="mainclr-txt">
						<span class="left-por"></span>
						<span class="txt">Get Started</span>
						<span class="right-por"></span>
					</div>
					<div class="clearfix"></div>
					
					<div class="select-cntry">
						<a class="select-product-but" href="#">SELECT PRODUCTS</a>
						<div class="clearfix"></div>
						<label>
							<span>SELECT YOUR COUNTRY</span>
							<!--<select class="selectpicker product-attrib" onchange="change1(this.value)">-->
							<select class="selectpicker product-attrib country" data-type="country">
								<option>SELECT</option>
								<option>UK</option>
								<option>US</option>
								<option>Aus</option>
								<option>India</option>
							</select>
						</label>
						<label>
							<span>CHANGE CURRENCY</span>
							<select  class="selectpicker product-attrib currency" data-type="currency">
								<option>SELECT</option>
								<option>$</option>
								<option>&pound;</option>
								<option>&euro;</option>
								<option>&yen;</option>
							</select>
						</label>
					</div>
					
					<span class="unlimited-print">Unlimited Prints. Flat Rate Shipping.</span>
				</div>
				<!--order-print -->
			</div>	
			<!--order-prints-main -->
			<!--order-prints-main-->
			<div class="order-prints-main select1">
				<section class="admin-white-head">
                    <h1><i class="fa fa-print"></i><span>Select your Product</span></h1>
                </section>
						<!--select-product -->
						<section class="select-product">
							<a class="contry-but countryname" href="#">UK</a>
							<a class="contry-but currency_symb" href="#">$</a>
							<div class="clearfix"></div>
							<!--print-produt-detail -->
							<div class="print-produt-detail">
								<!--product-detail -->
								<div class="product-detail">
									<span class="detail-head">PRINTS</span>
									<!--detail-section -->
									<div class="detail-section active print">
										<i class="fa fa-square-o"></i>
										<div class="detail-right">
											<span class="size">4x6</span>
											<span class="price"><b class="currency_symb"></b>0.24</span>
										</div>
									</div>                                    	
									<!--detail-section -->
									<!--detail-section -->
									<div class="detail-section print">
										<i class="fa fa-square-o"></i>
										<div class="detail-right">
											<span class="size">8x10</span>
											<span class="price"><b class="currency_symb"></b>0.24</span>
										</div>
									</div>                                    	
									<!--detail-section -->
									<!--detail-section -->
									<div class="detail-section print">
										<i class="fa fa-square-o"></i>
										<div class="detail-right">
											<span class="size">5x7</span>
											<span class="price"><b class="currency_symb"></b>0.24</span>
										</div>
									</div>                                    	
									<!--detail-section -->
									<!--detail-section -->
									<div class="detail-section print">
										<i class="fa fa-square-o"></i>
										<div class="detail-right">
											<span class="size">5x7</span>
											<span class="price"><b class="currency_symb"></b>0.24</span>
										</div>
									</div>                                    	
									<!--detail-section -->
								</div>
								<!--product-detail -->
								<!--product-detail -->
								<div class="product-detail print">
									<span class="detail-head">POSTERS</span>
									<!--detail-section -->
									<div class="detail-section">
										<i class="fa fa-square-o"></i>
										<div class="detail-right">
											<span class="size">16x20</span>
											<span class="price"><b class="currency_symb"></b>0.24</span>
										</div>
									</div>                                    	
									<!--detail-section -->
								</div>
								<!--product-detail -->
							</div>
							<!--print-produt-detail -->
							<span class="contry-btm">*All Sizes in Inches</span>
							<span class="contry-btm">*All Prices in Pound Sterling</span>
						</section>
						<!--select-product -->
			</div>	
			<!--order-prints-main -->
			
			<!--order-prints-main-->
			<div class="order-prints-main select2">
				<section class="admin-white-head">
					<h1><i class="fa fa-square-o"></i><span>Select your Photos</span></h1>
				</section>
				<!--select-photo-->
				<section class="select-your-photo">
					<div class="dorp-main">
						<select class="selectpicker prints">
							<option>4x6 Print</option> 
							<option>8x10 Print</option> 
							<option>5x7 Print</option> 
							<option>5x7 Print</option> 
							<option>16x20 Print</option> 
						</select>
						<select class="selectpicker photos">
							<option>All Photos</option> 
							<option>Photos 1</option> 
							<option>Photos 2</option> 
							<option>Photos 3</option> 
						</select>
					</div>
					<!--any-thing-thumb -->
					<div id="print-image-thumb" class="print-image-thumb">
						<ul>
							<!--print-image -->
							<li>
								<div class="print-image">
									<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/order-print-1.jpg">
									<a class="print-zoom" href="#"><i class="fa fa-search"></i></a>
									<a class="image-quality" href="#">
										<i class="fa fa-frown-o"></i>
										<span>Low</span>
									</a>
									<a class="mid-review" href="#">
										<i class="fa fa-check-circle-o"></i>
										<span>Low Quality</span>
									</a>
								</div>
								<div class="quantity">
									<span>Quantity: 1</span>
									<button class="quanti-but"><i class="fa fa-minus-square-o"></i></button>
									<button class="quanti-but"><i class="fa fa-plus-square-o"></i></button>
								</div>
							</li>
							<!--print-image -->
							<!--print-image -->
							<li>
								<div class="print-image">
									<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/order-print-2.jpg">
									<a class="print-zoom" href="#"><i class="fa fa-search"></i></a>
									<a class="image-quality" href="#">
										<i class="fa fa-frown-o"></i>
										<span>Low</span>
									</a>
									<a class="mid-review" href="#">
										<i class="fa fa-check-circle-o"></i>
										<span>Low Quality</span>
									</a>
								</div>
								<div class="quantity">
									<span>Quantity: 1</span>
									<button class="quanti-but"><i class="fa fa-minus-square-o"></i></button>
									<button class="quanti-but"><i class="fa fa-plus-square-o"></i></button>
								</div>
							</li>
							<!--print-image -->
							<!--print-image -->
							<li>
								<div class="print-image">
									<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/order-print-3.jpg">
									<a class="print-zoom" href="#"><i class="fa fa-search"></i></a>
									<a class="image-quality" href="#">
										<i class="fa fa-frown-o"></i>
										<span>Low</span>
									</a>
									<a class="mid-review" href="#">
										<i class="fa fa-check-circle-o"></i>
										<span>Low Quality</span>
									</a>
								</div>
								<div class="quantity">
									<span>Quantity: 1</span>
									<button class="quanti-but"><i class="fa fa-minus-square-o"></i></button>
									<button class="quanti-but"><i class="fa fa-plus-square-o"></i></button>
								</div>
							</li>
							<!--print-image -->
							<!--print-image -->
							<li>
								<div class="print-image">
									<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/order-print-4.jpg">
									<a class="print-zoom" href="#"><i class="fa fa-search"></i></a>
									<a class="image-quality" href="#">
										<i class="fa fa-smile-o"></i>
										<span>Good</span>
									</a>
									<a class="mid-review" href="#">
										<i class="fa fa-check-circle-o"></i>
										<span>Low Quality</span>
									</a>
								</div>
								<div class="quantity">
									<span>Quantity: 1</span>
									<button class="quanti-but"><i class="fa fa-minus-square-o"></i></button>
									<button class="quanti-but"><i class="fa fa-plus-square-o"></i></button>
								</div>
							</li>
							<!--print-image -->
							<!--print-image -->
							<li>
								<div class="print-image">
									<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/order-print-5.jpg">
									<a class="print-zoom" href="#"><i class="fa fa-search"></i></a>
									<a class="image-quality" href="#">
										<i class="fa fa-frown-o"></i>
										<span>Low</span>
									</a>
									<a class="mid-review" href="#">
										<i class="fa fa-check-circle-o"></i>
										<span>Low Quality</span>
									</a>
								</div>
								<div class="quantity">
									<span>Quantity: 1</span>
									<button class="quanti-but"><i class="fa fa-minus-square-o"></i></button>
									<button class="quanti-but"><i class="fa fa-plus-square-o"></i></button>
								</div>
							</li>
							<!--print-image -->
							<!--print-image -->
							<li>
								<div class="print-image">
									<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/order-print-1.jpg">
									<a class="print-zoom" href="#"><i class="fa fa-search"></i></a>
									<a class="image-quality" href="#">
										<i class="fa fa-frown-o"></i>
										<span>Low</span>
									</a>
									<a class="mid-review" href="#">
										<i class="fa fa-check-circle-o"></i>
										<span>Low Quality</span>
									</a>
								</div>
								<div class="quantity">
									<span>Quantity: 1</span>
									<button class="quanti-but"><i class="fa fa-minus-square-o"></i></button>
									<button class="quanti-but"><i class="fa fa-plus-square-o"></i></button>
								</div>
							</li>
							<!--print-image -->
							<!--print-image -->
							<li>
								<div class="print-image">
									<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/order-print-2.jpg">
									<a class="print-zoom" href="#"><i class="fa fa-search"></i></a>
									<a class="image-quality" href="#">
										<i class="fa fa-frown-o"></i>
										<span>Low</span>
									</a>
									<a class="mid-review" href="#">
										<i class="fa fa-check-circle-o"></i>
										<span>Low Quality</span>
									</a>
								</div>
								<div class="quantity">
									<span>Quantity: 1</span>
									<button class="quanti-but"><i class="fa fa-minus-square-o"></i></button>
									<button class="quanti-but"><i class="fa fa-plus-square-o"></i></button>
								</div>
							</li>
							<!--print-image -->
							<!--print-image -->
							<li>
								<div class="print-image">
									<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/order-print-3.jpg">
									<a class="print-zoom" href="#"><i class="fa fa-search"></i></a>
									<a class="image-quality" href="#">
										<i class="fa fa-frown-o"></i>
										<span>Low</span>
									</a>
									<a class="mid-review" href="#">
										<i class="fa fa-check-circle-o"></i>
										<span>Low Quality</span>
									</a>
								</div>
								<div class="quantity">
									<span>Quantity: 1</span>
									<button class="quanti-but"><i class="fa fa-minus-square-o"></i></button>
									<button class="quanti-but"><i class="fa fa-plus-square-o"></i></button>
								</div>
							</li>
							<!--print-image -->
							<!--print-image -->
							<li>
								<div class="print-image">
									<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/order-print-4.jpg">
									<a class="print-zoom" href="#"><i class="fa fa-search"></i></a>
									<a class="image-quality" href="#">
										<i class="fa fa-smile-o"></i>
										<span>Good</span>
									</a>
									<a class="mid-review" href="#">
										<i class="fa fa-check-circle-o"></i>
										<span>Low Quality</span>
									</a>
								</div>
								<div class="quantity">
									<span>Quantity: 1</span>
									<button class="quanti-but"><i class="fa fa-minus-square-o"></i></button>
									<button class="quanti-but"><i class="fa fa-plus-square-o"></i></button>
								</div>
							</li>
							<!--print-image -->
							<!--print-image -->
							<li>
								<div class="print-image">
									<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/order-print-5.jpg">
									<a class="print-zoom" href="#"><i class="fa fa-search"></i></a>
									<a class="image-quality" href="#">
										<i class="fa fa-frown-o"></i>
										<span>Low</span>
									</a>
									<a class="mid-review" href="#">
										<i class="fa fa-check-circle-o"></i>
										<span>Low Quality</span>
									</a>
								</div>
								<div class="quantity">
									<span>Quantity: 1</span>
									<button class="quanti-but"><i class="fa fa-minus-square-o"></i></button>
									<button class="quanti-but"><i class="fa fa-plus-square-o"></i></button>
								</div>
							</li>
							<!--print-image -->
							<!--print-image -->
							<li>
								<div class="print-image">
									<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/order-print-1.jpg">
									<a class="print-zoom" href="#"><i class="fa fa-search"></i></a>
									<a class="image-quality" href="#">
										<i class="fa fa-frown-o"></i>
										<span>Low</span>
									</a>
									<a class="mid-review" href="#">
										<i class="fa fa-check-circle-o"></i>
										<span>Low Quality</span>
									</a>
								</div>
								<div class="quantity">
									<span>Quantity: 1</span>
									<button class="quanti-but"><i class="fa fa-minus-square-o"></i></button>
									<button class="quanti-but"><i class="fa fa-plus-square-o"></i></button>
								</div>
							</li>
							<!--print-image -->
							<!--print-image -->
							<li>
								<div class="print-image">
									<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/order-print-2.jpg">
									<a class="print-zoom" href="#"><i class="fa fa-search"></i></a>
									<a class="image-quality" href="#">
										<i class="fa fa-frown-o"></i>
										<span>Low</span>
									</a>
									<a class="mid-review" href="#">
										<i class="fa fa-check-circle-o"></i>
										<span>Low Quality</span>
									</a>
								</div>
								<div class="quantity">
									<span>Quantity: 1</span>
									<button class="quanti-but"><i class="fa fa-minus-square-o"></i></button>
									<button class="quanti-but"><i class="fa fa-plus-square-o"></i></button>
								</div>
							</li>
							<!--print-image -->
							<!--print-image -->
							<li>
								<div class="print-image">
									<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/order-print-3.jpg">
									<a class="print-zoom" href="#"><i class="fa fa-search"></i></a>
									<a class="image-quality" href="#">
										<i class="fa fa-frown-o"></i>
										<span>Low</span>
									</a>
									<a class="mid-review" href="#">
										<i class="fa fa-check-circle-o"></i>
										<span>Low Quality</span>
									</a>
								</div>
								<div class="quantity">
									<span>Quantity: 1</span>
									<button class="quanti-but"><i class="fa fa-minus-square-o"></i></button>
									<button class="quanti-but"><i class="fa fa-plus-square-o"></i></button>
								</div>
							</li>
							<!--print-image -->
							<!--print-image -->
							<li>
								<div class="print-image">
									<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/order-print-4.jpg">
									<a class="print-zoom" href="#"><i class="fa fa-search"></i></a>
									<a class="image-quality" href="#">
										<i class="fa fa-smile-o"></i>
										<span>Good</span>
									</a>
									<a class="mid-review" href="#">
										<i class="fa fa-check-circle-o"></i>
										<span>Low Quality</span>
									</a>
								</div>
								<div class="quantity">
									<span>Quantity: 1</span>
									<button class="quanti-but"><i class="fa fa-minus-square-o"></i></button>
									<button class="quanti-but"><i class="fa fa-plus-square-o"></i></button>
								</div>
							</li>
							<!--print-image -->
							<!--print-image -->
							<li>
								<div class="print-image">
									<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/order-print-5.jpg">
									<a class="print-zoom" href="#"><i class="fa fa-search"></i></a>
									<a class="image-quality" href="#">
										<i class="fa fa-frown-o"></i>
										<span>Low</span>
									</a>
									<a class="mid-review" href="#">
										<i class="fa fa-check-circle-o"></i>
										<span>Low Quality</span>
									</a>
								</div>
								<div class="quantity">
									<span>Quantity: 1</span>
									<button class="quanti-but"><i class="fa fa-minus-square-o"></i></button>
									<button class="quanti-but"><i class="fa fa-plus-square-o"></i></button>
								</div>
							</li>
							<!--print-image -->

						</ul>
					</div>
					<div class="clearfix"></div>
					<a class="select-print-but goselect1" href="javascript:">Back</a>
					<a class="select-print-but" href="#">Select All</a>
					<a class="select-print-but cart" href="javascript:">Go to Cart</a>					
				</section>
				<!--select-photo -->
			</div>	
			<!--order-prints-main -->
			
			<!--order-prints-main-->
			<div class="order-prints-main select3">
					<section class="admin-white-head">
						<h1><i class="fa fa-shopping-cart"></i><span>Your Shopping Cart</span></h1>
                        <span class="print-num">2</span>
					</section>
					<!--select-photo-->
					<section class="select-your-photo">
						
						<div class="total-print-cont">
							<span><i class="fa fa-square-o select-mid-icon"></i>(8) TOTAL 4x6 PRINTS <a class="edit-but" href="#">Edit</a></span>
							<span><i class="fa fa-square-o select-mid-icon"></i>(2) TOTAL 8x12 PRINTS <a class="edit-but" href="#">Edit</a></span>
						</div>
						
						<span class="sub-total">SUBTOTAL: $0.24 </span>
						
						<a class="select-photo-but" href="#">Select All</a>
						<a class="select-photo-but showselect1" href="javascript:">Continue Shopping</a>
						<a class="select-photo-but checkout" href="#">Go to Checkout</a>
						
						<span class="unlimited-print">Unlimited Prints. Flat Rate Shipping.</span>
					</section>
					<!--select-photo -->

             </div>	
			<!--order-prints-main -->
			
			<!--payment-option-main -->
						<div class="payment-option-main payment">
                                <!--Shipping Address -->
                                <section class="shippingaddress pull-left">
                                    <!--admin-white-head -->
                                    <section class="admin-white-head">
                                        <h1><span>Shipping Address</span></h1>
                                    </section>
                                    <!--admin-white-head -->
                                    <!--form-ship-->
                                    <form>
                                    	<ul class="pay-ul">
                                        	<li><input type="text" class="pay-txbx" placeholder="Email Address" value=""></li>
                                            <li><input type="text" class="pay-txbx" placeholder="Full Name" value=""></li>
                                            <li><input type="text" class="pay-txbx" placeholder="Street Address" value=""></li>
                                            <li><input type="text" class="pay-txbx" placeholder="Address 2" value=""></li>
                                            <li><input type="text" class="pay-txbx" placeholder="City" value=""></li>
                                            <li><select class="selectpicker">
                                                    <option>State/Territory</option>
                                                    <option>select 1</option>
                                                    <option>select 2</option>
                                                    <option>select 3</option>
                                                </select>
                                            </li>
                                            <li><input type="text" class="pay-txbx" placeholder="Postalcode" value=""></li>
                                        </ul>
                                    </form>
                                    <!--form-ship-->
                                    <!--payment-imgs-->
                                    <ul class="payment-imgs">
                                    	<li><img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/pay-img1.png"/></li>
                                        <li class="midl"><img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/pay-img2.png"/></li>
                                        <li><img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/pay-img3.png"/></li>
                                    </ul>
                                    <!--payment-imgs-->
                                </section>
                                <!--Shipping Address -->
                                <!--Payment type -->
                                <section class="paymenttypemain pull-right">
                                    <!--admin-white-head -->
                                    <section class="admin-white-head">
                                        <h1><span>Payment type</span></h1>
                                    </section>
                                    <!--admin-white-head -->
                                    <!--payment-type-->	
                                            <!--top-method-->	
                                            <div class="top-method">
                                                <div class="paytyp-round">
                                                    <a href="javascript:void(0);" class="active" data-formID="credit-form"> 
                                                    <div class="round">
                                                        <i class="fa fa-credit-card"></i>
                                                     </div> 
                                                     </a>
                                                     <h1 class="paytop-txt">Credit card </h1>
                                                </div>
                                                <div class="paytyp-round middl">
                                                    <h1 class="paytop-txt">or</h1>
                                                </div>
                                                <div class="paytyp-round">
                                                    <a href="javascript:void(0);" data-formID="paypal-form"> 
                                                    <div class="round">
                                                        <i class="fa fa-paypal"></i>
                                                    </div> </a>
                                                    <h1 class="paytop-txt">Paypal</h1>
                                                </div>
                                              </div>
                                            <!--top-method--> 
                                        	<!--frm_credit_card--->
                                            <form id="credit-form" class="payment-form">
                                                <ul class="pay-ul">
                                                    <li><input type="text" class="pay-txbx" placeholder="Name on Card" value=""></li>
                                                    <li><input type="text" class="pay-txbx" placeholder="Credit Card Number" value=""></li>
                                                    <li>
                                                        <label class="lbl">Expiration Date</label>
                                                        <select class="selectpicker ed1">
                                                            <option>2</option>
                                                            <option>select 1</option>
                                                            <option>select 2</option>
                                                            <option>select 3</option>
                                                        </select>
                                                        <select class="selectpicker ed1">
                                                            <option>1</option>
                                                            <option>select 1</option>
                                                            <option>select 2</option>
                                                            <option>select 3</option>
                                                        </select>
                                                    </li>
                                                    <li><input type="text" class="pay-txbx" placeholder="Security Code" value=""/></li>
                                                    <li><input type="text" class="pay-txbx pay-txbx1" placeholder="Copoun Code" value=""/>
                                                        <input type="button" class="apply-btn" value="apply">
                                                    </li>
                                                    <li>
                                                        <div class="ff-left pymnt-dtl">
                                                            <ul class="pay-txt">
                                                                <li>Shipping</li>
                                                                <li>$ 8.00</li>
                                                                <li>Total</li>
                                                             </ul>
                                                             <div class="clear"></div>
                                                             <ul class="pay-txt">
                                                                <li>5x7 Prints</li>
                                                                <li>$ 1.19</li>
                                                                <li>$ 9.19</li>
                                                            </ul>
                                                        </div>
                                                        <select class="selectpicker ed1">
                                                            <option>1</option>
                                                            <option>select 1</option>
                                                            <option>select 2</option>
                                                            <option>select 3</option>
                                                        </select>

													</li>	
                                                    <li>
                                                        <input type="button" class="complete" value="Complete">
                                                    </li>
                                                </ul>	
	                                        </form>
                                        	<!--frm_credit_card--->
                                            <!--frm_paypal-->
											<form id="paypal-form"  class="payment-form">
                                                <ul class="pay-ul">                                          
                                                    <li><input type="text" class="pay-txbx pay-txbx1" placeholder="Copoun Code" value=""/>
                                                        <input type="button" class="apply-btn" value="apply">
                                                    </li>
                                                    <li>
                                                        <div class="ff-left pymnt-dtl">
                                                            <ul class="pay-txt">
                                                                <li>Shipping</li>
                                                                <li>$ 8.00</li>
                                                                <li>Total</li>
                                                             </ul>
                                                             <div class="clear"></div>
                                                             <ul class="pay-txt">
                                                                <li>5x7 Prints</li>
                                                                <li>$ 1.19</li>
                                                                <li>$ 9.19</li>
                                                            </ul>
                                                        </div>
                                                        <select class="selectpicker ed1">
                                                            <option>1</option>
                                                            <option>select 1</option>
                                                            <option>select 2</option>
                                                            <option>select 3</option>
                                                        </select>

													</li>	
                                                    <li>
                                                        <input type="button" class="complete" value="Complete">
                                                    </li>
                                                   
                                                </ul>
                                                <!--<p>All Prices in US dollars</p> -->
                                            </form>
                                        	<!--frm_paypal-->
                                    <!--payment-type-->
                                </section>
                                <!--Payment type -->
                        </div>
                        <!--payment-option-main -->

	</div>    
	<!--admin-main -->
</div>
<!--admin-content -->

<script>
// function change1(name)
// {
  
   // $(".selectfirst").hide();
   // $(".countryname").html(name);
   // $(".select1").show();
// 
var dataType="";
var country="";
var currency="";
$(document).on("change",".product-attrib",function(){
	
	var select = $(this);
	$(this).children("option:selected").each(function(i){
		var dataType=$(select).attr("data-type");
		console.log(dataType);
		if(dataType == "country")
		{
			country = $(".country option:selected:eq("+i+")").html();
			if(country=="SELECT")
			{
				country="";
			}
		}
		if(dataType == "currency")
		{
			currency = $(".currency option:selected:eq("+i+")").html();
			if(currency=="SELECT")
			{
				currency="";
			}
		}
	});
	//console.log("Country: "+country);
	//console.log("Currency: "+currency);
	
	if(country!="" && currency!="")
	{
		$(".selectfirst").hide();
		$(".countryname").html(country);
		$(".currency_symb").html(currency);
		$(".select1").show();
	}
	
});

	$(document).ready(function() {
		 $('.selectpicker').selectpicker();
	});
</script>				
<script>
$(document).ready(function(){
$(".select1").hide();
$(".select3").hide();
$(".select2").hide();
$(".payment").hide();
});
$(document).ready(function(){
		$(".print").click(function (){
			$(".select1").hide();
			//$(".select3").remove();
			$(".select2").show();
		});
});
$(document).ready(function(){
	$(".cart").click(function(){
	     $(".select2").hide();
	     $(".select3").show();
	});
});

$(document).ready(function(){
	$(".goselect1").click(function(){
	     $(".select2").hide();
	     $(".select1").show();
	});
});

$(document).ready(function(){
	$(".showselect1").click(function(){
	     $(".select3").hide();
	     $(".select1").show();
	});
});

$(document).ready(function(){
	$(".shopping").click(function(){
	     $(".select1").show();
	     $(".select3").hide();
	});
});
$(document).ready(function(){
	$(".back").click(function(){
	     $(".select2").show();
	     $(".select3").hide();
	});
});
$(document).ready(function(){
	$(".checkout").click(function(){
	     $(".payment").show();
	     $(".select3").hide();
	});
});
	(function($){
		$(window).load(function(){
			
			/* 
			get snap amount programmatically or just set it directly (e.g. "273") 
			in this example, the snap amount is list item's (li) outer-width (width+margins)
			*/
			var amount=Math.max.apply(Math,$("#print-image-thumb li").map(function(){return $(this).outerWidth(true);}).get());
			
			$("#print-image-thumb").mCustomScrollbar({
				axis:"x",
				theme:"rounded-dots",
				advanced:{
					autoExpandHorizontalScroll:true
				},
				scrollButtons:{
					enable:true,
					scrollType:"stepless"
				},
				keyboard:{scrollType:"stepless"},
				snapAmount:amount,
				mouseWheel:{scrollAmount:amount, enable:true }
			});
			
		});
		
	})(jQuery);
</script>
<script>
 $(window).load(function() {
         $("#activeorderprint").addClass("active");
         });
</script>  

<script>
	
	$(document).ready(function() {
		 $('.selectpicker').selectpicker();

		 $(".paytyp-round > a").click(function(){		
			var formID = $(this).attr("data-formID");
			$(".payment-form").hide();
			$('#' + formID).show();
			$(".paytyp-round > a").removeClass("active");
			$(this).addClass("active");
		 });
	});
</script>