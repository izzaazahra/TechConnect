<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Module;
use App\Models\Video;

class CourseSeeder extends Seeder
{
    public function run()
    {
        // Create Python Course
        $pythonCourse = Course::create([
            'title' => 'Introduction to Python',
            'description' => 'In this course, you will learn the basics of Python programming language for total beginners.',
            'level' => 'beginner',
            'category' => 'python',
            'lessons_count' => 42,
            'challenges_count' => 42,
            'is_popular' => true,
        ]);

        // Create Python Modules
        $pythonModule1 = Module::create([
            'course_id' => $pythonCourse->id,
            'title' => 'Getting Started with Python',
            'content' => '<p>Python is a high-level, interpreted, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation.</p><p>In this module, you will learn:</p><ul><li>How to install Python</li><li>Basic syntax</li><li>Variables and data types</li><li>Working with the Python interpreter</li></ul><p>Let\'s get started!</p>',
            'order' => 1,
        ]);

        // Create Python Videos
        Video::create([
            'module_id' => $pythonModule1->id,
            'title' => 'Installing Python and Setup',
            'youtube_id' => 'YYXdXT2l-Gg',
            'description' => 'Learn how to install Python on your computer.',
            'order' => 1,
        ]);

        Video::create([
            'module_id' => $pythonModule1->id,
            'title' => 'Python Variables and Data Types',
            'youtube_id' => 'cQT33yu9pY8',
            'description' => 'Learn about variables and basic data types in Python.',
            'order' => 2,
        ]);

        // Create Python Module 2
        $pythonModule2 = Module::create([
            'course_id' => $pythonCourse->id,
            'title' => 'Control Flow in Python',
            'content' => '<p>Control flow is the order in which individual statements, instructions, or function calls are executed or evaluated. The control flow statements in Python include conditional statements, loops, and function calls.</p><p>In this module, you will learn:</p><ul><li>If, elif, else statements</li><li>For loops</li><li>While loops</li><li>Break and continue statements</li></ul><p>Control flow is a fundamental concept in programming!</p>',
            'order' => 2,
        ]);

        // Create more videos for Module 2
        Video::create([
            'module_id' => $pythonModule2->id,
            'title' => 'Conditional Statements in Python',
            'youtube_id' => 'f4KOjWS_KZs',
            'description' => 'Learn how to use if, else, and elif statements.',
            'order' => 1,
        ]);

        Video::create([
            'module_id' => $pythonModule2->id,
            'title' => 'Loops in Python',
            'youtube_id' => 'P9sIg93Boso',
            'description' => 'Learn about for and while loops in Python.',
            'order' => 2,
        ]);

        // Create NumPy Course
        $numpyCourse = Course::create([
            'title' => 'Numpy Fundamentals',
            'description' => 'Learn to master powerful numerical computations in Python for data science with this concise, hands-on course.',
            'level' => 'intermediate',
            'category' => 'data_science',
            'lessons_count' => 28,
            'challenges_count' => 15,
            'is_popular' => true,
        ]);

        // Create NumPy Module 1
        $numpyModule1 = Module::create([
            'course_id' => $numpyCourse->id,
            'title' => 'Introduction to NumPy',
            'content' => '<p>NumPy is a library for the Python programming language, adding support for large, multi-dimensional arrays and matrices, along with a large collection of high-level mathematical functions to operate on these arrays.</p><p>In this module, you will learn:</p><ul><li>What NumPy is and why it\'s important</li><li>How to create NumPy arrays</li><li>Basic array operations</li><li>Array indexing and slicing</li></ul><p>NumPy is a fundamental package for scientific computing with Python!</p>',
            'order' => 1,
        ]);

        // Create NumPy Videos
        Video::create([
            'module_id' => $numpyModule1->id,
            'title' => 'Introduction to NumPy',
            'youtube_id' => 'QUT1VHiLmmI',
            'description' => 'Learn what NumPy is and why it\'s important for data science.',
            'order' => 1,
        ]);

        Video::create([
            'module_id' => $numpyModule1->id,
            'title' => 'Creating and Manipulating NumPy Arrays',
            'youtube_id' => 'rN0TREj8G7U',
            'description' => 'Learn how to create and manipulate NumPy arrays.',
            'order' => 2,
        ]);

        // Create NumPy Module 2
        $numpyModule2 = Module::create([
            'course_id' => $numpyCourse->id,
            'title' => 'Advanced NumPy Operations',
            'content' => '<p>NumPy provides advanced functionality beyond basic array operations. In this module, we\'ll explore more complex operations and techniques.</p><p>You will learn:</p><ul><li>Broadcasting</li><li>Universal functions (ufuncs)</li><li>Array reshaping and manipulation</li><li>Statistical functions</li></ul><p>These advanced techniques will help you write more efficient code for numerical computations!</p>',
            'order' => 2,
        ]);

        // Create more videos for NumPy Module 2
        Video::create([
            'module_id' => $numpyModule2->id,
            'title' => 'Broadcasting in NumPy',
            'youtube_id' => 'XPUuF--w-Jk',
            'description' => 'Learn about the powerful broadcasting feature in NumPy.',
            'order' => 1,
        ]);

        Video::create([
            'module_id' => $numpyModule2->id,
            'title' => 'Universal Functions in NumPy',
            'youtube_id' => 'AR0NPIIruRs',
            'description' => 'Learn about universal functions (ufuncs) in NumPy.',
            'order' => 2,
        ]);

        // Create C for Beginners Course
        $cCourse = Course::create([
            'title' => 'C for Beginners',
            'description' => 'Learn the fundamentals of C programming language from scratch.',
            'level' => 'beginner',
            'category' => 'c',
            'lessons_count' => 35,
            'challenges_count' => 20,
            'is_popular' => true,
        ]);

        // Create PHP Course
        $phpCourse = Course::create([
            'title' => 'Introduction to PHP',
            'description' => 'Learn PHP programming for web development from the ground up.',
            'level' => 'beginner',
            'category' => 'php',
            'lessons_count' => 30,
            'challenges_count' => 15,
            'is_popular' => true,
        ]);

        // Create SQL Course
        $sqlCourse = Course::create([
            'title' => 'SQL for beginners',
            'description' => 'Master database management with SQL from the basics to advanced techniques.',
            'level' => 'beginner',
            'category' => 'sql',
            'lessons_count' => 25,
            'challenges_count' => 18,
            'is_popular' => false,
        ]);

        // Create R Course
        $rCourse = Course::create([
            'title' => 'Introduction to R',
            'description' => 'Learn R programming for statistical computing and graphics.',
            'level' => 'beginner',
            'category' => 'r',
            'lessons_count' => 32,
            'challenges_count' => 20,
            'is_popular' => false,
        ]);

        // Create JavaScript Course
        $jsCourse = Course::create([
            'title' => 'Modern JavaScript for Beginners',
            'description' => 'Learn modern JavaScript programming for web development.',
            'level' => 'beginner',
            'category' => 'javascript',
            'lessons_count' => 40,
            'challenges_count' => 25,
            'is_popular' => false,
        ]);

        // Create Beginner Challenges Course
        $challengesCourse = Course::create([
            'title' => 'Beginner Challenges - Practice Basic Concepts',
            'description' => 'Enhance your coding skills with practical challenges for beginners.',
            'level' => 'beginner',
            'category' => 'challenges',
            'lessons_count' => 5,
            'challenges_count' => 50,
            'is_popular' => true,
        ]);
    }
}
