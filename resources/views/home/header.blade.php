 <header>
    <!-- header inner -->
    <div class="header">
       <div class="container">
          <div class="row">
             <div class="col-xl-3 col-lg-2 col-md-2 col-sm-2 logo_section">
                <div class="full">
                   <div class="center-desk">
                      <div class="logo">
                         <a href="{{ url('/') }}"><img src="../images/logo.png" alt="logo" /></a>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-xl-9 col-lg-10 col-md-10 col-sm-10 d-flex justify-evenly">
                <nav class="navigation navbar navbar-expand-md navbar-dark">
                   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
                   </button>
                   <div class="collapse navbar-collapse" id="navbarsExample04">
                      <ul class="navbar-nav">
                         <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" href="room.html">Our room</a>
                         </li>
                         <li class="nav-item ">
                            <a class="nav-link" href="gallery.html">Gallery</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" href="blog.html">Blog</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                         </li>


                         {{-- Blade code for authentication handling --}}
                        @if (Route::has('login'))

                            @auth
                            <div class="dropdown alignitems-center">
                               <x-app-layout>

                               </x-app-layout>
                            </div>
                            @else
                               <li class="nav-item pr-2">
                                  <a class="btn btn-success" href="{{ url('login') }}">Login</a>
                               </li>

                               @if (Route::has('register'))
                               <li class="nav-item">
                                  <a class="btn btn-primary" href="{{ url('register') }}">Register</a>
                               </li>
                               @endif
                            @endauth
                         @endif

                         </div>
                      </ul>
                   </div>
                </nav>
             </div>
          </div>
       </div>
    </div>
 </header>
