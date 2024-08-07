<div>
    <div class="relative tajawal-regular ">
        <div
            class="px-10 hero-section animate-popUp flex flex-col justify-center items-center lg:space-y-16 space-y-9 lg:mx-10 p-[100px] lg:p-[350px] bg-contain bg-center bg-no-repeat">
            <h3 class="text-4xl lg:text-6xl  text-white text-center reem-kufi-regular lg:text-nowrap">
                دار الحديث بتلمسان..مهد العلماء و معقل الشهداء
            </h3>
            <button
                class="bg-green-700 text-white hover:bg-white hover:text-emerald-900 border-2 text-nowrap font-bold p-2 lg:p-3 rounded-lg lg:text-2xl max-lg:1/2 lg:w-auto duration-500">
                <a href="/history"> تعرف على دار الحديث </a>
            </button>
        </div>
    </div>


    <div class=" mt-5 lg:mt-14">
        <h2 id="default-carousel" class="text-center font-bold text-4xl lg:mr-12 text-green-900">
            مستجدات و مقالات
        </h2>
        <p class="text-center text-lg font-medium  lg:mr-12 text-gray-700">
            اكتشف آخر الأخبار والمقالات في مجالات مختلفة لتحافظ على اطلاعك بكل جديد.
        </p>

    </div>



    <!-- blogs -->
    <div class="  lg:m-8 m-6">
        <div dir="rtl"
            class="animate-popUp flex flex-col lg:flex-row lg:flex-wrap gap-3  lg:space-y-0 space-y-4 lg:mr-[4%]">
            @foreach($news as $index => $additional)
            <div
                class="lg:max-w-72 lg:w-1/4  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                <a href="/news/{{ $additional->id }}" class=" ">
                    @php
                    $imagePath = !empty($additional->images) ? asset('storage/' . $additional->images[0]) :
                    asset('images/SmallWhiteLogo.svg');
                    $isSmallWhiteLogo = $imagePath === asset('images/SmallWhiteLogo.svg');
                    @endphp
                    <img class="rounded-t-lg border-2 bg-green-700 {{ $isSmallWhiteLogo ? ' lg:p-10 h-44 lg:w-96 w-screen' : ' w-screen lg:w-96 h-44' }}"
                        src="{{ $imagePath }}" alt="" loading="lazy" data-fallback />
                </a>


                <div class="p-5">
                    <a href="/news/{{ $additional->id }}">
                        <h5
                            class="mb-2 text-lg lg:text-xl  font-bold tracking-tight text-gray-900 dark:text-white text-ellipsis overflow-hidden line-clamp-1 ">
                            {{ $additional->title }}
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{ \Carbon\Carbon::parse($additional->created_at)->format('Y-m-d') }}
                    </p>
                    <a href="/news/{{ $additional->id }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                        اقرأ المزيد
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>



            @endforeach
        </div>
        <div class="flex justify-center mt-4">
            @if ($hasMoreNews)
            <button wire:click="loadMore" wire:loading.attr="disabled"
                class="items-center px-3 py-2 text-xl font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                <span wire:loading.remove>↓ المزيد</span>
                <span wire:loading>
                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                        </circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                </span>
            </button>
            @else
            <button
                class="items-center px-3 py-2 text-xl font-medium text-center text-white bg-gray-500 rounded-lg cursor-not-allowed"
                disabled>
                لا توجد المزيد من المقالات
            </button>
            @endif
        </div>

    </div>







    <!-- <div class="bg-gray-400 flex flex-row rounded-lg border-2  m-6 ">
        <img src="images/ibrahimi.svg" class="m-4">
        <div class="flex flex-col justify-center items-end ">
            <div class=" font-bold">الشيخ البشير الإبراهيمي</div>
            <div class=" ">محمد البشير الإبراهيمي (1889-1965 م)الموافق (1306 هـ -1385 هـ) من أعلام الفكر
                والأدب
                في العالم العربي، ومن العلماء في الجزائر. هو رفيق النضال للشيخ عبد الحميد ابن باديس في قيادة الحركة
                الإصلاحية الجزائرية، ونائبه، ثم خليفته في رئاسة جمعية العلماء المسلمين.</div>
            <div>
                <a href="#" class="bg-green-900 font-bold text-white text-center p-2 rounded-lg">تعرف عليه
                    أكثر</a>
            </div>
        </div>
    </div> -->

    <!-- <h2 class="text-center bg-gray-200 rounded-lg m-6 p-4 font-bold text-3xl font-sans text-green-900">
        مؤسس دار الحديث</h2>

    <div class="bg-gray-100 flex flex-col justify-center lg:flex-row rounded-lg border-2  lg:m-10 m-6">
        <img src="images/ibrahimi.svg" class="m-4 lg:h-96">
        <div dir="rtl" class="flex flex-col justify-center lg:justify-evenly space-y-6  font-sans m-6">
            <div class=" font-bold text-2xl text-green-900 lg:text-5xl">الشيخ البشير الإبراهيمي</div>
            <div class="lg:text-4xl text-green-950 font-sans">محمد البشير الإبراهيمي (1889-1965 م)الموافق
                (1306 هـ -1385
                هـ) من
                أعلام الفكر
                والأدب
                في العالم العربي، ومن العلماء في الجزائر. هو رفيق النضال للشيخ عبد الحميد ابن باديس في قيادة الحركة
                الإصلاحية الجزائرية، ونائبه، ثم خليفته في رئاسة جمعية العلماء المسلمين.</div>

            <a href="#" class="bg-green-900 font-bold font-sans text-white text-nowrap p-2 text-center  rounded-lg">تعرف
                عليه
                أكثر</a>
        </div>
    </div> -->

    <div id="marafiq" dir="auto" class="container mx-auto py-10 px-4">
        <!-- Title and Description Section -->
        <div class="text-center mb-10">
            <h2 class=" text-4xl lg:text-5xl text-green-900 font-bold mb-4">
                مرافق دار الحديث
            </h2>
            <p class="text-lg lg:text-xl text-gray-700 max-w-3xl mx-auto">
                دار الحديث تضم مجموعة من المرافق التي تهدف إلى تقديم بيئة تعليمية ودينية متميزة. تتنوع هذه المرافق بين
                المدرسة التحضيرية، المصلى، المكتبة، والمدرسة القرآنية، حيث يسعى كل منها لتلبية احتياجات المجتمعات و
                الأفراد.
            </p>
        </div>

        <!-- Grid Section -->
        <div class="grid grid-cols-1 lg:mx-[10rem] items-center  gap-8 lg:gap-32 tajawal-regular">
            <!-- Preparatory School Card -->
            <div class="transform hover:scale-105 transition-transform duration-300">
                <div class="relative overflow-hidden rounded-lg shadow-lg">
                    <img src="images/school.jpeg" alt="Preparatory School"
                        class="w-full h-64 lg:h-80 object-cover transition-transform duration-500 hover:scale-110"
                        loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-75"></div>
                    <div class="absolute bottom-0 p-4 text-white">
                        <h2 class="text-3xl lg:text-4xl font-bold">المدرسة التحضيرية</h2>
                    </div>
                </div>
                <div dir="rtl" class="p-6  bg-gradient-to-t from-gray-50 to-gray-200  shadow-lg rounded-lg space-y-4">
                    <p class="lg:text-3xl ">
                        تستقبل المدرسة الأطفال الصغار البالغين من العمر أربع سنوات، وخمس سنوات، وأكثر، ويمتاز البرنامج
                        السنوي
                        بالطابع الديني والتركيز على القرآن الكريم والحديث الشريف والآداب الإسلامية بالإضافة الى مواد
                        الحساب
                        و
                        مادة المحادثة المستوحاة من واقع التلميذ الاجتماعي والأسري.
                    </p>
                </div>
            </div>

            <!-- Prayer Hall Card -->
            <div class="transform hover:scale-105 transition-transform duration-300">
                <div class="relative overflow-hidden rounded-lg shadow-lg">
                    <img src="images/mosque.jpeg" alt="Prayer Hall"
                        class="w-full h-64 lg:h-80 object-cover transition-transform duration-500 hover:scale-110"
                        loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-75"></div>
                    <div class="absolute bottom-0 p-4 text-white">
                        <h2 class="text-3xl lg:text-4xl font-bold">المصلى</h2>
                    </div>
                </div>
                <div dir="rtl" class="p-6  bg-gradient-to-t from-gray-50 to-gray-200 shadow-lg rounded-lg space-y-4">
                    <p class="lg:text-3xl ">
                        يقع في الطابق الأرضي , تقام فيه الصلوات الخمس , صلاة الجمعة من طرف الشيخ بن يونس آيت سالم و صلاة
                        التراويح في رمضان بالإضافة إلى العديد من الأنشطة مثل حلقات تلاوة القرآن الكريم و دروس خفيفة من
                        طرف
                        أساتذة وشيوخ لتزكية النفوس و هز القلوب.
                    </p>
                </div>
            </div>

            <!-- Library Card -->
            <div class="transform hover:scale-105 transition-transform duration-300">
                <div class="relative overflow-hidden rounded-lg shadow-lg">
                    <img src="images/library.jpeg" alt="Library"
                        class="w-full h-64 lg:h-80 object-cover transition-transform duration-500 hover:scale-110"
                        loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-75"></div>
                    <div class="absolute bottom-0 p-4 text-white">
                        <h2 class="text-3xl lg:text-4xl font-bold">المكتبة</h2>
                    </div>
                </div>
                <div dir="rtl" class="p-6  bg-gradient-to-t from-gray-50 to-gray-200  shadow-lg rounded-lg space-y-4">
                    <p class="lg:text-3xl ">
                        تقع في الطابق الأول، وتحتوي على حوالي خمسة آلاف كتاب في مجالات دينية متنوعة كالتفسير، الفقه،
                        والعقيدة،
                        بالإضافة إلى كتب الحركة الإصلاحية واللغة العربية. تضم المكتبة أيضًا مخطوطات قيمة مثل مخطوطة
                        المصحف
                        الشريف وصحيح البخاري. تحتوي المكتبة على قاعة للمطالعة، قاعة محاضرات و مكان للإعلام الآلي مزودة
                        بالإنترنت. تقدم المكتبة دروس دعم ودورات تكوينية في الإعلام الآلي، وتفتح أبوابها يومياً من 9
                        صباحاً حتى
                        5 مساءاً.
                    </p>
                </div>
            </div>

            <!-- Quranic School Card -->
            <div class="transform hover:scale-105 transition-transform duration-300">
                <div class="relative overflow-hidden rounded-lg shadow-lg">
                    <img src="images/mousalla.jpg" alt="Quranic School"
                        class="w-full h-64 lg:h-80 object-cover transition-transform duration-500 hover:scale-110"
                        loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-75"></div>
                    <div class="absolute bottom-0 p-4 text-white">
                        <h2 class="text-3xl lg:text-4xl font-bold">المدرسة القرآنية</h2>
                    </div>
                </div>
                <div dir="rtl" class="p-6 bg-gradient-to-t from-gray-50 to-gray-200 shadow-lg rounded-lg space-y-4">
                    <p class="lg:text-3xl ">
                        تم افتتاح المدرسة القرآنية لدار الحديث بقاعة النساء بالطابق السفلي في مارس 1996 من قبل الجمعية
                        الدينية
                        والثقافية والعلمية. تطوع الشيخ محمد بوكلي حسن، حفيد الشيخ بوشناق، لتعليم القرآن فيها. يعمل محمد
                        الآن
                        محاسبًا، وشارك معه في التدريس عبد الحكيم مير والبشير مرابط وعبد الإله عراوي. تفتح المدرسة
                        أبوابها بعد
                        صلاة العصر حتى العشاء للعاملين، وفي أوقات أخرى لغير العاملين. تشهد المدرسة إقبالاً متزايداً من
                        مختلف
                        الأعمار، حتى أن القاعة تضيق أحياناً بهم. توفر الجمعية التدفئة والتكييف وتكرم الطلبة. تخرج العديد
                        من
                        الطلبة الذين يحفظون القرآن ويؤمون الناس في الصلوات بالمدينة.
                    </p>
                </div>
            </div>
        </div>
    </div>



    <button id="scroll-to-top"
        class=" hover:bg-emerald-400 fixed bottom-10 right-10 bg-green-600 text-white px-3 py-1 rounded-full hidden ">
        ↑
    </button>


    <div id="videos" class="text-center mb-3">
        <h2 class=" text-4xl lg:text-5xl text-green-900 font-bold mb-4">
            فيديوهات
        </h2>
        <p class="text-lg lg:text-xl text-gray-700 max-w-3xl mx-auto">
            استمتع بمشاهدة مجموعة مختارة من الفيديوهات التي تم إعدادها لتقديم محتوى تاريخي وتعليمي ذو قيمة.
        </p>
    </div>

    <div class="flex flex-wrap lg:flex-col justify-center lg:justify-start gap-4 rounded-lg">
        @if ($videos->count() > 0)
        @foreach ($videos as $video)
        <div class=" lg:w-1/2 lg:h-1/2 lg:ml-10  rounded-lg">
            <div class="video-container ">
                <lite-youtube short videoid="{{ $video->url }}" playlabel="Play Video: {{ $video->title }}"
                    class="lg:rounded-lg bg-contain rounded-lg w-[380px] h-[200px] lg:w-[1270px] lg:h-[400px] " style="background-image: url('https://img.youtube.com/vi/{{ $video->url }}/hqdefault.jpg'); 
                    ">
                </lite-youtube>
            </div>
            <div></div>
        </div>
        @endforeach
    </div>

    @if ($videos->count() >= 1)
    <div class="w-full text-center mt-2">
        @if ($hasMoreVideos)
        <button wire:click="loadMoreVids" wire:loading.attr="disabled"
            class="items-center px-3 py-2 text-xl font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
            <span wire:loading.remove>↓ تحميل المزيد</span>
            <span wire:loading>
                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
            </span>
        </button>
        @else
        <button
            class="items-center px-3 py-2 text-xl font-medium text-center text-white bg-gray-500 rounded-lg cursor-not-allowed"
            disabled>
            لا توجد المزيد من الفيديوهات
        </button>
        @endif
    </div>
    @endif
    @else
    <p class="text-center text-xl mt-4">لا توجد فيديوهات.</p>
    @endif



    <!-- Islamic Services Section -->
    <div dir="rtl" class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="container mx-auto  px-4">
                <div class="text-center ">
                    <h2 class=" text-4xl lg:text-5xl text-green-900 font-bold mb-4">خدماتنا
                    </h2>

                    <p class="text-lg lg:text-xl text-gray-700 max-w-3xl mx-auto">
                        نقدم مجموعة من الخدمات لتلبية احتياجات جميع الأفراد والأعمار. نسعى دائماً لتقديم أفضل ما
                        لدينا
                        لخدمتكم بإذن الله.
                    </p>
                </div>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 lg:grid-cols-3 gap-8">

                    <!-- Service 1 -->
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="p-6">
                            <div
                                class="p-2 flex items-center justify-center h-12 w-12 rounded-lg bg-emerald-700 text-white mb-4">
                                <!-- Replace with an appropriate icon -->
                                <img src="images/prayIcon.svg" alt="pray" loading="lazy">
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
                                class="p-2 flex items-center justify-center h-12 w-12 rounded-lg bg-emerald-700 text-white mb-4">
                                <!-- Replace with an appropriate icon -->
                                <img src="images/prayIcon.svg" alt="pray" loading="lazy">
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
                                class="p-2 flex items-center justify-center h-12 w-12 rounded-lg bg-emerald-700 text-white mb-4">
                                <!-- Replace with an appropriate icon -->
                                <img src="images/learninIcon.svg" alt="
                                learning
                                " loading="lazy">
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">
                                التربية و التعليم </h3>
                            <p class="mt-2 text-base text-gray-500">
                                برامجنا التعليمية للأطفال والبالغين، بما في ذلك القرآن و الفقه .
                            </p>
                        </div>
                    </div>

                    <!-- Service 4 -->
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="p-6">
                            <div
                                class="p-2 flex items-center justify-center h-12 w-12 rounded-lg bg-emerald-700 text-white mb-4">
                                <!-- Replace with an appropriate icon -->
                                <img src="images/marriageIcon.svg" alt="marriage Services" loading="lazy">
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">خدمات عقود الزواج</h3>
                            <p class="mt-2 text-base text-gray-500">
                                نقدم خدمات النكاح التي يجريها الأئمة المؤهلون.
                            </p>
                        </div>
                    </div>

                    <!-- Service 5 -->
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="p-6">
                            <div
                                class="p-2 flex items-center justify-center h-12 w-12 rounded-lg bg-emerald-700 text-white mb-4">
                                <!-- Replace with an appropriate icon -->
                                <img src="images/consultIcon.svg" alt="consulting" loading="lazy">

                            </div>
                            <h3 class="text-lg font-medium text-gray-900">الاستشارات الشرعية</h3>
                            <p class="mt-2 text-base text-gray-500">
                                استشارات و فتاوى من أئمتنا ومستشارين ذوي الخبرة. </p>
                        </div>
                    </div>

                    <!-- Service 6 -->
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="p-6">
                            <div
                                class="p-2  flex items-center justify-center h-12 w-12 rounded-lg bg-emerald-700 text-white mb-4">
                                <!-- Replace with an appropriate icon -->
                                <img src="images/zakatIcon.svg" alt="zakat" loading="lazy">
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">نشاطات اجتماعية </h3>
                            <p class="mt-2 text-base text-gray-500">
                                المشاركة في الأنشطة الاجتماعية التي تعزز روح المجتمع والتعاون
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <style>
    .lazyload {
        background-image: none;
    }

    .lazyloaded {
        background-image: url('images/OpenDay3.jpg');
    }
    </style>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        let lazyloadImages = document.querySelectorAll(".lazyload");
        lazyloadImages.forEach(function(image) {
            image.classList.add("lazyloaded");
        });
    });
    </script>


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

    <style>
    .hero-section {
        background-color: #f0f0f0;
        /* Placeholder color */
        background-image: url('images/OpenDay3.jpg');
        background-size: cover;
        /* Use cover to ensure the image covers the section */
        background-position: center;
        background-repeat: no-repeat;
    }
    </style>




</div>