<?php
    $person = new PersonController;
    $person->createUser();
?>

<div class="wrapper">
    <section class="login-content overflow-hidden">
        <div class="row no-gutters align-items-center bg-white">
            <div class="col-md-12 col-lg-6 align-self-center">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-6 align-self-center">
                        <a href="/" class="navbar-brand d-flex align-items-center mb-3 justify-content-center text-primary">
                            <svg width="250" height="150" viewBox="0 0 406 150" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M248.381 54.6V110H234.281V103C232.481 105.4 230.115 107.3 227.181 108.7C224.315 110.033 221.181 110.7 217.781 110.7C213.448 110.7 209.615 109.8 206.281 108C202.948 106.133 200.315 103.433 198.381 99.9C196.515 96.3 195.581 92.0333 195.581 87.1V54.6H209.581V85.1C209.581 89.5 210.681 92.9 212.881 95.3C215.081 97.6333 218.081 98.8 221.881 98.8C225.748 98.8 228.781 97.6333 230.981 95.3C233.181 92.9 234.281 89.5 234.281 85.1V54.6H248.381ZM279.995 98.5H304.695V110H264.095V98.7L288.295 66.1H264.195V54.6H304.395V65.9L279.995 98.5ZM327.634 48C325.168 48 323.101 47.2333 321.434 45.7C319.834 44.1 319.034 42.1333 319.034 39.8C319.034 37.4667 319.834 35.5333 321.434 34C323.101 32.4 325.168 31.6 327.634 31.6C330.101 31.6 332.134 32.4 333.734 34C335.401 35.5333 336.234 37.4667 336.234 39.8C336.234 42.1333 335.401 44.1 333.734 45.7C332.134 47.2333 330.101 48 327.634 48ZM334.534 54.6V110H320.534V54.6H334.534ZM386.166 110L367.366 86.4V110H353.366V36H367.366V78.1L385.966 54.6H404.166L379.766 82.4L404.366 110H386.166Z" fill="#222428" />
                                <path d="M113.739 140.54C113.664 140.54 113.588 140.54 113.513 140.535C105.778 140.432 99.4526 135.037 98.1369 127.41L83.5779 43.0637L71.3217 102.441C69.6582 110.52 62.9942 115.952 54.742 115.952C54.7325 115.952 54.7325 115.952 54.7325 115.952C46.4803 115.957 39.8166 110.529 38.1433 102.451L34.0924 82.8872C33.7636 81.2893 32.335 80.1287 30.6996 80.1287C26.9775 80.1287 23.9604 77.1116 23.9604 73.3896C23.9604 69.6675 26.9775 66.6505 30.6996 66.6505C38.6793 66.6505 45.6533 72.3274 47.2888 80.1426L51.3397 99.7157C51.8378 102.122 53.6801 102.479 54.7325 102.479C55.7853 102.479 57.6276 102.122 58.1257 99.7157L71.6415 34.2241C72.8446 28.3543 77.8918 24.4446 83.879 24.4162C89.8755 24.5149 94.7724 28.7067 95.7873 34.6141L111.408 125.116C111.634 126.39 112.395 127.048 113.692 127.067C115.008 127.005 115.769 126.455 116.023 125.187L137.744 16.8734C138.938 10.9803 144.248 7.03752 149.953 7C155.959 7.07504 160.875 11.253 161.909 17.1651L176.919 102.103C177.567 105.764 175.124 109.26 171.458 109.909C167.849 110.548 164.305 108.118 163.647 104.444L149.728 25.6569L129.238 127.833C127.734 135.342 121.38 140.54 113.739 140.54ZM15.6058 73.7222C15.6058 78.0317 12.1123 81.5251 7.8029 81.5251C3.49345 81.5251 0 78.0317 0 73.7222C0 69.4128 3.49345 65.9193 7.8029 65.9193C12.1123 65.9193 15.6058 69.4128 15.6058 73.7222Z" fill="#FF4545" />
                                <path d="M7.8029 81.5252C12.1123 81.5252 15.6058 78.0318 15.6058 73.7223C15.6058 69.4129 12.1123 65.9194 7.8029 65.9194C3.49345 65.9194 0 69.4129 0 73.7223C0 78.0318 3.49345 81.5252 7.8029 81.5252Z" fill="#FF4545" />
                            </svg>
                        </a>
                    </div>
                    <div class="col-md-11">
                        <div class="card auth-card  d-flex justify-content-center mb-0">
                            <div class="card-body">
                                <h2 class="mb-2 text-center">Sign Up</h2>
                                <p class="text-center">Create your Muzik account.</p>
                                <form method="POST" action="?page=auth/register">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="full-name" class="form-label">Full Name</label>
                                                <input type="text" name="fullName" class="form-control" id="full-name" placeholder="John">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="last-name" class="form-label">Username</label>
                                                <input type="text" name="username" class="form-control" id="last-name" placeholder="Doe">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" id="email" placeholder="xyz@example.com">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="phone" class="form-label">Phone No.</label>
                                                <input type="text" name="phone" class="form-control" id="phone" placeholder="123456789">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control" id="password" placeholder=" ">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="confirm-password" class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control" name="confirm_password" id="confirm-password" placeholder=" ">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 d-flex justify-content-center">
                                            <div class="form-check form-switch mb-5">
                                                <input class="form-check-input" type="checkbox" name="role" role="switch" id="flexSwitchCheckDefault">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Turn on this if you interstend in becoming an artist</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">Sign Up</button>
                                    </div>
                                    <p class="text-center my-3">or sign in with other accounts?</p>
                                    <div class="d-flex justify-content-center">
                                        <ul class="list-group list-group-horizontal list-group-flush">
                                            <li class="list-group-item border-0 pb-0">
                                                <a href="#"><img src="https://templates.iqonic.design/muzik/html/assets/images/brands/gm.svg" alt="gm" loading="lazy"></a>
                                            </li>
                                            <li class="list-group-item border-0 pb-0">
                                                <a href="#"><img src="https://templates.iqonic.design/muzik/html/assets/images/brands/fb.svg" alt="fb" loading="lazy"></a>
                                            </li>
                                            <li class="list-group-item border-0 pb-0">
                                                <a href="#"><img src="https://templates.iqonic.design/muzik/html/assets/images/brands/im.svg" alt="im" loading="lazy"></a>
                                            </li>
                                            <li class="list-group-item border-0 pb-0">
                                                <a href="#"><img src="https://templates.iqonic.design/muzik/html/assets/images/brands/li.svg" alt="li" loading="lazy"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="mt-3 text-center">
                                        Already have an Account <a href="?page=auth/login" class="text-underline">Sign In</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-lg-block d-none bg-primary p-0  overflow-hidden">
                <img src="/public/images/auth/01.jpg" class="img-fluid gradient-main" alt="images" loading="lazy">
            </div>
        </div>
    </section>
</div>