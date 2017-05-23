<?php
/*
Template Name: GreenCard Registration
*/
get_header(); ?>

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>

	<div class="fp-intro">
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<div class="entry-content">
				<div class="row row-breadcrumbs">
					<?php if( function_exists('fw_ext_breadcrumbs') ) { fw_ext_breadcrumbs(); } ?>
				</div>
				<?php the_content(); ?>
			</div>

			<form class="gc-forms" id="registration-form">
				<div class="row">
						<div class="large-3 medium-12 columns">
							<label for="in-email">E-mail</label>
						</div>
						<div class="large-9 medium-12 columns">
							<input type="email" id="in-email" placeholder="E-mail">
						</div>
				</div>

				<div class="row">
						<div class="large-3 medium-12 columns">
							<label for="in-firstname">First Name</label>
						</div>
						<div class="large-9 medium-12 columns">
							<input type="text" id="in-firstname" placeholder="First Name">
						</div>
				</div>

				<div class="row">
						<div class="large-3 medium-12 columns">
							<label for="in-lastname">Last Name</label>
						</div>
						<div class="large-9 medium-12 columns">
							<input type="text" id="in-lastname" placeholder="Last Name">
						</div>
				</div>

				<div class="row">
						<div class="large-3 medium-12 columns">
							<label>Marital Status</label>
						</div>
						<div class="large-9 medium-12 columns">
							<select>
								<option value="0">Marital Status</option>
								<option value="1">Marital Status</option>
								<option value="2">Marital Status</option>
								<option value="3">Marital Status</option>
							</select>
						</div>
				</div>

				<div class="row">
						<div class="large-3 medium-12 columns">
							<label>Country of Birth</label>
						</div>
						<div class="large-9 medium-12 columns">
							<select>
								<option value="0">Country of Birth</option>
								<option value="1">Country of Birth</option>
								<option value="2">Country of Birth</option>
								<option value="3">Country of Birth</option>
							</select>
						</div>
				</div>

				<div class="row">
						<div class="large-3 medium-12 columns">
							<label>Country of Residence</label>
						</div>
						<div class="large-9 medium-12 columns">
							<select>
								<option value="0">Country of Residence</option>
								<option value="1">Country of Residence</option>
								<option value="2">Country of Residence</option>
								<option value="3">Country of Residence</option>
							</select>
						</div>
				</div>

				<div class="row">
						<div class="large-3 medium-12 columns">
							<label>Phone: (Home / Office):</label>
						</div>
						<div class="large-3 medium-4 columns">
							<input type="text"  placeholder="Code">
						</div>
						<div class="large-6 medium-8 columns">
							<input type="text" placeholder="Mobile Phone">
						</div>
				</div>

				<div class="row">
						<div class="large-3 medium-12 columns">
							<label>Mobile Phone:</label>
						</div>
						<div class="large-3 medium-4 columns">
							<input type="text"  placeholder="Code">
						</div>
						<div class="large-6 medium-8 columns">
							<input type="text" placeholder="Mobile Phone">
						</div>
				</div>				

				<div class="row button-wrap">
						<div class="medium-12 columns">
							<button class="buttons red-button rounds uppercase">Register</button>
						</div>
				</div>	

			</form>

			<form class="gc-forms" id="">

				<div class="row">
						<div class="large-3 medium-12 columns">
							<label>Card Type</label>
						</div>
						<div class="large-9 medium-12 columns">
							<i class="form-icon card-icon"></i>
							<select class="in-form-icon">
								<option value="0">Mastercard</option>
								<option value="1">Mastercard</option>
								<option value="2">Mastercard</option>
								<option value="3">Mastercard</option>
							</select>
						</div>
				</div>

				<div class="row">
						<div class="large-3 medium-12 columns">
							<label for="in-firstname">Card Number</label>
						</div>
						<div class="large-9 medium-12 columns">
							<i class="form-icon card-icon"></i>
							<input type="text" id="in-firstname" class="in-form-icon" placeholder="Card Number">
						</div>
				</div>

				<div class="row">
						<div class="large-3 medium-12 columns">
							<label for="in-firstname">Expiration date</label>
						</div>

						<div class="large-9 medium-12 columns">
							<div class="row datapicer">
								<div class="datapicer-first large-6 medium-6 columns">
									<i class="form-icon date-icon"></i>
									<input type="text" id="in-firstname" class="in-form-icon" placeholder="">
								</div>
								<div class="datapicer-second large-6 medium-6 columns">
									<i class="form-icon date-icon"></i>
									<input type="text" id="in-firstname" class="in-form-icon" placeholder="">
								</div>
							</div>
						</div>
				</div>

				<div class="row">
						<div class="large-3 medium-12 columns">
							<label for="in-firstname">CVV</label>
						</div>
						<div class="large-9 medium-12 columns">
							<i class="form-icon lock-icon"></i>
							<input type="text" id="in-firstname" class="in-form-icon" placeholder="CVV">
						</div>
				</div>

				<div class="row">
						<div class="large-3 medium-12 columns">
							<label for="in-firstname">Name of card</label>
						</div>
						<div class="large-9 medium-12 columns">
							<i class="form-icon user-icon"></i>
							<input type="text" id="in-firstname" class="in-form-icon" placeholder="Name of card">
						</div>
				</div>				

				<div class="row">
						<div class="large-3 medium-12 columns">
							<label for="in-firstname">Billing Country</label>
						</div>
						<div class="large-9 medium-12 columns">
							<i class="form-icon country-icon"></i>
							<input type="text" id="in-firstname" class="in-form-icon" placeholder="Billing Country">
						</div>
				</div>

				<div class="row button-wrap">
						<div class="medium-12 columns">
							<button class="buttons red-button rounds uppercase">Order</button>
						</div>
				</div>	

			</form>

			<!-- ACCOUNT -->
			
			<div class="account-page row">

				<div class="user-info-text">
					Hello <b>username@mail.com</b> (not username@mail.com? <a htrf="#">Sign out</a>). From your account dashboard you can view your recent orders, manage your shipping and billing addresses and edit your password and account details.
				</div>

				<div class="fw-divider-line"><hr></div>

				<h2 class="title-style-2">User info table</h2>

				<div class="info-table-wrap large-9 medium-12">
					
					<table class="info-table user-info-table">
						<tbody>
							<tr>
								<td class="title" width="50%">Email:</td>
								<td class="info" width="50%">Ivanov@gmail.com</td>
							</tr>
							<tr>
								<td class="title">Email:</td>
								<td class="info">Ivanov@gmail.com</td>
							</tr>
							<tr>
								<td class="title">Email:</td>
								<td class="info">Ivanov@gmail.com</td>
							</tr>		
							<tr>
								<td class="title">Mobile phone:</td>
								<td class="info">+380931234567</td>
							</tr>									
						</tbody>
					</table>

				</div>

				<h2 class="title-style-2">Green card applications</h2>

				<div class="info-table-wrap large-9 medium-12">

					<table class="info-table">
						<thead>
							<tr>
								<th width="20%">No</th>
								<th width="60%">Name</th>
								<th width="20%">Status</th>
							</tr>
						</thead>
						<tbody>
							<tr class="separator">
								<td colspan="3"></td>
							</tr>							
							<tr>
								<td colspan="3" class="title center info-line">No Green card applications</td>
							</tr>		
							<tr class="separator">
								<td colspan="3"></td>
							</tr>						
							<tr>
								<td>1</td>
								<td>name</td>
								<td>test</td>
							</tr>	
							<tr>
								<td>2</td>
								<td>name</td>
								<td>test</td>
							</tr>	
							<tr>
								<td>3</td>
								<td>name</td>
								<td>test</td>
							</tr>												
						</tbody>				
					</table>

				</div>

				<h2 class="title-style-2">Recent orders</h2>

				<div class="info-table-wrap large-9 medium-12">

					<table class="orders-table info-table">
						<thead>
							<tr>
								<th width="10%">Order</th>
								<th width="15%">Date</th>
								<th width="15%">Status</th>
								<th width="60%" colspan="2">Total</th>
							</tr>
						</thead>
						<tbody>
							<tr class="separator">
								<td colspan="5"></td>
							</tr>							
							<tr>
								<td colspan="5" class="title center info-line">No orders</td>
							</tr>		
							<tr class="separator">
								<td colspan="5"></td>
							</tr>						
							<tr>
								<td width="10%">#756618</td>
								<td width="15%" class="center">November, 25<br>2016</td>
								<td width="15%" class="center">Pending Payment</td>
								<td width="15%" class="center">200$<br>for 1 item</td>
								<td width="35%" class="buttons-wrap">
									<div class="fw-row">
										<div class="fw-col-md-6"><button class="buttons red-button rounds uppercase">Pay</button></div>
										<div class="fw-col-md-6"><button class="buttons blue-button">Cansel</button></div>
									</div>
									<div class="fw-row">	
										<div class="fw-col-md-6"><button class="buttons grey-button rounds uppercase">View</button></div>
										<div class="fw-col-md-6"><button class="buttons grey-button dark">upload file</button></div>
									</div>
								</td>
							</tr>	
							<tr class="separator">
								<td colspan="5"></td>
							</tr>
							<tr>
								<td width="10%">#756618</td>
								<td width="15%" class="center">November, 25<br>2016</td>
								<td width="15%" class="center">Pending Payment</td>
								<td width="15%" class="center">200$<br>for 1 item</td>
								<td width="35%" class="buttons-wrap">
									<div class="fw-row">
										<div class="fw-col-md-6"><button class="buttons red-button rounds uppercase">Pay</button></div>
										<div class="fw-col-md-6"><button class="buttons blue-button">Cansel</button></div>
									</div>
									<div class="fw-row">	
										<div class="fw-col-md-6"><button class="buttons grey-button rounds uppercase">View</button></div>
										<div class="fw-col-md-6"><button class="buttons grey-button dark">upload file</button></div>
									</div>
								</td>
							</tr>																			
						</tbody>				
					</table>

				</div>

				<h2 class="title-style-2">Reports</h2>

				<div class="info-block large-9 medium-12">
					<strong>You have no files</strong>	
				</div>

				<h2 class="title-style-2">My subscriptions</h2>

				<div class="info-block large-9 medium-12">
					<strong>You have no active subscriptions. Find your first subscription in the <a href="#">store</a>.</strong>	
				</div>

				<div class="fw-divider-space" style="padding-top: 30px;"></div>

			</div>
			<!-- END ACCOUNT -->
			
			<!-- ACCOUNT EDIT -->
			
			<div class="account-page row">

				<div class="user-info-text">
					Hello <b>username@mail.com</b> (not username@mail.com? <a htrf="#">Sign out</a>). From your account dashboard you can view your recent orders, manage your shipping and billing addresses and edit your password and account details.
				</div>

				<div class="fw-divider-line"><hr></div>

				<h2 class="title-style-2">User info table</h2>

				<div class="info-table-wrap large-9 medium-12">
					<form class="user-info-edit">
						<table class="info-table">
							<tbody>
								<tr>
									<td class="title" width="50%">E-mail:</td>
									<td class="info" width="50%"><input type="email" id="in-email" placeholder="E-mail"></td>
								</tr>
								<tr>
									<td class="title">First Name:</td>
									<td class="info"><input type="text" id="in-firstname" placeholder="First Name"></td>
								</tr>		
								<tr>
									<td class="title">Last Name</td>
									<td class="info"><input type="text" id="in-lastname" placeholder="Last Name"></td>
								</tr>		
								<tr>
									<td class="title">Marital Status</td>
									<td class="info">
										<select>
											<option value="0">Marital Status</option>
											<option value="1">Marital Status</option>
											<option value="2">Marital Status</option>
											<option value="3">Marital Status</option>
										</select>
									</td>
								</tr>		
								<tr>
									<td class="title">Country of Birth</td>
									<td class="info">
										<select>
											<option value="0">Country of Birth</option>
											<option value="1">Country of Birth</option>
											<option value="2">Country of Birth</option>
											<option value="3">Country of Birth</option>
										</select>
									</td>
								</tr>		
								<tr>
									<td class="title">Mobile phone:</td>
									<td class="info"><input type="text" placeholder="Mobile Phone"></td>
								</tr>
								<tr>
									<td  colspan="2" class="title">
										<div class="fw-row">	
											<div class="fw-col-md-4">New password</div>
											<div class="fw-col-md-4"><input type="password" id="in-newpassword"></div>
											<div class="fw-col-md-4">Strength indicator</div>
										</div>
										<div class="fw-row form-info">	
											<div class="fw-col-md-12">
												The password should be at least seven characters long. To make it stronger, use upper and lower case letters, numbers and symbols like ! " ? $ % ^ & ).
											</div>	
										</div>
									</td>
									
								</tr>								
							</tbody>
						</table>
						<div class="submit-button-wrap">
							<button class="buttons red-button rounds uppercase">Upadate profile</button>
						</div>
					</form>
				</div>

				<div class="fw-divider-space" style="padding-top: 30px;"></div>
				
			</div>

		<!-- end ACCOUNT EDIT -->

		</div>
	</div>

<?php endwhile;?>
<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer();
