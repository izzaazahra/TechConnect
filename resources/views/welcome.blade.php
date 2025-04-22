<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechConnect - Akses Tanpa Batas untuk Belajar Pemrograman</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .bg-primary {
            background-color: #1955d6;
        }
        .bg-secondary {
            background-color: #111827;
        }
        .text-primary {
            color: #1955d6;
        }
        .btn-primary {
            background-color: #F59E0B;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
        }
    </style>
</head>
<body class="font-sans">
    <!-- Header Navigation -->
    <header class="bg-primary text-white">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center">
                <h1 class="text-2xl font-bold text-yellow-400">TechConnect</h1>
                <nav class="ml-80 hidden md:block">
                    <ul class="flex space-x-6">
                        <li><a href="#" class="hover:text-yellow-300">Home</a></li>
                        <li><a href="#" class="hover:text-yellow-300">Course</a></li>
                        <li><a href="#" class="hover:text-yellow-300">Quiz</a></li>
                        <li><a href="#" class="hover:text-yellow-300">Forum</a></li>
                        <li><a href="#" class="hover:text-yellow-300">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="flex items-center">
                <a href="{{ route('account.login')}}" class="btn-primary text-white px-4 py-2 rounded-full font-medium"><i class="fas fa-user mr-1"></i>Sign In</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-primary text-white pt-10 pb-20">
        <div class="container mx-auto px-4 grid md:grid-cols-2 items-center">
            <div>
                <p class="mb-2">START LEARNING WITH</p>
                <h1 class="text-4xl font-bold mb-2">TechConnect :</h1>
                <h2 class="text-3xl font-bold mb-4">Akses Tanpa Batas untuk Belajar Pemrograman</h2>
                <p class="mb-6">Platform belajar kemampuan dan praktek pemrograman online</p>

                <div class="flex bg-white rounded-full p-1 max-w-md">
                    <input type="text" placeholder="What do you want to learn?" class="w-full px-4 py-2 rounded-full focus:outline-none text-gray-800">
                    <button class="bg-yellow-500 text-white p-2 rounded-full">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="hidden md:block">
                <img src="images/header.png" alt="Programming illustration" class="mx-auto">
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-6">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-around text-center">
                <div class="w-1/2 md:w-1/4 mb-4">
                    <div class="rounded-full bg-green-100 w-12 h-12 flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-graduation-cap text-green-500"></i>
                    </div>
                    <h3 class="font-bold text-2xl">300</h3>
                    <p class="text-gray-600">Instructor</p>
                </div>
                <div class="w-1/2 md:w-1/4 mb-4">
                    <div class="rounded-full bg-purple-100 w-12 h-12 flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-users text-purple-500"></i>
                    </div>
                    <h3 class="font-bold text-2xl">20,000+</h3>
                    <p class="text-gray-600">Student</p>
                </div>
                <div class="w-1/2 md:w-1/4 mb-4">
                    <div class="rounded-full bg-red-100 w-12 h-12 flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-video text-red-500"></i>
                    </div>
                    <h3 class="font-bold text-2xl">10,000+</h3>
                    <p class="text-gray-600">Video</p>
                </div>
                <div class="w-1/2 md:w-1/4 mb-4">
                    <div class="rounded-full bg-blue-100 w-12 h-12 flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-globe text-blue-500"></i>
                    </div>
                    <h3 class="font-bold text-2xl">1,00,000+</h3>
                    <p class="text-gray-600">Users</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Courses -->
    <section class="py-10">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Most Popular <span class="text-primary">Course</span></h2>
            </div>
            <p class="text-gray-600 mb-6">Pilihan kursus terbaik yang paling diminati di TechConnect</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <!-- HTML Course -->
                <div class="bg-white rounded-lg shadow-md p-4 card-hover">
                    <div class="bg-yellow-100 rounded-lg p-4 mb-4">
                        <img src="images/html.png" alt="HTML5" class="mx-auto">
                    </div>
                    <h3 class="font-semibold mb-2">Tutorial Dasar HTML</h3>
                    <div class="flex items-center mb-2">
                        <div class="flex text-yellow-500">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="text-gray-600 text-sm ml-2">(758)</span>
                    </div>
                </div>

                <!-- C++ Course -->
                <div class="bg-white rounded-lg shadow-md p-4 card-hover">
                    <div class="bg-blue-100 rounded-lg p-4 mb-4">
                        <img src="images/C.png" alt="C++" class="mx-auto">
                    </div>
                    <h3 class="font-semibold mb-2">Tutorial Dasar C++</h3>
                    <div class="flex items-center mb-2">
                        <div class="flex text-yellow-500">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="text-gray-600 text-sm ml-2">(1223)</span>
                    </div>
                </div>

                <!-- Java Course -->
                <div class="bg-white rounded-lg shadow-md p-4 card-hover">
                    <div class="bg-blue-100 rounded-lg p-4 mb-4">
                        <img src="images/java.png" alt="Java" class="mx-auto">
                    </div>
                    <h3 class="font-semibold mb-2">Tutorial Java Untuk Pemula</h3>
                    <div class="flex items-center mb-2">
                        <div class="flex text-yellow-500">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="text-gray-600 text-sm ml-2">(1042)</span>
                    </div>
                </div>

                <!-- Python Course -->
                <div class="bg-white rounded-lg shadow-md p-4 card-hover">
                    <div class="bg-yellow-100 rounded-lg p-4 mb-4">
                        <img src="images/python.png" alt="Python" class="mx-auto">
                    </div>
                    <h3 class="font-semibold mb-2">Tutorial Python Untuk Pemula</h3>
                    <div class="flex items-center mb-2">
                        <div class="flex text-yellow-500">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="text-gray-600 text-sm ml-2">(1126)</span>
                    </div>
                </div>
            </div>

    </section>

    <!-- Learning Categories -->
    <section class="py-10 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-2">Most Popular <span class="text-primary">Learning Categories</span></h2>
            <p class="text-gray-600 mb-6">Berbagai topik pembelajaran pemrograman yang telah dikembangkan untuk memudahkan keahlian Anda</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div class="bg-white rounded-lg p-4 flex items-center justify-between card-hover">
                    <div class="flex items-center">
                        <div class="rounded-full bg-gray-200 p-2 mr-3">
                            <i class="fas fa-desktop"></i>
                        </div>
                        <span>UI/UX Design</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg p-4 flex items-center justify-between card-hover">
                    <div class="flex items-center">
                        <div class="rounded-full bg-gray-200 p-2 mr-3">
                            <i class="fas fa-code"></i>
                        </div>
                        <span>Web Development</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg p-4 flex items-center justify-between card-hover">
                    <div class="flex items-center">
                        <div class="rounded-full bg-gray-200 p-2 mr-3">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <span>Cyber Security</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg p-4 flex items-center justify-between card-hover">
                    <div class="flex items-center">
                        <div class="rounded-full bg-gray-200 p-2 mr-3">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <span>Data Science</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg p-4 flex items-center justify-between card-hover">
                    <div class="flex items-center">
                        <div class="rounded-full bg-gray-200 p-2 mr-3">
                            <i class="fas fa-gamepad"></i>
                        </div>
                        <span>Game Development</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg p-4 flex items-center justify-between card-hover">
                    <div class="flex items-center">
                        <div class="rounded-full bg-gray-200 p-2 mr-3">
                            <i class="fas fa-database"></i>
                        </div>
                        <span>Database Management</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg p-4 flex items-center justify-between card-hover">
                    <div class="flex items-center">
                        <div class="rounded-full bg-gray-200 p-2 mr-3">
                            <i class="fas fa-robot"></i>
                        </div>
                        <span>Artificial Intelligence</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg p-4 flex items-center justify-between card-hover">
                    <div class="flex items-center">
                        <div class="rounded-full bg-gray-200 p-2 mr-3">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <span>Mobile Development</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg p-4 flex items-center justify-between card-hover">
                    <div class="flex items-center">
                        <div class="rounded-full bg-gray-200 p-2 mr-3">
                            <i class="fas fa-cloud"></i>
                        </div>
                        <span>Cloud Computing</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Best Instructors -->
    <section class="py-10">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-2xl font-bold">Our Best <span class="text-primary">Instructor</span></h2>
            </div>
            <p class="text-gray-600 mb-6">Belajar langsung dari instruktur terbaik dengan pengalaman dan keahlian di bidangnya</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-white rounded-lg shadow-md p-4 text-center card-hover">
                    <div class="bg-white-400 rounded-lg p-4 mb-4">
                        <img src="images/orang1.png" class="mx-auto">
                    </div>
                    <h3 class="font-semibold">Jacob Jones</h3>
                    <p class="text-gray-600 text-sm">UI/UX Design Expert</p>
                </div>

                <div class="bg-white rounded-lg shadow-md p-4 text-center card-hover">
                    <div class="bg-white-200 rounded-lg p-4 mb-4">
                        <img src="images/orang2.png" class="mx-auto">
                    </div>
                    <h3 class="font-semibold">Jacob Jones</h3>
                    <p class="text-gray-600 text-sm">Web Development Expert</p>
                </div>

                <div class="bg-white rounded-lg shadow-md p-4 text-center card-hover">
                    <div class="bg-white-200 rounded-lg p-4 mb-4">
                        <img src="images/orang3.png" class="mx-auto">
                    </div>
                    <h3 class="font-semibold">Jacob Jones</h3>
                    <p class="text-gray-600 text-sm">Front-End Development Expert</p>
                </div>

                <div class="bg-white rounded-lg shadow-md p-4 text-center card-hover">
                    <div class="bg-white-200 rounded-lg p-4 mb-4">
                        <img src="images/orang4.png" class="mx-auto">
                    </div>
                    <h3 class="font-semibold">Jacob Jones</h3>
                    <p class="text-gray-600 text-sm">Back-End Development Expert</p>
                </div>

        </div>
    </section>

    <!-- Student Feedback -->
    <section class="py-10 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-2xl font-bold">Student <span class="text-primary">Feedback</span></h2>
            </div>
            <p class="text-gray-600 mb-6">Pendapat dan pengalaman siswa dari para pelajar di TechConnect</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg shadow-md p-6 card-hover relative">
                    <div class="flex items-center mb-4">
                        <img src="images/student1.png"  class="rounded-full bg-red-400">
                        <div class="ml-4">
                            <h3 class="font-semibold">Guy Hawkins</h3>
                            <p class="text-gray-600 text-sm">UI/UX Designer</p>
                        </div>
                    </div>
                    <p class="text-gray-600">Viverra vitae incididunt amet quis augue quisque facilisis. Risus est maecenas odio amet venenatis phasellus. Nam vitae lobortis massa in integer in. Adipiscing gravida facilisi aenean eros.</p>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 card-hover relative">
                    <div class="flex items-center mb-4">
                        <img src="images/student2.png"  class="rounded-full bg-purple-400">
                        <div class="ml-4">
                            <h3 class="font-semibold">Guy Hawkins</h3>
                            <p class="text-gray-600 text-sm">UI/UX Designer</p>
                        </div>
                    </div>
                    <p class="text-gray-600">Viverra vitae incididunt amet quis augue quisque facilisis. Risus est maecenas odio amet venenatis phasellus. Nam vitae lobortis massa in integer in. Adipiscing gravida facilisi aenean eros.</p>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 card-hover relative">
                    <div class="flex items-center mb-4">
                        <img src="images/student3.png"  class="rounded-full bg-blue-400">
                        <div class="ml-4">
                            <h3 class="font-semibold">Guy Hawkins</h3>
                            <p class="text-gray-600 text-sm">UI/UX Designer</p>
                        </div>
                    </div>
                    <p class="text-gray-600">Viverra vitae incididunt amet quis augue quisque facilisis. Risus est maecenas odio amet venenatis phasellus. Nam vitae lobortis massa in integer in. Adipiscing gravida facilisi aenean eros.</p>
                </div>
            </div>

            <!-- Commented out pagination dots -->
            <!-- <div class="flex justify-center mt-6 space-x-2">
                <span class="h-2 w-2 rounded-full bg-blue-500"></span>
                <span class="h-2 w-2 rounded-full bg-gray-300"></span>
                <span class="h-2 w-2 rounded-full bg-gray-300"></span>
                <span class="h-2 w-2 rounded-full bg-gray-300"></span>
                <span class="h-2 w-2 rounded-full bg-gray-300"></span>
            </div> -->
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-10">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-10 items-center">
                <div>
                    <img src="images/roket.png" alt="Join illustration" class="mx-auto">
                </div>
                <div>
                    <h2 class="text-2xl font-bold mb-4">Join <span class="text-primary">World's largest</span> learning platform today</h2>
                    <p class="text-gray-600 mb-6">Start learning by registering for free</p>
                    <p class="text-gray-600 mb-6">Aenean neque massa pulvinar dui imperdiet dapibus consectetur ultrices orci risus amet sem. It metus augue.</p>
                    <a href="{{ route('account.register')}}" class="btn-primary text-white px-6 py-3 rounded-full font-medium inline-block">Register Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer - Updated to use Tailwind CSS -->
    <footer class="bg-gray-100 py-10">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h5 class="text-xl font-bold text-primary mb-4">TechConnect</h5>
                    <p class="text-gray-600">Learn coding the fun way</p>
                </div>
                <div>
                    <h5 class="text-xl font-bold mb-4">Quick Links</h5>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-primary">About Us</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-primary">Courses</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-primary">Support</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="text-xl font-bold mb-4">Connect With Us</h5>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-600 hover:text-primary"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-gray-600 hover:text-primary"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-gray-600 hover:text-primary"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-gray-600 hover:text-primary"><i class="fab fa-github fa-lg"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-300">
            <div class="text-center text-gray-600">
                <p>&copy; {{ date('Y') }} TechConnect. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
