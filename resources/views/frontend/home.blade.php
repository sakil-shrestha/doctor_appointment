<x-layout.frontend>


    <!-- HERO -->

    <section class="pt-36 pb-24">

        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">

            <!-- text -->

            <div>

                <h1 class="text-5xl md:text-6xl font-bold leading-tight mb-6">

                    Smart Healthcare
                    <span class="text-emerald-600">
                        Booking System
                    </span>

                </h1>

                <p class="text-lg text-gray-600 mb-8">

                    Find doctors, check their availability and book appointments instantly.
                    A modern healthcare experience designed for speed and simplicity.

                </p>

                <div class="flex gap-4">

                    <button class="px-8 py-4 bg-emerald-500 text-white rounded-xl shadow-lg hover:scale-105 transition">

                        Book Appointment

                    </button>

                    <button
                        class="px-8 py-4 border border-gray-300 rounded-xl hover:border-emerald-500 hover:text-emerald-600 transition">

                        Explore Doctors

                    </button>

                </div>

            </div>



            <!-- 3D doctor illustration container -->

            <div class="relative flex justify-center">

                <div class="card3d glass p-10 rounded-3xl depth">

                    <img src="https://cdn-icons-png.flaticon.com/512/3774/3774299.png" class="w-72">

                </div>

            </div>

        </div>

    </section>



    <!-- DOCTOR SECTION -->

    <section class="py-24 bg-white">

        <div class="max-w-7xl mx-auto px-6">

            <h2 class="text-4xl font-bold text-center mb-16">
                Available Doctors
            </h2>


            <div class="grid md:grid-cols-3 gap-10">


                <!-- doctor card -->

                @foreach($doctors as $doctor)
                <div class="card3d glass p-6 rounded-3xl depth">

                    <div class="flex items-center gap-4 mb-4">

                        <img src="{{ asset($doctor->profile_image) }}" class="w-16 h-16 rounded-full">

                        <div>

                            <h3 class="font-semibold text-lg">
                               {{$doctor->user->name}}
                            </h3>

                            <p class="text-sm text-gray-500">
                               {{$doctor->specialization}}
                            </p>

                        </div>

                    </div>


                    <div class="flex justify-between text-sm mb-4">

                        <span class="text-gray-500">
                            Experience
                        </span>

                        <span class="font-medium">
                            {{$doctor->experience_years}} years
                        </span>

                    </div>


                    <div class="flex justify-between text-sm mb-4">

                        <span class="text-gray-500">
                            Patients
                        </span>

                        <span class="font-medium">
                            1.2k+
                        </span>

                    </div>


                    <div class="flex justify-between items-center mt-6">

                        <span class="px-3 py-1 bg-green-100 text-green-600 text-xs rounded-full">

                            {{$doctor->staus}}

                        </span>

                        <a href="#" class="px-4 py-2 bg-emerald-500 text-white rounded-lg text-sm hover:bg-emerald-600">

                            Book

                        </a>

                    </div>

                </div>
                @endforeach






            </div>

        </div>

    </section>



    <!-- CTA -->

    <section class="py-24 bg-gradient-to-r from-emerald-500 to-green-400 text-white text-center">

        <h2 class="text-4xl font-bold mb-6">
            Start Your Appointment Journey
        </h2>

        <p class="text-lg mb-8">
            Modern healthcare booking in seconds.
        </p>

        <a href="/register"
            class="bg-white text-emerald-600 px-10 py-4 rounded-xl font-semibold shadow hover:scale-105 transition">

            Create Account

        </a>

    </section>



</x-layout.frontend>
