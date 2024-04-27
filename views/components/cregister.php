<section class="bg-[#1A2C38]">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-bold text-white">
            Drinko
        </a>
        <div class="w-full bg-[#0F212E] rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-white md:text-2xl dark:text-white">
                    Register an account
                </h1>
                <form class="space-y-4 md:space-y-6" action="/register" method="POST">
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-white">Username</label>
                        <input type="text" name="username" id="username" class="bg-[#1A2C38] border border-[#0F212E] text-white sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="username" required="">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-[#1A2C38] border border-[#0F212E] text-white sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="name@company.com" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-white">Password</label>
                        <input type="password" name="password" id="password" class="bg-[#1A2C38] border border-[#0F212E] text-white sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="••••••••" required="">
                    </div>
                    <button type="submit" class="w-full text-white bg-[#1475E1] focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Register</button>
                    <p class="text-sm font-light text-gray-100">
                        Already have an account? <a href="/login" class="font-medium text-white hover:underline">Sign in</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>