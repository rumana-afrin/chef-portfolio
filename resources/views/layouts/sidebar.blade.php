<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Chef<span>Alomgir</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="dashboard.html" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">web apps</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button"
                    aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Email</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/email/inbox.html" class="nav-link">Inbox</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/email/read.html" class="nav-link">Read</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/email/compose.html" class="nav-link">Compose</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="pages/apps/chat.html" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Chat</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="pages/apps/calendar.html" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Calendar</span>
                </a>
            </li>
            <li class="nav-item nav-category">Settings</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button"
                    aria-expanded="false" aria-controls="uiComponents"> <i ></i>
                    <i class="link-icon" data-feather="settings"></i>
                    <span class="link-title">general Settings</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="uiComponents">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('app-setting')}}" class="nav-link">App Setting</a>
                        </li>
                       
                        <li class="nav-item">
                            <a href="pages/ui-components/accordion.html" class="nav-link">My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/ui-components/accordion.html" class="nav-link">My Resume</a>
                        </li>
                    </ul>
                </div>

            </li>
        
            <li class="nav-item nav-category">Pages</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" role="button"
                    aria-expanded="false" aria-controls="general-pages">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Special pages</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="general-pages">
                    <ul class="nav sub-menu">
                        
                        <li class="nav-item">
                            <a href="pages/general/faq.html" class="nav-link">Faq</a>
                        <li class="nav-item">
                            <a href="pages/general/timeline.html" class="nav-link">Timeline</a>
                        </li>
                    </ul>
                </div>
            </li>
            
         
            <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}" aria-controls="homePages">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#recipePages" role="button"
                    aria-expanded="false" aria-controls="recipePages">
                    <i class="link-icon mdi mdi-food-variant"></i>
                    <span class="link-title">Recipes</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="recipePages">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('recipe.banner')}}" class="nav-link">Banner Image</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('all.carousel')}}" class="nav-link">All carousel</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('create.carousel')}}" class="nav-link">Add carousel</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('all.recipe.category')}}" class="nav-link">All Recipe Category</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('create')}}" class="nav-link">Add Recipe Category</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('all.recipe')}}" class="nav-link">All Recipe</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('create.recipe')}}" class="nav-link">Add Recipe</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#photosPages" role="button"
                    aria-expanded="false" aria-controls="photosPages">
                    <i class="link-icon" data-feather="image"></i>
                    <span class="link-title">Gallary</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="photosPages">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('album.index')}}" class="nav-link">All albums</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('album-create')}}" class="nav-link">Add Album</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('gallary-index')}}" class="nav-link">All Gallary Image</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('gallary-create')}}" class="nav-link">Add Gallary Image</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#blogPages" role="button"
                    aria-expanded="false" aria-controls="blogPages">
                    <i class="link-icon" data-feather="book-open"></i>
                    <span class="link-title">Blog</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="blogPages">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Food</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/blog/500.html" class="nav-link">Veg</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/blog/500.html" class="nav-link">Non-Veg</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/blog/500.html" class="nav-link">Baking blogs</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#coursePages" role="button"
                    aria-expanded="false" aria-controls="coursePages">
                    <i class="link-icon mdi mdi-food-fork-drink"></i>
                    <span class="link-title">Course</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="coursePages">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/course/404.html" class="nav-link">Appetizer </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/course/500.html" class="nav-link">Main Course</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/course/500.html" class="nav-link">Dessert</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/course/500.html" class="nav-link">Beverage </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#cuisinePages" role="button"
                    aria-expanded="false" aria-controls="cuisinePages">
                    <i class="link-icon mdi mdi-bowl"></i>
                    <span class="link-title">Cuisine</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="cuisinePages">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/cuisine/404.html" class="nav-link">Italian</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/cuisine/500.html" class="nav-link">French</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/cuisine/500.html" class="nav-link">Indian</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/cuisine/500.html" class="nav-link">Japanese</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/cuisine/500.html" class="nav-link">Chinese</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/cuisine/500.html" class="nav-link">Fusion</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/cuisine/500.html" class="nav-link">Asian</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/cuisine/500.html" class="nav-link">vegetarian </a>
                        </li>
                    </ul>
                </div>
            </li>
           
            <li class="nav-item">
                <a class="nav-link" href="#" aria-controls="homePages">
                    <i class="link-icon" data-feather="video"></i>
                    <span class="link-title">Video Recipes</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#aboutPages" role="button"
                    aria-expanded="false" aria-controls="aboutPages">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">About</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="aboutPages">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('contact-info')}}" class="nav-link">Contact Info</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('all-language')}}" class="nav-link">Language</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add-language')}}" class="nav-link">Add Language</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('all-education')}}" class="nav-link">Education</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('create-education')}}" class="nav-link">Add Education</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('job-objective')}}" class="nav-link">Job Objective</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('all-experiance')}}" class="nav-link">Job Experience</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('create-experiance')}}" class="nav-link">Add Job Experience</a>
                        </li>
                        
                    </ul>
                </div>
            </li>
        
            <li class="nav-item">
                <a class="nav-link" href="#" aria-controls="homePages">
                    <i class="link-icon" data-feather="map-pin"></i>
                    <span class="link-title">Contact</span>
                </a>
            </li>
            <li class="nav-item nav-category">Docs</li>
            <li class="nav-item">
                <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank"
                    class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Documentation</span>
                </a>
            </li>
        </ul>
    </div>
</nav>