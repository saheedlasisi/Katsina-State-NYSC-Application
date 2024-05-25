
			<!-- Footer -->
			<footer class="footer">
				
				<!-- Footer Top -->
				<div class="footer-top">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-about">
									<div class="footer-logo">
										<img src="{{ asset('assets/img/footer-logo.png') }}" alt="logo">
									</div>
									<div class="footer-about-content">
										<p>NYSC Permanent Orientation Camp, Katsina is located at Mani Road, Gabasawa New Layout, Katsina. This camp ground is where the 3 weeks NYSC Orientation Course takes place. It involves physical drills, lectures and training, and social activities intended to foster interactions among Corpers. </p>
										<div class="social-icon">
											<ul>
												<li>
													<a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Main Site</h2>
									<ul>
										<li><a href="/">Home</a></li>
										<li><a href="/bloglist">Blog</a></li>
										<li><a href="/cdsproject">Cds Project</a></li>
										<li><a href="/helpdesk">Helpdesk</a></li>
										<li><a href="/browserticket">Open Ticket</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Corps Members</h2>
									<ul>

										@guest

										
										<li><a href="/login">Login</a></li>
										<li><a href="/register">Register</a></li>
									

										@else

										<li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
													logout
												{{csrf_field()}}
												<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          {{csrf_field()}}
                                        </form>
											</a></li>

											<li><a href="/dashboard">Dashboard</a></li>
										

										@endguest
									
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-contact">
									<h2 class="footer-title">Contact Us</h2>
									<div class="footer-contact-info">
										<div class="footer-address">
											<span><i class="fas fa-map-marker-alt"></i></span>
											<p> Mani Road, Gabasawa New Layout, ,<br> California, Katsina </p>
										</div>
										<p>
											<i class="fas fa-phone-alt"></i>
											+234 7033 663 515
										</p>
										<p class="mb-0">
											<i class="fas fa-envelope"></i>
											support@katsinastatenysc.com
										</p>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
						</div>
					</div>
				</div>
				<!-- /Footer Top -->
				
				<!-- Footer Bottom -->
                <div class="footer-bottom">
					<div class="container-fluid">
					
						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="copyright-text">
										<p class="mb-0">&copy; 2020 - {{date('Y')}} Designed By LASISI SAHEED O. KT/19C/1262. <!-- All rights reserved. --></p>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
								
									<!-- Copyright Menu -->
								<!-- 	<div class="copyright-menu">
										<ul class="policy-menu">
											<li><a href="term-condition.html">Terms and Conditions</a></li>
											<li><a href="privacy-policy.html">Policy</a></li>
										</ul>
									</div> -->
									<!-- /Copyright Menu -->
									
								</div>
							</div>
						</div>
						<!-- /Copyright -->
						
					</div>
				</div>
				<!-- /Footer Bottom -->
				
			</footer>
			<!-- /Footer -->