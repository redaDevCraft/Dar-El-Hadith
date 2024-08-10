<nav class="bg-whit dark:bg-gray-300 border-gray-400 tajawal-bold relative">

    <div dir="rtl" class="flex flex-wrap items-center justify-between mx-auto p-4 lg:mx-7">
        <button id="navbar-toggle" data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <a href="/" class="flex items-center space-x-3 hover:animate-pulse">
            <img src="{{ asset('images/SmallLogo.svg') }}" alt="دار الحديث" class="h-12 mb-3">
        </a>
        <div class="hidden w-full lg:block lg:w-auto text-2xl " id="navbar-default">
            <ul
                class="flex flex-col p-4 lg:p-0 mt-4 border border-gray-100 rounded-lg lg:flex-row lg:space-x-8 rtl:space-x-reverse lg:mt-0 lg:border-0 dark:bg-gray-800 lg:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="/"
                        class="block py-2 px-3 text-white bg-green-900 hover:bg-emerald-600 animate duration-300 rounded lg:text-white lg:p-1 dark:text-white lg:dark:text-green-500"
                        aria-current="page">الرئيسية</a>
                </li>
                <li>
                    <a href="#marafiq" data-scroll-link="true" data-page-link="/#marafiq"
                        class="block py-2 px-3 hover:shadow-sm text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-700 lg:p-1 dark:text-white lg:dark:hover:text-green-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent">المرافق</a>
                </li>
                <li>
                    <a href="#default-carousel" data-scroll-link="true" data-page-link="/#default-carousel"
                        class="block py-2 px-3 hover:shadow-sm text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-700 lg:p-1 dark:text-white lg:dark:hover:text-green-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent">الأخبار</a>
                </li>
                <li>
                    <a href="/history"
                        class="block py-2 px-3 hover:shadow-sm text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-700 lg:p-1 dark:text-white lg:dark:hover:text-green-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent">التاريــخ</a>
                </li>
                <li>
                    <a href="#videos" data-scroll-link="true" data-page-link="/#videos"
                        class="block py-2 px-3 hover:shadow-sm text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-700 lg:p-1 dark:text-white lg:dark:hover:text-green-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent">الفيديوهات</a>
                </li>
            </ul>
        </div>

    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const currentPath = window.location.pathname;
    const scrollLinks = document.querySelectorAll('a[data-scroll-link="true"]');

    scrollLinks.forEach(link => {
        if (currentPath === '/') {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        } else {
            const pageLink = link.getAttribute('data-page-link');
            link.setAttribute('href', pageLink);
        }
    });
});
</script>