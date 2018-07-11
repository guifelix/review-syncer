<header class="nav-container">
   <nav class="bg-dark">
      <div class="nav-bar">
         <div class="module left padding-left-0"><a href="/" class="logo-a"><img class="logo" alt="Bold Commerce eCommerce Experts" src="{{ URL::asset('images/boldlogo.png') }}"></a></div>
         <div class="module widget-handle mobile-toggle right visible-sm visible-xs"><i class="ti-menu"></i></div>
         <div class="module-group right">
            <div class="module left padding-right-0">
               <ul class="menu">
                  <li><a href="{{ route('home.index') }}" class="stand-out"><i class="fas fa-star"></i> Home</a></li>
                  <li><a href="{{ route('reviews.index') }}">Reviews</a></li>
               </ul>
            </div>
            {{-- <div class="module widget-handle language left">
               <ul class="menu">
                  <li class="has-dropdown">
                     <a href="#">More</a>
                     <ul>
                        <li><a href="/partners/">Bold Partners</a></li>
                        <li><a href="http://blog.boldcommerce.com/">Bold Blog</a></li>
                        <li><a href="/live-at-bold/">Live at Bold</a></li>
                        <li><a href="/about/">About Bold</a></li>
                        <li><a href="/careers/">Work at Bold</a></li>
                        <hr class="fade-half mt8 mb8">
                        <li><a href="/professional-services/start-project/"><i class="fas fa-calendar-alt"></i> Start a Project</a></li>
                        <li><a href="https://support.boldcommerce.com/hc/en-us/" target="_blank"><i class="far fa-life-ring"></i> Help Center</a></li>
                     </ul>
                  </li>
               </ul>
            </div> --}}
         </div>
      </div>
   </nav>
</header>