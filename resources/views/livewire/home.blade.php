<div class="relative ">

    <div class="font-sans  animate-popUp  text-white rounded-lg md:m-10 m-6" style="background-image: url('images/OpenDay3.jpg');
    background-size: cover">

        <div class="flex flex-col p-4 rounded-lg shadow-lg">
            <div class="flex flex-col-reverse text-right  justify-center gap-4 font-bold text-xl font-sans">
                <div>

                    مواقيت
                    الصلاة
                </div>
                <div>
                    {{ $currentDate }} | {{ $hijriDate }}
                </div>

            </div>
            @if($prayerTimes)
            <div dir="rtl" class="flex flex-col md:flex-row ">
                @foreach (['Fajr', 'Dhuhr', 'Asr', 'Maghrib', 'Isha'] as $prayer)
                <div class="flex justify-evenly w-full text-2xl border-b border-spacing-7 p-2">
                    <span class="font-bold">{{ $prayerLabels[$prayer] ?? $prayer }}</span>
                    <span>{{ $prayerTimes['timings'][$prayer] ?? 'N/A' }}</span>
                </div>
                @endforeach
            </div>
            @else
            <p class="text-center">مواقيت الصلاة غير متوفرة</p>
            @endif
        </div>
    </div>

    <div class=" animate-popUp flex flex-col justify-center items-center md:space-y-16 space-y-9 mt-2 md:m-10 m-6 rounded-lg md:py-[20%] h-60 bg-cover bg-center bg-no-repeat"
        style="background-image: url('images/OpenDay3.jpg');">
        <h3 class="font-bold text-2xl md:text-6xl text-white text-center">
            دار الحديث بتلمسان..مهد العلماء و معقل الشهداء
        </h3>
        <button class="bg-green-700 text-white  hover:bg-white hover:text-emerald-900 border-2  text-nowrap font-bold p-2 md:p-3 rounded-lg  md:text-2xl  max-md:1/2  md:w-auto 
             duration-500">
            <a href="/history"> تعرف على دار الحديث

            </a>
        </button>
    </div>

    <h2 id="marafiq" class="text-right text-4xl md:border-b-2  py-10 md:py-2 font-sans mr-8 md:mr-12 text-green-900">
        أخبار و مقالات
    </h2>


    <!-- blogs -->
    <div>
        <div dir="rtl"
            class="animate-popUp flex flex-col md:flex-row md:flex-wrap items-center md:justify-between md:space-y-2 space-y-4 md:mr-10">
            @foreach($news as $index => $additional)
            <div class="md:w-1/4">
                <div
                    class="md:max-w-72 max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                    <a href="/news/{{ $additional->id }}" class=" ">
                        @php
                        $imagePath = !empty($additional->images) ? asset('storage/' . $additional->images[0]) :
                        asset('images/SmallWhiteLogo.svg');
                        $isSmallWhiteLogo = $imagePath === asset('images/SmallWhiteLogo.svg');
                        @endphp
                        <img class="rounded-t-lg border-2 bg-green-700 {{ $isSmallWhiteLogo ? ' p-10 h-44' : 'w-96 h-44' }}"
                            src="{{ $imagePath }}" alt="" />
                    </a>

                    <div class="p-5">
                        <a href="/news/{{ $additional->id }}">
                            <h5
                                class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white text-ellipsis overflow-hidden line-clamp-1 ">
                                {{ $additional->title }}
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            {{ \Carbon\Carbon::parse($additional->created_at)->format('Y-m-d') }}</p>
                        <a href="/news/{{ $additional->id }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            اقرأ المزيد ↓
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>


            @if(($index + 1) % 2 == 0)
            <div class="w-full md:hidden mb-4"></div>
            @endif
            @endforeach
        </div>
        <div class="flex justify-center mt-4">
            <a wire:click="loadMore" href="#"
                class="inline-flex items-center px-3 py-2 text-xl mt-7 font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                ↓ اقرأ المزيد
            </a>
        </div>
    </div>







    <!-- <div class="bg-gray-400 flex flex-row rounded-md border-2 border-green-800 m-6 ">
        <img src="images/ibrahimi.svg" class="m-4">
        <div class="flex flex-col justify-center items-end ">
            <div class=" font-bold">الشيخ البشير الإبراهيمي</div>
            <div class=" ">محمد البشير الإبراهيمي (1889-1965 م)الموافق (1306 هـ -1385 هـ) من أعلام الفكر
                والأدب
                في العالم العربي، ومن العلماء في الجزائر. هو رفيق النضال للشيخ عبد الحميد ابن باديس في قيادة الحركة
                الإصلاحية الجزائرية، ونائبه، ثم خليفته في رئاسة جمعية العلماء المسلمين.</div>
            <div>
                <a href="#" class="bg-green-900 font-bold text-white text-center p-2 rounded-md">تعرف عليه
                    أكثر</a>
            </div>
        </div>
    </div> -->

    <!-- <h2 class="text-center bg-gray-200 rounded-md m-6 p-4 font-bold text-3xl font-serif text-green-900">
        مؤسس دار الحديث</h2>

    <div class="bg-gray-100 flex flex-col justify-center md:flex-row rounded-md border-2 border-green-800 md:m-10 m-6">
        <img src="images/ibrahimi.svg" class="m-4 md:h-96">
        <div dir="rtl" class="flex flex-col justify-center md:justify-evenly space-y-6  font-serif m-6">
            <div class=" font-bold text-2xl text-green-900 md:text-5xl">الشيخ البشير الإبراهيمي</div>
            <div class="md:text-4xl text-green-950 font-sans">محمد البشير الإبراهيمي (1889-1965 م)الموافق
                (1306 هـ -1385
                هـ) من
                أعلام الفكر
                والأدب
                في العالم العربي، ومن العلماء في الجزائر. هو رفيق النضال للشيخ عبد الحميد ابن باديس في قيادة الحركة
                الإصلاحية الجزائرية، ونائبه، ثم خليفته في رئاسة جمعية العلماء المسلمين.</div>

            <a href="#" class="bg-green-900 font-bold font-sans text-white text-nowrap p-2 text-center  rounded-md">تعرف
                عليه
                أكثر</a>
        </div>
    </div> -->

    <div class="">
        <h2 id="marafiq" class="text-right text-4xl border-b-2 py-2 mt-10 font-sans mr-8 md:mr-12 text-green-900">
            مرافق دار
            الحديث</h2>
        <div class="flex flex-col-reverse justify-center md:flex-row  md:m-10 m-6">
            <div dir="rtl" class="flex flex-col justify-center md:justify- space-y-5 md:space-y-9 font-serif m-6">
                <div class="font-bold  text-green-950 text-4xl">المدرسة التحضيرية </div>
                <div class="md:text-3xl font-sans">
                    تستقبل المدرسة الأطفال الصغار البالغين من العمر أربع سنوات، وخمس سنوات، وأكثر، ويمتاز البرنامج
                    السنوي
                    بالطابع الديني والتركيز على القرآن الكريم والحديث الشريف والآداب الإسلامية بالإضافة الى مواد الحساب
                    و
                    مادة المحادثة المستوحاة من واقع التلميذ الاجتماعي والأسري.

                </div>
            </div>
            <img src="images/school.jpeg" class="  border-2 rounded-lg h-96">
        </div>

        <div class="flex flex-col-reverse justify-center md:flex-row rounded-md  border-green-800 md:m-10 m-6">
            <div dir="rtl" class="flex flex-col justify-center md:justify- space-y-5 md:space-y-9 font-serif m-6">
                <div class="font-bold text-2xl text-green-950 md:text-4xl">المصلى </div>
                <div class="md:text-3xl font-sans">
                    يقع في الطابق الأرضي , تقام فيه الصلوات الخمس , صلاة الجمعة من طرف الشيخ بن يونس آيت سالم و صلاة
                    التراويح في رمضان بالإضافة إلى العديد من الأنشطة مثل حلقات تلاوة القرآن الكريم و دروس خفيفة من طرف
                    أساتذة وشيوخ لتزكية النفوس و هز القلوب

                </div>
            </div>
            <img src="images/OpenDay3.jpg" class="  border-2 rounded-lg h-96">
        </div>

        <div class="flex flex-col-reverse justify-center md:flex-row rounded-md border-green-800 md:m-10 m-6">
            <div dir="rtl" class="flex flex-col justify-center md:justify- space-y-5 md:space-y-3 font-serif m-6">
                <div class="font-bold text-2xl text-green-950 md:text-4xl">المكتبة </div>
                <div class="md:text-2xl font-sans">تقع في الطابق الأول، وتحتوي على حوالي خمسة آلاف كتاب في مجالات دينية
                    متنوعة كالتفسير، الفقه، والعقيدة، بالإضافة إلى كتب الحركة الإصلاحية واللغة العربية. تضم المكتبة
                    أيضًا
                    مخطوطات قيمة مثل مخطوطة المصحف الشريف وصحيح البخاري. تحتوي المكتبة على قاعة للمطالعة، قاعة محاضرات و
                    مكان للإعلام الآلي مزودة بالإنترنت. تقدم المكتبة دروس دعم ودورات تكوينية في الإعلام الآلي، وتفتح
                    أبوابها
                    يومياً من 9 صباحاً حتى 5 مساءا

                </div>
            </div>
            <img src="images/library.jpeg" class=" border-2 rounded-lg  h-96">
        </div>

        <div class=" flex flex-col-reverse justify-center md:flex-row rounded-md  border-green-800 md:m-10 m-6">
            <div dir="rtl" class="flex flex-col justify-center md:justify- space-y-5 md:space-y-6 font-serif m-6">
                <div class="font-bold text-2xl text-green-950 md:text-4xl"> المدرسة القرآنية
                </div>
                <div class="md:text-xl font-sans">
                    تم افتتاح المدرسة القرآنية لدار الحديث بقاعة النساء بالطابق السفلي في مارس 1996 من قبل الجمعية
                    الدينية
                    والثقافية والعلمية. تطوع الشيخ محمد بوكلي حسن، حفيد الشيخ بوشناق، لتعليم القرآن فيها. يعمل محمد الآن
                    محاسبًا، وشارك معه في التدريس عبد الحكيم مير والبشير مرابط وعبد الإله عراوي. تفتح المدرسة أبوابها
                    بعد
                    صلاة العصر حتى العشاء للعاملين، وفي أوقات أخرى لغير العاملين. تشهد المدرسة إقبالاً متزايداً من مختلف
                    الأعمار، حتى أن القاعة تضيق أحياناً بهم. توفر الجمعية التدفئة والتكييف وتكرم الطلبة. تخرج العديد من
                    الطلبة الذين يحفظون القرآن ويؤمون الناس في الصلوات بالمدينة.

                </div>
            </div>
            <img src="images/OpenDay3.jpg" class=" h-96 border-2 rounded-lg">
        </div>
    </div>

    <button id="scroll-to-top"
        class=" hover:bg-emerald-400 fixed bottom-10 right-10 bg-green-600 text-white px-3 py-1 rounded-full hidden ">
        ↑
    </button>


    <!-- Islamic Services Section -->
    <div dir="rtl" class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base text-emerald-900 font-semibold tracking-wide uppercase">خدماتنا</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    خدمات دار الحديث </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    تقديم مجموعة من الخدمات لتلبية الاحتياجات والتساؤلات لجميع الأفراد و الأعمار
                    إن شاء الله </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <!-- Service 1 -->
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="p-6">
                            <div
                                class="p-2 flex items-center justify-center h-12 w-12 rounded-md bg-emerald-700 text-white mb-4">
                                <!-- Replace with an appropriate icon -->
                                <img src="images/prayIcon.svg" alt="pray">
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">الصلوات اليومية </h3>
                            <p class="mt-2 text-base text-gray-500">
                                الصلوات اليومية الخمس و صلاة التراويح في رمضان . </p>
                        </div>
                    </div>

                    <!-- Service 2 -->
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="p-6">
                            <div
                                class="p-2 flex items-center justify-center h-12 w-12 rounded-md bg-emerald-700 text-white mb-4">
                                <!-- Replace with an appropriate icon -->
                                <img src="images/prayIcon.svg" alt="pray">
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">صلاة الجمعة</h3>
                            <p class="mt-2 text-base text-gray-500">
                                صلاة الجمعة المقامة من طرف الشيخ بن يونس أيت سالم. </p>
                        </div>
                    </div>

                    <!-- Service 3 -->
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="p-6">
                            <div
                                class="p-2 flex items-center justify-center h-12 w-12 rounded-md bg-emerald-700 text-white mb-4">
                                <!-- Replace with an appropriate icon -->
                                <img src="images/learninIcon.svg" alt="">
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">
                                تربية و تعليم </h3>
                            <p class="mt-2 text-base text-gray-500">
                                برامجنا التعليمية للأطفال والبالغين، بما في ذلك القرآن و الفقه .
                            </p>
                        </div>
                    </div>

                    <!-- Service 4 -->
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="p-6">
                            <div
                                class="p-2 flex items-center justify-center h-12 w-12 rounded-md bg-emerald-700 text-white mb-4">
                                <!-- Replace with an appropriate icon -->
                                <img src="images/marriageIcon.svg" alt="">
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">خدمات الزواج</h3>
                            <p class="mt-2 text-base text-gray-500">
                                نقدم خدمات النكاح التي يجريها الأئمة المؤهلون.
                            </p>
                        </div>
                    </div>

                    <!-- Service 5 -->
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="p-6">
                            <div
                                class="p-2 flex items-center justify-center h-12 w-12 rounded-md bg-emerald-700 text-white mb-4">
                                <!-- Replace with an appropriate icon -->
                                <img src="images/consultIcon.svg" alt="">

                            </div>
                            <h3 class="text-lg font-medium text-gray-900">الاستشارات</h3>
                            <p class="mt-2 text-base text-gray-500">
                                استشارات و فتاوى من أئمتنا ومستشارين ذوي الخبرة. </p>
                        </div>
                    </div>

                    <!-- Service 6 -->
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="p-6">
                            <div
                                class="p-2  flex items-center justify-center h-12 w-12 rounded-md bg-emerald-700 text-white mb-4">
                                <!-- Replace with an appropriate icon -->
                                <img src="images/zakatIcon.svg" alt="">

                            </div>
                            <h3 class="text-lg font-medium text-gray-900">الزكاة والصدقة</h3>
                            <p class="mt-2 text-base text-gray-500">
                                ساهم في برامج الزكاة والصدقة لدينا لمساعدة المحتاجين.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <script>
    function isArabic(text) {
        const arabicPattern = /[\u0600-\u06FF]/;
        return arabicPattern.test(text);
    }

    document.addEventListener(" DOMContentLoaded", function() {
        const newsTitle = document.getElementById('news-title');
        const carouselWrapper = document.getElementById('carousel-wrapper');
        if (isArabic(newsTitle.innerText)) {
            newsTitle.setAttribute('dir', 'rtl');
            newsTitle.classList.add('text-right items-end');
            carouselWrapper.setAttribute('dir', 'rtl');
        } else {
            newsTitle.setAttribute('dir', 'ltr');
        }
    });
    </script>

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
        const scrollToTopButton = document.getElementById('scroll-to-top');

        window.addEventListener('scroll', function() {
            if (window.scrollY > 200) {
                scrollToTopButton.classList.remove('hidden');
            } else {
                scrollToTopButton.classList.add('hidden');
            }
        });

        scrollToTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
    </script>
</div>