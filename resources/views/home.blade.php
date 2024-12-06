<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>{{ config('app.name', 'JobSphere') }}</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
        <meta name="HandheldFriendly" content="True" />
        <meta name="pinterest" content="nopin" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
        <!-- Fav Icon -->
        <link rel="shortcut icon" type="image/x-icon" href="#" />
    </head>
    <body data-instant-intensity="mousedown">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3">
                <div class="container">                    
                    @if (Route::has('login'))
                        <nav class="-mx-3 flex flex-1 justify-end">
                            @auth('web')
                                <a
                                    href="{{ url('/dashboard') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">

                                    Dashboard
                                </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    
                                        Job-Seeker Login
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        
                                            Job-Seeker Register
                                        </a>
                                    @endif
                            @endauth

                            @auth('admin')
                                <a
                                    href="{{ url('/admin/dashboard') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                    Admin Dashboard
                                </a>
                                @else
                                <a
                                    href="{{ route('admin.login') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                    Admin Login
                                </a>

                                @if (Route::has('admin.register'))
                                    <a
                                        href="{{ route('admin.register') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Admin Register
                                    </a>
                                @endif
                            @endauth

                            @auth('employer')
                                <a
                                    href="{{ url('/employer/dashboard') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                    Employer Dashboard
                                </a>
                                @else
                                <a
                                    href="{{ route('employer.login') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                    Employer Login
                                </a>

                                @if (Route::has('employer.register'))
                                    <a
                                        href="{{ route('employer.register') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Employer Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
            </nav>
        </header>

        <section class="section-0 d-flex bg-image-style dark align-items-center" style="background-image: url('{{ asset('assets/images/banner4.jpg') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-8">
                        <h1>Find your dream job</h1>
                        <p>Thounsands of jobs available for you.</p>
                        
                    </div>
                </div>
            </div>
        </section>

        {{-- <section class="section-1 py-5 "> 
            <div class="container">
                <div class="card border-0 shadow p-5">
                    <form action = "{{ route('jobs') }}" method="GET">
                        <div class="row">
                        <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                            <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Keywords">
                        </div>
                        <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                            <input type="text" class="form-control" name="Location" id="Location" placeholder="Location">
                        </div>
                        <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                            <select name="job_type" id="job_type" class="form-control">
                                <option value="">Job Type</option>
                                <option value="">Part-time</option>
                                <option value="">full-time</option>
                                <option value="">contract </option>
                            </select>
                        </div>
                        
                        <div class=" col-md-3 mb-xs-3 mb-sm-3 mb-lg-0">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-block">Search</button>
                            </div>   
                        </div>
                    </form>
                                
                </div>
            </div>
        </section> --}}

        <section class="section-1 py-5">
            <div class="container">
                <div class="card border-0 shadow p-5">
                    <form action="{{ route('jobs') }}" method="GET">
                        <div class="row">
                            <!-- Keyword Input -->
                            <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                                <input type="text" class="form-control" name="search" id="search" placeholder="Keywords" value="{{ old('search') }}">
                            </div>

                            <!-- Location Input -->
                            <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                                <input type="text" class="form-control" name="location" id="location" placeholder="Location" value="{{ old('location') }}">
                            </div>

                            <!-- Job Type Dropdown -->
                            <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                                <select name="job_type" id="job_type" class="form-control">
                                    <option value="">Job Type</option>
                                    <option value="Part-time" {{ old('job_type') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                    <option value="Full-time" {{ old('job_type') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                    <option value="Contract" {{ old('job_type') == 'Contract' ? 'selected' : '' }}>Contract</option>
                                </select>
                            </div>

                            <!-- Search Button -->
                            <div class="col-md-3 mb-xs-3 mb-sm-3 mb-lg-0">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>


        {{-- <section class="section-2 bg-2 py-5">
            <div class="container">
                <h2>Popular Categories</h2>
                <div class="row pt-5">
                    <div class="col-lg-4 col-xl-3 col-md-6">
                        <div class="single_catagory">
                            <a href="jobs.html"><h4 class="pb-2">Design &amp; Creative</h4></a>
                            <p class="mb-0"> <span>50</span> Available position</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3 col-md-6">
                        <div class="single_catagory">
                            <a href="jobs.html"><h4 class="pb-2">Finance</h4></a>
                            <p class="mb-0"> <span>50</span> Available position</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3 col-md-6">
                        <div class="single_catagory">
                            <a href="jobs.html"><h4 class="pb-2">Banking</h4></a>
                            <p class="mb-0"> <span>50</span> Available position</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3 col-md-6">
                        <div class="single_catagory">
                            <a href="jobs.html"><h4 class="pb-2">Data Science</h4></a>
                            <p class="mb-0"> <span>50</span> Available position</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3 col-md-6">
                        <div class="single_catagory">
                            <a href="jobs.html"><h4 class="pb-2">Marketing</h4></a>
                            <p class="mb-0"> <span>50</span> Available position</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3 col-md-6">
                        <div class="single_catagory">
                            <a href="jobs.html"><h4 class="pb-2">Digital Marketing</h4></a>
                            <p class="mb-0"> <span>50</span> Available position</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3 col-md-6">
                        <div class="single_catagory">
                            <a href="jobs.html"><h4 class="pb-2">Web Development</h4></a>
                            <p class="mb-0"> <span>50</span> Available position</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3 col-md-6">
                        <div class="single_catagory">
                            <a href="jobs.html"><h4 class="pb-2">AI and ML</h4></a>
                            <p class="mb-0"> <span>50</span> Available position</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <section class="section-3 bg-2 py-5">
            <div class="container">
                <h2>Latest Jobs</h2>
                <div class="row pt-5">
                    <div class="job_listing_area">                    
                        <div class="job_lists">
                            <div class="row">
                                @foreach($jobs as $job)
                                    <div class="col-md-4">
                                        <div class="card border-0 p-3 shadow mb-4">
                                            <div class="card-body">
                                                <h3 class="border-0 fs-5 pb-2 mb-0">{{ $job->job_title }}</h3>
                                                {{-- <p>We are in need of a Web Developer for our company.</p> --}}
                                                <div class="bg-light p-3 border">
                                                    <p class="mb-0">
                                                        <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                        <span class="ps-1"> {{ $job->location }}</span>
                                                    </p>
                                                    <p class="mb-0">
                                                        <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                        <span class="ps-1">{{ $job->job_type }}</span>
                                                    </p>
                                                    <p class="mb-0">
                                                        <span class="fw-bolder"><i class="fa fa-money-bill"></i></span>
                                                        <span class="ps-1">{{ $job->salary }}</span>
                                                    </p>
                                                </div>

                                                <div class="d-grid mt-3">
                                                    <a href="{{ route('job-detail', ['id' => $job->id]) }}" class="btn btn-primary btn-lg">Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">
                                            <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                            <p>We are in need of a Web Developer for our company.</p>
                                            <div class="bg-light p-3 border">
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                    <span class="ps-1">Noida</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                    <span class="ps-1">Remote</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                    <span class="ps-1">2-3 Lacs PA</span>
                                                </p>
                                            </div>

                                            <div class="d-grid mt-3">
                                                <a href="job-detail.html" class="btn btn-primary btn-lg">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">
                                            <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                            <p>We are in need of a Web Developer for our company.</p>
                                            <div class="bg-light p-3 border">
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                    <span class="ps-1">Noida</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                    <span class="ps-1">Remote</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                    <span class="ps-1">2-3 Lacs PA</span>
                                                </p>
                                            </div>

                                            <div class="d-grid mt-3">
                                                <a href="job-detail.html" class="btn btn-primary btn-lg">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">
                                            <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                            <p>We are in need of a Web Developer for our company.</p>
                                            <div class="bg-light p-3 border">
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                    <span class="ps-1">Noida</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                    <span class="ps-1">Remote</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                    <span class="ps-1">2-3 Lacs PA</span>
                                                </p>
                                            </div>

                                            <div class="d-grid mt-3">
                                                <a href="job-detail.html" class="btn btn-primary btn-lg">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">
                                            <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                            <p>We are in need of a Web Developer for our company.</p>
                                            <div class="bg-light p-3 border">
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                    <span class="ps-1">Noida</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                    <span class="ps-1">Remote</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                    <span class="ps-1">2-3 Lacs PA</span>
                                                </p>
                                            </div>

                                            <div class="d-grid mt-3">
                                                <a href="job-detail.html" class="btn btn-primary btn-lg">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">
                                            <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                            <p>We are in need of a Web Developer for our company.</p>
                                            <div class="bg-light p-3 border">
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                    <span class="ps-1">Noida</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                    <span class="ps-1">Remote</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                    <span class="ps-1">2-3 Lacs PA</span>
                                                </p>
                                            </div>

                                            <div class="d-grid mt-3">
                                                <a href="job-detail.html" class="btn btn-primary btn-lg ">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
