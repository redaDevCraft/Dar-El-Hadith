<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div dir="rtl" class=" flex flex-wrap justify-between mx-9 mt-4 ">
        <div class="hidden w-full md:block md:w-auto text-xl" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="/admin"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-1 dark:text-white md:dark:hover:text-green-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">لوحة
                        التحكم</a>
                </li>
                <li>
                    <a href="/#marafiq"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-1 dark:text-white md:dark:hover:text-green-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">المرافق</a>
                </li>
                <li>
                    <a href="/#default-carousel"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-1 dark:text-white md:dark:hover:text-green-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">الأخبار</a>
                </li>
                <li>
                    <a href="/history"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-1 dark:text-white md:dark:hover:text-green-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">التاريــخ</a>
                </li>
                <li>
                    <a href="/"
                        class="block py-2 px-3 text-white bg-green-900 rounded  md:text-white  md:p-1 dark:text-white md:dark:text-green-500"
                        aria-current="page">الرئيسية</a>
                </li>
            </ul>
        </div>
        <a href="/" class="">
            <img src="{{ asset('images/SmallLogo.svg') }}" alt="دار الحديث" class="h-10">
        </a>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const navbarLinks = document.querySelectorAll('a[href^="#"]');

    navbarLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();

            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });

                // Adjust scroll position to account for fixed navbar or offset
                setTimeout(() => {
                    const scrollY = window.scrollY;
                    window.scroll({
                        top: scrollY - 100,
                        behavior: 'smooth'
                    });
                }, 500); // Adjust delay as necessary
            }
        });
    });
});
</script>