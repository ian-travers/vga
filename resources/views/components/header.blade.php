<header class="border-b border-gray-800" xmlns:livewire="http://www.w3.org/1999/html">
    <nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
        <div class="flex flex-col lg:flex-row items-center">
            <a href="/">Video Games</a>
            <ul class="flex ml-0 lg:ml-16 space-x-8 mt-4 lg:mt-0">
                <li><a href="#" class="hover:text-gray-400">Games</a></li>
                <li><a href="#" class="hover:text-gray-400">Reviews</a></li>
                <li><a href="#" class="hover:text-gray-400">Coming Soon</a></li>
            </ul>
        </div>
        <div class="flex items-center mt-4 lg:mt-0">
            <livewire:search-dropdown/>
            <div class="ml-6">
                <a href="#">
                    <img
                        class="rounded-full w-8"
                        src="https://i.pravatar.cc/150?u=fake@pravatar.com"
                        alt="avatar"
                    >
                </a>
            </div>
        </div>
    </nav>
</header>
